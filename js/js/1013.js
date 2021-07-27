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
		type = "（PC）";
	}else if(value == 2){
		type = "（携帯）";
	}
	if(flg == 0){
		mail = "メール不可"+type+"のお客様です";
	}
	document.mail.mlTo.value = 	mail;
}
