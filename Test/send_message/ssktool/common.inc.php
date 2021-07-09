<?php
/**
 *
 * common.inc.php
 * �R���e���c���ʊ֐��t�@�C��
 *
 */

//require_once('cysk.inc.php');
require_once dirname(__FILE__) . '/../CYUtilsCrypt.inc.php';
//require_once dirname(__FILE__) . '/token.inc.php';

// CSRF�΍��p�g�[�N���萔
define( 'DEF_TOKEN', 'ssktoken' );

// ���N�G�X�g�����`�F�b�N�ς݂̂��̂ɂ���
//$_REQUEST = $COM_PARAM;

//UID������
$uid  = "";
$cysk = "";
$pg_param_tmp = "";
if (isset($_pg) && $_pg != "") {
	$pg_param_tmp = "&pg=".$_pg;
}

//DB�ڑ��t���O���utrue�v�̏ꍇ��DB�ڑ����s�Ȃ�
if ($SSK_DB_CONNECT_FLG) {
	//DB�ڑ�
	//$con = dbConnect();
	$con = pdoConnect();
}

$SSK_SYSTEM_STATUS = fncChkMaintenance($con);
//�����e�i���X��
if ($SSK_MAINTE_FLG && $SSK_SYSTEM_STATUS == "9") {
	$maintenance_page = "/maintenance.html";
	$script_name = '';
	if (isset($_SERVER['SCRIPT_NAME'])) {
		$script_name = $_SERVER['SCRIPT_NAME'];
	}

	if ($maintenance_page !== $script_name) {
		//�����e�i���X����ʂ�\��
		header("Location: " . $maintenance_page);
		exit;
	}
}

//include_once $LIB_PATH."/".$SSK_SITE_DIR_NAME."/session.inc.php";

/**
 * ���O�C���ς݂łȂ���΃��O�C����ʂփ��_�C���N�g���ď������I������
 */
function checkMember(){
	global $SSL_URL;
	if( ! loginChk() ){
		header("Location: " . $SSL_URL . "/domo/login/index.html");
		exit;
	}
}

/**
 * SSL�ʐM�łȂ����SSL�v���g�R���ɓ]������BGET�͈����p����POST�͈����p����Ȃ��B
 */
function forceSSL() {
	global $SSK_DC_FLAG;
	if( $SSK_DC_FLAG == true ) {
		if( $_SERVER['SERVER_PORT'] == '80' ){
			$url = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			logDebug(__FUNCTION__.' redirect='.$url);
			header('Location: ' . $url);
			exit;
		}
	}
}


/**
 * MEMBER_ID�擾�@���g�p
 *
 * @param mixed  $con            DB�R�l�N�V����ID
 * @param string $nmid           �l�b�g�����o�[ID
 *
 * @return boolean true=�����Afalse=�G���[
 */
Function fncGetMemberId($con,$nmid) {

	if (!$con) {
		return false;
	}

	$member_id = '';

	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	/* $sql  = "SELECT ";
	$sql .= " MEMBER_ID ";
	$sql .= " FROM MEMBER_TBL ";
	//$sql .= " WHERE NETMEMBER_ID = ".getSqlValue($nmid);
	$sql .= " WHERE NETMEMBER_ID = :bind_nmid";
	//$result = dbQuery($con, $sql); */
	$sql = "SELECT ";
		$sql .= "mbr_seq as MEMBER_ID  ";
	$sql .= "FROM ";
		$sql .= "m_net_mbr  ";
	$sql .= "WHERE ";
		$sql .= "net_mbr_cd = :bind_nmid ";

	//$result = ssk_db_parse($con, $sql);
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
	$result = $con->prepare($sql);
	//ssk_db_bind_by_name($result,":bind_nmid",$nmid,-1);
	$result->bindParam(":bind_nmid", $nmid, PDO::PARAM_STR);
	//ssk_db_execute($result);
	$result->execute();

	//$data_arr = array();
	//$rows = getNumRows($result, $data_arr);
	$rows = $result->rowCount();
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $data_arr);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
		$member_id = $row['MEMBER_ID'];
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//dbFreeResult($result);
	pdoFreeResult($result);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan

	if ($member_id == '' || $member_id == NULL) {
		return false;
	}

	return $member_id;

}

/**
 * ����ŗ��擾
 *
 * @param string $con DB�ڑ�ID
 *
 * @return string ����ŗ�
 */
Function fncGetTax($con) {

	$tax = "";

	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//��2009/03/19 #xxx ���o�C���Ή�(kdl yoshii)
	//$sql = "SELECT TAX_RATE FROM SYSTEM_TBL ";
	//$sql = "SELECT TAX_RATE FROM SYSTEM_TBL where site_kbn='1'";
	//��2009/03/19 #xxx ���o�C���Ή�(kdl yoshii)

	$sql = "SELECT ";
		$sql .= "tax_rate as TAX_RATE  ";
	$sql .= "FROM ";
		$sql .= "m_sys_set  ";
	$sql .= "where ";
		$sql .= "site_kbn = '1' ";
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan

	$result = dbQuery($con, $sql);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//$data_arr = array();
	//$rows = getNumRows($result, $data_arr);
	$rows = getNumRows($result);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $data_arr);
		$row = dbFetchRow($result);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
		$tax = $row['TAX_RATE'];
	}
	dbFreeResult($result);

	return $tax;

}

/**
 * �����ԋL�^�e�[�u���Ƀf�[�^��o�^
 *
 * @param mixed  $con            DB�R�l�N�V����ID
 * @param int    $memid          ����ʔ�
 * @param string $trankbn        �����敪
 * @param string $sesid          �Z�b�V����ID
 * @param string $ordid          ��ID
 * @param string $tran_flg       DB�g�����U�N�V�����t���O
 *
 * @return boolean true=�����Afalse=�G���[
 */
Function fncInsOperetionTracks($con,$memid,$trankbn,$sesid,$ordid='',$tran_flg=null,$error_cd='') {

	global $ERROR_DETAIL, $SITE_KBN;

	if (isset($error_cd) && $error_cd != "") {
		$error_detail = $ERROR_DETAIL[$error_cd];
	} else {
		$error_detail = "";
	}

	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	/* $sql  = "INSERT INTO OPERATIONTRACKS_TBL (";
	$sql .= " MEMBER_ID";
	$sql .= ",TRANSACTION_DT";
	$sql .= ",TRANSACTION_KBN";
	$sql .= ",SESSION_ID";
	if ($ordid != "") {
		$sql .= ",RECV_ORDER_ID";
	}
	if ($error_cd != "") {
		$sql .= ",ERROR_CD";
		$sql .= ",ERROR_DETAILS";
	}
	$sql .= ",SYNC_FLG";
	$sql .= ",SITE_KBN";
	$sql .= ",REGIST_USER";
	$sql .= ",UPDATE_USER";
	$sql .= " ) VALUES ( ";
	$sql .= " :memid";
	$sql .= ",SYSDATE";
	$sql .= ",:trankbn";
	$sql .= ",:sesid";
	if ($ordid != "") {
		$sql .= ",:ordid";
	}
	if ($error_cd != "") {
		$sql .= ",:error_cd";
		$sql .= ",:error_detail";
	}
	$sql .= ",'0'";
	$sql .= ",'".$SITE_KBN."'";
	$sql .= ",'".$_SERVER['SCRIPT_NAME']."'";
	$sql .= ",'".$_SERVER['SCRIPT_NAME']."'";
	$sql .= ")"; */

	$sql  = "INSERT INTO h_operat (";
	$sql .= "  mbr_seq";
	$sql .= ", proc_dt_tm";
	$sql .= ", proc_kbn";
	$sql .= ", session_id";
	if ($ordid != "") {
		$sql .= ", odr_cd";
	}
	if ($error_cd != "") {
		$sql .= ", err_cd";
		$sql .= ", err_dtl";
	}
	$sql .= ", sync_flg";
	$sql .= ", site_kbn";
	$sql .= ", register_user_cd";
	$sql .= ", update_user_cd";
	$sql .= " ) VALUES ( ";
	$sql .= " :memid";
	$sql .= ", CURRENT_TIMESTAMP (0)";
	$sql .= ",:trankbn";
	$sql .= ",:sesid";
	if ($ordid != "") {
		$sql .= ",:ordid";
	}
	if ($error_cd != "") {
		$sql .= ",:error_cd";
		$sql .= ",:error_detail";
	}
	$sql .= ",'0'";
	$sql .= ",'".$SITE_KBN."'";
	$sql .= ",'".$_SERVER['SCRIPT_NAME']."'";
	$sql .= ",'".$_SERVER['SCRIPT_NAME']."'";
	$sql .= ")";
	//$result = dbQuery($con, $sql, $tran_flg);
	//$result = ssk_db_parse($con, $sql);
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
	$result = $con->prepare($sql);
	// ssk_db_bind_by_name($result,":memid",$memid,-1);
	// ssk_db_bind_by_name($result,":trankbn",$trankbn,-1);
	// ssk_db_bind_by_name($result,":sesid",$sesid,-1);
	$result->bindParam(":memid", $memid, PDO::PARAM_INT);
	$result->bindParam(":trankbn", $trankbn, PDO::PARAM_STR);
	$result->bindParam(":sesid", $sesid, PDO::PARAM_STR);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	if ($ordid != "") {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
		// ssk_db_bind_by_name($result,":ordid",$ordid,-1);
		$result->bindParam(":ordid", $ordid, PDO::PARAM_INT);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	}
	if ($error_cd != "") {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
		// ssk_db_bind_by_name($result,":error_cd",$error_cd,-1);
		// ssk_db_bind_by_name($result,":error_detail",$error_detail,-1);
		$result->bindParam(":error_cd", $error_cd, PDO::PARAM_STR);
		$result->bindParam(":error_detail", $error_detail, PDO::PARAM_STR);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//ssk_db_execute($result);
	$result->execute();
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan

	if (!$result) {
		return false;
	} else {
		return true;
	}

}

/**
 * ���O�C����ԃ`�F�b�N
 *
 * @return boolean true=���O�C�����Afalse=�����O�C��
 */
Function fncChkLogin() {

	if (isset($_REQUEST['cysk']) && $_REQUEST['cysk'] != "") {
		return true;
	} else {
		return false;
	}

}

/**
 * ���[�U�[���擾
 *
 * @param mixed  $con            DB�R�l�N�V����ID
 * @param string $nmid           �l�b�g�����o�[ID
 * @param array  $arr_clum_list  �J���������X�g
 *
 * @return array �f�[�^�����݂���ꍇ�̓f�[�^���z��ɓ���
 */
Function fncGetSskMember($con,$nmid,$arr_clum_list) {

	global $salt, $seed, $vector, $dec, $error_code;

	$arr_data_list = array();
	$arr_data_list['FNC_STATUS'] = false;
	$arr_data_list['DATA_ROWS']  = 0;

	if (!$con) {
		return false;
	}

	if (count($arr_clum_list) < 0) {
		return false;
	}

	$constr = " ";

	$sql  = "SELECT ";
	for ($i=0;$i<count($arr_clum_list);$i++) {
		$cl_name = explode("\.",$arr_clum_list[$i]);
		$date_flg = false;
		if ($cl_name[1] == "UPDATE_DT"
			|| $cl_name[1] == "REGIST_DT"
			|| $cl_name[1] == "POINT_YMD"
			|| $cl_name[1] == "LAST_ORDER_RECV_DT"
			|| $cl_name[1] == "LAST_ORDER_DELIVERY_DT"
			|| $cl_name[1] == "LAST_DELIVERY_FINISHED_DT"
			|| $cl_name[1] == "SHIP_DT"
			|| $cl_name[1] == "H_DLV_END_DT"
			|| $cl_name[1] == "LAST_LOGIN_DT") {
			$date_flg = true;
		}
		if ($date_flg)  {
			$sql .= $constr."TO_CHAR(".$arr_clum_list[$i].",'YYYYMMDDHH24MISS') AS ".$cl_name[1];
		} else {
			$sql .= $constr.$arr_clum_list[$i]." AS ".$cl_name[1];
		}
		$constr = ",";
	}
	$sql .= " FROM MEMBER_TBL,WEBPROFILE_TBL";
	$sql .= " WHERE MEMBER_TBL.MEMBER_ID = WEBPROFILE_TBL.MEMBER_ID(+)";
	$sql .= " AND MEMBER_TBL.NETMEMBER_ID = :nmid ";
	$result = ssk_db_parse($con, $sql);
	if (!$result) {
		return $arr_data_list;
	}
	ssk_db_bind_by_name($result, ":nmid", $nmid, -1);
	ssk_db_execute($result);

	$arr = array();
	$rows = getNumRows($result, $arr);

	$arr_data_list['DATA_ROWS']  = $rows;
	if ($rows > 0) {
		$row = dbFetchRow($result, 0, $arr);
		for ($i=0;$i<count($arr_clum_list);$i++) {
			$cl_name = explode("\.",$arr_clum_list[$i]);
			//20070724 �ǉ�
			if ($cl_name[1] == "TEL_NO"
				|| $cl_name[1] == "NETMEMBER_PW"
				|| $cl_name[1] == "KAIN_NAME"
				|| $cl_name[1] == "EMAIL"
				|| $cl_name[1] == "M_EMAIL"
				|| $cl_name[1] == "NAMEKANA"
				|| $cl_name[1] == "NAMEKANJI"
				|| $cl_name[1] == "H_KANA_ADDRESS"
				|| $cl_name[1] == "H_KNJ_ADDRESS"
				|| $cl_name[1] == "H_NOT_CONV"
				|| $cl_name[1] == "B_KNJ_ADDRESS"
				|| $cl_name[1] == "B_NOT_CONV"
				|| $cl_name[1] == "B_TEL_NO"
				|| $cl_name[1] == "BIRTHDAY"
				|| $cl_name[1] == "CC_NO"
				|| $cl_name[1] == "CC_NAME"
				|| $cl_name[1] == "LAST_CC_NO"
				|| $cl_name[1] == "LAST_CC_NAME"
				|| $cl_name[1] == "LAST_TMP_ADDRESS_KANA"
				|| $cl_name[1] == "LAST_TMP_ADDRESS_KANJI") {
				$arr_data_list[$cl_name[1]] = ssk_crypt_decrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, $vector,trim($row[$cl_name[1]]), $dec, $error_code);
			} else {
				$arr_data_list[$cl_name[1]] = $row[$cl_name[1]];
			}
		}
	} else {
		$arr_data_list['FNC_STATUS'] = true;
		$arr_data_list['DATA_ROWS']  = 0;
	}
	dbFreeResult($result);

	return $arr_data_list;

}

/**
 * �|�C���g�擾
 *
 * @param mixed  $con       DB�R�l�N�V����ID
 * @param string $kain_no   ����ԍ�
 * @param string $zan_point �|�C���g
 *
 * @return int �����Z��̃|�C���g
 */
Function fncGetSskPoint($con,$kain_no,$zan_point=0) {

	if (!$con) {
		return false;
	}

	$point = $zan_point;
	if (strlen($point) <= 0) {
		$point = 0;
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	/* $sql  = "SELECT POINT, OPOINT, UPOINT ";
	$sql .= "FROM RECVORDER_TBL ";
	//$sql .= "WHERE KAINNO = ".getSqlValue($kain_no)." ";
	$sql .= "WHERE KAINNO = :kain_no ";
	$sql .= "AND HOST_FLG = '0' ";
	$sql .= "AND DELETE_FLG = '0' ";
	//$result = dbQuery($con, $sql);
	$result = ssk_db_parse($con, $sql);
	ssk_db_bind_by_name($result,":kain_no",$kain_no,-1);
	ssk_db_execute($result); */

	$sql = "SELECT ";
		$sql .= "accumulation_point as POINT ";
		$sql .= ", this_time_buy_point as OPOINT ";
		$sql .= ", this_time_use_point as UPOINT  ";
	$sql .= "FROM ";
		$sql .= "f_odr_h  ";
	$sql .= "WHERE ";
		$sql .= "cust_no = :kain_no ";
		$sql .= "AND core_sys_kbn = '0'  ";
		$sql .= "AND del_flg = '0' ";

		$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
		$result = $con->prepare($sql);
		$result->bindParam(":kain_no", $kain_no, PDO::PARAM_INT);
		$result->execute();	
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	if (!$result) {
		return false;
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//$arr = array();
	//$rows = getNumRows($result, $arr);
	$rows = $result->rowCount();
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $arr);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
//		$point  = $row['POINT'];
		$opoint = $row['OPOINT'];
		$upoint = $row['UPOINT'];

		$point += $opoint;
		$point -= $upoint;
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//dbFreeResult($result);
	pdoFreeResult($result);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	return $point;
}

/**
 * ����擾
 *
 * @return string generation
 */
function fncGetGeneration() {

	global $CARRIER_ID,$USER_AGENT_DEF;

	$generation = "";

	$user_agent = $USER_AGENT_DEF;

/*
	if ($mobile_name == "V802SE") {
		$generation = "W";
	} else*/
	if (preg_match("/^Vodafone/i", $user_agent)) {
		$generation = "3GC";
	} elseif (preg_match("/^MOT/i", $user_agent)) {
		$generation = "3GC";
	} elseif (preg_match("/^SoftBank/i", $user_agent)) {
		$generation = "3GC";
	} elseif (preg_match("/^J-PHONE\/9./i", $user_agent)) {
		$generation = "3GC";
	} elseif (preg_match("/^J-PHONE\/5./i", $user_agent)) {
		$generation = "W";
	} elseif (preg_match("/^J-PHONE\/4./i", $user_agent)) {
		$generation = "P";
	} elseif (preg_match("/^J-PHONE\/3./i", $user_agent)) {
		$generation = "C";
	} elseif (preg_match("/^J-PHONE\/2./i", $user_agent)) {
		$generation = "C";
	}

	return $generation;
}

/**
 * mailto�擾
 *
 * @param string $to			TO
 * @param string $subject	����
 * @param string $body		�{��
 * @param string $link_name	�����N��
 *
 * @return string mailto
 */
Function fncGetMailto($to, $subject, $body, $link_name) {

	global $CARRIER_ID,$USER_AGENT_DEF;

	$mailto = "";

	// �[������擾
	$generation = fncGetGeneration();

	//���p�J�i��S�p�J�i�ɕϊ�����
	$subject = mb_convert_kana($subject, "KV");
	$body = mb_convert_kana($body, "KV");

	if ($CARRIER_ID == "i" || $CARRIER_ID == "e") {
		$subject = urlencode($subject);
		$body = urlencode($body);
	}

	$mailto .= $to;

	$mailbody = "";

	//20070313 odakura SoftbankC�^(J-SH04)�̃��[���[�N��Subject�ݒ���Ή�
	if ($CARRIER_ID == "v" && $generation == "C") {
		$subject = '';
	}

	if ($CARRIER_ID == "i" || $CARRIER_ID == "e" || ($CARRIER_ID == "v" && $generation == "3GC")) {
		$connect = "?";
		if ($subject != "") {
			$mailto .= $connect . "subject=" . $subject;
			$connect = "&";
		}
		if ($body != "") {
			$mailto .= $connect . "body=" . $body;
			$connect = "&";
		}
	} else {
		$connect = "?";
		if ($subject != "") {
			$mailto .= $connect . "subject=" . $subject;
			$connect = "&";
		}
		if ($body != "") {
			$mailbody .= " mailbody=\"" . $body . "\"";
			$connect = "&";
		}
	}

		$mailto = "<a href=\"mailto:" . $mailto . "\"" . $mailbody . ">" . $link_name . "</a>";

	return $mailto;
}

/**
 * �����e�i���X�E�I�t���C���`�F�b�N
 *
 * @param string $con DB�ڑ�ID
 *
 * @return string �X�e�[�^�X
 */
Function fncChkMaintenance($con=false) {

	$status = "1";

	$con_flg = false;

	if (!$con) {
		//DB�ڑ�(�֐����݂̂Ŏg�p)
		$con = dbConnect();
		$con_flg = true;
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	/* //��2009/03/19 #xxx ���o�C���Ή�(kdl yoshii)
	//$sql = "SELECT STATUS FROM SYSTEM_TBL ";
	$sql = "SELECT STATUS FROM SYSTEM_TBL where site_kbn='1'";
	//��2009/03/19 #xxx ���o�C���Ή�(kdl yoshii)
 */
	$sql = "SELECT ";
		$sql .= "stat_kbn as STATUS  ";
	$sql .= "FROM ";
		$sql .= "m_sys_set  ";
	$sql .= "where ";
		$sql .= "site_kbn = '1' ";
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan

	$result = dbQuery($con, $sql);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//$data_arr = array();
	//$rows = getNumRows($result, $data_arr);
	$rows = getNumRows($result);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $data_arr);
		$row = dbFetchRow($result);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
		$status = $row['STATUS'];
	}
	dbFreeResult($result);

	if ($con_flg) {
		//DB�ؒf
		dbClose($con);
	}

	return $status;

}

/**
 * �I�t���C�������b�Z�[�W�擾
 *
 * @param string $con DB�ڑ�ID
 *
 * @return string ���b�Z�[�W
 */
Function fncGetOfflineMessage($con=false) {

	global $getDateyyyymmddhhiiss, $OFFLINE_MESSAGE_ID;

	$offline_messag = array();

	$con_flg = false;

	if (!$con) {
		//DB�ڑ�(�֐����݂̂Ŏg�p)
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
		//$con = dbConnect();
		$con = pdoConnect();
		$con_flg = true;
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	/* $sql  = "SELECT MESSAGE_TITLE, MESSAGE_BODY FROM MSTMESSAGE_TBL ";
	$sql .= "WHERE DISP_FLG = 1 ";
	//$sql .= "AND TO_CHAR(START_DT, 'YYYYMMDDHH24MISS') <= " . getSqlValue($getDateyyyymmddhhiiss) . " ";
	$sql .= "AND TO_CHAR(START_DT, 'YYYYMMDDHH24MISS') <= :yyymmddhhiiss ";
	//$sql .= "AND TO_CHAR(END_DT, 'YYYYMMDDHH24MISS') >= " . getSqlValue($getDateyyyymmddhhiiss) . " ";
	$sql .= "AND TO_CHAR(END_DT, 'YYYYMMDDHH24MISS') >= :yyymmddhhiiss ";
	//$sql .= "AND MESSAGE_ID = " . getSqlValueNum($OFFLINE_MESSAGE_ID);
	$sql .= "AND MESSAGE_ID = :OFFLINE_MESSAGE_ID"; */

	$sql = "SELECT ";
		$sql .= "msg_title as MESSAGE_TITLE ";
		$sql .= ", msg_body_letter as MESSAGE_BODY  ";
	$sql .= "FROM ";
		$sql .= "m_msg  ";
	$sql .= "WHERE ";
		$sql .= "disp_flg = 1  ";
		$sql .= "AND TO_CHAR(disp_start_dt_tm, 'YYYYMMDDHH24MISS') <= :yyymmddhhiiss  ";
		$sql .= "AND TO_CHAR(disp_end_dt_tm, 'YYYYMMDDHH24MISS') >= :yyymmddhhiiss  ";
		$sql .= "AND msg_seq = :OFFLINE_MESSAGE_ID ";
	//$result = dbQuery($con, $sql);
	//$result = ssk_db_parse($con, $sql);
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
    $result = $con->prepare($sql);
	// ssk_db_bind_by_name($result,":yyymmddhhiiss",$getDateyyyymmddhhiiss,-1);
	// ssk_db_bind_by_name($result,":OFFLINE_MESSAGE_ID",$OFFLINE_MESSAGE_ID,-1);
	$result->bindParam(":yyymmddhhiiss", $getDateyyyymmddhhiiss, PDO::PARAM_STR );
	$result->bindParam(":OFFLINE_MESSAGE_ID", $OFFLINE_MESSAGE_ID, PDO::PARAM_STR );
	//ssk_db_execute($result);
	$result->execute();
	//$data_arr = array();
	//$rows = getNumRows($result, $data_arr);
	$rows = $result->rowCount();
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $data_arr);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
		$offline_messag['title'] = $row['MESSAGE_TITLE'];
		$offline_messag['body'] = $row['MESSAGE_BODY'];
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//dbFreeResult($result);
	pdoFreeResult($result);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan

	if ($con_flg) {
		//DB�ؒf
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
		//dbClose($con);
		pdoClose($con);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	}

	return $offline_messag;

}

/**
 * �a��N�����̐��������`�F�b�N
 *
 * @param mixed  $con        DB�R�l�N�V����ID
 * @param string $nengo      �N���t���O(0:���a�A1:�吳�A2:����)
 * @param string $comp_date  �a��N����(YYMMDD)
 *
 * @return boolean true=����Afalse=�G���[
 */
Function fncChkBirth($con,$nengo,$comp_date) {

	global $SSK_ARR_BIRTH_CHK_DATE_FROM;
	global $SSK_ARR_BIRTH_CHK_DATE_TO;
	global $SSK_ARR_BIRTH_CHK_WAREKI_TO;

	if ($nengo == "" || $comp_date == "") {
		return false;
	}

	if (strlen($comp_date) != 6 || !is_numeric($comp_date)) {
		return false;
	}

	$chkDateFrom = $SSK_ARR_BIRTH_CHK_DATE_FROM[$nengo];
	$chkDateTo   = $SSK_ARR_BIRTH_CHK_DATE_TO[$nengo];
	$WarekiTo   = $SSK_ARR_BIRTH_CHK_WAREKI_TO[$nengo];

	if ($chkDateTo == "") {
		$chkDateTo = date('Ymd');
	}
	if ($WarekiTo == "") {
		$WarekiTo = intval(date('Y')) - intval(substr($chkDateFrom,0,4)) + 1;
		//20�ΑΉ��́H
	}

	$chkFromYear  = intval(substr($chkDateFrom,0,4));
	$chkFromMonth = intval(substr($chkDateFrom,4,2));
	$chkFromDay   = intval(substr($chkDateFrom,6,2));

	$chkToYear  = intval(substr($chkDateTo,0,4));
	$chkToMonth = intval(substr($chkDateTo,4,2));
	$chkToDay   = intval(substr($chkDateTo,6,2));

	//���͂��ꂽ���N����(�a��R�[�h + �a��N + MMDD)
	$compYear  = intval(substr($comp_date,0,2));
	$compMonth = intval(substr($comp_date,2,2));
	$compDay   = intval(substr($comp_date,4,2));

	if ($compYear > $WarekiTo || $compYear == "00") {
		return false;
	}

	if (($compYear == $WarekiTo) && ($compMonth > $chkToMonth)) {
		//���N�����𐳂������͂��������B
		return false;
	} else if (($compYear == $WarekiTo) && ($compMonth == $chkToMonth) && ($compDay > $chkToDay)) {
		//���N�����𐳂������͂��������B
		return false;
	} else if (($compYear == 1) && ($compMonth < $chkFromMonth)) {
		//���N�����𐳂������͂��������B
		return false;
	} else if (($compYear == 1) && ($compMonth == $chkFromMonth) && ($compDay < $chkFromDay)) {
		//���N�����𐳂������͂��������B
		return false;
	}

	//�G���[���Ȃ��ꍇ�͓��t�Ó����`�F�b�N
	$compYear = $compYear + ($chkFromYear - 1);

	if (!checkdate($compMonth, $compDay, $compYear)) {
		return false;
	}

	return true;
}

/**
 * �d�b�ԍ��̐��������`�F�b�N
 *
 * @param mixed  $con        DB�R�l�N�V����ID
 * @param string $strTelNO   �d�b�ԍ�
 *
 * @return boolean true=����Afalse=�G���[
 */
Function fncChkTelNo($con,$strTelNO, $strict = false) {

logDebug(__FUNCTION__."($strTelNO)");
	$intLength = strlen($strTelNO);

	if ($intLength < 10) {
		//�d�b�ԍ��̌���������܂���
		return false;
	} elseif ($intLength > 13) {
		//�d�b�ԍ��̌������������܂�
		return false;
	}

	if (substr($strTelNO,0,1) != "0") {
		//�s�O�ǔԂ�����͂��ĉ�����
		return false;
	}

	//�u-�v�𔲂��Đ��l�`�F�b�N
	$chk_telno = str_replace("-","",$strTelNO);
	if (!is_numeric($chk_telno)) {
		return false;
	}

	$strTelNoPtn = "";
	for ($i=0;$i<$intLength;$i++) {
		$strTelNO_WR = substr($strTelNO,$i,1);
		if (is_numeric($strTelNO_WR)) {
			$strTelNoPtn .= "*";
		} elseif($strTelNO_WR == "-") {
			$strTelNoPtn .= "-";
		}
	}

	$strShigai = "";

	switch ($strTelNoPtn) {
		case "**-****-****":
			$strShigai = substr($strTelNO,0,2);
			break;
		case "***-***-****":
			switch (substr($strTelNO,0,3)) {
				case "010":
				case "020":
				case "030":
				case "040":
				case "050":
				case "060":
				case "070":
				case "080":
				case "090":
					//�d�b�ԍ��͐���������܂���
					return false;
					break;
				default:
					$strShigai = substr($strTelNO,0,3);
					break;
			}
			break;
		case "***-****-****":
			switch (substr($strTelNO,0,3)) {
				case "050":
				case "060":
				case "070":
				case "080":
				case "090":
					$strShigai = "";
					break;
				case "010":
				case "020":
				case "030":
				case "040":
					//�d�b�ԍ��͐���������܂���
					return false;
					break;
				default:
					//�d�b�ԍ��͐���������܂���
					return false;
					break;
			}
			break;
		case "****-**-****":
			$strShigai = substr($strTelNO,0,4);
			break;
		case "****-***-***":
			if (substr($strTelNO,0,4) != "0120") {
				//�d�b�ԍ��͐���������܂���
				return false;
			}
			$strShigai = "";
			break;
		case "*****-*-****":
			$strShigai = substr($strTelNO,0,5);
			break;
		case "******-****":
			switch (substr($strTelNO,0,3)) {
				case "010":
				case "020":
				case "030":
				case "040":
				case "050":
				case "060":
				case "070":
				case "080":
				case "090":
					//�d�b�ԍ��͐���������܂���
					return false;
					break;
				default:
					//�d�b�ԍ��͐���������܂���
					$strShigai = substr($strTelNO,0,6);
					break;
			}
			break;
		case "**-***-****":
			$strShigai = substr($strTelNO,0,2);
			break;
		case "****-*-****":
			$strShigai = substr($strTelNO,0,4);
			break;
		default:
			//�d�b�ԍ��͐���������܂���
			return false;
			break;
	}

	if ($strShigai == "") {
		//�h�o�d�b�A�o�g�r�A�g�ѓd�b�Ȃǂ͎s�O�ǔԂ̃`�F�b�N�͂��Ȃ�
		return true;
	}
	elseif ($strict) {
		//���݂���s�O�ǔԂ��`�F�b�N����
		if (fncShigaiCntGet($con,$strShigai) == 0) {
			logDebug(__FUNCTION__.":�d�b�ԍ��ɓ��͂���Ă���s�O�ǔԂ͑��݂��܂���(".$strShigai.")");
			return false;
		}
	}

	return true;

}

/**
 * �s�O�ǔԂ̂̐��������`�F�b�N
 *
 * @param mixed  $con          DB�R�l�N�V����ID
 * @param string $strShigai   �d�b�ԍ�(�s�O�ǔ�)
 *
 * @return int   �f�[�^����
 */
Function fncShigaiCntGet($con,$strShigai) {

	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	/* //$sql = "SELECT SHIGAI FROM SHIGAI_TBL WHERE SHIGAI = ".getSqlValue($strShigai);
	$sql = "SELECT SHIGAI FROM SHIGAI_TBL WHERE SHIGAI = :strShigai";
	//$result = dbQuery($con, $sql);
	$result = ssk_db_parse($con, $sql);
	ssk_db_bind_by_name($result,":strShigai",$strShigai,-1);
	ssk_db_execute($result);
	$data_arr = array();
	$rows = getNumRows($result, $data_arr); */

	$sql = "SELECT ";
		$sql .= "area_tel_no as SHIGAI  ";
	$sql .= "FROM ";
		$sql .= "m_area_tel_no  ";
	$sql .= "WHERE ";
		$sql .= "area_tel_no = :strShigai ";
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
	$result = $con->prepare($sql);
	$result->bindParam(":strShigai", $strShigai, PDO::PARAM_STR );
	$result->execute();
	$rows = $result->rowCount();
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan

	if ($rows <= 0) {
		return "0";
	} else {
		return $rows;
	}

}

/**
 * �����̓��̓`�F�b�N�i�S�p7�����ȓ��j
 *
 * @param string $first_name   ���i���O�j
 * @param string $name         ���i���O�j
 *
 * @return boolean true=����Afalse=�G���[
 */
Function fncChkName($first_name, $name){

	$err_name = 0;

	$chk_first_name = mb_convert_kana($first_name, 'KVRN');
	$chk_name       = mb_convert_kana($name, 'KVRN');

	if ($first_name =="" || $first_name != $chk_first_name) {
		$err_name++;
	}
	if ($name =="" || $name != $chk_name) {
		$err_name++;
	}
	if ((strlen($first_name) + strlen($name)) > 14 ){
		$err_name++;
	}

	if ($err_name > 0) {
		return false;
	}
	return true;
}

/**
 * ����(�ӂ肪��)�̓��̓`�F�b�N�i�S�p�Ђ炪��17�����ȓ��j
 *
 * @param string $first_name_fkana   ���i���O�j
 * @param string $name_fkana         ���i���O�j
 *
 * @return boolean true=����Afalse=�G���[
 */
Function fncChkFuriganaName($first_name_fkana, $name_fkana) {

	$err_name_fkana = 0;

	//�S�p�ӂ肪�Ȕ���
	if (!mb_ereg("^[��-��]+$", $first_name_fkana)) {
		$err_name_fkana++;
	}
	if (!mb_ereg("^[��-��]+$", $name_fkana)) {
		$err_name_fkana++;
	}
	if ((mb_strlen($first_name_fkana) + mb_strlen($name_fkana)) > 17 ){
		$err_name_fkana++;
	}
	if ($err_name_fkana > 0) {
		return false;
	}
	return true;
}

/**
 * URL�ϊ��֐�
 *
 * @param string $text	�Ώە�����
 *
 * @return string		URL�ϊ���̕�����
 */
Function fncChangeDomain($text) {

	global $CY_TEST_FLAG;
	global $HONBAN_DOMAIN_I;
	global $HONBAN_DOMAIN_E;
	global $HONBAN_DOMAIN_V;
	global $HONBAN_DOMAIN_W;
	global $TEST_DOMAIN_I;
	global $TEST_DOMAIN_E;
	global $TEST_DOMAIN_V;
	global $TEST_DOMAIN_W;
	global $SUBSTITUTION_TOPURL;
	global $SUBSTITUTION_BASEURL;
	global $SUBSTITUTION_SSLBASEURL;
	global $SUBSTITUTION_QPARAM;
	global $SSK_TOP_FREE;
	global $ROOT_URL;
	global $SSL_URL;
	global $URL_PARAM;

	if ($CY_TEST_FLAG == true) {
		$text = str_replace($HONBAN_DOMAIN_I, $TEST_DOMAIN_I, $text);
		$text = str_replace($HONBAN_DOMAIN_E, $TEST_DOMAIN_E, $text);
		$text = str_replace($HONBAN_DOMAIN_V, $TEST_DOMAIN_V, $text);
		$text = str_replace($HONBAN_DOMAIN_W, $TEST_DOMAIN_W, $text);
	} else {
		$text = str_replace($TEST_DOMAIN_I, $HONBAN_DOMAIN_I, $text);
		$text = str_replace($TEST_DOMAIN_E, $HONBAN_DOMAIN_E, $text);
		$text = str_replace($TEST_DOMAIN_V, $HONBAN_DOMAIN_V, $text);
		$text = str_replace($TEST_DOMAIN_W, $HONBAN_DOMAIN_W, $text);
	}

	$text = str_replace($SUBSTITUTION_TOPURL, $SSK_TOP_FREE, $text);
	$text = str_replace($SUBSTITUTION_BASEURL, $ROOT_URL. "/", $text);
	$text = str_replace($SUBSTITUTION_SSLBASEURL, $SSL_URL. "/", $text);
	$text = str_replace($SUBSTITUTION_QPARAM, $URL_PARAM, $text);

	return $text;
}

/**
 * �G�����ϊ��֐�
 *
 * @param string $text	�Ώە�����
 *
 * @return string		�G�����ϊ���̕�����
 */
Function fncChangeEmoji($text) {

	global $EMOJI;

//	while (preg_match("/^.*?__(.*?)__.*$/", $text, $emoji)) {
        while (preg_match("/__(.*?)__/", $text, $emoji)) {
		$text = str_replace("__" . $emoji[1] . "__", $EMOJI[$emoji[1]], $text);

	}

	return $text;
}

/**
 * �C���[�W�^�O�擾�֐�
 *
 * @param string  $path			�摜�p�X
 * @param string  $alt			alt����
 * @param int     $pw_size		�����T�C�Y
 * @param int     $ref_size		referrer�T�C�Y
 * @param string  $align		align
 * @param boolean $xhtml_flg	XHTML�\��
 * @param boolean $limit_flg	LIMIT�p�����[�^�ݒ�
 * @param int     $image_num	�摜��
 *
 * @return string			�C���[�W�^�O
 */
Function fncGetImageTag($path, $alt = "�ďt�ِ���", $pw_size = "", $ref_size = "4000", $align = "", $xhtml_flg = false, $limit_flg = false, $image_num = "0") {

	global $PFIT_ROOT_URL;
	global $IMAGE_DIR;
	global $CARRIER_ID;
	global $IMAGE_EXTENTION;
	global $IMAGE_EXTENTION2;
	global $TMP_GROUP;
	global $IMAGE_PW_SIZE;
	global $IMAGE_REF_SIZE;
	global $browserCacheSize;

	$image_tag = "";
	$extention = array('jpg','jpeg','gif','png','jpg');

	if ($pw_size == "") {
		$pw_size = $IMAGE_PW_SIZE;
	}

	for( $i = 0; $i < count($extention) - 1; $i++)
	{
		if (file_exists($IMAGE_DIR . "/" . $path) == false)
		{
			$path = str_replace($extention[$i], $extention[$i+1], $path);
		}
		else
		{
			break;
		}
	}

	$limit_prm = 0;
	if ($limit_flg == true && $image_num > 0) {
		$limit_prm = floor(($browserCacheSize * 1000 - $IMAGE_REF_SIZE) / $image_num);
	}

	//-----------------------------------------------------------
	//news�Acampaign�Ɋւ��Ă̓��[�J���t�@�C�������݂��Ȃ��̂�
	//���̂܂܃^�O�𐶐�����
	//-----------------------------------------------------------
	$img_disp_flag = false;
	if(preg_match("/^news\//", $path) || preg_match("/^campaign\//", $path)){
		$img_disp_flag = true;
	} else {
		$img_disp_flag = file_exists($IMAGE_DIR . "/" . $path);
	}

	if ($img_disp_flag) {
		$image_tag  = "<img src=\"" . $PFIT_ROOT_URL . "/" . $path . "?size=" . $pw_size . "pw";
		if ($limit_prm > 0) {
			$image_tag .= "&limit=" . $limit_prm;
		} else if ($ref_size > 0) {
			$image_tag .= "&referrerSize=" . $ref_size;
		}
		$image_tag .= "\" alt=\"" . strip_tags($alt) . "\"";
		if ($xhtml_flg == true && $align != "") {
			if ($CARRIER_ID == "e") {
				$image_tag .= " align=\"".$align."\" vspace=\"0\" hspace=\"0\"";
			} else {
				$image_tag .= " style=\"float:".$align.";margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px\"";
			}
		} else if ($align != "") {
			$image_tag .= " align=\"".$align."\" vspace=\"0\" hspace=\"0\"";
		}
		$image_tag .= ">";
	}

	return $image_tag;
}

/**
 * �C���[�W�^�O�擾�֐��i�T�C�Y�w��t���j
 *
 * �E�T�C�Y�l���w�肵�ă^�O���쐬
 * �E�u���E�U�L���b�V�����m�F���čő���̐��l�������w��
 *
 * @param string  $path			�摜�p�X
 * @param string  $alt			alt����
 * @param int     $pw_size		�����T�C�Y
 * @param int     $ref_size		referrer�T�C�Y
 * @param string  $align		align
 * @param boolean $xhtml_flg	XHTML�\��
 * @param boolean $limit_flg	LIMIT�p�����[�^�ݒ�
 * @param int     $image_num	�摜��
 * @param int     $limit_size  $image_num>0�̂Ƃ��̓T�C�Y����(limit=$limit_size)�A����ȊO�̂Ƃ��͗��p�ς݃T�C�Y�Ƃ��g�p����B
 *
 * @return string			�C���[�W�^�O
 */
Function fncGetImageLimitTag($path, $alt = "�ďt�ِ���", $pw_size = "", $ref_size = "4000", $align = "", $xhtml_flg = false, $limit_flg = false, $image_num = "0", $limit_size = "0") {

	global $PFIT_ROOT_URL;
	global $IMAGE_DIR;
	global $CARRIER_ID;
	global $IMAGE_EXTENTION;
	global $IMAGE_EXTENTION2;
	global $TMP_GROUP;
	global $IMAGE_PW_SIZE;
	global $IMAGE_REF_SIZE;
	global $browserCacheSize;

	$image_tag = "";
	$extention = array('jpg','jpeg','gif','png');

	if ($pw_size == "") {
		$pw_size = $IMAGE_PW_SIZE;
	}

	for( $i = 0; $i < count($extention) - 1; $i++)
	{
		if (file_exists($IMAGE_DIR . "/" . $path) == false)
		{
			$path = str_replace($extention[$i], $extention[$i+1], $path);
		}
		else
		{
			break;
		}
	}

	$limit_prm = 0;
	if ($limit_flg == true) {
		if($image_num > 0) {
			$limit_prm = floor(($browserCacheSize * 1000 - $IMAGE_REF_SIZE - $limit_size) / $image_num);
		}
		else if($limit_size > 0)
		{
			$limit_prm = $limit_size;
		}
	}

	if (file_exists($IMAGE_DIR . "/" . $path) == true) {
		$image_tag  = "<img src=\"" . $PFIT_ROOT_URL . "/" . $path . "?size=" . $pw_size . "pw";
		if ($limit_prm > 0) {
			$image_tag .= "&limit=" . $limit_prm;
		} else if ($ref_size > 0) {
			$image_tag .= "&referrerSize=" . $ref_size;
		}
		$image_tag .= "\" alt=\"" . strip_tags($alt) . "\"";
		if ($xhtml_flg == true && $align != "") {
			if ($CARRIER_ID == "e") {
				$image_tag .= " align=\"".$align."\" vspace=\"0\" hspace=\"0\"";
			} else {
				$image_tag .= " style=\"float:".$align.";margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px\"";
			}
		} else if ($align != "") {
			$image_tag .= " align=\"".$align."\" vspace=\"0\" hspace=\"0\"";
		}
		$image_tag .= ">";
	}

	return $image_tag;
}

/**
 * sendMail()
 * ���[�����M
 *
 * @patam	string $host		SMTP�z�X�g
 * @patam	string $to			TO���[���A�h���X
 * @patam	string $subject	����
 * @patam	string $body		�{��
 * @patam	string $from		FROM���[���A�h���X
 * @patam	string $user		SMTP�F�ؗp���[�U�[
 * @patam	string $password	SMTP�F�ؗp�p�X���[�h

 * @return	boolean true=����Afalse=�G���[
 */
function sendMail($host, $to, $subject, $body, $from, $user = null, $password = null, $to_nm = null, $cc_nm = null,$bcc_nm = null) {

logDebug(__FUNCTION__.' $host='.$host);
logDebug(__FUNCTION__.' $to='.$to);
logDebug(__FUNCTION__.' $subject='.$subject);
logDebug(__FUNCTION__.' $body='.$body);
logDebug(__FUNCTION__.' $from='.$from);
logDebug(__FUNCTION__.' $user='.$user);
logDebug(__FUNCTION__.' $password='.$password);
logDebug(__FUNCTION__.' $cc_nm='.$cc_nm);
logDebug(__FUNCTION__.' $bcc_nm='.$bcc_nm);

    //�e�X�g�E�X�e�[�W���O�T�[�o�ő��M�悪���h���C���ȊO�̏ꍇ�A���[�����M���Ȃ��B
	global $TEST_FLAG, $STAGE_FLAG;
	if($TEST_FLAG === true || $STAGE_FLAG === true) {
        if (PermmitMailDomainCheck($to)) {
            logDebug("���[������OK:".$to);
        } else {
            logError("���[������NG:".$to);
            return true;
        }
	}

	// ���ʕϊ�����
	$body = str_replace('__SERVER__',$_SERVER['SERVER_NAME'],$body);

	// ���M����
	$punctuation = array("�J�J", "�L�J", "�N�J", "�P�J", "�R�J",
						 "�T�J", "�V�J", "�X�J", "�Z�J", "�\�J",
						 "�^�J", "�`�J", "�c�J", "�e�J", "�g�J",
						 "�n�J", "�q�J", "�t�J", "�w�J", "�z�J",
						 "�n�K", "�q�K", "�t�K", "�w�K", "�z�K");

	$punctuation_ = array("�K", "�M", "�O", "�Q", "�S",
						  "�U", "�W", "�Y", "�[", "�]",
						  "�_", "�a", "�d", "�f", "�h",
						  "�o", "�r", "�u", "�x", "�{",
						  "�p", "�s", "�v", "�y", "�|");

	$subject_ = "";
	for ($i = 0; $i < mb_strlen($subject); $i++) {
		$tmp = mb_substr($subject, $i, 1);
		if (checkEmoji($tmp) == true) {
			$subject_ .= $tmp;
		} else {
			$subject_ .= mb_convert_kana($tmp, "KV", "SJIS");
		}
	}
	$subject = $subject_;
	$subject = str_replace($punctuation, $punctuation_, $subject);

	$body_ = "";
	for ($i = 0; $i < mb_strlen($body); $i++) {
		$tmp = mb_substr($body, $i, 1);
		if (checkEmoji($tmp) == true) {
			$body_ .= $tmp;
		} else {
			$body_ .= mb_convert_kana($tmp, "KV");
		}
	}
	$body = $body_;
	$body = str_replace($punctuation, $punctuation_, $body);

	$body = str_replace("\n", "\r\n", $body);

	$connect = fsockopen($host, 25, $errno, $errstr, 10);

	if ($connect == false) {
		return false;
	}

	if (strlen($user) > 0) {
		fputs($connect, "EHLO " . $host . "\r\n");
		$response = fgets($connect);
	} else {
		fputs($connect, "HELO " . $host . "\r\n");
		$response = fgets($connect);
	}

	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
		return false;
	}

	if (strlen($user) > 0) {
		fputs($connect, "AUTH PLAIN " . exec('perl -MMIME::Base64 -e "print &MIME::Base64::encode_base64(\"' . $user . '\0' . $user . '\0' . $password . '\")"') . "\r\n");
		$response = fgets($connect);
		$error_code = getErrorCode(getResponseCode($response));
		if (strlen($error_code) > 0) {
			return false;
		}
	}

	//20070404 From�Ή�
	$tmp_send_from = $from;
	if (strpos($tmp_send_from,"<")) {
		$tmp_send_from = explode("<",$from);
	} else {
		$send_from = $from;
	}
	if (is_array($tmp_send_from) && count($tmp_send_from) > 0) {
		$send_from      = substr($tmp_send_from[1], 0, strlen($tmp_send_from[1]) - 1);
		$send_from_name = $tmp_send_from[0];

		$from = "=?ISO-2022-JP?B?" . base64_encode(mb_convert_encoding($send_from_name, "ISO-2022-JP", "SJIS")) ."?= <".$send_from. ">";
	}
	//20070404 From�Ή�

	//20070404 From�Ή�
//	fputs($connect, "MAIL FROM:" . $from . "\r\n");
	fputs($connect, "MAIL FROM:" . $send_from . "\r\n");
	//20070404 From�Ή�
	$response = fgets($connect);
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
		return false;
	}

	$rcptToArray = array();
	$toArray     = array();

	if (is_array($to)) {
		$rcptToArray = array_merge($rcptToArray, $to);
//		$toArray     = array_merge($toArray    , $to);
	} else {
		$rcptToArray = array_merge($rcptToArray, preg_split("/,/", $to));
//		$toArray     = array_merge($toArray    , preg_split("/,/", $to));
	}

	foreach ($rcptToArray as $rcptTo) {
		if ($rcptTo) {
			fputs($connect, "RCPT TO:" . $rcptTo . "\r\n");
			$response = fgets($connect);
			$error_code = getErrorCode(getResponseCode($response));
			if (strlen($error_code) > 0) {
				return false;
			}
		}
	}

	//TO�Ή�
	if ($to_nm == "") {
		if (is_array($to)) {
			$toArray     = array_merge($toArray    , $to);
		} else {
			$toArray     = array_merge($toArray    , preg_split("/,/", $to));
		}
	} else {
		if (is_array($to_nm)) {
			$toArray     = array_merge($toArray    , $to_nm);
		} else {
			$toArray     = array_merge($toArray    , preg_split("/,/", $to_nm));
		}
	}

	$CcArray  = array();
	$BccArray = array();

	//CC�Ή�
	if (is_array($cc_nm)) {
		$CcArray     = array_merge($CcArray    , $cc_nm);
	} else {
		$CcArray     = array_merge($CcArray    , preg_split("/,/", $cc_nm));
	}
	//BCC�Ή�
	if (is_array($bcc_nm)) {
		$BccArray     = array_merge($BccArray    , $bcc_nm);
	} else {
		$BccArray     = array_merge($BccArray    , preg_split("/,/", $bcc_nm));
	}
	//

	fputs($connect, "DATA"."\r\n");
	$response = fgets($connect);
	fputs($connect, "From: " . $from . "\r\n");
	fputs($connect, "To: " . join(",", $toArray) . "\r\n");
	fputs($connect, "Subject: " . "=?ISO-2022-JP?B?" . base64_encode(mb_convert_encoding($subject, "ISO-2022-JP", "SJIS")) . "?=" . "\r\n");
	//CC�Ή�
	if (count($CcArray) > 0) {
		fputs($connect, "Cc: " . join(",", $CcArray) . "\r\n");
	}
	//BCC�Ή�
	if (count($BccArray) > 0) {
		fputs($connect, "Bcc: " . join(",", $BccArray) . "\r\n");
	}
	fputs($connect, "Date: " . date("r") . "\r\n");
	fputs($connect, "MIME-Version: " . "1.0" . "\r\n");
	fputs($connect, "Content-Type: " . "text/plain; charset=\"ISO-2022-JP\"" . "\r\n");
	fputs($connect, "Content-Transfer-Encoding: " . "8bit" . "\r\n");
	fputs($connect, "\r\n");
	fputs($connect, mb_convert_encoding($body, "ISO-2022-JP", "SJIS") . "\r\n");

	fputs($connect, "." . "\r\n");
	$response = fgets($connect);
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
		return false;
	}

	fputs($connect, "QUIT"."\r\n");
	$response = fgets($connect);
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
		return false;
	}

	fclose($connect);
	return true;
}

/**
 * getResponseCode()
 * ���X�|���X�R�[�h�擾
 *
 * @patam	int $response		���X�|���X

 * @return	int $response_code	���X�|���X�R�[�h
 */
function getResponseCode($response) {
	return substr($response, 0, 3);
}

/**
 * getErrorCode()
 * �G���[�R�[�h�擾
 *
 * @patam	int $response_code	���X�|���X�R�[�h

 * @return	int $error_code		�G���[�R�[�h
 */
function getErrorCode($response_code) {
	switch (substr($response_code, 0, 1)) {
		case "1":
			return "";
		case "2":
			return "";
		case "3":
			return "";
		default:
			return $response_code;
	}
}

/**
 * checkEmoji()
 * �G�������݃`�F�b�N
 *
 * @param	string $str	������

 * @return	boolean true=�G�����܂ށAfalse=�G�����܂܂Ȃ�
 */
function checkEmoji($str) {
	$result = false;

	if (checkEmojiI($str)) {
		$result = true;
	}
	if (checkEmojiS($str)) {
		$result = true;
	}
	if (checkEmojiE($str)) {
		$result = true;
	}

	return $result;
}

/**
 * checkEmojiI()
 * i-mode�G�������݃`�F�b�N
 *
 * @param	string $str	������

 * @return	boolean true=i-mode�G�����܂ށAfalse=�G�����܂܂Ȃ�
 */
function checkEmojiI($str) {
	$result = false;

	for ($i = 0; $i < mb_strlen($str); $i++) {
		$tmp = mb_substr($str, $i, 1);
		$tmp = unpack("C*", $tmp);
		$len = count($tmp);
		if ($len == 1) {
			continue;
		}
		$hex1 = $tmp[1];
		$hex2 = $tmp[2];
		if (($hex1 == 0xF8 && 0x9F <= $hex2 && $hex2 <= 0xFC) || ($hex1 == 0xF9 && 0x40 <= $hex2 && $hex2 <= 0xFC)) {
			$result = true;
			break;
		}
	}

	return $result;
}

/**
 * checkEmojiS()
 * softbank�G�������݃`�F�b�N
 *
 * @param	string $str	������

 * @return	boolean true=softbank�G�����܂ށAfalse=�G�����܂܂Ȃ�
 */
function checkEmojiS($str) {
	$result = false;

	if (preg_match("/\\x1B\\$[\\x21-\\x7A]+\\x0F/", $str)) {
		$result = true;
	}

	return $result;
}

/**
 * checkEmojiE()
 * ezweb�G�������݃`�F�b�N
 *
 * @param	string $str	������

 * @return	boolean true=ezweb�G�����܂ށAfalse=�G�����܂܂Ȃ�
 */
function checkEmojiE($str) {
	$result = false;

	for ($i = 0; $i < mb_strlen($str); $i++) {
		$tmp = mb_substr($str, $i, 1);
		$tmp = unpack("C*", $tmp);
		$len = count($tmp);
		if ($len == 1) {
			continue;
		}
		$hex1 = $tmp[1];
		$hex2 = $tmp[2];
		if (0xF3 <= $hex1 && $hex1 <= 0xF7) {
			$result = true;
			break;
		}
	}

	return $result;
}

/**
 * �a��N�𐼗�N�֕ϊ�
 *
 * @param string $nengo      �N���t���O(0:���a�A1:�吳�A2:����)
 * @param string $birthday   �a��N����(YYMMDD)
 *
 * @return int   ����N
 */
Function fncWarekiSeirekiChange($nengo, $birthday) {

    //�a��������a��N�擾
    $warekinen = trim(mb_convert_kana(substr($birthday, 0, 2), "n"));

	$seirekinen = 0;
	switch($nengo){
		case "0"://���a
			$seirekinen = 1925 + (integer)$warekinen;
			break;
		case "1"://�吳
			$seirekinen = 1911 + (integer)$warekinen;
			break;
		case "2"://����
			$seirekinen = 1988 + (integer)$warekinen;
			break;
		default:
			$seirekinen = 1925 + (integer)$warekinen;
			break;
	}
	return $seirekinen;
}

/**
 * �N����Z�o����
 *
 * @param string $nengo      �N���t���O(0:���a�A1:�吳�A2:����)
 * @param string $birthday   �a��N����(YYMMDD)
 *
 * @return int   �N��
 */
Function fncGetAge($nengo, $birthday) {

	$age = 0;
	$seirekinen = 0;
	$sysdate = date("Ymd");

	//����N�擾
	$seirekinen = fncWarekiSeirekiChange($nengo, $birthday);
	if ($seirekinen == 0) {
		return $age;
	}

	$age = intval(substr($sysdate, 0, 4)) - intval($seirekinen);
	if (intval(substr($sysdate, 4, 4)) < intval(substr($birthday, 2, 4))) {
		$age--;
	}

	return $age;

}

/**
 * 2�̓��t�Ԃ̓��������߂�
 *
 * @param string $yyyymmdd1    ���t�P
 * @param string $yyyymmdd2    ���t�Q
 *
 * @return int   ���t�Ԃ̓���
 */
Function fncGetDateDiff($yyyymmdd1, $yyyymmdd2) {

	$yyyymmdd1 = str_replace("/", "", $yyyymmdd1);
	$yyyymmdd1 = str_replace("-", "", $yyyymmdd1);
	$yyyymmdd2 = str_replace("/", "", $yyyymmdd2);
	$yyyymmdd2 = str_replace("-", "", $yyyymmdd2);

	$year1  = substr($yyyymmdd1, 0, 4);
	$month1 = substr($yyyymmdd1, 4, 2);
	$day1   = substr($yyyymmdd1, 6, 2);

	$year2  = substr($yyyymmdd2, 0, 4);
	$month2 = substr($yyyymmdd2, 4, 2);
	$day2   = substr($yyyymmdd2, 6, 2);

	$t1  = mktime(0, 0, 0, $month1, $day1, $year1);
	$t2  = mktime(0, 0, 0, $month2, $day2, $year2);
	$t3  = $t1 - $t2;
	$ret = floor($t3 / (60 * 60 * 24));

	return $ret;
}

/**
 * �ŏI�w���o�ߓ����擾����
 *
 * @param string $last_buy_day1  �ŏI�w�����P(���ϕi)
 * @param string $last_buy_day2  �ŏI�w�����Q(����)
 * @param string $last_buy_day3  �ŏI�w�����R(�J���J)
 * @param string $last_buy_day4  �ŏI�w�����S(���e�t)
 *
 * @return int   �ŏI�w���o�ߓ�
 */
Function fncGetLastBuyProgDay($last_buy_day1, $last_buy_day2, $last_buy_day3, $last_buy_day4) {

	$last_buy_progress_day = "";
	$sysdate = date("Ymd");

	if ($last_buy_day1 == "" && $last_buy_day2 == "" && $last_buy_day3 == "" && $last_buy_day4 == "") {
		return $last_buy_progress_day;
	}

	$last_buy_day = array($last_buy_day1, $last_buy_day2, $last_buy_day3, $last_buy_day4);
	rsort($last_buy_day);
	$last_buy_progress_day = fncGetDateDiff($sysdate, $last_buy_day[0]);

	return $last_buy_progress_day;
}

/**
 * ����w���o�ߓ����擾����
 *
 * @param string $first_buy_day1  ����w�����P(���ϕi)
 * @param string $first_buy_day2  ����w�����Q(����)
 * @param string $first_buy_day3  ����w�����R(�J���J)
 * @param string $first_buy_day4  ����w�����S(���e�t)
 *
 * @return int   ����w���o�ߓ�
 */

Function fncGetFirstBuyProgDay($first_buy_day1, $first_buy_day2, $first_buy_day3, $first_buy_day4) {

	$first_buy_progress_day = "";
	$sysdate = date("Ymd");

	if ($first_buy_day1 == "" && $first_buy_day2 == "" && $first_buy_day3 == "" && $first_buy_day4 == "") {
		return $first_buy_progress_day;
	}

	$first_buy_day = array($first_buy_day1, $first_buy_day2, $first_buy_day3, $first_buy_day4);
	sort($first_buy_day);

	if ($first_buy_day[0] == "" && $first_buy_day[1] == "" && $first_buy_day[2] == "") {
		$first_buy_progress_day = fncGetDateDiff($sysdate, $first_buy_day[3]);
	} else if ($first_buy_day[0] == "" && $first_buy_day[1] == "") {
		$first_buy_progress_day = fncGetDateDiff($sysdate, $first_buy_day[2]);
	} else if ($first_buy_day[0] == "") {
		$first_buy_progress_day = fncGetDateDiff($sysdate, $first_buy_day[1]);
	} else {
		$first_buy_progress_day = fncGetDateDiff($sysdate, $first_buy_day[0]);
	}

	return $first_buy_progress_day;
}

/**
 * ����ID���擾����
 *
 * @param mixed  $con   DB�R�l�N�V����ID
 * @param string $uid   �l�b�g�����o�[ID
 *
 * @return int   ����w���o�ߓ�
 */
Function fncGetAttributeId($con, $uid) {

	$attribute_id    = array();
	$member_data_arr = "";
	$member_data     = "";

	$member_data_arr = array('WEBPROFILE_TBL.NAMEOFERA', 'WEBPROFILE_TBL.BIRTHDAY', 'WEBPROFILE_TBL.KENCD', 'WEBPROFILE_TBL.GENDER',
							 'WEBPROFILE_TBL.LAST_PURCHACE_DAY1', 'WEBPROFILE_TBL.LAST_PURCHACE_DAY2', 'WEBPROFILE_TBL.LAST_PURCHACE_DAY3',
							 'WEBPROFILE_TBL.LAST_PURCHACE_DAY4', 'WEBPROFILE_TBL.FIRST_PURCHACE_DAY1','WEBPROFILE_TBL.FIRST_PURCHACE_DAY2',
							 'WEBPROFILE_TBL.FIRST_PURCHACE_DAY3', 'WEBPROFILE_TBL.FIRST_PURCHACE_DAY4', 'WEBPROFILE_TBL.KOUNYU_NUM' );

	//�����o�[�f�[�^�擾
	$member_data = fncGetSskMember($con, $uid, $member_data_arr);

	//�a��������N��擾
	$age    = fncGetAge($member_data['NAMEOFERA'], $member_data['BIRTHDAY']);

	//�n��R�[�h
	$ken_cd = $member_data['KENCD'];
	//����
	$gender = $member_data['GENDER'];
	//�ŏI�w���o�ߓ�
	$last_buy_prog_day = fncGetLastBuyProgDay($member_data['LAST_PURCHACE_DAY1'], $member_data['LAST_PURCHACE_DAY2'], $member_data['LAST_PURCHACE_DAY3'], $member_data['LAST_PURCHACE_DAY4']);
	//����w���o�ߓ�
	$first_buy_prog_day = fncGetFirstBuyProgDay($member_data['FIRST_PURCHACE_DAY1'], $member_data['FIRST_PURCHACE_DAY2'], $member_data['FIRST_PURCHACE_DAY3'], $member_data['FIRST_PURCHACE_DAY4']);
	//���ϕi�w����
	$purchace_cnt = $member_data['KOUNYU_NUM'];

	$sql  = "select ";
	$sql .= "ATTRIBUTE_ID, JIS_CODE_PREF ";
	$sql .= "from ";
	$sql .= "MstAttribute_Tbl ";
	$sql .= "where VALID_FLG = ".getSqlValue("1")." ";
	//$sql .= "AND AGE_LOWER <= ".getSqlValueNum($age)." ";
	$sql .= "AND AGE_LOWER <= :age ";
	//$sql .= "AND AGE_UPPER > ".getSqlValueNum($age)." ";
	$sql .= "AND AGE_UPPER >= :age ";
	/*
	if (!isset($ken_cd)) {
	if ($ken_cd != '00') {
		$sql .= "AND JIS_CODE_PREF = ".getSqlValueNum($ken_cd)." ";
	};
	*/
	if (isset($gender) || $gender == '0' || $gender == '1' ) {
		//$sql .= "AND GENDER IN (2,".getSqlValueNum($gender).") ";
		$sql .= "AND GENDER IN (2,:gender) ";
	};
	if ($last_buy_prog_day !== '') {
		//$sql .= "AND LAST_PURCHASE_START_DAYS <= ".getSqlValueNum($last_buy_prog_day)." ";
		$sql .= "AND LAST_PURCHASE_START_DAYS <= :last_buy_prog_day ";
	};
	if ($last_buy_prog_day !== '') {
		//$sql .= "AND LAST_PURCHASE_END_DAYS > ".getSqlValueNum($last_buy_prog_day)." ";
		$sql .= "AND LAST_PURCHASE_END_DAYS >= :last_buy_prog_day ";
	};
	if ($first_buy_prog_day !== '') {
		//$sql .= "AND FIRST_PURCHASE_START_DAYS <= ".getSqlValueNum($first_buy_prog_day)." ";
		$sql .= "AND FIRST_PURCHASE_START_DAYS <= :first_buy_prog_day ";
	};
	if ($first_buy_prog_day !== '') {
		//$sql .= "AND FIRST_PURCHASE_END_DAYS > ".getSqlValueNum($first_buy_prog_day)." ";
		$sql .= "AND FIRST_PURCHASE_END_DAYS >= :first_buy_prog_day ";
	};
	if ($purchace_cnt !== '') {
		//$sql .= "AND COSMETICS_PURCHASE_CNT_LOWER <= ".getSqlValueNum($purchace_cnt)." ";
		$sql .= "AND COSMETICS_PURCHASE_CNT_LOWER <= :purchace_cnt ";
	};
	if ($purchace_cnt !== '') {
		//$sql .= "AND COSMETICS_PURCHASE_CNT_UPPER > ".getSqlValueNum($purchace_cnt)." ";
		$sql .= "AND COSMETICS_PURCHASE_CNT_UPPER >= :purchace_cnt ";
	};
	$sql .= "ORDER BY PRIORITY ASC, ATTRIBUTE_ID ASC ";
	//$result = dbQuery($con, $sql);

	$result = ssk_db_parse($con, $sql);
	ssk_db_bind_by_name($result,":age",$age,-1);
	ssk_db_bind_by_name($result,":gender",$gender,-1);
	if ($last_buy_prog_day !== '') {
		ssk_db_bind_by_name($result,":last_buy_prog_day",$last_buy_prog_day,-1);
	};
	if ($first_buy_prog_day !== '') {
		ssk_db_bind_by_name($result,":first_buy_prog_day",$first_buy_prog_day,-1);
	};
	if ($purchace_cnt !== '') {
		ssk_db_bind_by_name($result,":purchace_cnt",$purchace_cnt,-1);
	};
	ssk_db_execute($result);


	$data_arr = array();
	$rows = getNumRows($result, $data_arr);

	if ($rows > 0) {
		$j = 0;
		for ($i = 0; $i < $rows; $i++) {
			$row = dbFetchRow($result, $i, $data_arr);

			$kencd[$i] = $row['JIS_CODE_PREF'];
			if ($kencd[$i] == '00' || $kencd[$i] == $ken_cd) {
				$attribute_id[$j] = $row['ATTRIBUTE_ID'];
				$j=$j+1;
			}
		}
	}
	dbFreeResult($result);

	return $attribute_id;
}


/**
 * ���������瓪�����̍s�̕�������擾
 *
 * @param   string  $initial      ������
 *
 * @return  array   �������̍s�̕����񂪔z��ɓ���
 */

Function fncGetArrayStr($initial) {

	$array_str = "";

	if ($initial == "�" || $initial == "�" || $initial == "�" || $initial == "�" || $initial == "�") {
		$array_str = array("�", "�", "�", "�", "�");
	} else if ($initial == "�" || $initial == "�" || $initial == "�" || $initial == "�" || $initial == "�") {
		$array_str = array("�", "�", "�", "�", "�");
	} else if ($initial == "�" || $initial == "�" || $initial == "�" || $initial == "�" || $initial == "�") {
		$array_str = array("�", "�", "�", "�", "�");
	} else if ($initial == "�" || $initial == "�" || $initial == "�" || $initial == "�" || $initial == "�") {
		$array_str = array("�", "�", "�", "�", "�");
	} else if ($initial == "�" || $initial == "�" || $initial == "�" || $initial == "�" || $initial == "�") {
		$array_str = array("�", "�", "�", "�", "�");
	} else if ($initial == "�" || $initial == "�" || $initial == "�" || $initial == "�" || $initial == "�") {
		$array_str = array("�", "�", "�", "�", "�");
	} else if ($initial == "�" || $initial == "�" || $initial == "�" || $initial == "�" || $initial == "�") {
		$array_str = array("�", "�", "�", "�", "�");
	} else if ($initial == "�" || $initial == "�" || $initial == "�") {
		$array_str = array("�", "�", "�");
	} else if ($initial == "�" || $initial == "�" || $initial == "�" || $initial == "�" || $initial == "�") {
		$array_str = array("�", "�", "�", "�", "�");
	} else if ($initial == "�" || $initial == "�" || $initial == "�") {
		$array_str = array("�", "�", "�");
	}
	return $array_str;
}

/**
 * �������M���[���擾
 *
 * @param mixed  $con           DB�R�l�N�V����ID
 * @param string $auto_mail_id  ���[��ID
 *
 * @return int �������M���[���f�[�^
 */
Function fncGetAutoMail($con,$auto_mail_id, $tran_flg=null) {

	if (!$con) {
		return false;
	}

	$mail_data = array();
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	/* $sql  = "SELECT ";
	$sql .= "MAIL_SUBJECT, ";
	$sql .= "MAIL_BODY, ";
	$sql .= "MAIL_FROM  ";
	$sql .= "FROM AUTOMAIL_TBL ";
	//$sql .= "WHERE AUTO_MAIL_ID = ".getSqlValueNum($auto_mail_id)." ";
	$sql .= "WHERE AUTO_MAIL_ID = :auto_mail_id ";
	//$result = dbQuery($con, $sql, $tran_flg);
	$result = ssk_db_parse($con, $sql);
	ssk_db_bind_by_name($result,":auto_mail_id",$auto_mail_id,-1);
	ssk_db_execute($result); */

	$sql = "SELECT ";
		$sql .= "mail_subject as MAIL_SUBJECT ";
		$sql .= ", mail_cont as MAIL_BODY ";
		$sql .= ", mail_send_from as MAIL_FROM  ";
	$sql .= "FROM ";
		$sql .= "m_auto_send_mail  ";
	$sql .= "WHERE ";
		$sql .= "auto_mail_seq = :auto_mail_id ";
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
	$result = $con->prepare($sql);
	$result->bindParam(":auto_mail_id", $auto_mail_id, PDO::PARAM_INT );
	$result->execute();
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	
	if (!$result) {
		return false;
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//$arr = array();
	//$rows = getNumRows($result, $arr);
	$rows = $result->rowCount();
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $arr);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
		$mail_data['MAIL_SUBJECT'] = $row['MAIL_SUBJECT'];
		$mail_data['MAIL_BODY']    = fncChangeDomain($row['MAIL_BODY']);
		$mail_data['MAIL_BODY']    = str_replace("\\n", "\n", $mail_data['MAIL_BODY']);
		$mail_data['MAIL_BODY']    = str_replace("<br>", "\n", $mail_data['MAIL_BODY']);
		//$mail_data['MAIL_BODY']    = str_replace("__CYSK__", $_SERVER['HTTP_X_CY_SESSIONKEY'], $mail_data['MAIL_BODY']);
		$mail_data['MAIL_BODY']    = str_replace("__CYSK__", session_id(), $mail_data['MAIL_BODY']);
		$mail_data['MAIL_FROM']    = $row['MAIL_FROM'];
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//dbFreeResult($result);
	pdoFreeResult($result);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan

	return $mail_data;
}

/**
 * �Ǘ��҃��[���擾
 *
 * @param mixed  $con              DB�R�l�N�V����ID
 * @param string $kanri_mail_kbn  ���[���敪
 * @param string $kanri_mail_sub  ���[������
 * @param string $kanri_mail_msg  ���[���{��
 *
 * @return int �������M���[���f�[�^
 */
Function fncGetKanriMail($con, $kanri_mail_kbn, $kanri_mail_sub, $kanri_mail_msg, $tran_flg=null) {

	global $SMTP_HOST;
	global $SYSYEM_MAIL_FROM;

	if (!$con) {
		return false;
	}

	$mail_from = $SYSYEM_MAIL_FROM;

	$recvto_addr = array();
	$arr_to_nm   = array();
	$arr_cc_nm   = array();
	$arr_bcc_nm  = array();

	//��2013/08/05 R-#10660_�y�Ǘ��c�[���z�Ή��������Ɂu�@��ˑ������v����͂����A930�d���G���[������(ulsystems hatano)
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/06/22 jst-tomii
	/*
	$sql  = "SELECT";
	$sql .= " MAIL_ID";
	$sql .= ",EMAIL";
	$sql .= ",MAIL_NM";
	$sql .= ",SENDWAY";
	$sql .= " FROM KANRIMAIL_TBL";
	$sql .= " WHERE MAIL_KUBUN = '" . $kanri_mail_kbn . "'";
	*/

	$sql = "SELECT ";
		$sql .= "mail_seq as MAIL_ID ";
		$sql .= ", mail_adr as EMAIL ";
		$sql .= ", mail_name as MAIL_NM ";
		$sql .= ", send_way_kbn as SENDWAY  ";
	$sql .= "FROM ";
		$sql .= "m_manager_mail  ";
	$sql .= "WHERE ";
		$sql .= "ctrl_mail_kbn =" .$kanri_mail_kbn ;
    // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/06/22 jst-tomii

	$result = dbQuery($con, $sql);
	//��2013/08/05 R-#10660_�y�Ǘ��c�[���z�Ή��������Ɂu�@��ˑ������v����͂����A930�d���G���[������(ulsystems hatano)
	if (!$result) {
		return false;
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//$arr = array();
	//$rows = getNumRows($result, $arr);
	$rows = getNumRows($result);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	if ($rows > 0) {
		for ($i=0;$i<$rows;$i++) {
			// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
			//$row = dbFetchRow($result, $i, $arr);
			$row = dbFetchRow($result);
			// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
			$mail_add      = trim($row['EMAIL']);
			$recvto_addr[] = $mail_add;

			if (trim($row['SENDWAY']) == "2") {
				//CC
				$arr_cc_nm[]  = $mail_add;
			} elseif(trim($row['SENDWAY']) == "3") {
				//BCC
				$arr_bcc_nm[] = $mail_add;
			} else {
				//TO
				$arr_to_nm[]  = $mail_add;
			}
		}
	}
	dbFreeResult($result);

	//���[�����M
	$mail_result = sendMail($SMTP_HOST, $recvto_addr, $kanri_mail_sub, $kanri_mail_msg, $mail_from, '', '', $arr_to_nm, $arr_cc_nm, $arr_bcc_nm);

	if (!$mail_result) {
		$constr   = "";
		$arr_list = "";

		foreach ($recvto_addr as $key => $value ) {
			$arr_list .= $constr.$value;
			$constr = ",";
		}

		logError("�Ǘ����[�����M�G���[ ���[���敪�F".$kanri_mail_kbn." ���e�F".$kanri_mail_msg."�@���M�惁�[���A�h���X�F".$arr_list." FROM�F".$mail_from);
		return false;
	} else {
		foreach ($recvto_addr as $key => $value ) {
			$arr_list .= $constr.$value;
			$constr = ",";
		}
		logDebug("�Ǘ����[�����M ���[���敪�F".$kanri_mail_kbn." ���e�F".$kanri_mail_msg."�@���M�惁�[���A�h���X�F".$arr_list.":".$arr_to_nm." FROM�F".$mail_from);
		return true;
	}

}

/**
 * ��{�I�ȃy�[�W���O�������s��
 *
 * @param array  $page_key['current_page']      ���݂̃y�[�W<br>
 * @param array  $page_key['list_max_count']    1�y�[�W�\������<br>
 * @param array  $page_key['record_count']      ���R�[�h����<br>
 *
 * @return array  $page_data['page_count']        �y�[�W����<br>
 * @return array  $page_data['start_index']       ���݃y�[�W���R�[�h�J�n�ʒu<br>
 * @return array  $page_data['next_start_index']  ���y�[�W���R�[�h�J�n�ʒu<br>
 * @return array  $page_data['prev_page']         �O�y�[�W�ԍ�<br>
 * @return array  $page_data['next_page']         ���y�[�W�ԍ�<br>
*/
function fncGetPagingInfo($page_key) {

	$current_page = $page_key['current_page'];
	$list_count   = $page_key['list_max_count'];
	$record_count = $page_key['record_count'];

	if (strlen($current_page) <= 0 || chkNumeric($current_page) != 1) {
		$current_page = 1;
	}
	if (strlen($list_count) <= 0 || strlen($record_count) <= 0) {
		$err_msg  = '�K�v�ȏ�񂪑���Ȃ��ׁA�y�[�W���O�������s���܂���B(';
		$err_msg .= 'current_page='.$current_page.', list_count='.$list_count.', record_count='.$record_count;
		$err_msg .= ')';
		logError($err_msg);
	}

	//�S�̂̃y�[�W�����J�E���g
	$page_count = $record_count / $list_count;
	if (($record_count % $list_count) > 0) {
		$page_count++;
		$page_count = floor($page_count);
	}

	//�X�^�[�g�ʒu
	$start_index = ($current_page - 1) * $list_count;
	//���y�[�W�̃X�^�[�g�ʒu
	$next_start_index = $start_index + $list_count;
	if ($next_start_index > $record_count) {
		$next_start_index = $record_count;
	}
	//�O�̃y�[�W�ݒ�
	if ($current_page > 0) {
		$prev_page = $current_page - 1;
	} else {
	$prev_page = 0;
	}
	//���̃y�[�W�ݒ�
	if (($start_index + $list_count) >= $record_count) {
		$next_page = 0;
		$next_count = 0;
	} else {
		$next_page = $current_page + 1;
		if ($record_count >= ($current_page + 1) * $list_count) {
			$next_count = $list_count;
		} else {
			$next_count = $record_count - $current_page * $list_count;
		}
	}

	$page_data['page_count']       = $page_count;
	$page_data['start_index']      = $start_index;
	$page_data['next_start_index'] = $next_start_index;
	$page_data['prev_page']        = $prev_page;
	$page_data['next_page']        = $next_page;
	$page_data['next_count']       = $next_count;

	return $page_data;
}

/**
 * �X�֔ԍ����͏Z������A�X�֔ԍ��܂ޏZ���f�[�^�擾
 *
 * @param mixed  $con          DB�R�l�N�V����ID
 * @param array  $address      �Z���f�[�^
 *
 * @return array  �f�[�^�����݂���ꍇ�̓f�[�^���z��ɓ���
 */
Function fncGetAddress($con, $address) {

	$data_address = array();
	$data_address['post_no']		= "";
	$data_address['ken']			= "";
	$data_address['shi']			= "";
	$data_address['mati']			= "";
	$data_address['k_ken']			= "";
	$data_address['k_shi']			= "";
	$data_address['k_mati']		= "";
	$data_address['edt_k_mati']	= "";

	$post_no = $address['post_no'];
	$ken     = $address['K_KEN'];
	$shi     = $address['K_SHI'];
	$mati    = $address['K_MATI'];

	if ((preg_match("/^\d{7}$/", $post_no)) || ($ken != "" && $shi != "" && $mati != "")) {

		$sql  = "SELECT ";
		$sql .= "POSTNO7, ";
		$sql .= "KEN, ";
		$sql .= "SHI, ";
		$sql .= "MATI, ";
		$sql .= "K_KEN, ";
		$sql .= "K_SHI, ";
		$sql .= "K_MATI, ";
		$sql .= "EDT_K_MATI ";
		$sql .= "FROM POSTMASTER_TBL ";
		if ($post_no != "") {
			//$sql .= "WHERE POSTNO7 = ".getSqlValue($post_no)." ";
			$sql .= "WHERE POSTNO7 = :post_no ";
		} else {
			//$sql .= "WHERE K_KEN = ".getSqlValue($ken)." ";
			$sql .= "WHERE K_KEN = :ken ";
			//$sql .= "AND K_SHI = ".getSqlValue($shi)." ";
			$sql .= "AND K_SHI = :shi ";
			//$sql .= "AND K_MATI = ".getSqlValue($mati)." ";
			$sql .= "AND K_MATI = :mati ";
		}
		//$result = dbQuery($con, $sql);
		$result = ssk_db_parse($con, $sql);
		if ($post_no != "") {
			ssk_db_bind_by_name($result,":post_no",$post_no,-1);
		} else {
			ssk_db_bind_by_name($result,":ken",$ken,-1);
			ssk_db_bind_by_name($result,":shi",$shi,-1);
			ssk_db_bind_by_name($result,":mati",$mati,-1);
		}
		ssk_db_execute($result);
		$data_arr = array();
		$rows = getNumRows($result, $data_arr);

		if ($rows > 0) {
			$row = dbFetchRow($result, 0, $data_arr);
/*
			$post_no7 = mb_convert_kana($row['POSTNO7'], "ask");
			$ken      = mb_convert_kana($row['KEN'], "ask");
			$shi      = mb_convert_kana($row['SHI'], "ask");
			$mati     = mb_convert_kana($row['MATI'], "ask");
			$k_ken    = mb_convert_kana($row['K_KEN'], "ask");
			$k_shi    = mb_convert_kana($row['K_SHI'], "ask");
			$k_mati   = mb_convert_kana($row['K_MATI'], "ask");
*/
			$post_no7   = trim($row['POSTNO7']);
			$ken        = trim($row['KEN']);
			$shi        = trim($row['SHI']);
			$mati       = trim($row['MATI']);
			$k_ken      = trim($row['K_KEN']);
			$k_shi      = trim($row['K_SHI']);
			$k_mati     = trim($row['K_MATI']);
			$edt_k_mati = trim($row['EDT_K_MATI']);

			$data_address['post_no']     = $post_no7;
			$data_address['ken']         = $ken;
			$data_address['shi']         = $shi;
			$data_address['mati']        = $mati;
			$data_address['k_ken']       = $k_ken;
			$data_address['k_shi']       = $k_shi;
			$data_address['k_mati']      = $k_mati;
			$data_address['edt_k_mati']  = $edt_k_mati;

		}
		dbFreeResult($result);

		//DB�ؒf
		dbClose($con);

		return $data_address;

	} else {

		return $data_address;

	}

}


/**
 * ������T�C�Y�`�F�b�N�i�d���ϊ��p�j
 *
 * @param string  $str           ������
 *
 * @return int ������
 */
Function fncGetDenbunLength($str) {

	$mb_length = 0;
	$target = "";			//SB,MB���ʑΏ�1����
	$char_kind = "";		//SB:�V���O���o�C�g���� MB:�}���`�o�C�g����
	$before_char_kind = ""; //$char_kind�̑O��
	$denbun_length = 0;

	if ($str == "") {
		return 0;
	}

	$mb_length = mb_strlen($str, 'SJIS');
	for ($i=0; $i<$mb_length; $i++) {
		$target = mb_substr($str, $i, 1);

		switch(strlen($target)){
			case 1://�V���O���o�C�g
				$denbun_length = $denbun_length + 1;
				$char_kind = "SB";
				//logDebug("case1:$i:".$denbun_length);
				break;
			case 2://�}���`�o�C�g
				$denbun_length = $denbun_length + 2;
				$char_kind = "MB";
				//logDebug("case2:$i:".$denbun_length);
				break;
			default:
				$denbun_length = $denbun_length + 2;
				$char_kind = "MB";
				break;
		}

		//A.������̍ŏ����}���`�o�C�g�����̏ꍇ�iSOK��t�^�j
		if ($before_char_kind == "" && $char_kind == "MB") {
			$denbun_length = $denbun_length + 1;
			//logDebug("A:$i:".$denbun_length);
		}
		//B.������̍Ōオ�}���`�o�C�g�����̏ꍇ�iEOK��t�^�j
		if ($i === ($mb_length - 1) && $char_kind == "MB") {
			$denbun_length = $denbun_length + 1;
			logDebug("B:$i:".$denbun_length);
		}
		//C.���O�̕����񂪃V���O���o�C�g�����Ń^�[�Q�b�g���}���`�o�C�g�����̏ꍇ
		if ($before_char_kind == "SB" && $char_kind == "MB") {
			$denbun_length = $denbun_length + 1;
			//logDebug("C:$i:".$denbun_length);
		}
		//D.���O�̕����񂪃}���`�o�C�g�����Ń^�[�Q�b�g���V���O���o�C�g�����̏ꍇ
		if ($before_char_kind == "MB" && $char_kind == "SB") {
			$denbun_length = $denbun_length + 1;
			//logDebug("D:$i:".$denbun_length);
		}

		$before_char_kind = $char_kind;
	}

	//logDebug("END:$i:".$denbun_length);
	return $denbun_length;
}

/**
 * HTML�A�G�����G�X�P�[�v���ꂽ��������擾����i�p�����[�^�����p�j
 *
 * @param string  $str           ������
 *
 * @return string �G�X�P�[�v���ꂽ������
 */
Function getEscapedString($str) {

	$str = repEmojiRemove(getHtmlEscapedString($str));
	$str = str_replace("&amp;", "", $str);	// &
	$str = str_replace("&quot;", "", $str);	// "
	$str = str_replace("&apos;", "", $str);	// '
	$str = str_replace("&lt;", "", $str);		// <
	$str = str_replace("&gt;", "", $str);		// >

	return $str;
}

/**
 * �������ӃR�[�h����A�������ӕ�������擾
 *
 * @param mixed  $con          DB�R�l�N�V����ID
 * @param array  $ship_caution_cd      �������ӃR�[�h
 *
 * @return string		�������ӕ�����̕�����
 */
Function fncGetShipCaution($con, $ship_caution_cd) {

	if (!$con) {
		return false;
	}
	if (!$ship_caution_cd) {
		return false;
	}

	$attention = '';

	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	/* $sql  = "SELECT ";
	$sql .= " ATTENTION ";
	$sql .= " FROM ATTENTION_TBL ";
	//$sql .= " WHERE ATTENTION_ID = ".getSqlValue($ship_caution_cd)." ";
	$sql .= " WHERE ATTENTION_ID = :ship_caution_cd ";
	//$result = dbQuery($con, $sql);
	$result = ssk_db_parse($con, $sql);
	ssk_db_bind_by_name($result,":ship_caution_cd",$ship_caution_cd,-1);
	ssk_db_execute($result);
	$data_arr = array();
	$rows = getNumRows($result, $data_arr); */
	$sql = "SELECT ";
		$sql .= "att_cont as ATTENTION  ";
	$sql .= "FROM ";
		$sql .= "m_att  ";
	$sql .= "WHERE ";
		$sql .= "att_cd = :ship_caution_cd ";
	$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
	$result = $con->prepare($sql);
	$result->bindParam(":ship_caution_cd", $ship_caution_cd, PDO::PARAM_INT );
	$result->execute();
	$rows = $result->rowCount();
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
	
	if ($rows > 0) {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
		//$row = dbFetchRow($result, 0, $data_arr);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan
		$attention = $row['ATTENTION'];
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/06 jst-arivazhagan
	//dbFreeResult($result);
	pdoFreeResult($result);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���i������̂��߂̉�ʉ��C�j2021/07/06 jst-arivazhagan

	if ($attention == '' || $attention == NULL) {
		return false;
	}

	return $attention;

}

/**
 * �p�X���[�h��MD5������
 *
 * @param mixed   $password �p�X���[�h
 *
 * @return string MD5�������p�X���[�h
 */
Function fncHashPassword($password) {

	$h_password = md5($password);

	return $h_password;
}

/**
 * �œK�e���v���[�g��K�p����
 *
 * @param string $path �e���v���[�g�p�X
 * @param int    $kind ���
 *
 * @return string �e���v���[�g�t���p�X
 */
Function fncIncludeTemplate($path,$kind) {

	global $TEMPLATE_ROOT_PATH;
	global $SSK_TEMPLATE_PATH;

	if($kind == 1)
	{
		if(file_exists($SSK_TEMPLATE_PATH.$path))
		{
			return $SSK_TEMPLATE_PATH.$path;
		}
		else
		{
			return $TEMPLATE_ROOT_PATH.'/common'.$path;
		}
	}
	else
	{
		return $SSK_TEMPLATE_PATH.$path;
	}
}

/**
 * ��������Í�������
 *
 * @param string $v ������
 * @param int &$error_code �G���[�R�[�h
 *
 * @return string �Í���������
 */
Function fncEncrypt($v, &$error_code) {
	global $salt, $seed, $vector, $base64_enc;
	return ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, $v, $vector, $base64_enc, $error_code);
}

/**
 * ������𕡍�������
 *
 * @param string $v �Í���������
 * @param int &$error_code �G���[�R�[�h
 *
 * @return string ������������
 */
Function fncDecrypt($v, &$error_code) {
	global $salt, $seed, $vector, $dec;
	return ssk_crypt_decrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, $vector,$v, $dec, $error_code);
}

/**
 * �v���I�G���[��ʕ\��
 * �����^�C���g�[�N�����Ȃ��ȂǏC���ł��Ȃ��G���[���ɐ�p��ʂ�\�����A�������I������
 *@param string s �G���[���b�Z�[�W
 */
function fncExitError($message=""){
  global $smarty, $template_file;
  $smarty->assign('error_message', array($message));
  $template_file = 'error/index.tpl';
  pcFinish();
  exit;
}

/**
 * �h���z�����G���[��ʕ\��
 * �I�t���C�����̏����I�����ȂǂɃh���z�����p�G���[��ʂ�\�����A�������I������
 *@param strign s �G���[���b�Z�[�W
 */
function fncOfflineError($message=""){
        global $smarty, $template_file;
logDebug(__FUNCTION__);
        $smarty->assign('message',$message);
        $template_file = 'domo/offline_error.tpl';
	pcFinish();
        exit;
}

/**
 * �����Ɠ��K�w�̃e���v���[�g�t�@�C�����Z�b�g����
 * @param string name �t�@�C����
 * @return string file �e���v���[�g�t�@�C���p�X
 */
function fncSetTemplate($name){
  global $template_file, $TEMPLATE_DIR;
  $template_file = $TEMPLATE_DIR . "/" . $name . ".tpl";
  return $template_file;
}

/**
 * �g�[�N���`�F�b�N
 */
function fncCheckToken(){
  if( ! isToken() ){
    logDebug('TOKEN ERROR');
    fncExitError('�L���ȃA�N�Z�X�ł͂���܂���B');
  }
}
/**
 * �A�N�Z�X�G���[
 */
function fncExitAccessError(){
    fncExitError('�L���ȃA�N�Z�X�ł͂���܂���B');
}

/**
 * REGIST_USER,UPDATE_USER�p�̒l���擾
 *@return string update_user  ��) Web: /domo/login/index.html
 */
function fncGetUpdateUser(){
        global $SSK_SCRIPT_NAME;
        return 'Web: '.$SSK_SCRIPT_NAME;
}

/**
 * �Ђ炪�ȃ`�F�b�N
 * �󔒂��G���[�ɂ���
 *@param string $text �`�F�b�N���镶����
 *@return bool true:OK false:NG
 */
function fncCheckHiragana($text){
	if( ! chkHiragana($text) ){
		return false;
	}
	if( strpos($text, ' ') !== false ){
		return false;
	}
	if( strpos($text, '�@') !== false ){
		return false;
	}
	return true;
}

/**
 * �N�b�L�[���L�^
 *@param string $key �N�b�L�[�̃L�[��
 *@param string $value �N�b�L�[�̒l
 *@param int $expire �N�b�L�[�̗L��������UNIX�^�C��
 */
function fncSetCookie($key, $value, $expire){
	logDebug('setcookie:key=['.$key.'] value=['.$value.'] expire=['.$expire.']');
	if( $expire ){
		setcookie($key, $value, $expire);
	}else{
		setcookie($key, $value);
	}
}
/**
 * �N�b�L�[���폜
 *@param string $key �N�b�L�[�̃L�[��
 */
function fncRemoveCookie($key){
	setcookie($key, "", time() - 100);
}

/**
 * ���[���A�h���X�`�F�b�N
 *@param string $mail
 *@return bool true:OK false:NG
 */
function fncChkEmail($mail){
	if( strpos(trim($mail), '@') <= 1 ){
		logDebug(__FUNCTINON__.' ���[�J���p�[�g��1�o�C�g�̂��߃G���[:'.$mail);
		return false;
	}
	return chkEmail($mail);
}

/**
 * ���O�A�E�g����
 */
function fncLogout(){
	// �Z�b�V�����ϐ���S�ĉ�������
	$_SESSION = array();
	// �Z�b�V������ؒf����ɂ̓Z�b�V�����N�b�L�[���폜����
	// (�Z�b�V������񂾂��łȂ��Z�b�V������j������)
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-42000, '/');
	}
	// �ŏI�I�ɁA�Z�b�V������j������
	session_destroy();
}

/**
 * DB�G���[�������ʏ���
 *@param object result ���ʃI�u�W�F�N�g
 */
function fncDbError($result){
	 $error_array = oci_error($result);
         logError("DB�G���[:" . $error_array["message"]);
}

/**
 * ssk_db_execute�����s�����s���G���[��ʂ�\������
 *@param object result ���ʃI�u�W�F�N�g
 */
function fncDbExecute(&$result){
	global $con;
	if( !$ret = ssk_db_execute($result) ){
		fncDbError($result);
		dbRollback($con);
		fncExitError('�����Ɏ��s���܂����B');
	}
	return $ret;
}

function getSYSDATE() {
	global $SSK_DC_FLAG, $TEST_FLAG, $STAGE_FLAG;

	$sysdate = date('YmdHis');

	if ($SSK_DC_FLAG === false || $TEST_FLAG === true || $STAGE_FLAG === true) {
		if (isset($_REQUEST['sysdate']) && strlen($_REQUEST['sysdate']) === 14 && is_numeric($_REQUEST['sysdate'])) {
			if ($sysdate < $_REQUEST['sysdate']) {
				return $_REQUEST['sysdate'];
			}
		}
	}

	return $sysdate;
}

/**
 * �`�F�b�N�f�B�W�b�g���擾
 *@param int $num �v�Z�Ώۂ̐��l
 *@return int 0�`9�̒l
 */
function fncGetCheckDegit($num){
	$kisuu = 0;
	$guu = 0;
	for($i=0; $i < strlen($num); $i++){
		$x = substr($num, $i, 1);
		if($i % 2 != 0){
			$guu += $x;
		}else{
			$kisuu += $x;
		}
	}
	$che = $guu * 3;
	$che = ($che + $kisuu) % 10;
	if( $che == 0 ){
		$che2 = 0;
	}else{
		$che2 = 10 - $che;
	}
logDebug(__FUNCTION__.":".$num."=>".$che2);
	return $che2;
}


/**
 * �I�t���C�����ǂ���
 */
function isOffLine(){

	global $SSK_SYSTEM_STATUS;

//return true;

	if( $SSK_SYSTEM_STATUS == "2" ){
		return true;
	}else{
		return false;
	}
}

/**
 * �����G���[��ʕ\��
 * �����ネ�O�A�E�g�����ɒ������悤�Ƃ������ɒ����G���[��ʂ�\�����A�������I������
 *@param strign s �G���[���b�Z�[�W
 */
function fncOrderedError($message=""){
	global $SSL_URL ;
	$str = $SSL_URL.'/member/notorder.html' ;
	header("Location: $str");
	exit;
}

/**
 * �����������ǂ���
 */
function isOrdered(){

	return session_get_attribute('ORDERED');

}

/**
 * �Q�d���O�C���G���[��ʕ\��
 * ���O�A�E�g�����Ƀ��O�C�����悤�Ƃ������ɃG���[��ʂ�\�����A�������I������
 *@param strign s �G���[���b�Z�[�W
 */
function fncDubleLoginError(){
	$str = '/member/loginDomo_confirm.html' ;
	header("Location: $str");
	exit;
}

/**
 * sendMail()
 * ���[�����M
 *
 * @patam	string $host		SMTP�z�X�g
 * @patam	string $to			TO���[���A�h���X
 * @patam	string $subject	����
 * @patam	string $body		�{��
 * @patam	string $from		FROM���[���A�h���X
 * @patam	string $user		SMTP�F�ؗp���[�U�[
 * @patam	string $password	SMTP�F�ؗp�p�X���[�h
// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
 * @patam	string $messageId	MessageId
// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa

 * @return	boolean true=����Afalse=�G���[
 */
// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
function send_mail($from, $to, $to_nm = null, $subject, $body, $opt_header, $user = null, $password = null, $cc_nm = null,$bcc_nm = null, $messageId = null) {
// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa

    $to_nm = null;
    
    global $TEST_FLAG, $STAGE_FLAG;

	if ($TEST_FLAG === true || $STAGE_FLAG === true) {
		//��R-#39533_�yH31-0016-048�zWEB�Ǘ��c�[���̌Ή����[���̍��o�l�ύX�Ή� 2020/01/18 saisys-hasegawa
		if(strpos($from,'�h���z���������N��') !== false){
			$from = '�h���z���������N��<test@saishunkan.co.jp>';
		} else {
			$from = '�ďt�ِ���<test@saishunkan.co.jp>';
		}
		//��R-#39533_�yH31-0016-048�zWEB�Ǘ��c�[���̌Ή����[���̍��o�l�ύX�Ή� 2020/01/18 saisys-hasegawa
		if (!empty($to) && !PermmitMailDomainCheck($to)) {
            logDebug("�e�X�g���M�Fto��������Ă��Ȃ����[���A�h���X");
            return true;
        }
        if (!empty($cc_nm) && !PermmitMailDomainCheck($cc_nm)) {
            logDebug("�e�X�g���M�Fcc��������Ă��Ȃ����[���A�h���X");
            return true;
        }
        if (!empty($bcc_nm) && !PermmitMailDomainCheck($bcc_nm)) {
            logDebug("�e�X�g���M�Fbcc��������Ă��Ȃ����[���A�h���X");
            return true;
        }
	}

	$host = 'localhost';

	// ���ʕϊ�����
	$body = str_replace('__SERVER__',$_SERVER['SERVER_NAME'],$body);

	// ���M����
	$punctuation = array("�J�J", "�L�J", "�N�J", "�P�J", "�R�J",
						 "�T�J", "�V�J", "�X�J", "�Z�J", "�\�J",
						 "�^�J", "�`�J", "�c�J", "�e�J", "�g�J",
						 "�n�J", "�q�J", "�t�J", "�w�J", "�z�J",
						 "�n�K", "�q�K", "�t�K", "�w�K", "�z�K");

	$punctuation_ = array("�K", "�M", "�O", "�Q", "�S",
						  "�U", "�W", "�Y", "�[", "�]",
						  "�_", "�a", "�d", "�f", "�h",
						  "�o", "�r", "�u", "�x", "�{",
						  "�p", "�s", "�v", "�y", "�|");

	$subject_ = "";
	for ($i = 0; $i < mb_strlen($subject); $i++) {
		$tmp = mb_substr($subject, $i, 1);
		if (checkEmoji($tmp) == true) {
			$subject_ .= $tmp;
		} else {
			$subject_ .= mb_convert_kana($tmp, "KV", "SJIS");
		}
	}
	$subject = $subject_;
	$subject = str_replace($punctuation, $punctuation_, $subject);

	$body_ = "";
	for ($i = 0; $i < mb_strlen($body); $i++) {
		$tmp = mb_substr($body, $i, 1);
		if (checkEmoji($tmp) == true) {
			$body_ .= $tmp;
		} else {
			$body_ .= mb_convert_kana($tmp, "KV");
		}
	}
	$body = $body_;
	$body = str_replace($punctuation, $punctuation_, $body);

	$body = str_replace("\n", "\r\n", $body);

	$connect = fsockopen($host, 25, $errno, $errstr, 10);

	if ($connect == false) {
		logDebug("M1:�y".$subject."�z<".$to.">�\�P�b�g�I�[�v���Ɏ��s���܂����B");
		return false;
	}

	if (strlen($user) > 0) {
		fputs($connect, "EHLO " . $host . "\r\n");
		$response = fgets($connect);
	} else {
		fputs($connect, "HELO " . $host . "\r\n");
		$response = fgets($connect);
	}

	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
    	logDebug("M2:�y".$subject."�z<".$to.">�G���[���������܂����B�i".$error_code.")");
    	logDebug($response);
		return false;
	}

	if (strlen($user) > 0) {
		fputs($connect, "AUTH PLAIN " . exec('perl -MMIME::Base64 -e "print &MIME::Base64::encode_base64(\"' . $user . '\0' . $user . '\0' . $password . '\")"') . "\r\n");
		$response = fgets($connect);
		$error_code = getErrorCode(getResponseCode($response));
		if (strlen($error_code) > 0) {
    	logDebug("M3:�y".$subject."�z<".$to.">�G���[���������܂����B�i".$error_code.")");
    	logDebug($response);
			return false;
		}
	}

	//20070404 From�Ή�
	$tmp_send_from = $from;
	if (strpos($tmp_send_from,"<")) {
		$tmp_send_from = explode("<",$from);
	} else {
		$send_from = $from;
	}
	if (is_array($tmp_send_from) && count($tmp_send_from) > 0) {
		$send_from      = substr($tmp_send_from[1], 0, strlen($tmp_send_from[1]) - 1);
		$send_from_name = $tmp_send_from[0];

		$from = "=?ISO-2022-JP?B?" . base64_encode(mb_convert_encoding($send_from_name, "ISO-2022-JP", "SJIS")) ."?= <".$send_from. ">";
	}
	//20070404 From�Ή�

	//20070404 From�Ή�
//	fputs($connect, "MAIL FROM:" . $from . "\r\n");
	fputs($connect, "MAIL FROM:" . $send_from . "\r\n");
	//20070404 From�Ή�
	$response = fgets($connect);
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
    	logDebug("M4:�y".$subject."�z<".$to.">�G���[���������܂����B�i".$error_code.")");
    	logDebug($response);
		return false;
	}

	$rcptToArray = array();
	$toArray     = array();

	if (is_array($to)) {
		$rcptToArray = array_merge($rcptToArray, $to);
//		$toArray     = array_merge($toArray    , $to);
	} else {
		$rcptToArray = array_merge($rcptToArray, preg_split("/,/", $to));
//		$toArray     = array_merge($toArray    , preg_split("/,/", $to));
	}

	foreach ($rcptToArray as $rcptTo) {
		if ($rcptTo) {
			fputs($connect, "RCPT TO:" . $rcptTo . "\r\n");
			$response = fgets($connect);
			$error_code = getErrorCode(getResponseCode($response));
			if (strlen($error_code) > 0) {
    	logDebug("M5:�y".$subject."�z<".$to.">�G���[���������܂����B�i".$error_code.")");
    	logDebug($response);
				return false;
			}
		}
	}

	//TO�Ή�
	if ($to_nm == "") {
		if (is_array($to)) {
			$toArray     = array_merge($toArray    , $to);
		} else {
			$toArray     = array_merge($toArray    , preg_split("/,/", $to));
		}
	} else {
		if (is_array($to_nm)) {
			$toArray     = array_merge($toArray    , $to_nm);
		} else {
			$toArray     = array_merge($toArray    , preg_split("/,/", $to_nm));
		}
	}

	$CcArray  = array();
	$BccArray = array();

	//CC�Ή�
	if (is_array($cc_nm)) {
		$CcArray     = array_merge($CcArray    , $cc_nm);
	} else {
		$CcArray     = array_merge($CcArray    , preg_split("/,/", $cc_nm));
	}
	//BCC�Ή�
	if (is_array($bcc_nm)) {
		$BccArray     = array_merge($BccArray    , $bcc_nm);
	} else {
		$BccArray     = array_merge($BccArray    , preg_split("/,/", $bcc_nm));
	}
	//

	fputs($connect, "DATA"."\r\n");
	$response = fgets($connect);
	fputs($connect, "From: " . $from . "\r\n");
	fputs($connect, "To: " . join(",", $toArray) . "\r\n");
	fputs($connect, "Subject: " . "=?ISO-2022-JP?B?" . base64_encode(mb_convert_encoding($subject, "ISO-2022-JP", "SJIS")) . "?=" . "\r\n");
	//CC�Ή�
	if (count($CcArray) > 0) {
		fputs($connect, "Cc: " . join(",", $CcArray) . "\r\n");
	}
	//BCC�Ή�
	if (count($BccArray) > 0) {
		fputs($connect, "Bcc: " . join(",", $BccArray) . "\r\n");
	}
	fputs($connect, "Date: " . date("r") . "\r\n");
	fputs($connect, "MIME-Version: " . "1.0" . "\r\n");
	fputs($connect, "Content-Type: " . "text/plain; charset=\"ISO-2022-JP\"" . "\r\n");
	fputs($connect, "Content-Transfer-Encoding: " . "8bit" . "\r\n");
	
	// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
	if ($messageId) {
		// MessageId�ݒ�
		fputs($connect, "message-id:<" . $messageId . ">\r\n");
	}
	// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
	
	fputs($connect, "\r\n");
	fputs($connect, mb_convert_encoding($body, "ISO-2022-JP", "SJIS") . "\r\n");

	fputs($connect, "." . "\r\n");
	$response = fgets($connect);
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
    	logDebug("M6:�y".$subject."�z<".$to.">�G���[���������܂����B�i".$error_code.")");
    	logDebug($response);
		return false;
	}

	fputs($connect, "QUIT"."\r\n");
	$response = fgets($connect);
	
	// ��R-#33443_�yH30-0077-005�zWEB�Ǘ��c�[���iPC�ʃ��[�����M�j�̃��O�擾�ƕ������`�F�b�N���P 2018/04/25 nul-nagata
	logDebug("�ysendmail�z���M��F".$to."��SMTP���X�|���X�F".$response);
	// ��R-#33443_�yH30-0077-005�zWEB�Ǘ��c�[���iPC�ʃ��[�����M�j�̃��O�擾�ƕ������`�F�b�N���P 2018/04/25 nul-nagata
	
	$error_code = getErrorCode(getResponseCode($response));
	if (strlen($error_code) > 0) {
    	logDebug("M7:�y".$subject."�z<".$to.">�G���[���������܂����B�i".$error_code.")");
    	logDebug($response);
		return false;
	}
	fclose($connect);
	return true;
}

// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
/**
 * MessageId����
 * @param string $key  �L�[
 * @return string MessageId
 */
function createMessageId($key) {
	// �w��L�[�̃n�b�V���l(MD5)���擾
	$hashKey = hash("md5", $key);
	
	// ���ݓ���(�N���������b)���擾
	$nowStr = date("YmdHis");
	
	// MessageId����
	$messageId = $nowStr . "." . $hashKey . "@saishunkan.co.jp";
	
	return $messageId;
}
// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa

?>
