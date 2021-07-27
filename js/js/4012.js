// 入力チェック 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(category_nm.value) == "") {
			fncAlert("カテゴリ名を入力してください",category_nm);
			return false;
		}
		if(fncGetLength(category_nm.value) > 200){
				fncAlert("カテゴリ名は全角100文字以内で入力してください",category_nm);
				return false;
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}
