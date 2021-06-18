<?
{
    //DB�ڑ�
    $con_utl = dbConnect();

    //---------------------------------------------------------------------
    // SQL���쐬(��{���쐬)
    //---------------------------------------------------------------------
    // �擾�e�[�u��
    $froms[] = "RecvOrder_Tbl Re";
    $froms[] = "WebProfile_Tbl We";
    $froms[] = "Credit_Tbl Cr";
    $froms[] = "Net_Ij_Tbl Ij";
    $froms[] = "GiftOrder_Tbl Gi";
    $froms[] = "Attention_Tbl At";
    $froms[] = "Attention_Tbl At2";
    //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)
    $froms[] = "Attention_Tbl At3";
    //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)

    // �擾�J����
    // RecvOrder_Tbl
    $cols[] = "Re.KAINNO";
    $cols[] = "Re.TEL_NO";
    $cols[] = "Re.PAYMENT_TYPE";
    $cols[] = "Re.PAYMENT_NUM";
	//��2015/04/30 R-#13917_WAO���̃C���^�[�l�b�g������\�̎x�����񐔗��̕\���ƁAWEB�Ǘ��c�[���̎x�����񐔂̕\���ɈႢ������(nis higashi)
	$cols[] = "Re.BONUS_KBN";
	//��2015/04/30 R-#13917_WAO���̃C���^�[�l�b�g������\�̎x�����񐔗��̕\���ƁAWEB�Ǘ��c�[���̎x�����񐔂̕\���ɈႢ������(nis higashi)
    $cols[] = "Re.CC_NO";
    $cols[] = "Re.CC_NAME";
    $cols[] = "Re.CC_TERM";
    $cols[] = "Re.CC_REGIST_KBN";   //�J�[�h�o�^�敪
    $cols[] = "Re.CC_NO";           //�J�[�h�ԍ�
    $cols[] = "Re.SITE_KBN";
    $cols[] = "Re.DELIVERY_REQUEST";
    $cols[] = "TO_CHAR(Re.ORDER_DT, 'YYYY/MM/DD HH24:MI:SS') as ORDER_DT";
    //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
    $cols[] = "NVL(Re.TOTAL_ORDER_AMOUNT, 0) as ORDER_AMOUNT";
    $cols[] = "NVL(Re.TOTAL_ORDER_TAXRATE, 0) as ORDER_TAXRATE";
    //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
    $where[] = "Re.RECV_ORDER_ID = ".getSqlValue($recv_order_id);

    //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)
    // ��������(���{��)
    $cols[] = "At3.ATTENTION AS SHIP_CAUTION3";
    $where[] = "TO_NUMBER(Re.SHIP_CAUTION_CD1) = TO_NUMBER(At3.ATTENTION_CD(+))";
    //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)

    // ��R-#43654 �yR02-0412-001�z�u�z�T�[�r�XEAZY�̓���_WEB 2021/1/18 hmc-nagatani
    $cols[] = "Re.SHIP_CAUTION_CD1 AS SHIP_CAUTION3_CD";
    // ��R-#43654 �yR02-0412-001�z�u�z�T�[�r�XEAZY�̓���_WEB 2021/1/18 hmc-nagatani
    
    // Credit_Tbl
    $cols[] = "Cr.COMPANYMEIFULL";
    $where[] = "Re.CC_TYPE = Cr.COMPANY_CD(+)";
    // WebProfile_Tbl
    $cols[] = "We.NAMEKANJI";       //��������
    $cols[] = "We.NAMEKANA";        //���Ȏ���
    $cols[] = "We.NAMEOFERA";       //�N��
    $cols[] = "We.BIRTHDAY";        //���N����
    $cols[] = "We.H_KNJ_ADDRESS";   //�����Z��
    $cols[] = "We.H_NOT_CONV";      //��ϊ���
    $where[] = "Re.kainno = We.kainno";

    // ���z�v�Z
    $tmpPrice_OrderId = 'Re.RECV_ORDER_ID';
    $tmpPrice_Sql = '';
    $tmpPrice_Sql .= " ( ";
    $tmpPrice_Sql .= " SELECT SUM( (s.TANKA * r.AMOUNT) ) AS WK_PRICE ";
    $tmpPrice_Sql .= " FROM RECVPRODUCT_TBL r ,SQLSHOHIN_TBL s , SYSTEM_TBL sy";
    $tmpPrice_Sql .= " WHERE sy.SITE_KBN='1' ";
    $tmpPrice_Sql .= " AND  r.SHOHIN_CD  = s.SHOHIN_CD ";
    $tmpPrice_Sql .= " AND ( ";
    $tmpPrice_Sql .= "     ( r.SHOHIN_LEVEL IS NULL     AND s.SHOHIN_LEVEL IS NULL ) ";
    $tmpPrice_Sql .= "  OR ( r.SHOHIN_LEVEL IS NOT NULL AND r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
    $tmpPrice_Sql .= " ) ";
    $tmpPrice_Sql .= " AND r.RECV_ORDER_ID = ".$tmpPrice_OrderId ;
    $tmpPrice_Sql .= " ) AS PRICE2, ";

    //�����
    $tmpPrice_Sql .= " ( ";
    $tmpPrice_Sql .= " SELECT sum( (s.TANKA * r.AMOUNT) * (sy.TAX_RATE) ) AS WK_PRICE ";
    $tmpPrice_Sql .= " FROM RECVPRODUCT_TBL r ,SQLSHOHIN_TBL s , SYSTEM_TBL sy";
    $tmpPrice_Sql .= " WHERE sy.SITE_KBN='1' ";
    $tmpPrice_Sql .= " AND  r.SHOHIN_CD  = s.SHOHIN_CD ";
    $tmpPrice_Sql .= " AND ( ";
    $tmpPrice_Sql .= "     ( r.SHOHIN_LEVEL IS NULL     and s.SHOHIN_LEVEL IS NULL ) ";
    $tmpPrice_Sql .= "  OR ( r.SHOHIN_LEVEL IS NOT NULL and r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
    $tmpPrice_Sql .= " ) ";
    $tmpPrice_Sql .= " AND r.RECV_ORDER_ID = ".$tmpPrice_OrderId ;
    $tmpPrice_Sql .= " ) AS TAX ";
    $cols[] = $tmpPrice_Sql;

    // NET_IJ_Tbl
    $cols[] = "Ij.NET_IJ_INFO";
    $where[] = "Re.NET_IJ_CD = Ij.NET_IJ_CD(+)";

    // GiftOrder_Tbl
    $cols[] = "Gi.SHIP_CAUTION_CD1";
    $cols[] = "Gi.SHIP_CAUTION_CD2";
    $cols[] = "Gi.MSG_NEED_FLG";
    $cols[] = "Gi.MSG_TO_NAME";
    $cols[] = "Gi.MSG_TEXT";
    $cols[] = "Gi.MSG_FROM_NAME";
    $cols[] = "Gi.DELIVERY_KBN";
    $cols[] = "Gi.DELIVERY_DT";
    $cols[] = "Gi.DELIVERY_TIME_TYPE";
    $cols[] = "Gi.NAME_KANJI";
    $cols[] = "Gi.NAME_KANA";
    $cols[] = "Gi.ANOTHER_POST_NO";
    $cols[] = "Gi.ANOTHER_ADDR_KANA";
    $cols[] = "Gi.ANOTHER_ADDR AS";
    $cols[] = "Gi.ANOTHER_ADDR_NOT_CONV_KANA";
    $cols[] = "Gi.ANOTHER_ADDR_NOT_CONV";
    $cols[] = "Gi.ANOTHER_TELNO AS ADD_ANOTHER_TELNO";
    $cols[] = "Gi.GIFT_SENDER_NAME";
    $cols[] = "Gi.DW_USED_KBN";
    $cols[] = "Gi.REGIST_AGREEMENT_FLG";
    $cols[] = "Gi.SESSION_ID";
    // ��2015/8/11 R-#18675_������Q�T�C�g�@���蕨�����Ή� (nul yamashita)
    $cols[] = "Gi.RECV_KBN";
    // ��2015/8/11 R-#18675_������Q�T�C�g�@���蕨�����Ή� (nul yamashita)
    
    $where[] = "Re.RECV_ORDER_ID = Gi.RECV_ORDER_ID";

    // Attention_Tbl
    // ��������(���)
    $cols[] = "At.ATTENTION AS SHIP_CAUTION1";
    $where[] = "TO_NUMBER(Gi.SHIP_CAUTION_CD1) = TO_NUMBER(At.ATTENTION_CD(+))";
    // ��������(���{��)
    $cols[] = "At2.ATTENTION AS SHIP_CAUTION2";
    $where[] = "TO_NUMBER(Gi.SHIP_CAUTION_CD2) = TO_NUMBER(At2.ATTENTION_CD(+))";

    $sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where);

    // SQL�����s����
    $result = dbQuery($con_utl, $sql);
    // �f�[�^�J�E���g���擾����
    $rows = getNumRows($result, $arr_utl);
    //�f�[�^�擾
    $row = dbFetchRow($result, 0, $arr_utl);

    //---------------------------------------------------------------------
    // SQL���쐬(�w�����i���擾)
    //---------------------------------------------------------------------
    // �擾�e�[�u��
    $froms_prd[] = "SqlShohin_Tbl Sh";
    $froms_prd[] = "RecvProduct_Tbl Pr";
    //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
    $froms_prd[] = "SHOHINPC_TBL Spc";
    //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)

    // �擾�J����
    // RecvProduct_Tbl
    $cols_prd[] = "Pr.SHOHIN_CD";
    $cols_prd[] = "Pr.AMOUNT";
    $cols_prd[] = "Pr.PRICE";
    $cols_prd[] = "Pr.SHOHIN_TYPE";
    $where_prd[] = "Pr.RECV_ORDER_ID = ".getSqlValue($recv_order_id);

    // SqlShohin_Tbl
    $cols_prd[] = "Sh.NAME10";
    $cols_prd[] = "Sh.NAMEFULL";
    $cols_prd[] = "Sh.SHOHIN_LEVEL";
    $where_prd[] = "Pr.SHOHIN_CD = Sh.SHOHIN_CD(+)";
    $where_prd[] = "((Pr.SHOHIN_LEVEL IS NOT NULL AND Pr.SHOHIN_LEVEL = Sh.SHOHIN_LEVEL) OR (Pr.SHOHIN_LEVEL IS NULL AND  Sh.SHOHIN_LEVEL IS NULL)) ";

    // ShohinPC_Tbl
    //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)
    $cols_prd[] = "Spc.SHOHIN_KIND";
    $where_prd[] = "Sh.SHOHIN_CD = Spc.SHOHIN_CD(+)";
    $where_prd[] = "Sh.SHOHIN_LEVEL = Spc.SHOHIN_LEVEL(+)";
    //��2017/12/12 R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A��(nul fukunaga)

    $sql_prd = "SELECT ".implode(', ', $cols_prd)." FROM ".implode(', ', $froms_prd)." WHERE ".implode(' AND ', $where_prd) .'ORDER BY Sh.SHOHIN_CD ASC';

    // SQL�����s����
    $result_prd = dbQuery($con_utl, $sql_prd);
    // �f�[�^�J�E���g���擾����
    $rows_prd = getNumRows($result_prd, $arr_utl);

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
    $tmp['namekanji']= getHtmlEscapedString(ssk_decrypt($row['NAMEKANJI']));
    //�N��
    $nameofera = "";
    if (array_key_exists(intval($row['NAMEOFERA']), $name_of_era)) {
      $nameofera = $name_of_era[intval($row['NAMEOFERA'])];
    }
    $tmp['nameofera'] = $nameofera;
    //���N����
    $birthday = getHtmlEscapedString(ssk_decrypt($row['BIRTHDAY']));
    $tmp['birthday']     = substr($birthday,0,2).'.'.substr($birthday,2,2).'.'.substr($birthday,4,2);
    //�Z��
    $tmp['address']     = getHtmlEscapedString(ssk_decrypt($row['H_KNJ_ADDRESS']));
    //��ϊ����Z��
    $tmp['address_not']     = getHtmlEscapedString(ssk_decrypt($row['H_NOT_CONV']));
    //�����
    $tmp['name']     = getHtmlEscapedString(ssk_decrypt($row['NAMEKANA']));
    //�d�b�ԍ�
    $tmp['tel']      = getHtmlEscapedString(ssk_decrypt($row['TEL_NO']));
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
	if (intval($row['BONUS_KBN']) === 1) {
		$tmp['paynum'] = "�{�[�i�X�ꊇ";
	} else if (intval($row['BONUS_KBN']) === 9) {
		$tmp['paynum'] = "���{����";
	}
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
    $cc_no = strlen(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])));
    if ($cc_no != 0){
        $conv_cc_no = str_repeat("*",$cc_no - 4).$conv_cc_no.substr(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])), -4);
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
            	$recipient .= $dw_used_kbn_chohaku[intval($row['DW_USED_KBN'])];
            	//��2017/11/10 R-#32296_�yH29-00376-01�z�{���򓒃��O�C������(nul-oomori)
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
        $namekanji = getHtmlEscapedString(ssk_decrypt($row['NAME_KANJI']));
        $namekana = getHtmlEscapedString(ssk_decrypt($row['NAME_KANA']));
        $delivery_info .= '�������l���F�@<font style="font-size:21pt;">' .$namekanji .'</font>�i' .$namekana .'�j' .'�l�@�@�i���q�l�ԍ��F�@�@�@�@�@�@�@�@�@�@�@�@�@�@�@�E�@�Ȃ��@�j<br>';
        // �����l(�Z������)
        $add_address  = "�����͂���F�@��".$row['ANOTHER_POST_NO'] .'�@';
        $add_address .= getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR']));
        $add_address .= getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR_NOT_CONV']));
        // �����l(�Z���J�i)
        $add_address .= "�i";
        $add_address .= getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR_KANA']));
        $add_address .= getHtmlEscapedString(ssk_decrypt($row['ANOTHER_ADDR_NOT_CONV_KANA']));
        $delivery_info   .= $add_address .'�j<br>';
        // �d�b�ԍ�
        $delivery_info .= '���d�b�ԍ��F�@' .getHtmlEscapedString(ssk_decrypt($row['ADD_ANOTHER_TELNO'])) .'<br>';
        // ����喼
        $sender_name = getHtmlEscapedString(ssk_decrypt($row['GIFT_SENDER_NAME']));
        $delivery_info .= '������喼�F�@<font style="font-size:21pt;">' .$sender_name .'</font>�l<br>';
    }
    $gift_body['delivery_info'] = $delivery_info;
    // ���蕨�v�]
    $gift_body['delivery_request'] = '�����蕨�v�]�F�@' .getHtmlEscapedString($row['DELIVERY_REQUEST']) .'<br><br>';
    // ���b�Z�[�W�J�[�h�v�^�s�v
    $gift_message = '�����b�Z�[�W�J�[�h�F�@';
    if (array_key_exists(intval($row['MSG_NEED_FLG']), $msg_need)) {
        $gift_message .= $msg_need[intval($row['MSG_NEED_FLG'])] .'<br>';
    }
    // ���b�Z�[�W�J�[�h���e
    //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)
    //if(intval($row['MSG_NEED_FLG']) == '1'){
    if(intval($row['MSG_NEED_FLG']) != '0'){
    //��2012/07/17 R-#4650 ���蕨���b�Z�[�W�J�[�h�ƕs�ݎ��̑I��ǉ�(ulsystems hatano)
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
