// 入力チェック 
function InputChk() {
	with (document.form_inp){
		var idx = comm_cd.selectedIndex;
		if (idx == 0) {
			fncAlert("お客様プリーザーを選択してください",comm_cd);
			return false;
		}
	}
}

function jsUpd(row_no, comm_cd, kainno) {
	var comm_list = document.getElementById('commlist' + row_no);
	var comm_cd_index = comm_list.selectedIndex;
	var new_comm_cd = comm_list.options[comm_cd_index].value;

	document.kain_list.mode.value = 'comm_cd_upd';
	document.kain_list.old_comm_cd.value = comm_cd;
	document.kain_list.new_comm_cd.value = new_comm_cd;
	document.kain_list.kainno.value = kainno;
	document.kain_list.submit();
}

function jskainDel(row_no, comm_cd, kainno) {
	var comm_list = document.getElementById('commlist' + row_no);
	var comm_cd_index = comm_list.selectedIndex;
	var new_comm_cd = comm_list.options[comm_cd_index].value;

	document.kain_list.mode.value = 'comm_cd_del';
	document.kain_list.old_comm_cd.value = comm_cd;
	document.kain_list.new_comm_cd.value = new_comm_cd;
	document.kain_list.kainno.value = kainno;
	document.kain_list.submit();
}

function allCheckOnOff() {
	var checked = document.getElementById("all_check").checked;
	var max = document.kain_list.elements.length;

	for (var ii = 0; ii < max; ii++) {
		if (document.kain_list.elements[ii].type != "checkbox") continue;
		document.kain_list.elements[ii].checked = checked;
	}
}

function chkUpd() {
	var bHit = false;
	var max = document.kain_list.elements.length;
	for (var ii = 0; ii < max; ii++) {
		var obj = document.kain_list.elements[ii];

		// チェックボックスで無い場合
		if (obj.type != "checkbox") continue;
		// idが「select**」で無い場合
		var id = document.kain_list.elements[ii].id;
		if (!id.match(/^select[0-9]+$/)) continue;

		// チェックボックスがON
		if (document.kain_list.elements[ii].checked) {
			bHit = true;
			break;
		}
	}

	// 1つもチェックが入ってない場合
	if (!bHit) {
		alert("変更するデータを選択してください。");
		return false;
	}

	return true;
}

function chkDel() {
	var bHit = false;
	var max = document.kain_list.elements.length;
	for (var ii = 0; ii < max; ii++) {
		var obj = document.kain_list.elements[ii];

		// チェックボックスで無い場合
		if (obj.type != "checkbox") continue;
		// idが「select**」で無い場合
		var id = document.kain_list.elements[ii].id;
		if (!id.match(/^select[0-9]+$/)) continue;

		// チェックボックスがON
		if (document.kain_list.elements[ii].checked) {
			bHit = true;
			break;
		}
	}

	// 1つもチェックが入ってない場合
	if (!bHit) {
		alert("除外するデータを選択してください。");
		return false;
	}

	return true;
}

function jsUpdList(comm_cd){
	var max = document.kain_list.elements.length;
	var updlist = new Array();
	var rowcnt = -1;

	for (var ii = 0; ii < max; ii++) {
		var obj = document.kain_list.elements[ii];

		if (document.kain_list.elements[ii].type == "checkbox") {
			if (document.kain_list.elements[ii].checked) {
				var kainno = document.kain_list.elements[ii].value;

				if (document.getElementById('commlist' + rowcnt) != null) {
					var comm_list = document.getElementById('commlist' + rowcnt);
					var comm_cd_index = comm_list.selectedIndex;
					var new_comm_cd = comm_list.options[comm_cd_index].value;
					document.getElementById('selectCommCd' + kainno).value = new_comm_cd;
				}
			}
			rowcnt++;
		}
	}

	document.kain_list.mode.value='all_upd';
	document.kain_list.old_comm_cd.value = comm_cd;
	document.kain_list.updlist.value = updlist;
	document.kain_list.submit();
}

function jsDelList(comm_cd){
	var max = document.kain_list.elements.length;
	var rowcnt = -1;

	for (var ii = 0; ii < max; ii++) {
		var obj = document.kain_list.elements[ii];

		if (document.kain_list.elements[ii].type == "checkbox") {
			if (document.kain_list.elements[ii].checked) {
				var kainno = document.kain_list.elements[ii].value;

				if (document.getElementById('commlist' + rowcnt) != null) {
					var comm_list = document.getElementById('commlist' + rowcnt);
					var comm_cd_index = comm_list.selectedIndex;
					var new_comm_cd = comm_list.options[comm_cd_index].value;
					document.getElementById('selectCommCd' + kainno).value = new_comm_cd;
				}
			}
			rowcnt++;
		}
	}

	document.kain_list.mode.value='all_del';
	document.kain_list.old_comm_cd.value = comm_cd;
	document.kain_list.submit();
}