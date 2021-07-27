// 媒体管理用入力チェック 
function InputChk() {
	with (document.form_inp){
		
		if(!fncSendConfirm()){
			return false;
		}
	}
}