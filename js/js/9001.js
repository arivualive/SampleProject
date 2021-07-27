function fncDelConfirm_9001() {
	if (confirm('削除されます。よろしいですか？')) {
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
		errorMsg += "・注文時間FROMをご入力ください。\n";
	}
	if (!order_time_from_hour.match(regex_number) || !order_time_from_minutes.match(regex_number)) {
		errorMsg += "・注文時間FROMは半角数字のでみご入力ください。\n";
	}
	if (order_time_from_hour > 23 || order_time_from_minutes > 59) {
		errorMsg += "・注文時間FROMを正しくご入力ください。\n";
	}

	var order_time_to_hour = fncTrim(document.form_inp.order_time_to_hour.value);
	var order_time_to_minutes = fncTrim(document.form_inp.order_time_to_minutes.value);
	if (order_time_to_hour == '' || order_time_to_minutes == '') {
		errorMsg += "・注文時間TOをご入力ください。\n";
	}
	if (!order_time_to_hour.match(regex_number) || !order_time_to_minutes.match(regex_number)) {
		errorMsg += "・注文時間TOは半角数字のでみご入力ください。\n";
	}
	if (order_time_to_hour > 23 || order_time_to_minutes > 59) {
		errorMsg += "・注文時間TOを正しくご入力ください。\n";
	}

	var view_time_hour = fncTrim(document.form_inp.view_time_hour.value);
	var view_time_minutes = fncTrim(document.form_inp.view_time_minutes.value);
	if (view_time_hour == '' || view_time_minutes == '') {
		errorMsg += "・表示時間をご入力ください。\n";
	}
	if (!view_time_hour.match(regex_number) || !view_time_minutes.match(regex_number)) {
		errorMsg += "・表示時間は半角数字のでみご入力ください。\n";
	}
	if (view_time_hour > 23 || view_time_minutes > 59) {
		errorMsg += "・表示時間を正しくご入力ください。\n";
	}

	var reception_time_hour = fncTrim(document.form_inp.reception_time_hour.value);
	var reception_time_minutes = fncTrim(document.form_inp.reception_time_minutes.value);
	if (reception_time_hour == '' || reception_time_minutes == '') {
		errorMsg += "・受付時間をご入力ください。\n";
	}
	if (!reception_time_hour.match(regex_number) || !reception_time_minutes.match(regex_number)) {
		errorMsg += "・受付時間は半角数字のでみご入力ください。\n";
	}
	if (reception_time_hour > 23 || reception_time_minutes > 59) {
		errorMsg += "・受付時間を正しくご入力ください。\n";
	}

    /*
	// 翌日フラグの選択による入力チェック（0：当日、1：翌日）
	var nextday_flg = document.form_inp.nextday_flg.value;
	if (nextday_flg == '0') {
		if (order_time_from_hour >= order_time_to_hour) {
			errorMsg += "・受付時間を正しくご入力ください。\n";
		}
	} else if (nextday_flg == '1') {
		if (order_time_from_hour <= order_time_to_hour) {
			errorMsg += "・受付時間を正しくご入力ください。\n";
		}
	}
    */

	var memo = fncTrim(document.form_inp.memo.value);

	if (myCheckHankakuKana(memo, 'メモ') == false) {
		return false;
	};

	if (memo.length > 200) {
		errorMsg += "・メモは200文字以内でご入力ください。";
	}

	if (errorMsg != '') {
		alert(errorMsg);
		return false;
	}

	if (confirm('更新されます。よろしいですか？')) {
		return true;
	}

	return false;
}

function myCheckHankakuKana(obj, name) {
	for (i = 0; i < obj.length; i++) {
		c = obj.charAt(i);
		if (isHankaku(c)) {
			fncAlert(name + 'に半角カナ文字が入っています', obj);
			return false;
		}
	}
	return true;
}