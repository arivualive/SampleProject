function emailCheck(chkStr) {
	// mail address のチェック
	var mailStr ='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~-._';
	var chkFlg = 0;

	if (zenhanCount(chkStr) != 0) { return false }
	if (chkStr.charAt(0) == '@') { return false }
	for (i = 0; i < chkStr.length; i ++) {
		if (mailStr.indexOf(chkStr.charAt(i)) == -1) {
			if (chkStr.charAt(i) == '@') { chkFlg = chkFlg + 10000; }
			else {
				if (chkStr.charAt(i) == '('||chkStr.charAt(i) == ')'||chkStr.charAt(i) == ';'||chkStr.charAt(i) == ':') {chkFlg ++;}
				else { return false;}
				}
			}
		else {
			if (chkStr.charAt(i) == '.') { chkFlg = chkFlg + 100 }
			else { chkFlg ++ }
			}
		}
	if (chkFlg <= 10105 || chkFlg >= 20000) { return false }
	if (chkFlg - (Math.floor(chkFlg / 100) * 100) <= 5) { return false }
	return true
}
