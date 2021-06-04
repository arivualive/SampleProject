<?php
ini_set('error_reporting',E_ALL);
if ($mode == '' || $mode == 'clear') {

    $kainno    = '';
    $name_kanji = '';
    $tel_no    = '';
    $email     = '';

    $today = time();
    $start = $today - 7 * 24 * 60 * 60;
    $s_yy  = date('Y', $start);
    $s_mm  = date('m', $start);
    $s_dd  = date('d', $start); // not j
    $e_yy  = date('Y', $today);
    $e_mm  = date('m', $today);
    $e_dd  = date('d', $today); // not j

    for($i=0; $i<count($order_status); $i++){
        $order_status[$i] = "";
    }

    // サイト区分のラジオボタンの値
    // 両方
    $site_kbn_chkd0 = 'checked="checked"';
    // PC
    $site_kbn_chkd1 = '';
    // 携帯
    $site_kbn_chkd2 = '';

    // クリアボタンが押下された場合、両方を選択するようにする
    $s_sitekbn = '0';

    // 全件
    $ordersts_chkd0 = '';
    // 完了
    $ordersts_chkd1 = 'checked="checked"';
    // 未完
    $ordersts_chkd2 = '';

    $s_ordersts = '1';

    // クリアボタンが押下された場合、両方を選択するようにする
    $s_net_ij_kbn = '0';

}

$cnt=0;
for($i=0; $i<count($order_status); $i++){
    if($order_status[$i] != ""){
        $cnt++;
    }
}
if($cnt==0){
    $order_status[0]    = '0';
}

//DB接続
$con_utl = dbConnect();

// WHERE句生成
$where = array();
$where[] = 'a.delete_flg <> 1';

if ($s_yy != '' && $s_mm != '' && $s_dd != '') {
    $ymdh = sprintf('%04d%02d%02d000000', $s_yy, $s_mm, $s_dd);
    $where[] = "a.direct_dt >= to_date('$ymdh', 'yyyymmddhh24miss')";
}
if ($e_yy != '' && $e_mm != '' && $e_dd != '') {
    $ymdh = sprintf('%04d%02d%02d235959', $e_yy, $e_mm, $e_dd);
    $where[] = "a.direct_dt <= to_date('$ymdh', 'yyyymmddhh24miss')";
}
if ($kainno != '')
    $where[] = "a.kainno like ".getSqlValue('%'.$kainno.'%');

if ($s_sitekbn === '1') {
    $site_kbn_chkd1 = 'checked="checked"';
    $where[] = "a.site_kbn = '1'";
} else if ($s_sitekbn === '2') {
    $site_kbn_chkd2 = 'checked="checked"';
    $where[] = "a.site_kbn = '2'";
} else {
    $site_kbn_chkd0 = 'checked="checked"';
}
if ($s_ordersts === '1') {
    $ordersts_chkd1 = 'checked="checked"';
    $where[] = "a.host_dt is not null";
} else if ($s_ordersts === '2') {
    $ordersts_chkd2 = 'checked="checked"';
    $where[] = "a.host_dt is null";
} else {
    $ordersts_chkd0 = 'checked="checked"';
}

		$noArray = array();
		if ($name_kanji != '') {
			$value = $name_kanji;
			$value = mb_ereg_replace("^'", "'%", getSqlValue($value));
			$value = mb_ereg_replace("'$", "%'", $value);
			$noArray[] = "V2.NAME_KANJI LIKE " . $value;
		}
		if ($tel_no != '') {
			$value = $tel_no;
			$value = str_replace("-", "", $value);
			$noArray[] = "V1.TEL_NO = DBMS_CRYPTO.Hash(to_clob(nvl(" . getSqlValue($value) . ",0)),3)";
		}
		if ($email != '') {
			$value = $email;
			if (strstr($value, "@")) {
				$value = substr($value, 0, strpos($value, "@"));
	        }
			if (strlen($value) > 0) {
				$value = mb_ereg_replace("^'", "'%", getSqlValue($value));
				$value = mb_ereg_replace("'$", "%'", $value);
				$noArray[] = "V1.EMAIL LIKE ".$value;
			}
		}
		
		if (count($noArray)) $where[] = 'a.direct_order_id in (SELECT V1.SAMPLE_REQUEST_ID FROM SampleRequest1_V V1, SampleRequest2_V V2 WHERE '.implode(' AND ', $noArray).' AND V1.SAMPLE_REQUEST_ID = V2.SAMPLE_REQUEST_ID)';

if($mode == 'clear'){
    $where[] = 'order_status IN (0)';
}else{
    if (count($order_status) > 0) {
        $where[] = 'a.order_status IN ('.implode(', ', $order_status).')';
    }
}

$where = implode(' AND ', $where);

//SQL文作成
$sql  = "SELECT * FROM (";
$sql .=    "SELECT ";
$sql .=        " a.direct_order_id, ";
$sql .=        " to_char(a.direct_dt, 'YYYY/MM/DD HH24:MI:SS') as direct_dt, ";
$sql .=        " a.site_kbn, ";
$sql .=        " a.kainno, ";
$sql .=        " a.name_kanji, ";
$sql .=        " a.order_status, ";
$sql .=        " a.host_flg, ";
$sql .=        " a.tel_no, ";
$sql .=        " a.email,";

$sql .=        " a.SHOHIN_CD01, a.SHOHIN_LEVEL01, a.ORDER_COUNT01, ";
$sql .=        " a.SHOHIN_CD02, a.SHOHIN_LEVEL02, a.ORDER_COUNT02, ";
$sql .=        " a.SHOHIN_CD03, a.SHOHIN_LEVEL03, a.ORDER_COUNT03, ";
$sql .=        " a.SHOHIN_CD04, a.SHOHIN_LEVEL04, a.ORDER_COUNT04, ";
$sql .=        " a.SHOHIN_CD05, a.SHOHIN_LEVEL05, a.ORDER_COUNT05, ";
$sql .=        " a.SHOHIN_CD06, a.SHOHIN_LEVEL06, a.ORDER_COUNT06, ";
$sql .=        " a.SHOHIN_CD07, a.SHOHIN_LEVEL07, a.ORDER_COUNT07, ";
$sql .=        " a.SHOHIN_CD08, a.SHOHIN_LEVEL08, a.ORDER_COUNT08, ";
$sql .=        " a.SHOHIN_CD09, a.SHOHIN_LEVEL09, a.ORDER_COUNT09, ";
$sql .=        " a.SHOHIN_CD10, a.SHOHIN_LEVEL10, a.ORDER_COUNT10, ";
$sql .=        " a.SHOHIN_CD11, a.SHOHIN_LEVEL11, a.ORDER_COUNT11, ";
$sql .=        " a.SHOHIN_CD12, a.SHOHIN_LEVEL12, a.ORDER_COUNT12, ";
$sql .=        " a.SHOHIN_CD13, a.SHOHIN_LEVEL13, a.ORDER_COUNT13, ";
$sql .=        " a.SHOHIN_CD14, a.SHOHIN_LEVEL14, a.ORDER_COUNT14, ";
$sql .=        " a.SHOHIN_CD15, a.SHOHIN_LEVEL15, a.ORDER_COUNT15, ";
$sql .=        " a.SHOHIN_CD16, a.SHOHIN_LEVEL16, a.ORDER_COUNT16, ";
$sql .=        " a.SHOHIN_CD17, a.SHOHIN_LEVEL17, a.ORDER_COUNT17, ";
$sql .=        " a.SHOHIN_CD18, a.SHOHIN_LEVEL18, a.ORDER_COUNT18, ";
$sql .=        " a.SHOHIN_CD19, a.SHOHIN_LEVEL19, a.ORDER_COUNT19, ";
$sql .=        " a.SHOHIN_CD20, a.SHOHIN_LEVEL20, a.ORDER_COUNT20, ";

$sql .=        " a.Q_AFTERCARE, ";
$sql .=        " a.Q_BAITAI_NAME, a.BAITAI_NAME, ";
$sql .=        " a.Q_FIRST_HOPED, ";
$sql .=        " a.Q_REASON_TYPE, a.Q_REASON_COMMENT, ";

$sql .=        " a.m_email, ";
$sql .=        " a.print_flg, ";
//▼2012/07/12 R-#4822 直販フローのクレジット決済項目にカード名義人の追加対応(ulsystems hatano)
$sql .=        " a.session_id, ";
//▼2012/08/03 R-#4888 直販フローのクレジット決済項目にセキュリティコードの追加対応(ulsystems hatano)
$sql .=        " a.cc_name, ";
$sql .=        " a.cc_scd, ";
//▲2012/08/03 R-#4888 直販フローのクレジット決済項目にセキュリティコードの追加対応(ulsystems hatano)
//▲2012/07/12 R-#4822 直販フローのクレジット決済項目にカード名義人の追加対応(ulsystems hatano)
// ▼R-#17717_注文時のカード番号をPLSで見れるようにする 2015/06/12 nul-motoi
$sql .=        " a.CC_NO, ";
$sql .=        " a.CC_TERM ";
// ▲R-#17717_注文時のカード番号をPLSで見れるようにする 2015/06/12 nul-motoi

$sql .= " FROM HalfDirectOrder_Tbl a ";

$sql .= " WHERE ";

$sql .= $where;
$sql .= ") ";
$sql .= " ORDER BY direct_dt desc";

logDebug("sql=".$sql);

//SQLを実行する
$result = dbQuery($con_utl, $sql);

//データカウントを取得する
$rows = getNumRows($result, $arr_utl);

logDebug("rows=".$rows);

//データ取得
$order_data = array();
//商品データ取得用SQL
$shohin_data_sql = array();

for ($i = 0; $i < $rows; $i++) {
    $row = dbFetchRow($result, $i, $arr_utl);
    $tmp = array();

    $tmp['direct_order_id'] = $row['DIRECT_ORDER_ID'];
    $tmp['direct_dt']      = $row['DIRECT_DT'];
    $tmp['kainno']        = $row['KAINNO'];
    $tmp['name_kanji']     = ssk_decrypt($row['NAME_KANJI']);
    $tmp['tel_no']        = ssk_decrypt($row['TEL_NO']);
    $tmp['email']         = ssk_decrypt($row['EMAIL']);
    $tmp['m_email']         = ssk_decrypt($row['M_EMAIL']);

    $tmp['q_aftercare'] = $row['Q_AFTERCARE'];
    $tmp['q_baitai_name'] = $row['Q_BAITAI_NAME'];
    $tmp['q_first_hoped'] = $row['Q_FIRST_HOPED'];
    $tmp['q_reason_type'] = $row['Q_REASON_TYPE'];
    $tmp['q_reason_comment'] = $row['Q_REASON_COMMENT'];

    $tmp['host_flg']      = $row['HOST_FLG'];
    $tmp['print_flg']     = $row['PRINT_FLG'];
    $tmp['order_status']  = $row['ORDER_STATUS'];
    $tmp['session_id']    = $row['SESSION_ID'];
    $tmp['site_kbn']      = $row['SITE_KBN'];
    $tmp['site_kbn_nm']   = ($tmp['site_kbn'] === '1') ? 'PC' : '携帯';
    $tmp['net_ij']  = "";

	// 文字表現の設定
    $tmp['host_str'] = null;
    if ($tmp['host_flg'] == 1)
        if ($tmp['print_flg'] == 9)
            $tmp['host_str'] = '◎';
        else
            $tmp['host_str'] = '○';
    else if ($tmp['host_flg'] == 0)
        $tmp['host_str'] = '×';
    else
        $tmp['host_str'] = '';
    $tmp['order_status_str'] = '';
    switch ($tmp['order_status']) {
    case 0:        $tmp['order_status_str'] = ''; break;
    //▼R-#13002 WEB管理ツールのS請求・注文の状態表示変更対応 2014/01/28 uls-soga
    case 1:        $tmp['order_status_str'] = 'JU'; break;
    //▲R-#13002 WEB管理ツールのS請求・注文の状態表示変更対応 2014/01/28 uls-soga
    case 2:        $tmp['order_status_str'] = 'J'; break;
    case 9:        $tmp['order_status_str'] = 'キャ'; break;
    }

    if ($tmp['q_aftercare'] == '1')
        $tmp['q_aftercare_str'] = '希望する';
    elseif ($tmp['q_aftercare'] == '0')
        $tmp['q_aftercare_str'] = '希望しない';
    else
        $tmp['q_aftercare_str'] = '';

    $tmp['q_first_hoped_str'] = '';
    switch ($tmp['q_first_hoped']) {
    case 0:        $tmp['q_first_hoped_str'] = ''; break;
    case 1:        $tmp['q_first_hoped_str'] = '1ヵ月実感セット'; break;
    case 2:        $tmp['q_first_hoped_str'] = '無料お試しセット'; break;
    case 3:        $tmp['q_first_hoped_str'] = '特に決めていなかった'; break;
    }

    $tmp['q_reason_type_str'] = '';
    switch ($tmp['q_reason_type']) {
    case 0:        $tmp['q_reason_type_str'] = ''; break;
    case 1:        $tmp['q_reason_type_str'] = '無料お試しセットを試すのが面倒だから'; break;
    case 2:        $tmp['q_reason_type_str'] = '電話カウンセリングなどのやりとりが苦手だから'; break;
    case 3:        $tmp['q_reason_type_str'] = '最初から購入を決めていたから'; break;
    case 4:        $tmp['q_reason_type_str'] = '少しでも早く使い始めたかったから'; break;
    case 5:        $tmp['q_reason_type_str'] = 'しっかり試したかったから'; break;
    case 6:        $tmp['q_reason_type_str'] = 'その他'; break;
    }

	$tmp['shohin_data'] = array();
	// 商品データの保持
	for ($n=1;$n<=20;$n++) {
		$col = sprintf ('%02d', $n);
		if ($row['ORDER_COUNT'.$col] > 0) {
			$tmp['shohin_data'][] = array(
				'shohin_cd' => $row['SHOHIN_CD'.$col],
				'shohin_level' => $row['SHOHIN_LEVEL'.$col],
				'order_count' => $row['ORDER_COUNT'.$col],
			);
			$sql  = '(T1.SHOHIN_CD = ';
			$sql .= getSqlValue($row['SHOHIN_CD'.$col]);
			$sql .= ' AND NVL(T1.SHOHIN_LEVEL,0) = NVL(';
			$sql .= getSqlValue($row['SHOHIN_LEVEL'.$col]);
			$sql .= ',0)';
			$sql .= ')';
			if (!in_array($sql, $shohin_data_sql)) $shohin_data_sql[] = $sql;
		}
	}

	//▼2012/07/12 R-#4822 直販フローのクレジット決済項目にカード名義人の追加対応(ulsystems hatano)
	if ($row['CC_NAME'] != '') {
		$tmp['cc_name'] = getHtmlEscapedString(ssk_decrypt($row['CC_NAME']));
	} else {
		$tmp['cc_name'] = "";
	}
	//▲2012/07/12 R-#4822 直販フローのクレジット決済項目にカード名義人の追加対応(ulsystems hatano)
	//▼2012/08/03 R-#4888 直販フローのクレジット決済項目にセキュリティコードの追加対応(ulsystems hatano)
	if ($row['CC_SCD'] != '' && $row['ORDER_STATUS'] < 2) {
		$tmp['cc_scd'] = getHtmlEscapedString(ssk_decrypt($row['CC_SCD']));
	} else {
		$tmp['cc_scd'] = "";
	}
	//▲2012/08/03 R-#4888 直販フローのクレジット決済項目にセキュリティコードの追加対応(ulsystems hatano)
	// ▼R-#17717_注文時のカード番号をPLSで見れるようにする 2015/06/12 nul-motoi
	if ($row['CC_NO'] != '') {
		$tmp['cc_no'] = getHtmlEscapedString(ssk_decrypt($row['CC_NO']));
	} else {
		$tmp['cc_name'] = "";
	}
	if ($row['CC_TERM'] != '') {
		$tmp['cc_term'] = $row['CC_TERM'];
	} else {
		$tmp['cc_term'] = "";
	}
	// ▲R-#17717_注文時のカード番号をPLSで見れるようにする 2015/06/12 nul-motoi

    $order_data[$i]  = $tmp;
}
if ($rows === 0)
    $err_message = "データが存在しません";

//ステートメントの開放
dbFreeResult($result);


//商品データ
$shohin_data = array();
if (count($shohin_data_sql)) {
	// 消費税の取得
	$result = dbQuery($con_utl, "SELECT (TAX_RATE + 1) AS TAX_RATE FROM SYSTEM_TBL WHERE SITE_KBN='1'");
	$row = dbFetchRow($result, 0, $arr_utl);
	$tax_rate = $row['TAX_RATE'];
	//ステートメントの開放
	dbFreeResult($result);

	// 商品データをマスタから取得する
	$sql  = "SELECT T2.SHOHIN_CD ,T2.SHOHIN_NAME ,T1.TANKA";
	$sql .= " FROM SqlShohin_Tbl T1 LEFT JOIN ShohinPC_Tbl T2";
	$sql .= " ON T1.SHOHIN_CD = T2.SHOHIN_CD";
	$sql .= " AND (T1.SHOHIN_LEVEL = T2.SHOHIN_LEVEL OR";
	$sql .= " (T1.SHOHIN_LEVEL is NULL AND T2.SHOHIN_LEVEL is NULL)";
	$sql .= " )";

	$sql .= " WHERE ";
	$sql .= implode($shohin_data_sql, ' OR ');

	logDebug("sql=".$sql);

	//SQLを実行する
	$result = dbQuery($con_utl, $sql);

	//データカウントを取得する
	$rows_shohin = getNumRows($result, $arr_utl);

	for ($i = 0; $i < $rows_shohin; $i++) {
		$row = dbFetchRow($result, $i, $arr_utl);
		$tmp = array();
		$tmp['shohin_name'] = getHtmlEscapedString($row['SHOHIN_NAME']);
		$tmp['tax_price'] = $row['TANKA'];
		
		$shohin_data[$row['SHOHIN_CD']] = $tmp;
	}
	//ステートメントの開放
	dbFreeResult($result);
}

//DB close
dbClose($con_utl);
?>