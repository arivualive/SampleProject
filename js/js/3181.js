// ���̓`�F�b�N
function ListChk() {
	if (document.list.mode.value=="clear") return true;

	document.list.mode.value = "find";
	with (document.list){
		var start = visit_s_yy.value + ("00" + visit_s_mm.value ).slice(-2) + ("00" + visit_s_dd.value ).slice(-2);
		if (visit_s_yy.value + visit_s_mm.value + visit_s_dd.value != "") {
			if (fncChkDate(start) == "") {
				fncAlert("�K����i�e�q�n�l�j�͐��������͂��Ă�������",visit_s_yy);
				return false;
			}
		}
		var end = visit_e_yy.value + ("00" + visit_e_mm.value ).slice(-2) + ("00" + visit_e_dd.value ).slice(-2);
		if (visit_e_yy.value + visit_e_mm.value + visit_e_dd.value != "") {
			if (fncChkDate(end) == "") {
				fncAlert("�K����i�s�n�j�͐��������͂��Ă�������",visit_e_yy);
				return false;
			}
			if (visit_s_yy.value + visit_s_mm.value + visit_s_dd.value != "") {
				if (start > end) {
					fncAlert("�K����i�e�q�n�l�j���K����i�s�n�j�œ��͂��Ă�������",visit_s_yy);
					return false;
				}
			}
		}
	}
	return true;
}

// �N���A
function ClearAction() {
    document.list.mode.value = "clear";
    document.list.submit();
}

function fncCSV() {
    document.list.mode.value = "csv";
}
