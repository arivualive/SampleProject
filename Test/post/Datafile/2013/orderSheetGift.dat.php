<?
{
    //DB�ڑ�
    $con_utl = dbConnect();

    //---------------------------------------------------------------------
    // SQL���쐬(��{���쐬)
    //---------------------------------------------------------------------
    // �擾�e�[�u��
    // $froms[] = "RecvOrder_Tbl Re";
    // $froms[] = "WebProfile_Tbl We";
    // $froms[] = "Credit_Tbl Cr";
    // $froms[] = "Net_Ij_Tbl Ij";
    // $froms[] = "GiftOrder_Tbl Gi";
    // $froms[] = "Attention_Tbl At";
    // $froms[] = "Attention_Tbl At2";
    // //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)
    // $froms[] = "Attention_Tbl At3";
    // //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)

    // // �擾�J����
    // // RecvOrder_Tbl
    // $cols[] = "Re.KAINNO";
    // $cols[] = "Re.TEL_NO";
    // $cols[] = "Re.PAYMENT_TYPE";
    // $cols[] = "Re.PAYMENT_NUM";
	// //��2015/04/30 R-#13917_WAO���̃C���^�[�l�b�g������\�̎x�����񐔗��̕\���ƁAWEB�Ǘ��c�[���̎x�����񐔂̕\���ɈႢ������(nis higashi)
	// $cols[] = "Re.BONUS_KBN";
	// //��2015/04/30 R-#13917_WAO���̃C���^�[�l�b�g������\�̎x�����񐔗��̕\���ƁAWEB�Ǘ��c�[���̎x�����񐔂̕\���ɈႢ������(nis higashi)
    // $cols[] = "Re.CC_NO";
    // $cols[] = "Re.CC_NAME";
    // $cols[] = "Re.CC_TERM";
    // $cols[] = "Re.CC_REGIST_KBN";   //�J�[�h�o�^�敪
    // $cols[] = "Re.CC_NO";           //�J�[�h�ԍ�
    // $cols[] = "Re.SITE_KBN";
    // $cols[] = "Re.DELIVERY_REQUEST";
    // $cols[] = "TO_CHAR(Re.ORDER_DT, 'YYYY/MM/DD HH24:MI:SS') as ORDER_DT";
    // //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
    // $cols[] = "NVL(Re.TOTAL_ORDER_AMOUNT, 0) as ORDER_AMOUNT";
    // $cols[] = "NVL(Re.TOTAL_ORDER_TAXRATE, 0) as ORDER_TAXRATE";
    // //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
    // $where[] = "Re.RECV_ORDER_ID = ".getSqlValue($recv_order_id);

    // //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)
    // // ��������(���{��)
    // $cols[] = "At3.ATTENTION AS SHIP_CAUTION3";
    // $where[] = "TO_NUMBER(Re.SHIP_CAUTION_CD1) = TO_NUMBER(At3.ATTENTION_CD(+))";
    // //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)
    // // ��R-#43654 �yR02-0412-001�z�u�z�T�[�r�XEAZY�̓���_WEB 2021/1/18 hmc-nagatani
    // $cols[] = "Re.SHIP_CAUTION_CD1 AS SHIP_CAUTION3_CD";
    // // ��R-#43654 �yR02-0412-001�z�u�z�T�[�r�XEAZY�̓���_WEB 2021/1/18 hmc-nagatani

    // // Credit_Tbl
    // $cols[] = "Cr.COMPANYMEIFULL";
    // $where[] = "Re.CC_TYPE = Cr.COMPANY_CD(+)";
    // // WebProfile_Tbl
    // $cols[] = "We.NAMEKANJI";       //��������
    // $cols[] = "We.NAMEKANA";        //���Ȏ���
    // $cols[] = "We.NAMEOFERA";       //�N��
    // $cols[] = "We.BIRTHDAY";        //���N����
    // $cols[] = "We.H_KNJ_ADDRESS";   //�����Z��
    // $cols[] = "We.H_NOT_CONV";      //��ϊ���
    // $where[] = "Re.kainno = We.kainno";

    // // ���z�v�Z
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

    // //�����
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
    // // ��2015/8/11 R-#18675_������Q�T�C�g�@���蕨�����Ή� (nul yamashita)
    // $cols[] = "Gi.RECV_KBN";
    // // ��2015/8/11 R-#18675_������Q�T�C�g�@���蕨�����Ή� (nul yamashita)
    
    // $where[] = "Re.RECV_ORDER_ID = Gi.RECV_ORDER_ID";

    // // Attention_Tbl
    // // ��������(���)
    // $cols[] = "At.ATTENTION AS SHIP_CAUTION1";
    // $where[] = "TO_NUMBER(Gi.SHIP_CAUTION_CD1) = TO_NUMBER(At.ATTENTION_CD(+))";
    // // ��������(���{��)
    // $cols[] = "At2.ATTENTION AS SHIP_CAUTION2";
    // $where[] = "TO_NUMBER(Gi.SHIP_CAUTION_CD2) = TO_NUMBER(At2.ATTENTION_CD(+))";

    // // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)
    
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
    
    // // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)

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
    // SQL�����s����
    $result = dbQuery($con_utl, $sql);
    // �f�[�^�J�E���g���擾����
    //$rows = getNumRows($result, $arr_utl);
    $rows = getNumRows($result);
    //�f�[�^�擾
    //$row = dbFetchRow($result, 0, $arr_utl);
    $row = dbFetchRow($result);

    //---------------------------------------------------------------------
    // SQL���쐬(�w�����i���擾)
    //---------------------------------------------------------------------
    // �擾�e�[�u��
    // $froms_prd[] = "SqlShohin_Tbl Sh";
    // $froms_prd[] = "RecvProduct_Tbl Pr";
    // //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
    // $froms_prd[] = "SHOHINPC_TBL Spc";
    // //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)

    // // �擾�J����
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
    // //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
    // $cols_prd[] = "Spc.SHOHIN_KIND";
    // $where_prd[] = "Sh.SHOHIN_CD = Spc.SHOHIN_CD(+)";
    // $where_prd[] = "Sh.SHOHIN_LEVEL = Spc.SHOHIN_LEVEL(+)";
    //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)

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

    // SQL�����s����
    $result_prd = dbQuery($con_utl, $sql_prd);
    // �f�[�^�J�E���g���擾����
    //$rows_prd = getNumRows($result_prd, $arr_utl);
    $rows_prd = getNumRows($result_prd);
    //---------------------------------------------------------------------
    // ��\�\���f�[�^�쐬(��{���쐬)
    //---------------------------------------------------------------------
    $sum_tax = 0;
    $sum_amount = 0;
    $tmp = array();
    //�������
    $tmp['kainno']   = getHtmlEscapedString($row['KAINNO']);
    //������t����
    $tmp['order_dt'] = getHtmlEscapedString($row['ORDER_DT']);
    //�����(����)
    //$tmp['namekanji']= getHtmlEscapedString(ssk_decrypt($row['NAMEKANJI']));
    $tmp['namekanji']= getHtmlEscapedString($row['NAMEKANJI']);
    //�N��
    $nameofera = "";
    if (array_key_exists(intval($row['NAMEOFERA']), $name_of_era)) {
      $nameofera = $name_of_era[intval($row['NAMEOFERA'])];
    }
    $tmp['nameofera'] = $nameofera;
    //���N����
    //$birthday = getHtmlEscapedString(ssk_decrypt($row['BIRTHDAY']));
    $birthday = getHtmlEscapedString($row['BIRTHDAY']);
    $tmp['birthday']     = substr($birthday,0,2).'.'.substr($birthday,2,2).'.'.substr($birthday,4,2);
    //�Z��
    //$tmp['address']     = getHtmlEscapedString(ssk_decrypt($row['H_KNJ_ADDRESS']));
    $tmp['address']     = getHtmlEscapedString($row['H_KNJ_ADDRESS']);
    //��ϊ����Z��
    //$tmp['address_not']     = getHtmlEscapedString(ssk_decrypt($row['H_NOT_CONV']));
    $tmp['address_not']     = getHtmlEscapedString($row['H_NOT_CONV']);
    //�����
    //$tmp['name']     = getHtmlEscapedString(ssk_decrypt($row['NAMEKANA']));
    $tmp['name']     = getHtmlEscapedString($row['NAMEKANA']);
    //�d�b�ԍ�
    //$tmp['tel']      = getHtmlEscapedString(ssk_decrypt($row['TEL_NO']));
    $tmp['tel']      = getHtmlEscapedString($row['TEL_NO']);
    //���
    $tmp['ukeku']   = (intval($row['SITE_KBN']) === 1) ? '�C���^�[�l�b�g' : '���o�C��';
    //�x�������@
    $shiharai = "";
    if (array_key_exists(intval($row['PAYMENT_TYPE']), $payment_type)) {
      $shiharai = $payment_type[intval($row['PAYMENT_TYPE'])];
    }
    $tmp['pay'] = $shiharai;
    //�x����
    $tmp['paynum'] =$row['PAYMENT_NUM'];

	//��2015/04/30 R-#13917_WAO���̃C���^�[�l�b�g������\�̎x�����񐔗��̕\���ƁAWEB�Ǘ��c�[���̎x�����񐔂̕\���ɈႢ������(nis higashi)
	// if (intval($row['BONUS_KBN']) === 1) {
	// 	$tmp['paynum'] = "�{�[�i�X�ꊇ";
	// } else if (intval($row['BONUS_KBN']) === 9) {
	// 	$tmp['paynum'] = "���{����";
	// }
	//��2015/04/30 R-#13917_WAO���̃C���^�[�l�b�g������\�̎x�����񐔗��̕\���ƁAWEB�Ǘ��c�[���̎x�����񐔂̕\���ɈႢ������(nis higashi)

    
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
    // $cc_no = strlen(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])));
    // if ($cc_no != 0){
    //     $conv_cc_no = str_repeat("*",$cc_no - 4).$conv_cc_no.substr(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])), -4);
    // }
    $cc_no = strlen(getHtmlEscapedString($row['CC_NO']));
    if ($cc_no != 0){
        $conv_cc_no = str_repeat("*",$cc_no - 4).$conv_cc_no.substr(getHtmlEscapedString($row['CC_NO']), -4);
    }
    $tmp['cc_no'] = $conv_cc_no;
    //�L������
    $tmp['cc_term'] = $row['CC_TERM'];
    //�ۗ��敪
    $tmp['ijriyu']=$row['NET_IJ_INFO'];
    //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
    //���i�w�����
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

    //---------------------------------------------------------------------
    // ��\�\���f�[�^�쐬(�w�����i���)
    //---------------------------------------------------------------------
    // ���i
    $counter_d = 0;
    $prd       = array_fill(0, 10, '');
    $prdct     = array_fill(0, 10, '');
    // �v���[���g�i�A�{���i(���蕨)
    $counter_s = 0;
    $prs       = array_fill(0, 10, '');
    $prsct     = array_fill(0, 10, '');
    // �v���[���g�i�A�{���i(�����p)
    $prs_own   = "";
    for ($i = 0; $i < $rows_prd; $i++) {
        //�f�[�^�擾
        $row_prd = dbFetchRow($result_prd, $i, $arr_utl);

        //���i�w�����
        $shohin_cd = round($row_prd['SHOHIN_CD']);
        $amount = $row_prd['AMOUNT'];
        //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
        $shohin_kind = $row_prd['SHOHIN_KIND'];
        //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)

        if ($shohin_cd != '0000') {
        	//��2017/11/10 R-#32296_�yH29-00376-01�z�{���򓒃��O�C������(nul-oomori)
            //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
            if ($shohin_kind == '1') {
            //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
                //���i�E����پ�Ă̏ꍇ
                if($row_prd['SHOHIN_LEVEL']){
                    $prd[$counter_d] = '('.$row_prd['SHOHIN_CD'].')'.' '.$row_prd['NAME10']."(".$row_prd['SHOHIN_LEVEL'].")";
                }else{
                    $prd[$counter_d] = '('.$row_prd['SHOHIN_CD'].')'.' '.$row_prd['NAME10'];
                }
                $prdct[$counter_d] = round($amount);
                $counter_p += $amount;
                $counter_d++;
            //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
            } else {
            //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
                //��ھ��ĕi�̏ꍇ
                if ($shohin_cd != '0710' && $shohin_cd != '0701') {
                    // �����֑���{���i�͕ʂɑޔ�(��Ły�����l�ւ��͂��z�̗��Ɏ{���i��\�������邽��)
                    if($row_prd['SHOHIN_TYPE'] == '1'){
                        $prs_own .= $row_prd['NAMEFULL'] .'[' .round($amount) .'��]�A';
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
            //��2017/11/10 R-#32296_�yH29-00376-01�z�{���򓒃��O�C������(nul-oomori)
        }
    }

    // ���i�̌����A�\���ł��鏤�i���𒴂��Ă���ꍇ�͍Ō�̗�ɕ\���ł��Ă��Ȃ��|��\��
    if($counter_d > $PRODUCT_DISP_NUM){
        $prd[$PRODUCT_DISP_NUM - 1] = $PRODUCT_DISP_NUM .'�_�I�[�o�[�ł��I';
        $prdct[$PRODUCT_DISP_NUM] = '';
    }
    if($counter_s > $PRESENT_DISP_NUM){
        $prs[$PRESENT_DISP_NUM - 1] = $PRESENT_DISP_NUM .'�_�I�[�o�[�ł��I';
        $prsct[$PRESENT_DISP_NUM] = '';
    }

    //�w���_��
    $tmp['num']     = $counter_p;
    //���z
    $tmp['kingaku'] = $sum_amount;
    //�����
    $tmp['tax']     = $sum_tax;
    //���v
    $tmp['goukei']  = $sum_amount + $sum_tax;

    //---------------------------------------------------------------------
    // �M�t�g���($gift_body�F��\�ɕ\���������e���W��)
    //---------------------------------------------------------------------
    $gift_body = array();
    // ���蕨���e
    $gift_body['gift_content_title'] = '�y���蕨���e�z�@���������Ӂu�菑�������Q�Ɓv���͗v';
    // ���
    $gift_body['ship_caution1'] = '������F�@' .$row['SHIP_CAUTION1'];
    // ���{��
    $gift_body['ship_caution2'] = '�����{���V�[���F�@' .$row['SHIP_CAUTION2'];
    // ��]����
    $delivery_date = '����]���F�@';
    if(is_null($row['DELIVERY_DT']) || $row['DELIVERY_DT'] == ''){
        $delivery_date .= '�w�肵�Ȃ��@�@�@�@�@�@';
    }else{
        $delivery_date .= date('m��d��',strtotime($row['DELIVERY_DT'])) .'�@�@�@�@�@�@';
    }
    $gift_body['delivery_dt'] = $delivery_date;
    // ��]���ԑ�
    $time_zone = '����]���ԁF�@';
    if (array_key_exists(intval($row['DELIVERY_TIME_TYPE']), $time_zone_type)) {
        $time_zone .= $time_zone_type[intval($row['DELIVERY_TIME_TYPE'])];
    }
    $gift_body['time_zone'] = $time_zone .'<br>';
    // �h���z���������N���g�p��
    $recipient = '��������ɂȂ���F�@';
    //��R-#19979_������Q�M�t�g���̂��󂯎��l�ɂ��Ẵq�A�����O�Ή� 2015/11/10 nis-higashi
    //��2017/11/10 R-#32296_�yH29-00376-01�z�{���򓒃��O�C������(nul-oomori)
    //������Q�̑��蕨�ŁA���󂯎��ɂȂ���ɂ��ĕ\���p
    $dw_used_kbn_chohaku = array(
        '11' => '��������]����',
        '12' => '��]���Ȃ�'
    );
    //��2017/11/10 R-#32296_�yH29-00376-01�z�{���򓒃��O�C������(nul-oomori)
    
    // ���ϕi
    if ($row['RECV_KBN'] != 2) {
	    if (array_key_exists(intval($row['DW_USED_KBN']), $dw_used_kbn)) {
            $recipient .= $dw_used_kbn[intval($row['DW_USED_KBN'])];
	    }
	// �����i������Q�j
    } else {
	    $recipient = '';
    	if  (array_key_exists(intval($row['DW_USED_KBN']), $dw_used_kbn_chohaku)) {
        	if ($row['DW_USED_KBN'] == 11 || $row['DW_USED_KBN'] == 12) {
        		//��2017/11/10 R-#32296_�yH29-00376-01�z�{���򓒃��O�C������(nul-oomori)
        		$recipient = '���J�^���O�����ɂ��āF�@';
        		//��2017/11/10 R-#32296_�yH29-00376-01�z�{���򓒃��O�C������(nul-oomori)
            	$recipient .= $dw_used_kbn_chohaku[intval($row['DW_USED_KBN'])];
            }
        }
    }
    //��R-#19979_������Q�M�t�g���̂��󂯎��l�ɂ��Ẵq�A�����O�Ή� 2015/11/10 nis-higashi
    $gift_body['recipient'] = $recipient;
    //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)
    // �s�ݎ��̑Ή�
    // �����֑���ꍇ�̂ݕ\��
    $ship_caution = "";
    // ��R-#43654 �yR02-0412-001�z�u�z�T�[�r�XEAZY�̓���_WEB 2021/1/18 hmc-nagatani
    if ($row['DELIVERY_KBN'] == '0') {
        if(is_null($row['SHIP_CAUTION3_CD']) ||
            $row['SHIP_CAUTION3_CD'] == '' ||
            $row['SHIP_CAUTION3_CD'] == '010010' ||
            $row['SHIP_CAUTION3_CD'] == '010040'
            ){
            if(is_null($row['SHIP_CAUTION3']) || $row['SHIP_CAUTION3'] == ''){
                $ship_caution = '���s�ݎ��̑Ή��F�@�w�肵�Ȃ�';
            } else {
                $ship_caution = '���s�ݎ��̑Ή��F�@' .$row['SHIP_CAUTION3'];
            }
        }else{
            if($row['SHIP_CAUTION3_CD'] == '070000'){
                $ship_caution = '';
            } else {
                $ship_caution = '���u���z�w��F�@' .$row['SHIP_CAUTION3'];
            }
        }
    }
    // ��R-#43654 �yR02-0412-001�z�u�z�T�[�r�XEAZY�̓���_WEB 2021/1/18 hmc-nagatani
    $gift_body['ship_caution'] = $ship_caution;
    //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)
    // ���i���t��
    // �����֑���ꍇ�ƁA�����Z�����w�肷��ꍇ�ŕ\��������ύX
    // �����̖{�Z�̏ꍇ
    $delivery_info = "";
    if($row['DELIVERY_KBN'] == '0'){
        $delivery_info .= '�����͂���F�@�����l�̓o�^�Z��';
    // ���͂���w��̏ꍇ
    }elseif($row['DELIVERY_KBN'] == '2'){
        // �����l��(�J�i)
        //$namekanji = getHtmlEscapedString(ssk_decrypt($row['NAME_KANJI']));
        //$namekana = getHtmlEscapedString(ssk_decrypt($row['NAME_KANA']));
        $namekanji = getHtmlEscapedString($row['NAME_KANJI']);
        $namekana = getHtmlEscapedString($row['NAME_KANA']);
        $delivery_info .= '�������l���F�@<font style="font-size:21pt;">' .$namekanji .'</font>�i' .$namekana .'�j' .'�l�@�@�i���q�l�ԍ��F�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�E�@�Ȃ��@�j<br>';
        // �����l(�Z������)
        // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)
        $add_address  = '�����͂���F�@<font style="font-size:17pt;">��'.$row['ANOTHER_POST_NO'] .'�@';
        // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)
        //$add_address .= getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR']));
        //$add_address .= getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR_NOT_CONV']));
        $add_address .= getHtmlEscapedString($row['ANOTHER_ADDR']);
        $add_address .= getHtmlEscapedString($row['ANOTHER_ADDR_NOT_CONV']);
        // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)
        $add_address .= '</font>';
        $delivery_info   .= $add_address .'<br>';
        // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)
        // �d�b�ԍ�
        // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)
        //$delivery_info .= '���d�b�ԍ��F�@<font style="font-size:17pt;">' .getHtmlEscapedString(ssk_decrypt($row['ADD_ANOTHER_TELNO'])) .'</font><br>';
        $delivery_info .= '���d�b�ԍ��F�@<font style="font-size:17pt;">' .getHtmlEscapedString($row['ADD_ANOTHER_TELNO']) .'</font><br>';
        // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)
        // ����喼
        // $sender_name = getHtmlEscapedString(ssk_decrypt($row['GIFT_SENDER_NAME']));
        // $delivery_info .= '������喼�F�@<font style="font-size:21pt;">' .$sender_name .'</font>�l<br>';
    }
    $gift_body['delivery_info'] = $delivery_info;
    // ���蕨�v�]
    // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)
    $gift_body['delivery_request'] = '�����蕨�v�]�F�@' .getHtmlEscapedString($row['DELIVERY_REQUEST']) ;
    // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)
    // ���b�Z�[�W�J�[�h�v�^�s�v
    $gift_message = '�����b�Z�[�W�J�[�h�F�@';
    if (array_key_exists(intval($row['MSG_NEED_FLG']), $msg_need)) {
        $gift_message .= $msg_need[intval($row['MSG_NEED_FLG'])] .'<br>';
    }
    // ���b�Z�[�W�J�[�h���e
    //��R-#36405_�yH31-0112-005�z190412���J_2019�N�M�t�g��̓�WEB�Ή�_���� 2019/04/08 nul-nagata
    //if(intval($row['MSG_NEED_FLG']) == '1'){
    if(intval($row['MSG_NEED_FLG']) != '0' && intval($row['MSG_NEED_FLG']) != '8' ){
    //��R-#36405_�yH31-0112-005�z190412���J_2019�N�M�t�g��̓�WEB�Ή�_���� 2019/04/08 nul-nagata
    //��R-#20279_���蕨�J�[�h�̃��b�Z�[�W�̉��s�Ή� 2015/11/17 nul-yamashita
        $messageText = str_replace("\r", "", getHtmlEscapedString($row['MSG_TEXT']));
        if (substr_count($messageText, "\n") <= 6) {
            $messageText = nl2br($messageText);
        }
        // ���b�Z�[�W�J�[�h(����)
        $gift_message .= getHtmlEscapedString(ssk_decrypt($row['MSG_TO_NAME'])) .'��<br>';
        // ���b�Z�[�W�J�[�h(�{��)
        $gift_message .= $messageText .'<br>';
        // ���b�Z�[�W�J�[�h(���o�l��)
        $gift_message .= getHtmlEscapedString(ssk_decrypt($row['MSG_FROM_NAME'])) .'���';
    //��R-#20279_���蕨�J�[�h�̃��b�Z�[�W�̉��s�Ή� 2015/11/17 nul-yamashita
    }
    $gift_body['gift_message'] = $gift_message;
    // �����l���
    $gift_body['sender_delivery_title'] = '�y�����l�ւ��͂��z';
    // �����l�ւ��͂��́u�{���i�v�\����
    $own_present = "���{���i�F�@";
    if($prs_own !== ''){
        $own_present .= '�y2����͗v�z'.rtrim($prs_own, "�A");
    }else{
        $own_present .= '�Ȃ�';
    }
    $gift_body['own_present'] = $own_present;
    // �����l�ւ��͂��́u���̑��v�\����
    $sender_other_info = '�����̑��F�@���׏�';
    if(intval($row['PAYMENT_TYPE']) == '1'){
        $sender_other_info .= '�A�U���ݗp��';
    }
    $gift_body['sender_other_info'] = $sender_other_info;
    // �����`��
    $delivery_form = '�������`�ԁF�@';
    if (array_key_exists(intval($row['DELIVERY_KBN']), $delivery_kbn)) {
        $delivery_form .= $delivery_kbn[intval($row['DELIVERY_KBN'])];
    }
    $gift_body['delivery_form'] = $delivery_form;

    // ��2015/8/11 R-#18675_������Q�T�C�g�@���蕨�����Ή� (nul yamashita)
    // ���ϕior����
    $gift_body['recv_kbn'] = $row['RECV_KBN'];
    // ��2015/8/11 R-#18675_������Q�T�C�g�@���蕨�����Ή� (nul yamashita)
    
    
    // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)
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
    
    $gift_body['doufu']=$enclosure;
    // ��2021/01/28 R-#41279_�yR02-0179-001�z�M�t�g�������̓������A�g (jst-louvre)
    
    //�X�e�[�g�����g�̊J��
    dbFreeResult($result);

    //DB close
    dbClose($con_utl);
    
    //�z��֊i�[
    $order_data = array();
    $order_data = $tmp;

    //���蕨����z��֊i�[
    $gift_data = array();
    $gift_data = $gift_body;
}
?>
