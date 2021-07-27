// システム起動モード用入力チェック 
function InputChk() {
	with (document.form_inp){
	
		if(!fncEditConfirm()){
			return false;
		}
	}
}