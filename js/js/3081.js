/*--------------------------------------------------------
 * fncTypeChange
 * 概　要：セレクトボックス選択時選択した値を持って遷移
 * 引　数：
 * 戻り値：
--------------------------------------------------------*/
function fncTypeChange(){

	document.message_view.submit();
}

/// メッセージ管理用入力チェック 
function InputChk(cid) {
	with (document.form_inp){
		
		if(message_id.selectedIndex == ""){
			fncAlert("メッセージIDを選択してください",message_id);
				return false;
		}
		
		if (fncTrim(message_name.value) != "") {
			if(fncGetLength(message_name.value) > 200){
				fncAlert("メッセージ名は全角100文字以内で入力してください",message_name);
				return false;
			}
		}
		if (fncTrim(category_id.value) != "") {
			if(!fncJudgeNumber(category_id.value)){
				fncAlert("カテゴリーIDは正しく入力してください",category_id);
				return false;
			}
		}
		if(fncGetLength(category_name.value) > 200){
				fncAlert("カテゴリー名は全角100文字以内で入力してください",category_name);
				return false;
		}
		if(fncGetLength(message_explanation.value) > 200){
				fncAlert("メッセージ説明は全角100文字以内で入力してください",message_explanation);
				return false;
		}
		if(fncGetLength(message_title.value) > document.form_chk.title_max_length.value){
				fncAlert("メッセージタイトル（ＰＣ）は全角" + (document.form_chk.title_max_length.value / 2 ) + "文字以内で入力してください",message_title);
				return false;
		}
        
        if(cid == '4'){
            if(fncGetLength(ap_message_title.value) > document.form_chk.title_max_length.value){
				fncAlert("メッセージタイトル（アプリ）は全角" + (document.form_chk.title_max_length.value / 2 ) + "文字以内で入力してください",ap_message_title);
				return false;
		    }
        }
		if(fncGetLength(m_message_title.value) > document.form_chk.title_max_length.value){
				fncAlert("メッセージタイトル（携帯）は全角" + document.form_chk.title_max_length.value + "文字以内で入力してください",m_message_title);
				return false;
		}
		if(fncGetLength(message_title.value) > 0 && fncGetLength(message_body.value) == 0){
				fncAlert("メッセージ本文（ＰＣ）を入力してください。",message_body);
				return false;
		}
		if(fncGetLength(message_title.value) == 0 && fncGetLength(message_body.value) > 0){
				fncAlert("メッセージタイトル（ＰＣ）を入力してください。",message_title);
				return false;
		}
        
        if(cid == '4'){
            if(fncGetLength(ap_message_title.value) > 0 && fncGetLength(ap_message_body.value) == 0){
				fncAlert("メッセージ本文（アプリ）を入力してください。",ap_message_body);
				return false;
		    }
        }
        
        if(cid == '4'){
		    if(fncGetLength(ap_message_title.value) == 0 && fncGetLength(ap_message_body.value) > 0){
				fncAlert("メッセージタイトル（アプリ）を入力してください。",ap_message_title);
				return false;
		    }
        }
		if(fncGetLength(m_message_title.value) > 0 && fncGetLength(m_message_body.value) == 0){
				fncAlert("メッセージ本文（携帯）を入力してください。",m_message_body);
				return false;
		}
		if(fncGetLength(m_message_title.value) == 0 && fncGetLength(m_message_body.value) > 0){
				fncAlert("メッセージタイトル（携帯）を入力してください。",m_message_title);
				return false;
		}
        if(cid == '4'){
		    if(fncGetLength(message_title.value) == 0 && fncGetLength(m_message_title.value) == 0 && fncGetLength(ap_message_title.value) == 0){
				fncAlert("（ＰＣ）もしくは（携帯）もしくは（アプリ）のメッセージタイトルを入力してください。",message_title);
				return false;
		    }
        }else{
            if(fncGetLength(message_title.value) == 0 && fncGetLength(m_message_title.value) == 0){
				fncAlert("（ＰＣ）もしくは（携帯）のメッセージタイトルを入力してください。",message_title);
				return false;
		    }
        
        }
        
        if(cid == '4'){
		    if(fncGetLength(message_body.value) == 0 && fncGetLength(m_message_body.value) == 0 && fncGetLength(ap_message_body.value) == 0){
				fncAlert("（ＰＣ）もしくは（携帯）もしくは（アプリ）のメッセージ本文を入力してください。",message_body);
				return false;
		    }
        }else{
        
            if(fncGetLength(message_body.value) == 0 && fncGetLength(m_message_body.value) == 0){
				fncAlert("（ＰＣ）もしくは（携帯）のメッセージ本文を入力してください。",message_body);
				return false;
            }
        
        }

<? if ($message_data['category_id'] != 1) { ?>
		if(fncGetLength(message_body.value) > 4000){
				fncAlert("メッセージ本文（ＰＣ）は全角2000文字以内で入力してください",message_body);
				return false;
		}
        
        if(cid == '4'){
            if(fncGetLength(ap_message_body.value) > 4000){
				fncAlert("メッセージ本文（アプリ）は全角2000文字以内で入力してください",ap_message_body);
				return false;
		    }
        }
		if(fncGetLength(m_message_body.value) > 4000){
				fncAlert("メッセージ本文（携帯）は全角2000文字以内で入力してください",m_message_body);
				return false;
		}
<? } ?>
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
		if(!fncEditConfirm()){
			return false;
		}
	}
}


/*--------------------------------------------------------
 * fncDelConfirm_3081
 * 概　要：削除ボタン押下時の確認ダイアログ
 * 引　数：
 * 戻り値：はい: true いいえ:false
--------------------------------------------------------*/
function fncDelConfirm_3081(cid){

    if(cid == '4'){
	    if(confirm('PC、アプリ、携帯、すべてのデータが削除されます。よろしいですか？')){
		    return true;
	    }else{
		    return false;
    	}
    }else{
        if(confirm('PC、携帯、両方のデータが削除されます。よろしいですか？')){
		    return true;
	    }else{
		    return false;
    	}
    }

}
