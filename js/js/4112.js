// ���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(category_nm.value) == "") {
			fncAlert("�J�e�S��������͂��Ă�������",category_nm);
			return false;
		}
		if(fncGetLength(category_nm.value) > 200){
				fncAlert("�J�e�S�����͑S�p100�����ȓ��œ��͂��Ă�������",category_nm);
				return false;
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}
