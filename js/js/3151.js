<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

function allCheckOnOff() {
	var checked = document.getElementById("all_check").checked;
	var max = document.frm.elements.length;

	for (var ii = 0; ii < max; ii++) {
		if (document.frm.elements[ii].type != "checkbox") continue;
		document.frm.elements[ii].checked = checked;
	}
}


function SearchClear(){
	with (document.frm){
		today.value = "";

	}
	document.frm.reset();
	return false;
}

function KainnoChk(){

	var kainno = document.frm.skainno;
	var searchdate = document.frm.sregistdate;

	if (fncTrim(kainno.value) != "") {
		if(fncGetLength(kainno.value) != 8){
				fncAlert("会員番号は半角8文字で入力してください",kainno);
				return false;
		}
		if(kainno.value.match(/[\D]/)){
			fncAlert("会員番号は半角数字で入力してください",kainno);
			return false;
		}
	}

	if (fncTrim(searchdate.value) != "") {
		if (ckDate("20" + searchdate.value) == false) {
			fncAlert("日付の入力に誤りがあります。",searchdate);
			return false;
		}
	}

	return true;
}

function PrintPage(){
	if(document.getElementById || document.layers){
		//印刷ウィンドウを表示
		window.print();
	}
}

function modeChange(){
	document.form_inp.mode.value="";
	form_inp.submit();
}

function delChk(){
	var arrdel = document.frm.elements['delete[]'];
	var chk_flg = false;

	if (arrdel != undefined) {
		if (arrdel.length == undefined) {
			if (arrdel.checked){
				chk_flg = true;
			}

		}else{
			for(i=0;i<arrdel.length;i++){

				if (arrdel[i].checked){
					chk_flg = true;
				}
			}
		}
	}

	if (chk_flg == false){
		alert("削除するメッセージを選択してください。");
		return ;
	}else{
		document.frm.mode.value="delete";
		document.frm.submit();
	}
}

function ckDate(datestr) {
	// 正規表現による書式チェック
	if(!datestr.match(/^\d{4}\/\d{2}\/\d{2}$/)){
		return false;
	}
	var vYear = datestr.substr(0, 4) - 0;
	var vMonth = datestr.substr(5, 2) - 1; // Javascriptは、0-11で表現
	var vDay = datestr.substr(8, 2) - 0;
	// 月,日の妥当性チェック
	if(vMonth >= 0 && vMonth <= 11 && vDay >= 1 && vDay <= 31){
		var vDt = new Date(vYear, vMonth, vDay);
		if(isNaN(vDt)){
			return false;
		}else if(vDt.getFullYear() == vYear && vDt.getMonth() == vMonth && vDt.getDate() == vDay){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

/**
 * 登録・編集内容チェック
 *
 * ニックネーム：必須入力。全角15文字以内、半角30文字以内
 * 回答日：必須入力。半角数字8桁、有効な日付であること。
 * 応援メッセージ：必須入力。全角400文字以内、半角800文字以内
 *
 * @return true(OK) / false(NG)
 */
function registChk() {
    var name = document.form_inp.nick_nm;
	// 入力されている
	if (fncTrim(name.value) != "") {
		if(fncGetLength(name.value) > 30) {
			fncAlert("ニックネームは全角15文字以内で入力してください", name);
			return false;
		}
    }
	// 入力されていない
	else {
	    fncAlert("ニックネームを入力してください", name);
		return false;
	}
	
	var user_kind = document.form_inp.user_kind;
	if(!user_kind[0].checked && !user_kind[1].checked) {
		alert("ユーザ区分を指定してください");
		return false;
	}
	
	var s_yy = document.form_inp.s_yy;
	var s_mm = document.form_inp.s_mm;
	var s_dd = document.form_inp.s_dd;
	var answer_date = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
	
	if (fncTrim(s_yy.value) == "") {
		fncAlert("回答日を入力してください",s_yy);
		return false;
	}
	if ( fncTrim(s_mm.value) == "") {
		fncAlert("回答日を入力してください",s_mm);
		return false;
	}
	if (fncTrim(s_dd.value) == "") {
		fncAlert("回答日を入力してください",s_dd);
		return false;
	}
	if(!fncJudgeNumber(fncTrim(s_yy.value))){
		fncAlert("回答日は半角数字で入力してください",s_yy);
		return false;
	}
	if(!fncJudgeNumber(fncTrim(s_mm.value))){
		fncAlert("回答日は半角数字で入力してください",s_mm);
		return false;
	}
	if(!fncJudgeNumber(fncTrim(s_dd.value))){
		fncAlert("回答日は半角数字で入力してください",s_dd);
		return false;
	}

	if (fncChkDate(answer_date) == "") {
		fncAlert("回答日を正しく入力してください",s_yy);
		return false;
	}

    var voice = document.form_inp.voice;

	if (fncTrim(voice.value) != "") {
		if (fncGetLength(voice.value) > 800) {
			fncAlert("応援メッセージは全角400文字以内で入力してください",voice);
			return false;
		}
	} else {
		fncAlert("応援メッセージを入力してください", voice);
		return false;
    }

	return true;
}

/**
 * エンターキー入力を無効化する
 *
 * @param {Object} field
 * @param {Object} event
 * @return true(エンターキー以外) / false(エンターキー)
 */
function handleEnter(event) {
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if (keyCode == 13) {
		return false;
	} else {
	  return true;
	}
}