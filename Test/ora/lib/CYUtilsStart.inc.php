<?php

/**
 *
 * 【共通開始処理ファイル】
 *
 * @package default
 * @version $Id: CYUtilsStart.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 *
 */

/**
 * 'CYUtilsDevice.inc.php' の require_once
 */
require_once dirname(__FILE__).'/CYUtilsDevice.inc.php';
/**
 * 'CYUtilsEmoji.inc.php' の require_once
 */
require_once dirname(__FILE__).'/CYUtilsEmoji.inc.php';
/**
 * 'CYUtilsCommon.inc.php' の require_once
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
            // $val = ereg_replace("\r\n","\n",$val);     // 改行文字処理
            // $val = ereg_replace("\r","\n",$val);       // 改行文字処理
            $val = str_replace(array("\r\n", "\r"), "\n", $val);
            $val = trim($val);                         // 先頭、末尾の空白を削除
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

//-----  USER_AGENTの取得  -------//
if ($PC_MODE === false) {
    //TODO: この変数を利用している箇所はないので, 不要?
    $USER_AGENT = getUserAgent();
}

//-----  UIDの取得  -------//
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

//-----  キャリア依存変数の設定  -------//
$URL_PARAM   = getUrlParam();
$FORM_PARAM  = getFormParam();
$FORM_METHOD = getFormMethod();

// 現在日付を変数化
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

//ラボ端指定端末であれば、ヘッダー情報から指定時刻が取得できる
$LAB_REWRITE_DATE = $_SERVER['HTTP_X_CY_VTIME'];

// ユーザが有効日付ラボ端末登録ユーザか判断
if (strlen($LAB_REWRITE_DATE)>0) {
    //($LAB_REWRITE_DATEﾌｫｰﾏｯﾄ：2004/06/28 15:35:00)
    $rewrite_date = $LAB_REWRITE_DATE;

    $ryear  = substr($rewrite_date, 0, 4);
    $rmonth = substr($rewrite_date, 5, 2);
    $rday   = substr($rewrite_date, 8, 2);
    $rhour  = substr($rewrite_date, 11, 2);
    $rmin   = substr($rewrite_date, 14, 2);
    $rsec   = substr($rewrite_date, 17, 2);

    $hikaku_rewrite_date = $ryear.$rmonth.$rday.$rhour.$rmin.$rsec;
    // 日付が未来であるユーザが有効日付ラボ端ユーザとみなすし、現在日付を書き換える
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
