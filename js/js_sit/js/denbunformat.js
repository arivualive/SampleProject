function denbunFormat(denbunStr, denbunLen, denbunType) {


	var zenFlg = 0;
	var strCnt = 0;
	var strLen = 0;
	var formatedStr = '';
	var tmpStr = '';
	var tmpChr = '';
	var errorFlg = true;
	var zenkaku = '[‚ ‚¢‚¤‚¦‚¨‚©‚«‚­‚¯‚±‚³‚µ‚·‚¹‚»‚½‚¿‚Â‚Ä‚Æ‚È‚É‚Ê‚Ë‚Ì‚Í‚Ğ‚Ó‚Ö‚Ù‚Ü‚İ‚Ş‚ß‚à‚â‚ä‚æ‚ç‚è‚é‚ê‚ë‚í‚î‚ï‚ğ‚ñ‚Ÿ‚¡‚£‚¥‚§‚á‚ã‚å‚Á@';
	var zentoku = '‚ª‚¬‚®‚°‚²‚´‚¶‚¸‚º‚¼‚¾‚À‚Ã‚Å‚Ç‚Î‚Ñ‚Ô‚×‚Ú‚Ï‚Ò‚Õ‚Ø‚Û';
	var hankaku = '-±²³´µ¶·¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖ×ØÙÚÛÜ  ¦İ±²³´µÔÕÖÂ ';
	var hantoku = '¶Ş·Ş¸Ş¹ŞºŞ»Ş¼Ş½Ş¾Ş¿ŞÀŞÁŞÂŞÃŞÄŞÊŞËŞÌŞÍŞÎŞÊßËßÌßÍßÎß';
	var delimit = String.fromCharCode(0x00);

	if (denbunType == 0 && escape('‚ ').charAt(1) == 'u') {
		for (i = 0; i < denbunLen; i ++) {
			tmpChr = escape(denbunStr.charAt(i))
			if (denbunStr.charAt(i) >= '¡' && denbunStr.charAt(i) <= 'ß') {}
			else if (tmpChr.charAt(1) == 'u') {
				if (zenFlg == 0) {
					if (denbunLen - strCnt > 4) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 3;
						zenFlg ++;
						}
					else if (denbunLen - strCnt == 4) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i) + delimit;
						strCnt = strCnt + 4;
						break;
						}
					else {
						break;
						}
					}
				else {
					if (denbunLen - strCnt > 3) {
						formatedStr = formatedStr + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						}
					else if (denbunLen - strCnt == 3) {
						formatedStr = formatedStr + denbunStr.charAt(i) + delimit;
						strCnt = strCnt + 3;
						zenFlg = 0;
						break;
						}
					else {
						formatedStr = formatedStr + delimit;
						strCnt = strCnt + 1;
						zenFlg = 0;
						break;
						}
					}
				}
			else if (denbunStr.charAt(i) >= ' ' && denbunStr.charAt(i) <= '~') {
				if (zenFlg > 0) {
					if (denbunLen - strCnt > 2) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						zenFlg = 0;
						}
					else if (denbunLen - strCnt == 2) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						zenFlg = 0;
						break;
						}
					else {
						formatedStr = formatedStr + delimit;
						strCnt = strCnt + 1;
						zenFlg = 0;
						break;
						}
					}
				else {
					if (denbunLen - strCnt == 1) {
						formatedStr = formatedStr + denbunStr.charAt(i);
						strCnt = strCnt + 1;
						break;
						}
					formatedStr = formatedStr + denbunStr.charAt(i);
					strCnt = strCnt + 1;
					}
				}
			}
		if (zenFlg > 0) {
			formatedStr = formatedStr + delimit;
			strCnt = strCnt + 1;
			}
		if (denbunLen > strCnt) {
			for (i = 0; i < denbunLen - strCnt; i ++) {
				formatedStr = formatedStr + ' ';
				}
			}
		for (i = 0; i < formatedStr.length; i ++) {
			if (formatedStr.charAt(i) != delimit) {
				tmpStr = tmpStr + formatedStr.charAt(i);
				}
			}
		return tmpStr;
		}

	if (denbunType == 0 && escape('‚ ').charAt(1) == '8') {
		for (i = 0; i < denbunLen; i ++) {
			tmpChr = escape(denbunStr.charAt(i))
			if (denbunStr.charAt(i) >= '¡' && denbunStr.charAt(i) <= 'ß') {}
			else if ((tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == '8') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == '9') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == 'E') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == 'F')) {
				if (zenFlg == 0) {
					if (denbunLen - strCnt > 4) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 3;
						zenFlg ++;
						}
					else if (denbunLen - strCnt == 4) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i) + delimit;
						strCnt = strCnt + 4;
						break;
						}
					else {
						break;
						}
					}
				else {
					if (denbunLen - strCnt > 3) {
						formatedStr = formatedStr + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						}
					else if (denbunLen - strCnt == 3) {
						formatedStr = formatedStr + denbunStr.charAt(i) + delimit;
						strCnt = strCnt + 3;
						zenFlg = 0;
						break;
						}
					else {
						formatedStr = formatedStr + delimit;
						strCnt = strCnt + 1
						zenFlg = 0;
						break;
						}
					}
				}
			else if (denbunStr.charAt(i) >= ' ' && denbunStr.charAt(i) <= '~') {
				if (zenFlg > 0) {
					if (denbunLen - strCnt > 2) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						zenFlg = 0;
						}
					else if (denbunLen - strCnt == 2) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						zenFlg = 0;
						break;
						}
					else {
						formatedStr = formatedStr + delimit;
						strCnt = strCnt + 1;
						zenFlg = 0;
						break;
						}
					}
				else {
					if (denbunLen - strCnt == 1) {
						formatedStr = formatedStr + denbunStr.charAt(i);
						strCnt = strCnt + 1;
						break
						}
					formatedStr = formatedStr + denbunStr.charAt(i);
					strCnt = strCnt + 1;
					}
				}
			}
		if (zenFlg > 0) {
			formatedStr = formatedStr + delimit;
			strCnt = strCnt + 1;
			}
		if (denbunLen > strCnt) {
			for (i = 0; i < denbunLen - strCnt; i ++) {
				formatedStr = formatedStr + ' ';
				}
			}
		for (i = 0; i < formatedStr.length; i ++) {
			if (formatedStr.charAt(i) != delimit) {
				tmpStr = tmpStr + formatedStr.charAt(i);
				}
			}
		return tmpStr;
		}

	if (denbunType == 6 && escape('‚ ').charAt(1) == 'u') {
		for (i = 0; i < denbunStr.length; i ++) {
			tmpChr = escape(denbunStr.charAt(i));
			if (denbunStr.charAt(i) >= '¡' && denbunStr.charAt(i) <= 'ß') {}
			else if (tmpChr.charAt(1) == 'u') {
				if (zenFlg == 0) {
					formatedStr = formatedStr + '<##';
					zenFlg ++;
					}
				else {
					formatedStr = formatedStr + '##';
					}
				}
			else if (denbunStr.charAt(i) >= ' ' && denbunStr.charAt(i) <= '~') {
				if (zenFlg > 0) {
					formatedStr = formatedStr + '>@';
					zenFlg = 0;
					}
				else {
					formatedStr = formatedStr + '@';
					}
				}
			}
		if (zenFlg > 0) { formatedStr = formatedStr + '>' }
		if (denbunLen < formatedStr.length) {
			return false;
			}
		else { 
				return true; 
			}
		}

	if (denbunType == 6 && escape('‚ ').charAt(1) == '8') {
		for (i = 0; i < denbunStr.length; i ++) {
			tmpChr = escape(denbunStr.charAt(i));
			if (denbunStr.charAt(i) >= '¡' && denbunStr.charAt(i) <= 'ß') {}
			else if ((tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == '8') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == '9') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == 'E') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == 'F')) {
				if (zenFlg == 0) {
					formatedStr = formatedStr + '<##';
					zenFlg ++;
					}
				else {
					formatedStr = formatedStr + '##';
					}
				}
			else if (denbunStr.charAt(i) >= ' ' && denbunStr.charAt(i) <= '~') {
				if (zenFlg > 0) {
					formatedStr = formatedStr + '>@';
					zenFlg = 0;
					}
				else {
					formatedStr = formatedStr + '@';
					}
				}
			}
		if (zenFlg > 0) { formatedStr = formatedStr + '>' }
		if (denbunLen < formatedStr.length) {
			return false;
			}
		else { 
				return true; 
			}
		}

	if (denbunType == 1) {
		denbunStr = String(denbunStr);
		if (denbunLen < denbunStr.length) {
			formatedStr = denbunStr.substring(0,denbunLen);
			}
		else if (denbunLen == denbunStr.length) {
			formatedStr = denbunStr;
			}
		else {
			formatedStr = denbunStr;
			for (i = 0; i < denbunLen - denbunStr.length; i ++) {
				formatedStr = '0' + formatedStr;
				}
			}
		return formatedStr;
		}

	if (denbunType == 5) {
		for (i = 0; i < denbunStr.length; i ++) {
			tmpStr = zenkaku.indexOf(denbunStr.charAt(i));
			if (tmpStr >= 0) { formatedStr = formatedStr + hankaku.charAt(tmpStr); }
			else {
				tmpStr = zentoku.indexOf(denbunStr.charAt(i));
				if (tmpStr >= 0) { formatedStr = formatedStr + hantoku.charAt(tmpStr * 2) + hantoku.charAt(tmpStr * 2 + 1); }
				else { formatedStr = formatedStr + ' '; }
				}
			}
		if (denbunLen < formatedStr.length) {
			formatedStr = formatedStr.substring(0,denbunLen);
			}
		else if (denbunLen > formatedStr.length) {
			cnt = denbunLen - formatedStr.length;
			for (i = 0; i < cnt; i ++) {
				formatedStr = formatedStr + ' ';
				}
			}
		return formatedStr;
		}
	}
