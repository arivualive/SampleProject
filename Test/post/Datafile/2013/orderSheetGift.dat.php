<?
{
    //DB接続
    $con_utl = dbConnect();

    //---------------------------------------------------------------------
    // SQL文作成(基本情報作成)
    //---------------------------------------------------------------------
    // 取得テーブル
    // $froms[] = "RecvOrder_Tbl Re";
    // $froms[] = "WebProfile_Tbl We";
    // $froms[] = "Credit_Tbl Cr";
    // $froms[] = "Net_Ij_Tbl Ij";
    // $froms[] = "GiftOrder_Tbl Gi";
    // $froms[] = "Attention_Tbl At";
    // $froms[] = "Attention_Tbl At2";
    // //▼2012/07/17 R-#4650 贈り物メッセージカードと不在時の選択追加(ulsystems hatano)
    // $froms[] = "Attention_Tbl At3";
    // //▲2012/07/17 R-#4650 贈り物メッセージカードと不在時の選択追加(ulsystems hatano)

    // // 取得カラム
    // // RecvOrder_Tbl
    // $cols[] = "Re.KAINNO";
    // $cols[] = "Re.TEL_NO";
    // $cols[] = "Re.PAYMENT_TYPE";
    // $cols[] = "Re.PAYMENT_NUM";
	// //▼2015/04/30 R-#13917_WAO側のインターネット注文受表の支払い回数欄の表示と、WEB管理ツールの支払い回数の表示に違いがある(nis higashi)
	// $cols[] = "Re.BONUS_KBN";
	// //▲2015/04/30 R-#13917_WAO側のインターネット注文受表の支払い回数欄の表示と、WEB管理ツールの支払い回数の表示に違いがある(nis higashi)
    // $cols[] = "Re.CC_NO";
    // $cols[] = "Re.CC_NAME";
    // $cols[] = "Re.CC_TERM";
    // $cols[] = "Re.CC_REGIST_KBN";   //カード登録区分
    // $cols[] = "Re.CC_NO";           //カード番号
    // $cols[] = "Re.SITE_KBN";
    // $cols[] = "Re.DELIVERY_REQUEST";
    // $cols[] = "TO_CHAR(Re.ORDER_DT, 'YYYY/MM/DD HH24:MI:SS') as ORDER_DT";
    // //▼2013/02/06 【三次リリース】R-#11493_消費税増税対応（WEB対応）(ulsystems hatano)
    // $cols[] = "NVL(Re.TOTAL_ORDER_AMOUNT, 0) as ORDER_AMOUNT";
    // $cols[] = "NVL(Re.TOTAL_ORDER_TAXRATE, 0) as ORDER_TAXRATE";
    // //▲2013/02/06 【三次リリース】R-#11493_消費税増税対応（WEB対応）(ulsystems hatano)
    // $where[] = "Re.RECV_ORDER_ID = ".getSqlValue($recv_order_id);

    // //▼2012/07/17 R-#4650 贈り物メッセージカードと不在時の選択追加(ulsystems hatano)
    // // 発送注意(リボン)
    // $cols[] = "At3.ATTENTION AS SHIP_CAUTION3";
    // $where[] = "TO_NUMBER(Re.SHIP_CAUTION_CD1) = TO_NUMBER(At3.ATTENTION_CD(+))";
    // //▲2012/07/17 R-#4650 贈り物メッセージカードと不在時の選択追加(ulsystems hatano)
    // // ▼R-#43654 【R02-0412-001】置配サービスEAZYの導入_WEB 2021/1/18 hmc-nagatani
    // $cols[] = "Re.SHIP_CAUTION_CD1 AS SHIP_CAUTION3_CD";
    // // ▲R-#43654 【R02-0412-001】置配サービスEAZYの導入_WEB 2021/1/18 hmc-nagatani

    // // Credit_Tbl
    // $cols[] = "Cr.COMPANYMEIFULL";
    // $where[] = "Re.CC_TYPE = Cr.COMPANY_CD(+)";
    // // WebProfile_Tbl
    // $cols[] = "We.NAMEKANJI";       //漢字氏名
    // $cols[] = "We.NAMEKANA";        //かな氏名
    // $cols[] = "We.NAMEOFERA";       //年号
    // $cols[] = "We.BIRTHDAY";        //生年月日
    // $cols[] = "We.H_KNJ_ADDRESS";   //漢字住所
    // $cols[] = "We.H_NOT_CONV";      //非変換部
    // $where[] = "Re.kainno = We.kainno";

    // // 金額計算
    // $tmpPrice_OrderId = 'Re.RECV_ORDER_ID';
    // $tmpPrice_Sql = '';
    // $tmpPrice_Sql .= " ( ";
    // $tmpPrice_Sql .= " SELECT SUM( (s.TANKA * r.AMOUNT) ) AS WK_PRICE ";
    // $tmpPrice_Sql .= " FROM RECVPRODUCT_TBL r ,SQLSHOHIN_TBL s , SYSTEM_TBL sy";
    // $tmpPrice_Sql .= " WHERE sy.SITE_KBN='1' ";
    // $tmpPrice_Sql .= " AND  r.SHOHIN_CD  = s.SHOHIN_CD ";
    // $tmpPrice_Sql .= " AND ( ";
    // $tmpPrice_Sql .= "     ( r.SHOHIN_LEVEL IS NULL     AND s.SHOHIN_LEVEL IS NULL ) ";
    // $tmpPrice_Sql .= "  OR ( r.SHOHIN_LEVEL IS NOT NULL AND r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
    // $tmpPrice_Sql .= " ) ";
    // $tmpPrice_Sql .= " AND r.RECV_ORDER_ID = ".$tmpPrice_OrderId ;
    // $tmpPrice_Sql .= " ) AS PRICE2, ";

    // //消費税
    // $tmpPrice_Sql .= " ( ";
    // $tmpPrice_Sql .= " SELECT sum( (s.TANKA * r.AMOUNT) * (sy.TAX_RATE) ) AS WK_PRICE ";
    // $tmpPrice_Sql .= " FROM RECVPRODUCT_TBL r ,SQLSHOHIN_TBL s , SYSTEM_TBL sy";
    // $tmpPrice_Sql .= " WHERE sy.SITE_KBN='1' ";
    // $tmpPrice_Sql .= " AND  r.SHOHIN_CD  = s.SHOHIN_CD ";
    // $tmpPrice_Sql .= " AND ( ";
    // $tmpPrice_Sql .= "     ( r.SHOHIN_LEVEL IS NULL     and s.SHOHIN_LEVEL IS NULL ) ";
    // $tmpPrice_Sql .= "  OR ( r.SHOHIN_LEVEL IS NOT NULL and r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
    // $tmpPrice_Sql .= " ) ";
    // $tmpPrice_Sql .= " AND r.RECV_ORDER_ID = ".$tmpPrice_OrderId ;
    // $tmpPrice_Sql .= " ) AS TAX ";
    // $cols[] = $tmpPrice_Sql;

    // // NET_IJ_Tbl
    // $cols[] = "Ij.NET_IJ_INFO";
    // $where[] = "Re.NET_IJ_CD = Ij.NET_IJ_CD(+)";

    // // GiftOrder_Tbl
    // $cols[] = "Gi.SHIP_CAUTION_CD1";
    // $cols[] = "Gi.SHIP_CAUTION_CD2";
    // $cols[] = "Gi.MSG_NEED_FLG";
    // $cols[] = "Gi.MSG_TO_NAME";
    // $cols[] = "Gi.MSG_TEXT";
    // $cols[] = "Gi.MSG_FROM_NAME";
    // $cols[] = "Gi.DELIVERY_KBN";
    // $cols[] = "Gi.DELIVERY_DT";
    // $cols[] = "Gi.DELIVERY_TIME_TYPE";
    // $cols[] = "Gi.NAME_KANJI";
    // $cols[] = "Gi.NAME_KANA";
    // $cols[] = "Gi.ANOTHER_POST_NO";
    // $cols[] = "Gi.ANOTHER_ADDR_KANA";
    // $cols[] = "Gi.ANOTHER_ADDR AS";
    // $cols[] = "Gi.ANOTHER_ADDR_NOT_CONV_KANA";
    // $cols[] = "Gi.ANOTHER_ADDR_NOT_CONV";
    // $cols[] = "Gi.ANOTHER_TELNO AS ADD_ANOTHER_TELNO";
    // $cols[] = "Gi.GIFT_SENDER_NAME";
    // $cols[] = "Gi.DW_USED_KBN";
    // $cols[] = "Gi.REGIST_AGREEMENT_FLG";
    // $cols[] = "Gi.SESSION_ID";
    // // ▼2015/8/11 R-#18675_長白仙参サイト　贈り物注文対応 (nul yamashita)
    // $cols[] = "Gi.RECV_KBN";
    // // ▲2015/8/11 R-#18675_長白仙参サイト　贈り物注文対応 (nul yamashita)
    
    // $where[] = "Re.RECV_ORDER_ID = Gi.RECV_ORDER_ID";

    // // Attention_Tbl
    // // 発送注意(包装紙)
    // $cols[] = "At.ATTENTION AS SHIP_CAUTION1";
    // $where[] = "TO_NUMBER(Gi.SHIP_CAUTION_CD1) = TO_NUMBER(At.ATTENTION_CD(+))";
    // // 発送注意(リボン)
    // $cols[] = "At2.ATTENTION AS SHIP_CAUTION2";
    // $where[] = "TO_NUMBER(Gi.SHIP_CAUTION_CD2) = TO_NUMBER(At2.ATTENTION_CD(+))";

    // // ▼2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)
    
    // $froms[] = "ATTENTION_TBL At_En1";
    // $cols[] = "At_En1.attention as enclosure1";
    // $where[] = "to_number(Re.enclosure_cd1) = to_number(At_En1.attention_cd(+))";
    
    // $froms[] = "ATTENTION_TBL At_En2";
    // $cols[] = "At_En2.attention as enclosure2";
    // $where[] = "to_number(Re.enclosure_cd2) = to_number(At_En2.attention_cd(+))";
    
    // $froms[] = "ATTENTION_TBL At_En3";
    // $cols[] = "At_En3.attention as enclosure3";
    // $where[] = "to_number(Re.enclosure_cd3) = to_number(At_En3.attention_cd(+))";
    
    // $froms[] = "ATTENTION_TBL At_En4";
    // $cols[] = "At_En4.attention as enclosure4";
    // $where[] = "to_number(Re.enclosure_cd4) = to_number(At_En4.attention_cd(+))";
    
    // $froms[] = "ATTENTION_TBL At_En5";
    // $cols[] = "At_En5.attention as enclosure5";
    // $where[] = "to_number(Re.enclosure_cd5) = to_number(At_En5.attention_cd(+))";
    
    // $froms[] = "ATTENTION_TBL At_En6";
    // $cols[] = "At_En6.attention as enclosure6";
    // $where[] = "to_number(Re.enclosure_cd6) = to_number(At_En6.attention_cd(+))";
    
    // $froms[] = "ATTENTION_TBL At_En7";
    // $cols[] = "At_En7.attention as enclosure7";
    // $where[] = "to_number(Re.enclosure_cd7) = to_number(At_En7.attention_cd(+))";
    
    // $froms[] = "ATTENTION_TBL At_En8";
    // $cols[] = "At_En8.attention as enclosure8";
    // $where[] = "to_number(Re.enclosure_cd8) = to_number(At_En8.attention_cd(+))";
    
    // $froms[] = "ATTENTION_TBL At_En9";
    // $cols[] = "At_En9.attention as enclosure9";
    // $where[] = "to_number(Re.enclosure_cd9) = to_number(At_En9.attention_cd(+))";
    
    // $froms[] = "ATTENTION_TBL At_En10";
    // $cols[] = "At_En10.attention as enclosure10";
    // $where[] = "to_number(Re.enclosure_cd10) = to_number(At_En10.attention_cd(+))";
    
    // // ▲2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)

    // $sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where);



    $sql  = "SELECT ";
    $sql  .= "Re.cust_no AS KAINNO, ";
    $sql  .= "Re.tel_no AS TEL_NO, ";
    $sql  .= "Re.pay_way_kbn AS PAYMENT_TYPE, ";
    $sql  .= "Re.pay_cnt AS PAYMENT_NUM, ";
    $sql  .= "Re.credit_card_no AS CC_NO, ";
    $sql  .= "Re.avail_term AS CC_TERM, ";
    $sql  .= "Re.card_input_kbn AS CC_REGIST_KBN, ";
    $sql  .= "Re.site_kbn AS SITE_KBN, ";
    $sql  .= "Re.dlv_req_memo AS DELIVERY_REQUEST, ";
    $sql  .= "to_char(Re.acpt_dt_tm, 'YYYY/MM/DD HH24:MI:SS')  AS ORDER_DT, ";
    $sql  .= "COALESCE(Re.tot_odr_amnt, 0) as ORDER_AMOUNT, ";
    $sql  .= "COALESCE(Re.tot_odr_tax, 0) as ORDER_TAXRATE, ";
    $sql  .= "At3.att_cont AS SHIP_CAUTION3, ";
    $sql  .= "Re.ship_att_cd_1 AS SHIP_CAUTION3_CD, ";
    $sql  .= "Cr.credit_card_corp_name AS COMPANYMEIFULL, ";
    $sql  .= "We.cust_name AS NAMEKANJI, ";
    $sql  .= "We.cust_name_kana AS NAMEKANA, ";
    $sql  .= "We.era_kbn AS NAMEOFERA, ";
    $sql  .= "We.birthday AS BIRTHDAY, ";
    $sql  .= "We.adr AS H_KNJ_ADDRESS, ";
    $sql  .= "We.adr_non_chg_part AS H_NOT_CONV, ";
    $sql  .= "( ";
    $sql  .= "select  ";
    $sql  .= "sum(CAST (s.price AS INTEGER) * r.num)  as wk_price  ";
    $sql  .= "from odr_d r ,m_item s , m_sys_set sy ";
    $sql  .= "where sy.site_kbn='1'  ";
    $sql  .= "and  r.item_cd  = s.item_cd  ";
    $sql  .= "and (  ";
    $sql .= "((r.item_lvl is null or (COALESCE(r.item_lvl, '') = '' )) and (s.item_lvl is null or (COALESCE(s.item_lvl, '') = '' )))  "; 
	$sql .= "or ((r.item_lvl is not null and trim(r.item_lvl) != '') and r.item_lvl = s.item_lvl )  ";
	$sql .= ")  ";
    $sql  .= "and r.odr_seq = ".getSqlValue($recv_order_id);
    $sql  .= ") as PRICE2,  ";
    $sql  .= "(  ";
    $sql  .= "select sum( (CAST (s.price AS INTEGER) * r.num) * (sy.TAX_RATE) ) as wk_price  ";
    $sql  .= "from odr_d r ,m_item s , m_sys_set sy ";
    $sql  .= "where sy.site_kbn='1'  ";
    $sql  .= "and  r.item_cd  = s.item_cd  ";
    $sql  .= "and (  ";
    $sql .= "((r.item_lvl is null or (COALESCE(r.item_lvl, '') = '' )) and (s.item_lvl is null or (COALESCE(s.item_lvl, '') = '' )))  "; 
	$sql .= "or ((r.item_lvl is not null and trim(r.item_lvl) != '') and r.item_lvl = s.item_lvl )  ";
	$sql .= ")  ";
    $sql  .= "and r.odr_seq = ".getSqlValue($recv_order_id);
    $sql  .= ") as TAX, ";
    $sql  .= "Ij.net_ju_rsn AS NET_IJ_INFO, ";
    $sql  .= "Gi.ship_att_kbn_1 AS SHIP_CAUTION_CD1, ";
    $sql  .= "Gi.ship_att_kbn_2 AS SHIP_CAUTION_CD2, ";
    $sql  .= "Gi.msg_card_kbn AS MSG_NEED_FLG, ";
    $sql  .= "Gi.dlv_to_kbn AS DELIVERY_KBN, ";
    $sql  .= "Gi.dlv_req_dt AS DELIVERY_DT, ";
    $sql  .= "Gi.dlv_tm_kbn AS DELIVERY_TIME_TYPE, ";
    $sql  .= "Gi.rcver_name AS NAME_KANJI, ";
    $sql  .= "Gi.rcver_kana_name AS NAME_KANA, ";
    $sql  .= "Gi.rcver_adr_post_no AS ANOTHER_POST_NO, ";
    $sql  .= "Gi.kana_adr AS ANOTHER_ADDR_KANA, ";
    $sql  .= "Gi.rcver_adr AS ANOTHER_ADDR , ";
    $sql  .= "Gi.rcver_adr_non_chg_part_kana AS ANOTHER_ADDR_NOT_CONV_KANA, ";
    $sql  .= "Gi.rcver_adr_non_chg_part AS ANOTHER_ADDR_NOT_CONV, ";
    $sql  .= "Gi.rcver_adr_tel_no AS ADD_ANOTHER_TELNO, ";
    $sql  .= "Gi.domo_use_kbn AS DW_USED_KBN, ";
    $sql  .= "At.att_cont AS SHIP_CAUTION1, ";
    $sql  .= "At2.att_cont AS SHIP_CAUTION2 ";
    $sql  .= "FROM f_odr Re ";
    $sql  .= "LEFT JOIN m_offline_data We ";
    $sql  .= "ON Re.cust_no = We.cust_no ";
    $sql  .= "LEFT JOIN m_credit_corp Cr ";
    $sql  .= "ON Re.credit_card_corp = Cr.credit_card_corp_cd ";
    $sql  .= "LEFT JOIN m_net_ju_rsn Ij ";
    $sql  .= "ON Re.pend_cd = Ij.net_ju_cd ";
    $sql  .= "LEFT JOIN f_gift Gi ";
    $sql  .= "ON Re.odr_seq = Gi.odr_seq ";
    $sql  .= "LEFT JOIN m_att At ";
    $sql  .= "ON Gi.ship_att_kbn_1 =At.att_cd ";
    $sql  .= "LEFT JOIN m_att At2 ";
    $sql  .= "ON Gi.ship_att_kbn_2 = At2.att_cd ";
    $sql  .= "LEFT JOIN m_att At3 ";
    $sql  .= "ON Re.ship_att_cd_1 = At3.att_cd ";
    $sql  .= "WHERE Re.odr_seq = ".getSqlValue($recv_order_id); 
    // SQLを実行する
    $result = dbQuery($con_utl, $sql);
    // データカウントを取得する
    //$rows = getNumRows($result, $arr_utl);
    $rows = getNumRows($result);
    //データ取得
    //$row = dbFetchRow($result, 0, $arr_utl);
    $row = dbFetchRow($result);

    //---------------------------------------------------------------------
    // SQL文作成(購入商品情報取得)
    //---------------------------------------------------------------------
    // 取得テーブル
    // $froms_prd[] = "SqlShohin_Tbl Sh";
    // $froms_prd[] = "RecvProduct_Tbl Pr";
    // //▼2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
    // $froms_prd[] = "SHOHINPC_TBL Spc";
    // //▲2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)

    // // 取得カラム
    // // RecvProduct_Tbl
    // $cols_prd[] = "Pr.SHOHIN_CD";
    // $cols_prd[] = "Pr.AMOUNT";
    // $cols_prd[] = "Pr.PRICE";
    // $cols_prd[] = "Pr.SHOHIN_TYPE";
    // $where_prd[] = "Pr.RECV_ORDER_ID = ".getSqlValue($recv_order_id);

    // // SqlShohin_Tbl
    // $cols_prd[] = "Sh.NAME10";
    // $cols_prd[] = "Sh.NAMEFULL";
    // $cols_prd[] = "Sh.SHOHIN_LEVEL";
    // $where_prd[] = "Pr.SHOHIN_CD = Sh.SHOHIN_CD(+)";
    // $where_prd[] = "((Pr.SHOHIN_LEVEL IS NOT NULL AND Pr.SHOHIN_LEVEL = Sh.SHOHIN_LEVEL) OR (Pr.SHOHIN_LEVEL IS NULL AND  Sh.SHOHIN_LEVEL IS NULL)) ";

    // // ShohinPC_Tbl
    // //▼2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
    // $cols_prd[] = "Spc.SHOHIN_KIND";
    // $where_prd[] = "Sh.SHOHIN_CD = Spc.SHOHIN_CD(+)";
    // $where_prd[] = "Sh.SHOHIN_LEVEL = Spc.SHOHIN_LEVEL(+)";
    //▲2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)

    $sql_prd  = "SELECT ";
    $sql_prd  .= "Pr.item_cd AS SHOHIN_CD, ";
    $sql_prd  .= "Pr.num AS AMOUNT, ";
    $sql_prd  .= "Pr.amnt AS PRICE, ";
    $sql_prd  .= "Pr.item_kbn AS SHOHIN_TYPE, ";
    $sql_prd  .= "Sh.item_name_10 AS NAME10, ";
    $sql_prd  .= "Sh.item_name AS NAMEFULL, ";
    $sql_prd  .= "Sh.item_lvl AS SHOHIN_LEVEL, ";
    $sql_prd  .= "Spc.item_dtl_kbn AS SHOHIN_KIND  ";
    $sql_prd  .= "FROM ";
    $sql_prd  .= "odr_d Pr  ";
    $sql_prd  .= "LEFT JOIN m_item Sh  ";
    $sql_prd  .= "ON Pr.item_cd = Sh.item_cd  ";
    $sql_prd  .= "AND (((Pr.item_lvl is not null and trim(Pr.item_lvl) != '')  ";
    $sql_prd  .= "AND Pr.item_lvl = Sh.item_lvl)  ";
    $sql_prd  .= "OR ((Pr.item_lvl is null or (COALESCE(Pr.item_lvl, '') = '' )) AND Sh.item_lvl IS NULL))  ";
    $sql_prd  .= "LEFT JOIN m_item_dtl Spc  ";
    $sql_prd  .= "ON Sh.item_cd = Spc.item_cd  ";
    $sql_prd  .= "AND Sh.item_lvl = Spc.item_lvl ";
    $sql_prd  .= "WHERE Pr.odr_seq = ".getSqlValue($recv_order_id);

    //$sql_prd = "SELECT ".implode(', ', $cols_prd)." FROM ".implode(', ', $froms_prd)." WHERE ".implode(' AND ', $where_prd) .'ORDER BY Sh.SHOHIN_CD ASC';

    // SQLを実行する
    $result_prd = dbQuery($con_utl, $sql_prd);
    // データカウントを取得する
    //$rows_prd = getNumRows($result_prd, $arr_utl);
    $rows_prd = getNumRows($result_prd);
    //---------------------------------------------------------------------
    // 受表表示データ作成(基本情報作成)
    //---------------------------------------------------------------------
    $sum_tax = 0;
    $sum_amount = 0;
    $tmp = array();
    //会員ｺｰﾄﾞ
    $tmp['kainno']   = getHtmlEscapedString($row['KAINNO']);
    //注文受付日時
    $tmp['order_dt'] = getHtmlEscapedString($row['ORDER_DT']);
    //会員名(漢字)
    //$tmp['namekanji']= getHtmlEscapedString(ssk_decrypt($row['NAMEKANJI']));
    $tmp['namekanji']= getHtmlEscapedString($row['NAMEKANJI']);
    //年号
    $nameofera = "";
    if (array_key_exists(intval($row['NAMEOFERA']), $name_of_era)) {
      $nameofera = $name_of_era[intval($row['NAMEOFERA'])];
    }
    $tmp['nameofera'] = $nameofera;
    //生年月日
    //$birthday = getHtmlEscapedString(ssk_decrypt($row['BIRTHDAY']));
    $birthday = getHtmlEscapedString($row['BIRTHDAY']);
    $tmp['birthday']     = substr($birthday,0,2).'.'.substr($birthday,2,2).'.'.substr($birthday,4,2);
    //住所
    //$tmp['address']     = getHtmlEscapedString(ssk_decrypt($row['H_KNJ_ADDRESS']));
    $tmp['address']     = getHtmlEscapedString($row['H_KNJ_ADDRESS']);
    //非変換部住所
    //$tmp['address_not']     = getHtmlEscapedString(ssk_decrypt($row['H_NOT_CONV']));
    $tmp['address_not']     = getHtmlEscapedString($row['H_NOT_CONV']);
    //会員名
    //$tmp['name']     = getHtmlEscapedString(ssk_decrypt($row['NAMEKANA']));
    $tmp['name']     = getHtmlEscapedString($row['NAMEKANA']);
    //電話番号
    //$tmp['tel']      = getHtmlEscapedString(ssk_decrypt($row['TEL_NO']));
    $tmp['tel']      = getHtmlEscapedString($row['TEL_NO']);
    //受区
    $tmp['ukeku']   = (intval($row['SITE_KBN']) === 1) ? 'インターネット' : 'モバイル';
    //支払い方法
    $shiharai = "";
    if (array_key_exists(intval($row['PAYMENT_TYPE']), $payment_type)) {
      $shiharai = $payment_type[intval($row['PAYMENT_TYPE'])];
    }
    $tmp['pay'] = $shiharai;
    //支払回数
    $tmp['paynum'] =$row['PAYMENT_NUM'];

	//▼2015/04/30 R-#13917_WAO側のインターネット注文受表の支払い回数欄の表示と、WEB管理ツールの支払い回数の表示に違いがある(nis higashi)
	// if (intval($row['BONUS_KBN']) === 1) {
	// 	$tmp['paynum'] = "ボーナス一括";
	// } else if (intval($row['BONUS_KBN']) === 9) {
	// 	$tmp['paynum'] = "リボ払い";
	// }
	//▲2015/04/30 R-#13917_WAO側のインターネット注文受表の支払い回数欄の表示と、WEB管理ツールの支払い回数の表示に違いがある(nis higashi)

    
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
    // $cc_no = strlen(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])));
    // if ($cc_no != 0){
    //     $conv_cc_no = str_repeat("*",$cc_no - 4).$conv_cc_no.substr(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])), -4);
    // }
    $cc_no = strlen(getHtmlEscapedString($row['CC_NO']));
    if ($cc_no != 0){
        $conv_cc_no = str_repeat("*",$cc_no - 4).$conv_cc_no.substr(getHtmlEscapedString($row['CC_NO']), -4);
    }
    $tmp['cc_no'] = $conv_cc_no;
    //有効期限
    $tmp['cc_term'] = $row['CC_TERM'];
    //保留区分
    $tmp['ijriyu']=$row['NET_IJ_INFO'];
    //▼2013/02/06 【三次リリース】R-#11493_消費税増税対応（WEB対応）(ulsystems hatano)
    //商品購入情報
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

    //---------------------------------------------------------------------
    // 受表表示データ作成(購入商品情報)
    //---------------------------------------------------------------------
    // 商品
    $counter_d = 0;
    $prd       = array_fill(0, 10, '');
    $prdct     = array_fill(0, 10, '');
    // プレゼント品、施策品(贈り物)
    $counter_s = 0;
    $prs       = array_fill(0, 10, '');
    $prsct     = array_fill(0, 10, '');
    // プレゼント品、施策品(自分用)
    $prs_own   = "";
    for ($i = 0; $i < $rows_prd; $i++) {
        //データ取得
        $row_prd = dbFetchRow($result_prd, $i, $arr_utl);

        //商品購入情報
        $shohin_cd = round($row_prd['SHOHIN_CD']);
        $amount = $row_prd['AMOUNT'];
        //▼2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
        $shohin_kind = $row_prd['SHOHIN_KIND'];
        //▲2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)

        if ($shohin_cd != '0000') {
        	//▼2017/11/10 R-#32296_【H29-00376-01】養生薬湯ログイン注文(nul-oomori)
            //▼2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
            if ($shohin_kind == '1') {
            //▲2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
                //商品・ﾄﾗﾍﾞﾙｾｯﾄの場合
                if($row_prd['SHOHIN_LEVEL']){
                    $prd[$counter_d] = '('.$row_prd['SHOHIN_CD'].')'.' '.$row_prd['NAME10']."(".$row_prd['SHOHIN_LEVEL'].")";
                }else{
                    $prd[$counter_d] = '('.$row_prd['SHOHIN_CD'].')'.' '.$row_prd['NAME10'];
                }
                $prdct[$counter_d] = round($amount);
                $counter_p += $amount;
                $counter_d++;
            //▼2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
            } else {
            //▲2017/12/12 R-#32054_【H29-00336-01】養生薬湯リニューアル(nul fukunaga)
                //ﾌﾟﾚｾﾞﾝﾄ品の場合
                if ($shohin_cd != '0710' && $shohin_cd != '0701') {
                    // 自分へ送る施策品は別に退避(後で【贈り主様へお届け】の欄に施策品を表示させるため)
                    if($row_prd['SHOHIN_TYPE'] == '1'){
                        $prs_own .= $row_prd['NAMEFULL'] .'[' .round($amount) .'個]、';
                    }else{
                        if($row_prd['SHOHIN_LEVEL']){
                            $prs[$counter_s] = '('.$row_prd['SHOHIN_CD'].')'.' '.$row_prd['NAME10']."(".$row_prd['SHOHIN_LEVEL'].")";
                        }else{
                            $prs[$counter_s] = '('.$row_prd['SHOHIN_CD'].')'.' '.$row_prd['NAME10'];
                        }
                        $prsct[$counter_s] = round($amount);
                        $counter_s++;
                    }
                }
            }
            //▲2017/11/10 R-#32296_【H29-00376-01】養生薬湯ログイン注文(nul-oomori)
        }
    }

    // 商品の個数が、表示できる商品数を超えている場合は最後の列に表示できていない旨を表示
    if($counter_d > $PRODUCT_DISP_NUM){
        $prd[$PRODUCT_DISP_NUM - 1] = $PRODUCT_DISP_NUM .'点オーバーです！';
        $prdct[$PRODUCT_DISP_NUM] = '';
    }
    if($counter_s > $PRESENT_DISP_NUM){
        $prs[$PRESENT_DISP_NUM - 1] = $PRESENT_DISP_NUM .'点オーバーです！';
        $prsct[$PRESENT_DISP_NUM] = '';
    }

    //購入点数
    $tmp['num']     = $counter_p;
    //金額
    $tmp['kingaku'] = $sum_amount;
    //消費税
    $tmp['tax']     = $sum_tax;
    //合計
    $tmp['goukei']  = $sum_amount + $sum_tax;

    //---------------------------------------------------------------------
    // ギフト情報($gift_body：受表に表示される内容を集約)
    //---------------------------------------------------------------------
    $gift_body = array();
    // 贈り物内容
    $gift_body['gift_content_title'] = '【贈り物内容】　※発送注意「手書きメモ参照」入力要';
    // 包装紙
    $gift_body['ship_caution1'] = '■包装紙：　' .$row['SHIP_CAUTION1'];
    // リボン
    $gift_body['ship_caution2'] = '■リボンシール：　' .$row['SHIP_CAUTION2'];
    // 希望日時
    $delivery_date = '■希望日：　';
    if(is_null($row['DELIVERY_DT']) || $row['DELIVERY_DT'] == ''){
        $delivery_date .= '指定しない　　　　　　';
    }else{
        $delivery_date .= date('m月d日',strtotime($row['DELIVERY_DT'])) .'　　　　　　';
    }
    $gift_body['delivery_dt'] = $delivery_date;
    // 希望時間帯
    $time_zone = '■希望時間：　';
    if (array_key_exists(intval($row['DELIVERY_TIME_TYPE']), $time_zone_type)) {
        $time_zone .= $time_zone_type[intval($row['DELIVERY_TIME_TYPE'])];
    }
    $gift_body['time_zone'] = $time_zone .'<br>';
    // ドモホルンリンクル使用歴
    $recipient = '■お受取りになる方：　';
    //▼R-#19979_長白仙参ギフト時のお受け取り人についてのヒアリング対応 2015/11/10 nis-higashi
    //▼2017/11/10 R-#32296_【H29-00376-01】養生薬湯ログイン注文(nul-oomori)
    //長白仙参の贈り物で、お受け取りになる方について表示用
    $dw_used_kbn_chohaku = array(
        '11' => '同封を希望する',
        '12' => '希望しない'
    );
    //▲2017/11/10 R-#32296_【H29-00376-01】養生薬湯ログイン注文(nul-oomori)
    
    // 化粧品
    if ($row['RECV_KBN'] != 2) {
	    if (array_key_exists(intval($row['DW_USED_KBN']), $dw_used_kbn)) {
            $recipient .= $dw_used_kbn[intval($row['DW_USED_KBN'])];
	    }
	// 漢方（長白仙参）
    } else {
	    $recipient = '';
    	if  (array_key_exists(intval($row['DW_USED_KBN']), $dw_used_kbn_chohaku)) {
        	if ($row['DW_USED_KBN'] == 11 || $row['DW_USED_KBN'] == 12) {
        		//▼2017/11/10 R-#32296_【H29-00376-01】養生薬湯ログイン注文(nul-oomori)
        		$recipient = '■カタログ同封について：　';
        		//▲2017/11/10 R-#32296_【H29-00376-01】養生薬湯ログイン注文(nul-oomori)
            	$recipient .= $dw_used_kbn_chohaku[intval($row['DW_USED_KBN'])];
            }
        }
    }
    //▲R-#19979_長白仙参ギフト時のお受け取り人についてのヒアリング対応 2015/11/10 nis-higashi
    $gift_body['recipient'] = $recipient;
    //▼2012/07/17 R-#4650 贈り物メッセージカードと不在時の選択追加(ulsystems hatano)
    // 不在時の対応
    // 送り主へ送る場合のみ表示
    $ship_caution = "";
    // ▼R-#43654 【R02-0412-001】置配サービスEAZYの導入_WEB 2021/1/18 hmc-nagatani
    if ($row['DELIVERY_KBN'] == '0') {
        if(is_null($row['SHIP_CAUTION3_CD']) ||
            $row['SHIP_CAUTION3_CD'] == '' ||
            $row['SHIP_CAUTION3_CD'] == '010010' ||
            $row['SHIP_CAUTION3_CD'] == '010040'
            ){
            if(is_null($row['SHIP_CAUTION3']) || $row['SHIP_CAUTION3'] == ''){
                $ship_caution = '■不在時の対応：　指定しない';
            } else {
                $ship_caution = '■不在時の対応：　' .$row['SHIP_CAUTION3'];
            }
        }else{
            if($row['SHIP_CAUTION3_CD'] == '070000'){
                $ship_caution = '';
            } else {
                $ship_caution = '■置き配指定：　' .$row['SHIP_CAUTION3'];
            }
        }
    }
    // ▲R-#43654 【R02-0412-001】置配サービスEAZYの導入_WEB 2021/1/18 hmc-nagatani
    $gift_body['ship_caution'] = $ship_caution;
    //▲2012/07/17 R-#4650 贈り物メッセージカードと不在時の選択追加(ulsystems hatano)
    // 商品送付先
    // 送り主へ送る場合と、送り先住所を指定する場合で表示文言を変更
    // 贈り主の本住の場合
    $delivery_info = "";
    if($row['DELIVERY_KBN'] == '0'){
        $delivery_info .= '■お届け先：　贈り主様の登録住所';
    // お届け先指定の場合
    }elseif($row['DELIVERY_KBN'] == '2'){
        // お受取人名(カナ)
        //$namekanji = getHtmlEscapedString(ssk_decrypt($row['NAME_KANJI']));
        //$namekana = getHtmlEscapedString(ssk_decrypt($row['NAME_KANA']));
        $namekanji = getHtmlEscapedString($row['NAME_KANJI']);
        $namekana = getHtmlEscapedString($row['NAME_KANA']);
        $delivery_info .= '■お受取人名：　<font style="font-size:21pt;">' .$namekanji .'</font>（' .$namekana .'）' .'様　　（お客様番号：　　　　　　　　　　　　　　　・　なし　）<br>';
        // お受取人(住所漢字)
        // ▼2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)
        $add_address  = '■お届け先：　<font style="font-size:17pt;">〒'.$row['ANOTHER_POST_NO'] .'　';
        // ▲2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)
        //$add_address .= getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR']));
        //$add_address .= getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR_NOT_CONV']));
        $add_address .= getHtmlEscapedString($row['ANOTHER_ADDR']);
        $add_address .= getHtmlEscapedString($row['ANOTHER_ADDR_NOT_CONV']);
        // ▼2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)
        $add_address .= '</font>';
        $delivery_info   .= $add_address .'<br>';
        // ▲2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)
        // 電話番号
        // ▼2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)
        //$delivery_info .= '■電話番号：　<font style="font-size:17pt;">' .getHtmlEscapedString(ssk_decrypt($row['ADD_ANOTHER_TELNO'])) .'</font><br>';
        $delivery_info .= '■電話番号：　<font style="font-size:17pt;">' .getHtmlEscapedString($row['ADD_ANOTHER_TELNO']) .'</font><br>';
        // ▲2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)
        // 贈り主名
        // $sender_name = getHtmlEscapedString(ssk_decrypt($row['GIFT_SENDER_NAME']));
        // $delivery_info .= '■贈り主名：　<font style="font-size:21pt;">' .$sender_name .'</font>様<br>';
    }
    $gift_body['delivery_info'] = $delivery_info;
    // 贈り物要望
    // ▼2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)
    $gift_body['delivery_request'] = '■贈り物要望：　' .getHtmlEscapedString($row['DELIVERY_REQUEST']) ;
    // ▲2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)
    // メッセージカード要／不要
    $gift_message = '■メッセージカード：　';
    if (array_key_exists(intval($row['MSG_NEED_FLG']), $msg_need)) {
        $gift_message .= $msg_need[intval($row['MSG_NEED_FLG'])] .'<br>';
    }
    // メッセージカード内容
    //▼R-#36405_【H31-0112-005】190412公開_2019年ギフト母の日WEB対応_松鳥 2019/04/08 nul-nagata
    //if(intval($row['MSG_NEED_FLG']) == '1'){
    if(intval($row['MSG_NEED_FLG']) != '0' && intval($row['MSG_NEED_FLG']) != '8' ){
    //▲R-#36405_【H31-0112-005】190412公開_2019年ギフト母の日WEB対応_松鳥 2019/04/08 nul-nagata
    //▼R-#20279_贈り物カードのメッセージの改行対応 2015/11/17 nul-yamashita
        $messageText = str_replace("\r", "", getHtmlEscapedString($row['MSG_TEXT']));
        if (substr_count($messageText, "\n") <= 6) {
            $messageText = nl2br($messageText);
        }
        // メッセージカード(宛名)
        $gift_message .= getHtmlEscapedString(ssk_decrypt($row['MSG_TO_NAME'])) .'へ<br>';
        // メッセージカード(本文)
        $gift_message .= $messageText .'<br>';
        // メッセージカード(差出人名)
        $gift_message .= getHtmlEscapedString(ssk_decrypt($row['MSG_FROM_NAME'])) .'より';
    //▲R-#20279_贈り物カードのメッセージの改行対応 2015/11/17 nul-yamashita
    }
    $gift_body['gift_message'] = $gift_message;
    // 贈り主様情報
    $gift_body['sender_delivery_title'] = '【贈り主様へお届け】';
    // 送り主様へお届けの「施策品」表示欄
    $own_present = "■施策品：　";
    if($prs_own !== ''){
        $own_present .= '【2台入力要】'.rtrim($prs_own, "、");
    }else{
        $own_present .= 'なし';
    }
    $gift_body['own_present'] = $own_present;
    // 送り主様へお届けの「その他」表示欄
    $sender_other_info = '■その他：　明細書';
    if(intval($row['PAYMENT_TYPE']) == '1'){
        $sender_other_info .= '、振込み用紙';
    }
    $gift_body['sender_other_info'] = $sender_other_info;
    // 発送形態
    $delivery_form = '■発送形態：　';
    if (array_key_exists(intval($row['DELIVERY_KBN']), $delivery_kbn)) {
        $delivery_form .= $delivery_kbn[intval($row['DELIVERY_KBN'])];
    }
    $gift_body['delivery_form'] = $delivery_form;

    // ▼2015/8/11 R-#18675_長白仙参サイト　贈り物注文対応 (nul yamashita)
    // 化粧品or漢方
    $gift_body['recv_kbn'] = $row['RECV_KBN'];
    // ▲2015/8/11 R-#18675_長白仙参サイト　贈り物注文対応 (nul yamashita)
    
    
    // ▼2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)
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
    
    $gift_body['doufu']=$enclosure;
    // ▲2021/01/28 R-#41279_【R02-0179-001】ギフト注文時の同封物連携 (jst-louvre)
    
    //ステートメントの開放
    dbFreeResult($result);

    //DB close
    dbClose($con_utl);
    
    //配列へ格納
    $order_data = array();
    $order_data = $tmp;

    //贈り物情報を配列へ格納
    $gift_data = array();
    $gift_data = $gift_body;
}
?>
