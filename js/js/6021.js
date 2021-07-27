// テストサイト認証用入力チェック 
function InputChk() {
	with (document.form_inp){
		
		if (fncTrim(auth_cd.value) == "") {
			fncAlert("媒体コードを入力してください",baitai_name);
			return false;
		}
	}
}