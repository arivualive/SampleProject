<?php
/**
 * mcrypt, hash�g���𗘗p�����Í����p���C�u����
 * 
 * @package ssk
 * @version $Id: CYUtilsCrypt.inc.php,v 1.2 2007/10/16 03:11:51 kazuyuki_ikeda Exp $
 */
/**
 * 'CYUtilsLog.inc.php' �� require_once
 */
require_once dirname(__FILE__) .'/CYUtilsLog.inc.php';

$SSKAESKEY = 'rijndael-256';
define('KUGIRIMOJISUU',1900);

define('SSK_CRYPT_MCRYPT_MODE_CTR', 'ctr');
define('SSK_CRYPT_MCRYPT_MODE_CBC', 'cbc');
define('SSK_CRYPT_ERROR_NO_ERROR', 0);
define('SSK_CRYPT_ERROR', 1);
define('SSK_CRYPT_ERROR_MCRYPT_OPEN_ERROR', 1);
define('SSK_CRYPT_ERROR_MCRYPT_INIT_ERROR', 2);
define('SSK_CRYPT_ERROR_MCRYPT_DEINIT_ERROR', 3);
define('SSK_CRYPT_ERROR_MCRYPT_CLOSE_ERROR', 1);
define('SSK_CRYPT_HASH_FOR_GENERATING_KEY', 'sha256');
define('SSK_CRYPT_HASH_FOR_HMAC_SHA256', 'sha256');

/* �ȉ��A�萔�̎Q�Ɖӏ��͑S�ĎQ�Ƃ��Ă��邪�g�p���ĂȂ� start */
define ('MCRYPT_RAND', 2);
define ('MCRYPT_3DES', "tripledes");
define ('MCRYPT_ARCFOUR_IV', "arcfour-iv");
define ('MCRYPT_ARCFOUR', "arcfour");
define ('MCRYPT_BLOWFISH', "blowfish");
define ('MCRYPT_BLOWFISH_COMPAT', "blowfish-compat");
define ('MCRYPT_CAST_128', "cast-128");
define ('MCRYPT_CAST_256', "cast-256");
define ('MCRYPT_CRYPT', "crypt");
define ('MCRYPT_DES', "des");
define ('MCRYPT_ENIGNA', "crypt");
define ('MCRYPT_GOST', "gost");
define ('MCRYPT_LOKI97', "loki97");
define ('MCRYPT_PANAMA', "panama");
define ('MCRYPT_RC2', "rc2");
define ('MCRYPT_RIJNDAEL_128', "rijndael-128");
define ('MCRYPT_RIJNDAEL_192', "rijndael-192");
define ('MCRYPT_RIJNDAEL_256', "rijndael-256");
define ('MCRYPT_SAFER64', "safer-sk64");
define ('MCRYPT_SAFER128', "safer-sk128");
define ('MCRYPT_SAFERPLUS', "saferplus");
define ('MCRYPT_SERPENT', "serpent");
define ('MCRYPT_THREEWAY', "threeway");
define ('MCRYPT_TRIPLEDES', "tripledes");
define ('MCRYPT_TWOFISH', "twofish");
define ('MCRYPT_WAKE', "wake");
define ('MCRYPT_XTEA', "xtea");
define ('MCRYPT_IDEA', "idea");
define ('MCRYPT_MARS', "mars");
define ('MCRYPT_RC6', "rc6");
define ('MCRYPT_SKIPJACK', "skipjack");
define ('MCRYPT_MODE_CBC', "cbc");
define ('MCRYPT_MODE_CFB', "cfb");
define ('MCRYPT_MODE_ECB', "ecb");
define ('MCRYPT_MODE_NOFB', "nofb");
define ('MCRYPT_MODE_OFB', "ofb");
define ('MCRYPT_MODE_STREAM', "stream");
/* �萔�̎Q�Ɖӏ��͑S�ĎQ�Ƃ��Ă��邪�g�p���ĂȂ� end */

/**
 * ����salt��seed���琶������.
 * 
 * @access private
 * 
 * @param string $salt salt. �L�����y�[�����ƂɈقȂ�Z��������. 
 *                     ����seed��񋟂��ꂽ�ꍇ�ł��قȂ錮�𐶐����邽�߂ɗ��p����.
 * @param string $seed seed. ���̎�. 
 *                     ���T�C�Y�ȏ�̃G���g���s�[������������w�肷��.
 * @param int    $size ���T�C�Y
 * 
 * @return string �������ꂽ��. �o�C�i���`��
 */
function ssk_crypt_generate_key($salt, $seed, $size) {
    return substr(hash(SSK_CRYPT_HASH_FOR_GENERATING_KEY, 
        hash(SSK_CRYPT_HASH_FOR_GENERATING_KEY, $salt . $seed, true),
        true), 0, $size); 
    
}

/**
 * �f�[�^���Í�������
 * 
 * @access public
 * 
 * php�}�j���A���̃T���v���������قړ��P���Ă���.
 * 
 * @param string $algorithm   ���ʌ��Í��̃A���S���Y��. 
 *                             mcrypt���W���[�����w�肵�Ă���萔�𗘗p���邱��
 * @param string $mode        �Í����[�h. SSK_CRYPT_MCRYPT_MODE_* ���w�肷�邱��
 * @param string $key_salt    ����salt
 * @param string $key_seed    ����seed
 * @param string $input       ���̓f�[�^
 * @param string &$base64_iv  base64�G���R�[�h���ꂽ�������x�N�g��
 * @param string &$base64_enc base64�G���R�[�h���ꂽ�Í���
 * @param int    &$error_code �G���[�R�[�h. SSK_CRYPT_ERROR_* �̂ǂꂩ
 * 
 * @return bool �����Ȃ��true. ����ȊO��false.
 */
function ssk_crypt_encrypt($algorithm, $mode, $key_salt, $key_seed, $input,
                            &$base64_iv, &$base64_enc, &$error_code) {

    $con = dbConnect();
    $inData = (string)$input;

    //�����񐔂��Z�o
    $length = mb_strlen($inData);
    $loopCnt = ceil($length/KUGIRIMOJISUU);

    //�f�[�^�𕪊����z��Ɋi�[
    $arrayData = array();
    for($i=0; $i<$loopCnt; $i++) {
        $arrayData[$i] = mb_substr($inData, $i*KUGIRIMOJISUU, KUGIRIMOJISUU);
    }

    //�N�G���𐶐�
    $sql  = "SELECT SSKADMINUSER.STFUNC_SSK_ENC(";
    $sql .=  "TO_CLOB(:indata1)";
    for ($i=2 ; $i <= $loopCnt; $i++) {
        $sql .=  "||TO_CLOB(:indata".sprintf('%s',$i).")";
    }
    $sql .= ") AS RESULTSET FROM DUAL";


    //�N�G�����p�[�X
    $result = oci_parse($con, $sql);

    //�f�[�^���o�C���h
    oci_bind_by_name($result, ":indata1", $arrayData[0], -1);
    for ($i=2 ; $i <= $loopCnt; $i++) {
        oci_bind_by_name($result, ":indata".sprintf('%s',$i), $arrayData[$i-1], -1);
    }

    // SQL�̎��s
    oci_execute($result);

    // ���ʂ̎擾
    oci_fetch($result);
    $clob = oci_result($result, 'RESULTSET');
    if ($clob == false) {
        $error_code = SSK_CRYPT_ERROR;
        return false;
    }
    $base64_enc = $clob->load();


    // �X�g�A�h�ŗ�O�����������ꍇ�͋󕶎����Ԃ邽�߁A���̏ꍇ��false��Ԃ�
    if ($base64_enc == ''){
       $error_code = SSK_CRYPT_ERROR;
       return false;

    }

    $error_code = SSK_CRYPT_ERROR_NO_ERROR;
    return $base64_enc;
}

/**
 * �Í������ꂽ�f�[�^�𕜍�����
 *
 * @access public 
 * 
 * php�}�j���A���̃T���v���������قړ��P���Ă���.
 * 
 * @param string $algorithm   ���ʌ��Í��̃A���S���Y��. 
 *                             mcrypt���W���[�����w�肵�Ă���萔�𗘗p���邱��
 * @param string $mode        �Í����[�h. SSK_CRYPT_MCRYPT_MODE_* ���w�肷�邱��
 * @param string $key_salt    ����salt
 * @param string $key_seed    ����seed
 * @param string $base64_iv   base64�G���R�[�h���ꂽ�������x�N�g��
 * @param string $base64_enc  base64�G���R�[�h���ꂽ�Í���
 * @param string &$dec        �������ꂽ�f�[�^
 * @param int    &$error_code �G���[�R�[�h. SSK_CRYPT_ERROR_* �̂ǂꂩ
 * 
 * @return bool �����Ȃ��true. ����ȊO��false.
 */
function ssk_crypt_decrypt($algorithm, $mode, $key_salt, $key_seed, 
                           $base64_iv, $base64_enc, 
                           &$dec, &$error_code) {
                                    
    $con = dbConnect();
    $inData = $base64_enc;

    //�����񐔂��Z�o
    $length = mb_strlen($inData);
    $loopCnt = ceil($length/KUGIRIMOJISUU);

    //�f�[�^�𕪊����z��Ɋi�[
    $arrayData = array();
    for($i=0; $i<$loopCnt; $i++) {
        $arrayData[$i] = mb_substr($inData, $i*KUGIRIMOJISUU, KUGIRIMOJISUU);
    }

    //�N�G���𐶐�
    $sql  = "SELECT SSKADMINUSER.STFUNC_SSK_DEC(";
    $sql .=  "TO_CLOB(:indata1)";
    for ($i=2 ; $i <= $loopCnt; $i++) {
        $sql .=  "||TO_CLOB(:indata".sprintf('%s',$i).")";
    }
    $sql .= ") AS RESULTSET FROM DUAL";

    //�N�G�����p�[�X
    $result = oci_parse($con, $sql);

    //�f�[�^���o�C���h
    oci_bind_by_name($result, ":indata1", $arrayData[0], -1);
    for ($i=2 ; $i <= $loopCnt; $i++) {
        oci_bind_by_name($result, ":indata".sprintf('%s',$i), $arrayData[$i-1], -1);
    }

    // SQL�̎��s
    oci_execute($result);

    // ���ʂ̎擾
    oci_fetch($result);
    $clob = oci_result($result, 'RESULTSET');
    if ($clob == false) {
        $error_code = SSK_CRYPT_ERROR;
        return false;
    }
    $dec = $clob->load();

    // �X�g�A�h�ŗ�O�����������ꍇ�͋󕶎����Ԃ邽�߁A���̏ꍇ��false��Ԃ�
    if ($dec == ''){
       $error_code = SSK_CRYPT_ERROR;
       return false;

    }

    $error_code = SSK_CRYPT_ERROR_NO_ERROR;
    return $dec;
}


/**
 * HMAC-SHA256���v�Z����
 * 
 * @access public 
 * 
 * @param string $key_salt ����salt
 * @param string $key_seed ����seed
 * @param string $data     HMAC���v�Z����f�[�^
 * 
 * @return string HMAC�l
 */
function ssk_hmac_sha256($key_salt, $key_seed, $data) {
    return hash_hmac(SSK_CRYPT_HASH_FOR_HMAC_SHA256, $data, 
        ssk_crypt_generate_key($key_salt, $key_seed, 256));
}



/**
 * ssk_crypt_encrypt�����b�p����
 * 
 * @access public 
 * 
 * @param string $input    ���̓f�[�^
 * 
 * @return string �����Ȃ�ΈÍ����f�[�^. ����ȊO��false.
 */
function ssk_encrypt($input){
    global $salt, $seed, $vector;
    
    if (isset($input) && $input !== "") {
        return ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, 
                                 $salt, $seed, trim($input), $vector, $base64_enc, $error_code
                                );
    }
    return false;
}

/**
 * ssk_crypt_decrypt�����b�p����
 * 
 * @access public 
 * 
 * @param string $input    ���̓f�[�^
 * 
 * @return string �����Ȃ�Ε������f�[�^. ����ȊO��false.
 */
function ssk_decrypt($input){
    global $salt, $seed, $vector;
    
    if (isset($input) && $input !== "") {
        return ssk_crypt_decrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, 
                                  $salt, $seed, $vector, trim($input), $dec, $error_code
                                 );
    }
    return false;
}


?>
