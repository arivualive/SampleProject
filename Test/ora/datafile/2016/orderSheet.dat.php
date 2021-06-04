<?
{
//	ini_set('error_reporting',E_ALL);

	//DB接続
	$con_utl = dbConnect();
	// SQL文作成
	$froms[] = "RegularOrder_Tbl Re";
	$cols[] = "Re.SITE_KBN";
	$cols[] = "Re.kainno";
	$cols[] = "Re.tel_no";
	$cols[] = "Re.payment_type";
	$cols[] = "Re.payment_num";
	$cols[] = "Re.cc_no";
	$cols[] = "Re.cc_name";
	$cols[] = "Re.cc_term";
    //2010/10/07 kdl-hatano 項目追加 ADD Start
    $cols[] = "Re.cc_regist_kbn";       //カード登録区分
    $cols[] = "Re.CC_NO";               //カード番号
    //2010/10/07 kdl-hatano 項目追加 ADD End
	$cols[] = "Re.delivery_time_type";
	$cols[] = "Re.delivery_request";
	
	// ▼HTML化対応 2009/10/21 MugikoTsuda
	$cols[] = "to_char(Re.delivery_dt, 'YYYY/MM/DD') as delivery_dt";
	$cols[] = "to_char(Re.order_dt, 'YYYY/MM/DD HH24:MI:SS') as order_dt";
	// ▲HTML化対応 2009/10/21 MugikoTsuda

	//▼2011/10/28 R-#2062 飲むドモ(定期)注文の受注票に別住が表示されていない（Ulsystems hatano）
	$cols[] = "Re.another_addr_type";
	//▲2011/10/28 R-#2062 飲むドモ(定期)注文の受注票に別住が表示されていない（Ulsystems hatano）

	//▼2013/02/06 【三次リリース】R-#11493_消費税増税対応（WEB対応）(ulsystems hatano)
	$cols[] = "NVL(Re.TOTAL_ORDER_AMOUNT, 0) as ORDER_AMOUNT";
	$cols[] = "NVL(Re.TOTAL_ORDER_TAXRATE, 0) as ORDER_TAXRATE";
	//▲2013/02/06 【三次リリース】R-#11493_消費税増税対応（WEB対応）(ulsystems hatano)

	// ▼2015/05/18 R-$17712_めぐりの結晶の定期購入対応(nul hatano)
	$cols[] = "Re.NEXT_DELIVERY_DT";
	$cols[] = "Re.NEXT_DELIVERY_WEEK";
	$cols[] = "Re.NEXT_DELIVERY_DAY";
	// ▲2015/05/18 R-$17712_めぐりの結晶の定期購入対応(nul hatano)

	$where[] = "Re.regular_order_id = ".getSqlValue($regular_order_id);
	
	$froms[] = "Member_Tbl Me";
	$cols[] = "Me.email";
	$cols[] = "Me.m_email";
	$where[] = "Re.kainno = Me.kainno(+)";

	$froms[] = "WebProfile_Tbl We";
    //2010/10/07 EC-One hatano 項目追加 ADD Start
    $cols[] = "We.namekanji";       //漢字氏名
    $cols[] = "We.NAMEOFERA";       //年号
    $cols[] = "We.birthday";        //生年月日
    $cols[] = "We.H_KNJ_ADDRESS";   //漢字住所
    $cols[] = "We.H_NOT_CONV";      //非変換部
    //2010/10/07 EC-One hatano 項目追加 ADD End
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

    //▼2011/10/24 A-03939 R-#1419 金額算出対応（ul kawanishi）
    $tmpPrice_OrderId = 'Re.regular_order_id';
    $tmpPrice_Sql = '';
    $tmpPrice_Sql .=        " ( ";
    //▼2013/03/28 【三次リリース】R-#11493_消費税増税対応（WEB対応）(ulsystems hatano)
    $tmpPrice_Sql .=        " select sum( s.TANKA * r.amount ) as wk_price ";
    //▲2013/03/28 【三次リリース】R-#11493_消費税増税対応（WEB対応）(ulsystems hatano)
    $tmpPrice_Sql .=        " from RegularProduct_Tbl r ,sqlshohin_tbl s ";
    $tmpPrice_Sql .=        " where ";
    $tmpPrice_Sql .=        " r.SHOHIN_CD  = s.SHOHIN_CD ";
    $tmpPrice_Sql .=        " and ( ";
    $tmpPrice_Sql .=        "     ( r.SHOHIN_LEVEL is null     and s.SHOHIN_LEVEL is null ) ";
    $tmpPrice_Sql .=        "  or ( r.SHOHIN_LEVEL is not null and r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
    $tmpPrice_Sql .=        " ) ";
    $tmpPrice_Sql .=        " and r.regular_order_id = ".$tmpPrice_OrderId ;
    $tmpPrice_Sql .=        " ) as price2, ";

    //消費税
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
    //▲2011/10/24 A-03939 R-#1419 金額算出対応（ul kawanishi）

	$where[] = "Re.regular_order_id = Pr.regular_order_id";
	
	$froms[] = "SqlShohin_Tbl Sh";
	$cols[] = "Sh.name10";

    //▼2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）
	$cols[] = "Sh.NAMEFULL";
    $cols[] = "Sh.SHOHIN_LEVEL";
    //▲2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）


	$where[] = "Pr.shohin_cd = Sh.shohin_cd(+)";

	//▼2011/10/24 #2025 飲むDW定期のレベル対応 (ec-one yamashita)
    //▼2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（EC-One hatano）
//    $where[] = "Sh.shohin_level = (SELECT MAX(SHOHIN_LEVEL) FROM SQLSHOHIN_TBL WHERE SHOHIN_CD = Pr.shohin_cd)";
    //▲2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（EC-One hatano）
    $where[] = "((Pr.shohin_level is not null and Pr.shohin_level = Sh.shohin_level) or (Pr.shohin_level is null and Sh.shohin_level is null)) ";
	//▲2011/10/24 #2025 飲むDW定期のレベル対応 (ec-one yamashita)

	// ▼HTML化対応 2009/10/21 MugikoTsuda
	$froms[] = "NET_IJ_Tbl Ij";
	$cols[] = "Ij.net_ij_info";
	$where[] = "Re.net_ij_cd = Ij.net_ij_cd(+)";
	// ▲HTML化対応 2009/10/21 MugikoTsuda

    //▼2011/08/23 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）
    //$sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)." ORDER BY Sh.shohin_idx";
    $sql = "SELECT ".implode(', ', $cols)." FROM ".implode(', ', $froms)." WHERE ".implode(' AND ', $where)."ORDER BY Sh.shohin_cd";
    //▲2011/08/23 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）
    //SQLを実行する
    $result = dbQuery($con_utl, $sql);

    //データカウントを取得する
    $rows = getNumRows($result, $arr_utl);
	$counter_p = 0;
	$counter_d = 0;
	$counter_s = 0;
	$sum_tax = 0;
	$sum_amount = 0;
	// Noticeが発生するので修正
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

		$tmp['kainno']   = getHtmlEscapedString($row['KAINNO']);					//会員ｺｰﾄﾞ
		$tmp['order_dt'] = getHtmlEscapedString($row['ORDER_DT']);					//注文受付日時
        ////2010/10/07 EC-One hatano 項目追加 ADD Start
        //会員名(漢字)
        $tmp['namekanji']= getHtmlEscapedString(ssk_decrypt($row['NAMEKANJI']));
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
        $tmp['address_not']     = getHtmlEscapedString(ssk_decrypt($row['H_NOT_CONV'])); //非変換部住所
        ////2010/10/07 EC-One hatano 項目追加 ADD End
		$tmp['name']     = getHtmlEscapedString(ssk_decrypt($row['NAMEKANA']));		//会員名
		$tmp['tel']      = getHtmlEscapedString(ssk_decrypt($row['TEL_NO']));		//電話番号

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
			default : $shiharai = ""; break;
		}
		$tmp['pay'] = $shiharai;

		$tmp['paynum'] =$row['PAYMENT_NUM'];	//支払回数
		
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
        $cc_no = strlen(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])));
        if ($cc_no != 0){
            $conv_cc_no = str_repeat("*",$cc_no - 4).$conv_cc_no.substr(getHtmlEscapedString(ssk_decrypt($row['CC_NO'])), -4);
        }
        $tmp['cc_no'] = $conv_cc_no;
        //有効期限
        $tmp['cc_term'] = $row['CC_TERM'];
        ////2010/10/07 kdl-hatano 項目追加 ADD End

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

		//▼2011/10/28 R-#2062 飲むドモ(定期)注文の受注票に別住が表示されていない（Ulsystems hatano）
		if (intval($row['ANOTHER_ADDR_TYPE']) === 1) {
			$betsujyuno = substr(getHtmlEscapedString($row['B_POST_NO']),0,4)."****";				//別住の郵便番号
			$betsujyu = getHtmlEscapedString(ssk_decrypt($row['B_KNJ_ADDRESS']));					//別住所
			$betsutel = substr(getHtmlEscapedString(ssk_decrypt($row['B_TEL_NO'])),0,4)."********";	//別住所のTEL
		}
		//▲2011/10/28 R-#2062 飲むドモ(定期)注文の受注票に別住が表示されていない（Ulsystems hatano）

		$tmp['betsujyuno'] = $betsujyuno;
		$tmp['betsujyu']   = $betsujyu;
		$tmp['betsutel']   = $betsutel;
		$tmp['otodokejyuno'] = $otodokejyuno;
		$tmp['otodokejyu']   = $otodokejyu .$otodokejyu2;
		$tmp['otodoketel']   = $otodoketel;

		//その他お届け先区分
		$otodokeinfo = "";

		$tmp['otodokeinfo'] = $otodokeinfo;
		
		if ($otodokeinfo === ''){
			$tmp['otodokeinfo_color']="#ffffff";
		} else {
			$tmp['otodokeinfo_color']="#000000";
		}

		//ﾒｰﾙｱﾄﾞﾚｽ
		if (ssk_decrypt($row['EMAIL']) != ''){
			$tmp['mail'] = "登録あり";
		} else if (ssk_decrypt($row['M_EMAIL']) != ''){
			$tmp['mail'] = "登録あり";
		} else {
			$tmp['mail'] = "登録なし";
		}

		//ﾌﾘｰｺﾒﾝﾄ欄
		$tmp['coment'] = $row['DELIVERY_REQUEST'];
		
		//保留区分
		$tmp['ijriyu']=$row['NET_IJ_INFO'];

		//商品購入情報
		$shohin_cd = round($row['SHOHIN_CD']);
		$amount = $row['AMOUNT'];

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
			if ($shohin_cd < 500 || $shohin_cd == 565 || $shohin_cd == 570 || $shohin_cd == 580) {
				//商品・ﾄﾗﾍﾞﾙｾｯﾄの場合

                //▼2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）
                if( $row['SHOHIN_LEVEL'] ){
                    $prd[$counter_d] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10']."(".$row['SHOHIN_LEVEL'].")";
                }else{
				$prd[$counter_d] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10'];
                }
                //▲2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）

				$prdct[$counter_d] = round($amount);
				$counter_p += $amount;
				$counter_d++;
			} else if ($shohin_cd >= 500 && $shohin_cd != 565 && $shohin_cd != 570 || $shohin_cd != 580) {
				//ﾌﾟﾚｾﾞﾝﾄ品の場合
				if ($shohin_cd != '0710' && $shohin_cd != '0701') {

                    //▼2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）
                    if( $row['SHOHIN_LEVEL'] ){
                        $prs[$counter_s] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10']."(".$row['SHOHIN_LEVEL'].")";
                    }else{
					$prs[$counter_s] = '('.$row['SHOHIN_CD'].')'.' '.$row['NAME10'];
                    }
                    //▲2011/09/02 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yoshii）

					$prsct[$counter_s] = round($amount);
					$counter_s++;
				}
			}
		}
	}
	$tmp['num']     = $counter_p;				//購入点数
	$tmp['kingaku'] = $sum_amount;				//金額
	$tmp['tax']     = $sum_tax;					//消費税
	$tmp['goukei']  = $sum_amount + $sum_tax;	//合計

	// ▼2015/05/18 R-$17712_めぐりの結晶の定期購入対応(nul hatano)
	//2回目以降のお届け指定
	$next_delivery = '';
	$day = '';

	if ($row['NEXT_DELIVERY_DT'] || $row['NEXT_DELIVERY_WEEK']) {
		$next_delivery = '2回目以降のお届け指定 ： ';

		if ($row['NEXT_DELIVERY_DT']) {
			$next_delivery .= '日付で指定　毎月 ' . trim($row['NEXT_DELIVERY_DT']) . ' 日にお届け';
		} else {
			if ($row['NEXT_DELIVERY_WEEK'] && $row['NEXT_DELIVERY_DAY']) {
				switch (trim($row['NEXT_DELIVERY_DAY'])) {
					case '1': $day = '月'; break;
					case '2': $day = '火'; break;
					case '3': $day = '水'; break;
					case '4': $day = '木'; break;
					case '5': $day = '金'; break;
					case '6': $day = '土'; break;
					case '7': $day = '日'; break;
					default : $day = '●'; break;
				}

				$next_delivery .= '曜日で指定　毎月 第 ' . trim($row['NEXT_DELIVERY_WEEK']) . ' 回目の' . $day . '曜日にお届け';
			}
		}
	}
	$tmp['next_sday'] = $next_delivery;			//2回目以降のお届け希望日
	// ▲2015/05/18 R-$17712_めぐりの結晶の定期購入対応(nul hatano)

	//ステートメントの開放
	dbFreeResult($result);

	//DB close
	dbClose($con_utl);
	
	//配列へ格納
	$order_data = array();
	$order_data = $tmp;
}
?>