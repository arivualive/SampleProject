function hiraganaCheck(chkStr) {
	// �ӂ肪�ȗp�Ђ炪�ȓ��̓`�F�b�N

	var i;

	for (i = 0; i < chkStr.length; i ++) {
		if ((chkStr.charAt(i) >= '��' && chkStr.charAt(i) <= '��') || chkStr.charAt(i) == '�['){ continue }
		else { return false }
		}
	return true
	}