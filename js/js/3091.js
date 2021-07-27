// ���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(title.value) == "") {
			fncAlert("�^�C�g������͂��Ă�������",title);
			return false;
		}
		if(fncGetLength(title.value) > 256){
				fncAlert("�^�C�g���͑S�p120�����ȓ��œ��͂��Ă�������",title);
				return false;
		}
		if (fncTrim(question.value) == "") {
			fncAlert("�������͂��Ă�������",question);
			return false;
		}
		if(fncGetLength(question.value) > 2000){
				fncAlert("����͑S�p1000�����ȓ��œ��͂��Ă�������",question);
				return false;
		}
		if (fncTrim(question_explanation.value) == "") {
			fncAlert("����̐�������͂��Ă�������",question_explanation);
			return false;
		}
		if(fncGetLength(question_explanation.value) > 2000){
				fncAlert("����̐����͑S�p1000�����ȓ��œ��͂��Ă�������",question_explanation);
				return false;
		}

		if (fncTrim(year_from.value) == "") {
			fncAlert("�A���P�[�g�񓚊�������͂��Ă�������",year_from);
			return false;
		}
		
		if (fncTrim(month_from.value) == "") {
			fncAlert("�A���P�[�g�񓚊�������͂��Ă�������",month_from);
			return false;
		}
		
		if (fncTrim(day_from.value) == "") {
			fncAlert("�A���P�[�g�񓚊�������͂��Ă�������",day_from);
			return false;
		}
		
		if (fncTrim(year_to.value) == "") {
			fncAlert("�A���P�[�g�񓚊�������͂��Ă�������",year_to);
			return false;
		}
		
		if (fncTrim(month_to.value) == "") {
			fncAlert("�A���P�[�g�񓚊�������͂��Ă�������",month_to);
			return false;
		}
		
		if (fncTrim(day_to.value) == "") {
			fncAlert("�A���P�[�g�񓚊�������͂��Ă�������",day_to);
			return false;
		}

		if((plural.value == 1) && (max_choice.value == "")){
			fncAlert("�����I�����̑I���ő吔����͂��ĉ�����",max_choice);
			return false;
		}
		
		if(fncCheckMaxChoice(max_choice.value) == false){
			fncAlert("�����I�����̑I���ő吔��0�ȏ�̐�������͂��Ă�������",max_choice);
			return false;		
		}
		
		var response_from = year_from.value + ("00" + month_from.value ).slice(-2) + ("00" + day_from.value ).slice(-2) + ("00" + hour_from.value ).slice(-2);		
		var response_from_yymmdd = year_from.value + ("00" + month_from.value ).slice(-2) + ("00" + day_from.value ).slice(-2);
		var response_from_hh = ("00" + hour_from.value ).slice(-2);

		if(fncGetLength(response_from) != 10){
			fncAlert("�A���P�[�g�񓚊����𐳂������͂��Ă�������",year_from);
			return false;
		}
		if (fncChkDate(response_from_yymmdd) == false ) {
			fncAlert("�A���P�[�g�񓚊����𐳂������͂��Ă�������",year_from);
			return false;
		}
		if (fncChkHour(response_from_hh) == false ) {
			fncAlert("�A���P�[�g�񓚊����𐳂������͂��Ă�������",hour_from);
			return false;
		}			


		var response_to = year_to.value + ("00" + month_to.value ).slice(-2) + ("00" + day_to.value ).slice(-2) + ("00" + hour_to.value ).slice(-2);		
		var response_to_yymmdd = year_to.value + ("00" + month_to.value ).slice(-2) + ("00" + day_to.value ).slice(-2);
		var response_to_hh = ("00" + hour_to.value ).slice(-2);

		
		if(fncGetLength(response_to) != 10){
			fncAlert("�A���P�[�g�񓚊����𐳂������͂��Ă�������",year_to);
			return false;
		}
		if (fncChkDate(response_to_yymmdd) == false ) {
			fncAlert("�A���P�[�g�񓚊����𐳂������͂��Ă�������",year_to);
			return false;
		}
		if (fncChkHour(response_to_hh) == false ) {
			fncAlert("�A���P�[�g�񓚊����𐳂������͂��Ă�������",hour_to);
			return false;
		}
		
		if (response_from > response_to) {
			fncAlert("�A���P�[�g�񓚊��i�e�q�n�l�j���A���P�[�g�񓚊��i�s�n�j�œ��͂��Ă�������",year_from);
			return false;	
		}					
				
	    for(i = 0; i < count.value; ++i){	
		var name = "choice[" + i + "]";	
			if(fncGetLength(form_inp.elements[name].value) > 640){
					fncAlert("�I�����͑S�p320�����ȓ��œ��͂��Ă�������",form_inp.elements[name]);
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