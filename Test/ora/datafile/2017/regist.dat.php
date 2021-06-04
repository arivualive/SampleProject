<?php
	$d_id		= $my_func;

	//SQL•¶ì¬
	switch ($mode) {

		case 'delete':	//íœ
			$m_id 		 = 2;
			$sql  = "UPDATE ";
			$sql .=		" HalfDirectOrder_Tbl ";
			$sql .= " SET ";
			$sql .=		" delete_flg = '1', ";
			$sql .=		" sync_flg = '0', ";
			$sql .=		" update_user = ".getSqlValue("TOOL:".$S_USERID).", ";
			$sql .=		" update_dt = sysdate ";			
			$sql .=	" WHERE ";
			$sql .= 	" direct_order_id = ".getSqlValueNum($order_data['direct_order_id']);
			break;
	}

	//DBÚ‘±
	$con_utl = dbConnect();

	//SQLŽÀs
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

	//DBØ’f
	dbClose($con_utl);

	//ˆê——‚Ö–ß‚é
	Header("Location:".$SYS_MESSAGE_URL."?m_id=".$m_id."&d_id=".$d_id."&f_cd=".$FUNC_INFO[$my_func]['func_cd']);
?>