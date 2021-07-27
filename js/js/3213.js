///////////////////////////////////////////////
// 入力チェック
///////////////////////////////////////////////
function InputChk(mode,allAttentionCd,attentionValue,explanationValue,disp_idxValue,start_dtValue,end_dtValue,disp_flgValue){
 	var errorMsg = ""; // エラーメッセージ格納用
	var confMsg = "";  // 確認メッセージ格納用

	switch(mode){
		case "add":
			// 新規追加画面時
			
			// 同封物CDチェック
			if (fncTrim(document.form_inp.attention_cd.value) == '') {
				// 同封物CDが空白の場合
				errorMsg += "・同封物CDを入力してください。\n";
			} else if (document.form_inp.attention_cd.value.match(/[\D]/)) {
				// 同封物CDに半角数字以外が含まれている場合
				errorMsg += "・同封物CDは半角数字(1～999999)で入力してください。\n";
			} else {
				var attentionCd = allAttentionCd.split(",");
				for(var i=0; i < attentionCd.length ; i++) {
					if (fncTrim(document.form_inp.attention_cd.value) == attentionCd[i]) {
						// 同封物CDがすでに登録されていた場合
						errorMsg += "・この同封物CDはすでに登録されています。\n";
					}
				}
			}
			
			// 同封物名チェック
			if (fncTrim(document.form_inp.attention.value) == '') {
				// 同封物名が空白の場合
				errorMsg += "・同封物名を入力してください。\n";
			} else if (document.form_inp.attention.value.match(/\n/)) {
				// 同封物名に改行が含まれている場合
				errorMsg += "・同封物名に改行は入力しないでください。\n";
			}
			
			// 同封物説明文チェック
			if (document.form_inp.explanation.value.match(/\n/)) {
				// 同封物説明文に改行が含まれている場合
				errorMsg += "・同封物説明文に改行は入力しないでください。\n";
			}
			
			// 表示順位チェック
			if (fncTrim(document.form_inp.disp_idx.value) == '') {
				// 表示順位が空白の場合
				errorMsg += "・表示順位を入力してください。\n";
			} else if (document.form_inp.disp_idx.value.match(/[\D]/)) {
				// 表示順位に半角数字以外が含まれている場合
				errorMsg += "・表示順位は半角数字(1～99)で入力してください。\n";
			}
			
			// 表示開始日時チェック
			var DateChkFlg = true;
			var startDate = document.form_inp.start_dt_Y.value + document.form_inp.start_dt_M.value + document.form_inp.start_dt_D.value;
			if (fncChkDate(startDate) == '' || document.form_inp.start_dt_H.value == '' || document.form_inp.start_dt_I.value == '' || document.form_inp.start_dt_S.value == '') {
				// 表示開始日時が存在しない日付の場合
				errorMsg += "・表示開始日時を正しく入力してください。\n";
				DateChkFlg = false;
			}
			
			// 表示終了日時チェック
			var endDate = document.form_inp.end_dt_Y.value + document.form_inp.end_dt_M.value + document.form_inp.end_dt_D.value;
			if (fncChkDate(endDate) == '' || document.form_inp.end_dt_H.value == '' || document.form_inp.end_dt_I.value == '' || document.form_inp.end_dt_S.value == '') {
				// 表示終了日時が存在しない日付の場合
				errorMsg += "・表示終了日時を正しく入力してください。\n";
				DateChkFlg = false;
			}
            
			
			// 日時相関チェック
			if (DateChkFlg) {
				// 表示開始日時と表示終了日時のどちらも正しい場合
				startDate = document.form_inp.start_dt_Y.value + '/' + document.form_inp.start_dt_M.value + '/' + document.form_inp.start_dt_D.value + ' ' + document.form_inp.start_dt_H.value + ':' + document.form_inp.start_dt_I.value + ':' + document.form_inp.start_dt_S.value;
				endDate = document.form_inp.end_dt_Y.value + '/' + document.form_inp.end_dt_M.value + '/' + document.form_inp.end_dt_D.value + ' ' + document.form_inp.end_dt_H.value + ':' + document.form_inp.end_dt_I.value + ':' + document.form_inp.end_dt_S.value;
				if (new Date(startDate).getTime() > new Date(endDate).getTime()) {
					// 表示開始日時 > 表示終了日時の場合
					errorMsg += "・表示開始日時（ＦＲＯＭ）≦表示終了日時（ＴＯ）で入力してください。\n";
				}	
			}
			
			// エラー有無チェック
			if (errorMsg == "") {
				// エラーがない場合
				confMsg = "同封物を追加しますか？\n";
			}
			break;
			
		case "edit":
			// 更新画面時
			
			// 同封物名チェック
			if (fncTrim(document.form_inp.attention.value) == '') {
				// 同封物名が空白の場合
				errorMsg += "・同封物名を入力してください。\n";
			} else if (document.form_inp.attention.value.match(/\n/)) {
				// 同封物名に改行が含まれている場合
				errorMsg += "・同封物名に改行は入力しないでください。\n";
			}
			
			// 同封物説明文チェック
			if (document.form_inp.explanation.value.match(/\n/)) {
				// 同封物説明文に改行が含まれている場合
				errorMsg += "・同封物説明文に改行は入力しないでください。\n";
			}
			
			// 表示順位チェック
			if (fncTrim(document.form_inp.disp_idx.value) == '') {
				// 表示順位が空白の場合
				errorMsg += "・表示順位を入力してください。\n";
			} else if (document.form_inp.disp_idx.value.match(/[\D]/)) {// /^[0-9]+$/ ← これじゃダメ？
				// 表示順位に半角数字以外が含まれている場合
				errorMsg += "・表示順位は半角数字(1～99)で入力してください。\n";
			}
			
			// 表示開始日時チェック
			var DateChkFlg = true;
			var startDate = document.form_inp.start_dt_Y.value + document.form_inp.start_dt_M.value + document.form_inp.start_dt_D.value;
			if (fncChkDate(startDate) == '') {
				// 表示開始日時が存在しない日付の場合
				errorMsg += "・表示開始日時を正しく入力してください。\n";
				DateChkFlg = false;
			}
			
			// 表示終了日時チェック
			var endDate = document.form_inp.end_dt_Y.value + document.form_inp.end_dt_M.value + document.form_inp.end_dt_D.value;
			if (fncChkDate(endDate) == '') {
				// 表示終了日時が存在しない日付の場合
				errorMsg += "・表示終了日時を正しく入力してください。\n";
				DateChkFlg = false;
			}
			
			// 日時相関チェック
			startDate = document.form_inp.start_dt_Y.value + '/' + document.form_inp.start_dt_M.value + '/' + document.form_inp.start_dt_D.value + ' ' + document.form_inp.start_dt_H.value + ':' + document.form_inp.start_dt_I.value + ':' + document.form_inp.start_dt_S.value;
			endDate = document.form_inp.end_dt_Y.value + '/' + document.form_inp.end_dt_M.value + '/' + document.form_inp.end_dt_D.value + ' ' + document.form_inp.end_dt_H.value + ':' + document.form_inp.end_dt_I.value + ':' + document.form_inp.end_dt_S.value;
			if (DateChkFlg) {
				// 表示開始日時と表示終了日時のどちらも正しい場合
				if (new Date(startDate).getTime() > new Date(endDate).getTime()) {
					// 表示開始日時 > 表示終了日時の場合
					errorMsg += "・表示開始日時（ＦＲＯＭ）≦表示終了日時（ＴＯ）で入力してください。\n";
				}	
			}
			
			// データ変更有無チェック
			var isChangeFlg = false
			if (document.form_inp.attention.value == attentionValue                && // 同封物名
				document.form_inp.explanation.value == explanationValue            && // 同封物説明文
				document.form_inp.disp_idx.value == disp_idxValue                  && // 表示順
				new Date(startDate).getTime() == new Date(start_dtValue).getTime() && // 表示開始日時
				new Date(endDate).getTime() == new Date(end_dtValue).getTime()     && // 表示終了日時
				document.form_inp.disp_flg.value == disp_flgValue) {                  // 表示フラグ
				// 変更がない場合
				errorMsg += "・更新を行わない場合は、キャンセルボタンを押下してください。\n";
			}
			
			// エラー有無チェック
			if (errorMsg == "") {
				// エラーがない場合
				confMsg = "同封物を更新しますか？\n";
			}
			break;
			
		default:
			// 上記以外の場合
			return false;
	}
	
    if (errorMsg == "") {
		// エラーがない場合
		if (confirm(confMsg)) {
			// 確認メッセージを表示し、OKが押下された場合
			return true;
		} else {
			// 確認メッセージを表示し、キャンセルが押下された場合
			return false;
		}
    } else {
		// エラーがある場合
	    alert(errorMsg);
		return false;
    } 
}


///////////////////////////////////////////////
// キャンセルチェック
///////////////////////////////////////////////
function IsCancel() {
	if (confirm("入力内容を破棄しますか？")) {
		// 確認メッセージを表示し、OKが押下された場合
		location.href = "list.php";
	} else {
		// 確認メッセージを表示し、キャンセルが押下された場合
		return false;
	}
}