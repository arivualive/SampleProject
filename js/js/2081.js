<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

window.onsubmit = function() {
	return FindCheck2081();
}

function allCheckOnOff() {
	var checked = document.getElementById("all_check").checked;
	var max = document.frm.elements.length;

	for (var ii = 0; ii < max; ii++) {
		if (document.frm.elements[ii].type != "checkbox") continue;
		document.frm.elements[ii].checked = checked;
	}
}

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

function FindCheck2081() {
	with (document.frm){
        if (! myCheckLength(skainno, 8, "会員番号") ||
            ! myCheckLength(sname, 9, "お名前", "zen") ||
            ! myCheckLength(stel, 10, "電話番号", "tel") ||
            ! myCheckLength(semail, 48, "Ｅメールアドレス(PC)") ||
            ! myCheckLength(semail_m, 48, "Ｅメールアドレス(MOBILE)"))
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
		today.value = "";

	}
	document.frm.reset();
	return false;
}
function ComentChk(){
	with (document.form_inp){
		if (fncTrim(coment.value) == "") {
			fncAlert("対応コメントを入力してください",coment);
			return false;
		}
		if(fncGetLength(coment.value) > 200){
				fncAlert("対応コメントは全角100文字以内で入力してください",coment);
				return false;
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
    document.form_inp.mode.value = "coment";
    document.form_inp.submit();

}
function KainnoChk(){
	with (document.form_inp){
		if (fncTrim(kainno.value) == "") {
			fncAlert("会員番号を入力してください",kainno);
			return false;
		}
		if(fncGetLength(kainno.value) != 8){
				fncAlert("会員番号は8文字で入力してください",kainno);
				return false;
		}
		if(kainno.value.match(/[\D]/)){
			fncAlert("会員番号は半角数字で入力してください",kainno);
			return false;
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
    document.form_inp.mode.value = "kainno";
    document.form_inp.submit();
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
function forward(argstr){
		msg = "";
		if (argstr == 1){
		  msg = "広報に転送処理してよろしいですか？";
		}
		else if(argstr == 2){
		  msg = "経理・総務に転送処理してよろしいですか？";
		}
		else if(argstr == 3){
		  msg = "人事に転送処理してよろしいですか？";
		}
		else if(argstr == 4){
		  msg = "開発に転送処理してよろしいですか？";
		}
		else if(argstr == 5){
		  msg = "満足室に転送処理してよろしいですか？";
		}
		else if(argstr == 6){
		  msg = "ヒルトップに転送処理してよろしいですか？";
		}
		else if(argstr == 7){
		  msg = "インターネットに転送処理してよろしいですか？";
		}

	  if(msg!=""){
	    res = confirm(msg);
	    if (res != true){
	      return false;
	    }
	  }
    document.form_inp.fwd.value=argstr;
    document.form_inp.mode.value = "fwd";
    document.form_inp.submit();

}
function PrintPage(){
if(document.getElementById || document.layers){
//印刷ウィンドウを表示
window.print();
}
}
/**
 * CSV出力を行ってよいかチェックする
 *
 * @return true(OK), false(NG)
 */
function chkCSV() {
	// 「指定データのみ」
	var bSelectCsv = document.getElementById("sdl0").checked;
	// 「全データ」
	var bAllCsv = document.getElementById("sdl1").checked;

	// 両方ともチェックされていない場合
	if (!bSelectCsv && !bAllCsv) {
		alert("出力するデータを選択してください。");
		return false;
	}
	// 「全データ」がチェックされている場合
	else if (bAllCsv) {
		// 特にチェックしない
		return true;
	}

	var bHit = false;
	var max = document.frm.elements.length;
	for (var ii = 0; ii < max; ii++) {
		var obj = document.frm.elements[ii];

		// チェックボックスで無い場合
		if (obj.type != "checkbox") continue;
		// idが「select**」で無い場合
		var id = document.frm.elements[ii].id;
		if (!id.match(/^select[0-9]+$/)) continue;

		// チェックボックスがON
		if (document.frm.elements[ii].checked) {
			bHit = true;
			break;
		}
	}

	// 1つもチェックが入ってない場合
	if (!bHit) {
		alert("出力するデータを選択してください。");
		return false;
	}

	return true;
}