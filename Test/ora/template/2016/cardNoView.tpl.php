<html>
<head>
<meta http-equiv="Content-Type" Content="text/html;charset=Shift_JIS">
<title>�J�[�h�ԍ�����</title>
<style type="text/css">
<!--

	.tabel{
		border-collapse: collapse;
	}
	.tabel th{
		padding: 6px;
		text-align: center;
		vertical-align: middle;
		color: #fff;
		background-color: #CFAEB2;
		border: 1px solid #000;
	}
	.tabel td{
		font-size:20px;
		padding: 6px;
		background-color: #fff;
		border: 1px solid #000;
		vertical-align: middle;
	}
	.selector01{
		border-top:1px solid #ccc;
		border-bottom:1px solid #ccc;
		background-color: #d6e9ca;
		padding: 5px 5px;
	}

-->
</style>
</head>
<body>
<div align="center">
	�y�J�[�h�ԍ����ׁz
	<br /><br />
	<table class="tabel">
		<tr align="center">
			<th>���q�l�ԍ�</th>
			<td><?php echo $view_data['kainno']; ?></td>
		</tr>
		<tr align="center">
			<th>�����O</th>
			<td><?php echo $view_data['name']; ?></td>
		</tr>
		<tr align="center">
			<th>��������</th>
			<td><?php echo $view_data['order_dt']; ?></td>
		</tr>
		<tr align="center">
			<th style="background-color: #49a9d4;">�J�[�h�ԍ�</th>
			<td style="font-size:28px;font-weight:bold;"><?php echo $view_data['card_no']; ?></td>
		</tr>
		<tr align="center">
			<th>�J�[�h�L������</th>
			<td><?php echo $view_data['card_term']; ?></td>
		</tr>
		<tr align="center">
			<th>�J�[�hID</th>
			<td><?php echo $view_data['kaiin_id']; ?></td>
		</tr>
		<tr align="center">
			<th>�J�[�hPW</th>
			<td><?php echo $view_data['kaiin_pass']; ?></td>
		</tr>
	</table>
	<br /><br />
	<p id="setIdPassword" style="display:none;"><?php echo join(array($view_data['kainno'], $view_data['tel_no'], $view_data['clr_corp_cd'], $view_data['kaiin_id'], $view_data['kaiin_pass'], $view_data['card_seq'], '0', $view_data['card_no'], $view_data['card_term'], $view_data['payment_num']), ',');?></p>
	<div style="padding-left:170px;">
		<a href="#" onClick="window.close(); return false;" style="margin-right: 50px;">����</a>
		<input type="button" id="Copy_ID_PW" value="�J�[�h���R�s�[" onclick="getIdPass()">
	</div>
</div>

</body>
</html>
<script>
// �e�L�X�g�R�s�[�Ή��֐�
function getIdPass() {
		var input = document.createElement("input");
		document.body.appendChild(input);
		input.value = document.getElementById("setIdPassword").innerHTML;
		input.select();
		document.execCommand("copy");
		input.style.display = "none";
		input.remove();
	}
</script>