<?php
ini_set('error_reporting',E_ALL);
if ($mode == '' || $mode == 'clear') {

    $kainno    = '';
    $kain_name = '';
    $tel_no    = '';
    $email     = '';
    // ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/15 chinhhv-ssv
    // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/21 jst-arivazhagan
    //$change_kbn = array();
    //������Ԏw��
    // �����ύX
    $change_kbn_chkd1 = '';
    // �����L�����Z��
    $change_kbn_chkd2 = '';
    // �N���A�{�^�����������ꂽ�ꍇ�A���ׂĂ�I������悤�ɂ���
    //$change_kbn = '0';
    // ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/15 chinhhv-ssv
    // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/05/21 jst-arivazhagan
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

// ��R-#39403_�yH31-0380-001�z������Q���j���[�A���iWEB�j 2020/01/31 sai-shiragiku
    for($i=0; $i<count($order_kbn); $i++){
        $order_kbn[$i] = "";
    }
// ��R-#39403_�yH31-0380-001�z������Q���j���[�A���iWEB�j 2020/01/31 sai-shiragiku
    // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/21 jst-arivazhagan
    //��R-#20773_�h���A�v���J�� 2016/03/16 nul-kai
    // �T�C�g�敪�̃��W�I�{�^���̒l
    // ���ׂ�
    // $site_kbn_chkd0 = 'checked="checked"';
    // // PC
    // $site_kbn_chkd1 = '';
    // // �g��
    // $site_kbn_chkd2 = '';
    // // �A�v��
    // $site_kbn_chkd3 = '';
    // // �N���A�{�^�����������ꂽ�ꍇ�A���ׂĂ�I������悤�ɂ���
    // $s_sitekbn = '0';
   //��R-#20773_�h���A�v���J�� 2016/03/16 nul-kai
   for($i=0; $i<count($site_kbn); $i++){
    $site_kbn[$i] = "";
    }

    //��R-#20773_�h���A�v���J�� 2016/03/16 nul-kai
    // �T�C�g�敪�̃��W�I�{�^���̒l
    // ���ׂ�
    // $net_ij_kbn_chkd0 = 'checked="checked"';
    // // PC
    // $net_ij_kbn_chkd1 = '';
    // // �g��
    // $net_ij_kbn_chkd2 = '';
    // // �A�v��
    // $net_ij_kbn_chkd3 = '';
    // // �N���A�{�^�����������ꂽ�ꍇ�A���ׂĂ�I������悤�ɂ���
    // $s_net_ij_kbn = '0';
    //��R-#20773_�h���A�v���J�� 2016/03/16 nul-kai
    // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/05/21 jst-arivazhagan
    for($i=0; $i<count($net_ij_kbn); $i++){
        $net_ij_kbn[$i] = "";
    }

    for($i=0; $i<count($login_status); $i++){
        $login_status[$i] = "";
    }

    for($i=0; $i<count($odr_form); $i++){
        $odr_form[$i] = "";
    }

}

$cnt=0;
for($i=0; $i<count($order_status); $i++){
    if($order_status[$i] != ""){
        $cnt++;
    }
}
if($cnt==0){
    $order_status[0]    = '1';
}
// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/21 jst-arivazhagan
$cnt=0;
for($i=0; $i<count($site_kbn); $i++){
    if($site_kbn[$i] != ""){
        $cnt++;
    }
}
if($cnt==0){
    $site_kbn[0]    = '1';
    $site_kbn[1]    = '2';
    $site_kbn[2]    = '3';
}

$cnt=0;
for($i=0; $i<count($net_ij_kbn); $i++){
    if($net_ij_kbn[$i] != ""){
        $cnt++;
    }
}
if($cnt==0){
    $net_ij_kbn[0]    = '1';
    $net_ij_kbn[1]    = '2';
}

// $cnt=0;
// for($i=0; $i<count($login_status); $i++){
//     if($login_status[$i] != ""){
//         $cnt++;
//     }
// }
// if($cnt==0){
//     $login_status[0]    = '1';
//     $login_status[1]    = '2';
//     $login_status[2]    = '3';
// }

// $cnt=0;
// for($i=0; $i<count($odr_form); $i++){
//     if($odr_form[$i] != ""){
//         $cnt++;
//     }
// }
// if($cnt==0){
//     $odr_form[0]    = '1';
//     $odr_form[1]    = '2';
//     $odr_form[2]    = '3';
//     $odr_form[3]    = '4';
// }
// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/05/21 jst-arivazhagan
//DB�ڑ�
$con_utl = dbConnect();

// WHERE�吶��
$where = array();
// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/21 jst-arivazhagan
//$where[] = 'a.delete_flg <> 1';
$where[] = "A.del_flg != '1'";
// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/05/21 jst-arivazhagan
//���������J�n��
if ($s_yy != '' && $s_mm != '' && $s_dd != '') {
    $ymdh = sprintf('%04d%02d%02d000000', $s_yy, $s_mm, $s_dd);
    // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/21 jst-arivazhagan
    //$where[] = "a.order_dt >= to_date('$ymdh', 'yyyymmddhh24miss')";
    $where[] = "A.acpt_dt_tm >= to_timestamp('$ymdh', 'yyyymmddhh24miss')";
    // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/05/21 jst-arivazhagan
}

//���������I����
if ($e_yy != '' && $e_mm != '' && $e_dd != '') {
    $ymdh = sprintf('%04d%02d%02d235959', $e_yy, $e_mm, $e_dd);
    // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/21 jst-arivazhagan
    //$where[] = "a.order_dt <= to_date('$ymdh', 'yyyymmddhh24miss')";
    $where[] = "A.acpt_dt_tm <= to_timestamp('$ymdh', 'yyyymmddhh24miss')";
    // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/05/21 jst-arivazhagan
}

//����ԍ�
if ($kainno != '')
    // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/21 jst-arivazhagan
    //$where[] = "a.kainno like ".getSqlValue('%'.$kainno.'%');
    $where[] = " lpad(cast(A.cust_no as VARCHAR), 8,'0') like " .getSqlValue('%' .$kainno. '%');
    // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/05/21 jst-arivazhagan

//��R-#20773_�h���A�v���J�� 2016/03/16 nul-kai
// if($s_sitekbn === '2'){
//     $site_kbn_chkd2 = 'checked="checked"';
//     $where[] = "a.site_kbn = '2'";
// }elseif($s_sitekbn === '1'){
//     $site_kbn_chkd1 = 'checked="checked"';
//     $where[] = "(a.site_kbn = '1' AND a.ODRROUTEDTLKBN <> '03')";
// }elseif($s_sitekbn === '3'){
//     $site_kbn_chkd3 = 'checked="checked"';
//     $where[] = "a.ODRROUTEDTLKBN = '03'";
// }else{
//     $site_kbn_chkd0 = 'checked="checked"';
// }
//��R-#20773_�h���A�v���J�� 2016/03/16 nul-kai
// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/21 jst-arivazhagan
//�T�C�g�敪
if (!empty($site_kbn)) {
	$site_kbn_conditions = "";
	if (in_array('1', $site_kbn)) {
		$site_kbn_conditions = "(A.site_kbn = '1' AND A.route_dtl_kbn != '3')";
	}
	if (in_array('2', $site_kbn)) {
		if ($site_kbn_conditions != ""){
			$site_kbn_conditions = $site_kbn_conditions." OR ";
		}
		$site_kbn_conditions = $site_kbn_conditions." A.site_kbn = '2'";
	}
    if (in_array('3', $site_kbn)) {
		if ($site_kbn_conditions != ""){
			$site_kbn_conditions = $site_kbn_conditions." OR ";
		}
		$site_kbn_conditions = $site_kbn_conditions." (A.site_kbn != '2' AND A.route_dtl_kbn = '3')";
	}
	$where[] ='('.$site_kbn_conditions.')';
}
//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
// if ($NET_IJ_KBN === '1') {
//     $net_ij_kbn_chkd1 = 'checked="checked"';
//     $where[] = "(a.NET_IJ_CD = '0000' or  a.NET_IJ_CD is null)";

// } else if ($NET_IJ_KBN === '2') {
//     $net_ij_kbn_chkd2 = 'checked="checked"';
//     $where[] = " (a.NET_IJ_CD != '0000' and not a.NET_IJ_CD is null)";

// } else {
//     $net_ij_kbn_chkd0 = 'checked="checked"';
// }
// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/05/21 jst-arivazhagan
//���͋敪
if (!empty($net_ij_kbn)) {
	$net_ij_kbn_conditions = "";
	if (in_array('1', $net_ij_kbn)) {
		$net_ij_kbn_conditions = " (A.net_ju_cd = '0000' or  A.net_ju_cd is null or (COALESCE(A.net_ju_cd, '') = '' ))";
	}
	if (in_array('2', $net_ij_kbn)) {
		if ($net_ij_kbn_conditions != ""){
			$net_ij_kbn_conditions = $net_ij_kbn_conditions." OR ";
		}
		$net_ij_kbn_conditions = $net_ij_kbn_conditions." (A.net_ju_cd != '0000' or (A.net_ju_cd is not null and trim(A.net_ju_cd) != ''))";
	}
}
//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j

// ��R-#39403_�yH31-0380-001�z������Q���j���[�A���iWEB�j 2020/01/31 sai-shiragiku
//�敪
if (!empty($order_kbn)) {
	// �敪�̏�����ҏW
	$order_kbn_conditions = "";
	//�敪�E���ϕi�I����
	if (in_array('1', $order_kbn)) {
		//$order_kbn_conditions = " a.REGIST_USER LIKE '%domo%' ";
        $order_kbn_conditions = "  B.cosme_flag = '1' AND B.herb_flag = '0'";
	}
	//�敪�E�����I����
	if (in_array('2', $order_kbn)) {
		if ($order_kbn_conditions != ""){
			//�敪�E���ϕi&�����I����
			$order_kbn_conditions = $order_kbn_conditions." OR ";
		}
		//$order_kbn_conditions = $order_kbn_conditions." a.REGIST_USER LIKE '%chohakusenjin%' ";
        $order_kbn_conditions = $order_kbn_conditions." B.herb_flag = '1' AND B.cosme_flag = '0'";
	}
	//�����̐ݒ�
	$where[] ='('.$order_kbn_conditions.')';
}
// ��R-#39403_�yH31-0380-001�z������Q���j���[�A���iWEB�j 2020/01/31 sai-shiragiku

//��2011/11/04 A-05826 R-#2059_�y�Ǘ��c�[���z���ރh��(����)�������烁�[�����M �Ń��[���A�h���X�ł̌������ł��Ȃ��iul yamashita�j
        // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/21 jst-arivazhagan
		//$noArray = array();
        //�����O
		if ($kain_name != '') {
			$value = $kain_name;
			$value = preg_replace("/^'/", "'%", getSqlValue($value));
			$value = preg_replace("/'$/", "%'", $value);
            // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/21 jst-arivazhagan
			//$noArray[] = "V2.KAIN_NAME LIKE " . $value;
            $where[] = "A.cust_name LIKE " . $value;
            // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/05/21 jst-arivazhagan
		}

        //����ԍ�
		if ($tel_no != '') {
			$value = $tel_no;
			$value = str_replace("-", "", $value);
            // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/21 jst-arivazhagan
			//$noArray[] = "V1.TEL_NO = DBMS_CRYPTO.Hash(to_clob(nvl(" . getSqlValue($value) . ",0)),3)";
            $where[] = "A.tel_no = DBMS_CRYPTO.Hash(to_clob(nvl(" . getSqlValue($value) . ",0)),3)";
            // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/05/21 jst-arivazhagan
		}

        //E���[���A�h���X
		if ($email != '') {
			$value = $email;
			if (strstr($value, "@")) {
				$value = substr($value, 0, strpos($value, "@"));
	        }
			if (strlen($value) > 0) {
			    $value = preg_replace("/^'/", "'%", getSqlValue($value));
			    $value = preg_replace("/'$/", "%'", $value);
				//$noArray[] = "(V1.EMAIL LIKE ".$value." OR V1.M_EMAIL LIKE ".$value.")";
                $where[] = "(A.mail_adr LIKE ".$value.")";
			}
		}
		
		//if (count($noArray)) $where[] = 'b.KAINNO in (SELECT V1.KAINNO FROM Member1_V V1, Member2_V V2 WHERE '.implode(' AND ', $noArray).' AND V1.KAINNO = V2.KAINNO)';
//��2011/11/04 A-05826 R-#2059_�y�Ǘ��c�[���z���ރh��(����)�������烁�[�����M �Ń��[���A�h���X�ł̌������ł��Ȃ��iul yamashita�j

//��
if($mode == 'clear'){
    //$where[] = 'order_status IN (1)';
    $where[] = "A.odr_stat_kbn IN ('1')";
}else{
    if (count($order_status) > 0) {
        //$where[] = 'a.order_status IN ('.implode(', ', $order_status).')';
        $where[] = "A.odr_stat_kbn IN ('".implode("','", $order_status)."')";
    }
}

//������Ԏw��
if ($change_kbn === '1') {
    $change_kbn_chkd1 = 'checked="checked"';
    $where[] = "A.upd_kbn = '1'";

} else if ($change_kbn === '0') {
    $change_kbn_chkd2 = 'checked="checked"';
    $where[] = "A.upd_kbn = '0'";
}else {
    //$change_kbn_chkd2 = 'checked="checked"';
}

//���O�C�����
if (!empty($login_status)) {
	$login_status_conditions = "";
	if (in_array('1', $login_status)) {
		$login_status_conditions = " A.mbr_kbn = '2'";
	}
	if (in_array('2', $login_status)) {
		if ($login_status_conditions != ""){
			$login_status_conditions = $login_status_conditions." OR ";
		}
		$login_status_conditions = $login_status_conditions." (A.mbr_kbn IN ('0','1') AND A.odr_kbn='1' AND A.item_kbn='1') ";
	}
    if (in_array('3', $login_status)) {
		if ($login_status_conditions != ""){
			$login_status_conditions = $login_status_conditions." OR ";
		}
		$login_status_conditions = $login_status_conditions." (A.login_cd is null or (COALESCE(A.login_cd, '') = '' ))";
	}
	$where[] ='('.$login_status_conditions.')';
}

//�����`��
if (!empty($odr_form)) {
	$odr_form_conditions = "";
	if (in_array('1', $odr_form)) {
		$odr_form_conditions = " A.gift_flg = '0'";
	}
	if (in_array('2', $odr_form)) {
		if ($odr_form_conditions != ""){
			$odr_form_conditions = $odr_form_conditions." OR ";
		}
		$odr_form_conditions = $odr_form_conditions." A.gift_flg = '1' ";
	}
    if (in_array('3', $odr_form)) {
		if ($odr_form_conditions != ""){
			$odr_form_conditions = $odr_form_conditions." OR ";
		}
		$odr_form_conditions = $odr_form_conditions." ((A.regular_buy_odr_seq is not null AND trim(A.regular_buy_odr_seq) != '') AND A.item_kbn='1' AND A.odr_kbn='2')";
	}
	$where[] ='('.$odr_form_conditions.')';
    if (in_array('4', $odr_form)) {
		if ($odr_form_conditions != ""){
			$odr_form_conditions = $odr_form_conditions." OR ";
		}
		$odr_form_conditions = $odr_form_conditions." (A.gift_flg = '0' AND (A.regular_buy_odr_seq is not null AND trim(A.regular_buy_odr_seq) != '') AND A.item_kbn='1' AND A.odr_kbn='2')";
	}
	$where[] ='('.$odr_form_conditions.')';
}

//��2015/08/20 R-#18394_�l�b�g����o�^�d�l�����inul-kawanishi�j
//$where[] = "(a.KAIN_KBN is null OR a.KAIN_KBN = '2')";
//��2015/08/20 R-#18394_�l�b�g����o�^�d�l�����inul-kawanishi�j
$where = implode(' AND ', $where);

// //SQL���쐬
// $sql  = "SELECT * FROM (";
// $sql .=    "SELECT ";
// $sql .=        " a.recv_order_id, ";
// $sql .=        " a.site_kbn, ";
// $sql .=        " a.kainno, ";
// $sql .=        " stfunc_ssk(a.tel_no) as tel_no, ";
// $sql .=        " a.netmember_id, ";
// $sql .=        " to_char(a.order_dt, 'YYYY/MM/DD HH24:MI:SS') as order_dt, ";
// $sql .=        " stfunc_ssk(b.kain_name) as kain_name, ";
// $sql .=        " decode(a.site_kbn, 1, stfunc_ssk(b.email), stfunc_ssk(b.m_email)) as email, ";
// $sql .=        " (select sum(price * amount) as sum_price from RecvProduct_Tbl r where r.recv_order_id = a.recv_order_id) as sum_price, ";

// //��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul yoshii�j
// $tmpPrice_OrderId = 'a.recv_order_id';
// $tmpPrice_Sql = '';
// $tmpPrice_Sql .=        " ( ";
// $tmpPrice_Sql .=        " select sum( (s.TANKA * r.amount) * (sy.TAX_RATE + 1) ) as wk_price ";
// $tmpPrice_Sql .=        " from RecvProduct_Tbl r ,sqlshohin_tbl s , system_tbl sy";
// $tmpPrice_Sql .=        " where sy.SITE_KBN='1' ";
// $tmpPrice_Sql .=        " and  r.SHOHIN_CD  = s.SHOHIN_CD ";
// $tmpPrice_Sql .=        " and ( ";
// $tmpPrice_Sql .=        "     ( r.SHOHIN_LEVEL is null     and s.SHOHIN_LEVEL is null ) ";
// $tmpPrice_Sql .=        "  or ( r.SHOHIN_LEVEL is not null and r.SHOHIN_LEVEL = s.SHOHIN_LEVEL ) ";
// $tmpPrice_Sql .=        " ) ";
// $tmpPrice_Sql .=        " and r.recv_order_id = ".$tmpPrice_OrderId ;
// $tmpPrice_Sql .=        " ) as SUM_PRICE2, ";
// $sql .= $tmpPrice_Sql;
// //��2011/10/24 A-03939 R-#1419 ���z�Z�o�Ή��iul yoshii�j

// $sql .=        " a.host_flg, ";
// $sql .=        " a.print_flg, ";
// $sql .=        " a.order_status, ";
// $sql .=        " a.session_id ";

// //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
// $sql .=        ",a.NET_IJ_CD ";
// $sql .=        ",c.NET_IJ_INFO";
// //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j

// //��2011/08/23 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iEC-One hatano�j
// $sql .=        ",a.RESERVE_KBN";
// //��2011/08/23 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iEC-One hatano�j

// //��2012/03/13 R-#3125 ���蕨Web�Ή� uls-motoi
// $sql .=        ",a.GIFT_FLG";
// //��2012/03/13 R-#3125 ���蕨Web�Ή� uls-motoi

// //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
// $sql .=        ",(NVL(a.TOTAL_ORDER_AMOUNT, 0) + NVL(a.TOTAL_ORDER_TAXRATE, 0)) as ORDER_AMOUNT";
// //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)

// //��R-#20773_�h���A�v���J�� 2016/03/16 nul-kai
// $sql .=        ",a.ODRROUTEDTLKBN";
// //��R-#20773_�h���A�v���J�� 2016/03/16 nul-kai
// //��R-#35174_�yH30-0356-001�z�R�{���֌���4�_�Z�b�g_WEB 2019/02/07 nul-nagata
// $sql .=		", a.PAYMENT_NUM";
// $sql .=		", h.REGIST_HISTORY_ID";
// $sql .=		", stfunc_ssk(h.KAIIN_ID) as KAIIN_ID";
// $sql .=		", stfunc_ssk(h.KAIIN_PASS) as KAIIN_PASS";
// $sql .=		", h.CLR_CORP_CD";
// $sql .=		", h.CARD_SEQ";
// $sql .=		", a.CC_TERM";
// $sql .=		", stfunc_ssk(a.CC_NO) as CC_NO";
// //��R-#35174_�yH30-0356-001�z�R�{���֌���4�_�Z�b�g_WEB 2019/02/07 nul-nagata
// //��R-#43112_�yR02-0028-119�z�s��Ή��i���ۉ����j_�����ύX�Ŏx�����@��������J�[�h�ɕύX���ꂽ�ꍇ�ɃI�[�\���擾���Ȃ��͂����A�I�[�\���擾����Ă��� 2020/11/18 saisys-hasegawa
// $sql .=		", chnghst.REGIST_HISTORY_ID      as CHNG_HIST_REGIST_HISTORY_ID";
// $sql .=		", stfunc_ssk(chnghst.KAIIN_ID)   as CHNG_HIST_KAIIN_ID";
// $sql .=		", stfunc_ssk(chnghst.KAIIN_PASS) as CHNG_HIST_KAIIN_PASS";
// $sql .=		", chnghst.CLR_CORP_CD            as CHNG_HIST_CLR_CORP_CD";
// $sql .=		", chnghst.CARD_SEQ               as CHNG_HIST_CARD_SEQ";
// //��R-#43112_�yR02-0028-119�z�s��Ή��i���ۉ����j_�����ύX�Ŏx�����@��������J�[�h�ɕύX���ꂽ�ꍇ�ɃI�[�\���擾���Ȃ��͂����A�I�[�\���擾����Ă��� 2020/11/18 saisys-hasegawa
// // ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/15 chinhhv-ssv
// $changeKbn_Sql = '';
// $changeKbn_Sql .=        " ( ";
// $changeKbn_Sql .=        " select change_kbn ";
// $changeKbn_Sql .=        " from orderchange_tbl";
// $changeKbn_Sql .=        " where ";
// $changeKbn_Sql .=        " recv_change_id = ".$tmpPrice_OrderId;
// $changeKbn_Sql .=        " ) as change_kbn, ";
// $orderChangeDt_Sql = '';
// $orderChangeDt_Sql .=        " ( ";
// $orderChangeDt_Sql .=        " select to_char(order_dt, 'YYYY/MM/DD HH24:MI:SS') as order_dt ";
// $orderChangeDt_Sql .=        " from orderchange_tbl";
// $orderChangeDt_Sql .=        " where ";
// $orderChangeDt_Sql .=        " recv_change_id = ".$tmpPrice_OrderId;
// $orderChangeDt_Sql .=        " ) as order_change_dt, ";
// $paymentChange_Sql = '';
// $paymentChange_Sql .=        " ( ";
// $paymentChange_Sql .=        " SELECT CONCAT(stfunc_ssk(cc_no),CONCAT(',',CONCAT(stfunc_ssk(cc_name),CONCAT(',',CONCAT(cc_term,CONCAT(',',payment_num))))))";
// $paymentChange_Sql .=        " from orderchange_tbl";
// $paymentChange_Sql .=        " where ";
// $paymentChange_Sql .=        " recv_change_id = ".$tmpPrice_OrderId;
// $paymentChange_Sql .=        " ) as data_payment ";
// $sql .= ','.$changeKbn_Sql;
// $sql .= $orderChangeDt_Sql;
// $sql .= $paymentChange_Sql;
// // ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/15 chinhhv-ssv
// //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
// $sql .= " FROM RecvOrder_Tbl a, Member_Tbl b, net_ij_tbl c";
// //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
// //��R-#35174_�yH30-0356-001�z�R�{���֌���4�_�Z�b�g_WEB 2019/02/07 nul-nagata
// $sql .=	" , CARDAPPROVALREGISTHISTORY_TBL h";
// //��R-#35174_�yH30-0356-001�z�R�{���֌���4�_�Z�b�g_WEB 2019/02/07 nul-nagata
// //��R-#43112_�yR02-0028-119�z�s��Ή��i���ۉ����j_�����ύX�Ŏx�����@��������J�[�h�ɕύX���ꂽ�ꍇ�ɃI�[�\���擾���Ȃ��͂����A�I�[�\���擾����Ă��� 2020/11/18 saisys-hasegawa
// $sql .=	" , CARDREGISTHISTORY_TBL chnghst";
// //��R-#43112_�yR02-0028-119�z�s��Ή��i���ۉ����j_�����ύX�Ŏx�����@��������J�[�h�ɕύX���ꂽ�ꍇ�ɃI�[�\���擾���Ȃ��͂����A�I�[�\���擾����Ă��� 2020/11/18 saisys-hasegawa


// $sql .= " WHERE ";
// $sql .=        " a.kainno = b.kainno AND ";

// //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
// $sql .=	" a.NET_IJ_CD = c.NET_IJ_CD(+) AND ";
// //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
// //��R-#35174_�yH30-0356-001�z�R�{���֌���4�_�Z�b�g_WEB 2019/02/07 nul-nagata
// $sql .=	"       to_number(a.RECV_ORDER_ID) = h.ORDER_ID (+) AND ";
// //��R-#35174_�yH30-0356-001�z�R�{���֌���4�_�Z�b�g_WEB 2019/02/07 nul-nagata
// //��R-#43112_�yR02-0028-119�z�s��Ή��i���ۉ����j_�����ύX�Ŏx�����@��������J�[�h�ɕύX���ꂽ�ꍇ�ɃI�[�\���擾���Ȃ��͂����A�I�[�\���擾����Ă��� 2020/11/18 saisys-hasegawa
// $sql .=	"       to_number(a.RECV_ORDER_ID) = chnghst.ORDER_ID (+) AND ";
// //��R-#43112_�yR02-0028-119�z�s��Ή��i���ۉ����j_�����ύX�Ŏx�����@��������J�[�h�ɕύX���ꂽ�ꍇ�ɃI�[�\���擾���Ȃ��͂����A�I�[�\���擾����Ă��� 2020/11/18 saisys-hasegawa

// $sql .= $where;
// $sql .= ") ";
// $sql .= " ORDER BY order_dt desc";
// // ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/15 chinhhv-ssv
// if (count($change_kbn) > 0) {
//     $whereChangeKbn[] = 'change_kbn IN ('.implode(', ', $change_kbn).') ';
//     $sql = 'select * from ('.$sql.') where change_kbn IN ('.implode(', ', $change_kbn).') ';
// }
// ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/15 chinhhv-ssv
$sql  = " SELECT";

    $sql .= " A.odr_seq AS RECV_ORDER_ID,";
    //��������
    $sql .= " A.acpt_dt_tm AS ORDER_DT,";
    //����ԍ�
    $sql .= " A.cust_no AS KAINNO,";
    //�����O
    $sql .= " A.cust_name AS KAIN_NAME,";
    //���͋敪
    $sql .= " A.net_ju_cd AS NET_IJ_CD,";
    //���O�C�����
    //�����`��
    //�}�j���A�����R
    $sql .= " A.net_ju_rsn AS NET_IJ_INFO,";
    //��
    $sql .= " A.odr_stat_kbn AS ORDER_STATUS,";
    //�z�X�g�敪
    $sql .= " A.core_sys_kbn AS HOST_FLG,";
    //��[�o�͋敪
    $sql .= " A.rcv_form_output_kbn AS PRINT_FLG,";
    //�敪
    $sql .= " A.odr_kbn AS ORDER_KBN,";
    //�ύX�敪
    $sql .= " A.upd_kbn AS CHANGE_KBN,";
    
    $sql .= " A.item_kbn AS SHOHIN_TYPE,";
    //�d�b�ԍ�
    $sql .= " A.tel_no AS TEL_NO,";
    //E���[���A�h���X
    $sql .= " A.mail_adr AS EMAIL,";
    //�T�C�g
    
    //����敪
    $sql .= " A.mbr_kbn AS KAIN_KBN,";
    //���O�C���R�[�h
    $sql .= " A.login_cd AS NETMEMBER_ID,";
    //�T�C�g�敪
    $sql .= " A.site_kbn AS SITE_KBN,";
    //�����t���O
    $sql .= " A.gift_flg AS GIFT_FLG,";
    //���ϕi�t���O
    $sql .= " B.cosme_flag AS COSME_FLAG,";
    //�����t���O
    $sql .= " B.herb_flag AS HERB_FLAG,";
    //����w�������A��
    $sql .= " A.regular_buy_odr_seq AS REGULAR_ORDER_ID,";
    //�J�[�h�ԍ��i�J�[�h���j
    $sql .= " A.credit_card_no AS CC_NO,";
    //�L�������i�J�[�h���j
    $sql .= " A.avail_term AS CC_TERM,";
    //�N���W�b�g�J�[�h���`�l�i�J�[�h���j
    $sql .= " A.credit_card_name AS CC_NAME,";
    //���ID�i�J�[�h���j
    $sql .= " A.mbr_cd AS KAIIN_ID,";
    //����p�X���[�h�i�J�[�h���j
    $sql .= " A.mbr_pwd AS KAIIN_PASS,";
    //���������i�x���ύX�J�[�h���j
    $sql .= " A.chng_order_dt AS CHNG_ORDER_DT,";
    //�J�[�h�ԍ��i�x���ύX�J�[�h���j
    $sql .= " A.chng_card_no AS CHNG_HIST_CC_NO,";
    //�L�������i�x���ύX�J�[�h���j
    $sql .= " A.chng_avail_term AS CHNG_HIST_CC_TERM,";
    //�N���W�b�g�J�[�h���`�l�i�x���ύX�J�[�h���j
    $sql .= " A.chng_card_name AS CHNG_HIST_CC_NAME,";
    //���ID�i�x���ύX�J�[�h���j
    $sql .= " A.chng_mbr_cd AS CHNG_HIST_KAIIN_ID,";
    //����p�X���[�h�i�x���ύX�J�[�h���j
    $sql .= " A.chng_mbr_pwd AS CHNG_HIST_KAIIN_PASS,";
    //���ID�iPay���j
    $sql .= " A.trade_cd AS ACCESS_ID,";
    //����p�X���[�h�iPay���j
    $sql .= " A.trade_pwd AS ACCESS_PASS,";
    //�I�[�_�[ID�iPay���j
    $sql .= " A.order_cd AS ORDER_ID,";
    //Amazon�r�����O�A�O���[�����gID�iPay���j
    $sql .= " A.e_pay_account_cd AS EPAYMENT_ID,";
    
    $sql .= " A.route_dtl_kbn AS ODRROUTEDTLKBN,";
    $sql .= " A.hist_seq AS REGIST_HISTORY_ID,";
    $sql .= " A.chng_hist_seq AS CHNG_HIST_REGIST_HISTORY_ID,";
    $sql .= " A.pay_hist_seq AS EPAYMENTHISTORY_ID,";
    $sql .= " A.pay_clr_corp_cd AS EPAYCLR_CORP_CD,";
    $sql .= " A.del_flg AS DELETE_FLAG";
    
$sql .= " FROM";
    $sql .= " ( ";
        $sql .= " SELECT";
            $sql .= " od.odr_seq,";
            $sql .= " od.acpt_dt_tm,";
            $sql .= " od.cust_no,";
            $sql .= " nm.cust_name,";
            $sql .= " ij.net_ju_cd,";
            $sql .= " od.mbr_kbn,";
            $sql .= " od.gift_flg,";
            $sql .= " rb.regular_buy_odr_seq,";
            $sql .= " odd.item_kbn,";
            $sql .= " ac.odr_kbn,";
            $sql .= " ij.net_ju_rsn,";
            $sql .= " od.odr_stat_kbn,";
            $sql .= " od.core_sys_kbn,";
            $sql .= " od.rcv_form_output_kbn,";
            $sql .= " odu.upd_kbn,";
            $sql .= " od.tel_no,";
            $sql .= " od.del_flg,";
            $sql .= " nm.mail_adr,";
            $sql .= " od.site_kbn,";
            $sql .= " od.route_dtl_kbn,";
            $sql .= " od.login_cd,";
            $sql .= " od.credit_card_no,";
            $sql .= " od.avail_term,";
            $sql .= " rb.credit_card_name,";
            $sql .= " ac.hist_seq,";
            $sql .= " ac.mbr_cd,";
            $sql .= " ac.mbr_pwd,";
            $sql .= " odu.acpt_dt_tm AS chng_order_dt,";
            $sql .= " odu.credit_card_no AS chng_card_no,";
            $sql .= " odu.avail_term AS chng_avail_term,";
            $sql .= " odu.credit_card_name AS chng_card_name,";
            $sql .= " ci.hist_seq AS chng_hist_seq,";
            $sql .= " ci.mbr_cd AS chng_mbr_cd,";
            $sql .= " ci.mbr_pwd AS chng_mbr_pwd,";
            $sql .= " pay.hist_seq AS pay_hist_seq,";
            $sql .= " pay.trade_cd,";
            $sql .= " pay.trade_pwd,";
            $sql .= " pay.order_cd,";
            $sql .= " pay.e_pay_account_cd,";
            $sql .= " pay.credit_corp_kbn AS pay_clr_corp_cd ";
        $sql .= " FROM";
            //�����`�[
            $sql .= " f_odr od ";
            //�l�b�g����䒠
            $sql .= " INNER JOIN m_net_mbr nm ";
                //�����`�[.����ԍ�=�l�b�g����䒠.����ԍ��iINNER JOIN�j
                $sql .= " ON od.cust_no = nm.cust_no ";
            //�l�b�gIJ���R�䒠
            $sql .= " LEFT JOIN m_net_ju_rsn ij ";
                //�����`�[.�ۗ��R�[�h=�l�b�gIJ���R�䒠.�l�b�gIJ�R�[�h�iLEFT JOIN�j
                $sql .= " ON od.pend_cd = ij.net_ju_cd ";
            //���F��J�[�h�o�^����
            $sql .= " LEFT JOIN h_approval_card_input ac ";
                // �����`�[.�󒍘A��=���F��J�[�h�o�^����.�����ԍ��iLEFT JOIN�j
                $sql .= " ON od.odr_seq = ac.odr_no ";
            //�J�[�h�o�^����
            $sql .= " LEFT JOIN h_card_input ci ";
                //�����`�[.�󒍘A��=�J�[�h�o�^����.�󒍘A�ԁiLEFT JOIN�j
                $sql .= " ON od.odr_seq = ci.odr_seq ";
            //��������
            $sql .= " LEFT JOIN odr_d odd ";
                //�����`�[.�󒍘A��=��������.�󒍘A�ԁiLEFT JOIN�j
                $sql .= " ON od.odr_seq = odd.odr_seq ";
            //���i�䒠
            $sql .= " LEFT JOIN m_item i ";
                //��������.���i�R�[�h=���i�䒠.���i�R�[�h�iLEFT JOIN�j
                $sql .= " ON odd.item_cd = i.item_cd ";
            //�V�X�e���ݒ�䒠
            //�����ύX�`�[
            $sql .= " LEFT JOIN f_odr_upd odu ";
                $sql .= " ON od.odr_seq = odu.odr_cd ";
            //�d�q���σI�[�\������
            $sql .= " LEFT JOIN h_e_pay_authori pay ";
                //�����`�[.�󒍘A��=�d�q���σI�[�\������.�����ԍ��iLEFT JOIN�j
                $sql .= " ON od.odr_seq = pay.odr_no ";
            //����w���������L�^�`�[
            $sql .= " LEFT JOIN f_regular_buy_odr_info_record rb ";
                //�����`�[.����ԍ�=����w���������L�^�`�[.����ԍ��iLEFT JOIN�j
                $sql .= " ON od.cust_no = rb.cust_no ";
            //����w���������ڍ׋L�^�`�[
            $sql .= " LEFT JOIN f_regular_buy_odr_info_dtl_record rbd ";
                //����w���������L�^�`�[.����w���󒍘A��=����w���������ڍ׋L�^�`�[.����w���󒍘A�ԁiLEFT JOIN�j
                $sql .= " ON rb.regular_buy_odr_seq = rbd.regular_buy_odr_seq ";
            //�I�t���C���p�f�[�^�䒠
            $sql .= " LEFT JOIN m_offline_data of ";
                //����w���������L�^�`�[.����ԍ�=�I�t���C���p�f�[�^�䒠.����ԍ��iLEFT JOIN�j
                $sql .= " ON rb.cust_no = of.cust_no ";
            //�������̓`�[
            $sql .= " LEFT JOIN f_odr_direct oddi ";
                //�����`�[.�󒍘A��=�������̓`�[.�󒍘A�ԁiLEFT JOIN�j
                $sql .= " ON od.odr_seq = oddi.odr_seq";
        //�����`�[.��t�����i�~���j
		$sql .= " ORDER BY od.acpt_dt_tm DESC";
    $sql .= " ) AS A ";
    $sql .= " LEFT JOIN ( ";
        $sql .= " SELECT";
            $sql .= " base.odr_seq";
            $sql .= " , coalesce(ad1.cosme_flag, 0) cosme_flag";
            $sql .= " , coalesce(ad2.herb_flag, 0) herb_flag ";
        $sql .= " FROM";
            $sql .= " ( ";
                $sql .= " SELECT";
                    $sql .= " odr_d.odr_seq ";
                $sql .= " FROM";
                    $sql .= " odr_d ";
                $sql .= " GROUP BY";
                    $sql .= " odr_d.odr_seq";
            $sql .= " ) AS base ";
            $sql .= " LEFT JOIN ( ";
                $sql .= " SELECT";
                    $sql .= " dd.odr_seq";
                    $sql .= " , 1 AS cosme_flag ";
                $sql .= " FROM";
                    $sql .= " odr_d AS dd ";
                    $sql .= " INNER JOIN m_item AS mm ";
                        $sql .= " ON dd.item_cd = mm.item_cd ";
                        $sql .= " AND mm.ope_kbn = '1' ";
                $sql .= " GROUP BY";
                    $sql .= " dd.odr_seq";
            $sql .= " ) AS ad1 ";
                $sql .= " ON base.odr_seq = ad1.odr_seq ";
            $sql .= " LEFT JOIN ( ";
                $sql .= " SELECT";
                    $sql .= " dd.odr_seq";
                    $sql .= " , 1 AS herb_flag ";
                $sql .= " FROM";
                    $sql .= " odr_d AS dd ";
                    $sql .= " inner join m_item AS mm ";
                        $sql .= " ON dd.item_cd = mm.item_cd ";
                        $sql .= " AND mm.ope_kbn = '2' ";
                $sql .= " GROUP BY";
                    $sql .= " dd.odr_seq";
            $sql .= " ) AS ad2 ";
                $sql .= " ON base.odr_seq = ad2.odr_seq";
		$sql .= " ORDER BY base.odr_seq DESC";
    $sql .= " ) AS B ";
        //A.�����A��=B.�����A�ԁiLEFT JOIN�j
        $sql .= " ON A.odr_seq = B.odr_seq";
            $sql .= " WHERE ( ";
                $sql .= $where;
            $sql .= ") ";
//A.��t�����i�~���j
$sql .= " ORDER BY A.acpt_dt_tm DESC";
//SQL�����s����
$result = dbQuery($con_utl, $sql);

//�f�[�^�J�E���g���擾����
//$rows = getNumRows($result, $arr_utl);
$rows = getNumRows($result);

//�f�[�^�擾
$order_data = array();

//��2011/10/20 R-#2024 �y�Ǘ��c�[���z������t�d���̍đ��@�\�����iEC-One hatano�j
$denbun_send_list = 0;
//��2011/10/20 R-#2024 �y�Ǘ��c�[���z������t�d���̍đ��@�\�����iEC-One hatano�j

for ($i = 0; $i < $rows; $i++) {
    //$row = dbFetchRow($result, $i, $arr_utl);
    $row = dbFetchRow($result);
    $tmp = array();

    $tmp['recv_order_id'] = $row['RECV_ORDER_ID'];
    $tmp['order_dt']      = getHtmlEscapedString($row['ORDER_DT']);
    $tmp['kainno']        = getHtmlEscapedString($row['KAINNO']);
    $tmp['kain_name']     = getHtmlEscapedString($row['KAIN_NAME']);
    $tmp['tel_no']        = getHtmlEscapedString($row['TEL_NO']);
    $tmp['email']         = getHtmlEscapedString($row['EMAIL']);

    // ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/15 chinhhv-ssv
    $tmp['mbr_kbn']                 = ($row['KAIN_KBN']);
    $tmp['login_cd']                = ($row['NETMEMBER_ID']);
    $tmp['regular_buy_odr_seq']     = ($row['REGULAR_ORDER_ID']);

    $tmp['change_kbn'] = $row['CHANGE_KBN'];
    $tmp['order_change_dt'] = $row['ORDER_CHANGE_DT'];
    $data_payment_change = explode(',', $row['DATA_PAYMENT']);
    $tmp['change_cc_no'] = isset($data_payment_change[0]) ? trim($data_payment_change[0]) : '';
    $tmp['change_cc_name'] = isset($data_payment_change[1]) ? trim($data_payment_change[1]) : '';
    $tmp['change_cc_term'] = isset($data_payment_change[2]) ? trim($data_payment_change[2]) : '';
    $tmp['change_payment_num'] = isset($data_payment_change[3]) ? trim($data_payment_change[3]) : '';
    // ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/15 chinhhv-ssv

    //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)
    // if (isset($row['ORDER_AMOUNT']) == true && intval($row['ORDER_AMOUNT']) > 0) {
    //     $tmp['sum_price']     = getHtmlEscapedString('\\'.number_format($row['ORDER_AMOUNT']));
    // } else {
    //     $tmp['sum_price']     = getHtmlEscapedString('\\'.number_format($row['SUM_PRICE2']));
    // }
    //��2013/02/06 �y�O�������[�X�zR-#11493_����ő��őΉ��iWEB�Ή��j(ulsystems hatano)

    $tmp['host_flg']      = $row['HOST_FLG'];
    $tmp['print_flg']     = $row['PRINT_FLG'];
    $tmp['order_status']  = $row['ORDER_STATUS'];
    $tmp['session_id']    = $row['SESSION_ID'];
    
    //��R-#20773_�h���A�v���J�� 2016/03/16 nul-kai
    $tmp['site_kbn']      = $row['SITE_KBN'];
    $tmp['route_kbn']     = $row['ODRROUTEDTLKBN'];
    if($tmp['site_kbn'] == '2' ){
        $tmp['site_kbn_nm']   = '�g��';
    }else{
        if($tmp['route_kbn'] == '01' || $tmp['route_kbn'] == ''){
            $tmp['site_kbn_nm']   = 'PC';
        }elseif($tmp['route_kbn'] == '02'){
            $tmp['site_kbn_nm']   = 'SP';
        }elseif($tmp['route_kbn'] == '03'){
            $tmp['site_kbn_nm']   = '�A�v��';
        }
    }
    //��R-#20773_�h���A�v���J�� 2016/03/16 nul-kai

	//��R-#35174_�yH30-0356-001�z�R�{���֌���4�_�Z�b�g_WEB 2019/02/07 nul-nagata
	//$tmp['payment_num']      = getHtmlEscapedString($row['PAYMENT_NUM']);
	if (!is_null($row['REGIST_HISTORY_ID'])) {
		$tmp['kaiin_id']         = getHtmlEscapedString($row['KAIIN_ID']);
		$tmp['kaiin_pass']       = getHtmlEscapedString($row['KAIIN_PASS']);
		$tmp['clr_corp_cd']      = getHtmlEscapedString($row['CLR_CORP_CD']);
		$tmp['card_seq']         = getHtmlEscapedString($row['CARD_SEQ']);
		$tmp['cc_term']          = getHtmlEscapedString($row['CC_TERM']);
		$tmp['cc_no']            = getHtmlEscapedString($row['CC_NO']);
	}
	//��R-#35174_�yH30-0356-001�z�R�{���֌���4�_�Z�b�g_WEB 2019/02/07 nul-nagata

	//��R-#43112_�yR02-0028-119�z�s��Ή��i���ۉ����j_�����ύX�Ŏx�����@��������J�[�h�ɕύX���ꂽ�ꍇ�ɃI�[�\���擾���Ȃ��͂����A�I�[�\���擾����Ă��� 2020/11/18 saisys-hasegawa
	if (!is_null($row['CHNG_HIST_REGIST_HISTORY_ID'])) {
		$tmp['change_kaiin_id']         = getHtmlEscapedString($row['CHNG_HIST_KAIIN_ID']);
		$tmp['change_kaiin_pass']       = getHtmlEscapedString($row['CHNG_HIST_KAIIN_PASS']);
		$tmp['change_clr_corp_cd']      = getHtmlEscapedString($row['CHNG_HIST_CLR_CORP_CD']);
		$tmp['change_card_seq']         = getHtmlEscapedString($row['CHNG_HIST_CARD_SEQ']);
	}
	//��R-#43112_�yR02-0028-119�z�s��Ή��i���ۉ����j_�����ύX�Ŏx�����@��������J�[�h�ɕύX���ꂽ�ꍇ�ɃI�[�\���擾���Ȃ��͂����A�I�[�\���擾����Ă��� 2020/11/18 saisys-hasegawa

    if (!is_null($row['EPAYMENTHISTORY_ID'])) {
		$tmp['elecpay_access_id']         = getHtmlEscapedString($row['ACCESS_ID']);
		$tmp['elecpay_access_pass']       = getHtmlEscapedString($row['ACCESS_PASS']);
		$tmp['elecpay_order_id']      = getHtmlEscapedString($row['ORDER_ID']);
		$tmp['elecpay_epayment_id']         = getHtmlEscapedString($row['EPAYMENT_ID']);
        $tmp['elecpay_clr_corp_cd']         = getHtmlEscapedString($row['EPAYCLR_CORP_CD']);
        $tmp['elecpay_epaymenthistory_id']         = getHtmlEscapedString($row['EPAYMENTHISTORY_ID']);
	}

    //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
    $tmp['net_ij_cd']  = $row['NET_IJ_CD'];

    $tmp['net_ij']  = "";
    $tmp['net_ij_info']  = "";

    if($tmp['net_ij_cd']=='0000' || !$tmp['net_ij_cd']){
        //$tmp['net_ij']  = "�I�[�g";
        $tmp['net_ij']  = "A";
    }else{
        $tmp['net_ij']  = "M";
        //$tmp['net_ij']  = "�}�j���A��";
        $tmp['net_ij_info'] .= $row['NET_IJ_INFO'];
    }
    //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
    //��2011/08/23 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iEC-One hatano�j
    $tmp['reserve_kbn']   = $row['RESERVE_KBN'];
    //��2011/08/23 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iEC-One hatano�j

    //��2014/01/06 R-#12780_WAO�A�g���s�̒����d�����đ��ł���悤�ɂ��� uls-nagata
    // ����̋敪�l�ǉ����������A�d�����M�ҋ@��(flg=0,9)"�ȊO"�ōđ��ł���悤�ɕύX
    if( ($tmp['host_flg'] != '0' && $tmp['host_flg'] != '9') && $tmp['order_status'] == '0'){
        $tmp['denbun_send'] = '1';
    }else{
        $tmp['denbun_send'] = '0';
    }
    $denbun_send_list += $tmp['denbun_send'];
    //��2014/01/06 R-#12780_WAO�A�g���s�̒����d�����đ��ł���悤�ɂ��� uls-nagata

    //��2012/03/13 R-#3125 ���蕨Web�Ή� uls-motoi
    $tmp['gift_flg'] = $row['GIFT_FLG'];
    //��2012/03/13 R-#3125 ���蕨Web�Ή� uls-motoi
    $tmp['cosme_flg'] = $row['COSME_FLAG'];
    $tmp['herb_flg'] = $row['HERB_FLAG'];


    $order_data[$i]  = $tmp;

}
if ($rows === 0)
    $err_message = "�f�[�^�����݂��܂���";

//��2011/10/20 R-#2024 �y�Ǘ��c�[���z������t�d���̍đ��@�\�����iEC-One hatano�j
$order_data[$rows] = $denbun_send_list;
//��2011/10/20 R-#2024 �y�Ǘ��c�[���z������t�d���̍đ��@�\�����iEC-One hatano�j

//�X�e�[�g�����g�̊J��
dbFreeResult($result);

//DB close
dbClose($con_utl);
?>
