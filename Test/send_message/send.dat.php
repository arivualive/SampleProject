<?
ini_set('max_execution_time', 120);
//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
require_once ($ROOT_PATH.'/1011/mailDraft_inc.php');
//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
// ��R-#37426_�yH31-0174-015�z NET�̂��q�l�ňӎu�������đΉ����������q�l�̊Ǘ��V�X�e���\�z 2020/07/07 cyc-hatano
require_once ($DATA_PATH.'/'.$org_my_func.'/common.dat.php');
// ��R-#37426_�yH31-0174-015�z NET�̂��q�l�ňӎu�������đΉ����������q�l�̊Ǘ��V�X�e���\�z 2020/07/07 cyc-hatano
//��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
require_once $CONF_PATH."/InquiryTypeConf.inc.php";
//��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa

$another_flg = '';
$wk_title = '';
$wk_msg = '';
$now = time();
$mail_result = false;

if ($my_func != '1013') {
	$mlName_array = explode(',', $mlName_csv);
	$mlTo_array = explode(',', $mlTo_csv);
	$KaiinCD_array = explode(',', $KaiinCD_csv);
} else {
	for ($i = 0; $i < count($p_mlName); $i++) {
		$mlName_array[] = $p_mlName[$i];
		$mlTo_array[] = $p_mlTo[$i];
		$KaiinCD_array[] = $p_KaiinCD[$i];

		$mlFrom_array[] = $p_mlFrom;
		$mlSubject_array[] = $p_mlSubject;
		$mlBody_array[] = $p_mlBody;
		$mlSignature_array[] = $p_mlSignature;
		$Memo_array[] = $p_Memo;
		$Memo2_array[] = $p_Memo2;
		$code_array[] = $p_code;


	}
	for ($i = 0; $i < count($m_mlName); $i++) {
		$mlName_array[] = $m_mlName[$i];
		$mlTo_array[] = $m_mlTo[$i];
		$KaiinCD_array[] = $m_KaiinCD[$i];

		$mlFrom_array[] = $m_mlFrom;
		$mlSubject_array[] = $m_mlSubject;
		$mlBody_array[] = $m_mlBody;
		$mlSignature_array[] = $m_mlSignature;
		$Memo_array[] = $m_Memo;
		$Memo2_array[] = $m_Memo2;
		$code_array[] = $m_code;
	}
}

for ($loopCnt = 0; $loopCnt < count($mlName_array); $loopCnt++) {
	$mlName = $mlName_array[$loopCnt];
	$mlTo = $mlTo_array[$loopCnt];
	$KaiinCD = $KaiinCD_array[$loopCnt];
	// ��R-#37426_�yH31-0174-015�z NET�̂��q�l�ňӎu�������đΉ����������q�l�̊Ǘ��V�X�e���\�z 2020/07/07 cyc-hatano
	$Aiko = getUserAikotoba($KaiinCD);
	// ��R-#37426_�yH31-0174-015�z NET�̂��q�l�ňӎu�������đΉ����������q�l�̊Ǘ��V�X�e���\�z 2020/07/07 cyc-hatano

	if ($my_func === '1013') {
		$mlFrom = $mlFrom_array[$loopCnt];
		$mlSubject = $mlSubject_array[$loopCnt];
		$mlBody = $mlBody_array[$loopCnt];
		$mlSignature = $mlSignature_array[$loopCnt];
		$memo = $Memo_array[$loopCnt];
		$memo2 = $Memo2_array[$loopCnt];
		$mail_cd = $code_array[$loopCnt];
	}

// 	logDebug(print_r($mlName, true));
// 	logDebug(print_r($mlTo, true));
// 	logDebug(print_r($KaiinCD, true));
// 	logDebug(print_r($mlFrom, true));
// 	logDebug(print_r($mlSubject, true));
// 	logDebug(print_r($mlBody, true));
// 	logDebug(print_r($memo, true));
// 	logDebug(print_r($memo2, true));
// 	logDebug(print_r($mail_cd, true));

	$con_utl = dbConnect();
	dbBegin($con_utl);
	//HuyDV 2018/06/04 start
	if ($typ == "mailtrace") {
	    $mailTraceId=$_REQUEST['mailTraceId'];
		$wkCode=$_REQUEST['cd']; // LW: ����ԍ����������ۂ�hidden�ɐݒ肳���kainno
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		/*
		$sql = "SELECT COMMUNICATOR, ACTION_STATE_KBN FROM MAILTRACE_TBL ";
		$sql .=" WHERE MAIL_TRACE_ID = " . getSqlValue($mailTraceId);
		*/
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/01 jst-tomii
		//$sql = "SELECT charge AS COMMUNICATOR, act_stat_kbn AS ACTION_STATE_KBN FROM f_act_mail ";
		$sql = "SELECT charge AS COMMUNICATOR, act_stat_kbn AS ACTION_STATE_KBN FROM f_rcv_mail_h ";
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/01 jst-tomii
  		$sql .=" WHERE act_mail_seq = " . getSqlValue($mailTraceId);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku

		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}
	//HuyDV 2018/06/04 end
	//'---���ӌ��E�����k�X�e�[�^�X�`�F�b�N---
	if ($typ == "voice") {
	    $wk_cvid=$_REQUEST['cvid'];
		$wkCode=$_REQUEST['cd']; // LW: ����ԍ����������ۂ�hidden�ɐݒ肳���kainno
		$wkTel=$_REQUEST["tel"];
		$wkSendDt=$_REQUEST['sdt']; // LW: send_date�Breport/voice_report.asp�Őݒ肳���ACUSTOMERSVOICE�e�[�u����SEND_DT�B
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		/*
		$sql = "SELECT Communicator, Status FROM CustomerVoice_Tbl ";
		//$sql .= "WHERE regist_dt=TO_DATE(".getSqlValue($wkSendDt).", 'yyyymmddhh24miss') AND kainno=".getSqlValue($wkCode)." AND tel_no=".getSqlValue(ssk_encrypt($wkTel));
		$sql .=" WHERE cvoice_id = " . getSqlValue($wk_cvid);
		*/
		$sql = "SELECT responder AS Communicator, stat_kbn  AS Status FROM f_opinion_consul ";
  		$sql .=" WHERE voice_consul_seq = " . getSqlValue($wk_cvid);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku

		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}

	//'---manzoku@�X�e�[�^�X�`�F�b�N---
	if ($typ == "manzoku") {
		$wkMailDate=$_REQUEST['dt'];
		$wkFromAddress=$_REQUEST['fa'];
		$sql = "SELECT Communicator,Status FROM RecvMail_Tbl ";
		$sql .= "WHERE MailDate=".getSqlValue($wkMailDate)." AND FromAddress=".getSqlValue($wkFromAddress);
		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}

	//'---���烁�[���X�e�[�^�X�`�F�b�N---
	if ($typ == "orei") {
		$wkOrderId=$_REQUEST['econorderid'];
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		/*
		$sql = "SELECT Communicator,Status FROM RecvOrder_Tbl ";
		$sql .= "WHERE recv_order_id=".getSqlValue($wkOrderId);
		*/
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/01 jst-tomii
		//$sql = "SELECT responder AS Communicator,stat_kbn  AS Status FROM f_odr ";
		$sql = "SELECT responder AS Communicator,stat_kbn  AS Status FROM f_odr_h ";
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/01 jst-tomii
  		$sql .= "WHERE odr_seq=".getSqlValue($wkOrderId);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}

	//'---�h���X�p���烁�[���X�e�[�^�X�`�F�b�N---
	if ($typ == "dress") {
		$wkOrderId=$_REQUEST['econorderid'];
		$sql = "SELECT Communicator,Status FROM DirectOrder_Tbl ";
		$sql .= "WHERE direct_order_id=".getSqlValue($wkOrderId);
		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}

	//��2011/07/13 A-05761 ���ރh���Ή��i�ʏ�̔��j�iec-one tazoe�j
	//'---���ރh��(����)�p���烁�[���X�e�[�^�X�`�F�b�N---
	if ($typ == "drink") {
		$wkOrderId=$_REQUEST['econorderid'];
		$sql = "SELECT Communicator,Status FROM DrinkDirectOrder_Tbl ";
		$sql .= "WHERE direct_order_id=".getSqlValue($wkOrderId);
		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}

	//'---���ރh��(���)�p���烁�[���X�e�[�^�X�`�F�b�N---
	if ($typ == "drink_regular") {
		$wkOrderId=$_REQUEST['econorderid'];
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		/*
		$sql = "SELECT Communicator,Status FROM RegularOrder_Tbl ";
		$sql .= "WHERE regular_order_id=".getSqlValue($wkOrderId);
		*/
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/01 jst-tomii
		//$sql = "SELECT responder AS Communicator,stat_kbn  AS Status FROM f_regular_buy_odr_info_record ";
		$sql = "SELECT responder AS Communicator,stat_kbn  AS Status FROM f_regular_buy_odr_info_record_h ";
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/01 jst-tomii
  		$sql .= "WHERE regular_buy_odr_seq=".getSqlValue($wkOrderId);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		$result = checkStatus($con_utl, $sql, $wk_title, $wk_msg);
		if ($wk_msg != null)
			break;
	}
	//��2011/07/13 A-05761 ���ރh���Ή��i�ʏ�̔��j�iec-one tazoe�j

// 20071031 �Ή��e�[�u�����������A����KaiinMailSend_Tbl����ctrlno�J�����������Ȃ������߁A�Œ�l�ɂ��Ă���
	//'---�Ǘ��m���擾---
	$now_str = date('YmdHis', $now);
	$wk_date = date('Ymd', $now); // YMD�iASP:Date�j
// 	rs.Open cmdTemp, , adOpenKeyset, adLockPessimistic
// ���b�N���g�p���Ă��邽�߁AFOR UPDATE��t����
// 	$sql = "SELECT * from KaiinMailCtrlNo_Tbl Where SendDate = TO_DATE??".getSqlValue($wk_date)." FOR UPDATE";
// 	$result = dbQuery($con_utl, $sql, true);
// 	$rows = getNumRows($result, $arr_utl);
// 	if ($rows == 0) {
		$wk_ctrlno = 1;
// 		$sql = "INSERT INTO KaiinMailCtrlNo_Tbl (SEND_DATE, CTRL_NO) VALUES (".getSqlValue($wk_date).", 1)";
// 		$result = dbQuery($con_utl, $sql, true);
// 	} else {
// 		$row = dbFetchRow($result, 0, $arr_utl);
// 		$wk_ctrlno = $row['CTRL_NO'] + 1;
// 		$sql = "UPDATE KaiinMailCtrlNo_Tbl SET CTRL_NO = ".getSqlValueNum($wk_ctrlno)." WHERE SendDate = ".getSqlValue($wk_date)." FOR UPDATE";
// 		$result = dbQuery($con_utl, $sql, true);
// 	}
// 	dbCommit($con_utl);

	// ASP�F�ꊇ���[�����M�̂݁A�����ōŌ�̒u��
	if ($my_func == '1013') {
		$mlBody = str_replace('����������', trim($mlName), $mlBody);
		$mlBody = str_replace('����������������', $KaiinCD, $mlBody);
		$mlBody = str_replace('����������������', trim($mlTo), $mlBody);
		$mlBody = str_replace('@@MAILCD@@', trim($mail_cd), $mlBody);
		$mlBody = str_replace('@NAME', trim($mlName), $mlBody);
		$mlBody = str_replace('���m�`�l�d', trim($mlName), $mlBody);
		$mlBody = str_replace('@KAIINNO', trim($KaiinCD), $mlBody);
		$mlBody = str_replace('���j�`�h�h�m�m�n', trim($KaiinCD), $mlBody);
		// ��R-#38373_�yH31-0049-042�z�yWEB�Ǘ��c�[���z�S���Җ��̎������͂ɂ��� 2020/09/11 saisys-kiyota
		$mlBody = str_replace('���b�n�l�m�`�l�d', $comm_title."�@".trim($S_USERNAME), $mlBody);
		// ��R-#38373_�yH31-0049-042�z�yWEB�Ǘ��c�[���z�S���Җ��̎������͂ɂ��� 2020/09/11 saisys-kiyota
		$mlBody = str_replace('���l�`�h�k�b�n�c�d', trim($mail_cd), $mlBody); // add by LW
		$mlBody = str_replace('���l�`�h�k', trim($mlTo), $mlBody);
		// ��R-#37426_�yH31-0174-015�z NET�̂��q�l�ňӎu�������đΉ����������q�l�̊Ǘ��V�X�e���\�z 2020/07/07 cyc-hatano
		$mlBody = str_replace("@aiko@", $Aiko, $mlBody);
		$mlBody = str_replace("@AIKO@", $Aiko, $mlBody);
		$mlBody = str_replace("������������", $Aiko, $mlBody);
		$mlBody = str_replace("���`�h�j�n��", $Aiko, $mlBody);
		// ��R-#37426_�yH31-0174-015�z NET�̂��q�l�ňӎu�������đΉ����������q�l�̊Ǘ��V�X�e���\�z 2020/07/07 cyc-hatano
		// ��R-#38373_�yH31-0049-042�z�yWEB�Ǘ��c�[���z�S���Җ��̎������͂ɂ��� 2020/09/11 saisys-kiyota
		$mlBody = str_replace('���b�n�l�r�d�h�l�d�h', trim($S_USERNAME), $mlBody);
		if(mb_substr_count($mlBody,'���b�n�l�l�x�n�t�i�h') >= 1 ) {
			$str_tanto = $S_USERNAME;
			$str_tanto = spaceCnv($str_tanto);
			$mlBody = str_replace('���b�n�l�l�x�n�t�i�h', trim($str_tanto), $mlBody);
		}
		if(mb_substr_count($mlBody,'���l�x�n�t�i�h') >= 1 ) {
			$str_name = $mlName;
			$str_name = spaceCnv($str_name);
			$mlBody = str_replace('���l�x�n�t�i�h', trim($str_name), $mlBody);
		}
		// ��R-#38373_�yH31-0049-042�z�yWEB�Ǘ��c�[���z�S���Җ��̎������͂ɂ��� 2020/09/11 saisys-kiyota
	}

/** ���s�������Ɠ����Ă��Ă��A����I�ɉ��s�����Ă��܂��̂ŃR�����g�A�E�g
	$setmlBody = '';
	$charcnt = 400;

	for ($loopCnt = 0; $loopCnt < (mb_strlen($mlBody)/$charcnt); $loopCnt++) {

		$tmp = mb_substr($mlBody,$loopCnt*$charcnt,$charcnt) ;
		if(mb_strlen($tmp) < $charcnt){
			$setmlBody .= $tmp;
		}else{
			$setmlBody .= $tmp.$crlf;
		}
	}

	$mlBody = $setmlBody;
*/

	//'---���M�����X�V---
	$MailDate = substr($wk_date, 0, 8); // YMD
	$MailTime = date('Hi', $now);
	$strTimeSec = date('s', $now);

	// strSQL = "INSERT INTO " & DistTbl & "(RequestDate,RequestTime,KaiinCD,SendDate,SendTime,MailCD,MailAddress,MailText,ErrFlg,TantoCD,TaiouText,TaiouText2,CtrlNo) "
	//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
    $sql  = "";
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	/*
    $sql .= " INSERT INTO KaiinMailSend_Tbl ( "; // �ʑΉ����[�����M�����e�[�u��
    $sql .= "   request_dt";       // ���M����
    $sql .= "  ,kainno";           // ����ԍ�
    $sql .= "  ,send_dt";          // ���M����
    $sql .= "  ,mail_cd";          // ���[���R�[�h
    $sql .= "  ,email";            // ���[���A�h���X
    $sql .= "  ,mail_body";        // ���[���{��
    $sql .= "  ,error_flg";        // �G���[�t���O
    $sql .= "  ,tanto_cd";         // �R�~���j�P�[�^�R�[�h
    $sql .= "  ,TAIOUMEMO";        // �Ή�����
    $sql .= "  ,update_dt";        // �X�V��
    $sql .= "  ,regist_dt";        // �o�^��
    $sql .= "  ,update_user";      // �ŏI�X�V��
    $sql .= "  ,regist_user";      // �o�^��
    $sql .= "  ,KAIINMAILSEND_CD"; // ������[�����M�R�[�h
    // ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
    $sql .= "  ,MESSAGE_ID";       // ���b�Z�[�WID
    // ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
    $sql .= " ) ";
    //��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
	$sql .= " VALUES(";
	$values = array(); // need
// 	$values[] = 'TO_DATE('.getSqlValue($MailDate.$MailTime.'00').", 'yyyymmddhh24miss')";
	$values[] = 'TO_DATE('.getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss')";
	$values[] = getSqlValue($KaiinCD);
// 	$values[] = 'TO_DATE('.getSqlValue($MailDate.$MailTime.'00').", 'yyyymmddhh24miss')";
	$values[] = 'TO_DATE('.getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss')";
	$values[] = getSqlValue($mail_cd);
	$values[] = getSqlValue(ssk_encrypt($mlTo));
//	$values[] = getSqlValue(substr("Subject�F ".$mlSubject.$crlf.$crlf.$mlBody, 0, 3000));
	// CLOB�ւ̑���ɑΉ�
	$values[] = ':MailBodyData';
	//$values[] = ':mlBody';
	$values[] = '0';
	$values[] = getSqlValue($S_USERID);

    $values[] = getSqlValue($memo);

	$values[] = 'sysdate';
	$values[] = 'sysdate';
	$values[] = getSqlValue('Tool:'.$S_USERID);
	$values[] = getSqlValue('Tool:'.$S_USERID);
	//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
	if (!$_REQUEST['MDCD'] && $my_func != '1013') {
		// �V�K���R�[�h�̏ꍇ�͐V�K���������[���R�[�h����
		$_REQUEST['MDCD'] = getMailDraftCD();
	}
	$values[] = getSqlValue($_REQUEST['MDCD']);
    //��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
    // ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
    // MessageId���擾
    $messageId = createMessageId($_REQUEST['MDCD']);
	$values[] = getSqlValue($messageId);
    // ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
	$sql .= implode(', ', $values).')';
	*/
	$sql .= " INSERT INTO f_indiv_act_mail_send ( "; // �ʑΉ����[�����M�����e�[�u��
    $sql .= "   req_dt_tm";       // ���M����
    $sql .= "  ,cust_no";           // ����ԍ�
    $sql .= "  ,send_dt_tm";          // ���M����
    $sql .= "  ,mail_cd";          // ���[���R�[�h
    $sql .= "  ,mail_adr";            // ���[���A�h���X
    $sql .= "  ,mail_body_letter";        // ���[���{��
    $sql .= "  ,err_flg";        // �G���[�t���O
    $sql .= "  ,user_cd";         // �R�~���j�P�[�^�R�[�h
    $sql .= "  ,act_memo";        // �Ή�����
    $sql .= "  ,update_date";        // �X�V��
    $sql .= "  ,register_date";        // �o�^��
    $sql .= "  ,update_user_cd";      // �ŏI�X�V��
    $sql .= "  ,register_user_cd";      // �o�^��
    $sql .= "  ,indiv_act_mail_send_hist_cd"; // ������[�����M�R�[�h
    $sql .= "  ,msg_cd";       // ���b�Z�[�WID
    $sql .= " ) ";

	$sql .= " VALUES(";
	$values = array(); 

	$values[] = 'TO_TIMESTAMP('.getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss')";
	$values[] = getSqlValue($KaiinCD);

	$values[] = 'TO_TIMESTAMP('.getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss')";
	$values[] = getSqlValue($mail_cd);
	$values[] = getSqlValue($mlTo);

	$values[] = ':MailBodyData';

	$values[] = '0';
	$values[] = getSqlValue($S_USERID);

	$values[] = getSqlValue($memo);

	$values[] = 'current_timestamp(0)';
	$values[] = 'current_timestamp(0)';
	$values[] = getSqlValue('Tool:'.$S_USERID);
	$values[] = getSqlValue('Tool:'.$S_USERID);

	if (!$_REQUEST['MDCD'] && $my_func != '1013') {

		$_REQUEST['MDCD'] = getMailDraftCD();
	}
	$values[] = getSqlValue($_REQUEST['MDCD']);

	$messageId = createMessageId($_REQUEST['MDCD']);
	$values[] = getSqlValue($messageId);

	$sql .= implode(', ', $values).')';
 // ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	//$result = dbQuery($con_utl, $sql, true);
	// CLOB�ւ̑���ɑΉ�
	logSql($sql);
	$stmt = OCIParse($con_utl, $sql);
	if ($stmt !== FALSE) {
		//$clob = oci_new_descriptor($con_utl, OCI_D_LOB);
		$clob = ocinewdescriptor($con_utl, OCI_D_LOB);
		//$result = oci_bind_by_name($stmt, ':MailBodyData', $clob, -1, OCI_B_CLOB);
		$result = ocibindbyname($stmt, ':MailBodyData', $clob, -1, OCI_B_CLOB);
		if ($result !== FALSE) {
//��R-#4884 WEB�Ǘ��c�[����IE8�s� 2012/07/17 uls-soga
			$mail_body_data = "Subject�F ".$mlSubject.$crlf.$crlf.$mlBody;
//��R-#4884 WEB�Ǘ��c�[����IE8�s� 2012/07/17 uls-soga
			$clob->writeTemporary($mail_body_data);
			$result = OCIExecute($stmt, OCI_DEFAULT);
			if ($result === FALSE) {
				dbRollback($con_utl);
			}
			$clob->close();
			$clob->free();
		} else {
			dbRollback($con_utl);
		}
	} else {
		dbRollback($con_utl);
	}
	// ���̕���dbFreeResult()�����̂�����邽�߂ɏ���������
	$result2 = true;

	//$result = ssk_db_parse($con_utl, $sql);
	//ssk_db_bind_by_name($result, ':mlBody', "Subject�F ".$mlSubject.$crlf.$crlf.$mlBody, -1);
	//ssk_db_execute($result);

	$another_flg = false;
	//'---�R���r�j����X�e�[�^�X�X�V---
	if ($status != "") {

        //��2010/06/23 ���[�����M�i���[�����сj�̕s��Ή��ikdl yoshii�j
        //$sql = "UPDATE ordereconinfo_tbl set mail_send_flg = ".getSqlValue($status).", update_dt = sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID)." where EconOrder_ID = ".getSqlValue($_REQUEST['econorderid']);
        $sql  = "UPDATE ordereconinfo_tbl set mail_send_flg = ".getSqlValue($status).", update_dt = sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
        $sql .= " where EconOrder_ID = (select ECONORDER_ID  from recvorder_tbl  where RECV_ORDER_ID =".getSqlValue($_REQUEST['econorderid']).")";
        //��2010/06/23 ���[�����M�i���[�����сj�̕s��Ή��ikdl yoshii�j

		$result2 = dbQuery($con_utl, $sql, true);
		$another_flg = true;
	}

	//'---���ӌ��E�����k�X�e�[�^�X�X�V---
	if ($typ == "voice") {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		/*
		$sql = "UPDATE CustomerVoice_Tbl SET status=9, ctrlno=".getSqlValueNum($wk_ctrlno).",return_dt=TO_DATE(".getSqlValue($now_str).", 'yyyymmddhh24miss'),update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		// ASP�ł́ASendDt�̏��A'�̌�ɃX�y�[�X�����邪�������H
// 		strSQL = strSQL & "WHERE SendDt=' " & ToGetEscapeSql(wkSendDt) & "' AND Code='" & ToGetEscapeSql(wkCode) & "' AND Tel='" & ToGetEscapeSql(wkTel) & "'"
//		$sql .= " WHERE regist_dt=TO_DATE(".getSqlValue($wkSendDt).",'yyyymmddhh24miss') AND kainno=".getSqlValue($wkCode)." AND tel_no=".getSqlValue(ssk_encrypt($wkTel));
		$sql .=" WHERE cvoice_id = " . getSqlValue($wk_cvid);
		$result2 = dbQuery($con_utl, $sql, true);
		*/
		$sql = "UPDATE f_opinion_consul SET stat_kbn='9', ans_mail_ctrl_no=".getSqlValueNum($wk_ctrlno).",ans_dt=TO_TIMESTAMP(".getSqlValue($now_str).", 'yyyymmddhh24miss'),update_date=current_timestamp(0), update_user_cd = ".getSqlValue('Tool:'.$S_USERID);
  		$sql .=" WHERE voice_consul_seq = " . getSqlValue($wk_cvid);
		$result2 = dbQuery($con_utl, $sql);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		$another_flg = true;
	}

	//'---�������烁�[��---
	if ($typ == "orei") {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		/*
		$sql = "UPDATE recvorder_tbl SET mail_flg = 2, status=9, sync_flg = 0, mail_send_dt = to_date(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		$sql .= " WHERE recv_order_id=".getSqlValue($_REQUEST['econorderid'])." AND order_status=2";
		$result2 = dbQuery($con_utl, $sql, true);
		*/
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/01 jst-tomii
		//$sql = "UPDATE f_odr SET ship_mail_send_kbn = '2', stat_kbn=9, sync_flg = '0', thank_mail_send_dt = to_timestamp(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), thank_mail_ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_date = current_timestamp(0), update_user_cd = ".getSqlValue('Tool:'.$S_USERID);
		$sql = "UPDATE f_odr_h SET ship_mail_send_kbn = '2', stat_kbn=9, sync_flg = '0', thank_mail_send_dt = to_timestamp(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), thank_mail_ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_date = current_timestamp(0), update_user_cd = ".getSqlValue('Tool:'.$S_USERID);
  		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/07/01 jst-tomii
		$sql .= " WHERE odr_seq=".getSqlValue($_REQUEST['econorderid'])." AND odr_stat_kbn='2'";
		$result2 = dbQuery($con_utl, $sql);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		$another_flg = true;
	}

	//'---�h���X�������烁�[��---
	if ($typ == "dress") {
		$sql = "UPDATE directorder_tbl SET mail_flg = 2, status=9, sync_flg = 0, mail_send_dt = to_date(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		$sql .= " WHERE direct_order_id=".getSqlValue($_REQUEST['econorderid'])." AND order_status=2";
		$result2 = dbQuery($con_utl, $sql, true);
		$another_flg = true;
	}

	//��2011/07/13 A-05761 ���ރh���Ή��i�ʏ�̔��j�iec-one tazoe�j
	//'---���ރh��(����)�������烁�[��---
	if ($typ == "drink") {
		$sql = "UPDATE DrinkDirectOrder_Tbl SET mail_flg = 2, status=9, sync_flg = 0, mail_send_dt = to_date(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		$sql .= " WHERE direct_order_id=".getSqlValue($_REQUEST['econorderid'])." AND order_status=2";
		$result2 = dbQuery($con_utl, $sql, true);
		$another_flg = true;
	}

	//'---���ރh��(���)�������烁�[��---
	if ($typ == "drink_regular") {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		/*
		$sql = "UPDATE RegularOrder_Tbl SET mail_flg = 2, status=9, sync_flg = 0, mail_send_dt = to_date(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		$sql .= " WHERE regular_order_id=".getSqlValue($_REQUEST['econorderid'])." AND order_status=2";
		$result2 = dbQuery($con_utl, $sql, true);
		*/
		$sql = "UPDATE f_regular_buy_odr_info_record SET ship_mail_send_kbn = '2', stat_kbn=9, sync_flg = '0', thank_mail_send_dt = to_timestamp(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), thank_mail_ctrl_no = ".getSqlValueNum($wk_ctrlno).", update_date = current_timestamp(0), update_user_cd = ".getSqlValue('Tool:'.$S_USERID);
  		$sql .= " WHERE regular_buy_odr_seq=".getSqlValue($_REQUEST['econorderid'])." AND odr_stat_kbn = '2'";
		$result2 = dbQuery($con_utl, $sql);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		$another_flg = true;
	}
	//��2011/07/13 A-05761 ���ރh���Ή��i�ʏ�̔��j�iec-one tazoe�j

	//'2005/2/3  ����ʃ��[���𑗐M�����Ƃ��ɉ��CD�����v����΁ASampleMail_TBL��StatusFLG��4�Ƃ��čX�V
// 20071031: �Ή��e�[�u��������
// 	$sql = "Update SampleMail_Tbl SET StatusFLG=4 Where KaiinCD = ".getSqlValue($KaiinCD);
// 	$result = dbQuery($con_utl, $sql, true);


    //��#1238 ���[�����M�@�\�S�Ă���A�A�h�o�C�X�y�[�W�쐬���\�� 2010/08/11 kdl-uchida
	//'---���M�������[���ɑΉ�����A�h�o�C�X�y�[�W---
    if(isset($_SESSION['2010advice']['cvoice_id']) && !is_null($_SESSION['2010advice']['cvoice_id'])){
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		/*
		$sql = "UPDATE AdviceHtml_Tbl SET Send_Dt = to_date(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), update_dt=sysdate, update_user = ".getSqlValue('Tool:'.$S_USERID);
		$sql .= " WHERE CVOICE_ID = '" . getSqlValueNum($_SESSION['2010advice']['cvoice_id']) . "'";
        $sql .= " and   GYOUMUKBN = '" . getSqlValueNum($_SESSION['MGMKBN']) . "'";
		$result2 = dbQuery($con_utl, $sql, true);
		*/
		$sql = "UPDATE f_advice_html SET mail_send_dt = to_timestamp(".getSqlValue($MailDate.$MailTime.$strTimeSec).", 'yyyymmddhh24miss'), update_date = current_timestamp(0), update_user_cd = ".getSqlValue('Tool:'.$S_USERID);
  		$sql .= " WHERE voice_consul_cd = '" . getSqlValueNum($_SESSION['2010advice']['cvoice_id']) . "'";
        $sql .= " and   bs_kbn = '" . getSqlValueNum($_SESSION['MGMKBN']) . "'";
		$result2 = dbQuery($con_utl, $sql);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	}



	//'---���[�����M---
	$to_email = $mlTo;
	$to_name = '';
	if ($mlName != '')
		$to_name = $mlName."�@�l";

	$opt_header = "X-SaishunkanID:".$mlTo.",".$wk_ctrlno.",".$MailDate;

	//if ($typ == "orei" && $intSendMailFLG == 1) {

//Mod start 2008/07/02 �ʃ��[�����M�G���[�̑Ή� -----------
//�������烁�[������ʃ��[���𑗐M�����ꍇ�Asend_mail�����s����Ȃ����߃��[�������M����Ă��Ȃ��������Ƃ̑Ή�
//	if ($typ == "orei") {
//	} else {
		if ($result != false and $result2 != false) {
//	 		$opt_header .= "Cc: ".mb_encode_mimeheader(mb_convert_encoding('CC��', "ISO-2022-JP"), "ISO-2022-JP").'<a@a>'."\r\n";
			// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
 			$mail_result = send_mail($mlFrom, $to_email, $to_name, $mlSubject, $mlBody, $opt_header, null, null, null, null, $messageId);
			// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
//��R-#4884 WEB�Ǘ��c�[����IE8�s� 2012/07/17 uls-soga
		}
//	}
//Mod ens 2008/07/02 ----------------------------------------

	if ($result == false or $result2 == false) {
		dbRollback($con_utl);
		$wk_title = 'DB�X�V���s';
		$wk_msg = '�f�[�^�x�[�X�̍X�V�Ɏ��s';
	}
	elseif ($mail_result == false) {
		dbRollback($con_utl);
		$mail_send_error = true;
		$wk_title = ' ';
		$wk_msg = ' ';
		logDebug('Mail Send Error $my_func:'.$my_func.' $S_USERID:'.$S_USERID.' $KaiinCD:'.$KaiinCD);
	}
	else {
		dbCommit($con_utl);
	}

	if ($result2 != true) {
		dbFreeResult($result);
	}
	$result = null;

    // ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
    // ����ԍ����w�肳��Ă���ꍇ�̂݃R���^�N�g���e�ꗗ�擾
    if (intval($KaiinCD) > 0) {
       $contactList = getContactList($con_utl, $KaiinCD, $inquiry_kbn_list, $inquiry_type_list);
       
       // �I�������R���^�N�g���e�ɑ��M���[���R�[�h��ݒ�
       for($idxContact = 0; $idxContact < count($contactList); $idxContact++) {
           $contact = $contactList[$idxContact];
           $replayMailTraceId = $contact["MAIL_TRACE_ID"];
           if(array_key_exists('replyMailTarget_' . $replayMailTraceId, $_REQUEST)){
               if (getHtmlEscapedString($_REQUEST['replyMailTarget_' . $replayMailTraceId]) != "off") {
                   // ���[���̏ꍇ
                   if ($contact["CONTACT_TYPE"] == 'MAIL') {
                       // ��M���[���ɑ��M���[���R�[�h��ݒ�
                       updateSendMailCdToTraceMail($con_utl, $replayMailTraceId, $_REQUEST['MDCD'], $S_USERID);
                       
                       // �₢���킹��Ή��ς݂ɐݒ�
                       if ($contact["CVOICE_ID"]) {
                           updateComplateCVoice($con_utl, $contact["CVOICE_ID"], $S_USERID);
                       }
                   }
                   // �����̏ꍇ
                   else if ($contact["CONTACT_TYPE"] == 'ORDER') {
                       // �����ɑ΂��đΉ��ς݂�ݒ�
                       updateComplateOrder($con_utl, $replayMailTraceId, $S_USERID);
                   }
               }
           }
       }
    }

    // ���[�������E�{���ɓ��蕶�������݂���ꍇ�͑��M��񃌃R�[�h�ǉ�
    insertMailSendInfo($con_utl, $_REQUEST['MDCD'], $mlSubject, $mlBody, $S_USERID);
    // ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa

	dbClose($con_utl);
	$con_utl = null;
}
if ($result != null && $result != false)
	dbFreeResult($result);
if ($con_utl != null)
	dbClose($con_utl);

// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� 2018/05/24 HuyDV
function updateMailTrace($con, $mailTraceId){
	logDebug("MAILTRACE_TBL_update[start] ");
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	// $sql = "Update MAILTRACE_TBL set ACTION_STATE_KBN=1 where MAIL_TRACE_ID='".$mailTraceId."'";
	$sql = "Update f_act_mail set act_stat_kbn='1' where act_mail_seq='".$mailTraceId."'";
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	logDebug("sql=".$sql);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/06/04 jst-haku
	/* $result = ssk_db_parse($con, $sql);
	
	if(!$result) {
		dbFreeResult($result);
		dbClose($con);
		return false;
	}
	*/
	$result = $con->prepare($sql)->execute();
	if(!$result) {
		unset($con);
		return false;
	}
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/06/04 jst-haku
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	// $result = dbQuery($con, $sql,true);
	$result = dbQuery($con, $sql);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	if(!$result) {
		dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}
	logDebug("result=".print_r($result,1));
	dbCommit($con);
	dbFreeResult($result);
	dbClose($con);
	logDebug("MAILTRACE_TBL_update[end] ");
	return true;
}
// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� 2018/05/24 HuyDV
function checkStatus($con_utl, $sql, &$wk_title, &$wk_msg) {
	global $S_USERID;
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	/*
	$result = dbQuery($con_utl, $sql, true);
	$rows = getNumRows($result, $arr_utl);
	*/
	$result = dbQuery($con_utl, $sql);
	$rows = getNumRows($result);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	if ($rows == 0) {
		$wk_title = "���G���[��";
		$wk_msg = "���R�[�h�����݂��܂���B";
		return;
	} else {
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		// $row = dbFetchRow($result, 0, $arr_utl);
		$row = dbFetchRow($result, 0);
		// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
		if ($row['COMMUNICATOR'] != trim($S_USERID)) {
			$wk_title = "���G���[��";
			$wk_msg = "���̂��q�l�v���[�U�[���Ή����Ă��܂��B";
			return;
		//HuyDV 2018/06/04 start
		} else if (isset($row['STATUS'])) {
			if ($row['STATUS'] != 1) {
				$wk_title = "���G���[��";
				$wk_msg = "�Ή����������Ă��邩�X�e�[�^�X�̕ύX���s���Ă��܂��B";
				return;
			}
		} else if (isset($row['ACTION_STATE_KBN'])) {
			if ($row['ACTION_STATE_KBN'] == 1) {
				$wk_title = "���G���[��";
				$wk_msg = "�Ή����������Ă��邩�X�e�[�^�X�̕ύX���s���Ă��܂�";
				return;
			}
		}
		//HuyDV 2018/06/04 end
	}
	return $result;
}

function send_denbun($KaiinCD, $TelNOX, $MailAddress, $MailDate, $MailTime, $MailCD, $MemoStr, $MemoStr2) {
	//��2013/08/05 R-#10660_�y�Ǘ��c�[���z�Ή��������Ɂu�@��ˑ������v����͂����A930�d���G���[������(ulsystems hatano)
    global $S_USERID, $KANRI_MAIL_KBN;
	$con = dbConnect();
	//��2013/08/05 R-#10660_�y�Ǘ��c�[���z�Ή��������Ɂu�@��ˑ������v����͂����A930�d���G���[������(ulsystems hatano)

	$KaiinCD = fncDenbunFormat($KaiinCD, 8, 1);
	$TelNOX = fncDenbunFormat(trim($TelNOX), 13, 0); // ASP�ł́A�����͏�ɋ�̗l
// 	$MailAddress = fncDenbunFormat(trim($MailAddress), 48, 0);
	$MailDate = fncDenbunFormat($MailDate, 8, 1);
	$MailTime = fncDenbunFormat($MailTime, 4, 1);
	$MailCD = fncDenbunFormat($MailCD, 4, 1);
    //��2011/03/07 #16 �Ή��������C���Ή�(A-4003)(EC-One hatano)
    /*
	$MemoStr = fncDenbunFormat($MemoStr, 60, 0);
	$MemoStr2 = fncDenbunFormat($MemoStr2, 60, 0);

	$i = 0;
	$denbun_data = array();
	$denbun_data[$i++] = $KaiinCD;
	$denbun_data[$i++] = $TelNOX;
// 	$denbun_data[$i++] = $MailAddress;
	$denbun_data[$i++] = $MailDate;
	$denbun_data[$i++] = $MailTime;
	$denbun_data[$i++] = $MailCD;
	$denbun_data[$i++] = $MemoStr;
	$denbun_data[$i++] = '0';

	$denbun_msg = array();
 	$ret = fncDenbunNXCOM('A930', $denbun_data, $denbun_msg); // A410 �� A930
// ASP�ł̓m�[�`�F�b�N
// 	if ($ret !== 0) {
// 		$comp_msg = 'A930�d���Ɏ��s���܂����B';
// 	} else {
// 		$comp_msg = 'A930�d���𔭍s���܂����B';
// 	}

	//'�Ή������Q
	if (trim($MemoStr2) != '') {
		$i = 0;
		$denbun_data = array();
		$denbun_data[$i++] = $KaiinCD;
		$denbun_data[$i++] = $TelNOX;
// 		$denbun_data[$i++] = $MailAddress;
		$denbun_data[$i++] = $MailDate;
		$denbun_data[$i++] = $MailTime;
		$denbun_data[$i++] = $MailCD;
		$denbun_data[$i++] = $MemoStr2;
		$denbun_data[$i++] = '0';
		$ret = fncDenbunNXCOM('A930', $denbun_data, $denbun_msg); // A410 �� A930
// ASP�ł̓m�[�`�F�b�N
// 		if ($ret !== 0) {
// 			$comp_msg = 'A930�d���Ɏ��s���܂����B';
// 		} else {
// 			$comp_msg = 'A930�d���𔭍s���܂����B';
// 		}
	}
    */
    $UserID  = fncDenbunFormat($S_USERID, 5, 0);    //�S���҃R�[�h
    $MailAddress = fncDenbunFormat($MailAddress, 100, 0);//���[���A�h���X
    $MemoStr = fncDenbunFormat($MemoStr, 400, 0);    //�Ή�����

    $i = 0;
	$denbun_data = array();
	$denbun_data[$i++] = $KaiinCD;
	//$denbun_data[$i++] = $TelNOX;
	$denbun_data[$i++] = $MailDate;
	$denbun_data[$i++] = $MailTime;
	$denbun_data[$i++] = $UserID;     //�S���҃R�[�h
    $denbun_data[$i++] = $MailAddress;
    $denbun_data[$i++] = "10";        //�`���l���敪�P
    $denbun_data[$i++] = "50";        //�`���l���敪�P
    $denbun_data[$i++] = fncDenbunFormat("", 2, 0);
    $denbun_data[$i++] = fncDenbunFormat("", 2, 0);
	$denbun_data[$i++] = $MemoStr;

    $denbun_msg = array();
 	$ret = fncDenbunNXCOM('A930', $denbun_data, $denbun_msg);
    //��2011/03/07 #16 �Ή��������C���Ή�(A-4003)(EC-One hatano)

	//��2013/08/05 R-#10660_�y�Ǘ��c�[���z�Ή��������Ɂu�@��ˑ������v����͂����A930�d���G���[������(ulsystems hatano)
	if ($ret != "0") {
		$error_mail_subject = "�y�m�F�v�z�Ή��������d����WAO�A�g�������s";
		$error_mail_body  = "�Ή��������d��(A930)��WAO�A�g�����Ɏ��s���܂����B\n";
		$error_mail_body .= "\n";
		$error_mail_body .= "����ԍ��F" . $KaiinCD . "\n";
		$error_mail_body .= "���M�����F" . date('Y-m-d',strtotime($MailDate)) . " " . substr($MailTime, 0, 2) . ":" . substr($MailTime, 2, 2) . "\n";
		$error_mail_body .= "�S����CD�F" . $S_USERID . "\n";
		$error_mail_body .= "���[���A�h���X�F" . $MailAddress . "\n";
		$error_mail_body .= "�Ή��������F" . $MemoStr . "\n";
		fncGetKanriMail($con, $KANRI_MAIL_KBN['MEMO'], $error_mail_subject, $error_mail_body);
	}
	dbClose($con);
	//��2013/08/05 R-#10660_�y�Ǘ��c�[���z�Ή��������Ɂu�@��ˑ������v����͂����A930�d���G���[������(ulsystems hatano)
}

/* ~/include/lib/common.inc.php�Ɉړ�
function send_mail($from, $to_email, $to_name, $subject, $body, $opt_header) {
// 	mb_language("ja"); // need?

	$headers  = "MIME-Version: 1.0\r\n" ;
	$idx = mb_strpos($from, '<');
	if ($idx !== false) {
		$headers .= "From: ".mb_encode_mimeheader(mb_convert_encoding(mb_substr($from, 0, $idx), "ISO-2022-JP"), "ISO-2022-JP").mb_substr($from, $idx)."\r\n";
	} else {
		$headers .= "From: ".$from."\r\n";
	}
	if (mb_strpos($from, 'privacy') !== false) {
		$refrom = "privacy@saishunkan.co.jp";
	} elseif (mb_strpos($from, 'manzoku') !== false) {
		$refrom = "manzoku@saishunkan.co.jp";
	} else {
		$refrom = "news@saishunkan.co.jp";
	}
logDebug("Return-Path: ".$refrom."\r\n");
	$headers .= "Envelope From: ".$refrom."\r\n";
	$headers .= "Return-Path: ".$refrom."\r\n";
	$headers .= "Content-Type: text/plain;charset=\"ISO-2022-JP\"\r\n";
	$headers .= "Content-Transfer-Encoding: 7bit\r\n";
	$headers .= $opt_header;

	if ($to_name == '') {
		$to = $to_email;
	} else {
		$to = mb_encode_mimeheader(mb_convert_encoding($to_name, "ISO-2022-JP"), "ISO-2022-JP")
			." <".$to_email.">\r\n";
	}

	// mb_encoding_mimeheader��unfolding����ʒu�ɓ����̂ŁA���̏�����������ōs��
	$string = mb_convert_encoding($subject, 'ISO-2022-JP');
	$subject = '';
	$split = 40;
	$add_string = '';
	while ($string !== FALSE && $string !== '') {
		$output = mb_strcut($string, 0, $split, 'ISO-2022-JP');
		$subject .= $add_string . mb_encode_mimeheader($output, 'ISO-2022-JP', 'B');
		$add_string = "\r\n ";
		$string = mb_substr($string, mb_strlen($output, 'ISO-2022-JP'), mb_strlen($string, 'ISO-2022-JP'), 'ISO-2022-JP');
	}

	// 1�s��1024byte�ȏ゠��Ɠr���ŉ��s������MTA������A�����������邱�Ƃ�����̂�
	// �K���ȂƂ���ŋ����I�ɉ��s������
	$body = mb_convert_encoding($body, "ISO-2022-JP");
	$string = $body;
	$body = '';
	$split = 500;
	while ($string !== FALSE) {
		if (($line_width = strpos($string, "\n")) === FALSE) {
			$line_width = strlen($string);
		} else {
			// ���s�R�[�h�܂ł�1�s�Ɋ܂߂�
			$line_width++;
		}
		if ($line_width > $split) {
			// ��������̂œr���ŉ��s������
			$this_line = substr($string, 0, $line_width);
			while (1) {
				$output = mb_strcut($this_line, 0, $split, 'ISO-2022-JP');
				$body .= $output;
				$this_line = mb_substr($this_line, mb_strlen($output, 'ISO-2022-JP'), mb_strlen($this_line, 'ISO-2022-JP'), 'ISO-2022-JP');
				if ($this_line === FALSE || $this_line === '') {
					break;
				} else {
					$body .= "\n";
				}
			}
		} else {
			$body .= substr($string, 0, $line_width);
		}
		$string = substr($string, $line_width);
	}

 	$result = mail($to, $subject, $body, $headers);
	return $result;
}
*/

// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa
/**
 * �w�肳�ꂽ��M���[���ɑ��M�R�[�h��ݒ�
 * @param string $con_utl DB�ڑ����
 * @param string $mailTraceId ��M���[��ID
 * @param string $sendMailCd  ���M���[���R�[�h
 * @param string $userId      ���[�U�[ID
 */
function updateSendMailCdToTraceMail($con_utl, $mailTraceId, $sendMailCd, $userId) {
	logDebug("updateSendMailCdToTraceMail:Start sendMailCd = " . $sendMailCd . " mailTraceId = " . $mailTraceId);
	$sql  = "";
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	/*
	$sql .= " UPDATE";
	$sql .= "   MAILTRACE_TBL";
	$sql .= " SET";
	$sql .= "   REPLY_KAIINMAILSEND_CD = " . getSqlValue($sendMailCd);
	$sql .= "  ,ACTION_STATE_KBN       = 1";  // 1:�Ή��ς�
	$sql .= "  ,COMMUNICATOR           = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   MAIL_TRACE_ID = " . getSqlValue($mailTraceId);

	$result = dbQuery($con_utl, $sql,true);
	*/
	$sql .= " UPDATE";
	$sql .= "   f_act_mail";
	$sql .= " SET";
	$sql .= "   reply_fin_mbr_mail_send_cd = " . getSqlValue($sendMailCd);
	$sql .= "  ,act_stat_kbn       = '1'";  // 1:�Ή��ς�
	$sql .= "  ,charge           = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   act_mail_seq = " . getSqlValue($mailTraceId);
	$result = dbQuery($con_utl, $sql);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	if(!$result) {
		dbRollback($con_utl);
		dbFreeResult($result);
		logDebug("updateSendMailCdToTraceMail:RollBack");
		return false;
	}
	dbCommit($con_utl);
	dbFreeResult($result);
	
	logDebug("updateSendMailCdToTraceMail:End");
	return true;
}

/**
 * �w�肳�ꂽ�₢���킹��Ή��ς݂ɍX�V
 * @param string $con_utl  DB�ڑ����
 * @param string $cvoiceId �₢���킹ID
 * @param string $userId   ���[�U�[ID
 */
function updateComplateCVoice($con_utl, $cvoiceId, $userId) {
	logDebug("updateComplateCVoice:Start cvoiceId = " . $cvoiceId);
	$sql  = "";
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	/*
	$sql .= " UPDATE";
	$sql .= "   CUSTOMERVOICE_TBL";
	$sql .= " SET";
	$sql .= "   STATUS       = 9";  // 9:�Ή��ς�
	$sql .= "  ,COMMUNICATOR = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   CVOICE_ID = " . getSqlValue($cvoiceId);

	$result = dbQuery($con_utl, $sql,true);
	*/
	$sql .= " UPDATE";
	$sql .= "   f_opinion_consul";
	$sql .= " SET";
	$sql .= "   stat_kbn       = '9'";  // 9:�Ή��ς�
	$sql .= "  ,responder = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   voice_consul_seq = " . getSqlValue($cvoiceId);
	$result = dbQuery($con_utl, $sql);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	if(!$result) {
		dbRollback($con_utl);
		dbFreeResult($result);
		logDebug("updateComplateCVoice:RollBack");
		return false;
	}
	dbCommit($con_utl);
	dbFreeResult($result);
	
	logDebug("updateComplateCVoice:End");
	return true;
}

/**
 * �w�肳�ꂽ������Ή��ς݂ɍX�V
 * @param string $con_utl     DB�ڑ����
 * @param string $recvOrderId ����D
 * @param string $userId      ���[�U�[ID
 */
function updateComplateOrder($con_utl, $recvOrderId, $userId) {
	logDebug("updateComplateOrder:Start cvoiceId = " . $cvoiceId);
	$sql  = "";
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	/*
	$sql .= " UPDATE";
	$sql .= "   RECVORDER_TBL";
	$sql .= " SET";
	$sql .= "   STATUS       = 9";  // 9:�Ή��ς�
	$sql .= "  ,COMMUNICATOR = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   RECV_ORDER_ID = " . getSqlValue($recvOrderId);

	$result = dbQuery($con_utl, $sql,true);
	*/
	$sql .= " UPDATE";
	$sql .= "   f_odr";
	$sql .= " SET";
	$sql .= "   stat_kbn       = 9";  // 9:�Ή��ς�
	$sql .= "  ,responder = " . getSqlValue($userId);
	$sql .= " WHERE";
	$sql .= "   odr_seq = " . getSqlValue($recvOrderId);
	$result = dbQuery($con_utl, $sql);
	// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
	if(!$result) {
		dbRollback($con_utl);
		dbFreeResult($result);
		logDebug("updateComplateOrder:RollBack");
		return false;
	}
	dbCommit($con_utl);
	dbFreeResult($result);
	
	logDebug("updateComplateOrder:End");
	return true;
}

/**
 * ���[�������E�{���ɓ��蕶�������݂���ꍇ�͑��M��񃌃R�[�h�ǉ�
 * @param string $con_utl DB�ڑ����
 * @param string $sendMailCd  ���M���[���R�[�h
 * @param string $mlSubject   ���[������
 * @param string $mlBody      ���[���{��
 * @param string $userId      ���[�U�[ID
 */
function insertMailSendInfo($con_utl, $sendMailCd, $mlSubject, $mlBody, $userId) {
	logDebug("insertMailSendInfo:Start sendMailCd = " . $sendMailCd);

	// ���[�����M�敪�ꗗ�擾
	$listKbn = getMailSendKbnList($con_utl);
    if (count($listKbn) <= 0) { return true; }

	foreach($listKbn as $kbn) {
		// ���[�������Ɏw�蕶�����܂܂��`�F�b�N
		$mailSendSubjectKbn = 0;
		if (mb_strpos($mlSubject, $kbn['CHECK_STRING']) !== false) {
			$mailSendSubjectKbn = $kbn['MAILSEND_KBN'];
		}
		
		// ���[���{���Ɏw�蕶�����܂܂��`�F�b�N
		$mailSendBodyKbn    = 0;
		if (mb_strpos($mlBody, $kbn['CHECK_STRING']) !== false) {
			$mailSendBodyKbn    = $kbn['MAILSEND_KBN'];
		}
		
		// ���[�������E�{���̂����ꂩ�Ɏw�蕶�����܂܂�Ă���ꍇ�̂�
		if ($mailSendSubjectKbn > 0  || $mailSendBodyKbn > 0) {
			$sql  = "";
			// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
			/*
			$sql .= " INSERT INTO KAIINMAILSEND_INFO_TBL";
			$sql .= " (";
			$sql .= "    KAIINMAILSEND_INFO_ID";
			$sql .= "   ,KAIINMAILSEND_CD";
			$sql .= "   ,MAILSEND_SUBJECT_KBN";
			$sql .= "   ,MAILSEND_BODY_KBN";
			$sql .= "   ,UPDATE_DT";
			$sql .= "   ,REGIST_DT";
			$sql .= "   ,UPDATE_USER";
			$sql .= "   ,REGIST_USER";
			$sql .= " ) VALUES (";
			$sql .= "    SEQ_KAIINMAILSEND_INFO_ID.NEXTVAL";
			$sql .= "   ," . getSqlValue($sendMailCd);
			$sql .= "   ," . $mailSendSubjectKbn;
			$sql .= "   ," . $mailSendBodyKbn;
			$sql .= "   ,SYSDATE";
			$sql .= "   ,SYSDATE";
			$sql .= "   ," . getSqlValue('Tool:'.$userId);
			$sql .= "   ," . getSqlValue('Tool:'.$userId);
			$sql .= " )";
			
			$result = dbQuery($con_utl, $sql,true);
			*/
			$sql .= " INSERT INTO f_indiv_act_mail_send_kbn";
			$sql .= " (";
			$sql .= "    indiv_act_mail_send_info_cd";
			$sql .= "   ,indiv_act_mail_send_hist_cd";
			$sql .= "   ,subject_mail_send_kbn";
			$sql .= "   ,body_letter_mail_send_kbn";
			$sql .= "   ,update_date";
			$sql .= "   ,register_date";
			$sql .= "   ,update_user_cd";
			$sql .= "   ,register_user_cd";
			$sql .= " ) VALUES (";
			$sql .= "    nextval('seq_indiv_act_mail_send_info_cd')";
			$sql .= "   ," . getSqlValue($sendMailCd);
			$sql .= "   ," . $mailSendSubjectKbn;
			$sql .= "   ," . $mailSendBodyKbn;
			$sql .= "   ,current_timestamp(0)";
			$sql .= "   ,current_timestamp(0)";
			$sql .= "   ," . getSqlValue('Tool:'.$userId);
			$sql .= "   ," . getSqlValue('Tool:'.$userId);
			$sql .= " )";
			$result = dbQuery($con_utl, $sql);
			// ��R-#45290_�yR03-0111-028�z������V�X�e��_WEB�Ǘ��c�[���J���iSQL��������p�ɏ��������j2021/05/28 jst-haku
			if(!$result) {
				dbRollback($con_utl);
				dbFreeResult($result);
				logDebug("insertMailSendInfo:RollBack");
				return false;
			}
		}
	}
	dbCommit($con_utl);
	dbFreeResult($result);
	
	logDebug("insertMailSendInfo:End");
	return true;
}
// ��R-#39524_�yH31-0392-001�z�����鉻�̂��߂̃��[����M���M�f�[�^���ڒǉ� 2020/09/26 saisys-hasegawa

?>
