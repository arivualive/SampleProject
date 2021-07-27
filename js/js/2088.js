// 
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

// 入力チェック 
function ListChk() {
    document.list.mode.value = "find";
	
	with (document.list){
       
 		var start = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
         if (s_yy.value + s_mm.value + s_dd.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("回答日時（ＦＲＯＭ）は正しく入力してください",s_yy);
                 return false;
             }
         }
 		var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
         if (e_yy.value + e_mm.value + e_dd.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("回答日時（ＴＯ）は正しく入力してください",e_yy);
                 return false;
             }
             if (s_yy.value + s_mm.value + s_dd.value != "") {
                 if (start > end) {
                     fncAlert("回答日時（ＦＲＯＭ）≦回答日時（ＴＯ）で入力してください",s_yy);
                     return false;
                 }
             }
         }

        if (! myCheckLength(name_kanji, 15, "お名前", "zen") ||
            ! myCheckLength(tel_no, 10, "電話番号", "tel") ||
            ! myCheckLength(email, 100, "Ｅメール"))
            return false;
	}
    return true;
}

// クリア
function ClearAction() {
    document.list.mode.value = "clear";
    document.list.submit();
}

function PrintPage(sample_request_id){
	//印刷ウィンドウを表示
	window.print();

	opener.HiddenValAdd(sample_request_id);
}

// 印刷区分を見かけ上の「済」に変更
// DBはPHPにて更新
function HiddenValAdd(sample_request_id){
    with (document.list){
        var wk_print_state_kbn_id = "print_state_kbn"+ sample_request_id;

		document.getElementsByName(wk_print_state_kbn_id)[0].innerHTML = '済';
	}
}


