

var hankaku_email = "@.-_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";


function loginCheck(txt_id) {

    if (document.frm.id.value.length == 0) {
        alert('�l�b�g����h�c�܂��͂d���[���A�h���X�𐳂������͂��Ă�������');
        txt_id.focus();
        return false;
    }

    if (document.frm.pw.value.length == 0) {
        alert('�p�X���[�h�𐳂������͂��Ă�������');
        document.frm.pw.focus();
        document.frm.pw.value = '';
        return false;
    }


    var E_MAIL_1 = document.frm.id.value;
    var isErr = false;
    var errMsg = "";

    if(E_MAIL_1.match(/[@.]/)){

        for (i = 0; i < E_MAIL_1.length; i ++) {
            tmpStr = hankaku_email.indexOf(E_MAIL_1.charAt(i));
            if(E_MAIL_1.charCodeAt(i) >= 0x007f){
                errMsg = "�d���[���A�h���X�ɑS�p�p�����������Ă��܂��B���p�p�����œ��͂��Ă��������B";
                txt_id.focus();
                alert(errMsg);
                return false;
            }
        }

        if(E_MAIL_1.indexOf("@.", 0) != -1 ){
            errMsg = "�d���[���A�h���X�𐳂��������͂��������B";
            isErr = true;
        }
        if(E_MAIL_1.charAt(0) == "@"){
          errMsg = "�d���[���A�h���X�𐳂��������͂��������B";
            isErr = true;
        }

        if(isErr==true){
            txt_id.focus();
            alert(errMsg);
            return false;
        }

    }else{

        if ( CountLength(document.frm.id.value) > 12 ) {
            alert('�l�b�g���ID�͔��p�p�����P�Q�����ȉ��œ��͂��Ă�������');
            txt_id.focus();
            return false;
        }

    }


    if ( CountLength(document.frm.pw.value) > 12 ) {
        alert('�p�X���[�h�͔��p�p�����P�Q�����ȉ��œ��͂��Ă�������');
        document.frm.pw.focus();
        document.frm.pw.value = '';
        return false;
    }

    return oneSubmit(document.frm);
}

