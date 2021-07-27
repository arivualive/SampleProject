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

function myCheckLength(obj, num, name, arg) {
    if (arg == "zen") {
        if(obj.value.length > num){
            fncAlert(name + "�͑S�p" + num + "�����ȓ��œ��͂��Ă�������" , obj);
            return false;
        } else {
            return true;
        }
    }else if (arg == "tel") {
        str = obj.value.replace(/-/g,"");
        if(str.length != 0 && str.length < num){
            fncAlert(name + "�͔��p����" + num + "�����ȏ�(�n�C�t���͊܂܂Ȃ�)�œ��͂��Ă�������" , obj);
            return false;
        } else {
            return true;
        }
    }else if(fncGetLength(obj.value) > num){
        fncAlert(name + "�͔��p" + num + "�����ȓ��œ��͂��Ă�������" , obj);
        return false;
    } else {
        return true;
    }
}

function SearchClear(){
	with (document.frm){
		today.value = "";

	}
	document.frm.reset();
	return false;
}
function ComentChk(){
	with (document.form_inp){
		if (fncTrim(commnet.value) == "") {
			fncAlert("�R�����g����͂��Ă�������",commnet);
			return false;
		}
		if (myCheckLength(commnet,55,'�R�����g','zen') == false){
			return false;
		}
	}
    	document.form_inp.submit();

}
function KainnoChk(){
	with (document.form_inp){
		if (fncTrim(kainno.value) == "") {
			fncAlert("����ԍ�����͂��Ă�������",kainno);
			return false;
		}
		if(fncGetLength(kainno.value) != 8){
				fncAlert("����ԍ���8�����œ��͂��Ă�������",kainno);
				return false;
		}
		if(kainno.value.match(/[\D]/)){
			fncAlert("����ԍ��͔��p�����œ��͂��Ă�������",kainno);
			return false;
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
    document.form_inp.mode.value = "kainno";
    document.form_inp.submit();
}
function status_change(argstr){
		msg = "";
		if (argstr == 7){
		  msg = "�X�e�[�^�X���u�Ή��s�v�v�ɕύX���܂����H";
		}
		else if(argstr == 2){
		  msg = "�X�e�[�^�X���u�d�b�Ή�(�C��)�v�ɕύX���܂����H";
		}
		else if(argstr == 3){
		  msg = "�X�e�[�^�X���u�d�b�Ή�(����)�v�ɕύX���܂����H";
		}
		else if(argstr == 4){
		  msg = "�X�e�[�^�X���u�d�b�Ή�(�A�E�g)�v�ɕύX���܂����H";
		}
		else if(argstr == 5){
		  msg = "�X�e�[�^�X���u�d�b�Ή�(INET��)�v�ɕύX���܂����H";
		}
		else if(argstr == 8){
		  msg = "�X�e�[�^�X���u�d�b�����v�ɕύX���܂����H";
		}
		else if(argstr == 9){
		  msg = "�X�e�[�^�X���u�Ή��ς݁v�ɕύX���܂����H";
		}
		else if(argstr == 0){
		  msg = "�X�e�[�^�X���u���Ή��v�ɕύX���܂����H";
		}

	  if(msg!=""){
	    res = confirm(msg);
	    if (res != true){
	      return false;
	    }
	  }

    document.form_inp.status.value=argstr;
    document.form_inp.mode.value = "status";
    document.form_inp.submit();
}
function forward(argstr){
		msg = "";
		if (argstr == 1){
		  msg = "�L��ɓ]���������Ă�낵���ł����H";
		}
		else if(argstr == 2){
		  msg = "�o���E�����ɓ]���������Ă�낵���ł����H";
		}
		else if(argstr == 3){
		  msg = "�l���ɓ]���������Ă�낵���ł����H";
		}
		else if(argstr == 4){
		  msg = "�J���ɓ]���������Ă�낵���ł����H";
		}
		else if(argstr == 5){
		  msg = "�������ɓ]���������Ă�낵���ł����H";
		}
		else if(argstr == 6){
		  msg = "�q���g�b�v�ɓ]���������Ă�낵���ł����H";
		}
		else if(argstr == 7){
		  msg = "�C���^�[�l�b�g�ɓ]���������Ă�낵���ł����H";
		}

	  if(msg!=""){
	    res = confirm(msg);
	    if (res != true){
	      return false;
	    }
	  }
    document.form_inp.fwd.value=argstr;
    document.form_inp.mode.value = "fwd";
    document.form_inp.submit();

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

	for(i=0;i<arrdel.length;i++){

		if (arrdel[i].checked){
			chk_flg = true;
		}
	}

	if (chk_flg == false){
		alert("�폜���郁����I�����Ă��������B");
		return ;
	}else{
		document.frm.mode.value="delete";
		document.frm.submit();
	}
}