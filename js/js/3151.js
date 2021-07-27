<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

function allCheckOnOff() {
	var checked = document.getElementById("all_check").checked;
	var max = document.frm.elements.length;

	for (var ii = 0; ii < max; ii++) {
		if (document.frm.elements[ii].type != "checkbox") continue;
		document.frm.elements[ii].checked = checked;
	}
}


function SearchClear(){
	with (document.frm){
		today.value = "";

	}
	document.frm.reset();
	return false;
}

function KainnoChk(){

	var kainno = document.frm.skainno;
	var searchdate = document.frm.sregistdate;

	if (fncTrim(kainno.value) != "") {
		if(fncGetLength(kainno.value) != 8){
				fncAlert("����ԍ��͔��p8�����œ��͂��Ă�������",kainno);
				return false;
		}
		if(kainno.value.match(/[\D]/)){
			fncAlert("����ԍ��͔��p�����œ��͂��Ă�������",kainno);
			return false;
		}
	}

	if (fncTrim(searchdate.value) != "") {
		if (ckDate("20" + searchdate.value) == false) {
			fncAlert("���t�̓��͂Ɍ�肪����܂��B",searchdate);
			return false;
		}
	}

	return true;
}

function PrintPage(){
	if(document.getElementById || document.layers){
		//����E�B���h�E��\��
		window.print();
	}
}

function modeChange(){
	document.form_inp.mode.value="";
	form_inp.submit();
}

function delChk(){
	var arrdel = document.frm.elements['delete[]'];
	var chk_flg = false;

	if (arrdel != undefined) {
		if (arrdel.length == undefined) {
			if (arrdel.checked){
				chk_flg = true;
			}

		}else{
			for(i=0;i<arrdel.length;i++){

				if (arrdel[i].checked){
					chk_flg = true;
				}
			}
		}
	}

	if (chk_flg == false){
		alert("�폜���郁�b�Z�[�W��I�����Ă��������B");
		return ;
	}else{
		document.frm.mode.value="delete";
		document.frm.submit();
	}
}

function ckDate(datestr) {
	// ���K�\���ɂ�鏑���`�F�b�N
	if(!datestr.match(/^\d{4}\/\d{2}\/\d{2}$/)){
		return false;
	}
	var vYear = datestr.substr(0, 4) - 0;
	var vMonth = datestr.substr(5, 2) - 1; // Javascript�́A0-11�ŕ\��
	var vDay = datestr.substr(8, 2) - 0;
	// ��,���̑Ó����`�F�b�N
	if(vMonth >= 0 && vMonth <= 11 && vDay >= 1 && vDay <= 31){
		var vDt = new Date(vYear, vMonth, vDay);
		if(isNaN(vDt)){
			return false;
		}else if(vDt.getFullYear() == vYear && vDt.getMonth() == vMonth && vDt.getDate() == vDay){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

/**
 * �o�^�E�ҏW���e�`�F�b�N
 *
 * �j�b�N�l�[���F�K�{���́B�S�p15�����ȓ��A���p30�����ȓ�
 * �񓚓��F�K�{���́B���p����8���A�L���ȓ��t�ł��邱�ƁB
 * �������b�Z�[�W�F�K�{���́B�S�p400�����ȓ��A���p800�����ȓ�
 *
 * @return true(OK) / false(NG)
 */
function registChk() {
    var name = document.form_inp.nick_nm;
	// ���͂���Ă���
	if (fncTrim(name.value) != "") {
		if(fncGetLength(name.value) > 30) {
			fncAlert("�j�b�N�l�[���͑S�p15�����ȓ��œ��͂��Ă�������", name);
			return false;
		}
    }
	// ���͂���Ă��Ȃ�
	else {
	    fncAlert("�j�b�N�l�[������͂��Ă�������", name);
		return false;
	}
	
	var user_kind = document.form_inp.user_kind;
	if(!user_kind[0].checked && !user_kind[1].checked) {
		alert("���[�U�敪���w�肵�Ă�������");
		return false;
	}
	
	var s_yy = document.form_inp.s_yy;
	var s_mm = document.form_inp.s_mm;
	var s_dd = document.form_inp.s_dd;
	var answer_date = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
	
	if (fncTrim(s_yy.value) == "") {
		fncAlert("�񓚓�����͂��Ă�������",s_yy);
		return false;
	}
	if ( fncTrim(s_mm.value) == "") {
		fncAlert("�񓚓�����͂��Ă�������",s_mm);
		return false;
	}
	if (fncTrim(s_dd.value) == "") {
		fncAlert("�񓚓�����͂��Ă�������",s_dd);
		return false;
	}
	if(!fncJudgeNumber(fncTrim(s_yy.value))){
		fncAlert("�񓚓��͔��p�����œ��͂��Ă�������",s_yy);
		return false;
	}
	if(!fncJudgeNumber(fncTrim(s_mm.value))){
		fncAlert("�񓚓��͔��p�����œ��͂��Ă�������",s_mm);
		return false;
	}
	if(!fncJudgeNumber(fncTrim(s_dd.value))){
		fncAlert("�񓚓��͔��p�����œ��͂��Ă�������",s_dd);
		return false;
	}

	if (fncChkDate(answer_date) == "") {
		fncAlert("�񓚓��𐳂������͂��Ă�������",s_yy);
		return false;
	}

    var voice = document.form_inp.voice;

	if (fncTrim(voice.value) != "") {
		if (fncGetLength(voice.value) > 800) {
			fncAlert("�������b�Z�[�W�͑S�p400�����ȓ��œ��͂��Ă�������",voice);
			return false;
		}
	} else {
		fncAlert("�������b�Z�[�W����͂��Ă�������", voice);
		return false;
    }

	return true;
}

/**
 * �G���^�[�L�[���͂𖳌�������
 *
 * @param {Object} field
 * @param {Object} event
 * @return true(�G���^�[�L�[�ȊO) / false(�G���^�[�L�[)
 */
function handleEnter(event) {
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if (keyCode == 13) {
		return false;
	} else {
	  return true;
	}
}