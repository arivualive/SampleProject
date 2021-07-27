
// 入力チェック 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(mail_kubun.value) == "") {
			fncAlert("管理メール区分を入力してください",mail_kubun);
			return false;
		}
		if( !fncJudgeNumber(mail_kubun.value )){
			fncAlert("管理メール区分は半角数字で入力してください",mail_kubun);
			return false;
		}
		if(fncGetLength(mail_kubun.value) > 5){
			fncAlert("管理メール区分は半角5文字以内で入力してください",mail_kubun);
			return false;
		}

		if (fncTrim(site_kbn.value) == "") {
			fncAlert("サイト区分を入力してください。",site_kbn);
			return false;
		}
		if (fncGetLength(site_kbn.value) > 1) {
			fncAlert("サイト区分は半角1文字で入力してください。",site_kbn);
			return false;
		}

		if (fncTrim(email.value) == "") {
			fncAlert("メールアドレスを入力してください。",email);
			return false;
		}
		if(fncGetLength(email.value) > 100){
			fncAlert("メールアドレスは半角100文字以内で入力してください",email);
			return false;
		}

		if (fncTrim(mail_nm.value) == "") {
			fncAlert("件名を入力してください。",mail_nm);
			return false;
		}
		if(fncGetLength(mail_nm.value) > 50){
			fncAlert("件名は全角25文字以内で入力してください",mail_nm);
			return false;
		}

		if (fncTrim(sendway.value) == "") {
			fncAlert("送信方法を入力してください",sendway);
			return false;
		}
		if( !fncJudgeNumber(sendway.value) ){
			fncAlert("送信方法は半角数字で入力してください",sendway);
			return false;
		}
		if(fncGetLength(sendway.value) > 3){
			fncAlert("送信方法は半角数字3文字以内で入力してください",sendway);
			return false;
		}

		if(!fncEditConfirm()){
			return false;
		}
	}
}
