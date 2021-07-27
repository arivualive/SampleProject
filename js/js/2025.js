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
                 fncAlert("請求日（ＦＲＯＭ）は正しく入力してください",s_yy);
                 return false;
             }
         }
 		var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
         if (e_yy.value + e_mm.value + e_dd.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("請求日（ＴＯ）は正しく入力してください",e_yy);
                 return false;
             }
             if (s_yy.value + s_mm.value + s_dd.value != "") {
                 if (start > end) {
                     fncAlert("請求日（ＦＲＯＭ）≦請求日（ＴＯ）で入力してください",s_yy);
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

// 入力チェック 
function DeleteChk(no, name) {
    return confirm("【VIP専用サンプル請求】No" + no + "：" + name + "様を削除します。よろしいですか？");
}

// 入力チェック 
function NullChk(no, name) {
    return confirm("【VIP専用サンプル請求】No" + no + "：" + name + "様を無効化します。よろしいですか？");
}

function fncCSV() {
    document.list.mode.value = "csv";
}
