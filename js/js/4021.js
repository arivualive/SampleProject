// 入力チェック 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(comm_cd.value) == "") {
			fncAlert("社員コードを入力してください",comm_cd);
			return false;
		}
		if(fncGetLength(comm_cd.value) > 10){
				fncAlert("社員コードは半角10文字以内で入力してください",comm_cd);
				return false;
		}
		if (fncTrim(comm_pw.value) == "") {
			fncAlert("パスワードを入力してください",comm_pw);
			return false;
		}
		if(fncGetLength(comm_pw.value) > 64){
				fncAlert("パスワードは半角64文字以内で入力してください",comm_pw);
				return false;
		}
		if (fncTrim(comm_nm.value) == "") {
			fncAlert("氏名を入力してください",comm_nm);
			return false;
		}
		if(fncGetLength(comm_nm.value) > 64){
				fncAlert("氏名は全角32文字以内で入力してください",comm_nm);
				return false;
		}
		if(fncGetLength(comm_pmt.value) > 1){
				fncAlert("権限は半角1文字以内で入力してください",comm_pmt);
				return false;
		}
		if(fncGetLength(comm_tst.value) > 255){
				fncAlert("趣味・特技は全角120文字以内で入力してください",comm_tst);
				return false;
		}
		if(fncGetLength(comm_msg.value) > 512){
				fncAlert("お客様へのメッセージは全角256文字以内で入力してください",comm_msg);
				return false;
		}
		if(!fncEditConfirm()){
			return false;
		}

	}
}
