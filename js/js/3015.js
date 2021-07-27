// 質問用入力チェック 
function InputChk() {
	with (document.form_inp){

		// 質問
		{
			// 最大文字数エラー
			if(faq_question.value.length > 1000){
				fncAlert("質問は1000文字以内で入力してください",faq_question);
				return false;
			}
			
			// 未入力エラー
			if(faq_question.value.length <= 0){
				fncAlert("質問を入力してください",faq_question);
				return false;
			}
		}
		
		// 回答1
		{
			// 最大文字数エラー
			if(faq_answer1.value.length > 2000){
				fncAlert("回答1は2000文字以内で入力してください",faq_answer1);
				return false;
			}
			
			// 未入力エラー
			if(faq_answer1.value.length <= 0){
				fncAlert("回答1を入力してください",faq_answer1);
				return false;
			}
		}
		
		// 回答2
		{
			// 最大文字数エラー
			if(faq_answer2.value.length > 2000){
				fncAlert("回答2は2000文字以内で入力してください",faq_answer2);
				return false;
			}
		}
		
		// タグ
		{
			// 最大文字数エラー(全体)
			if(faq_tags.value.length > 309){
				fncAlert("タグは309文字以内で入力してください",faq_tags);
				return false;
			}
			
			// 最大個数エラー
			var tags = faq_tags.value.split(';');
			if (tags.length > 10) {
				fncAlert("タグは10個以内で入力してください",faq_tags);
				return false;
			}
			
			// 最大文字数エラー(タグ毎)
			for (var i = 0; i < tags.length; i++) {
				var tag = tags[i].trim();
				if(tag.length > 30){
					fncAlert("タグは30文字以内で入力してください",faq_tags);
					return false;
				}
			}
		}
		
		//デスクリプション 2021/01/30
		{
			// 最大文字数エラー
			if(faq_description.value.length > 200){
				fncAlert("ディスクリプションは200文字以内で入力してください",faq_description);
				return false;
			}
		}

		//重要度 2021/03/22
		{
			//0～9の数値のみ入力可能
			if((/^([0-9])+$/.test(faq_important.value) == false) || (faq_important.value < 0) || (faq_important.value > 9)){
				fncAlert("重要度は1桁の半角数値を入力してください",faq_important);
				return false;
			}
		}

		//PV数 2021/03/22
		{
			//0～9999999の数値のみ入力可能
			if((/^([0-9])+$/.test(faq_pv_count.value) == false) || (faq_pv_count.value < 0) || (faq_pv_count.value > 9999999)){
				fncAlert("PV数は7桁以内の半角数値を入力してください",faq_pv_count);
				return false;
			}
		}

		//よく見られているご質問表示位置 2021/03/22
		{
			//0～9の数値のみ入力可能
			if((/^([0-9])+$/.test(faq_topics_no.value) == false) || (faq_topics_no.value < 0) || (faq_topics_no.value > 9)){
				fncAlert("よく見られているご質問表示位置は1桁の半角数値を入力してください",faq_topics_no);
				return false;
			}
		}
		
		if(!fncEditConfirm()){
			return false;
		}
	}
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

/*--------------------------------------------------------
 * fncDownloadAllFaqCsvFile
 * 概　要：CSV一括ダウンロード
--------------------------------------------------------*/
function fncDownloadAllFaqCsvFile(){
	var param = document.faq_category_form.faq_category.selectedIndex;
	var url = "download.php";
	if(param != ""){
		url += '?faq_category=' + param;
	}
	window.open(url);
}
