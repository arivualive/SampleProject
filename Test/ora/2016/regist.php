<?
$my_func = '2016';
//------------------------------------------------------------
//CY共通モジュール読み込み
//------------------------------------------------------------
require_once "../../include/lib/CYUtilsConst.inc.php";
require_once $LIB_PATH."/CYUtilsCommon.inc.php";
require_once $LIB_PATH."/CYUtilsStart.inc.php";

//------------------------------------------------------------
//ツール共通モジュール読み込み
//------------------------------------------------------------
require_once $CONF_PATH."/SaishunkanProperties.inc.php";
require_once $CONF_PATH."/SaishunkanUtils.inc.php";

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
$attribute_data = array();

//------------------------------------------------------------
//パラメータ取得
//------------------------------------------------------------
$mode = $_REQUEST['mode'];
$order_data['regular_order_id'] = $_REQUEST['regular_order_id'];

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
require_once ($DATA_PATH.'/'.$my_func.'/regist.dat.php');

//------------------------------------------------------------
//ヘッダーをインクルード
//------------------------------------------------------------

//------------------------------------------------------------
//テンプレートをインクルード
//------------------------------------------------------------

//------------------------------------------------------------
//フッターをインクルード
//------------------------------------------------------------
?>