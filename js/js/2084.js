<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

function myCheckLength(obj, num, name, arg) {
	if (arg == "tel") {
		str = obj.value.replace(/-/g,"");
		if(str.length != 0 && str.length < num){
			fncAlert(name + "�͔��p����" + num + "�����ȏ�(�n�C�t���͊܂܂Ȃ�)�œ��͂��Ă�������" , obj);
			return false;
		} else {
			return true;
		}
	}else if(fncGetLength(obj.value) > num){
		fncAlert(name + "��" + num + "�����ȓ��œ��͂��Ă�������" , obj);
		return false;
	} else {
		return true;
	}
}

function FindCheck2084() {
	with (document.list){
		if (! myCheckLength(s_kainno, 8, "����ԍ�") ||
			! myCheckLength(s_nickname, 30, "�j�b�N�l�[��") ){
			return false;
		}
	}
	document.list.page.value=0;
}


// ���̓`�F�b�N
function keywordChk() {
	keyword = fncTrim(document.list.s_keyword.value);
	if(keyword == "") {
		fncAlert("�L�[���[�h����͂��Ă�������", document.list.s_keyword);
		return false;
	}
	keywordLen = keyword.length;
	if(keywordLen > 30) {
		fncAlert("�L�[���[�h��30�����ȓ��œ��͂��Ă�������", document.list.s_keyword);
		return false;
	}
	document.list.submit();
}

function SearchClear(){
	document.list.reset();
	document.list.s_keyword.value = '';
	document.list.s_yy.options[0].selected = true;
	document.list.s_mm.options[0].selected = true;
	document.list.s_dd.options[0].selected = true;
	document.list.e_yy.options[0].selected = true;
	document.list.e_mm.options[0].selected = true;
	document.list.e_dd.options[0].selected = true;
	document.list.s_kainno.value = '';
	document.list.s_nickname.value = '';
	document.list.s_event_kbn[0].checked = false;
	document.list.s_event_kbn[1].checked = false;
	document.list.s_event_kbn[2].checked = true;
}

function jsRegist(newsId, memoDt, newsKind) {
	document.list.mode.value = 'add';
	document.list.mode_prm.value = 'input';
	document.list.newsId.value = newsId;
	document.list.memoDt.value = memoDt;
	document.list.newsKind.value = newsKind;
	document.list.action = 'input.php';
	document.list.submit();
}

function jsEdit(newsId, memoDt, newsKind, commentId, userType) {
	document.list.mode.value = 'edit';
	document.list.mode_prm.value = 'input';
	document.list.newsId.value = newsId;
	document.list.memoDt.value = memoDt;
	document.list.newsKind.value = newsKind;
	document.list.commentId.value = commentId;
	document.list.userType.value = userType;
	document.list.action = 'input.php';
	document.list.submit();
}

function InputChk(inMode) {

	if(inMode == "FINISH"){
		document.form_inp.submit();
		return true;
	}

	if(inMode == "DELETE"){
		document.form_inp.mode_ctl.value = inMode;
		document.form_inp.submit();
		return true;
	}

	if(inMode == "CANCEL" || inMode == 'BACK'){
		document.form_inp.mode_ctl.value = inMode;
		document.form_inp.action = "list.php";
		document.form_inp.submit();
		return true;
	}

	with (document.form_inp){
		if (fncTrim(userComment.value) == "") {
			fncAlert("�R�����g����͂��Ă�������",userComment);
			return false;
		}
		if(fncGetLength(userComment.value) > 100){
			fncAlert("�R�����g��100�����ȓ��œ��͂��Ă�������",userComment);
			return false;
		}

		document.form_inp.mode_ctl.value = inMode;
		document.form_inp.submit();
		return true;
	}
}
