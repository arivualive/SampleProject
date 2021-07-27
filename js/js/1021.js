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

// ���̓`�F�b�N 
function ListChk() {
	
	with (document.frm){
     
 		var start = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
         if (s_yy.value != "" && s_mm.value != "" && s_dd.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("�������i�e�q�n�l�j�͐��������͂��Ă�������",s_yy);
                 return false;
             }
         }
		 
 		var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
         if (e_yy.value != "" && e_mm.value != "" && e_dd.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("�������i�s�n�j�͐��������͂��Ă�������",e_yy);
                 return false;
             }
             if (s_yy.value != "" && s_mm.value != "" && s_dd.value != "") {
                 if (start > end) {
                     fncAlert("�������i�e�q�n�l�j���������i�s�n�j�œ��͂��Ă�������",s_yy);
                     return false;
                 }
             }
         }

        if (! myCheckLength(kainno, 8, "����ԍ�") ||
            ! myCheckLength(kain_name, 15, "�����O", "zen") ||
            ! myCheckLength(tel_no, 10, "�d�b�ԍ�", "tel") ||
            ! myCheckLength(email, 100, "�d���[���A�h���X"))
            return false;
	}
    return true;
}


function econDeleteAction(oid, no, name) {
    if (confirm("�y�����zNo" + no + "�F" + name + "�l���L�����Z�����܂��B��낵���ł����H") == false)
        return false;
    document.frm.oid.value = oid;
    document.frm.submit();
}
