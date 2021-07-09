<?php
/**
 *
 * common.inc.php
 * コンテンツ共通関数ファイル
 *
 */

//require_once('cysk.inc.php');
require_once dirname(__FILE__) . '/../CYUtilsCrypt.inc.php';
//require_once dirname(__FILE__) . '/token.inc.php';

// CSRF対策用トークン定数
define( 'DEF_TOKEN', 'ssktoken' );

// リクエスト情報をチェック済みのものにする
//$_REQUEST = $COM_PARAM;

//UID初期化
$uid  = "";
$cysk = "";
$pg_param_tmp = "";
if (isset($_pg) && $_pg != "") {
	$pg_param_tmp = "&pg=".$_pg;
}

//DB接続フラグが「true」の場合はDB接続を行なう
if ($SSK_DB_CONNECT_FLG) {
	//DB接続
	//$con = dbConnect();
	$con = pdoConnect();
}

$SSK_SYSTEM_STATUS = fncChkMaintenance($con);
//メンテナンス時
if ($SSK_MAINTE_FLG && $SSK_SYSTEM_STATUS == "9") {
	$maintenance_page = "/maintenance.html";
	$script_name = '';
	if (isset($_SERVER['SCRIPT_NAME'])) {
		$script_name = $_SERVER['SCRIPT_NAME'];
	}

	if ($maintenance_page !== $script_name) {
		//メンテナンス中画面を表示
		header("Location: " . $maintenance_page);
		exit;
	}
}

//include_once $LIB_PATH."/".$SSK_SITE_DIR_NAME."/session.inc.php";

/**
 * ログイン済みでなければログイン画面へリダイレクトして処理を終了する
 */
function checkMember(){
	global $SSL_URL;
	if( ! loginChk() ){
		header("Location: " . $SSL_URL . "/domo/login/index.html");
		exit;
	}
}

/**
 * SSL通信でなければSSLプロトコルに転送する。GETは引き継ぐがPOSTは引き継がれない。
 */
function forceSSL() {
	global $SSK_DC_FLAG;
	if( $SSK_DC_FLAG == true ) {
		if( $_SERVER['SERVER_PORT'] == '80' ){
			$url = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			logDebug(__FUNCTION__.' redirect='.$url);
			header('Location: ' . $url);
			exit;
		}
	}
}


/**
 * MEMBER_ID取得　未使用
 *
 * @param mixed  $con            DBコネクションID
 * @param string $nmid           ネットメンバーID
 *
 * @return boolean true=成功、false=エラー
 */
Function fncGetMemberId($con,$nmid) {

	if (!$con) {
		return false;
	}

	$member_id = '';

	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	/* $sql  = "SELECT ";
	$sql .= " MEMBER_ID ";
	$sql .= " FROM MEMBER_TBL ";
	//$sql .= " WHERE NETMEMBER_ID = ".getSqlValue($nmid);
	$sql .= " WHERE NETMEMBER_ID = :bind_nmid";
	//$result = dbQuery($con, $sql); */
	$sql = "SELECT ";
		$sql .= "mbr_seq as MEMBER_ID  ";
	$sql .= "FROM ";
		$sql .= "m_net_mbr  ";
	$sql .= "WHERE ";
		$sql .= "net_mbr_cd = :bind_nmid ";

	//$result = ssk_db_parse($con, $sql);
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
	$result = $con->prepare($sql);
	//ssk_db_bind_by_name($result,":bind_nmid",$nmid,-1);
	$result->bindParam(":bind_nmid", $nmid, PDO::PARAM_STR);
	//ssk_db_execute($result);
	$result->execute();

	//$data_arr = array();
	//$rows = getNumRows($result, $data_arr);
	$rows = $result->rowCount();
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $data_arr);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
		$member_id = $row['MEMBER_ID'];
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//dbFreeResult($result);
	pdoFreeResult($result);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan

	if ($member_id == '' || $member_id == NULL) {
		return false;
	}

	return $member_id;

}

/**
 * 消費税率取得
 *
 * @param string $con DB接続ID
 *
 * @return string 消費税率
 */
Function fncGetTax($con) {

	$tax = "";

	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//▼2009/03/19 #xxx モバイル対応(kdl yoshii)
	//$sql = "SELECT TAX_RATE FROM SYSTEM_TBL ";
	//$sql = "SELECT TAX_RATE FROM SYSTEM_TBL where site_kbn='1'";
	//▲2009/03/19 #xxx モバイル対応(kdl yoshii)

	$sql = "SELECT ";
		$sql .= "tax_rate as TAX_RATE  ";
	$sql .= "FROM ";
		$sql .= "m_sys_set  ";
	$sql .= "where ";
		$sql .= "site_kbn = '1' ";
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan

	$result = dbQuery($con, $sql);
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//$data_arr = array();
	//$rows = getNumRows($result, $data_arr);
	$rows = getNumRows($result);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $data_arr);
		$row = dbFetchRow($result);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
		$tax = $row['TAX_RATE'];
	}
	dbFreeResult($result);

	return $tax;

}

/**
 * 操作状態記録テーブルにデータを登録
 *
 * @param mixed  $con            DBコネクションID
 * @param int    $memid          会員通番
 * @param string $trankbn        処理区分
 * @param string $sesid          セッションID
 * @param string $ordid          受注ID
 * @param string $tran_flg       DBトランザクションフラグ
 *
 * @return boolean true=成功、false=エラー
 */
Function fncInsOperetionTracks($con,$memid,$trankbn,$sesid,$ordid='',$tran_flg=null,$error_cd='') {

	global $ERROR_DETAIL, $SITE_KBN;

	if (isset($error_cd) && $error_cd != "") {
		$error_detail = $ERROR_DETAIL[$error_cd];
	} else {
		$error_detail = "";
	}

	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	/* $sql  = "INSERT INTO OPERATIONTRACKS_TBL (";
	$sql .= " MEMBER_ID";
	$sql .= ",TRANSACTION_DT";
	$sql .= ",TRANSACTION_KBN";
	$sql .= ",SESSION_ID";
	if ($ordid != "") {
		$sql .= ",RECV_ORDER_ID";
	}
	if ($error_cd != "") {
		$sql .= ",ERROR_CD";
		$sql .= ",ERROR_DETAILS";
	}
	$sql .= ",SYNC_FLG";
	$sql .= ",SITE_KBN";
	$sql .= ",REGIST_USER";
	$sql .= ",UPDATE_USER";
	$sql .= " ) VALUES ( ";
	$sql .= " :memid";
	$sql .= ",SYSDATE";
	$sql .= ",:trankbn";
	$sql .= ",:sesid";
	if ($ordid != "") {
		$sql .= ",:ordid";
	}
	if ($error_cd != "") {
		$sql .= ",:error_cd";
		$sql .= ",:error_detail";
	}
	$sql .= ",'0'";
	$sql .= ",'".$SITE_KBN."'";
	$sql .= ",'".$_SERVER['SCRIPT_NAME']."'";
	$sql .= ",'".$_SERVER['SCRIPT_NAME']."'";
	$sql .= ")"; */

	$sql  = "INSERT INTO h_operat (";
	$sql .= "  mbr_seq";
	$sql .= ", proc_dt_tm";
	$sql .= ", proc_kbn";
	$sql .= ", session_id";
	if ($ordid != "") {
		$sql .= ", odr_cd";
	}
	if ($error_cd != "") {
		$sql .= ", err_cd";
		$sql .= ", err_dtl";
	}
	$sql .= ", sync_flg";
	$sql .= ", site_kbn";
	$sql .= ", register_user_cd";
	$sql .= ", update_user_cd";
	$sql .= " ) VALUES ( ";
	$sql .= " :memid";
	$sql .= ", CURRENT_TIMESTAMP (0)";
	$sql .= ",:trankbn";
	$sql .= ",:sesid";
	if ($ordid != "") {
		$sql .= ",:ordid";
	}
	if ($error_cd != "") {
		$sql .= ",:error_cd";
		$sql .= ",:error_detail";
	}
	$sql .= ",'0'";
	$sql .= ",'".$SITE_KBN."'";
	$sql .= ",'".$_SERVER['SCRIPT_NAME']."'";
	$sql .= ",'".$_SERVER['SCRIPT_NAME']."'";
	$sql .= ")";
	//$result = dbQuery($con, $sql, $tran_flg);
	//$result = ssk_db_parse($con, $sql);
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
	$result = $con->prepare($sql);
	// ssk_db_bind_by_name($result,":memid",$memid,-1);
	// ssk_db_bind_by_name($result,":trankbn",$trankbn,-1);
	// ssk_db_bind_by_name($result,":sesid",$sesid,-1);
	$result->bindParam(":memid", $memid, PDO::PARAM_INT);
	$result->bindParam(":trankbn", $trankbn, PDO::PARAM_STR);
	$result->bindParam(":sesid", $sesid, PDO::PARAM_STR);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	if ($ordid != "") {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
		// ssk_db_bind_by_name($result,":ordid",$ordid,-1);
		$result->bindParam(":ordid", $ordid, PDO::PARAM_INT);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	}
	if ($error_cd != "") {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
		// ssk_db_bind_by_name($result,":error_cd",$error_cd,-1);
		// ssk_db_bind_by_name($result,":error_detail",$error_detail,-1);
		$result->bindParam(":error_cd", $error_cd, PDO::PARAM_STR);
		$result->bindParam(":error_detail", $error_detail, PDO::PARAM_STR);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//ssk_db_execute($result);
	$result->execute();
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan

	if (!$result) {
		return false;
	} else {
		return true;
	}

}

/**
 * ログイン状態チェック
 *
 * @return boolean true=ログイン中、false=未ログイン
 */
Function fncChkLogin() {

	if (isset($_REQUEST['cysk']) && $_REQUEST['cysk'] != "") {
		return true;
	} else {
		return false;
	}

}

/**
 * ユーザー情報取得
 *
 * @param mixed  $con            DBコネクションID
 * @param string $nmid           ネットメンバーID
 * @param array  $arr_clum_list  カラム名リスト
 *
 * @return array データが存在する場合はデータが配列に入る
 */
Function fncGetSskMember($con,$nmid,$arr_clum_list) {

	global $salt, $seed, $vector, $dec, $error_code;

	$arr_data_list = array();
	$arr_data_list['FNC_STATUS'] = false;
	$arr_data_list['DATA_ROWS']  = 0;

	if (!$con) {
		return false;
	}

	if (count($arr_clum_list) < 0) {
		return false;
	}

	$constr = " ";

	$sql  = "SELECT ";
	for ($i=0;$i<count($arr_clum_list);$i++) {
		$cl_name = explode("\.",$arr_clum_list[$i]);
		$date_flg = false;
		if ($cl_name[1] == "UPDATE_DT"
			|| $cl_name[1] == "REGIST_DT"
			|| $cl_name[1] == "POINT_YMD"
			|| $cl_name[1] == "LAST_ORDER_RECV_DT"
			|| $cl_name[1] == "LAST_ORDER_DELIVERY_DT"
			|| $cl_name[1] == "LAST_DELIVERY_FINISHED_DT"
			|| $cl_name[1] == "SHIP_DT"
			|| $cl_name[1] == "H_DLV_END_DT"
			|| $cl_name[1] == "LAST_LOGIN_DT") {
			$date_flg = true;
		}
		if ($date_flg)  {
			$sql .= $constr."TO_CHAR(".$arr_clum_list[$i].",'YYYYMMDDHH24MISS') AS ".$cl_name[1];
		} else {
			$sql .= $constr.$arr_clum_list[$i]." AS ".$cl_name[1];
		}
		$constr = ",";
	}
	$sql .= " FROM MEMBER_TBL,WEBPROFILE_TBL";
	$sql .= " WHERE MEMBER_TBL.MEMBER_ID = WEBPROFILE_TBL.MEMBER_ID(+)";
	$sql .= " AND MEMBER_TBL.NETMEMBER_ID = :nmid ";
	$result = ssk_db_parse($con, $sql);
	if (!$result) {
		return $arr_data_list;
	}
	ssk_db_bind_by_name($result, ":nmid", $nmid, -1);
	ssk_db_execute($result);

	$arr = array();
	$rows = getNumRows($result, $arr);

	$arr_data_list['DATA_ROWS']  = $rows;
	if ($rows > 0) {
		$row = dbFetchRow($result, 0, $arr);
		for ($i=0;$i<count($arr_clum_list);$i++) {
			$cl_name = explode("\.",$arr_clum_list[$i]);
			//20070724 追加
			if ($cl_name[1] == "TEL_NO"
				|| $cl_name[1] == "NETMEMBER_PW"
				|| $cl_name[1] == "KAIN_NAME"
				|| $cl_name[1] == "EMAIL"
				|| $cl_name[1] == "M_EMAIL"
				|| $cl_name[1] == "NAMEKANA"
				|| $cl_name[1] == "NAMEKANJI"
				|| $cl_name[1] == "H_KANA_ADDRESS"
				|| $cl_name[1] == "H_KNJ_ADDRESS"
				|| $cl_name[1] == "H_NOT_CONV"
				|| $cl_name[1] == "B_KNJ_ADDRESS"
				|| $cl_name[1] == "B_NOT_CONV"
				|| $cl_name[1] == "B_TEL_NO"
				|| $cl_name[1] == "BIRTHDAY"
				|| $cl_name[1] == "CC_NO"
				|| $cl_name[1] == "CC_NAME"
				|| $cl_name[1] == "LAST_CC_NO"
				|| $cl_name[1] == "LAST_CC_NAME"
				|| $cl_name[1] == "LAST_TMP_ADDRESS_KANA"
				|| $cl_name[1] == "LAST_TMP_ADDRESS_KANJI") {
				$arr_data_list[$cl_name[1]] = ssk_crypt_decrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, $vector,trim($row[$cl_name[1]]), $dec, $error_code);
			} else {
				$arr_data_list[$cl_name[1]] = $row[$cl_name[1]];
			}
		}
	} else {
		$arr_data_list['FNC_STATUS'] = true;
		$arr_data_list['DATA_ROWS']  = 0;
	}
	dbFreeResult($result);

	return $arr_data_list;

}

/**
 * ポイント取得
 *
 * @param mixed  $con       DBコネクションID
 * @param string $kain_no   会員番号
 * @param string $zan_point ポイント
 *
 * @return int 加減算後のポイント
 */
Function fncGetSskPoint($con,$kain_no,$zan_point=0) {

	if (!$con) {
		return false;
	}

	$point = $zan_point;
	if (strlen($point) <= 0) {
		$point = 0;
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	/* $sql  = "SELECT POINT, OPOINT, UPOINT ";
	$sql .= "FROM RECVORDER_TBL ";
	//$sql .= "WHERE KAINNO = ".getSqlValue($kain_no)." ";
	$sql .= "WHERE KAINNO = :kain_no ";
	$sql .= "AND HOST_FLG = '0' ";
	$sql .= "AND DELETE_FLG = '0' ";
	//$result = dbQuery($con, $sql);
	$result = ssk_db_parse($con, $sql);
	ssk_db_bind_by_name($result,":kain_no",$kain_no,-1);
	ssk_db_execute($result); */

	$sql = "SELECT ";
		$sql .= "accumulation_point as POINT ";
		$sql .= ", this_time_buy_point as OPOINT ";
		$sql .= ", this_time_use_point as UPOINT  ";
	$sql .= "FROM ";
		$sql .= "f_odr_h  ";
	$sql .= "WHERE ";
		$sql .= "cust_no = :kain_no ";
		$sql .= "AND core_sys_kbn = '0'  ";
		$sql .= "AND del_flg = '0' ";

		$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
		$result = $con->prepare($sql);
		$result->bindParam(":kain_no", $kain_no, PDO::PARAM_INT);
		$result->execute();	
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	if (!$result) {
		return false;
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//$arr = array();
	//$rows = getNumRows($result, $arr);
	$rows = $result->rowCount();
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $arr);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
//		$point  = $row['POINT'];
		$opoint = $row['OPOINT'];
		$upoint = $row['UPOINT'];

		$point += $opoint;
		$point -= $upoint;
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//dbFreeResult($result);
	pdoFreeResult($result);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	return $point;
}

/**
 * 世代取得
 *
 * @return string generation
 */
function fncGetGeneration() {

	global $CARRIER_ID,$USER_AGENT_DEF;

	$generation = "";

	$user_agent = $USER_AGENT_DEF;

/*
	if ($mobile_name == "V802SE") {
		$generation = "W";
	} else*/
	if (preg_match("/^Vodafone/i", $user_agent)) {
		$generation = "3GC";
	} elseif (preg_match("/^MOT/i", $user_agent)) {
		$generation = "3GC";
	} elseif (preg_match("/^SoftBank/i", $user_agent)) {
		$generation = "3GC";
	} elseif (preg_match("/^J-PHONE\/9./i", $user_agent)) {
		$generation = "3GC";
	} elseif (preg_match("/^J-PHONE\/5./i", $user_agent)) {
		$generation = "W";
	} elseif (preg_match("/^J-PHONE\/4./i", $user_agent)) {
		$generation = "P";
	} elseif (preg_match("/^J-PHONE\/3./i", $user_agent)) {
		$generation = "C";
	} elseif (preg_match("/^J-PHONE\/2./i", $user_agent)) {
		$generation = "C";
	}

	return $generation;
}

/**
 * mailto取得
 *
 * @param string $to			TO
 * @param string $subject	件名
 * @param string $body		本文
 * @param string $link_name	リンク名
 *
 * @return string mailto
 */
Function fncGetMailto($to, $subject, $body, $link_name) {

	global $CARRIER_ID,$USER_AGENT_DEF;

	$mailto = "";

	// 端末世代取得
	$generation = fncGetGeneration();

	//半角カナを全角カナに変換する
	$subject = mb_convert_kana($subject, "KV");
	$body = mb_convert_kana($body, "KV");

	if ($CARRIER_ID == "i" || $CARRIER_ID == "e") {
		$subject = urlencode($subject);
		$body = urlencode($body);
	}

	$mailto .= $to;

	$mailbody = "";

	//20070313 odakura SoftbankC型(J-SH04)のメーラー起動Subject設定問題対応
	if ($CARRIER_ID == "v" && $generation == "C") {
		$subject = '';
	}

	if ($CARRIER_ID == "i" || $CARRIER_ID == "e" || ($CARRIER_ID == "v" && $generation == "3GC")) {
		$connect = "?";
		if ($subject != "") {
			$mailto .= $connect . "subject=" . $subject;
			$connect = "&";
		}
		if ($body != "") {
			$mailto .= $connect . "body=" . $body;
			$connect = "&";
		}
	} else {
		$connect = "?";
		if ($subject != "") {
			$mailto .= $connect . "subject=" . $subject;
			$connect = "&";
		}
		if ($body != "") {
			$mailbody .= " mailbody=\"" . $body . "\"";
			$connect = "&";
		}
	}

		$mailto = "<a href=\"mailto:" . $mailto . "\"" . $mailbody . ">" . $link_name . "</a>";

	return $mailto;
}

/**
 * メンテナンス・オフラインチェック
 *
 * @param string $con DB接続ID
 *
 * @return string ステータス
 */
Function fncChkMaintenance($con=false) {

	$status = "1";

	$con_flg = false;

	if (!$con) {
		//DB接続(関数内のみで使用)
		$con = dbConnect();
		$con_flg = true;
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	/* //▼2009/03/19 #xxx モバイル対応(kdl yoshii)
	//$sql = "SELECT STATUS FROM SYSTEM_TBL ";
	$sql = "SELECT STATUS FROM SYSTEM_TBL where site_kbn='1'";
	//▲2009/03/19 #xxx モバイル対応(kdl yoshii)
 */
	$sql = "SELECT ";
		$sql .= "stat_kbn as STATUS  ";
	$sql .= "FROM ";
		$sql .= "m_sys_set  ";
	$sql .= "where ";
		$sql .= "site_kbn = '1' ";
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan

	$result = dbQuery($con, $sql);
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//$data_arr = array();
	//$rows = getNumRows($result, $data_arr);
	$rows = getNumRows($result);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $data_arr);
		$row = dbFetchRow($result);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
		$status = $row['STATUS'];
	}
	dbFreeResult($result);

	if ($con_flg) {
		//DB切断
		dbClose($con);
	}

	return $status;

}

/**
 * オフライン時メッセージ取得
 *
 * @param string $con DB接続ID
 *
 * @return string メッセージ
 */
Function fncGetOfflineMessage($con=false) {

	global $getDateyyyymmddhhiiss, $OFFLINE_MESSAGE_ID;

	$offline_messag = array();

	$con_flg = false;

	if (!$con) {
		//DB接続(関数内のみで使用)
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
		//$con = dbConnect();
		$con = pdoConnect();
		$con_flg = true;
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	/* $sql  = "SELECT MESSAGE_TITLE, MESSAGE_BODY FROM MSTMESSAGE_TBL ";
	$sql .= "WHERE DISP_FLG = 1 ";
	//$sql .= "AND TO_CHAR(START_DT, 'YYYYMMDDHH24MISS') <= " . getSqlValue($getDateyyyymmddhhiiss) . " ";
	$sql .= "AND TO_CHAR(START_DT, 'YYYYMMDDHH24MISS') <= :yyymmddhhiiss ";
	//$sql .= "AND TO_CHAR(END_DT, 'YYYYMMDDHH24MISS') >= " . getSqlValue($getDateyyyymmddhhiiss) . " ";
	$sql .= "AND TO_CHAR(END_DT, 'YYYYMMDDHH24MISS') >= :yyymmddhhiiss ";
	//$sql .= "AND MESSAGE_ID = " . getSqlValueNum($OFFLINE_MESSAGE_ID);
	$sql .= "AND MESSAGE_ID = :OFFLINE_MESSAGE_ID"; */

	$sql = "SELECT ";
		$sql .= "msg_title as MESSAGE_TITLE ";
		$sql .= ", msg_body_letter as MESSAGE_BODY  ";
	$sql .= "FROM ";
		$sql .= "m_msg  ";
	$sql .= "WHERE ";
		$sql .= "disp_flg = 1  ";
		$sql .= "AND TO_CHAR(disp_start_dt_tm, 'YYYYMMDDHH24MISS') <= :yyymmddhhiiss  ";
		$sql .= "AND TO_CHAR(disp_end_dt_tm, 'YYYYMMDDHH24MISS') >= :yyymmddhhiiss  ";
		$sql .= "AND msg_seq = :OFFLINE_MESSAGE_ID ";
	//$result = dbQuery($con, $sql);
	//$result = ssk_db_parse($con, $sql);
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
    $result = $con->prepare($sql);
	// ssk_db_bind_by_name($result,":yyymmddhhiiss",$getDateyyyymmddhhiiss,-1);
	// ssk_db_bind_by_name($result,":OFFLINE_MESSAGE_ID",$OFFLINE_MESSAGE_ID,-1);
	$result->bindParam(":yyymmddhhiiss", $getDateyyyymmddhhiiss, PDO::PARAM_STR );
	$result->bindParam(":OFFLINE_MESSAGE_ID", $OFFLINE_MESSAGE_ID, PDO::PARAM_STR );
	//ssk_db_execute($result);
	$result->execute();
	//$data_arr = array();
	//$rows = getNumRows($result, $data_arr);
	$rows = $result->rowCount();
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $data_arr);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
		$offline_messag['title'] = $row['MESSAGE_TITLE'];
		$offline_messag['body'] = $row['MESSAGE_BODY'];
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//dbFreeResult($result);
	pdoFreeResult($result);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan

	if ($con_flg) {
		//DB切断
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
		//dbClose($con);
		pdoClose($con);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	}

	return $offline_messag;

}

/**
 * 和暦生年月日の整合性をチェック
 *
 * @param mixed  $con        DBコネクションID
 * @param string $nengo      年号フラグ(0:昭和、1:大正、2:平成)
 * @param string $comp_date  和暦生年月日(YYMMDD)
 *
 * @return boolean true=正常、false=エラー
 */
Function fncChkBirth($con,$nengo,$comp_date) {

	global $SSK_ARR_BIRTH_CHK_DATE_FROM;
	global $SSK_ARR_BIRTH_CHK_DATE_TO;
	global $SSK_ARR_BIRTH_CHK_WAREKI_TO;

	if ($nengo == "" || $comp_date == "") {
		return false;
	}

	if (strlen($comp_date) != 6 || !is_numeric($comp_date)) {
		return false;
	}

	$chkDateFrom = $SSK_ARR_BIRTH_CHK_DATE_FROM[$nengo];
	$chkDateTo   = $SSK_ARR_BIRTH_CHK_DATE_TO[$nengo];
	$WarekiTo   = $SSK_ARR_BIRTH_CHK_WAREKI_TO[$nengo];

	if ($chkDateTo == "") {
		$chkDateTo = date('Ymd');
	}
	if ($WarekiTo == "") {
		$WarekiTo = intval(date('Y')) - intval(substr($chkDateFrom,0,4)) + 1;
		//20歳対応は？
	}

	$chkFromYear  = intval(substr($chkDateFrom,0,4));
	$chkFromMonth = intval(substr($chkDateFrom,4,2));
	$chkFromDay   = intval(substr($chkDateFrom,6,2));

	$chkToYear  = intval(substr($chkDateTo,0,4));
	$chkToMonth = intval(substr($chkDateTo,4,2));
	$chkToDay   = intval(substr($chkDateTo,6,2));

	//入力された生年月日(和暦コード + 和暦年 + MMDD)
	$compYear  = intval(substr($comp_date,0,2));
	$compMonth = intval(substr($comp_date,2,2));
	$compDay   = intval(substr($comp_date,4,2));

	if ($compYear > $WarekiTo || $compYear == "00") {
		return false;
	}

	if (($compYear == $WarekiTo) && ($compMonth > $chkToMonth)) {
		//生年月日を正しく入力ください。
		return false;
	} else if (($compYear == $WarekiTo) && ($compMonth == $chkToMonth) && ($compDay > $chkToDay)) {
		//生年月日を正しく入力ください。
		return false;
	} else if (($compYear == 1) && ($compMonth < $chkFromMonth)) {
		//生年月日を正しく入力ください。
		return false;
	} else if (($compYear == 1) && ($compMonth == $chkFromMonth) && ($compDay < $chkFromDay)) {
		//生年月日を正しく入力ください。
		return false;
	}

	//エラーがない場合は日付妥当性チェック
	$compYear = $compYear + ($chkFromYear - 1);

	if (!checkdate($compMonth, $compDay, $compYear)) {
		return false;
	}

	return true;
}

/**
 * 電話番号の整合性をチェック
 *
 * @param mixed  $con        DBコネクションID
 * @param string $strTelNO   電話番号
 *
 * @return boolean true=正常、false=エラー
 */
Function fncChkTelNo($con,$strTelNO, $strict = false) {

logDebug(__FUNCTION__."($strTelNO)");
	$intLength = strlen($strTelNO);

	if ($intLength < 10) {
		//電話番号の桁数が足りません
		return false;
	} elseif ($intLength > 13) {
		//電話番号の桁数が多すぎます
		return false;
	}

	if (substr($strTelNO,0,1) != "0") {
		//市外局番から入力して下さい
		return false;
	}

	//「-」を抜いて数値チェック
	$chk_telno = str_replace("-","",$strTelNO);
	if (!is_numeric($chk_telno)) {
		return false;
	}

	$strTelNoPtn = "";
	for ($i=0;$i<$intLength;$i++) {
		$strTelNO_WR = substr($strTelNO,$i,1);
		if (is_numeric($strTelNO_WR)) {
			$strTelNoPtn .= "*";
		} elseif($strTelNO_WR == "-") {
			$strTelNoPtn .= "-";
		}
	}

	$strShigai = "";

	switch ($strTelNoPtn) {
		case "**-****-****":
			$strShigai = substr($strTelNO,0,2);
			break;
		case "***-***-****":
			switch (substr($strTelNO,0,3)) {
				case "010":
				case "020":
				case "030":
				case "040":
				case "050":
				case "060":
				case "070":
				case "080":
				case "090":
					//電話番号は正しくありません
					return false;
					break;
				default:
					$strShigai = substr($strTelNO,0,3);
					break;
			}
			break;
		case "***-****-****":
			switch (substr($strTelNO,0,3)) {
				case "050":
				case "060":
				case "070":
				case "080":
				case "090":
					$strShigai = "";
					break;
				case "010":
				case "020":
				case "030":
				case "040":
					//電話番号は正しくありません
					return false;
					break;
				default:
					//電話番号は正しくありません
					return false;
					break;
			}
			break;
		case "****-**-****":
			$strShigai = substr($strTelNO,0,4);
			break;
		case "****-***-***":
			if (substr($strTelNO,0,4) != "0120") {
				//電話番号は正しくありません
				return false;
			}
			$strShigai = "";
			break;
		case "*****-*-****":
			$strShigai = substr($strTelNO,0,5);
			break;
		case "******-****":
			switch (substr($strTelNO,0,3)) {
				case "010":
				case "020":
				case "030":
				case "040":
				case "050":
				case "060":
				case "070":
				case "080":
				case "090":
					//電話番号は正しくありません
					return false;
					break;
				default:
					//電話番号は正しくありません
					$strShigai = substr($strTelNO,0,6);
					break;
			}
			break;
		case "**-***-****":
			$strShigai = substr($strTelNO,0,2);
			break;
		case "****-*-****":
			$strShigai = substr($strTelNO,0,4);
			break;
		default:
			//電話番号は正しくありません
			return false;
			break;
	}

	if ($strShigai == "") {
		//ＩＰ電話、ＰＨＳ、携帯電話などは市外局番のチェックはしない
		return true;
	}
	elseif ($strict) {
		//実在する市外局番かチェックする
		if (fncShigaiCntGet($con,$strShigai) == 0) {
			logDebug(__FUNCTION__.":電話番号に入力されている市外局番は存在しません(".$strShigai.")");
			return false;
		}
	}

	return true;

}

/**
 * 市外局番のの整合性をチェック
 *
 * @param mixed  $con          DBコネクションID
 * @param string $strShigai   電話番号(市外局番)
 *
 * @return int   データ件数
 */
Function fncShigaiCntGet($con,$strShigai) {

	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	/* //$sql = "SELECT SHIGAI FROM SHIGAI_TBL WHERE SHIGAI = ".getSqlValue($strShigai);
	$sql = "SELECT SHIGAI FROM SHIGAI_TBL WHERE SHIGAI = :strShigai";
	//$result = dbQuery($con, $sql);
	$result = ssk_db_parse($con, $sql);
	ssk_db_bind_by_name($result,":strShigai",$strShigai,-1);
	ssk_db_execute($result);
	$data_arr = array();
	$rows = getNumRows($result, $data_arr); */

	$sql = "SELECT ";
		$sql .= "area_tel_no as SHIGAI  ";
	$sql .= "FROM ";
		$sql .= "m_area_tel_no  ";
	$sql .= "WHERE ";
		$sql .= "area_tel_no = :strShigai ";
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
	$result = $con->prepare($sql);
	$result->bindParam(":strShigai", $strShigai, PDO::PARAM_STR );
	$result->execute();
	$rows = $result->rowCount();
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan

	if ($rows <= 0) {
		return "0";
	} else {
		return $rows;
	}

}

/**
 * 姓名の入力チェック（全角7文字以内）
 *
 * @param string $first_name   姓（名前）
 * @param string $name         名（名前）
 *
 * @return boolean true=正常、false=エラー
 */
Function fncChkName($first_name, $name){

	$err_name = 0;

	$chk_first_name = mb_convert_kana($first_name, 'KVRN');
	$chk_name       = mb_convert_kana($name, 'KVRN');

	if ($first_name =="" || $first_name != $chk_first_name) {
		$err_name++;
	}
	if ($name =="" || $name != $chk_name) {
		$err_name++;
	}
	if ((strlen($first_name) + strlen($name)) > 14 ){
		$err_name++;
	}

	if ($err_name > 0) {
		return false;
	}
	return true;
}

/**
 * 姓名(ふりがな)の入力チェック（全角ひらがな17文字以内）
 *
 * @param string $first_name_fkana   姓（名前）
 * @param string $name_fkana         名（名前）
 *
 * @return boolean true=正常、false=エラー
 */
Function fncChkFuriganaName($first_name_fkana, $name_fkana) {

	$err_name_fkana = 0;

	//全角ふりがな判別
	if (!mb_ereg("^[ぁ-ん]+$", $first_name_fkana)) {
		$err_name_fkana++;
	}
	if (!mb_ereg("^[ぁ-ん]+$", $name_fkana)) {
		$err_name_fkana++;
	}
	if ((mb_strlen($first_name_fkana) + mb_strlen($name_fkana)) > 17 ){
		$err_name_fkana++;
	}
	if ($err_name_fkana > 0) {
		return false;
	}
	return true;
}

/**
 * URL変換関数
 *
 * @param string $text	対象文字列
 *
 * @return string		URL変換後の文字列
 */
Function fncChangeDomain($text) {

	global $CY_TEST_FLAG;
	global $HONBAN_DOMAIN_I;
	global $HONBAN_DOMAIN_E;
	global $HONBAN_DOMAIN_V;
	global $HONBAN_DOMAIN_W;
	global $TEST_DOMAIN_I;
	global $TEST_DOMAIN_E;
	global $TEST_DOMAIN_V;
	global $TEST_DOMAIN_W;
	global $SUBSTITUTION_TOPURL;
	global $SUBSTITUTION_BASEURL;
	global $SUBSTITUTION_SSLBASEURL;
	global $SUBSTITUTION_QPARAM;
	global $SSK_TOP_FREE;
	global $ROOT_URL;
	global $SSL_URL;
	global $URL_PARAM;

	if ($CY_TEST_FLAG == true) {
		$text = str_replace($HONBAN_DOMAIN_I, $TEST_DOMAIN_I, $text);
		$text = str_replace($HONBAN_DOMAIN_E, $TEST_DOMAIN_E, $text);
		$text = str_replace($HONBAN_DOMAIN_V, $TEST_DOMAIN_V, $text);
		$text = str_replace($HONBAN_DOMAIN_W, $TEST_DOMAIN_W, $text);
	} else {
		$text = str_replace($TEST_DOMAIN_I, $HONBAN_DOMAIN_I, $text);
		$text = str_replace($TEST_DOMAIN_E, $HONBAN_DOMAIN_E, $text);
		$text = str_replace($TEST_DOMAIN_V, $HONBAN_DOMAIN_V, $text);
		$text = str_replace($TEST_DOMAIN_W, $HONBAN_DOMAIN_W, $text);
	}

	$text = str_replace($SUBSTITUTION_TOPURL, $SSK_TOP_FREE, $text);
	$text = str_replace($SUBSTITUTION_BASEURL, $ROOT_URL. "/", $text);
	$text = str_replace($SUBSTITUTION_SSLBASEURL, $SSL_URL. "/", $text);
	$text = str_replace($SUBSTITUTION_QPARAM, $URL_PARAM, $text);

	return $text;
}

/**
 * 絵文字変換関数
 *
 * @param string $text	対象文字列
 *
 * @return string		絵文字変換後の文字列
 */
Function fncChangeEmoji($text) {

	global $EMOJI;

//	while (preg_match("/^.*?__(.*?)__.*$/", $text, $emoji)) {
        while (preg_match("/__(.*?)__/", $text, $emoji)) {
		$text = str_replace("__" . $emoji[1] . "__", $EMOJI[$emoji[1]], $text);

	}

	return $text;
}

/**
 * イメージタグ取得関数
 *
 * @param string  $path			画像パス
 * @param string  $alt			alt属性
 * @param int     $pw_size		横幅サイズ
 * @param int     $ref_size		referrerサイズ
 * @param string  $align		align
 * @param boolean $xhtml_flg	XHTML表示
 * @param boolean $limit_flg	LIMITパラメータ設定
 * @param int     $image_num	画像数
 *
 * @return string			イメージタグ
 */
Function fncGetImageTag($path, $alt = "再春館製薬所", $pw_size = "", $ref_size = "4000", $align = "", $xhtml_flg = false, $limit_flg = false, $image_num = "0") {

	global $PFIT_ROOT_URL;
	global $IMAGE_DIR;
	global $CARRIER_ID;
	global $IMAGE_EXTENTION;
	global $IMAGE_EXTENTION2;
	global $TMP_GROUP;
	global $IMAGE_PW_SIZE;
	global $IMAGE_REF_SIZE;
	global $browserCacheSize;

	$image_tag = "";
	$extention = array('jpg','jpeg','gif','png','jpg');

	if ($pw_size == "") {
		$pw_size = $IMAGE_PW_SIZE;
	}

	for( $i = 0; $i < count($extention) - 1; $i++)
	{
		if (file_exists($IMAGE_DIR . "/" . $path) == false)
		{
			$path = str_replace($extention[$i], $extention[$i+1], $path);
		}
		else
		{
			break;
		}
	}

	$limit_prm = 0;
	if ($limit_flg == true && $image_num > 0) {
		$limit_prm = floor(($browserCacheSize * 1000 - $IMAGE_REF_SIZE) / $image_num);
	}

	//-----------------------------------------------------------
	//news、campaignに関してはローカルファイルが存在しないので
	//そのままタグを生成する
	//-----------------------------------------------------------
	$img_disp_flag = false;
	if(preg_match("/^news\//", $path) || preg_match("/^campaign\//", $path)){
		$img_disp_flag = true;
	} else {
		$img_disp_flag = file_exists($IMAGE_DIR . "/" . $path);
	}

	if ($img_disp_flag) {
		$image_tag  = "<img src=\"" . $PFIT_ROOT_URL . "/" . $path . "?size=" . $pw_size . "pw";
		if ($limit_prm > 0) {
			$image_tag .= "&limit=" . $limit_prm;
		} else if ($ref_size > 0) {
			$image_tag .= "&referrerSize=" . $ref_size;
		}
		$image_tag .= "\" alt=\"" . strip_tags($alt) . "\"";
		if ($xhtml_flg == true && $align != "") {
			if ($CARRIER_ID == "e") {
				$image_tag .= " align=\"".$align."\" vspace=\"0\" hspace=\"0\"";
			} else {
				$image_tag .= " style=\"float:".$align.";margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px\"";
			}
		} else if ($align != "") {
			$image_tag .= " align=\"".$align."\" vspace=\"0\" hspace=\"0\"";
		}
		$image_tag .= ">";
	}

	return $image_tag;
}

/**
 * イメージタグ取得関数（サイズ指定付き）
 *
 * ・サイズ値を指定してタグを作成
 * ・ブラウザキャッシュを確認して最大限の数値を自動指定
 *
 * @param string  $path			画像パス
 * @param string  $alt			alt属性
 * @param int     $pw_size		横幅サイズ
 * @param int     $ref_size		referrerサイズ
 * @param string  $align		align
 * @param boolean $xhtml_flg	XHTML表示
 * @param boolean $limit_flg	LIMITパラメータ設定
 * @param int     $image_num	画像数
 * @param int     $limit_size  $image_num>0のときはサイズ制限(limit=$limit_size)、それ以外のときは利用済みサイズとし使用する。
 *
 * @return string			イメージタグ
 */
Function fncGetImageLimitTag($path, $alt = "再春館製薬所", $pw_size = "", $ref_size = "4000", $align = "", $xhtml_flg = false, $limit_flg = false, $image_num = "0", $limit_size = "0") {

	global $PFIT_ROOT_URL;
	global $IMAGE_DIR;
	global $CARRIER_ID;
	global $IMAGE_EXTENTION;
	global $IMAGE_EXTENTION2;
	global $TMP_GROUP;
	global $IMAGE_PW_SIZE;
	global $IMAGE_REF_SIZE;
	global $browserCacheSize;

	$image_tag = "";
	$extention = array('jpg','jpeg','gif','png');

	if ($pw_size == "") {
		$pw_size = $IMAGE_PW_SIZE;
	}

	for( $i = 0; $i < count($extention) - 1; $i++)
	{
		if (file_exists($IMAGE_DIR . "/" . $path) == false)
		{
			$path = str_replace($extention[$i], $extention[$i+1], $path);
		}
		else
		{
			break;
		}
	}

	$limit_prm = 0;
	if ($limit_flg == true) {
		if($image_num > 0) {
			$limit_prm = floor(($browserCacheSize * 1000 - $IMAGE_REF_SIZE - $limit_size) / $image_num);
		}
		else if($limit_size > 0)
		{
			$limit_prm = $limit_size;
		}
	}

	if (file_exists($IMAGE_DIR . "/" . $path) == true) {
		$image_tag  = "<img src=\"" . $PFIT_ROOT_URL . "/" . $path . "?size=" . $pw_size . "pw";
		if ($limit_prm > 0) {
			$image_tag .= "&limit=" . $limit_prm;
		} else if ($ref_size > 0) {
			$image_tag .= "&referrerSize=" . $ref_size;
		}
		$image_tag .= "\" alt=\"" . strip_tags($alt) . "\"";
		if ($xhtml_flg == true && $align != "") {
			if ($CARRIER_ID == "e") {
				$image_tag .= " align=\"".$align."\" vspace=\"0\" hspace=\"0\"";
			} else {
				$image_tag .= " style=\"float:".$align.";margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px\"";
			}
		} else if ($align != "") {
			$image_tag .= " align=\"".$align."\" vspace=\"0\" hspace=\"0\"";
		}
		$image_tag .= ">";
	}

	return $image_tag;
}

/**
 * sendMail()
 * メール送信
 *
 * @patam	string $host		SMTPホスト
 * @patam	string $to			TOメールアドレス
 * @patam	string $subject	件名
 * @patam	string $body		本文
 * @patam	string $from		FROMメールアドレス
 * @patam	string $user		SMTP認証用ユーザー
 * @patam	string $password	SMTP認証用パスワード

 * @return	boolean true=正常、false=エラー
 */
function sendMail($host, $to, $subject, $body, $from, $user = null, $password = null, $to_nm = null, $cc_nm = null,$bcc_nm = null) {

logDebug(__FUNCTION__.' $host='.$host);
logDebug(__FUNCTION__.' $to='.$to);
logDebug(__FUNCTION__.' $subject='.$subject);
logDebug(__FUNCTION__.' $body='.$body);
logDebug(__FUNCTION__.' $from='.$from);
logDebug(__FUNCTION__.' $user='.$user);
logDebug(__FUNCTION__.' $password='.$password);
logDebug(__FUNCTION__.' $cc_nm='.$cc_nm);
logDebug(__FUNCTION__.' $bcc_nm='.$bcc_nm);

    //テスト・ステージングサーバで送信先が許可ドメイン以外の場合、メール送信しない。
	global $TEST_FLAG, $STAGE_FLAG;
	if($TEST_FLAG === true || $STAGE_FLAG === true) {
        if (PermmitMailDomainCheck($to)) {
            logDebug("メール宛先OK:".$to);
        } else {
            logError("メール宛先NG:".$to);
            return true;
        }
	}

	// 共通変換処理
	$body = str_replace('__SERVER__',$_SERVER['SERVER_NAME'],$body);

	// 送信処理
	$punctuation = array("カ゛", "キ゛", "ク゛", "ケ゛", "コ゛",
						 "サ゛", "シ゛", "ス゛", "セ゛", "ソ゛",
						 "タ゛", "チ゛", "ツ゛", "テ゛", "ト゛",
						 "ハ゛", "ヒ゛", "フ゛", "ヘ゛", "ホ゛",
						 "ハ゜", "ヒ゜", "フ゜", "ヘ゜", "ホ゜");

	$punctuation_ = array("ガ", "ギ", "グ", "ゲ", "ゴ",
						  "ザ", "ジ", "ズ", "ゼ", "ゾ",
						  "ダ", "ヂ", "ヅ", "デ", "ド",
						  "バ", "ビ", "ブ", "ベ", "ボ",
						  "パ", "ピ", "プ", "ペ", "ポ");

	$subject_ = "";
	for ($i = 0; $i < mb_strlen($subject); $i++) {
		$tmp = mb_substr($subject, $i, 1);
		if (checkEmoji($tmp) == true) {
			$subject_ .= $tmp;
		} else {
			$subject_ .= mb_convert_kana($tmp, "KV", "SJIS");
		}
	}
	$subject = $subject_;
	$subject = str_replace($punctuation, $punctuation_, $subject);

	$body_ = "";
	for ($i = 0; $i < mb_strlen($body); $i++) {
		$tmp = mb_substr($body, $i, 1);
		if (checkEmoji($tmp) == true) {
			$body_ .= $tmp;
		} else {
			$body_ .= mb_convert_kana($tmp, "KV");
		}
	}
	$body = $body_;
	$body = str_replace($punctuation, $punctuation_, $body);

	$body = str_replace("\n", "\r\n", $body);

	$connect = fsockopen($host, 25, $errno, $errstr, 10);

	if ($connect == false) {
		return false;
	}

	if (strlen($user) > 0) {
		fputs($connect, "EHLO " . $host . "\r\n");
		$response = fgets($connect);
	} else {
		fputs($connect, "HELO " . $host . "\r\n");
		$response = fgets($connect);
	}

	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
		return false;
	}

	if (strlen($user) > 0) {
		fputs($connect, "AUTH PLAIN " . exec('perl -MMIME::Base64 -e "print &MIME::Base64::encode_base64(\"' . $user . '\0' . $user . '\0' . $password . '\")"') . "\r\n");
		$response = fgets($connect);
		$error_code = getErrorCode(getResponseCode($response));
		if (strlen($error_code) > 0) {
			return false;
		}
	}

	//20070404 From対応
	$tmp_send_from = $from;
	if (strpos($tmp_send_from,"<")) {
		$tmp_send_from = explode("<",$from);
	} else {
		$send_from = $from;
	}
	if (is_array($tmp_send_from) && count($tmp_send_from) > 0) {
		$send_from      = substr($tmp_send_from[1], 0, strlen($tmp_send_from[1]) - 1);
		$send_from_name = $tmp_send_from[0];

		$from = "=?ISO-2022-JP?B?" . base64_encode(mb_convert_encoding($send_from_name, "ISO-2022-JP", "SJIS")) ."?= <".$send_from. ">";
	}
	//20070404 From対応

	//20070404 From対応
//	fputs($connect, "MAIL FROM:" . $from . "\r\n");
	fputs($connect, "MAIL FROM:" . $send_from . "\r\n");
	//20070404 From対応
	$response = fgets($connect);
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
		return false;
	}

	$rcptToArray = array();
	$toArray     = array();

	if (is_array($to)) {
		$rcptToArray = array_merge($rcptToArray, $to);
//		$toArray     = array_merge($toArray    , $to);
	} else {
		$rcptToArray = array_merge($rcptToArray, preg_split("/,/", $to));
//		$toArray     = array_merge($toArray    , preg_split("/,/", $to));
	}

	foreach ($rcptToArray as $rcptTo) {
		if ($rcptTo) {
			fputs($connect, "RCPT TO:" . $rcptTo . "\r\n");
			$response = fgets($connect);
			$error_code = getErrorCode(getResponseCode($response));
			if (strlen($error_code) > 0) {
				return false;
			}
		}
	}

	//TO対応
	if ($to_nm == "") {
		if (is_array($to)) {
			$toArray     = array_merge($toArray    , $to);
		} else {
			$toArray     = array_merge($toArray    , preg_split("/,/", $to));
		}
	} else {
		if (is_array($to_nm)) {
			$toArray     = array_merge($toArray    , $to_nm);
		} else {
			$toArray     = array_merge($toArray    , preg_split("/,/", $to_nm));
		}
	}

	$CcArray  = array();
	$BccArray = array();

	//CC対応
	if (is_array($cc_nm)) {
		$CcArray     = array_merge($CcArray    , $cc_nm);
	} else {
		$CcArray     = array_merge($CcArray    , preg_split("/,/", $cc_nm));
	}
	//BCC対応
	if (is_array($bcc_nm)) {
		$BccArray     = array_merge($BccArray    , $bcc_nm);
	} else {
		$BccArray     = array_merge($BccArray    , preg_split("/,/", $bcc_nm));
	}
	//

	fputs($connect, "DATA"."\r\n");
	$response = fgets($connect);
	fputs($connect, "From: " . $from . "\r\n");
	fputs($connect, "To: " . join(",", $toArray) . "\r\n");
	fputs($connect, "Subject: " . "=?ISO-2022-JP?B?" . base64_encode(mb_convert_encoding($subject, "ISO-2022-JP", "SJIS")) . "?=" . "\r\n");
	//CC対応
	if (count($CcArray) > 0) {
		fputs($connect, "Cc: " . join(",", $CcArray) . "\r\n");
	}
	//BCC対応
	if (count($BccArray) > 0) {
		fputs($connect, "Bcc: " . join(",", $BccArray) . "\r\n");
	}
	fputs($connect, "Date: " . date("r") . "\r\n");
	fputs($connect, "MIME-Version: " . "1.0" . "\r\n");
	fputs($connect, "Content-Type: " . "text/plain; charset=\"ISO-2022-JP\"" . "\r\n");
	fputs($connect, "Content-Transfer-Encoding: " . "8bit" . "\r\n");
	fputs($connect, "\r\n");
	fputs($connect, mb_convert_encoding($body, "ISO-2022-JP", "SJIS") . "\r\n");

	fputs($connect, "." . "\r\n");
	$response = fgets($connect);
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
		return false;
	}

	fputs($connect, "QUIT"."\r\n");
	$response = fgets($connect);
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
		return false;
	}

	fclose($connect);
	return true;
}

/**
 * getResponseCode()
 * レスポンスコード取得
 *
 * @patam	int $response		レスポンス

 * @return	int $response_code	レスポンスコード
 */
function getResponseCode($response) {
	return substr($response, 0, 3);
}

/**
 * getErrorCode()
 * エラーコード取得
 *
 * @patam	int $response_code	レスポンスコード

 * @return	int $error_code		エラーコード
 */
function getErrorCode($response_code) {
	switch (substr($response_code, 0, 1)) {
		case "1":
			return "";
		case "2":
			return "";
		case "3":
			return "";
		default:
			return $response_code;
	}
}

/**
 * checkEmoji()
 * 絵文字存在チェック
 *
 * @param	string $str	文字列

 * @return	boolean true=絵文字含む、false=絵文字含まない
 */
function checkEmoji($str) {
	$result = false;

	if (checkEmojiI($str)) {
		$result = true;
	}
	if (checkEmojiS($str)) {
		$result = true;
	}
	if (checkEmojiE($str)) {
		$result = true;
	}

	return $result;
}

/**
 * checkEmojiI()
 * i-mode絵文字存在チェック
 *
 * @param	string $str	文字列

 * @return	boolean true=i-mode絵文字含む、false=絵文字含まない
 */
function checkEmojiI($str) {
	$result = false;

	for ($i = 0; $i < mb_strlen($str); $i++) {
		$tmp = mb_substr($str, $i, 1);
		$tmp = unpack("C*", $tmp);
		$len = count($tmp);
		if ($len == 1) {
			continue;
		}
		$hex1 = $tmp[1];
		$hex2 = $tmp[2];
		if (($hex1 == 0xF8 && 0x9F <= $hex2 && $hex2 <= 0xFC) || ($hex1 == 0xF9 && 0x40 <= $hex2 && $hex2 <= 0xFC)) {
			$result = true;
			break;
		}
	}

	return $result;
}

/**
 * checkEmojiS()
 * softbank絵文字存在チェック
 *
 * @param	string $str	文字列

 * @return	boolean true=softbank絵文字含む、false=絵文字含まない
 */
function checkEmojiS($str) {
	$result = false;

	if (preg_match("/\\x1B\\$[\\x21-\\x7A]+\\x0F/", $str)) {
		$result = true;
	}

	return $result;
}

/**
 * checkEmojiE()
 * ezweb絵文字存在チェック
 *
 * @param	string $str	文字列

 * @return	boolean true=ezweb絵文字含む、false=絵文字含まない
 */
function checkEmojiE($str) {
	$result = false;

	for ($i = 0; $i < mb_strlen($str); $i++) {
		$tmp = mb_substr($str, $i, 1);
		$tmp = unpack("C*", $tmp);
		$len = count($tmp);
		if ($len == 1) {
			continue;
		}
		$hex1 = $tmp[1];
		$hex2 = $tmp[2];
		if (0xF3 <= $hex1 && $hex1 <= 0xF7) {
			$result = true;
			break;
		}
	}

	return $result;
}

/**
 * 和暦年を西暦年へ変換
 *
 * @param string $nengo      年号フラグ(0:昭和、1:大正、2:平成)
 * @param string $birthday   和暦生年月日(YYMMDD)
 *
 * @return int   西暦年
 */
Function fncWarekiSeirekiChange($nengo, $birthday) {

    //誕生日から和暦年取得
    $warekinen = trim(mb_convert_kana(substr($birthday, 0, 2), "n"));

	$seirekinen = 0;
	switch($nengo){
		case "0"://昭和
			$seirekinen = 1925 + (integer)$warekinen;
			break;
		case "1"://大正
			$seirekinen = 1911 + (integer)$warekinen;
			break;
		case "2"://平成
			$seirekinen = 1988 + (integer)$warekinen;
			break;
		default:
			$seirekinen = 1925 + (integer)$warekinen;
			break;
	}
	return $seirekinen;
}

/**
 * 年齢を算出する
 *
 * @param string $nengo      年号フラグ(0:昭和、1:大正、2:平成)
 * @param string $birthday   和暦生年月日(YYMMDD)
 *
 * @return int   年齢
 */
Function fncGetAge($nengo, $birthday) {

	$age = 0;
	$seirekinen = 0;
	$sysdate = date("Ymd");

	//西暦年取得
	$seirekinen = fncWarekiSeirekiChange($nengo, $birthday);
	if ($seirekinen == 0) {
		return $age;
	}

	$age = intval(substr($sysdate, 0, 4)) - intval($seirekinen);
	if (intval(substr($sysdate, 4, 4)) < intval(substr($birthday, 2, 4))) {
		$age--;
	}

	return $age;

}

/**
 * 2つの日付間の日数を求める
 *
 * @param string $yyyymmdd1    日付１
 * @param string $yyyymmdd2    日付２
 *
 * @return int   日付間の日数
 */
Function fncGetDateDiff($yyyymmdd1, $yyyymmdd2) {

	$yyyymmdd1 = str_replace("/", "", $yyyymmdd1);
	$yyyymmdd1 = str_replace("-", "", $yyyymmdd1);
	$yyyymmdd2 = str_replace("/", "", $yyyymmdd2);
	$yyyymmdd2 = str_replace("-", "", $yyyymmdd2);

	$year1  = substr($yyyymmdd1, 0, 4);
	$month1 = substr($yyyymmdd1, 4, 2);
	$day1   = substr($yyyymmdd1, 6, 2);

	$year2  = substr($yyyymmdd2, 0, 4);
	$month2 = substr($yyyymmdd2, 4, 2);
	$day2   = substr($yyyymmdd2, 6, 2);

	$t1  = mktime(0, 0, 0, $month1, $day1, $year1);
	$t2  = mktime(0, 0, 0, $month2, $day2, $year2);
	$t3  = $t1 - $t2;
	$ret = floor($t3 / (60 * 60 * 24));

	return $ret;
}

/**
 * 最終購入経過日を取得する
 *
 * @param string $last_buy_day1  最終購入日１(化粧品)
 * @param string $last_buy_day2  最終購入日２(漢方)
 * @param string $last_buy_day3  最終購入日３(カムカ)
 * @param string $last_buy_day4  最終購入日４(美容液)
 *
 * @return int   最終購入経過日
 */
Function fncGetLastBuyProgDay($last_buy_day1, $last_buy_day2, $last_buy_day3, $last_buy_day4) {

	$last_buy_progress_day = "";
	$sysdate = date("Ymd");

	if ($last_buy_day1 == "" && $last_buy_day2 == "" && $last_buy_day3 == "" && $last_buy_day4 == "") {
		return $last_buy_progress_day;
	}

	$last_buy_day = array($last_buy_day1, $last_buy_day2, $last_buy_day3, $last_buy_day4);
	rsort($last_buy_day);
	$last_buy_progress_day = fncGetDateDiff($sysdate, $last_buy_day[0]);

	return $last_buy_progress_day;
}

/**
 * 初回購入経過日を取得する
 *
 * @param string $first_buy_day1  初回購入日１(化粧品)
 * @param string $first_buy_day2  初回購入日２(漢方)
 * @param string $first_buy_day3  初回購入日３(カムカ)
 * @param string $first_buy_day4  初回購入日４(美容液)
 *
 * @return int   初回購入経過日
 */

Function fncGetFirstBuyProgDay($first_buy_day1, $first_buy_day2, $first_buy_day3, $first_buy_day4) {

	$first_buy_progress_day = "";
	$sysdate = date("Ymd");

	if ($first_buy_day1 == "" && $first_buy_day2 == "" && $first_buy_day3 == "" && $first_buy_day4 == "") {
		return $first_buy_progress_day;
	}

	$first_buy_day = array($first_buy_day1, $first_buy_day2, $first_buy_day3, $first_buy_day4);
	sort($first_buy_day);

	if ($first_buy_day[0] == "" && $first_buy_day[1] == "" && $first_buy_day[2] == "") {
		$first_buy_progress_day = fncGetDateDiff($sysdate, $first_buy_day[3]);
	} else if ($first_buy_day[0] == "" && $first_buy_day[1] == "") {
		$first_buy_progress_day = fncGetDateDiff($sysdate, $first_buy_day[2]);
	} else if ($first_buy_day[0] == "") {
		$first_buy_progress_day = fncGetDateDiff($sysdate, $first_buy_day[1]);
	} else {
		$first_buy_progress_day = fncGetDateDiff($sysdate, $first_buy_day[0]);
	}

	return $first_buy_progress_day;
}

/**
 * 属性IDを取得する
 *
 * @param mixed  $con   DBコネクションID
 * @param string $uid   ネットメンバーID
 *
 * @return int   初回購入経過日
 */
Function fncGetAttributeId($con, $uid) {

	$attribute_id    = array();
	$member_data_arr = "";
	$member_data     = "";

	$member_data_arr = array('WEBPROFILE_TBL.NAMEOFERA', 'WEBPROFILE_TBL.BIRTHDAY', 'WEBPROFILE_TBL.KENCD', 'WEBPROFILE_TBL.GENDER',
							 'WEBPROFILE_TBL.LAST_PURCHACE_DAY1', 'WEBPROFILE_TBL.LAST_PURCHACE_DAY2', 'WEBPROFILE_TBL.LAST_PURCHACE_DAY3',
							 'WEBPROFILE_TBL.LAST_PURCHACE_DAY4', 'WEBPROFILE_TBL.FIRST_PURCHACE_DAY1','WEBPROFILE_TBL.FIRST_PURCHACE_DAY2',
							 'WEBPROFILE_TBL.FIRST_PURCHACE_DAY3', 'WEBPROFILE_TBL.FIRST_PURCHACE_DAY4', 'WEBPROFILE_TBL.KOUNYU_NUM' );

	//メンバーデータ取得
	$member_data = fncGetSskMember($con, $uid, $member_data_arr);

	//誕生日から年齢取得
	$age    = fncGetAge($member_data['NAMEOFERA'], $member_data['BIRTHDAY']);

	//地域コード
	$ken_cd = $member_data['KENCD'];
	//性別
	$gender = $member_data['GENDER'];
	//最終購入経過日
	$last_buy_prog_day = fncGetLastBuyProgDay($member_data['LAST_PURCHACE_DAY1'], $member_data['LAST_PURCHACE_DAY2'], $member_data['LAST_PURCHACE_DAY3'], $member_data['LAST_PURCHACE_DAY4']);
	//初回購入経過日
	$first_buy_prog_day = fncGetFirstBuyProgDay($member_data['FIRST_PURCHACE_DAY1'], $member_data['FIRST_PURCHACE_DAY2'], $member_data['FIRST_PURCHACE_DAY3'], $member_data['FIRST_PURCHACE_DAY4']);
	//化粧品購入回数
	$purchace_cnt = $member_data['KOUNYU_NUM'];

	$sql  = "select ";
	$sql .= "ATTRIBUTE_ID, JIS_CODE_PREF ";
	$sql .= "from ";
	$sql .= "MstAttribute_Tbl ";
	$sql .= "where VALID_FLG = ".getSqlValue("1")." ";
	//$sql .= "AND AGE_LOWER <= ".getSqlValueNum($age)." ";
	$sql .= "AND AGE_LOWER <= :age ";
	//$sql .= "AND AGE_UPPER > ".getSqlValueNum($age)." ";
	$sql .= "AND AGE_UPPER >= :age ";
	/*
	if (!isset($ken_cd)) {
	if ($ken_cd != '00') {
		$sql .= "AND JIS_CODE_PREF = ".getSqlValueNum($ken_cd)." ";
	};
	*/
	if (isset($gender) || $gender == '0' || $gender == '1' ) {
		//$sql .= "AND GENDER IN (2,".getSqlValueNum($gender).") ";
		$sql .= "AND GENDER IN (2,:gender) ";
	};
	if ($last_buy_prog_day !== '') {
		//$sql .= "AND LAST_PURCHASE_START_DAYS <= ".getSqlValueNum($last_buy_prog_day)." ";
		$sql .= "AND LAST_PURCHASE_START_DAYS <= :last_buy_prog_day ";
	};
	if ($last_buy_prog_day !== '') {
		//$sql .= "AND LAST_PURCHASE_END_DAYS > ".getSqlValueNum($last_buy_prog_day)." ";
		$sql .= "AND LAST_PURCHASE_END_DAYS >= :last_buy_prog_day ";
	};
	if ($first_buy_prog_day !== '') {
		//$sql .= "AND FIRST_PURCHASE_START_DAYS <= ".getSqlValueNum($first_buy_prog_day)." ";
		$sql .= "AND FIRST_PURCHASE_START_DAYS <= :first_buy_prog_day ";
	};
	if ($first_buy_prog_day !== '') {
		//$sql .= "AND FIRST_PURCHASE_END_DAYS > ".getSqlValueNum($first_buy_prog_day)." ";
		$sql .= "AND FIRST_PURCHASE_END_DAYS >= :first_buy_prog_day ";
	};
	if ($purchace_cnt !== '') {
		//$sql .= "AND COSMETICS_PURCHASE_CNT_LOWER <= ".getSqlValueNum($purchace_cnt)." ";
		$sql .= "AND COSMETICS_PURCHASE_CNT_LOWER <= :purchace_cnt ";
	};
	if ($purchace_cnt !== '') {
		//$sql .= "AND COSMETICS_PURCHASE_CNT_UPPER > ".getSqlValueNum($purchace_cnt)." ";
		$sql .= "AND COSMETICS_PURCHASE_CNT_UPPER >= :purchace_cnt ";
	};
	$sql .= "ORDER BY PRIORITY ASC, ATTRIBUTE_ID ASC ";
	//$result = dbQuery($con, $sql);

	$result = ssk_db_parse($con, $sql);
	ssk_db_bind_by_name($result,":age",$age,-1);
	ssk_db_bind_by_name($result,":gender",$gender,-1);
	if ($last_buy_prog_day !== '') {
		ssk_db_bind_by_name($result,":last_buy_prog_day",$last_buy_prog_day,-1);
	};
	if ($first_buy_prog_day !== '') {
		ssk_db_bind_by_name($result,":first_buy_prog_day",$first_buy_prog_day,-1);
	};
	if ($purchace_cnt !== '') {
		ssk_db_bind_by_name($result,":purchace_cnt",$purchace_cnt,-1);
	};
	ssk_db_execute($result);


	$data_arr = array();
	$rows = getNumRows($result, $data_arr);

	if ($rows > 0) {
		$j = 0;
		for ($i = 0; $i < $rows; $i++) {
			$row = dbFetchRow($result, $i, $data_arr);

			$kencd[$i] = $row['JIS_CODE_PREF'];
			if ($kencd[$i] == '00' || $kencd[$i] == $ken_cd) {
				$attribute_id[$j] = $row['ATTRIBUTE_ID'];
				$j=$j+1;
			}
		}
	}
	dbFreeResult($result);

	return $attribute_id;
}


/**
 * 頭文字から頭文字の行の文字列を取得
 *
 * @param   string  $initial      頭文字
 *
 * @return  array   頭文字の行の文字列が配列に入る
 */

Function fncGetArrayStr($initial) {

	$array_str = "";

	if ($initial == "ｱ" || $initial == "ｲ" || $initial == "ｳ" || $initial == "ｴ" || $initial == "ｵ") {
		$array_str = array("ｱ", "ｲ", "ｳ", "ｴ", "ｵ");
	} else if ($initial == "ｶ" || $initial == "ｷ" || $initial == "ｸ" || $initial == "ｹ" || $initial == "ｺ") {
		$array_str = array("ｶ", "ｷ", "ｸ", "ｹ", "ｺ");
	} else if ($initial == "ｻ" || $initial == "ｼ" || $initial == "ｽ" || $initial == "ｾ" || $initial == "ｿ") {
		$array_str = array("ｻ", "ｼ", "ｽ", "ｾ", "ｿ");
	} else if ($initial == "ﾀ" || $initial == "ﾁ" || $initial == "ﾂ" || $initial == "ﾃ" || $initial == "ﾄ") {
		$array_str = array("ﾀ", "ﾁ", "ﾂ", "ﾃ", "ﾄ");
	} else if ($initial == "ﾅ" || $initial == "ﾆ" || $initial == "ﾇ" || $initial == "ﾈ" || $initial == "ﾉ") {
		$array_str = array("ﾅ", "ﾆ", "ﾇ", "ﾈ", "ﾉ");
	} else if ($initial == "ﾊ" || $initial == "ﾋ" || $initial == "ﾌ" || $initial == "ﾍ" || $initial == "ﾎ") {
		$array_str = array("ﾊ", "ﾋ", "ﾌ", "ﾍ", "ﾎ");
	} else if ($initial == "ﾏ" || $initial == "ﾐ" || $initial == "ﾑ" || $initial == "ﾒ" || $initial == "ﾓ") {
		$array_str = array("ﾏ", "ﾐ", "ﾑ", "ﾒ", "ﾓ");
	} else if ($initial == "ﾔ" || $initial == "ﾕ" || $initial == "ﾖ") {
		$array_str = array("ﾔ", "ﾕ", "ﾖ");
	} else if ($initial == "ﾗ" || $initial == "ﾘ" || $initial == "ﾙ" || $initial == "ﾚ" || $initial == "ﾛ") {
		$array_str = array("ﾗ", "ﾘ", "ﾙ", "ﾚ", "ﾛ");
	} else if ($initial == "ﾜ" || $initial == "ｦ" || $initial == "ﾝ") {
		$array_str = array("ﾜ", "ｦ", "ﾝ");
	}
	return $array_str;
}

/**
 * 自動送信メール取得
 *
 * @param mixed  $con           DBコネクションID
 * @param string $auto_mail_id  メールID
 *
 * @return int 自動送信メールデータ
 */
Function fncGetAutoMail($con,$auto_mail_id, $tran_flg=null) {

	if (!$con) {
		return false;
	}

	$mail_data = array();
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	/* $sql  = "SELECT ";
	$sql .= "MAIL_SUBJECT, ";
	$sql .= "MAIL_BODY, ";
	$sql .= "MAIL_FROM  ";
	$sql .= "FROM AUTOMAIL_TBL ";
	//$sql .= "WHERE AUTO_MAIL_ID = ".getSqlValueNum($auto_mail_id)." ";
	$sql .= "WHERE AUTO_MAIL_ID = :auto_mail_id ";
	//$result = dbQuery($con, $sql, $tran_flg);
	$result = ssk_db_parse($con, $sql);
	ssk_db_bind_by_name($result,":auto_mail_id",$auto_mail_id,-1);
	ssk_db_execute($result); */

	$sql = "SELECT ";
		$sql .= "mail_subject as MAIL_SUBJECT ";
		$sql .= ", mail_cont as MAIL_BODY ";
		$sql .= ", mail_send_from as MAIL_FROM  ";
	$sql .= "FROM ";
		$sql .= "m_auto_send_mail  ";
	$sql .= "WHERE ";
		$sql .= "auto_mail_seq = :auto_mail_id ";
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
	$result = $con->prepare($sql);
	$result->bindParam(":auto_mail_id", $auto_mail_id, PDO::PARAM_INT );
	$result->execute();
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	
	if (!$result) {
		return false;
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//$arr = array();
	//$rows = getNumRows($result, $arr);
	$rows = $result->rowCount();
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $arr);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
		$mail_data['MAIL_SUBJECT'] = $row['MAIL_SUBJECT'];
		$mail_data['MAIL_BODY']    = fncChangeDomain($row['MAIL_BODY']);
		$mail_data['MAIL_BODY']    = str_replace("\\n", "\n", $mail_data['MAIL_BODY']);
		$mail_data['MAIL_BODY']    = str_replace("<br>", "\n", $mail_data['MAIL_BODY']);
		//$mail_data['MAIL_BODY']    = str_replace("__CYSK__", $_SERVER['HTTP_X_CY_SESSIONKEY'], $mail_data['MAIL_BODY']);
		$mail_data['MAIL_BODY']    = str_replace("__CYSK__", session_id(), $mail_data['MAIL_BODY']);
		$mail_data['MAIL_FROM']    = $row['MAIL_FROM'];
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//dbFreeResult($result);
	pdoFreeResult($result);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan

	return $mail_data;
}

/**
 * 管理者メール取得
 *
 * @param mixed  $con              DBコネクションID
 * @param string $kanri_mail_kbn  メール区分
 * @param string $kanri_mail_sub  メール件名
 * @param string $kanri_mail_msg  メール本文
 *
 * @return int 自動送信メールデータ
 */
Function fncGetKanriMail($con, $kanri_mail_kbn, $kanri_mail_sub, $kanri_mail_msg, $tran_flg=null) {

	global $SMTP_HOST;
	global $SYSYEM_MAIL_FROM;

	if (!$con) {
		return false;
	}

	$mail_from = $SYSYEM_MAIL_FROM;

	$recvto_addr = array();
	$arr_to_nm   = array();
	$arr_cc_nm   = array();
	$arr_bcc_nm  = array();

	//▼2013/08/05 R-#10660_【管理ツール】対応歴メモに「機種依存文字」を入力するとA930電文エラーが発生(ulsystems hatano)
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/06/22 jst-tomii
	/*
	$sql  = "SELECT";
	$sql .= " MAIL_ID";
	$sql .= ",EMAIL";
	$sql .= ",MAIL_NM";
	$sql .= ",SENDWAY";
	$sql .= " FROM KANRIMAIL_TBL";
	$sql .= " WHERE MAIL_KUBUN = '" . $kanri_mail_kbn . "'";
	*/

	$sql = "SELECT ";
		$sql .= "mail_seq as MAIL_ID ";
		$sql .= ", mail_adr as EMAIL ";
		$sql .= ", mail_name as MAIL_NM ";
		$sql .= ", send_way_kbn as SENDWAY  ";
	$sql .= "FROM ";
		$sql .= "m_manager_mail  ";
	$sql .= "WHERE ";
		$sql .= "ctrl_mail_kbn =" .$kanri_mail_kbn ;
    // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/06/22 jst-tomii

	$result = dbQuery($con, $sql);
	//▲2013/08/05 R-#10660_【管理ツール】対応歴メモに「機種依存文字」を入力するとA930電文エラーが発生(ulsystems hatano)
	if (!$result) {
		return false;
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//$arr = array();
	//$rows = getNumRows($result, $arr);
	$rows = getNumRows($result);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		for ($i=0;$i<$rows;$i++) {
			// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
			//$row = dbFetchRow($result, $i, $arr);
			$row = dbFetchRow($result);
			// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
			$mail_add      = trim($row['EMAIL']);
			$recvto_addr[] = $mail_add;

			if (trim($row['SENDWAY']) == "2") {
				//CC
				$arr_cc_nm[]  = $mail_add;
			} elseif(trim($row['SENDWAY']) == "3") {
				//BCC
				$arr_bcc_nm[] = $mail_add;
			} else {
				//TO
				$arr_to_nm[]  = $mail_add;
			}
		}
	}
	dbFreeResult($result);

	//メール送信
	$mail_result = sendMail($SMTP_HOST, $recvto_addr, $kanri_mail_sub, $kanri_mail_msg, $mail_from, '', '', $arr_to_nm, $arr_cc_nm, $arr_bcc_nm);

	if (!$mail_result) {
		$constr   = "";
		$arr_list = "";

		foreach ($recvto_addr as $key => $value ) {
			$arr_list .= $constr.$value;
			$constr = ",";
		}

		logError("管理メール送信エラー メール区分：".$kanri_mail_kbn." 内容：".$kanri_mail_msg."　送信先メールアドレス：".$arr_list." FROM：".$mail_from);
		return false;
	} else {
		foreach ($recvto_addr as $key => $value ) {
			$arr_list .= $constr.$value;
			$constr = ",";
		}
		logDebug("管理メール送信 メール区分：".$kanri_mail_kbn." 内容：".$kanri_mail_msg."　送信先メールアドレス：".$arr_list.":".$arr_to_nm." FROM：".$mail_from);
		return true;
	}

}

/**
 * 基本的なページング処理を行う
 *
 * @param array  $page_key['current_page']      現在のページ<br>
 * @param array  $page_key['list_max_count']    1ページ表示件数<br>
 * @param array  $page_key['record_count']      レコード総数<br>
 *
 * @return array  $page_data['page_count']        ページ総数<br>
 * @return array  $page_data['start_index']       現在ページレコード開始位置<br>
 * @return array  $page_data['next_start_index']  次ページレコード開始位置<br>
 * @return array  $page_data['prev_page']         前ページ番号<br>
 * @return array  $page_data['next_page']         次ページ番号<br>
*/
function fncGetPagingInfo($page_key) {

	$current_page = $page_key['current_page'];
	$list_count   = $page_key['list_max_count'];
	$record_count = $page_key['record_count'];

	if (strlen($current_page) <= 0 || chkNumeric($current_page) != 1) {
		$current_page = 1;
	}
	if (strlen($list_count) <= 0 || strlen($record_count) <= 0) {
		$err_msg  = '必要な情報が足りない為、ページング処理を行えません。(';
		$err_msg .= 'current_page='.$current_page.', list_count='.$list_count.', record_count='.$record_count;
		$err_msg .= ')';
		logError($err_msg);
	}

	//全体のページ数をカウント
	$page_count = $record_count / $list_count;
	if (($record_count % $list_count) > 0) {
		$page_count++;
		$page_count = floor($page_count);
	}

	//スタート位置
	$start_index = ($current_page - 1) * $list_count;
	//次ページのスタート位置
	$next_start_index = $start_index + $list_count;
	if ($next_start_index > $record_count) {
		$next_start_index = $record_count;
	}
	//前のページ設定
	if ($current_page > 0) {
		$prev_page = $current_page - 1;
	} else {
	$prev_page = 0;
	}
	//次のページ設定
	if (($start_index + $list_count) >= $record_count) {
		$next_page = 0;
		$next_count = 0;
	} else {
		$next_page = $current_page + 1;
		if ($record_count >= ($current_page + 1) * $list_count) {
			$next_count = $list_count;
		} else {
			$next_count = $record_count - $current_page * $list_count;
		}
	}

	$page_data['page_count']       = $page_count;
	$page_data['start_index']      = $start_index;
	$page_data['next_start_index'] = $next_start_index;
	$page_data['prev_page']        = $prev_page;
	$page_data['next_page']        = $next_page;
	$page_data['next_count']       = $next_count;

	return $page_data;
}

/**
 * 郵便番号又は住所から、郵便番号含む住所データ取得
 *
 * @param mixed  $con          DBコネクションID
 * @param array  $address      住所データ
 *
 * @return array  データが存在する場合はデータが配列に入る
 */
Function fncGetAddress($con, $address) {

	$data_address = array();
	$data_address['post_no']		= "";
	$data_address['ken']			= "";
	$data_address['shi']			= "";
	$data_address['mati']			= "";
	$data_address['k_ken']			= "";
	$data_address['k_shi']			= "";
	$data_address['k_mati']		= "";
	$data_address['edt_k_mati']	= "";

	$post_no = $address['post_no'];
	$ken     = $address['K_KEN'];
	$shi     = $address['K_SHI'];
	$mati    = $address['K_MATI'];

	if ((preg_match("/^\d{7}$/", $post_no)) || ($ken != "" && $shi != "" && $mati != "")) {

		$sql  = "SELECT ";
		$sql .= "POSTNO7, ";
		$sql .= "KEN, ";
		$sql .= "SHI, ";
		$sql .= "MATI, ";
		$sql .= "K_KEN, ";
		$sql .= "K_SHI, ";
		$sql .= "K_MATI, ";
		$sql .= "EDT_K_MATI ";
		$sql .= "FROM POSTMASTER_TBL ";
		if ($post_no != "") {
			//$sql .= "WHERE POSTNO7 = ".getSqlValue($post_no)." ";
			$sql .= "WHERE POSTNO7 = :post_no ";
		} else {
			//$sql .= "WHERE K_KEN = ".getSqlValue($ken)." ";
			$sql .= "WHERE K_KEN = :ken ";
			//$sql .= "AND K_SHI = ".getSqlValue($shi)." ";
			$sql .= "AND K_SHI = :shi ";
			//$sql .= "AND K_MATI = ".getSqlValue($mati)." ";
			$sql .= "AND K_MATI = :mati ";
		}
		//$result = dbQuery($con, $sql);
		$result = ssk_db_parse($con, $sql);
		if ($post_no != "") {
			ssk_db_bind_by_name($result,":post_no",$post_no,-1);
		} else {
			ssk_db_bind_by_name($result,":ken",$ken,-1);
			ssk_db_bind_by_name($result,":shi",$shi,-1);
			ssk_db_bind_by_name($result,":mati",$mati,-1);
		}
		ssk_db_execute($result);
		$data_arr = array();
		$rows = getNumRows($result, $data_arr);

		if ($rows > 0) {
			$row = dbFetchRow($result, 0, $data_arr);
/*
			$post_no7 = mb_convert_kana($row['POSTNO7'], "ask");
			$ken      = mb_convert_kana($row['KEN'], "ask");
			$shi      = mb_convert_kana($row['SHI'], "ask");
			$mati     = mb_convert_kana($row['MATI'], "ask");
			$k_ken    = mb_convert_kana($row['K_KEN'], "ask");
			$k_shi    = mb_convert_kana($row['K_SHI'], "ask");
			$k_mati   = mb_convert_kana($row['K_MATI'], "ask");
*/
			$post_no7   = trim($row['POSTNO7']);
			$ken        = trim($row['KEN']);
			$shi        = trim($row['SHI']);
			$mati       = trim($row['MATI']);
			$k_ken      = trim($row['K_KEN']);
			$k_shi      = trim($row['K_SHI']);
			$k_mati     = trim($row['K_MATI']);
			$edt_k_mati = trim($row['EDT_K_MATI']);

			$data_address['post_no']     = $post_no7;
			$data_address['ken']         = $ken;
			$data_address['shi']         = $shi;
			$data_address['mati']        = $mati;
			$data_address['k_ken']       = $k_ken;
			$data_address['k_shi']       = $k_shi;
			$data_address['k_mati']      = $k_mati;
			$data_address['edt_k_mati']  = $edt_k_mati;

		}
		dbFreeResult($result);

		//DB切断
		dbClose($con);

		return $data_address;

	} else {

		return $data_address;

	}

}


/**
 * 文字列サイズチェック（電文変換用）
 *
 * @param string  $str           文字列
 *
 * @return int 文字列長
 */
Function fncGetDenbunLength($str) {

	$mb_length = 0;
	$target = "";			//SB,MB判別対象1文字
	$char_kind = "";		//SB:シングルバイト文字 MB:マルチバイト文字
	$before_char_kind = ""; //$char_kindの前回
	$denbun_length = 0;

	if ($str == "") {
		return 0;
	}

	$mb_length = mb_strlen($str, 'SJIS');
	for ($i=0; $i<$mb_length; $i++) {
		$target = mb_substr($str, $i, 1);

		switch(strlen($target)){
			case 1://シングルバイト
				$denbun_length = $denbun_length + 1;
				$char_kind = "SB";
				//logDebug("case1:$i:".$denbun_length);
				break;
			case 2://マルチバイト
				$denbun_length = $denbun_length + 2;
				$char_kind = "MB";
				//logDebug("case2:$i:".$denbun_length);
				break;
			default:
				$denbun_length = $denbun_length + 2;
				$char_kind = "MB";
				break;
		}

		//A.文字列の最初がマルチバイト文字の場合（SOKを付与）
		if ($before_char_kind == "" && $char_kind == "MB") {
			$denbun_length = $denbun_length + 1;
			//logDebug("A:$i:".$denbun_length);
		}
		//B.文字列の最後がマルチバイト文字の場合（EOKを付与）
		if ($i === ($mb_length - 1) && $char_kind == "MB") {
			$denbun_length = $denbun_length + 1;
			logDebug("B:$i:".$denbun_length);
		}
		//C.直前の文字列がシングルバイト文字でターゲットがマルチバイト文字の場合
		if ($before_char_kind == "SB" && $char_kind == "MB") {
			$denbun_length = $denbun_length + 1;
			//logDebug("C:$i:".$denbun_length);
		}
		//D.直前の文字列がマルチバイト文字でターゲットがシングルバイト文字の場合
		if ($before_char_kind == "MB" && $char_kind == "SB") {
			$denbun_length = $denbun_length + 1;
			//logDebug("D:$i:".$denbun_length);
		}

		$before_char_kind = $char_kind;
	}

	//logDebug("END:$i:".$denbun_length);
	return $denbun_length;
}

/**
 * HTML、絵文字エスケープされた文字列を取得する（パラメータ処理用）
 *
 * @param string  $str           文字列
 *
 * @return string エスケープされた文字列
 */
Function getEscapedString($str) {

	$str = repEmojiRemove(getHtmlEscapedString($str));
	$str = str_replace("&amp;", "", $str);	// &
	$str = str_replace("&quot;", "", $str);	// "
	$str = str_replace("&apos;", "", $str);	// '
	$str = str_replace("&lt;", "", $str);		// <
	$str = str_replace("&gt;", "", $str);		// >

	return $str;
}

/**
 * 発送注意コードから、発送注意文字列を取得
 *
 * @param mixed  $con          DBコネクションID
 * @param array  $ship_caution_cd      発送注意コード
 *
 * @return string		発送注意文字列の文字列
 */
Function fncGetShipCaution($con, $ship_caution_cd) {

	if (!$con) {
		return false;
	}
	if (!$ship_caution_cd) {
		return false;
	}

	$attention = '';

	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	/* $sql  = "SELECT ";
	$sql .= " ATTENTION ";
	$sql .= " FROM ATTENTION_TBL ";
	//$sql .= " WHERE ATTENTION_ID = ".getSqlValue($ship_caution_cd)." ";
	$sql .= " WHERE ATTENTION_ID = :ship_caution_cd ";
	//$result = dbQuery($con, $sql);
	$result = ssk_db_parse($con, $sql);
	ssk_db_bind_by_name($result,":ship_caution_cd",$ship_caution_cd,-1);
	ssk_db_execute($result);
	$data_arr = array();
	$rows = getNumRows($result, $data_arr); */
	$sql = "SELECT ";
		$sql .= "att_cont as ATTENTION  ";
	$sql .= "FROM ";
		$sql .= "m_att  ";
	$sql .= "WHERE ";
		$sql .= "att_cd = :ship_caution_cd ";
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
	$result = $con->prepare($sql);
	$result->bindParam(":ship_caution_cd", $ship_caution_cd, PDO::PARAM_INT );
	$result->execute();
	$rows = $result->rowCount();
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
	
	if ($rows > 0) {
		// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $data_arr);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan
		$attention = $row['ATTENTION'];
	}
	// ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/07/06 jst-arivazhagan
	//dbFreeResult($result);
	pdoFreeResult($result);
	// ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/07/06 jst-arivazhagan

	if ($attention == '' || $attention == NULL) {
		return false;
	}

	return $attention;

}

/**
 * パスワードをMD5化する
 *
 * @param mixed   $password パスワード
 *
 * @return string MD5化したパスワード
 */
Function fncHashPassword($password) {

	$h_password = md5($password);

	return $h_password;
}

/**
 * 最適テンプレートを適用する
 *
 * @param string $path テンプレートパス
 * @param int    $kind 種別
 *
 * @return string テンプレートフルパス
 */
Function fncIncludeTemplate($path,$kind) {

	global $TEMPLATE_ROOT_PATH;
	global $SSK_TEMPLATE_PATH;

	if($kind == 1)
	{
		if(file_exists($SSK_TEMPLATE_PATH.$path))
		{
			return $SSK_TEMPLATE_PATH.$path;
		}
		else
		{
			return $TEMPLATE_ROOT_PATH.'/common'.$path;
		}
	}
	else
	{
		return $SSK_TEMPLATE_PATH.$path;
	}
}

/**
 * 文字列を暗号化する
 *
 * @param string $v 文字列
 * @param int &$error_code エラーコード
 *
 * @return string 暗号化文字列
 */
Function fncEncrypt($v, &$error_code) {
	global $salt, $seed, $vector, $base64_enc;
	return ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, $v, $vector, $base64_enc, $error_code);
}

/**
 * 文字列を複合化する
 *
 * @param string $v 暗号化文字列
 * @param int &$error_code エラーコード
 *
 * @return string 複合化文字列
 */
Function fncDecrypt($v, &$error_code) {
	global $salt, $seed, $vector, $dec;
	return ssk_crypt_decrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, $vector,$v, $dec, $error_code);
}

/**
 * 致命的エラー画面表示
 * ワンタイムトークンがないなど修復できないエラー時に専用画面を表示し、処理を終了する
 *@param string s エラーメッセージ
 */
function fncExitError($message=""){
  global $smarty, $template_file;
  $smarty->assign('error_message', array($message));
  $template_file = 'error/index.tpl';
  pcFinish();
  exit;
}

/**
 * ドモホルンエラー画面表示
 * オフライン時の処理終了時などにドモホルン用エラー画面を表示し、処理を終了する
 *@param strign s エラーメッセージ
 */
function fncOfflineError($message=""){
        global $smarty, $template_file;
logDebug(__FUNCTION__);
        $smarty->assign('message',$message);
        $template_file = 'domo/offline_error.tpl';
	pcFinish();
        exit;
}

/**
 * 自分と同階層のテンプレートファイルをセットする
 * @param string name ファイル名
 * @return string file テンプレートファイルパス
 */
function fncSetTemplate($name){
  global $template_file, $TEMPLATE_DIR;
  $template_file = $TEMPLATE_DIR . "/" . $name . ".tpl";
  return $template_file;
}

/**
 * トークンチェック
 */
function fncCheckToken(){
  if( ! isToken() ){
    logDebug('TOKEN ERROR');
    fncExitError('有効なアクセスではありません。');
  }
}
/**
 * アクセスエラー
 */
function fncExitAccessError(){
    fncExitError('有効なアクセスではありません。');
}

/**
 * REGIST_USER,UPDATE_USER用の値を取得
 *@return string update_user  例) Web: /domo/login/index.html
 */
function fncGetUpdateUser(){
        global $SSK_SCRIPT_NAME;
        return 'Web: '.$SSK_SCRIPT_NAME;
}

/**
 * ひらがなチェック
 * 空白もエラーにする
 *@param string $text チェックする文字列
 *@return bool true:OK false:NG
 */
function fncCheckHiragana($text){
	if( ! chkHiragana($text) ){
		return false;
	}
	if( strpos($text, ' ') !== false ){
		return false;
	}
	if( strpos($text, '　') !== false ){
		return false;
	}
	return true;
}

/**
 * クッキーを記録
 *@param string $key クッキーのキー名
 *@param string $value クッキーの値
 *@param int $expire クッキーの有効期限のUNIXタイム
 */
function fncSetCookie($key, $value, $expire){
	logDebug('setcookie:key=['.$key.'] value=['.$value.'] expire=['.$expire.']');
	if( $expire ){
		setcookie($key, $value, $expire);
	}else{
		setcookie($key, $value);
	}
}
/**
 * クッキーを削除
 *@param string $key クッキーのキー名
 */
function fncRemoveCookie($key){
	setcookie($key, "", time() - 100);
}

/**
 * メールアドレスチェック
 *@param string $mail
 *@return bool true:OK false:NG
 */
function fncChkEmail($mail){
	if( strpos(trim($mail), '@') <= 1 ){
		logDebug(__FUNCTINON__.' ローカルパートが1バイトのためエラー:'.$mail);
		return false;
	}
	return chkEmail($mail);
}

/**
 * ログアウト処理
 */
function fncLogout(){
	// セッション変数を全て解除する
	$_SESSION = array();
	// セッションを切断するにはセッションクッキーも削除する
	// (セッション情報だけでなくセッションを破棄する)
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-42000, '/');
	}
	// 最終的に、セッションを破棄する
	session_destroy();
}

/**
 * DBエラー発生共通処理
 *@param object result 結果オブジェクト
 */
function fncDbError($result){
	 $error_array = oci_error($result);
         logError("DBエラー:" . $error_array["message"]);
}

/**
 * ssk_db_executeを実行し失敗時エラー画面を表示する
 *@param object result 結果オブジェクト
 */
function fncDbExecute(&$result){
	global $con;
	if( !$ret = ssk_db_execute($result) ){
		fncDbError($result);
		dbRollback($con);
		fncExitError('処理に失敗しました。');
	}
	return $ret;
}

function getSYSDATE() {
	global $SSK_DC_FLAG, $TEST_FLAG, $STAGE_FLAG;

	$sysdate = date('YmdHis');

	if ($SSK_DC_FLAG === false || $TEST_FLAG === true || $STAGE_FLAG === true) {
		if (isset($_REQUEST['sysdate']) && strlen($_REQUEST['sysdate']) === 14 && is_numeric($_REQUEST['sysdate'])) {
			if ($sysdate < $_REQUEST['sysdate']) {
				return $_REQUEST['sysdate'];
			}
		}
	}

	return $sysdate;
}

/**
 * チェックディジットを取得
 *@param int $num 計算対象の数値
 *@return int 0～9の値
 */
function fncGetCheckDegit($num){
	$kisuu = 0;
	$guu = 0;
	for($i=0; $i < strlen($num); $i++){
		$x = substr($num, $i, 1);
		if($i % 2 != 0){
			$guu += $x;
		}else{
			$kisuu += $x;
		}
	}
	$che = $guu * 3;
	$che = ($che + $kisuu) % 10;
	if( $che == 0 ){
		$che2 = 0;
	}else{
		$che2 = 10 - $che;
	}
logDebug(__FUNCTION__.":".$num."=>".$che2);
	return $che2;
}


/**
 * オフラインかどうか
 */
function isOffLine(){

	global $SSK_SYSTEM_STATUS;

//return true;

	if( $SSK_SYSTEM_STATUS == "2" ){
		return true;
	}else{
		return false;
	}
}

/**
 * 注文エラー画面表示
 * 注文後ログアウトせずに注文しようとした時に注文エラー画面を表示し、処理を終了する
 *@param strign s エラーメッセージ
 */
function fncOrderedError($message=""){
	global $SSL_URL ;
	$str = $SSL_URL.'/member/notorder.html' ;
	header("Location: $str");
	exit;
}

/**
 * 注文したかどうか
 */
function isOrdered(){

	return session_get_attribute('ORDERED');

}

/**
 * ２重ログインエラー画面表示
 * ログアウトせずにログインしようとした時にエラー画面を表示し、処理を終了する
 *@param strign s エラーメッセージ
 */
function fncDubleLoginError(){
	$str = '/member/loginDomo_confirm.html' ;
	header("Location: $str");
	exit;
}

/**
 * sendMail()
 * メール送信
 *
 * @patam	string $host		SMTPホスト
 * @patam	string $to			TOメールアドレス
 * @patam	string $subject	件名
 * @patam	string $body		本文
 * @patam	string $from		FROMメールアドレス
 * @patam	string $user		SMTP認証用ユーザー
 * @patam	string $password	SMTP認証用パスワード
// ▼R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
 * @patam	string $messageId	MessageId
// ▲R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa

 * @return	boolean true=正常、false=エラー
 */
// ▼R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
function send_mail($from, $to, $to_nm = null, $subject, $body, $opt_header, $user = null, $password = null, $cc_nm = null,$bcc_nm = null, $messageId = null) {
// ▲R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa

    $to_nm = null;
    
    global $TEST_FLAG, $STAGE_FLAG;

	if ($TEST_FLAG === true || $STAGE_FLAG === true) {
		//▼R-#39533_【H31-0016-048】WEB管理ツールの個対応メールの差出人変更対応 2020/01/18 saisys-hasegawa
		if(strpos($from,'ドモホルンリンクル') !== false){
			$from = 'ドモホルンリンクル<test@saishunkan.co.jp>';
		} else {
			$from = '再春館製薬所<test@saishunkan.co.jp>';
		}
		//▲R-#39533_【H31-0016-048】WEB管理ツールの個対応メールの差出人変更対応 2020/01/18 saisys-hasegawa
		if (!empty($to) && !PermmitMailDomainCheck($to)) {
            logDebug("テスト送信：toが許可されていないメールアドレス");
            return true;
        }
        if (!empty($cc_nm) && !PermmitMailDomainCheck($cc_nm)) {
            logDebug("テスト送信：ccが許可されていないメールアドレス");
            return true;
        }
        if (!empty($bcc_nm) && !PermmitMailDomainCheck($bcc_nm)) {
            logDebug("テスト送信：bccが許可されていないメールアドレス");
            return true;
        }
	}

	$host = 'localhost';

	// 共通変換処理
	$body = str_replace('__SERVER__',$_SERVER['SERVER_NAME'],$body);

	// 送信処理
	$punctuation = array("カ゛", "キ゛", "ク゛", "ケ゛", "コ゛",
						 "サ゛", "シ゛", "ス゛", "セ゛", "ソ゛",
						 "タ゛", "チ゛", "ツ゛", "テ゛", "ト゛",
						 "ハ゛", "ヒ゛", "フ゛", "ヘ゛", "ホ゛",
						 "ハ゜", "ヒ゜", "フ゜", "ヘ゜", "ホ゜");

	$punctuation_ = array("ガ", "ギ", "グ", "ゲ", "ゴ",
						  "ザ", "ジ", "ズ", "ゼ", "ゾ",
						  "ダ", "ヂ", "ヅ", "デ", "ド",
						  "バ", "ビ", "ブ", "ベ", "ボ",
						  "パ", "ピ", "プ", "ペ", "ポ");

	$subject_ = "";
	for ($i = 0; $i < mb_strlen($subject); $i++) {
		$tmp = mb_substr($subject, $i, 1);
		if (checkEmoji($tmp) == true) {
			$subject_ .= $tmp;
		} else {
			$subject_ .= mb_convert_kana($tmp, "KV", "SJIS");
		}
	}
	$subject = $subject_;
	$subject = str_replace($punctuation, $punctuation_, $subject);

	$body_ = "";
	for ($i = 0; $i < mb_strlen($body); $i++) {
		$tmp = mb_substr($body, $i, 1);
		if (checkEmoji($tmp) == true) {
			$body_ .= $tmp;
		} else {
			$body_ .= mb_convert_kana($tmp, "KV");
		}
	}
	$body = $body_;
	$body = str_replace($punctuation, $punctuation_, $body);

	$body = str_replace("\n", "\r\n", $body);

	$connect = fsockopen($host, 25, $errno, $errstr, 10);

	if ($connect == false) {
		logDebug("M1:【".$subject."】<".$to.">ソケットオープンに失敗しました。");
		return false;
	}

	if (strlen($user) > 0) {
		fputs($connect, "EHLO " . $host . "\r\n");
		$response = fgets($connect);
	} else {
		fputs($connect, "HELO " . $host . "\r\n");
		$response = fgets($connect);
	}

	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
    	logDebug("M2:【".$subject."】<".$to.">エラーが発生しました。（".$error_code.")");
    	logDebug($response);
		return false;
	}

	if (strlen($user) > 0) {
		fputs($connect, "AUTH PLAIN " . exec('perl -MMIME::Base64 -e "print &MIME::Base64::encode_base64(\"' . $user . '\0' . $user . '\0' . $password . '\")"') . "\r\n");
		$response = fgets($connect);
		$error_code = getErrorCode(getResponseCode($response));
		if (strlen($error_code) > 0) {
    	logDebug("M3:【".$subject."】<".$to.">エラーが発生しました。（".$error_code.")");
    	logDebug($response);
			return false;
		}
	}

	//20070404 From対応
	$tmp_send_from = $from;
	if (strpos($tmp_send_from,"<")) {
		$tmp_send_from = explode("<",$from);
	} else {
		$send_from = $from;
	}
	if (is_array($tmp_send_from) && count($tmp_send_from) > 0) {
		$send_from      = substr($tmp_send_from[1], 0, strlen($tmp_send_from[1]) - 1);
		$send_from_name = $tmp_send_from[0];

		$from = "=?ISO-2022-JP?B?" . base64_encode(mb_convert_encoding($send_from_name, "ISO-2022-JP", "SJIS")) ."?= <".$send_from. ">";
	}
	//20070404 From対応

	//20070404 From対応
//	fputs($connect, "MAIL FROM:" . $from . "\r\n");
	fputs($connect, "MAIL FROM:" . $send_from . "\r\n");
	//20070404 From対応
	$response = fgets($connect);
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
    	logDebug("M4:【".$subject."】<".$to.">エラーが発生しました。（".$error_code.")");
    	logDebug($response);
		return false;
	}

	$rcptToArray = array();
	$toArray     = array();

	if (is_array($to)) {
		$rcptToArray = array_merge($rcptToArray, $to);
//		$toArray     = array_merge($toArray    , $to);
	} else {
		$rcptToArray = array_merge($rcptToArray, preg_split("/,/", $to));
//		$toArray     = array_merge($toArray    , preg_split("/,/", $to));
	}

	foreach ($rcptToArray as $rcptTo) {
		if ($rcptTo) {
			fputs($connect, "RCPT TO:" . $rcptTo . "\r\n");
			$response = fgets($connect);
			$error_code = getErrorCode(getResponseCode($response));
			if (strlen($error_code) > 0) {
    	logDebug("M5:【".$subject."】<".$to.">エラーが発生しました。（".$error_code.")");
    	logDebug($response);
				return false;
			}
		}
	}

	//TO対応
	if ($to_nm == "") {
		if (is_array($to)) {
			$toArray     = array_merge($toArray    , $to);
		} else {
			$toArray     = array_merge($toArray    , preg_split("/,/", $to));
		}
	} else {
		if (is_array($to_nm)) {
			$toArray     = array_merge($toArray    , $to_nm);
		} else {
			$toArray     = array_merge($toArray    , preg_split("/,/", $to_nm));
		}
	}

	$CcArray  = array();
	$BccArray = array();

	//CC対応
	if (is_array($cc_nm)) {
		$CcArray     = array_merge($CcArray    , $cc_nm);
	} else {
		$CcArray     = array_merge($CcArray    , preg_split("/,/", $cc_nm));
	}
	//BCC対応
	if (is_array($bcc_nm)) {
		$BccArray     = array_merge($BccArray    , $bcc_nm);
	} else {
		$BccArray     = array_merge($BccArray    , preg_split("/,/", $bcc_nm));
	}
	//

	fputs($connect, "DATA"."\r\n");
	$response = fgets($connect);
	fputs($connect, "From: " . $from . "\r\n");
	fputs($connect, "To: " . join(",", $toArray) . "\r\n");
	fputs($connect, "Subject: " . "=?ISO-2022-JP?B?" . base64_encode(mb_convert_encoding($subject, "ISO-2022-JP", "SJIS")) . "?=" . "\r\n");
	//CC対応
	if (count($CcArray) > 0) {
		fputs($connect, "Cc: " . join(",", $CcArray) . "\r\n");
	}
	//BCC対応
	if (count($BccArray) > 0) {
		fputs($connect, "Bcc: " . join(",", $BccArray) . "\r\n");
	}
	fputs($connect, "Date: " . date("r") . "\r\n");
	fputs($connect, "MIME-Version: " . "1.0" . "\r\n");
	fputs($connect, "Content-Type: " . "text/plain; charset=\"ISO-2022-JP\"" . "\r\n");
	fputs($connect, "Content-Transfer-Encoding: " . "8bit" . "\r\n");
	
	// ▼R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
	if ($messageId) {
		// MessageId設定
		fputs($connect, "message-id:<" . $messageId . ">\r\n");
	}
	// ▲R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
	
	fputs($connect, "\r\n");
	fputs($connect, mb_convert_encoding($body, "ISO-2022-JP", "SJIS") . "\r\n");

	fputs($connect, "." . "\r\n");
	$response = fgets($connect);
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
    	logDebug("M6:【".$subject."】<".$to.">エラーが発生しました。（".$error_code.")");
    	logDebug($response);
		return false;
	}

	fputs($connect, "QUIT"."\r\n");
	$response = fgets($connect);
	
	// ▼R-#33443_【H30-0077-005】WEB管理ツール（PC個別メール送信）のログ取得と文字数チェック改善 2018/04/25 nul-nagata
	logDebug("【sendmail】送信先：".$to."→SMTPレスポンス：".$response);
	// ▲R-#33443_【H30-0077-005】WEB管理ツール（PC個別メール送信）のログ取得と文字数チェック改善 2018/04/25 nul-nagata
	
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
    	logDebug("M7:【".$subject."】<".$to.">エラーが発生しました。（".$error_code.")");
    	logDebug($response);
		return false;
	}
	fclose($connect);
	return true;
}

// ▼R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa
/**
 * MessageId生成
 * @param string $key  キー
 * @return string MessageId
 */
function createMessageId($key) {
	// 指定キーのハッシュ値(MD5)を取得
	$hashKey = hash("md5", $key);
	
	// 現在日時(年月日時分秒)を取得
	$nowStr = date("YmdHis");
	
	// MessageId生成
	$messageId = $nowStr . "." . $hashKey . "@saishunkan.co.jp";
	
	return $messageId;
}
// ▲R-#39524_【H31-0392-001】見える化のためのメール受信送信データ項目追加 2020/09/26 saisys-hasegawa

?>
