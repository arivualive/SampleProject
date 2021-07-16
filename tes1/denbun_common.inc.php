<?

require_once $LIB_PATH .'/'.'ssktool'.'/denbun_const.inc.php';
require_once $LIB_PATH .'/'.'ssktool'.'/denbun_msg.inc.php';
//��2010/08/18 #1253 WAO�Ή�(EC-One hatano) SOAP�ʐM
require_once '/home/ssktool/include/PEAR/SOAP/Client.php';
//require_once '/usr/local/cybird/php/lib/php/SOAP/Client.php';
//��2010/08/18 #1253 WAO�Ή�(EC-One hatano) SOAP�ʐM

//--------------------------------------------------------
/**
 * fncDenbunNXCOM
 * �T�@�v�F�d�����s<br>
 * ���@���F$denbun_id(�d��ID)<br>
 * ���@���F$denbun_str(���M�f�[�^)<br>
 * ���@���F$remote_port(�����[�g�|�[�g)<br>
 * ���@���F$seq_no(SEQ)<br>
 * ���@���F$local_port(���[�J���|�[�g)<br>
 * global�F$CONNECT_IP<br>
 * global�F$CONNECT_PORT<br>
 * �߂�l�F���� = 0<br>
*/
//--------------------------------------------------------
Function fncDenbunNXCOM($denbun_id, $denbun_str, &$denbun_msg, $text_end_flag = false, $remote_port = "", $seq_no = "", $local_port = "", $kainno = "") {

	global $SSK_DC_FLAG;
	if ($SSK_DC_FLAG === false)
		echo '<font color="red"><b>fncDenbunNXCOM() called!!! </b></font>';

    //��2010/08/23 #1253 WAO�Ή�(EC-One hatano) �|�[�g�ǉ�
	//global $CONNECT_IP, $CONNECT_PORT;
	global $CONNECT_IP, $CONNECT_PORT, $DENBUN_PORT;
    //��2010/08/23 #1253 WAO�Ή�(EC-One hatano) �|�[�g�ǉ�

	$denbun_result = "";

	//Denbun.ini�ɋL�q����Ă���$CONNECT_IP���uTEST�v�ł���Έȍ~�̏������s��Ȃ�
	if (strtoupper(trim($CONNECT_IP)) == "TEST") {
		logDebug("denbun skip");
		$denbun_result = "0";
		$tmp_msg = fncReturnMsgRead($denbun_id);
		for ($i = 0; $i < count($tmp_msg); $i++) {
			//msg_data.ini�ɐݒ肳�ꂽ�l���i�[
			$denbun_msg[$i] = $tmp_msg[$i + 1];
		}
		return $denbun_result;
	}
    logDebug('Remote port = ' . $remote_port);
	//�������Q�Ƃ��l���������Ă���ꍇ�͂������D�悷��
	//�����[�g�|�[�g
    //��2010/08/23 #1253 WAO�Ή�(EC-One hatano) �|�[�g�ݒ�
    /*
	if (trim($remote_port) != "") {
		$CONNECT_PORT = $remote_port;
	}
    */
    if (trim($remote_port) != "")
    {
		$CONNECT_PORT = $remote_port;
    }
    else
    {
        //denbun_const.inc.php����|�[�g�ԍ����擾
        $CONNECT_PORT = $DENBUN_PORT[$denbun_id];
	}
    //��2010/08/23 #1253 WAO�Ή�(EC-One hatano) �|�[�g�ݒ�
	// �����o�C���Ή� #777 2009/04/14 kdl.ohyanagi
	// �ڑ���̃|�[�g�ԍ������O�ɏo�͂���(�e�X�g�̍ۂɊm�F���邽��)
	logDebug('DenbunId = ' . $denbun_id . ' Connection port number = ' . $CONNECT_PORT);
	// �����o�C���Ή� #777 2009/04/14 kdl.ohyanagi
	//SeqNO
	if (trim($seq_no) != "") {
		$header_seq = $seq_no;
	} else {
		$header_seq = fncVfcGetSEQ($denbun_id);
	}
	//���[�J���|�[�g
	if (trim($local_port) != "") {
		$l_port = $local_port;
	} else {
		$l_port = fncVfcGetPORT("denbun_port");
	}

	//�d���z��Ƀf���~�^�t��
	$nx_denbun = $denbun_str[0];
	for ($i = 1; $i < count($denbun_str); $i++) {
        //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) �f���~�^
        //chr(0x1E)��","�ɕύX
		//$nx_denbun .= chr(0x1E) . $denbun_str[$i];
        $nx_denbun .= "," . $denbun_str[$i];
        //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) �f���~�^
	}
	for ($i = 0; $i < count($denbun_str); $i++) {
		logDebug("denbun[$i] (".$denbun_str[$i].")");
	}
    //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) �R�����g
	//$nx_denbun .= (($text_end_flag == true) ? chr(0x03) : "");
    //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) �R�����g

	$nx_header  = "";
    //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) ���ʃw�b�_�쐬
    /*
	$nx_header .= chr(hexdec($denbun_id) >> 8 & 0xFF);						//���ʃw�b�_ �d��ID�i��ʁj
	$nx_header .= chr(hexdec($denbun_id) & 0xFF);							//���ʃw�b�_ �d��ID�i���ʁj
	$nx_header .= chr(0x01);												//���ʃw�b�_ �d���^�C�v
	$nx_header .= chr($header_seq >> 8 & 0xFF);								//���ʃw�b�_ �d��SEQ�i��ʁj
	$nx_header .= chr($header_seq & 0xFF);									//���ʃw�b�_ �d��SEQ�i��ʁj
	$nx_header .= chr(0x01);												//���ʃw�b�_ �d������
	$nx_header .= chr(0x01);												//���ʃw�b�_ �p���t���O
	$nx_header .= chr(0x1E);												//���ʃw�b�_ �f�~���^CHAR
	$nx_header .= chr(0x01) . chr(0x01) . chr(0x01) . chr(0x01);			//���ʃw�b�_ PC���ʃR�[�h
	$nx_header .= chr(0x00) . chr(0x00) . chr(0x00) . chr(0x00);			//���ʃw�b�_ �N�b�L�[���
	$nx_header .= chr(0x00);												//���ʃw�b�_ �e�L�X�g���i��ʁj�����ݒ�AfncSendMessage��EBCDIC�ϊ���ɍĐݒ���s��
	$nx_header .= chr(0x00);												//���ʃw�b�_ �e�L�X�g���i���ʁj�����ݒ�AfncSendMessage��EBCDIC�ϊ���ɍĐݒ���s��
    */
    $nx_header .= $denbun_id;               //�d��ID
    $nx_header .= "01";                     //�d���^�C�v
    $nx_header .= "0001";                   //�d��SEQ(���ݒ�)
    $nx_header .= "01";                     //�d������
    $nx_header .= "01";                     //�p���t���O
    $nx_header .= ",";                      //�f�~���^CHAR
    $nx_header .= "00000000";               //PC���ʃR�[�h
    $nx_header .= "00000000";               //�N�b�L�[���
    $nx_header .= "0000";                   //�e�L�X�g��
    //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) ���ʃw�b�_�쐬

	//NX�ʐM�p�����[�^�ݒ�
	$local_port = $l_port;	//���[�J���|�[�g

	//NX�d�����s ($nx_ret �� 0:����A1:�^�C���A�E�g�A9:�I�t���C��(�ڑ����s�E���M���s�E�z�X�g����̓d������99))
	$nx_recv_msg = "";
    //��2011/2/14 #1253 WAO�Ή�(EC-One hatano) $text_end_flag�������ɒǉ�
	//$nx_ret = fncSendMessage($nx_header . $nx_denbun, $local_port, $nx_recv_msg, $denbun_id);
    $nx_ret = fncSendMessage($nx_header . $nx_denbun, $local_port, $nx_recv_msg, $denbun_id, $text_end_flag);
    //��2011/2/14 #1253 WAO�Ή�(EC-One hatano) $text_end_flag�������ɒǉ�

	//�G���[����
	if ($nx_ret != "0") {
		$denbun_result = $nx_ret;
	} else {
		//����I��
		$denbun_result = 0;
		if (trim($nx_recv_msg) == "") {
			$denbun_msg[0] = "";
		} else {
            //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) �f���~�^
			$tmp_msg = explode(",",$nx_recv_msg);
            //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) �f���~�^
			for ($i = 0; $i < count($tmp_msg); $i++) {
				$denbun_msg[$i] = str_replace("�C",",",trim($tmp_msg[$i]));
			}
		}
	}
    //��R-#31839_�yH29-00284-01�z���[���I�v�g�C���Ή�_WEB 2018/08/23 nul-fukunaga
	if ($kainno == '' &&
		($denbun_id == 'A240' ||  $denbun_id == 'A900' || $denbun_id == 'A910' || $denbun_id == 'A920' || $denbun_id == 'A930' || $denbun_id == 'B930'))
		$kainno = $denbun_str[0];
    //��R-#31839_�yH29-00284-01�z���[���I�v�g�C���Ή�_WEB 2018/08/23 nul-fukunaga
	fncDenbunLog($denbun_id, $nx_denbun, $denbun_msg, $nx_ret == "0" ? '1' : '0', $kainno);

	return $denbun_result;
}

/**
 * AxxxSend_Tbl �ɓd�����L�^
 */
Function fncDenbunLog($denbun_id, $send_data, $ret_data, $host_result, $kainno = "", $update_user = "")
{
	//DB�ɋL�^
// 	global $con, $SSK_SCRIPT_NAME;
// 	global $salt, $seed, $vector, $dec;
	global $S_USERID;
	if ( $update_user == "" ) {
// 		$update_user = "Web:" . $SSK_SCRIPT_NAME;
		$update_user = "Tool:" . $S_USERID;
	}

// 	if ( $kainno == "" ) {
// 		// �Z�b�V��������擾
// 		global $smarty;
// 		$member = GetLoginKainData($smarty);
// 		$kainno = $member['KAINNO'];
// 	}

	// �z�X�g���M�f�[�^�Í���
// 	$send_data = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, $send_data, $vector, $dec, $error_code);
// 	$ret_data = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, $ret_data, $vector, $dec, $error_code);
// 	logDebug(__FUNCTION__ . " denbun_id=" . $denbun_id );

	//where��쐬
	
	//#777 (�g��)�ʃ��[�����M�őΉ����������o�C���p�̓d���� 2009/06/03 kdl-uchida
	//PC�p�A�g�їp�ŃT�C�g�敪��ύX����
	$site_kbn_val = '1'; // PC�p
	if(substr($denbun_id, 0, 1) == "B"){
		$site_kbn_val = '2'; // �g�їp
	}

    //��2011/06/22 #1253 WAO�Ή�(EC-One hatano) �����d���̃o�C�g����4000byte�𒴂��Ă��܂����̂ŁA4000byte�ȏ��؂�
    if (strlen($send_data) > 4000){
        $send_data = substr($send_data,0,4000);
    }
    if (strlen($ret_data) > 4000){
        $send_data = substr($ret_data,0,4000);
    }
    //��2011/06/22 #1253 WAO�Ή�(EC-One hatano) �����d���̃o�C�g����4000byte�𒴂��Ă��܂����̂ŁA4000byte�ȏ��؂�

    //��R-#31839_�yH29-00284-01�z���[���I�v�g�C���Ή�_WEB 2018/08/23 nul-fukunaga
	if ( in_array(strtoupper($denbun_id), array('A100','A110','A200','A210','A240','A300','A400','A500','A900','A910','A920','A930', 'B930'))) {
    //��R-#31839_�yH29-00284-01�z���[���I�v�g�C���Ή�_WEB 2018/08/23 nul-fukunaga
		$sql = "INSERT INTO " . strtoupper($denbun_id) . "Send_Tbl ";
		$sql .= "(SITE_KBN,KAINNO,SEND_DT,SESSION_ID,SESSION_DT,HOST_DATA,HOST_DATA2,HOST_RESULT,UPDATE_DT,REGIST_DT,UPDATE_USER,REGIST_USER) ";
// 		$sql .= "VALUES ('1', :KAINNO, SYSDATE, :SESSION_ID, SYSDATE, :HOST_DATA, :HOST_RESULT, SYSDATE, SYSDATE, :UPDATE_USER, :REGIST_USER)";
// 		$result = ssk_db_parse($con, $sql);
// 		ssk_db_bind_by_name($result, ':KAINNO', $kainno, -1);
// 		ssk_db_bind_by_name($result, ':SESSION_ID', session_id(), -1);
// 		ssk_db_bind_by_name($result, ':HOST_DATA', substr($send_data, 0, 4000), -1);
// 		ssk_db_bind_by_name($result, ':HOST_DATA2', substr($ret_data, 0, 4000), -1);
// 		ssk_db_bind_by_name($result, ':HOST_RESULT', $host_result, -1);
// 		ssk_db_bind_by_name($result, ':UPDATE_USER', $update_user, -1);
// 		ssk_db_bind_by_name($result, ':REGIST_USER', $update_user, -1);
// 		ssk_db_execute($result);
		$cols[] = getSqlValue($site_kbn_val);
		$cols[] = getSqlValue($kainno);
		$cols[] = 'SYSDATE';
		$cols[] = 'NULL';
		$cols[] = 'SYSDATE';
		$cols[] = getSqlValue(ssk_encrypt(substr($send_data, 0, 2967))); // Base64�G���R�[�h��Fceil(x/3)x4
                if (is_array($ret_data)){
                    $cols[] = getSqlValue(ssk_encrypt(substr(implode('', $ret_data), 0, 2967))); // Base64�G���R�[�h��Fceil(x/3)x4
                }else{
                    $cols[] = getSqlValue(ssk_encrypt(substr($ret_data, 0, 2967))); // Base64�G���R�[�h��Fceil(x/3)x4
		        }
		$cols[] = getSqlValue($host_result);
		$cols[] = 'SYSDATE';
		$cols[] = 'SYSDATE';
		$cols[] = getSqlValue($update_user);
		$cols[] = getSqlValue($update_user);
		$sql .= 'VALUES('.implode(', ', $cols).')';
		$con_utl = dbConnect();
		$result = dbQuery($con_utl, $sql, true);
		if ($result !== false) {
			dbCommit($con_utl);
			dbFreeResult($result);
		}
		dbClose($con_utl);
	} else {
		logDebug("warning: no save denbun_id=" . $denbun_id);
	}
}


//--------------------------------------------------------
/**
 * fncReturnMsgRead
 * �T�@�v�Fdenbun_msg.inc.php���e�l���擾����(�e�X�g���ōs���ꍇ�̍l��)<br>
 * ���@���F$denbun_id(�d��ID)<br>
 * global�F$DENBUN_INC_PATH<br>
 * �߂�l�F�t�@�C���f�[�^<br>
*/
//--------------------------------------------------------
Function fncReturnMsgRead($denbun_id) {

	global $DENBUN_INC_PATH;

	$file_path = $DENBUN_INC_PATH . "/denbun_msg.inc.php";
	require_once($file_path);

	$rcv_msg = array();
	for ($i = 0; $i <= $DENBUN_DATA_COUNT; $i++) {
		$rcv_msg[$i] = ${"DENBUN_DATA_" . $i};
	}

	return $rcv_msg;
}

//--------------------------------------------------------
/**
 * fncVfcGetSEQ
 * �T�@�v�F�d���̃V�[�P���V�����ԍ����擾����<br>
 * ���@���F$denbun_id(�d��ID)<br>
 * global�F$CST_ERROR<br>
 * global�F$SEQ_DATA_PATH<br>
 * �߂�l�FHex"0001" �` Hex"FFFF"<br>
*/
//--------------------------------------------------------
Function fncVfcGetSEQ($denbun_id) {

	global $CST_ERROR, $SEQ_DATA_PATH;

	$result_seq = $CST_ERROR;

	$file_path = $SEQ_DATA_PATH . "/denbun_" . $denbun_id . ".dat";

	$vl_str_seq = ''; // avoid Notice: Undefined variable: vl_str_seq
	if (file_exists($file_path)) {
		//�t�@�C���Ǎ���
		$fp = fopen($file_path, "r");
		while (!feof($fp)) {
			$vl_str_seq = trim(fgets($fp));
		}
		fclose($fp);
	}

	if ($vl_str_seq == "" || $vl_str_seq == "0" || $vl_str_seq == "65535") {
		$vl_str_seq = "1";
	}

	//�t�@�C��������
	$fp = fopen($file_path, "w");
	$ret = @fwrite($fp, ($vl_str_seq + 1));
	fclose($fp);

	$result_seq = $vl_str_seq;

	return $result_seq;
}

//--------------------------------------------------------
/**
 * fncVfcGetPORT
 * �T�@�v�F�d���̃V�[�P���V�����ԍ����擾����<br>
 * ���@���F$file_name(�t�@�C����)<br>
 * global�F$CST_ERROR<br>
 * global�F$SEQ_DATA_PATH<br>
 * �߂�l�FHex"0001" �` Hex"FFFF"<br>
*/
//--------------------------------------------------------
Function fncVfcGetPORT($file_name) {

	global $CST_ERROR, $SEQ_DATA_PATH;

	$result_port = $CST_ERROR;

	$file_path = $SEQ_DATA_PATH . "/" . $file_name . ".dat";
	$vl_str_seq = ''; // avoid Notice: Undefined variable: vl_str_seq
	if (file_exists($file_path)) {
		//�t�@�C���Ǎ���
		$fp = fopen($file_path, "r");
		while (!feof($fp)) {
			$vl_str_seq = trim(fgets($fp));
		}
		fclose($fp);
	}

	if ($vl_str_seq == "" || $vl_str_seq == "0" || $vl_str_seq == "65535") {
		$vl_str_seq = "1";
	}

	//�t�@�C��������
	$fp = fopen($file_path, "w");
	$ret = @fwrite($fp, ($vl_str_seq + 1));
	fclose($fp);

	//SEQ�ԍ��쐬
	$result_port = $vl_str_seq;

	return $result_port;
}

//--------------------------------------------------------
/**
 * fncSendMessage
 * �T�@�v�FNX�d�����s<br>
 * ���@���F$send_data(���M�f�[�^)<br>
 * ���@���F$local_port(���[�J���|�[�g)<br>
 * ���@���F$denbun_id(�d��ID)<br>
 * global�F$SJIS_JB8<br>
 * global�F$CONNECT_IP<br>
 * global�F$CONNECT_PORT<br>
 * global�F$TIMEOUT<br>
 * �߂�l�F�G���[�ԍ�<br>
*/
//--------------------------------------------------------
//��2011/2/14 #1253 WAO�Ή�(EC-One hatano) $text_end_flag�������ɒǉ�
//Function fncSendMessage($send_data, $local_port, &$recv_message, $denbun_id) {
Function fncSendMessage($send_data, $local_port, &$recv_message, $denbun_id, $text_end_flag) {
//��2011/2/14 #1253 WAO�Ή�(EC-One hatano) $text_end_flag�������ɒǉ�
logDebug(__FUNCTION__.' start');
    //��#1253 WAO�Ή�(EC-One hatano) �|�[�g�ԍ�
	//global $SJIS_JB8, $CONNECT_IP, $CONNECT_PORT, $TIMEOUT;
    global $SJIS_JB8, $CONNECT_IP, $CONNECT_PORT, $TIMEOUT, $WSDL_File_path;
    //��#1253 WAO�Ή�(EC-One hatano) �|�[�g�ԍ�

	//��HOST.LOG�ɏo�͂���d�����Í��� EC-One hatano
	global $salt, $seed, $vector, $dec;
	//��HOST.LOG�ɏo�͂���d�����Í��� EC-One hatano

	$p_err_number = 0;

    //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) ���ʃw�b�_�쐬�@�\�R�����g��
    /*
	$in_buf_ = substr($send_data, 18);
	//�o�C�g���ɔz��Ɋi�[����
	for ($i = 0; $i < strlen($in_buf_); $i++) {
		$in_buf[$i] = ord(substr($in_buf_, $i, 1));
	}

	//���M���b�Z�[�W
	$out_buf = array();
	$out_len = 0;
	fncCodeConvert($SJIS_JB8, $in_buf, $out_buf, count($in_buf), $out_len);

	$send_msg_data = "";

	//$send_msg_data .= substr($send_data, 0, 18);

	$send_msg_data .= substr($send_data, 0, 16);

	//���ʃw�b�_ �e�L�X�g��
	$send_msg_data .= chr($out_len >> 8 & 0xFF);
	$send_msg_data .= chr($out_len & 0xFF);

	$send_head_id[0] = substr($send_data, 0, 1);
	$send_head_id[1] = substr($send_data, 1, 1);

	for ($i = 0; $i < $out_len; $i++) {
		$send_msg_data .= chr($out_buf[$i]);
	}
    */
    for($i=0; $i<35; $i++){
        $send_head_id[$i] = substr($send_data, $i, 1);
    }
    //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) ���ʃw�b�_�쐬�@�\�R�����g��
    //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) �ڑ��@�\�R�����g��
	//�ڑ�
    /*
	$fp = fsockopen($CONNECT_IP, $CONNECT_PORT, $errno, $errstr, $TIMEOUT);
	if (!$fp) {
		$p_err_number = 9;
		$recv_message = "�ڑ��G���[";
		logHost("[P:" . $local_port . "] " . $denbun_id . " �yERROR�z Connection error");
		logHost("�yRETURN�z " . $p_err_number);
		return $p_err_number;
	}

	//���M
	$fputs_ret = fputs($fp, $send_msg_data);

	if (!$fputs_ret) {
		logHost("[P:" . $local_port . "] " . $denbun_id . " �yERROR�z Transmission error");
		$p_err_number = 9;
		$recv_message = "���M�G���[";
	} else {
		//�^�C���A�E�g�ݒ�
		stream_set_timeout($fp, $TIMEOUT);

		//��M
		$rcv_denbun_data = "";

		// �������[�v�΍􉼑Ή�
		$i = 0;

		while (feof($fp) == false) {
			$stat = stream_get_meta_data($fp);

			if ($stat["timed_out"]) {
				logHost("[P:" . $local_port . "] " . $denbun_id . " �yERROR�z Time out");
				$p_err_number = 1;
				$recv_message = "�^�C���A�E�g";
				break;
			}
			$tmp = fgetc($fp);
			$rcv_denbun_data .= $tmp;
			if (strlen($rcv_denbun_data) > 18 && $tmp == chr(0x03)) {
				break;
			}

			// �������[�v�΍􉼑Ή�
			$i++;
			if ($i > 10000) {
				break;
			}
		}
	}
    */
    //$send_msg_data��$send_data���i�[
    //$send_msg_data = "";
    //�����ϊ�����
    //$send_msg_data = fncCharCodeConv( $send_data );

    $errMsg = '�G���[���b�Z�[�W';
    $ns1 = '{http://tempuri.org/}';
    $ns2= '{http://schemas.datacontract.org/2004/07/Jp.Co.Unisys.FF3.Sys.Custom.Tx}';
    $TxWCFDataEntity = new SOAP_Value($ns1 . 'txWCFDataEntity',false,
        array(
            'ClientIPAddress' => new SOAP_Value(
                $ns2 . 'ClientIPAddress',
                'string',
                ''
            ),
            'ClientModuleId' => new SOAP_Value(
                $ns2 . 'ClientModuleId',
                'string',
                ''
            ),
            'ClientTermName' => new SOAP_Value(
                $ns2 . 'ClientTermName',
                'string',
                ''
            ),
            'ClientUserId' => new SOAP_Value(
                $ns2 . 'ClientUserId',
                'string',
                '99999'
            ),
            'DetailErrorCd' => new SOAP_Value(
                $ns2 . 'DetailErrorCd',
                'int',
                50
            ),
            'DetailErrorMessage' => new SOAP_Value(
                $ns2 . 'DetailErrorMessage',
                'string',
                //'�G���[���b�Z�[�W'
                mb_convert_encoding($errMsg, "UTF-8", "SJIS")
            ),
            'ErrorCd' => new SOAP_Value(
                $ns2 . 'ErrorCd',
                'int',
                -99
            ),
            'Port' => new SOAP_Value(
                $ns2 . 'Port',
                'int',
                $CONNECT_PORT
            ),
            'TxMessageBuffer' => new SOAP_Value(
                $ns2 . 'TxMessageBuffer',
                'string',
                mb_convert_encoding($send_data, "UTF-8", "SJIS-WIN").(($text_end_flag == true) ? chr(0x03) : "")
            )
        )
    );

    //WSDL�t�@�C��
    $wsdl = $WSDL_File_path;
    $client = new SOAP_WSDL( $wsdl, array('timeout'=>$TIMEOUT) );

    //WSDL�t�@�C���̓ǂݍ��݃`�F�b�N
    if ( $client->fault )
    {
        //WSDL�t�@�C���̓ǂݍ��݃G���[
        logHost("[P:" . $local_port . "] " . $denbun_id . " �yERROR�z WSDLFileOpen error");
		$p_err_number = 9;
		$recv_message = "WSDL�t�@�C���̓ǂݍ��݃G���[";
    }
    else
    {
        //�d�����M
        $proxy = $client->getProxy();
        //$proxy->setEncoding('SJIS');
        $result = $proxy->callMethod( $TxWCFDataEntity );

        if(isset($result->userinfo) == false){
            $p_err_number = 9;
            $recv_message = "�z�X�g����̒ʐM����";
            logHost("[P:" . $local_port . "] " . $denbun_id . " �yERROR�z Communicate refusal ");
            logHost("�ySEND�z " . ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, mb_convert_encoding($send_data, "SJIS-WIN"), $vector, $dec, $error_code));
            logHost("�yACCEPT�z ");
            logHost("�yRETURN�z " . $p_err_number);
            return $p_err_number;
        }

        //�^�O�̍폜
        $trans_tbl = get_html_translation_table (HTML_ENTITIES);
        $trans_tbl = array_flip ($trans_tbl);
        $str = strtr ($result->userinfo, $trans_tbl);
        $str2 = preg_replace("/<[^>]*\/>/","||",$str);
        $str3 = preg_replace("/<[^>]*>/","|",$str2);
        $denbun = explode('|',$str3);
        $denbun[21] = mb_convert_encoding($denbun[21], "SJIS-WIN", "UTF-8");

        //DetailErrorCd��$str2[13]  DetailErrorMessage��$str2[15]  ErrorCd��$str2[17]  TxMessageBuffer��$str2[21]
        if ( strlen( $denbun[21] ) == 0 || $denbun[17] != "0" || substr($denbun[21],10,2) != "01" )
        {
            logHost("[P:" . $local_port . "] " . $denbun_id . " �yERROR�z Transmission error (ErrorCd:". $denbun[17]. " ErrorMessage:". mb_convert_encoding($denbun[15],"SJIS-WIN","UTF-8"). ")");
		    $p_err_number = 9;
		    $recv_message = "���M�G���[";
        }
    }

    //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) �ؒf�@�\�R�����g��
	//�ؒf
    /*
	$ret = fclose($fp);
	if (!$ret) {
		logHost("[P:" . $local_port . "] " . $denbun_id . " �yERROR�z Close error");

		//if ($p_err_number == "0") {
		//	$p_err_number = 1;
		//	$recv_message = "�ؒf�G���[";
		//}

	}

	if ($p_err_number == "0") {
		if (strlen($rcv_denbun_data) > 0) {
			logHost("[P:" . $local_port . "] " . $denbun_id . " �yOK�z");
		} else {
			logHost("[P:" . $local_port . "] " . $denbun_id . " �yERROR�z Reception error");
		}
	}
    */
    if ($p_err_number == "0" || $denbun[17] == "0" ) {
		if (strlen( $denbun[21] ) > 0) {
			logHost("[P:" . $local_port . "] " . $denbun_id . " �yOK�z");
		} else {
			logHost("[P:" . $local_port . "] " . $denbun_id . " �yERROR�z Reception error (ErrorCd:". $denbun[17]. " ErrorMessage:". mb_convert_encoding($denbun[15],"SJIS-WIN","UTF-8"). ")");
		}
	}
    //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) �ؒf�@�\�R�����g��

	logHost("�ySEND�z " . ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, mb_convert_encoding($send_data, "SJIS-WIN"), $vector, $dec, $error_code));

    //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) �ؒf�@�\�R�����g��
    /*
	if (strlen($rcv_denbun_data) > 0) {
		for ($i = 0; $i < strlen($rcv_denbun_data); $i++) {
			$rcv_denbun_data_[$i] = ord(substr($rcv_denbun_data, $i , 1));
		}

		logHost("�yACCEPT�z " . fncDisplayHex($rcv_denbun_data));

		$recv_message = fncRecvMsgCheck($rcv_denbun_data_, count($rcv_denbun_data_), $local_port, $send_head_id);
		if ($recv_message == "99") {
			//�z�X�g�ʐM����
			$p_err_number = 9;
			$recv_message = "�I�t���C���i�z�X�g����̓d�����ʁ�99�j";
			logHost("[P:" . $local_port . "] " . $denbun_id . " �yERROR�z Offline error");
		}
	} else {
		logHost("�yACCEPT�z ");
	}
    */
    if (strlen( $denbun[21] ) > 0) {
		for ($i = 0; $i < strlen( $denbun[21] ); $i++) {
			$rcv_denbun_data_[$i] = ord(substr($denbun[21], $i , 1));
		}

		//logHost("�yACCEPT�z " . substr($denbun[21],0,35). fncDisplayHex( substr($denbun[21],36) ));
        logHost("�yACCEPT�z " . ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, mb_convert_encoding($denbun[21], "SJIS-WIN"), $vector, $dec, $error_code));

		$recv_message = fncRecvMsgCheck($rcv_denbun_data_, count($rcv_denbun_data_), $local_port, $send_head_id);

        if ($recv_message == "99") {
			//�z�X�g�ʐM����
			$p_err_number = 9;
			$recv_message = "�I�t���C���i�z�X�g����̓d�����ʁ�99�j";
			logHost("[P:" . $local_port . "] " . $denbun_id . " �yERROR�z Offline error");
		}
	} else {
		logHost("�yACCEPT�z ");
	}
    //��2010/08/24 #1253 WAO�Ή�(EC-One hatano) �ؒf�@�\�R�����g��

	logHost("�yRETURN�z " . $p_err_number);
	return $p_err_number;
}

Function fncCodeConvert($chg_type, $input_str, &$output_str, $input_len, &$output_len) {

	global $JB8_SJIS;

	if ($chg_type == $JB8_SJIS) {
		fncTransJb8ToSjis($input_str, $output_str, $input_len, $output_len);
	} else {
		fncTransSjisToJb8($input_str, $output_str, $input_len, $output_len);
	}
}

//--------------------------------------------------------
/**
 * fncTransJb8ToSjis
 * �T�@�v�FJB8��SJIS�������ޕϊ�Ҳݏ���<br>
 * ���@���F$input_str(�ϊ��O������)<br>
 * ���@���F$output_str(�ϊ��㕶����)<br>
 * ���@���F$input_len(�ϊ��O������̒���)<br>
 * ���@���F$output_len(�ϊ��㕶����̒���)<br>
 * global�F$ASCII_TO_EBCDICV24<br>
 * �߂�l�F<br>
*/
//--------------------------------------------------------
Function fncTransJb8ToSjis($input_str, &$output_str, $input_len, &$output_len) {

	global $EBCDICV24_TO_ASCII;

	$input_pos = 0;
	$output_pos = 0;
	$i_len = $input_len;
	$kmode = false;

	while ($i_len > 0) {
		$wchr = $input_str[$input_pos];
		if ($wchr == 0x2B) {
			$kmode = true;
			$output_str[$output_pos] = ord(" ");
			$output_pos++;
			$input_pos++;
			$i_len--;
		} else if ($wchr == 0x2C) {
			$kmode = false;
			$output_str[$output_pos] = ord(" ");
			$output_pos++;
			$input_pos++;
			$i_len--;
		} else if ($kmode == true) {	//�������[�h
			$c1 = $input_str[$input_pos];
			$input_pos++;
			$i_len--;
			if ($i_len <= 0) {
				break;
			}
			$c2 = $input_str[$input_pos];
			$input_pos++;
			$i_len--;
			if (fncUnisysToGaiji($c1, $c2) == false) {
				fncJb8ToSjis($c1, $c2);
			}
			$output_str[$output_pos] = $c1;
			$output_str[$output_pos + 1] = $c2;
			$output_pos += 2;
		} else {
			$output_str[$output_pos] = $EBCDICV24_TO_ASCII[$wchr];
			$output_pos++;
			$input_pos++;
			$i_len--;
		}
	}
	$output_len = $output_pos;
	$output_str[$output_pos] = null;

}

//--------------------------------------------------------
/**
 * fncTransSjisToJb8
 * �T�@�v�FSJIS��JB8�������ޕϊ�Ҳݏ���<br>
 * ���@���F$input_str(�ϊ��O������)<br>
 * ���@���F$output_str(�ϊ��㕶����)<br>
 * ���@���F$input_len(�ϊ��O������̒���)<br>
 * ���@���F$output_len(�ϊ��㕶����̒���)<br>
 * global�F$ASCII_TO_EBCDICV24<br>
 * �߂�l�F<br>
*/
//--------------------------------------------------------
Function fncTransSjisToJb8($input_str, &$output_str, $input_len, &$output_len) {

	global $ASCII_TO_EBCDICV24;

	$input_pos = 0;
	$output_pos = 0;
	$i_len = $input_len;
	$kmode = false;

	while ($i_len > 0) {
		$wchr = $input_str[$input_pos];
		if (($wchr < 0x80) || ($wchr > 0x9F && $wchr < 0xE0)) {
			if ($kmode == true) {
				$kmode = false;
				$output_str[$output_pos] = 0x2C;
				$output_pos++;
			}
			$output_str[$output_pos] = $ASCII_TO_EBCDICV24[$wchr];
			$output_pos++;
			$i_len--;
			$input_pos++;
		} else {
			if ($kmode == false) {
				$kmode = true;
				$output_str[$output_pos] = 0x2B;
				$output_pos++;
			}
			$c1 = $input_str[$input_pos];
			$c2 = $input_str[$input_pos + 1];
			if (fncGaijiToUnisys($c1, $c2) == false) {
				fncSjisToJb8($c1, $c2);
			}
			$output_str[$output_pos] = $c1;
			$output_str[$output_pos + 1] = $c2;
			$output_pos += 2;
			$i_len -= 2;
			$input_pos += 2;
		}
	}
	if ($kmode == true) {
		$kmode = false;
		$output_str[$output_pos] = 0x2C;
		$output_pos++;
	}
	$output_len = $output_pos;
	$output_str[$output_pos] = null;

	$output_pos++;
}

//--------------------------------------------------------
/**
 * fncUnisysToGaiji
 * �T�@�v�FHOST�O����PC�O�����ޕϊ�����<br>
 * ���@���F$c1(�ϊ������̏���޲�)<br>
 * ���@���F$c2(�ϊ������̉����޲�)<br>
 * global�F$CCODE_TBL_CNT<br>
 * global�F$C_CODE_TBL<br>
 * �߂�l�FTrue:���� False:���s<br>
*/
//--------------------------------------------------------
Function fncUnisysToGaiji(&$c1, &$c2) {

	global $CCODE_TBL_CNT, $C_CODE_TBL;

	$uc = $c1;
	$lc = $c2;
	if ($uc == 0xA8) {
		$c1 = 0xF0;
		if ($lc <= 0xDF) {
			$c2 = $lc - 0x61;
		} else {
			$c2 = $lc - 0x60;
		}
		return true;
	}
	if ($uc == 0xA9) {
		$c1 = 0xF0;
		$c2 = $lc - 0x2;
		return true;
	}

	if ($uc == 0xAA) {
		$c1 = 0xF1;
		if ($lc <= 0xC8) {
			$c2 = $lc - 0x61;
		} else if ($lc >= 0xCD && $lc <= 0xE3) {
			$c2 = $lc - 0x65;
		} else {
			$c2 = $lc - 0x64;
		}
		return true;
	}
	if ($uc == 0xAB) {
		if ($lc >= 0xA1 && $lc <= 0xAA) {
			$c1 = 0xF1;
			$c2 = $lc - 0x6;
			return true;
		}
	}

	//�����R�[�h�ϊ��e�[�u������
	for ($i = 0; $i < $CCODE_TBL_CNT; $i++) {
		if ($uc == $C_CODE_TBL[$i]["H_c1"] && $lc == $C_CODE_TBL[$i]["H_c2"]) {
			$c1 = $C_CODE_TBL[$i]["S_c1"];
			$c2 = $C_CODE_TBL[$i]["S_c2"];
			return true;
		}
	}
	
	return false;
}

//--------------------------------------------------------
/**
 * fncGaijiToUnisys
 * �T�@�v�FPC�O����HOST�O�����ޕϊ�����<br>
 * ���@���F$c1(�ϊ������̏���޲�)<br>
 * ���@���F$c2(�ϊ������̉����޲�)<br>
 * global�F$CCODE_TBL_CNT<br>
 * global�F$C_CODE_TBL<br>
 * �߂�l�FTrue:���� False:���s<br>
*/
//--------------------------------------------------------
Function fncGaijiToUnisys(&$c1, &$c2) {

	global $CCODE_TBL_CNT, $C_CODE_TBL;

	$uc = $c1;
	$lc = $c2;
	if ($uc == 0xF0) {
		if ($lc >= 0x40 && $lc <= 0x7E) {
			$c1 = 0xA8;
			$c2 = $lc + 97;
			return true;
		}
		if ($lc >= 0x80 && $lc <= 0x9E) {
			$c1 = 0xA8;
			$c2 = $lc + 96;
			return true;
		}
		if ($lc >= 0x9F && $lc <= 0xFC) {
			$c1 = 0xA9;
			$c2 = $lc + 2;
			return true;
		}
	}

	if ($uc == 0xF1) {
		if ($lc >= 0x40 && $lc <= 0x67) {
			$c1 = 0xAA;
			$c2 = $lc + 97;
			return true;
		}
		if ($lc >= 0x68 && $lc <= 0x7E) {
			$c1 = 0xAA;
			$c2 = $lc + 101;
			return true;
		}
		if ($lc >= 0x80 && $lc <= 0x9A) {
			$c1 = 0xAA;
			$c2 = $lc + 100;
			return true;
		}
		if ($lc >= 0x9B && $lc <= 0xA4) {
			$c1 = 0xAB;
			$c2 = $lc + 6;
			return true;
		}
	}

	//�����R�[�h�ϊ��e�[�u������
	for ($i = 0; $i < $CCODE_TBL_CNT; $i++) {
		if ($uc == $C_CODE_TBL[$i]["S_c1"] && $lc == $C_CODE_TBL[$i]["S_c2"]) {
			$c1 = $C_CODE_TBL[$i]["H_c1"];
			$c2 = $C_CODE_TBL[$i]["H_c2"];
			return true;
		}
	}

	return false;
}

//--------------------------------------------------------
/**
 * fncJb8ToSjis
 * �T�@�v�FJB8��SJIS�������ޕϊ�����<br>
 * ���@���F$c1(�ϊ������̏���޲�)<br>
 * ���@���F$c2(�ϊ������̉����޲�)<br>
 * �߂�l�F�Ȃ�<br>
*/
//--------------------------------------------------------
Function fncJb8ToSjis(&$c1, &$c2) {

	if (($c1 & 1) == 1) {
		$c2 -= 0x61;
		if ($c2 >= 0x7F) {
			$c2++;
		}
	} else {
		$c2 -= 2;
	}

	$c1 = floor(($c1 - 0xA1) / 2) + 0x81;
	if ($c1 > 0x9F) {
		$c1 += 0x40;
	}
}

//--------------------------------------------------------
/**
 * fncSjisToJb8
 * �T�@�v�FSJIS��JB8�������ޕϊ�����<br>
 * ���@���F$c1(�ϊ������̏���޲�)<br>
 * ���@���F$c2(�ϊ������̉����޲�)<br>
 * �߂�l�FTrue:���� False:���s<br>
*/
//--------------------------------------------------------
Function fncSjisToJb8(&$c1, &$c2) {

	$uc = $c1;
	$lc = $c2;
	if ($uc > 0x80 && $uc < 0xA0) {
		if ($lc > 0x9E && $lc < 0xFD) {
			$c1 = ($uc - 0x81) * 2 + 0xA2;
			$c2 = $lc + 0x2;
			return true;
		}
		if ($lc > 0x3F && $lc < 0x7F) {
			$c1 = ($uc - 0x81) * 2 + 0xA1;
			$c2 = $lc + 0x61;
			return true;
		}
		if ($lc > 0x7F && $lc < 0x9F) {
			$c1 = ($uc - 0x81) * 2 + 0xA1;
			$c2 = $lc + 0x60;
			return true;
		}
	}
	if ($uc > 0xDF && $uc < 0xFF) {
		if ($lc > 0x9E && $lc < 0xFD) {
			$c1 = ($uc - 0xE0) * 2 + 0xE0;
			$c2 = $lc + 0x2;
			return true;
		}
		if ($lc > 0x3F && $lc < 0x7F) {
			$c1 = ($uc - 0xE0) * 2 + 0xDF;
			$c2 = $lc + 0x61;
			return true;
		}
		if ($lc > 0x7F && $lc < 0x9F) {
			$c1 = ($uc - 0xE0) * 2 + 0xDF;
			$c2 = $lc + 0x60;
			return true;
		}
	}
	return false;
}

//--------------------------------------------------------
/**
 * fncDisplayHex
 * �T�@�v�F�w�L�T�R�[�h�_���v����<br>
 * ���@���F$input(�Ώە�����)<br>
 * �߂�l�F�_���v�\���p������<br>
*/
//--------------------------------------------------------
Function fncDisplayHex($input) {
	$dump = "";
	for ($i = 0; $i < strlen($input); $i++) {
		$tmp = sprintf("%02X", ord(substr($input, $i, 1)));
		if ($tmp == "1E") {
			$dump .= ",";
		} else {
			$dump .= $tmp;
		}
	}
	return $dump;
}

//--------------------------------------------------------
/**
 * fncRecvMsgCheck
 * �T�@�v�F��M�d���̉�͏���<br>
 * ���@���F$msg<br>
 * ���@���F$msg_length<br>
 * ���@���F$local_port<br>
 * ���@���F$send_head_id<br>
 * global�F$JB8_SJIS<br>
 * �߂�l�F�ϊ��㕶����<br>
*/
//--------------------------------------------------------
Function fncRecvMsgCheck($msg, $msg_length, $local_port, $send_head_id) {

	global $JB8_SJIS;

	$out_buf = array();
	$out_len = 0;
	$max_length = 0;
	$p_recv_message = "";

    //��2010/10/28 #1253 WAO�Ή�(EC-One hatano)
    $denbunType = chr($msg[4]).chr($msg[5]);
logDebug(__FUNCTION__.'��M�d���̓d���^�C�v��'.$denbunType);
    //�d������
    $denbunAnser = chr($msg[4]).chr($msg[5]);
logDebug(__FUNCTION__.'��M�d���̓d�����ʁ�'.$denbunAnser);
    //��2010/10/28 #1253 WAO�Ή�(EC-One hatano)

	for ($i = 0; $i < $msg_length; $i++) {
		if ($max_length <= 0) {
            //��2010/10/28 #1253 WAO�Ή�(EC-One hatano)
            /*
			if ($msg[$i] == ord($send_head_id[0])) {
				if ($msg[$i + 1] == ord($send_head_id[1])) {
					if ($msg[$i + 2] == 0x2) {
//**************** Anet fujitsuka�ǉ� *****************
						if ($msg[$i + 5] == 0x99) {
							//�z�X�g�ʐM����
							return "99";
						}
//**************** Anet fujitsuka�ǉ� *****************
						$max_length = ($msg[$i + 16] * 256) + $msg[$i + 17];
						$rcv_count = 0;
						$rcv_msg= array();
						for ($j = 0; $j <= 17; $j++) {
							$rcv_head[$j] = $msg[$j];
						}
						$save_pos = 18;
					}
				}
			}
            */
            if (chr($msg[$i]) == $send_head_id[0]) {
				if (chr($msg[$i + 1]) == $send_head_id[1]) {
    				if ($denbunType == '02') {
    					if ($denbunAnser == '99') {
    						//�z�X�g�ʐM����
    						return "99";
    					}
                        //WAO���A�e�L�X�g���͎g�p����Ȃ��ׁA�Œ��MaxLength����������(���O�C���d������Ԓ����̂ŁA�]�T����������4000)
                        //$max_length = ($text1 * 100) + $text2;
                        $max_length = $msg_length - 35;
    					$rcv_count = 0;
    					$rcv_msg= array();
    					for ($j = 0; $j <= 34; $j++) {
    						$rcv_head[$j] = $msg[$j];
    					}
    					$save_pos = 35;
    				}
                }
			}
            //��2010/10/28 #1253 WAO�Ή�(EC-One hatano)
        //��2010/10/28 #1253 WAO�Ή�(EC-One hatano)
        /*
		} else {
			if ($i >= $save_pos) {
				$rcv_msg[$rcv_count] = $msg[$i];
				$rcv_count++;
				if ($rcv_count == $max_length) {
					fncCodeConvert($JB8_SJIS, $rcv_msg, $out_buf, $max_length, $out_len);
					$work_buf = array_fill(0, ($out_len + 18), null);
					for ($j = 0; $j <= 15; $j++) {
						$work_buf[$j] = chr($rcv_head[$j]);
					}
					for ($j = 0; $j < $out_len; $j++) {
						$work_buf[$j + 18] = chr($out_buf[$j]);
						if ($work_buf[$j + 18] == chr(0x03)) {
							$work_buf[$j + 18] = chr(0x1E);
							$work_buf[$j + 18 + 1] = chr($out_buf[$j]);
							break;
						}
					}
					//�z��v�f��A��
					$str_send = implode("", $work_buf);
					$p_recv_message = $str_send;
					$p_recv_flg = true;
					$max_length = 0;
					$rcv_count = 0;
					break;
				}
			}
		}
        */
        } else {
			if ($i >= $save_pos) {
				$rcv_msg[$rcv_count] = $msg[$i];
				$rcv_count++;
				if ($rcv_count == $max_length) {
                    //WAO�Ή� �ϊ��̕K�v���Ȃ��ׁA�R�����g�A�E�g
					//fncCodeConvert($JB8_SJIS, $rcv_msg, $out_buf, $max_length, $out_len);
                    $work_buf = array_fill(0, ($max_length + 35), null);
					for ($j = 0; $j < 35; $j++) {
                        if (chr($rcv_head[$j]) != ",") {
                            $work_buf[$j] = chr($rcv_head[$j]);
                        } else {
                            $work_buf[$j] = "";
                        }
					}
                    //���ʃw�b�_�̍Ō�Ƀf���~�^��ǉ�
                    $work_buf[$j+1] = ",";
                    //���ʃw�b�_�[�{�f���~�^���i�[���ꂽ�z��̌����擾
                    $head_count = count($work_buf) + 1;
                    //
                    for ($j = 0; $j < $max_length; $j++) {
						$work_buf[$j + $head_count] = chr($rcv_msg[$j]);
					}
					

					//�z��v�f��A��
					$str_send = implode("", $work_buf);
                    if (substr($str_send, -5, 5) == "&#x3;") {
                        $p_recv_message = substr($str_send, 0, strlen($str_send) - 5).','.chr(0x03);
                    }
                    else {
                        $p_recv_message = $str_send;
                    }
					$p_recv_flg = true;
					$max_length = 0;
					$rcv_count = 0;
					break;
				}
			}
		}
        //��2010/10/28 #1253 WAO�Ή�(EC-One hatano)
	}

	return $p_recv_message;
}

//--------------------------------------------------------
/**
 * fncDenbunFormat
 * �T�@�v�F�d���t�H�[�}�b�g<br>
 * ���@���F$denbun_string<br>
 * ���@���F$denbun_length<br>
 * ���@���F$denbun_type<br>
 * �߂�l�F�ϊ��㕶����<br>
*/
//--------------------------------------------------------
function fncDenbunFormat($denbun_str, $denbun_len, $denbun_type) {

    //��2010/12/15 #1253 WAO�Ή�(EC-One hatano) �@��ˑ������ϊ�
    $denbun_str_ = fncCharCodeConv($denbun_str);
    //��2010/12/15 #1253 WAO�Ή�(EC-One hatano) �@��ˑ������ϊ�

	// �P�����Âz��Ɋi�[����B
	$denbun_chr_list = array();
	for ($i = 0; $i < strlen($denbun_str); $i++) {
		// �S�p
		if (preg_match("/^[\\x81-\\x9F\\xE0-\\xEF][\\x40-\\x7E\\x80-\\xFC]/", substr($denbun_str_, $i)) == true) {
			array_push($denbun_chr_list, substr($denbun_str_, $i, 2));
			$i++;
		// ���p
		} else {
			array_push($denbun_chr_list, substr($denbun_str_, $i, 1));
		}
	}

	// �����ݒ�
	$format_str = "";
	$format_len = 0;
    //��2010/10/28 #1253 WAO�Ή�(EC-One hatano) �f���~�^�R�����g��
	//$delimit = chr(0x00);
    //��2010/10/28 #1253 WAO�Ή�(EC-One hatano) �f���~�^�R�����g��
	$zenkaku_flag = false;

	switch ($denbun_type) {
		// 0�F������
		case "0":
			foreach ($denbun_chr_list as $denbun_chr_) {
				// �S�p ������̑O��Ɏ��ʎq������̂ŁA�������v�Z���Ȃ���t�H�[�}�b�g
				if (preg_match("/^[\\x81-\\x9F\\xE0-\\xEF][\\x40-\\x7E\\x80-\\xFC]$/", $denbun_chr_) == true) {
					if ($zenkaku_flag == false) {
						if ($denbun_len - $format_len > 3) {
							$format_str .= $delimit . $denbun_chr_;
						} elseif ($denbun_len - $format_len == 3) { // �󂫂��c�肪4Byte���x�Ȃ獡��̕�����܂ł����i�[�ł��Ȃ��̂�delimit�ŕ���
							$format_str .= $delimit . $denbun_chr_ . $delimit;
						}else{ // �󂫂�3Byte�ȉ��Ȃ̂őS�p�����͓���Ȃ��B����āA�󔒂Ŗ��߂�
							for ($i = 0; $i < $denbun_len - $format_len; $i++) {
								$format_str .= " ";
							}
						}
					} else {
						if ($denbun_len - $format_len > 2) {
							$format_str .= $denbun_chr_;
						} elseif ($denbun_len - $format_len == 2) {
							$format_str .= $denbun_chr_ . $delimit;
						} else { // �󂫂�2Byte�ȉ��Ȃ�A�S�p�����͊i�[�o���Ȃ��̂ŁAdeimit�ŕ��āA�c�肪����΋󔒂Ŗ��߂�
							$format_str .= $delimit;
							for ($i = 0; $i < $denbun_len - strlen($format_str); $i++) {
								$format_str .= " ";
							}
						}
					}
					$zenkaku_flag = true;
				//  �i�󔒁j!"#$%&'()*+,-./0-9:;<=>?@A-Z[\]^_`a-z{|}~
				} elseif (preg_match("/^[\\x20-\\x7E]$/", $denbun_chr_) == true) {
					if ($zenkaku_flag == true) {
						if ($denbun_len - $format_len >= 2) {
							$format_str .= $delimit . $denbun_chr_;
						} else {
							$format_str .= $delimit;
						}
					} else {
						if($denbun_len - $format_len > 0){
							$format_str .= $denbun_chr_;
						}
					}
					$zenkaku_flag = false;
				}

				$format_len = strlen($format_str);

				if ($format_len <= 0) { // zenkaku_flg������
					$zenkaku_flag = false;
					break;
				}
			}

			if ($zenkaku_flag == true) {
				if($denbun_len - $format_len > 0){ // delimit��t������󂫂����邩
					if ( strcmp(substr($format_str, -1), $delimit) !== 0 ) { // ����delimit���t������Ă��Ȃ���
						$format_str .= $delimit;
					}
				}
				$format_len = strlen($format_str);
			}
			if ($denbun_len > $format_len) { // �d�����Ɋi�[�����񂪖����Ȃ�����������󔒂Ŗ��߂�
				for ($i = 0; $i < $denbun_len - $format_len; $i++) {
					$format_str .= " ";
				}
			}
			$format_str = str_replace($delimit, "", $format_str);

			return $format_str;

			break;
		// 1�F���l
		case "1":
			$format_str = sprintf("%0" . $denbun_len . "d", substr($denbun_str_, 0, $denbun_len));

			return $format_str;

			break;
		// 5�F���p�J�i�i�S�p�Ђ炪�ȂŎ󂯓���j
		case "5":
			foreach ($denbun_chr_list as $denbun_chr_) {
				$denbun_chr_kana = mb_convert_kana($denbun_chr_, "sh", "SJIS");
				$format_str .= (($denbun_chr_kana != $denbun_chr_) ? $denbun_chr_kana : " ");
			}
			$format_str = substr($format_str, 0, $denbun_len);
			$format_len = strlen($format_str);
			if ($denbun_len > $format_len) {
				for ($i = 0; $i < $denbun_len - $format_len; $i++) {
					$format_str .= " ";
				}
			}

			return $format_str;

			break;
		// 6�F������̏ꍇ�̂݌����I�[�o�[�̃A���[�g�\��
		case "6":
			foreach ($denbun_chr_list as $denbun_chr_) {
				// �S�p
				if (preg_match("/^[\\x81-\\x9F\\xE0-\\xEF][\\x40-\\x7E\\x80-\\xFC]$/", $denbun_chr_) == true) {
					$format_str .= (($zenkaku_flag == false) ? "<##" : "##");
					$zenkaku_flag = true;
				//  �i�󔒁j!"#$%&'()*+,-./0-9:;<=>?@A-Z[\]^_`a-z{|}~
				} elseif (preg_match("/^[\\x20-\\x7E]$/", $denbun_chr_) == true) {
					$format_str .= (($zenkaku_flag == true) ? ">@" : "@");
					$zenkaku_flag = false;
				}
			}
			if ($zenkaku_flag == true) {
				$format_str .= ">";
			}

			if ($denbun_len < strlen($format_str)) {
				return false;
			} else {
				return true;
			}

			break;
		// 7�F���p�J�i+���l�i�S�p�������󂯓���j
		case "7":
			foreach ($denbun_chr_list as $denbun_chr_) {
				// 0-9
				if (preg_match("/^[\\x30-\\x39]$/", $denbun_chr_) == true) {
					$format_str .= $denbun_chr_;
				} else {
					$denbun_chr_kana = mb_convert_kana($denbun_chr_, "sh", "SJIS");
					$format_str .= (($denbun_chr_kana != $denbun_chr_) ? $denbun_chr_kana : "");
				}
			}
			$format_str = substr($format_str, 0, $denbun_len);
			$format_len = strlen($format_str);
			if ($denbun_len > $format_len) {
				for ($i = 0; $i < $denbun_len - $format_len; $i++) {
					$format_str .= " ";
				}
			}

			return $format_str;

			break;
		// 8�F���S�Ή���
		case "8":
			foreach ($denbun_chr_list as $denbun_chr_) {
				// -0-9A-Za-z
				if (preg_match("/^[\\x2D\\x30-\\x39\\x40-\\x5A\\x61-\\x7A]$/", $denbun_chr_) == true) {
					$format_str .= $denbun_chr_;
				// �-�
				} elseif (preg_match("/^[\\xA6-\\xDF]$/", $denbun_chr_) == true) {
					$format_str .= $denbun_chr_;
				// �@�|�[�O-�X�`-�y��-����-��@-��
				} elseif (preg_match("/^\\x81[\\x40\\x5B\\x7C]$/", $denbun_chr_) == true 
					   || preg_match("/^\\x82[\\x40-\\xFC]$/", $denbun_chr_) == true 
					   || preg_match("/^\\x83[\\x40-\\x9E]$/", $denbun_chr_) == true) {
					$denbun_chr_kana = mb_convert_kana($denbun_chr_, "askh", "SJIS");
					$format_str .= (($denbun_chr_kana != $denbun_chr_) ? $denbun_chr_kana : " ");
				} else {
					$format_str .= " ";
				}
			}
			$format_str = substr($format_str, 0, $denbun_len);
			$format_len = strlen($format_str);
			if ($denbun_len > $format_len) {
				for ($i = 0; $i < $denbun_len - $format_len; $i++) {
					$format_str .= " ";
				}
			}

			return $format_str;

			break;
	}
}

/**
 * �����ϊ�
 *
 * ���M�d���̓��e��1�������؂�o���āA�����R�[�h�ϊ��������s��
 *
 * @param string	$conv_str		�Ώە�����
 *
 * @return string �ϊ��㕶��
 */
function fncCharCodeConv($conv_str) {

    $conv_str = str_replace('�]', '�[', $conv_str);
    $conv_str = str_replace('�|', '�[', $conv_str);
    $conv_str = str_replace('�\\', '�[', $conv_str);
    //���[�}����
    $conv_str = str_replace('�T', 'I', $conv_str);
    $conv_str = str_replace('�U', 'II', $conv_str);
    $conv_str = str_replace('�V', 'III', $conv_str);
    $conv_str = str_replace('�W', 'IV', $conv_str);
    $conv_str = str_replace('�X', 'V', $conv_str);
    $conv_str = str_replace('�Y', 'VI', $conv_str);
    $conv_str = str_replace('�Z', 'VII', $conv_str);
    $conv_str = str_replace('�[', 'VIII', $conv_str);
    $conv_str = str_replace('�\\', 'IX', $conv_str);
    $conv_str = str_replace('�]', 'X', $conv_str);
    $conv_str = str_replace('�@', 'i', $conv_str);
    $conv_str = str_replace('�A', 'ii', $conv_str);
    $conv_str = str_replace('�B', 'iii', $conv_str);
    $conv_str = str_replace('�C', 'iv', $conv_str);
    $conv_str = str_replace('�D', 'v', $conv_str);
    $conv_str = str_replace('�E', 'vi', $conv_str);
    $conv_str = str_replace('�F', 'vii', $conv_str);
    $conv_str = str_replace('�G', 'viii', $conv_str);
    $conv_str = str_replace('�H', 'ix', $conv_str);
    $conv_str = str_replace('�I', 'x', $conv_str);
    //���̑�
    $conv_str = str_replace('��', '(��)', $conv_str);
    $conv_str = str_replace('��', '(�L)', $conv_str);
    $conv_str = str_replace('��', '(��)', $conv_str);
    $conv_str = str_replace('�~', '����', $conv_str);
    $conv_str = str_replace('��', '���a', $conv_str);
    $conv_str = str_replace('��', '�吳', $conv_str);
    $conv_str = str_replace('��', '����', $conv_str);
    $conv_str = str_replace('��', 'TEL', $conv_str);
    $conv_str = str_replace('��', 'No.', $conv_str);
    $conv_str = str_replace('�_', '�~��', $conv_str);
    $conv_str = str_replace('�b', '���[�g��', $conv_str);
    $conv_str = str_replace('�`', '�L��', $conv_str);
    $conv_str = str_replace('�c', '�O����', $conv_str);
    $conv_str = str_replace('�d', '�g��', $conv_str);
    $conv_str = str_replace('�j', '�h��', $conv_str);
    $conv_str = str_replace('�g', '���b�g��', $conv_str);
    $conv_str = str_replace('�l', '�p�[�Z���g', $conv_str);
    $conv_str = str_replace('�a', '�Z���`', $conv_str);
    $conv_str = str_replace('�o', 'mm', $conv_str);
    $conv_str = str_replace('�p', 'cm', $conv_str);
    $conv_str = str_replace('�r', 'mg', $conv_str);
    $conv_str = str_replace('�s', 'kg', $conv_str);
    $conv_str = str_replace('�u', 'm2', $conv_str);
    //�J���}
    $conv_str = str_replace(',', '�C', $conv_str);

    return $conv_str;
}

?>