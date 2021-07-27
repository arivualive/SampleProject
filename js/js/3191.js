// 入力チェック
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

// 登録
function InputChk(isconfirm){
	var errormsg = "";
	with (document.input){
		if (fncTrim(ChkString.value) == "") {
			errormsg += "・振分文字列を入力してください\n";
		}
	}
	if (errormsg == "") {
		return true;
	} else {
		alert(errormsg);
		return false;
	}
}

// キャンセル
function CancelChk() {
	document.input.mode_prm.value = "cancel";
	document.input.action = "input.php";
	document.input.submit();
	return true;
}

// 選択した受区により、選択できるコンタクト内容を制御
function makeContactKbn(contact_kbn){

	var contact_kbn_list = new Array();

	// 受区：PC
	contact_kbn_list[1] = new Array();
	contact_kbn_list[1][1]  = '喜びの声';
	contact_kbn_list[1][2]  = 'Net会員関連';
	contact_kbn_list[1][3]  = 'TELDM関連';
	contact_kbn_list[1][4]  = '注文関連';
	contact_kbn_list[1][5]  = 'クレーム・要望';
	contact_kbn_list[1][90] = 'その他問合せ';
	contact_kbn_list[1][20] = '教えてプリーザー';
	contact_kbn_list[1][30] = 'WEBカレ登録';
	contact_kbn_list[1][31] = 'WEBカレアンケート';
	contact_kbn_list[1][42] = 'パウチ・タオル活用';
	contact_kbn_list[1][43] = 'パウチ・タオル活用削除';
	contact_kbn_list[1][50] = 'クチコミ投稿';
	contact_kbn_list[1][60] = '紹介';
	contact_kbn_list[1][70] = '登録情報変更';
	contact_kbn_list[1][80] = '定期申込み';

	// 受区：MB
	contact_kbn_list[2] = new Array();
	contact_kbn_list[2][1]  = '喜びの声';
	contact_kbn_list[2][2]  = 'Net会員関連';
	contact_kbn_list[2][3]  = 'TELDM関連';
	contact_kbn_list[2][4]  = '注文関連';
	contact_kbn_list[2][5]  = 'クレーム・要望';
	contact_kbn_list[2][90] = 'その他問合せ';
	contact_kbn_list[2][20] = '教えてプリーザー';
	contact_kbn_list[2][30] = 'WEBカレ登録';
	contact_kbn_list[2][31] = 'WEBカレアンケート';
	contact_kbn_list[2][42] = 'パウチ・タオル活用';
	contact_kbn_list[2][43] = 'パウチ・タオル活用削除';
	contact_kbn_list[2][50] = 'クチコミ投稿';
	contact_kbn_list[2][60] = '紹介';
	contact_kbn_list[2][70] = '登録情報変更';
	contact_kbn_list[2][80] = '定期申込み';

	// 受区：メール受信
	contact_kbn_list[3] = new Array();
	contact_kbn_list[3][1]  = '喜びの声';
	contact_kbn_list[3][2]  = 'Net会員関連';
	contact_kbn_list[3][3]  = 'TELDM関連';
	contact_kbn_list[3][4]  = '注文関連';
	contact_kbn_list[3][5]  = 'クレーム・要望';
	contact_kbn_list[3][90] = 'その他問合せ';

	// 受区：その他メール
	contact_kbn_list[4] = new Array();
	contact_kbn_list[4][91] = '注文エラー';
	contact_kbn_list[4][92] = 'サンプルエラー';
	contact_kbn_list[4][93] = '迷惑メール';
	contact_kbn_list[4][94] = '会社問合せ';
	contact_kbn_list[4][99] = 'その他';

	var uke_kbn = document.getElementsByName("RuteKbn")[0].value;
	var select  = document.getElementById("ContactKbn");

	// option要素を削除（方法はいろいろありますが）
	while (0 < select.childNodes.length) {
		select.removeChild(select.childNodes[0]);
	}

	var itemLen = contact_kbn_list[uke_kbn].length;
	for(j=1; j<itemLen; j++){
		if (contact_kbn_list[uke_kbn][j] != undefined) {
			// option要素を生成
			var option = document.createElement('option');
			var text = document.createTextNode(contact_kbn_list[uke_kbn][j]);
			option.appendChild(text);
			option.setAttribute('value', j);
			// 登録済みコンタクト区分と一致する場合は選択済みとする
			if (j == contact_kbn ) {
				option.selected = true;
			}
			// option要素を追加
			select.appendChild(option);
		}
	}
}