<?
{
//	ini_set('error_reporting',E_ALL);

	//DB接続
	$con_utl = dbConnect();
	
	// SQL文作成
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
	// ▼モバイル対応 2009/03/17 kdl.ohyanagi
	$cols[] = "Re.site_kbn";
	// ▲モバイル対応 2009/03/17 kdl.ohyanagi
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

    //▼2011/08/23 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）
    //$sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)." ORDER BY Sh.shohin_idx";
    $sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)." ORDER BY Sh.shohin_cd";
    //▲2011/08/23 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）

    //SQLを実行する
    $result = dbQuery($con_utl, $sql);

    //データカウントを取得する
    $rows = getNumRows($result, $arr_utl);

	//PDFの作成
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
			fdf_set_value($fdf, "kaiincd2", "会員：".$row['KAINNO']);
			fdf_set_value($fdf, "kaiincd", $row['KAINNO']);
			fdf_set_value($fdf, "namekj", ssk_decrypt($row['KAIN_NAME']));
			fdf_set_value($fdf, "namekn", ssk_decrypt($row['NAMEKANA']));
			fdf_set_value($fdf, "tel", ssk_decrypt($row['TEL_NO']));
			
			$shiharai = null;
			switch (intval($row['PAYMENT_TYPE'])) {
				case 1: $shiharai = "振込み"; break;
				case 3: $shiharai = "代引き"; break;
				case 4: $shiharai = "郵便引落し"; break;
				case 5: $shiharai = "銀行引落し"; break;
				case 6: $shiharai = "カード"; break;
				case 7: $shiharai = "ｅ－コレクト"; break;
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
			case 4: $jikanshitei = '午前'; break;
			case 5: $jikanshitei = '午後'; break;
			case 6: $jikanshitei = '夕方'; break;
			case 7: $jikanshitei = '夜間'; break;
			}

			if ($jikanshitei != null){
				fdf_set_value($fdf, 'jikanshitei', $jikanshitei);
			}

			fdf_set_value($fdf, "betsujusho", ssk_decrypt($row['ANOTHER_ADDR']));
			$mail = '';
			if (ssk_decrypt($row['EMAIL']) != ''){
				$mail .= '（PC）'.ssk_decrypt($row['EMAIL']);
			}
			if (ssk_decrypt($row['M_EMAIL']) != ''){
				$mail .= '　（携帯）'.ssk_decrypt($row['M_EMAIL']);
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

	//ステートメントの開放
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
