// ����p���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){

		// ����
		{
			// �ő啶�����G���[
			if(faq_question.value.length > 1000){
				fncAlert("�����1000�����ȓ��œ��͂��Ă�������",faq_question);
				return false;
			}
			
			// �����̓G���[
			if(faq_question.value.length <= 0){
				fncAlert("�������͂��Ă�������",faq_question);
				return false;
			}
		}
		
		// ��1
		{
			// �ő啶�����G���[
			if(faq_answer1.value.length > 2000){
				fncAlert("��1��2000�����ȓ��œ��͂��Ă�������",faq_answer1);
				return false;
			}
			
			// �����̓G���[
			if(faq_answer1.value.length <= 0){
				fncAlert("��1����͂��Ă�������",faq_answer1);
				return false;
			}
		}
		
		// ��2
		{
			// �ő啶�����G���[
			if(faq_answer2.value.length > 2000){
				fncAlert("��2��2000�����ȓ��œ��͂��Ă�������",faq_answer2);
				return false;
			}
		}
		
		// �^�O
		{
			// �ő啶�����G���[(�S��)
			if(faq_tags.value.length > 309){
				fncAlert("�^�O��309�����ȓ��œ��͂��Ă�������",faq_tags);
				return false;
			}
			
			// �ő���G���[
			var tags = faq_tags.value.split(';');
			if (tags.length > 10) {
				fncAlert("�^�O��10�ȓ��œ��͂��Ă�������",faq_tags);
				return false;
			}
			
			// �ő啶�����G���[(�^�O��)
			for (var i = 0; i < tags.length; i++) {
				var tag = tags[i].trim();
				if(tag.length > 30){
					fncAlert("�^�O��30�����ȓ��œ��͂��Ă�������",faq_tags);
					return false;
				}
			}
		}
		
		//�f�X�N���v�V���� 2021/01/30
		{
			// �ő啶�����G���[
			if(faq_description.value.length > 200){
				fncAlert("�f�B�X�N���v�V������200�����ȓ��œ��͂��Ă�������",faq_description);
				return false;
			}
		}

		//�d�v�x 2021/03/22
		{
			//0�`9�̐��l�̂ݓ��͉\
			if((/^([0-9])+$/.test(faq_important.value) == false) || (faq_important.value < 0) || (faq_important.value > 9)){
				fncAlert("�d�v�x��1���̔��p���l����͂��Ă�������",faq_important);
				return false;
			}
		}

		//PV�� 2021/03/22
		{
			//0�`9999999�̐��l�̂ݓ��͉\
			if((/^([0-9])+$/.test(faq_pv_count.value) == false) || (faq_pv_count.value < 0) || (faq_pv_count.value > 9999999)){
				fncAlert("PV����7���ȓ��̔��p���l����͂��Ă�������",faq_pv_count);
				return false;
			}
		}

		//�悭�����Ă��邲����\���ʒu 2021/03/22
		{
			//0�`9�̐��l�̂ݓ��͉\
			if((/^([0-9])+$/.test(faq_topics_no.value) == false) || (faq_topics_no.value < 0) || (faq_topics_no.value > 9)){
				fncAlert("�悭�����Ă��邲����\���ʒu��1���̔��p���l����͂��Ă�������",faq_topics_no);
				return false;
			}
		}
		
		if(!fncEditConfirm()){
			return false;
		}
	}
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

/*--------------------------------------------------------
 * fncDownloadAllFaqCsvFile
 * �T�@�v�FCSV�ꊇ�_�E�����[�h
--------------------------------------------------------*/
function fncDownloadAllFaqCsvFile(){
	var param = document.faq_category_form.faq_category.selectedIndex;
	var url = "download.php";
	if(param != ""){
		url += '?faq_category=' + param;
	}
	window.open(url);
}
