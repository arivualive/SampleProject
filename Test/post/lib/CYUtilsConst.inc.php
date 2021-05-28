<?php
/**
 * 【標準開発共通設定ファイル 】
 *
 * 注)一部mod_cy_coreの使用を前提にしているものがあります。
 *
 *
 * @package default
 * @version $Id: CYUtilsConst.inc.php,v 1.17 2007/11/24 10:06:28 kenji_maruyama Exp $
 *
 */
 
/*
 * TODO: コメントの見直し
 *
 */ 
/*
 * 必須設定項目
 */

error_reporting(E_ALL & ~E_NOTICE);
  
//テストサイト判定フラグの取得（本番環境、テスト環境が同一サーバにあるため、サーバネームで判断）
//再春館側テスト
// TODO:ローカル開発環境用に書き換え　リリース時は元に戻す 2021/05/21 jst-wada
// $TEST_SSK_SERVER_NAME   = '10.3.188.200';
// $TEST_SSK_SERVER_NAME2  = 'test-tool.saishunkan.local';
$TEST_SSK_SERVER_NAME   = '127.0.0.1';
$TEST_SSK_SERVER_NAME2  = 'localhost';
// TODO:ローカル開発環境用に書き換え　リリース時は元に戻す 2021/05/21 jst-wada

//再春館側ステージング
$STAGE_SSK_SERVER_NAME   = '10.3.188.100';
$STAGE_SSK_SERVER_NAME2  = 'stage-tool.saishunkan.local';

//再春館側本番
$HONBAN_SSK_SERVER_NAME  = '10.3.188.10';
$HONBAN_SSK_SERVER_NAME2 = 'tool.saishunkan.local';

//PCサイトURL
$TEST_SSK_WEB_NAME      = 'test.saishunkan.co.jp';
$STAGE_SSK_WEB_NAME     = 'stage.saishunkan.co.jp';
$HONBAN_SSK_WEB_NAME    = 'www.saishunkan.co.jp';

//携帯サイトURL
$TEST_SSK_MOB_NAME      = 'test.0120444444.com';
$STAGE_SSK_MOB_NAME     = 'stage.0120444444.com';
$HONBAN_SSK_MOB_NAME    = 'www.0120444444.com';



switch ($_SERVER['SERVER_NAME']) {
	case $TEST_SERVER_NAME :
		$SSK_DC_FLAG  = false;		//CY側
		$TEST_FLAG    = true;		//TEST
		$STAGE_FLAG    = false;		//STAGE
		break;
		
	case $HONBAN_SERVER_NAME :
		$SSK_DC_FLAG  = false;		//CY側
		$TEST_FLAG    = false;		//HONBAN
		$STAGE_FLAG   = false;		//STAGE
		break;
		
	case $TEST_SSK_SERVER_NAME :
	case $TEST_SSK_SERVER_NAME2 :
		$SSK_DC_FLAG  = true;		//SSKDC側
		$TEST_FLAG    = true;		//TEST
		$STAGE_FLAG   = false;		//STAGE
		break;
		
	case $STAGE_SSK_SERVER_NAME :
	case $STAGE_SSK_SERVER_NAME2 :
	    $SSK_DC_FLAG  = true;		//CY側
	    $TEST_FLAG    = false;		//TEST
	    $STAGE_FLAG   = true;		//STAGE
	    break;
		
	case $HONBAN_SSK_SERVER_NAME :
	case $HONBAN_SSK_SERVER_NAME2 :
		$SSK_DC_FLAG  = true;		//SSKDC側
		$TEST_FLAG    = false;		//HONBAN
		$STAGE_FLAG   = false;		//STAGE
		break;
		
	default :
		//現在TEST_SSK_SERVER_NAME(tool.test.0120444444.jp)が上手く取れずdefault利用
		$SSK_DC_FLAG  = true;		//CY側
		$TEST_FLAG    = true;		//TEST
		$STAGE_FLAG   = false;		//STAGE
		break;
}
//ルートディレクトリ
if($SSK_DC_FLAG === false) {

	if($TEST_FLAG === true || $STAGE_FLAG === true) {
		$ROOT_DIR = '/home/ssktool';
	} else {
	    $ROOT_DIR = '/home/ssktool';
	}
	
} else {

	if($TEST_FLAG === true || $STAGE_FLAG === true ) {
	    $ROOT_DIR = '/home/ssktool';
	} else {
		$ROOT_DIR = '/home/ssktool';
	}

}

//サイト区分
$SITE_KBN[1] = '1'; //PC
$SITE_KBN[2] = '2'; //携帯

//コンテンツ基本カラー設定
$BGCOLOR    = '#ffcc99';
$TXTCOLOR   = '#000000';

$LINKCOLOR  = '#fbbffb';
$ALINKCOLOR = '#ff0080';
$VLINKCOLOR = 'silver';
$HRCOLOR    = '#008200';

//サイト側基本カラー設定
$SITE_BGCOLOR = "#FFFFFF";
$SITE_TXTCOLOR = "#423024";
$SITE_LINKCOLOR = "#A7735D";
$SITE_ALINKCOLOR = "#FCEAD3";
$SITE_VLINKCOLOR = "#A7735D";
$SITE_HRCOLOR = "#948575";

//コンテンツの情報
$CONTENTS_CYID = 'SSK';
$CONTENTS_NAME = '再春館製薬所 WEB管理ツール';
$HEADER_TITLE  = $CONTENTS_NAME;
$COPYRIGHT_STR = '再春館製薬所 All Rights Reserved';

//ドメイン
$TEST_DOMAIN = $TEST_SERVER_NAME;
$STAGE_DOMAIN = $STAGE_SERVER_NAME;
$HONBAN_DOMAIN = $HONBAN_SERVER_NAME;
$TEST_SSK_DOMAIN = $TEST_SSK_SERVER_NAME2;
$STAGE_SSK_DOMAIN = $STAGE_SSK_SERVER_NAME2;
$HONBAN_SSK_DOMAIN = $HONBAN_SSK_SERVER_NAME2;

//--------------------------------------------------------
// Career Settings
//--------------------------------------------------------

 
$CARRIER_ID = $_SERVER['HTTP_X_CY_CARRIER'];
$PC_MODE    = false;

if ($CARRIER_ID === 'p') {
    $PC_MODE = true;
}

/*
 * コンテンツによっては設定する必要のある設定項目
 */

//SSL使用時URL
$SSL_URL_I = '';
$SSL_URL_E = '';
$SSL_URL_V = '';
$SSL_URL_W = '';

//PICTURE FITTER使用時ROOT_URL
$TEST_PFIT_ROOT_URL   = '';
$HONBAN_PFIT_ROOT_URL = '';

$TEST_PFIT_CONTENT_NAME   = '';
$HONBAN_PFIT_CONTENT_NAME = '';

/*
 * 基本的に変更する必要がない設定項目
 */

//NGワードのファイル名 $LIB_PATHの下のこのファイルが利用される
$NG_WORD_FILE = 'ng_words.csv';

/*
 * 以下は以上の設定項目・mod_cy_coreでの判定
 * から導出されるもの
 * もしくは固定のもの
 */

$USER_AGENT_DEF = $_SERVER['HTTP_USER_AGENT'];
 
//--------------------------------------------------------
// Contents Settings
//--------------------------------------------------------

if ($CY_TEST_FLAG === true) {
    $CONTENTS_ID = $TEST_CONTENTS_ID;
} else {
    $CONTENTS_ID = $HONBAN_CONTENTS_ID;
}

//--------------------------------------------------------
// URL Settings
//--------------------------------------------------------

if($SSK_DC_FLAG === false) {

	if($TEST_FLAG === true) {
		$DOMAIN = $TEST_DOMAIN;
		$WEB = $HONBAN_WEB_NAME;
	} else if($STAGE_FLAG === true) {
	    $DOMAIN = $STAGE_DOMAIN;
	    $WEB = $HONBAN_WEB_NAME;
	} else {
	    $DOMAIN = $HONBAN_DOMAIN;
		$WEB = $HONBAN_WEB_NAME;
	}
	
} else {

	if($TEST_FLAG === true ) {
	  $DOMAIN = $TEST_SSK_DOMAIN;
		$WEB = $TEST_SSK_WEB_NAME;
		$MOB = $TEST_SSK_MOB_NAME;
	} else if($STAGE_FLAG === true) {
	    $DOMAIN = $STAGE_SSK_DOMAIN;
	    $WEB = $STAGE_SSK_WEB_NAME;
	    $MOB = $STAGE_SSK_MOB_NAME;
	} else {
		$DOMAIN = $HONBAN_SSK_DOMAIN;
		$WEB = $HONBAN_SSK_WEB_NAME;
		$MOB = $HONBAN_SSK_MOB_NAME;
	}

}
/*
if ($TEST_FLAG === true) {
	$STAGE_SSK_WEB_NAME = $WEB;
}
*/

//ROOTURL
$ROOT_URL = 'http://'.$DOMAIN;
$ROOT_URL_WEB = 'http://'.$WEB;
$ROOT_SSL_URL_WEB = 'https://'.$WEB;
$ROOT_URL_MOB = 'http://'.$MOB;
$ROOT_SSL_URL_MOB = 'https://'.$MOB;

//スタイルシートベースURL
$CSS_PATH = $ROOT_URL."/css";

//JavaScriptベースURL
$JS_PATH = $ROOT_URL."/js";

//PictureFitter
if ($CY_TEST_FLAG == true) {
    $PFIT_ROOT_URL = $TEST_PFIT_ROOT_URL.'/'.$TEST_PFIT_CONTENT_NAME;
} else {
    $PFIT_ROOT_URL = $HONBAN_PFIT_ROOT_URL.'/'.$HONBAN_PFIT_CONTENT_NAME;
}

//--------------------------------------------------------
// Directory and File Settings
//--------------------------------------------------------

$ROOT_PATH          = $ROOT_DIR.'/htdocs';
$INC_PATH           = $ROOT_DIR.'/include';
$LOG_PATH           = $ROOT_DIR.'/logs';
$DATA_PATH          = $INC_PATH.'/datafile';
$CONF_PATH          = $INC_PATH.'/conf';
$DEV_PATH           = $INC_PATH.'/device';
$LIB_PATH           = $INC_PATH.'/lib';
$OBJ_ROOT_PATH      = $ROOT_DIR.'/obj';
$TEMPLATE_PATH 		= $INC_PATH.'/template/pc';
$IMAGE_PATH			= $ROOT_PATH.'/img';
$FTP_IMG_PATH	    = '/home/ssk/htdocs/img';

$HEADER_FILE = $LIB_PATH.'/CYUtilsHeader.inc.php';
$FOOTER_FILE = $LIB_PATH.'/CYUtilsFooter.inc.php';

$BIN_PATH = $ROOT_DIR.'/bin';

//--------------------------------------------------------
// FTP Settings
//--------------------------------------------------------

if($SSK_DC_FLAG === false) {

	if($TEST_FLAG === true || $STAGE_FLAG === true) {
		$FTP_SERVER     = '10.128.70.17';
		$FTP_USER_NAME  = 'ssk';
		$FTP_USER_PASS  = 'saishunkan';
		$FTP_SRC_PATH	= $IMAGE_PATH;
		$FTP_DST_PATH	= $FTP_IMG_PATH.'/pft_test';
	} else {
		$FTP_SERVER     = '10.128.70.17';
		$FTP_USER_NAME  = 'ssk';
		$FTP_USER_PASS  = 'saishunkan';
		$FTP_SRC_PATH	= $IMAGE_PATH;
		$FTP_DST_PATH	= $FTP_IMG_PATH.'/pft';
	}
	
} else {

	if($TEST_FLAG === true || $STAGE_FLAG === true ) {
	    $FTP_SERVER     = '61.119.92.77';
		$FTP_USER_NAME  = 'ssk';
		$FTP_USER_PASS  = 'saishunkan';
		$FTP_SRC_PATH	= $IMAGE_PATH;
		$FTP_DST_PATH	= $FTP_IMG_PATH.'/pft_test';
	} else {
		$FTP_SERVER     = '61.119.92.77';
		$FTP_USER_NAME  = 'ssk';
		$FTP_USER_PASS  = 'saishunkan';
		$FTP_SRC_PATH	= $IMAGE_PATH;
		$FTP_DST_PATH	= $FTP_IMG_PATH.'/pft';
	}

}

//--------------------------------------------------------
if ($CARRIER_ID === 'i') {

} elseif ($CARRIER_ID === 'e') {

    srand((double)microtime()*1000000);
    $ez_param = rand(100, 999);

} elseif ($CARRIER_ID === 'v') {

    $v3gc_param = 1;

    // ラボ端末用テストサイトTOPURL
    $LAB_SITE_TOP_URL_TEST = 'http://'.$TEST_DOMAIN_V.'/top.php';
    // ラボ端末用本番サイトTOPURL
    $LAB_SITE_TOP_URL_HONBAN = 'http://'.$HONBAN_DOMAIN_V.'/top.php';

} elseif ($CARRIER_ID === 'w') {
    
    srand((double)microtime()*1000000);
    $ez_param = rand(100, 999);

    // ラボ端末用テストサイトTOPURL
    $LAB_SITE_TOP_URL_TEST = 'http://'.$TEST_DOMAIN_W.'/top.php';
    // ラボ端末用本番サイトTOPURL
    $LAB_SITE_TOP_URL_HONBAN = 'http://'.$HONBAN_DOMAIN_W.'/top.php';

}

$MIME_TYPE = array(
'2bp'   => 'image/x-MS-bmp',
'als'   => 'audio/X-Alpha5',
'amc'   => 'application/x-mpeg',
'afd'   => 'application/x-avatar',
'asf'   => 'video/x-ms-asf',
'bmp'   => 'image/x-MS-bmp',
'gif'   => 'image/gif',
'htm'   => 'text/html',
'html'  => 'text/html',
'ifm'   => 'image/gif',
'jad'   => '',
'jam'   => 'application/x-jam',
'jpg'   => 'image/jpeg',
'jpz'   => 'image/jpeg',
'jpeg'  => 'image/jpeg',
'jpe'   => 'image/jpeg',
'mid'   => 'audio/midi',
'mld'   => 'application/x-mld',
'mmf'   => 'application/x-smaf',
'pmd'   => 'application/x-pmd',
'png'   => 'image/png',
'pnz'   => 'image/png',
'qcp'   => 'audio/vnd.qcelp',
'sht'   => 'text/html',
'shtml' => 'text/html',
'smd'   => 'audio/x-smd',
'smz'   => 'audio/x-smd',
'swf'   => 'application/x-shockwave-flash',
'txt'   => 'text/plain',
'wav'   => 'audio/x-wav',
'3gp'   => 'video/3gpp',
'mp4'   => 'video/x-vmp4',
'3g2'   => 'video/3gpp2'
);

// ▼R-#3743 スマートフォン対応 2012/06/29 uls-motoi
// 携帯メールアドレス設定(ドメインチェックのため)
$NG_MAILADDRESS = array(
    'jp-t.ne.jp',
    'jp-d.ne.jp',
    'jp-h.ne.jp',
    'jp-r.ne.jp',
    'jp-n.ne.jp',
    'jp-s.ne.jp',
    'jp-q.ne.jp',
    'jp-c.ne.jp',
    'jp-k.ne.jp',
    'softbank.ne.jp',
    'd.vodafone.ne.jp',
    'h.vodafone.ne.jp',
    't.vodafone.ne.jp',
    'c.vodafone.ne.jp',
    'k.vodafone.ne.jp',
    'r.vodafone.ne.jp',
    'n.vodafone.ne.jp',
    's.vodafone.ne.jp',
    'q.vodafone.ne.jp',
    'ezweb.ne.jp',
    'ido.ne.jp',
    'sky.tkk.ne.jp',
    'sky.tu-ka.ne.jp',
    'sky.tck.ne.jp',
    'docomo.ne.jp',
    'em.nttpnet.ne.jp',
    'phone.ne.jp',
    'mozio.ne.jp',
    'pdx.ne.jp',
    'pipopa.ne.jp',
    'softbank.ne.jp',
    'mopera.net',
    'disney.ne.jp'
);
// ▲R-#3743 スマートフォン対応 2012/06/29 uls-motoi


/**
 * PCユーザのIPアドレスを取得する
 *
 * TODO: CYUtilsCommon.inc.php の getPcUserIp() と同一.
 * CYUtilsCommon.inc.php から getPcUserIp() を
 * 分離するのがよさそう
 * TODO: 取得できなかった場合の返り値を考慮する.
 * 
 * @access private
 * 
 * @return string IPアドレスの文字列
 *   取得できなかった場合は文字列'unknown'
 */
function getPcUserIpCon()
{
    $unknown = 'unknown';
    if (isset($_SERVER)) {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }
        return $unknown;
        
    } else {
        if (getenv('HTTP_X_FORWARDED_FOR') !== false
                && getenv('HTTP_X_FORWARDED_FOR') !== '') {
            return getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_CLIENT_IP') !== false 
                && getenv('HTTP_CLIENT_IP') !== '') {
            return getenv('HTTP_CLIENT_IP');
        } elseif (getenv('REMOTE_ADDR') !== false 
                && getenv('REMOTE_ADDR') !== '') {
            return getenv('REMOTE_ADDR');
        }
        return $unknown;
    }
}



/**
 * FTPを行う
 *
 * $FTP_SERVER, $FTP_USER_NAME, $FTP_USER_PASS の定義が必要
 * 
 * 引数　：	$dst_file :転送先のファイル（フルパス）
 * 			$src_file  :転送元のファイル（フルパス）
 * 
 * @return ture:正常、false:失敗
 */

function ssk_ftp($dst_file, $src_file) {

	global $FTP_SERVER, $FTP_USER_NAME, $FTP_USER_PASS;

	// 接続を確立する
	$conn_id = ftp_connect($FTP_SERVER);

	// ユーザ名とパスワードでログインする
	$login_result = ftp_login($conn_id, $FTP_USER_NAME, $FTP_USER_PASS);

	// 接続できたか確認する
	if ((!$conn_id) || (!$login_result)) {
			$ret = false;
	} else {

		// ファイルをアップロードする
		$up_result = ftp_put($conn_id, $dst_file, $src_file, FTP_BINARY);

		// アップロード状況を確認する
		if (!$up_result) {
			$ret = false;
		} else {
			$ret = true;
		}

		// FTP ストリームを閉じる
		ftp_close($conn_id);

	}

	return $ret;

}


/**
 * FTPにて削除を行う
 *
 * $FTP_SERVER, $FTP_USER_NAME, $FTP_USER_PASS の定義が必要
 * 
 * 引数　：	$dst_file :削除するファイル（フルパス）
 * 
 * @return ture:正常、false:失敗
 */

function ssk_ftp_del($dst_file) {

	global $FTP_SERVER, $FTP_USER_NAME, $FTP_USER_PASS;

	// 接続を確立する
	$conn_id = ftp_connect($FTP_SERVER);

	// ユーザ名とパスワードでログインする
	$login_result = ftp_login($conn_id, $FTP_USER_NAME, $FTP_USER_PASS);

	// 接続できたか確認する
	if ((!$conn_id) || (!$login_result)) {
			$ret = false;
	} else {

		// ファイルを削除する
		$del_result = ftp_delete($conn_id, $dst_file);

		// アップロード状況を確認する
		if (!$del_result) {
			$ret = false;
		} else {
			$ret = true;
		}

		// FTP ストリームを閉じる
		ftp_close($conn_id);

	}

	return $ret;

}

?>
