function fncDelConfirm_9001() {
	if (confirm('�폜����܂��B��낵���ł����H')) {
		return true;
	} else {
		return false;
	}
}

function fncUpdateConfirm_9001() {
	errorMsg = '';
	var regex_number = /^[0-9]+$/;

	var order_time_from_hour = fncTrim(document.form_inp.order_time_from_hour.value);
	var order_time_from_minutes = fncTrim(document.form_inp.order_time_from_minutes.value);
	if (order_time_from_hour == '' || order_time_from_minutes == '') {
		errorMsg += "�E��������FROM�������͂��������B\n";
	}
	if (!order_time_from_hour.match(regex_number) || !order_time_from_minutes.match(regex_number)) {
		errorMsg += "�E��������FROM�͔��p�����̂ł݂����͂��������B\n";
	}
	if (order_time_from_hour > 23 || order_time_from_minutes > 59) {
		errorMsg += "�E��������FROM�𐳂��������͂��������B\n";
	}

	var order_time_to_hour = fncTrim(document.form_inp.order_time_to_hour.value);
	var order_time_to_minutes = fncTrim(document.form_inp.order_time_to_minutes.value);
	if (order_time_to_hour == '' || order_time_to_minutes == '') {
		errorMsg += "�E��������TO�������͂��������B\n";
	}
	if (!order_time_to_hour.match(regex_number) || !order_time_to_minutes.match(regex_number)) {
		errorMsg += "�E��������TO�͔��p�����̂ł݂����͂��������B\n";
	}
	if (order_time_to_hour > 23 || order_time_to_minutes > 59) {
		errorMsg += "�E��������TO�𐳂��������͂��������B\n";
	}

	var view_time_hour = fncTrim(document.form_inp.view_time_hour.value);
	var view_time_minutes = fncTrim(document.form_inp.view_time_minutes.value);
	if (view_time_hour == '' || view_time_minutes == '') {
		errorMsg += "�E�\�����Ԃ������͂��������B\n";
	}
	if (!view_time_hour.match(regex_number) || !view_time_minutes.match(regex_number)) {
		errorMsg += "�E�\�����Ԃ͔��p�����̂ł݂����͂��������B\n";
	}
	if (view_time_hour > 23 || view_time_minutes > 59) {
		errorMsg += "�E�\�����Ԃ𐳂��������͂��������B\n";
	}

	var reception_time_hour = fncTrim(document.form_inp.reception_time_hour.value);
	var reception_time_minutes = fncTrim(document.form_inp.reception_time_minutes.value);
	if (reception_time_hour == '' || reception_time_minutes == '') {
		errorMsg += "�E��t���Ԃ������͂��������B\n";
	}
	if (!reception_time_hour.match(regex_number) || !reception_time_minutes.match(regex_number)) {
		errorMsg += "�E��t���Ԃ͔��p�����̂ł݂����͂��������B\n";
	}
	if (reception_time_hour > 23 || reception_time_minutes > 59) {
		errorMsg += "�E��t���Ԃ𐳂��������͂��������B\n";
	}

    /*
	// �����t���O�̑I���ɂ����̓`�F�b�N�i0�F�����A1�F�����j
	var nextday_flg = document.form_inp.nextday_flg.value;
	if (nextday_flg == '0') {
		if (order_time_from_hour >= order_time_to_hour) {
			errorMsg += "�E��t���Ԃ𐳂��������͂��������B\n";
		}
	} else if (nextday_flg == '1') {
		if (order_time_from_hour <= order_time_to_hour) {
			errorMsg += "�E��t���Ԃ𐳂��������͂��������B\n";
		}
	}
    */

	var memo = fncTrim(document.form_inp.memo.value);

	if (myCheckHankakuKana(memo, '����') == false) {
		return false;
	};

	if (memo.length > 200) {
		errorMsg += "�E������200�����ȓ��ł����͂��������B";
	}

	if (errorMsg != '') {
		alert(errorMsg);
		return false;
	}

	if (confirm('�X�V����܂��B��낵���ł����H')) {
		return true;
	}

	return false;
}

function myCheckHankakuKana(obj, name) {
	for (i = 0; i < obj.length; i++) {
		c = obj.charAt(i);
		if (isHankaku(c)) {
			fncAlert(name + '�ɔ��p�J�i�����������Ă��܂�', obj);
			return false;
		}
	}
	return true;
}