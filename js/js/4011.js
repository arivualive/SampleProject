// 入力チェック 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(signature_nm.value) == "") {
			fncAlert("シグネチャ名を入力してください",signature_nm);
			return false;
		}
		if(fncGetLength(signature_nm.value) > 200){
				fncAlert("シグネチャ名は全角100文字以内で入力してください",signature_nm);
				return false;
		}
<? if ($mode == 'add') { ?>
		if (fncTrim(signature.value) == "") {
			fncAlert("シグネチャを入力してください",signature);
			return false;
		}
		if(fncGetLength(signature.value) > 2000){
				fncAlert("シグネチャは全角1000文字以内で入力してください",signature);
				return false;
		}
<? } else { ?>
		if (fncTrim(signature.value) == "") {
			fncAlert("シグネチャ（PC）を入力してください",signature);
			return false;
		}
		if(fncGetLength(signature.value) > 2000){
				fncAlert("シグネチャ（PC）は全角1000文字以内で入力してください",signature);
				return false;
		}
		if (fncTrim(m_signature.value) == "") {
			fncAlert("シグネチャ（携帯）を入力してください",m_signature);
			return false;
		}
		if(fncGetLength(m_signature.value) > 2000){
				fncAlert("シグネチャ（携帯）は全角1000文字以内で入力してください",m_signature);
				return false;
		}
<? } ?>
		if(!fncEditConfirm()){
			return false;
		}
	}
}
