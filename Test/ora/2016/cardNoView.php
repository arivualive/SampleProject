<?php
$my_func = '2016';
//------------------------------------------------------------
//CY共通モジュール読み込み
//------------------------------------------------------------
require_once "../../include/lib/CYUtilsConst.inc.php";
require_once $LIB_PATH."/CYUtilsCommon.inc.php";
require_once $LIB_PATH."/CYUtilsStart.inc.php";
require_once $LIB_PATH."/CYUtilsCrypt.inc.php";
// require_once $LIB_PATH.'/ssktool'."/denbun_common.inc.php";

//------------------------------------------------------------
//ツール共通モジュール読み込み
//------------------------------------------------------------
require_once $CONF_PATH."/SaishunkanProperties.inc.php";
require_once $CONF_PATH."/SaishunkanUtils.inc.php";
require_once $CONF_PATH."/const.inc.php";

//------------------------------------------------------------
//セッションチェック
//------------------------------------------------------------
require_once $CONF_PATH."/SessionlogOff.inc.php";

//------------------------------------------------------------
//権限チェック
//------------------------------------------------------------
require_once $CONF_PATH."/SaishunkanAuthority.inc.php";

//------------------------------------------------------------
//初期値設定
//------------------------------------------------------------
$view_data = array();

//------------------------------------------------------------
//パラメータ取得
//------------------------------------------------------------
$view_data['kainno']      = $_REQUEST['kainno'];
$view_data['name']        = $_REQUEST['name'];
$view_data['order_dt']    = $_REQUEST['orderDt'];
$view_data['tel_no']      = $_REQUEST['telNo'];

$view_data['clr_corp_cd'] = $_REQUEST['clrCorpCd'];
$view_data['kaiin_id']    = $_REQUEST['kaiinId'];
$view_data['kaiin_pass']  = $_REQUEST['kaiinPass'];
$view_data['card_seq']    = $_REQUEST['cardSeq'];

$view_data['card_no']     = $_REQUEST['cardNo'];
$view_data['card_term']   = $_REQUEST['cardTerm'];
$view_data['payment_num'] = $_REQUEST['paymentNum'];

//------------------------------------------------------------
//DBから情報を取得
//------------------------------------------------------------

//------------------------------------------------------------
//ページ情報を取得
//------------------------------------------------------------
$pageInfo = getPageInfo();

//------------------------------------------------------------
//データファイルをインクルード
//------------------------------------------------------------

//------------------------------------------------------------
//ヘッダーをインクルード
//------------------------------------------------------------
//require_once ($LIB_PATH.'/CYUtilsHeader.inc.php');
//------------------------------------------------------------
//テンプレートをインクルード
//------------------------------------------------------------
require_once ($TEMPLATE_PATH.'/'.$my_func.'/cardNoView.tpl.php');
//------------------------------------------------------------
//フッターをインクルード
//------------------------------------------------------------
//require_once ($LIB_PATH.'/CYUtilsFooter.inc.php');
?>