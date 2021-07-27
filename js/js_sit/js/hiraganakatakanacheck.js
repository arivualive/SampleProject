function hiraganakatakanaCheck(chkStr) {
	// ふりがな用ひらがなカタカナ入力チェック

	var i;

	for (i = 0; i < chkStr.length; i ++) {
		if ((chkStr.charAt(i) >= 'ぁ' && chkStr.charAt(i) <= 'ん') || (chkStr.charAt(i) >= 'ァ' && chkStr.charAt(i) <= 'ヴ') || chkStr.charAt(i) == 'ー'){ continue }
		else { return false }
		}
	return true
	}
