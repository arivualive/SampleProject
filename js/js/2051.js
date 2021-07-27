// 入力チェック 
function InputChk() {
	with (document.edit){

		if(fncGetLength(kainno.value) > 8){
				fncAlert("ネット会員IDは半角8文字以内で入力してください",kainno);
				return false;
		}
		
		if( (!fncJudgeHankaku(kainno.value))  && (fncTrim(kainno.value) != "") ){
			fncAlert("ネット会員IDは半角英数字で入力してください",kainno);
			return false;
		}	
		
		if(fncGetLength(handle_nm.value) > 18){
				fncAlert("ハンドル名は全角9文字以内で入力してください",handle_nm);
				return false;
		}		
		
		if ( (fncChkDateTime(toko_from.value) == false) && (fncTrim(toko_from.value) != "") ) {
			fncAlert("投稿日(FROM)を正しく入力してください",toko_from);
			return false;
		}
		
		if ((fncChkDateTime(toko_to.value) == false) && (fncTrim(toko_to.value) != "") ) {
			fncAlert("投稿日(TO)を正しく入力してください",toko_to);
			return false;
		}								
	}
}

//更新時の入力チェック
function UpdateInputChk() {
	with (document.form_inp){

		if(fncGetLength(q01_comment.value) > 4000){
				fncAlert("Q1-1のその他コメントは全角2000文字以内で入力してください",q01_comment);
				return false;
		}

		if(fncGetLength(q02_comment.value) > 4000){
				fncAlert("Q2のその他コメントは全角2000文字以内で入力してください",q02_comment);
				return false;
		}
		
		if(fncGetLength(q03_comment.value) > 4000){
				fncAlert("Q3のコメントは全角2000文字以内で入力してください",q03_comment);
				return false;
		}
		
		if(fncGetLength(q04_comment.value) > 4000){
				fncAlert("Q4のコメントは全角2000文字以内で入力してください",q04_comment);
				return false;
		}
		
		if(fncGetLength(advice.value) > 4000){
				fncAlert("Q5のアドバイスは全角2000文字以内で入力してください",advice);
				return false;
		}
		
		if(CheckHankakuKana(advice.value) == true){
			fncAlert("Q5のアドバイスに半角カナが含まれています",advice);
			return false;
		}
		
													
		if(!fncEditConfirm()){
			return false;
		}					
	}		
}

	
function fncChkDateTime(hiduke) {

	str= ""+ hiduke;

	if (str=="") {
		return false;
	} else {
		start = str.indexOf('/');
		if (start == -1)
			return false;
		TYEAR = str.substring(0, start);
		
		end = str.indexOf('/', start + 1);
		if (end == -1)
			return false;
		TMNT = str.substring(start + 1, end);
		if (end + 1 >= str.length)
			return false;
		TDAY = str.substring(end + 1);

		if (isNaN(TYEAR)  || isNaN(TMNT)  || isNaN(TDAY) )
		{
			return false;
		}
			
		var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
		year = Number(TYEAR);
		mnt = Number(TMNT) -1;

		//閏年対応
		if (mnt==1) {
			if(((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) {
				monthDays[1] = 29
			}
		}

		if ((0>=TDAY) || (TDAY>monthDays[mnt]) || (0>=TMNT) || (TMNT>12)) {
			return false;
		} else return true;
	}
}

// TODO: 2051.jsに移動
function remakeQ01_reason(sel_item) {
	// Q01-2項目
	var DEF_Q01 = new Array('お肌に「効果」を感じているから','「使用感」が気にいっているから','「漢方理念に基づく根本治療」の考え方に共感できるから','「天然由来成分」にこだわり、150種類以上使っているから','品質が良く安心できるから','年齢肌専門の基礎化粧品だから','電話やネットなどで、「肌の相談」ができるから','その他');
	// Q01-2最大要因
        
	// Optionクリア
	var cnt = document.getElementById("q01_reason").options.length;
	
	for (i = 0; i < cnt; i++) {
	document.getElementById("q01_reason").remove(document.getElementById("q01_reason").options.length - 1);
	}
	// Option再作成
	for (i = 0; i < document.form_inp.q01_content.length; i++) {
	if (document.form_inp.q01_content[i].checked == true) {
		document.form_inp.q01_reason.length++;
		document.form_inp.q01_reason.options[document.form_inp.q01_reason.length - 1].text  = DEF_Q01[i];
		document.form_inp.q01_reason.options[document.form_inp.q01_reason.length - 1].value = document.form_inp.q01_content[i].value;
		if (sel_item == document.form_inp.q01_content[i].value) {
			document.form_inp.q01_reason.options[document.form_inp.q01_reason.length - 1].selected = true;
		}
	}
}
        
	// デフォルト設定
	if (document.form_inp.q01_reason.length == 0) {
		document.form_inp.q01_reason.length++;
		document.form_inp.q01_reason.options[document.form_inp.q01_reason.length - 1].text  = "未選択";
		document.form_inp.q01_reason.options[document.form_inp.q01_reason.length - 1].value = "";
	}
}

// 半角カナチェック
function CheckHankakuKana(value) {
	var regex = "ｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜｦﾝｧｨｩｪｫｬｭｮｯｰ､｡｢｣ﾞﾟ";
	for (i = 0; i < value.length; i++) {
		if (regex.indexOf(value.charAt(i), 0) >= 0) {
			return true;
		}
	}
	return false;
}