<?php
ini_set('error_reporting',E_ALL);
if ($mode == '' || $mode == 'clear') {

    $kainno    = '';
    $name_kanji = '';
    $tel_no    = '';
    $email     = '';

    $today = time();
    $start = $today - 7 * 24 * 60 * 60;
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


    // �S��
    $ordersts_chkd0 = '';
    // ����
    $ordersts_chkd1 = 'checked="checked"';
    // ����
    $ordersts_chkd2 = '';

    $s_ordersts = '1';


    //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
    // �T�C�g�敪�̃��W�I�{�^���̒l
    // ����
    //$net_ij_kbn_chkd0 = 'checked="checked"';
    // PC
    //$net_ij_kbn_chkd1 = '';
    // �g��
    //$net_ij_kbn_chkd2 = '';

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
    $order_status[0]    = '0';
}

//DB�ڑ�
$con_utl = dbConnect();

// WHERE�吶��
$where = array();
$where[] = 'a.delete_flg <> 1';

if ($s_yy != '' && $s_mm != '' && $s_dd != '') {
    $ymdh = sprintf('%04d%02d%02d000000', $s_yy, $s_mm, $s_dd);
    $where[] = "a.direct_dt >= to_date('$ymdh', 'yyyymmddhh24miss')";
}
if ($e_yy != '' && $e_mm != '' && $e_dd != '') {
    $ymdh = sprintf('%04d%02d%02d235959', $e_yy, $e_mm, $e_dd);
    $where[] = "a.direct_dt <= to_date('$ymdh', 'yyyymmddhh24miss')";
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
if ($s_ordersts === '1') {
    $ordersts_chkd1 = 'checked="checked"';
    $where[] = "a.host_dt is not null";
} else if ($s_ordersts === '2') {
    $ordersts_chkd2 = 'checked="checked"';
    $where[] = "a.host_dt is null";
} else {
    $ordersts_chkd0 = 'checked="checked"';
}

//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
//if ($NET_IJ_KBN === '1') {
//    $net_ij_kbn_chkd1 = 'checked="checked"';
//    $where[] = "(a.NET_IJ_CD = '0000' or  a.NET_IJ_CD is null)";
//
//} else if ($NET_IJ_KBN === '2') {
//    $net_ij_kbn_chkd2 = 'checked="checked"';
//    $where[] = " (a.NET_IJ_CD != '0000' and not a.NET_IJ_CD is null)";
//
//} else {
//    $net_ij_kbn_chkd0 = 'checked="checked"';
//}
//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j


//��2011/11/04 A-05826 R-#2059_�y�Ǘ��c�[���z���ރh��(����)�������烁�[�����M �Ń��[���A�h���X�ł̌������ł��Ȃ��iul yamashita�j
/*

$arr_clum_list = array();
if ($tel_no !== '')
    $arr_clum_list['TEL_NO'] = $tel_no;
if ($name_kanji !== '')
    $arr_clum_list['NAME_KANJI'] = $name_kanji;
if ($email !== '')
    $arr_clum_list['EMAIL'] = $email;
if (count($arr_clum_list) > 0) {
    $conView = dbConnectView();
    // for pc
    $no = fncGetSskMemberView($conView, $arr_clum_list,"SampleRequest_V");
    // for mobile
    if ($email !== '') {
        unset($arr_clum_list['EMAIL']);
        $arr_clum_list['M_EMAIL'] = $email;
    }
    $no2 = fncGetSskMemberView($conView, $arr_clum_list,"SampleRequest_V");

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
        $where[] = 'a.direct_order_id in ('.implode(', ', $noArray).')';
    } else {
        $where[] = '1 = 0';
    }
}
*/
		$noArray = array();
		if ($name_kanji != '') {
			$value = $name_kanji;
			$value = mb_ereg_replace("^'", "'%", getSqlValue($value));
			$value = mb_ereg_replace("'$", "%'", $value);
			$noArray[] = "V2.NAME_KANJI LIKE " . $value;
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
				$value = mb_ereg_replace("^'", "'%", getSqlValue($value));
				$value = mb_ereg_replace("'$", "%'", $value);
				$noArray[] = "V1.EMAIL LIKE ".$value;
			}
		}
		
		if (count($noArray)) $where[] = 'a.direct_order_id in (SELECT V1.SAMPLE_REQUEST_ID FROM SampleRequest1_V V1, SampleRequest2_V V2 WHERE '.implode(' AND ', $noArray).' AND V1.SAMPLE_REQUEST_ID = V2.SAMPLE_REQUEST_ID)';
//��2011/11/04 A-05826 R-#2059_�y�Ǘ��c�[���z���ރh��(����)�������烁�[�����M �Ń��[���A�h���X�ł̌������ł��Ȃ��iul yamashita�j

if($mode == 'clear'){
    $where[] = 'order_status IN (0)';
}else{
    if (count($order_status) > 0) {
        $where[] = 'a.order_status IN ('.implode(', ', $order_status).')';
    }
}
// $where[] = 'a.host_dt is not null';

$where = implode(' AND ', $where);

//SQL���쐬
$sql  = "SELECT * FROM (";
$sql .=    "SELECT ";
$sql .=        " a.direct_order_id, ";
$sql .=        " a.site_kbn, ";
$sql .=        " a.kainno, ";
$sql .=        " a.tel_no, ";
//$sql .=        " a.netmember_id, ";
$sql .=        " to_char(a.direct_dt, 'YYYY/MM/DD HH24:MI:SS') as direct_dt, ";
$sql .=        " a.name_kanji, ";
$sql .=        " a.email,";
$sql .=        " a.m_email, ";
$sql .=        " a.host_flg, ";
$sql .=        " a.dress_order_count, ";
$sql .=        " a.print_flg, ";
$sql .=        " a.order_status, ";
$sql .=        " a.session_id, ";

//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
//$sql .=        ",a.NET_IJ_CD ";
//$sql .=        ",c.NET_IJ_INFO";
//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j


//��2011/11/01 A-03939_R-#2036_2041_2035_2042_2053_���x���Ή����z�Ή��iul kawanishi�j

$tmpPrice_Sql = '';
$tmpPrice_Sql .= " (select sum( (s.TANKA * a.dress_order_count) * (sy.TAX_RATE + 1) ) as wk_price ";
$tmpPrice_Sql .= " from sqlshohin_tbl s , system_tbl sy";
$tmpPrice_Sql .= " where sy.SITE_KBN='1' ";
$tmpPrice_Sql .= " and  a.SHOHIN_CD  = s.SHOHIN_CD ";
$tmpPrice_Sql .= " and ( ";
$tmpPrice_Sql .= "( a.SHOHIN_LEVEL is null     and s.SHOHIN_LEVEL is null ) ";
$tmpPrice_Sql .= "  or ( a.SHOHIN_LEVEL is not null and s.SHOHIN_LEVEL = a.SHOHIN_LEVEL ) ";
$tmpPrice_Sql .= " ) ";

$tmpPrice_Sql .= " ) as SUM_PRICE1 ";

$sql .= $tmpPrice_Sql;
//��2011/11/01 A-03939_R-#2036_2041_2035_2042_2053_���x���Ή����z�Ή��iul kawanishi�j



//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
$sql .= " FROM DirectOrder_Tbl a ";
//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j


$sql .= " WHERE ";

//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
//$sql .=	" a.NET_IJ_CD = c.NET_IJ_CD(+) AND ";
//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j


$sql .= $where;
$sql .= ") ";
$sql .= " ORDER BY direct_dt desc";


//SQL�����s����
$result = dbQuery($con_utl, $sql);

//�f�[�^�J�E���g���擾����
$rows = getNumRows($result, $arr_utl);

//�f�[�^�擾
$order_data = array();

for ($i = 0; $i < $rows; $i++) {
    $row = dbFetchRow($result, $i, $arr_utl);
    $tmp = array();

    $tmp['direct_order_id'] = $row['DIRECT_ORDER_ID'];
    $tmp['direct_dt']      = getHtmlEscapedString($row['DIRECT_DT']);
    $tmp['kainno']        = getHtmlEscapedString($row['KAINNO']);
    $tmp['name_kanji']     = getHtmlEscapedString(ssk_decrypt($row['NAME_KANJI']));
    $tmp['tel_no']        = getHtmlEscapedString(ssk_decrypt($row['TEL_NO']));
    $tmp['email']         = getHtmlEscapedString(ssk_decrypt($row['EMAIL']));
    $tmp['m_email']         = getHtmlEscapedString(ssk_decrypt($row['M_EMAIL']));
    $tmp['dress_order_count'] = $row['DRESS_ORDER_COUNT'];

    //��2011/11/01 A-03939_R-#2036_2041_2035_2042_2053_���x���Ή����z�Ή��iul kawanishi�j
    $tmp['sum_price']     = getHtmlEscapedString('\\'.number_format($row['SUM_PRICE1']));
    //��2011/11/01 A-03939_R-#2036_2041_2035_2042_2053_���x���Ή����z�Ή��iul kawanishi�j

    $tmp['host_flg']      = $row['HOST_FLG'];
    $tmp['print_flg']     = $row['PRINT_FLG'];
    $tmp['order_status']  = $row['ORDER_STATUS'];
    $tmp['session_id']    = $row['SESSION_ID'];
    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi
    $tmp['site_kbn']      = $row['SITE_KBN'];
    $tmp['site_kbn_nm']   = ($tmp['site_kbn'] === '1') ? 'PC' : '�g��';
    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi


    //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
//    $tmp['net_ij_cd']  = $row['NET_IJ_CD'];

    $tmp['net_ij']  = "";
//    $tmp['net_ij_info']  = "";


//echo "<br>net_ij_cd=".$tmp['net_ij_cd'];
//$tmp['net_ij_info'] = "(".$tmp['net_ij_cd'].")";



    //if($tmp['net_ij_cd']){
        //if($tmp['net_ij_cd']=='0000'){
//        if($tmp['net_ij_cd']=='0000' || !$tmp['net_ij_cd']){
//            $tmp['net_ij']  = "�I�[�g";
//        }else{
//            $tmp['net_ij']  = "�}�j���A��";
//            $tmp['net_ij_info'] .= $row['NET_IJ_INFO'];
//        }
    //}
    //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j



    $order_data[$i]  = $tmp;

}
if ($rows === 0)
    $err_message = "�f�[�^�����݂��܂���";

//�X�e�[�g�����g�̊J��
dbFreeResult($result);

//DB close
dbClose($con_utl);
?>
