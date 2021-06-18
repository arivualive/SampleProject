<?
$my_func = '2016';
//------------------------------------------------------------
//CY共通モジュール読み込み
//------------------------------------------------------------
require_once "../../include/lib/CYUtilsConst.inc.php";
require_once $LIB_PATH."/CYUtilsCommon.inc.php";
require_once $LIB_PATH."/CYUtilsStart.inc.php";
require_once $LIB_PATH."/CYUtilsCrypt.inc.php";

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
$order_status	= $_REQUEST['order_status'];
if ($order_status == '')
	$order_status = array();

// ▼モバイル対応 2009/03/17 kdl.ohyanagi add start
// サイト区分を取得する
// 1:PC
// 2:携帯
$s_sitekbn = '0';
if (isset($_POST['sitekbn']) && is_numeric($_POST['sitekbn'])) {
    $s_sitekbn = $_POST['sitekbn'];
}
// ▲モバイル対応 2009/02/17 kdl.ohyanagi add start


//▼2009/10/07 #xxx ネット注文自動化対応（kdl yoshii）
// サイト区分を取得する
// 1:PC
// 2:携帯
$NET_IJ_KBN = '0';
if (isset($_POST['NET_IJ_KBN']) && is_numeric($_POST['NET_IJ_KBN'])) {
    $NET_IJ_KBN = $_POST['NET_IJ_KBN'];
}
//▲2009/10/07 #xxx ネット注文自動化対応（kdl yoshii）

// ▼R-#31664_【H29-00239-01】長白仙参即ログイン対応 2017/08/09 nul-inagaki
$qteiki_flg		= $_REQUEST['qteiki_flg'];
if ($qteiki_flg == '') $qteiki_flg = array();

$service_kbn		= $_REQUEST['service_kbn'];
if ($service_kbn == '') $service_kbn = array();

$kain_kbn	= $_REQUEST['kain_kbn'];
// ▲R-#31664_【H29-00239-01】長白仙参即ログイン対応 2017/08/09 nul-inagaki



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
