// ���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(signature_nm.value) == "") {
			fncAlert("�V�O�l�`��������͂��Ă�������",signature_nm);
			return false;
		}
		if(fncGetLength(signature_nm.value) > 200){
				fncAlert("�V�O�l�`�����͑S�p100�����ȓ��œ��͂��Ă�������",signature_nm);
				return false;
		}
<? if ($mode == 'add') { ?>
		if (fncTrim(signature.value) == "") {
			fncAlert("�V�O�l�`������͂��Ă�������",signature);
			return false;
		}
		if(fncGetLength(signature.value) > 2000){
				fncAlert("�V�O�l�`���͑S�p1000�����ȓ��œ��͂��Ă�������",signature);
				return false;
		}
<? } else { ?>
		if (fncTrim(signature.value) == "") {
			fncAlert("�V�O�l�`���iPC�j����͂��Ă�������",signature);
			return false;
		}
		if(fncGetLength(signature.value) > 2000){
				fncAlert("�V�O�l�`���iPC�j�͑S�p1000�����ȓ��œ��͂��Ă�������",signature);
				return false;
		}
		if (fncTrim(m_signature.value) == "") {
			fncAlert("�V�O�l�`���i�g�сj����͂��Ă�������",m_signature);
			return false;
		}
		if(fncGetLength(m_signature.value) > 2000){
				fncAlert("�V�O�l�`���i�g�сj�͑S�p1000�����ȓ��œ��͂��Ă�������",m_signature);
				return false;
		}
<? } ?>
		if(!fncEditConfirm()){
			return false;
		}
	}
}
