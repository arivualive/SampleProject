<html>
<head>
<meta http-equiv="Content-Type" Content="text/html;charset=Shift_JIS">
<title>【電子決済調べ】</title>
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
	【電子決済調べ】
	<br /><br />
	<table class="tabel">
	<tr align="center">
			<th>お客様番号</th>
			 <?if($view_data['kainno']=='00000000'): ?>
        		<td></td>
        	 <? else: ?>
				<td><?php echo $view_data['kainno']; ?></td>
      		 <? endif; ?>
		</tr>
		<tr align="center">
			<th>お名前</th>
			<td><?php echo $view_data['name']; ?></td>
		</tr>
		<tr align="center">
			<th>注文日時</th>
			<td><?php echo $view_data['orderDt']; ?></td>
		</tr>
		<tr align="center">
			<th>電話番号</th>
			<td><?php echo $view_data['telNo']; ?></td>
		</tr>
		<tr align="center">
			<th style="background-color: #49a9d4;">取引ID</th>
			<td style="font-size:28px;font-weight:bold;"><?php echo $view_data['accessId']; ?></td>
		</tr>
		<tr align="center">
			<th>取引パスワード</th>
			<td><?php echo $view_data['accessPass']; ?></td>
		</tr>
		<tr align="center">
			<th>オーダーID</th>
			<td><?php echo $view_data['orderId']; ?></td>
		</tr>
		<tr align="center">
			<th>AmazonビリングアグリーメントID</th>
			 <?if($view_data['clrCorpCd']=='07'): ?>
        	<td><?php echo $view_data['paymentId']; ?></td>
        	 <? else: ?>
			<td></td>
      		 <? endif; ?>
		</tr>
	</table>
	<br /><br />
	<!-- ▼R-#31129_【H29-00071-01】カード番号非保持化 2018/05/28 nul-inagaki -->
	<p id="setIdPassword" style="display:none;"><?php echo join(array($denbunData['kainno'], $denbunData['telNo'], $denbunData['paymentType'], $denbunData['clrCorpCd'], $denbunData['orderDt'], $denbunData['accessId'], $denbunData['accessPass'], $denbunData['orderId'], $denbunData['paymentId'], $denbunData['totalOrderAmount']), ',');?></p>
	<div style="padding-left:170px;">
		<a href="#" onClick="window.close(); return false;" style="margin-right: 50px;">閉じる</a>
		<input type="button" id="Copy_ID_PW" value="電子決済情報コピー" onclick="getIdPass()">
	</div>
	<!-- ▲R-#31129_【H29-00071-01】カード番号非保持化 2018/05/28 nul-inagaki -->
</div>

</body>
</html>
<script>
// テキストコピー対応関数
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