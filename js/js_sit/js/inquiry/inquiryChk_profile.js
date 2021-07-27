function zenhanCount(chkStr) {
	numCnt = 0;
	alpCnt = 0;
	hanCnt = 0;
	kanaCnt = 0;
	zenCnt = 0;
	ctlCnt = 0;
	tmpStr = '';

	if (escape('あ').charAt(1) == 'u') {
		for (i = 0; i < chkStr.length; i ++) {
			tmpStr = escape(chkStr.charAt(i))
			if (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'u') {
				if (chkStr.charAt(i) >= '｡' && chkStr.charAt(i) <= 'ﾟ') { kanaCnt ++ }
				else { zenCnt ++ }
				}
			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { hanCnt ++ }
			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { hanCnt ++ }
			else { ctlCnt ++ }
			}
		}
	else {
		for (i = 0; i < chkStr.length; i ++) {
			tmpStr = escape(chkStr.charAt(i))
			if ((tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == '8') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == '9') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'E') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'F')) {
				zenCnt ++
				}
			else if (chkStr.charAt(i) >= '｡' && chkStr.charAt(i) <= 'ﾟ') { kanaCnt ++ }
			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { hanCnt ++ }
			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { hanCnt ++ }
			else { ctlCnt ++ }
			}
		}

	hanCnt = hanCnt + numCnt + alpCnt;
	if (kanaCnt > 0) { return 8 }
	else if (ctlCnt > 0) { return 4 }
	else if (hanCnt == 0 && zenCnt > 0) { return 1 }
	else if (hanCnt > 0 && zenCnt > 0) { return 3 }
	else if (numCnt > 0 && hanCnt == numCnt) { return 5 }
	else if (alpCnt > 0 && hanCnt == alpCnt) { return 6 }
	else if ((alpCnt > 0 && numCnt >0) && alpCnt + numCnt == hanCnt) { return 7 }
	else if (hanCnt > 0) { return 0 }
	}

function emailCheck(chkStr) {
	var mailStr ='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~-._';
	var chkFlg = 0;

	if (zenhanCount(chkStr) != 0) { return false }
	if (chkStr.charAt(0) == '@') { return false }
	for (i = 0; i < chkStr.length; i ++) {
		if (mailStr.indexOf(chkStr.charAt(i)) == -1) {
			if (chkStr.charAt(i) != '@') { return false }
				chkFlg = chkFlg + 10000;
			}
		else {
			if (chkStr.charAt(i) == '.') { chkFlg = chkFlg + 100 }
				else { chkFlg ++ }
			}
		}
	if (chkFlg <= 10105 || chkFlg >= 20000) { return false }
	if (chkFlg - (Math.floor(chkFlg / 100) * 100) <= 5) { return false }
	return true;
}

function fieldCheck(ObjFrm, CALLTYPE) {
	if (ObjFrm.name_kanji.value.replace('　', '').length == 0 || ObjFrm.name_kanji.value.replace(' ', '').length == 0) {
		alert('お名前を入力してください。');
		ObjFrm.name_kanji.focus();
		return false
		}

	if (bLength(ObjFrm.name_kanji.value) > 30){
		alert('恐れ入りますが、お名前は全角１５文字以内で入力してください。');
		ObjFrm.name_kanji.focus();
		return false
		}

	if (ObjFrm.name_kana.value.replace('　', '').length == 0 || ObjFrm.name_kana.value.replace(' ', '').length == 0) {
		alert('フリガナを入力してください。');
		ObjFrm.name_kana.focus();
		return false
		}

	if (bLength(ObjFrm.name_kana.value) > 60){
		alert('恐れ入りますが、フリガナは全角３０文字以内で入力してください。');
		ObjFrm.name_kana.focus();
		return false
		}

	if (zenhanCount(ObjFrm.tel_no1.value) != 5 || zenhanCount(ObjFrm.tel_no2.value) != 5 || zenhanCount(ObjFrm.tel_no3.value) != 5) {
		alert('電話番号は半角数字で入力してください。');
		ObjFrm.tel_no1.focus();
		return false
		}

	if (ObjFrm.tel_no1.value == '' || ObjFrm.tel_no2.value == '' || ObjFrm.tel_no3.value == '') {
		alert('電話番号を入力してください。');
		ObjFrm.tel_no1.focus();
		return false
		}
	if (ObjFrm.email.value.length < 6 || ObjFrm.email.value.length > 100 || emailCheck(ObjFrm.email.value) == false) {
		alert('Ｅメールアドレスを正しく入力してください');
		ObjFrm.email.focus();
		return false
	}

	if (bLength(ObjFrm.voice.value) > 2000){
		alert('恐れ入りますが、ご質問・ご意見は全角１０００文字以内で入力してください。');
		ObjFrm.voice.focus();
		return false
		}

	if (ObjFrm.voice.value.replace('　', '').length == 0 || ObjFrm.voice.value.replace(' ', '').length == 0) {
		alert('ご意見を入力してください。');
		ObjFrm.voice.focus();
		return false
		}

	if(ObjFrm.tel_no1.value.length>0 || ObjFrm.tel_no2.value.length>0 || ObjFrm.tel_no3.value.length>0){
	ObjFrm.telephone.value = ObjFrm.tel_no1.value + '-' + ObjFrm.tel_no2.value + '-' + ObjFrm.tel_no3.value;
		if(ObjFrm.telephone.value.length > 13) {
			alert('市外局番-市内局番-電話番号が長すぎます。正しく入力してください。');
			ObjFrm.tel_no1.focus();
			return false
		}
	}

	ObjFrm.submit();
	return false
}

function bLength(str) { 
    var r = 0; 
    for (var i = 0; i < str.length; i++) { 
        var c = str.charCodeAt(i); 
        if ( (c >= 0x0 && c < 0x81) || (c == 0xf8f0) || (c >= 0xff61 && c < 0xffa0) || (c >= 0xf8f1 && c < 0xf8f4)) { 
            r += 1; 
        } else { 
            r += 2; 
        } 
    } 
    return r; 
} 
