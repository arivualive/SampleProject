<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

function myCheckLength(obj, num, name, arg) {
    if (arg == "zen") {
        if(obj.value.length > num){
            fncAlert(name + "は全角" + num + "文字以内で入力してください" , obj);
            return false;
        } else {
            return true;
        }
    }else if (arg == "tel") {
        str = obj.value.replace(/-/g,"");
        if(str.length != 0 && str.length < num){
            fncAlert(name + "は半角数字" + num + "文字以上(ハイフンは含まない)で入力してください" , obj);
            return false;
        } else {
            return true;
        }
    }else if(fncGetLength(obj.value) > num){
        fncAlert(name + "は半角" + num + "文字以内で入力してください" , obj);
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
                 fncAlert("注文日（ＦＲＯＭ）は正しく入力してください",fryear);
                 return false;
             }
         }
 		var end = toyear.value + ("00" + tomonth.value ).slice(-2) + ("00" + today.value ).slice(-2);
         if (toyear.value != "" && tomonth.value != "" && today.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("注文日（ＴＯ）は正しく入力してください",toyear);
                 return false;
             }
             if (fryear.value != "" && frmonth.value != "" && frday.value != "") {
                 if (start > end) {
                     fncAlert("注文日（ＦＲＯＭ）≦注文日（ＴＯ）で入力してください",fryear);
                     return false;
                 }
             }
         }

        if (! myCheckLength(skainno, 8, "会員番号") ||
            ! myCheckLength(sname, 15, "お名前", "zen") ||
            ! myCheckLength(stel, 10, "電話番号", "tel") ||
            ! myCheckLength(semail, 100, "Ｅメールアドレス"))
            return false;
	}
    document.frm.page.value=0;
    return true;
}

// 入力チェック 
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
		  msg = "ステータスを「対応不要」に変更しますか？";
		}
		else if(argstr == 2){
		  msg = "ステータスを「電話対応(イン)」に変更しますか？";
		}
		else if(argstr == 3){
		  msg = "ステータスを「電話対応(美相)」に変更しますか？";
		}
		else if(argstr == 4){
		  msg = "ステータスを「電話対応(アウト)」に変更しますか？";
		}
		else if(argstr == 5){
		  msg = "ステータスを「電話対応(INET隊)」に変更しますか？";
		}
		else if(argstr == 8){
		  msg = "ステータスを「電話完了」に変更しますか？";
		}
		else if(argstr == 9){
		  msg = "ステータスを「対応済み」に変更しますか？";
		}
		else if(argstr == 0){
		  msg = "ステータスを「未対応」に変更しますか？";
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
//印刷ウィンドウを表示
window.print();
}
}

