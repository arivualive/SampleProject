// �����点�p���̓`�F�b�N 

function InputChk() {
	with (document.form_inp){

		if (fncTrim(title.value) == "") {
			fncAlert("�^�C�g������͂��Ă�������",title);
			return false;
		} else {
			if(fncGetLength(title.value) > 200){
				fncAlert("�^�C�g����100�����ȓ��œ��͂��Ă�������",title);
				return false;
			}
		}
		var start_date = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2) + ("00" + s_hh.value ).slice(-2) + ("00" + s_mi.value ).slice(-2);
		var start_yymmdd = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
		var start_hhmi = ("00" + s_hh.value ).slice(-2) + ("00" + s_mi.value ).slice(-2);
		

		if (fncTrim(s_yy.value) == "") {
			fncAlert("�J�n���t�i�N�j����͂��Ă�������",s_yy);
			return false;
		}
		if (fncTrim(s_mm.value) == "") {
			fncAlert("�J�n���t�i���j����͂��Ă�������",s_mm);
			return false;
		}
		if (fncTrim(s_dd.value) == "") {
			fncAlert("�J�n���t�i���j����͂��Ă�������",s_dd);
			return false;
		}
		if (fncTrim(s_hh.value) == "") {
			fncAlert("�J�n���t�i���j����͂��Ă�������",s_hh);
			return false;
		}
		if (fncTrim(s_mi.value) == "") {
			fncAlert("�J�n���t�i���j����͂��Ă�������",s_mi);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(s_yy.value))){
			fncAlert("�J�n���t�i�N�j�͔��p�����œ��͂��Ă�������",s_yy);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(s_mm.value))){
			fncAlert("�J�n���t�i���j�͔��p�����œ��͂��Ă�������",s_mm);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(s_dd.value))){
			fncAlert("�J�n���t�i���j�͔��p�����œ��͂��Ă�������",s_dd);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(s_hh.value))){
			fncAlert("�J�n���t�i���j�͔��p�����œ��͂��Ă�������",s_hh);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(s_mi.value))){
			fncAlert("�J�n���t�i���j�͔��p�����œ��͂��Ă�������",s_mi);
			return false;
		}

		if (fncChkDate(start_yymmdd) == "") {
			fncAlert("�J�n���t�𐳂������͂��Ă�������",s_yy);
			return false;
		}
		if (fncChkTime(start_hhmi) == "") {
			fncAlert("�J�n���t�𐳂������͂��Ă�������",s_hh);
			return false;
		}
		
		
		var end_date = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2) + ("00" + e_hh.value ).slice(-2) + ("00" + e_mi.value ).slice(-2);
		var end_yymmdd = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
		var end_hhmi = ("00" + e_hh.value ).slice(-2) + ("00" + e_mi.value ).slice(-2);
		
		if (fncTrim(e_yy.value) == "") {
			fncAlert("�I�����t�i�N�j����͂��Ă�������",e_yy);
			return false;
		}
		if (fncTrim(e_mm.value) == "") {
			fncAlert("�I�����t�i���j����͂��Ă�������",e_mm);
			return false;
		}
		if (fncTrim(e_dd.value) == "") {
			fncAlert("�I�����t�i���j����͂��Ă�������",e_dd);
			return false;
		}
		if (fncTrim(e_hh.value) == "") {
			fncAlert("�I�����t�i���j����͂��Ă�������",e_hh);
			return false;
		}
		if (fncTrim(e_mi.value) == "") {
			fncAlert("�I�����t�i���j����͂��Ă�������",e_mi);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(e_yy.value))){
			fncAlert("�I�����t�i�N�j�͔��p�����œ��͂��Ă�������",e_yy);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(e_mm.value))){
			fncAlert("�I�����t�i���j�͔��p�����œ��͂��Ă�������",e_mm);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(e_dd.value))){
			fncAlert("�I�����t�i���j�͔��p�����œ��͂��Ă�������",e_dd);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(e_hh.value))){
			fncAlert("�I�����t�i���j�͔��p�����œ��͂��Ă�������",e_hh);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(e_mi.value))){
			fncAlert("�I�����t�i���j�͔��p�����œ��͂��Ă�������",e_mi);
			return false;
		}
		if (fncChkDate(end_yymmdd) == "") {
			fncAlert("�I�����t�𐳂������͂��Ă�������",e_yy);
			return false;
		}
		if (fncChkTime(end_hhmi) == "") {
			fncAlert("�I�����t�𐳂������͂��Ă�������",e_hh);
			return false;
		}
		if (fncTrim(start_date) > fncTrim(end_date)) {
			fncAlert("�J�n���t�ƏI�����t�𐳂������͂��Ă�������",s_yy);
			return false;
		}

		var linkFlg = link_flg.selectedIndex;
		var linkUrl = link_url.value;
		if(linkFlg == 1 || linkFlg == 2) {
			if(fncTrim(linkUrl) == "") {
				fncAlert("�����NURL����͂��Ă�������",link_url);
				return false;
			} else {
				if(fncChkZenkaku(fncTrim(linkUrl))) {
					fncAlert("�����NURL�͔��p�œ��͂��Ă�������",link_url);
					return false;
				}
			}
		}
		var attach_path = attach_file.value;
		var attach_name = attach_file_name.value;
		if(attach_path != ""){
			if(!attach_path.match(/\.(pdf|PDF)$/i)){
				fncAlert('�Y�t�t�@�C����PDF�ɂ̂ݑΉ����Ă��܂�', attach_file);
				return false;
			}
			if(fncTrim(attach_name) == "") {
				fncAlert("�Y�t�t�@�C��������͂��Ă�������", attach_file_name);
				return false;
			}
		}
		var modeVal = mode.value;
		if(modeVal == 'add' && fncTrim(attach_name) != "" && fncTrim(attach_path) == "") {
			fncAlert("�Y�t�t�@�C�����w�肵�Ă�������", attach_file);
			return false;
		}
		if(modeVal == 'add' && linkFlg == 3 && fncTrim(attach_name) == "") {
			fncAlert("�Y�t�t�@�C��������͂��Ă�������", attach_file_name);
			return false;
		}
		var isAttached = is_attached.value;
		if(modeVal == 'edit' && linkFlg == 3 && isAttached == 0 && fncTrim(attach_path) == "") {
			fncAlert("�Y�t�t�@�C�����w�肵�Ă�������", attach_file);
			return false;
		}
		if(modeVal == 'edit' && linkFlg == 3 && isAttached == 0 && fncTrim(attach_name) == "") {
			fncAlert("�Y�t�t�@�C��������͂��Ă�������", attach_file_name);
			return false;
		}
		
		if(linkFlg == 3 &&  fncTrim(attach_name) == "") {
			fncAlert("�Y�t�t�@�C��������͂��Ă�������", attach_file_name);
			return false;
		}
		
		data = attach_name.match("\<[a-zA-Z]+\>");
		if (data) {
			fncAlert('�Y�t�t�@�C�����ɂ�HTML�^�O�͎g�p�ł��܂���', attach_file_name);
			return false;
		}

		if(!fncEditConfirm()){
			return false;
		}
	}
}
function attachClear()
{
	var input_form = document.getElementById('input_file_form').innerHTML;
	document.getElementById('input_file_form').innerHTML = input_form;
	document.form_inp.attach_file_name.value = '';
}
function jsDisabled() {
	with (document.form_inp){
		var selectedIdx = link_flg.selectedIndex;
		if(selectedIdx == 0) {
			link_url.disabled = true;
			attach_file.disabled = true;
			attach_file_name.disabled = true;
			btnClear.disabled = true;
			btnPreview.disabled = true;
			link_url.style.background='#ccc';
			attach_file.style.background='#ccc';
			attach_file_name.style.background='#ccc';
		} else if(selectedIdx == 3) {
			link_url.disabled = true;
			attach_file.disabled = false;
			attach_file_name.disabled = false;
			btnClear.disabled = false;
			btnPreview.disabled = true;
			link_url.style.background='#ccc';
			attach_file.style.background='';
			attach_file_name.style.background='';
		} else {
			link_url.disabled = false;
			attach_file.disabled = true;
			attach_file_name.disabled = true;
			btnClear.disabled = true;
			btnPreview.disabled = false;
			link_url.style.background='';
			attach_file.style.background='#ccc';
			attach_file_name.style.background='#ccc';
		}
	}
}

function linkPreview(topUrl) {
	with (document.form_inp){
		var linkUrl = link_url.value;
		var linkFlg = link_flg.selectedIndex;
		if(fncTrim(linkUrl) != "") {
			if(linkFlg == 1) {
				linkUrl = topUrl + linkUrl;
				window.open(linkUrl);
			} else {
				window.open(linkUrl);
			}
		}

	}
}
