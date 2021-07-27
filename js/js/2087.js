<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

window.onsubmit = function() {
	return FindCheck2087();
}

function allCheckOnOff() {
	var checked = document.getElementById("all_check").checked;
	var max = document.frm_skin.elements.length;

	for (var ii = 0; ii < max; ii++) {
		if (document.frm_skin.elements[ii].name != "select[]") continue;
		if (document.frm_skin.elements[ii].type != "checkbox") continue;
			document.frm_skin.elements[ii].checked = checked;
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

function FindCheck2087(page) {
	with (document.frm){
        if (! myCheckLength(skainno, 8, "会員番号")) return false;
    }
    document.frm.page.value = page;
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

function chkUpd() {
	var bHit = false;
	var max = document.frm_skin.elements.length;
	for (var ii = 0; ii < max; ii++) {
		var obj = document.frm_skin.elements[ii];

		// チェックボックスで無い場合
		if (obj.type != "checkbox") continue;
		// idが「select**」で無い場合
		var id = document.frm_skin.elements[ii].id;
		if (!id.match(/^select[0-9]+$/)) continue;

		// チェックボックスがON
		if (document.frm_skin.elements[ii].checked) {
			bHit = true;
			break;
		}
	}

	// 1つもチェックが入ってない場合
	if (!bHit) {
		alert("コメントを選択してください。");
		return false;
	}

	return true;
}

function jsChkUpd() {
	var max = document.frm_skin.elements.length;
	var list = new Array();
	var rowcnt = -1;

	for (var ii = 0; ii < max; ii++) {
		var obj = document.frm_skin.elements[ii];

		if (obj.type == "checkbox") {
			if (obj.checked) {
				list[rowcnt] = obj.value;
			}
			rowcnt++;
		}
	}

	document.frm_skin.mode.value='upd';
	document.frm_skin.updlist.value = list;
	document.frm_skin.submit();
}

function jsRegist(newsId, memoDt, newsKind) {
	window.open('/2085/input.php?mode=add&mode_prm=input&newsId='+newsId+'&memoDt='+memoDt+'&newsKind='+newsKind,'','width=650,height=725,scrollbars=yes');
}

function jsEdit(newsId, memoDt, newsKind, commentId, userType) {
	window.open('/2085/input.php?mode=edit&mode_prm=input&newsId='+newsId+'&memoDt='+memoDt+'&newsKind='+newsKind+'&commentId='+commentId+'&userType='+userType,'','width=650,height=725,scrollbars=yes');
}

function InputChk(inMode, id) {

	if(inMode == "FINISH"){
		document.form_inp.submit();
		return true;
	}

	if(inMode == "DELETE"){
		document.form_inp.mode_ctl.value = inMode;
		document.form_inp.submit();
		return true;
	}

	if(inMode == "CANCEL" || inMode == 'BACK'){
		document.form_inp.mode_ctl.value = inMode;
		if(id != ''){
			document.form_inp.action = "detail.php?id=" + id;
		} else {
			document.form_inp.action = "list.php";
		}
		document.form_inp.submit();
		return true;
	}

	with (document.form_inp){
		if (fncTrim(userComment.value) == "") {
			fncAlert("コメントを入力してください",userComment);
			return false;
		}
		if(fncGetLength(userComment.value) > 400){
			fncAlert("コメントは200文字以内で入力してください",userComment);
			return false;
		}

		document.form_inp.mode_ctl.value = inMode;
		document.form_inp.submit();
		return true;
	}
}

function jsCalendarClose(){
	if(!window.opener || window.opener.closed){
		//親ウィンドウが存在しない
		window.self.close();
	} else {
		parent.window.opener.document.frm.mode.value='upd';
		parent.window.opener.document.frm.submit();
		window.self.close();
	}
}

function jsSkinClose(){
	if(!window.opener || window.opener.closed){
		//親ウィンドウが存在しない
		window.self.close();
	} else {
		parent.window.opener.document.frm_skin.submit();
		window.self.close();
	}
}

function jsSkinDetail(kainno, action_url, page) {
	document.frm.kainno.value = kainno;
	document.frm.action = 'skin_detail.php';
	document.frm.back_action.value = action_url;
	document.frm.dpage.value = page;
	document.frm.submit();
}
function jsCalendarDetail(kainno, action_url) {
	document.frm_cal.kainno.value = kainno;
	document.frm_cal.back_action.value = action_url;
	document.frm_cal.submit();
}

function jsPageNation(page, action_url) {
	document.frm_skin.dpage.value = page;
	document.frm_skin.back_action.value = action_url;
	document.frm_skin.submit();
}

function jsSkinCancel(mode) {
	document.form_inp.mode.value = mode;
	document.form_inp.mode_prm.value = 'input';
	document.form_inp.mode_ctl.value = '';
	document.form_inp.action = "input.php";
	document.form_inp.submit();
}

function jsCalendarCancel(mode) {
	document.form_inp.mode.value = mode;
	document.form_inp.mode_prm.value = 'input';
	document.form_inp.mode_ctl.value = '';
	document.form_inp.action = "input.php";
	document.form_inp.submit();
}

function chkLength(obj) {
	var objname = document.getElementById('textCountUp');
	objname.innerHTML = obj.value.length;
	if (obj.getAttribute && obj.value.length > 200) { 
		objname.style.color = "#ff0000";
	}else{
		objname.style.color = "#000000";
	}
}

function jsFollowInsUpd(dpage) {

	//チェック
	with (document.frm_fw){
		if (fncTrim(f_memo.value) > 40) {
			fncAlert("フォロー状況は20文字以内で入力してください", f_memo);
			return false;
		}
	}

	var fstatus = document.getElementById('fstatus');
	document.frm_fw.mode.value = 'ins_upd_fw';
	document.frm_fw.f_memo.value = document.getElementById('fmemo').value;
	document.frm_fw.dpage.value  = dpage;
	document.frm_fw.submit();
}
