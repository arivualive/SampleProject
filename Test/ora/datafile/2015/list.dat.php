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
		$value = preg_replace("/^'/", "'%", getSqlValue($value));
		$value = preg_replace("/'$/", "%'", $value);
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
			$value = preg_replace("/^'/", "'%", getSqlValue($value));
			$value = preg_replace("/'$/", "%'", $value);
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
$sql .=        " a.site_kbn, ";
$sql .=        " a.kainno, ";
$sql .=        " a.tel_no, ";
$sql .=        " to_char(a.direct_dt, 'YYYY/MM/DD HH24:MI:SS') as direct_dt, ";
$sql .=        " a.name_kanji, ";
$sql .=        " a.email,";
$sql .=        " a.m_email, ";
$sql .=        " a.host_flg, ";
$sql .=        " a.ORDER_COUNT01, ";
$sql .=        " a.ORDER_COUNT02, ";
$sql .=        " a.SHOHIN_CD03, ";
$sql .=        " a.ORDER_COUNT03, ";
$sql .=        " a.Q_BAITAI_NAME, ";
// ▼R-#16545_【直販対応】めぐりの結晶 2015/01/16 nul-hata
$sql .=        " a.ORDER_COUNT04, ";
// ▲R-#16545_【直販対応】めぐりの結晶 2015/01/16 nul-hata
$sql .=        " a.print_flg, ";
$sql .=        " a.order_status, ";
$sql .=        " a.session_id, ";
$sql .=        " a.cc_name, ";
$sql .=        " a.cc_scd, ";
// ▼R-#17717_注文時のカード番号をPLSで見れるようにする 2015/06/12 nul-motoi
$sql .=        " a.CC_NO, ";
$sql .=        " a.CC_TERM, ";
// ▲R-#17717_注文時のカード番号をPLSで見れるようにする 2015/06/12 nul-motoi

$tmpPrice_Sql = '';
$tmpPrice_Sql .=        " ( ";
$tmpPrice_Sql .=        " SELECT SUM( (s.TANKA * a.ORDER_COUNT01) * (sy.TAX_RATE + 1) ) AS wk_price1 ";
$tmpPrice_Sql .=        " FROM sqlshohin_tbl s , system_tbl sy";
$tmpPrice_Sql .=        " WHERE sy.SITE_KBN='1' ";

$tmpPrice_Sql .=        " AND  s.SHOHIN_CD    = a.SHOHIN_CD01";
$tmpPrice_Sql .=        " AND  NVL(s.SHOHIN_LEVEL,0) = NVL(a.SHOHIN_LEVEL01,0)";

$tmpPrice_Sql .=        " ) AS SUM_PRICE1, ";

$tmpPrice_Sql .=        " ( ";
$tmpPrice_Sql .=        " SELECT SUM( (s.TANKA * a.ORDER_COUNT02) * (sy.TAX_RATE + 1) ) AS wk_price2 ";
$tmpPrice_Sql .=        " FROM sqlshohin_tbl s , system_tbl sy";
$tmpPrice_Sql .=        " WHERE sy.SITE_KBN='1' ";

$tmpPrice_Sql .=        " AND  s.SHOHIN_CD    = a.SHOHIN_CD02";
$tmpPrice_Sql .=        " AND  NVL(s.SHOHIN_LEVEL,0) =NVL(a.SHOHIN_LEVEL02,0)";

$tmpPrice_Sql .=        " ) AS SUM_PRICE2, ";
$tmpPrice_Sql .=        " ( ";
$tmpPrice_Sql .=        " SELECT SUM( (s.TANKA * a.ORDER_COUNT03) * (sy.TAX_RATE + 1) ) AS wk_price3 ";
$tmpPrice_Sql .=        " FROM sqlshohin_tbl s , system_tbl sy";
$tmpPrice_Sql .=        " WHERE sy.SITE_KBN='1' ";

$tmpPrice_Sql .=        " AND  s.SHOHIN_CD    = a.SHOHIN_CD03";
$tmpPrice_Sql .=        " AND  NVL(s.SHOHIN_LEVEL,0) =NVL(a.SHOHIN_LEVEL03,0)";

// ▼R-#16545_【直販対応】めぐりの結晶 2015/01/16 nul-hata
$tmpPrice_Sql .=        " ) AS SUM_PRICE3, ";
$tmpPrice_Sql .=        " ( ";
$tmpPrice_Sql .=        " SELECT SUM( (s.TANKA * a.ORDER_COUNT04) * (sy.TAX_RATE + 1) ) AS wk_price4 ";
$tmpPrice_Sql .=        " FROM sqlshohin_tbl s , system_tbl sy";
$tmpPrice_Sql .=        " WHERE sy.SITE_KBN='1' ";

$tmpPrice_Sql .=        " AND  s.SHOHIN_CD    = a.SHOHIN_CD04";
$tmpPrice_Sql .=        " AND  NVL(s.SHOHIN_LEVEL,0) =NVL(a.SHOHIN_LEVEL04,0)";

$tmpPrice_Sql .=        " ) AS SUM_PRICE4 ";
// ▲R-#16545_【直販対応】めぐりの結晶 2015/01/16 nul-hata

$sql .= $tmpPrice_Sql;

$sql .= " FROM DrinkDirectOrder_Tbl a ";

$sql .= " WHERE ";

$sql .= $where;
$sql .= ") ";
$sql .= " ORDER BY direct_dt desc";

logDebug("sql=".$sql);

//SQLを実行する
$result = dbQuery($con_utl, $sql);

//データカウントを取得する
$rows = getNumRows($result, $arr_utl);

//データ取得
$order_data = array();

for ($i = 0; $i < $rows; $i++) {
    $row = dbFetchRow($result, $i, $arr_utl);
    $tmp = array();

    $tmp['direct_order_id'] = $row['DIRECT_ORDER_ID'];
    $tmp['direct_dt']      = getHtmlEscapedString($row['DIRECT_DT']);
    $tmp['kainno']        = getHtmlEscapedString($row['KAINNO']);
    $tmp['name_kanji']     = getHtmlEscapedString(ssk_decrypt($row['NAME_KANJI']));
    $tmp['tel_no']        = getHtmlEscapedString(ssk_decrypt($row['TEL_NO']));
    $tmp['email']         = getHtmlEscapedString(ssk_decrypt($row['EMAIL']));
    $tmp['m_email']         = getHtmlEscapedString(ssk_decrypt($row['M_EMAIL']));
    $tmp['order_count01'] = (int)$row['ORDER_COUNT01'];
    $tmp['order_count02'] = (int)$row['ORDER_COUNT02'];
    //飲むドモ直販の該当カラムには、1022の商品が入っている可能性があるので、ここで1022の場合は0個とするように改修
    if($row['SHOHIN_CD03'] != '1022'){
        $tmp['order_count03'] = (int)$row['ORDER_COUNT03'];
    }else{
        $tmp['order_count03'] = 0;
    }
    // ▼R-#16545_【直販対応】めぐりの結晶 2015/01/16 nul-hata
    if($row['ORDER_COUNT04'] != ''){
        $tmp['order_count04'] = (int)$row['ORDER_COUNT04'];
    }else{
        $tmp['order_count04'] = 0;
    }
    // ▲R-#16545_【直販対応】めぐりの結晶 2015/01/16 nul-hata
    $tmp['sum_price1']     = getHtmlEscapedString('\\'.number_format($row['SUM_PRICE1']));
    $tmp['sum_price2']     = getHtmlEscapedString('\\'.number_format($row['SUM_PRICE2']));
    $tmp['sum_price3']     = getHtmlEscapedString('\\'.number_format($row['SUM_PRICE3']));
    // ▼R-#16545_【直販対応】めぐりの結晶 2015/01/16 nul-hata
    $tmp['sum_price4']     = getHtmlEscapedString('\\'.number_format($row['SUM_PRICE4']));
    // ▲R-#16545_【直販対応】めぐりの結晶 2015/01/16 nul-hata
    $tmp['q_baitai_name']  = $row['Q_BAITAI_NAME'];
    $tmp['host_flg']      = $row['HOST_FLG'];
    $tmp['print_flg']     = $row['PRINT_FLG'];
    $tmp['order_status']  = $row['ORDER_STATUS'];
    $tmp['session_id']    = $row['SESSION_ID'];
    $tmp['site_kbn']      = $row['SITE_KBN'];
    $tmp['site_kbn_nm']   = ($tmp['site_kbn'] === '1') ? 'PC' : '携帯';
    $tmp['net_ij']  = "";
	if ($row['CC_NAME'] != '') {
		$tmp['cc_name'] = getHtmlEscapedString(ssk_decrypt($row['CC_NAME']));
	} else {
		$tmp['cc_name'] = "";
	}
	if ($row['CC_SCD'] != '' && $row['ORDER_STATUS'] < 2) {
		$tmp['cc_scd'] = getHtmlEscapedString(ssk_decrypt($row['CC_SCD']));
	} else {
		$tmp['cc_scd'] = "";
	}
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

//DB close
dbClose($con_utl);
?>