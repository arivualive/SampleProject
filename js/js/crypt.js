// �}�̊Ǘ��p���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		
		if (fncTrim(mode.value) == "0") {
			if (fncTrim(key.value) == "") {
				fncAlert("��������͂��Ă�������",key);
				return false;
			}
		}

		if (fncTrim(input.value) == "") {
			fncAlert("���������͂��Ă�������",input);
			return false;
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}