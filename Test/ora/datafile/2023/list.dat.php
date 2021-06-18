<?php
ini_set('error_reporting',E_ALL);
if ($mode == '' || $mode == 'clear') {

	$kainno    = '';
	$kain_name = '';
	$tel_no    = '';
	$email     = '';

	$today = time();
	$start = $today - 2 * 24 * 60 * 60;
	$s_yy  = date('Y', $start);
	$s_mm  = date('m', $start);
	$s_dd  = date('d', $start); // not j
	$e_yy  = date('Y', $today);
	$e_mm  = date('m', $today);
	$e_dd  = date('d', $today); // not j

	for($i=0; $i<count($order_status); $i++){
		$order_status[$i] = "";
	}

}

$cnt=0;
for($i=0; $i<count($order_status); $i++){
    if($order_status[$i] != ""){
        $cnt++;
    }
}
if($cnt==0){
    $order_status[0]    = '1';
}

//DB接続
$con_utl = dbConnect();

// WHERE句生成
$where = array();
$where[] = 'a.delete_flg <> 1';
//▼R-#40992_【R02-0028-009】（不具合事象解消）_長白直販WEB⇒WAO連携で連携できない (WEB管理ツール) 2020/04/24 jst-morimoto
$where[] = 'h.ORDER_KBN (+)  = 1' ;
//▲R-#40992_【R02-0028-009】（不具合事象解消）_長白直販WEB⇒WAO連携で連携できない (WEB管理ツール) 2020/04/24 jst-morimoto

if ($s_yy != '' && $s_mm != '' && $s_dd != '') {
    $ymdh = sprintf('%04d%02d%02d000000', $s_yy, $s_mm, $s_dd);
    $where[] = "a.order_dt >= to_date('$ymdh', 'yyyymmddhh24miss')";
}
if ($e_yy != '' && $e_mm != '' && $e_dd != '') {
    $ymdh = sprintf('%04d%02d%02d235959', $e_yy, $e_mm, $e_dd);
    $where[] = "a.order_dt <= to_date('$ymdh', 'yyyymmddhh24miss')";
}
if ($kainno != '')
    $where[] = "a.kainno like ".getSqlValue('%'.$kainno.'%');

$noArray = array();
if ($kain_name != '') {
	$value = $kain_name;
	$value = preg_replace("/^'/", "'%", getSqlValue($value));
	$value = preg_replace("/'$/", "%'", $value);
	$noArray[] = "V2.KAIN_NAME LIKE " . $value;
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
		$noArray[] = "(V1.EMAIL LIKE ".$value." OR V1.M_EMAIL LIKE ".$value.")";
	}
}
		
if (count($noArray)) $where[] = 'b.KAINNO in (SELECT V1.KAINNO FROM Member1_V V1, Member2_V V2 WHERE '.implode(' AND ', $noArray).' AND V1.KAINNO = V2.KAINNO)';

if($mode == 'clear'){
	$where[] = 'order_status IN (1)';
}else{
	if (count($order_status) > 0) {
		$where[] = 'a.order_status IN ('.implode(', ', $order_status).')';
	}
}

// ▼R-#31664_【H29-00239-01】長白仙参即ログイン対応 2017/08/09 nul-inagaki
$service_arr = array();
$tmpWhere_arr = array();
if (!empty($service_kbn)) {
	if (in_array('1', $service_kbn)) {
		$service_kbn_chk = 'checked="checked"';
		// ▼R-#32054_【H29-00336-01】養生薬湯リニューアル 2017/12/21 nul fukunaga
		$tmpWhere_arr[] = "a.REGIST_USER LIKE '%domo%'";
		// ▲R-#32054_【H29-00336-01】養生薬湯リニューアル 2017/12/21 nul fukunaga
	}
	if (in_array('2', $service_kbn)) {
		$service_kbn_chk = 'checked="checked"';
		// ▼R-#32054_【H29-00336-01】養生薬湯リニューアル 2017/12/21 nul fukunaga
		$tmpWhere_arr[] = "a.REGIST_USER LIKE '%chohakusenjin%'";
		// ▲R-#32054_【H29-00336-01】養生薬湯リニューアル 2017/12/21 nul fukunaga
	}
	$where[] = "(".implode(' OR ', $tmpWhere_arr). ")";
}
// ▲R-#31664_【H29-00239-01】長白仙参即ログイン対応 2017/08/09 nul-inagaki

$where = implode(' AND ', $where);

//SQL文作成
$sql  ="SELECT * FROM (";
$sql .="SELECT ";
$sql .=" a.recv_order_id, ";
$sql .=" a.site_kbn, ";
$sql .=" a.kainno, ";
$sql .=" stfunc_ssk(a.tel_no) as tel_no, ";
$sql .=" a.netmember_id, ";
$sql .=" to_char(a.order_dt, 'YYYY/MM/DD HH24:MI:SS') as order_dt, ";
$sql .=" stfunc_ssk(b.kain_name) as kain_name, ";
$sql .=" decode(a.site_kbn, 1, stfunc_ssk(b.email), stfunc_ssk(b.m_email)) as email, ";
$sql .=" (select sum(price * amount) as sum_price from RecvProduct_Tbl r where r.recv_order_id = a.recv_order_id) as sum_price, ";

$tmpPrice_OrderId = 'a.recv_order_id';
$tmpPrice_Sql = '';
$tmpPrice_Sql .=" ( ";
$tmpPrice_Sql .=" select sum( (s.TANKA * r.amount) * (sy.TAX_RATE + 1) ) as wk_price ";
$tmpPrice_Sql .=" from RecvProduct_Tbl r ,sqlshohin_tbl s , system_tbl sy";
$tmpPrice_Sql .=" where sy.SITE_KBN='1' ";
$tmpPrice_Sql .=" and  r.SHOHIN_CD  = s.SHOHIN_CD ";
$tmpPrice_Sql .=" and ( ";
$tmpPrice_Sql .="     ( r.SHOHIN_LEVEL is null     and s.SHOHIN_LEVEL is null ) ";
$tmpPrice_Sql .="  or ( r.SHOHIN_LEVEL is not null and r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
$tmpPrice_Sql .=" ) ";
$tmpPrice_Sql .=" and r.recv_order_id = ".$tmpPrice_OrderId ;
$tmpPrice_Sql .=" ) as SUM_PRICE2, ";
$sql .= $tmpPrice_Sql;

$sql .=" a.host_flg, ";
$sql .=" a.print_flg, ";
$sql .=" a.order_status, ";
$sql .=" a.session_id ";
$sql .=",a.RESERVE_KBN";
$sql .=",(NVL(a.TOTAL_ORDER_AMOUNT, 0) + NVL(a.TOTAL_ORDER_TAXRATE, 0)) as ORDER_AMOUNT";
$sql .=",stfunc_ssk(a.cc_no) as cc_no";
$sql .=",a.cc_term";
// ▼R-#31664_【H29-00239-01】長白仙参即ログイン対応 2017/08/09 nul-inagaki
$sql .=",a.GIFT_FLG";
$sql .=",c.SHOHIN_CD";
// ▼R-#32054_【H29-00336-01】養生薬湯リニューアル 2017/12/21 nul fukunaga
$sql .=",a.REGIST_USER";
// ▲R-#32054_【H29-00336-01】養生薬湯リニューアル 2017/12/21 nul fukunaga
// ▼R-#41516_【R02-0214-001】新規キャッシュレス決済導入_WEB 2020/07/13 jast-nghiem
$sql .=        ", a.payment_type";
$sql .=        ", e.access_id as elecpay_access_id";
$sql .=        ", e.access_pass as elecpay_access_pass";
$sql .=        ", e.order_id as elecpay_order_id";
$sql .=        ", e.epayment_id as elecpay_epayment_id";
$sql .=        ", e.clr_corp_cd as elecpay_clr_corp_cd";
$sql .=        ", e.epaymenthistory_id as elecpay_epaymenthistory_id";
// ▲R-#41516_【R02-0214-001】新規キャッシュレス決済導入_WEB 2020/07/13 jast-nghiem
//▼R-#33770_【H29-00071-15】WEB管理ツール（即注文検索）にデータコピー機能実装 2018/06/16 nul-nagata
$sql .=		", a.PAYMENT_NUM";
$sql .=		", h.REGIST_HISTORY_ID";
$sql .=		", stfunc_ssk(h.KAIIN_ID) as KAIIN_ID";
$sql .=		", stfunc_ssk(h.KAIIN_PASS) as KAIIN_PASS";
$sql .=		", h.CLR_CORP_CD";
$sql .=		", h.CARD_SEQ";
//▲R-#33770_【H29-00071-15】WEB管理ツール（即注文検索）にデータコピー機能実装 2018/06/16 nul-nagata
$sql .=",row_number() over(partition by c.RECV_ORDER_ID order by c.SHOHIN_CD) row_num";
// ▼R-#41516_【R02-0214-001】新規キャッシュレス決済導入_WEB 2020/07/13 jast-nghiem
$sql .= " FROM RecvOrder_Tbl a, Member_Tbl b, RecvProduct_Tbl c, SqlShohin_Tbl d, EPAYMENTHISTORY_TBL e ";
// ▲R-#41516_【R02-0214-001】新規キャッシュレス決済導入_WEB 2020/07/13 jast-nghiem
//▼R-#33770_【H29-00071-15】WEB管理ツール（即注文検索）にデータコピー機能実装 2018/06/16 nul-nagata
$sql .=	" , CardRegistHistory_Tbl h";
//▲R-#33770_【H29-00071-15】WEB管理ツール（即注文検索）にデータコピー機能実装 2018/06/16 nul-nagata

$sql .= " WHERE a.recv_order_id = c.recv_order_id(+) AND ";
// ▼R-#41516_【R02-0214-001】新規キャッシュレス決済導入_WEB 2020/07/13 jast-nghiem
$sql .= "       a.recv_order_id = e.recv_order_id(+) AND ";
// ▲R-#41516_【R02-0214-001】新規キャッシュレス決済導入_WEB 2020/07/13 jast-nghiem
// ▼R-#43587_【R02-0028-159】不具合対応（事象解消）_Pay払い未譲渡 2021/01/04 saisys-kiyota
$sql .= "       e.ORDER_KBN(+) = 1 AND ";
// ▲R-#43587_【R02-0028-159】不具合対応（事象解消）_Pay払い未譲渡 2021/01/04 saisys-kiyota
$sql .= "       c.shohin_cd = d.shohin_cd(+) AND ";
$sql .= "       d.shohin_kbn = '1' AND ";
//▼R-#33770_【H29-00071-15】WEB管理ツール（即注文検索）にデータコピー機能実装 2018/06/16 nul-nagata
$sql .=	"       to_number(a.RECV_ORDER_ID) = h.ORDER_ID (+) AND";
//▲R-#33770_【H29-00071-15】WEB管理ツール（即注文検索）にデータコピー機能実装 2018/06/16 nul-nagata
// ▲R-#31664_【H29-00239-01】長白仙参即ログイン対応 2017/08/09 nul-inagaki
$sql .= " a.kainno = b.kainno(+) AND ";
$sql .=	" a.KAIN_KBN IN ('0','1') AND ";

$sql .= $where;
$sql .= ") ";
// ▼R-#31664_【H29-00239-01】長白仙参即ログイン対応 2017/08/09 nul-inagaki
$sql .= " WHERE row_num = 1 ";
// ▲R-#31664_【H29-00239-01】長白仙参即ログイン対応 2017/08/09 nul-inagaki
$sql .= " ORDER BY order_dt desc";

//SQLを実行する
$result = dbQuery($con_utl, $sql);

//データカウントを取得する
$rows = getNumRows($result, $arr_utl);

//データ取得
$order_data = array();

$denbun_send_list = 0;

for ($i = 0; $i < $rows; $i++) {
	$row = dbFetchRow($result, $i, $arr_utl);
	$tmp = array();

	$tmp['recv_order_id'] = $row['RECV_ORDER_ID'];
	$tmp['order_dt']      = getHtmlEscapedString($row['ORDER_DT']);
	$tmp['kainno']        = getHtmlEscapedString($row['KAINNO']);


	if (is_null($row['KAIN_NAME'])) {
		$tmp['kain_name']     = '※ネット会員情報なし';
	}else{
		$tmp['kain_name']     = getHtmlEscapedString($row['KAIN_NAME']);
	}

	$tmp['tel_no']        = getHtmlEscapedString($row['TEL_NO']);

	if (is_null($row['EMAIL'])) {
		$tmp['email']         = '※ネット会員情報なし';
	}else{
		$tmp['email']         = getHtmlEscapedString($row['EMAIL']);
	}

	if (isset($row['ORDER_AMOUNT']) == true && intval($row['ORDER_AMOUNT']) > 0) {
		$tmp['sum_price']     = getHtmlEscapedString('\\'.number_format($row['ORDER_AMOUNT']));
	} else {
		$tmp['sum_price']     = getHtmlEscapedString('\\'.number_format($row['SUM_PRICE2']));
	}

	$tmp['host_flg']      = $row['HOST_FLG'];
	$tmp['print_flg']     = $row['PRINT_FLG'];
	$tmp['order_status']  = $row['ORDER_STATUS'];
	$tmp['session_id']    = $row['SESSION_ID'];
	$tmp['site_kbn']      = $row['SITE_KBN'];
	$tmp['site_kbn_nm']   = ($tmp['site_kbn'] === '1') ? 'PC' : '携帯';

	// ▼R-#41516_【R02-0214-001】新規キャッシュレス決済導入_WEB 2020/07/13 jast-nghiem
	$tmp['payment_type']                   = $row['PAYMENT_TYPE'];
	$tmp['order_amount']                   = $row['ORDER_AMOUNT'];
	$tmp['elecpay_access_id']              = getHtmlEscapedString(ssk_decrypt($row['ELECPAY_ACCESS_ID']));
	$tmp['elecpay_access_pass']            = getHtmlEscapedString(ssk_decrypt($row['ELECPAY_ACCESS_PASS']));
	$tmp['elecpay_order_id']               = getHtmlEscapedString(ssk_decrypt($row['ELECPAY_ORDER_ID']));
	$tmp['elecpay_epayment_id']            = $row['ELECPAY_EPAYMENT_ID'];
	$tmp['elecpay_clr_corp_cd']            = $row['ELECPAY_CLR_CORP_CD'];
	$tmp['elecpay_epaymenthistory_id']     = $row['ELECPAY_EPAYMENTHISTORY_ID'];
	// ▲R-#41516_【R02-0214-001】新規キャッシュレス決済導入_WEB 2020/07/13 jast-nghiem

	//▼R-#33770_【H29-00071-15】WEB管理ツール（即注文検索）にデータコピー機能実装 2018/06/16 nul-nagata
	$tmp['payment_num']      = getHtmlEscapedString($row['PAYMENT_NUM']);
	if (!is_null($row['REGIST_HISTORY_ID'])) {
		$tmp['kaiin_id']         = getHtmlEscapedString($row['KAIIN_ID']);
		$tmp['kaiin_pass']       = getHtmlEscapedString($row['KAIIN_PASS']);
		$tmp['clr_corp_cd']      = getHtmlEscapedString($row['CLR_CORP_CD']);
		$tmp['card_seq']         = getHtmlEscapedString($row['CARD_SEQ']);
	}
	//▲R-#33770_【H29-00071-15】WEB管理ツール（即注文検索）にデータコピー機能実装 2018/06/16 nul-nagata

	$tmp['reserve_kbn']   = $row['RESERVE_KBN'];

	if( ($tmp['host_flg'] != '0' && $tmp['host_flg'] != '9') && $tmp['order_status'] == '0'){
		$tmp['denbun_send'] = '1';
	}else{
		$tmp['denbun_send'] = '0';
	}
	$denbun_send_list += $tmp['denbun_send'];

	$tmp['cc_no'] = getHtmlEscapedString($row['CC_NO']);
	$tmp['cc_term'] = $row['CC_TERM'];

	// ▼R-#31664_【H29-00239-01】長白仙参即ログイン対応 2017/08/09 nul-inagaki
	$tmp['gift_flg'] = $row['GIFT_FLG'];
	$tmp['shohin_cd'] = $row['SHOHIN_CD'];
	// ▲R-#31664_【H29-00239-01】長白仙参即ログイン対応 2017/08/09 nul-inagaki
	// ▼R-#32054_【H29-00336-01】養生薬湯リニューアル 2017/12/21 nul fukunaga
	if(strpos($row['REGIST_USER'], 'domo') !== false){
		$tmp['shohin_kbn'] = "化";
	}elseif(strpos($row['REGIST_USER'], 'chohakusenjin') !== false){
		// ▼R-#39403_【H31-0380-001】長白仙参リニューアル（WEB） 2020/01/31 sai-shiragiku
		$tmp['shohin_kbn'] = "漢";
		// ▲R-#39403_【H31-0380-001】長白仙参リニューアル（WEB） 2020/01/31 sai-shiragiku
	}else{
		$tmp['shohin_kbn'] = "";
	}
	// ▲R-#32054_【H29-00336-01】養生薬湯リニューアル 2017/12/21 nul fukunaga

	$order_data[$i]  = $tmp;

}
if ($rows === 0) $err_message = "データが存在しません";

$order_data[$rows] = $denbun_send_list;

//ステートメントの開放
dbFreeResult($result);

//DB close
dbClose($con_utl);

?>
