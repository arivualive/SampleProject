/*
 * ����ԍ����`�F�b�N
 * 
 * @param objKainID  ����ԍ��̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkKainNo(objKainNo) {

	var strKainNo = trim(objKainNo.value);
	objKainNo.value = strKainNo;

	if (isNaN(strKainNo) || !num_chk(strKainNo) || strKainNo.length != 8) {
		alert('���q�l�ԍ���8���̔��p�����œ��͂��Ă��������B'); 
		objKainNo.focus();
		return false
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

	// �s�O�ǔ�
	var strTelNo1 = trim(objTelNo1.value);
	objTelNo1.value = strTelNo1;

	if (isNaN(strTelNo1) || !num_chk(strTelNo1) || strTelNo1.length < 2 || strTelNo1.length > 5) {
		alert('�s�O�ǔԂ�2���ȏ�̔��p��������͂��Ă��������B'); 
		objTelNo1.focus();
		return false
	}

	// �s���ǔ�
	var strTelNo2 = trim(objTelNo2.value);
	objTelNo2.value = strTelNo2;

	if (isNaN(strTelNo2) || !num_chk(strTelNo2) || strTelNo2.length < 1 || strTelNo2.length > 5) {
		alert('�s���ǔԂ͔��p�����œ��͂��Ă��������B'); 
		objTelNo2.focus();
		return false
	}

	// �d�b�ԍ�
	var strTelNo3 = trim(objTelNo3.value);
	objTelNo3.value = strTelNo3;

	if (isNaN(strTelNo3) || !num_chk(strTelNo3) || strTelNo3.length != 4) {
		alert('�d�b�ԍ���4���̔��p�����œ��͂��Ă��������B'); 
		objTelNo3.focus();
		return false
	}

	// ���d�b�ԍ��S�̂̃`�F�b�N
	var strTelNo = strTelNo1 + strTelNo2 + strTelNo3;
	var isKetai = strTelNo.match(/^050|^060|^070|^080|^090/);

	if (strTelNo.length < 10 || (!isKetai && strTelNo.length != 10) || (isKetai && strTelNo.length != 11)) {
		alert('�s�O�ǔԁA�s���ǔԂ𐳂��������œ��͂��Ă��������B'); 
		objTelNo1.focus();
		return false
	}

	if (strTelNo.length > 11) {
		alert('�s�O�ǔԁA�s���ǔԂ𐳂��������œ��͂��Ă��������B'); 
		objTelNo1.focus();
		return false
	}

	return true;
}

/*
 * �l�b�g���ID�ƃp�X���[�h���`�F�b�N
 * 
 * @param objKainID  �l�b�g���ID�̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @param objKainPW  �p�X���[�h�̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @param objKainPW2 �m�F�p�p�X���[�h�̃e�L�X�g�{�b�N�X�̃I�u�W�F�N�g
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkIdPass(objKainID, objKainPW, objKainPW2) {

	var strKainID = trim(objKainID.value);
	objKainID.value = strKainID;

	if (strKainID.length < 6 || strKainID.length > 12) {
		alert('�l�b�g���ID��8�`12�����ł����߂��������B'); 
		objKainID.focus();
		return false;
	}
	if (!eisu_chk(strKainID)) {
		alert('�l�b�g���ID�͔��p�p�����œ��͂��Ă��������B'); 
		objKainID.focus();
		return false;
	}
	if (!dup_char_chk(strKainID)) {
		alert('�l�b�g���ID�ɓ��������̌J��Ԃ��͂��g�����������܂���B'); 
		objKainID.focus();
		return false;
	}
	if (!eisu_mix_chk(strKainID)) {
		alert('�l�b�g���ID�̓A���t�@�x�b�g�Ɛ����̑g�ݍ��킹�Őݒ肵�Ă��������B'); 
		objKainID.focus();
		return false;
	}

	var strKainPW  = trim(objKainPW.value);
	var strKainPW2 = trim(objKainPW2.value);
	objKainPW.value  = strKainPW;
	objKainPW2.value = strKainPW2;

	if (strKainPW.length < 6 || strKainPW.length > 12) {
		alert('�p�X���[�h��8�`12�����ł����߂��������B'); 
		objKainPW.focus();
		objKainPW.value = '';
		objKainPW2.value = '';
		return false;
	}
	if (!eisu_chk(strKainPW)) {
		alert('�p�X���[�h�͔��p�p�����œ��͂��Ă��������B'); 
		objKainPW.focus();
		objKainPW.value = '';
		objKainPW2.value = '';
		return false;
	}
	if (strKainPW == strKainID) {
		alert('�l�b�g���ID�ƃp�X���[�h�͕ʂ̂��̂��w�肵�Ă��������B'); 
		objKainPW.focus();
		objKainPW.value = '';
		objKainPW2.value = '';
		return false;
	}
	if (!dup_char_chk(strKainPW)) {
		alert('�p�X���[�h�ɓ��������̌J��Ԃ��͂��g�����������܂���B'); 
		objKainPW.focus();
		objKainPW.value = '';
		objKainPW2.value = '';
		return false;
	}
	if (!eisu_mix_chk(strKainPW)) {
		alert('�p�X���[�h�̓A���t�@�x�b�g�Ɛ����̑g�ݍ��킹�Őݒ肵�Ă��������B'); 
		objKainPW.focus();
		objKainPW.value = '';
		objKainPW2.value = '';
		return false;
	}
	if (strKainPW2 == "") {
		alert('�m�F�p�p�X���[�h�������͂ł��B'); 
		objKainPW2.focus();
		return false;
	}
	if (strKainPW != strKainPW2) {
		alert('�p�X���[�h�Ɗm�F�p�p�X���[�h���قȂ�܂��B'); 
		objKainPW.focus();
		objKainPW2.value = '';
		return false;
	}
  var tmp_id   = new Array();
  var tmp_pass = new Array();
  var i, j;
  var match = 0;

  for(i=0; i<strKainID.length; i++){
      tmp_id[i] = strKainID.substr(i, 1);
  }
  for(i=0; i<strKainPW.length; i++){
      tmp_pass[i] = strKainPW.substr(i, 1);
  }
  for(i=0; i<tmp_id.length; i++){
      for(j=0; j<tmp_pass.length; j++){
          if(tmp_id[i] == tmp_pass[j]){
              match++;
              break;
          }
      }
  }
  if(match/strKainID.length >= 0.9){
      alert('�E�p�X���[�h�ɁA�l�b�g���ID�Ɋ܂܂�镶���������g���Ă��܂��B�Z�L�����e�B�ׁ̈A�Ⴄ������������p�������B');
      objKainPW.focus();
      objKainPW.value = '';
      objKainPW2.value = '';
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

	if (!checkEmailFormat(strEmail) || strEmail.length < 6 || strEmail.length > 100) {
		alert('���[���A�h���X�𐳂������͂��Ă��������B'); 
		objEmail.focus();
		objEmail2.value = '';
		return false;
	}
	if (strEmail2 == "") {
		alert('�m�F�p���[���A�h���X�������͂ł��B'); 
		objEmail2.focus();
		return false;
	}
	if (strEmail != strEmail2) {
		alert('���[���A�h���X�Ɗm�F�p���[���A�h���X���قȂ�܂��B'); 
		objEmail.focus();
		objEmail2.value = '';
		return false;
	}

	return true;
}

/*
 * ���[���A�h���X�̃t�H�[�}�b�g�`�F�b�N
 * 
 * @param chkStr ���[���A�h���X�̕�����
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkEmailFormat(chkStr) {

	var emailfilter=/^[\.\w-]+[\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,6}|\d+)$/i

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
 * �閧�̎�����`�F�b�N
 * 
 * @param objSQNo  �閧�̎���̃v���_�E���̃I�u�W�F�N�g
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkSQNo(objSQNo) {

	var strSQNo = trim(objSQNo.value);
	objSQNo.value = strSQNo;

	if (isNaN(strSQNo) || !num_chk(strSQNo) || strSQNo.length > 2 || strSQNo <= 0 || strSQNo > 70) {
		alert('�閧�̎����I�����Ă��������B'); 
		objSQNo.focus();
		return false
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

	if (strSQAnswer.length < 2 ) {
		alert('�������̍����t�͑S�p2�����ȏ�ł��肢���܂��B');
		objSQAnswer.focus();
		return false;
	}
	if (strSQAnswer.length > 20 ) {
		alert('�������̍����t�͑S�p20�����ȓ��ł��肢���܂��B');
		objSQAnswer.focus();
		return false;
	}

	if (!checkIsZenkaku(strSQAnswer)) {
		alert('�������̍����t�͑S�p�œ��͂����肢���܂��B');
		objSQAnswer.focus();
		return false;
	}

	return true;
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

/*
 * ���p�p���̃`�F�b�N
 * 
 * @param str ������
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function eiji_chk(str) {
	var result = str.match(/[a-z]*/i);
	if (str != result) {
		return false;
	}
	return true;
}

/*
 * ���p�p�����̃`�F�b�N
 * 
 * @param str ������
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function eisu_chk(str) {
	var result = str.match(/[0-9a-z]*/i);
	if (str != result) {
		return false;
	}
	return true;
}


/*
 * ���p�p���������݂��Ă��邩�`�F�b�N
 * 
 * @param str ������
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function eisu_mix_chk(str) {
	var ret_num = str.match(/[0-9]/);
	var ret_alp = str.match(/[a-z]/i);
	if (!ret_num || !ret_alp) {
		return false;
	}
	return true;
}


/*
 * ���������̌J��Ԃ��`�F�b�N
 * 
 * @param v ������
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function dup_char_chk(v) {
	var strChk = null;
	var flg    = 0;
	for ( i = 0; i < v.length; i++ ) {
		if ( strChk == v.charAt(i) ) {
			flg++;
		} else {
			strChk = v.charAt(i);
		}
	}
	if ( flg == (v.length - 1) ) {
		return false;
	} else {
		return true;
	}
}

/*
 * ������̉E���̋�(�S�p�A���p)���폜
 * 
 * @param strTemp ������
 * @return �E���̋󔒂��폜����������
 */
function RTrim(strTemp) {
	var nLoop = 0;
	var strReturn = strTemp;
	while (nLoop < strTemp.length) {
		if ((strReturn.substring(strReturn.length - 1, strReturn.length) == " ") || 
			(strReturn.substring(strReturn.length - 1, strReturn.length) == "�@")) {
			strReturn = strTemp.substring(0, strTemp.length - (nLoop + 1));
		}
		else
		{
			break;
		}
		nLoop++;
	}
	return strReturn;
}

/*
 * ������̍����̋�(�S�p�A���p)���폜
 * 
 * @param strTemp ������
 * @return �����̋󔒂��폜����������
 */
function LTrim(strTemp) {
	var nLoop = 0;
	var strReturn = strTemp;
	while (nLoop < strTemp.length) {
		if ((strReturn.substring(0, 1) == " ") || (strReturn.substring(0, 1) == "�@")) {
			strReturn = strTemp.substring(nLoop + 1, strTemp.length);
		}
		else
		{
			break;
		}
		nLoop++;
	}
	return strReturn;
}

/*
 * ������̍����ƉE���̋�(�S�p�A���p)���폜
 * 
 * @param strTemp ������
 * @return �����ƉE���̋󔒂��폜����������
 */
function trim(strArg) {
	var strRet = strArg;

	strRet = LTrim(strRet);
	strRet = RTrim(strRet);

	return strRet;
}

/*
 * �S�p�����`�F�b�N
 * 
 * @param v ������
 * @return true:�`�F�b�NOK or false:�`�F�b�NNG
 */
function checkIsZenkaku(v) {
	for (var i = 0; i < v.length; ++i) {
		var c = v.charCodeAt(i);

		if (c < 256 || (c >= 0xff61 && c <= 0xff9f)) {
			return false;
		}
	}
	return true;
}


/*
 * Byte�����J�E���g
 * 
 * @param value ������
 * @return num:�o�C�g��
 */
function getByteCount(value) {
  var count = 0;
  for ( var i = 0; i < value.length; ++i ) {
    var sub = value.substring(i, i + 1);
    //�S�p�̏ꍇ�Q�o�C�g�ǉ��B
    if( checkIsZenkaku(sub) ){
      count += 2;
    } else {
      count += 1;
    }
  }
  return count;
}