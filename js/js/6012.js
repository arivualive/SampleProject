// 電文管理用入力チェック 
function InputChk() {
	with (document.form_inp){
	
		if(!fncEditConfirm()){
			return false;
		}
	}
}