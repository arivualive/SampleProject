<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

function HiddenValAdd(pmode,mailtraceid,printstatekbn){
    with (document.list){
        if (typeof pmode === "undefined") {
            pMode.value ="";
        }else{
            pMode.value =pmode;
        }
        if (mailtraceid) {
            var wk_kainno = "Kainno"+ mailtraceid;
            var wk_ruteKbn = "RuteKbn"+ mailtraceid;
            var wk_contactkbn = "ContactKbn"+ mailtraceid;
            var wk_communicatormemo = "CommunicatorMemo"+mailtraceid;
            var wk_actionstatus = "ActionStatus"+mailtraceid;
            var wk_email = "Email"+mailtraceid;
            var wk_filterno = "FilterNo"+mailtraceid;
			// ▼【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 2018/05/22 TienPV
			var wk_communicator = 'Communicator' + mailtraceid;
			// ▲【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 2018/05/22 TienPV

            MailTraceId.value =mailtraceid;
            PrintStateKbn.value = printstatekbn;
            Kainno.value = document.getElementsByName(wk_kainno)[0].value;
            RuteKbn.value =document.getElementsByName(wk_ruteKbn)[0].value;
            ContactKbn.value =document.getElementsByName(wk_contactkbn)[0].value;
            CommunicatorMemo.value =document.getElementsByName(wk_communicatormemo)[0].value;
            ActionStatus.value =document.getElementsByName(wk_actionstatus)[0].value;
            Email.value =document.getElementsByName(wk_email)[0].value;
            FilterNo.value =document.getElementsByName(wk_filterno)[0].value;
			// ▼【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 2018/05/22 TienPV
			Communicator.value = document.getElementsByName(wk_communicator)[0].value;
			// ▲【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 2018/05/22 TienPV
        }
    }
}

var status_val;
var new_val;
var communicator;
function chkInputDate(mode,mailtraceid,printstatekbn) {
   var return_flg = true;
   var p_mode;
   switch(mode){
        case 'search':
            if (chkDate(document.list.SearchFrom.value,document.list.SearchTo.value) == false){
                return_flg = false;
            }
            var searchKainno = document.list.SearchKainno.value;
            if (chkKainno(searchKainno) === false && searchKainno != ''){
                return_flg = false;
            }
            p_mode = "search";
            break;
        case 'update':
            var wk_kainno = "Kainno"+ mailtraceid;
            var wk_ruteKbn = "RuteKbn"+ mailtraceid;
            var wk_contactkbn = "ContactKbn"+ mailtraceid;
            var wk_communicatormemo = "CommunicatorMemo"+mailtraceid;

            if (chkKainno(document.getElementsByName(wk_kainno)[0].value) === false){
                return_flg = false;
                break;
            }
            if (chkRuteKbn(document.getElementsByName(wk_ruteKbn)[0].value) === false){
                return_flg = false;
                break;
            }
            if (chkContactKbn(document.getElementsByName(wk_contactkbn)[0].value) === false){
                return_flg = false;
                break;
            }
            if (chkCommunicatorMemo(document.getElementsByName(wk_communicatormemo)[0].value) === false){
                return_flg = false;
                break;
            }
			// ▼【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 2018/05/30 HanhTV
			var user_id_login = document.getElementsByName("UserIDLogin")[0].value;
			var user_login_name = document.getElementsByName("UserNameLogin")[0].value;

			// 現在の選択値が2:[確認済み]で、新しい選択値が0:[未処理]で、担当者が存在するか確認する。
			if (status_val == 2 && new_val == 0 && communicator != 'null') {
				// 対応状態を[確認済み]から[未処理]に変更したい時に確認メッセージを表示する。
				if (!confirm(user_login_name + "さん、対応状態を変更しますが、よろしいですか？")) {
					document.getElementsByName("StatusKey"+mailtraceid)[0].value = status_val;
					document.getElementsByName("ActionStatus"+mailtraceid)[0].value = status_val;
					return_flg = false;
				} else {
					return_flg = true;
				}
			}
			// ▲【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 2018/05/30 HanhTV
            p_mode = "updTraceData";
    }
    if (return_flg === true) {
        HiddenValAdd(p_mode,mailtraceid,printstatekbn);
    }
    return return_flg;
}

function chkDateFormat(datestr,dateflg) {
    with (document.list){
        var err_flg = false;
        var arydate;
        var aryYmdDate;
        var convstr;
        var ymdstr;
        var ymdhmstr;

        //文字列の中に「0～9」、「 」、「/」、「:」以外が入っている場合はエラー
        if (datestr.match(/[^\d /:]/)) {
            err_flg = true;
        }
        //入力データを年月日と時分で配列に分割
        arydate = datestr.split(' ');

        if(!err_flg && !arydate[0].match(/^\d{4}\/\d{2}\/\d{2}/)){
            if (datestr.indexOf('/') == -1) {
                err_flg = true;
            }else{
                //入力データを年、月、日で配列に分割
                aryYmdDate = arydate[0].split('/');

                //値の存在チェック
                if (typeof aryYmdDate[0] ==="undefined" || typeof aryYmdDate[1] ==="undefined" || typeof aryYmdDate[2] ==="undefined") {
                    err_flg = true;

                //年月日の桁数チェック
                }else if  (aryYmdDate[0].length > 4 || aryYmdDate[1].length > 2 || aryYmdDate[2].length > 2) {
                    err_flg = true;
                //年が4桁で無い場合はエラー
                }else if (aryYmdDate[0].length < 4) {
                    err_flg = true;
                }
                if (!err_flg && !isNaN(parseInt(aryYmdDate[0]))
                   && !isNaN(parseInt(aryYmdDate[1]))
                   && !isNaN(parseInt(aryYmdDate[2]))) {
                   //月日を0パディングし、年月日を成形
                   ymdstr = aryYmdDate[0] + "/" + ('00' + aryYmdDate[1]).slice(-2) + "/" + ('00' + aryYmdDate[2]).slice(-2);
                   if (typeof arydate[1] !== "undefined") {
                       ymdhmstr = ymdstr + " " + arydate[1];
                       datestr = ymdhmstr;
                       if (dateflg=='from') {
                           SearchFrom.value = datestr;
                       }else if (dateflg=='to'){
                           SearchTo.value = datestr;
                       }
                   }else{
                       datestr = ymdstr;
                   }
                }else{
                    err_flg = true;
                }
            }
        }
        //入力データのフォーマットチェック
        if(!err_flg && typeof arydate[1] !== "undefined" && !arydate[1].match(/^\d{2}\:\d{2}$/)){
            //時分の入力値をチェック(入力値に誤りが有る場合はエラーメッセージ表示)
            convstr = convTime(arydate[1]);
            if (convstr === false) {
                err_flg = true;
            }else{
                if (dateflg=='from') {
                    SearchFrom.value = datestr.substr(0,10) + " " + convstr;
                }else if (dateflg=='to') {
                    SearchTo.value = datestr.substr(0,10)  + " " + convstr;
                }
            }
        //時分が正しく入力されている場合、または時分が入力されていない場合
        }else{
            //入力が年月日のみ入力されている場合は時分を自動で付ける（from:00:00 to:23:59）
            if (typeof arydate[1] === "undefined") {
                if (dateflg=='from') {
                    SearchFrom.value = datestr.substr(0,10)  + ' 00:00';
                }else if (dateflg=='to') {
                    SearchTo.value = datestr.substr(0,10)  + ' 23:59';
                }
            }
        }
        return err_flg;
    }
}

function convTime(str) {

    //値のチェック
    if (typeof str === "undefined") {
        return false;
    }
    //strの形式は「時：分」
    //形式以外の場合はエラー
    if (str.indexOf(':') == -1) {
        return false;
    }else{
        //時分を配列に分割
        var aryHourMin = str.split(':');

        //桁数チェック
        if (aryHourMin[0].length > 2 || aryHourMin[1].length > 2) {
            return false;
        }
        //時および分が数値か確認し、数値で1桁の場合は0埋めする
        if (!isNaN(parseInt(aryHourMin[0]))
            && !isNaN(parseInt(aryHourMin[1]))) {
            return ('00' + aryHourMin[0]).slice(-2) + ":" + ('00' + aryHourMin[1]).slice(-2);
        }else{
            return false;
        }
    }
}

function chkDateValidity(Year,Month,Day,Hours,Minutes){
    if(Month >= 0 && Month <= 11 && Day >= 1 && Day <= 31 && Hours >=0 && Hours <=23 && Minutes >= 0 && Minutes <= 59){
        var vDt = new Date(Year, Month, Day,Hours,Minutes);
        var err_flg = false;
        if(isNaN(vDt)){
            err_flg = true;
        }else if(vDt.getFullYear() == Year
                 && vDt.getMonth() ==Month
                 && vDt.getDate() == Day
                 && vDt.getHours() ==Hours
                 && vDt.getMinutes() == Minutes ){
            err_flg = false;
        }
    }else{
        err_flg = true;
    }
    return err_flg;
}

function chkDate(fromdate,todate) {

    //入力値をトリミング
    fromdate = fromdate.replace(/^[\s　]+|[\s　]+$/g, "");
    todate   = todate.replace(/^[\s　]+|[\s　]+$/g, "");

    //年月日と時分の間に複数空白が入力された場合、1文字空白に置換
    fromdate = fromdate.replace(/(\s)\1+/,' ');
    todate = todate.replace(/(\s)\1+/,' ');


    document.list.SearchFrom.value = fromdate;
    document.list.SearchTo.value = todate;

    // 日付の妥当性チェック及び書式チェック開始
    if (fromdate !="" &&chkDateFormat(fromdate,'from') == true){
        alert("検索条件の「受信日時（ＦＲＯＭ）」を正しく入力してください。");
        return false;
    }
    if (todate != "" && chkDateFormat(todate,'to')== true){
        alert("検索条件の「受信日時（ＴＯ）」を正しく入力してください。");
        return false;
    }

    var chkfromdate = document.list.SearchFrom.value;
    var chktodate = document.list.SearchTo.value;

    var fYear = chkfromdate.substr(0, 4);
    var fMonth = chkfromdate.substr(5, 2) - 1; // Javascriptは、0-11で表現
    var fDay = chkfromdate.substr(8, 2);
    var fHours = chkfromdate.substr(11, 2);
    var fMinutes = chkfromdate.substr(14, 2);

    var tYear = chktodate.substr(0, 4);
    var tMonth = chktodate.substr(5, 2) - 1; // Javascriptは、0-11で表現
    var tDay = chktodate.substr(8, 2);
    var tHours = chktodate.substr(11, 2);
    var tMinutes = chktodate.substr(14, 2);

    // 日付の値チェック
    if ((chkfromdate !="" && fncChkDate(chkfromdate.substr(0, 4) + chkfromdate.substr(5, 2) + chkfromdate.substr(8, 2)) === false)
        || (chkfromdate !="" && chkDateValidity(fYear,fMonth,fDay,fHours,fMinutes))) {
        alert("検索条件の「受信日時（ＦＲＯＭ）」を正しく入力してください。");
        return false;
    }

    if ((chktodate !="" && fncChkDate(chktodate.substr(0, 4)  + chktodate.substr(5, 2) + chktodate.substr(8, 2)) === false)
        || (chktodate != "" && chkDateValidity(tYear,tMonth,tDay,tHours,tMinutes))) {
        alert("検索条件の「受信日時（ＴＯ）」を正しく入力してください。");
        return false;
    }

    // from to の整合性チェック開始
    if (chkfromdate !="" && chktodate != "") {
        var start = fYear.toString() + ("00" + (parseInt(fMonth) + 1).toString()).slice(-2) + ("00" + fDay.toString()).slice(-2) + ("00" + fHours.toString()).slice(-2) + ("00" + fMinutes.toString()).slice(-2);
        var end = tYear.toString() + ("00" + (parseInt(tMonth) + 1).toString()).slice(-2) + ("00" + tDay.toString()).slice(-2) + ("00" + tHours.toString()).slice(-2) + ("00" + tMinutes.toString()).slice(-2);

        if (parseInt(start) == parseInt(end)) {
            alert("検索条件の「受信日時（ＦＲＯＭ）」と「受信日時（ＴＯ）」に同じ日時は入力できません。1分以上の間をあけて入力してください。");
            return false;
        }

        if (parseInt(start) > parseInt(end)) {
            alert("検索条件は「受信日時（ＦＲＯＭ）」＜「受信日時（ＴＯ）」で入力してください。");
            return false;
        }
    }
    // from to の整合性チェック終了

}

function PrintJob(mail_trace_id,kainno_get_kbn,mail_body_contact_kbn,mail_body_id,print_state_kbn) {

    var wk_ruteKbn = "RuteKbn"+ mail_trace_id;
    var wk_contactkbn = "ContactKbn"+ mail_trace_id;

    var uke_kbn = document.getElementsByName(wk_ruteKbn)[0].value;
    var contact_kbn = document.getElementsByName(wk_contactkbn)[0].value;

    var popup_print_flg = false;
    if (uke_kbn == 4) {
        popup_print_flg = true;
    } else if (contact_kbn == 91 || contact_kbn == 92 || contact_kbn == 93 || contact_kbn == 94 || contact_kbn == 99){
        popup_print_flg = true;
    } else if (kainno_get_kbn == 2) {
        popup_print_flg = true;
    }

    if (popup_print_flg === true) {
       if ((mail_body_contact_kbn == "1031" || mail_body_contact_kbn == "1050") && mail_body_id) {
           window.open('/2019/'+mail_body_contact_kbn+'.php?mail_trace_id='+mail_trace_id+'&print_state_kbn=2&mail_body_id='+mail_body_id+'','printtool','width=800, height=600, menubar=no, toolbar=no, scrollbars=yes');
       }else{
           window.open('/2019/preview.php?mail_trace_id='+mail_trace_id+'&print_state_kbn=2','printjob','width=800, height=600, menubar=no, toolbar=no, scrollbars=yes');
       }
    }else{
        if (print_state_kbn == 2) {
            print_ret = true;
        } else {
            print_ret = confirm("WAOにコンタクトとスキャナーイメージを作成します。よろしいですか？");
        }
        if (print_ret == true) {
            HiddenValAdd('updPrintStat',mail_trace_id,1);
            document.list.submit();
        }
    }
}

function CompiledPrint(){
	// 「OK」時の処理開始 ＋ 確認ダイアログの表示
	if(window.confirm('WAOにコンタクトとスキャナーイメージを一括作成します。\nよろしいですか？')){
		HiddenValAdd('updPrintStatMulti',"","");
		document.list.submit();
	}
}

function CompiledConfirm(){
	// 「OK」時の処理開始 ＋ 確認ダイアログの表示
	if(window.confirm('チェックが入っているメールをすべて"確認済み"にします。\nよろしいですか？')){
		HiddenValAdd('updConfirmStatMulti',"","");
		document.list.submit();
	}
}
function PrintActiveChange(mail_trace_id) {
    document.getElementsByName("PrintButton"+mail_trace_id)[0].disabled = true;

    // 一括操作もできないようにする
    document.getElementById("compiledPrint").disabled = true;
    document.getElementById("compiledConfirm").disabled = true;

	// ▼【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 HanhTV 22/05/2018
	status_val = document.getElementsByName("StatusKey"+mail_trace_id)[0].value;
	new_val = document.getElementsByName("ActionStatus"+mail_trace_id)[0].value;
	communicator = document.getElementsByName("Communicator"+mail_trace_id)[0].value;
	// 隠しフォームに新しい値を設定する
	document.getElementsByName("StatusKey"+ mail_trace_id)[0].value = new_val; 
	// ▲【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 HanhTV 22/05/2018
}

function chkKainno(str){
	if(str.match(/[\D]/)){
		alert("「会員番号」は半角数字で入力してください。");
		return false;
	}
	return true;
}

function chkRuteKbn(str){
    if (str == "" || str === "0") {
        alert("「受区」を選択してください。");
        return false;
    }
    return true;
}

function chkCommunicatorMemo(str){
    var cnt = 0;
    for (i=0; i<str.length; i++) {
        cnt = cnt + 1;
    }
    if (cnt > 200) {
        alert("「スピンザーメモ」は200文字以内で入力してください。");
        return false;
    }
    return true;
}

function chkContactKbn(str){
    if (str == "" || str === "0") {
        alert("「コンタクト内容」を選択してください。");
        return false;
    }
    return true;
}

function PrintPage(mailtraceid,printstatekbn){

    opener.HiddenValAdd('updPrintStat',mailtraceid,printstatekbn);
    opener.document.list.submit();
    if(document.getElementById || document.layers){
        //印刷ウィンドウを表示
        window.print();
    }
}

// 選択した受区により、選択できるコンタクト内容を制御
function makeContactKbn(mail_trace_id, contact_kbn){

    var contact_kbn_list = new Array();

    // 受区：PC
    contact_kbn_list[1] = new Array();
    contact_kbn_list[1][1]  = '喜びの声';
    contact_kbn_list[1][2]  = 'Net会員関連';
    contact_kbn_list[1][3]  = 'TELDM関連';
    contact_kbn_list[1][4]  = '注文関連';
    contact_kbn_list[1][5]  = 'クレーム・要望';
    contact_kbn_list[1][90] = 'その他問合せ';
    // ▼R-#16070_管理画面のメニュー名称の修正 2014/11/12 nul-motoi
    contact_kbn_list[1][20] = '教えてプリーザー';
    contact_kbn_list[1][30] = 'WEBカレ登録';
    contact_kbn_list[1][31] = 'WEBカレアンケート';
    contact_kbn_list[1][42] = 'パウチ・タオル活用';
    contact_kbn_list[1][43] = 'パウチ・タオル活用削除';
    contact_kbn_list[1][50] = 'クチコミ投稿';
    contact_kbn_list[1][60] = '紹介';
    contact_kbn_list[1][70] = '登録情報変更';
    // ▼2015/05/18 R-#17712_めぐりの結晶の定期購入対応(nul hatano)
    contact_kbn_list[1][80] = '定期申込み';
    // ▲2015/05/18 R-#17712_めぐりの結晶の定期購入対応(nul hatano)
    // ▼2017/04/17 R-#29678_【H28-00565-01】実感チェックシート nul-nagata
    contact_kbn_list[1][100] = '担当制';
    contact_kbn_list[1][110] = '素肌美診断';
    // ▲2017/04/17 R-#29678_【H28-00565-01】実感チェックシート nul-nagata
    // ▼R-#31704_【H29-00247-01】会員版　素肌美診断_Web 2017/10/26 nul-sato
    contact_kbn_list[1][120] = '素肌カルテ';
    // ▲R-#31704_【H29-00247-01】会員版　素肌美診断_Web 2017/10/26 nul-sato
    // ▼R-#31706_【H29-00248-01】お試しセット使用後のお客様状態の見える化_Web 2017/10/26 nul-sato
    contact_kbn_list[1][130] = 'サンプル使用後アンケート';
    // ▲R-#31706_【H29-00248-01】お試しセット使用後のお客様状態の見える化_Web 2017/10/26 nul-sato


    // 受区：MB
    contact_kbn_list[2] = new Array();
    contact_kbn_list[2][1]  = '喜びの声';
    contact_kbn_list[2][2]  = 'Net会員関連';
    contact_kbn_list[2][3]  = 'TELDM関連';
    contact_kbn_list[2][4]  = '注文関連';
    contact_kbn_list[2][5]  = 'クレーム・要望';
    contact_kbn_list[2][90] = 'その他問合せ';
    // ▼R-#16070_管理画面のメニュー名称の修正 2014/11/12 nul-motoi
    contact_kbn_list[2][20] = '教えてプリーザー';
    contact_kbn_list[2][30] = 'WEBカレ登録';
    contact_kbn_list[2][31] = 'WEBカレアンケート';
    contact_kbn_list[2][42] = 'パウチ・タオル活用';
    contact_kbn_list[2][43] = 'パウチ・タオル活用削除';
    contact_kbn_list[2][50] = 'クチコミ投稿';
    contact_kbn_list[2][60] = '紹介';
    contact_kbn_list[2][70] = '登録情報変更';
    // ▼2015/05/18 R-#17712_めぐりの結晶の定期購入対応(nul hatano)
    contact_kbn_list[2][80] = '定期申込み';
    // ▲2015/05/18 R-#17712_めぐりの結晶の定期購入対応(nul hatano)

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

    var wk_ruteKbn = "RuteKbn"+ mail_trace_id;
    var uke_kbn = document.getElementsByName(wk_ruteKbn)[0].value;
    var wk_contactkbn = "ContactKbn"+ mail_trace_id;

    var select = document.getElementById(wk_contactkbn);

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
// ▼【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 2018/05/22 TienPV
function btnReplyMail(mail_trace_id) {
	// ログインしているユーザIDを取得する
	var user_login_id = document.getElementsByName('UserIDLogin')[0].value;
	// ログインしているユーザ名を取得する
	var user_login_name = document.getElementsByName('UserNameLogin')[0].value;
	// 担当者コードを取得する
	wk_communicator = 'Communicator' + mail_trace_id;
	wk_communicator_name = 'CommunicatorName' + mail_trace_id;
	var communicator = document.getElementsByName(wk_communicator)[0].value;
	var communicator_name = document.getElementsByName(wk_communicator_name)[0].value;
	wk_actionstatus = "ActionStatus" + mail_trace_id;
	// 受信メールアドレスを取得する
	receive_mail = document.getElementsByName("ReceiveEmail" + mail_trace_id)[0].value;
	kaiin_no = document.getElementsByName("Kainno" + mail_trace_id)[0].value;
	if (!kaiin_no) {
		window.alert('【会員番号】を入力してください。');
		return;
	}
	if (communicator != "" && communicator != "null") {
		if (communicator == user_login_id) {
			// 対応状態を[確認済み]に設定する
			document.getElementsByName(wk_actionstatus)[0].value = "2";
		} else {
			if (window.confirm(communicator_name + "さんが対応中です。メール送信をおこないますか？\nメール送信を行うと" + communicator_name + "さんの処理は続行できなくなります。")){
				// 担当者をログインしているユーザIDと設定する。
				document.getElementsByName(wk_communicator)[0].value = user_login_id;
				// 対応状態を[確認済み]に設定する
				document.getElementsByName(wk_actionstatus)[0].value = "2";
			} else {
				return;
			}
		}
	} else {
		// 担当者をログインしているユーザIDと設定する。
		document.getElementsByName(wk_communicator)[0].value = user_login_id;
		// 対応状態を[確認済み]に設定する
		document.getElementsByName(wk_actionstatus)[0].value = "2";
	}
	HiddenValAdd('updStatComtor',mail_trace_id,1);
	document.getElementById("mail" +mail_trace_id).href= "../1011/input.php?typ=mailtrace&MGMKBN=29&mail=" + receive_mail + "&mailTraceId=" + mail_trace_id + "&cd=" + kaiin_no;
	document.list.submit();
}
// ▲【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 2018/05/22 TienPV
