// 入力チェック 
function InputChk() {
	with (document.edit){

		if(fncGetLength(kainno.value) > 8){
				fncAlert("会員番号は半角8文字以内で入力してください",kainno);
				return false;
		}
		
		if( (!fncJudgeHankaku(kainno.value))  && (fncTrim(kainno.value) != "") ){
			fncAlert("会員番号は半角英数字で入力してください",kainno);
			return false;
		}	

		var start = fromyear.value + ("00" + frommonth.value ).slice(-2) + ("00" + fromday.value ).slice(-2);
		if (fromyear.value + frommonth.value + fromday.value != "") {
			if (fncChkDate(start) == "") {
				fncAlert("投稿日（ＦＲＯＭ）は正しく入力してください",fromyear);
				return false;
			}
		}
		var end = toyear.value + ("00" + tomonth.value ).slice(-2) + ("00" + today.value ).slice(-2);
		if (toyear.value + tomonth.value + today.value != "") {
			if (fncChkDate(end) == "") {
				fncAlert("投稿日（ＴＯ）は正しく入力してください",toyear);
				return false;
			}
			if (toyear.value + tomonth.value + today.value != "") {
				if (start > end) {
					fncAlert("投稿日（ＦＲＯＭ）≦ 投稿日（ＴＯ）で入力してください",toyear);
					return false;
				}
			}
		}
		
		mode.value="find";
		return true;
	}
}

//クリアボタン 
function ClearButton() {
	var inputs = document.getElementsByTagName('input');
	for (var i=0; i<inputs.length; i++) {
		if (inputs[i].type == 'text') inputs[i].value = '';
		else if (inputs[i].type == 'checkbox') inputs[i].checked = false;
	}
	inputs = document.getElementsByTagName('option');
	for (var i=0; i<inputs.length; i++) {
		inputs[i].selected = false;
	}
	return false;
}


//CSV出力 
function outputCSV() {
	if (InputChk()) {
		document.edit.mode.value="csv";
		document.edit.submit();
	}
	return false;
}

// 一括チェック
function BulkCheck() {
	var inputs = document.getElementsByClassName('BulkEditCheck');
	for (var i =0; i< inputs.length; i++) {
		inputs[i].checked = true;
	}
	return false;
}

// 公開する/非公開にする
function BulkPublish(publish) {
	// チェック
	var inputs = document.getElementsByClassName('BulkEditCheck');
	var isChecked = false;
	for (var i =0; i< inputs.length; i++) {
		if (inputs[i].checked == true) {
			isChecked = true;
			break;
		}
	}
	if (isChecked == false) {
		window.alert("変更する投稿にチェックをいれてください。");
		return false;
	}
	
	var disp_flg = document.getElementById('bulk_disp_flg');
	if (publish) {
		disp_flg.value = 'publish';
	} else {
		disp_flg.value = 'unpublish';
	}
	document.forms.BulkEdit.submit();
	return false;
}


//更新時の入力チェック
function UpdateInputChk() {
	with (document.form_inp){

		if (fncTrim(kain_nm.value) == "") {
			fncAlert("お名前を入力してください",kain_nm);
			return false;
		}
		
		if(fncGetLength(kain_nm.value) > 30){
				fncAlert("お名前は全角15文字以内で入力してください",kain_nm);
				return false;
		}
		
		if (fncTrim(voice.value) == "") {
			fncAlert("はじめた理由を入力してください",voice);
			return false;
		}
		
		if(fncGetLength(voice.value) > 2000){
				fncAlert("はじめた理由は全角1000文字以内で入力してください",voice);
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