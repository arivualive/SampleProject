/*--------------------------------------------------------
 * fncTypeChange
 * �T�@�v�F�Z���N�g�{�b�N�X�I�����I�������l�������đJ��
 * ���@���F
 * �߂�l�F
--------------------------------------------------------*/
function fncTypeChange(){

	document.message_view.submit();
}

/// ���b�Z�[�W�Ǘ��p���̓`�F�b�N 
function InputChk(cid) {
	with (document.form_inp){
		
		if(message_id.selectedIndex == ""){
			fncAlert("���b�Z�[�WID��I�����Ă�������",message_id);
				return false;
		}
		
		if (fncTrim(message_name.value) != "") {
			if(fncGetLength(message_name.value) > 200){
				fncAlert("���b�Z�[�W���͑S�p100�����ȓ��œ��͂��Ă�������",message_name);
				return false;
			}
		}
		if (fncTrim(category_id.value) != "") {
			if(!fncJudgeNumber(category_id.value)){
				fncAlert("�J�e�S���[ID�͐��������͂��Ă�������",category_id);
				return false;
			}
		}
		if(fncGetLength(category_name.value) > 200){
				fncAlert("�J�e�S���[���͑S�p100�����ȓ��œ��͂��Ă�������",category_name);
				return false;
		}
		if(fncGetLength(message_explanation.value) > 200){
				fncAlert("���b�Z�[�W�����͑S�p100�����ȓ��œ��͂��Ă�������",message_explanation);
				return false;
		}
		if(fncGetLength(message_title.value) > document.form_chk.title_max_length.value){
				fncAlert("���b�Z�[�W�^�C�g���i�o�b�j�͑S�p" + (document.form_chk.title_max_length.value / 2 ) + "�����ȓ��œ��͂��Ă�������",message_title);
				return false;
		}
        
        if(cid == '4'){
            if(fncGetLength(ap_message_title.value) > document.form_chk.title_max_length.value){
				fncAlert("���b�Z�[�W�^�C�g���i�A�v���j�͑S�p" + (document.form_chk.title_max_length.value / 2 ) + "�����ȓ��œ��͂��Ă�������",ap_message_title);
				return false;
		    }
        }
		if(fncGetLength(m_message_title.value) > document.form_chk.title_max_length.value){
				fncAlert("���b�Z�[�W�^�C�g���i�g�сj�͑S�p" + document.form_chk.title_max_length.value + "�����ȓ��œ��͂��Ă�������",m_message_title);
				return false;
		}
		if(fncGetLength(message_title.value) > 0 && fncGetLength(message_body.value) == 0){
				fncAlert("���b�Z�[�W�{���i�o�b�j����͂��Ă��������B",message_body);
				return false;
		}
		if(fncGetLength(message_title.value) == 0 && fncGetLength(message_body.value) > 0){
				fncAlert("���b�Z�[�W�^�C�g���i�o�b�j����͂��Ă��������B",message_title);
				return false;
		}
        
        if(cid == '4'){
            if(fncGetLength(ap_message_title.value) > 0 && fncGetLength(ap_message_body.value) == 0){
				fncAlert("���b�Z�[�W�{���i�A�v���j����͂��Ă��������B",ap_message_body);
				return false;
		    }
        }
        
        if(cid == '4'){
		    if(fncGetLength(ap_message_title.value) == 0 && fncGetLength(ap_message_body.value) > 0){
				fncAlert("���b�Z�[�W�^�C�g���i�A�v���j����͂��Ă��������B",ap_message_title);
				return false;
		    }
        }
		if(fncGetLength(m_message_title.value) > 0 && fncGetLength(m_message_body.value) == 0){
				fncAlert("���b�Z�[�W�{���i�g�сj����͂��Ă��������B",m_message_body);
				return false;
		}
		if(fncGetLength(m_message_title.value) == 0 && fncGetLength(m_message_body.value) > 0){
				fncAlert("���b�Z�[�W�^�C�g���i�g�сj����͂��Ă��������B",m_message_title);
				return false;
		}
        if(cid == '4'){
		    if(fncGetLength(message_title.value) == 0 && fncGetLength(m_message_title.value) == 0 && fncGetLength(ap_message_title.value) == 0){
				fncAlert("�i�o�b�j�������́i�g�сj�������́i�A�v���j�̃��b�Z�[�W�^�C�g������͂��Ă��������B",message_title);
				return false;
		    }
        }else{
            if(fncGetLength(message_title.value) == 0 && fncGetLength(m_message_title.value) == 0){
				fncAlert("�i�o�b�j�������́i�g�сj�̃��b�Z�[�W�^�C�g������͂��Ă��������B",message_title);
				return false;
		    }
        
        }
        
        if(cid == '4'){
		    if(fncGetLength(message_body.value) == 0 && fncGetLength(m_message_body.value) == 0 && fncGetLength(ap_message_body.value) == 0){
				fncAlert("�i�o�b�j�������́i�g�сj�������́i�A�v���j�̃��b�Z�[�W�{������͂��Ă��������B",message_body);
				return false;
		    }
        }else{
        
            if(fncGetLength(message_body.value) == 0 && fncGetLength(m_message_body.value) == 0){
				fncAlert("�i�o�b�j�������́i�g�сj�̃��b�Z�[�W�{������͂��Ă��������B",message_body);
				return false;
            }
        
        }

<? if ($message_data['category_id'] != 1) { ?>
		if(fncGetLength(message_body.value) > 4000){
				fncAlert("���b�Z�[�W�{���i�o�b�j�͑S�p2000�����ȓ��œ��͂��Ă�������",message_body);
				return false;
		}
        
        if(cid == '4'){
            if(fncGetLength(ap_message_body.value) > 4000){
				fncAlert("���b�Z�[�W�{���i�A�v���j�͑S�p2000�����ȓ��œ��͂��Ă�������",ap_message_body);
				return false;
		    }
        }
		if(fncGetLength(m_message_body.value) > 4000){
				fncAlert("���b�Z�[�W�{���i�g�сj�͑S�p2000�����ȓ��œ��͂��Ă�������",m_message_body);
				return false;
		}
<? } ?>
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
		if(!fncEditConfirm()){
			return false;
		}
	}
}


/*--------------------------------------------------------
 * fncDelConfirm_3081
 * �T�@�v�F�폜�{�^���������̊m�F�_�C�A���O
 * ���@���F
 * �߂�l�F�͂�: true ������:false
--------------------------------------------------------*/
function fncDelConfirm_3081(cid){

    if(cid == '4'){
	    if(confirm('PC�A�A�v���A�g�сA���ׂẴf�[�^���폜����܂��B��낵���ł����H')){
		    return true;
	    }else{
		    return false;
    	}
    }else{
        if(confirm('PC�A�g�сA�����̃f�[�^���폜����܂��B��낵���ł����H')){
		    return true;
	    }else{
		    return false;
    	}
    }

}
