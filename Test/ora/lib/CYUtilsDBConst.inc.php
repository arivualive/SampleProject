<?php
/**
 *
 * �y�f�[�^�x�[�X�ݒ�t�@�C�� �z
 *
 * @package default
 * @version $Id: CYUtilsDBConst.inc.php,v 1.16 2007/11/21 10:16:55 tatsuya_odakura Exp $
 */

//�e�X�g�T�C�g����t���O�̎擾�i�{�Ԋ��A�e�X�g��������T�[�o�ɂ��邽�߁A�T�[�o�l�[���Ŕ��f�j
//CY��
/* CYUtilsConst.inc.php�Œ�`�ς�
$TEST_SERVER_NAME = 'tool.t.ssk.cybird.ne.jp';
$HONBAN_SERVER_NAME = 'tool.ssk.cybird.ne.jp';
//�ďt�ّ�
$TEST_SSK_SERVER_NAME = 'tool.test.0120444444.jp'; //tool.test.0120444444.jp
$HONBAN_SSK_SERVER_NAME = '210.130.238.153'; //tool.0120444444.jp
*/

/*
switch ($_SERVER['SERVER_NAME']) {
	case $TEST_SERVER_NAME :
		$SSK_DC_FLAG  = false;		//CY��
		$TEST_FLAG    = true;		//TEST
		break;
	case $HONBAN_SERVER_NAME :
		$SSK_DC_FLAG  = false;		//CY��
		$TEST_FLAG    = false;		//HONBAN
		break;
	case $TEST_SSK_SERVER_NAME :
		$SSK_DC_FLAG  = true;		//SSKDC��
		$TEST_FLAG    = true;		//TEST
		break;
	case $HONBAN_SSK_SERVER_NAME :
	case $HONBAN_SSK_SERVER_NAME2 :
	case $HONBAN_SSK_SERVER_NAME3 :
		$SSK_DC_FLAG  = true;		//SSKDC��
		$TEST_FLAG    = false;		//HONBAN
		break;
	default :
		$SSK_DC_FLAG  = true;		//CY��
		$TEST_FLAG    = true;		//TEST
		break;
}
*/

//--------------------------------------------------------
// DB Settings
//--------------------------------------------------------
$DB_DEBUG_TRACE = true;

$DB_KIND = 1;        //1:Oracle  2:Sybase
//$DB_USER_V�A$DB_PASS_V��VIEW��p���[�U 20071005 ikeda
if($SSK_DC_FLAG === false) {

	if($TEST_FLAG === true || $STAGE_FLAG === true) {
		$TARGET_DB = 'CY�e�X�gDB';
		$DB_HOST   = '';
		$DB_USER   = 'ssktestuser';
		$DB_PASS   = 'ssktestpassword';
		$DB_USER_V = 'ssktestuser';//View�p
		$DB_PASS_V = 'ssktestpassword';//View�p
		$DB_NAME   = 'SSKTESTDB';
		$DB_NAME_V = 'SSKTESTDB';//View�p
		
	} else {
		$TARGET_DB = 'CY�{��DB';
		$DB_HOST   = '';
		$DB_USER   = 'ssktestuser';
		$DB_PASS   = 'ssktestpassword';
		$DB_USER_V = 'ssktestuser';//View�p
		$DB_PASS_V = 'ssktestpassword';//View�p
		$DB_NAME   = 'SSKTESTDB';
		$DB_NAME_V = 'SSKTESTDB';//View�p
	}
	
} else {

	if($TEST_FLAG === true ) {
			$TARGET_DB = '�e�X�gDB(���s��)';
			$DB_HOST   = 'development-oracle.csgi1mav6oeg.ap-northeast-1.rds.amazonaws.com';
			$DB_USER   = 'SSKADMINUSER';
			$DB_PASS   = 'sisnknpass';
			$DB_USER_V = 'SSKADMINUSER';//View�p
			$DB_PASS_V = 'sisnknpass';//View�p
			$DB_NAME   = 'mydb';
			$DB_NAME_V = 'mydb';//View�p
	} elseif($STAGE_FLAG === true ) {
			$TARGET_DB = '�X�e�[�W���ODB';
			$DB_HOST   = '';
			$DB_USER   = 'ssktooluser';
			$DB_PASS   = 'sisnknpass';
			$DB_USER_V = 'ssktooluser';//View�p
			$DB_PASS_V = 'sisnknpass';//View�p
			$DB_NAME   = 'ec-stage-rds.cbpubun7y8ty.ap-northeast-1.rds.amazonaws.com:1521/ECSTAGE';
			$DB_NAME_V = 'ec-stage-rds.cbpubun7y8ty.ap-northeast-1.rds.amazonaws.com:1521/ECSTAGE';
	} else {
			$TARGET_DB = '�{��DB';
			$DB_HOST   = '';
			$DB_USER   = 'ssktooluser';
			$DB_PASS   = 'sisnknpass';
			$DB_USER_V = 'ssktooluser';//View�p
			$DB_PASS_V = 'sisnknpass';//View�p
			$DB_NAME   = 'ec-product-rds.cbpubun7y8ty.ap-northeast-1.rds.amazonaws.com:1521/ECPRD';
			$DB_NAME_V = 'ec-product-rds.cbpubun7y8ty.ap-northeast-1.rds.amazonaws.com:1521/ECPRD';
	}
}

?>
