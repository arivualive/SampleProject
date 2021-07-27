// ���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(age_lower.value) != "") {
			if(!fncJudgeNumber(age_lower.value)){
				fncAlert("�N��͈͔͂��p�����œ��͂��Ă�������",age_lower);
				return false;
			}
		}
		if(fncGetLength(attribute_name.value) > 200){
				fncAlert("�������͑S�p100�����ȓ��œ��͂��Ă�������",attribute_name);
				return false;
		}
		if (fncTrim(age_upper.value) != "") {
			if(!fncJudgeNumber(age_upper.value)){
				fncAlert("�N��͈͔͂��p�����œ��͂��Ă�������",age_upper);
				return false;
			}
		}
		
		if (Number(fncTrim(age_lower.value)) > Number(fncTrim(age_upper.value))) {
			fncAlert("�N��͈͂̐ݒ肪����Ă��܂�",age_lower);
			return false;
		}
		
		if (fncTrim(last_purchase_start_days.value) != "") {
			if(!fncJudgeNumber(last_purchase_start_days.value)){
				fncAlert("�ŏI�w���o�ߓ��͔��p�����œ��͂��Ă�������",last_purchase_start_days);
				return false;
			}
		}
		
		if (fncTrim(last_purchase_end_days.value) != "") {
			if(!fncJudgeNumber(last_purchase_end_days.value)){
				fncAlert("�ŏI�w���o�ߓ��͔��p�����œ��͂��Ă�������",last_purchase_end_days);
				return false;
			}
		}
		
		if (Number(fncTrim(last_purchase_start_days.value)) > Number(fncTrim(last_purchase_end_days.value))) {
			fncAlert("�ŏI�w���o�ߓ��̐ݒ肪����Ă��܂�",last_purchase_start_days);
			return false;
		}
		
		if (fncTrim(first_purchase_start_days.value) != "") {
			if(!fncJudgeNumber(first_purchase_start_days.value)){
				fncAlert("����w���o�ߓ��͔��p�����œ��͂��Ă�������",first_purchase_start_days);
				return false;
			}
		}
		
		if (fncTrim(first_purchase_end_days.value) != "") {
			if(!fncJudgeNumber(first_purchase_end_days.value)){
				fncAlert("����w���o�ߓ��͔��p�����œ��͂��Ă�������",first_purchase_end_days);
				return false;
			}
		}
		
		if (Number(fncTrim(first_purchase_start_days.value)) > Number(fncTrim(first_purchase_end_days.value)) ) {
			fncAlert("����w���o�ߓ��̐ݒ肪����Ă��܂�",first_purchase_start_days);
			return false;

		}
		
		if (fncTrim(cosmetics_purchase_cnt_lower.value) != "") {
			if(!fncJudgeNumber(cosmetics_purchase_cnt_lower.value)){
				fncAlert("���ϕi�w���񐔂͔��p�����œ��͂��Ă�������",cosmetics_purchase_cnt_lower);
				return false;
			}
		}
		if (fncTrim(cosmetics_purchase_cnt_upper.value) != "") {
			if(!fncJudgeNumber(cosmetics_purchase_cnt_upper.value)){
				fncAlert("���ϕi�w���񐔂͔��p�����œ��͂��Ă�������",cosmetics_purchase_cnt_upper);
				return false;
			}
		}
		if (Number(fncTrim(cosmetics_purchase_cnt_lower.value)) > Number(fncTrim(cosmetics_purchase_cnt_upper.value)) ) {
			fncAlert("���ϕi�w���񐔂̐ݒ肪����Ă��܂�",cosmetics_purchase_cnt_lower);
			return false;

		}
		if (fncTrim(cosmetics_amount_lower.value) != "") {
			if(!fncJudgeNumber(cosmetics_amount_lower.value)){
				fncAlert("���ϕi�w�����z�͔��p�����œ��͂��Ă�������",cosmetics_amount_lower);
				return false;
			}
		}
		
		if (fncTrim(cosmetics_amount_upper.value) != "") {
			if(!fncJudgeNumber(cosmetics_amount_upper.value)){
				fncAlert("���ϕi�w�����z�͔��p�����œ��͂��Ă�������",cosmetics_amount_upper);
				return false;
			}
		}
		if (Number(fncTrim(cosmetics_amount_lower.value)) > Number(fncTrim(cosmetics_amount_upper.value))) {
			fncAlert("���ϕi�w�����z�̐ݒ肪����Ă��܂�",cosmetics_amount_lower);
			return false;
		}
		
		
 		var start = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
         if (s_yy.value + s_mm.value + s_dd.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("�������i�e�q�n�l�j�͐��������͂��Ă�������",s_yy);
                 return false;
             }
         }
 		var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
         if (e_yy.value + e_mm.value + e_dd.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("�������i�s�n�j�͐��������͂��Ă�������",e_yy);
                 return false;
             }
             if (s_yy.value + s_mm.value + s_dd.value != "") {
                 if (start > end) {
                     fncAlert("�������i�e�q�n�l�j���������i�s�n�j�œ��͂��Ă�������",s_yy);
                     return false;
                 }
             }
         }
		
		
		if( (!fncJudgeHankaku(general_flg.value))  && (fncTrim(general_flg.value) != "") ){
			fncAlert("��������t���O�͔��p�p�����œ��͂��Ă�������",general_flg);
			return false;
		}	
		
		if(fncGetLength(general_flg.value) > 5){
				fncAlert("��������t���O�͔��p5�����ȓ��œ��͂��Ă�������",general_flg);
				return false;
		}		
		
		
		
		
		if (fncTrim(priority.value) == "") {
			fncAlert("�D��x����͂��Ă�������",priority);
			return false;
		}
		if (fncTrim(priority.value) != "") {
			if(!fncJudgeNumber(priority.value)){
				fncAlert("���p�����œ��͂��Ă�������",priority);
				return false;
			}
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}