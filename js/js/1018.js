<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

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

function FindCheck<?= $my_func ?>() {
	with (document.frm){
        
 		var start = fryear.value + ("00" + frmonth.value ).slice(-2) + ("00" + frday.value ).slice(-2);
         if (fryear.value != "" && frmonth.value != "" && frday.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("�������i�e�q�n�l�j�͐��������͂��Ă�������",fryear);
                 return false;
             }
         }
 		var end = toyear.value + ("00" + tomonth.value ).slice(-2) + ("00" + today.value ).slice(-2);
         if (toyear.value != "" && tomonth.value != "" && today.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("�������i�s�n�j�͐��������͂��Ă�������",toyear);
                 return false;
             }
             if (fryear.value != "" && frmonth.value != "" && frday.value != "") {
                 if (start > end) {
                     fncAlert("�������i�e�q�n�l�j���������i�s�n�j�œ��͂��Ă�������",fryear);
                     return false;
                 }
             }
         }

        if (! myCheckLength(skainno, 8, "����ԍ�") ||
            ! myCheckLength(sname, 15, "�����O", "zen") ||
            ! myCheckLength(stel, 10, "�d�b�ԍ�", "tel") ||
            ! myCheckLength(semail, 100, "�d���[���A�h���X"))
            return false;
	}
    document.frm.page.value=0;
    return true;
}

// ���̓`�F�b�N 
//function InputChk() {
//}
function SearchClear(){
	with (document.frm){
		fryear.value = "";
		frmonth.value = "";
		frday.value = "";
		toyear.value = "";
		tomonth.value = "";
		today.value = "";
		skainno.value = "";
		sname.value = "";
		stel.value = "";
		semail.value = "";
		sstatus.value = "";
	}
    	document.frm.mode.value = "clear";
	document.frm.submit();

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
function PrintPage(){
if(document.getElementById || document.layers){
//����E�B���h�E��\��
window.print();
}
}

