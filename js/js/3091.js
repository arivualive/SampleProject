// 入力チェック 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(title.value) == "") {
			fncAlert("タイトルを入力してください",title);
			return false;
		}
		if(fncGetLength(title.value) > 256){
				fncAlert("タイトルは全角120文字以内で入力してください",title);
				return false;
		}
		if (fncTrim(question.value) == "") {
			fncAlert("質問を入力してください",question);
			return false;
		}
		if(fncGetLength(question.value) > 2000){
				fncAlert("質問は全角1000文字以内で入力してください",question);
				return false;
		}
		if (fncTrim(question_explanation.value) == "") {
			fncAlert("質問の説明を入力してください",question_explanation);
			return false;
		}
		if(fncGetLength(question_explanation.value) > 2000){
				fncAlert("質問の説明は全角1000文字以内で入力してください",question_explanation);
				return false;
		}

		if (fncTrim(year_from.value) == "") {
			fncAlert("アンケート回答期限を入力してください",year_from);
			return false;
		}
		
		if (fncTrim(month_from.value) == "") {
			fncAlert("アンケート回答期限を入力してください",month_from);
			return false;
		}
		
		if (fncTrim(day_from.value) == "") {
			fncAlert("アンケート回答期限を入力してください",day_from);
			return false;
		}
		
		if (fncTrim(year_to.value) == "") {
			fncAlert("アンケート回答期限を入力してください",year_to);
			return false;
		}
		
		if (fncTrim(month_to.value) == "") {
			fncAlert("アンケート回答期限を入力してください",month_to);
			return false;
		}
		
		if (fncTrim(day_to.value) == "") {
			fncAlert("アンケート回答期限を入力してください",day_to);
			return false;
		}

		if((plural.value == 1) && (max_choice.value == "")){
			fncAlert("複数選択時の選択最大数を入力して下さい",max_choice);
			return false;
		}
		
		if(fncCheckMaxChoice(max_choice.value) == false){
			fncAlert("複数選択時の選択最大数は0以上の整数を入力してください",max_choice);
			return false;		
		}
		
		var response_from = year_from.value + ("00" + month_from.value ).slice(-2) + ("00" + day_from.value ).slice(-2) + ("00" + hour_from.value ).slice(-2);		
		var response_from_yymmdd = year_from.value + ("00" + month_from.value ).slice(-2) + ("00" + day_from.value ).slice(-2);
		var response_from_hh = ("00" + hour_from.value ).slice(-2);

		if(fncGetLength(response_from) != 10){
			fncAlert("アンケート回答期限を正しく入力してください",year_from);
			return false;
		}
		if (fncChkDate(response_from_yymmdd) == false ) {
			fncAlert("アンケート回答期限を正しく入力してください",year_from);
			return false;
		}
		if (fncChkHour(response_from_hh) == false ) {
			fncAlert("アンケート回答期限を正しく入力してください",hour_from);
			return false;
		}			


		var response_to = year_to.value + ("00" + month_to.value ).slice(-2) + ("00" + day_to.value ).slice(-2) + ("00" + hour_to.value ).slice(-2);		
		var response_to_yymmdd = year_to.value + ("00" + month_to.value ).slice(-2) + ("00" + day_to.value ).slice(-2);
		var response_to_hh = ("00" + hour_to.value ).slice(-2);

		
		if(fncGetLength(response_to) != 10){
			fncAlert("アンケート回答期限を正しく入力してください",year_to);
			return false;
		}
		if (fncChkDate(response_to_yymmdd) == false ) {
			fncAlert("アンケート回答期限を正しく入力してください",year_to);
			return false;
		}
		if (fncChkHour(response_to_hh) == false ) {
			fncAlert("アンケート回答期限を正しく入力してください",hour_to);
			return false;
		}
		
		if (response_from > response_to) {
			fncAlert("アンケート回答期（ＦＲＯＭ）≦アンケート回答期（ＴＯ）で入力してください",year_from);
			return false;	
		}					
				
	    for(i = 0; i < count.value; ++i){	
		var name = "choice[" + i + "]";	
			if(fncGetLength(form_inp.elements[name].value) > 640){
					fncAlert("選択肢は全角320文字以内で入力してください",form_inp.elements[name]);
					return false;
			}	
		}


		
						
		if(!fncEditConfirm()){
			return false;
		}
	}
}

function fncChkHour(st_time) {
	str= ""+ st_time;
	blnFlag=isNaN(str);

	if (((str=="") || (blnFlag==true)) || (str.length != 2)) {
		return false;
	} else {
		if (str > 23) {
			return false;
		}
		return true;
	}
}

function fncCheckMaxChoice(max_choice) {
	int= ""+ max_choice;
	blnFlag=isNaN(int);

	if ((blnFlag==true) || (int < 0)) {
		return false;
	} else {
		return true;
	}
}


function JsOpenWin( JsUrl , JSWidth , JSHeight ){
	var JsObjWin;
	var JsProperty = "toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=yes,resizable=yes,width=" + JSWidth + ",height=" + JSHeight;
	JsObjWin = window.open( JsUrl, "_", JsProperty );
	JsObjWin.focus();
}