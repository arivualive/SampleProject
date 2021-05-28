<?
{
//	ini_set('error_reporting',E_ALL);

	//DB�ڑ�
	$con_utl = dbConnect();
	
	// SQL���쐬
	$froms[] = "RecvOrder_Tbl Re";
	$cols[] = "Re.kainno";
	$cols[] = "Re.tel_no";
	$cols[] = "Re.payment_type";
	$cols[] = "Re.payment_num";
	$cols[] = "Re.cc_no";
	$cols[] = "Re.cc_name";
	$cols[] = "Re.cc_term";
	$cols[] = "Re.delivery_time_type";
	$cols[] = "Re.another_addr";
	$cols[] = "Re.delivery_request";
	// �����o�C���Ή� 2009/03/17 kdl.ohyanagi
	$cols[] = "Re.site_kbn";
	// �����o�C���Ή� 2009/03/17 kdl.ohyanagi
	$where[] = "Re.recv_order_id = ".getSqlValue($recv_order_id);
	
	$froms[] = "Member_Tbl Me";
	$cols[] = "Me.kain_name";
	$cols[] = "Me.email";
	$cols[] = "Me.m_email";
	$where[] = "Re.kainno = Me.kainno(+)";

	$froms[] = "WebProfile_Tbl We";
	$cols[] = "We.namekana";
	$where[] = "Me.kainno = We.kainno(+)";

	$froms[] = "Credit_Tbl Cr";
	$cols[] = "Cr.companymeifull";
	$where[] = "Re.cc_type = Cr.company_cd(+)";

	$froms[] = "RecvProduct_Tbl Pr";
	$cols[] = "Pr.shohin_cd";
	$cols[] = "Pr.amount";
	$cols[] = "Pr.price";
//	$cols[] = "Pr.amount * Pr.price AS sub_total";
	$where[] = "Re.recv_order_id = Pr.recv_order_id";
	
	$froms[] = "SqlShohin_Tbl Sh";
	$cols[] = "Sh.name10";
// 	$cols[] = "Sh.tanka";
	$where[] = "Pr.shohin_cd = Sh.shohin_cd(+)";

    //��2011/08/23 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j
    //$sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)." ORDER BY Sh.shohin_idx";
    $sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)." ORDER BY Sh.shohin_cd";
    //��2011/08/23 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yoshii�j

    //SQL�����s����
    $result = dbQuery($con_utl, $sql);

    //�f�[�^�J�E���g���擾����
    $rows = getNumRows($result, $arr_utl);

	//PDF�̍쐬
	$fdf = fdf_create();
	fdf_set_encoding($fdf, "Shift-JIS");

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
		if ($i == 0) {
logDebug(print_r($row, 1));
			fdf_set_value($fdf, "kaiincd2", "����F".$row['KAINNO']);
			fdf_set_value($fdf, "kaiincd", $row['KAINNO']);
			fdf_set_value($fdf, "namekj", ssk_decrypt($row['KAIN_NAME']));
			fdf_set_value($fdf, "namekn", ssk_decrypt($row['NAMEKANA']));
			fdf_set_value($fdf, "tel", ssk_decrypt($row['TEL_NO']));
			
			$shiharai = null;
			switch (intval($row['PAYMENT_TYPE'])) {
				case 1: $shiharai = "�U����"; break;
				case 3: $shiharai = "�����"; break;
				case 4: $shiharai = "�X�ֈ�����"; break;
				case 5: $shiharai = "��s������"; break;
				case 6: $shiharai = "�J�[�h"; break;
				case 7: $shiharai = "���|�R���N�g"; break;
			}
			if ($shiharai != null){
				fdf_set_value($fdf, "shiharai", $shiharai);
			}

			fdf_set_value($fdf, "kaisuu", str_pad(trim($row['PAYMENT_NUM']), 2, '0', STR_PAD_LEFT));

			if (intval($row['PAYMENT_TYPE']) == 6) {
				if ($row['COMPANYMEIFULL'] != ''){
					fdf_set_value($fdf, "cardco", $row['COMPANYMEIFULL']);
				}
				if ($row['CC_NO'] != ''){
					fdf_set_value($fdf, "cardno", '');
				}
				fdf_set_value($fdf, "cardholder", ssk_decrypt($row['CC_NAME']));
				fdf_set_value($fdf, "exp", $row['CC_TERM']);
			}

			$jikanshitei = null;
			switch (intval($row['DELIVERY_TIME_TYPE'])) {
			case 0: $jikanshitei = ''; break;
			case 4: $jikanshitei = '�ߑO'; break;
			case 5: $jikanshitei = '�ߌ�'; break;
			case 6: $jikanshitei = '�[��'; break;
			case 7: $jikanshitei = '���'; break;
			}

			if ($jikanshitei != null){
				fdf_set_value($fdf, 'jikanshitei', $jikanshitei);
			}

			fdf_set_value($fdf, "betsujusho", ssk_decrypt($row['ANOTHER_ADDR']));
			$mail = '';
			if (ssk_decrypt($row['EMAIL']) != ''){
				$mail .= '�iPC�j'.ssk_decrypt($row['EMAIL']);
			}
			if (ssk_decrypt($row['M_EMAIL']) != ''){
				$mail .= '�@�i�g�сj'.ssk_decrypt($row['M_EMAIL']);
			}
			fdf_set_value($fdf, "email", $mail);
			fdf_set_value($fdf, "memo", $row['DELIVERY_REQUEST']);
		}
		
		$shohin_cd = round($row['SHOHIN_CD']);
		$amount = $row['AMOUNT'];
		$price = $row['PRICE'];
		if ($shohin_cd == '0710') {
			fdf_set_value($fdf, "tax", round($price));
			$sum_tax += round($price);
		} else if ($shohin_cd != '0000') {
			if ($shohin_cd < 500 || $shohin_cd == 565 || $shohin_cd == 570 || $shohin_cd == 580) {
				$sum_amount += round($price * $amount);
				$prd[$counter_d] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10'];
				$prdct[$counter_d] = round($amount);
				$counter_d++;
			} else if ($shohin_cd >= 500 && $shohin_cd != 565 && $shohin_cd != 570 || $shohin_cd != 580) {
				if ($shohin_cd != "0710" && $shohin_cd != "0701") {
					$prs[$counter_s] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10'];
					$prsct[$counter_s] = round($amount);
					$counter_s++;
				}
			}
		}
	}

	//�X�e�[�g�����g�̊J��
	dbFreeResult($result);

	//DB close
	dbClose($con_utl);

	for ($i = 0; $i < 10; $i++) {
		$idx = sprintf("%02d", $i + 1);
		fdf_set_value($fdf, "prd".$idx, $prd[$i]);
		fdf_set_value($fdf, "prdct".$idx, $prdct[$i]);
		fdf_set_value($fdf, "prs".$idx, $prs[$i]);
		fdf_set_value($fdf, "prsct".$idx, $prsct[$i]);
	}

	fdf_set_value($fdf, "count", $counter_d);
	fdf_set_value($fdf, "amount", $sum_amount);
	fdf_set_value($fdf, "total", $sum_amount + $sum_tax);

	fdf_set_file($fdf, $ROOT_URL."/2013/order.pdf");
	$fdf_filename = '/var/tmp/fdf_'.rand().'.fdf';
	fdf_save($fdf, $fdf_filename);
	fdf_close($fdf);
	Header("Content-type: application/vnd.fdf");
	$fp = fopen($fdf_filename, "r");
	fpassthru($fp);
	unlink($fdf_filename);
}
?>
