<?
$my_func = '2023';
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
// 本番サーバーでは、どうしてかセッション（クッキー？）を有効にすると、
// Acrobatがかなりの確率でエラーを出すため、以下2つ、includeをやめた
// 特に、困らないはず
// require_once $CONF_PATH."/SessionlogOff.inc.php";

//------------------------------------------------------------
//権限チェック
//------------------------------------------------------------
// require_once $CONF_PATH."/SaishunkanAuthority.inc.php";

//------------------------------------------------------------
//初期値設定
//------------------------------------------------------------
$order_data = array();

//------------------------------------------------------------
//パラメータ取得
//------------------------------------------------------------
$recv_order_id = $_REQUEST['recv_order_id'];


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
require_once ($DATA_PATH.'/'.$my_func.'/getPdf.dat.php');

//------------------------------------------------------------
//ヘッダーをインクルード
//------------------------------------------------------------
//require_once ($LIB_PATH.'/CYUtilsHeader.inc.php');
//------------------------------------------------------------
//テンプレートをインクルード
//------------------------------------------------------------
//require_once ($TEMPLATE_PATH.'/'.$my_func.'/pdfView.tpl.php');
//------------------------------------------------------------
//フッターをインクルード
//------------------------------------------------------------
//require_once ($LIB_PATH.'/CYUtilsFooter.inc.php');
?>