
//�`�F�b�N�{�b�N�XON/OFF����
function allCheckOnOff() {
	var checked = document.getElementById("all_check").checked;
	var max = document.line.elements.length;

	for (var ii = 0; ii < max; ii++) {
		if (document.line.elements[ii].name != "select[]") continue;
		if (document.line.elements[ii].type != "checkbox") continue;
			document.line.elements[ii].checked = checked;
	}
}
//�`�F�b�N�{�b�N�X��ԃ`�F�b�N
function chkUpd() {
	var bHit = false;
	var max = document.line.elements.length;
	for (var ii = 0; ii < max; ii++) {
		var obj = document.line.elements[ii];

		// �`�F�b�N�{�b�N�X�Ŗ����ꍇ
		if (obj.type != "checkbox") continue;
		// id���uselect**�v�Ŗ����ꍇ
		var id = document.line.elements[ii].id;
		if (!id.match(/^select[0-9]+$/)) continue;

		// �`�F�b�N�{�b�N�X��ON
		if (document.line.elements[ii].checked) {
			bHit = true;
			break;
		}
	}

	// 1���`�F�b�N�������ĂȂ��ꍇ
	if (!bHit) {
		alert("���M���I�����Ă��������B");
		return false;
	}

	return true;
}
// ����
function Action1061Find() {
    document.line.mode.value = "find";
    with (document.line) {
        if (fncTrim(kaiin_no.value) == '' && fncTrim(tel_no.value) == '' && fncTrim(line_uid.value) == '') {
            fncAlert('�����̍ۂ́A�u���q�l�ԍ��v�A�u�d�b�ԍ��v�A�uLINE UID�v�̂����ꂩ����͂��Ă��������B', kaiin_no);
            return false;
        }
        if(fncTrim(kaiin_no.value) != ''){
            //���q�l�ԍ��`�F�b�N
            if ( fncGetLength(kaiin_no.value) > 8) {
                fncAlert('���q�l�ԍ���8�o�C�g�ȓ��œ��͂��Ă��������B', kaiin_no);
                return false;
            }
            if (fncJudgeNumber(kaiin_no.value) == false) {
                fncAlert('���q�l�ԍ��͔��p�����œ��͂��Ă��������B', kaiin_no);
                return false;
            }
        }
        if(fncTrim(tel_no.value) != ''){
            //�d�b�ԍ��`�F�b�N
            if (fncGetLength(tel_no.value) > 13) {
                fncAlert('�d�b�ԍ���13�o�C�g�ȓ��œ��͂��Ă��������B', tel_no);
                return false;
            }
            str = tel_no.value.replace(/-/g,"");
            if((str.length != 0 && str.length < 10) || str.length > 11 || fncJudgeNumber(str) == false){
                fncAlert("�d�b�ԍ��͔��p����10�`13�����œ��͂��Ă��������B" , tel_no);
                return false;
            }
        }
        if(fncTrim(line_uid.value) != ''){
            //LINE UID�`�F�b�N
            var string = line_uid.value;
            if (line_uid.value.match(/[^A-Za-z0-9]/) || fncGetLength(line_uid.value) != 33 || string.charAt(0) != 'U') {
                fncAlert("LINE UID�́A�擪��'U'����n�܂锼�p�p��33�����œ��͂��Ă��������B", line_uid);
                return false;
            }
        }
    }
    return true;
}
// LINE UID���ړ���
function Action1061Direct() {
    document.line.mode.value = "direct";
    with (document.line) {
        //LINE UID�`�F�b�N
        var string = line_uid.value;
        if (line_uid.value.match(/[^A-Za-z0-9]/) || fncGetLength(line_uid.value) != 33 || string.charAt(0) != 'U') {
            fncAlert("LINE UID�́A�擪��'U'����n�܂锼�p�p��33�����œ��͂��Ă��������B", line_uid);
            return false;
        }
    }
    return true;
}
// CSV�C���|�[�g
function Action1061Import() {
    document.line.mode.value = "import";
    return true;
}
// �N���A
function ClearAction() {
    document.line.mode.value = "clear";
    //�m�F���b�Z�[�W�_�C�A���O�\��
    if(!window.confirm('�ݒ肳��Ă��鑗�M����N���A���܂��B\n��낵���ł����H')){
        //�L�����Z���̏ꍇ
        return false;
    }
    return true;
}
//�A�E�g�o�E���h���M
function Action1061Input() {
//�A�E�g�o�E���h���M�����̎d�l������̂��߁Afalse��Ԃ��B
    return false;
//    return true;
}

