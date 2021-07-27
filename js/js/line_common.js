
//チェックボックスON/OFF処理
function allCheckOnOff() {
	var checked = document.getElementById("all_check").checked;
	var max = document.line.elements.length;

	for (var ii = 0; ii < max; ii++) {
		if (document.line.elements[ii].name != "select[]") continue;
		if (document.line.elements[ii].type != "checkbox") continue;
			document.line.elements[ii].checked = checked;
	}
}
//チェックボックス状態チェック
function chkUpd() {
	var bHit = false;
	var max = document.line.elements.length;
	for (var ii = 0; ii < max; ii++) {
		var obj = document.line.elements[ii];

		// チェックボックスで無い場合
		if (obj.type != "checkbox") continue;
		// idが「select**」で無い場合
		var id = document.line.elements[ii].id;
		if (!id.match(/^select[0-9]+$/)) continue;

		// チェックボックスがON
		if (document.line.elements[ii].checked) {
			bHit = true;
			break;
		}
	}

	// 1つもチェックが入ってない場合
	if (!bHit) {
		alert("送信先を選択してください。");
		return false;
	}

	return true;
}
// 検索
function Action1061Find() {
    document.line.mode.value = "find";
    with (document.line) {
        if (fncTrim(kaiin_no.value) == '' && fncTrim(tel_no.value) == '' && fncTrim(line_uid.value) == '') {
            fncAlert('検索の際は、「お客様番号」、「電話番号」、「LINE UID」のいずれかを入力してください。', kaiin_no);
            return false;
        }
        if(fncTrim(kaiin_no.value) != ''){
            //お客様番号チェック
            if ( fncGetLength(kaiin_no.value) > 8) {
                fncAlert('お客様番号は8バイト以内で入力してください。', kaiin_no);
                return false;
            }
            if (fncJudgeNumber(kaiin_no.value) == false) {
                fncAlert('お客様番号は半角数字で入力してください。', kaiin_no);
                return false;
            }
        }
        if(fncTrim(tel_no.value) != ''){
            //電話番号チェック
            if (fncGetLength(tel_no.value) > 13) {
                fncAlert('電話番号は13バイト以内で入力してください。', tel_no);
                return false;
            }
            str = tel_no.value.replace(/-/g,"");
            if((str.length != 0 && str.length < 10) || str.length > 11 || fncJudgeNumber(str) == false){
                fncAlert("電話番号は半角数字10～13文字で入力してください。" , tel_no);
                return false;
            }
        }
        if(fncTrim(line_uid.value) != ''){
            //LINE UIDチェック
            var string = line_uid.value;
            if (line_uid.value.match(/[^A-Za-z0-9]/) || fncGetLength(line_uid.value) != 33 || string.charAt(0) != 'U') {
                fncAlert("LINE UIDは、先頭が'U'から始まる半角英数33文字で入力してください。", line_uid);
                return false;
            }
        }
    }
    return true;
}
// LINE UID直接入力
function Action1061Direct() {
    document.line.mode.value = "direct";
    with (document.line) {
        //LINE UIDチェック
        var string = line_uid.value;
        if (line_uid.value.match(/[^A-Za-z0-9]/) || fncGetLength(line_uid.value) != 33 || string.charAt(0) != 'U') {
            fncAlert("LINE UIDは、先頭が'U'から始まる半角英数33文字で入力してください。", line_uid);
            return false;
        }
    }
    return true;
}
// CSVインポート
function Action1061Import() {
    document.line.mode.value = "import";
    return true;
}
// クリア
function ClearAction() {
    document.line.mode.value = "clear";
    //確認メッセージダイアログ表示
    if(!window.confirm('設定されている送信先をクリアします。\nよろしいですか？')){
        //キャンセルの場合
        return false;
    }
    return true;
}
//アウトバウンド送信
function Action1061Input() {
//アウトバウンド送信処理の仕様が未定のため、falseを返す。
    return false;
//    return true;
}

