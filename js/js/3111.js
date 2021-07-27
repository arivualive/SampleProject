// 媒体管理用入力チェック
function InputChk() {
	with (document.form_inp){
	/*
		if (fncTrim(baitai_cd.value) == "") {
			fncAlert("媒体コードを入力してください",baitai_cd);
			return false;
		} else {
			if(fncGetLength(baitai_cd.value) > 8){
				fncAlert("媒体コードは半角8文字以内で入力してください",baitai_cd);
				return false;
			}
			if(!fncJudgeHankaku(baitai_cd.value)){
				fncAlert("媒体コードは半角英数字で入力してください",baitai_cd);
				return false;
			}
		}
	*/
		if (fncTrim(baitai_name.value) != "") {
			if(fncGetLength(baitai_name.value) > 100){
				fncAlert("表示名は100バイト以内で入力してください",baitai_name);
				return false;
			}
		}else{
			fncAlert("表示名を入力してください",baitai_name);
			return false;
		}

	 	var chkSelect  = document.form_inp.site_kubun.selectedIndex;
		if (chkSelect == 0){
			fncAlert("サイト区分を選択してください。",site_kubun);
			return false;

		}

		if (document.form_inp.baitai_val !=undefined && fncTrim(baitai_val.value) != "") {
			if (fncGetLength(baitai_val.value) > 100) {
				fncAlert("媒体コードまたは表示名は100バイト以内で入力してください", baitai_val);
				return false;
			}
		}

	/*
		var start_date = s_year.value + ("00" + s_month.value ).slice(-2) + ("00" + s_day.value ).slice(-2) + ("00" + s_hour.value ).slice(-2) + ("00" + s_min.value ).slice(-2);
		var start_yymmdd = s_year.value + ("00" + s_month.value ).slice(-2) + ("00" + s_day.value ).slice(-2);
		var start_hhmi = ("00" + s_hour.value ).slice(-2) + ("00" + s_min.value ).slice(-2);

		if (fncTrim(start_date) == "") {
			fncAlert("開始日付を入力してください",s_year);
			return false;
		}
		if (fncTrim(start_date) != "") {
			if(!fncJudgeNumber(fncTrim(start_date))){
				fncAlert("半角数字で入力してください",s_year);
				return false;
			}

		}
		if (fncChkDate(start_yymmdd) == "") {
			fncAlert("開始日付を正しく入力してください",s_year);
			return false;
		}
		if (fncChkTime(start_hhmi) == "") {
			fncAlert("開始日付を正しく入力してください",s_hour);
			return false;
		}
	*/

		if(fncTrim(hyouji.value) != ""){
			if(!fncJudgeNumber(fncTrim(hyouji.value))){
					fncAlert("表示順は半角数字で入力してください",hyouji);
					return false;
			}
		}

	/*
		var end_date = e_year.value + ("00" + e_month.value ).slice(-2) + ("00" + e_day.value ).slice(-2) + ("00" + e_hour.value ).slice(-2) + ("00" + e_min.value ).slice(-2);
		var end_yymmdd = e_year.value + ("00" + e_month.value ).slice(-2) + ("00" + e_day.value ).slice(-2);
		var end_hhmi = ("00" + e_hour.value ).slice(-2) + ("00" + e_min.value ).slice(-2);


		if (fncTrim(end_date) == "") {
			fncAlert("終了日付を入力してください",e_year);
			return false;
		}
		if (fncTrim(end_date) != "") {
			if(!fncJudgeNumber(fncTrim(end_date))){
				fncAlert("半角数字で入力してください",e_year);
				return false;
			}
		}
		if (fncChkDate(end_yymmdd) == "") {
			fncAlert("終了日付を正しく入力してください",e_year);
			return false;
		}
		if (fncChkTime(end_hhmi) == "") {
			fncAlert("終了日付を正しく入力してください",e_hour);
			return false;
		}

		if(fncTrim(start_date) > fncTrim(end_date)){
			fncAlert("日付を正しく入力してください",s_year);
			return false;
		}
	*/
		if(!fncEditConfirm()){
			return false;
		}
	}
}
