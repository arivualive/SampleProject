function formatCurr(num) {
	// ���{�ʉ݃t�H�[�}�b�g�i0,000,000,000�j
	var str = '';
	var j = 0;
	num = Number(num);
	if (num < 0) { return '-1' }
	if (num != Math.floor(num)) { return '-1' }
	num = String(num);
	if (num.length > 16) { return '-1' }
	for(i = num.length; i >= 0; i --) {
		if (j != 1 && j % 3 == 1) {str = ',' + str}
		j ++;
		str = num.charAt(i) + str;
		}
	return str
	}
