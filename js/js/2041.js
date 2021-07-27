// ���̓`�F�b�N 
function InputChk() {
	with (document.edit){

		if(fncGetLength(kainno.value) > 8){
				fncAlert("����ԍ��͔��p8�����ȓ��œ��͂��Ă�������",kainno);
				return false;
		}
		
		if( (!fncJudgeHankaku(kainno.value))  && (fncTrim(kainno.value) != "") ){
			fncAlert("����ԍ��͔��p�p�����œ��͂��Ă�������",kainno);
			return false;
		}	

		var start = fromyear.value + ("00" + frommonth.value ).slice(-2) + ("00" + fromday.value ).slice(-2);
		if (fromyear.value + frommonth.value + fromday.value != "") {
			if (fncChkDate(start) == "") {
				fncAlert("���e���i�e�q�n�l�j�͐��������͂��Ă�������",fromyear);
				return false;
			}
		}
		var end = toyear.value + ("00" + tomonth.value ).slice(-2) + ("00" + today.value ).slice(-2);
		if (toyear.value + tomonth.value + today.value != "") {
			if (fncChkDate(end) == "") {
				fncAlert("���e���i�s�n�j�͐��������͂��Ă�������",toyear);
				return false;
			}
			if (toyear.value + tomonth.value + today.value != "") {
				if (start > end) {
					fncAlert("���e���i�e�q�n�l�j�� ���e���i�s�n�j�œ��͂��Ă�������",toyear);
					return false;
				}
			}
		}
		
		mode.value="find";
		return true;
	}
}

//�N���A�{�^�� 
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


//CSV�o�� 
function outputCSV() {
	if (InputChk()) {
		document.edit.mode.value="csv";
		document.edit.submit();
	}
	return false;
}

// �ꊇ�`�F�b�N
function BulkCheck() {
	var inputs = document.getElementsByClassName('BulkEditCheck');
	for (var i =0; i< inputs.length; i++) {
		inputs[i].checked = true;
	}
	return false;
}

// ���J����/����J�ɂ���
function BulkPublish(publish) {
	// �`�F�b�N
	var inputs = document.getElementsByClassName('BulkEditCheck');
	var isChecked = false;
	for (var i =0; i< inputs.length; i++) {
		if (inputs[i].checked == true) {
			isChecked = true;
			break;
		}
	}
	if (isChecked == false) {
		window.alert("�ύX���铊�e�Ƀ`�F�b�N������Ă��������B");
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


//�X�V���̓��̓`�F�b�N
function UpdateInputChk() {
	with (document.form_inp){

		if (fncTrim(kain_nm.value) == "") {
			fncAlert("�����O����͂��Ă�������",kain_nm);
			return false;
		}
		
		if(fncGetLength(kain_nm.value) > 30){
				fncAlert("�����O�͑S�p15�����ȓ��œ��͂��Ă�������",kain_nm);
				return false;
		}
		
		if (fncTrim(voice.value) == "") {
			fncAlert("�͂��߂����R����͂��Ă�������",voice);
			return false;
		}
		
		if(fncGetLength(voice.value) > 2000){
				fncAlert("�͂��߂����R�͑S�p1000�����ȓ��œ��͂��Ă�������",voice);
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

		//�[�N�Ή�
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