// “ü—Íƒ`ƒFƒbƒN
function ListChk() {
	if (document.list.mode.value=="clear") return true;

	document.list.mode.value = "find";
	with (document.list){
		var start = visit_s_yy.value + ("00" + visit_s_mm.value ).slice(-2) + ("00" + visit_s_dd.value ).slice(-2);
		if (visit_s_yy.value + visit_s_mm.value + visit_s_dd.value != "") {
			if (fncChkDate(start) == "") {
				fncAlert("–K–â“úi‚e‚q‚n‚lj‚Í³‚µ‚­“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",visit_s_yy);
				return false;
			}
		}
		var end = visit_e_yy.value + ("00" + visit_e_mm.value ).slice(-2) + ("00" + visit_e_dd.value ).slice(-2);
		if (visit_e_yy.value + visit_e_mm.value + visit_e_dd.value != "") {
			if (fncChkDate(end) == "") {
				fncAlert("–K–â“úi‚s‚nj‚Í³‚µ‚­“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",visit_e_yy);
				return false;
			}
			if (visit_s_yy.value + visit_s_mm.value + visit_s_dd.value != "") {
				if (start > end) {
					fncAlert("–K–â“úi‚e‚q‚n‚lj…–K–â“úi‚s‚nj‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",visit_s_yy);
					return false;
				}
			}
		}
	}
	return true;
}

// ƒNƒŠƒA
function ClearAction() {
    document.list.mode.value = "clear";
    document.list.submit();
}

function fncCSV() {
    document.list.mode.value = "csv";
}
