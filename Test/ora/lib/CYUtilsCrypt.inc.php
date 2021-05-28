<?php
/**
 * mcrypt, hash拡張を利用した暗号利用ライブラリ
 * 
 * @package ssk
 * @version $Id: CYUtilsCrypt.inc.php,v 1.2 2007/10/16 03:11:51 kazuyuki_ikeda Exp $
 */
/**
 * 'CYUtilsLog.inc.php' の require_once
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

/* 以下、定数の参照箇所は全て参照しているが使用してない start */
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
/* 定数の参照箇所は全て参照しているが使用してない end */

/**
 * 鍵をsaltとseedから生成する.
 * 
 * @access private
 * 
 * @param string $salt salt. キャンペーンごとに異なる短い文字列. 
 *                     同じseedを提供された場合でも異なる鍵を生成するために利用する.
 * @param string $seed seed. 鍵の種. 
 *                     鍵サイズ以上のエントロピーを持つ文字列を指定する.
 * @param int    $size 鍵サイズ
 * 
 * @return string 生成された鍵. バイナリ形式
 */
function ssk_crypt_generate_key($salt, $seed, $size) {
    return substr(hash(SSK_CRYPT_HASH_FOR_GENERATING_KEY, 
        hash(SSK_CRYPT_HASH_FOR_GENERATING_KEY, $salt . $seed, true),
        true), 0, $size); 
    
}

/**
 * データを暗号化する
 * 
 * @access public
 * 
 * phpマニュアルのサンプル実装をほぼ踏襲している.
 * 
 * @param string $algorithm   共通鍵暗号のアルゴリズム. 
 *                             mcryptモジュールが指定している定数を利用すること
 * @param string $mode        暗号モード. SSK_CRYPT_MCRYPT_MODE_* を指定すること
 * @param string $key_salt    鍵のsalt
 * @param string $key_seed    鍵のseed
 * @param string $input       入力データ
 * @param string &$base64_iv  base64エンコードされた初期化ベクトル
 * @param string &$base64_enc base64エンコードされた暗号文
 * @param int    &$error_code エラーコード. SSK_CRYPT_ERROR_* のどれか
 * 
 * @return bool 成功ならばtrue. それ以外はfalse.
 */
function ssk_crypt_encrypt($algorithm, $mode, $key_salt, $key_seed, $input,
                            &$base64_iv, &$base64_enc, &$error_code) {

    $con = dbConnect();
    $inData = (string)$input;

    //分割回数を算出
    $length = mb_strlen($inData);
    $loopCnt = ceil($length/KUGIRIMOJISUU);

    //データを分割し配列に格納
    $arrayData = array();
    for($i=0; $i<$loopCnt; $i++) {
        $arrayData[$i] = mb_substr($inData, $i*KUGIRIMOJISUU, KUGIRIMOJISUU);
    }

    //クエリを生成
    $sql  = "SELECT SSKADMINUSER.STFUNC_SSK_ENC(";
    $sql .=  "TO_CLOB(:indata1)";
    for ($i=2 ; $i <= $loopCnt; $i++) {
        $sql .=  "||TO_CLOB(:indata".sprintf('%s',$i).")";
    }
    $sql .= ") AS RESULTSET FROM DUAL";


    //クエリをパース
    $result = oci_parse($con, $sql);

    //データをバインド
    oci_bind_by_name($result, ":indata1", $arrayData[0], -1);
    for ($i=2 ; $i <= $loopCnt; $i++) {
        oci_bind_by_name($result, ":indata".sprintf('%s',$i), $arrayData[$i-1], -1);
    }

    // SQLの実行
    oci_execute($result);

    // 結果の取得
    oci_fetch($result);
    $clob = oci_result($result, 'RESULTSET');
    if ($clob == false) {
        $error_code = SSK_CRYPT_ERROR;
        return false;
    }
    $base64_enc = $clob->load();


    // ストアドで例外が発生した場合は空文字が返るため、その場合はfalseを返す
    if ($base64_enc == ''){
       $error_code = SSK_CRYPT_ERROR;
       return false;

    }

    $error_code = SSK_CRYPT_ERROR_NO_ERROR;
    return $base64_enc;
}

/**
 * 暗号化されたデータを復号する
 *
 * @access public 
 * 
 * phpマニュアルのサンプル実装をほぼ踏襲している.
 * 
 * @param string $algorithm   共通鍵暗号のアルゴリズム. 
 *                             mcryptモジュールが指定している定数を利用すること
 * @param string $mode        暗号モード. SSK_CRYPT_MCRYPT_MODE_* を指定すること
 * @param string $key_salt    鍵のsalt
 * @param string $key_seed    鍵のseed
 * @param string $base64_iv   base64エンコードされた初期化ベクトル
 * @param string $base64_enc  base64エンコードされた暗号文
 * @param string &$dec        復号されたデータ
 * @param int    &$error_code エラーコード. SSK_CRYPT_ERROR_* のどれか
 * 
 * @return bool 成功ならばtrue. それ以外はfalse.
 */
function ssk_crypt_decrypt($algorithm, $mode, $key_salt, $key_seed, 
                           $base64_iv, $base64_enc, 
                           &$dec, &$error_code) {
                                    
    $con = dbConnect();
    $inData = $base64_enc;

    //分割回数を算出
    $length = mb_strlen($inData);
    $loopCnt = ceil($length/KUGIRIMOJISUU);

    //データを分割し配列に格納
    $arrayData = array();
    for($i=0; $i<$loopCnt; $i++) {
        $arrayData[$i] = mb_substr($inData, $i*KUGIRIMOJISUU, KUGIRIMOJISUU);
    }

    //クエリを生成
    $sql  = "SELECT SSKADMINUSER.STFUNC_SSK_DEC(";
    $sql .=  "TO_CLOB(:indata1)";
    for ($i=2 ; $i <= $loopCnt; $i++) {
        $sql .=  "||TO_CLOB(:indata".sprintf('%s',$i).")";
    }
    $sql .= ") AS RESULTSET FROM DUAL";

    //クエリをパース
    $result = oci_parse($con, $sql);

    //データをバインド
    oci_bind_by_name($result, ":indata1", $arrayData[0], -1);
    for ($i=2 ; $i <= $loopCnt; $i++) {
        oci_bind_by_name($result, ":indata".sprintf('%s',$i), $arrayData[$i-1], -1);
    }

    // SQLの実行
    oci_execute($result);

    // 結果の取得
    oci_fetch($result);
    $clob = oci_result($result, 'RESULTSET');
    if ($clob == false) {
        $error_code = SSK_CRYPT_ERROR;
        return false;
    }
    $dec = $clob->load();

    // ストアドで例外が発生した場合は空文字が返るため、その場合はfalseを返す
    if ($dec == ''){
       $error_code = SSK_CRYPT_ERROR;
       return false;

    }

    $error_code = SSK_CRYPT_ERROR_NO_ERROR;
    return $dec;
}


/**
 * HMAC-SHA256を計算する
 * 
 * @access public 
 * 
 * @param string $key_salt 鍵のsalt
 * @param string $key_seed 鍵のseed
 * @param string $data     HMACを計算するデータ
 * 
 * @return string HMAC値
 */
function ssk_hmac_sha256($key_salt, $key_seed, $data) {
    return hash_hmac(SSK_CRYPT_HASH_FOR_HMAC_SHA256, $data, 
        ssk_crypt_generate_key($key_salt, $key_seed, 256));
}



/**
 * ssk_crypt_encryptをラッパする
 * 
 * @access public 
 * 
 * @param string $input    入力データ
 * 
 * @return string 成功ならば暗号化データ. それ以外はfalse.
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
 * ssk_crypt_decryptをラッパする
 * 
 * @access public 
 * 
 * @param string $input    入力データ
 * 
 * @return string 成功ならば復号化データ. それ以外はfalse.
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
