function changeMlBodyStrPc() {
    setStrCount("mlBodyMsgPc", document.form_inp.mail_body.value, "PC");
}
function changeMlBodyStrMb() {
    setStrCount("mlBodyMsgMb", document.form_inp.m_mail_body.value, "�g��");
}
function setStrCount(objId, str, str2) {
    if (str.indexOf("\r\n") == -1) {
        if (str.indexOf("\n") != -1) {
            // windows firefox?
            str = str.replace(/\n/g, "12");
        } else if (str.indexOf("\r") != -1) {
            // ?
            str = str.replace(/\r/g, "12");
        }
    }
    var text = str2 + "�@" + str.length + "�����i" + fncGetLength(str) + "�o�C�g�j";
    var obj = document.getElementById(objId);
    obj.replaceChild(document.createTextNode(text), obj.childNodes[0]);
}

// ���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(mail_cd.value) == "") {
			fncAlert("�R�[�h����͂��Ă�������",mail_cd);
			return false;
		}
		if(fncGetLength(mail_cd.value) > 4){
				fncAlert("�R�[�h�͔��p4�����ȓ��œ��͂��Ă�������",mail_cd);
				return false;
		}
		if (fncTrim(mail_nm.value) == "") {
			fncAlert("���[���̎�ނ���͂��Ă�������",mail_nm);
			return false;
		}
		if(fncGetLength(mail_nm.value) > 60){
				fncAlert("���[���̎�ނ͑S�p30�����ȓ��œ��͂��Ă�������",mail_nm);
				return false;
		}
		if (fncTrim(subject.value) == "") {
			fncAlert("���[�������iPC�j����͂��Ă�������",subject);
			return false;
		}
		if(fncGetLength(subject.value) > 255){
				fncAlert("���[�������iPC�j�͑S�p120�����ȓ��œ��͂��Ă�������",subject);
				return false;
		}
		if (fncTrim(mail_body.value) == "") {
			fncAlert("���[���{���iPC�j����͂��Ă�������",mail_body);
			return false;
		}
		if(fncGetLength(mail_body.value) > 10000){
				fncAlert("���[���{���iPC�j�͑S�p5000�����ȓ��œ��͂��Ă�������",mail_body);
				return false;
		}
		if (fncTrim(taioumemo1.value) == "") {
			fncAlert("�Ή�����1����͂��Ă�������",taioumemo1);
			return false;
		}
		if(fncGetLength(taioumemo1.value) > 60){
				fncAlert("�Ή�����1�͑S�p30�����ȓ��œ��͂��Ă�������",taioumemo1);
				return false;
		}
		if(fncGetLength(taioumemo2.value) > 60){
				fncAlert("�Ή�����2�͑S�p30�����ȓ��œ��͂��Ă�������",taioumemo2);
				return false;
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}


/*--------------------------------------------------------
 * fncTypeChange
 * �T�@�v�F�Z���N�g�{�b�N�X�I�����I�������l�������đJ��
 * ���@���F
 * �߂�l�F
--------------------------------------------------------*/
function fncCategoryChange(){
	var url   = document.category_type_form.action;
	var param = document.category_type_form.category_type.selectedIndex;
	if(param != ""){
   		url = url + '?category_cd=' + document.category_type_form.category_type[param].value;
	}
	else
	{
		url = url + '?category_cd=' + '';		
	}
	document.category_type_form.action= url;
	document.category_type_form.submit();
}
