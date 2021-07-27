/*--------------------------------------------------------
 * fncEditConfirm
 * 概　要：更新ボタン押下時の確認ダイアログ
 * 引　数：
 * 戻り値：はい: true いいえ:false
--------------------------------------------------------*/
function fncEditConfirm(){

	if(confirm('更新されます。よろしいですか？')){
		return true;
	}else{
		return false;
	}

}
/*--------------------------------------------------------
 * fncDelConfirm
 * 概　要：削除ボタン押下時の確認ダイアログ
 * 引　数：
 * 戻り値：はい: true いいえ:false
--------------------------------------------------------*/
function fncDelConfirm(){

	if(confirm('削除されます。よろしいですか？')){
		return true;
	}else{
		return false;
	}

}

/*--------------------------------------------------------
 * fncSendConfirm
 * 概　要：送信ボタン押下時の確認ダイアログ
 * 引　数：
 * 戻り値：はい: true いいえ:false
--------------------------------------------------------*/
function fncSendConfirm(){

	if(confirm('送信されます。よろしいですか？')){
		return true;
	}else{
		return false;
	}

}

/*--------------------------------------------------------
 * fncTrim
 * 概　要：文字内の全角、半角スペースを削除
 * 引　数：対象文字列
 * 戻り値：全角、半角スペース削除後の文字列
--------------------------------------------------------*/
function fncTrim(str){
	str = str.replace(/^[ 　]+/,"");
	str = str.replace(/[ 　]+$/,"");
	return(str);
}

/*--------------------------------------------------------
 * fncJudgeHankaku
 * 概　要：半角英数字チェック
 * 引　数：対象文字列
 * 戻り値：半角英数字の場合：true、それ以外の文字が含まれている場合：false
--------------------------------------------------------*/
function fncJudgeHankaku(String){

	if ( !/^[a-zA-Z0-9]+$/.test(String)) { 
		return false;
	}

	return true;
}

/*--------------------------------------------------------
 * fncJudgeAlpha
 * 概　要：半角英字チェック
 * 引　数：対象文字列
 * 戻り値：半角英字の場合：true、それ以外の文字が含まれている場合：false
--------------------------------------------------------*/
function fncJudgeAlpha(String) {
	if ( !/^[a-zA-Z]+$/.test(String)) { 
		return false;
	}

	return true;
}

/*--------------------------------------------------------
 * fncJudgeNumber
 * 概　要：半角数字チェック
 * 引　数：対象文字列
 * 戻り値：半角数字の場合：true、それ以外の文字が含まれている場合：false
--------------------------------------------------------*/
function fncJudgeNumber(String) {
	if ( !/^[0-9]+$/.test(String)) { 
		return false;
	}

	return true;
}


/*--------------------------------------------------------
 * fncChkTime
 * 概　要：時間妥当性チェック関数
 * 引　数：対象文字列(hh24mi)
 * 戻り値：正しい場合：true、正しくない場合：false
--------------------------------------------------------*/
function fncChkTime(st_time) {
	str= ""+ st_time;
	blnFlag=isNaN(str);

	if (((str=="") || (blnFlag==true)) || (str.length != 4)) {
		return false;
	} else {
		THOUR = st_time.substr(0,2);
		TMIN = st_time.substr(2,2);
		if (THOUR > 23) {
			return false;
		}
		if (TMIN > 59) {
			return false;
		}
		return true;
	}
}
/*--------------------------------------------------------
 * fncChkDate
 * 概　要：日付妥当性チェック関数
 * 引　数：対象文字列(yyyymmdd)
 * 戻り値：正しい場合：true、正しくない場合：false
--------------------------------------------------------*/
function fncChkDate(hiduke) {

	str= ""+ hiduke;
	blnFlag=isNaN(str);
	
	if (((str=="") || (blnFlag==true)) || (str.length != 8)) {
		return false;
	} else {

		TYEAR = hiduke.substr(0,4);
		TMNT = hiduke.substr(4,2);
		TDAY = hiduke.substr(6,2);
		var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31)
		year = Number(TYEAR);
		mnt = Number(TMNT) -1;

		//閏年対応
		if (mnt==1) {
			if(((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) {
				monthDays[1] = 29
			}
		}

		if ((0>=TDAY) || (TDAY>monthDays[mnt]) || (0>=TMNT) || (TMNT>12)) {
			return false;
		} else return true;
	}
}
/*--------------------------------------------------------
 * fncGetLength
 * 概　要：文字数チェック関数
 * 引　数：対象文字列
 * 戻り値：対象文字列のバイト数
 * 備　考：全角１文字は、２文字とみなす
--------------------------------------------------------*/
function fncGetLength(str) {

	var i;
	var c;
	var cnt = 0;

	for (i=0; i<str.length; i++) {
		c = str.charCodeAt(i);

		if ( (c >= 0x0 && c < 0x81) || (c == 0xf8f0) || (c >= 0xff61 && c < 0xffa0) || (c >= 0xf8f1 && c < 0xf8f4)) {
			cnt += 1;
		} else {
			cnt += 2;
		}
	}

	return cnt;

}
/*--------------------------------------------------------
 * fncChkUrl
 * 概　要：URLチェック関数
 * 引　数：対象文字列
 * 戻り値：正しい場合：true　正しくない場合：false
--------------------------------------------------------*/
function fncChkUrl(url_str){
	if (url_str.match(/(http|ftp):\/\/[!#-9A-~]/i)) {
		if (ZenkakuCheck(url_str)) {
			return false;
		} else {
			return true;
		}
	}else{
		return false;
	}
}

/*--------------------------------------------------------
 * fncChkZenkaku
 * 概　要：全角文字が含まれているかチェックする関数
 * 引　数：対象文字列
 * 戻り値：含まれている場合：true　含まれていない場合：false
--------------------------------------------------------*/
function fncChkZenkaku(chk_str) {
	var str = chk_str;
	for (i=0;i<str.length;i++) {
		if (escape(str.charAt(i)).length>=4) {
//			alert("全角文字が含まれています");
			return true;
		}
	}
	return false;
}

/*--------------------------------------------------------
 * fncChkKana
 * 概　要：半角カナチェック関数
 * 引　数：対象文字列
 * 戻り値：全て半角カナの場合：true　半角カナ以外が含まれている場合：false
--------------------------------------------------------*/
function fncChkKana(theForm) {
	var text = theForm;
	var ret = true;
	var flg = true;
	var str = "";

	for ( i = 0 ; i < text.length ; i++ ) {
		str = text.substring(i, i+1);
		ret = isHankaku(str);
		if (!ret && str != " "){
			flg = false;
		}
	}
	if(!flg){
		return(false);
	}else{
		return(true);
	}
}

function isHankaku(str) {
	var esc_str = escape(str);
	var ms = navigator.appVersion.indexOf("MSIE");
	var nesc = navigator.appName.lastIndexOf("Netscape");
	
	if(nesc >= 0){
		if ( (esc_str.indexOf('%A') == 0) ||
			(esc_str.indexOf('%B') == 0) ||
			(esc_str.indexOf('%C') == 0) ||
			(esc_str.indexOf('%D') == 0) ){
			return(true);
		}
	}else if(ms > 0){
		if((esc_str.indexOf('%uFF6') == 0) ||
			(esc_str.indexOf('%uFF7') == 0) ||
			(esc_str.indexOf('%uFF8') == 0) ||
			(esc_str.indexOf('%uFF9') == 0) ) {
			return(true);
		}
	}

	return(false);
}
//R-#14022
function isNgWord(str){
	var illegal_str = '';
	var characterKanji = "①②③④⑤⑥⑦⑧⑨⑩⑪⑫⑬⑭⑮⑯⑰⑱⑲⑳ⅠⅡⅢⅣⅤⅥⅦⅧⅨⅩ㍉㌔㌢㍍㌘㌧㌃㌶㍑㍗㌍㌦㌣㌫㍊㌻㎜㎝㎞㎎㎏㏄㎡㍻〝〟№㏍℡㊤㊥㊦㊧㊨㈱㈲㈹㍾㍽㍼≒≡∫∮∑√⊥∠∟⊿∵∩∪纊褜鍈銈蓜俉炻昱棈鋹曻彅丨仡仼伀伃伹佖侒侊侚侔俍偀倢俿倞偆偰偂傔僴僘兊兤冝冾凬刕劜劦勀勛匀匇匤卲厓厲叝﨎咜咊咩哿喆坙坥垬埈埇﨏塚增墲夋奓奛奝奣妤妺孖寀甯寘寬尞岦岺峵崧嵓﨑嵂嵭嶸嶹巐弡弴彧德忞恝悅悊惞惕愠惲愑愷愰憘戓抦揵摠撝擎敎昀昕昻昉昮昞昤晥晗晙晴晳暙暠暲暿曺朎朗杦枻桒柀栁桄棏﨓楨﨔榘槢樰橫橆橳橾櫢櫤毖氿汜沆汯泚洄涇浯涖涬淏淸淲淼渹湜渧渼溿澈澵濵瀅瀇瀨炅炫焏焄煜煆煇凞燁燾犱犾猤猪獷玽珉珖珣珒琇珵琦琪琩琮瑢璉璟甁畯皂皜皞皛皦益睆劯砡硎硤硺礰礼神祥禔福禛竑竧靖竫箞精絈絜綷綠緖繒罇羡羽茁荢荿菇菶葈蒴蕓蕙蕫﨟薰蘒﨡蠇裵訒訷詹誧誾諟諸諶譓譿賰賴贒赶﨣軏﨤逸遧郞都鄕鄧釚釗釞釭釮釤釥鈆鈐鈊鈺鉀鈼鉎鉙鉑鈹鉧銧鉷鉸鋧鋗鋙鋐﨧鋕鋠鋓錥錡鋻﨨錞鋿錝錂鍰鍗鎤鏆鏞鏸鐱鑅鑈閒隆﨩隝隯霳霻靃靍靏靑靕顗顥飯飼餧館馞驎髙髜魵魲鮏鮱鮻鰀鵰鵫鶴鸙黑ⅰⅱⅲⅳⅴⅵⅶⅷⅸⅹ￢￤＇＂槙弌丐丕个丱丶丼丿乂乖乘亂亅豫亊舒弍于亞亟亠亢亰亳亶从仍仄仆仂仗仞仭仟价伉佚估佛佝佗佇佶侈侏侘佻佩佰侑佯來侖儘俔俟俎俘俛俑俚俐俤俥倚倨倔倪倥倅伜俶倡倩倬俾俯們倆偃假會偕偐偈做偖偬偸傀傚傅傴傲僉僊傳僂僖僞僥僭僣僮價僵儉儁儂儖儕儔儚儡儺儷儼儻儿兀兒兌兔兢竸兩兪兮冀冂囘册冉冏冑冓冕冖冤冦冢冩冪冫决冱冲冰况冽凅凉凛几處凩凭凰凵凾刄刋刔刎刧刪刮刳刹剏剄剋剌剞剔剪剴剩剳剿剽劍劔劒剱劈劑辨辧劬劭劼劵勁勍勗勞勣勦飭勠勳勵勸勹匆匈甸匍匐匏匕匚匣匯匱匳匸區卆卅丗卉卍凖卞卩卮夘卻卷厂厖厠厦厥厮厰厶參簒雙叟曼燮叮叨叭叺吁吽呀听吭吼吮吶吩吝呎咏呵咎呟呱呷呰咒呻咀呶咄咐咆哇咢咸咥咬哄哈咨咫哂咤咾咼哘哥哦唏唔哽哮哭哺哢唹啀啣啌售啜啅啖啗唸唳啝喙喀咯喊喟啻啾喘喞單啼喃喩喇喨嗚嗅嗟嗄嗜嗤嗔嘔嗷嘖嗾嗽嘛嗹噎噐營嘴嘶嘲嘸噫噤嘯噬噪嚆嚀嚊嚠嚔嚏嚥嚮嚶嚴囂嚼囁囃囀囈囎囑囓囗囮囹圀囿圄圉圈國圍圓團圖嗇圜圦圷圸坎圻址坏坩埀垈坡坿垉垓垠垳垤垪垰埃埆埔埒埓堊埖埣堋堙堝塲堡塢塋塰毀塒堽塹墅墹墟墫墺壞墻墸墮壅壓壑壗壙壘壥壜壤壟壯壺壹壻壼壽夂夊夐夛梦夥夬夭夲夸夾竒奕奐奎奚奘奢奠奧奬奩奸妁妝佞侫妣妲姆姨姜妍姙姚娥娟娑娜娉娚婀婬婉娵娶婢婪媚媼媾嫋嫂媽嫣嫗嫦嫩嫖嫺嫻嬌嬋嬖嬲嫐嬪嬶嬾孃孅孀孑孕孚孛孥孩孰孳孵學斈孺宀它宦宸寃寇寉寔寐寤實寢寞寥寫寰寶寳尅將專對尓尠尢尨尸尹屁屆屎屓遙熙";

	for(var i = 0; i < str.length; i++){
		var tmp_str = str.charAt(i);
		if(characterKanji.indexOf(tmp_str) >= 0){
			if(illegal_str && illegal_str.indexOf(tmp_str) < 0){
				illegal_str += '、' + tmp_str;
			} else if(!illegal_str) {
				illegal_str += tmp_str;
			}
		}
	}
	return illegal_str;
}
//R-#14022

/*--------------------------------------------------------
 * fnkChkDirName
 * 概　要：ディレクトリ名チェック関数
 * 引　数：対象文字列
 * 戻り値：正しい場合：true　正しくない場合：false
--------------------------------------------------------*/
function fnkChkDirName(str){

	//半角全角英数字、ハイフン、アンダーバー、カンマ以外の文字はエラー
	if (!str.match(/[^a-zA-Z0-9|\-|\_|\.]/)) {
		return true;
	} else {
		return false;
	}

}
/*--------------------------------------------------------
 * fncConfirm
 * 概　要：確認ダイアログ表示
 * 引　数：ダイアログに表示するメッセージ、submitするform名
 * 戻り値：なし
--------------------------------------------------------*/
function fncConfirm(msg,form) {
	var result
	result = confirm(msg);
	if (result == true) {
		form.submit();
	} else {
		return (false);
	}
}

/*--------------------------------------------------------
 * fncAlert
 * 概　要：アラート表示
 * 引　数：アラートに表示するメッセージ、focusするオブジェクト名
 * 戻り値：なし
--------------------------------------------------------*/
function fncAlert(msg,obj) {
	alert(msg);
	obj.focus();
}

/*--------------------------------------------------------
 * fncMessage
 * 概　要：メッセージ表示
 * 引　数：ダイアログに表示するメッセージ、submitするform名
 * 戻り値：なし
--------------------------------------------------------*/
function fncMessageA(msg, url) {
	twindow.alert(msg);
	url.submit();
	exit;
}
/*--------------------------------------------------------
 * fncNowtime
 * 概　要：フォームへ現在時刻を入れる
 * 引　数：
 * 戻り値：なし
--------------------------------------------------------*/
function fncNowtime() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	d = dt.getDate();
	h = dt.getHours();
	mi = dt.getMinutes();
	
	document.form_inp.s_year.value = y;
	document.form_inp.s_month.value = m;
	document.form_inp.s_day.value = d;
	document.form_inp.s_hour.value = h;
	document.form_inp.s_min.value = mi;
}
/*--------------------------------------------------------
 * fnclimit
 * 概　要：無期限として2999年12月31日23時59分
 * 引　数：
 * 戻り値：なし
--------------------------------------------------------*/
function fnclimit() {
	dt = new Date();
	y = 9999;
	m = 12;
	d = 31;
	h = 23;
	mi = 59; 
	
	document.form_inp.e_year.value = y;
	document.form_inp.e_month.value = m;
	document.form_inp.e_day.value = d;
	document.form_inp.e_hour.value = h;
	document.form_inp.e_min.value = mi;
}
/*--------------------------------------------------------
 * Nowtime
 * 概　要：フォームへ現在時刻を入れる
 * 引　数：
 * 戻り値：なし
--------------------------------------------------------*/
function Nowtime() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	d = dt.getDate();
	h = dt.getHours();
	mi = dt.getMinutes();
	
	document.form_inp.s_yy.value = y;
	document.form_inp.s_mm.value = m;
	document.form_inp.s_dd.value = d;
	document.form_inp.s_hh.value = h;
	document.form_inp.s_mi.value = mi;
}
/*--------------------------------------------------------
 * limittime
 * 概　要：無期限として2999年12月31日23時59分
 * 引　数：
 * 戻り値：なし
--------------------------------------------------------*/
function limittime() {
	dt = new Date();
	y = 9999;
	m = 12;
	d = 31;
	h = 23;
	mi = 59; 
	
	document.form_inp.e_yy.value = y;
	document.form_inp.e_mm.value = m;
	document.form_inp.e_dd.value = d;
	document.form_inp.e_hh.value = h;
	document.form_inp.e_mi.value = mi;
}
/*--------------------------------------------------------
 * Nowdate
 * 概　要：フォームへ現在日時を入れる
 * 引　数：
 * 戻り値：なし
--------------------------------------------------------*/
function Nowdate() {
	dt = new Date();
	y = dt.getFullYear();
	m = dt.getMonth() + 1;
	if(m < 10) {
		m = "0" + m;
	}
	d = dt.getDate();
	if(d < 10) {
		d = "0" + d;
	}
	document.form_inp.s_yy.value = y;
	document.form_inp.s_mm.value = m;
	document.form_inp.s_dd.value = d;
}
