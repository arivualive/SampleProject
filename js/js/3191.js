// ���̓`�F�b�N
function chkInputDate(mode,mailfilterid) {
	var return_flg = true;
	var p_mode;
	switch(mode){
		case 'search':
			p_mode = "search";
			break;
		case 'update':
			p_mode = "updFilterData";
			document.list.action = "list.php#a" + mailfilterid;
			break;
	}
	if (return_flg === true) {
		HiddenValAdd(p_mode,mailfilterid);
	}
	return return_flg;
}

function HiddenValAdd(pmode,mailfilterid){
	with (document.list){
		if (typeof pmode === "undefined") {
			pMode.value ="";
		}else{
			pMode.value =pmode;
		}
		if (mailfilterid) {
			var wk_delflg = "DeleteFlg"+ mailfilterid;
			MailFilterId.value = mailfilterid;
			MailDelFlg.value   = document.getElementsByName(wk_delflg)[0].value;
		}
	}
}

// �o�^
function InputChk(isconfirm){
	var errormsg = "";
	with (document.input){
		if (fncTrim(ChkString.value) == "") {
			errormsg += "�E�U�����������͂��Ă�������\n";
		}
	}
	if (errormsg == "") {
		return true;
	} else {
		alert(errormsg);
		return false;
	}
}

// �L�����Z��
function CancelChk() {
	document.input.mode_prm.value = "cancel";
	document.input.action = "input.php";
	document.input.submit();
	return true;
}

// �I���������ɂ��A�I���ł���R���^�N�g���e�𐧌�
function makeContactKbn(contact_kbn){

	var contact_kbn_list = new Array();

	// ���FPC
	contact_kbn_list[1] = new Array();
	contact_kbn_list[1][1]  = '��т̐�';
	contact_kbn_list[1][2]  = 'Net����֘A';
	contact_kbn_list[1][3]  = 'TELDM�֘A';
	contact_kbn_list[1][4]  = '�����֘A';
	contact_kbn_list[1][5]  = '�N���[���E�v�]';
	contact_kbn_list[1][90] = '���̑��⍇��';
	contact_kbn_list[1][20] = '�����ăv���[�U�[';
	contact_kbn_list[1][30] = 'WEB�J���o�^';
	contact_kbn_list[1][31] = 'WEB�J���A���P�[�g';
	contact_kbn_list[1][42] = '�p�E�`�E�^�I�����p';
	contact_kbn_list[1][43] = '�p�E�`�E�^�I�����p�폜';
	contact_kbn_list[1][50] = '�N�`�R�~���e';
	contact_kbn_list[1][60] = '�Љ�';
	contact_kbn_list[1][70] = '�o�^���ύX';
	contact_kbn_list[1][80] = '����\����';

	// ���FMB
	contact_kbn_list[2] = new Array();
	contact_kbn_list[2][1]  = '��т̐�';
	contact_kbn_list[2][2]  = 'Net����֘A';
	contact_kbn_list[2][3]  = 'TELDM�֘A';
	contact_kbn_list[2][4]  = '�����֘A';
	contact_kbn_list[2][5]  = '�N���[���E�v�]';
	contact_kbn_list[2][90] = '���̑��⍇��';
	contact_kbn_list[2][20] = '�����ăv���[�U�[';
	contact_kbn_list[2][30] = 'WEB�J���o�^';
	contact_kbn_list[2][31] = 'WEB�J���A���P�[�g';
	contact_kbn_list[2][42] = '�p�E�`�E�^�I�����p';
	contact_kbn_list[2][43] = '�p�E�`�E�^�I�����p�폜';
	contact_kbn_list[2][50] = '�N�`�R�~���e';
	contact_kbn_list[2][60] = '�Љ�';
	contact_kbn_list[2][70] = '�o�^���ύX';
	contact_kbn_list[2][80] = '����\����';

	// ���F���[����M
	contact_kbn_list[3] = new Array();
	contact_kbn_list[3][1]  = '��т̐�';
	contact_kbn_list[3][2]  = 'Net����֘A';
	contact_kbn_list[3][3]  = 'TELDM�֘A';
	contact_kbn_list[3][4]  = '�����֘A';
	contact_kbn_list[3][5]  = '�N���[���E�v�]';
	contact_kbn_list[3][90] = '���̑��⍇��';

	// ���F���̑����[��
	contact_kbn_list[4] = new Array();
	contact_kbn_list[4][91] = '�����G���[';
	contact_kbn_list[4][92] = '�T���v���G���[';
	contact_kbn_list[4][93] = '���f���[��';
	contact_kbn_list[4][94] = '��Ж⍇��';
	contact_kbn_list[4][99] = '���̑�';

	var uke_kbn = document.getElementsByName("RuteKbn")[0].value;
	var select  = document.getElementById("ContactKbn");

	// option�v�f���폜�i���@�͂��낢�날��܂����j
	while (0 < select.childNodes.length) {
		select.removeChild(select.childNodes[0]);
	}

	var itemLen = contact_kbn_list[uke_kbn].length;
	for(j=1; j<itemLen; j++){
		if (contact_kbn_list[uke_kbn][j] != undefined) {
			// option�v�f�𐶐�
			var option = document.createElement('option');
			var text = document.createTextNode(contact_kbn_list[uke_kbn][j]);
			option.appendChild(text);
			option.setAttribute('value', j);
			// �o�^�ς݃R���^�N�g�敪�ƈ�v����ꍇ�͑I���ς݂Ƃ���
			if (j == contact_kbn ) {
				option.selected = true;
			}
			// option�v�f��ǉ�
			select.appendChild(option);
		}
	}
}