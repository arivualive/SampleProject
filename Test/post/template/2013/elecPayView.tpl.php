<html>
<head>
<meta http-equiv="Content-Type" Content="text/html;charset=Shift_JIS">
<title>�y�d�q���ϒ��ׁz</title>
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
	�y�d�q���ϒ��ׁz
	<br /><br />
	<table class="tabel">
	<tr align="center">
			<th>���q�l�ԍ�</th>
			 <?if($view_data['kainno']=='00000000'): ?>
        		<td></td>
        	 <? else: ?>
				<td><?php echo $view_data['kainno']; ?></td>
      		 <? endif; ?>
		</tr>
		<tr align="center">
			<th>�����O</th>
			<td><?php echo $view_data['name']; ?></td>
		</tr>
		<tr align="center">
			<th>��������</th>
			<td><?php echo $view_data['orderDt']; ?></td>
		</tr>
		<tr align="center">
			<th>�d�b�ԍ�</th>
			<td><?php echo $view_data['telNo']; ?></td>
		</tr>
		<tr align="center">
			<th style="background-color: #49a9d4;">���ID</th>
			<td style="font-size:28px;font-weight:bold;"><?php echo $view_data['accessId']; ?></td>
		</tr>
		<tr align="center">
			<th>����p�X���[�h</th>
			<td><?php echo $view_data['accessPass']; ?></td>
		</tr>
		<tr align="center">
			<th>�I�[�_�[ID</th>
			<td><?php echo $view_data['orderId']; ?></td>
		</tr>
		<tr align="center">
			<th>Amazon�r�����O�A�O���[�����gID</th>
			 <?if($view_data['clrCorpCd']=='07'): ?>
        	<td><?php echo $view_data['paymentId']; ?></td>
        	 <? else: ?>
			<td></td>
      		 <? endif; ?>
		</tr>
	</table>
	<br /><br />
	<!-- ��R-#31129_�yH29-00071-01�z�J�[�h�ԍ���ێ��� 2018/05/28 nul-inagaki -->
	<p id="setIdPassword" style="display:none;"><?php echo join(array($denbunData['kainno'], $denbunData['telNo'], $denbunData['paymentType'], $denbunData['clrCorpCd'], $denbunData['orderDt'], $denbunData['accessId'], $denbunData['accessPass'], $denbunData['orderId'], $denbunData['paymentId'], $denbunData['totalOrderAmount']), ',');?></p>
	<div style="padding-left:170px;">
		<a href="#" onClick="window.close(); return false;" style="margin-right: 50px;">����</a>
		<input type="button" id="Copy_ID_PW" value="�d�q���Ϗ��R�s�[" onclick="getIdPass()">
	</div>
	<!-- ��R-#31129_�yH29-00071-01�z�J�[�h�ԍ���ێ��� 2018/05/28 nul-inagaki -->
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