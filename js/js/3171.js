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

       /* if (! myCheckLength(kainno, 8, "会員番号", "kainno") ||
            ! myCheckLength(netmember_id, 12, "ネット会員ID")
           )
            return false;*/

        if ( poster_name.value.length > 20 ){
            fncAlert("投稿者名は20バイト以内で入力してください",poster_name);
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

// 削除
function DeleteChk(){
    return fncDelConfirm();
}

// 更新
function InputChk(isconfirm){
	var errormsg = "";
    with (document.input){
		if (fncTrim(content_cd.value) == "") {
			errormsg += "・コンテンツコードを選択してください\n";
		}

		if ((!isconfirm && admin_kbn.checked != true) || (isconfirm && admin_kbn.value != "1")) {

		if (fncTrim(kainno.value) == "") {
			errormsg += "・会員番号を入力してください\n";
		} else if (fncTrim(kainno.value).length != 8 || !/^[0-9]+$/.test(fncTrim(kainno.value))) {
			errormsg += "・会員番号を8桁数字で入力してください\n";
		}

		}

		if (fncTrim(poster_name.value) == "") {
			errormsg += "・投稿者名を入力してください\n";
		}

		if (fncTrim(letter_comment.value) == "") {
			errormsg += "・コメントを入力してください\n";
		}
		if(fncGetLength(letter_comment.value) > 4000){
			errormsg += "・コメントは全角2000文字以内で入力してください\n";
		}
    }
    if (errormsg == "") {
    	return true;
    } else {
	    alert(errormsg);
		return false;
    }
}

// キャンセル
function CancelChk() {

    document.input.mode_prm.value = "cancel";
    document.input.action = "input.php";
    document.input.submit();
    return true;
}

// 削除
function DeleteChk(id){
    if (window.confirm('本当に削除しますか？')) {
    	self.location.href='regist.php?del_flg=ok&contentletterzine_id=' + id;
    } else {
    	alert("削除がキャンセルされました");
    }
}


function dissableKain() {

	if (admin_kbn.checked == true) {
		kainno.dissabled = true;
		poster_name.dissabled = true;
	} else {
		kainno.dissabled = false;
		poster_name.dissabled = false;
	}

}
