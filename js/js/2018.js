function myCheckLength(obj, num, name, arg) {
	if (arg == "kainno" && obj.value.length > 0) {
		if (!/^[0-9０-９]+$/.test(obj.value)) { 
			fncAlert(name + "は半角数字で入力してください" , obj);
			return false;
		}else if(fncGetLength(obj.value) > num){
			fncAlert(name + "は半角" + num + "文字以内で入力してください" , obj);
			return false;
		} else {
			return true;
		}
	}else if (arg == "tel") {
		str = obj.value.replace(/-/g,"");
		if(str.length != 0 && str.length < num){
			fncAlert(name + "は半角数字" + num + "文字以上(ハイフンは含まない)で入力してください" , obj);
			return false;
		} else if (str.length != 0 && !/^[0-9]+$/.test(str)) { 
			fncAlert(name + "は半角数字で入力してください" , obj);
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

function myCheckLengthEq(obj, num, name) {
	if(fncGetLength(obj.value) == num){
		fncAlert(name + "は全角" + num + "文字以内で入力してください" , obj);
		return false;
	} else {
		return true;
	}
}
// 入力チェック 
function ListChk() {
	with (document.list){
		if (! myCheckLength(kainno, 8, "会員番号", "kainno")){
			return false;
		}
		if(kainno.value.length == 0){
			fncAlert("会員番号を入力して検索してください",kainno);
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

function jsUnlock(kainno){
	if(!kainno){
		alert('会員番号が指定されていません。');
		return false;
	}
	if(!/^[0-9]+$/.test(kainno) || fncGetLength(kainno) != 8){
		alert('会員番号が正しくありません。');
		return false;
	}
	document.list2.kainno.value = kainno;
	document.list2.mode.value = "unlock_confirm";
	document.list2.submit();
}
function jsUnlockComplete(){
	var kainno = document.unlock_confirm.kainno.value;
	if(!kainno){
		alert('会員番号が指定されていません。');
		return false;
	}
	if(!/^[0-9]+$/.test(kainno) || fncGetLength(kainno) != 8){
		alert('会員番号が正しくありません。');
		return false;
	}
	document.unlock_confirm.submit();
}