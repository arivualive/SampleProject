// おしらせ用入力チェック 

function InputChk() {
	with (document.form_inp){

		if (fncTrim(title.value) == "") {
			fncAlert("タイトルを入力してください",title);
			return false;
		} else {
			if(fncGetLength(title.value) > 200){
				fncAlert("タイトルは100文字以内で入力してください",title);
				return false;
			}
		}
		var start_date = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2) + ("00" + s_hh.value ).slice(-2) + ("00" + s_mi.value ).slice(-2);
		var start_yymmdd = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
		var start_hhmi = ("00" + s_hh.value ).slice(-2) + ("00" + s_mi.value ).slice(-2);
		

		if (fncTrim(s_yy.value) == "") {
			fncAlert("開始日付（年）を入力してください",s_yy);
			return false;
		}
		if (fncTrim(s_mm.value) == "") {
			fncAlert("開始日付（月）を入力してください",s_mm);
			return false;
		}
		if (fncTrim(s_dd.value) == "") {
			fncAlert("開始日付（日）を入力してください",s_dd);
			return false;
		}
		if (fncTrim(s_hh.value) == "") {
			fncAlert("開始日付（時）を入力してください",s_hh);
			return false;
		}
		if (fncTrim(s_mi.value) == "") {
			fncAlert("開始日付（分）を入力してください",s_mi);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(s_yy.value))){
			fncAlert("開始日付（年）は半角数字で入力してください",s_yy);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(s_mm.value))){
			fncAlert("開始日付（月）は半角数字で入力してください",s_mm);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(s_dd.value))){
			fncAlert("開始日付（日）は半角数字で入力してください",s_dd);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(s_hh.value))){
			fncAlert("開始日付（時）は半角数字で入力してください",s_hh);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(s_mi.value))){
			fncAlert("開始日付（分）は半角数字で入力してください",s_mi);
			return false;
		}

		if (fncChkDate(start_yymmdd) == "") {
			fncAlert("開始日付を正しく入力してください",s_yy);
			return false;
		}
		if (fncChkTime(start_hhmi) == "") {
			fncAlert("開始日付を正しく入力してください",s_hh);
			return false;
		}
		
		
		var end_date = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2) + ("00" + e_hh.value ).slice(-2) + ("00" + e_mi.value ).slice(-2);
		var end_yymmdd = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
		var end_hhmi = ("00" + e_hh.value ).slice(-2) + ("00" + e_mi.value ).slice(-2);
		
		if (fncTrim(e_yy.value) == "") {
			fncAlert("終了日付（年）を入力してください",e_yy);
			return false;
		}
		if (fncTrim(e_mm.value) == "") {
			fncAlert("終了日付（月）を入力してください",e_mm);
			return false;
		}
		if (fncTrim(e_dd.value) == "") {
			fncAlert("終了日付（日）を入力してください",e_dd);
			return false;
		}
		if (fncTrim(e_hh.value) == "") {
			fncAlert("終了日付（時）を入力してください",e_hh);
			return false;
		}
		if (fncTrim(e_mi.value) == "") {
			fncAlert("終了日付（分）を入力してください",e_mi);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(e_yy.value))){
			fncAlert("終了日付（年）は半角数字で入力してください",e_yy);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(e_mm.value))){
			fncAlert("終了日付（月）は半角数字で入力してください",e_mm);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(e_dd.value))){
			fncAlert("終了日付（日）は半角数字で入力してください",e_dd);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(e_hh.value))){
			fncAlert("終了日付（時）は半角数字で入力してください",e_hh);
			return false;
		}
		if(!fncJudgeNumber(fncTrim(e_mi.value))){
			fncAlert("終了日付（分）は半角数字で入力してください",e_mi);
			return false;
		}
		if (fncChkDate(end_yymmdd) == "") {
			fncAlert("終了日付を正しく入力してください",e_yy);
			return false;
		}
		if (fncChkTime(end_hhmi) == "") {
			fncAlert("終了日付を正しく入力してください",e_hh);
			return false;
		}
		if (fncTrim(start_date) > fncTrim(end_date)) {
			fncAlert("開始日付と終了日付を正しく入力してください",s_yy);
			return false;
		}

		var linkFlg = link_flg.selectedIndex;
		var linkUrl = link_url.value;
		if(linkFlg == 1 || linkFlg == 2) {
			if(fncTrim(linkUrl) == "") {
				fncAlert("リンクURLを入力してください",link_url);
				return false;
			} else {
				if(fncChkZenkaku(fncTrim(linkUrl))) {
					fncAlert("リンクURLは半角で入力してください",link_url);
					return false;
				}
			}
		}
		var attach_path = attach_file.value;
		var attach_name = attach_file_name.value;
		if(attach_path != ""){
			if(!attach_path.match(/\.(pdf|PDF)$/i)){
				fncAlert('添付ファイルはPDFにのみ対応しています', attach_file);
				return false;
			}
			if(fncTrim(attach_name) == "") {
				fncAlert("添付ファイル名を入力してください", attach_file_name);
				return false;
			}
		}
		var modeVal = mode.value;
		if(modeVal == 'add' && fncTrim(attach_name) != "" && fncTrim(attach_path) == "") {
			fncAlert("添付ファイルを指定してください", attach_file);
			return false;
		}
		if(modeVal == 'add' && linkFlg == 3 && fncTrim(attach_name) == "") {
			fncAlert("添付ファイル名を入力してください", attach_file_name);
			return false;
		}
		var isAttached = is_attached.value;
		if(modeVal == 'edit' && linkFlg == 3 && isAttached == 0 && fncTrim(attach_path) == "") {
			fncAlert("添付ファイルを指定してください", attach_file);
			return false;
		}
		if(modeVal == 'edit' && linkFlg == 3 && isAttached == 0 && fncTrim(attach_name) == "") {
			fncAlert("添付ファイル名を入力してください", attach_file_name);
			return false;
		}
		
		if(linkFlg == 3 &&  fncTrim(attach_name) == "") {
			fncAlert("添付ファイル名を入力してください", attach_file_name);
			return false;
		}
		
		data = attach_name.match("\<[a-zA-Z]+\>");
		if (data) {
			fncAlert('添付ファイル名にはHTMLタグは使用できません', attach_file_name);
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
