// �}�̊Ǘ��p���̓`�F�b�N
function InputChk() {
	with (document.form_inp){
	/*
		if (fncTrim(baitai_cd.value) == "") {
			fncAlert("�}�̃R�[�h����͂��Ă�������",baitai_cd);
			return false;
		} else {
			if(fncGetLength(baitai_cd.value) > 8){
				fncAlert("�}�̃R�[�h�͔��p8�����ȓ��œ��͂��Ă�������",baitai_cd);
				return false;
			}
			if(!fncJudgeHankaku(baitai_cd.value)){
				fncAlert("�}�̃R�[�h�͔��p�p�����œ��͂��Ă�������",baitai_cd);
				return false;
			}
		}
	*/
		if (fncTrim(baitai_name.value) != "") {
			if(fncGetLength(baitai_name.value) > 100){
				fncAlert("�\������100�o�C�g�ȓ��œ��͂��Ă�������",baitai_name);
				return false;
			}
		}else{
			fncAlert("�\��������͂��Ă�������",baitai_name);
			return false;
		}

	 	var chkSelect  = document.form_inp.site_kubun.selectedIndex;
		if (chkSelect == 0){
			fncAlert("�T�C�g�敪��I�����Ă��������B",site_kubun);
			return false;

		}

		if (document.form_inp.baitai_val !=undefined && fncTrim(baitai_val.value) != "") {
			if (fncGetLength(baitai_val.value) > 100) {
				fncAlert("�}�̃R�[�h�܂��͕\������100�o�C�g�ȓ��œ��͂��Ă�������", baitai_val);
				return false;
			}
		}

	/*
		var start_date = s_year.value + ("00" + s_month.value ).slice(-2) + ("00" + s_day.value ).slice(-2) + ("00" + s_hour.value ).slice(-2) + ("00" + s_min.value ).slice(-2);
		var start_yymmdd = s_year.value + ("00" + s_month.value ).slice(-2) + ("00" + s_day.value ).slice(-2);
		var start_hhmi = ("00" + s_hour.value ).slice(-2) + ("00" + s_min.value ).slice(-2);

		if (fncTrim(start_date) == "") {
			fncAlert("�J�n���t����͂��Ă�������",s_year);
			return false;
		}
		if (fncTrim(start_date) != "") {
			if(!fncJudgeNumber(fncTrim(start_date))){
				fncAlert("���p�����œ��͂��Ă�������",s_year);
				return false;
			}

		}
		if (fncChkDate(start_yymmdd) == "") {
			fncAlert("�J�n���t�𐳂������͂��Ă�������",s_year);
			return false;
		}
		if (fncChkTime(start_hhmi) == "") {
			fncAlert("�J�n���t�𐳂������͂��Ă�������",s_hour);
			return false;
		}
	*/

		if(fncTrim(hyouji.value) != ""){
			if(!fncJudgeNumber(fncTrim(hyouji.value))){
					fncAlert("�\�����͔��p�����œ��͂��Ă�������",hyouji);
					return false;
			}
		}

	/*
		var end_date = e_year.value + ("00" + e_month.value ).slice(-2) + ("00" + e_day.value ).slice(-2) + ("00" + e_hour.value ).slice(-2) + ("00" + e_min.value ).slice(-2);
		var end_yymmdd = e_year.value + ("00" + e_month.value ).slice(-2) + ("00" + e_day.value ).slice(-2);
		var end_hhmi = ("00" + e_hour.value ).slice(-2) + ("00" + e_min.value ).slice(-2);


		if (fncTrim(end_date) == "") {
			fncAlert("�I�����t����͂��Ă�������",e_year);
			return false;
		}
		if (fncTrim(end_date) != "") {
			if(!fncJudgeNumber(fncTrim(end_date))){
				fncAlert("���p�����œ��͂��Ă�������",e_year);
				return false;
			}
		}
		if (fncChkDate(end_yymmdd) == "") {
			fncAlert("�I�����t�𐳂������͂��Ă�������",e_year);
			return false;
		}
		if (fncChkTime(end_hhmi) == "") {
			fncAlert("�I�����t�𐳂������͂��Ă�������",e_hour);
			return false;
		}

		if(fncTrim(start_date) > fncTrim(end_date)){
			fncAlert("���t�𐳂������͂��Ă�������",s_year);
			return false;
		}
	*/
		if(!fncEditConfirm()){
			return false;
		}
	}
}
