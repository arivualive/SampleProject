// 質問カテゴリ用入力チェック 
function InputChk() {
	with (document.form_inp){
		if(fncGetLength(faq_name.value) <= 0){
				fncAlert("分類名を入力してください",faq_name);
				return false;
		}
		if(fncGetLength(faq_name.value) > 200){
				fncAlert("分類名は全角100文字以内で入力してください",faq_name);
				return false;
		}
		if(sort_no.value.length == 0) {
				fncAlert("ソート順を入力してください",sort_no);
				return false;
		} else if(fncGetLength(sort_no.value) > 3){
				fncAlert("ソート順は半角3バイト以内で入力してください",sort_no);
				return false;
		} else if (fncJudgeNumber(sort_no.value) == false) {
				fncAlert("ソート順は半角数字で入力してください",sort_no);
				return false;
        }
		if(!fncEditConfirm()){
			return false;
		}
	}
}
function faqDelConfirm() {
	if(!fncDelConfirm()){
		return false;
	}
	if(!confirm('質問カテゴリーに付随する質問も削除されますが、宜しいですか？')){
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
