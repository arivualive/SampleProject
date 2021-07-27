// �J�[�h�I�[�\���p���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		
		if(company_cd.selectedIndex == "0"){
			fncAlert("�J�[�h��Ђ�I�����Ă�������",company_cd);
				return false;
		}
		
		var start_date = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
		
		if (fncTrim(start_date) == "") {
			fncAlert("�����e�i���X�J�n���t����͂��Ă�������",s_yy);
			return false;
		}
		if (fncTrim(start_date) != "") {
			if(!fncJudgeNumber(fncTrim(start_date))){
				fncAlert("���p�����œ��͂��Ă�������",s_yy);
				return false;
			}
		}
		if (fncChkDate(start_date) == "") {
			fncAlert("�����e�i���X�J�n���t�𐳂������͂��Ă�������",s_yy);
			return false;
		}
		
		if ((s_hh.value == "" || isNaN(s_hh.value)) || (Number(s_hh.value) < 0 || Number(s_hh.value) > 23)){
			fncAlert("�����e�i���X�J�n���t�𐳂������͂��Ă�������",s_yy);
			return false;
		}
		
		if ((s_mi.value == "" || isNaN(s_mi.value)) || (Number(s_mi.value) < 0 || Number(s_mi.value) > 59)){
			fncAlert("�����e�i���X�J�n���t�𐳂������͂��Ă�������",s_yy);
			return false;
		}

		var end_date = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);

		
		if (fncTrim(end_date) == "") {
			fncAlert("�����e�i���X�I�����t����͂��Ă�������",e_yy);
			return false;
		}
		if (fncTrim(end_date) != "") {
			if(!fncJudgeNumber(fncTrim(end_date))){
				fncAlert("���p�����œ��͂��Ă�������",e_yy);
				return false;
			}
		}
		if (fncChkDate(end_date) == "") {
			fncAlert("�����e�i���X�I�����t�𐳂������͂��Ă�������",e_yy);
			return false;
		}
		
		if ((e_hh.value == "" || isNaN(e_hh.value)) || (Number(e_hh.value) < 0 || Number(e_hh.value) > 23)){
			fncAlert("�����e�i���X�I�����t�𐳂������͂��Ă�������",e_yy);
			return false;
		}
		
		if ((e_mi.value == "" || isNaN(e_mi.value)) || (Number(e_mi.value) < 0 || Number(e_mi.value) > 59)){
			fncAlert("�����e�i���X�I�����t�𐳂������͂��Ă�������",e_yy);
			return false;
		}
		
		if(fncTrim(start_date) > fncTrim(end_date)){
			fncAlert("���t�𐳂������͂��Ă�������",s_yy);
			return false;
		}
		
		if (fncTrim(authori_kingaku.value) == "") {
			fncAlert("�I�[�\�����z�𔼊p�����œ��͂��Ă�������",authori_kingaku);
			return false;
		}else if(!fncJudgeNumber(authori_kingaku.value)){
			fncAlert("�I�[�\�����z�𔼊p�����œ��͂��Ă�������",authori_kingaku);
			return false;
		}
	}
		
	if(!fncEditConfirm()){
		return false;
	}
	
}
function fncNow() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	d = dt.getDate();
	h = dt.getHours();
	mi = dt.getMinutes();

	document.form_inp.s_yy.value = y;
	document.form_inp.s_mm.value = m;
	document.form_inp.s_dd.value = d;
	document.form_inp.s_hh.value = h;
	document.form_inp.s_mi.value = mi;
}
function fncNow_e() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	d = dt.getDate();
	h = dt.getHours();
	mi = dt.getMinutes();
	
	document.form_inp.e_yy.value = y;
	document.form_inp.e_mm.value = m;
	document.form_inp.e_dd.value = d;
	document.form_inp.e_hh.value = h;
	document.form_inp.e_mi.value = mi;
}


