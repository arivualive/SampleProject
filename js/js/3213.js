///////////////////////////////////////////////
// ���̓`�F�b�N
///////////////////////////////////////////////
function InputChk(mode,allAttentionCd,attentionValue,explanationValue,disp_idxValue,start_dtValue,end_dtValue,disp_flgValue){
 	var errorMsg = ""; // �G���[���b�Z�[�W�i�[�p
	var confMsg = "";  // �m�F���b�Z�[�W�i�[�p

	switch(mode){
		case "add":
			// �V�K�ǉ���ʎ�
			
			// ������CD�`�F�b�N
			if (fncTrim(document.form_inp.attention_cd.value) == '') {
				// ������CD���󔒂̏ꍇ
				errorMsg += "�E������CD����͂��Ă��������B\n";
			} else if (document.form_inp.attention_cd.value.match(/[\D]/)) {
				// ������CD�ɔ��p�����ȊO���܂܂�Ă���ꍇ
				errorMsg += "�E������CD�͔��p����(1�`999999)�œ��͂��Ă��������B\n";
			} else {
				var attentionCd = allAttentionCd.split(",");
				for(var i=0; i < attentionCd.length ; i++) {
					if (fncTrim(document.form_inp.attention_cd.value) == attentionCd[i]) {
						// ������CD�����łɓo�^����Ă����ꍇ
						errorMsg += "�E���̓�����CD�͂��łɓo�^����Ă��܂��B\n";
					}
				}
			}
			
			// ���������`�F�b�N
			if (fncTrim(document.form_inp.attention.value) == '') {
				// �����������󔒂̏ꍇ
				errorMsg += "�E������������͂��Ă��������B\n";
			} else if (document.form_inp.attention.value.match(/\n/)) {
				// ���������ɉ��s���܂܂�Ă���ꍇ
				errorMsg += "�E���������ɉ��s�͓��͂��Ȃ��ł��������B\n";
			}
			
			// �������������`�F�b�N
			if (document.form_inp.explanation.value.match(/\n/)) {
				// �������������ɉ��s���܂܂�Ă���ꍇ
				errorMsg += "�E�������������ɉ��s�͓��͂��Ȃ��ł��������B\n";
			}
			
			// �\�����ʃ`�F�b�N
			if (fncTrim(document.form_inp.disp_idx.value) == '') {
				// �\�����ʂ��󔒂̏ꍇ
				errorMsg += "�E�\�����ʂ���͂��Ă��������B\n";
			} else if (document.form_inp.disp_idx.value.match(/[\D]/)) {
				// �\�����ʂɔ��p�����ȊO���܂܂�Ă���ꍇ
				errorMsg += "�E�\�����ʂ͔��p����(1�`99)�œ��͂��Ă��������B\n";
			}
			
			// �\���J�n�����`�F�b�N
			var DateChkFlg = true;
			var startDate = document.form_inp.start_dt_Y.value + document.form_inp.start_dt_M.value + document.form_inp.start_dt_D.value;
			if (fncChkDate(startDate) == '' || document.form_inp.start_dt_H.value == '' || document.form_inp.start_dt_I.value == '' || document.form_inp.start_dt_S.value == '') {
				// �\���J�n���������݂��Ȃ����t�̏ꍇ
				errorMsg += "�E�\���J�n�����𐳂������͂��Ă��������B\n";
				DateChkFlg = false;
			}
			
			// �\���I�������`�F�b�N
			var endDate = document.form_inp.end_dt_Y.value + document.form_inp.end_dt_M.value + document.form_inp.end_dt_D.value;
			if (fncChkDate(endDate) == '' || document.form_inp.end_dt_H.value == '' || document.form_inp.end_dt_I.value == '' || document.form_inp.end_dt_S.value == '') {
				// �\���I�����������݂��Ȃ����t�̏ꍇ
				errorMsg += "�E�\���I�������𐳂������͂��Ă��������B\n";
				DateChkFlg = false;
			}
            
			
			// �������փ`�F�b�N
			if (DateChkFlg) {
				// �\���J�n�����ƕ\���I�������̂ǂ�����������ꍇ
				startDate = document.form_inp.start_dt_Y.value + '/' + document.form_inp.start_dt_M.value + '/' + document.form_inp.start_dt_D.value + ' ' + document.form_inp.start_dt_H.value + ':' + document.form_inp.start_dt_I.value + ':' + document.form_inp.start_dt_S.value;
				endDate = document.form_inp.end_dt_Y.value + '/' + document.form_inp.end_dt_M.value + '/' + document.form_inp.end_dt_D.value + ' ' + document.form_inp.end_dt_H.value + ':' + document.form_inp.end_dt_I.value + ':' + document.form_inp.end_dt_S.value;
				if (new Date(startDate).getTime() > new Date(endDate).getTime()) {
					// �\���J�n���� > �\���I�������̏ꍇ
					errorMsg += "�E�\���J�n�����i�e�q�n�l�j���\���I�������i�s�n�j�œ��͂��Ă��������B\n";
				}	
			}
			
			// �G���[�L���`�F�b�N
			if (errorMsg == "") {
				// �G���[���Ȃ��ꍇ
				confMsg = "��������ǉ����܂����H\n";
			}
			break;
			
		case "edit":
			// �X�V��ʎ�
			
			// ���������`�F�b�N
			if (fncTrim(document.form_inp.attention.value) == '') {
				// �����������󔒂̏ꍇ
				errorMsg += "�E������������͂��Ă��������B\n";
			} else if (document.form_inp.attention.value.match(/\n/)) {
				// ���������ɉ��s���܂܂�Ă���ꍇ
				errorMsg += "�E���������ɉ��s�͓��͂��Ȃ��ł��������B\n";
			}
			
			// �������������`�F�b�N
			if (document.form_inp.explanation.value.match(/\n/)) {
				// �������������ɉ��s���܂܂�Ă���ꍇ
				errorMsg += "�E�������������ɉ��s�͓��͂��Ȃ��ł��������B\n";
			}
			
			// �\�����ʃ`�F�b�N
			if (fncTrim(document.form_inp.disp_idx.value) == '') {
				// �\�����ʂ��󔒂̏ꍇ
				errorMsg += "�E�\�����ʂ���͂��Ă��������B\n";
			} else if (document.form_inp.disp_idx.value.match(/[\D]/)) {// /^[0-9]+$/ �� ���ꂶ��_���H
				// �\�����ʂɔ��p�����ȊO���܂܂�Ă���ꍇ
				errorMsg += "�E�\�����ʂ͔��p����(1�`99)�œ��͂��Ă��������B\n";
			}
			
			// �\���J�n�����`�F�b�N
			var DateChkFlg = true;
			var startDate = document.form_inp.start_dt_Y.value + document.form_inp.start_dt_M.value + document.form_inp.start_dt_D.value;
			if (fncChkDate(startDate) == '') {
				// �\���J�n���������݂��Ȃ����t�̏ꍇ
				errorMsg += "�E�\���J�n�����𐳂������͂��Ă��������B\n";
				DateChkFlg = false;
			}
			
			// �\���I�������`�F�b�N
			var endDate = document.form_inp.end_dt_Y.value + document.form_inp.end_dt_M.value + document.form_inp.end_dt_D.value;
			if (fncChkDate(endDate) == '') {
				// �\���I�����������݂��Ȃ����t�̏ꍇ
				errorMsg += "�E�\���I�������𐳂������͂��Ă��������B\n";
				DateChkFlg = false;
			}
			
			// �������փ`�F�b�N
			startDate = document.form_inp.start_dt_Y.value + '/' + document.form_inp.start_dt_M.value + '/' + document.form_inp.start_dt_D.value + ' ' + document.form_inp.start_dt_H.value + ':' + document.form_inp.start_dt_I.value + ':' + document.form_inp.start_dt_S.value;
			endDate = document.form_inp.end_dt_Y.value + '/' + document.form_inp.end_dt_M.value + '/' + document.form_inp.end_dt_D.value + ' ' + document.form_inp.end_dt_H.value + ':' + document.form_inp.end_dt_I.value + ':' + document.form_inp.end_dt_S.value;
			if (DateChkFlg) {
				// �\���J�n�����ƕ\���I�������̂ǂ�����������ꍇ
				if (new Date(startDate).getTime() > new Date(endDate).getTime()) {
					// �\���J�n���� > �\���I�������̏ꍇ
					errorMsg += "�E�\���J�n�����i�e�q�n�l�j���\���I�������i�s�n�j�œ��͂��Ă��������B\n";
				}	
			}
			
			// �f�[�^�ύX�L���`�F�b�N
			var isChangeFlg = false
			if (document.form_inp.attention.value == attentionValue                && // ��������
				document.form_inp.explanation.value == explanationValue            && // ������������
				document.form_inp.disp_idx.value == disp_idxValue                  && // �\����
				new Date(startDate).getTime() == new Date(start_dtValue).getTime() && // �\���J�n����
				new Date(endDate).getTime() == new Date(end_dtValue).getTime()     && // �\���I������
				document.form_inp.disp_flg.value == disp_flgValue) {                  // �\���t���O
				// �ύX���Ȃ��ꍇ
				errorMsg += "�E�X�V���s��Ȃ��ꍇ�́A�L�����Z���{�^�����������Ă��������B\n";
			}
			
			// �G���[�L���`�F�b�N
			if (errorMsg == "") {
				// �G���[���Ȃ��ꍇ
				confMsg = "���������X�V���܂����H\n";
			}
			break;
			
		default:
			// ��L�ȊO�̏ꍇ
			return false;
	}
	
    if (errorMsg == "") {
		// �G���[���Ȃ��ꍇ
		if (confirm(confMsg)) {
			// �m�F���b�Z�[�W��\�����AOK���������ꂽ�ꍇ
			return true;
		} else {
			// �m�F���b�Z�[�W��\�����A�L�����Z�����������ꂽ�ꍇ
			return false;
		}
    } else {
		// �G���[������ꍇ
	    alert(errorMsg);
		return false;
    } 
}


///////////////////////////////////////////////
// �L�����Z���`�F�b�N
///////////////////////////////////////////////
function IsCancel() {
	if (confirm("���͓��e��j�����܂����H")) {
		// �m�F���b�Z�[�W��\�����AOK���������ꂽ�ꍇ
		location.href = "list.php";
	} else {
		// �m�F���b�Z�[�W��\�����A�L�����Z�����������ꂽ�ꍇ
		return false;
	}
}