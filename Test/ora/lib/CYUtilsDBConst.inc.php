<?php
/**
 *
 * 【データベース設定ファイル 】
 *
 * @package default
 * @version $Id: CYUtilsDBConst.inc.php,v 1.16 2007/11/21 10:16:55 tatsuya_odakura Exp $
 */

//テストサイト判定フラグの取得（本番環境、テスト環境が同一サーバにあるため、サーバネームで判断）
//CY側
/* CYUtilsConst.inc.phpで定義済み
$TEST_SERVER_NAME = 'tool.t.ssk.cybird.ne.jp';
$HONBAN_SERVER_NAME = 'tool.ssk.cybird.ne.jp';
//再春館側
$TEST_SSK_SERVER_NAME = 'tool.test.0120444444.jp'; //tool.test.0120444444.jp
$HONBAN_SSK_SERVER_NAME = '210.130.238.153'; //tool.0120444444.jp
*/

/*
switch ($_SERVER['SERVER_NAME']) {
	case $TEST_SERVER_NAME :
		$SSK_DC_FLAG  = false;		//CY側
		$TEST_FLAG    = true;		//TEST
		break;
	case $HONBAN_SERVER_NAME :
		$SSK_DC_FLAG  = false;		//CY側
		$TEST_FLAG    = false;		//HONBAN
		break;
	case $TEST_SSK_SERVER_NAME :
		$SSK_DC_FLAG  = true;		//SSKDC側
		$TEST_FLAG    = true;		//TEST
		break;
	case $HONBAN_SSK_SERVER_NAME :
	case $HONBAN_SSK_SERVER_NAME2 :
	case $HONBAN_SSK_SERVER_NAME3 :
		$SSK_DC_FLAG  = true;		//SSKDC側
		$TEST_FLAG    = false;		//HONBAN
		break;
	default :
		$SSK_DC_FLAG  = true;		//CY側
		$TEST_FLAG    = true;		//TEST
		break;
}
*/

//--------------------------------------------------------
// DB Settings
//--------------------------------------------------------
$DB_DEBUG_TRACE = true;

$DB_KIND = 1;        //1:Oracle  2:Sybase
//$DB_USER_V、$DB_PASS_VはVIEW専用ユーザ 20071005 ikeda
if($SSK_DC_FLAG === false) {

	if($TEST_FLAG === true || $STAGE_FLAG === true) {
		$TARGET_DB = 'CYテストDB';
		$DB_HOST   = '';
		$DB_USER   = 'ssktestuser';
		$DB_PASS   = 'ssktestpassword';
		$DB_USER_V = 'ssktestuser';//View用
		$DB_PASS_V = 'ssktestpassword';//View用
		$DB_NAME   = 'SSKTESTDB';
		$DB_NAME_V = 'SSKTESTDB';//View用
		
	} else {
		$TARGET_DB = 'CY本番DB';
		$DB_HOST   = '';
		$DB_USER   = 'ssktestuser';
		$DB_PASS   = 'ssktestpassword';
		$DB_USER_V = 'ssktestuser';//View用
		$DB_PASS_V = 'ssktestpassword';//View用
		$DB_NAME   = 'SSKTESTDB';
		$DB_NAME_V = 'SSKTESTDB';//View用
	}
	
} else {

	if($TEST_FLAG === true ) {
			$TARGET_DB = 'テストDB(現行版)';
			$DB_HOST   = 'development-oracle.csgi1mav6oeg.ap-northeast-1.rds.amazonaws.com';
			$DB_USER   = 'SSKADMINUSER';
			$DB_PASS   = 'sisnknpass';
			$DB_USER_V = 'SSKADMINUSER';//View用
			$DB_PASS_V = 'sisnknpass';//View用
			$DB_NAME   = 'mydb';
			$DB_NAME_V = 'mydb';//View用
	} elseif($STAGE_FLAG === true ) {
			$TARGET_DB = 'ステージングDB';
			$DB_HOST   = '';
			$DB_USER   = 'ssktooluser';
			$DB_PASS   = 'sisnknpass';
			$DB_USER_V = 'ssktooluser';//View用
			$DB_PASS_V = 'sisnknpass';//View用
			$DB_NAME   = 'ec-stage-rds.cbpubun7y8ty.ap-northeast-1.rds.amazonaws.com:1521/ECSTAGE';
			$DB_NAME_V = 'ec-stage-rds.cbpubun7y8ty.ap-northeast-1.rds.amazonaws.com:1521/ECSTAGE';
	} else {
			$TARGET_DB = '本番DB';
			$DB_HOST   = '';
			$DB_USER   = 'ssktooluser';
			$DB_PASS   = 'sisnknpass';
			$DB_USER_V = 'ssktooluser';//View用
			$DB_PASS_V = 'sisnknpass';//View用
			$DB_NAME   = 'ec-product-rds.cbpubun7y8ty.ap-northeast-1.rds.amazonaws.com:1521/ECPRD';
			$DB_NAME_V = 'ec-product-rds.cbpubun7y8ty.ap-northeast-1.rds.amazonaws.com:1521/ECPRD';
	}
}

?>
