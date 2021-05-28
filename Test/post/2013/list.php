<?
$my_func = '2013';
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
$err_message = "";

//------------------------------------------------------------
//パラメータ取得
//------------------------------------------------------------
$mode			= $_REQUEST['mode'];
$s_yy			= trim($_REQUEST['s_yy']);
$s_mm			= trim($_REQUEST['s_mm']);
$s_dd			= trim($_REQUEST['s_dd']);
$e_yy			= trim($_REQUEST['e_yy']);
$e_mm			= trim($_REQUEST['e_mm']);
$e_dd			= trim($_REQUEST['e_dd']);
$kainno			= trim($_REQUEST['kainno']);
$kain_name		= trim($_REQUEST['kain_name']);
$tel_no			= trim($_REQUEST['tel_no']);
$email			= trim($_REQUEST['email']);

// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/21 jst-arivazhagan
//$order_status	= $_REQUEST['order_status'];
// ▼R41505【R02-0212-001】Ｗｅｂサイトで注文変更機能追加簡易Ver 2020/09/15 chinhhv-ssv
$change_kbn	= $_REQUEST['change_kbn'];
if ($change_kbn == ''){
	$change_kbn = array();
}

$order_status	= $_REQUEST['order_status'];
if ($order_status == '')
	$order_status = array();

$site_kbn		= $_REQUEST['site_kbn'];
if ($site_kbn == ''){
	$site_kbn = array();
}

$net_ij_kbn		= $_REQUEST['net_ij_kbn'];
if ($net_ij_kbn == ''){
	$net_ij_kbn = array();
}

$order_kbn		= $_REQUEST['order_kbn'];
if ($order_kbn == ''){
	$order_kbn = array();
}

$login_status		= $_REQUEST['login_status'];
if ($login_status == ''){
	$login_status = array();
}

$odr_form		= $_REQUEST['odr_form'];
if ($odr_form == ''){
	$odr_form = array();
}
// ▼R41505【R02-0212-001】Ｗｅｂサイトで注文変更機能追加簡易Ver 2020/09/15 chinhhv-ssv
// ▼R-#39403_【H31-0380-001】長白仙参リニューアル（WEB） 2020/01/31 sai-shiragiku
// $order_kbn		= $_REQUEST['order_kbn'];
// ▲R-#39403_【H31-0380-001】長白仙参リニューアル（WEB） 2020/01/31 sai-shiragiku
// if ($order_status == '')
// 	$order_status = array();
// ▼R-#39403_【H31-0380-001】長白仙参リニューアル（WEB） 2020/01/31 sai-shiragiku
// if ($order_kbn == ''){
// 	$order_kbn = array();
// }
// ▲R-#39403_【H31-0380-001】長白仙参リニューアル（WEB） 2020/01/31 sai-shiragiku
// ▼モバイル対応 2009/03/17 kdl.ohyanagi add start
// サイト区分を取得する
// 1:PC
// 2:携帯
// $s_sitekbn = '0';
// if (isset($_POST['sitekbn']) && is_numeric($_POST['sitekbn'])) {
//     $s_sitekbn = $_POST['sitekbn'];
// }
// ▲モバイル対応 2009/02/17 kdl.ohyanagi add start


//▼2009/10/07 #xxx ネット注文自動化対応（kdl yoshii）
// サイト区分を取得する
// 1:PC
// 2:携帯
// $NET_IJ_KBN = '0';
// if (isset($_POST['NET_IJ_KBN']) && is_numeric($_POST['NET_IJ_KBN'])) {
//     $NET_IJ_KBN = $_POST['NET_IJ_KBN'];
// }
//▲2009/10/07 #xxx ネット注文自動化対応（kdl yoshii）
// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan

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
require_once ($DATA_PATH.'/'.$my_func.'/list.dat.php');

//------------------------------------------------------------
//ヘッダーをインクルード
//------------------------------------------------------------
require_once ($LIB_PATH.'/CYUtilsHeader.inc.php');
//------------------------------------------------------------
//テンプレートをインクルード
//------------------------------------------------------------
require_once ($TEMPLATE_PATH.'/'.$my_func.'/list.tpl.php');
//------------------------------------------------------------
//フッターをインクルード
//------------------------------------------------------------
require_once ($LIB_PATH.'/CYUtilsFooter.inc.php');
?>
