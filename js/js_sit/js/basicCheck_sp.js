asc = new Array(" ","!","\"","#","$","%","&","\'","(",")","*","+",",","-",".","/","0","1","2","3","4","5","6","7","8","9",":",";","<","=",">","?","@","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","[","\\","]","^","_","`","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","{","|","}","~","｡","｢","｣","､","･","ｰ","ﾞ","ﾟ");
zen = new Array("　","！","”","＃","＄","％","＆","’","（","）","＊","＋","，","－","．","／","０","１","２","３","４","５","６","７","８","９","：","；","＜","＝","＞","？","＠","Ａ","Ｂ","Ｃ","Ｄ","Ｅ","Ｆ","Ｇ","Ｈ","Ｉ","Ｊ","Ｋ","Ｌ","Ｍ","Ｎ","Ｏ","Ｐ","Ｑ","Ｒ","Ｓ","Ｔ","Ｕ","Ｖ","Ｗ","Ｘ","Ｙ","Ｚ","［","￥","］","＾","＿","`","ａ","ｂ","ｃ","ｄ","ｅ","ｆ","ｇ","ｈ","ｉ","ｊ","ｋ","ｌ","ｍ","ｎ","ｏ","ｐ","ｑ","ｒ","ｓ","ｔ","ｕ","ｖ","ｗ","ｘ","ｙ","ｚ","｛","｜","｝","～","。","「","」","、","・","ー","゛","゜");
hkk = new Array("ｶﾞ","ｷﾞ","ｸﾞ","ｹﾞ","ｺﾞ","ｻﾞ","ｼﾞ","ｽﾞ","ｾﾞ","ｿﾞ","ﾀﾞ","ﾁﾞ","ﾂﾞ","ﾃﾞ","ﾄﾞ","ﾊﾞ","ﾊﾟ","ﾋﾞ","ﾋﾟ","ﾌﾞ","ﾌﾟ","ﾍﾞ","ﾍﾟ","ﾎﾞ","ﾎﾟ","ｳﾞ","ｧ","ｱ","ｨ","ｲ","ｩ","ｳ","ｪ","ｴ","ｫ","ｵ","ｶ","ｷ","ｸ","ｹ","ｺ","ｻ","ｼ","ｽ","ｾ","ｿ","ﾀ","ﾁ","ｯ","ﾂ","ﾃ","ﾄ","ﾅ","ﾆ","ﾇ","ﾈ","ﾉ","ﾊ","ﾋ","ﾌ","ﾍ","ﾎ","ﾏ","ﾐ","ﾑ","ﾒ","ﾓ","ｬ","ﾔ","ｭ","ﾕ","ｮ","ﾖ","ﾗ","ﾘ","ﾙ","ﾚ","ﾛ","ﾜ","ｦ","ﾝ","ｲ","ｴ");
zkk  = new Array("ガ","ギ","グ","ゲ","ゴ","ザ","ジ","ズ","ゼ","ゾ","ダ","ヂ","ヅ","デ","ド","バ","パ","ビ","ピ","ブ","プ","ベ","ペ","ボ","ポ","ヴ","ァ","ア","ィ","イ","ゥ","ウ","ェ","エ","ォ","オ","カ","キ","ク","ケ","コ","サ","シ","ス","セ","ソ","タ","チ","ッ","ツ","テ","ト","ナ","ニ","ヌ","ネ","ノ","ハ","ヒ","フ","ヘ","ホ","マ","ミ","ム","メ","モ","ャ","ヤ","ュ","ユ","ョ","ヨ","ラ","リ","ル","レ","ロ","ワ","ヮ","ヲ","ン","ヰ","ヱ","ー");
zhk  = new Array("が","ぎ","ぐ","げ","ご","ざ","じ","ず","ぜ","ぞ","だ","ぢ","づ","で","ど","ば","ぱ","び","ぴ","ぶ","ぷ","べ","ぺ","ぼ","ぽ","う゛","ぁ","あ","ぃ","い","ぅ","う","ぇ","え","ぉ","お","か","き","く","け","こ","さ","し","す","せ","そ","た","ち","っ","つ","て","と","な","に","ぬ","ね","の","は","ひ","ふ","へ","ほ","ま","み","む","め","も","ゃ","や","ゅ","ゆ","ょ","よ","ら","り","る","れ","ろ","わ","ゎ","を","ん","ゐ","ゑ","ー");
space = new Array(" ", "　");

function err_position(){
	location.href = "#error_position";
}


/* ------------------------
  入力値チェック
-------------------------- */
/*
 * 会員番号をチェック
 * 
 * @param objKainID  会員番号のテキストボックスのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkKainNo(objKainNo) {

	var strKainNo = trim(objKainNo.value);
	objKainNo.value = strKainNo;
	$('#errKainno').hide();

	if (isNaN(strKainNo) || !num_chk(strKainNo) || strKainNo.length != 8) {
		$('#errKainno').show();
		location.hash="pos_kainno";
		return false;
	}
	return true;
}

/*
 * お名前をチェック
 * 
 * @param objNameKana  お名前(姓/名)のテキストボックスのオブジェクト
 * @param nameflg  姓/名切り分けフラグ
 * @return true:チェックOK or false:チェックNG
 */
function checkName(objNameKana,nameflg) {

	var strNameKana = trim(objNameKana.value);
	objNameKana.value = strNameKana;
	$('#errName').hide();

	//お名前
	if (strNameKana == "" || !hiraganaCheck(strNameKana)) {
		if (nameflg == 1) {
			errMsg = "お名前(姓)を全角ひらがなの文字でご入力ください。";
		}else{
			errMsg = "お名前(名)を全角ひらがなの文字でご入力ください。";
		}
		$('#errName').html(errMsg).show();
		location.href="#pos_name";
		return false;
	}
	return true;
}

/*
 * お名前をチェック
 * 
 * @param objNameKana1  お名前(姓)のテキストボックスのオブジェクト
 * @param objNameKana2  お名前(名)のテキストボックスのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkNameKana(objNameKana1,objNameKana2) {

	var strNameKana1 = trim(objNameKana1.value);
	var strNameKana2 = trim(objNameKana2.value);
	objNameKana1.value = strNameKana1;
	objNameKana2.value = strNameKana2;
	$('#errName').hide();

	//お名前
	if (strNameKana1 == "" || !hiraganakatakanaCheck(strNameKana1)) {
		errMsg = "お名前(姓)を全角「ひらがな」または全角「カタカナ」の文字でご入力ください。";
		$('#errName').html(errMsg).show();
		location.href="#pos_name";
		return false;
	}
	if (strNameKana2 == "" || !hiraganakatakanaCheck(strNameKana2)) {
		errMsg = "お名前(名)を全角「ひらがな」または全角「カタカナ」の文字でご入力ください。";
		$('#errName').html(errMsg).show();
		location.href="#pos_name";
		return false;
	}

	var strNameKana = strNameKana1 + "　" + strNameKana2;
	if (denbunFormat(strNameKana, 64, 6) == false) {
		errMsg = "お名前は姓名あわせて30文字まででご入力ください。";
		$('#errName').html(errMsg).show();
		location.href="#pos_name";
		return false;
	}

	return true;
}

/*
 * 電話番号をチェック
 * 
 * @param objTelNo1 市外局番のテキストボックスのオブジェクト
 * @param objTelNo2 市内局番のテキストボックスのオブジェクト
 * @param objTelNo3 電話番号のテキストボックスのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkTelNo(objTelNo1, objTelNo2, objTelNo3) {

	$('#errTel1').hide();
	$('#errTel').hide();

	// 市外局番
	var strTelNo1 = trim(objTelNo1.value);
	objTelNo1.value = strTelNo1;
	if (isNaN(strTelNo1) || !num_chk(strTelNo1) || strTelNo1.length < 2 || strTelNo1.length > 5) {
		errMsg = "市外局番は2桁以上の半角数字を入力してください。";
		$('#errTel').html(errMsg).show();
		location.href="#pos_tel";
		return false;
	}

	// 市内局番
	var strTelNo2 = trim(objTelNo2.value);
	objTelNo2.value = strTelNo2;
	if (isNaN(strTelNo2) || !num_chk(strTelNo2) || strTelNo2.length < 1 || strTelNo2.length > 5) {
		errMsg = "市内局番は半角数字で入力してください。";
		$('#errTel').html(errMsg).show();
		location.href="#pos_tel";
		return false;
	}

	// 加入者番号
	var strTelNo3 = trim(objTelNo3.value);
	objTelNo3.value = strTelNo3;
	if (isNaN(strTelNo3) || !num_chk(strTelNo3) || strTelNo3.length != 4) {
		errMsg = "電話番号は4桁の半角数字で入力してください。";
		$('#errTel').html(errMsg).show();
		location.href="#pos_tel";
		return false;
	}

	// ▼電話番号全体のチェック
	var strTelNo = strTelNo1 + strTelNo2 + strTelNo3;
	var isKetai = strTelNo.match(/^050|^060|^070|^080|^090/);
	if (strTelNo.length < 10 || (!isKetai && strTelNo.length != 10) || (isKetai && strTelNo.length != 11)) {
		errMsg = "市外局番、市内局番を正しく数字で入力してください。";
		$('#errTel').html(errMsg).show();
		location.href="#pos_tel";
		return false;
	}
	if (strTelNo.length > 11) {
		errMsg = "市外局番、市内局番を正しく数字で入力してください。";
		$('#errTel').html(errMsg).show();
		location.href="#pos_tel";
		return false;
	}
	return true;
}

/*
 * メールアドレスのチェック
 * 
 * @param objEmail  メールアドレスのテキストボックスのオブジェクト
 * @param objEmail2 確認用メールアドレスのテキストボックスのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkEmail(objEmail, objEmail2) {

	var strEmail  = trim(objEmail.value);
	var strEmail2 = trim(objEmail2.value);
	objEmail.value  = strEmail;
	objEmail2.value = strEmail2;
	$('#errMail1').hide();
	$('#errMail2').hide();
	$('#errMail3').hide();

	if(MailFormatCheck(strEmail) == false){
		$('#errMail1').show();
		location.hash="pos_mailaddress";
		return false;
	}
	else if(strEmail2 === ""){
		$('#errMail2').show();
		location.href="#pos_mailaddress";
		return false;
	}
	else if(strEmail!=strEmail2){
		$('#errMail3').show();
		location.href="#pos_mailaddress";
		return false;
	}
	else if(!strEmail.match("test@saishunkan.co.jp") && strEmail.match("@saishunkan")){
		$('#errMail1').show();
		location.hash="pos_mailaddress";
		return false;
	}

	if(strEmail.match(/\.exe/)){
		$('#errMail1').show();
		location.href="#pos_mailaddress";
		return false;
	}
	return true;
}

/*
 * 秘密の質問をチェック
 * 
 * @param objSQNo  秘密の質問のプルダウンのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkSQNo(objSQNo) {

	var strSQNo = trim(objSQNo.value);
	objSQNo.value = strSQNo;
	$('#errSecretQ').hide();

	if (isNaN(strSQNo) || !num_chk(strSQNo) || strSQNo.length > 2 || strSQNo <= 0 || strSQNo > 70) {
		objSQNo.value = "0";
		$('#errSecretQ').show();
		location.href="#pos_SecretQ";
		return false;
	}
	return true;
}

/*
 * 今回限りの合言葉をチェック
 * 
 * @param objSQNo  今回限りの合言葉のテキストボックスのオブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkSQAnswer(objSQAnswer) {

	var strSQAnswer = trim(objSQAnswer.value);
	objSQAnswer.value = strSQAnswer;
	$('#errSecretA1').hide();
	$('#errSecretA').hide();

	if (strSQAnswer.length < 2 ) {
		errMsg = "今回限りの合言葉は全角2文字以上でお願いします。";
		$('#errSecretA').html(errMsg).show();
		location.href="#pos_SecretA";
		return false;
	}
	if (strSQAnswer.length > 20 ) {
		errMsg = "今回限りの合言葉は全角20文字以内でお願いします。";
		$('#errSecretA').html(errMsg).show();
		location.href="#pos_SecretA";
		return false;
	}

	if (!checkIsZenkaku(strSQAnswer)) {
		$('#errSecretA1').show();
		location.href="#pos_SecretA";
		return false;
	}

	return true;
}

/*
 * 規約の同意有無をチェック
 * 
 * @param objAgree  規約の同意オブジェクト
 * @return true:チェックOK or false:チェックNG
 */
function checkAgree(objAgree) {

	$('#errAgree').html('').hide();
	if( objAgree.checked==false ){
		msg = "「お客様情報の取り扱いについて」を<br />お読みいただき、「同意する」にチェックをしてください。";
		$('#errAgree').html(msg).show();
		location.href="#pos_agree";
		return false;
	}
	return true;
}

function checkIsZenkaku(value) {
	for (var i = 0; i < value.length; ++i) {
		var c = value.charCodeAt(i);
		if (c < 256 || (c >= 0xff61 && c <= 0xff9f)) {
			return false;
		}
	}
	return true;
}


function mb_LTrim(strArg) {

	var strRet = strArg;
	if(strRet != '') {
		while (strRet.substring(0,1) == " " || strRet.substring(0,1) == "　") {
			strRet = strRet.substring(1, strRet.length);
		}
	}
	return strRet;
}


function mb_RTrim(strArg) {
	var strRet = strArg;
	var lLen = 0;
	
	if(strRet != '') {
		lLen = strArg.length;
		while (strRet.substring(lLen-1, lLen) == " " || strRet.substring(lLen-1, lLen) == "　") {
			strRet = strRet.substring(0, strRet.length - 1);
			lLen--;
		}
	}
	return strRet;
}


function trim(strArg) {
	var strRet = strArg;

	strRet = mb_LTrim(strRet);
	strRet = mb_RTrim(strRet);

	return strRet;
}

function MailFormatCheck(chkStr) {

	// ▼R-#3742
	var emailfilter=/^[\.\w-]+[\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,3}|\d+)$/i

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

/*
 * 半角数字のチェック
 * 
 * @param str 文字列
 * @return true:チェックOK or false:チェックNG
 */
function num_chk(str) {
	var result = str.match(/[0-9]*/);
	if (str != result) {
		return false;
	}
	return true;
}
