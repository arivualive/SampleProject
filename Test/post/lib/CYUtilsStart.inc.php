<?php

/**
 *
 * �y���ʊJ�n�����t�@�C���z
 *
 * @package default
 * @version $Id: CYUtilsStart.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 *
 */

/**
 * 'CYUtilsDevice.inc.php' �� require_once
 */
require_once dirname(__FILE__).'/CYUtilsDevice.inc.php';
/**
 * 'CYUtilsEmoji.inc.php' �� require_once
 */
require_once dirname(__FILE__).'/CYUtilsEmoji.inc.php';
/**
 * 'CYUtilsCommon.inc.php' �� require_once
 */
require_once dirname(__FILE__).'/CYUtilsCommon.inc.php';

if (count($_POST) != 0) {
    //    while (list($key,$val) = each($_POST)) {
    foreach ($_POST as $key => $val) {
        if (is_array($val)) {
            for ($i = 0; $i < count($val); ++$i) {
                // $val[$i] = ereg_replace("\r\n","\n",$val[$i]);
                // $val[$i] = ereg_replace("\r","\n",$val[$i]);
                // ${"_" . $key}[$i] = trim($val[$i]);
                $val[$i] = str_replace(array("\r\n", "\r"), "\n", $val[$i]);
                $_POST[$key][$i] = trim($val[$i]);
                $COM_PARAM[$key] = $val;
            }
        } else {
            // $val = ereg_replace("\r\n","\n",$val);     // ���s��������
            // $val = ereg_replace("\r","\n",$val);       // ���s��������
            $val = str_replace(array("\r\n", "\r"), "\n", $val);
            $val = trim($val);                         // �擪�A�����̋󔒂��폜
            // ${"_" . $key} = $val;
            $_POST[$key]     = $val;
            $COM_PARAM[$key] = $val;
        }
    }
}
if (count($_GET) != 0) {
    //    while (list($key,$val) = each($_GET)) {
    foreach ($_GET as $key => $val) {
        //  ${"_" . $key} = $val;
        $_GET[$key]      = $val;
        $COM_PARAM[$key] = $val;
    }
}

//-----  USER_AGENT�̎擾  -------//
if ($PC_MODE === false) {
    //TODO: ���̕ϐ��𗘗p���Ă���ӏ��͂Ȃ��̂�, �s�v?
    $USER_AGENT = getUserAgent();
}

//-----  UID�̎擾  -------//
if ($PC_MODE === true) {
    //$uid     = getPcUserIp();
    //$uid     = str_replace('.', '', $uid);
    //$uid_def = $uid;
    $uid = 'unknown';
} else {
    $user_id = getUid();
    $uid     = $user_id['uid'];
    $uid_def = $user_id['uid_def'];
}

//-----  �L�����A�ˑ��ϐ��̐ݒ�  -------//
$URL_PARAM   = getUrlParam();
$FORM_PARAM  = getFormParam();
$FORM_METHOD = getFormMethod();

// ���ݓ��t��ϐ���
$getDate         = "'".date('Y-m-d H:i:s.000')."'";
$getDateYMDhis   = date('Ymd H:i:s');
$getDateYyyyMmDd = date('Ymd');
$getDateYyyyMm   = date('Ym');
$getDateYyyy     = date('Y');
$getDateMm       = date('m');
$getDateDd       = date('d');
$getDateHh       = date('H');
$getDateIi       = date('i');
$getDateSs       = date('s');
$hikaku_getDate  = 
    $getDateYyyy.$getDateMm.$getDateDd.$getDateHh.$getDateIi.$getDateSs;
$getDateyyyymmddhhiiss = $hikaku_getDate;

//���{�[�w��[���ł���΁A�w�b�_�[��񂩂�w�莞�����擾�ł���
$LAB_REWRITE_DATE = $_SERVER['HTTP_X_CY_VTIME'];

// ���[�U���L�����t���{�[���o�^���[�U�����f
if (strlen($LAB_REWRITE_DATE)>0) {
    //($LAB_REWRITE_DATE̫�ϯāF2004/06/28 15:35:00)
    $rewrite_date = $LAB_REWRITE_DATE;

    $ryear  = substr($rewrite_date, 0, 4);
    $rmonth = substr($rewrite_date, 5, 2);
    $rday   = substr($rewrite_date, 8, 2);
    $rhour  = substr($rewrite_date, 11, 2);
    $rmin   = substr($rewrite_date, 14, 2);
    $rsec   = substr($rewrite_date, 17, 2);

    $hikaku_rewrite_date = $ryear.$rmonth.$rday.$rhour.$rmin.$rsec;
    // ���t�������ł��郆�[�U���L�����t���{�[���[�U�Ƃ݂Ȃ����A���ݓ��t������������
    //    if ((strlen($rewrite_date)>0) && ($hikaku_rewrite_date>$hikaku_getDate)) {
    if ((strlen($rewrite_date)>0) && 
        (strcmp($hikaku_rewrite_date, $hikaku_getDate)>0)) {
        $getDateYyyyMmDd       = $ryear.$rmonth.$rday;
        $getDateYyyyMm         = $ryear.$rmonth;
        $getDateYyyy           = $ryear;
        $getDateMm             = $rmonth;
        $getDateDd             = $rday;
        $getDateHh             = $rhour;
        $getDateIi             = $rmin;
        $getDateSs             = $rsec;
        $getDateYMDhis         = $getDateYyyyMmDd.' '.$rhour.':'.$rmin.':'.$rsec;
        $getDateyyyymmddhhiiss = $getDateYyyyMmDd.$rhour.$rmin.$rsec;
        $getDate               = 
            "'".$getDateYyyy.'-'.$getDateMm.'-'.$getDateDd.' '
            .$rhour.':'.$rmin.':'.$rsec.'.000'."'";

    }
}
?>
