/*
 * 会員番号をチェック
 * 
 * @param objKainID  会員番号のテキストボックスのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkKainNo(objKainNo) {

	var strKainNo = trim(objKainNo.value);
	objKainNo.value = strKainNo;

	if (isNaN(strKainNo) || !num_chk(strKainNo) || strKainNo.length != 8) {
		alert('お客様番号は8桁の半角数字で入力してください。'); 
		objKainNo.focus();
		return false
	}

	return true;
}

/*
 * 電話番号をチェック
 * 
 * @param objTelNo1 市外局番のテキストボックスのオブジェクト
 * @param objTelNo2 市内局番のテキストボックスのオブジェクト
 * @param objTelNo3 電話番号のテキストボックスのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkTelNo(objTelNo1, objTelNo2, objTelNo3) {

	// 市外局番
	var strTelNo1 = trim(objTelNo1.value);
	objTelNo1.value = strTelNo1;

	if (isNaN(strTelNo1) || !num_chk(strTelNo1) || strTelNo1.length < 2 || strTelNo1.length > 5) {
		alert('市外局番は2桁以上の半角数字を入力してください。'); 
		objTelNo1.focus();
		return false
	}

	// 市内局番
	var strTelNo2 = trim(objTelNo2.value);
	objTelNo2.value = strTelNo2;

	if (isNaN(strTelNo2) || !num_chk(strTelNo2) || strTelNo2.length < 1 || strTelNo2.length > 5) {
		alert('市内局番は半角数字で入力してください。'); 
		objTelNo2.focus();
		return false
	}

	// 電話番号
	var strTelNo3 = trim(objTelNo3.value);
	objTelNo3.value = strTelNo3;

	if (isNaN(strTelNo3) || !num_chk(strTelNo3) || strTelNo3.length != 4) {
		alert('電話番号は4桁の半角数字で入力してください。'); 
		objTelNo3.focus();
		return false
	}

	// ▼電話番号全体のチェック
	var strTelNo = strTelNo1 + strTelNo2 + strTelNo3;
	var isKetai = strTelNo.match(/^050|^060|^070|^080|^090/);

	if (strTelNo.length < 10 || (!isKetai && strTelNo.length != 10) || (isKetai && strTelNo.length != 11)) {
		alert('市外局番、市内局番を正しく数字で入力してください。'); 
		objTelNo1.focus();
		return false
	}

	if (strTelNo.length > 11) {
		alert('市外局番、市内局番を正しく数字で入力してください。'); 
		objTelNo1.focus();
		return false
	}

	return true;
}

/*
 * ネット会員IDとパスワードをチェック
 * 
 * @param objKainID  ネット会員IDのテキストボックスのオブジェクト
 * @param objKainPW  パスワードのテキストボックスのオブジェクト
 * @param objKainPW2 確認用パスワードのテキストボックスのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkIdPass(objKainID, objKainPW, objKainPW2) {

	var strKainID = trim(objKainID.value);
	objKainID.value = strKainID;

	if (strKainID.length < 6 || strKainID.length > 12) {
		alert('ネット会員IDは8～12文字でお決めください。'); 
		objKainID.focus();
		return false;
	}
	if (!eisu_chk(strKainID)) {
		alert('ネット会員IDは半角英数字で入力してください。'); 
		objKainID.focus();
		return false;
	}
	if (!dup_char_chk(strKainID)) {
		alert('ネット会員IDに同じ文字の繰り返しはお使いいただけません。'); 
		objKainID.focus();
		return false;
	}
	if (!eisu_mix_chk(strKainID)) {
		alert('ネット会員IDはアルファベットと数字の組み合わせで設定してください。'); 
		objKainID.focus();
		return false;
	}

	var strKainPW  = trim(objKainPW.value);
	var strKainPW2 = trim(objKainPW2.value);
	objKainPW.value  = strKainPW;
	objKainPW2.value = strKainPW2;

	if (strKainPW.length < 6 || strKainPW.length > 12) {
		alert('パスワードは8～12文字でお決めください。'); 
		objKainPW.focus();
		objKainPW.value = '';
		objKainPW2.value = '';
		return false;
	}
	if (!eisu_chk(strKainPW)) {
		alert('パスワードは半角英数字で入力してください。'); 
		objKainPW.focus();
		objKainPW.value = '';
		objKainPW2.value = '';
		return false;
	}
	if (strKainPW == strKainID) {
		alert('ネット会員IDとパスワードは別のものを指定してください。'); 
		objKainPW.focus();
		objKainPW.value = '';
		objKainPW2.value = '';
		return false;
	}
	if (!dup_char_chk(strKainPW)) {
		alert('パスワードに同じ文字の繰り返しはお使いいただけません。'); 
		objKainPW.focus();
		objKainPW.value = '';
		objKainPW2.value = '';
		return false;
	}
	if (!eisu_mix_chk(strKainPW)) {
		alert('パスワードはアルファベットと数字の組み合わせで設定してください。'); 
		objKainPW.focus();
		objKainPW.value = '';
		objKainPW2.value = '';
		return false;
	}
	if (strKainPW2 == "") {
		alert('確認用パスワードが未入力です。'); 
		objKainPW2.focus();
		return false;
	}
	if (strKainPW != strKainPW2) {
		alert('パスワードと確認用パスワードが異なります。'); 
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
      alert('・パスワードに、ネット会員IDに含まれる文字が多く使われています。セキュリティの為、違う文字列をご利用下さい。');
      objKainPW.focus();
      objKainPW.value = '';
      objKainPW2.value = '';
      return false;
  }



	return true;
}

/*
 * メールアドレスのチェック
 * 
 * @param objEmail  メールアドレスのテキストボックスのオブジェクト
 * @param objEmail2 確認用メールアドレスのテキストボックスのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkEmail(objEmail, objEmail2) {

	var strEmail  = trim(objEmail.value);
	var strEmail2 = trim(objEmail2.value);
	objEmail.value  = strEmail;
	objEmail2.value = strEmail2;

	if (!checkEmailFormat(strEmail) || strEmail.length < 6 || strEmail.length > 100) {
		alert('メールアドレスを正しく入力してください。'); 
		objEmail.focus();
		objEmail2.value = '';
		return false;
	}
	if (strEmail2 == "") {
		alert('確認用メールアドレスが未入力です。'); 
		objEmail2.focus();
		return false;
	}
	if (strEmail != strEmail2) {
		alert('メールアドレスと確認用メールアドレスが異なります。'); 
		objEmail.focus();
		objEmail2.value = '';
		return false;
	}

	return true;
}

/*
 * メールアドレスのフォーマットチェック
 * 
 * @param chkStr メールアドレスの文字列
 * @return true:チェックOK or false:チェックNG
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
 * 秘密の質問をチェック
 * 
 * @param objSQNo  秘密の質問のプルダウンのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkSQNo(objSQNo) {

	var strSQNo = trim(objSQNo.value);
	objSQNo.value = strSQNo;

	if (isNaN(strSQNo) || !num_chk(strSQNo) || strSQNo.length > 2 || strSQNo <= 0 || strSQNo > 70) {
		alert('秘密の質問を選択してください。'); 
		objSQNo.focus();
		return false
	}

	return true;
}

/*
 * 今回限りの合言葉をチェック
 * 
 * @param objSQNo  今回限りの合言葉のテキストボックスのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkSQAnswer(objSQAnswer) {

	var strSQAnswer = trim(objSQAnswer.value);
	objSQAnswer.value = strSQAnswer;

	if (strSQAnswer.length < 2 ) {
		alert('今回限りの合言葉は全角2文字以上でお願いします。');
		objSQAnswer.focus();
		return false;
	}
	if (strSQAnswer.length > 20 ) {
		alert('今回限りの合言葉は全角20文字以内でお願いします。');
		objSQAnswer.focus();
		return false;
	}

	if (!checkIsZenkaku(strSQAnswer)) {
		alert('今回限りの合言葉は全角で入力をお願いします。');
		objSQAnswer.focus();
		return false;
	}

	return true;
}

/*
 * 半角数字のチェック
 * 
 * @param str 文字列
 * @return true:チェックOK or false:チェックNG
 */
function num_chk(str) {
	var result = str.match(/[0-9]*/);
	if (str != result) {
		return false;
	}
	return true;
}

/*
 * 半角英字のチェック
 * 
 * @param str 文字列
 * @return true:チェックOK or false:チェックNG
 */
function eiji_chk(str) {
	var result = str.match(/[a-z]*/i);
	if (str != result) {
		return false;
	}
	return true;
}

/*
 * 半角英数字のチェック
 * 
 * @param str 文字列
 * @return true:チェックOK or false:チェックNG
 */
function eisu_chk(str) {
	var result = str.match(/[0-9a-z]*/i);
	if (str != result) {
		return false;
	}
	return true;
}


/*
 * 半角英数字が混在しているかチェック
 * 
 * @param str 文字列
 * @return true:チェックOK or false:チェックNG
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
 * 同じ文字の繰り返しチェック
 * 
 * @param v 文字列
 * @return true:チェックOK or false:チェックNG
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
 * 文字列の右側の空白(全角、半角)を削除
 * 
 * @param strTemp 文字列
 * @return 右側の空白を削除した文字列
 */
function RTrim(strTemp) {
	var nLoop = 0;
	var strReturn = strTemp;
	while (nLoop < strTemp.length) {
		if ((strReturn.substring(strReturn.length - 1, strReturn.length) == " ") || 
			(strReturn.substring(strReturn.length - 1, strReturn.length) == "　")) {
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
 * 文字列の左側の空白(全角、半角)を削除
 * 
 * @param strTemp 文字列
 * @return 左側の空白を削除した文字列
 */
function LTrim(strTemp) {
	var nLoop = 0;
	var strReturn = strTemp;
	while (nLoop < strTemp.length) {
		if ((strReturn.substring(0, 1) == " ") || (strReturn.substring(0, 1) == "　")) {
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
 * 文字列の左側と右側の空白(全角、半角)を削除
 * 
 * @param strTemp 文字列
 * @return 左側と右側の空白を削除した文字列
 */
function trim(strArg) {
	var strRet = strArg;

	strRet = LTrim(strRet);
	strRet = RTrim(strRet);

	return strRet;
}

/*
 * 全角文字チェック
 * 
 * @param v 文字列
 * @return true:チェックOK or false:チェックNG
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
 * Byte数をカウント
 * 
 * @param value 文字列
 * @return num:バイト数
 */
function getByteCount(value) {
  var count = 0;
  for ( var i = 0; i < value.length; ++i ) {
    var sub = value.substring(i, i + 1);
    //全角の場合２バイト追加。
    if( checkIsZenkaku(sub) ){
      count += 2;
    } else {
      count += 1;
    }
  }
  return count;
}