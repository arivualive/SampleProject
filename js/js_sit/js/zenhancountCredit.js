function zenhanCountCredit(chkStr) {
	// 文字種カウンタ
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
			else if (chkStr.charAt(i) == '<') { hanCnt ++ }
			else if (chkStr.charAt(i) == '>') { hanCnt ++ }
			else if (chkStr.charAt(i) == "'") { hanCnt ++ }
			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { /*hanCnt ++ */ }
			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { /*hanCnt ++ */ }
			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { /*hanCnt ++ */ }
			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { /*hanCnt ++ */ }
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
			else if (chkStr.charAt(i) == '<') { hanCnt ++ }
			else if (chkStr.charAt(i) == '>') { hanCnt ++ }
			else if (chkStr.charAt(i) == "'") { hanCnt ++ }
			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { /*hanCnt ++ */ }
			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { /*hanCnt ++ */ }
			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { /*hanCnt ++ */ }
			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { /*hanCnt ++ */ }
			else { ctlCnt ++ }
			}
		}

	// 0:半角のみ 1:全角のみ 3:全半混在 4:コントロールコード混在 5:数字のみ 6:アルファベットのみ 7:半角英数のみ 8:半角カナ混在
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
