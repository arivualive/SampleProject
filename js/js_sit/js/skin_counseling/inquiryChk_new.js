//***************************************************
//概要：お問い合わせの入力チェックを行う
//2007/11/1 ver2.00 
//全お問合せフォーム共通化
//2009/7/30 kdl-uchida #883 お肌カウンセリング用にメッセージを修正
//*************************************************

//==================================================
//目的	：入力項目チェック
//引数	：ObjFrm		:お問合せ入力フォームオブジェクト
//引数	：checkArray	:各項目チェック条件の連想配列
//                       1->チェック不要
//                       2->必須チェックあり
//                       3->必須チェックなし
//戻値	：errMsg		:エラーメッセージ
//==================================================
function fieldCheck(ObjFrm, checkArray, str) {
	// チェックが必要かどうかの項目別フラグ
	var checkFlg = checkArray ;
	// エラーフラグ
	var isErr    = false;
	// 表示するエラーメッセージ
	var errMsg   = '';

	var tmp = '';
	
	//会社名チェック
	if( checkFlg['company_nm'] == "2" ){
		if (ObjFrm.company_nm.value == ""){
			errMsg += "・会社名を入力してください。\n";
			isErr = true;			
		}else{
			if (bLength(ObjFrm.company_nm.value) > 100){
				errMsg += "・恐れ入りますが、会社名は全角５０文字以内で入力してください。\n";
				isErr = true;			
			}
		}
	}

	//会社名チェック
	if( checkFlg['company_nm'] == "3" ){
		if (bLength(ObjFrm.company_nm.value) > 100){
			errMsg += "・恐れ入りますが、会社名は全角５０文字以内で入力してください。\n";
			isErr = true;			
		}
	}

	//役職チェック
	if( checkFlg['post'] == "2" ){
		if (ObjFrm.post.value <= "0"){
			errMsg += "・役職を入力してください。\n";
			isErr = true;			
		}else{
			if (bLength(ObjFrm.name_kanji.value) > 100){
				errMsg += "・恐れ入りますが、役職は全角５０文字以内で入力してください。\n";
				isErr = true;			
			}
		}
	}

	//役職チェック
	if( checkFlg['post'] == "3" ){
		if (bLength(ObjFrm.name_kanji.value) > 100){
			errMsg += "・恐れ入りますが、役職は全角５０文字以内で入力してください。\n";
			isErr = true;			
		}
	}

	//名前チェック
	if( checkFlg['name_kanji'] == "2" ){
		if (ObjFrm.name_kanji.value.replace('　', '').length == 0 || ObjFrm.name_kanji.value.replace(' ', '').length == 0) {
			errMsg += "・お名前を入力してください。\n";
			isErr = true;			
		}else if( zenhanCount(ObjFrm.name_kanji.value.replace(/^\s+|\s+$/g, "")) != 1 ){
			errMsg += "・お名前を全角の文字で入力してください。\n";
			isErr = true;
		}else{
			if (bLength(ObjFrm.name_kanji.value) > 30){
				errMsg += "・恐れ入りますが、お名前は全角１５文字以内で入力してください。\n";
				isErr = true;			
			}
		}
	}

	//名前チェック
	if( checkFlg['name_kanji'] == "3" ){
		if (bLength(ObjFrm.name_kanji.value) > 30){
			errMsg += "・恐れ入りますが、お名前は全角１５文字以内で入力してください。\n";
			isErr = true;
		}else if( zenhanCount(ObjFrm.name_kanji.value.replace(/^\s+|\s+$/g, "")) != 1 ){
			errMsg += "・お名前を全角の文字で入力してください。\n";
			isErr = true;
		}
	}


	//フリガナチェック
	if( checkFlg['name_kana'] == "2" ){
		if (ObjFrm.name_kana.value.replace('　', '').length == 0 || ObjFrm.name_kana.value.replace(' ', '').length == 0) {
			errMsg += "・フリガナを入力してください。\n";
			isErr = true;
		}else if(bLength(ObjFrm.name_kana.value) > 60){
				errMsg += "・恐れ入りますが、フリガナは全角３０文字以内で入力してください。\n";
				isErr = true;
		}else{
			if( ObjFrm.name_kana.value.match( /[^ァ-ンー　]+/ ) ) {
				errMsg += "・フリガナは全角カナで入力してください\n";
				isErr = true;
			}
		}
	}

	//フリガナチェック
	if( checkFlg['name_kana'] == "3" ){
		if (bLength(ObjFrm.name_kana.value) > 60){
			errMsg += "・恐れ入りますが、フリガナは全角３０文字以内で入力してください。\n";
			isErr = true;			
		}else{
			if( ObjFrm.name_kana.value.match( /[^ァ-ンー　]+/ ) ) {
				errMsg += "・フリガナは全角カナで入力してください\n";
				isErr = true;
			}
		}
	}

	//電話番号チェック
	if( checkFlg['tel_no'] == "2" ){
		if( typeof(ObjFrm.tel_no) == 'undefined' ){
			var TLPNNO_1 = ObjFrm.tel_no1.value.replace(/^\s+|\s+$/g, "");
			var TLPNNO_2 = ObjFrm.tel_no2.value.replace(/^\s+|\s+$/g, "");
			var TLPNNO_3 = ObjFrm.tel_no3.value.replace(/^\s+|\s+$/g, "");
			TellNumber = (TLPNNO_1 + TLPNNO_2 + TLPNNO_3);
		
			if(TLPNNO_1 =="" || zenhanCount(TLPNNO_1) != 5){
				errMsg += '・市外局番を正しく数字で入力してください。\n';
				isErr = true;
			}
			else if(TLPNNO_1.length<2){
				errMsg += '・市外局番を正しく数字で入力してください。\n';
				isErr = true;
			}
			else if(TLPNNO_1.substring(0,1)!="0"){
				errMsg += "・市外局番を正しく数字で入力してください。\n";
				isErr = true;
			}
			else if(TLPNNO_1.substring(1,2)=="0"){
				errMsg += "・市外局番を正しく数字で入力してください。\n";
				isErr = true;
			}
			else if(TLPNNO_1=="0120" || TLPNNO_1=="0800" || TLPNNO_1=="0990" || TLPNNO_1=="0180" || TLPNNO_1=="0570" || TLPNNO_1=="0170"){
				errMsg += "・市外局番を正しく数字で入力してください。\n";
				isErr = true;
			}
			if(TLPNNO_2=="" || zenhanCount(TLPNNO_2) != 5){
				errMsg += "・市内局番を正しく数字で入力してください。\n";
				isErr = true;
			}
			if(TLPNNO_3=="" || zenhanCount(TLPNNO_3) != 5){
				errMsg += "・電話番号を正しく数字で入力してください。\n";
				isErr = true;
			}
			else if(TLPNNO_3.length!=4){
				errMsg += "・電話番号を正しく数字で入力してください。\n";
				isErr = true;
			}
			if(TLPNNO_1.length==2 && TLPNNO_2.length!=4){
				errMsg += "・市外局番、市内局番を正しく入力してください。\n";
				isErr = true;
			}
			if(TLPNNO_1.length==3){
				if(TLPNNO_1=="010" || TLPNNO_1=="020" || TLPNNO_1=="030" || TLPNNO_1=="040"){
					errMsg += "・市外局番を正しく数字で入力してください。\n";
					isErr = true;
				}
				else if(TLPNNO_1=="050" || TLPNNO_1=="060" || TLPNNO_1=="070" || TLPNNO_1=="080" || TLPNNO_1=="090"){
					if(TLPNNO_2.length!=4){
						errMsg += "・市外局番、市内局番を正しく入力してください。\n";
						isErr = true;
					}
				else if(TLPNNO_3.length!=4){
						errMsg += "・電話番号を正しく入力してください。\n";
						isErr = true;
					}
				}
				else if(TLPNNO_2.length!=3){
					errMsg += "・市外局番、市内局番を正しく入力してください。\n";
					isErr = true;
				}
			}
			else if(TLPNNO_1.length==4){
				if(TLPNNO_1=="0460" || TLPNNO_1=="0578"){
					if(TLPNNO_2.length!=1){
						errMsg += "・市外局番、市内局番を正しく入力してください。\n";
						isErr = true;
					}
				}
				else if(TLPNNO_2.length!=2){
					errMsg += "・市外局番、市内局番を正しく入力してください。\n";
					isErr = true;
				}
			}
			else if(TLPNNO_1.length==5 && TLPNNO_2.length!=1){
				errMsg += "・市外局番、市内局番を正しく入力してください。\n";
				isErr = true;
			}
			else if(TLPNNO_2.length==0){
				errMsg += "・市外局番、市内局番を正しく入力してください。\n";
				isErr = true;
			}
			else if(TLPNNO_1.length==6 && TLPNNO_2.length!=0){
				errMsg += "・市外局番、市内局番を正しく入力してください。\n";
				isErr = true;
			}
			else if(TellNumber.length>11){
				errMsg += "・市外局番-市内局番-電話番号が長すぎます。正しく入力してください。\n";
				isErr = true;
			}
		}else{
			if(TellNumber=="" || zenhanCount(TellNumber) !=5 ){
				errMsg += '・電話番号を正しく数字で入力してください。\n';
				isErr = true;
			}
			else if(TellNumber.length>11){
				errMsg += "・市外局番-市内局番-電話番号が長すぎます。正しく入力してください。\n";
				isErr = true;
			}
		}
	}

	//電話番号チェック
	if( checkFlg['tel_no'] == "3" ){
		if( typeof(ObjFrm.tel_no) == 'undefined' ){
			var TLPNNO_1 = ObjFrm.tel_no1.value.replace(/^\s+|\s+$/g, "");
			var TLPNNO_2 = ObjFrm.tel_no2.value.replace(/^\s+|\s+$/g, "");
			var TLPNNO_3 = ObjFrm.tel_no3.value.replace(/^\s+|\s+$/g, "");
			TellNumber = (TLPNNO_1 + TLPNNO_2 + TLPNNO_3);
		
			if(zenhanCount(TLPNNO_1) != 5){
				errMsg += '・市外局番を正しく数字で入力してください。\n';
				isErr = true;
			}
			else if(TLPNNO_1.length<2){
				errMsg += '・市外局番を正しく数字で入力してください。\n';
				isErr = true;
			}
			else if(TLPNNO_1.substring(0,1)!="0"){
				errMsg += "・市外局番を正しく数字で入力してください。\n";
				isErr = true;
			}
			else if(TLPNNO_1.substring(1,2)=="0"){
				errMsg += "・市外局番を正しく数字で入力してください。\n";
				isErr = true;
			}
			else if(TLPNNO_1=="0120" || TLPNNO_1=="0800" || TLPNNO_1=="0990" || TLPNNO_1=="0180" || TLPNNO_1=="0570" || TLPNNO_1=="0170"){
				errMsg += "・市外局番を正しく数字で入力してください。\n";
				isErr = true;
			}
			if(zenhanCount(TLPNNO_2) != 5){
				errMsg += "・市内局番を正しく数字で入力してください。\n";
				isErr = true;
			}
			if(zenhanCount(TLPNNO_3) != 5){
				errMsg += "・電話番号を正しく数字で入力してください。\n";
				isErr = true;
			}
			else if(TLPNNO_3.length!=4){
				errMsg += "・電話番号を正しく数字で入力してください。\n";
				isErr = true;
			}
			if(TLPNNO_1.length==2 && TLPNNO_2.length!=4){
				errMsg += "・市外局番、市内局番を正しく入力してください。\n";
				isErr = true;
			}
			if(TLPNNO_1.length==3){
				if(TLPNNO_1=="010" || TLPNNO_1=="020" || TLPNNO_1=="030" || TLPNNO_1=="040"){
					errMsg += "・市外局番を正しく数字で入力してください。\n";
					isErr = true;
				}
				else if(TLPNNO_1=="050" || TLPNNO_1=="060" || TLPNNO_1=="070" || TLPNNO_1=="080" || TLPNNO_1=="090"){
					if(TLPNNO_2.length!=4){
						errMsg += "・市外局番、市内局番を正しく入力してください。\n";
						isErr = true;
					}
				else if(TLPNNO_3.length!=4){
						errMsg += "・電話番号を正しく入力してください。\n";
						isErr = true;
					}
				}
				else if(TLPNNO_2.length!=3){
					errMsg += "・市外局番、市内局番を正しく入力してください。\n";
					isErr = true;
				}
			}
			else if(TLPNNO_1.length==4){
				if(TLPNNO_1=="0460" || TLPNNO_1=="0578"){
					if(TLPNNO_2.length!=1){
						errMsg += "・市外局番、市内局番を正しく入力してください。\n";
						isErr = true;
					}
				}
				else if(TLPNNO_2.length!=2){
					errMsg += "・市外局番、市内局番を正しく入力してください。\n";
					isErr = true;
				}
			}
			else if(TLPNNO_1.length==5 && TLPNNO_2.length!=1){
				errMsg += "・市外局番、市内局番を正しく入力してください。\n";
				isErr = true;
			}
			else if(TLPNNO_2.length==0){
				errMsg += "・市外局番、市内局番を正しく入力してください。\n";
				isErr = true;
			}
			else if(TLPNNO_1.length==6 && TLPNNO_2.length!=0){
				errMsg += "・市外局番、市内局番を正しく入力してください。\n";
				isErr = true;
			}
			else if(TellNumber.length>11){
				errMsg += "・市外局番-市内局番-電話番号が長すぎます。正しく入力してください。\n";
				isErr = true;
			}
		}else{
			if(zenhanCount(TellNumber) !=5 ){
				errMsg += '・電話番号を正しく数字で入力してください。\n';
				isErr = true;
			}
			else if(TellNumber.length>11){
				errMsg += "・市外局番-市内局番-電話番号が長すぎます。正しく入力してください。\n";
				isErr = true;
			}
		}
	}

	//メールアドレスチェック
	if( checkFlg['email'] == "2" ){
		if (ObjFrm.email.value == '') {
			errMsg += "・Ｅメールアドレスを入力してください。\n";
			isErr = true;
		}else{
			if (ObjFrm.email.value.length < 6 || ObjFrm.email.value.length > 100 || emailCheck(ObjFrm.email.value) == false) {
				errMsg += "・Ｅメールアドレスを正しく入力してください\n";
				isErr = true;
			}
		}
	}

	//メールアドレスチェック
	if( checkFlg['email'] == "3" ){
		if (ObjFrm.email.value.length < 6 || ObjFrm.email.value.length > 100 || emailCheck(ObjFrm.email.value) == false) {
			errMsg += "・Ｅメールアドレスを正しく入力してください\n";
			isErr = true;
		}
	}

	//メールアドレスチェック
	if( typeof(ObjFrm.email2) != 'undefined'){
		if(ObjFrm.email.value != ObjFrm.email2.value){
			errMsg += "・メールアドレスと確認用メールアドレスが異なります。\n";
			isErr = true;
		}
	}

	//住所チェック
	if( checkFlg['address'] == "2" ){
		if (bLength(ObjFrm.address.value)== 0){
			errMsg += "・住所を入力してください。\n";
			isErr = true;
		}else{
			if (bLength(ObjFrm.address.value) > 256){
				errMsg += "・恐れ入りますが、住所は全角１２８文字以内で入力してください。\n";
				isErr = true;
			}
		}
	}

	//住所チェック
	if( checkFlg['address'] == "3" ){
		if (bLength(ObjFrm.address.value) > 256){
			errMsg += "・恐れ入りますが、住所は全角１２８文字以内で入力してください。\n";
			isErr = true;
		}
	}

	//ご質問・ご意見チェック
	if( checkFlg['voice'] == "2" ){
		if (ObjFrm.voice.value.replace('　', '').length == 0 || ObjFrm.voice.value.replace(' ', '').length == 0) {
			errMsg += "・お声を入力してください。\n";
			isErr = true;
		}else{
			if (bLength(ObjFrm.voice.value) > 2000){
				errMsg += "・恐れ入りますが、お声は全角１０００文字以内で入力してください。\n";
				isErr = true;
			}
		}
	}

	//ご質問・ご意見チェック
	if( checkFlg['voice'] == "3" ){
		if (bLength(ObjFrm.voice.value) > 2000){
			errMsg += "・恐れ入りますが、お声は全角１０００文字以内で入力してください。\n";
			isErr = true;
		}
	}

	//返信希望チェック
	if (checkFlg['answer_flg'] == "2") {
		if ((ObjFrm.answer_flg[0].checked == false) && (ObjFrm.answer_flg[1].checked == false)) {
			errMsg += "・返信希望の有無をご選択ください。\n";
			isErr = true;
		}else{
			if ( (ObjFrm.answer_flg[0].value != "0") && (ObjFrm.answer_flg[0].value != "1") &&
				 (ObjFrm.answer_flg[1].value != "0") && (ObjFrm.answer_flg[1].value != "1") ) {
				errMsg += "・返信希望の有無を正しくご選択ください。\n";
				isErr = true;
			}
		}
	}

	// 返信希望チェック
	if (checkFlg['answer_flg'] == "3") {
		if ( (ObjFrm.answer_flg[0].value != "0") && (ObjFrm.answer_flg[0].value != "1") &&
			 (ObjFrm.answer_flg[1].value != "0") && (ObjFrm.answer_flg[1].value != "1") ) {
			errMsg += "・返信希望の有無を正しくご選択ください。\n";
			isErr = true;
		}
	}

	if(isErr){
		return errMsg;
	}else{
		return '';
	}
}


/**
* バイト数をチェックします。
* 
* @param チェックする値
* @return バイト数
*/
function bLength(str) { 
   var r = 0; 
   for (var i = 0; i < str.length; i++) { 
       var c = str.charCodeAt(i); 
       //Shift_JIS: 0x0 〜 0x80, 0xa0 , 0xa1 〜 0xdf , 0xfd 〜 0xff 
       //Unicode : 0x0 〜 0x80, 0xf8f0, 0xff61 〜 0xff9f, 0xf8f1 〜 0xf8f3 
       if ( (c >= 0x0 && c < 0x81) || (c == 0xf8f0) || (c >= 0xff61 && c < 0xffa0) || (c >= 0xf8f1 && c < 0xf8f4)) { 
           r += 1; 
       } else { 
           r += 2; 
       } 
   } 
   return r; 
} 

//==================================================
//目的	：全角/半角チェック
//引数	：chkStr	:チェックする文字列
//戻値	：0:半角のみ 1:全角のみ 3:全半混在 4:コントロールコード混在 5:数字のみ 6:アルファベットのみ 7:半角英数のみ 8:半角カナ混在
//==================================================
function zenhanCount(chkStr) {

	// 文字種カウンタ
	var numCnt;
	var alpCnt;
	var hanCnt;
	var kanaCnt;
	var zenCnt;
	var ctlCnt;
	var tmpStr;

	numCnt = 0;
	alpCnt = 0;
	hanCnt = 0;
	kanaCnt = 0;
	zenCnt = 0;
	ctlCnt = 0;
	tmpStr = '';

	if (escape('あ').charAt(1) == 'u') {
		for (i = 0; i < chkStr.length; i ++) {
			tmpStr = escape(chkStr.charAt(i))
			if (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'u') {
				if (chkStr.charAt(i) >= '｡' && chkStr.charAt(i) <= 'ﾟ') { kanaCnt ++ }
				else { zenCnt ++ }
				}
			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { hanCnt ++ }
			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { hanCnt ++ }
			else { ctlCnt ++ }
			}
		}
	else {
		for (i = 0; i < chkStr.length; i ++) {
			tmpStr = escape(chkStr.charAt(i))
			if ((tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == '8') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == '9') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'E') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'F')) {
				zenCnt ++
				}
			else if (chkStr.charAt(i) >= '｡' && chkStr.charAt(i) <= 'ﾟ') { kanaCnt ++ }
			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { hanCnt ++ }
			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { hanCnt ++ }
			else { ctlCnt ++ }
			}
		}

	// 0:半角のみ 1:全角のみ 3:全半混在 4:コントロールコード混在 5:数字のみ 6:アルファベットのみ 7:半角英数のみ 8:半角カナ混在
	hanCnt = hanCnt + numCnt + alpCnt;
	if (kanaCnt > 0) { return 8 }
	else if (ctlCnt > 0) { return 4 }
	else if (hanCnt == 0 && zenCnt > 0) { return 1 }
	else if (hanCnt > 0 && zenCnt > 0) { return 3 }
	else if (numCnt > 0 && hanCnt == numCnt) { return 5 }
	else if (alpCnt > 0 && hanCnt == alpCnt) { return 6 }
	else if ((alpCnt > 0 && numCnt >0) && alpCnt + numCnt == hanCnt) { return 7 }
	else if (hanCnt > 0) { return 0 }
}

//function zenhanCount(chkStr) {
//	// 文字種カウンタ
//	numCnt  = 0;
//	alpCnt  = 0;
//	hanCnt  = 0;
//	kanaCnt = 0;
//	zenCnt  = 0;
//	ctlCnt  = 0;
//	tmpStr  = '';
//
//	if (escape('あ').charAt(1) == 'u') {
//		for (i = 0; i < chkStr.length; i ++) {
//			tmpStr = escape(chkStr.charAt(i))
//			if (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'u') {
//				if (chkStr.charAt(i) >= '｡' && chkStr.charAt(i) <= 'ﾟ') { kanaCnt ++ }
//				else { zenCnt ++ }
//			}
//			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
//			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
//			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
//			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { hanCnt ++ }
//			else { ctlCnt ++ }
//		}
//	else {
//		for (i = 0; i < chkStr.length; i ++) {
//			tmpStr = escape(chkStr.charAt(i))
//			if ((tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == '8') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == '9') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'E') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'F')) {
//				zenCnt ++
//				}
//			else if (chkStr.charAt(i) >= '｡' && chkStr.charAt(i) <= 'ﾟ') { kanaCnt ++ }
//			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
//			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
//			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
//			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { hanCnt ++ }
//			else { ctlCnt ++ }
//			}
//		}
//	}
//	// 0:半角のみ 1:全角のみ 3:全半混在 4:コントロールコード混在 5:数字のみ 6:アルファベットのみ 7:半角英数のみ 8:半角カナ混在
//	hanCnt = hanCnt + numCnt + alpCnt;
//	if (kanaCnt > 0) { return 8 }
//	else if (ctlCnt > 0) { return 4 }
//	else if (hanCnt == 0 && zenCnt > 0) { return 1 }
//	else if (hanCnt > 0 && zenCnt > 0) { return 3 }
//	else if (numCnt > 0 && hanCnt == numCnt) { return 5 }
//	else if (alpCnt > 0 && hanCnt == alpCnt) { return 6 }
//	else if ((alpCnt > 0 && numCnt >0) && alpCnt + numCnt == hanCnt) { return 7 }
//	else if (hanCnt > 0) { return 0 }
//	}
//}
//==================================================
//目的	：メールアドレスチェック
//引数	：chkStr	:チェックする文字列
//戻値	：emailCheck True=OK	False=NG
//==================================================
function emailCheck(chkStr) {

	if(!chkStr.match(/.*@.*\..*/i)){return false;}

	// mail address のチェック
	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,3}|\d+)$/i

	var returnval=emailfilter.test(chkStr);

	if(returnval==false){

		if(chkStr.length>1){
			if(chkStr.charAt(chkStr.length-1)=="."){
				var returnval=emailfilter.test(chkStr.substring(0,chkStr.length-1));
			}
		}
	}
	return returnval;
}
//function CountLength(str) { 
//    var ByteLingth = 0; 
//
//    for (var i = 0; i < str.length; i++) { 
//        var c = str.charCodeAt(i); 
//        if ( (c >= 0x0 && c < 0x81) || (c == 0xf8f0) || (c >= 0xff61 && c < 0xffa0) || (c >= 0xf8f1 && c < 0xf8f4)) { 
//            ByteLingth += 1; 
//        } else { 
//            ByteLingth += 2; 
//        } 
//    } 
//    
//    return ByteLingth; 
//}
//
//function fieldCheckTextLen(objText, textLen) {
//	if (chkTextZenLen(objText, textLen) == false){
//		return false;
//	}
//
//	return true;
//}
//
//function chkTextLen(text, textLen)
//{
//	var count;
//	var InputStrCount;
//
//	count = 0;
//	InputStrCount = 0;
//
//	for (i=0; i<text.length; i++)
//	{
//		n = escape(text.charAt(i));
//		if (n.length < 4) {
//			count++; 
//
//		}else{
//			count+=2;
//		}
//
//		if (count > textLen) {
//			return false;
//		}
//	}
//
//	return true;
//}
//
//
//function chkTextZenLen(text, textLen)
//{
//
//	var count;
//	var InputStrCount;
//
//	count = 0;
//	InputStrCount = 0;
//
//	for (i=0; i<text.length; i++)
//	{
//		n = escape(text.charAt(i));
//		if (n.length < 4) {
//			count++; 
//			return false;
//
//		}else{
//			count+=2;
//		}
//
//		if (count > textLen) {
//			return false;
//		}
//	}
//
//	return true;
//}
//
//function zenhanCount(chkStr) {
//
//	var numCnt;
//	var alpCnt;
//	var hanCnt;
//	var kanaCnt;
//	var zenCnt;
//	var ctlCnt;
//	var tmpStr;
//
//
//
//	numCnt = 0;
//	alpCnt = 0;
//	hanCnt = 0;
//	kanaCnt = 0;
//	zenCnt = 0;
//	ctlCnt = 0;
//	tmpStr = '';
//
//	if (escape('あ').charAt(1) == 'u') {
//		for (i = 0; i < chkStr.length; i ++) {
//			tmpStr = escape(chkStr.charAt(i))
//			if (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'u') {
//				if (chkStr.charAt(i) >= '｡' && chkStr.charAt(i) <= 'ﾟ') { kanaCnt ++ }
//				else { zenCnt ++ }
//				}
//			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
//			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
//			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
//			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { hanCnt ++ }
//			else { ctlCnt ++ }
//			}
//		}
//	else {
//		for (i = 0; i < chkStr.length; i ++) {
//			tmpStr = escape(chkStr.charAt(i))
//			if ((tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == '8') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == '9') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'E') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'F')) {
//				zenCnt ++
//				}
//			else if (chkStr.charAt(i) >= '｡' && chkStr.charAt(i) <= 'ﾟ') { kanaCnt ++ }
//			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
//			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
//			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { hanCnt ++ }
//			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
//			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { hanCnt ++ }
//			else { ctlCnt ++ }
//			}
//		}
//
//	hanCnt = hanCnt + numCnt + alpCnt;
//	if (kanaCnt > 0) { return 8 }
//	else if (ctlCnt > 0) { return 4 }
//	else if (hanCnt == 0 && zenCnt > 0) { return 1 }
//	else if (hanCnt > 0 && zenCnt > 0) { return 3 }
//	else if (numCnt > 0 && hanCnt == numCnt) { return 5 }
//	else if (alpCnt > 0 && hanCnt == alpCnt) { return 6 }
//	else if ((alpCnt > 0 && numCnt >0) && alpCnt + numCnt == hanCnt) { return 7 }
//	else if (hanCnt > 0) { return 0 }
//}
//
//function MailFormatCheck(chkStr) {
//
//	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,3}|\d+)$/i
//
//	var returnval=emailfilter.test(chkStr);
//
//	if(returnval==false){
//
//		if(chkStr.length>1){
//			if(chkStr.charAt(chkStr.length-1)=="."){
//
//				var returnval=emailfilter.test(chkStr.substring(0,chkStr.length-1));
//
//			}
//		}
//	}
//
//	return returnval;
//}
//
//function furiganaCheck(chkStr) {
//
//
//	var i;
//
//	for (i = 0; i < chkStr.length; i ++) {
//		if ((chkStr.charAt(i) >= 'ァ' && chkStr.charAt(i) <= 'ン') || chkStr.charAt(i) == 'ー'){ continue }
//		else { return false }
//		}
//	return true;
//}
//
///**
// * バイト数をチェックします。
// * 
// * @param チェックする値
// * @return バイト数
// */
//function bLength(str) { 
//    var r = 0; 
//    for (var i = 0; i < str.length; i++) { 
//        var c = str.charCodeAt(i); 
//         Shift_JIS: 0x0 〜 0x80, 0xa0 , 0xa1 〜 0xdf , 0xfd 〜 0xff 
//         Unicode : 0x0 〜 0x80, 0xf8f0, 0xff61 〜 0xff9f, 0xf8f1 〜 0xf8f3 
//        if ( (c >= 0x0 && c < 0x81) || (c == 0xf8f0) || (c >= 0xff61 && c < 0xffa0) || (c >= 0xf8f1 && c < 0xf8f4)) { 
//            r += 1; 
//        } else { 
//            r += 2; 
//        } 
//    } 
//    return r; 
//} 
//
//