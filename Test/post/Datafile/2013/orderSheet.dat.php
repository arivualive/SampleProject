<?
{
//	ini_set('error_reporting',E_ALL);

	//DB接続
	$con_utl = dbConnect();
// 	// SQL文作成
// 	$froms[] = "RecvOrder_Tbl Re";
// 	$cols[] = "Re.kainno";
// 	$cols[] = "Re.tel_no";
// 	$cols[] = "Re.payment_type";
// 	$cols[] = "Re.payment_num";
// 	$cols[] = "Re.cc_no";
// 	$cols[] = "Re.cc_name";
// 	$cols[] = "Re.cc_term";
//     //2010/10/07 kdl-hatano 項目追加 ADD Start
//     $cols[] = "Re.cc_regist_kbn";       //カード登録区分
//     $cols[] = "Re.CC_NO";               //カード番号
//     //2010/10/07 kdl-hatano 項目追加 ADD End

// 	//▼2015/04/30 R-#13917_WAO側のインターネット注文受表の支払い回数欄の表示と、WEB管理ツールの支払い回数の表示に違いがある(nis higashi)
// 	$cols[] = "Re.BONUS_KBN";
// 	//▲2015/04/30 R-#13917_WAO側のインターネット注文受表の支払い回数欄の表示と、WEB管理ツールの支払い回数の表示に違いがある(nis higashi)

// 	$cols[] = "Re.delivery_time_type";
// 	$cols[] = "Re.another_addr";
// 	$cols[] = "Re.delivery_request";
// 	// ▼モバイル対応 2009/03/17 kdl.ohyanagi
// 	$cols[] = "Re.site_kbn";
// 	// ▲モバイル対応 2009/03/17 kdl.ohyanagi
	
// 	// ▼HTML化対応 2009/10/21 MugikoTsuda
// 	$cols[] = "to_char(Re.delivery_dt, 'YYYY/MM/DD') as delivery_dt";
// 	$cols[] = "Re.another_addr_type";
// 	$cols[] = "Re.another_addr_not_conv";
// 	$cols[] = "Re.another_telno";
// 	$cols[] = "Re.another_post_no";
// 	$cols[] = "Re.delivery_regist_kbn";
// 	$cols[] = "Re.econorder_id";
// 	$cols[] = "Re.enclosure_cd1";
// 	$cols[] = "to_char(Re.order_dt, 'YYYY/MM/DD HH24:MI:SS') as order_dt";
// 	// ▲HTML化対応 2009/10/21 MugikoTsuda

//     //▼2011/04/12 #1253 WAO対応(EC-One hatano) 海外発送対応
//     $cols[] = "Re.COUNTRY_CD";
//     $cols[] = "Re.POSTCD_FOREIGN";
//     $cols[] = "Re.COUNTRY_ADDRESSEE";
//     $cols[] = "Re.ADRS_FOREIGN1";
//     $cols[] = "Re.ADRS_FOREIGN2";
//     $cols[] = "Re.ADRS_FOREIGN3";
//     $cols[] = "Re.TEL_NO_FOREIGN";
//     //▲2011/04/12 #1253 WAO対応(EC-One hatano) 海外発送対応

//     //▼2012/08/24 R-#5371_注文フロー確認画面にコメント欄追加 (uls kawanishi)
//     $cols[] = "Re.IKUSEI_COMMENT";
//     //▲2012/08/24 R-#5371_注文フロー確認画面にコメント欄追加 (uls kawanishi)

//     //▼2013/02/06 【三次リリース】R-#11493_消費税増税対応（WEB対応）(ulsystems hatano)
//     $cols[] = "NVL(Re.TOTAL_ORDER_AMOUNT, 0) as ORDER_AMOUNT";
//     $cols[] = "NVL(Re.TOTAL_ORDER_TAXRATE, 0) as ORDER_TAXRATE";
//     //▲2013/02/06 【三次リリース】R-#11493_消費税増税対応（WEB対応）(ulsystems hatano)

// 	// ▼R-#37437_【H31-0174-026】注文フロー、直販に関わるFAXNET隊業務効率化 2020/09/14 cyc-hatano
// 	$cols[] = "Re.INDIVNAMESENDER_FLG";
// 	// ▲R-#37437_【H31-0174-026】注文フロー、直販に関わるFAXNET隊業務効率化 2020/09/14 cyc-hatano

// 	$where[] = "Re.recv_order_id = ".getSqlValue($recv_order_id);
	
// 	$froms[] = "Member_Tbl Me";
// 	$cols[] = "Me.email";
// 	$cols[] = "Me.m_email";
// 	$where[] = "Re.kainno = Me.kainno(+)";

// 	$froms[] = "WebProfile_Tbl We";
//     //2010/10/07 EC-One hatano 項目追加 ADD Start
//     $cols[] = "We.namekanji";       //漢字氏名
//     $cols[] = "We.NAMEOFERA";       //年号
//     $cols[] = "We.birthday";        //生年月日
//     $cols[] = "We.H_KNJ_ADDRESS";   //漢字住所
//     $cols[] = "We.H_NOT_CONV";      //非変換部
//     //2010/10/07 EC-One hatano 項目追加 ADD End
// 	$cols[] = "We.namekana";
// 	$cols[] = "We.b_post_no";
// 	$cols[] = "We.b_knj_address";
// 	$cols[] = "We.b_tel_no";
// 	$where[] = "Me.kainno = We.kainno(+)";

// 	$froms[] = "Credit_Tbl Cr";
// 	$cols[] = "Cr.companymeifull";
// 	$where[] = "Re.cc_type = Cr.company_cd(+)";

// 	$froms[] = "RecvProduct_Tbl Pr";
// 	$cols[] = "Pr.shohin_cd";
// 	$cols[] = "Pr.amount";
// 	$cols[] = "Pr.price";
// //	$cols[] = "Pr.amount * Pr.price AS sub_total";

//     //▼2011/10/24 A-03939 R-#1419 金額算出対応（ul yoshii）
//     $tmpPrice_OrderId = 'Re.recv_order_id';
//     $tmpPrice_Sql = '';
//     $tmpPrice_Sql .=        " ( ";
//     $tmpPrice_Sql .=        " select sum( (s.TANKA * r.amount) ) as wk_price ";
//     $tmpPrice_Sql .=        " from RecvProduct_Tbl r ,sqlshohin_tbl s , system_tbl sy";
//     $tmpPrice_Sql .=        " where sy.SITE_KBN='1' ";
//     $tmpPrice_Sql .=        " and  r.SHOHIN_CD  = s.SHOHIN_CD ";
//     $tmpPrice_Sql .=        " and ( ";
//     $tmpPrice_Sql .=        "     ( r.SHOHIN_LEVEL is null     and s.SHOHIN_LEVEL is null ) ";
//     $tmpPrice_Sql .=        "  or ( r.SHOHIN_LEVEL is not null and r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
//     $tmpPrice_Sql .=        " ) ";
//     $tmpPrice_Sql .=        " and r.recv_order_id = ".$tmpPrice_OrderId ;
//     $tmpPrice_Sql .=        " ) as price2, ";

//     //消費税
//     $tmpPrice_Sql .=        " ( ";
//     $tmpPrice_Sql .=        " select sum( (s.TANKA * r.amount) * (sy.TAX_RATE) ) as wk_price ";
//     $tmpPrice_Sql .=        " from RecvProduct_Tbl r ,sqlshohin_tbl s , system_tbl sy";
//     $tmpPrice_Sql .=        " where sy.SITE_KBN='1' ";
//     $tmpPrice_Sql .=        " and  r.SHOHIN_CD  = s.SHOHIN_CD ";
//     $tmpPrice_Sql .=        " and ( ";
//     $tmpPrice_Sql .=        "     ( r.SHOHIN_LEVEL is null     and s.SHOHIN_LEVEL is null ) ";
//     $tmpPrice_Sql .=        "  or ( r.SHOHIN_LEVEL is not null and r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
//     $tmpPrice_Sql .=        " ) ";
//     $tmpPrice_Sql .=        " and r.recv_order_id = ".$tmpPrice_OrderId ;
//     $tmpPrice_Sql .=        " ) as tax ";
//     $cols[] = $tmpPrice_Sql;
//     //▲2011/10/24 A-03939 R-#1419 金額算出対応（ul yoshii）

// 	$where[] = "Re.recv_order_id = Pr.recv_order_id";
	
// 	$froms[] = "SqlShohin_Tbl Sh";
// 	$cols[] = "Sh.name10";
// // 	$cols[] = "Sh.tanka";

//     //▼2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）
// 	$cols[] = "Sh.NAMEFULL";
//     $cols[] = "Sh.SHOHIN_LEVEL";
//     //▲2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）

// 	$where[] = "Pr.shohin_cd = Sh.shohin_cd(+)";

// 	//▼2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（EC-One hatano）
// 	//$where[] = "Pr.shohin_level = Sh.shohin_level";
// 	$where[] = "((Pr.shohin_level is not null and Pr.shohin_level = Sh.shohin_level) or (Pr.shohin_level is     null and  Sh.shohin_level is null)) ";
// 	//▲2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（EC-One hatano）

// 	// ▼HTML化対応 2009/10/21 MugikoTsuda
// 	$froms[] = "NET_IJ_Tbl Ij";
// 	$cols[] = "Ij.net_ij_info";
// 	$where[] = "Re.net_ij_cd = Ij.net_ij_cd(+)";
	
// 	$froms[] = "ATTENTION_TBL At";
// 	$cols[] = "At.attention as caution";
// 	$where[] = "to_number(Re.ship_caution_cd1) = to_number(At.attention_cd(+))";

// 	// ▼R-#43654 【R02-0412-001】置配サービスEAZYの導入_WEB 2021/1/18 hmc-nagatani
// 	$cols[] = "Re.SHIP_CAUTION_CD1 AS SHIP_CAUTION3_CD";
// 	// ▲R-#43654 【R02-0412-001】置配サービスEAZYの導入_WEB 2021/1/18 hmc-nagatani
	
// 	$froms[] = "ATTENTION_TBL At1";
// 	$cols[] = "At1.attention as enclosure1";
// 	$where[] = "to_number(Re.enclosure_cd1) = to_number(At1.attention_cd(+))";
	
// 	$froms[] = "ATTENTION_TBL At2";
// 	$cols[] = "At2.attention as enclosure2";
// 	$where[] = "to_number(Re.enclosure_cd2) = to_number(At2.attention_cd(+))";
	
// 	$froms[] = "ATTENTION_TBL At3";
// 	$cols[] = "At3.attention as enclosure3";
// 	$where[] = "to_number(Re.enclosure_cd3) = to_number(At3.attention_cd(+))";
	
// 	$froms[] = "ATTENTION_TBL At4";
// 	$cols[] = "At4.attention as enclosure4";
// 	$where[] = "to_number(Re.enclosure_cd4) = to_number(At4.attention_cd(+))";
	
// 	$froms[] = "ATTENTION_TBL At5";
// 	$cols[] = "At5.attention as enclosure5";
// 	$where[] = "to_number(Re.enclosure_cd5) = to_number(At5.attention_cd(+))";
	
// 	$froms[] = "ATTENTION_TBL At6";
// 	$cols[] = "At6.attention as enclosure6";
// 	$where[] = "to_number(Re.enclosure_cd6) = to_number(At6.attention_cd(+))";
	
// 	$froms[] = "ATTENTION_TBL At7";
// 	$cols[] = "At7.attention as enclosure7";
// 	$where[] = "to_number(Re.enclosure_cd7) = to_number(At7.attention_cd(+))";
	
// 	$froms[] = "ATTENTION_TBL At8";
// 	$cols[] = "At8.attention as enclosure8";
// 	$where[] = "to_number(Re.enclosure_cd8) = to_number(At8.attention_cd(+))";
	
// 	$froms[] = "ATTENTION_TBL At9";
// 	$cols[] = "At9.attention as enclosure9";
// 	$where[] = "to_number(Re.enclosure_cd9) = to_number(At9.attention_cd(+))";
	
// 	$froms[] = "ATTENTION_TBL At10";
// 	$cols[] = "At10.attention as enclosure10";
// 	$where[] = "to_number(Re.enclosure_cd10) = to_number(At10.attention_cd(+))";
	
// 	// ▲HTML化対応 2009/10/21 MugikoTsuda

// 	//▼2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
// 	$cols[] = "Spc.SHOHIN_KIND";
// 	$froms[] = "SHOHINPC_TBL Spc";
// 	$where[] = "Sh.SHOHIN_CD = Spc.SHOHIN_CD(+)";
// 	$where[] = "Sh.SHOHIN_LEVEL = Spc.SHOHIN_LEVEL(+)";
// 	//▲2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)

// 	//▼2011/08/23 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）
// 	//$sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)." ORDER BY Sh.shohin_idx";
// 	$sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)." ORDER BY Sh.shohin_cd";
	//▲2011/08/23 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）

	$sql  = "SELECT  ";
	$sql  = "Re.cust_no AS KAINNO, ";
	$sql  = "Re.tel_no AS TEL_NO, ";
	$sql  = "Re.pay_way_kbn AS PAYMENT_TYPE, ";
	$sql  = "Re.pay_cnt AS PAYMENT_NUM, ";
	$sql  = "Re.credit_card_no AS CC_NO, ";
	$sql  = "Re.credit_card_no AS CC_NO, ";
	$sql  = "Re.avail_term AS CC_TERM, ";
	$sql  = "Re.card_input_kbn AS CC_REGIST_KBN, ";
	$sql  = "Re.dlv_tm_kbn AS DELIVERY_TIME_TYPE, ";
	$sql  = "We.another_adr AS B_KNJ_ADDRESS, ";
	$sql  = "Re.dlv_req_memo AS DELIVERY_REQUEST, ";
	$sql  = "Re.site_kbn AS SITE_KBN, ";
	$sql  = "to_char(Re.dlv_req_dt, 'YYYY/MM/DD') AS DELIVERY_DT, ";
	$sql  = "Re.dlv_to_kbn AS ANOTHER_ADDR_TYPE, ";
	$sql  = "Re.other_non_chg_part AS ANOTHER_ADDR_NOT_CONV, ";
	$sql  = "Re.other_adr_tel_no AS ANOTHER_TELNO, ";
	$sql  = "Re.other_adr_post_no AS ANOTHER_POST_NO, ";
	$sql  = "Re.dlv_to_input_kbn AS DELIVERY_REGIST_KBN, ";
	$sql  = "Re.cvs_rcv_site_odr_no AS ECONORDER_ID, ";
	$sql  = "Re.enclos_cd1 AS ENCLOSURE_CD1, ";
	$sql  = "to_char(Re.acpt_dt_tm, 'YYYY/MM/DD HH24:MI:SS')  AS ORDER_DT, ";
	$sql  = "Re.country_cd AS COUNTRY_CD, ";
	$sql  = "Re.overseas_post_no AS POSTCD_FOREIGN, ";
	$sql  = "Re.overseas_to_name AS COUNTRY_ADDRESSEE, ";
	$sql  = "Re.overseas_adr_1 AS ADRS_FOREIGN1, ";
	$sql  = "Re.overseas_adr_2 AS ADRS_FOREIGN2, ";
	$sql  = "Re.overseas_adr_3 AS ADRS_FOREIGN3, ";
	$sql  = "Re.overseas_tel_no AS TEL_NO_FOREIGN, ";
	$sql  = "Re.ikusei_comment AS IKUSEI_COMMENT, ";
	$sql  = "COALESCE(Re.tot_odr_amnt, 0) as ORDER_AMOUNT, ";
	$sql  = "COALESCE(Re.tot_odr_tax, 0) as ORDER_TAXRATE, ";
	$sql  = "Re.ship_att_cd_1 AS SHIP_CAUTION3_CD, ";
	$sql  = "Me.mail_adr AS EMAIL, ";
	$sql  = "Me.mob_mail_adr AS M_EMAIL, ";
	$sql  = "We.cust_name AS NAMEKANJI, ";
	$sql  = "We.cust_name_kana AS NAMEKANA, ";
	$sql  = "We.era_kbn AS NAMEOFERA, ";
	$sql  = "We.birthday AS BIRTHDAY, ";
	$sql  = "We.adr AS H_KNJ_ADDRESS, ";
	$sql  = "We.adr_non_chg_part AS H_NOT_CONV, ";
	$sql  = "We.another_adr_post_no AS B_POST_NO, ";
	$sql  = "We.another_adr AS B_KNJ_ADDRESS, ";
	$sql  = "We.another_adr_tel_no AS B_TEL_NO, ";
	$sql  = "Cr.credit_card_corp_name AS COMPANYMEIFULL, ";
	$sql  = "Sh.item_name_10 AS NAME10, ";
	$sql  = "Sh.price AS TANKA, ";
	$sql  = "Sh.item_name AS NAMEFULL, ";
	$sql  = "Sh.item_lvl AS SHOHIN_LEVEL, ";
	$sql  = "Ij.net_ij_rsn AS NET_IJ_INFO, ";
	$sql  = "At.att_cont as CAUTION, ";
	$sql  = "At1.att_cont as ENCLOSURE1, ";
	$sql  = "At2.att_cont as ENCLOSURE2, ";
	$sql  = "At3.att_cont as ENCLOSURE3, ";
	$sql  = "At4.att_cont as ENCLOSURE4, ";
	$sql  = "At5.att_cont as ENCLOSURE5, ";
	$sql  = "At6.att_cont as ENCLOSURE6, ";
	$sql  = "At7.att_cont as ENCLOSURE7, ";
	$sql  = "At8.att_cont as ENCLOSURE8, ";
	$sql  = "At9.att_cont as ENCLOSURE9, ";
	$sql  = "At10.att_cont as ENCLOSURE10, ";
	$sql  = "Spc.item_dtl_kbn AS SHOHIN_KIND, ";
	$sql  = "Pr.item_cd AS SHOHIN_CD, ";
	$sql  = "Pr.num AS AMOUNT, ";
	$sql  = "Pr.amnt AS PRICE, ";
	$sql  = "( ";
	$sql  = "select  ";
	$sql  = "sum(CAST (s.price AS INTEGER) * r.amnt)  as wk_price  ";
	$sql  = "from odr_d r ,m_item s , m_sys_set sy ";
	$sql  = "where sy.site_kbn='1'  ";
	$sql  = "and  r.item_cd  = s.item_cd  ";
	$sql  = "and (  ";
	$sql  = "( r.item_lvl is null and s.item_lvl is null )  ";
	$sql  = "or ( r.item_lvl is not null and r.item_lvl = s.item_lvl )  ";
	$sql  = ")  ";
	$sql  = "and r.odr_seq = Re.odr_seq ";
	$sql  = ") as PRICE2,  ";
	$sql  = "(  ";
	$sql  = "select sum( (CAST (s.price AS INTEGER) * r.amnt) * (sy.TAX_RATE) ) as wk_price  ";
	$sql  = "from odr_d r ,m_item s , m_sys_set sy ";
	$sql  = "where sy.site_kbn='1'  ";
	$sql  = "and  r.item_cd  = s.item_cd  ";
	$sql  = "and (  ";
	$sql  = "( r.item_lvl is null and s.item_lvl is null )  ";
	$sql  = "or ( r.item_lvl is not null and r.item_lvl = s.item_lvl )  ";
	$sql  = ") ";
	$sql  = "and r.odr_seq = Re.odr_seq ";
	$sql  = ") as TAX ";
	$sql  = "from f_odr Re ";
	$sql  = "LEFT JOIN m_net_mbr Me ";
	$sql  = "ON Re.cust_no = Me.cust_no ";
	$sql  = "LEFT JOIN m_offline_data We ";
	$sql  = "ON Me.cust_no = We.cust_no ";
	$sql  = "LEFT JOIN m_credit_corp Cr ";
	$sql  = "ON Re.credit_card_corp = Cr.credit_card_corp_cd ";
	$sql  = "LEFT JOIN odr_d Pr ";
	$sql  = "ON Re.odr_seq = Pr.odr_seq ";
	$sql  = "LEFT JOIN m_item Sh  ";
	$sql  = "ON Pr.item_cd = Sh.item_cd AND Pr.item_lvl = Sh.item_lvl AND "; 
	$sql  = "((Pr.item_lvl is not null and Pr.item_lvl = Sh.item_lvl) or ";
	$sql  = "(Pr.item_lvl is null and  Sh.item_lvl is null)) ";
	$sql  = "LEFT JOIN m_net_ij_rsn Ij ";
	$sql  = "ON Re.pend_cd = Ij.net_ij_cd ";
	$sql  = "LEFT JOIN m_att At ";
	$sql  = "ON Re.ship_att_cd_1 = At.att_cd ";
	$sql  = "LEFT JOIN m_att At1 ";
	$sql  = "ON Re.enclos_cd1 = At1.att_cd ";
	$sql  = "LEFT JOIN m_att At2 ";
	$sql  = "ON Re.enclos_cd2 = At2.att_cd ";
	$sql  = "LEFT JOIN m_att At3 ";
	$sql  = "ON Re.enclos_cd3 = At3.att_cd ";
	$sql  = "LEFT JOIN m_att At4 ";
	$sql  = "ON Re.enclos_cd4 = At4.att_cd ";
	$sql  = "LEFT JOIN m_att At5 ";
	$sql  = "ON Re.enclos_cd5 = At5.att_cd ";
	$sql  = "LEFT JOIN m_att At6 ";
	$sql  = "ON Re.enclos_cd6 = At6.att_cd ";
	$sql  = "LEFT JOIN m_att At7 ";
	$sql  = "ON Re.enclos_cd7 = At7.att_cd ";
	$sql  = "LEFT JOIN m_att At8 ";
	$sql  = "ON Re.enclos_cd8 = At8.att_cd ";
	$sql  = "LEFT JOIN m_att At9 ";
	$sql  = "ON Re.enclos_cd9 = At9.att_cd ";
	$sql  = "LEFT JOIN m_att At10 ";
	$sql  = "ON Re.enclos_cd10 = At10.att_cd ";
	$sql  = "LEFT JOIN m_item_dtl Spc ";
	$sql  = "ON Sh.item_cd = Spc.item_cd AND Sh.item_lvl = Spc.item_lvl ";
	
    //SQLを実行する
    $result = dbQuery($con_utl, $sql);

    //データカウントを取得する
    $rows = getNumRows($result, $arr_utl);

	$counter_p = 0;
	$counter_d = 0;
	$counter_s = 0;
	$sum_tax = 0;
	$sum_amount = 0;
	$prd = array_fill(0, 10, '');
	$prdct = array_fill(0, 10, '');
	$prs = array_fill(0, 10, '');
	$prsct = array_fill(0, 10, '');

	for ($i = 0; $i < $rows; $i++) {
		$row = dbFetchRow($result, $i, $arr_utl);
		$tmp = array();

		$tmp['kainno']   = getHtmlEscapedString($row['KAINNO']);					//会員ｺｰﾄﾞ
		$tmp['order_dt'] = getHtmlEscapedString($row['ORDER_DT']);					//注文受付日時
        ////2010/10/07 EC-One hatano 項目追加 ADD Start
        //会員名(漢字)
        //$tmp['namekanji']= getHtmlEscapedString(ssk_decrypt($row['NAMEKANJI']));
		$tmp['namekanji']= getHtmlEscapedString($row['NAMEKANJI']);
        //年号
        $tmp['nameofera'] = "";
        switch (intval($row['NAMEOFERA'])) {
            case 1:   $nameofera = "M"; break;
			case 2:   $nameofera = "T"; break;
			case 3:   $nameofera = "S"; break;
            case 4:   $nameofera = "H"; break;
			default : $nameofera = ""; break;
        }
        $tmp['nameofera'] = $nameofera;
        //生年月日
        $birthday = getHtmlEscapedString(ssk_decrypt($row['BIRTHDAY']));
        $tmp['birthday']     = substr($birthday,0,2).'.'.substr($birthday,2,2).'.'.substr($birthday,4,2);
        //住所
        $tmp['address']     = getHtmlEscapedString(ssk_decrypt($row['H_KNJ_ADDRESS'])); //住所
        //$tmp['address_not']     = getHtmlEscapedString(ssk_decrypt($row['H_NOT_CONV'])); //非変換部住所
		$tmp['address_not']     = getHtmlEscapedString($row['H_NOT_CONV']);
        ////2010/10/07 EC-One hatano 項目追加 ADD End
		//$tmp['name']     = getHtmlEscapedString(ssk_decrypt($row['NAMEKANA']));		//会員名
		//$tmp['tel']      = getHtmlEscapedString(ssk_decrypt($row['TEL_NO']));		//電話番号
		$tmp['name']     = getHtmlEscapedString($row['NAMEKANA']);		//会員名
		$tmp['tel']      = getHtmlEscapedString($row['TEL_NO']);
		//$tmp['address']      = getHtmlEscapedString(ssk_decrypt($row['TEL_NO']));		//電話番号
		
		//受区
		$tmp['ukeku']   = (intval($row['SITE_KBN']) === 1) ? 'インターネット' : 'モバイル';
		
		//支払い方法

		$shiharai = "";
		switch (intval($row['PAYMENT_TYPE'])) {
			case 1:   $shiharai = "振込み"; break;
			case 3:   $shiharai = "代引き"; break;
			case 4:   $shiharai = "郵便引落し"; break;
			case 5:   $shiharai = "銀行引落し"; break;
			case 6:   $shiharai = "カード"; break;
			case 7:   $shiharai = "ｅ－コレクト"; break;
			//▼R-#41516_【R02-0214-001】新規キャッシュレス決済導入_WEB 2020/07/21 jast-fujiyoshi
			case 21:  $shiharai = "AmazonPay"; break;
			case 22:  $shiharai = "LINE Pay"; break;
			case 23:  $shiharai = "PayPay"; break;
			//▲R-#41516_【R02-0214-001】新規キャッシュレス決済導入_WEB 2020/07/21 jast-fujiyoshi
			// ▼R-#42576_【R02-0315-001】キャッシュレス決済Pay払い導入 楽天Pay追加_Web　TienPV
			case 24:  $shiharai = "楽天ペイ"; break;
			// ▲R-#42576_【R02-0315-001】キャッシュレス決済Pay払い導入 楽天Pay追加_Web　TienPV
			default : $shiharai = ""; break;
		}
		$tmp['pay'] = $shiharai;
		
		$tmp['paynum'] =$row['PAYMENT_NUM'];	//支払回数
		
		//▼2015/04/30 R-#13917_WAO側のインターネット注文受表の支払い回数欄の表示と、WEB管理ツールの支払い回数の表示に違いがある(nis higashi)
		// if (intval($row['BONUS_KBN']) === 1) {
		// 	$tmp['paynum'] = "ボーナス一括";
		// } else if (intval($row['BONUS_KBN']) === 9) {
		// 	$tmp['paynum'] = "リボ払い";
		// }
		//▲2015/04/30 R-#13917_WAO側のインターネット注文受表の支払い回数欄の表示と、WEB管理ツールの支払い回数の表示に違いがある(nis higashi)

		
        ////2010/10/07 kdl-hatano 項目追加 ADD Start
        //カード登録区分
        $cc_regist_kbn = "";
        switch (intval($row['CC_REGIST_KBN'])) {
            case 1:   $cc_regist_kbn = "今回登録する"; break;
			default : $cc_regist_kbn = ""; break;
		}
        $tmp['cc_regist_kbn'] = $cc_regist_kbn;
        //カード会社
        $tmp['companymeifull'] = $row['COMPANYMEIFULL'];
        //カードNo.
        $conv_cc_no = "";
        //$cc_no = strlen(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])));
		$cc_no = strlen(getHtmlEscapedString($row['CC_NO']));
        if ($cc_no != 0){
            //$conv_cc_no = str_repeat("*",$cc_no - 4).$conv_cc_no.substr(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])), -4);
			$conv_cc_no = str_repeat("*",$cc_no - 4).$conv_cc_no.substr(getHtmlEscapedString($row['CC_NO']), -4);
        }
        $tmp['cc_no'] = $conv_cc_no;
        //有効期限
        $tmp['cc_term'] = $row['CC_TERM'];
        ////2010/10/07 kdl-hatano 項目追加 ADD End

		//配達方法
		$econid = $row['ECONORDER_ID'];
		if ($econid != null){
			$conveni = "コンビニ";
		} else {
			$conveni = "";
		}
		$tmp['conveni'] = $conveni;
		
		//時間指定
		$jikanshitei = "";
		switch (intval($row['DELIVERY_TIME_TYPE'])) {
			case 0:  $jikanshitei = ""; break;
			case 1:  $jikanshitei = "午前(8-12)"; break;
			case 2:  $jikanshitei = "午後(12-14)"; break;
			case 3:  $jikanshitei = "午後(14-16)"; break;
			case 4:  $jikanshitei = "午後(16-18)"; break;
			case 5:  $jikanshitei = "午後(18-20)"; break;
			case 6:  $jikanshitei = "夜間(20-21)"; break;
			// ▼R-#31253_【H29-00099-01】6月1日開始 会員4点施策 珠の肌ポイントダウン リニューアル 2017/05/09 axl-higashi
			case 8:  $jikanshitei = "夜間(19-21)"; break;
			// ▲R-#31253_【H29-00099-01】6月1日開始 会員4点施策 珠の肌ポイントダウン リニューアル 2017/05/09 axl-higashi
			default: $jikanshitei = ""; break;
			}
		$tmp['stime'] = $jikanshitei;
		
		$tmp['sday'] =$row['DELIVERY_DT'];	//期日指定
		
		//お届け先情報
		$betsujyuno   = "";
		$betsujyu     = "";
		$betsutel     = "";
		$otodokejyuno = "";
		$otodokejyu   = "";
		$otodokejyu2  = "";
		$otodoketel   = "";
        //▼2011/04/12 #1253 WAO対応(EC-One hatano) 海外発送対応
        $countryname  ="";
        $kaigaijyuno  ="";
        $kaigaijyu1   ="";
        $kaigaijyu2   ="";
        $kaigaijyu3   ="";
        $kaigaiatena  ="";
        $kaigaitel    ="";
        //▲2011/04/12 #1253 WAO対応(EC-One hatano) 海外発送対応
		if (intval($row['ANOTHER_ADDR_TYPE']) === 1) {
			$betsujyuno = substr(getHtmlEscapedString($row['B_POST_NO']),0,4)."****";				//別住の郵便番号
			$betsujyu = getHtmlEscapedString(ssk_decrypt($row['B_KNJ_ADDRESS']));					//別住所
			$betsutel = substr(getHtmlEscapedString(ssk_decrypt($row['B_TEL_NO'])),0,4)."********";	//別住所のTEL
		} else if (intval($row['ANOTHER_ADDR_TYPE']) === 2) {
			$otodokejyuno = getHtmlEscapedString($row['ANOTHER_POST_NO']);					//その他お届け先の郵便番号
			$otodokejyu   = getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR']));			//その他お届け先の住所
			$otodokejyu2  = getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR_NOT_CONV']));	//その他お届け先の住所(非変換部)
			$otodoketel   = getHtmlEscapedString(ssk_decrypt($row['ANOTHER_TELNO']));			//その他お届け先のTEL
        //▼2011/04/12 #1253 WAO対応(EC-One hatano) 海外発送対応
		//}
        } else if (intval($row['ANOTHER_ADDR_TYPE']) === 4) {
            //国名を取得
            $sql2 = "";
            // $sql2 = "SELECT COUNTRY_NAME FROM COUNTRYCD_TBL WHERE COUNTRY_CD = '".$row['COUNTRY_CD']."'";
            // //SQLを実行する
            // $result2 = dbQuery($con_utl, $sql2);
            // //データカウントを取得する
            // $rows2 = getNumRows($result2, $arr_utl2);
            // //データを取得する
            // $row2 = dbFetchRow($result2, 0, $arr_utl2);

			//$sql2 = "SELECT country_name AS COUNTRY_NAME FROM m_country WHERE country_cd = '".$row['COUNTRY_CD']."'";
			$sql2 = "SELECT country_name AS COUNTRY_NAME FROM m_country WHERE country_cd = '".$row['COUNTRY_CD']."'";
            //SQLを実行する
            $result2 = dbQuery($con_utl, $sql2);
            //データカウントを取得する
            $rows2 = getNumRows($result2, $arr_utl2);
            //データを取得する
            $row2 = dbFetchRow($result2, 0, $arr_utl2);

            $countryname = "国:".getHtmlEscapedString($row2['COUNTRY_NAME']);                 //国名
			$kaigaijyuno = "〒 ".getHtmlEscapedString($row['POSTCD_FOREIGN']);					//海外の郵便番号
			$kaigaijyu1  = getHtmlEscapedString(ssk_decrypt($row['ADRS_FOREIGN1']));			//海外住所1
            $kaigaijyu2  = getHtmlEscapedString(ssk_decrypt($row['ADRS_FOREIGN2']));			//海外住所2
            $kaigaijyu3  = getHtmlEscapedString(ssk_decrypt($row['ADRS_FOREIGN3']));			//海外住所3
            $kaigaiatena = "宛名:".getHtmlEscapedString(ssk_decrypt($row['COUNTRY_ADDRESSEE']));        //海外宛名
			$kaigaitel   = "TEL:".getHtmlEscapedString(ssk_decrypt($row['TEL_NO_FOREIGN']));			//海外のTEL
        }
        //▲2011/04/12 #1253 WAO対応(EC-One hatano) 海外発送対応
		$tmp['betsujyuno'] = $betsujyuno;
		$tmp['betsujyu']   = $betsujyu;
		$tmp['betsutel']   = $betsutel;
		$tmp['otodokejyuno'] = $otodokejyuno;
		$tmp['otodokejyu']   = $otodokejyu .$otodokejyu2;
		$tmp['otodoketel']   = $otodoketel;
        //▼2011/04/12 #1253 WAO対応(EC-One hatano) 海外発送対応
        //$tmp['countryname'] = $countryname;
        $tmp['kaigaijyuno'] = $kaigaijyuno;
		$tmp['kaigaijyu1']   = $kaigaijyu1;
		$tmp['kaigaijyu2']   = $kaigaijyu2;
		$tmp['kaigaijyu3']   = $kaigaijyu3;
        $tmp['kaigaiatena'] = $kaigaiatena;
		$tmp['kaigaitel']   = $kaigaitel;
        $tmp['addr_type']   = intval($row['ANOTHER_ADDR_TYPE']);
        //▲2011/04/12 #1253 WAO対応(EC-One hatano) 海外発送対応
		
		//その他お届け先区分
		$otodokeinfo = "";
		switch (intval($row['DELIVERY_REGIST_KBN'])) {
			case 0:  $otodokeinfo = ""; break;
			case 1:  $otodokeinfo = "今回のみ利用"; break;
			case 2:  $otodokeinfo = "本住所登録"; break;
			case 3:  $otodokeinfo = "別住所登録"; break;
			default: $otodokeinfo = ""; break;
		}
		$tmp['otodokeinfo'] = $otodokeinfo;
		
		if ($otodokeinfo === ''){
			$tmp['otodokeinfo_color']="#ffffff";
		} else {
			$tmp['otodokeinfo_color']="#000000";
		}
		
        //▼2011/04/12 #1253 WAO対応(EC-One hatano) 海外発送対応
        if (intval($row['ANOTHER_ADDR_TYPE']) === 4) {
            $tmp['kaigaiinfo'] = "海外住所";
            $tmp['kaigaiinfo_color']="#000000";
        }else{
            $tmp['kaigaiinfo_color']="#ffffff";
        }
        //▲2011/04/12 #1253 WAO対応(EC-One hatano) 海外発送対応

		
		//ﾒｰﾙｱﾄﾞﾚｽ
		//if (ssk_decrypt($row['EMAIL']) != ''){
		if (($row['EMAIL']) != ''){
			$tmp['mail'] = "登録あり";
		//} else if (ssk_decrypt($row['M_EMAIL']) != ''){
		} else if (($row['M_EMAIL']) != ''){
			$tmp['mail'] = "登録あり";
		} else {
			$tmp['mail'] = "登録なし";
		}

		//ﾌﾘｰｺﾒﾝﾄ欄
		$tmp['coment'] = $row['DELIVERY_REQUEST'];
		
		//保留区分
		$tmp['ijriyu']=$row['NET_IJ_INFO'];
		
		//発送注意
		// ▼R-#43654 【R02-0412-001】置配サービスEAZYの導入_WEB 2021/1/18 hmc-nagatani
		//if($row['SHIP_CAUTION3_CD']==='070000'){
		if($row['SHIP_CAUTION_CD1']==='070000'){
			$tmp['hassochui']="";
		}else{
			//$tmp['hassochui']=$row['CAUTION'];
			$tmp['hassochui']=$row['ATTENTION'];
		}
		// ▲R-#43654 【R02-0412-001】置配サービスEAZYの導入_WEB 2021/1/18 hmc-nagatani

        //▼2012/08/24 R-#5371_注文フロー確認画面にコメント欄追加 (uls kawanishi)
		//育成コメント
		$tmp['ikusei_comment']=$row['IKUSEI_COMMENT'];
        //▲2012/08/24 R-#5371_注文フロー確認画面にコメント欄追加 (uls kawanishi)

		//同封物
		$enclosure="";
		if ($row['ENCLOSURE1']!=''){
			$enclosure = $enclosure.$row['ENCLOSURE1'] ."*1 ";
		}
		if ($row['ENCLOSURE2']!=''){
			$enclosure = $enclosure.$row['ENCLOSURE2'] ."*1 ";
		}
		if ($row['ENCLOSURE3']!=''){
			$enclosure = $enclosure.$row['ENCLOSURE3'] ."*1 ";
		}
		if ($row['ENCLOSURE4']!=''){
			$enclosure = $enclosure.$row['ENCLOSURE4'] ."*1 ";
		}
		if ($row['ENCLOSURE5']!=''){
			$enclosure = $enclosure.$row['ENCLOSURE5'] ."*1 ";
		}
		if ($row['ENCLOSURE6']!=''){
			$enclosure = $enclosure.$row['ENCLOSURE6'] ."*1 ";
		}
		if ($row['ENCLOSURE7']!=''){
			$enclosure = $enclosure.$row['ENCLOSURE7'] ."*1 ";
		}
		if ($row['ENCLOSURE8']!=''){
			$enclosure = $enclosure.$row['ENCLOSURE8'] ."*1 ";
		}
		if ($row['ENCLOSURE9']!=''){
			$enclosure = $enclosure.$row['ENCLOSURE9'] ."*1 ";
		}
		if ($row['ENCLOSURE10']!=''){
			$enclosure = $enclosure.$row['ENCLOSURE10'] ."*1 ";
		}
		$tmp['doufu']=$enclosure;
		
		
		//商品購入情報
		$shohin_cd = round($row['SHOHIN_CD']);
		$amount = $row['AMOUNT'];
		//▼2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
		$shohin_kind = $row['SHOHIN_KIND'];
		//▲2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)

        //▼2013/02/06 【三次リリース】R-#11493_消費税増税対応（WEB対応）(ulsystems hatano)
        //税抜金額
        if (isset($row['ORDER_AMOUNT']) == true && intval($row['ORDER_AMOUNT']) > 0) {
            $sum_amount = $row['ORDER_AMOUNT'];
        } else {
            $sum_amount = $row['PRICE2'];
        }
        //消費税
        if (isset($row['ORDER_TAXRATE']) == true && intval($row['ORDER_TAXRATE']) > 0) {
            $sum_tax = $row['ORDER_TAXRATE'];
        } else {
            $sum_tax = $row['TAX'];
        }
        //▲2013/02/06 【三次リリース】R-#11493_消費税増税対応（WEB対応）(ulsystems hatano)

		if ($shohin_cd == '0710') {	//消費税の計算
            //▼2011/10/24 A-03939 R-#1419 金額算出対応（ul kawanishi）
            //消費税は$row['TAX']に格納しているので、消費税の商品CDからは取得しない
			//$sum_tax += round($price);
            //▲2011/10/24 A-03939 R-#1419 金額算出対応（ul kawanishi）
		} else if ($shohin_cd != '0000') {
			//▼2017/11/10 R-#32296_【H29-00376-01】養生薬湯ログイン注文(nul-oomori)
			//▼2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
			if ($shohin_kind == '1') {
			//▲2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
				//商品・ﾄﾗﾍﾞﾙｾｯﾄの場合
                //▼2011/10/24 A-03939 R-#1419 金額算出対応（ul kawanishi）
                //金額は$row['PRICE2']に合算値が格納されています。なので、下記コードをコメントします。
				//$sum_amount += round($price * $amount);
                //▲2011/10/24 A-03939 R-#1419 金額算出対応（ul kawanishi）

                //▼2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）
                if($row['SHOHIN_LEVEL']){
                    $prd[$counter_d] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10']."(".$row['SHOHIN_LEVEL'].")";
                }else{
                    $prd[$counter_d] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10'];
                }
                //▲2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）

				$prdct[$counter_d] = round($amount);
				$counter_p += $amount;
				$counter_d++;
			//▼2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
			} else {
			//▲2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
				//ﾌﾟﾚｾﾞﾝﾄ品の場合
				if ($shohin_cd != '0710' && $shohin_cd != '0701') {

                    //▼2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）
                    if($row['SHOHIN_LEVEL']){
                        $prs[$counter_s] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10']."(".$row['SHOHIN_LEVEL'].")";
                    }else{
                        $prs[$counter_s] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10'];
                    }
                    //▲2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）


					$prsct[$counter_s] = round($amount);
					$counter_s++;
				}
			}
			//▲2017/11/10 R-#32296_【H29-00376-01】養生薬湯ログイン注文(nul-oomori)
		}

    	// ▼R-#37437_【H31-0174-026】注文フロー、直販に関わるFAXNET隊業務効率化 2020/08/21 cyc-hatano
		// お荷物の差出人指定
		// if (intval($row['INDIVNAMESENDER_FLG']) == '1') {
		// 	$tmp['indivnamesender'] = '差出人指定';
		// }
    	// ▲R-#37437_【H31-0174-026】注文フロー、直販に関わるFAXNET隊業務効率化 2020/08/21 cyc-hatano
	}

    // ▼2012/03/19 R-#3125 贈り物Web対応 uls-motoi
    // 商品の個数が、表示できる商品数を超えている場合は最後の列に表示できていない旨を表示
    if($counter_d > $PRODUCT_DISP_NUM){
        $prd[$PRODUCT_DISP_NUM - 1] = $PRODUCT_DISP_NUM .'点オーバーです！';
        $prdct[$PRODUCT_DISP_NUM - 1] = '';
    }
    if($counter_s > $PRESENT_DISP_NUM){
        $prs[$PRESENT_DISP_NUM - 1] = $PRESENT_DISP_NUM .'点オーバーです！';
        $prsct[$PRESENT_DISP_NUM - 1] = '';
    }
    // ▲2012/03/19 R-#3125 贈り物Web対応 uls-motoi

	$tmp['num']     = $counter_p;				//購入点数
	$tmp['kingaku'] = $sum_amount;				//金額
	$tmp['tax']     = $sum_tax;					//消費税
	$tmp['goukei']  = $sum_amount + $sum_tax;	//合計
	$tmp['doufu']=$enclosure;

	//ステートメントの開放
	dbFreeResult($result);

	//DB close
	dbClose($con_utl);
	
	//配列へ格納
	$order_data = array();
	$order_data = $tmp;
	
}
?>
