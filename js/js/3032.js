// 3032 �d�v�Ȃ��m�点 js

/*--------------------------------------------------------
 * insertConfirm
 * �T�@�v�F�V�K�o�^�{�^���������̊m�F�_�C�A���O
 * ���@���F
 * �߂�l�F�͂�: true ������:false
 --------------------------------------------------------*/
function insertConfirm() {

	if (confirm('���͂��ꂽ����o�^���܂��B��낵���ł����H')) {
		return true;
	} else {
		return false;
	}

}

/*--------------------------------------------------------
 * confirmDel
 * �T�@�v�F�폜�{�^���������̊m�F�_�C�A���O
 * ���@���F
 * �߂�l�F�͂�: true ������:false
 --------------------------------------------------------*/
function confirmDel() {

	var ref = document.activeElement.href;
	var index = ref.indexOf("report_id=");
	var reportId = ref.slice(index + 10);
	if (confirm('���m�点ID�i' + reportId + '�j���폜���܂��B��낵���ł����H')) {
		return true;
	} else {
		return false;
	}

}

/*--------------------------------------------------------
 * setSysdate
 * �T�@�v�F�t�H�[���֌��ݎ���������
 * ���@���F
 * �߂�l�F�Ȃ�
 --------------------------------------------------------*/
function setSysdate() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	d = dt.getDate();
	h = dt.getHours();
	mi = dt.getMinutes();

	document.register.s_yy.value = y;
	document.register.s_mm.value = m;
	document.register.s_dd.value = d;
	document.register.s_hh.value = h;
	document.register.s_mi.value = mi;
}

/*--------------------------------------------------------
 * setFinalTime
 * �T�@�v�F�t�H�[���֖������Ƃ���9999�N12��31��23��59��������
 * ���@���F
 * �߂�l�F�Ȃ�
 --------------------------------------------------------*/
function setFinalTime() {
	dt = new Date();
	y = 9999;
	m = 12;
	d = 31;
	h = 23;
	mi = 59;

	document.register.e_yy.value = y;
	document.register.e_mm.value = m;
	document.register.e_dd.value = d;
	document.register.e_hh.value = h;
	document.register.e_mi.value = mi;
}

/*--------------------------------------------------------
 * InputChk
 * �T�@�v�F�V�K�o�^�E�X�V��ʗp���̓`�F�b�N
 * ���@���F
 * �߂�l�F�͂�: true ������:false
 --------------------------------------------------------*/
function InputChk() {
	with (document) {

		// �f�ڏꏊ
		var publishPlace = getElementsByName("detail_publish_place[]");
		var checkedFlag = false;
		for (var i = 0; i < publishPlace.length; i++) {
			if (publishPlace[i].checked) {
				checkedFlag = true;
			}
		}
		if (!checkedFlag) {
			 fncAlert("�f�ڏꏊ��I�����Ă�������", publishPlace[0]);
			return false;
		}
	}
	with (document.register) {

		// ���m�点 ���e
		if (fncTrim(detail_msg.value) == "") {
			fncAlert("���m�点���e����͂��Ă�������", detail_msg);
			return false;
		} else {
			if (fncGetLength(detail_msg.value) > 1000) {
				fncAlert("���m�点���e��1000�����ȓ��œ��͂��Ă�������\n�S�p�P�����͂Q�����Ƃ݂Ȃ��܂�", detail_msg);
				return false;
			} else {
				detail_msg = JSON.stringify(detail_msg, null, 2);
			}
		}

		// �\���J�n����
		var start_date = s_yy.value + ("00" + s_mm.value).slice(-2)
				+ ("00" + s_dd.value).slice(-2) + ("00" + s_hh.value).slice(-2)
				+ ("00" + s_mi.value).slice(-2);
		var start_yymmdd = s_yy.value + ("00" + s_mm.value).slice(-2)
				+ ("00" + s_dd.value).slice(-2);
		var start_hhmi = ("00" + s_hh.value).slice(-2)
				+ ("00" + s_mi.value).slice(-2);
		if (fncTrim(s_yy.value) == "") {
			fncAlert("�J�n���t�i�N�j����͂��Ă�������", s_yy);
			return false;
		}
		if (fncTrim(s_mm.value) == "") {
			fncAlert("�J�n���t�i���j����͂��Ă�������", s_mm);
			return false;
		}
		if (fncTrim(s_dd.value) == "") {
			fncAlert("�J�n���t�i���j����͂��Ă�������", s_dd);
			return false;
		}
		if (fncTrim(s_hh.value) == "") {
			fncAlert("�J�n���t�i���j����͂��Ă�������", s_hh);
			return false;
		}
		if (fncTrim(s_mi.value) == "") {
			fncAlert("�J�n���t�i���j����͂��Ă�������", s_mi);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(s_yy.value))) {
			fncAlert("�J�n���t�i�N�j�͔��p�����œ��͂��Ă�������", s_yy);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(s_mm.value))) {
			fncAlert("�J�n���t�i���j�͔��p�����œ��͂��Ă�������", s_mm);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(s_dd.value))) {
			fncAlert("�J�n���t�i���j�͔��p�����œ��͂��Ă�������", s_dd);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(s_hh.value))) {
			fncAlert("�J�n���t�i���j�͔��p�����œ��͂��Ă�������", s_hh);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(s_mi.value))) {
			fncAlert("�J�n���t�i���j�͔��p�����œ��͂��Ă�������", s_mi);
			return false;
		}
		if (fncChkDate(start_yymmdd) == "") {
			fncAlert("�J�n���t�𐳂������͂��Ă�������", s_yy);
			return false;
		}
		if (fncChkTime(start_hhmi) == "") {
			fncAlert("�J�n���t�𐳂������͂��Ă�������", s_hh);
			return false;
		}

		// �\���I������
		var end_date = e_yy.value + ("00" + e_mm.value).slice(-2)
				+ ("00" + e_dd.value).slice(-2) + ("00" + e_hh.value).slice(-2)
				+ ("00" + e_mi.value).slice(-2);
		var end_yymmdd = e_yy.value + ("00" + e_mm.value).slice(-2)
				+ ("00" + e_dd.value).slice(-2);
		var end_hhmi = ("00" + e_hh.value).slice(-2)
				+ ("00" + e_mi.value).slice(-2);

		if (fncTrim(e_yy.value) == "") {
			fncAlert("�I�����t�i�N�j����͂��Ă�������", e_yy);
			return false;
		}
		if (fncTrim(e_mm.value) == "") {
			fncAlert("�I�����t�i���j����͂��Ă�������", e_mm);
			return false;
		}
		if (fncTrim(e_dd.value) == "") {
			fncAlert("�I�����t�i���j����͂��Ă�������", e_dd);
			return false;
		}
		if (fncTrim(e_hh.value) == "") {
			fncAlert("�I�����t�i���j����͂��Ă�������", e_hh);
			return false;
		}
		if (fncTrim(e_mi.value) == "") {
			fncAlert("�I�����t�i���j����͂��Ă�������", e_mi);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(e_yy.value))) {
			fncAlert("�I�����t�i�N�j�͔��p�����œ��͂��Ă�������", e_yy);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(e_mm.value))) {
			fncAlert("�I�����t�i���j�͔��p�����œ��͂��Ă�������", e_mm);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(e_dd.value))) {
			fncAlert("�I�����t�i���j�͔��p�����œ��͂��Ă�������", e_dd);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(e_hh.value))) {
			fncAlert("�I�����t�i���j�͔��p�����œ��͂��Ă�������", e_hh);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(e_mi.value))) {
			fncAlert("�I�����t�i���j�͔��p�����œ��͂��Ă�������", e_mi);
			return false;
		}
		if (fncChkDate(end_yymmdd) == "") {
			fncAlert("�I�����t�𐳂������͂��Ă�������", e_yy);
			return false;
		}
		if (fncChkTime(end_hhmi) == "") {
			fncAlert("�I�����t�𐳂������͂��Ă�������", e_hh);
			return false;
		}
		if (fncTrim(start_date) > fncTrim(end_date)) {
			fncAlert("�J�n���t�ƏI�����t�𐳂������͂��Ă�������", s_yy);
			return false;
		}

		// �\���t���O
		if (fncTrim(valid_flg.value) == "") {
			fncAlert("�\���t���O��I�����Ă�������", valid_flg);
			return false;
		}

		if (fncTrim(btn_val.value) == "�V�K�o�^") {
			if (!insertConfirm()) {
				return false;
			}
		} else {
			if (!fncEditConfirm()) {
				return false;
			}
		}
	}
}
