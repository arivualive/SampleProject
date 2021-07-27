// 各入力チェックルール
function myCheckLength(obj, num, name, arg) {
    if (arg == "zen") {
        if(obj.value.length > num){
            fncAlert(name + "は全角" + num + "文字以内で入力してください" , obj);
            return false;
        } else {
            return true;
        }
    }else if (arg == "kainno" && obj.value.length > 0) {
        if (!/^[0-9]+$/.test(obj.value)) {
            fncAlert(name + "は半角数字で入力してください" , obj);
            return false;
        } else {
            return true;
        }
    }else if(fncGetLength(obj.value) > num){
        fncAlert(name + "は半角" + num + "文字以内で入力してください" , obj);
        return false;
    }else {
        return true;
    }
}

// 検索条件の入力チェック
function ListChk() {
    with (document.list){
        // 投稿日チェック
         var start = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
         if (s_yy.value + s_mm.value + s_dd.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("投稿日（FROM）は正しく入力してください",s_yy);
                 return false;
             }
         }
         var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
         if (e_yy.value + e_mm.value + e_dd.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("投稿日（TO）は正しく入力してください",e_yy);
                 return false;
             }
             if (s_yy.value + s_mm.value + s_dd.value != "") {
                 if (start > end) {
                     fncAlert("投稿日（FROM）≦ 投稿日（TO）で入力してください",s_yy);
                     return false;
                 }
             }
         }

        if (! myCheckLength(kainno, 8, "会員番号", "kainno") ||
            ! myCheckLength(netmember_id, 12, "ネット会員ID")
           )
            return false;

        if ( reviewer_name.value.length > 20 ){
            fncAlert("投稿者名は20バイト以内で入力してください",reviewer_name);
            return false;
        }
    }
    return true;

}

// クリア
function ClearAction() {
    document.list.mode.value = "clear";
    document.list.submit();
}

//削除
function DeleteChk(){
    return fncDelConfirm();
}

//更新
function InputChk(){
    with (document.input){
    var rc_str = fncTrim(review_comment.value);
        if ( rc_str == "" ){
            fncAlert("コメントを入力してください",review_comment);
            return false;
        }

        if ( rc_str.length > 400 ){
            fncAlert( "コメントは400文字以内で入力してください",review_comment);
            return false;
        }

        if(!fncEditConfirm()){
            return false;
        }
    }
}
