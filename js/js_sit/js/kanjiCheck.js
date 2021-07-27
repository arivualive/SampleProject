
	document.write('<script type="text/javascript" src="/js/notInputCharacter.js"></script>');

		function SJisKanjiRegCheck(inDat){
				var CharacterKanji = notInputCharacter();
				if(CharacterKanji.indexOf(inDat)>=0){
					return true;
				}else{
					return false;
				}
		}

		function SJisKanjiCheck(chkStr){
				var i = 0;
				var x = 0;
				var flg = 0;
				var errMsg = "[ お名前 ]\n登録できない文字が含まれています。\n大変申し訳ございませんが、別の文字でご入力ください。\n[";
				for (i = 0; i < chkStr.length; i ++) {
						var c = chkStr.charAt(i);
						if(SJisKanjiRegCheck(c) == true){
								flg = 1;
								errMsg += " " + c;
						}
						var gaijiTei = chkStr.charCodeAt(i)
						if(gaijiTei == 39606 ){
								flg = 1;
								errMsg += " " + c;
						}
				}
				if(flg==1){
						window.alert(errMsg + " ]");
						return false;
				}
				return true;
		}

	function SJisKanjiCheckAll(chkStr, flgNo){

		var i = 0;
		var x = 0;
		var flg = 0;


        var wkErrMsg = "\n\n登録できない文字が含まれています。\n大変申し訳ございませんが、別の文字でご入力ください。\n\n[";

		switch(flgNo){
			case '1':
				errMsg = "[市区町村以降のご住所]" + wkErrMsg;
				break;

			case '2':
				errMsg = "[今のお手入れ方法を教えてください]" + wkErrMsg;
				break;

			case '3':
				errMsg = "[お肌は敏感なほうですか]" + wkErrMsg;
				break;

			case '4':
				errMsg = "[その他ご不明な点]" + wkErrMsg;
				break;


			case '5':
				errMsg = "[その他の理由について]" + wkErrMsg;
				break;
			case '6':
				errMsg = "[お肌の状態について]" + wkErrMsg;
				break;



			case '12':
				errMsg = "現在の「痛みについて」" + wkErrMsg;
				break;

			case '11':
				errMsg = "現在の痛みの「薬の名称・記号」" + wkErrMsg;
				break;

			case '10':
				errMsg = "痛み以外の「薬の名称・記号」" + wkErrMsg;
				break;


			case '13':
				errMsg = "痛み以外の「診断名・症状」" + wkErrMsg;
				break;

			case '14':
				errMsg = "アレルギーのある「薬の名称・記号」" + wkErrMsg;
				break;


			case '20':
				errMsg = "[お支払いや配送についてのご要望]" + wkErrMsg;
				break;

			// メッセージカード（宛名）
			case '30':
				errMsg = item_name['msg_address_name'] + wkErrMsg;
				break;

			// メッセージカード（本文）
			case '31':
				errMsg = item_name['msg_text'] + wkErrMsg;
				break;

			// メッセージカード（差出人）
			case '32':
				errMsg = item_name['msg_sender_name'] + wkErrMsg;
				break;

			// お受取人姓
			case '33':
				errMsg = item_name['namekanji_sei'] + wkErrMsg;
				break;

			// お受取人名
			case '34':
				errMsg = item_name['namekanji_mei'] + wkErrMsg;
				break;

			// お受取人姓（フリガナ）
			case '35':
				errMsg = item_name['namekana_sei'] + wkErrMsg;
				break;

			// お受取人名（フリガナ）
			case '36':
				errMsg = item_name['namekana_mei'] + wkErrMsg;
				break;

			// 贈り主名の姓
			case '37':
				errMsg = item_name['gift_sender_name_sei'] + wkErrMsg;
				break;

			// 贈り主名の名
			case '38':
				errMsg = item_name['gift_sender_name_mei'] + wkErrMsg;
				break;

			// 贈り物についてのご要望
			case '39':
				errMsg = item_name['regist_agreement'] + wkErrMsg;
				break;

			// 上記以降の住所
			case '40':
				errMsg = item_name['adrs_2'] + wkErrMsg;
				break;

			// 上記以降の住所（ふりがな）
			case '41':
				errMsg = item_name['adrs_2_kana'] + wkErrMsg;
				break;

			//育成コメント
			case '42':
				errMsg = "[お声欄]" + wkErrMsg;
				break;


			default:
				break;
		}

		for (i = 0; i < chkStr.length; i ++) {

			var c = chkStr.charAt(i);
			if(SJisKanjiRegCheck(c) == true){
				flg = 1;
				errMsg += " " + c;

			}
			var gaijiTei = chkStr.charCodeAt(i)
			if(gaijiTei == 39606 ){
				flg = 1;
				errMsg += " " + c;
			}


		}

		if(flg==1){
			window.alert(errMsg + " ]");
			return false;
		}
		return true;
	}

	function spSjisKanjiCheckAll(chkStr, flgNo){

		var i = 0;
		var x = 0;
		var flg = 0;


		var wkErrMsg = "登録できない文字が含まれています。<br />大変申し訳ございませんが、別の文字でご入力ください。<br />[";

		switch(flgNo){
			case '1':
				errMsg = "[市区町村以降のご住所]" + wkErrMsg;
				break;

			case '2':
				errMsg = "[今のお手入れ方法を教えてください]" + wkErrMsg;
				break;

			case '3':
				errMsg = "[お肌は敏感なほうですか]" + wkErrMsg;
				break;

			case '4':
				errMsg = "[その他ご不明な点]" + wkErrMsg;
				break;


			case '5':
				errMsg = "[その他の理由について]" + wkErrMsg;
				break;
			case '6':
				errMsg = "[お肌の状態について]" + wkErrMsg;
				break;



			case '12':
				errMsg = "現在の「痛みについて」" + wkErrMsg;
				break;

			case '11':
				errMsg = "現在の痛みの「薬の名称・記号」" + wkErrMsg;
				break;

			case '10':
				errMsg = "痛み以外の「薬の名称・記号」" + wkErrMsg;
				break;


			case '13':
				errMsg = "痛み以外の「診断名・症状」" + wkErrMsg;
				break;

			case '14':
				errMsg = "アレルギーのある「薬の名称・記号」" + wkErrMsg;
				break;


			case '20':
				errMsg = "[お支払いや配送についてのご要望]" + wkErrMsg;
				break;

			// メッセージカード（宛名）
			case '30':
				errMsg = item_name['msg_address_name'] + wkErrMsg;
				break;

			// メッセージカード（本文）
			case '31':
				errMsg = item_name['msg_text'] + wkErrMsg;
				break;

			// メッセージカード（差出人）
			case '32':
				errMsg = item_name['msg_sender_name'] + wkErrMsg;
				break;

			// お受取人姓
			case '33':
				errMsg = item_name['namekanji_sei'] + wkErrMsg;
				break;

			// お受取人名
			case '34':
				errMsg = item_name['namekanji_mei'] + wkErrMsg;
				break;

			// お受取人姓（フリガナ）
			case '35':
				errMsg = item_name['namekana_sei'] + wkErrMsg;
				break;

			// お受取人名（フリガナ）
			case '36':
				errMsg = item_name['namekana_mei'] + wkErrMsg;
				break;

			// 贈り主名の姓
			case '37':
				errMsg = item_name['gift_sender_name_sei'] + wkErrMsg;
				break;

			// 贈り主名の名
			case '38':
				errMsg = item_name['gift_sender_name_mei'] + wkErrMsg;
				break;

			// 贈り物についてのご要望
			case '39':
				errMsg = item_name['regist_agreement'] + wkErrMsg;
				break;

			// 上記以降の住所
			case '40':
				errMsg = item_name['adrs_2'] + wkErrMsg;
				break;

			// 上記以降の住所（ふりがな）
			case '41':
				errMsg = item_name['adrs_2_kana'] + wkErrMsg;
				break;

			//育成コメント
			case '42':
				errMsg = "[お声欄]" + wkErrMsg;
				break;


			default:
				break;
		}

		for (i = 0; i < chkStr.length; i ++) {

			var c = chkStr.charAt(i);
			if(SJisKanjiRegCheck(c) == true){
				flg = 1;
				errMsg += " " + c;

			}
			var gaijiTei = chkStr.charCodeAt(i)
			if(gaijiTei == 39606 ){
				flg = 1;
				errMsg += " " + c;
			}


		}

		if(flg==1){
			e = errMsg + " ]";
			$("#err"+a.attr("name")).html(e).show();
			return false;
		}
		return true;
	}

