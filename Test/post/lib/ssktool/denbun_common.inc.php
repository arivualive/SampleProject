<?

require_once $LIB_PATH .'/'.'ssktool'.'/denbun_const.inc.php';
require_once $LIB_PATH .'/'.'ssktool'.'/denbun_msg.inc.php';
//▼2010/08/18 #1253 WAO対応(EC-One hatano) SOAP通信
require_once '/home/ssktool/include/PEAR/SOAP/Client.php';
//require_once '/usr/local/cybird/php/lib/php/SOAP/Client.php';
//▲2010/08/18 #1253 WAO対応(EC-One hatano) SOAP通信

//--------------------------------------------------------
/**
 * fncDenbunNXCOM
 * 概　要：電文発行<br>
 * 引　数：$denbun_id(電文ID)<br>
 * 引　数：$denbun_str(送信データ)<br>
 * 引　数：$remote_port(リモートポート)<br>
 * 引　数：$seq_no(SEQ)<br>
 * 引　数：$local_port(ローカルポート)<br>
 * global：$CONNECT_IP<br>
 * global：$CONNECT_PORT<br>
 * 戻り値：正常 = 0<br>
*/
//--------------------------------------------------------
Function fncDenbunNXCOM($denbun_id, $denbun_str, &$denbun_msg, $text_end_flag = false, $remote_port = "", $seq_no = "", $local_port = "", $kainno = "") {

	global $SSK_DC_FLAG;
	if ($SSK_DC_FLAG === false)
		echo '<font color="red"><b>fncDenbunNXCOM() called!!! </b></font>';

    //▼2010/08/23 #1253 WAO対応(EC-One hatano) ポート追加
	//global $CONNECT_IP, $CONNECT_PORT;
	global $CONNECT_IP, $CONNECT_PORT, $DENBUN_PORT;
    //▲2010/08/23 #1253 WAO対応(EC-One hatano) ポート追加

	$denbun_result = "";

	//Denbun.iniに記述されている$CONNECT_IPが「TEST」であれば以降の処理を行わない
	if (strtoupper(trim($CONNECT_IP)) == "TEST") {
		logDebug("denbun skip");
		$denbun_result = "0";
		$tmp_msg = fncReturnMsgRead($denbun_id);
		for ($i = 0; $i < count($tmp_msg); $i++) {
			//msg_data.iniに設定された値を格納
			$denbun_msg[$i] = $tmp_msg[$i + 1];
		}
		return $denbun_result;
	}
    logDebug('Remote port = ' . $remote_port);
	//引数を参照し値が代入されている場合はそちらを優先する
	//リモートポート
    //▼2010/08/23 #1253 WAO対応(EC-One hatano) ポート設定
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
        //denbun_const.inc.phpからポート番号を取得
        $CONNECT_PORT = $DENBUN_PORT[$denbun_id];
	}
    //▲2010/08/23 #1253 WAO対応(EC-One hatano) ポート設定
	// ▼モバイル対応 #777 2009/04/14 kdl.ohyanagi
	// 接続先のポート番号をログに出力する(テストの際に確認するため)
	logDebug('DenbunId = ' . $denbun_id . ' Connection port number = ' . $CONNECT_PORT);
	// ▲モバイル対応 #777 2009/04/14 kdl.ohyanagi
	//SeqNO
	if (trim($seq_no) != "") {
		$header_seq = $seq_no;
	} else {
		$header_seq = fncVfcGetSEQ($denbun_id);
	}
	//ローカルポート
	if (trim($local_port) != "") {
		$l_port = $local_port;
	} else {
		$l_port = fncVfcGetPORT("denbun_port");
	}

	//電文配列にデリミタ付加
	$nx_denbun = $denbun_str[0];
	for ($i = 1; $i < count($denbun_str); $i++) {
        //▼2010/08/24 #1253 WAO対応(EC-One hatano) デリミタ
        //chr(0x1E)→","に変更
		//$nx_denbun .= chr(0x1E) . $denbun_str[$i];
        $nx_denbun .= "," . $denbun_str[$i];
        //▲2010/08/24 #1253 WAO対応(EC-One hatano) デリミタ
	}
	for ($i = 0; $i < count($denbun_str); $i++) {
		logDebug("denbun[$i] (".$denbun_str[$i].")");
	}
    //▼2010/08/24 #1253 WAO対応(EC-One hatano) コメント
	//$nx_denbun .= (($text_end_flag == true) ? chr(0x03) : "");
    //▲2010/08/24 #1253 WAO対応(EC-One hatano) コメント

	$nx_header  = "";
    //▼2010/08/24 #1253 WAO対応(EC-One hatano) 共通ヘッダ作成
    /*
	$nx_header .= chr(hexdec($denbun_id) >> 8 & 0xFF);						//共通ヘッダ 電文ID（上位）
	$nx_header .= chr(hexdec($denbun_id) & 0xFF);							//共通ヘッダ 電文ID（下位）
	$nx_header .= chr(0x01);												//共通ヘッダ 電文タイプ
	$nx_header .= chr($header_seq >> 8 & 0xFF);								//共通ヘッダ 電文SEQ（上位）
	$nx_header .= chr($header_seq & 0xFF);									//共通ヘッダ 電文SEQ（上位）
	$nx_header .= chr(0x01);												//共通ヘッダ 電文結果
	$nx_header .= chr(0x01);												//共通ヘッダ 継続フラグ
	$nx_header .= chr(0x1E);												//共通ヘッダ デミリタCHAR
	$nx_header .= chr(0x01) . chr(0x01) . chr(0x01) . chr(0x01);			//共通ヘッダ PC識別コード
	$nx_header .= chr(0x00) . chr(0x00) . chr(0x00) . chr(0x00);			//共通ヘッダ クッキー情報
	$nx_header .= chr(0x00);												//共通ヘッダ テキスト長（上位）※仮設定、fncSendMessage内EBCDIC変換後に再設定を行う
	$nx_header .= chr(0x00);												//共通ヘッダ テキスト長（下位）※仮設定、fncSendMessage内EBCDIC変換後に再設定を行う
    */
    $nx_header .= $denbun_id;               //電文ID
    $nx_header .= "01";                     //電文タイプ
    $nx_header .= "0001";                   //電文SEQ(仮設定)
    $nx_header .= "01";                     //電文結果
    $nx_header .= "01";                     //継続フラグ
    $nx_header .= ",";                      //デミリタCHAR
    $nx_header .= "00000000";               //PC識別コード
    $nx_header .= "00000000";               //クッキー情報
    $nx_header .= "0000";                   //テキスト長
    //▲2010/08/24 #1253 WAO対応(EC-One hatano) 共通ヘッダ作成

	//NX通信パラメータ設定
	$local_port = $l_port;	//ローカルポート

	//NX電文発行 ($nx_ret ⇒ 0:正常、1:タイムアウト、9:オフライン(接続失敗・送信失敗・ホストからの電文結果99))
	$nx_recv_msg = "";
    //▼2011/2/14 #1253 WAO対応(EC-One hatano) $text_end_flagを引数に追加
	//$nx_ret = fncSendMessage($nx_header . $nx_denbun, $local_port, $nx_recv_msg, $denbun_id);
    $nx_ret = fncSendMessage($nx_header . $nx_denbun, $local_port, $nx_recv_msg, $denbun_id, $text_end_flag);
    //▲2011/2/14 #1253 WAO対応(EC-One hatano) $text_end_flagを引数に追加

	//エラー分岐
	if ($nx_ret != "0") {
		$denbun_result = $nx_ret;
	} else {
		//正常終了
		$denbun_result = 0;
		if (trim($nx_recv_msg) == "") {
			$denbun_msg[0] = "";
		} else {
            //▼2010/08/24 #1253 WAO対応(EC-One hatano) デリミタ
			$tmp_msg = explode(",",$nx_recv_msg);
            //▲2010/08/24 #1253 WAO対応(EC-One hatano) デリミタ
			for ($i = 0; $i < count($tmp_msg); $i++) {
				$denbun_msg[$i] = str_replace("，",",",trim($tmp_msg[$i]));
			}
		}
	}
    //▼R-#31839_【H29-00284-01】メールオプトイン対応_WEB 2018/08/23 nul-fukunaga
	if ($kainno == '' &&
		($denbun_id == 'A240' ||  $denbun_id == 'A900' || $denbun_id == 'A910' || $denbun_id == 'A920' || $denbun_id == 'A930' || $denbun_id == 'B930'))
		$kainno = $denbun_str[0];
    //▲R-#31839_【H29-00284-01】メールオプトイン対応_WEB 2018/08/23 nul-fukunaga
	fncDenbunLog($denbun_id, $nx_denbun, $denbun_msg, $nx_ret == "0" ? '1' : '0', $kainno);

	return $denbun_result;
}

/**
 * AxxxSend_Tbl に電文を記録
 */
Function fncDenbunLog($denbun_id, $send_data, $ret_data, $host_result, $kainno = "", $update_user = "")
{
	//DBに記録
// 	global $con, $SSK_SCRIPT_NAME;
// 	global $salt, $seed, $vector, $dec;
	global $S_USERID;
	if ( $update_user == "" ) {
// 		$update_user = "Web:" . $SSK_SCRIPT_NAME;
		$update_user = "Tool:" . $S_USERID;
	}

// 	if ( $kainno == "" ) {
// 		// セッションから取得
// 		global $smarty;
// 		$member = GetLoginKainData($smarty);
// 		$kainno = $member['KAINNO'];
// 	}

	// ホスト送信データ暗号化
// 	$send_data = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, $send_data, $vector, $dec, $error_code);
// 	$ret_data = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, $ret_data, $vector, $dec, $error_code);
// 	logDebug(__FUNCTION__ . " denbun_id=" . $denbun_id );

	//where句作成
	
	//#777 (携帯)個別メール送信で対応メモをモバイル用の電文で 2009/06/03 kdl-uchida
	//PC用、携帯用でサイト区分を変更する
	$site_kbn_val = '1'; // PC用
	if(substr($denbun_id, 0, 1) == "B"){
		$site_kbn_val = '2'; // 携帯用
	}

    //▼2011/06/22 #1253 WAO対応(EC-One hatano) 注文電文のバイト数が4000byteを超えてしまったので、4000byte以上を切る
    if (strlen($send_data) > 4000){
        $send_data = substr($send_data,0,4000);
    }
    if (strlen($ret_data) > 4000){
        $send_data = substr($ret_data,0,4000);
    }
    //▲2011/06/22 #1253 WAO対応(EC-One hatano) 注文電文のバイト数が4000byteを超えてしまったので、4000byte以上を切る

    //▼R-#31839_【H29-00284-01】メールオプトイン対応_WEB 2018/08/23 nul-fukunaga
	if ( in_array(strtoupper($denbun_id), array('A100','A110','A200','A210','A240','A300','A400','A500','A900','A910','A920','A930', 'B930'))) {
    //▲R-#31839_【H29-00284-01】メールオプトイン対応_WEB 2018/08/23 nul-fukunaga
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
		$cols[] = getSqlValue(ssk_encrypt(substr($send_data, 0, 2967))); // Base64エンコード後：ceil(x/3)x4
                if (is_array($ret_data)){
                    $cols[] = getSqlValue(ssk_encrypt(substr(implode('', $ret_data), 0, 2967))); // Base64エンコード後：ceil(x/3)x4
                }else{
                    $cols[] = getSqlValue(ssk_encrypt(substr($ret_data, 0, 2967))); // Base64エンコード後：ceil(x/3)x4
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
 * 概　要：denbun_msg.inc.phpより各値を取得する(テスト環境で行う場合の考慮)<br>
 * 引　数：$denbun_id(電文ID)<br>
 * global：$DENBUN_INC_PATH<br>
 * 戻り値：ファイルデータ<br>
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
 * 概　要：電文のシーケンシャル番号を取得する<br>
 * 引　数：$denbun_id(電文ID)<br>
 * global：$CST_ERROR<br>
 * global：$SEQ_DATA_PATH<br>
 * 戻り値：Hex"0001" ～ Hex"FFFF"<br>
*/
//--------------------------------------------------------
Function fncVfcGetSEQ($denbun_id) {

	global $CST_ERROR, $SEQ_DATA_PATH;

	$result_seq = $CST_ERROR;

	$file_path = $SEQ_DATA_PATH . "/denbun_" . $denbun_id . ".dat";

	$vl_str_seq = ''; // avoid Notice: Undefined variable: vl_str_seq
	if (file_exists($file_path)) {
		//ファイル読込み
		$fp = fopen($file_path, "r");
		while (!feof($fp)) {
			$vl_str_seq = trim(fgets($fp));
		}
		fclose($fp);
	}

	if ($vl_str_seq == "" || $vl_str_seq == "0" || $vl_str_seq == "65535") {
		$vl_str_seq = "1";
	}

	//ファイル書込み
	$fp = fopen($file_path, "w");
	$ret = @fwrite($fp, ($vl_str_seq + 1));
	fclose($fp);

	$result_seq = $vl_str_seq;

	return $result_seq;
}

//--------------------------------------------------------
/**
 * fncVfcGetPORT
 * 概　要：電文のシーケンシャル番号を取得する<br>
 * 引　数：$file_name(ファイル名)<br>
 * global：$CST_ERROR<br>
 * global：$SEQ_DATA_PATH<br>
 * 戻り値：Hex"0001" ～ Hex"FFFF"<br>
*/
//--------------------------------------------------------
Function fncVfcGetPORT($file_name) {

	global $CST_ERROR, $SEQ_DATA_PATH;

	$result_port = $CST_ERROR;

	$file_path = $SEQ_DATA_PATH . "/" . $file_name . ".dat";
	$vl_str_seq = ''; // avoid Notice: Undefined variable: vl_str_seq
	if (file_exists($file_path)) {
		//ファイル読込み
		$fp = fopen($file_path, "r");
		while (!feof($fp)) {
			$vl_str_seq = trim(fgets($fp));
		}
		fclose($fp);
	}

	if ($vl_str_seq == "" || $vl_str_seq == "0" || $vl_str_seq == "65535") {
		$vl_str_seq = "1";
	}

	//ファイル書込み
	$fp = fopen($file_path, "w");
	$ret = @fwrite($fp, ($vl_str_seq + 1));
	fclose($fp);

	//SEQ番号作成
	$result_port = $vl_str_seq;

	return $result_port;
}

//--------------------------------------------------------
/**
 * fncSendMessage
 * 概　要：NX電文発行<br>
 * 引　数：$send_data(送信データ)<br>
 * 引　数：$local_port(ローカルポート)<br>
 * 引　数：$denbun_id(電文ID)<br>
 * global：$SJIS_JB8<br>
 * global：$CONNECT_IP<br>
 * global：$CONNECT_PORT<br>
 * global：$TIMEOUT<br>
 * 戻り値：エラー番号<br>
*/
//--------------------------------------------------------
//▼2011/2/14 #1253 WAO対応(EC-One hatano) $text_end_flagを引数に追加
//Function fncSendMessage($send_data, $local_port, &$recv_message, $denbun_id) {
Function fncSendMessage($send_data, $local_port, &$recv_message, $denbun_id, $text_end_flag) {
//▲2011/2/14 #1253 WAO対応(EC-One hatano) $text_end_flagを引数に追加
logDebug(__FUNCTION__.' start');
    //▼#1253 WAO対応(EC-One hatano) ポート番号
	//global $SJIS_JB8, $CONNECT_IP, $CONNECT_PORT, $TIMEOUT;
    global $SJIS_JB8, $CONNECT_IP, $CONNECT_PORT, $TIMEOUT, $WSDL_File_path;
    //▲#1253 WAO対応(EC-One hatano) ポート番号

	//▼HOST.LOGに出力する電文を暗号化 EC-One hatano
	global $salt, $seed, $vector, $dec;
	//▲HOST.LOGに出力する電文を暗号化 EC-One hatano

	$p_err_number = 0;

    //▼2010/08/24 #1253 WAO対応(EC-One hatano) 共通ヘッダ作成機能コメント化
    /*
	$in_buf_ = substr($send_data, 18);
	//バイト毎に配列に格納する
	for ($i = 0; $i < strlen($in_buf_); $i++) {
		$in_buf[$i] = ord(substr($in_buf_, $i, 1));
	}

	//送信メッセージ
	$out_buf = array();
	$out_len = 0;
	fncCodeConvert($SJIS_JB8, $in_buf, $out_buf, count($in_buf), $out_len);

	$send_msg_data = "";

	//$send_msg_data .= substr($send_data, 0, 18);

	$send_msg_data .= substr($send_data, 0, 16);

	//共通ヘッダ テキスト長
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
    //▲2010/08/24 #1253 WAO対応(EC-One hatano) 共通ヘッダ作成機能コメント化
    //▼2010/08/24 #1253 WAO対応(EC-One hatano) 接続機能コメント化
	//接続
    /*
	$fp = fsockopen($CONNECT_IP, $CONNECT_PORT, $errno, $errstr, $TIMEOUT);
	if (!$fp) {
		$p_err_number = 9;
		$recv_message = "接続エラー";
		logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 Connection error");
		logHost("【RETURN】 " . $p_err_number);
		return $p_err_number;
	}

	//送信
	$fputs_ret = fputs($fp, $send_msg_data);

	if (!$fputs_ret) {
		logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 Transmission error");
		$p_err_number = 9;
		$recv_message = "送信エラー";
	} else {
		//タイムアウト設定
		stream_set_timeout($fp, $TIMEOUT);

		//受信
		$rcv_denbun_data = "";

		// 無限ループ対策仮対応
		$i = 0;

		while (feof($fp) == false) {
			$stat = stream_get_meta_data($fp);

			if ($stat["timed_out"]) {
				logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 Time out");
				$p_err_number = 1;
				$recv_message = "タイムアウト";
				break;
			}
			$tmp = fgetc($fp);
			$rcv_denbun_data .= $tmp;
			if (strlen($rcv_denbun_data) > 18 && $tmp == chr(0x03)) {
				break;
			}

			// 無限ループ対策仮対応
			$i++;
			if ($i > 10000) {
				break;
			}
		}
	}
    */
    //$send_msg_dataに$send_dataを格納
    //$send_msg_data = "";
    //文字変換処理
    //$send_msg_data = fncCharCodeConv( $send_data );

    $errMsg = 'エラーメッセージ';
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
                //'エラーメッセージ'
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

    //WSDLファイル
    $wsdl = $WSDL_File_path;
    $client = new SOAP_WSDL( $wsdl, array('timeout'=>$TIMEOUT) );

    //WSDLファイルの読み込みチェック
    if ( $client->fault )
    {
        //WSDLファイルの読み込みエラー
        logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 WSDLFileOpen error");
		$p_err_number = 9;
		$recv_message = "WSDLファイルの読み込みエラー";
    }
    else
    {
        //電文送信
        $proxy = $client->getProxy();
        //$proxy->setEncoding('SJIS');
        $result = $proxy->callMethod( $TxWCFDataEntity );

        if(isset($result->userinfo) == false){
            $p_err_number = 9;
            $recv_message = "ホストからの通信拒絶";
            logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 Communicate refusal ");
            logHost("【SEND】 " . ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, mb_convert_encoding($send_data, "SJIS-WIN"), $vector, $dec, $error_code));
            logHost("【ACCEPT】 ");
            logHost("【RETURN】 " . $p_err_number);
            return $p_err_number;
        }

        //タグの削除
        $trans_tbl = get_html_translation_table (HTML_ENTITIES);
        $trans_tbl = array_flip ($trans_tbl);
        $str = strtr ($result->userinfo, $trans_tbl);
        $str2 = preg_replace("/<[^>]*\/>/","||",$str);
        $str3 = preg_replace("/<[^>]*>/","|",$str2);
        $denbun = explode('|',$str3);
        $denbun[21] = mb_convert_encoding($denbun[21], "SJIS-WIN", "UTF-8");

        //DetailErrorCd→$str2[13]  DetailErrorMessage→$str2[15]  ErrorCd→$str2[17]  TxMessageBuffer→$str2[21]
        if ( strlen( $denbun[21] ) == 0 || $denbun[17] != "0" || substr($denbun[21],10,2) != "01" )
        {
            logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 Transmission error (ErrorCd:". $denbun[17]. " ErrorMessage:". mb_convert_encoding($denbun[15],"SJIS-WIN","UTF-8"). ")");
		    $p_err_number = 9;
		    $recv_message = "送信エラー";
        }
    }

    //▼2010/08/24 #1253 WAO対応(EC-One hatano) 切断機能コメント化
	//切断
    /*
	$ret = fclose($fp);
	if (!$ret) {
		logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 Close error");

		//if ($p_err_number == "0") {
		//	$p_err_number = 1;
		//	$recv_message = "切断エラー";
		//}

	}

	if ($p_err_number == "0") {
		if (strlen($rcv_denbun_data) > 0) {
			logHost("[P:" . $local_port . "] " . $denbun_id . " 【OK】");
		} else {
			logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 Reception error");
		}
	}
    */
    if ($p_err_number == "0" || $denbun[17] == "0" ) {
		if (strlen( $denbun[21] ) > 0) {
			logHost("[P:" . $local_port . "] " . $denbun_id . " 【OK】");
		} else {
			logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 Reception error (ErrorCd:". $denbun[17]. " ErrorMessage:". mb_convert_encoding($denbun[15],"SJIS-WIN","UTF-8"). ")");
		}
	}
    //▲2010/08/24 #1253 WAO対応(EC-One hatano) 切断機能コメント化

	logHost("【SEND】 " . ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, mb_convert_encoding($send_data, "SJIS-WIN"), $vector, $dec, $error_code));

    //▼2010/08/24 #1253 WAO対応(EC-One hatano) 切断機能コメント化
    /*
	if (strlen($rcv_denbun_data) > 0) {
		for ($i = 0; $i < strlen($rcv_denbun_data); $i++) {
			$rcv_denbun_data_[$i] = ord(substr($rcv_denbun_data, $i , 1));
		}

		logHost("【ACCEPT】 " . fncDisplayHex($rcv_denbun_data));

		$recv_message = fncRecvMsgCheck($rcv_denbun_data_, count($rcv_denbun_data_), $local_port, $send_head_id);
		if ($recv_message == "99") {
			//ホスト通信拒絶
			$p_err_number = 9;
			$recv_message = "オフライン（ホストからの電文結果⇒99）";
			logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 Offline error");
		}
	} else {
		logHost("【ACCEPT】 ");
	}
    */
    if (strlen( $denbun[21] ) > 0) {
		for ($i = 0; $i < strlen( $denbun[21] ); $i++) {
			$rcv_denbun_data_[$i] = ord(substr($denbun[21], $i , 1));
		}

		//logHost("【ACCEPT】 " . substr($denbun[21],0,35). fncDisplayHex( substr($denbun[21],36) ));
        logHost("【ACCEPT】 " . ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR, $salt, $seed, mb_convert_encoding($denbun[21], "SJIS-WIN"), $vector, $dec, $error_code));

		$recv_message = fncRecvMsgCheck($rcv_denbun_data_, count($rcv_denbun_data_), $local_port, $send_head_id);

        if ($recv_message == "99") {
			//ホスト通信拒絶
			$p_err_number = 9;
			$recv_message = "オフライン（ホストからの電文結果⇒99）";
			logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 Offline error");
		}
	} else {
		logHost("【ACCEPT】 ");
	}
    //▲2010/08/24 #1253 WAO対応(EC-One hatano) 切断機能コメント化

	logHost("【RETURN】 " . $p_err_number);
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
 * 概　要：JB8→SJIS文字ｺｰﾄﾞ変換ﾒｲﾝ処理<br>
 * 引　数：$input_str(変換前文字列)<br>
 * 引　数：$output_str(変換後文字列)<br>
 * 引　数：$input_len(変換前文字列の長さ)<br>
 * 引　数：$output_len(変換後文字列の長さ)<br>
 * global：$ASCII_TO_EBCDICV24<br>
 * 戻り値：<br>
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
		} else if ($kmode == true) {	//漢字モード
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
 * 概　要：SJIS→JB8文字ｺｰﾄﾞ変換ﾒｲﾝ処理<br>
 * 引　数：$input_str(変換前文字列)<br>
 * 引　数：$output_str(変換後文字列)<br>
 * 引　数：$input_len(変換前文字列の長さ)<br>
 * 引　数：$output_len(変換後文字列の長さ)<br>
 * global：$ASCII_TO_EBCDICV24<br>
 * 戻り値：<br>
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
 * 概　要：HOST外字→PC外字ｺｰﾄﾞ変換処理<br>
 * 引　数：$c1(変換文字の上位ﾊﾞｲﾄ)<br>
 * 引　数：$c2(変換文字の下位ﾊﾞｲﾄ)<br>
 * global：$CCODE_TBL_CNT<br>
 * global：$C_CODE_TBL<br>
 * 戻り値：True:成功 False:失敗<br>
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

	//強制コード変換テーブル処理
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
 * 概　要：PC外字→HOST外字ｺｰﾄﾞ変換処理<br>
 * 引　数：$c1(変換文字の上位ﾊﾞｲﾄ)<br>
 * 引　数：$c2(変換文字の下位ﾊﾞｲﾄ)<br>
 * global：$CCODE_TBL_CNT<br>
 * global：$C_CODE_TBL<br>
 * 戻り値：True:成功 False:失敗<br>
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

	//強制コード変換テーブル処理
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
 * 概　要：JB8→SJIS文字ｺｰﾄﾞ変換処理<br>
 * 引　数：$c1(変換文字の上位ﾊﾞｲﾄ)<br>
 * 引　数：$c2(変換文字の下位ﾊﾞｲﾄ)<br>
 * 戻り値：なし<br>
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
 * 概　要：SJIS→JB8文字ｺｰﾄﾞ変換処理<br>
 * 引　数：$c1(変換文字の上位ﾊﾞｲﾄ)<br>
 * 引　数：$c2(変換文字の下位ﾊﾞｲﾄ)<br>
 * 戻り値：True:成功 False:失敗<br>
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
 * 概　要：ヘキサコードダンプ処理<br>
 * 引　数：$input(対象文字列)<br>
 * 戻り値：ダンプ表示用文字列<br>
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
 * 概　要：受信電文の解析処理<br>
 * 引　数：$msg<br>
 * 引　数：$msg_length<br>
 * 引　数：$local_port<br>
 * 引　数：$send_head_id<br>
 * global：$JB8_SJIS<br>
 * 戻り値：変換後文字列<br>
*/
//--------------------------------------------------------
Function fncRecvMsgCheck($msg, $msg_length, $local_port, $send_head_id) {

	global $JB8_SJIS;

	$out_buf = array();
	$out_len = 0;
	$max_length = 0;
	$p_recv_message = "";

    //▼2010/10/28 #1253 WAO対応(EC-One hatano)
    $denbunType = chr($msg[4]).chr($msg[5]);
logDebug(__FUNCTION__.'受信電文の電文タイプ→'.$denbunType);
    //電文結果
    $denbunAnser = chr($msg[4]).chr($msg[5]);
logDebug(__FUNCTION__.'受信電文の電文結果→'.$denbunAnser);
    //▲2010/10/28 #1253 WAO対応(EC-One hatano)

	for ($i = 0; $i < $msg_length; $i++) {
		if ($max_length <= 0) {
            //▼2010/10/28 #1253 WAO対応(EC-One hatano)
            /*
			if ($msg[$i] == ord($send_head_id[0])) {
				if ($msg[$i + 1] == ord($send_head_id[1])) {
					if ($msg[$i + 2] == 0x2) {
//**************** Anet fujitsuka追加 *****************
						if ($msg[$i + 5] == 0x99) {
							//ホスト通信拒絶
							return "99";
						}
//**************** Anet fujitsuka追加 *****************
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
    						//ホスト通信拒絶
    						return "99";
    					}
                        //WAOより、テキスト長は使用されない為、固定のMaxLengthを持たせる(ログイン電文が一番長いので、余裕を持たせて4000)
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
            //▲2010/10/28 #1253 WAO対応(EC-One hatano)
        //▼2010/10/28 #1253 WAO対応(EC-One hatano)
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
					//配列要素を連結
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
                    //WAO対応 変換の必要がない為、コメントアウト
					//fncCodeConvert($JB8_SJIS, $rcv_msg, $out_buf, $max_length, $out_len);
                    $work_buf = array_fill(0, ($max_length + 35), null);
					for ($j = 0; $j < 35; $j++) {
                        if (chr($rcv_head[$j]) != ",") {
                            $work_buf[$j] = chr($rcv_head[$j]);
                        } else {
                            $work_buf[$j] = "";
                        }
					}
                    //共通ヘッダの最後にデリミタを追加
                    $work_buf[$j+1] = ",";
                    //共通ヘッダー＋デリミタが格納された配列の個数を取得
                    $head_count = count($work_buf) + 1;
                    //
                    for ($j = 0; $j < $max_length; $j++) {
						$work_buf[$j + $head_count] = chr($rcv_msg[$j]);
					}
					

					//配列要素を連結
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
        //▲2010/10/28 #1253 WAO対応(EC-One hatano)
	}

	return $p_recv_message;
}

//--------------------------------------------------------
/**
 * fncDenbunFormat
 * 概　要：電文フォーマット<br>
 * 引　数：$denbun_string<br>
 * 引　数：$denbun_length<br>
 * 引　数：$denbun_type<br>
 * 戻り値：変換後文字列<br>
*/
//--------------------------------------------------------
function fncDenbunFormat($denbun_str, $denbun_len, $denbun_type) {

    //▼2010/12/15 #1253 WAO対応(EC-One hatano) 機種依存文字変換
    $denbun_str_ = fncCharCodeConv($denbun_str);
    //▲2010/12/15 #1253 WAO対応(EC-One hatano) 機種依存文字変換

	// １文字づつ配列に格納する。
	$denbun_chr_list = array();
	for ($i = 0; $i < strlen($denbun_str); $i++) {
		// 全角
		if (preg_match("/^[\\x81-\\x9F\\xE0-\\xEF][\\x40-\\x7E\\x80-\\xFC]/", substr($denbun_str_, $i)) == true) {
			array_push($denbun_chr_list, substr($denbun_str_, $i, 2));
			$i++;
		// 半角
		} else {
			array_push($denbun_chr_list, substr($denbun_str_, $i, 1));
		}
	}

	// 初期設定
	$format_str = "";
	$format_len = 0;
    //▼2010/10/28 #1253 WAO対応(EC-One hatano) デリミタコメント化
	//$delimit = chr(0x00);
    //▲2010/10/28 #1253 WAO対応(EC-One hatano) デリミタコメント化
	$zenkaku_flag = false;

	switch ($denbun_type) {
		// 0：文字列
		case "0":
			foreach ($denbun_chr_list as $denbun_chr_) {
				// 全角 文字列の前後に識別子が入るので、それらを計算しながらフォーマット
				if (preg_match("/^[\\x81-\\x9F\\xE0-\\xEF][\\x40-\\x7E\\x80-\\xFC]$/", $denbun_chr_) == true) {
					if ($zenkaku_flag == false) {
						if ($denbun_len - $format_len > 3) {
							$format_str .= $delimit . $denbun_chr_;
						} elseif ($denbun_len - $format_len == 3) { // 空きが残りが4Byte丁度なら今回の文字列までしか格納できないのでdelimitで閉じる
							$format_str .= $delimit . $denbun_chr_ . $delimit;
						}else{ // 空きが3Byte以下なので全角文字は入らない。よって、空白で埋める
							for ($i = 0; $i < $denbun_len - $format_len; $i++) {
								$format_str .= " ";
							}
						}
					} else {
						if ($denbun_len - $format_len > 2) {
							$format_str .= $denbun_chr_;
						} elseif ($denbun_len - $format_len == 2) {
							$format_str .= $denbun_chr_ . $delimit;
						} else { // 空きが2Byte以下なら、全角文字は格納出来ないので、deimitで閉じて、残りがあれば空白で埋める
							$format_str .= $delimit;
							for ($i = 0; $i < $denbun_len - strlen($format_str); $i++) {
								$format_str .= " ";
							}
						}
					}
					$zenkaku_flag = true;
				//  （空白）!"#$%&'()*+,-./0-9:;<=>?@A-Z[\]^_`a-z{|}~
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

				if ($format_len <= 0) { // zenkaku_flg初期化
					$zenkaku_flag = false;
					break;
				}
			}

			if ($zenkaku_flag == true) {
				if($denbun_len - $format_len > 0){ // delimitを付加する空きがあるか
					if ( strcmp(substr($format_str, -1), $delimit) !== 0 ) { // 既にdelimitが付加されていないか
						$format_str .= $delimit;
					}
				}
				$format_len = strlen($format_str);
			}
			if ($denbun_len > $format_len) { // 電文長に格納文字列が満たなかったら後ろを空白で埋める
				for ($i = 0; $i < $denbun_len - $format_len; $i++) {
					$format_str .= " ";
				}
			}
			$format_str = str_replace($delimit, "", $format_str);

			return $format_str;

			break;
		// 1：数値
		case "1":
			$format_str = sprintf("%0" . $denbun_len . "d", substr($denbun_str_, 0, $denbun_len));

			return $format_str;

			break;
		// 5：半角カナ（全角ひらがなで受け入れ）
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
		// 6：文字列の場合のみ桁数オーバーのアラート表示
		case "6":
			foreach ($denbun_chr_list as $denbun_chr_) {
				// 全角
				if (preg_match("/^[\\x81-\\x9F\\xE0-\\xEF][\\x40-\\x7E\\x80-\\xFC]$/", $denbun_chr_) == true) {
					$format_str .= (($zenkaku_flag == false) ? "<##" : "##");
					$zenkaku_flag = true;
				//  （空白）!"#$%&'()*+,-./0-9:;<=>?@A-Z[\]^_`a-z{|}~
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
		// 7：半角カナ+数値（全角平仮名受け入れ）
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
		// 8：完全対応版
		case "8":
			foreach ($denbun_chr_list as $denbun_chr_) {
				// -0-9A-Za-z
				if (preg_match("/^[\\x2D\\x30-\\x39\\x40-\\x5A\\x61-\\x7A]$/", $denbun_chr_) == true) {
					$format_str .= $denbun_chr_;
				// ｦ-ﾟ
				} elseif (preg_match("/^[\\xA6-\\xDF]$/", $denbun_chr_) == true) {
					$format_str .= $denbun_chr_;
				// 　－ー０-９Ａ-Ｚａ-ｚぁ-んァ-ヶ
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
 * 文字変換
 *
 * 送信電文の内容を1文字ずつ切り出して、文字コード変換処理を行う
 *
 * @param string	$conv_str		対象文字列
 *
 * @return string 変換後文字
 */
function fncCharCodeConv($conv_str) {

    $conv_str = str_replace('‐', 'ー', $conv_str);
    $conv_str = str_replace('－', 'ー', $conv_str);
    $conv_str = str_replace('―\', 'ー', $conv_str);
    //ローマ数字
    $conv_str = str_replace('Ⅰ', 'I', $conv_str);
    $conv_str = str_replace('Ⅱ', 'II', $conv_str);
    $conv_str = str_replace('Ⅲ', 'III', $conv_str);
    $conv_str = str_replace('Ⅳ', 'IV', $conv_str);
    $conv_str = str_replace('Ⅴ', 'V', $conv_str);
    $conv_str = str_replace('Ⅵ', 'VI', $conv_str);
    $conv_str = str_replace('Ⅶ', 'VII', $conv_str);
    $conv_str = str_replace('Ⅷ', 'VIII', $conv_str);
    $conv_str = str_replace('Ⅸ\', 'IX', $conv_str);
    $conv_str = str_replace('Ⅹ', 'X', $conv_str);
    $conv_str = str_replace('ⅰ', 'i', $conv_str);
    $conv_str = str_replace('ⅱ', 'ii', $conv_str);
    $conv_str = str_replace('ⅲ', 'iii', $conv_str);
    $conv_str = str_replace('ⅳ', 'iv', $conv_str);
    $conv_str = str_replace('ⅴ', 'v', $conv_str);
    $conv_str = str_replace('ⅵ', 'vi', $conv_str);
    $conv_str = str_replace('ⅶ', 'vii', $conv_str);
    $conv_str = str_replace('ⅷ', 'viii', $conv_str);
    $conv_str = str_replace('ⅸ', 'ix', $conv_str);
    $conv_str = str_replace('ⅹ', 'x', $conv_str);
    //その他
    $conv_str = str_replace('㈱', '(株)', $conv_str);
    $conv_str = str_replace('㈲', '(有)', $conv_str);
    $conv_str = str_replace('㈹', '(代)', $conv_str);
    $conv_str = str_replace('㍻', '平成', $conv_str);
    $conv_str = str_replace('㍼', '昭和', $conv_str);
    $conv_str = str_replace('㍽', '大正', $conv_str);
    $conv_str = str_replace('㍾', '明治', $conv_str);
    $conv_str = str_replace('℡', 'TEL', $conv_str);
    $conv_str = str_replace('№', 'No.', $conv_str);
    $conv_str = str_replace('㍉', 'ミリ', $conv_str);
    $conv_str = str_replace('㍍', 'メートル', $conv_str);
    $conv_str = str_replace('㌔', 'キロ', $conv_str);
    $conv_str = str_replace('㌘', 'グラム', $conv_str);
    $conv_str = str_replace('㌧', 'トン', $conv_str);
    $conv_str = str_replace('㌦', 'ドル', $conv_str);
    $conv_str = str_replace('㍑', 'リットル', $conv_str);
    $conv_str = str_replace('㌫', 'パーセント', $conv_str);
    $conv_str = str_replace('㌢', 'センチ', $conv_str);
    $conv_str = str_replace('㎜', 'mm', $conv_str);
    $conv_str = str_replace('㎝', 'cm', $conv_str);
    $conv_str = str_replace('㎎', 'mg', $conv_str);
    $conv_str = str_replace('㎏', 'kg', $conv_str);
    $conv_str = str_replace('㎡', 'm2', $conv_str);
    //カンマ
    $conv_str = str_replace(',', '，', $conv_str);

    return $conv_str;
}

?>