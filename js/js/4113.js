<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

function changeMlBodyStrMb(maxchar, changeBg) {
    setStrCount2("mlBodyMsgMb", document.form_inp.m_mail_body.value, maxchar, changeBg);
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

// ��Add for mobile


// ���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(mail_cd.value) == "") {
			fncAlert("�R�[�h����͂��Ă�������",mail_cd);
			return false;
		}
		if (fncGetLength(mail_cd.value) > 4) {
			fncAlert("�R�[�h�͔��p4�����ȓ��œ��͂��Ă�������",mail_cd);
			return false;
		}
		if (fncTrim(mail_nm.value) == "") {
			fncAlert("���[���̎�ނ���͂��Ă�������", mail_nm);
			return false;
		}
		if (fncGetLength(mail_nm.value) > 60) {
			fncAlert("���[���̎�ނ͑S�p30�����ȓ��œ��͂��Ă�������", mail_nm);
			return false;
		}
		if (fncTrim(m_subject.value) == "") {
			fncAlert("���[����������͂��Ă�������", m_subject);
			return false;
		}
		if (fncGetLength(m_subject.value) > 30) {
			fncAlert("���[�������͑S�p15�����ȓ��œ��͂��Ă�������", m_subject);
			return false;
		}
		if (fncTrim(m_mail_body.value) == "") {
			fncAlert("���[���{������͂��Ă�������", m_mail_body);
			return false;
		}
		if (fncGetLength(m_mail_body.value) > 3000) {
			fncAlert("���[���{���͑S�p1500�����ȓ��œ��͂��Ă�������", m_mail_body);
			return false;
		}
		if (fncTrim(taioumemo1.value) == "") {
			fncAlert("�Ή�����1����͂��Ă�������", taioumemo1);
			return false;
		}
		if (fncGetLength(taioumemo1.value) > 60) {
			fncAlert("�Ή�����1�͑S�p30�����ȓ��œ��͂��Ă�������", taioumemo1);
			return false;
		}
		if (fncGetLength(taioumemo2.value) > 60) {
			fncAlert("�Ή�����2�͑S�p30�����ȓ��œ��͂��Ă�������", taioumemo2);
			return false;
		}
		if (!fncEditConfirm()) {
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
