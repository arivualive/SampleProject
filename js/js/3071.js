// �T���v�������p���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		
		var id = sample_return_id.value;

		if(id != 0){

				var start_date = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
				
				if (fncTrim(start_date) == "") {
					fncAlert("�K�p�J�n���t����͂��Ă�������",s_yy);
					return false;
				}
				if (fncTrim(start_date) != "") {
					if(!fncJudgeNumber(fncTrim(start_date))){
						fncAlert("���p�����œ��͂��Ă�������",s_yy);
						return false;
					}
				}
				if (fncChkDate(start_date) == "") {
					fncAlert("�K�p�J�n���t�𐳂������͂��Ă�������",s_yy);
					return false;
				}


				var end_date = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);

				
				if (fncTrim(end_date) == "") {
					fncAlert("�K�p�I�����t����͂��Ă�������",e_yy);
					return false;
				}
				if (fncTrim(end_date) != "") {
					if(!fncJudgeNumber(fncTrim(end_date))){
						fncAlert("���p�����œ��͂��Ă�������",e_yy);
						return false;
					}
				}
				if (fncChkDate(end_date) == "") {
					fncAlert("�K�p�I�����t�𐳂������͂��Ă�������",e_yy);
					return false;
				}
				
				if(fncTrim(start_date) > fncTrim(end_date)){
					fncAlert("���t�𐳂������͂��Ă�������",s_yy);
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
			fncAlert("�Œ��͑I�����Ă�������",sample_return_time1_flg);
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

