/*--------------------------------------------------------
 * fncEditConfirm
 * �T�@�v�F�X�V�{�^���������̊m�F�_�C�A���O
 * ���@���F
 * �߂�l�F�͂�: true ������:false
--------------------------------------------------------*/
function fncEditConfirm(){

	if(confirm('�X�V����܂��B��낵���ł����H')){
		return true;
	}else{
		return false;
	}

}
/*--------------------------------------------------------
 * fncDelConfirm
 * �T�@�v�F�폜�{�^���������̊m�F�_�C�A���O
 * ���@���F
 * �߂�l�F�͂�: true ������:false
--------------------------------------------------------*/
function fncDelConfirm(){

	if(confirm('�폜����܂��B��낵���ł����H')){
		return true;
	}else{
		return false;
	}

}

/*--------------------------------------------------------
 * fncSendConfirm
 * �T�@�v�F���M�{�^���������̊m�F�_�C�A���O
 * ���@���F
 * �߂�l�F�͂�: true ������:false
--------------------------------------------------------*/
function fncSendConfirm(){

	if(confirm('���M����܂��B��낵���ł����H')){
		return true;
	}else{
		return false;
	}

}

/*--------------------------------------------------------
 * fncTrim
 * �T�@�v�F�������̑S�p�A���p�X�y�[�X���폜
 * ���@���F�Ώە�����
 * �߂�l�F�S�p�A���p�X�y�[�X�폜��̕�����
--------------------------------------------------------*/
function fncTrim(str){
	str = str.replace(/^[ �@]+/,"");
	str = str.replace(/[ �@]+$/,"");
	return(str);
}

/*--------------------------------------------------------
 * fncJudgeHankaku
 * �T�@�v�F���p�p�����`�F�b�N
 * ���@���F�Ώە�����
 * �߂�l�F���p�p�����̏ꍇ�Ftrue�A����ȊO�̕������܂܂�Ă���ꍇ�Ffalse
--------------------------------------------------------*/
function fncJudgeHankaku(String){

	if ( !/^[a-zA-Z0-9]+$/.test(String)) { 
		return false;
	}

	return true;
}

/*--------------------------------------------------------
 * fncJudgeAlpha
 * �T�@�v�F���p�p���`�F�b�N
 * ���@���F�Ώە�����
 * �߂�l�F���p�p���̏ꍇ�Ftrue�A����ȊO�̕������܂܂�Ă���ꍇ�Ffalse
--------------------------------------------------------*/
function fncJudgeAlpha(String) {
	if ( !/^[a-zA-Z]+$/.test(String)) { 
		return false;
	}

	return true;
}

/*--------------------------------------------------------
 * fncJudgeNumber
 * �T�@�v�F���p�����`�F�b�N
 * ���@���F�Ώە�����
 * �߂�l�F���p�����̏ꍇ�Ftrue�A����ȊO�̕������܂܂�Ă���ꍇ�Ffalse
--------------------------------------------------------*/
function fncJudgeNumber(String) {
	if ( !/^[0-9]+$/.test(String)) { 
		return false;
	}

	return true;
}


/*--------------------------------------------------------
 * fncChkTime
 * �T�@�v�F���ԑÓ����`�F�b�N�֐�
 * ���@���F�Ώە�����(hh24mi)
 * �߂�l�F�������ꍇ�Ftrue�A�������Ȃ��ꍇ�Ffalse
--------------------------------------------------------*/
function fncChkTime(st_time) {
	str= ""+ st_time;
	blnFlag=isNaN(str);

	if (((str=="") || (blnFlag==true)) || (str.length != 4)) {
		return false;
	} else {
		THOUR = st_time.substr(0,2);
		TMIN = st_time.substr(2,2);
		if (THOUR > 23) {
			return false;
		}
		if (TMIN > 59) {
			return false;
		}
		return true;
	}
}
/*--------------------------------------------------------
 * fncChkDate
 * �T�@�v�F���t�Ó����`�F�b�N�֐�
 * ���@���F�Ώە�����(yyyymmdd)
 * �߂�l�F�������ꍇ�Ftrue�A�������Ȃ��ꍇ�Ffalse
--------------------------------------------------------*/
function fncChkDate(hiduke) {

	str= ""+ hiduke;
	blnFlag=isNaN(str);
	
	if (((str=="") || (blnFlag==true)) || (str.length != 8)) {
		return false;
	} else {

		TYEAR = hiduke.substr(0,4);
		TMNT = hiduke.substr(4,2);
		TDAY = hiduke.substr(6,2);
		var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31)
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
/*--------------------------------------------------------
 * fncGetLength
 * �T�@�v�F�������`�F�b�N�֐�
 * ���@���F�Ώە�����
 * �߂�l�F�Ώە�����̃o�C�g��
 * ���@�l�F�S�p�P�����́A�Q�����Ƃ݂Ȃ�
--------------------------------------------------------*/
function fncGetLength(str) {

	var i;
	var c;
	var cnt = 0;

	for (i=0; i<str.length; i++) {
		c = str.charCodeAt(i);

		if ( (c >= 0x0 && c < 0x81) || (c == 0xf8f0) || (c >= 0xff61 && c < 0xffa0) || (c >= 0xf8f1 && c < 0xf8f4)) {
			cnt += 1;
		} else {
			cnt += 2;
		}
	}

	return cnt;

}
/*--------------------------------------------------------
 * fncChkUrl
 * �T�@�v�FURL�`�F�b�N�֐�
 * ���@���F�Ώە�����
 * �߂�l�F�������ꍇ�Ftrue�@�������Ȃ��ꍇ�Ffalse
--------------------------------------------------------*/
function fncChkUrl(url_str){
	if (url_str.match(/(http|ftp):\/\/[!#-9A-~]/i)) {
		if (ZenkakuCheck(url_str)) {
			return false;
		} else {
			return true;
		}
	}else{
		return false;
	}
}

/*--------------------------------------------------------
 * fncChkZenkaku
 * �T�@�v�F�S�p�������܂܂�Ă��邩�`�F�b�N����֐�
 * ���@���F�Ώە�����
 * �߂�l�F�܂܂�Ă���ꍇ�Ftrue�@�܂܂�Ă��Ȃ��ꍇ�Ffalse
--------------------------------------------------------*/
function fncChkZenkaku(chk_str) {
	var str = chk_str;
	for (i=0;i<str.length;i++) {
		if (escape(str.charAt(i)).length>=4) {
//			alert("�S�p�������܂܂�Ă��܂�");
			return true;
		}
	}
	return false;
}

/*--------------------------------------------------------
 * fncChkKana
 * �T�@�v�F���p�J�i�`�F�b�N�֐�
 * ���@���F�Ώە�����
 * �߂�l�F�S�Ĕ��p�J�i�̏ꍇ�Ftrue�@���p�J�i�ȊO���܂܂�Ă���ꍇ�Ffalse
--------------------------------------------------------*/
function fncChkKana(theForm) {
	var text = theForm;
	var ret = true;
	var flg = true;
	var str = "";

	for ( i = 0 ; i < text.length ; i++ ) {
		str = text.substring(i, i+1);
		ret = isHankaku(str);
		if (!ret && str != " "){
			flg = false;
		}
	}
	if(!flg){
		return(false);
	}else{
		return(true);
	}
}

function isHankaku(str) {
	var esc_str = escape(str);
	var ms = navigator.appVersion.indexOf("MSIE");
	var nesc = navigator.appName.lastIndexOf("Netscape");
	
	if(nesc >= 0){
		if ( (esc_str.indexOf('%A') == 0) ||
			(esc_str.indexOf('%B') == 0) ||
			(esc_str.indexOf('%C') == 0) ||
			(esc_str.indexOf('%D') == 0) ){
			return(true);
		}
	}else if(ms > 0){
		if((esc_str.indexOf('%uFF6') == 0) ||
			(esc_str.indexOf('%uFF7') == 0) ||
			(esc_str.indexOf('%uFF8') == 0) ||
			(esc_str.indexOf('%uFF9') == 0) ) {
			return(true);
		}
	}

	return(false);
}
//R-#14022
function isNgWord(str){
	var illegal_str = '';
	var characterKanji = "�@�A�B�C�D�E�F�G�H�I�J�K�L�M�N�O�P�Q�R�S�T�U�V�W�X�Y�Z�[�\�]�_�`�a�b�c�d�e�f�g�h�i�j�k�l�m�n�o�p�q�r�s�t�u�~�����������������������������������߁燓����ہڇ����恿���\�]�^�_�`�a�b�c�d�e�f�g�h�i�j�k�l�m�n�o�p�q�r�s�t�u�v�w�x�y�z�{�|�}�~�����������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������@�A�B�C�D�E�F�G�H�I�J�K�L�M�N�O�P�Q�R�S�T�U�V�W�X�Y�Z�[�\�]�^�_�`�a�b�c�d�e�f�g�h�i�j�k�l�m�n�o�p�q�r�s�t�u�v�w�x�y�z�{�|�}�~�����������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������@�A�B�C�D�E�F�G�H�I�J�K�@�A�B�C�D�E�F�G�H�I���U�V�W�������������������������������������������������������������������������ØĘŘƘǘȘɘʘ˘̘͘ΘϘИјҘӘԘ՘֘טؘ٘ژۘܘݘޘߘ���������������������������������������@�A�B�C�D�E�F�G�H�I�J�K�L�M�N�O�P�Q�R�S�T�U�V�W�X�Y�Z�[�\�]�^�_�`�a�b�c�d�e�f�g�h�i�j�k�l�m�n�o�p�q�r�s�t�u�v�w�x�y�z�{�|�}�~�������������������������������������������������������������������������������������������������������������������������������������ÙęřƙǙșəʙ˙̙͙ΙϙЙљҙәԙՙ֙יؙٙڙۙܙݙޙߙ���������������������������������������@�A�B�C�D�E�F�G�H�I�J�K�L�M�N�O�P�Q�R�S�T�U�V�W�X�Y�Z�[�\�]�^�_�`�a�b�c�d�e�f�g�h�i�j�k�l�m�n�o�p�q�r�s�t�u�v�w�x�y�z�{�|�}�~�������������������������������������������������������������������������������������������������������������������������������������ÚĚŚƚǚȚɚʚ˚͚̚ΚϚКњҚӚԚ՚֚ךؚٚښۚܚݚޚߚ���������������������������������������@�A�B�C�D�E�F�G�H�I�J�K�L�M�N�O�P�Q�R�S�T�U�V�W�X�Y�Z�[�\�]�^�_�`�a�b�c�d�e�f�g�h�i�j�k�l�m�n�o�p�q�r�s�t�u�v�w�x�y�z�{�|�}�~����������������������������������������������������������������";

	for(var i = 0; i < str.length; i++){
		var tmp_str = str.charAt(i);
		if(characterKanji.indexOf(tmp_str) >= 0){
			if(illegal_str && illegal_str.indexOf(tmp_str) < 0){
				illegal_str += '�A' + tmp_str;
			} else if(!illegal_str) {
				illegal_str += tmp_str;
			}
		}
	}
	return illegal_str;
}
//R-#14022

/*--------------------------------------------------------
 * fnkChkDirName
 * �T�@�v�F�f�B���N�g�����`�F�b�N�֐�
 * ���@���F�Ώە�����
 * �߂�l�F�������ꍇ�Ftrue�@�������Ȃ��ꍇ�Ffalse
--------------------------------------------------------*/
function fnkChkDirName(str){

	//���p�S�p�p�����A�n�C�t���A�A���_�[�o�[�A�J���}�ȊO�̕����̓G���[
	if (!str.match(/[^a-zA-Z0-9|\-|\_|\.]/)) {
		return true;
	} else {
		return false;
	}

}
/*--------------------------------------------------------
 * fncConfirm
 * �T�@�v�F�m�F�_�C�A���O�\��
 * ���@���F�_�C�A���O�ɕ\�����郁�b�Z�[�W�Asubmit����form��
 * �߂�l�F�Ȃ�
--------------------------------------------------------*/
function fncConfirm(msg,form) {
	var result
	result = confirm(msg);
	if (result == true) {
		form.submit();
	} else {
		return (false);
	}
}

/*--------------------------------------------------------
 * fncAlert
 * �T�@�v�F�A���[�g�\��
 * ���@���F�A���[�g�ɕ\�����郁�b�Z�[�W�Afocus����I�u�W�F�N�g��
 * �߂�l�F�Ȃ�
--------------------------------------------------------*/
function fncAlert(msg,obj) {
	alert(msg);
	obj.focus();
}

/*--------------------------------------------------------
 * fncMessage
 * �T�@�v�F���b�Z�[�W�\��
 * ���@���F�_�C�A���O�ɕ\�����郁�b�Z�[�W�Asubmit����form��
 * �߂�l�F�Ȃ�
--------------------------------------------------------*/
function fncMessageA(msg, url) {
	twindow.alert(msg);
	url.submit();
	exit;
}
/*--------------------------------------------------------
 * fncNowtime
 * �T�@�v�F�t�H�[���֌��ݎ���������
 * ���@���F
 * �߂�l�F�Ȃ�
--------------------------------------------------------*/
function fncNowtime() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	d = dt.getDate();
	h = dt.getHours();
	mi = dt.getMinutes();
	
	document.form_inp.s_year.value = y;
	document.form_inp.s_month.value = m;
	document.form_inp.s_day.value = d;
	document.form_inp.s_hour.value = h;
	document.form_inp.s_min.value = mi;
}
/*--------------------------------------------------------
 * fnclimit
 * �T�@�v�F�������Ƃ���2999�N12��31��23��59��
 * ���@���F
 * �߂�l�F�Ȃ�
--------------------------------------------------------*/
function fnclimit() {
	dt = new Date();
	y = 9999;
	m = 12;
	d = 31;
	h = 23;
	mi = 59; 
	
	document.form_inp.e_year.value = y;
	document.form_inp.e_month.value = m;
	document.form_inp.e_day.value = d;
	document.form_inp.e_hour.value = h;
	document.form_inp.e_min.value = mi;
}
/*--------------------------------------------------------
 * Nowtime
 * �T�@�v�F�t�H�[���֌��ݎ���������
 * ���@���F
 * �߂�l�F�Ȃ�
--------------------------------------------------------*/
function Nowtime() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	d = dt.getDate();
	h = dt.getHours();
	mi = dt.getMinutes();
	
	document.form_inp.s_yy.value = y;
	document.form_inp.s_mm.value = m;
	document.form_inp.s_dd.value = d;
	document.form_inp.s_hh.value = h;
	document.form_inp.s_mi.value = mi;
}
/*--------------------------------------------------------
 * limittime
 * �T�@�v�F�������Ƃ���2999�N12��31��23��59��
 * ���@���F
 * �߂�l�F�Ȃ�
--------------------------------------------------------*/
function limittime() {
	dt = new Date();
	y = 9999;
	m = 12;
	d = 31;
	h = 23;
	mi = 59; 
	
	document.form_inp.e_yy.value = y;
	document.form_inp.e_mm.value = m;
	document.form_inp.e_dd.value = d;
	document.form_inp.e_hh.value = h;
	document.form_inp.e_mi.value = mi;
}
/*--------------------------------------------------------
 * Nowdate
 * �T�@�v�F�t�H�[���֌��ݓ���������
 * ���@���F
 * �߂�l�F�Ȃ�
--------------------------------------------------------*/
function Nowdate() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	if(m < 10) {
		m = "0" + m;
	}
	d = dt.getDate();
	if(d < 10) {
		d = "0" + d;
	}
	document.form_inp.s_yy.value = y;
	document.form_inp.s_mm.value = m;
	document.form_inp.s_dd.value = d;
}
