// 3032 重要なお知らせ js

/*--------------------------------------------------------
 * insertConfirm
 * 概　要：新規登録ボタン押下時の確認ダイアログ
 * 引　数：
 * 戻り値：はい: true いいえ:false
 --------------------------------------------------------*/
function insertConfirm() {

	if (confirm('入力された情報を登録します。よろしいですか？')) {
		return true;
	} else {
		return false;
	}

}

/*--------------------------------------------------------
 * confirmDel
 * 概　要：削除ボタン押下時の確認ダイアログ
 * 引　数：
 * 戻り値：はい: true いいえ:false
 --------------------------------------------------------*/
function confirmDel() {

	var ref = document.activeElement.href;
	var index = ref.indexOf("report_id=");
	var reportId = ref.slice(index + 10);
	if (confirm('お知らせID（' + reportId + '）を削除します。よろしいですか？')) {
		return true;
	} else {
		return false;
	}

}

/*--------------------------------------------------------
 * setSysdate
 * 概　要：フォームへ現在時刻を入れる
 * 引　数：
 * 戻り値：なし
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
 * 概　要：フォームへ無期限として9999年12月31日23時59分を入れる
 * 引　数：
 * 戻り値：なし
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
 * 概　要：新規登録・更新画面用入力チェック
 * 引　数：
 * 戻り値：はい: true いいえ:false
 --------------------------------------------------------*/
function InputChk() {
	with (document) {

		// 掲載場所
		var publishPlace = getElementsByName("detail_publish_place[]");
		var checkedFlag = false;
		for (var i = 0; i < publishPlace.length; i++) {
			if (publishPlace[i].checked) {
				checkedFlag = true;
			}
		}
		if (!checkedFlag) {
			 fncAlert("掲載場所を選択してください", publishPlace[0]);
			return false;
		}
	}
	with (document.register) {

		// お知らせ 内容
		if (fncTrim(detail_msg.value) == "") {
			fncAlert("お知らせ内容を入力してください", detail_msg);
			return false;
		} else {
			if (fncGetLength(detail_msg.value) > 1000) {
				fncAlert("お知らせ内容は1000文字以内で入力してください\n全角１文字は２文字とみなします", detail_msg);
				return false;
			} else {
				detail_msg = JSON.stringify(detail_msg, null, 2);
			}
		}

		// 表示開始日時
		var start_date = s_yy.value + ("00" + s_mm.value).slice(-2)
				+ ("00" + s_dd.value).slice(-2) + ("00" + s_hh.value).slice(-2)
				+ ("00" + s_mi.value).slice(-2);
		var start_yymmdd = s_yy.value + ("00" + s_mm.value).slice(-2)
				+ ("00" + s_dd.value).slice(-2);
		var start_hhmi = ("00" + s_hh.value).slice(-2)
				+ ("00" + s_mi.value).slice(-2);
		if (fncTrim(s_yy.value) == "") {
			fncAlert("開始日付（年）を入力してください", s_yy);
			return false;
		}
		if (fncTrim(s_mm.value) == "") {
			fncAlert("開始日付（月）を入力してください", s_mm);
			return false;
		}
		if (fncTrim(s_dd.value) == "") {
			fncAlert("開始日付（日）を入力してください", s_dd);
			return false;
		}
		if (fncTrim(s_hh.value) == "") {
			fncAlert("開始日付（時）を入力してください", s_hh);
			return false;
		}
		if (fncTrim(s_mi.value) == "") {
			fncAlert("開始日付（分）を入力してください", s_mi);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(s_yy.value))) {
			fncAlert("開始日付（年）は半角数字で入力してください", s_yy);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(s_mm.value))) {
			fncAlert("開始日付（月）は半角数字で入力してください", s_mm);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(s_dd.value))) {
			fncAlert("開始日付（日）は半角数字で入力してください", s_dd);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(s_hh.value))) {
			fncAlert("開始日付（時）は半角数字で入力してください", s_hh);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(s_mi.value))) {
			fncAlert("開始日付（分）は半角数字で入力してください", s_mi);
			return false;
		}
		if (fncChkDate(start_yymmdd) == "") {
			fncAlert("開始日付を正しく入力してください", s_yy);
			return false;
		}
		if (fncChkTime(start_hhmi) == "") {
			fncAlert("開始日付を正しく入力してください", s_hh);
			return false;
		}

		// 表示終了日時
		var end_date = e_yy.value + ("00" + e_mm.value).slice(-2)
				+ ("00" + e_dd.value).slice(-2) + ("00" + e_hh.value).slice(-2)
				+ ("00" + e_mi.value).slice(-2);
		var end_yymmdd = e_yy.value + ("00" + e_mm.value).slice(-2)
				+ ("00" + e_dd.value).slice(-2);
		var end_hhmi = ("00" + e_hh.value).slice(-2)
				+ ("00" + e_mi.value).slice(-2);

		if (fncTrim(e_yy.value) == "") {
			fncAlert("終了日付（年）を入力してください", e_yy);
			return false;
		}
		if (fncTrim(e_mm.value) == "") {
			fncAlert("終了日付（月）を入力してください", e_mm);
			return false;
		}
		if (fncTrim(e_dd.value) == "") {
			fncAlert("終了日付（日）を入力してください", e_dd);
			return false;
		}
		if (fncTrim(e_hh.value) == "") {
			fncAlert("終了日付（時）を入力してください", e_hh);
			return false;
		}
		if (fncTrim(e_mi.value) == "") {
			fncAlert("終了日付（分）を入力してください", e_mi);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(e_yy.value))) {
			fncAlert("終了日付（年）は半角数字で入力してください", e_yy);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(e_mm.value))) {
			fncAlert("終了日付（月）は半角数字で入力してください", e_mm);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(e_dd.value))) {
			fncAlert("終了日付（日）は半角数字で入力してください", e_dd);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(e_hh.value))) {
			fncAlert("終了日付（時）は半角数字で入力してください", e_hh);
			return false;
		}
		if (!fncJudgeNumber(fncTrim(e_mi.value))) {
			fncAlert("終了日付（分）は半角数字で入力してください", e_mi);
			return false;
		}
		if (fncChkDate(end_yymmdd) == "") {
			fncAlert("終了日付を正しく入力してください", e_yy);
			return false;
		}
		if (fncChkTime(end_hhmi) == "") {
			fncAlert("終了日付を正しく入力してください", e_hh);
			return false;
		}
		if (fncTrim(start_date) > fncTrim(end_date)) {
			fncAlert("開始日付と終了日付を正しく入力してください", s_yy);
			return false;
		}

		// 表示フラグ
		if (fncTrim(valid_flg.value) == "") {
			fncAlert("表示フラグを選択してください", valid_flg);
			return false;
		}

		if (fncTrim(btn_val.value) == "新規登録") {
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
