<?php
/**
 *
 * �y�����񑀍� �֐�(�`�F�b�N�֐�)�Q�t�@�C���z
 *
 * ���͕�����, mbstring.internal_encoding �Ƃ���Shift_JIS(SJIS)��
 * ���邱�Ƃ�O��Ƃ��܂�.
 *
 * @package default
 * @version $Id: CYUtilsStringChk.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */

/*
 * TODO: chk�֐��̕Ԃ�l�̈�v
 * TODO: chkNgWord() �̈ړ��Ȃ����K�؂ȃt�@�C����include
 */

/**
 * 'CYUtilsLog.inc.php' �� require_once
 */
require_once dirname(__FILE__). '/CYUtilsLog.inc.php';


//--------------------------------------------------------
/**
 * �����񂪂Ђ炪�Ȃ݂̂ō\������Ă��邩���`�F�b�N����
 *
 * �����ł̂Ђ炪�ȂƂ́A �i������j�Ђ炪�Ȃ�
 *  '�[','�E', �S�p�X�y�[�X, ���p�X�y�[�X �����������̂ł�.
 *
 * @param string $text �`�F�b�N�Ώە�����
 * @return int �S�ĂЂ炪�Ȃ̏ꍇ:1, �Ђ炪�ȈȊO���܂ޏꍇ(�󕶎���̊܂�):0
*/
//--------------------------------------------------------
function chkHiragana($text)
{
    if (mb_ereg('^[��-��[�E�@ ]+$', $text) === false) {
        return 0;
    }
    return 1;
}

//--------------------------------------------------------
/**
 * �����񂪑S�p�����݂̂ō\������Ă��邩���`�F�b�N����.
 *
 * @param string $text �`�F�b�N�Ώە�����
 *
 * @return bool �S�p�݂̂ō\������Ă���ꍇ true,
 * 					����ȊO��false
 */
//--------------------------------------------------------
function chkZenkaku($text)
{
    if (mb_convert_kana($text, 'ASKR') === $text) {
        return true;
    } else {
        return false;
    }
}


//--------------------------------------------------------
/**
 * ���[���̃��[�J���p�[�g��RFC2822(+DoCoMo�̊g��)�ɏ]���Ă��邩���`�F�b�N����
 *
 * TODO: �Ɨ������e�X�g�̍쐬
 *
 * @param string $text �`�F�b�N�Ώە�����
 * @return int �h���C�����Ƃ��Đ������`���̕�����:1 ����ȊO:0
 *
 */
//--------------------------------------------------------
function chkLocalPartOfEmailAddress ($text)
{

    /* RFC2822�ł� ������ '.' �͋�����Ă��Ȃ���, DoCoMo�͋����̂�
     * �����ł������Ă���.
     */

     // '.' ���������p���Ă��悢����
    $atext =  "a-z0-9!#\$%&'*+\-\/=?^_`{|}~";

    if (preg_match("/^[$atext][$atext.]*$/i", $text) === 1) {
        return 1;
    }
    return 0;
}
//--------------------------------------------------------
/**
 * �h���C������RFC1035�ɏ]���Ă��邩���`�F�b�N����
 *
 * TODO: �Ɨ������e�X�g�̍쐬
 * TODO: TLD��2�����ȏ�̃`�F�b�N?
 *
 * @param string $text �`�F�b�N�Ώە�����
 * @return int �h���C�����Ƃ��Đ������`���̕�����:1 ����ȊO:0
 *
 */
//--------------------------------------------------------
function chkDomainName($text)
{

    // domain �̃`�F�b�N

    // domain�̒�����255�����܂�
    if (strlen($text) > 255) {
        return 0;
    }

    $domain_labels= explode('.', $text);

    // 2�ȏ�̕����ɂ킩��邱�Ƃ��m�F
    if ($domain_labels === false || count($domain_labels) < 2) {
        return 0;
    }

    foreach ($domain_labels as $label) {

        //���x���̒�����1��������63�����܂�
        if (strlen($label) < 1 || strlen($label) > 63) {
            return 0;
        }

        /*
         * ���x���ɗp���Ă悢������ [a-z0-9-]����,
         * �ŏ��Ɩ����� '-' �͋֎~����Ă���
         * �����ł�, 1�����̏ꍇ����ʈ������Ă���.
         */
        if (strlen($label) === 1) {
            if (preg_match('/^[a-z0-9]$/i', $label) === 0) {
                return 0;
            }
        } else {

            if (preg_match('/^([a-z0-9][a-z0-9-]*[a-z0-9])$/i', $label) === 0) {
                return 0;
            }
        }
    }

    return 1;
}
//--------------------------------------------------------
/**
 * ���[���A�h���X��RFC2822(+DoCoMo�̊g��)�ɏ]���Ă��邩���`�F�b�N����
 *
 * @param string $email �`�F�b�N�Ώۃ��[���A�h���X
 * @return int ���[���A�h���X�Ƃ��Đ������`���̕�����:1 ����ȊO:0
 *
 */
//--------------------------------------------------------
function chkEmail($email)
{
    $mail_parts= explode('@', $email);

    // 2�̕����ɂ킩��邱�Ƃ��m�F
    if ($mail_parts === false || count($mail_parts) !== 2) {
        return 0;
    }

    // local-part �̃`�F�b�N
    if (chkLocalPartOfEmailAddress($mail_parts[0]) === 0) {
        return 0;
    }

    // domain name �̃`�F�b�N

    return chkDomainName($mail_parts[1]);
}

//--------------------------------------------------------
/**
 * ������ASCII�̐���������ł��邩���`�F�b�N����
 *
 * �����Ȃǂ̐����ȊO�̐��l�ɂ���
 * �����Ȃ������l������ł��邩�𒲂ׂ�Ȃ��
 * is_numeric()�𗘗p���Ă�������.
 *
 * @param string $text �`�F�b�N�Ώە�����
 *
 * @return int ����������̏ꍇ:1 ����ȊO:0
*/
//--------------------------------------------------------
function chkNumeric($text)
{
    if (preg_match('/^[0-9]+$/', $text) === 1) {
        return 1;
    }
    return 0;
}

//--------------------------------------------------------
/**
 * �^����ꂽ�����񂪌Œ�d�b�ԍ��Ƃ��Đ������`�����`�F�b�N����.
 *
 * '-'���s�O�ǔ�, �s���ǔ�, �����Ҕԍ��̋�؂�Ƃ��ĉ��߂��܂�.
 * ������ 0AB0���Ԃɂ��Ă̓`�F�b�N���s�Ȃ��܂���.
 *
 * @param string $text �`�F�b�N�Ώە�����
 *
 * @return int �Œ�d�b�ԍ��Ɖ��߂ł��镶����̏ꍇ:1 ����ȊO:0
*/
//--------------------------------------------------------
function chkTelephone($text)
{

    $len= strlen(str_replace('-', '', $text));
    if ($len !== 9 && $len !== 10) {
        return 0;
    }
    if (preg_match('/^0[1-9][0-9]{0,4}[\-]?[0-9]{0,4}[\-]?[0-9]{4}$/',
     $text) === 1) {
        return 1;
    }
    return 0;
}

//--------------------------------------------------------
/**
 * �^����ꂽ�����񂪌g�ѓd�b�ԍ��Ƃ��Đ������`�����`�F�b�N����.
 *
 * '-'���s�O�ǔ�, �s���ǔ�, �����Ҕԍ��̋�؂�ɗp���Ă悢
 *
 * @param string $text �`�F�b�N�Ώە�����
 *
 * @return int �g�ѓd�b�ԍ��Ɖ��߂ł��镶����̏ꍇ:1 ����ȊO:0
 */
//--------------------------------------------------------
function chkCellularPhone($text)
{
    if (preg_match('/^0[1-9]0[\-]?[0-9]{4}[\-]?[0-9]{4}$/', $text) === 1) {
        return 1;
    }
    return 0;
}

//--------------------------------------------------------
//--------------------------------------------------------
/**
 * �^����ꂽ�����񂪓d�b�ԍ�/�g�ѓd�b�ԍ��Ƃ��Đ������`�����`�F�b�N����.
 *
 * �g�ѓd�b�̔ԍ��̏ꍇ��, '-'���s�O�ǔ�, �s���ǔ�, �����Ҕԍ��̋�؂�ɗp���邱�Ƃ��ł��Ȃ�
 * TODO: chkCellularPhone() �ł͎g����̂�
 *       chkPhone()�ł��g�����ق����悢.
 *
 * @param string $text �`�F�b�N�Ώە�����
 * @return int �d�b�ԍ��Ɖ��߂ł��镶����̏ꍇ:1 ����ȊO:0
 */
//--------------------------------------------------------
function chkPhone($text)
{

    // �Œ�:9��10�� �g��:11��
    $len= strlen($text);
    if ($len === 11) {
        return chkCellularPhone($text);
    }

    // chkTelephone() ���Œ����̃`�F�b�N���s�Ȃ��Ă���.
    return chkTelephone($text);

}

/**
 * �������NG���[�h���܂܂�Ă��邩���`�F�b�N����
 *
 * @global string NG���[�h�t�@�C��������f�B���N�g���̃p�X
 * @global string NG���[�h�t�@�C���̃t�@�C����
 *
 * @param string $word �`�F�b�N�Ώە�����
 *
 * @return array �`�F�b�N���ʂ��������z��B
 * 'NG_FLAG'=>true�̏ꍇ�͕�����̒���NG���[�h�������Ă���
 *            ����ȊO�� false
 * 'DANGEROUS_LEVEL'=>NG���x���A
 * 'TARGET_WORD'=>���o���ꂽNG���[�h
 */
//--------------------------------------------------------

function chkNgWord($word)
{
    global $LIB_PATH, $NG_WORD_FILE;

    $result['NG_FLAG']= false;
    $result['DANGEROUS_LEVEL']= '';
    $result['TARGET_WORD']= '';

    $file_path= $LIB_PATH . '/' . $NG_WORD_FILE;

    if (!is_file($file_path)) {
        logError('NG���[�h�t�@�C��(' . $file_path . ')' .
                '��������Ȃ���, �t�@�C���ł͂���܂���.');
        exit;
    }

    if (!is_readable($file_path)) {
        logError('NG���[�h�t�@�C��(' . $file_path . ')���ǂ݂��߂܂���.');
        exit;
    }

    $file_data= @file($file_path);

    if ($file_data === false) {
        logError('NG���[�h�t�@�C��(' . $file_path . ')�̓ǂݍ��݂Ɏ��s���܂���.');
        exit;
    }

    $list_count= count($file_data);

    for ($i= 0; $i < $list_count; ++$i) {
        $object_list= explode(',', $file_data[$i]);
        if ($object_list === false || count($object_list) < 2) {
            continue;
        }

        $ng_word= trim($object_list[1]);
        if (!( mb_strpos($word, $ng_word) === false)) {
            $result['NG_FLAG']= true;
            $result['DANGEROUS_LEVEL']= trim($object_list[0]);
            $result['TARGET_WORD']= $ng_word;
            break;
        }
    }
    return $result;
}

/**
 * ���M�����[���A�h���X�`�F�b�N
 *
 * @param  mixed $to ���[���A�h���X
 * @return bool  ������Ă���h���C���̏ꍇ�Atrue�B����ȊO��FALSE�B
 */
function PermmitMailDomainCheck($to)
{
    // �����o�C���Ή� #738 2009/02/26 kdl.ohyanagi
    // �g�уA�h���X�̃`�F�b�N
    // �����ꂽ�A�h���X�̂݋���
    if (is_array($to)) {
        foreach ($to as $mail) {
            if (isMailAddressAllowed($email) === true) {
                logDebug("Mail address exists in list");
                return true;
            }
        }
    } else {
        if (isMailAddressAllowed($to) === true) {
            logDebug("Mail address exists in list");
            return true;
        }
    }
    
    // �����o�C���Ή� #738 2009/02/26 kdl.ohyanagi

    // ���h���C���ꗗ
    $Ok_MailAddress[0] = "saishunkan.co.jp";
    $Ok_MailAddress[1] = "aifront.co.jp";
    $Ok_MailAddress[2] = "kdl.co.jp";

    $toArray = array();
    if (is_array($to)) {
        $toArray = array_merge($toArray , $to);
    } else {
        $toArray = array_merge($toArray , preg_split("/,/", $to));
    }

    foreach ($toArray as $email) {
        // ���A�h�����ŕ���
        $email_part = explode('@', $email);
        $domain = trim(str_replace('>', '', $email_part[1]));
        if(in_array($domain, $Ok_MailAddress) ){
            logDebug("mailto OK:".$email);
        } else {
            logError("mailto NG:".$email);
            return false;
        }
    }

    return true;
}

/**
 * �����ꂽ���[���A�h���X�����肷��
 *
 * @param  mixed $to ���[���A�h���X
 * @access public
 * @return bool true:Allowed mail address, false:Not allowed
 */
function isMailAddressAllowed($to, $iniPath = null)
{
    // �l���z��̏ꍇ�A�ċA�`�F�b�N���s��
    if (is_array($to)) {
        foreach ($to as $val) {
            $ret = isMailAddressAllowed($val, $iniPath);
            if ($ret === true) {
                return true;
            }
        }
    }

    if (is_null($iniPath)) {
        $iniPath = dirname(__FILE__) . '/allowed_mailaddress.ini';
    }
    $ini = file_get_contents($iniPath);
    if (is_string($ini)) {
        $mails = explode(',', rtrim($ini, ','));
        foreach($mails as $mail) {
            if (trim($mail) === $to) {
                return true;
            }
        }
    }

    return false;
}
/**#@-*/

// ��R-#3743 �X�}�[�g�t�H���Ή� 2012/06/29 uls-motoi
function myIsMobileDomain($email, $ng_mailaddress = null) {

		global $NG_MAILADDRESS;

		// ���A�h�����ŕ���
		$tmp = explode('@', $email);

		// PC�̃��[���A�h���X���`�F�b�N
		if( in_array($tmp[1], $NG_MAILADDRESS) ){
			return true;
		}

		return false;
}
// ��R-#3743 �X�}�[�g�t�H���Ή� 2012/06/29 uls-motoi
?>
