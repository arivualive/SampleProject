<?php
	$d_id		= $my_func;

	//SQL文作成
	switch ($mode) {

		case 'delete':	//削除
			$m_id 		 = 2;
			$sql  = "UPDATE ";
			$sql .=		" DrinkDirectOrder_Tbl ";
			$sql .= " SET ";
			$sql .=		" delete_flg = '1', ";
			$sql .=		" sync_flg = '0', ";
			$sql .=		" update_user = ".getSqlValue("TOOL:".$S_USERID).", ";
			$sql .=		" update_dt = sysdate ";			
			$sql .=	" WHERE ";
			$sql .= 	" direct_order_id = ".getSqlValueNum($order_data['direct_order_id']);
			break;
	}

	//DB接続
	$con_utl = dbConnect();

	//SQL実行
	dbBegin($con_utl);
	$result = dbQuery($con_utl, $sql, true);
	if ($result) {
		dbCommit($con_utl);
		dbFreeResult($result);
	} else {
		dbRollback($con_utl);
		dbClose($con_utl);
		Header("Location:".$SYS_MESSAGE_URL."?m_id=3&d_id=".$d_id."&f_cd=".$FUNC_INFO[$my_func]['func_cd']);
		exit;
	}

	//DB切断
	dbClose($con_utl);

	//一覧へ戻る
	Header("Location:".$SYS_MESSAGE_URL."?m_id=".$m_id."&d_id=".$d_id."&f_cd=".$FUNC_INFO[$my_func]['func_cd']);
?>