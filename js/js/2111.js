<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

function allCheckOnOff() {
	var checked = document.getElementById("all_check").checked;
	var max = document.frm.elements.length;

	for (var ii = 0; ii < max; ii++) {
		if (document.frm.elements[ii].name != "select[]") continue;
		if (document.frm.elements[ii].type != "checkbox") continue;
			document.frm.elements[ii].checked = checked;
	}
}

function chkUpd() {
	var bHit = false;
	var max = document.frm.elements.length;
	for (var ii = 0; ii < max; ii++) {
		var obj = document.frm.elements[ii];

		// �`�F�b�N�{�b�N�X�Ŗ����ꍇ
		if (obj.type != "checkbox") continue;
		// id���uselect**�v�Ŗ����ꍇ
		var id = document.frm.elements[ii].id;
		if (!id.match(/^select[0-9]+$/)) continue;

		// �`�F�b�N�{�b�N�X��ON
		if (document.frm.elements[ii].checked) {
			bHit = true;
			break;
		}
	}

	// 1���`�F�b�N�������ĂȂ��ꍇ
	if (!bHit) {
		alert("�I�����Ă��������B");
		return false;
	}

	return true;
}

function jsChkUpd() {
	var max = document.frm.elements.length;
	var list = new Array();
	var rowcnt = -1;

	for (var ii = 0; ii < max; ii++) {
		var obj = document.frm.elements[ii];

		if (obj.type == "checkbox") {
			if (obj.checked) {
				list[rowcnt] = obj.value;
			}
			rowcnt++;
		}
	}

	document.frm.mode.value='update';
	document.frm.updlist.value = list;
	document.frm.submit();
}

// �e�L�X�g�R�s�[�Ή��֐�
function copy() {
		var $elem = document.getElementById('tbody');
		var wDownloadString = table_To_text();

		var tempText            = document.createElement("textarea");
		tempText.value          = wDownloadString;
		tempText.style.position = "fixed";
		tempText.style.opacity  = "0";
		document.body.appendChild(tempText);

		tempText.select();

		document.execCommand('copy');

		document.body.removeChild(tempText);
		alert('�N���b�v�{�[�h�փR�s�[���܂����B');
}

function table_To_text () {
 // ====================================================
 //  �e�[�u�����e���A�e�L�X�g�ɕϊ�
 // ====================================================
  var wRcString = "";
  var wTABLE    = document.getElementById("table_copy");
  var wTR       = wTABLE.rows;
  // --- �s���J��Ԃ� ----------------------------------
  for(var i=0; i < wTR.length; i++){
    var wTD      = wTABLE.rows[i].cells;
    var wTR_Text = "";
    // --- ����J��Ԃ� --------------------------------
    for(var j=0; j < wTD.length; j++){
	    if(wTR_Text != ""){wTR_Text += "\t";}
	    wTR_Text += wTD[j].innerText;
    }
    // --- �s�P�ʂɉ��s������ ------------------------
    wRcString += wTR_Text + "\r\n";
  }
  // --- �ҏW�����e�L�X�g��Ԃ� ------------------------
  return wRcString;
}