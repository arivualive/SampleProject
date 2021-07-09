<?
ini_set('max_execution_time', 120);
//▼R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
require_once ($ROOT_PATH.'/1011/mailDraft_inc.php');
//▲R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
// ▼R-#37426_【H31-0174-015】 NETのお客様で意志をもって対応したいお客様の管理システム構築 2020/07/07 cyc-hatano
require_once ($DATA_PATH.'/'.$org_my_func.'/common.dat.php');
// ▲R-#37426_【H31-0174-015】 NETのお客様で意志をもって対応したいお客様の管理システム構築 2020/07/07 cyc-hatano
//▼R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
require_once $CONF_PATH."/InquiryTypeConf.inc.php";
//▲R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa

$another_flg = '';
$wk_title = '';
$wk_msg = '';
$now = time();
$mail_result = false;

if ($my_func != '1013') {
	$mlName_array = explode(',', $mlName_csv);
	$mlTo_array = explode(',', $mlTo_csv);
	$KaiinCD_array = explode(',', $KaiinCD_csv);
} else {
	for ($i = 0; $i < count($p_mlName); $i++) {
		$mlName_array[] = $p_mlName[$i];
		$mlTo_array[] = $p_mlTo[$i];
		$KaiinCD_array[] = $p_KaiinCD[$i];

		$mlFrom_array[] = $p_mlFrom;
		$mlSubject_array[] = $p_mlSubject;
		$mlBody_array[] = $p_mlBody;
		$mlSignature_array[] = $p_mlSignature;
		$Memo_array[] = $p_Memo;
		$Memo2_array[] = $p_Memo2;
		$code_array[] = $p_code;


	}
	for ($i = 0; $i < count($m_mlName); $i++) {
		$mlName_array[] = $m_mlName[$i];
		$mlTo_array[] = $m_mlTo[$i];
		$KaiinCD_array[] = $m_KaiinCD[$i];

		$mlFrom_array[] = $m_mlFrom;
		$mlSubject_array[] = $m_mlSubject;
		$mlBody_array[] = $m_mlBody;
		$mlSignature_array[] = $m_mlSignature;
		$Memo_array[] = $m_Memo;
		$Memo2_array[] = $m_Memo2;
		$code_array[] = $m_code;
	}
}

for ($loopCnt = 0; $loopCnt < count($mlName_array); $loopCnt++) {
	$mlName = $mlName_array[$loopCnt];
	$mlTo = $mlTo_array[$loopCnt];
	$KaiinCD = $KaiinCD_array[$loopCnt];
	// ▼R-#37426_【H31-0174-015】 NETのお客様で意志をもって対応したいお客様の管理システム構築 2020/07/07 cyc-hatano
	$Aiko = getUserAikotoba($KaiinCD);
	// ▲R-#37426_【H31-0174-015】 NETのお客様で意志をもって対応したいお客様の管理システム構築 2020/07/07 cyc-hatano

	if ($my_func === '1013') {
		$mlFrom = $mlFrom_array[$loopCnt];
		$mlSubject = $mlSubject_array[$loopCnt];
		$mlBody = $mlBody_array[$loopCnt];
		$mlSignature = $mlSignature_array[$loopCnt];
		$memo = $Memo_array[$loopCnt];
		$memo2 = $Memo2_array[$loopCnt];
		$mail_cd = $code_array[$loopCnt];
	}

// 	logDebug(print_r($mlName, true));
// 	logDebug(print_r($mlTo, true));
// 	logDebug(print_r($KaiinCD, true));
// 	logDebug(print_r($mlFrom, true));
// 	logDebug(print_r($mlSubject, true));
// 	logDebug(print_r($mlBody, true));
// 	logDebug(print_r($memo, true));
// 	logDebug(print_r($memo2, true));
// 	logDebug(print_r($mail_cd, true));

	$con_utl = dbConnect();
	dbBegin($con_utl);
	//HuyDV 2018/06/04 start
	if ($typ == "mailtrace") {
	    $mailTraceId=$_REQUEST['mailTraceId'];
		$wkCode=$_REQUEST['cd']; // LW: 会員番号検索した際にhiddenに設定されるkainno
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		/*
		$sql = "SELECT COMMUNICATOR, ACTION_STATE_KBN FROM MAILTRACE_TBL ";
		$sql .=" WHERE MAIL_TRACE_ID = " . getSqlValue($mailTraceId);
		*/
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/01 jst-tomii
		//$sql = "SELECT charge AS COMMUNICATOR, act_stat_kbn AS ACTION_STATE_KBN FROM f_act_mail ";
		$sql = "SELECT charge AS COMMUNICATOR, act_stat_kbn AS ACTION_STATE_KBN FROM f_rcv_mail_h ";
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/01 jst-tomii
  		$sql .=" WHERE act_mail_seq = " . getSqlValue($mailTraceId);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku

		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}
	//HuyDV 2018/06/04 end
	//'---ご意見・ご相談ステータスチェック---
	if ($typ == "voice") {
	    $wk_cvid=$_REQUEST['cvid'];
		$wkCode=$_REQUEST['cd']; // LW: 会員番号検索した際にhiddenに設定されるkainno
		$wkTel=$_REQUEST["tel"];
		$wkSendDt=$_REQUEST['sdt']; // LW: send_date。report/voice_report.aspで設定される、CUSTOMERSVOICEテーブルのSEND_DT。
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		/*
		$sql = "SELECT Communicator, Status FROM CustomerVoice_Tbl ";
		//$sql .= "WHERE regist_dt=TO_DATE(".getSqlValue($wkSendDt).", 'yyyymmddhh24miss') AND kainno=".getSqlValue($wkCode)." AND tel_no=".getSqlValue(ssk_encrypt($wkTel));
		$sql .=" WHERE cvoice_id = " . getSqlValue($wk_cvid);
		*/
		$sql = "SELECT responder AS Communicator, stat_kbn  AS Status FROM f_opinion_consul ";
  		$sql .=" WHERE voice_consul_seq = " . getSqlValue($wk_cvid);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku

		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}

	//'---manzoku@ステータスチェック---
	if ($typ == "manzoku") {
		$wkMailDate=$_REQUEST['dt'];
		$wkFromAddress=$_REQUEST['fa'];
		$sql = "SELECT Communicator,Status FROM RecvMail_Tbl ";
		$sql .= "WHERE MailDate=".getSqlValue($wkMailDate)." AND FromAddress=".getSqlValue($wkFromAddress);
		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}

	//'---お礼メールステータスチェック---
	if ($typ == "orei") {
		$wkOrderId=$_REQUEST['econorderid'];
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		/*
		$sql = "SELECT Communicator,Status FROM RecvOrder_Tbl ";
		$sql .= "WHERE recv_order_id=".getSqlValue($wkOrderId);
		*/
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/01 jst-tomii
		//$sql = "SELECT responder AS Communicator,stat_kbn  AS Status FROM f_odr ";
		$sql = "SELECT responder AS Communicator,stat_kbn  AS Status FROM f_odr_h ";
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/01 jst-tomii
  		$sql .= "WHERE odr_seq=".getSqlValue($wkOrderId);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}

	//'---ドレス用お礼メールステータスチェック---
	if ($typ == "dress") {
		$wkOrderId=$_REQUEST['econorderid'];
		$sql = "SELECT Communicator,Status FROM DirectOrder_Tbl ";
		$sql .= "WHERE direct_order_id=".getSqlValue($wkOrderId);
		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}

	//▼2011/07/13 A-05761 飲むドモ対応（通常販売）（ec-one tazoe）
	//'---飲むドモ(直販)用お礼メールステータスチェック---
	if ($typ == "drink") {
		$wkOrderId=$_REQUEST['econorderid'];
		$sql = "SELECT Communicator,Status FROM DrinkDirectOrder_Tbl ";
		$sql .= "WHERE direct_order_id=".getSqlValue($wkOrderId);
		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}

	//'---飲むドモ(定期)用お礼メールステータスチェック---
	if ($typ == "drink_regular") {
		$wkOrderId=$_REQUEST['econorderid'];
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		/*
		$sql = "SELECT Communicator,Status FROM RegularOrder_Tbl ";
		$sql .= "WHERE regular_order_id=".getSqlValue($wkOrderId);
		*/
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/01 jst-tomii
		//$sql = "SELECT responder AS Communicator,stat_kbn  AS Status FROM f_regular_buy_odr_info_record ";
		$sql = "SELECT responder AS Communicator,stat_kbn  AS Status FROM f_regular_buy_odr_info_record_h ";
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/01 jst-tomii
  		$sql .= "WHERE regular_buy_odr_seq=".getSqlValue($wkOrderId);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}
	//▲2011/07/13 A-05761 飲むドモ対応（通常販売）（ec-one tazoe）

// 20071031 対応テーブルが無いが、結局KaiinMailSend_Tblからctrlnoカラムが無くなったため、固定値にしている
	//'---管理Ｎｏ取得---
	$now_str = date('YmdHis', $now);
	$wk_date = date('Ymd', $now); // YMD（ASP:Date）
// 	rs.Open cmdTemp, , adOpenKeyset, adLockPessimistic
// ロックを使用しているため、FOR UPDATEを付けた
// 	$sql = "SELECT * from KaiinMailCtrlNo_Tbl Where SendDate = TO_DATE??".getSqlValue($wk_date)." FOR UPDATE";
// 	$result = dbQuery($con_utl, $sql, true);
// 	$rows = getNumRows($result, $arr_utl);
// 	if ($rows == 0) {
		$wk_ctrlno = 1;
// 		$sql = "INSERT INTO KaiinMailCtrlNo_Tbl (SEND_DATE, CTRL_NO) VALUES (".getSqlValue($wk_date).", 1)";
// 		$result = dbQuery($con_utl, $sql, true);
// 	} else {
// 		$row = dbFetchRow($result, 0, $arr_utl);
// 		$wk_ctrlno = $row['CTRL_NO'] + 1;
// 		$sql = "UPDATE KaiinMailCtrlNo_Tbl SET CTRL_NO = ".getSqlValueNum($wk_ctrlno)." WHERE SendDate = ".getSqlValue($wk_date)." FOR UPDATE";
// 		$result = dbQuery($con_utl, $sql, true);
// 	}
// 	dbCommit($con_utl);

	// ASP：一括メール送信のみ、ここで最後の置換
	if ($my_func == '1013') {
		$mlBody = str_replace('＃＃＃＃＃', trim($mlName), $mlBody);
		$mlBody = str_replace('＠＠＠＠＠＠＠＠', $KaiinCD, $mlBody);
		$mlBody = str_replace('■■■■■■■■', trim($mlTo), $mlBody);
		$mlBody = str_replace('@@MAILCD@@', trim($mail_cd), $mlBody);
		$mlBody = str_replace('@NAME', trim($mlName), $mlBody);
		$mlBody = str_replace('＠ＮＡＭＥ', trim($mlName), $mlBody);
		$mlBody = str_replace('@KAIINNO', trim($KaiinCD), $mlBody);
		$mlBody = str_replace('＠ＫＡＩＩＮＮＯ', trim($KaiinCD), $mlBody);
		// ▼R-#38373_【H31-0049-042】【WEB管理ツール】担当者名の自動入力について 2020/09/11 saisys-kiyota
		$mlBody = str_replace('＠ＣＯＭＮＡＭＥ', $comm_title."　".trim($S_USERNAME), $mlBody);
		// ▲R-#38373_【H31-0049-042】【WEB管理ツール】担当者名の自動入力について 2020/09/11 saisys-kiyota
		$mlBody = str_replace('＠ＭＡＩＬＣＯＤＥ', trim($mail_cd), $mlBody); // add by LW
		$mlBody = str_replace('＠ＭＡＩＬ', trim($mlTo), $mlBody);
		// ▼R-#37426_【H31-0174-015】 NETのお客様で意志をもって対応したいお客様の管理システム構築 2020/07/07 cyc-hatano
		$mlBody = str_replace("@aiko@", $Aiko, $mlBody);
		$mlBody = str_replace("@AIKO@", $Aiko, $mlBody);
		$mlBody = str_replace("＠ａｉｋｏ＠", $Aiko, $mlBody);
		$mlBody = str_replace("＠ＡＩＫＯ＠", $Aiko, $mlBody);
		// ▲R-#37426_【H31-0174-015】 NETのお客様で意志をもって対応したいお客様の管理システム構築 2020/07/07 cyc-hatano
		// ▼R-#38373_【H31-0049-042】【WEB管理ツール】担当者名の自動入力について 2020/09/11 saisys-kiyota
		$mlBody = str_replace('＠ＣＯＭＳＥＩＭＥＩ', trim($S_USERNAME), $mlBody);
		if(mb_substr_count($mlBody,'＠ＣＯＭＭＹＯＵＪＩ') >= 1 ) {
			$str_tanto = $S_USERNAME;
			$str_tanto = spaceCnv($str_tanto);
			$mlBody = str_replace('＠ＣＯＭＭＹＯＵＪＩ', trim($str_tanto), $mlBody);
		}
		if(mb_substr_count($mlBody,'＠ＭＹＯＵＪＩ') >= 1 ) {
			$str_name = $mlName;
			$str_name = spaceCnv($str_name);
			$mlBody = str_replace('＠ＭＹＯＵＪＩ', trim($str_name), $mlBody);
		}
		// ▲R-#38373_【H31-0049-042】【WEB管理ツール】担当者名の自動入力について 2020/09/11 saisys-kiyota
	}

/** 改行がちゃんと入っていても、定期的に改行を入れてしまうのでコメントアウト
	$setmlBody = '';
	$charcnt = 400;

	for ($loopCnt = 0; $loopCnt < (mb_strlen($mlBody)/$charcnt); $loopCnt++) {

		$tmp = mb_substr($mlBody,$loopCnt*$charcnt,$charcnt) ;
		if(mb_strlen($tmp) < $charcnt){
			$setmlBody .= $tmp;
		}else{
			$setmlBody .= $tmp.$crlf;
		}
	}

	$mlBody = $setmlBody;
*/

	//'---送信履歴更新---
	$MailDate = substr($wk_date, 0, 8); // YMD
	$MailTime = date('Hi', $now);
	$strTimeSec = date('s', $now);

	// strSQL = "INSERT INTO " & DistTbl & "(RequestDate,RequestTime,KaiinCD,SendDate,SendTime,MailCD,MailAddress,MailText,ErrFlg,TantoCD,TaiouText,TaiouText2,CtrlNo) "
	//▼R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
    $sql  = "";
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	/*
    $sql .= " INSERT INTO KaiinMailSend_Tbl ( "; // 個別対応メール送信履歴テーブル
    $sql .= "   request_dt";       // 送信日時
    $sql .= "  ,kainno";           // 会員番号
    $sql .= "  ,send_dt";          // 送信日時
    $sql .= "  ,mail_cd";          // メールコード
    $sql .= "  ,email";            // メールアドレス
    $sql .= "  ,mail_body";        // メール本文
    $sql .= "  ,error_flg";        // エラーフラグ
    $sql .= "  ,tanto_cd";         // コミュニケータコード
    $sql .= "  ,TAIOUMEMO";        // 対応メモ
    $sql .= "  ,update_dt";        // 更新日
    $sql .= "  ,regist_dt";        // 登録日
    $sql .= "  ,update_user";      // 最終更新者
    $sql .= "  ,regist_user";      // 登録者
    $sql .= "  ,KAIINMAILSEND_CD"; // 会員メール送信コード
    // ▼R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
    $sql .= "  ,MESSAGE_ID";       // メッセージID
    // ▲R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
    $sql .= " ) ";
    //▲R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
	$sql .= " VALUES(";
	$values = array(); // need
// 	$values[] = 'TO_DATE('.getSqlValue($MailDate.$MailTime.'00').", 'yyyymmddhh24miss')";
	$values[] = 'TO_DATE('.getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss')";
	$values[] = getSqlValue($KaiinCD);
// 	$values[] = 'TO_DATE('.getSqlValue($MailDate.$MailTime.'00').", 'yyyymmddhh24miss')";
	$values[] = 'TO_DATE('.getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss')";
	$values[] = getSqlValue($mail_cd);
	$values[] = getSqlValue(ssk_encrypt($mlTo));
//	$values[] = getSqlValue(substr("Subject： ".$mlSubject.$crlf.$crlf.$mlBody, 0, 3000));
	// CLOBへの代入に対応
	$values[] = ':MailBodyData';
	//$values[] = ':mlBody';
	$values[] = '0';
	$values[] = getSqlValue($S_USERID);

    $values[] = getSqlValue($memo);

	$values[] = 'sysdate';
	$values[] = 'sysdate';
	$values[] = getSqlValue('Tool:'.$S_USERID);
	$values[] = getSqlValue('Tool:'.$S_USERID);
	//▼R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
	if (!$_REQUEST['MDCD'] && $my_func != '1013') {
		// 新規レコードの場合は新規下書きメールコード生成
		$_REQUEST['MDCD'] = getMailDraftCD();
	}
	$values[] = getSqlValue($_REQUEST['MDCD']);
    //▲R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
    // ▼R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
    // MessageIdを取得
    $messageId = createMessageId($_REQUEST['MDCD']);
	$values[] = getSqlValue($messageId);
    // ▲R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
	$sql .= implode(', ', $values).')';
	*/
	$sql .= " INSERT INTO f_indiv_act_mail_send ( "; // 個別対応メール送信履歴テーブル
    $sql .= "   req_dt_tm";       // 送信日時
    $sql .= "  ,cust_no";           // 会員番号
    $sql .= "  ,send_dt_tm";          // 送信日時
    $sql .= "  ,mail_cd";          // メールコード
    $sql .= "  ,mail_adr";            // メールアドレス
    $sql .= "  ,mail_body_letter";        // メール本文
    $sql .= "  ,err_flg";        // エラーフラグ
    $sql .= "  ,user_cd";         // コミュニケータコード
    $sql .= "  ,act_memo";        // 対応メモ
    $sql .= "  ,update_date";        // 更新日
    $sql .= "  ,register_date";        // 登録日
    $sql .= "  ,update_user_cd";      // 最終更新者
    $sql .= "  ,register_user_cd";      // 登録者
    $sql .= "  ,indiv_act_mail_send_hist_cd"; // 会員メール送信コード
    $sql .= "  ,msg_cd";       // メッセージID
    $sql .= " ) ";

	$sql .= " VALUES(";
	$values = array(); 

	$values[] = 'TO_TIMESTAMP('.getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss')";
	$values[] = getSqlValue($KaiinCD);

	$values[] = 'TO_TIMESTAMP('.getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss')";
	$values[] = getSqlValue($mail_cd);
	$values[] = getSqlValue($mlTo);

	$values[] = ':MailBodyData';

	$values[] = '0';
	$values[] = getSqlValue($S_USERID);

	$values[] = getSqlValue($memo);

	$values[] = 'current_timestamp(0)';
	$values[] = 'current_timestamp(0)';
	$values[] = getSqlValue('Tool:'.$S_USERID);
	$values[] = getSqlValue('Tool:'.$S_USERID);

	if (!$_REQUEST['MDCD'] && $my_func != '1013') {

		$_REQUEST['MDCD'] = getMailDraftCD();
	}
	$values[] = getSqlValue($_REQUEST['MDCD']);

	$messageId = createMessageId($_REQUEST['MDCD']);
	$values[] = getSqlValue($messageId);

	$sql .= implode(', ', $values).')';
 // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	//$result = dbQuery($con_utl, $sql, true);
	// CLOBへの代入に対応
	logSql($sql);
	$stmt = OCIParse($con_utl, $sql);
	if ($stmt !== FALSE) {
		//$clob = oci_new_descriptor($con_utl, OCI_D_LOB);
		$clob = ocinewdescriptor($con_utl, OCI_D_LOB);
		//$result = oci_bind_by_name($stmt, ':MailBodyData', $clob, -1, OCI_B_CLOB);
		$result = ocibindbyname($stmt, ':MailBodyData', $clob, -1, OCI_B_CLOB);
		if ($result !== FALSE) {
//▼R-#4884 WEB管理ツールのIE8不具合 2012/07/17 uls-soga
			$mail_body_data = "Subject： ".$mlSubject.$crlf.$crlf.$mlBody;
//▲R-#4884 WEB管理ツールのIE8不具合 2012/07/17 uls-soga
			$clob->writeTemporary($mail_body_data);
			$result = OCIExecute($stmt, OCI_DEFAULT);
			if ($result === FALSE) {
				dbRollback($con_utl);
			}
			$clob->close();
			$clob->free();
		} else {
			dbRollback($con_utl);
		}
	} else {
		dbRollback($con_utl);
	}
	// 下の方でdbFreeResult()されるのを避けるために初期化する
	$result2 = true;

	//$result = ssk_db_parse($con_utl, $sql);
	//ssk_db_bind_by_name($result, ':mlBody', "Subject： ".$mlSubject.$crlf.$crlf.$mlBody, -1);
	//ssk_db_execute($result);

	$another_flg = false;
	//'---コンビニ受取りステータス更新---
	if ($status != "") {

        //▼2010/06/23 メール送信（メール実績）の不具合対応（kdl yoshii）
        //$sql = "UPDATE ordereconinfo_tbl set mail_send_flg = ".getSqlValue($status).", update_dt = sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID)." where EconOrder_ID = ".getSqlValue($_REQUEST['econorderid']);
        $sql  = "UPDATE ordereconinfo_tbl set mail_send_flg = ".getSqlValue($status).", update_dt = sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
        $sql .= " where EconOrder_ID = (select ECONORDER_ID  from recvorder_tbl  where RECV_ORDER_ID =".getSqlValue($_REQUEST['econorderid']).")";
        //▲2010/06/23 メール送信（メール実績）の不具合対応（kdl yoshii）

		$result2 = dbQuery($con_utl, $sql, true);
		$another_flg = true;
	}

	//'---ご意見・ご相談ステータス更新---
	if ($typ == "voice") {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		/*
		$sql = "UPDATE CustomerVoice_Tbl SET status=9, ctrlno=".getSqlValueNum($wk_ctrlno).",return_dt=TO_DATE(".getSqlValue($now_str).", 'yyyymmddhh24miss'),update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		// ASPでは、SendDtの所、'の後にスペースがあるが正しい？
// 		strSQL = strSQL & "WHERE SendDt=' " & ToGetEscapeSql(wkSendDt) & "' AND Code='" & ToGetEscapeSql(wkCode) & "' AND Tel='" & ToGetEscapeSql(wkTel) & "'"
//		$sql .= " WHERE regist_dt=TO_DATE(".getSqlValue($wkSendDt).",'yyyymmddhh24miss') AND kainno=".getSqlValue($wkCode)." AND tel_no=".getSqlValue(ssk_encrypt($wkTel));
		$sql .=" WHERE cvoice_id = " . getSqlValue($wk_cvid);
		$result2 = dbQuery($con_utl, $sql, true);
		*/
		$sql = "UPDATE f_opinion_consul SET stat_kbn='9', ans_mail_ctrl_no=".getSqlValueNum($wk_ctrlno).",ans_dt=TO_TIMESTAMP(".getSqlValue($now_str).", 'yyyymmddhh24miss'),update_date=current_timestamp(0), update_user_cd = ".getSqlValue('Tool:'.$S_USERID);
  		$sql .=" WHERE voice_consul_seq = " . getSqlValue($wk_cvid);
		$result2 = dbQuery($con_utl, $sql);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		$another_flg = true;
	}

	//'---注文お礼メール---
	if ($typ == "orei") {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		/*
		$sql = "UPDATE recvorder_tbl SET mail_flg = 2, status=9, sync_flg = 0, mail_send_dt = to_date(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		$sql .= " WHERE recv_order_id=".getSqlValue($_REQUEST['econorderid'])." AND order_status=2";
		$result2 = dbQuery($con_utl, $sql, true);
		*/
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/01 jst-tomii
		//$sql = "UPDATE f_odr SET ship_mail_send_kbn = '2', stat_kbn=9, sync_flg = '0', thank_mail_send_dt = to_timestamp(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), thank_mail_ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_date = current_timestamp(0), update_user_cd = ".getSqlValue('Tool:'.$S_USERID);
		$sql = "UPDATE f_odr_h SET ship_mail_send_kbn = '2', stat_kbn=9, sync_flg = '0', thank_mail_send_dt = to_timestamp(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), thank_mail_ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_date = current_timestamp(0), update_user_cd = ".getSqlValue('Tool:'.$S_USERID);
  		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/01 jst-tomii
		$sql .= " WHERE odr_seq=".getSqlValue($_REQUEST['econorderid'])." AND odr_stat_kbn='2'";
		$result2 = dbQuery($con_utl, $sql);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		$another_flg = true;
	}

	//'---ドレス注文お礼メール---
	if ($typ == "dress") {
		$sql = "UPDATE directorder_tbl SET mail_flg = 2, status=9, sync_flg = 0, mail_send_dt = to_date(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		$sql .= " WHERE direct_order_id=".getSqlValue($_REQUEST['econorderid'])." AND order_status=2";
		$result2 = dbQuery($con_utl, $sql, true);
		$another_flg = true;
	}

	//▼2011/07/13 A-05761 飲むドモ対応（通常販売）（ec-one tazoe）
	//'---飲むドモ(直販)注文お礼メール---
	if ($typ == "drink") {
		$sql = "UPDATE DrinkDirectOrder_Tbl SET mail_flg = 2, status=9, sync_flg = 0, mail_send_dt = to_date(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		$sql .= " WHERE direct_order_id=".getSqlValue($_REQUEST['econorderid'])." AND order_status=2";
		$result2 = dbQuery($con_utl, $sql, true);
		$another_flg = true;
	}

	//'---飲むドモ(定期)注文お礼メール---
	if ($typ == "drink_regular") {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		/*
		$sql = "UPDATE RegularOrder_Tbl SET mail_flg = 2, status=9, sync_flg = 0, mail_send_dt = to_date(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		$sql .= " WHERE regular_order_id=".getSqlValue($_REQUEST['econorderid'])." AND order_status=2";
		$result2 = dbQuery($con_utl, $sql, true);
		*/
		$sql = "UPDATE f_regular_buy_odr_info_record SET ship_mail_send_kbn = '2', stat_kbn=9, sync_flg = '0', thank_mail_send_dt = to_timestamp(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), thank_mail_ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_date = current_timestamp(0), update_user_cd = ".getSqlValue('Tool:'.$S_USERID);
  		$sql .= " WHERE regular_buy_odr_seq=".getSqlValue($_REQUEST['econorderid'])." AND odr_stat_kbn = '2'";
		$result2 = dbQuery($con_utl, $sql);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		$another_flg = true;
	}
	//▲2011/07/13 A-05761 飲むドモ対応（通常販売）（ec-one tazoe）

	//'2005/2/3  会員個別メールを送信したときに会員CDが合致すれば、SampleMail_TBLのStatusFLGを4として更新
// 20071031: 対応テーブルが無い
// 	$sql = "Update SampleMail_Tbl SET StatusFLG=4 Where KaiinCD = ".getSqlValue($KaiinCD);
// 	$result = dbQuery($con_utl, $sql, true);


    //▼#1238 メール送信機能全てから、アドバイスページ作成を可能に 2010/08/11 kdl-uchida
	//'---送信したメールに対応するアドバイスページ---
    if(isset($_SESSION['2010advice']['cvoice_id']) && !is_null($_SESSION['2010advice']['cvoice_id'])){
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		/*
		$sql = "UPDATE AdviceHtml_Tbl SET Send_Dt = to_date(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		$sql .= " WHERE CVOICE_ID = '" . getSqlValueNum($_SESSION['2010advice']['cvoice_id']) . "'";
        $sql .= " and   GYOUMUKBN = '" . getSqlValueNum($_SESSION['MGMKBN']) . "'";
		$result2 = dbQuery($con_utl, $sql, true);
		*/
		$sql = "UPDATE f_advice_html SET mail_send_dt = to_timestamp(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), update_date = current_timestamp(0), update_user_cd = ".getSqlValue('Tool:'.$S_USERID);
  		$sql .= " WHERE voice_consul_cd = '" . getSqlValueNum($_SESSION['2010advice']['cvoice_id']) . "'";
        $sql .= " and   bs_kbn = '" . getSqlValueNum($_SESSION['MGMKBN']) . "'";
		$result2 = dbQuery($con_utl, $sql);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	}



	//'---メール送信---
	$to_email = $mlTo;
	$to_name = '';
	if ($mlName != '')
		$to_name = $mlName."　様";

	$opt_header = "X-SaishunkanID:".$mlTo.",".$wk_ctrlno.",".$MailDate;

	//if ($typ == "orei" && $intSendMailFLG == 1) {

//Mod start 2008/07/02 個別メール送信エラーの対応 -----------
//注文お礼メールから個別メールを送信した場合、send_mailが実行されないためメールが送信されていなかったことの対応
//	if ($typ == "orei") {
//	} else {
		if ($result != false and $result2 != false) {
//	 		$opt_header .= "Cc: ".mb_encode_mimeheader(mb_convert_encoding('CC先', "ISO-2022-JP"), "ISO-2022-JP").'<a@a>'."\r\n";
			// ▼R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
 			$mail_result = send_mail($mlFrom, $to_email, $to_name, $mlSubject, $mlBody, $opt_header, null, null, null, null, $messageId);
			// ▲R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
//▲R-#4884 WEB管理ツールのIE8不具合 2012/07/17 uls-soga
		}
//	}
//Mod ens 2008/07/02 ----------------------------------------

	if ($result == false or $result2 == false) {
		dbRollback($con_utl);
		$wk_title = 'DB更新失敗';
		$wk_msg = 'データベースの更新に失敗';
	}
	elseif ($mail_result == false) {
		dbRollback($con_utl);
		$mail_send_error = true;
		$wk_title = ' ';
		$wk_msg = ' ';
		logDebug('Mail Send Error $my_func:'.$my_func.' $S_USERID:'.$S_USERID.' $KaiinCD:'.$KaiinCD);
	}
	else {
		dbCommit($con_utl);
	}

	if ($result2 != true) {
		dbFreeResult($result);
	}
	$result = null;

    // ▼R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
    // 会員番号が指定されている場合のみコンタクト内容一覧取得
    if (intval($KaiinCD) > 0) {
       $contactList = getContactList($con_utl, $KaiinCD, $inquiry_kbn_list, $inquiry_type_list);
       
       // 選択したコンタクト内容に送信メールコードを設定
       for($idxContact = 0; $idxContact < count($contactList); $idxContact++) {
           $contact = $contactList[$idxContact];
           $replayMailTraceId = $contact["MAIL_TRACE_ID"];
           if(array_key_exists('replyMailTarget_' . $replayMailTraceId, $_REQUEST)){
               if (getHtmlEscapedString($_REQUEST['replyMailTarget_' . $replayMailTraceId]) != "off") {
                   // メールの場合
                   if ($contact["CONTACT_TYPE"] == 'MAIL') {
                       // 受信メールに送信メールコードを設定
                       updateSendMailCdToTraceMail($con_utl, $replayMailTraceId, $_REQUEST['MDCD'], $S_USERID);
                       
                       // 問い合わせを対応済みに設定
                       if ($contact["CVOICE_ID"]) {
                           updateComplateCVoice($con_utl, $contact["CVOICE_ID"], $S_USERID);
                       }
                   }
                   // 注文の場合
                   else if ($contact["CONTACT_TYPE"] == 'ORDER') {
                       // 注文に対して対応済みを設定
                       updateComplateOrder($con_utl, $replayMailTraceId, $S_USERID);
                   }
               }
           }
       }
    }

    // メール件名・本文に特定文言が存在する場合は送信情報レコード追加
    insertMailSendInfo($con_utl, $_REQUEST['MDCD'], $mlSubject, $mlBody, $S_USERID);
    // ▲R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa

	dbClose($con_utl);
	$con_utl = null;
}
if ($result != null && $result != false)
	dbFreeResult($result);
if ($con_utl != null)
	dbClose($con_utl);

// ▼【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 2018/05/24 HuyDV
function updateMailTrace($con, $mailTraceId){
	logDebug("MAILTRACE_TBL_update[start] ");
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	// $sql = "Update MAILTRACE_TBL set ACTION_STATE_KBN=1 where MAIL_TRACE_ID='".$mailTraceId."'";
	$sql = "Update f_act_mail set act_stat_kbn='1' where act_mail_seq='".$mailTraceId."'";
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	logDebug("sql=".$sql);
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/06/04 jst-haku
	/* $result = ssk_db_parse($con, $sql);
	
	if(!$result) {
		dbFreeResult($result);
		dbClose($con);
		return false;
	}
	*/
	$result = $con->prepare($sql)->execute();
	if(!$result) {
		unset($con);
		return false;
	}
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/06/04 jst-haku
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	// $result = dbQuery($con, $sql,true);
	$result = dbQuery($con, $sql);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	if(!$result) {
		dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}
	logDebug("result=".print_r($result,1));
	dbCommit($con);
	dbFreeResult($result);
	dbClose($con);
	logDebug("MAILTRACE_TBL_update[end] ");
	return true;
}
// ▲【H30-00097-01】お客様対応メール管理(WEB管理ツール内)仕様改定 2018/05/24 HuyDV
function checkStatus($con_utl, $sql, &$wk_title, &$wk_msg) {
	global $S_USERID;
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	/*
	$result = dbQuery($con_utl, $sql, true);
	$rows = getNumRows($result, $arr_utl);
	*/
	$result = dbQuery($con_utl, $sql);
	$rows = getNumRows($result);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	if ($rows == 0) {
		$wk_title = "※エラー※";
		$wk_msg = "レコードが存在しません。";
		return;
	} else {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		// $row = dbFetchRow($result, 0, $arr_utl);
		$row = dbFetchRow($result, 0);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
		if ($row['COMMUNICATOR'] != trim($S_USERID)) {
			$wk_title = "※エラー※";
			$wk_msg = "他のお客様プリーザーが対応しています。";
			return;
		//HuyDV 2018/06/04 start
		} else if (isset($row['STATUS'])) {
			if ($row['STATUS'] != 1) {
				$wk_title = "※エラー※";
				$wk_msg = "対応が完了しているかステータスの変更が行われています。";
				return;
			}
		} else if (isset($row['ACTION_STATE_KBN'])) {
			if ($row['ACTION_STATE_KBN'] == 1) {
				$wk_title = "※エラー※";
				$wk_msg = "対応が完了しているかステータスの変更が行われています";
				return;
			}
		}
		//HuyDV 2018/06/04 end
	}
	return $result;
}

function send_denbun($KaiinCD, $TelNOX, $MailAddress, $MailDate, $MailTime, $MailCD, $MemoStr, $MemoStr2) {
	//▼2013/08/05 R-#10660_【管理ツール】対応歴メモに「機種依存文字」を入力するとA930電文エラーが発生(ulsystems hatano)
    global $S_USERID, $KANRI_MAIL_KBN;
	$con = dbConnect();
	//▲2013/08/05 R-#10660_【管理ツール】対応歴メモに「機種依存文字」を入力するとA930電文エラーが発生(ulsystems hatano)

	$KaiinCD = fncDenbunFormat($KaiinCD, 8, 1);
	$TelNOX = fncDenbunFormat(trim($TelNOX), 13, 0); // ASPでは、ここは常に空の様
// 	$MailAddress = fncDenbunFormat(trim($MailAddress), 48, 0);
	$MailDate = fncDenbunFormat($MailDate, 8, 1);
	$MailTime = fncDenbunFormat($MailTime, 4, 1);
	$MailCD = fncDenbunFormat($MailCD, 4, 1);
    //▼2011/03/07 #16 対応歴メモ修正対応(A-4003)(EC-One hatano)
    /*
	$MemoStr = fncDenbunFormat($MemoStr, 60, 0);
	$MemoStr2 = fncDenbunFormat($MemoStr2, 60, 0);

	$i = 0;
	$denbun_data = array();
	$denbun_data[$i++] = $KaiinCD;
	$denbun_data[$i++] = $TelNOX;
// 	$denbun_data[$i++] = $MailAddress;
	$denbun_data[$i++] = $MailDate;
	$denbun_data[$i++] = $MailTime;
	$denbun_data[$i++] = $MailCD;
	$denbun_data[$i++] = $MemoStr;
	$denbun_data[$i++] = '0';

	$denbun_msg = array();
 	$ret = fncDenbunNXCOM('A930', $denbun_data, $denbun_msg); // A410 → A930
// ASPではノーチェック
// 	if ($ret !== 0) {
// 		$comp_msg = 'A930電文に失敗しました。';
// 	} else {
// 		$comp_msg = 'A930電文を発行しました。';
// 	}

	//'対応メモ２
	if (trim($MemoStr2) != '') {
		$i = 0;
		$denbun_data = array();
		$denbun_data[$i++] = $KaiinCD;
		$denbun_data[$i++] = $TelNOX;
// 		$denbun_data[$i++] = $MailAddress;
		$denbun_data[$i++] = $MailDate;
		$denbun_data[$i++] = $MailTime;
		$denbun_data[$i++] = $MailCD;
		$denbun_data[$i++] = $MemoStr2;
		$denbun_data[$i++] = '0';
		$ret = fncDenbunNXCOM('A930', $denbun_data, $denbun_msg); // A410 → A930
// ASPではノーチェック
// 		if ($ret !== 0) {
// 			$comp_msg = 'A930電文に失敗しました。';
// 		} else {
// 			$comp_msg = 'A930電文を発行しました。';
// 		}
	}
    */
    $UserID  = fncDenbunFormat($S_USERID, 5, 0);    //担当者コード
    $MailAddress = fncDenbunFormat($MailAddress, 100, 0);//メールアドレス
    $MemoStr = fncDenbunFormat($MemoStr, 400, 0);    //対応メモ

    $i = 0;
	$denbun_data = array();
	$denbun_data[$i++] = $KaiinCD;
	//$denbun_data[$i++] = $TelNOX;
	$denbun_data[$i++] = $MailDate;
	$denbun_data[$i++] = $MailTime;
	$denbun_data[$i++] = $UserID;     //担当者コード
    $denbun_data[$i++] = $MailAddress;
    $denbun_data[$i++] = "10";        //チャネル区分１
    $denbun_data[$i++] = "50";        //チャネル区分１
    $denbun_data[$i++] = fncDenbunFormat("", 2, 0);
    $denbun_data[$i++] = fncDenbunFormat("", 2, 0);
	$denbun_data[$i++] = $MemoStr;

    $denbun_msg = array();
 	$ret = fncDenbunNXCOM('A930', $denbun_data, $denbun_msg);
    //▲2011/03/07 #16 対応歴メモ修正対応(A-4003)(EC-One hatano)

	//▼2013/08/05 R-#10660_【管理ツール】対応歴メモに「機種依存文字」を入力するとA930電文エラーが発生(ulsystems hatano)
	if ($ret != "0") {
		$error_mail_subject = "【確認要】対応歴メモ電文のWAO連携処理失敗";
		$error_mail_body  = "対応歴メモ電文(A930)のWAO連携処理に失敗しました。\n";
		$error_mail_body .= "\n";
		$error_mail_body .= "会員番号：" . $KaiinCD . "\n";
		$error_mail_body .= "送信日時：" . date('Y-m-d',strtotime($MailDate)) . " " . substr($MailTime, 0, 2) . ":" . substr($MailTime, 2, 2) . "\n";
		$error_mail_body .= "担当者CD：" . $S_USERID . "\n";
		$error_mail_body .= "メールアドレス：" . $MailAddress . "\n";
		$error_mail_body .= "対応歴メモ：" . $MemoStr . "\n";
		fncGetKanriMail($con, $KANRI_MAIL_KBN['MEMO'], $error_mail_subject, $error_mail_body);
	}
	dbClose($con);
	//▲2013/08/05 R-#10660_【管理ツール】対応歴メモに「機種依存文字」を入力するとA930電文エラーが発生(ulsystems hatano)
}

/* ~/include/lib/common.inc.phpに移動
function send_mail($from, $to_email, $to_name, $subject, $body, $opt_header) {
// 	mb_language("ja"); // need?

	$headers  = "MIME-Version: 1.0\r\n" ;
	$idx = mb_strpos($from, '<');
	if ($idx !== false) {
		$headers .= "From: ".mb_encode_mimeheader(mb_convert_encoding(mb_substr($from, 0, $idx), "ISO-2022-JP"), "ISO-2022-JP").mb_substr($from, $idx)."\r\n";
	} else {
		$headers .= "From: ".$from."\r\n";
	}
	if (mb_strpos($from, 'privacy') !== false) {
		$refrom = "privacy@saishunkan.co.jp";
	} elseif (mb_strpos($from, 'manzoku') !== false) {
		$refrom = "manzoku@saishunkan.co.jp";
	} else {
		$refrom = "news@saishunkan.co.jp";
	}
logDebug("Return-Path: ".$refrom."\r\n");
	$headers .= "Envelope From: ".$refrom."\r\n";
	$headers .= "Return-Path: ".$refrom."\r\n";
	$headers .= "Content-Type: text/plain;charset=\"ISO-2022-JP\"\r\n";
	$headers .= "Content-Transfer-Encoding: 7bit\r\n";
	$headers .= $opt_header;

	if ($to_name == '') {
		$to = $to_email;
	} else {
		$to = mb_encode_mimeheader(mb_convert_encoding($to_name, "ISO-2022-JP"), "ISO-2022-JP")
			." <".$to_email.">\r\n";
	}

	// mb_encoding_mimeheaderはunfoldingする位置に難があるので、その処理をこちらで行う
	$string = mb_convert_encoding($subject, 'ISO-2022-JP');
	$subject = '';
	$split = 40;
	$add_string = '';
	while ($string !== FALSE && $string !== '') {
		$output = mb_strcut($string, 0, $split, 'ISO-2022-JP');
		$subject .= $add_string . mb_encode_mimeheader($output, 'ISO-2022-JP', 'B');
		$add_string = "\r\n ";
		$string = mb_substr($string, mb_strlen($output, 'ISO-2022-JP'), mb_strlen($string, 'ISO-2022-JP'), 'ISO-2022-JP');
	}

	// 1行で1024byte以上あると途中で改行を入れるMTAがあり、文字化けすることがあるので
	// 適当なところで強制的に改行を入れる
	$body = mb_convert_encoding($body, "ISO-2022-JP");
	$string = $body;
	$body = '';
	$split = 500;
	while ($string !== FALSE) {
		if (($line_width = strpos($string, "\n")) === FALSE) {
			$line_width = strlen($string);
		} else {
			// 改行コードまでを1行に含める
			$line_width++;
		}
		if ($line_width > $split) {
			// 長すぎるので途中で改行を入れる
			$this_line = substr($string, 0, $line_width);
			while (1) {
				$output = mb_strcut($this_line, 0, $split, 'ISO-2022-JP');
				$body .= $output;
				$this_line = mb_substr($this_line, mb_strlen($output, 'ISO-2022-JP'), mb_strlen($this_line, 'ISO-2022-JP'), 'ISO-2022-JP');
				if ($this_line === FALSE || $this_line === '') {
					break;
				} else {
					$body .= "\n";
				}
			}
		} else {
			$body .= substr($string, 0, $line_width);
		}
		$string = substr($string, $line_width);
	}

 	$result = mail($to, $subject, $body, $headers);
	return $result;
}
*/

// ▼R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
/**
 * 指定された受信メールに送信コードを設定
 * @param string $con_utl DB接続情報
 * @param string $mailTraceId 受信メールID
 * @param string $sendMailCd  送信メールコード
 * @param string $userId      ユーザーID
 */
function updateSendMailCdToTraceMail($con_utl, $mailTraceId, $sendMailCd, $userId) {
	logDebug("updateSendMailCdToTraceMail:Start sendMailCd = " . $sendMailCd . " mailTraceId = " . $mailTraceId);
	$sql  = "";
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	/*
	$sql .= " UPDATE";
	$sql .= "   MAILTRACE_TBL";
	$sql .= " SET";
	$sql .= "   REPLY_KAIINMAILSEND_CD = " . getSqlValue($sendMailCd);
	$sql .= "  ,ACTION_STATE_KBN       = 1";  // 1:対応済み
	$sql .= "  ,COMMUNICATOR           = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   MAIL_TRACE_ID = " . getSqlValue($mailTraceId);

	$result = dbQuery($con_utl, $sql,true);
	*/
	$sql .= " UPDATE";
	$sql .= "   f_act_mail";
	$sql .= " SET";
	$sql .= "   reply_fin_mbr_mail_send_cd = " . getSqlValue($sendMailCd);
	$sql .= "  ,act_stat_kbn       = '1'";  // 1:対応済み
	$sql .= "  ,charge           = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   act_mail_seq = " . getSqlValue($mailTraceId);
	$result = dbQuery($con_utl, $sql);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	if(!$result) {
		dbRollback($con_utl);
		dbFreeResult($result);
		logDebug("updateSendMailCdToTraceMail:RollBack");
		return false;
	}
	dbCommit($con_utl);
	dbFreeResult($result);
	
	logDebug("updateSendMailCdToTraceMail:End");
	return true;
}

/**
 * 指定された問い合わせを対応済みに更新
 * @param string $con_utl  DB接続情報
 * @param string $cvoiceId 問い合わせID
 * @param string $userId   ユーザーID
 */
function updateComplateCVoice($con_utl, $cvoiceId, $userId) {
	logDebug("updateComplateCVoice:Start cvoiceId = " . $cvoiceId);
	$sql  = "";
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	/*
	$sql .= " UPDATE";
	$sql .= "   CUSTOMERVOICE_TBL";
	$sql .= " SET";
	$sql .= "   STATUS       = 9";  // 9:対応済み
	$sql .= "  ,COMMUNICATOR = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   CVOICE_ID = " . getSqlValue($cvoiceId);

	$result = dbQuery($con_utl, $sql,true);
	*/
	$sql .= " UPDATE";
	$sql .= "   f_opinion_consul";
	$sql .= " SET";
	$sql .= "   stat_kbn       = '9'";  // 9:対応済み
	$sql .= "  ,responder = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   voice_consul_seq = " . getSqlValue($cvoiceId);
	$result = dbQuery($con_utl, $sql);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	if(!$result) {
		dbRollback($con_utl);
		dbFreeResult($result);
		logDebug("updateComplateCVoice:RollBack");
		return false;
	}
	dbCommit($con_utl);
	dbFreeResult($result);
	
	logDebug("updateComplateCVoice:End");
	return true;
}

/**
 * 指定された注文を対応済みに更新
 * @param string $con_utl     DB接続情報
 * @param string $recvOrderId 注文D
 * @param string $userId      ユーザーID
 */
function updateComplateOrder($con_utl, $recvOrderId, $userId) {
	logDebug("updateComplateOrder:Start cvoiceId = " . $cvoiceId);
	$sql  = "";
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	/*
	$sql .= " UPDATE";
	$sql .= "   RECVORDER_TBL";
	$sql .= " SET";
	$sql .= "   STATUS       = 9";  // 9:対応済み
	$sql .= "  ,COMMUNICATOR = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   RECV_ORDER_ID = " . getSqlValue($recvOrderId);

	$result = dbQuery($con_utl, $sql,true);
	*/
	$sql .= " UPDATE";
	$sql .= "   f_odr";
	$sql .= " SET";
	$sql .= "   stat_kbn       = 9";  // 9:対応済み
	$sql .= "  ,responder = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   odr_seq = " . getSqlValue($recvOrderId);
	$result = dbQuery($con_utl, $sql);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
	if(!$result) {
		dbRollback($con_utl);
		dbFreeResult($result);
		logDebug("updateComplateOrder:RollBack");
		return false;
	}
	dbCommit($con_utl);
	dbFreeResult($result);
	
	logDebug("updateComplateOrder:End");
	return true;
}

/**
 * メール件名・本文に特定文言が存在する場合は送信情報レコード追加
 * @param string $con_utl DB接続情報
 * @param string $sendMailCd  送信メールコード
 * @param string $mlSubject   メール件名
 * @param string $mlBody      メール本文
 * @param string $userId      ユーザーID
 */
function insertMailSendInfo($con_utl, $sendMailCd, $mlSubject, $mlBody, $userId) {
	logDebug("insertMailSendInfo:Start sendMailCd = " . $sendMailCd);

	// メール送信区分一覧取得
	$listKbn = getMailSendKbnList($con_utl);
    if (count($listKbn) <= 0) { return true; }

	foreach($listKbn as $kbn) {
		// メール件名に指定文言が含まれるチェック
		$mailSendSubjectKbn = 0;
		if (mb_strpos($mlSubject, $kbn['CHECK_STRING']) !== false) {
			$mailSendSubjectKbn = $kbn['MAILSEND_KBN'];
		}
		
		// メール本文に指定文言が含まれるチェック
		$mailSendBodyKbn    = 0;
		if (mb_strpos($mlBody, $kbn['CHECK_STRING']) !== false) {
			$mailSendBodyKbn    = $kbn['MAILSEND_KBN'];
		}
		
		// メール件名・本文のいずれかに指定文言が含まれている場合のみ
		if ($mailSendSubjectKbn > 0  || $mailSendBodyKbn > 0) {
			$sql  = "";
			// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
			/*
			$sql .= " INSERT INTO KAIINMAILSEND_INFO_TBL";
			$sql .= " (";
			$sql .= "    KAIINMAILSEND_INFO_ID";
			$sql .= "   ,KAIINMAILSEND_CD";
			$sql .= "   ,MAILSEND_SUBJECT_KBN";
			$sql .= "   ,MAILSEND_BODY_KBN";
			$sql .= "   ,UPDATE_DT";
			$sql .= "   ,REGIST_DT";
			$sql .= "   ,UPDATE_USER";
			$sql .= "   ,REGIST_USER";
			$sql .= " ) VALUES (";
			$sql .= "    SEQ_KAIINMAILSEND_INFO_ID.NEXTVAL";
			$sql .= "   ," . getSqlValue($sendMailCd);
			$sql .= "   ," . $mailSendSubjectKbn;
			$sql .= "   ," . $mailSendBodyKbn;
			$sql .= "   ,SYSDATE";
			$sql .= "   ,SYSDATE";
			$sql .= "   ," . getSqlValue('Tool:'.$userId);
			$sql .= "   ," . getSqlValue('Tool:'.$userId);
			$sql .= " )";
			
			$result = dbQuery($con_utl, $sql,true);
			*/
			$sql .= " INSERT INTO f_indiv_act_mail_send_kbn";
			$sql .= " (";
			$sql .= "    indiv_act_mail_send_info_cd";
			$sql .= "   ,indiv_act_mail_send_hist_cd";
			$sql .= "   ,subject_mail_send_kbn";
			$sql .= "   ,body_letter_mail_send_kbn";
			$sql .= "   ,update_date";
			$sql .= "   ,register_date";
			$sql .= "   ,update_user_cd";
			$sql .= "   ,register_user_cd";
			$sql .= " ) VALUES (";
			$sql .= "    nextval('seq_indiv_act_mail_send_info_cd')";
			$sql .= "   ," . getSqlValue($sendMailCd);
			$sql .= "   ," . $mailSendSubjectKbn;
			$sql .= "   ," . $mailSendBodyKbn;
			$sql .= "   ,current_timestamp(0)";
			$sql .= "   ,current_timestamp(0)";
			$sql .= "   ," . getSqlValue('Tool:'.$userId);
			$sql .= "   ," . getSqlValue('Tool:'.$userId);
			$sql .= " )";
			$result = dbQuery($con_utl, $sql);
			// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/28 jst-haku
			if(!$result) {
				dbRollback($con_utl);
				dbFreeResult($result);
				logDebug("insertMailSendInfo:RollBack");
				return false;
			}
		}
	}
	dbCommit($con_utl);
	dbFreeResult($result);
	
	logDebug("insertMailSendInfo:End");
	return true;
}
// ▲R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa

?>
