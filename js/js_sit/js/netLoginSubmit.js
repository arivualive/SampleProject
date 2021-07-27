

var hankaku_email = "@.-_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";


function loginCheck(txt_id) {

    if (document.frm.id.value.length == 0) {
        alert('ネット会員ＩＤまたはＥメールアドレスを正しく入力してください');
        txt_id.focus();
        return false;
    }

    if (document.frm.pw.value.length == 0) {
        alert('パスワードを正しく入力してください');
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
                errMsg = "Ｅメールアドレスに全角英数字が入っています。半角英数字で入力してください。";
                txt_id.focus();
                alert(errMsg);
                return false;
            }
        }

        if(E_MAIL_1.indexOf("@.", 0) != -1 ){
            errMsg = "Ｅメールアドレスを正しくご入力ください。";
            isErr = true;
        }
        if(E_MAIL_1.charAt(0) == "@"){
          errMsg = "Ｅメールアドレスを正しくご入力ください。";
            isErr = true;
        }

        if(isErr==true){
            txt_id.focus();
            alert(errMsg);
            return false;
        }

    }else{

        if ( CountLength(document.frm.id.value) > 12 ) {
            alert('ネット会員IDは半角英数字１２文字以下で入力してください');
            txt_id.focus();
            return false;
        }

    }


    if ( CountLength(document.frm.pw.value) > 12 ) {
        alert('パスワードは半角英数字１２文字以下で入力してください');
        document.frm.pw.focus();
        document.frm.pw.value = '';
        return false;
    }

    return oneSubmit(document.frm);
}

