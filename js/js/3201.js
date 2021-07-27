// メール送信重複許可管理用入力チェック 
function InputChk() {
	with (document.form_inp){
	
		if(!fncEditConfirm()){
			return false;
		}
	}
}