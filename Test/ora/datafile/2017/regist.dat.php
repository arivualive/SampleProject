<?php
	$d_id		= $my_func;

	//SQL���쐬
	switch ($mode) {

		case 'delete':	//�폜
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

	//DB�ڑ�
	$con_utl = dbConnect();

	//SQL���s
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

	//DB�ؒf
	dbClose($con_utl);

	//�ꗗ�֖߂�
	Header("Location:".$SYS_MESSAGE_URL."?m_id=".$m_id."&d_id=".$d_id."&f_cd=".$FUNC_INFO[$my_func]['func_cd']);
?>