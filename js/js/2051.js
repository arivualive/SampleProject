// ���̓`�F�b�N 
function InputChk() {
	with (document.edit){

		if(fncGetLength(kainno.value) > 8){
				fncAlert("�l�b�g���ID�͔��p8�����ȓ��œ��͂��Ă�������",kainno);
				return false;
		}
		
		if( (!fncJudgeHankaku(kainno.value))  && (fncTrim(kainno.value) != "") ){
			fncAlert("�l�b�g���ID�͔��p�p�����œ��͂��Ă�������",kainno);
			return false;
		}	
		
		if(fncGetLength(handle_nm.value) > 18){
				fncAlert("�n���h�����͑S�p9�����ȓ��œ��͂��Ă�������",handle_nm);
				return false;
		}		
		
		if ( (fncChkDateTime(toko_from.value) == false) && (fncTrim(toko_from.value) != "") ) {
			fncAlert("���e��(FROM)�𐳂������͂��Ă�������",toko_from);
			return false;
		}
		
		if ((fncChkDateTime(toko_to.value) == false) && (fncTrim(toko_to.value) != "") ) {
			fncAlert("���e��(TO)�𐳂������͂��Ă�������",toko_to);
			return false;
		}								
	}
}

//�X�V���̓��̓`�F�b�N
function UpdateInputChk() {
	with (document.form_inp){

		if(fncGetLength(q01_comment.value) > 4000){
				fncAlert("Q1-1�̂��̑��R�����g�͑S�p2000�����ȓ��œ��͂��Ă�������",q01_comment);
				return false;
		}

		if(fncGetLength(q02_comment.value) > 4000){
				fncAlert("Q2�̂��̑��R�����g�͑S�p2000�����ȓ��œ��͂��Ă�������",q02_comment);
				return false;
		}
		
		if(fncGetLength(q03_comment.value) > 4000){
				fncAlert("Q3�̃R�����g�͑S�p2000�����ȓ��œ��͂��Ă�������",q03_comment);
				return false;
		}
		
		if(fncGetLength(q04_comment.value) > 4000){
				fncAlert("Q4�̃R�����g�͑S�p2000�����ȓ��œ��͂��Ă�������",q04_comment);
				return false;
		}
		
		if(fncGetLength(advice.value) > 4000){
				fncAlert("Q5�̃A�h�o�C�X�͑S�p2000�����ȓ��œ��͂��Ă�������",advice);
				return false;
		}
		
		if(CheckHankakuKana(advice.value) == true){
			fncAlert("Q5�̃A�h�o�C�X�ɔ��p�J�i���܂܂�Ă��܂�",advice);
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

// TODO: 2051.js�Ɉړ�
function remakeQ01_reason(sel_item) {
	// Q01-2����
	var DEF_Q01 = new Array('�����Ɂu���ʁv�������Ă��邩��','�u�g�p���v���C�ɂ����Ă��邩��','�u�������O�Ɋ�Â����{���Áv�̍l�����ɋ����ł��邩��','�u�V�R�R�������v�ɂ������A150��ވȏ�g���Ă��邩��','�i�����ǂ����S�ł��邩��','�N����̊�b���ϕi������','�d�b��l�b�g�ȂǂŁA�u���̑��k�v���ł��邩��','���̑�');
	// Q01-2�ő�v��
        
	// Option�N���A
	var cnt = document.getElementById("q01_reason").options.length;
	
	for (i = 0; i < cnt; i++) {
	document.getElementById("q01_reason").remove(document.getElementById("q01_reason").options.length - 1);
	}
	// Option�č쐬
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
        
	// �f�t�H���g�ݒ�
	if (document.form_inp.q01_reason.length == 0) {
		document.form_inp.q01_reason.length++;
		document.form_inp.q01_reason.options[document.form_inp.q01_reason.length - 1].text  = "���I��";
		document.form_inp.q01_reason.options[document.form_inp.q01_reason.length - 1].value = "";
	}
}

// ���p�J�i�`�F�b�N
function CheckHankakuKana(value) {
	var regex = "�������������������������������������������ܦݧ���������������";
	for (i = 0; i < value.length; i++) {
		if (regex.indexOf(value.charAt(i), 0) >= 0) {
			return true;
		}
	}
	return false;
}