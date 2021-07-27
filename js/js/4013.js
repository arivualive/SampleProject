function changeMlBodyStrPc() {
    setStrCount("mlBodyMsgPc", document.form_inp.mail_body.value, "PC");
}
function changeMlBodyStrMb() {
    setStrCount("mlBodyMsgMb", document.form_inp.m_mail_body.value, "携帯");
}
function setStrCount(objId, str, str2) {
    if (str.indexOf("\r\n") == -1) {
        if (str.indexOf("\n") != -1) {
            // windows firefox?
            str = str.replace(/\n/g, "12");
        } else if (str.indexOf("\r") != -1) {
            // ?
            str = str.replace(/\r/g, "12");
        }
    }
    var text = str2 + "　" + str.length + "文字（" + fncGetLength(str) + "バイト）";
    var obj = document.getElementById(objId);
    obj.replaceChild(document.createTextNode(text), obj.childNodes[0]);
}

// 入力チェック 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(mail_cd.value) == "") {
			fncAlert("コードを入力してください",mail_cd);
			return false;
		}
		if(fncGetLength(mail_cd.value) > 4){
				fncAlert("コードは半角4文字以内で入力してください",mail_cd);
				return false;
		}
		if (fncTrim(mail_nm.value) == "") {
			fncAlert("メールの種類を入力してください",mail_nm);
			return false;
		}
		if(fncGetLength(mail_nm.value) > 60){
				fncAlert("メールの種類は全角30文字以内で入力してください",mail_nm);
				return false;
		}
		if (fncTrim(subject.value) == "") {
			fncAlert("メール件名（PC）を入力してください",subject);
			return false;
		}
		if(fncGetLength(subject.value) > 255){
				fncAlert("メール件名（PC）は全角120文字以内で入力してください",subject);
				return false;
		}
		if (fncTrim(mail_body.value) == "") {
			fncAlert("メール本文（PC）を入力してください",mail_body);
			return false;
		}
		if(fncGetLength(mail_body.value) > 10000){
				fncAlert("メール本文（PC）は全角5000文字以内で入力してください",mail_body);
				return false;
		}
		if (fncTrim(taioumemo1.value) == "") {
			fncAlert("対応メモ1を入力してください",taioumemo1);
			return false;
		}
		if(fncGetLength(taioumemo1.value) > 60){
				fncAlert("対応メモ1は全角30文字以内で入力してください",taioumemo1);
				return false;
		}
		if(fncGetLength(taioumemo2.value) > 60){
				fncAlert("対応メモ2は全角30文字以内で入力してください",taioumemo2);
				return false;
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}


/*--------------------------------------------------------
 * fncTypeChange
 * 概　要：セレクトボックス選択時選択した値を持って遷移
 * 引　数：
 * 戻り値：
--------------------------------------------------------*/
function fncCategoryChange(){
	var url   = document.category_type_form.action;
	var param = document.category_type_form.category_type.selectedIndex;
	if(param != ""){
   		url = url + '?category_cd=' + document.category_type_form.category_type[param].value;
	}
	else
	{
		url = url + '?category_cd=' + '';		
	}
	document.category_type_form.action= url;
	document.category_type_form.submit();
}
