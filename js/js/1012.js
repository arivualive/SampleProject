<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

function submitForm() {
    document.form_inp.button.disabled=true;
    document.form_inp.submit();
    return false;
}

function setMailAddress(value, flg, mail){
	if(value == 1){
		type = "�iPC�j";
	}else if(value == 2){
		type = "�i�g�сj";
	}
	if(flg == 0){
		mail = "���[���s��"+type+"�̂��q�l�ł�";
	}
	document.mail.mlTo.value = 	mail;
}
