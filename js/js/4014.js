
// ���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(mail_kubun.value) == "") {
			fncAlert("�Ǘ����[���敪����͂��Ă�������",mail_kubun);
			return false;
		}
		if( !fncJudgeNumber(mail_kubun.value )){
			fncAlert("�Ǘ����[���敪�͔��p�����œ��͂��Ă�������",mail_kubun);
			return false;
		}
		if(fncGetLength(mail_kubun.value) > 5){
			fncAlert("�Ǘ����[���敪�͔��p5�����ȓ��œ��͂��Ă�������",mail_kubun);
			return false;
		}

		if (fncTrim(site_kbn.value) == "") {
			fncAlert("�T�C�g�敪����͂��Ă��������B",site_kbn);
			return false;
		}
		if (fncGetLength(site_kbn.value) > 1) {
			fncAlert("�T�C�g�敪�͔��p1�����œ��͂��Ă��������B",site_kbn);
			return false;
		}

		if (fncTrim(email.value) == "") {
			fncAlert("���[���A�h���X����͂��Ă��������B",email);
			return false;
		}
		if(fncGetLength(email.value) > 100){
			fncAlert("���[���A�h���X�͔��p100�����ȓ��œ��͂��Ă�������",email);
			return false;
		}

		if (fncTrim(mail_nm.value) == "") {
			fncAlert("��������͂��Ă��������B",mail_nm);
			return false;
		}
		if(fncGetLength(mail_nm.value) > 50){
			fncAlert("�����͑S�p25�����ȓ��œ��͂��Ă�������",mail_nm);
			return false;
		}

		if (fncTrim(sendway.value) == "") {
			fncAlert("���M���@����͂��Ă�������",sendway);
			return false;
		}
		if( !fncJudgeNumber(sendway.value) ){
			fncAlert("���M���@�͔��p�����œ��͂��Ă�������",sendway);
			return false;
		}
		if(fncGetLength(sendway.value) > 3){
			fncAlert("���M���@�͔��p����3�����ȓ��œ��͂��Ă�������",sendway);
			return false;
		}

		if(!fncEditConfirm()){
			return false;
		}
	}
}
