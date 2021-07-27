asc = new Array(" ","!","\"","#","$","%","&","\'","(",")","*","+",",","-",".","/","0","1","2","3","4","5","6","7","8","9",":",";","<","=",">","?","@","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","[","\\","]","^","_","`","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","{","|","}","~","�","�","�","�","�","�","�","�");
zen = new Array("�@","�I","�h","��","��","��","��","�f","�i","�j","��","�{","�C","�|","�D","�^","�O","�P","�Q","�R","�S","�T","�U","�V","�W","�X","�F","�G","��","��","��","�H","��","�`","�a","�b","�c","�d","�e","�f","�g","�h","�i","�j","�k","�l","�m","�n","�o","�p","�q","�r","�s","�t","�u","�v","�w","�x","�y","�m","��","�n","�O","�Q","`","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","�o","�b","�p","�`","�B","�u","�v","�A","�E","�[","�J","�K");
hkk = new Array("��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�");
zkk  = new Array("�K","�M","�O","�Q","�S","�U","�W","�Y","�[","�]","�_","�a","�d","�f","�h","�o","�p","�r","�s","�u","�v","�x","�y","�{","�|","��","�@","�A","�B","�C","�D","�E","�F","�G","�H","�I","�J","�L","�N","�P","�R","�T","�V","�X","�Z","�\","�^","�`","�b","�c","�e","�g","�i","�j","�k","�l","�m","�n","�q","�t","�w","�z","�}","�~","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","�[");
zhk  = new Array("��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","���J","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","��","�[");
space = new Array(" ", "�@");

function err_position(){
	location.href = "#error_position";
}


/* ------------------------
  ���͒l�`�F�b�N
-------------------------- */
/*
 * ����ԍ����`�F�b�N
 * 
 * @param objKainID  ����ԍ��̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkKainNo(objKainNo) {

	var strKainNo = trim(objKainNo.value);
	objKainNo.value = strKainNo;
	$('#errKainno').hide();

	if (isNaN(strKainNo) || !num_chk(strKainNo) || strKainNo.length != 8) {
		$('#errKainno').show();
		location.hash="pos_kainno";
		return false;
	}
	return true;
}

/*
 * �����O���`�F�b�N
 * 
 * @param objNameKana  �����O(��/��)�̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @param nameflg  ��/���؂蕪���t���O
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkName(objNameKana,nameflg) {

	var strNameKana = trim(objNameKana.value);
	objNameKana.value = strNameKana;
	$('#errName').hide();

	//�����O
	if (strNameKana == "" || !hiraganaCheck(strNameKana)) {
		if (nameflg == 1) {
			errMsg = "�����O(��)��S�p�Ђ炪�Ȃ̕����ł����͂��������B";
		}else{
			errMsg = "�����O(��)��S�p�Ђ炪�Ȃ̕����ł����͂��������B";
		}
		$('#errName').html(errMsg).show();
		location.href="#pos_name";
		return false;
	}
	return true;
}

/*
 * �����O���`�F�b�N
 * 
 * @param objNameKana1  �����O(��)�̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @param objNameKana2  �����O(��)�̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkNameKana(objNameKana1,objNameKana2) {

	var strNameKana1 = trim(objNameKana1.value);
	var strNameKana2 = trim(objNameKana2.value);
	objNameKana1.value = strNameKana1;
	objNameKana2.value = strNameKana2;
	$('#errName').hide();

	//�����O
	if (strNameKana1 == "" || !hiraganakatakanaCheck(strNameKana1)) {
		errMsg = "�����O(��)��S�p�u�Ђ炪�ȁv�܂��͑S�p�u�J�^�J�i�v�̕����ł����͂��������B";
		$('#errName').html(errMsg).show();
		location.href="#pos_name";
		return false;
	}
	if (strNameKana2 == "" || !hiraganakatakanaCheck(strNameKana2)) {
		errMsg = "�����O(��)��S�p�u�Ђ炪�ȁv�܂��͑S�p�u�J�^�J�i�v�̕����ł����͂��������B";
		$('#errName').html(errMsg).show();
		location.href="#pos_name";
		return false;
	}

	var strNameKana = strNameKana1 + "�@" + strNameKana2;
	if (denbunFormat(strNameKana, 64, 6) == false) {
		errMsg = "�����O�͐������킹��30�����܂łł����͂��������B";
		$('#errName').html(errMsg).show();
		location.href="#pos_name";
		return false;
	}

	return true;
}

/*
 * �d�b�ԍ����`�F�b�N
 * 
 * @param objTelNo1 �s�O�ǔԂ̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @param objTelNo2 �s���ǔԂ̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @param objTelNo3 �d�b�ԍ��̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkTelNo(objTelNo1, objTelNo2, objTelNo3) {

	$('#errTel1').hide();
	$('#errTel').hide();

	// �s�O�ǔ�
	var strTelNo1 = trim(objTelNo1.value);
	objTelNo1.value = strTelNo1;
	if (isNaN(strTelNo1) || !num_chk(strTelNo1) || strTelNo1.length < 2 || strTelNo1.length > 5) {
		errMsg = "�s�O�ǔԂ�2���ȏ�̔��p��������͂��Ă��������B";
		$('#errTel').html(errMsg).show();
		location.href="#pos_tel";
		return false;
	}

	// �s���ǔ�
	var strTelNo2 = trim(objTelNo2.value);
	objTelNo2.value = strTelNo2;
	if (isNaN(strTelNo2) || !num_chk(strTelNo2) || strTelNo2.length < 1 || strTelNo2.length > 5) {
		errMsg = "�s���ǔԂ͔��p�����œ��͂��Ă��������B";
		$('#errTel').html(errMsg).show();
		location.href="#pos_tel";
		return false;
	}

	// �����Ҕԍ�
	var strTelNo3 = trim(objTelNo3.value);
	objTelNo3.value = strTelNo3;
	if (isNaN(strTelNo3) || !num_chk(strTelNo3) || strTelNo3.length != 4) {
		errMsg = "�d�b�ԍ���4���̔��p�����œ��͂��Ă��������B";
		$('#errTel').html(errMsg).show();
		location.href="#pos_tel";
		return false;
	}

	// ���d�b�ԍ��S�̂̃`�F�b�N
	var strTelNo = strTelNo1 + strTelNo2 + strTelNo3;
	var isKetai = strTelNo.match(/^050|^060|^070|^080|^090/);
	if (strTelNo.length < 10 || (!isKetai && strTelNo.length != 10) || (isKetai && strTelNo.length != 11)) {
		errMsg = "�s�O�ǔԁA�s���ǔԂ𐳂��������œ��͂��Ă��������B";
		$('#errTel').html(errMsg).show();
		location.href="#pos_tel";
		return false;
	}
	if (strTelNo.length > 11) {
		errMsg = "�s�O�ǔԁA�s���ǔԂ𐳂��������œ��͂��Ă��������B";
		$('#errTel').html(errMsg).show();
		location.href="#pos_tel";
		return false;
	}
	return true;
}

/*
 * ���[���A�h���X�̃`�F�b�N
 * 
 * @param objEmail  ���[���A�h���X�̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @param objEmail2 �m�F�p���[���A�h���X�̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkEmail(objEmail, objEmail2) {

	var strEmail  = trim(objEmail.value);
	var strEmail2 = trim(objEmail2.value);
	objEmail.value  = strEmail;
	objEmail2.value = strEmail2;
	$('#errMail1').hide();
	$('#errMail2').hide();
	$('#errMail3').hide();

	if(MailFormatCheck(strEmail) == false){
		$('#errMail1').show();
		location.hash="pos_mailaddress";
		return false;
	}
	else if(strEmail2 === ""){
		$('#errMail2').show();
		location.href="#pos_mailaddress";
		return false;
	}
	else if(strEmail!=strEmail2){
		$('#errMail3').show();
		location.href="#pos_mailaddress";
		return false;
	}
	else if(!strEmail.match("test@saishunkan.co.jp") && strEmail.match("@saishunkan")){
		$('#errMail1').show();
		location.hash="pos_mailaddress";
		return false;
	}

	if(strEmail.match(/\.exe/)){
		$('#errMail1').show();
		location.href="#pos_mailaddress";
		return false;
	}
	return true;
}

/*
 * �閧�̎�����`�F�b�N
 * 
 * @param objSQNo  �閧�̎���̃v���_�E���̃I�u�W�F�N�g
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkSQNo(objSQNo) {

	var strSQNo = trim(objSQNo.value);
	objSQNo.value = strSQNo;
	$('#errSecretQ').hide();

	if (isNaN(strSQNo) || !num_chk(strSQNo) || strSQNo.length > 2 || strSQNo <= 0 || strSQNo > 70) {
		objSQNo.value = "0";
		$('#errSecretQ').show();
		location.href="#pos_SecretQ";
		return false;
	}
	return true;
}

/*
 * �������̍����t���`�F�b�N
 * 
 * @param objSQNo  �������̍����t�̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkSQAnswer(objSQAnswer) {

	var strSQAnswer = trim(objSQAnswer.value);
	objSQAnswer.value = strSQAnswer;
	$('#errSecretA1').hide();
	$('#errSecretA').hide();

	if (strSQAnswer.length < 2 ) {
		errMsg = "�������̍����t�͑S�p2�����ȏ�ł��肢���܂��B";
		$('#errSecretA').html(errMsg).show();
		location.href="#pos_SecretA";
		return false;
	}
	if (strSQAnswer.length > 20 ) {
		errMsg = "�������̍����t�͑S�p20�����ȓ��ł��肢���܂��B";
		$('#errSecretA').html(errMsg).show();
		location.href="#pos_SecretA";
		return false;
	}

	if (!checkIsZenkaku(strSQAnswer)) {
		$('#errSecretA1').show();
		location.href="#pos_SecretA";
		return false;
	}

	return true;
}

/*
 * �K��̓��ӗL�����`�F�b�N
 * 
 * @param objAgree  �K��̓��ӃI�u�W�F�N�g
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkAgree(objAgree) {

	$('#errAgree').html('').hide();
	if( objAgree.checked==false ){
		msg = "�u���q�l���̎�舵���ɂ��āv��<br />���ǂ݂��������A�u���ӂ���v�Ƀ`�F�b�N�����Ă��������B";
		$('#errAgree').html(msg).show();
		location.href="#pos_agree";
		return false;
	}
	return true;
}

function checkIsZenkaku(value) {
	for (var i = 0; i < value.length; ++i) {
		var c = value.charCodeAt(i);
		if (c < 256 || (c >= 0xff61 && c <= 0xff9f)) {
			return false;
		}
	}
	return true;
}


function mb_LTrim(strArg) {

	var strRet = strArg;
	if(strRet != '') {
		while (strRet.substring(0,1) == " " || strRet.substring(0,1) == "�@") {
			strRet = strRet.substring(1, strRet.length);
		}
	}
	return strRet;
}


function mb_RTrim(strArg) {
	var strRet = strArg;
	var lLen = 0;
	
	if(strRet != '') {
		lLen = strArg.length;
		while (strRet.substring(lLen-1, lLen) == " " || strRet.substring(lLen-1, lLen) == "�@") {
			strRet = strRet.substring(0, strRet.length - 1);
			lLen--;
		}
	}
	return strRet;
}


function trim(strArg) {
	var strRet = strArg;

	strRet = mb_LTrim(strRet);
	strRet = mb_RTrim(strRet);

	return strRet;
}

function MailFormatCheck(chkStr) {

	// ��R-#3742
	var emailfilter=/^[\.\w-]+[\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,3}|\d+)$/i

	var returnval=emailfilter.test(chkStr);

	if(returnval==false){

		if(chkStr.length>1){
			if(chkStr.charAt(chkStr.length-1)=="."){
				var returnval=emailfilter.test(chkStr.substring(0,chkStr.length-1));
			}
		}
	}

	return returnval;
}

/*
 * ���p�����̃`�F�b�N
 * 
 * @param str ������
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function num_chk(str) {
	var result = str.match(/[0-9]*/);
	if (str != result) {
		return false;
	}
	return true;
}
