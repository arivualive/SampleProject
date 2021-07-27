// サンプル請求用入力チェック 
function InputChk() {
	with (document.form_inp){
		
		var id = sample_return_id.value;

		if(id != 0){

				var start_date = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
				
				if (fncTrim(start_date) == "") {
					fncAlert("適用開始日付を入力してください",s_yy);
					return false;
				}
				if (fncTrim(start_date) != "") {
					if(!fncJudgeNumber(fncTrim(start_date))){
						fncAlert("半角数字で入力してください",s_yy);
						return false;
					}
				}
				if (fncChkDate(start_date) == "") {
					fncAlert("適用開始日付を正しく入力してください",s_yy);
					return false;
				}


				var end_date = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);

				
				if (fncTrim(end_date) == "") {
					fncAlert("適用終了日付を入力してください",e_yy);
					return false;
				}
				if (fncTrim(end_date) != "") {
					if(!fncJudgeNumber(fncTrim(end_date))){
						fncAlert("半角数字で入力してください",e_yy);
						return false;
					}
				}
				if (fncChkDate(end_date) == "") {
					fncAlert("適用終了日付を正しく入力してください",e_yy);
					return false;
				}
				
				if(fncTrim(start_date) > fncTrim(end_date)){
					fncAlert("日付を正しく入力してください",s_yy);
					return false;
				}
		}
		
		var count = 0;
		for( i=1; i<5; i++ ) {
			if(elements["sample_return_time"+i+"_flg"].checked){
				count++;
			}
		}
		if(count==0){
			fncAlert("最低一つは選択してください",sample_return_time1_flg);
			return false;
		}
		
		if(!fncEditConfirm()){
			return false;
		}
	}
}
function fncNow() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	d = dt.getDate();

	document.form_inp.s_yy.value = y;
	document.form_inp.s_mm.value = m;
	document.form_inp.s_dd.value = d;
}
function fncNow_e() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	d = dt.getDate();
	
	document.form_inp.e_yy.value = y;
	document.form_inp.e_mm.value = m;
	document.form_inp.e_dd.value = d;
}

