// ����J�e�S���p���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		if(fncGetLength(faq_name.value) <= 0){
				fncAlert("���ޖ�����͂��Ă�������",faq_name);
				return false;
		}
		if(fncGetLength(faq_name.value) > 200){
				fncAlert("���ޖ��͑S�p100�����ȓ��œ��͂��Ă�������",faq_name);
				return false;
		}
		if(sort_no.value.length == 0) {
				fncAlert("�\�[�g������͂��Ă�������",sort_no);
				return false;
		} else if(fncGetLength(sort_no.value) > 3){
				fncAlert("�\�[�g���͔��p3�o�C�g�ȓ��œ��͂��Ă�������",sort_no);
				return false;
		} else if (fncJudgeNumber(sort_no.value) == false) {
				fncAlert("�\�[�g���͔��p�����œ��͂��Ă�������",sort_no);
				return false;
        }
		if(!fncEditConfirm()){
			return false;
		}
	}
}
function faqDelConfirm() {
	if(!fncDelConfirm()){
		return false;
	}
	if(!confirm('����J�e�S���[�ɕt�����鎿����폜����܂����A�X�����ł����H')){
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
