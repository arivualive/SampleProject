// �e�X�g�T�C�g�F�ؗp���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		
		if (fncTrim(auth_cd.value) == "") {
			fncAlert("�}�̃R�[�h����͂��Ă�������",baitai_name);
			return false;
		}
	}
}