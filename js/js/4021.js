// ���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(comm_cd.value) == "") {
			fncAlert("�Ј��R�[�h����͂��Ă�������",comm_cd);
			return false;
		}
		if(fncGetLength(comm_cd.value) > 10){
				fncAlert("�Ј��R�[�h�͔��p10�����ȓ��œ��͂��Ă�������",comm_cd);
				return false;
		}
		if (fncTrim(comm_pw.value) == "") {
			fncAlert("�p�X���[�h����͂��Ă�������",comm_pw);
			return false;
		}
		if(fncGetLength(comm_pw.value) > 64){
				fncAlert("�p�X���[�h�͔��p64�����ȓ��œ��͂��Ă�������",comm_pw);
				return false;
		}
		if (fncTrim(comm_nm.value) == "") {
			fncAlert("��������͂��Ă�������",comm_nm);
			return false;
		}
		if(fncGetLength(comm_nm.value) > 64){
				fncAlert("�����͑S�p32�����ȓ��œ��͂��Ă�������",comm_nm);
				return false;
		}
		if(fncGetLength(comm_pmt.value) > 1){
				fncAlert("�����͔��p1�����ȓ��œ��͂��Ă�������",comm_pmt);
				return false;
		}
		if(fncGetLength(comm_tst.value) > 255){
				fncAlert("��E���Z�͑S�p120�����ȓ��œ��͂��Ă�������",comm_tst);
				return false;
		}
		if(fncGetLength(comm_msg.value) > 512){
				fncAlert("���q�l�ւ̃��b�Z�[�W�͑S�p256�����ȓ��œ��͂��Ă�������",comm_msg);
				return false;
		}
		if(!fncEditConfirm()){
			return false;
		}

	}
}
