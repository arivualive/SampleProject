// サンプル請求用入力チェック 
function InputChk() {
	with (document.form_inp){
		
		var id = sample_notice_id.value;

		if(id != 0){

				var start_date = n_s_yy.value + ("00" + n_s_mm.value ).slice(-2) + ("00" + n_s_dd.value ).slice(-2);
				
				if (fncTrim(start_date) == "") {
					fncAlert("お知らせ開始日付を入力してください",n_s_yy);
					return false;
				}
				if (fncTrim(start_date) != "") {
					if(!fncJudgeNumber(fncTrim(start_date))){
						fncAlert("半角数字で入力してください",n_s_yy);
						return false;
					}
				}
				if (fncChkDate(start_date) == "") {
					fncAlert("お知らせ開始日付を正しく入力してください",n_s_yy);
					return false;
				}


				var end_date = n_e_yy.value + ("00" + n_e_mm.value ).slice(-2) + ("00" + n_e_dd.value ).slice(-2);

				
				if (fncTrim(end_date) == "") {
					fncAlert("お知らせ終了日付を入力してください",n_e_yy);
					return false;
				}
				if (fncTrim(end_date) != "") {
					if(!fncJudgeNumber(fncTrim(end_date))){
						fncAlert("半角数字で入力してください",n_e_yy);
						return false;
					}
				}
				if (fncChkDate(end_date) == "") {
					fncAlert("お知らせ終了日付を正しく入力してください",n_e_yy);
					return false;
				}
				
				if(fncTrim(start_date) > fncTrim(end_date)){
					fncAlert("日付を正しく入力してください",n_s_yy);
					return false;
				}
				
			}

	
		if(fncGetLength(disp_message.value) > 1000){
				fncAlert("お知らせ内容は全角500文字以内で入力してください",disp_message);
				return false;
		}

	}
}
function fncNow() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	d = dt.getDate();

	document.form_inp.n_s_yy.value = y;
	document.form_inp.n_s_mm.value = m;
	document.form_inp.n_s_dd.value = d;
}
function fncNow_e() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	d = dt.getDate();
	
	document.form_inp.n_e_yy.value = y;
	document.form_inp.n_e_mm.value = m;
	document.form_inp.n_e_dd.value = d;
}


