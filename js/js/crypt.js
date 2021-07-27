// 媒体管理用入力チェック 
function InputChk() {
	with (document.form_inp){
		
		if (fncTrim(mode.value) == "0") {
			if (fncTrim(key.value) == "") {
				fncAlert("鍵情報を入力してください",key);
				return false;
			}
		}

		if (fncTrim(input.value) == "") {
			fncAlert("文字列を入力してください",input);
			return false;
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}