// ����p���̓`�F�b�N 
function InputChk() {

/*
	with (document.form_inp){
		if(fncGetLength(faq_question.value) > 2000){
				fncAlert("����i�o�b�j�͑S�p1000�����ȓ��œ��͂��Ă�������",faq_question);
				return false;
		}
		if(fncGetLength(m_faq_question.value) > 2000){
				fncAlert("����i�g�сj�͑S�p1000�����ȓ��œ��͂��Ă�������",m_faq_question);
				return false;
		}
		
		if(fncGetLength(faq_answer1.value) > 4000){
				fncAlert("��1�i�o�b�j�͑S�p2000�����ȓ��œ��͂��Ă�������",faq_answer1);
				return false;
		}
		if(fncGetLength(faq_answer1.value) <= 0 && fncGetLength(faq_answer2.value) != 0 ){
				fncAlert("��2(PC)���g�p����ꍇ�͉�1(PC)����͂��Ă�������",faq_answer1);
				return false;
		}
		if(fncGetLength(faq_answer1.value) <= 0 && fncGetLength(faq_answer3.value) != 0 ){
				fncAlert("��3(PC)���g�p����ꍇ�͉�1(PC)����͂��Ă�������",faq_answer1);
				return false;
		}
		if(fncGetLength(faq_answer1.value) != 0 && fncGetLength(faq_answer2.value) <= 0 && fncGetLength(faq_answer3.value) != 0 ){
				fncAlert("��3(PC)���g�p����ꍇ�͉�2(PC)����͂��Ă�������",faq_answer1);
				return false;
		}
		if(fncGetLength(m_faq_answer1.value) > 4000){
				fncAlert("��1�i�g�сj�͑S�p2000�����ȓ��œ��͂��Ă�������",m_faq_answer1);
				return false;
		}
		if(fncGetLength(faq_answer2.value) > 4000){
				fncAlert("��2�i�o�b�j�͑S�p2000�����ȓ��œ��͂��Ă�������",faq_answer2);
				return false;
		}
		if(fncGetLength(faq_answer3.value) > 4000){
				fncAlert("��3�i�o�b�j�͑S�p2000�����ȓ��œ��͂��Ă�������",faq_answer3);
				return false;
		}

		// �\���t���O�ɂ��K�{���ڂ̃`�F�b�N
		// ��\��(�`�F�b�N�Ȃ�)
		if(faq_disp_flg[0].checked){

		// PC
		}else if(faq_disp_flg[1].checked){
			if(fncGetLength(faq_question.value) <= 0){
				fncAlert("����i�o�b�j����͂��Ă�������",faq_question);
				return false;
			}
		}else if(faq_disp_flg[2].checked){
			if(fncGetLength(m_faq_question.value) <= 0){
				fncAlert("����i�g�сj����͂��Ă�������",m_faq_question);
				return false;
			}
		}else if(faq_disp_flg[3].checked){
			if(fncGetLength(faq_question.value) <= 0){
				fncAlert("����i�o�b�j����͂��Ă�������",faq_question);
				return false;
			}
			if(fncGetLength(m_faq_question.value) <= 0){
				fncAlert("����i�g�сj����͂��Ă�������",m_faq_question);
				return false;
			}
		// �͈͊O
		}else{
			fncAlert("�\���t���O��I�����Ă�������",faq_disp_flg[0]);
			return false;
		}

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
			if(fncGetLength(start_date) != 12){
				fncAlert("�J�n���t�𐳂������͂��Ă�������(YYYY�NMM��DD�� HH��MM��)",s_year);
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
			if(fncGetLength(end_date) != 12){
				fncAlert("�I�����t�𐳂������͂��Ă�������(YYYY�NMM��DD�� HH��MM��)",e_year);
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
			fncAlert("���t�𐳂������͂��Ă�������",s_hour);
			return false;
		}
		if(sort_no.value.length == 0) {
				fncAlert("�\�[�g������͂��Ă�������",sort_no);
				return false;
		} else if(fncGetLength(sort_no.value) > 3){
				fncAlert("�\�[�g����3���ȓ��œ��͂��Ă�������",sort_no);
				return false;
		} else if (fncJudgeNumber(sort_no.value) == false) {
				fncAlert("�\�[�g���͔��p�����œ��͂��Ă�������",sort_no);
				return false;
        }
	}
*/        
	if(!fncEditConfirm()){
		return false;
	}
}
/*--------------------------------------------------------
 * fncTypeChange
 * �T�@�v�F�Z���N�g�{�b�N�X�I�����I�������l�������đJ��
 * ���@���F
 * �߂�l�F
--------------------------------------------------------*/
function fncTypeChange(){
	var url   = document.faq_type_form.action;
	var param = document.faq_type_form.faq_type.selectedIndex;
	if(param != ""){
		url = url + '?faq_type=' + param;
	}
	document.faq_type_form.action= url;
	document.faq_type_form.submit();
}
/*--------------------------------------------------------
 * fncSelectfaqList
 * �T�@�v�F�Z���N�g�{�b�N�X�I�����I�������l�������đJ��
 * ���@���F
 * �߂�l�F
--------------------------------------------------------*/
function fncSelectfaqList(faq_type){
	var url   = document.faq_category_form.action;
	var param = document.faq_category_form.faq_category.selectedIndex;
	if(param != ""){
		url = url + '?faq_category=' + param + '&faq_type=' + faq_type;
	}else{
		url = url + '?faq_type=' + faq_type;
	}
	document.faq_category_form.action= url;
	document.faq_category_form.submit();
}

/*--------------------------------------------------------
 * fncSetFaqClassCode
 * �T�@�v�F�Z���N�g�{�b�N�X�I��l�������đJ��
--------------------------------------------------------*/
function fncSetFaqClassCode(){
	document.add.faq_class_id.value = document.faq_category_form.faq_category.value;
}

/*--------------------------------------------------------
 * fncSetClassId
 * �T�@�v�F�Z���N�g�{�b�N�X�I�����I������ID�ɑΉ�����\�[�gNo.�����Z�b�g����
--------------------------------------------------------*/
function fncSetClassId(){
	var param = document.form_inp.faq_class_id.selectedIndex;
	document.form_inp.sort_no.value = document.form_inp[param].value;
}
