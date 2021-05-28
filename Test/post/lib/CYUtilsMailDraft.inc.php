<?php
/*▼R-#13199 WEB管理ツールでメール送信してもCJISSEKI_MAIL_TBLのレコードが更新されない 2014/01/31 uls-soga*/
//対象のソースの全てのロールバックをコメントアウト
/*▲R-#13199 WEB管理ツールでメール送信してもCJISSEKI_MAIL_TBLのレコードが更新されない 2014/01/31 uls-soga*/

/*
 * 【メール送信実績、メール下書き機能 】
 *
 */
require_once dirname(__FILE__) . '/CYUtilsDBConst.inc.php';


$MailDraft_conf = array();

//請求区分
$MailDraft_conf['REQUESTKBN'][0]="不明";
$MailDraft_conf['REQUESTKBN'][1]="葉書";
$MailDraft_conf['REQUESTKBN'][2]="TEL(IN)";
$MailDraft_conf['REQUESTKBN'][3]="TEL(OUT)";
$MailDraft_conf['REQUESTKBN'][4]="FAX";
$MailDraft_conf['REQUESTKBN'][5]="NET";
$MailDraft_conf['REQUESTKBN'][6]="携帯";

//業務画面
$MailDraft_conf['GYOUMUSCREEN'][0]="不明";
$MailDraft_conf['GYOUMUSCREEN'][1]="TEL受";
$MailDraft_conf['GYOUMUSCREEN'][2]="サンプル";
$MailDraft_conf['GYOUMUSCREEN'][3]="会員折返";
$MailDraft_conf['GYOUMUSCREEN'][4]="FAX通常";
$MailDraft_conf['GYOUMUSCREEN'][5]="返信FAX";
$MailDraft_conf['GYOUMUSCREEN'][6]="確認FAX";
$MailDraft_conf['GYOUMUSCREEN'][7]="NET注文確定";

//業務区分
$MailDraft_conf['GYOUMUKBN'][15]="注文お礼メール";
$MailDraft_conf['GYOUMUKBN'][16]="コンビニ受取";
$MailDraft_conf['GYOUMUKBN'][17]="ご意見ご相談";
$MailDraft_conf['GYOUMUKBN'][18]="お肌のお悩み相談室";
$MailDraft_conf['GYOUMUKBN'][19]="おしゃべり広場";
$MailDraft_conf['GYOUMUKBN'][20]="お肌カウンセリング";
$MailDraft_conf['GYOUMUKBN'][21]="(PC)個別メール";
$MailDraft_conf['GYOUMUKBN'][22]="(携帯)個別メール(携帯)";
//▼2011/01/19 #1408 ドレス直販対応（EC-One）
$MailDraft_conf['GYOUMUKBN'][23]="ドレス注文お礼メール";
//▲2011/01/19 #1408 ドレス直販対応（EC-One）
//▼2011/07/13 A-05761 飲むドモ対応（通常販売）（ec-one tazoe）
$MailDraft_conf['GYOUMUKBN'][24]="飲むドモ(直販)注文お礼メール";
$MailDraft_conf['GYOUMUKBN'][25]="飲むドモ(定期)注文お礼メール";
//▲2011/07/13 A-05761 飲むドモ対応（通常販売）（ec-one tazoe）
// HuyDV 2018/5/30 start
$MailDraft_conf['GYOUMUKBN'][29]="お客様対応メール管理";
// HuyDV 2018/5/30 end
//評価区分
$MailDraft_conf['HYOUKAKBN'][1]="入力時間";
$MailDraft_conf['HYOUKAKBN'][2]="返信時間";
$MailDraft_conf['HYOUKAKBN'][3]="会話時間";
$MailDraft_conf['HYOUKAKBN'][4]="離席時間";
$MailDraft_conf['HYOUKAKBN'][5]="メール保存時";
$MailDraft_conf['HYOUKAKBN'][6]="メール送信時";

//定型フラグ
//▼R-#2921 定型個別20対応(1:定型 2:20対応 3:個別に変更) 2012/02/10 ul-fuse
$MailDraft_conf['TEIKEIFLG'][1]="定型";
$MailDraft_conf['TEIKEIFLG'][2]="20対応";
$MailDraft_conf['TEIKEIFLG'][3]="個別";
//▲R-#2921 定型個別20対応(1:定型 2:20対応 3:個別に変更) 2012/02/10 ul-fuse

//メール下書きFROM
$MailDraft_conf['MAIL_FROM'][0]="manzoku@saishunkan.co.jp";
$MailDraft_conf['MAIL_FROM'][1]="news@saishunkan.co.jp";
$MailDraft_conf['MAIL_FROM'][2]="privacy@saishunkan.co.jp";
$MailDraft_conf['MAIL_FROM'][3]="kagami@saishunkan.co.jp";

$MailDraft_conf['SHOHIN']['1'] = '0166';
$MailDraft_conf['SHOHIN']['2'] = '0167';
$MailDraft_conf['SHOHIN']['3'] = '0173';
$MailDraft_conf['SHOHIN']['4'] = '0113';
$MailDraft_conf['SHOHIN']['5'] = '0115';
$MailDraft_conf['SHOHIN']['6'] = '0112';
$MailDraft_conf['SHOHIN']['7'] = '0114';
$MailDraft_conf['SHOHIN']['8'] = '0210';

$MailDraft_conf['SHOHIN']['0166'] = 'DCJ';
$MailDraft_conf['SHOHIN']['0167'] = 'DCS';
$MailDraft_conf['SHOHIN']['0173'] = 'DFP';
$MailDraft_conf['SHOHIN']['0113'] = 'DL';
$MailDraft_conf['SHOHIN']['0115'] = 'DE';
$MailDraft_conf['SHOHIN']['0112'] = 'DW20';
$MailDraft_conf['SHOHIN']['0114'] = 'DML';
$MailDraft_conf['SHOHIN']['0210'] = 'ドレス';
$MailDraft_conf['SHOHIN']['9'] = '0250';
$MailDraft_conf['SHOHIN']['0250'] = '飲むドモ';

// ▼R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
$MailDraft_conf['SHOHIN']['10'] = '0260';
$MailDraft_conf['SHOHIN']['0260'] = 'めぐり';
// ▲R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi

$OSUSUME_1_KEYWORD = Array("化粧落しジェル","化粧落しｼﾞｪﾙ");
$OSUSUME_2_KEYWORD = Array("洗顔石鹸");
$OSUSUME_3_KEYWORD = Array("柔肌パック","柔肌ﾊﾟｯｸ");
$OSUSUME_4_KEYWORD = Array("保湿液");
$OSUSUME_5_KEYWORD = Array("美活肌エキス","美活肌ｴｷｽ");
$OSUSUME_6_KEYWORD = Array("クリーム２０","クリーム20","ｸﾘｰﾑ２０","ｸﾘｰﾑ20");
$OSUSUME_7_KEYWORD = Array("保護乳液");
$OSUSUME_8_KEYWORD = Array("素肌ドレスクリーム","素肌ﾄﾞﾚｽｸﾘｰﾑ");
$OSUSUME_SET3_KEYWORD = Array("準備３点","準備3点");
$OSUSUME_SET4_KEYWORD = Array("基本４点","基本4点");
$OSUSUME_9_KEYWORD = Array("飲むドモホルンリンクル","飲むﾄﾞﾓﾎﾙﾝﾘﾝｸﾙ");
// ▼R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
$OSUSUME_10_KEYWORD = Array("めぐりの結晶");
// ▲R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi


//--------------------------------------------------
//名称：メール実績　読込み
//関数：CjissekiMail_load
//引数：
//戻値：
//概要：
//--------------------------------------------------
function CjissekiMail_load(&$con, $TantoCD,$RequestKbn,$GyoumuScreen,$GyoumuKbn,$TAIOUCD=null){

	logDebug("CjissekiMail_load[start]");

	$ret = false;

	//------------------------------
	//担当者チェック
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return $ret;
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	$sql  = "SELECT ";
	$sql .= " TAIOUCD";
	$sql .= ",TANTOCD";
	$sql .= ",GYOUMUSCREEN";
	$sql .= ",GYOUMUKBN";
	$sql .= ",TEIKEIFLG";
	$sql .= " FROM CJISSEKI_MAIL_TBL ";
	$sql .= " WHERE TantoCD = '".$TantoCD."'";
	//▼2012/11/12 R-#6569_メール作成実績情報テーブルの業務画面カラム拡張対応(ulsystems hatano)
	if(trim($GyoumuScreen) != ""){
		$sql .= " AND GyoumuScreen = '".str_pad($GyoumuScreen, 2, '0', STR_PAD_LEFT)."'";
	}else{
		$sql .= " AND GyoumuScreen = '".$GyoumuScreen."'";
	}
	//▲2012/11/12 R-#6569_メール作成実績情報テーブルの業務画面カラム拡張対応(ulsystems hatano)
	$sql .= " AND GyoumuKbn = '".$GyoumuKbn."'";
	if($TAIOUCD){
		$sql .= " AND TAIOUCD = '".$TAIOUCD."'";
	}
	$sql .= " AND ENDTIME  is null";
	$sql .= " AND SYNC_FLG is null";
	$sql .= " order by regist_dt desc";

	/* ▼ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */
	// DB接続・トランザクションをメソッドの外に移動
	//------------------------------
	//DB接続＆パース
	//------------------------------
	//$con = dbConnect();
	/* ▲ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);


	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);
	if($rows > 0){
		//------------------------------
		//データ取得
		//------------------------------
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);
	}
	dbFreeResult($result);

	logDebug("CjissekiMail_load[end] ret[]=".print_r($ret,1));
	return $ret;
}


//--------------------------------------------------
//名称：メール実績　新規登録
//関数：CjissekiMail_insert
//引数：
//戻値：
//概要：
//--------------------------------------------------
//▼R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
function CjissekiMail_insert(&$con,$TantoCD,$RequestKbn,$GyoumuScreen,$GyoumuKbn,$HyoukaKbn,$kainMailSendCD=NULL){
//▲R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa

	logDebug("CjissekiMail_insert[start]");

	//------------------------------
	//担当者チェック
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return false;
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	$sql  = "INSERT INTO CJISSEKI_MAIL_TBL (";
	$sql .= " TaiouCD";
	$sql .= ",ShoriDate";
	$sql .= ",TantoCD";
	$sql .= ",StartTime";
	$sql .= ",RequestKbn";
	$sql .= ",GyoumuScreen";
	$sql .= ",GyoumuKbn";
	$sql .= ",HyoukaKbn";
	$sql .= ",HyoukaTime";
	$sql .= ",SYNC_FLG";
	$sql .= ",TEIKEIFLG";
	$sql .= ",UPDATE_DT";
	$sql .= ",REGIST_DT";
	$sql .= ",UPDATE_USER";
	$sql .= ",REGIST_USER";
	//▼R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
	if ($kainMailSendCD != NULL) {
		$sql .= ",KAIINMAILSEND_CD";
	}
	//▲R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
	$sql .= " )VALUES( ";
	$sql .= " SEQ_TAIOUCD.NEXTVAL";
	$sql .= ",systimestamp";
	$sql .= ",'".$TantoCD."'";
	$sql .= ",to_char(sysdate,'hh24miss')";
	$sql .= ",'".$RequestKbn."'";
	//▼2012/11/09 R-#6569_メール作成実績情報テーブルの業務画面カラム拡張対応(ulsystems hatano)
	if(trim($GyoumuScreen) != ""){
		$sql .= ",'".str_pad($GyoumuScreen, 2, '0', STR_PAD_LEFT)."'";
	}else{
		$sql .= ",'".$GyoumuScreen."'";
	}
	//▲2012/11/09 R-#6569_メール作成実績情報テーブルの業務画面カラム拡張対応(ulsystems hatano)
	$sql .= ",'".$GyoumuKbn."'";
	$sql .= ",'0'";

	//$sql .= ",to_char(sysdate,'hh24miss')";
	$sql .= ",NULL";

	$sql .= ",NULL";
	$sql .= ",NULL";
	$sql .= ",sysdate";
	$sql .= ",sysdate";
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);
	//▼R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
	if ($kainMailSendCD != NULL) {
		$sql .= ",".getSqlValue($kainMailSendCD);
	}
	//▲R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
	$sql .= ")";

	/* ▼ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */
	// DB接続・トランザクションをメソッドの外に移動
	//------------------------------
	//DB接続＆パース
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		// ロールバック
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}
	//------------------------------
	//SQL実行
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		// ロールバック
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}

	//------------------------------
	//DB切断
	//------------------------------
	//dbClose($con);
	/* ▲ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */

	logDebug("CjissekiMail_insert[end] ret=".$ret);
	return $ret;
}

//--------------------------------------------------
//名称：メール実績　更新
//関数：CjissekiMail_update
//引数：
//戻値：
//概要：
//--------------------------------------------------
//▼R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
function CjissekiMail_update(&$con,$TantoCD,$RequestKbn,$GyoumuScreen,$GyoumuKbn,$rec_type,$KaiinCD,$TaiouCD,$HyoukaKbn,$TeikeiFlg,$kainMailSendCD=NULL){
//▲R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa

	logDebug("CjissekiMail_update[start]");

	//------------------------------
	//担当者チェック
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return false;
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	$sql  = "UPDATE CJISSEKI_MAIL_TBL ";
	$sql .= " SET ";
	$sql .= " EndTime      = to_char(sysdate,'hh24miss')";
	$sql .= ",HyoukaKbn    = '".$HyoukaKbn."'";

	//$sql .= ",HyoukaTime   =  to_char(sysdate,'hh24miss')";
	$sql .= ",HyoukaTime = (  ((to_char(sysdate,'hh24') * 60 * 60) + (to_char(sysdate,'mi') * 60 ) + to_char(sysdate,'ss')) - ";
	$sql .= "((SUBSTR(StartTime,1,2) * 60 * 60) + (SUBSTR(StartTime,3,2) * 60 ) + SUBSTR(StartTime,5,2))   )";

	//▼R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
	if ($kainMailSendCD != NULL) {
		$sql .= ",KAIINMAILSEND_CD = ".getSqlValue($kainMailSendCD);
	}
	//▲R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa

	logDebug("rec_type=".$rec_type);
	logDebug("GyoumuKbn=".$GyoumuKbn);

	//下書きの場合は会員番号は出力しない。
	//if($rec_type==0){
	//    $sql .= ",KAIINCD = null ";
	//}else{
	//if($GyoumuKbn==21 || $GyoumuKbn==22 ){
	//    $tmp = putKainCD($KaiinCD);
	//    if($tmp){
	//        $sql .= ",KAIINCD      = '".$tmp."'";
	//    }
	//}else{
	//    if($KaiinCD){
	//        $sql .= ",KAIINCD      = '".$KaiinCD."'";
	//    }
	//}
	//▼2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		if($KaiinCD){
			//$sql .= ",KAIINCD      = '".$KaiinCD."'";
			$tmpGID = getPid_to_Gid($GyoumuKbn,$KaiinCD);
			if($tmpGID==0) {
				$tmp = getKainno_pid($GyoumuKbn,$KaiinCD);
			} else {

				$tmpGID2 = getPid_to_Gid($GyoumuKbn,$tmpGID);
				if($tmpGID2==0) {
					$tmp = getKainno_pid($GyoumuKbn,$tmpGID);
				} else {
					$tmp = getKainno_pid($GyoumuKbn,$tmpGID2);
				}
			}
			if($tmp) {
				$sql .= ",KAIINCD='".$tmp."'";
			}
		}
		//▲2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
	}else{
		$tmp = putKainCD($KaiinCD);
		if($tmp){
			$sql .= ",KAIINCD      = '".$tmp."'";
		}
	}
	//}

	$sql .= ",SYNC_FLG='0'";
	$sql .= ",TeikeiFlg = '".$TeikeiFlg."'";
	$sql .= ",UPDATE_DT = sysdate";
	$sql .= ",UPDATE_USER = ".getSqlValue("TOOL:".$TantoCD);
	$sql .= " WHERE TaiouCD ='".$TaiouCD."'";
	$sql .= " AND TantoCD ='".$TantoCD."'";
	$sql .= " AND RequestKbn ='".$RequestKbn."'";
	//▼2012/11/12 R-#6569_メール作成実績情報テーブルの業務画面カラム拡張対応(ulsystems hatano)
	if(trim($GyoumuScreen) != ""){
		$sql .= " AND GyoumuScreen ='".str_pad($GyoumuScreen, 2, '0', STR_PAD_LEFT)."'";
	}else{
		$sql .= " AND GyoumuScreen ='".$GyoumuScreen."'";
	}
	//▲2012/11/12 R-#6569_メール作成実績情報テーブルの業務画面カラム拡張対応(ulsystems hatano)
	$sql .= " AND GyoumuKbn ='".$GyoumuKbn."'";
	$sql .= " AND SYNC_FLG is null";


	logDebug("sql=".$sql);

	/* ▼ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */
	// DB接続・トランザクションをメソッドの外に移動
	//------------------------------
	//DB接続＆パース
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		// ロールバック
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}

	//------------------------------
	//SQL実行
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		// ロールバック
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}

	//------------------------------
	//DB切断
	//------------------------------
	//dbClose($con);
	/* ▲ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */

	logDebug("CjissekiMail_update[end] ret=".$ret);
	return $ret;
}

//--------------------------------------------------
//名称：メール下書き　一覧
//関数：MailDraft_list
//引数：
//戻値：
//概要：
//--------------------------------------------------
function MailDraft_list(&$con,$TantoCD,$GyoumuKbn,$sw){

	logDebug("MailDraft_list[start]");

	global $salt, $seed, $vector, $dec;
	global $MailDraft_conf;

	$ret = array();


	//------------------------------
	//担当者チェック
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return $ret;
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	$sql  = "SELECT ";
	$sql .= " a.MAILDRAFTCD";
	$sql .= ",a.TantoCD";
	$sql .= ",a.GYOUMUKBN";
	$sql .= ",a.CONTACTID";
	$sql .= ",a.KAIINCD";
	$sql .= ",a.MAIL_NAME";
	$sql .= ",a.MAIL_TO";
	$sql .= ",a.MAIL_KAINNO";
	$sql .= ",a.MAIL_FROM";
	$sql .= ",a.MAIL_SUBJECT";
	$sql .= ",a.MAIL_BODY";
	$sql .= ",a.MAIL_SIGNATURE";
	$sql .= ",a.MAIL_MEMO1";
	$sql .= ",a.MAIL_MEMO2";
	$sql .= ",a.MAIL_CD"; // #1134 2010/08/26 kdl-uchida
    //▼2011/03/08 #16 WAO対応(EC-One hatano) 対応メモ修正
    $sql .= ",a.MAIL_TAIOUMEMO";
    //▲2011/03/08 #16 WAO対応(EC-One hatano) 対応メモ修正
	$sql .= ",to_char(a.UPDATE_DT,'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT";
	$sql .= ",b.KAIN_NAME ";
	$sql .= " FROM MAILDRAFT_TBL a,member2_v b";
	$sql .= " WHERE a.KAIINCD   = b.kainno(+) ";

	$sql .= " AND   a.TANTOCD   = '".$TantoCD. "'";

	if($sw==true){
		// HuyDV 2018/05/30 start
		if($GyoumuKbn == '21'){
			$sql .= " AND   (a.GyoumuKbn   = '" . $GyoumuKbn . "' OR a.GyoumuKbn   = '29')";

		} else {
			$sql .= " AND   a.GyoumuKbn   = '" . $GyoumuKbn . "'";
		}
		// HuyDV 2018/05/30 end
	}else{
		$sql .= " AND   a.GYOUMUKBN <> '".$GyoumuKbn ."'";
	}
	$sql .= " order by a.MAILDRAFTCD desc,a.UPDATE_DT desc";

	/* ▼ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */
	// DB接続・トランザクションをメソッドの外に移動
	//------------------------------
	//DB接続＆パース
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);

	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);
	if($rows>0){
		//------------------------------
		//データ取得
		//------------------------------
		$ret = array();
		for($i=0; $i<$rows; $i++){
			$row = dbFetchRow($result, $i, $data_arr);

			if(!$row['MAIL_NAME']){
				$row['MAIL_NAME']="";
			}else{
				//暗合項目の複合化
				$row['MAIL_NAME'] = ssk_crypt_decrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $vector,$row['MAIL_NAME'], $dec, $error_code);
			}

			if($row['GYOUMUKBN']){
				$wk = $MailDraft_conf['GYOUMUKBN'][$row['GYOUMUKBN']];
				$row['GYOUMUKBN_NAME'] = $wk;
			}else{
				$row['GYOUMUKBN_NAME'] = "";
			}
			$row['KAIINCD'] = putKainCD($row['KAIINCD']);
			$ret[$i]=$row;
		}
	}
	dbFreeResult($result);

	//------------------------------
	//DB切断
	//------------------------------
	//dbClose($con);
	/* ▲ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */

	logDebug("MailDraft_list[end] ret[]=".print_r($ret,1));
	return $ret;
}


//--------------------------------------------------
//名称：メール下書き　読込み
//関数：MailDraft_load
//引数：
//戻値：
//概要：
//--------------------------------------------------
function MailDraft_load(&$con,$TantoCD,$GyoumuKbn,$MailDraftCD=null , $kainno=null , $CONTACTID=null){

	logDebug("==============================");
	logDebug("MailDraft_load[start]");

	logDebug("TantoCD    =".$TantoCD);
	logDebug("GyoumuKbn  =".$GyoumuKbn);
	logDebug("MailDraftCD=".$MailDraftCD);
	logDebug("kainno     =".$kainno);
	logDebug("CONTACTID  =".$CONTACTID);


	global $salt, $seed, $vector, $dec;

	$ret = false;


	//------------------------------
	//担当者チェック
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return $ret;
	}

	//------------------------------
	//
	//------------------------------
	if($MailDraftCD){
		if($kainno || $CONTACTID){
			//メールドラフトコードが指定されているのに、会員NO、コンタクトIDが設定されている場合はエラー
			return $ret;
		}
	}else{
		if(!$CONTACTID){
			//メールドラフトコードが未指定なのに、コンタクトIDが未指定ならばエラー
			if($GyoumuKbn==18 || $GyoumuKbn==19){
				//ただし、掲示板の場合は「新規登録」の下書きを読み込みからエラーにしない。
			}else{
				return $ret;
			}
		}
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	$sql  = "SELECT ";
	$sql .= " a.MAILDRAFTCD";
	$sql .= ",a.TANTOCD";
	$sql .= ",a.GYOUMUKBN";
	$sql .= ",a.CONTACTID";
	$sql .= ",a.KAIINCD";
	$sql .= ",a.MAIL_NAME";
	$sql .= ",a.MAIL_TO";
	$sql .= ",a.MAIL_KAINNO";
	$sql .= ",a.MAIL_FROM";
	$sql .= ",a.MAIL_SUBJECT";
	$sql .= ",a.MAIL_BODY";
	$sql .= ",a.MAIL_SIGNATURE";
	$sql .= ",a.MAIL_MEMO1";
	$sql .= ",a.MAIL_MEMO2";
	$sql .= ",a.MAIL_TEIKEIFLG";
	$sql .= ",a.MAIL_CD"; // #1134 2010/08/26 kdl-uchida
	//▼2011/03/08 #16 WAO対応(EC-One hatano) 対応メモ修正
    $sql .= ",a.MAIL_TAIOUMEMO";
    //▲2011/03/08 #16 WAO対応(EC-One hatano) 対応メモ修正

	// ▼R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
	// ※めぐりの結晶追加に伴い、ループカウントを+1
	for($i=1;$i<=10;$i++){
		$sql .= ",a.SHOHIN".$i."_CD";
	}
	// ▲R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi

	$sql .= ",to_char(a.UPDATE_DT,'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT";
	$sql .= ",b.KAIN_NAME ";
	$sql .= " FROM MAILDRAFT_TBL a,member2_v b";

	$sql .= " WHERE a.KAIINCD   = b.kainno(+) ";
	$sql .= " AND   a.TantoCD     = '".$TantoCD."'";
	$sql .= " AND   a.GyoumuKbn   = '".$GyoumuKbn."'";


	//--------------------------------------------------
	//キーになっている項目のデータがあれば条件を設定する。
	//（必要有無の条件判定は上記でおこなっている。）
	//--------------------------------------------------
	if($MailDraftCD){
		$sql .= " AND   a.MailDraftCD = '".$MailDraftCD."'";
	}else{
		if($kainno){
			$tmp = putKainCD($kainno);
			if($tmp){
				$sql .= " AND   a.KAIINCD = '".$tmp."'";
			}else{
				$sql .= " AND   a.KAIINCD is null ";
			}
		}
		if($CONTACTID){
			$sql .= " AND   a.CONTACTID = '".$CONTACTID."'";
		}else{
			if($GyoumuKbn==18 || $GyoumuKbn==19){
				//掲示板の「新規登録」の場合は、下書きを読み込みからエラーにしない。
				$sql .= " AND   a.CONTACTID is null";
			}
		}
    }
    logDebug("sql=".$sql);

	/* ▼ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */
	// DB接続・トランザクションをメソッドの外に移動
	//------------------------------
	//DB接続＆パース
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);
	$rows = getNumRows($result, $data_arr);

	logDebug("record rows=".$rows);
	if($rows>0){

		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);

		//暗合項目の複合化
		$ret['MAIL_NAME'] = ssk_crypt_decrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $vector,$ret['MAIL_NAME'], $dec, $error_code);
		$ret['MAIL_TO']   = ssk_crypt_decrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $vector,$ret['MAIL_TO']  , $dec, $error_code);
	}

	dbFreeResult($result);

	//------------------------------
	//DB切断
	//------------------------------
	//dbClose($con);
	/* ▲ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */

	logDebug("MailDraft_load[end] ret[]=".print_r($ret,1));
	logDebug("==============================");

	return $ret;
}

//--------------------------------------------------
//名称：メール下書き　新規登録
//関数：MailDraft_insert
//引数：
//戻値：
//概要：
//--------------------------------------------------
//▼R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
//function MailDraft_insert(&$con,$TantoCD,$GyoumuKbn,$DraftData){
function MailDraft_insert(&$con,$TantoCD,$GyoumuKbn,$DraftData,&$newMailDraftCD=NULL){
//▲R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa

	logDebug("----------");
	logDebug("MailDraft_insert[start]");

	logDebug("DraftData[]=".print_r($DraftData,1));
	global $salt, $seed, $vector, $base64_enc;
	global $MailDraft_conf;

	$ret = false;

	//------------------------------
	//担当者チェック
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return $ret;
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	$sql  = "INSERT INTO MAILDRAFT_TBL (";
	$sql .= " MailDraftCD";
	$sql .= ",TantoCD";
	$sql .= ",GyoumuKbn";
	$sql .= ",ContactID";
	$sql .= ",KaiinCD";
	$sql .= ",MAIL_NAME";
	$sql .= ",MAIL_TO";
	$sql .= ",MAIL_KAINNO";
	$sql .= ",MAIL_FROM";
	$sql .= ",MAIL_SUBJECT";
	$sql .= ",MAIL_BODY";
	$sql .= ",MAIL_SIGNATURE";
    //▼2011/03/08 #16 WAO対応(EC-One hatano) 対応メモ修正
	//$sql .= ",MAIL_MEMO1";
    $sql .= ",MAIL_TAIOUMEMO";
	//$sql .= ",MAIL_MEMO2";
    //▲2011/03/08 #16 WAO対応(EC-One hatano) 対応メモ修正
	$sql .= ",MAIL_TEIKEIFLG";
	$sql .= ",UPDATE_DT";
	$sql .= ",REGIST_DT";
	$sql .= ",UPDATE_USER";
	$sql .= ",REGIST_USER";

	// ▼R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
	// ※めぐりの結晶追加に伴い、ループカウントを+1
	for($i=1;$i<=10;$i++){
		$sql .= ",SHOHIN".$i."_CD";
	}
	// ▲R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi

	$sql .= ",MAIL_CD"; // #1134 2010/08/26 kdl-uchida

	$sql .= " ) VALUES ( ";

	//▼ #1238 メール送信機能全てから、アドバイスページ作成を可能に 2010/08/16 kdl-uchida
	if($GyoumuKbn==21 && isset($_SESSION['2010advice']['cvoice_id']) && !is_null($_SESSION['2010advice']['cvoice_id'])){
		$sql .= "'".$_SESSION['2010advice']['cvoice_id']. "'";
	    //▼R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
		$newMailDraftCD = $_SESSION['2010advice']['cvoice_id'];
	    //▲R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
	}else{
	    //▼R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
		//$sql .= " SEQ_MAILDRAFTCD.NEXTVAL";
		$newMailDraftCD = getMailDraftCD();
		$sql .= "'".$newMailDraftCD. "'";
	    //▲R-#37249_【H31-0169-001】ネット業務プリーザーの各対応時間計測のためのWeb管理ツール改修依頼_WEB 2019/07/19 saisys-hasegawa
	}
	//▲ #1238 メール送信機能全てから、アドバイスページ作成を可能に 2010/08/16 kdl-uchida
	$sql .= ",'".$TantoCD."'";
	$sql .= ",'".$GyoumuKbn."'";

	if($GyoumuKbn==18 || $GyoumuKbn==19){
		if($DraftData['pid']){
			$sql .= ",'".$DraftData['pid']."'";
		}else{
			$sql .= ",null";
		}
	}else if($GyoumuKbn==21 || $GyoumuKbn==22){
		$sql .= ",'0'";
	}else{
		if($DraftData['econorderid']){
			$sql .= ",'".$DraftData['econorderid']."'";

		}else if($DraftData['cvid']){
			$sql .= ",'".$DraftData['cvid']."'";
		// 2018/05/25 HuyDV start
		}else if($DraftData['mailTraceId']){
			$sql .= ",'".$DraftData['mailTraceId']."'";
		} else{
		// 2018/05/25 HuyDV end
			$sql .= ",null";
		}
	}

	//▼2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
	//$tmp = putKainCD($DraftData['cd']);
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
	}else{
		$tmp = putKainCD($DraftData['cd']);
		//if(!$tmp){
		//    $tmp = putKainCD($DraftData['KAINNO']);
		//}
	}
	//▲2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）

	logDebug("debug tmp=".$tmp);
	if($tmp){
		$sql .= ",'".$tmp."'";
	}else{
		$sql .= ",null";
	}

	if($GyoumuKbn==18 || $GyoumuKbn==19){
		if($DraftData['staffname']){
			//暗合項目の暗号化
			$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
			$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['staffname'],$key, $output, $error_code);
			$sql .= ",'".$key2."'";
		}else{
			$sql .= ",null";
		}
	}else{
		if($DraftData['mlName']){
			//暗合項目の暗号化
			$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
			$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['mlName'],$key, $output, $error_code);
			$sql .= ",'".$key2."'";

		}else{
			$sql .= ",null";
		}
	}

	if($DraftData['mlTo']){
		//暗合項目の暗号化
		$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
		$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['mlTo'],$key, $output, $error_code);
		$sql .= ",'".$key2."'";

	}else{
		$sql .= ",null";
	}

	//▼2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
	//$tmp = putKainCD($DraftData['KAINNO']);
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
	}else{
		$tmp = putKainCD($DraftData['KAINNO']);
	}
	//▲2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
	if($tmp){
		$sql .= ",'".$tmp."'";
	}else{
		$sql .= ",null";
	}


	if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][0])==true){
		//▼R-#39533_【H31-0016-048】WEB管理ツールの個対応メールの差出人変更対応 2020/01/18 saisys-hasegawa
		if(strpos($DraftData['mlFrom'],'ドモホルンリンクル') !== false){
			$sql .= ",'4'";
		} else {
			$sql .= ",'0'";
		}
		//▲R-#39533_【H31-0016-048】WEB管理ツールの個対応メールの差出人変更対応 2020/01/18 saisys-hasegawa

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][1])==true){
		$sql .= ",'1'";

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][2])==true){
		$sql .= ",'2'";

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][3])==true){
		$sql .= ",'3'";

	}else{
		$sql .= ",null";
	}



	if($GyoumuKbn==18 || $GyoumuKbn==19){

		if($DraftData['msgtitle']){
// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
			$sql .= ",".getSqlValue($DraftData['msgtitle']);
// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
		}else{
			$sql .= ",null";
		}

		if($DraftData['msg']){
			//$sql .= ",'".$DraftData['msg']."'";
			$sql .= ",".putCLOB($DraftData['msg']);
		}else{
			$sql .= ",null";
		}

	}else{
		if($DraftData['mlSubject']){
// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
			$sql .= ",".getSqlValue($DraftData['mlSubject']);
// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
		}else{
			$sql .= ",null";
		}

		if($DraftData['mlBody']){
			//$sql .= ",'".$DraftData['mlBody']."'";
			$sql .= ",".putCLOB($DraftData['mlBody']);
		}else{
			$sql .= ",null";
		}
	}


	if($DraftData['mlSignature']){
// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
		$sql .= ",".getSqlValue($DraftData['mlSignature']);
// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
	}else{
		$sql .= ",null";
	}

    //▼2011/03/08 #16 WAO対応(EC-One hatano) 対応メモ修正
    /*
	if($DraftData['Memo']){
		$sql .= ",'".$DraftData['Memo']."'";
	}else{
		$sql .= ",null";
	}

	if($DraftData['Memo2']){
		$sql .= ",'".$DraftData['Memo2']."'";
	}else{
		$sql .= ",null";
	}
    */
    if($DraftData['Memo']){
// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
        $sql .= ",".getSqlValue($DraftData['Memo']);
// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
    }else{
        $sql .= ",null";
    }
    //▲2011/03/08 #16 WAO対応(EC-One hatano) 対応メモ修正

	//▼R-#2921 定型個別20対応(1:定型 2:20対応 3:個別に変更) 2012/02/10 ul-fuse
	if($DraftData['TEIKEIFLG']=='1' || $DraftData['TEIKEIFLG']=='2' || $DraftData['TEIKEIFLG']=='3'){
	//▲R-#2921 定型個別20対応(1:定型 2:20対応 3:個別に変更) 2012/02/10 ul-fuse
		$sql .= ",'".$DraftData['TEIKEIFLG']."'";
	}else{
		$sql .= ",null";
	}

	$sql .= ",sysdate";
	$sql .= ",sysdate";
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);

	// ▼R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
	// ※めぐりの結晶追加に伴い、ループカウントを+1
	for($i=1;$i<=10;$i++){
		if( $DraftData['OSUSUME_'.$i] ){
			$sql .= ",'".$DraftData['OSUSUME_'.$i]."'";
		}else{
			$sql .= ",null";
		}
	}
	// ▲R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi

	$sql .= ",".getSqlValue($DraftData['code']);

	$sql .= ")";

	logDebug("DraftData=".print_r($DraftData,1));
	logDebug("sql=".$sql);

	/* ▼ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */
	// DB接続・トランザクションをメソッドの外に移動
	//------------------------------
	//DB接続＆パース
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}

	//------------------------------
	//SQL実行
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}

	//------------------------------
	//DB切断
	//------------------------------
	//dbClose($con);
	/* ▲ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */

	logDebug("MailDraft_insert[end] ret=".$ret);
	logDebug("----------");
	return $ret;
}

//--------------------------------------------------
//名称：メール下書き　更新
//関数：MailDraft_update
//引数：
//戻値：
//概要：
//--------------------------------------------------
function MailDraft_update(&$con,$TantoCD,$GyoumuKbn,$ContactID,$DraftData){

	logDebug("----------");
	logDebug("MailDraft_update[start]");

	logDebug("DraftData[]=".print_r($DraftData,1));
	global $salt, $seed, $vector, $base64_enc;
	global $MailDraft_conf;

	//------------------------------
	//担当者チェック
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return false;
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	$sql  = "UPDATE MAILDRAFT_TBL";
	$sql .= " set";


	if($GyoumuKbn==21 || $GyoumuKbn==22){
		$sql .= " ContactID ='0'";
	}else if($GyoumuKbn==18 || $GyoumuKbn==19){
		if($DraftData['pid']){
			$sql .= " ContactID     ='".$DraftData['pid']."'";
		}else{
			$sql .= " ContactID     =null";
		}
	// 2018/05/25 HuyDV start
	}else if($GyoumuKbn==29){
			if($DraftData['mailTraceId']){
				$sql .= " ContactID ='".$DraftData['mailTraceId']."'";
			}
	// 2018/05/25 HuyDV end
	}else{
		if($DraftData['econorderid']){
			$sql .= " ContactID     ='".$DraftData['econorderid']."'";
		}else if($DraftData['cvid']){
			$sql .= " ContactID     ='".$DraftData['cvid']."'";
		}else{
			$sql .= " ContactID     =null";
		}
	}

	//▼2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
	//$tmp = putKainCD($DraftData['cd']);
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
	}else{
		$tmp = putKainCD($DraftData['cd']);
		//if(!$tmp){
		//    $tmp = putKainCD($DraftData['KAINNO']);
		//}
	}
	//▲2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
	if($tmp){
		$sql .= ",KaiinCD='".$tmp."'";
	}else{
		$sql .= ",KaiinCD=null";
	}

	if($GyoumuKbn==18 || $GyoumuKbn==19){

		if($DraftData['staffname']){
			//暗合項目の暗号化
			$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
			$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['staffname'], $key  , $output, $error_code);
			$sql .= ",MAIL_NAME='".$key2."'";
		}else{
			$sql .= ",MAIL_NAME=null";
		}

	}else{
		if($DraftData['mlName']){
			//暗合項目の暗号化
			$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
			$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['mlName'], $key  , $output, $error_code);
			$sql .= ",MAIL_NAME='".$key2."'";
			logDebug($key2);
		}else{
			$sql .= ",MAIL_NAME=null";
		}
	}

	if($DraftData['mlTo']){
		//暗合項目の暗号化
		$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
		$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['mlTo'],$key, $output, $error_code);
		$sql .= ",MAIL_TO='".$key2."'";
	}else{
		$sql .= ",MAIL_TO=null";
	}

	//▼2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
	//$tmp = putKainCD($DraftData['KAINNO']);
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
	}else{
		$tmp = putKainCD($DraftData['KAINNO']);
	}
	//▲2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
	if($tmp){
		$sql .= ",MAIL_KAINNO='".$tmp."'";
	}else{
		$sql .= ",MAIL_KAINNO=null";
	}

	if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][0])==true){
		//▼R-#39533_【H31-0016-048】WEB管理ツールの個対応メールの差出人変更対応 2020/01/18 saisys-hasegawa
		if(strpos($DraftData['mlFrom'],'ドモホルンリンクル') !== false){
			$sql .= ",MAIL_FROM = '4'";
		} else {
			$sql .= ",MAIL_FROM = '0'";
		}
		//▲R-#39533_【H31-0016-048】WEB管理ツールの個対応メールの差出人変更対応 2020/01/18 saisys-hasegawa

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][1])==true){
		$sql .= ",MAIL_FROM = '1'";

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][2])==true){
		$sql .= ",MAIL_FROM = '2'";

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][3])==true){
		$sql .= ",MAIL_FROM = '3'";

	}else{
		$sql .= ",MAIL_FROM = null";
	}

	if($GyoumuKbn==18 || $GyoumuKbn==19){
// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
		$sql .= ",MAIL_SUBJECT  =".getSqlValue($DraftData['msgtitle']);
// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
		//$sql .= ",MAIL_BODY     ='".$DraftData['msg']."'";
		$sql .= ",MAIL_BODY     =".putCLOB($DraftData['msg']);
	}else{
// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
		$sql .= ",MAIL_SUBJECT  =".getSqlValue($DraftData['mlSubject']);
// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
		//$sql .= ",MAIL_BODY     ='".$DraftData['mlBody']."'";
		$sql .= ",MAIL_BODY     =".putCLOB($DraftData['mlBody']);
	}

// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
	$sql .= ",MAIL_SIGNATURE=".getSqlValue($DraftData['mlSignature']);
// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka

	$sql .= ",MAIL_TEIKEIFLG ='".$DraftData['TEIKEIFLG']."'";

	// ▼R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
	// ※めぐりの結晶追加に伴い、ループカウントを+1
	for($i=1;$i<=10;$i++){
		if( $DraftData['OSUSUME_'.$i] ){
			$sql .= ",SHOHIN".$i."_CD='".$DraftData['OSUSUME_'.$i]."'";
		}else{
			$sql .= ",SHOHIN".$i."_CD=null";
		}
	}
	// ▲R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi


	$sql .= ",UPDATE_DT    = sysdate";
	$sql .= ",UPDATE_USER  = ".getSqlValue("TOOL:".$TantoCD);

	$sql .= ",MAIL_CD  = ".getSqlValue($DraftData['code']); // #1134 2010/08/26 kdl-uchida
// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
    $sql .= ",MAIL_TAIOUMEMO =".getSqlValue($DraftData['Memo']);
// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka

	$sql .= " WHERE TANTOCD    = '".$TantoCD."'";
	$sql .= " AND   GYOUMUKBN  = '".$GyoumuKbn."'";
	$sql .= " AND   MAILDRAFTCD= '".$DraftData['MDCD']."'";

	logDebug("sql=".$sql);

	/* ▼ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */
	// DB接続・トランザクションをメソッドの外に移動
	//------------------------------
	//DB接続＆パース
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}

	//------------------------------
	//SQL実行
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}

	//------------------------------
	//DB切断
	//------------------------------
	//dbClose($con);
	/* ▲ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */

	logDebug("MailDraft_update[end] ret=".$ret);
	logDebug("----------");
	return $ret;
}


//--------------------------------------------------
//
//--------------------------------------------------
function putCLOB($dat){

	$clob = "";

	if(mb_strLen($dat) < 2000 ){
// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
		$clob = "TO_CLOB(".getSqlValue($dat).")";
// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka

	}else{
		$tmp = array();
		$c=0;
		$cmax=1990;
		$y=0;

		for($i=0;$i<mb_strLen($dat);$i++){
			$c++;
			$tmp[$y] .= mb_substr($dat, $i, 1);
			if($c>=$cmax){
				$c=0;
				$y++;
			}
		}

		for($i=0;$i<=$y;$i++){
			if($i>0){
				$clob .= " || ";
			}
// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
			$clob .= "TO_CLOB(".getSqlValue($tmp[$i]).")";
// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
		}
	}

	return $clob;
}


//--------------------------------------------------
//名称：メール下書き　削除
//関数：MailDraft_delete
//引数：
//戻値：
//概要：
//--------------------------------------------------
//HuyDV 2018/06/04 update start
function MailDraft_delete(&$con,$TantoCD,$GyoumuKbn,$MAILDRAFTCD, $mailTraceId = null){

	logDebug("MailDraft_delete[start]");

	//------------------------------
	//担当者チェック
	//------------------------------
	if(chkTantoCD($TantoCD)==false && !$mailTraceId){
		return false;
	}

	//------------------------------
	//
	//------------------------------
	if(!$MAILDRAFTCD && !$mailTraceId){
		return false;
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	if($mailTraceId && $GyoumuKbn == '29'){
		$sql  = "DELETE MAILDRAFT_TBL";
		$sql .= " WHERE ContactID = '".$mailTraceId."'";
	} else {
		$sql  = "DELETE MAILDRAFT_TBL";

		$sql .= " WHERE MAILDRAFTCD = '".$MAILDRAFTCD."'";
		$sql .= " AND   TantoCD     = '".$TantoCD."'";
		//$sql .= " AND   GyoumuKbn   = '".$GyoumuKbn."'";
	}
	//HuyDV 2018/06/04 update end
	logDebug("sql=".$sql);

	/* ▼ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */
	// DB接続・トランザクションをメソッドの外に移動
	//------------------------------
	//SQL実行
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}
	//dbClose($con);
	/* ▲ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */

	logDebug("MailDraft_delete[end] ret=".$ret);
	return $ret;
}

//--------------------------------------------------
//名称：レコードコミット
//関数：putDbRecord
//引数：
//戻値：
//概要：
//--------------------------------------------------
function putDbRecord($con,$sql){

	$ret = false;

	logDebug("bigin");
	dbBegin($con);

	$result = dbQuery($con, $sql,true);
	logDebug("result=".print_r($result,1));

	if($result){
		logDebug("commit");
		dbCommit($con);
		dbFreeResult($result);
		$ret = true;
	}else{
		logDebug("rollback");
		dbRollback($con);
	}

	return $ret;
}
//--------------------------------------------------
//名称：レコード登録（トランザクションなし）
//関数：putNoTransDbRecord
//引数：
//戻値：
//概要：
//--------------------------------------------------
function putNoTransDbRecord($con,$sql){

	//▼2014/11/07 R-#16058_MailOsusumeDetail_Tblへのデータ登録時のRollBack処理廃止(nul hatano)
	$result = dbQuery($con, $sql,false);
	//▲2014/11/07 R-#16058_MailOsusumeDetail_Tblへのデータ登録時のRollBack処理廃止(nul hatano)
	logDebug("result=".print_r($result,1));
	return $result;
}

//--------------------------------------------------
//名称：会員番号を８バイトで返す
//関数：putKainCD
//引数：
//戻値：
//概要：
//--------------------------------------------------
function putKainCD($kainno){

	logDebug("putKainCD[in] kainno=".$kainno);

	$tmp = '00000000'.trim($kainno);

	$ret = substr($tmp,-8,8);

	if($ret == "00000000"){
		$ret = "";
	}

	logDebug("putKainCD[out] kainno=".$ret);
	return $ret;
}

//--------------------------------------------------
//名称：
//関数：chkTantoCD
//引数：
//戻値：
//概要：
//--------------------------------------------------
function chkTantoCD($tantocd){
	$ret = false;
	if(strLen($tantocd)<=5){
		if (preg_match('/^[0-9]+$/', $tantocd) === 1) {
			$ret = true;
		}
	}
	if($ret==false){
		logDebug("tantocd=非対象者");
	}

	return $ret;
}

//▼2014/11/10 R-#16067_MailOsusumeDetail_Tblへのデータ登録時のRollBack処理廃止(nis tagomori)
//--------------------------------------------------
//名称：お勧めシーケンス番号取得
//関数：getMailOsusumeCD
//引数：なし
//戻値：お勧めシーケンス番号
//概要：
//--------------------------------------------------
function getMailOsusumeCD(){

	logDebug(__FUNCTION__.'[start]');

	$sql  = "select SEQ_MAILOSUSUMECD.NEXTVAL from dual";
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);
	$rows = getNumRows($result, $data_arr);
	if($rows>0){
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);
	}else{
		// シーケンス取得エラー
		return false;
	}

	dbFreeResult($result);
	dbClose($con);

	logDebug(__FUNCTION__.'[end]');
	return $ret['NEXTVAL'];

}
//▲2014/11/10 R-#16067_MailOsusumeDetail_Tblへのデータ登録時のRollBack処理廃止(nis tagomori)

//--------------------------------------------------
//名称：お勧め　新規登録
//関数：Osusume_insert
//引数：
//戻値：
//概要：
//--------------------------------------------------
//▼2014/11/10 R-#16067_MailOsusumeDetail_Tblへのデータ登録時のRollBack処理廃止(nis tagomori)
function MailOsusume_insert(&$con,$MailOsusumeCD,$TantoCD,$GyoumuKbn,$DraftData){
//▲2014/11/10 R-#16067_MailOsusumeDetail_Tblへのデータ登録時のRollBack処理廃止(nis tagomori)

	logDebug("MailOsusume_insert[start]");
	logDebug("DraftData[]=".print_r($DraftData,1));

	//------------------------------
	//担当者チェック
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return false;
	}

	//------------------------------
	//クエリー作成
	//------------------------------

	$sql  = "INSERT INTO MAILOSUSUME_TBL (";

	$sql .= " MailOsusumeCD";   //メールおすすめコード
	$sql .= ",TantoCD";         //担当コード
	$sql .= ",GyoumuKbn";       //業務区分
	$sql .= ",ContactID";       //接触ID

	$sql .= ",KaiinCD";         //お客様番号
	$sql .= ",SEND_DT";         //送信日
	$sql .= ",SEND_TM";         //送信時刻
	$sql .= ",TeikeiFlg";       //定型フラグ
	$sql .= ",SYNC_FLG";        //同期フラグ
	$sql .= ",DELETE_FLG";      //削除フラグ

	$sql .= ",UPDATE_DT";
	$sql .= ",REGIST_DT";
	$sql .= ",UPDATE_USER";
	$sql .= ",REGIST_USER";

	$sql .= ",KAIN_NAME";

	$sql .= " )VALUES( ";

	//▼2014/11/10 R-#16067_MailOsusumeDetail_Tblへのデータ登録時のRollBack処理廃止(nis tagomori)
	$sql .= " '".$MailOsusumeCD."'";
	//▲2014/11/10 R-#16067_MailOsusumeDetail_Tblへのデータ登録時のRollBack処理廃止(nis tagomori)

	$sql .= ",'".$TantoCD."'";

	$sql .= ",'".$GyoumuKbn."'";


	//▼2010/07/20 #xxxx お勧め情報会員名対応（kdl yoshii）
	if($GyoumuKbn=='18' || $GyoumuKbn=='19'){

		//▼2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
		//$tmpKainName = getOsusumeKainName($GyoumuKbn,$DraftData['gid']);
		//if($DraftData['gid']=='' || $DraftData['gid']=='0'){
		//    $tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
		//}else{
		//    $tmp = getKainno_pid($GyoumuKbn,$DraftData['gid']);
		//}
		//$tmpKainName = getOsusumeKainName2($tmp);
		$tmpGID = getPid_to_Gid($GyoumuKbn,$DraftData['pid']);
		if($tmpGID==0){
			$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
			$tmpContactID = $DraftData['pid'];
		}else{

			$tmpGID2 = getPid_to_Gid($GyoumuKbn,$tmpGID);

			if($tmpGID2==0){
				$tmp = getKainno_pid($GyoumuKbn,$tmpGID);
				$tmpContactID = $tmpGID;
			}else{
				$tmp = getKainno_pid($GyoumuKbn,$tmpGID2);
				$tmpContactID = $tmpGID2;
			}

		}
		$tmpKainName = getOsusumeKainName2($tmp);
		$tmpKainNo = $tmp;

		logDebug("=====");
		logDebug("gid=".$DraftData['gid']);
		logDebug("pid=".$DraftData['pid']);
		logDebug("tmpGID=".$tmpGID);
		logDebug("tmpGID2=".$tmpGID2);
		logDebug("tmpContactID=".$tmpContactID);
		logDebug("tmp=".$tmp);
		logDebug("=====");
		//▲2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）

	}else{
		$tmpKainName = trim($DraftData['mlName']);
	}
	//▲2010/07/20 #xxxx お勧め情報会員名対応（kdl yoshii）


	if($GyoumuKbn==18 || $GyoumuKbn==19){
		//▼2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
		//if($DraftData['pid']){
		//    $sql .= ",'".$DraftData['pid']."'";
		//}else{
		//    $sql .= ",null";
		//}
		//if($DraftData['gid']){
		//    $sql .= ",'".$DraftData['gid']."'";
		//}else{
		//    if($DraftData['pid']){
		//    $sql .= ",'".$DraftData['pid']."'";
		//    }else{
		//        $sql .= ",null";
		//    }
		//}
		if($tmpContactID==0){
			$sql .= ",null";
		}else{
			$sql .= ",'".$tmpContactID."'";
		}
		//▲2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）

	}else if($GyoumuKbn==21 || $GyoumuKbn==22){
		$sql .= ",'0'";
	// 2018/05/25 HuyDV start
	}else if($GyoumuKbn==29){
			if($DraftData['mailTraceId']){
				$sql .= ",'".$DraftData['mailTraceId']."'";
			}
	// 2018/05/25 HuyDV end
	}else{
		if($DraftData['econorderid']){
			$sql .= ",'".$DraftData['econorderid']."'";

		}else if($DraftData['cvid']){
			$sql .= ",'".$DraftData['cvid']."'";

		}else{
			$sql .= ",null";
		}
	}


	//▼2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
	//$tmp = putKainCD($DraftData['cd']);
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		//$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);

		//if($DraftData['gid']=='' || $DraftData['gid']=='0'){
		//    $tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
		//}else{
		//    $tmp = getKainno_pid($GyoumuKbn,$DraftData['gid']);
		//}

		$tmp = putKainCD($tmpKainNo);
	}else{
		$tmp = putKainCD($DraftData['cd']);
		if(!$tmp){
			$tmp = putKainCD($DraftData['KaiinCD']);
		}
	}
	//▲2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
	if($tmp){
		$sql .= ",'".$tmp."'";
	}else{
		$sql .= ",null";
	}

	$sql .= ",to_char(sysdate,'YYYYMMDD')";
	$sql .= ",to_char(sysdate,'hh24miss')";

	//▼R-#2921 定型個別20対応(1:定型 2:20対応 3:個別に変更) 2012/02/10 ul-fuse
	if($DraftData['TEIKEIFLG']=='1' || $DraftData['TEIKEIFLG']=='2' || $DraftData['TEIKEIFLG']=='3'){
	//▲R-#2921 定型個別20対応(1:定型 2:20対応 3:個別に変更) 2012/02/10 ul-fuse
		$sql .= ",'".$DraftData['TEIKEIFLG']."'";
	}else{
		$sql .= ",null";
	}

	$sql .= ",'0'";         //同期フラグ
	$sql .= ",'0'";         //削除フラグ
	$sql .= ",sysdate";
	$sql .= ",sysdate";
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);


	//▼2010/07/20 #xxxx お勧め情報会員名対応（kdl yoshii）
	if($tmpKainName){
		$sql .= ",'".$tmpKainName."'";
	}else{
		$sql .= ",null";
	}
	//▲2010/07/20 #xxxx お勧め情報会員名対応（kdl yoshii）


	$sql .= ")";

	logDebug("sql=".$sql);

	/* ▼ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */
	// DB接続・トランザクションをメソッドの外に移動
	//------------------------------
	//DB接続＆パース
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}

	//------------------------------
	//SQL実行
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}

	//------------------------------
	//DB切断
	//------------------------------
	//dbClose($con);
	/* ▲ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */

	logDebug("MailOsusume_insert[end] ret=".$ret);
	return $ret;
}

//--------------------------------------------------
//名称：お勧め　新規登録
//関数：Osusume_insert
//引数：
//戻値：
//概要：
//--------------------------------------------------
//▼2010/07/20 #xxxx お勧め情報会員名対応（kdl yoshii）
//function MailOsusumeDetail_insert($TantoCD,$MailOsusumeCD,$osusume){
function MailOsusumeDetail_insert(&$con,$TantoCD,$MailOsusumeCD,$osusume,$mstShohinCD,$shinkoku_flg){
//▲2010/07/20 #xxxx お勧め情報会員名対応（kdl yoshii）

	logDebug("MailOsusumeDetail_insert[start]");

	$ret = false;

	//▼2010/07/20 #xxxx お勧め情報会員名対応（kdl yoshii）
	//if(!$MailOsusumeCD || !$osusume){
	if(!$MailOsusumeCD){
		return $ret;
	}

	//$select_flg = '0';
	$keyword_flg = '0';
	if($osusume==$mstShohinCD){
		//$select_flg = '1';
		$keyword_flg = '1';
	}else{
		//お勧めされていない場合も空レコードを作成するのでその場合マスターの商品CDをセットする。
		$osusume = $mstShohinCD;
	}

	$select_flg = $shinkoku_flg;


	//▲2010/07/20 #xxxx お勧め情報会員名対応（kdl yoshii）

	//------------------------------
	//クエリー作成
	//------------------------------
	$sql  = "INSERT INTO MAILOSUSUMEDETAIL_TBL (";

	$sql .= " MailOsusumeCD";   //メールおすすめコード
	$sql .= ",SHOHIN_CD";       //商品ＣＤ
	$sql .= ",SELECT_FLG";      //申告フラグ
	$sql .= ",KEYWORD_FLG";     //文面キーワードフラグ
	$sql .= ",UPDATE_DT";
	$sql .= ",REGIST_DT";
	$sql .= ",UPDATE_USER";
	$sql .= ",REGIST_USER";

	$sql .= " )VALUES( ";

	$sql .= " '".$MailOsusumeCD."'";
	$sql .= ",'".$osusume."'";
	$sql .= ",'".$select_flg."'";
	$sql .= ",'".$keyword_flg."'";
	$sql .= ",sysdate";
	$sql .= ",sysdate";
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);

	$sql .= ")";


	/* ▼ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */
	// DB接続・トランザクションをメソッドの外に移動
	//------------------------------
	//DB接続＆パース
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		//dbRollback($con);
		return false;
	}

	//------------------------------
	//SQL実行
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		//dbRollback($con);
		return false;
	}

	//------------------------------
	//DB切断
	//------------------------------
	//dbClose($con);
	/* ▲ #1492 WEB管理ツール成績未計上対応 EC-One Soga 2011-03-29 */

	logDebug("MailOsusumeDetail_insert[end] ret=".$ret);
	return $ret;
}



//▼2010/07/20 #xxxx お勧め情報会員名対応（kdl yoshii）
//--------------------------------------------------
//名称：
//関数：
//引数：
//戻値：
//概要：
//--------------------------------------------------
function getOsusumeKainName($GyoumuKbn,$id){

	logDebug("getOsusumeKainName[start]");
	logDebug("GyoumuKbn=".$GyoumuKbn);
	logDebug("id=".$id);



	$tmpKAIN_NAME = "";

	if(!$id || $id=='0'){
		return $tmpKAIN_NAME;
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	if($GyoumuKbn==18){
		$sql  = "select CONTRIBUTOR from cbbs_hada_tbl   where pid='".$id."' and admin_kbn='0'";
	}
	if($GyoumuKbn==19){
		$sql  = "select CONTRIBUTOR from cbbs_hiroba_tbl where pid='".$id."' and admin_kbn='0'";
	}

	logDebug("sql=".$sql);


	//------------------------------
	//DB接続＆パース
	//------------------------------
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);


	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);

	if($rows>0){
		//------------------------------
		//データ取得
		//------------------------------
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);

		$tmpKAIN_NAME = $ret['CONTRIBUTOR'];

	}
	dbFreeResult($result);

	//------------------------------
	//DB切断
	//------------------------------
	dbClose($con);


	logDebug("getOsusumeKainName[end] tmpKAIN_NAME=".$tmpKAIN_NAME);
	return $tmpKAIN_NAME;
}

//▼2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
//--------------------------------------------------
//名称：
//関数：
//引数：
//戻値：
//概要：会員番号から会員テーブルのお名前を取得する。
//--------------------------------------------------
function getOsusumeKainName2($kno){

	logDebug("getOsusumeKainName2[start]");
	logDebug("kdno=".$kno);

	$tmpKAIN_NAME = "";

	if(!$kno || $kno=='0'){
		return $tmpKAIN_NAME;
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	$sql  = "select stfunc_ssk(KAIN_NAME) KAIN_NAME from member_tbl where kainno='".$kno."'";

	logDebug("sql=".$sql);


	//------------------------------
	//DB接続＆パース
	//------------------------------
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);


	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);

	if($rows>0){
		//------------------------------
		//データ取得
		//------------------------------
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);

		$tmpKAIN_NAME = $ret['KAIN_NAME'];

	}
	dbFreeResult($result);

	//------------------------------
	//DB切断
	//------------------------------
	dbClose($con);


	logDebug("getOsusumeKainName2[end] tmpKAIN_NAME=".$tmpKAIN_NAME);
	return $tmpKAIN_NAME;
}
//▲2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
//▲2010/07/20 #xxxx お勧め情報会員名対応（kdl yoshii）


function checkOsusumeKeyword($mlBody,$idx){


	global $OSUSUME_1_KEYWORD;
	global $OSUSUME_2_KEYWORD;
	global $OSUSUME_3_KEYWORD;
	global $OSUSUME_4_KEYWORD;
	global $OSUSUME_5_KEYWORD;
	global $OSUSUME_6_KEYWORD;
	global $OSUSUME_7_KEYWORD;
	global $OSUSUME_8_KEYWORD;
	global $OSUSUME_9_KEYWORD;
	// ▼R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
	global $OSUSUME_10_KEYWORD;
	// ▲R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
	global $MailDraft_conf;

	$dat = array();

	if($idx==1){
		$dat = $OSUSUME_1_KEYWORD;
	}
	if($idx==2){
		$dat = $OSUSUME_2_KEYWORD;
	}
	if($idx==3){
		$dat = $OSUSUME_3_KEYWORD;
	}
	if($idx==4){
		$dat = $OSUSUME_4_KEYWORD;
	}
	if($idx==5){
		$dat = $OSUSUME_5_KEYWORD;
	}
	if($idx==6){
		$dat = $OSUSUME_6_KEYWORD;
	}
	if($idx==7){
		$dat = $OSUSUME_7_KEYWORD;
	}
	if($idx==8){
		$dat = $OSUSUME_8_KEYWORD;
	}
	if($idx==9){
		$dat = $OSUSUME_9_KEYWORD;
	}
	// ▼R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
	if($idx==10){
		$dat = $OSUSUME_10_KEYWORD;
	}
	// ▲R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi


	//echo "<br>OSUSUME_8_KEYWORD[]=".print_r($OSUSUME_8_KEYWORD,1);
	//echo "<br>dat[]=".print_r($dat,1);
	//echo "<br>mlBody=".$mlBody;

	$ret = '';
	foreach( $dat as $key_word ){

		$pos = strpos($mlBody,$key_word);

		//echo "<br>key_word=".$key_word;
		//echo "<br>pos=".$pos;

		if($pos===false){
		}else{
			$ret = $MailDraft_conf['SHOHIN'][$idx];
			break;
		}
	}

	return $ret;
}

//--------------------------------------------------
//名称：下書きシーケンス取得
//関数：getMailDraftCD
//引数：なし
//戻値：MailDraft_Tbl.MailDraftCDの最大値
//概要：
// #1238 メール送信機能全てから、アドバイスページ作成を可能に 2010/08/16 kdl-uchida
//--------------------------------------------------
function getMailDraftCD(){

	logDebug(__FUNCTION__.'[start]');

	$sql  = "select SEQ_MAILDRAFTCD.NEXTVAL from dual";
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);
	$rows = getNumRows($result, $data_arr);
	if($rows>0){
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);
	}else{
		// シーケンス取得エラー
		return false;
	}

	dbFreeResult($result);
	dbClose($con);

	logDebug(__FUNCTION__.'[end]');
	return $ret['NEXTVAL'];

}
//▼2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）
//--------------------------------------------------
//名称：
//関数：
//引数：
//戻値：
//概要：pidにて掲示板（お悩み相談室・おしゃべり広場）の会員番号を取得する。
//--------------------------------------------------
function getKainno_pid($GyoumuKbn,$pid){

	logDebug("getKainno_pid[start]");
	logDebug("GyoumuKbn=".$GyoumuKbn);
	logDebug("pid=".$pid);

	$tmpKAINNO = "";
	if($GyoumuKbn==18 || $GyoumuKbn==19){
	}else{
		return $tmpKAINNO;
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	if($GyoumuKbn==18){
		$sql  = "select KAINNO from CBBS_Hada_Tbl   where PID='".$pid."' ";
	}
	if($GyoumuKbn==19){
		$sql  = "select KAINNO from CBBS_Hiroba_Tbl where PID='".$pid."' ";
	}

	logDebug("sql=".$sql);


	//------------------------------
	//DB接続＆パース
	//------------------------------
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);


	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);

	if($rows>0){
		//------------------------------
		//データ取得
		//------------------------------
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);

		$tmpKAINNO  = $ret['KAINNO'];
	}
	dbFreeResult($result);

	//------------------------------
	//DB切断
	//------------------------------
	dbClose($con);


	logDebug("getKainno_pid[end] tmpKAINNO=".$tmpKAINNO);
	return $tmpKAINNO;
}

//--------------------------------------------------
//名称：
//関数：
//引数：
//戻値：
//概要：pidにて掲示板（お悩み相談室・おしゃべり広場）のGIDを取得する。
//--------------------------------------------------
function getPid_to_Gid($GyoumuKbn,$pid){

	logDebug("getPid_to_Gid[start]");
	logDebug("GyoumuKbn=".$GyoumuKbn);
	logDebug("pid=".$pid);

	$tmpGID = "";
	if($GyoumuKbn==18 || $GyoumuKbn==19){
	}else{
		return $tmpGID;
	}

	//------------------------------
	//クエリー作成
	//------------------------------
	if($GyoumuKbn==18){
		$sql  = "select GID from CBBS_Hada_Tbl   where pid='".$pid."' ";
	}
	if($GyoumuKbn==19){
		$sql  = "select GID from CBBS_Hiroba_Tbl where pid='".$pid."' ";
	}

	logDebug("sql=".$sql);


	//------------------------------
	//DB接続＆パース
	//------------------------------
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);


	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);

	if($rows>0){
		//------------------------------
		//データ取得
		//------------------------------
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);

		$tmpGID  = $ret['GID'];
	}
	dbFreeResult($result);

	//------------------------------
	//DB切断
	//------------------------------
	dbClose($con);


	logDebug("getPid_to_Gid[end] tmpGID=".$tmpGID);
	return $tmpGID;
}

//▲2011/01/19 #xxxx 会員番号保存対応（EC-One yoshii）


?>
