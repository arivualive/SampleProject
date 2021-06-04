<?
{
//	ini_set('error_reporting',E_ALL);

	//DB�ڑ�
	$con_utl = dbConnect();
	// SQL���쐬
	$froms[] = "RegularOrder_Tbl Re";
	$cols[] = "Re.SITE_KBN";
	$cols[] = "Re.kainno";
	$cols[] = "Re.tel_no";
	$cols[] = "Re.payment_type";
	$cols[] = "Re.payment_num";
	$cols[] = "Re.cc_no";
	$cols[] = "Re.cc_name";
	$cols[] = "Re.cc_term";
    //2010/10/07 kdl-hatano ���ڒǉ� ADD Start
    $cols[] = "Re.cc_regist_kbn";       //�J�[�h�o�^�敪
    $cols[] = "Re.CC_NO";               //�J�[�h�ԍ�
    //2010/10/07 kdl-hatano ���ڒǉ� ADD End
	$cols[] = "Re.delivery_time_type";
	$cols[] = "Re.delivery_request";
	
	// ��HTML���Ή� 2009/10/21 MugikoTsuda
	$cols[] = "to_char(Re.delivery_dt, 'YYYY/MM/DD') as delivery_dt";
	$cols[] = "to_char(Re.order_dt, 'YYYY/MM/DD HH24:MI:SS') as order_dt";
	// ��HTML���Ή� 2009/10/21 MugikoTsuda

	//��2011/10/28 R-#2062 ���ރh��(���)�����̎󒍕[�ɕʏZ���\������Ă��Ȃ��iUlsystems hatano�j
	$cols[] = "Re.another_addr_type";
	//��2011/10/28 R-#2062 ���ރh��(���)�����̎󒍕[�ɕʏZ���\������Ă��Ȃ��iUlsystems hatano�j

	//��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
	$cols[] = "NVL(Re.TOTAL_ORDER_AMOUNT, 0) as ORDER_AMOUNT";
	$cols[] = "NVL(Re.TOTAL_ORDER_TAXRATE, 0) as ORDER_TAXRATE";
	//��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)

	// ��2015/05/18 R-$17712_�߂���̌����̒���w���Ή�(nul hatano)
	$cols[] = "Re.NEXT_DELIVERY_DT";
	$cols[] = "Re.NEXT_DELIVERY_WEEK";
	$cols[] = "Re.NEXT_DELIVERY_DAY";
	// ��2015/05/18 R-$17712_�߂���̌����̒���w���Ή�(nul hatano)

	$where[] = "Re.regular_order_id = ".getSqlValue($regular_order_id);
	
	$froms[] = "Member_Tbl Me";
	$cols[] = "Me.email";
	$cols[] = "Me.m_email";
	$where[] = "Re.kainno = Me.kainno(+)";

	$froms[] = "WebProfile_Tbl We";
    //2010/10/07 EC-One hatano ���ڒǉ� ADD Start
    $cols[] = "We.namekanji";       //��������
    $cols[] = "We.NAMEOFERA";       //�N��
    $cols[] = "We.birthday";        //���N����
    $cols[] = "We.H_KNJ_ADDRESS";   //�����Z��
    $cols[] = "We.H_NOT_CONV";      //��ϊ���
    //2010/10/07 EC-One hatano ���ڒǉ� ADD End
	$cols[] = "We.namekana";
	$cols[] = "We.b_post_no";
	$cols[] = "We.b_knj_address";
	$cols[] = "We.b_tel_no";
	$where[] = "Me.kainno = We.kainno(+)";

	$froms[] = "Credit_Tbl Cr";
	$cols[] = "Cr.companymeifull";
	$where[] = "Re.cc_type = Cr.company_cd(+)";

	$froms[] = "RegularProduct_Tbl Pr";
	$cols[] = "Pr.shohin_cd";
	$cols[] = "Pr.amount";
	$cols[] = "Pr.price";

    //��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul kawanishi�j
    $tmpPrice_OrderId = 'Re.regular_order_id';
    $tmpPrice_Sql = '';
    $tmpPrice_Sql .=        " ( ";
    //��2013/03/28 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
    $tmpPrice_Sql .=        " select sum( s.TANKA * r.amount ) as wk_price ";
    //��2013/03/28 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
    $tmpPrice_Sql .=        " from RegularProduct_Tbl r ,sqlshohin_tbl s ";
    $tmpPrice_Sql .=        " where ";
    $tmpPrice_Sql .=        " r.SHOHIN_CD  = s.SHOHIN_CD ";
    $tmpPrice_Sql .=        " and ( ";
    $tmpPrice_Sql .=        "     ( r.SHOHIN_LEVEL is null     and s.SHOHIN_LEVEL is null ) ";
    $tmpPrice_Sql .=        "  or ( r.SHOHIN_LEVEL is not null and r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
    $tmpPrice_Sql .=        " ) ";
    $tmpPrice_Sql .=        " and r.regular_order_id = ".$tmpPrice_OrderId ;
    $tmpPrice_Sql .=        " ) as price2, ";

    //�����
    $tmpPrice_Sql .=        " ( ";
    $tmpPrice_Sql .=        " select sum( (s.TANKA * r.amount) * (sy.TAX_RATE) ) as wk_price ";
    $tmpPrice_Sql .=        " from RegularProduct_Tbl r ,sqlshohin_tbl s , system_tbl sy";
    $tmpPrice_Sql .=        " where sy.SITE_KBN='1' ";
    $tmpPrice_Sql .=        " and  r.SHOHIN_CD  = s.SHOHIN_CD ";
    $tmpPrice_Sql .=        " and ( ";
    $tmpPrice_Sql .=        "     ( r.SHOHIN_LEVEL is null     and s.SHOHIN_LEVEL is null ) ";
    $tmpPrice_Sql .=        "  or ( r.SHOHIN_LEVEL is not null and r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
    $tmpPrice_Sql .=        " ) ";
    $tmpPrice_Sql .=        " and r.regular_order_id = ".$tmpPrice_OrderId ;
    $tmpPrice_Sql .=        " ) as tax ";

    $cols[] = $tmpPrice_Sql;
    //��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul kawanishi�j

	$where[] = "Re.regular_order_id = Pr.regular_order_id";
	
	$froms[] = "SqlShohin_Tbl Sh";
	$cols[] = "Sh.name10";

    //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j
	$cols[] = "Sh.NAMEFULL";
    $cols[] = "Sh.SHOHIN_LEVEL";
    //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j


	$where[] = "Pr.shohin_cd = Sh.shohin_cd(+)";

	//��2011/10/24 #2025 ����DW����̃��x���Ή� (ec-one yamashita)
    //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iEC-One hatano�j
//    $where[] = "Sh.shohin_level = (SELECT MAX(SHOHIN_LEVEL) FROM SQLSHOHIN_TBL WHERE SHOHIN_CD = Pr.shohin_cd)";
    //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iEC-One hatano�j
    $where[] = "((Pr.shohin_level is not null and Pr.shohin_level = Sh.shohin_level) or (Pr.shohin_level is null and Sh.shohin_level is null)) ";
	//��2011/10/24 #2025 ����DW����̃��x���Ή� (ec-one yamashita)

	// ��HTML���Ή� 2009/10/21 MugikoTsuda
	$froms[] = "NET_IJ_Tbl Ij";
	$cols[] = "Ij.net_ij_info";
	$where[] = "Re.net_ij_cd = Ij.net_ij_cd(+)";
	// ��HTML���Ή� 2009/10/21 MugikoTsuda

    //��2011/08/23 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j
    //$sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)." ORDER BY Sh.shohin_idx";
    $sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)."ORDER BY Sh.shohin_cd";
    //��2011/08/23 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j
    //SQL�����s����
    $result = dbQuery($con_utl, $sql);

    //�f�[�^�J�E���g���擾����
    $rows = getNumRows($result, $arr_utl);
	$counter_p = 0;
	$counter_d = 0;
	$counter_s = 0;
	$sum_tax = 0;
	$sum_amount = 0;
	// Notice����������̂ŏC��
	//$prd = array_fill(0, 10, '');
	//$prdct = array_fill(0, 10, '');
	//$prs = array_fill(0, 10, '');
	//$prsct = array_fill(0, 10, '');
	$prd = array_fill(0, 12, '');
	$prdct = array_fill(0, 12, '');
	$prs = array_fill(0, 15, '');
	$prsct = array_fill(0, 15, '');

	for ($i = 0; $i < $rows; $i++) {
		$row = dbFetchRow($result, $i, $arr_utl);
		$tmp = array();

		$tmp['kainno']   = getHtmlEscapedString($row['KAINNO']);					//�������
		$tmp['order_dt'] = getHtmlEscapedString($row['ORDER_DT']);					//������t����
        ////2010/10/07 EC-One hatano ���ڒǉ� ADD Start
        //�����(����)
        $tmp['namekanji']= getHtmlEscapedString(ssk_decrypt($row['NAMEKANJI']));
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
        $tmp['address_not']     = getHtmlEscapedString(ssk_decrypt($row['H_NOT_CONV'])); //��ϊ����Z��
        ////2010/10/07 EC-One hatano ���ڒǉ� ADD End
		$tmp['name']     = getHtmlEscapedString(ssk_decrypt($row['NAMEKANA']));		//�����
		$tmp['tel']      = getHtmlEscapedString(ssk_decrypt($row['TEL_NO']));		//�d�b�ԍ�

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
			default : $shiharai = ""; break;
		}
		$tmp['pay'] = $shiharai;

		$tmp['paynum'] =$row['PAYMENT_NUM'];	//�x����
		
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
        $cc_no = strlen(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])));
        if ($cc_no != 0){
            $conv_cc_no = str_repeat("*",$cc_no - 4).$conv_cc_no.substr(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])), -4);
        }
        $tmp['cc_no'] = $conv_cc_no;
        //�L������
        $tmp['cc_term'] = $row['CC_TERM'];
        ////2010/10/07 kdl-hatano ���ڒǉ� ADD End

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

		//��2011/10/28 R-#2062 ���ރh��(���)�����̎󒍕[�ɕʏZ���\������Ă��Ȃ��iUlsystems hatano�j
		if (intval($row['ANOTHER_ADDR_TYPE']) === 1) {
			$betsujyuno = substr(getHtmlEscapedString($row['B_POST_NO']),0,4)."****";				//�ʏZ�̗X�֔ԍ�
			$betsujyu = getHtmlEscapedString(ssk_decrypt($row['B_KNJ_ADDRESS']));					//�ʏZ��
			$betsutel = substr(getHtmlEscapedString(ssk_decrypt($row['B_TEL_NO'])),0,4)."********";	//�ʏZ����TEL
		}
		//��2011/10/28 R-#2062 ���ރh��(���)�����̎󒍕[�ɕʏZ���\������Ă��Ȃ��iUlsystems hatano�j

		$tmp['betsujyuno'] = $betsujyuno;
		$tmp['betsujyu']   = $betsujyu;
		$tmp['betsutel']   = $betsutel;
		$tmp['otodokejyuno'] = $otodokejyuno;
		$tmp['otodokejyu']   = $otodokejyu .$otodokejyu2;
		$tmp['otodoketel']   = $otodoketel;

		//���̑����͂���敪
		$otodokeinfo = "";

		$tmp['otodokeinfo'] = $otodokeinfo;
		
		if ($otodokeinfo === ''){
			$tmp['otodokeinfo_color']="#ffffff";
		} else {
			$tmp['otodokeinfo_color']="#000000";
		}

		//Ұٱ��ڽ
		if (ssk_decrypt($row['EMAIL']) != ''){
			$tmp['mail'] = "�o�^����";
		} else if (ssk_decrypt($row['M_EMAIL']) != ''){
			$tmp['mail'] = "�o�^����";
		} else {
			$tmp['mail'] = "�o�^�Ȃ�";
		}

		//�ذ���ė�
		$tmp['coment'] = $row['DELIVERY_REQUEST'];
		
		//�ۗ��敪
		$tmp['ijriyu']=$row['NET_IJ_INFO'];

		//���i�w�����
		$shohin_cd = round($row['SHOHIN_CD']);
		$amount = $row['AMOUNT'];

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
			if ($shohin_cd < 500 || $shohin_cd == 565 || $shohin_cd == 570 || $shohin_cd == 580) {
				//���i�E����پ�Ă̏ꍇ

                //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j
                if( $row['SHOHIN_LEVEL'] ){
                    $prd[$counter_d] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10']."(".$row['SHOHIN_LEVEL'].")";
                }else{
				$prd[$counter_d] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10'];
                }
                //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j

				$prdct[$counter_d] = round($amount);
				$counter_p += $amount;
				$counter_d++;
			} else if ($shohin_cd >= 500 && $shohin_cd != 565 && $shohin_cd != 570 || $shohin_cd != 580) {
				//��ھ��ĕi�̏ꍇ
				if ($shohin_cd != '0710' && $shohin_cd != '0701') {

                    //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j
                    if( $row['SHOHIN_LEVEL'] ){
                        $prs[$counter_s] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10']."(".$row['SHOHIN_LEVEL'].")";
                    }else{
					$prs[$counter_s] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10'];
                    }
                    //��2011/09/02 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j

					$prsct[$counter_s] = round($amount);
					$counter_s++;
				}
			}
		}
	}
	$tmp['num']     = $counter_p;				//�w���_��
	$tmp['kingaku'] = $sum_amount;				//���z
	$tmp['tax']     = $sum_tax;					//�����
	$tmp['goukei']  = $sum_amount + $sum_tax;	//���v

	// ��2015/05/18 R-$17712_�߂���̌����̒���w���Ή�(nul hatano)
	//2��ڈȍ~�̂��͂��w��
	$next_delivery = '';
	$day = '';

	if ($row['NEXT_DELIVERY_DT'] || $row['NEXT_DELIVERY_WEEK']) {
		$next_delivery = '2��ڈȍ~�̂��͂��w�� �F ';

		if ($row['NEXT_DELIVERY_DT']) {
			$next_delivery .= '���t�Ŏw��@���� ' . trim($row['NEXT_DELIVERY_DT']) . ' ���ɂ��͂�';
		} else {
			if ($row['NEXT_DELIVERY_WEEK'] && $row['NEXT_DELIVERY_DAY']) {
				switch (trim($row['NEXT_DELIVERY_DAY'])) {
					case '1': $day = '��'; break;
					case '2': $day = '��'; break;
					case '3': $day = '��'; break;
					case '4': $day = '��'; break;
					case '5': $day = '��'; break;
					case '6': $day = '�y'; break;
					case '7': $day = '��'; break;
					default : $day = '��'; break;
				}

				$next_delivery .= '�j���Ŏw��@���� �� ' . trim($row['NEXT_DELIVERY_WEEK']) . ' ��ڂ�' . $day . '�j���ɂ��͂�';
			}
		}
	}
	$tmp['next_sday'] = $next_delivery;			//2��ڈȍ~�̂��͂���]��
	// ��2015/05/18 R-$17712_�߂���̌����̒���w���Ή�(nul hatano)

	//�X�e�[�g�����g�̊J��
	dbFreeResult($result);

	//DB close
	dbClose($con_utl);
	
	//�z��֊i�[
	$order_data = array();
	$order_data = $tmp;
}
?>