//利用操作確認
function InputChk() {
	with (document.form_inp){
		if(!fncEditConfirm()){
			return false;
		}
	}
}