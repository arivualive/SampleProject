<?php
Function fncDenbunNXCOM($denbun_id, $denbun_str, &$denbun_msg, $kainno = "") {

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
		//$tmp_msg = fncReturnMsgRead($denbun_id);
		// for ($i = 0; $i < count($tmp_msg); $i++) {
		// 	//msg_data.iniに設定された値を格納
		// 	$denbun_msg[$i] = $tmp_msg[$i + 1];
		// }
        $denbun_msg = fncReturnMsgRead($denbun_id);
		return $denbun_result;
	}
    /* logDebug('Remote port = ' . $remote_port);
	//引数を参照し値が代入されている場合はそちらを優先する
    if (trim($remote_port) != "")
    {
		$CONNECT_PORT = $remote_port;
    }
    else
    {
        //denbun_const.inc.phpからポート番号を取得
        $CONNECT_PORT = $DENBUN_PORT[$denbun_id];
	} */

	/* logDebug('DenbunId = ' . $denbun_id . ' Connection port number = ' . $CONNECT_PORT);
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
	} */

	//電文配列にデリミタ付加
    $nx_denbun = $denbun_str[0];
	//$nx_denbun = $denbun_str[0];
	/* for ($i = 1; $i < count($denbun_str); $i++) {
        //▼2010/08/24 #1253 WAO対応(EC-One hatano) デリミタ
        //chr(0x1E)→","に変更
		//$nx_denbun .= chr(0x1E) . $denbun_str[$i];
        $nx_denbun .= "," . $denbun_str[$i];
        //▲2010/08/24 #1253 WAO対応(EC-One hatano) デリミタ
	}
	for ($i = 0; $i < count($denbun_str); $i++) {
		logDebug("denbun[$i] (".$denbun_str[$i].")");
	} */
    //▼2010/08/24 #1253 WAO対応(EC-One hatano) コメント
	//$nx_denbun .= (($text_end_flag == true) ? chr(0x03) : "");
    //▲2010/08/24 #1253 WAO対応(EC-One hatano) コメント

	/* $nx_header  = "";
    //▼2010/08/24 #1253 WAO対応(EC-One hatano) 共通ヘッダ作成
   
    $nx_header .= $denbun_id;               //電文ID
    $nx_header .= "01";                     //電文タイプ
    $nx_header .= "0001";                   //電文SEQ(仮設定)
    $nx_header .= "01";                     //電文結果
    $nx_header .= "01";                     //継続フラグ
    $nx_header .= ",";                      //デミリタCHAR
    $nx_header .= "00000000";               //PC識別コード
    $nx_header .= "00000000";               //クッキー情報
    $nx_header .= "0000";                   //テキスト長
    //▲2010/08/24 #1253 WAO対応(EC-One hatano) 共通ヘッダ作成 */

	//NX通信パラメータ設定
	/* $local_port = $l_port;	//ローカルポート */

	//NX電文発行 ($nx_ret ⇒ 0:正常、1:タイムアウト、9:オフライン(接続失敗・送信失敗・ホストからの電文結果99))
	$nx_recv_msg = "";
    //▼2011/2/14 #1253 WAO対応(EC-One hatano) $text_end_flagを引数に追加
	//$nx_ret = fncSendMessage($nx_header . $nx_denbun, $local_port, $nx_recv_msg, $denbun_id);
    //$nx_ret = fncSendMessage($nx_header . $nx_denbun, $local_port, $nx_recv_msg, $denbun_id, $text_end_flag);
    $nx_ret = fncSendMessage($nx_denbun, $nx_recv_msg, $denbun_id);
    //▲2011/2/14 #1253 WAO対応(EC-One hatano) $text_end_flagを引数に追加

	//エラー分岐
	if ($nx_ret != "0") {
		$denbun_result = $nx_ret;
	} else {
		//正常終了
		$denbun_result = 0;
		if (trim($nx_recv_msg) == "") {
			$denbun_msg = "";
		} else {
            //▼2010/08/24 #1253 WAO対応(EC-One hatano) デリミタ
			//$tmp_msg = explode(",",$nx_recv_msg);
            //▲2010/08/24 #1253 WAO対応(EC-One hatano) デリミタ
			// for ($i = 0; $i < count($tmp_msg); $i++) {
			// 	$denbun_msg[$i] = str_replace("，",",",trim($tmp_msg[$i]));
			// }
            $tmp_msg =$nx_recv_msg;
		}
	}
    //▼R-#31839_【H29-00284-01】メールオプトイン対応_WEB 2018/08/23 nul-fukunaga
	if ($kainno == '' &&
		($denbun_id == 'A240' ||  $denbun_id == 'A900' || $denbun_id == 'A910' || $denbun_id == 'A920' ))
		$kainno = $denbun_str[0];
    //▲R-#31839_【H29-00284-01】メールオプトイン対応_WEB 2018/08/23 nul-fukunaga
	fncDenbunLog($denbun_id, $nx_denbun, $denbun_msg, $nx_ret == "0" ? '1' : '0', $kainno);

	return $denbun_result;
}


Function fncDenbunLog($denbun_id, $send_data, $ret_data, $host_result, $kainno = "", $update_user = "")
{

	global $S_USERID;
	if ( $update_user == "" ) {
		$update_user = "Tool:" . $S_USERID;
	}

	$site_kbn_val = '1'; // PC用
	if(substr($denbun_id, 0, 1) == "B"){
		$site_kbn_val = '2'; // 携帯用
	}

    //▼2011/06/22 #1253 WAO対応(EC-One hatano) 注文電文のバイト数が4000byteを超えてしまったので、4000byte以上を切る
   /*  if (strlen($send_data) > 4000){
        $send_data = substr($send_data,0,4000);
    }
    if (strlen($ret_data) > 4000){
        $send_data = substr($ret_data,0,4000);
    } */
    //▲2011/06/22 #1253 WAO対応(EC-One hatano) 注文電文のバイト数が4000byteを超えてしまったので、4000byte以上を切る

    //▼R-#31839_【H29-00284-01】メールオプトイン対応_WEB 2018/08/23 nul-fukunaga
	if ( in_array(strtoupper($denbun_id), array('A240','A900','A910','A920'))) {
    //▲R-#31839_【H29-00284-01】メールオプトイン対応_WEB 2018/08/23 nul-fukunaga
		$sql = "INSERT INTO " . $Table_name ;
		$sql .= "(site_kbn,cust_no,send_dt_tm,session_id,session_get_dt_tm,core_sys_send_data,core_sys_rcv_data,core_sys_send_rslt_flg,update_date,register_date,update_user_cd,register_user_cd) ";
		$cols[] = getSqlValue($site_kbn_val);
		$cols[] = getSqlValue($kainno);
		$cols[] = 'current_timestamp(0)';
		$cols[] = 'NULL';
		$cols[] = 'current_timestamp(0)';
		$cols[] = $send_data; // Base64エンコード後：ceil(x/3)x4
                // if (is_array($ret_data)){
                //     $cols[] = getSqlValue(substr(implode('', $ret_data), 0, 2967)); // Base64エンコード後：ceil(x/3)x4
                // }else{
                //     $cols[] = getSqlValue(substr($ret_data, 0, 2967)); // Base64エンコード後：ceil(x/3)x4
		        // }
        $cols[] = $ret_data;
		$cols[] = getSqlValue($host_result);
		$cols[] = 'current_timestamp(0)';
		$cols[] = 'current_timestamp(0)';
		$cols[] = getSqlValue($update_user);
		$cols[] = getSqlValue($update_user);
		$sql .= 'VALUES('.implode(', ', $cols).')';
		$con_utl = dbConnect();
		$result = dbQuery($con_utl, $sql, true);
		if ($result !== false) {
			//dbCommit($con_utl);
			dbFreeResult($result);
		}
		dbClose($con_utl);
	} else {
		logDebug("warning: no save denbun_id=" . $denbun_id);
	}
}






Function fncSendMessage($send_data, &$recv_message, $denbun_id) {
//▲2011/2/14 #1253 WAO対応(EC-One hatano) $text_end_flagを引数に追加
logDebug(__FUNCTION__.' start');
    //▼#1253 WAO対応(EC-One hatano) ポート番号
	//global $SJIS_JB8, $CONNECT_IP, $CONNECT_PORT, $TIMEOUT;
    //global $SJIS_JB8, $CONNECT_IP, $CONNECT_PORT, $TIMEOUT, $WSDL_File_path;
    //▲#1253 WAO対応(EC-One hatano) ポート番号

	//▼HOST.LOGに出力する電文を暗号化 EC-One hatano
	//global $salt, $seed, $vector, $dec;
	//▲HOST.LOGに出力する電文を暗号化 EC-One hatano

	/* $p_err_number = 0;

    for($i=0; $i<35; $i++){
        $send_head_id[$i] = substr($send_data, $i, 1);
    }
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
    ); */

    //WSDLファイル
    $/* wsdl = $WSDL_File_path;
    $client = new SOAP_WSDL( $wsdl, array('timeout'=>$TIMEOUT) ); */

    //WSDLファイルの読み込みチェック
   /*  if ( $client->fault )
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
            logHost("【SEND】 " .  mb_convert_encoding($send_data, "SJIS-WIN"));
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

    
    if ($p_err_number == "0" || $denbun[17] == "0" ) {
		if (strlen( $denbun[21] ) > 0) {
			logHost("[P:" . $local_port . "] " . $denbun_id . " 【OK】");
		} else {
			logHost("[P:" . $local_port . "] " . $denbun_id . " 【ERROR】 Reception error (ErrorCd:". $denbun[17]. " ErrorMessage:". mb_convert_encoding($denbun[15],"SJIS-WIN","UTF-8"). ")");
		}
	}
    //▲2010/08/24 #1253 WAO対応(EC-One hatano) 切断機能コメント化

	logHost("【SEND】 " . mb_convert_encoding($send_data, "SJIS-WIN"));

    
    if (strlen( $denbun[21] ) > 0) {
		for ($i = 0; $i < strlen( $denbun[21] ); $i++) {
			$rcv_denbun_data_[$i] = ord(substr($denbun[21], $i , 1));
		}

		//logHost("【ACCEPT】 " . substr($denbun[21],0,35). fncDisplayHex( substr($denbun[21],36) ));
        logHost("【ACCEPT】 " .  mb_convert_encoding($denbun[21], "SJIS-WIN"));

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
	return $p_err_number; */
}

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


Function fncReturnMsgRead($denbun_id) {

	global $DENBUN_INC_PATH;

	$file_path = $DENBUN_INC_PATH . "/testJosnData.json";
	require_once($file_path);

    $data_results = file_get_contents($file_path);
	$folderJsonData = json_decode($data_results,true);

	$rcv_msg = $testJsonData[$denbun_id];
	// for ($i = 0; $i <= $DENBUN_DATA_COUNT; $i++) {
	// 	$rcv_msg[$i] = ${"DENBUN_DATA_" . $i};
	// }

	return $rcv_msg;
}




