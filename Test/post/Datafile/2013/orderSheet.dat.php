<?
{
//	ini_set('error_reporting',E_ALL);

	//DB�ڑ�
	$con_utl = dbConnect();
// 	// SQL���쐬
// 	$froms[] = "RecvOrder_Tbl Re";
// 	$cols[] = "Re.kainno";
// 	$cols[] = "Re.tel_no";
// 	$cols[] = "Re.payment_type";
// 	$cols[] = "Re.payment_num";
// 	$cols[] = "Re.cc_no";
// 	$cols[] = "Re.cc_name";
// 	$cols[] = "Re.cc_term";
//     //2010/10/07 kdl-hatano ���ڒǉ� ADD Start
//     $cols[] = "Re.cc_regist_kbn";       //�J�[�h�o�^�敪
//     $cols[] = "Re.CC_NO";               //�J�[�h�ԍ�
//     //2010/10/07 kdl-hatano ���ڒǉ� ADD End

// 	//��2015/04/30 R-#13917_WAO���̃C���^�[�l�b�g������\�̎x�����񐔗��̕\���ƁAWEB�Ǘ��c�[���̎x�����񐔂̕\���ɈႢ������(nis higashi)
// 	$cols[] = "Re.BONUS_KBN";
// 	//��2015/04/30 R-#13917_WAO���̃C���^�[�l�b�g������\�̎x�����񐔗��̕\���ƁAWEB�Ǘ��c�[���̎x�����񐔂̕\���ɈႢ������(nis higashi)

// 	$cols[] = "Re.delivery_time_type";
// 	$cols[] = "Re.another_addr";
// 	$cols[] = "Re.delivery_request";
// 	// �����o�C���Ή� 2009/03/17 kdl.ohyanagi
// 	$cols[] = "Re.site_kbn";
// 	// �����o�C���Ή� 2009/03/17 kdl.ohyanagi
	
// 	// ��HTML���Ή� 2009/10/21 MugikoTsuda
// 	$cols[] = "to_char(Re.delivery_dt, 'YYYY/MM/DD') as delivery_dt";
// 	$cols[] = "Re.another_addr_type";
// 	$cols[] = "Re.another_addr_not_conv";
// 	$cols[] = "Re.another_telno";
// 	$cols[] = "Re.another_post_no";
// 	$cols[] = "Re.delivery_regist_kbn";
// 	$cols[] = "Re.econorder_id";
// 	$cols[] = "Re.enclosure_cd1";
// 	$cols[] = "to_char(Re.order_dt, 'YYYY/MM/DD HH24:MI:SS') as order_dt";
// 	// ��HTML���Ή� 2009/10/21 MugikoTsuda

//     //��2011/04/12 #1253 WAO�Ή�(EC-One hatano) �C�O�����Ή�
//     $cols[] = "Re.COUNTRY_CD";
//     $cols[] = "Re.POSTCD_FOREIGN";
//     $cols[] = "Re.COUNTRY_ADDRESSEE";
//     $cols[] = "Re.ADRS_FOREIGN1";
//     $cols[] = "Re.ADRS_FOREIGN2";
//     $cols[] = "Re.ADRS_FOREIGN3";
//     $cols[] = "Re.TEL_NO_FOREIGN";
//     //��2011/04/12 #1253 WAO�Ή�(EC-One hatano) �C�O�����Ή�

//     //��2012/08/24 R-#5371_�����t���[�m�F��ʂɃR�����g���ǉ� (uls kawanishi)
//     $cols[] = "Re.IKUSEI_COMMENT";
//     //��2012/08/24 R-#5371_�����t���[�m�F��ʂɃR�����g���ǉ� (uls kawanishi)

//     //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
//     $cols[] = "NVL(Re.TOTAL_ORDER_AMOUNT, 0) as ORDER_AMOUNT";
//     $cols[] = "NVL(Re.TOTAL_ORDER_TAXRATE, 0) as ORDER_TAXRATE";
//     //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)

// 	// ��R-#37437_�yH31-0174-026�z�����t���[�A���̂Ɋւ��FAXNET���Ɩ������� 2020/09/14 cyc-hatano
// 	$cols[] = "Re.INDIVNAMESENDER_FLG";
// 	// ��R-#37437_�yH31-0174-026�z�����t���[�A���̂Ɋւ��FAXNET���Ɩ������� 2020/09/14 cyc-hatano

// 	$where[] = "Re.recv_order_id = ".getSqlValue($recv_order_id);
	
// 	$froms[] = "Member_Tbl Me";
// 	$cols[] = "Me.email";
// 	$cols[] = "Me.m_email";
// 	$where[] = "Re.kainno = Me.kainno(+)";

// 	$froms[] = "WebProfile_Tbl We";
//     //2010/10/07 EC-One hatano ���ڒǉ� ADD Start
//     $cols[] = "We.namekanji";       //��������
//     $cols[] = "We.NAMEOFERA";       //�N��
//     $cols[] = "We.birthday";        //���N����
//     $cols[] = "We.H_KNJ_ADDRESS";   //�����Z��
//     $cols[] = "We.H_NOT_CONV";      //��ϊ���
//     //2010/10/07 EC-One hatano ���ڒǉ� ADD End
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

//     //��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul yoshii�j
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

//     //�����
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
//     //��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul yoshii�j

// 	$where[] = "Re.recv_order_id = Pr.recv_order_id";
	
// 	$froms[] = "SqlShohin_Tbl Sh";
// 	$cols[] = "Sh.name10";
// // 	$cols[] = "Sh.tanka";

//     //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j
// 	$cols[] = "Sh.NAMEFULL";
//     $cols[] = "Sh.SHOHIN_LEVEL";
//     //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j

// 	$where[] = "Pr.shohin_cd = Sh.shohin_cd(+)";

// 	//��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iEC-One hatano�j
// 	//$where[] = "Pr.shohin_level = Sh.shohin_level";
// 	$where[] = "((Pr.shohin_level is not null and Pr.shohin_level = Sh.shohin_level) or (Pr.shohin_level is     null and  Sh.shohin_level is null)) ";
// 	//��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iEC-One hatano�j

// 	// ��HTML���Ή� 2009/10/21 MugikoTsuda
// 	$froms[] = "NET_IJ_Tbl Ij";
// 	$cols[] = "Ij.net_ij_info";
// 	$where[] = "Re.net_ij_cd = Ij.net_ij_cd(+)";
	
// 	$froms[] = "ATTENTION_TBL At";
// 	$cols[] = "At.attention as caution";
// 	$where[] = "to_number(Re.ship_caution_cd1) = to_number(At.attention_cd(+))";

// 	// ��R-#43654 �yR02-0412-001�z�u�z�T�[�r�XEAZY�̓���_WEB 2021/1/18 hmc-nagatani
// 	$cols[] = "Re.SHIP_CAUTION_CD1 AS SHIP_CAUTION3_CD";
// 	// ��R-#43654 �yR02-0412-001�z�u�z�T�[�r�XEAZY�̓���_WEB 2021/1/18 hmc-nagatani
	
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
	
// 	// ��HTML���Ή� 2009/10/21 MugikoTsuda

// 	//��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
// 	$cols[] = "Spc.SHOHIN_KIND";
// 	$froms[] = "SHOHINPC_TBL Spc";
// 	$where[] = "Sh.SHOHIN_CD = Spc.SHOHIN_CD(+)";
// 	$where[] = "Sh.SHOHIN_LEVEL = Spc.SHOHIN_LEVEL(+)";
// 	//��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)

// 	//��2011/08/23 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j
// 	//$sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)." ORDER BY Sh.shohin_idx";
// 	$sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)." ORDER BY Sh.shohin_cd";
	//��2011/08/23 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j

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
	
    //SQL�����s����
    $result = dbQuery($con_utl, $sql);

    //�f�[�^�J�E���g���擾����
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

		$tmp['kainno']   = getHtmlEscapedString($row['KAINNO']);					//�������
		$tmp['order_dt'] = getHtmlEscapedString($row['ORDER_DT']);					//������t����
        ////2010/10/07 EC-One hatano ���ڒǉ� ADD Start
        //�����(����)
        //$tmp['namekanji']= getHtmlEscapedString(ssk_decrypt($row['NAMEKANJI']));
		$tmp['namekanji']= getHtmlEscapedString($row['NAMEKANJI']);
        //�N��
        $tmp['nameofera'] = "";
        switch (intval($row['NAMEOFERA'])) {
            case 1:   $nameofera = "M"; break;
			case 2:   $nameofera = "T"; break;
			case 3:   $nameofera = "S"; break;
            case 4:   $nameofera = "H"; break;
			default : $nameofera = ""; break;
        }
        $tmp['nameofera'] = $nameofera;
        //���N����
        $birthday = getHtmlEscapedString(ssk_decrypt($row['BIRTHDAY']));
        $tmp['birthday']     = substr($birthday,0,2).'.'.substr($birthday,2,2).'.'.substr($birthday,4,2);
        //�Z��
        $tmp['address']     = getHtmlEscapedString(ssk_decrypt($row['H_KNJ_ADDRESS'])); //�Z��
        //$tmp['address_not']     = getHtmlEscapedString(ssk_decrypt($row['H_NOT_CONV'])); //��ϊ����Z��
		$tmp['address_not']     = getHtmlEscapedString($row['H_NOT_CONV']);
        ////2010/10/07 EC-One hatano ���ڒǉ� ADD End
		//$tmp['name']     = getHtmlEscapedString(ssk_decrypt($row['NAMEKANA']));		//�����
		//$tmp['tel']      = getHtmlEscapedString(ssk_decrypt($row['TEL_NO']));		//�d�b�ԍ�
		$tmp['name']     = getHtmlEscapedString($row['NAMEKANA']);		//�����
		$tmp['tel']      = getHtmlEscapedString($row['TEL_NO']);
		//$tmp['address']      = getHtmlEscapedString(ssk_decrypt($row['TEL_NO']));		//�d�b�ԍ�
		
		//���
		$tmp['ukeku']   = (intval($row['SITE_KBN']) === 1) ? '�C���^�[�l�b�g' : '���o�C��';
		
		//�x�������@

		$shiharai = "";
		switch (intval($row['PAYMENT_TYPE'])) {
			case 1:   $shiharai = "�U����"; break;
			case 3:   $shiharai = "�����"; break;
			case 4:   $shiharai = "�X�ֈ�����"; break;
			case 5:   $shiharai = "��s������"; break;
			case 6:   $shiharai = "�J�[�h"; break;
			case 7:   $shiharai = "���|�R���N�g"; break;
			//��R-#41516_�yR02-0214-001�z�V�K�L���b�V�����X���ϓ���_WEB 2020/07/21 jast-fujiyoshi
			case 21:  $shiharai = "AmazonPay"; break;
			case 22:  $shiharai = "LINE Pay"; break;
			case 23:  $shiharai = "PayPay"; break;
			//��R-#41516_�yR02-0214-001�z�V�K�L���b�V�����X���ϓ���_WEB 2020/07/21 jast-fujiyoshi
			// ��R-#42576_�yR02-0315-001�z�L���b�V�����X����Pay�������� �y�VPay�ǉ�_Web�@TienPV
			case 24:  $shiharai = "�y�V�y�C"; break;
			// ��R-#42576_�yR02-0315-001�z�L���b�V�����X����Pay�������� �y�VPay�ǉ�_Web�@TienPV
			default : $shiharai = ""; break;
		}
		$tmp['pay'] = $shiharai;
		
		$tmp['paynum'] =$row['PAYMENT_NUM'];	//�x����
		
		//��2015/04/30 R-#13917_WAO���̃C���^�[�l�b�g������\�̎x�����񐔗��̕\���ƁAWEB�Ǘ��c�[���̎x�����񐔂̕\���ɈႢ������(nis higashi)
		// if (intval($row['BONUS_KBN']) === 1) {
		// 	$tmp['paynum'] = "�{�[�i�X�ꊇ";
		// } else if (intval($row['BONUS_KBN']) === 9) {
		// 	$tmp['paynum'] = "���{����";
		// }
		//��2015/04/30 R-#13917_WAO���̃C���^�[�l�b�g������\�̎x�����񐔗��̕\���ƁAWEB�Ǘ��c�[���̎x�����񐔂̕\���ɈႢ������(nis higashi)

		
        ////2010/10/07 kdl-hatano ���ڒǉ� ADD Start
        //�J�[�h�o�^�敪
        $cc_regist_kbn = "";
        switch (intval($row['CC_REGIST_KBN'])) {
            case 1:   $cc_regist_kbn = "����o�^����"; break;
			default : $cc_regist_kbn = ""; break;
		}
        $tmp['cc_regist_kbn'] = $cc_regist_kbn;
        //�J�[�h���
        $tmp['companymeifull'] = $row['COMPANYMEIFULL'];
        //�J�[�hNo.
        $conv_cc_no = "";
        //$cc_no = strlen(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])));
		$cc_no = strlen(getHtmlEscapedString($row['CC_NO']));
        if ($cc_no != 0){
            //$conv_cc_no = str_repeat("*",$cc_no - 4).$conv_cc_no.substr(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])), -4);
			$conv_cc_no = str_repeat("*",$cc_no - 4).$conv_cc_no.substr(getHtmlEscapedString($row['CC_NO']), -4);
        }
        $tmp['cc_no'] = $conv_cc_no;
        //�L������
        $tmp['cc_term'] = $row['CC_TERM'];
        ////2010/10/07 kdl-hatano ���ڒǉ� ADD End

		//�z�B���@
		$econid = $row['ECONORDER_ID'];
		if ($econid != null){
			$conveni = "�R���r�j";
		} else {
			$conveni = "";
		}
		$tmp['conveni'] = $conveni;
		
		//���Ԏw��
		$jikanshitei = "";
		switch (intval($row['DELIVERY_TIME_TYPE'])) {
			case 0:  $jikanshitei = ""; break;
			case 1:  $jikanshitei = "�ߑO(8-12)"; break;
			case 2:  $jikanshitei = "�ߌ�(12-14)"; break;
			case 3:  $jikanshitei = "�ߌ�(14-16)"; break;
			case 4:  $jikanshitei = "�ߌ�(16-18)"; break;
			case 5:  $jikanshitei = "�ߌ�(18-20)"; break;
			case 6:  $jikanshitei = "���(20-21)"; break;
			// ��R-#31253_�yH29-00099-01�z6��1���J�n ���4�_�{�� ��̔��|�C���g�_�E�� ���j���[�A�� 2017/05/09 axl-higashi
			case 8:  $jikanshitei = "���(19-21)"; break;
			// ��R-#31253_�yH29-00099-01�z6��1���J�n ���4�_�{�� ��̔��|�C���g�_�E�� ���j���[�A�� 2017/05/09 axl-higashi
			default: $jikanshitei = ""; break;
			}
		$tmp['stime'] = $jikanshitei;
		
		$tmp['sday'] =$row['DELIVERY_DT'];	//�����w��
		
		//���͂�����
		$betsujyuno   = "";
		$betsujyu     = "";
		$betsutel     = "";
		$otodokejyuno = "";
		$otodokejyu   = "";
		$otodokejyu2  = "";
		$otodoketel   = "";
        //��2011/04/12 #1253 WAO�Ή�(EC-One hatano) �C�O�����Ή�
        $countryname  ="";
        $kaigaijyuno  ="";
        $kaigaijyu1   ="";
        $kaigaijyu2   ="";
        $kaigaijyu3   ="";
        $kaigaiatena  ="";
        $kaigaitel    ="";
        //��2011/04/12 #1253 WAO�Ή�(EC-One hatano) �C�O�����Ή�
		if (intval($row['ANOTHER_ADDR_TYPE']) === 1) {
			$betsujyuno = substr(getHtmlEscapedString($row['B_POST_NO']),0,4)."****";				//�ʏZ�̗X�֔ԍ�
			$betsujyu = getHtmlEscapedString(ssk_decrypt($row['B_KNJ_ADDRESS']));					//�ʏZ��
			$betsutel = substr(getHtmlEscapedString(ssk_decrypt($row['B_TEL_NO'])),0,4)."********";	//�ʏZ����TEL
		} else if (intval($row['ANOTHER_ADDR_TYPE']) === 2) {
			$otodokejyuno = getHtmlEscapedString($row['ANOTHER_POST_NO']);					//���̑����͂���̗X�֔ԍ�
			$otodokejyu   = getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR']));			//���̑����͂���̏Z��
			$otodokejyu2  = getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR_NOT_CONV']));	//���̑����͂���̏Z��(��ϊ���)
			$otodoketel   = getHtmlEscapedString(ssk_decrypt($row['ANOTHER_TELNO']));			//���̑����͂����TEL
        //��2011/04/12 #1253 WAO�Ή�(EC-One hatano) �C�O�����Ή�
		//}
        } else if (intval($row['ANOTHER_ADDR_TYPE']) === 4) {
            //�������擾
            $sql2 = "";
            // $sql2 = "SELECT COUNTRY_NAME FROM COUNTRYCD_TBL WHERE COUNTRY_CD = '".$row['COUNTRY_CD']."'";
            // //SQL�����s����
            // $result2 = dbQuery($con_utl, $sql2);
            // //�f�[�^�J�E���g���擾����
            // $rows2 = getNumRows($result2, $arr_utl2);
            // //�f�[�^���擾����
            // $row2 = dbFetchRow($result2, 0, $arr_utl2);

			//$sql2 = "SELECT country_name AS COUNTRY_NAME FROM m_country WHERE country_cd = '".$row['COUNTRY_CD']."'";
			$sql2 = "SELECT country_name AS COUNTRY_NAME FROM m_country WHERE country_cd = '".$row['COUNTRY_CD']."'";
            //SQL�����s����
            $result2 = dbQuery($con_utl, $sql2);
            //�f�[�^�J�E���g���擾����
            $rows2 = getNumRows($result2, $arr_utl2);
            //�f�[�^���擾����
            $row2 = dbFetchRow($result2, 0, $arr_utl2);

            $countryname = "��:".getHtmlEscapedString($row2['COUNTRY_NAME']);                 //����
			$kaigaijyuno = "�� ".getHtmlEscapedString($row['POSTCD_FOREIGN']);					//�C�O�̗X�֔ԍ�
			$kaigaijyu1  = getHtmlEscapedString(ssk_decrypt($row['ADRS_FOREIGN1']));			//�C�O�Z��1
            $kaigaijyu2  = getHtmlEscapedString(ssk_decrypt($row['ADRS_FOREIGN2']));			//�C�O�Z��2
            $kaigaijyu3  = getHtmlEscapedString(ssk_decrypt($row['ADRS_FOREIGN3']));			//�C�O�Z��3
            $kaigaiatena = "����:".getHtmlEscapedString(ssk_decrypt($row['COUNTRY_ADDRESSEE']));        //�C�O����
			$kaigaitel   = "TEL:".getHtmlEscapedString(ssk_decrypt($row['TEL_NO_FOREIGN']));			//�C�O��TEL
        }
        //��2011/04/12 #1253 WAO�Ή�(EC-One hatano) �C�O�����Ή�
		$tmp['betsujyuno'] = $betsujyuno;
		$tmp['betsujyu']   = $betsujyu;
		$tmp['betsutel']   = $betsutel;
		$tmp['otodokejyuno'] = $otodokejyuno;
		$tmp['otodokejyu']   = $otodokejyu .$otodokejyu2;
		$tmp['otodoketel']   = $otodoketel;
        //��2011/04/12 #1253 WAO�Ή�(EC-One hatano) �C�O�����Ή�
        //$tmp['countryname'] = $countryname;
        $tmp['kaigaijyuno'] = $kaigaijyuno;
		$tmp['kaigaijyu1']   = $kaigaijyu1;
		$tmp['kaigaijyu2']   = $kaigaijyu2;
		$tmp['kaigaijyu3']   = $kaigaijyu3;
        $tmp['kaigaiatena'] = $kaigaiatena;
		$tmp['kaigaitel']   = $kaigaitel;
        $tmp['addr_type']   = intval($row['ANOTHER_ADDR_TYPE']);
        //��2011/04/12 #1253 WAO�Ή�(EC-One hatano) �C�O�����Ή�
		
		//���̑����͂���敪
		$otodokeinfo = "";
		switch (intval($row['DELIVERY_REGIST_KBN'])) {
			case 0:  $otodokeinfo = ""; break;
			case 1:  $otodokeinfo = "����̂ݗ��p"; break;
			case 2:  $otodokeinfo = "�{�Z���o�^"; break;
			case 3:  $otodokeinfo = "�ʏZ���o�^"; break;
			default: $otodokeinfo = ""; break;
		}
		$tmp['otodokeinfo'] = $otodokeinfo;
		
		if ($otodokeinfo === ''){
			$tmp['otodokeinfo_color']="#ffffff";
		} else {
			$tmp['otodokeinfo_color']="#000000";
		}
		
        //��2011/04/12 #1253 WAO�Ή�(EC-One hatano) �C�O�����Ή�
        if (intval($row['ANOTHER_ADDR_TYPE']) === 4) {
            $tmp['kaigaiinfo'] = "�C�O�Z��";
            $tmp['kaigaiinfo_color']="#000000";
        }else{
            $tmp['kaigaiinfo_color']="#ffffff";
        }
        //��2011/04/12 #1253 WAO�Ή�(EC-One hatano) �C�O�����Ή�

		
		//Ұٱ��ڽ
		//if (ssk_decrypt($row['EMAIL']) != ''){
		if (($row['EMAIL']) != ''){
			$tmp['mail'] = "�o�^����";
		//} else if (ssk_decrypt($row['M_EMAIL']) != ''){
		} else if (($row['M_EMAIL']) != ''){
			$tmp['mail'] = "�o�^����";
		} else {
			$tmp['mail'] = "�o�^�Ȃ�";
		}

		//�ذ���ė�
		$tmp['coment'] = $row['DELIVERY_REQUEST'];
		
		//�ۗ��敪
		$tmp['ijriyu']=$row['NET_IJ_INFO'];
		
		//��������
		// ��R-#43654 �yR02-0412-001�z�u�z�T�[�r�XEAZY�̓���_WEB 2021/1/18 hmc-nagatani
		//if($row['SHIP_CAUTION3_CD']==='070000'){
		if($row['SHIP_CAUTION_CD1']==='070000'){
			$tmp['hassochui']="";
		}else{
			//$tmp['hassochui']=$row['CAUTION'];
			$tmp['hassochui']=$row['ATTENTION'];
		}
		// ��R-#43654 �yR02-0412-001�z�u�z�T�[�r�XEAZY�̓���_WEB 2021/1/18 hmc-nagatani

        //��2012/08/24 R-#5371_�����t���[�m�F��ʂɃR�����g���ǉ� (uls kawanishi)
		//�琬�R�����g
		$tmp['ikusei_comment']=$row['IKUSEI_COMMENT'];
        //��2012/08/24 R-#5371_�����t���[�m�F��ʂɃR�����g���ǉ� (uls kawanishi)

		//������
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
		
		
		//���i�w�����
		$shohin_cd = round($row['SHOHIN_CD']);
		$amount = $row['AMOUNT'];
		//��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
		$shohin_kind = $row['SHOHIN_KIND'];
		//��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)

        //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
        //�Ŕ����z
        if (isset($row['ORDER_AMOUNT']) == true && intval($row['ORDER_AMOUNT']) > 0) {
            $sum_amount = $row['ORDER_AMOUNT'];
        } else {
            $sum_amount = $row['PRICE2'];
        }
        //�����
        if (isset($row['ORDER_TAXRATE']) == true && intval($row['ORDER_TAXRATE']) > 0) {
            $sum_tax = $row['ORDER_TAXRATE'];
        } else {
            $sum_tax = $row['TAX'];
        }
        //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)

		if ($shohin_cd == '0710') {	//����ł̌v�Z
            //��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul kawanishi�j
            //����ł�$row['TAX']�Ɋi�[���Ă���̂ŁA����ł̏��iCD����͎擾���Ȃ�
			//$sum_tax += round($price);
            //��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul kawanishi�j
		} else if ($shohin_cd != '0000') {
			//��2017/11/10 R-#32296_�yH29-00376-01�z�{���򓒃��O�C������(nul-oomori)
			//��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
			if ($shohin_kind == '1') {
			//��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
				//���i�E����پ�Ă̏ꍇ
                //��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul kawanishi�j
                //���z��$row['PRICE2']�ɍ��Z�l���i�[����Ă��܂��B�Ȃ̂ŁA���L�R�[�h���R�����g���܂��B
				//$sum_amount += round($price * $amount);
                //��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul kawanishi�j

                //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j
                if($row['SHOHIN_LEVEL']){
                    $prd[$counter_d] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10']."(".$row['SHOHIN_LEVEL'].")";
                }else{
                    $prd[$counter_d] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10'];
                }
                //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j

				$prdct[$counter_d] = round($amount);
				$counter_p += $amount;
				$counter_d++;
			//��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
			} else {
			//��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
				//��ھ��ĕi�̏ꍇ
				if ($shohin_cd != '0710' && $shohin_cd != '0701') {

                    //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j
                    if($row['SHOHIN_LEVEL']){
                        $prs[$counter_s] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10']."(".$row['SHOHIN_LEVEL'].")";
                    }else{
                        $prs[$counter_s] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10'];
                    }
                    //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j


					$prsct[$counter_s] = round($amount);
					$counter_s++;
				}
			}
			//��2017/11/10 R-#32296_�yH29-00376-01�z�{���򓒃��O�C������(nul-oomori)
		}

    	// ��R-#37437_�yH31-0174-026�z�����t���[�A���̂Ɋւ��FAXNET���Ɩ������� 2020/08/21 cyc-hatano
		// ���ו��̍��o�l�w��
		// if (intval($row['INDIVNAMESENDER_FLG']) == '1') {
		// 	$tmp['indivnamesender'] = '���o�l�w��';
		// }
    	// ��R-#37437_�yH31-0174-026�z�����t���[�A���̂Ɋւ��FAXNET���Ɩ������� 2020/08/21 cyc-hatano
	}

    // ��2012/03/19 R-#3125 ���蕨Web�Ή� uls-motoi
    // ���i�̌����A�\���ł��鏤�i���𒴂��Ă���ꍇ�͍Ō�̗�ɕ\���ł��Ă��Ȃ��|��\��
    if($counter_d > $PRODUCT_DISP_NUM){
        $prd[$PRODUCT_DISP_NUM - 1] = $PRODUCT_DISP_NUM .'�_�I�[�o�[�ł��I';
        $prdct[$PRODUCT_DISP_NUM - 1] = '';
    }
    if($counter_s > $PRESENT_DISP_NUM){
        $prs[$PRESENT_DISP_NUM - 1] = $PRESENT_DISP_NUM .'�_�I�[�o�[�ł��I';
        $prsct[$PRESENT_DISP_NUM - 1] = '';
    }
    // ��2012/03/19 R-#3125 ���蕨Web�Ή� uls-motoi

	$tmp['num']     = $counter_p;				//�w���_��
	$tmp['kingaku'] = $sum_amount;				//���z
	$tmp['tax']     = $sum_tax;					//�����
	$tmp['goukei']  = $sum_amount + $sum_tax;	//���v
	$tmp['doufu']=$enclosure;

	//�X�e�[�g�����g�̊J��
	dbFreeResult($result);

	//DB close
	dbClose($con_utl);
	
	//�z��֊i�[
	$order_data = array();
	$order_data = $tmp;
	
}
?>
