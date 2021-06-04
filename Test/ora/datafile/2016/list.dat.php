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

    // �����o�C���Ή� #716 2009/02/17 kdl.ohyanagi add start
    // �T�C�g�敪�̃��W�I�{�^���̒l
    // ����
    $site_kbn_chkd0 = 'checked="checked"';
    // PC
    $site_kbn_chkd1 = '';
    // �g��
    $site_kbn_chkd2 = '';

    // �N���A�{�^�����������ꂽ�ꍇ�A������I������悤�ɂ���
    $s_sitekbn = '0';
    // �����o�C���Ή� #716 2009/02/17 kdl.ohyanagi add end


    //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
    // �T�C�g�敪�̃��W�I�{�^���̒l
    // ����
    $net_ij_kbn_chkd0 = 'checked="checked"';
    // PC
    $net_ij_kbn_chkd1 = '';
    // �g��
    $net_ij_kbn_chkd2 = '';

    // �N���A�{�^�����������ꂽ�ꍇ�A������I������悤�ɂ���
    $s_net_ij_kbn = '0';
    //2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j

}

$cnt=0;
for($i=0; $i<count($order_status); $i++){
    if($order_status[$i] != ""){
        $cnt++;
    }
}
if($cnt==0){
	// ��2015/06/04 R-#17712_�߂���̌����̒���w���Ή�(nul hatano)
    $order_status[0]    = '0';
	// ��2015/06/04 R-#17712_�߂���̌����̒���w���Ή�(nul hatano)
}

//DB�ڑ�
$con_utl = dbConnect();

// WHERE�吶��
$where = array();
$where[] = 'a.delete_flg <> 1';

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

// �����o�C���Ή� 2009/03/17 kdl.ohyanagi
if ($s_sitekbn === '1') {
    $site_kbn_chkd1 = 'checked="checked"';
    $where[] = "a.site_kbn = '1'";
} else if ($s_sitekbn === '2') {
    $site_kbn_chkd2 = 'checked="checked"';
    $where[] = "a.site_kbn = '2'";
} else {
    $site_kbn_chkd0 = 'checked="checked"';
}
// �����o�C���Ή� 2009/03/17 kdl.ohyanagi

//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
if ($NET_IJ_KBN === '1') {
    $net_ij_kbn_chkd1 = 'checked="checked"';
    $where[] = "(a.NET_IJ_CD = '0000' or  a.NET_IJ_CD is null)";

} else if ($NET_IJ_KBN === '2') {
    $net_ij_kbn_chkd2 = 'checked="checked"';
    $where[] = " (a.NET_IJ_CD != '0000' and not a.NET_IJ_CD is null)";

} else {
    $net_ij_kbn_chkd0 = 'checked="checked"';
}
//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j

//��2011/11/04 A-05826 R-#2059_�y�Ǘ��c�[���z���ރh��(����)�������烁�[�����M �Ń��[���A�h���X�ł̌������ł��Ȃ��iul yamashita�j
/*


$arr_clum_list = array();
if ($tel_no !== '')
    $arr_clum_list['TEL_NO'] = $tel_no;
if ($kain_name !== '')
    $arr_clum_list['KAIN_NAME'] = $kain_name;
if ($email !== '')
    $arr_clum_list['EMAIL'] = $email;
if (count($arr_clum_list) > 0) {
    $conView = dbConnectView();
    // for pc
    $no = fncGetSskMemberView($conView, $arr_clum_list);
    // for mobile
    if ($email !== '') {
        unset($arr_clum_list['EMAIL']);
        $arr_clum_list['M_EMAIL'] = $email;
    }
    $no2 = fncGetSskMemberView($conView, $arr_clum_list);

    dbClose($conView);
    if ($no !== false && count($no) > 0) {
        foreach ($no as $x)
            $noArray[] = getSqlValue($x);
    }
    if ($no2 !== false && count($no2) > 0) {
        foreach ($no2 as $x)
            $noArray[] = getSqlValue($x);
    }
    if (isset($noArray) && count($noArray) > 0) {
        $where[] = 'b.kainno in ('.implode(', ', $noArray).')';
    } else {
        $where[] = '1 = 0';
    }
}

*/
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
		
		if (count($noArray)) $where[] = 'b.kainno in (SELECT V1.KAINNO FROM Member1_V V1, Member2_V V2 WHERE '.implode(' AND ', $noArray).' AND V1.KAINNO = V2.KAINNO)';
//��2011/11/04 A-05826 R-#2059_�y�Ǘ��c�[���z���ރh��(����)�������烁�[�����M �Ń��[���A�h���X�ł̌������ł��Ȃ��iul yamashita�j

if($mode == 'clear'){
	// ��2015/06/04 R-#17712_�߂���̌����̒���w���Ή�(nul hatano)
    $where[] = 'order_status IN (0)';
	// ��2015/06/04 R-#17712_�߂���̌����̒���w���Ή�(nul hatano)
}else{
    if (count($order_status) > 0) {
        $where[] = 'a.order_status IN ('.implode(', ', $order_status).')';
    }
}

// ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki
$service_arr = array();
$tmpWhere_arr = array();
if (!empty($service_kbn)) {
	if (in_array('0', $service_kbn)) {
		$service_kbn_chk = 'checked="checked"';
		$service_arr[] = "d.SHOHIN_CD <> '0451'";
		$tmpWhere_arr[] = "(".implode(' AND ', $service_arr). ")";
	}
	if (in_array('1', $service_kbn)) {
		$service_kbn_chk = 'checked="checked"';
		$tmpWhere_arr[] = "d.SHOHIN_CD = '0451'";
	}
	$where[] = "(".implode(' OR ', $tmpWhere_arr). ")";
}

if (!empty($qteiki_flg)) {
	$where[] = "a.KAIN_KBN in ('0','1')";
}
// ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki

$where = implode(' AND ', $where);

//SQL���쐬
$sql  = "SELECT * FROM (";
$sql .=    "SELECT ";
$sql .=        " a.regular_order_id, ";
$sql .=        " a.site_kbn, ";
$sql .=        " a.kainno, ";
$sql .=        " stfunc_ssk(a.tel_no) as tel_no, ";
$sql .=        " a.netmember_id, ";
$sql .=        " to_char(a.order_dt, 'YYYY/MM/DD HH24:MI:SS') as order_dt, ";
$sql .=        " stfunc_ssk(b.kain_name) as kain_name, ";
$sql .=        " decode(a.site_kbn, 1, stfunc_ssk(b.email), stfunc_ssk(b.m_email)) as email, ";
$sql .=        " (select sum(price * amount) as sum_price from RegularProduct_Tbl r where r.regular_order_id = a.regular_order_id) as sum_price, ";

//��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul yoshii�j
$tmpPrice_Sql = '';
$tmpPrice_Sql .=        " ( ";
$tmpPrice_Sql .=        " select sum( (s.TANKA * r.amount) * (sy.TAX_RATE + 1) ) as wk_price ";
$tmpPrice_Sql .=        " from RegularProduct_Tbl r ,sqlshohin_tbl s , system_tbl sy";
$tmpPrice_Sql .=        " where sy.SITE_KBN='1' ";
$tmpPrice_Sql .=        " and  r.SHOHIN_CD  = s.SHOHIN_CD ";
$tmpPrice_Sql .=        " and ( ";
$tmpPrice_Sql .=        "     ( r.SHOHIN_LEVEL is null     and s.SHOHIN_LEVEL is null ) ";
$tmpPrice_Sql .=        "  or ( r.SHOHIN_LEVEL is not null and r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
$tmpPrice_Sql .=        " ) ";
$tmpPrice_Sql .=        " and r.regular_order_id = a.regular_order_id ";
$tmpPrice_Sql .=        " ) as SUM_PRICE2, ";
$sql .= $tmpPrice_Sql;
//��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul yoshii�j

$sql .=        " a.host_flg, ";
$sql .=        " a.print_flg, ";
$sql .=        " a.order_status, ";
$sql .=        " a.session_id ";

//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
$sql .=        ",a.NET_IJ_CD ";
$sql .=        ",c.NET_IJ_INFO";
//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j

//��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
$sql .=        ",(NVL(a.TOTAL_ORDER_AMOUNT, 0) + NVL(a.TOTAL_ORDER_TAXRATE, 0)) as ORDER_AMOUNT";
//��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)

// ��R-#17717_�������̃J�[�h�ԍ���PLS�Ō����悤�ɂ��� 2015/05/14 nul-motoi
$sql .=        " ,stfunc_ssk(a.cc_no) as CC_NO ";
$sql .=        " ,a.cc_term as CC_TERM";
// ��R-#17717_�������̃J�[�h�ԍ���PLS�Ō����悤�ɂ��� 2015/05/14 nul-motoi

// ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki
$sql .=        ",d.SHOHIN_CD";
$sql .=        ",a.KAIN_KBN";

//  �J�[�h�ԍ����׉�ʂɕ\������e�J�������擾����B (HanhTV)
$sql .=        ",a.PAYMENT_NUM";
$sql .=        ",f.REGIST_HISTORY_ID";
$sql .=        ",stfunc_ssk(f.KAIIN_ID) as KAIIN_ID";
$sql .=        ",stfunc_ssk(f.KAIIN_PASS) as KAIIN_PASS";
$sql .=        ",f.CLR_CORP_CD";
$sql .=        ",f.CARD_SEQ";
$sql .=        ",stfunc_ssk(w.SETTLEMENT_USER_ID) as SETTLEMENT_USER_ID";
$sql .=        ",stfunc_ssk(w.SETTLEMENT_USER_PASSWORD) as SETTLEMENT_USER_PASSWORD";
$sql .=        ",w.SETTLEMENT_CARD_REGIST_NO";

// ��R-#33781_�yH29-00071-17�zWEB�Ǘ��c�[��(�������)�ł̃f�[�^�R�s�[��Q�Ή� 2018/06/18 nul-inagaki
$sql .=        ",w.SETTLEMENT_AGENT_CD as SETTLEMENT_AGENT_CD";
// ��R-#33781_�yH29-00071-17�zWEB�Ǘ��c�[��(�������)�ł̃f�[�^�R�s�[��Q�Ή� 2018/06/18 nul-inagaki

$sql .=        ",row_number() over(partition by d.REGULAR_ORDER_ID order by d.SHOHIN_CD) row_num";

//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
//$sql .= " FROM RegularOrder_Tbl a, Member_Tbl b, net_ij_tbl c, RegularProduct_Tbl d, SqlShohin_Tbl e ";
$sql .= " FROM RegularOrder_Tbl a, Member_Tbl b, net_ij_tbl c, RegularProduct_Tbl d, SqlShohin_Tbl e, Cardregisthistory_Tbl f ,WebProfile_tbl w"; //  SQL�X�V (HanhTV)
//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j

$sql .= " WHERE a.regular_order_id = d.regular_order_id(+) AND ";
$sql .= "       d.shohin_cd = e.shohin_cd(+) AND ";
$sql .= "       e.shohin_kbn = '1' AND ";
// ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki

$sql .=        " a.kainno = b.kainno(+) AND ";

//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
$sql .=	" a.NET_IJ_CD = c.NET_IJ_CD(+) AND ";
//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j

// �e�[�u��join������ǉ����� (HanhTV) 
$sql .= " a.REGULAR_ORDER_ID = f.ORDER_ID (+) AND ";
$sql .=        " f.ORDER_KBN (+) = 2 AND ";
$sql .= " a.KAINNO = w.KAINNO (+) AND ";

$sql .= $where;
$sql .= ") ";
// ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki
$sql .= " WHERE row_num = 1 ";
// ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki
$sql .= " ORDER BY order_dt desc";

logDebug("sql=".$sql);

//SQL�����s����
$result = dbQuery($con_utl, $sql);

//�f�[�^�J�E���g���擾����
$rows = getNumRows($result, $arr_utl);

//�f�[�^�擾
$order_data = array();

for ($i = 0; $i < $rows; $i++) {
    $row = dbFetchRow($result, $i, $arr_utl);
    $tmp = array();

    $tmp['regular_order_id'] = $row['REGULAR_ORDER_ID'];
    $tmp['order_dt']      = getHtmlEscapedString($row['ORDER_DT']);
    $tmp['kainno']        = getHtmlEscapedString($row['KAINNO']);
	// �ϐ��Ƀf�[�^��ݒ肷�� (Hanh TV)
    $tmp['payment_num']      = getHtmlEscapedString($row['PAYMENT_NUM']);
    if ($row['REGIST_HISTORY_ID']) {
    	$tmp['kaiin_id']         = getHtmlEscapedString($row['KAIIN_ID']);
    	$tmp['kaiin_pass']       = getHtmlEscapedString($row['KAIIN_PASS']);
    	$tmp['clr_corp_cd']      = getHtmlEscapedString($row['CLR_CORP_CD']);
    	$tmp['card_seq']         = getHtmlEscapedString($row['CARD_SEQ']);
    } else{
    	$tmp['kaiin_id']         = getHtmlEscapedString($row['SETTLEMENT_USER_ID']);
    	$tmp['kaiin_pass']       = getHtmlEscapedString($row['SETTLEMENT_USER_PASSWORD']);
    	$tmp['clr_corp_cd']      = getHtmlEscapedString($row['SETTLEMENT_AGENT_CD']);
        // ��R-#33781_�yH29-00071-17�zWEB�Ǘ��c�[��(�������)�ł̃f�[�^�R�s�[��Q�Ή� 2018/06/18 nul-inagaki
    	$tmp['card_seq']         = getHtmlEscapedString($row['SETTLEMENT_CARD_REGIST_NO']);
        // ��R-#33781_�yH29-00071-17�zWEB�Ǘ��c�[��(�������)�ł̃f�[�^�R�s�[��Q�Ή� 2018/06/18 nul-inagaki
    	
    }

    // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/09/14 nul-fukunaga
    if (is_null($row['KAIN_NAME'])) {
        $tmp['kain_name']     = '���l�b�g������Ȃ�';
    }else{
        $tmp['kain_name']     = getHtmlEscapedString($row['KAIN_NAME']);
    }
    // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/09/14 nul-fukunaga

    $tmp['tel_no']        = getHtmlEscapedString($row['TEL_NO']);

    // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/09/14 nul-fukunaga
    if (is_null($row['EMAIL'])) {
        $tmp['email']         = '���l�b�g������Ȃ�';
    }else{
        $tmp['email']         = getHtmlEscapedString($row['EMAIL']);
    }
    // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/09/14 nul-fukunaga

    //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
    if (isset($row['ORDER_AMOUNT']) == true && intval($row['ORDER_AMOUNT']) > 0) {
        $tmp['sum_price']     = getHtmlEscapedString('\\'.number_format($row['ORDER_AMOUNT']));
    } else {
        $tmp['sum_price']     = getHtmlEscapedString('\\'.number_format($row['SUM_PRICE2']));
    }
    //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)

    $tmp['host_flg']      = $row['HOST_FLG'];
    $tmp['print_flg']     = $row['PRINT_FLG'];
    $tmp['order_status']  = $row['ORDER_STATUS'];
    $tmp['session_id']    = $row['SESSION_ID'];
    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi
    $tmp['site_kbn']      = $row['SITE_KBN'];
    $tmp['site_kbn_nm']   = ($tmp['site_kbn'] === '1') ? 'PC' : '�g��';
    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi


    //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
    $tmp['net_ij_cd']  = $row['NET_IJ_CD'];

    $tmp['net_ij']  = "";
    $tmp['net_ij_info']  = "";

    if($tmp['net_ij_cd']=='0000' || !$tmp['net_ij_cd']){
        $tmp['net_ij']  = "�I�[�g";
    }else{
        $tmp['net_ij']  = "�}�j���A��";
        $tmp['net_ij_info'] .= $row['NET_IJ_INFO'];
    }
    //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j

    // ��R-#17717_�������̃J�[�h�ԍ���PLS�Ō����悤�ɂ��� 2015/05/14 nul-motoi
    $tmp['cc_no'] = getHtmlEscapedString($row['CC_NO']);
    $tmp['cc_term'] = $row['CC_TERM'];
    // ��R-#17717_�������̃J�[�h�ԍ���PLS�Ō����悤�ɂ��� 2015/05/14 nul-motoi

    // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki
    $tmp['kain_kbn'] = $row['KAIN_KBN'];
    $tmp['shohin_cd'] = $row['SHOHIN_CD'];
    // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki

    $order_data[$i]  = $tmp;

}
if ($rows === 0)
    $err_message = "�f�[�^�����݂��܂���";

//�X�e�[�g�����g�̊J��
dbFreeResult($result);

//DB close
dbClose($con_utl);
?>
