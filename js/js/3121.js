// 質問用入力チェック 
function InputChk() {

/*
	with (document.form_inp){
		if(fncGetLength(faq_question.value) > 2000){
				fncAlert("質問（ＰＣ）は全角1000文字以内で入力してください",faq_question);
				return false;
		}
		if(fncGetLength(m_faq_question.value) > 2000){
				fncAlert("質問（携帯）は全角1000文字以内で入力してください",m_faq_question);
				return false;
		}
		
		if(fncGetLength(faq_answer1.value) > 4000){
				fncAlert("回答1（ＰＣ）は全角2000文字以内で入力してください",faq_answer1);
				return false;
		}
		if(fncGetLength(faq_answer1.value) <= 0 && fncGetLength(faq_answer2.value) != 0 ){
				fncAlert("回答2(PC)を使用する場合は回答1(PC)を入力してください",faq_answer1);
				return false;
		}
		if(fncGetLength(faq_answer1.value) <= 0 && fncGetLength(faq_answer3.value) != 0 ){
				fncAlert("回答3(PC)を使用する場合は回答1(PC)を入力してください",faq_answer1);
				return false;
		}
		if(fncGetLength(faq_answer1.value) != 0 && fncGetLength(faq_answer2.value) <= 0 && fncGetLength(faq_answer3.value) != 0 ){
				fncAlert("回答3(PC)を使用する場合は回答2(PC)を入力してください",faq_answer1);
				return false;
		}
		if(fncGetLength(m_faq_answer1.value) > 4000){
				fncAlert("回答1（携帯）は全角2000文字以内で入力してください",m_faq_answer1);
				return false;
		}
		if(fncGetLength(faq_answer2.value) > 4000){
				fncAlert("回答2（ＰＣ）は全角2000文字以内で入力してください",faq_answer2);
				return false;
		}
		if(fncGetLength(faq_answer3.value) > 4000){
				fncAlert("回答3（ＰＣ）は全角2000文字以内で入力してください",faq_answer3);
				return false;
		}

		// 表示フラグによる必須項目のチェック
		// 非表示(チェックなし)
		if(faq_disp_flg[0].checked){

		// PC
		}else if(faq_disp_flg[1].checked){
			if(fncGetLength(faq_question.value) <= 0){
				fncAlert("質問（ＰＣ）を入力してください",faq_question);
				return false;
			}
		}else if(faq_disp_flg[2].checked){
			if(fncGetLength(m_faq_question.value) <= 0){
				fncAlert("質問（携帯）を入力してください",m_faq_question);
				return false;
			}
		}else if(faq_disp_flg[3].checked){
			if(fncGetLength(faq_question.value) <= 0){
				fncAlert("質問（ＰＣ）を入力してください",faq_question);
				return false;
			}
			if(fncGetLength(m_faq_question.value) <= 0){
				fncAlert("質問（携帯）を入力してください",m_faq_question);
				return false;
			}
		// 範囲外
		}else{
			fncAlert("表示フラグを選択してください",faq_disp_flg[0]);
			return false;
		}

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
			if(fncGetLength(start_date) != 12){
				fncAlert("開始日付を正しく入力してください(YYYY年MM月DD日 HH時MM分)",s_year);
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
			if(fncGetLength(end_date) != 12){
				fncAlert("終了日付を正しく入力してください(YYYY年MM月DD日 HH時MM分)",e_year);
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
			fncAlert("日付を正しく入力してください",s_hour);
			return false;
		}
		if(sort_no.value.length == 0) {
				fncAlert("ソート順を入力してください",sort_no);
				return false;
		} else if(fncGetLength(sort_no.value) > 3){
				fncAlert("ソート順は3桁以内で入力してください",sort_no);
				return false;
		} else if (fncJudgeNumber(sort_no.value) == false) {
				fncAlert("ソート順は半角数字で入力してください",sort_no);
				return false;
        }
	}
*/        
	if(!fncEditConfirm()){
		return false;
	}
}
/*--------------------------------------------------------
 * fncTypeChange
 * 概　要：セレクトボックス選択時選択した値を持って遷移
 * 引　数：
 * 戻り値：
--------------------------------------------------------*/
function fncTypeChange(){
	var url   = document.faq_type_form.action;
	var param = document.faq_type_form.faq_type.selectedIndex;
	if(param != ""){
		url = url + '?faq_type=' + param;
	}
	document.faq_type_form.action= url;
	document.faq_type_form.submit();
}
/*--------------------------------------------------------
 * fncSelectfaqList
 * 概　要：セレクトボックス選択時選択した値を持って遷移
 * 引　数：
 * 戻り値：
--------------------------------------------------------*/
function fncSelectfaqList(faq_type){
	var url   = document.faq_category_form.action;
	var param = document.faq_category_form.faq_category.selectedIndex;
	if(param != ""){
		url = url + '?faq_category=' + param + '&faq_type=' + faq_type;
	}else{
		url = url + '?faq_type=' + faq_type;
	}
	document.faq_category_form.action= url;
	document.faq_category_form.submit();
}

/*--------------------------------------------------------
 * fncSetFaqClassCode
 * 概　要：セレクトボックス選択値を持って遷移
--------------------------------------------------------*/
function fncSetFaqClassCode(){
	document.add.faq_class_id.value = document.faq_category_form.faq_category.value;
}

/*--------------------------------------------------------
 * fncSetClassId
 * 概　要：セレクトボックス選択時選択したIDに対応するソートNo.候補をセットする
--------------------------------------------------------*/
function fncSetClassId(){
	var param = document.form_inp.faq_class_id.selectedIndex;
	document.form_inp.sort_no.value = document.form_inp[param].value;
}
