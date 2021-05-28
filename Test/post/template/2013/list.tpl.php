<?php
	ini_set('error_reporting',E_ALL);
	function getSel($a, $b) {return $a === $b ? 'selected="selected"' : '';}
?>
<?php /** 上半分の検索エリア */ ?>
<form name="list" method="post" action="list.php">
	<input type="hidden" value="find" name="mode">
	<table border="0">
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>請求日</td>
			<td colspan="2">
				<select name="s_yy">
					<option value=""></option>
					<? for ($i = date('Y'); $i >= 2003; $i--): ?><option value="<?=$i?>" <?=getSel(''.$i, $s_yy)?>><?=$i?></option><? endfor; ?>
				</select>年
				<select name="s_mm">
					<option value=""></option>
					<? for ($i = 1; $i <= 12; $i++):?><option value="<?=sprintf('%02d',$i)?>" <?=getSel(sprintf('%02d',$i), $s_mm)?>><?=$i?></option><? endfor; ?>
				</select>月
				<select name="s_dd">
					<option value=""></option>
					<? for ($i = 1; $i <= 31; $i++): ?><option value="<?=sprintf('%02d',$i)?>" <?=getSel(sprintf('%02d',$i), $s_dd)?>><?=$i?></option><? endfor; ?>
				</select>日
				～
				<select name="e_yy">
					<option value=""></option>
					<? for ($i = date('Y'); $i >= 2003; $i--): ?><option value="<?=$i?>" <?=getSel(''.$i, $e_yy)?>><?=$i?></option><? endfor; ?>
				</select>年
				<select name="e_mm">
					<option value=""></option>
					<?for ($i = 1; $i <= 12; $i++): ?><option value="<?=sprintf('%02d',$i)?>" <?=getSel(sprintf('%02d',$i), $e_mm)?>><?=$i?></option><? endfor; ?>
				</select>月
				<select name="e_dd">
					<option value=""></option>
					<?for ($i = 1; $i <= 31; $i++): ?><option value="<?=sprintf('%02d',$i)?>" <?=getSel(sprintf('%02d',$i), $e_dd)?>><?=$i?></option><? endfor; ?>
				</select>日
			</td>
		</tr>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>会員番号</td>
			<td colspan="2"><input type="text" size="24" maxlength="8" autocomplete="off" name="kainno" value="<?= getHtmlEscapedString($kainno) ?>"></td>
		</tr>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>お名前</td>
			<td colspan="2"><input type="text" size="24" maxlength="30" autocomplete="off" name="kain_name" value="<?= getHtmlEscapedString($kain_name) ?>"></td>
		</tr>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>電話番号</td>
			<td colspan="2"><input type="text" size="24" maxlength="13" autocomplete="off" name="tel_no" value="<?= getHtmlEscapedString($tel_no) ?>"></td>
		</tr>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>Eメールアドレス</td>
			<td colspan="2"><input type="text" size="40" maxlength="100" autocomplete="off" name="email" value="<?= getHtmlEscapedString($email) ?>"></td>
		</tr>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>状況</td>
			<td>
				<input type="checkbox" name="order_status[]" value="0" <?= in_array('0', $order_status) ? "checked" : "" ?>>無し&nbsp;&nbsp;&nbsp;&nbsp;
				<?php //▼R-#13002 WEB管理ツールのS請求・注文の状態表示変更対応 2014/01/28 uls-soga ?>
				<input type="checkbox" name="order_status[]" value="1" <?= in_array('1', $order_status) ? "checked" : "" ?>>JU&nbsp;&nbsp;&nbsp;&nbsp;
				<?php //▲R-#13002 WEB管理ツールのS請求・注文の状態表示変更対応 2014/01/28 uls-soga ?>
				<input type="checkbox" name="order_status[]" value="2" <?= in_array('2', $order_status) ? "checked" : "" ?>>J&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="order_status[]" value="9" <?= in_array('9', $order_status) ? "checked" : "" ?>>キャンセル
			</td>
		</tr>
		<?php // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>注文状態指定</td>
			<td nowrap>
				<label for="change_kbn"><input type="radio" name="change_kbn" value="1" id="change_kbn" <?=$change_kbn_chkd1;?>/>注文変更</label>&nbsp;&nbsp;&nbsp;&nbsp;
				<label for="change_kbn_cancel"><input type="radio" name="change_kbn" value="2" id="change_kbn_cancel" <?=$change_kbn_chkd2;?>/>キャンセル</label>
			</td>
		</tr>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>サイト区分</td>
			<td>		
				<input type="checkbox" name="site_kbn[]" value="1" <?= in_array('1', $site_kbn) ? "checked" : "" ?>>PC・SP&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="site_kbn[]" value="2" <?= in_array('2', $site_kbn) ? "checked" : "" ?>>携帯&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="site_kbn[]" value="3" <?= in_array('3', $site_kbn) ? "checked" : "" ?>>アプリ
			</td>
		</tr>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>入力区分</td>
			<td>
				<input type="checkbox" name="net_ij_kbn[]" value="1" <?= in_array('1', $net_ij_kbn) ? "checked" : "" ?>>オート&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="net_ij_kbn[]" value="2" <?= in_array('2', $net_ij_kbn) ? "checked" : "" ?>>マニュアル
			</td>
		</tr>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>区分</td>
			<td>
				<input type="checkbox" name="order_kbn[]" value="1" <?= in_array('1', $order_kbn) ? "checked" : "" ?>>化粧品&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="order_kbn[]" value="2" <?= in_array('2', $order_kbn) ? "checked" : "" ?>>漢方
			</td>
		</tr>
		<tr>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>ログイン状態</td>
			<td>
				<input type="checkbox" name="login_status[]" value="1" <?= in_array('1', $login_status) ? "checked" : "" ?>>ログイン&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="login_status[]" value="2" <?= in_array('2', $login_status) ? "checked" : "" ?>>即ログイン&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="login_status[]" value="3" <?= in_array('3', $login_status) ? "checked" : "" ?>>ゲスト
			</td>
		</tr>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>注文形態</td>
			<td>		
				<input type="checkbox" name="odr_form[]" value="1" <?= in_array('1', $odr_form) ? "checked" : "" ?>>通常&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="odr_form[]" value="2" <?= in_array('2', $odr_form) ? "checked" : "" ?>>ギフト&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="odr_form[]" value="3" <?= in_array('3', $odr_form) ? "checked" : "" ?>>定期&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="odr_form[]" value="4" <?= in_array('4', $odr_form) ? "checked" : "" ?>>定期含&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
		<?php //Web管理システムツール 開発　2021/05/12 START?>
		<?php // ▼R41505【R02-0212-001】Ｗｅｂサイトで注文変更機能追加簡易Ver 2020/09/15 chinhhv-ssv ?>
		<!-- <tr>
			<td class="xxtNormalBlackTitle" nowrap>注文状態指定</td>
			<td>
				<input type="checkbox" name="change_kbn[]" value="1" <?= in_array('1', $change_kbn) ? "checked" : "" ?>>注文変更&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="change_kbn[]" value="0" <?= in_array('0', $change_kbn) ? "checked" : "" ?>>注文キャンセル&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
		<?php // ▲R41505【R02-0212-001】Ｗｅｂサイトで注文変更機能追加簡易Ver 2020/09/15 chinhhv-ssv ?>
		<?php //▼R-#20773_ドモアプリ開発 2016/03/15 nul-kai ?>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>サイト区分</td>
			<td nowrap>
				<label for="sitekbn_pc"><input type="radio" name="sitekbn" value="1" id="sitekbn_pc" <?=$site_kbn_chkd1;?>/>PC・SP</label>
				<label for="sitekbn_mbl"><input type="radio" name="sitekbn" value="2" id="sitekbn_mbl" <?=$site_kbn_chkd2;?>/>携帯</label>
				<label for="sitekbn_ap"><input type="radio" name="sitekbn" value="3" id="sitekbn_ap" <?=$site_kbn_chkd3;?>/>アプリ</label>
				<label for="sitekbn_both"><input type="radio" name="sitekbn" value="0" id="sitekbn_both" <?=$site_kbn_chkd0;?>/>すべて</label>
			</td>
		</tr>
		<?php //▲R-#20773_ドモアプリ開発 2016/03/15 nul-kai ?>
		<?php //▼2009/10/07 #xxx ネット注文自動化対応（kdl yoshii） ?>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>入力区分</td>
			<td nowrap>
				<label for="NET_IJ_KBN_AUTO"><input type="radio" name="NET_IJ_KBN" value="1" id="NET_IJ_KBN_AUTO" <?=$net_ij_kbn_chkd1;?>/>オート</label>
				<label for="NET_IJ_KBN_MANU"><input type="radio" name="NET_IJ_KBN" value="2" id="NET_IJ_KBN_MANU" <?=$net_ij_kbn_chkd2;?>/>マニュアル</label>
				<label for="NET_IJ_KBN_BOTH"><input type="radio" name="NET_IJ_KBN" value="0" id="NET_IJ_KBN_BOTH" <?=$net_ij_kbn_chkd0;?>/>両方</label>
			</td>
		</tr>
		<?php //▲2009/10/07 #xxx ネット注文自動化対応（kdl yoshii） ?>
		<?php // ▼R-#39403_【H31-0380-001】長白仙参リニューアル（WEB） 2020/01/31 sai-shiragiku ?>
		<tr>
			<td class="xxtNormalBlackTitle" nowrap>区分</td>
			<td>
				<input type="checkbox" name="order_kbn[]" value="1" <?= in_array('1', $order_kbn) ? "checked" : "" ?>>化粧品
				<input type="checkbox" name="order_kbn[]" value="2" <?= in_array('2', $order_kbn) ? "checked" : "" ?>>漢方
			</td>
		</tr> -->
		<?php // ▲R-#39403_【H31-0380-001】長白仙参リニューアル（WEB） 2020/01/31 sai-shiragiku ?>
		<?php // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<tr>
			<td colspan="3">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="検索" onclick="return ListChk()">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="クリア" onclick="return ClearAction()">
			</td>
		</tr>
	</table>
</form>
<hr>
<?php /** 下半分の検索結果エリア */ ?>
<font size="-1" color="black">件数： <?= $rows ?> 件 </font>
<br>
<?php if ($err_message !== ''): ?><?= $err_message; ?><?php else: ?>
<table>
	<tr align="center" class="ListTitle">
		<td nowrap>No.</td>
		<td nowrap>日付</td>
		<?php // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<td nowrap>ログイン状態</td>
		<td nowrap>注文形態</td>
		<?php // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<td nowrap>会員番号</td>
		<td nowrap>お名前</td>
		<td nowrap>入力区分</td>
		<td nowrap>マニュアル理由</td>
		<?php /*▼R-#35174_【H30-0356-001】山本寛斎限定4点セット_WEB 2019/02/01 nul-nagata*/ ?>
		<?php // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<?php //<td nowrap>カード</td> ?>
		<?php // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<?php /*▲R-#35174_【H30-0356-001】山本寛斎限定4点セット_WEB 2019/02/01 nul-nagata*/ ?>
		<td nowrap>状況</td>
		<td nowrap>HOST</td>
		<?php /*▼2012/03/13 R-#3125 贈り物Web対応 uls-motoi*/ ?>
		<td nowrap>受票<br>注文</td>
		<td nowrap>受票<br>ギフト</td>
		<?php /*▲2012/03/13 R-#3125 贈り物Web対応 uls-motoi*/ ?>
		<?php // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<td nowrap>カード</td>
		<td nowrap>Pay払い</td>
		<td nowrap>区分</td>
		<?php // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<?php // ▼R41505【R02-0212-001】Ｗｅｂサイトで注文変更機能追加簡易Ver 2020/09/15 chinhhv-ssv ?>
		<?php // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<td nowrap>WEB注文変更キャンセル</td>
		<?php // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<td nowrap>支払変更カード</td>
		<?php // ▲R41505【R02-0212-001】Ｗｅｂサイトで注文変更機能追加簡易Ver 2020/09/15 chinhhv-ssv ?>
		<td nowrap>電話番号</td>
		<td nowrap>Eメールアドレス</td>
		<?php // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<?php // <td nowrap>購入金額</td> ?>
		<?php // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<td nowrap>サイト</td>
		<? if ($AUTH_DELETE_FLG):?>
		<td width="40" nowrap>削除</td>
		<? endif; ?>
		<?php /*▼2011/10/20 R-#2024 【管理ツール】注文受付電文の再送機能実装（EC-One hatano）*/ ?>
		<? if ($AUTH_DELETE_FLG && $order_data[$rows] > 0):?>
		<td width="80" nowrap>電文再送</td>
		<? endif; ?>
		<?php /*▲2011/10/20 R-#2024 【管理ツール】注文受付電文の再送機能実装（EC-One hatano）*/ ?>
		<?php // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
		<?php // <td nowrap>予約区分</td> ?>
		<?php // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（次世代のための画面改修）2021/05/20 jst-arivazhagan  ?>
	</tr>
	<?php for ($i = 0; $i < $rows; $i++): ?>
		<?php
			//▼R-#20773_ドモアプリ開発 2016/03/16 nul-kai
			//if($order_data[$i]['route_kbn'] == '03'){$css = $h->css_tablecolor($i, '3');}else{$css = $h->css_tablecolor($i, $order_data[$i]['site_kbn']);}
			//▲R-#20773_ドモアプリ開発 2016/03/16 nul-kai
			$login_status_str = '';
			if ($order_data[$i]['mbr_kbn'] == '0' || $order_data[$i]['mbr_kbn'] == '9')
				$login_status_str = '即ログイン';
			else if ($order_data[$i]['mbr_kbn'] == '2')
				$login_status_str = 'ログイン';
			else if ($order_data[$i]['login_cd'] == '' )
				$login_status_str = 'ゲスト';

			$odr_form_str = '';
			if ($order_data[$i]['gift_flg'] == '0')
				$odr_form_str = '通常';
			else if ($order_data[$i]['gift_flg'] == '1')
				$odr_form_str = 'ギフト';
			else if ($order_data[$i]['regular_buy_odr_seq'] != '' )
				$odr_form_str = '定期';
			else if ($order_data[$i]['gift_flg'] == '0' && $order_data[$i]['regular_buy_odr_seq'] != '' )
				$odr_form_str = '定期含';
			
			$order_status_str = '';
			switch ($order_data[$i]['order_status']) {
				case 0:        $order_status_str = ''; break;
				//▼R-#13002 WEB管理ツールのS請求・注文の状態表示変更対応 2014/01/28 uls-soga
				case 1:        $order_status_str = 'JU'; break;
				//▲R-#13002 WEB管理ツールのS請求・注文の状態表示変更対応 2014/01/28 uls-soga
				case 2:        $order_status_str = 'J'; break;
				case 9:        $order_status_str = 'キャ'; break;
			}
			
			
			$host_str = null;
			if ($order_data[$i]['host_flg'] == '1')
				if ($order_data[$i]['print_flg'] == '9')
					$host_str = '◎';
				else
					$host_str = '○';
			else if ($order_data[$i]['host_flg'] == '0')
				$host_str = '×';
			else
				$host_str = '';
			
			
			
			//▼2011/08/23 A-05825 【進DW】9月22日開始商品リニューアル対応（EC-One hatano）
			// $reserve_kbn_str = '';
			// switch ($order_data[$i]['reserve_kbn']){
			// 	case '1':
			// 	case '2':
			// 	$reserve_kbn_str = '予約注文';
			// 	break;
			// 	default:
			// 		$reserve_kbn_str = '';
			// 	break;
			// }
			//▲2011/08/23 A-05825 【進DW】9月22日開始商品リニューアル対応（EC-One hatano）

			$odr_kbn_str = null;
			if ($order_data[$i]['cosme_flg'] == '1' && $order_data[$i]['herb_flg']== '0')
					$odr_kbn_str = '化粧品';
			else if ($order_data[$i]['cosme_flg'] == '0' && $order_data[$i]['herb_flg']== '1')
				$odr_kbn_str = '漢方';
			else if ($order_data[$i]['cosme_flg'] == '1' && $order_data[$i]['herb_flg']== '1')
				$odr_kbn_str = '化漢';
		?>
		<tr class="<?php echo $h->h($css) ?>">
			<form name="frm<?= $i?>" action="cardNoView.php" method="post" target="_blank">
				<input type="hidden" name="name" value="<?= $order_data[$i]['kain_name']?>">
				<input type="hidden" name="orderDt" value="<?= $order_data[$i]['order_dt']?>">
				<input type="hidden" name="telNo" value="<?= $order_data[$i]['tel_no']?>">
				<input type="hidden" name="cardNo" value="<?= $order_data[$i]['cc_no']?>">
				<input type="hidden" name="cardTerm" value="<?= $order_data[$i]['cc_term']?>">
				<input type="hidden" name="cardName" value="<?= $order_data[$i]['cc_name']?>">
				<input type="hidden" name="kaiinId" value="<?= $order_data[$i]['kaiin_id']?>">
				<input type="hidden" name="kaiinPass" value="<?= $order_data[$i]['kaiin_pass']?>">
			</form>
			
			<?php // ▼R-#43112_【R02-0028-119】不具合対応（事象解消）_注文変更で支払方法を代引からカードに変更された場合にオーソリ取得しないはずが、オーソリ取得されている 2020/11/18 saisys-hasegawa ?>
			<form name="frmchange<?= $i?>" action="cardNoView.php" method="post" target="_blank">
				<input type="hidden" name="name"       value="<?= $order_data[$i]['kain_name']?>">
				<input type="hidden" name="orderDt"    value="<?= $order_data[$i]['order_change_dt']?>">
				<input type="hidden" name="telNo"      value="<?= $order_data[$i]['tel_no']?>">
				<input type="hidden" name="cardNo"     value="<?= $order_data[$i]['change_cc_no']?>">
				<input type="hidden" name="cardTerm"   value="<?= $order_data[$i]['change_cc_term']?>">
				<input type="hidden" name="cardName"   value="<?= $order_data[$i]['change_cc_name']?>">
				<input type="hidden" name="kaiinId"    value="<?= $order_data[$i]['change_kaiin_id']?>">
				<input type="hidden" name="kaiinPass"  value="<?= $order_data[$i]['change_kaiin_pass']?>">
			</form>
			<?php // ▲R-#43112_【R02-0028-119】不具合対応（事象解消）_注文変更で支払方法を代引からカードに変更された場合にオーソリ取得しないはずが、オーソリ取得されている 2020/11/18 saisys-hasegawa ?>
			
			<form name="frmchange<?= $i?>" action="payInfoView.php" method="post" target="_blank">
				<input type="hidden" name="kainno"     value="<?= $order_data[$i]['kainno']?>">
				<input type="hidden" name="name"       value="<?= $order_data[$i]['kain_name']?>">
				<input type="hidden" name="orderDt"    value="<?= $order_data[$i]['order_change_dt']?>">
				<input type="hidden" name="telNo"      value="<?= $order_data[$i]['tel_no']?>">
				<input type="hidden" name="cardNo"     value="<?= $order_data[$i]['trace_cd']?>">
				<input type="hidden" name="cardTerm"   value="<?= $order_data[$i]['trace_pwd']?>">
				<input type="hidden" name="cardName"   value="<?= $order_data[$i]['order_cd']?>">
				<input type="hidden" name="kaiinId"    value="<?= $order_data[$i]['e_pay_account_cd']?>">
			</form>

			<td nowrap align="right"><?= $i + 1 ?></td>
			<!-- <td nowrap align="center"><?= $order_data[$i]['order_dt'] ?></td>
			<td nowrap><?= $order_data[$i]['kainno'] ?></td>
			<td nowrap><?= $order_data[$i]['kain_name'] ?></td>
			<td nowrap><?= $order_data[$i]['net_ij'] ?></td>
			<td nowrap><?= $order_data[$i]['net_ij_info'] ?></td> -->
			<?php /*▼R-#35174_【H30-0356-001】山本寛斎限定4点セット_WEB 2019/02/01 nul-nagata*/ ?>
			<?php /* <td nowrap align="center">
				<?php if ($order_data[$i]['cc_no'] != '' || $order_data[$i]['kaiin_id'] != '') { ?>
					<a href="javascript:void(0)" onClick="viewCardNo(document.frm<?= $i?>)">表示</a>
				<?php } else { ?>
					&nbsp;
				<?php } ?>
			</td> */ ?>
			<?php /*▲R-#35174_【H30-0356-001】山本寛斎限定4点セット_WEB 2019/02/01 nul-nagata*/ ?>
			<?php /* <td nowrap align="center"><?= $order_status_str ?></td>
			<td nowrap align="center"><?= $host_str ?></td>
			<?php /*▼2012/03/13 R-#3125 贈り物Web対応 uls-motoi*/
				// RecvOrder_tblのGIFT_FLGを見て、受表のアイコンを出力場所を
			?>
			<?php /* <td nowrap align="center">
				<? if ($order_data[$i]['gift_flg'] == '0'): ?>
					<a href="orderSheet.php?recv_order_id=<?= $order_data[$i]['recv_order_id']?>&gift_flg=<?= $order_data[$i]['gift_flg'] ?>&name=&kana=mail=" target="_blank">
						<img src="/img/pdf.gif" width="16" height="16" border="0">
					</a>
				<? endif; ?>
			</td>
			<td nowrap align="center">
				<? if ($order_data[$i]['gift_flg'] == '1'): ?>
					<a href="orderSheet.php?recv_order_id=<?= $order_data[$i]['recv_order_id']?>&gift_flg=<?= $order_data[$i]['gift_flg'] ?>&name=&kana=mail=" target="_blank">
						<img src="/img/pdf.gif" width="16" height="16" border="0">
					</a>
				<? endif; ?>
			</td>
			<?php /*▲2012/03/13 R-#3125 贈り物Web対応 uls-motoi*/ ?>
			<?php /* <td nowrap align="center"><a href="logView.php?session_id=<?= $order_data[$i]['session_id']?>&log=order&site_kbn=<?= $order_data[$i]['site_kbn'] ?>" target="logview"><img src="/img/log.gif" width="13" height="16" border="0"></a></td>
			<?php // ▼R41505【R02-0212-001】Ｗｅｂサイトで注文変更機能追加簡易Ver 2020/09/15 chinhhv-ssv ?>
			<td nowrap>
				<?php if ($order_data[$i]['change_kbn'] == '0') { ?>
					注文キャンセル
				<?php } else if($order_data[$i]['change_kbn'] == '1') { ?>
					注文変更
				<?php } else { ?>
					&nbsp;
				<?php } ?>
			</td>
			<td nowrap align="center">
				<?php // ▼R-#43112_【R02-0028-119】不具合対応（事象解消）_注文変更で支払方法を代引からカードに変更された場合にオーソリ取得しないはずが、オーソリ取得されている 2020/11/18 saisys-hasegawa ?>
				<?php if ($order_data[$i]['change_kaiin_id'] != '') { ?>
					<a href="javascript:void(0)" onClick="viewCardNo(document.frmchange<?= $i?>)">表示</a>
				<?php } else { ?>
					&nbsp;
				<?php } ?>
				<?php // ▲R-#43112_【R02-0028-119】不具合対応（事象解消）_注文変更で支払方法を代引からカードに変更された場合にオーソリ取得しないはずが、オーソリ取得されている 2020/11/18 saisys-hasegawa ?>
			</td>
			<?php // ▲R41505【R02-0212-001】Ｗｅｂサイトで注文変更機能追加簡易Ver 2020/09/15 chinhhv-ssv ?>
			<td nowrap><?= $order_data[$i]['tel_no'] ?></td>
			<td nowrap><?= $order_data[$i]['email']?></td>
			<td nowrap align="right"><?= $order_data[$i]['sum_price']?></td>
			<td nowrap align="center"><?= $order_data[$i]['site_kbn_nm'] ?></td>
			<? if ($AUTH_DELETE_FLG): ?>
				<td nowrap align="center">
					<a href="regist.php?mode=delete&recv_order_id=<?= $order_data[$i]['recv_order_id'] ?>" onClick="return DeleteChk(<?= $i + 1 ?>, '<?= $order_data[$i]['kain_name'] ?>');">削除</a>
				</td>
			<? endif; ?>
			<?php /*▼2011/10/20 R-#2024 【管理ツール】注文受付電文の再送機能実装（EC-One hatano）*/ ?>
			<?php /* <? if ($AUTH_DELETE_FLG && $order_data[$rows] > 0 && $order_data[$i]['denbun_send'] == '1'): ?>
				<td nowrap align="center">
					<a href="regist.php?mode=denbun_send&recv_order_id=<?= $order_data[$i]['recv_order_id'] ?>" onClick="return DenbunSendChk(<?= $i + 1 ?>, '<?= $order_data[$i]['kain_name'] ?>');">電文再送</a>
				</td>
			<? elseif ($AUTH_DELETE_FLG && $order_data[$rows] > 0): ?>
				<td nowrap align="center"></td>
			<? endif; ?>
			<?php /*▲2011/10/20 R-#2024 【管理ツール】注文受付電文の再送機能実装（EC-One hatano）*/ ?>
			<?php /* <td nowrap align="center"><?= $reserve_kbn_str ?></td> */ ?> 
			<td nowrap align="center"><?= $order_data[$i]['order_dt'] ?>
			<td nowrap align="center"><?= $login_status_str ?></td>
			<td nowrap align="center"><?= $odr_form_str ?></td>
			<td nowrap><?= $order_data[$i]['kainno'] ?></td>
			<td nowrap><?= $order_data[$i]['kain_name'] ?></td>
			<td nowrap><?= $order_data[$i]['net_ij'] ?></td>
			<td nowrap><?= $order_data[$i]['net_ij_info'] ?></td>
			<td nowrap align="center"><?= $order_status_str ?></td>
			<td nowrap align="center"><?= $host_str ?></td>
			<td nowrap align="center">
				<? if ($order_data[$i]['gift_flg'] == '0'): ?>
					<a href="orderSheet.php?recv_order_id=<?= $order_data[$i]['recv_order_id']?>&gift_flg=<?= $order_data[$i]['gift_flg'] ?>&name=&kana=mail=" target="_blank">
						<img src="/img/pdf.gif" width="16" height="16" border="0">
					</a>
				<? endif; ?>
			</td>
			<td nowrap align="center">
				<? if ($order_data[$i]['gift_flg'] == '1'): ?>
					<a href="orderSheet.php?recv_order_id=<?= $order_data[$i]['recv_order_id']?>&gift_flg=<?= $order_data[$i]['gift_flg'] ?>&name=&kana=mail=" target="_blank">
						<img src="/img/pdf.gif" width="16" height="16" border="0">
					</a>
				<? endif; ?>
			</td>
			<td nowrap align="center">
				<?php if ($order_data[$i]['cc_no'] != '' || $order_data[$i]['kaiin_id'] != '') { ?>
					<a href="javascript:void(0)" onClick="viewCardNo(document.frm<?= $i?>)">表示</a>
				<?php } else { ?>
					&nbsp;
				<?php } ?>
			</td>
			<td nowrap align="center">
				<?php if ($order_data[$i]['e_pay_account_cd'] != '' || $order_data[$i]['kainno'] != '') { ?>
					<a href="javascript:void(0)" onClick="viewCardNo(document.frm<?= $i?>)">表示</a>
				<?php } else { ?>
					&nbsp;
				<?php } ?>
			</td>
			<td nowrap align="center"><?= $odr_kbn_str ?></td>
			<td nowrap>
				<?php if ($order_data[$i]['change_kbn'] == '0') { ?>
					注文キャンセル
				<?php } else if($order_data[$i]['change_kbn'] == '1') { ?>
					注文変更
				<?php } else { ?>
					&nbsp;
				<?php } ?>
			</td>
			<td nowrap align="center">
				<?php // ▼R-#43112_【R02-0028-119】不具合対応（事象解消）_注文変更で支払方法を代引からカードに変更された場合にオーソリ取得しないはずが、オーソリ取得されている 2020/11/18 saisys-hasegawa ?>
				<?php if ($order_data[$i]['change_kaiin_id'] != '') { ?>
					<a href="javascript:void(0)" onClick="viewCardNo(document.frmchange<?= $i?>)">表示</a>
				<?php } else { ?>
					&nbsp;
				<?php } ?>
				<?php // ▲R-#43112_【R02-0028-119】不具合対応（事象解消）_注文変更で支払方法を代引からカードに変更された場合にオーソリ取得しないはずが、オーソリ取得されている 2020/11/18 saisys-hasegawa ?>
			</td>
			<td nowrap><?= $order_data[$i]['tel_no'] ?></td>
			<td nowrap><?= $order_data[$i]['email']?></td>
			<td nowrap align="center"><?= $order_data[$i]['site_kbn_nm'] ?></td>
			<? if ($AUTH_DELETE_FLG): ?>
				<td nowrap align="center">
					<a href="regist.php?mode=delete&recv_order_id=<?= $order_data[$i]['recv_order_id'] ?>" onClick="return DeleteChk(<?= $i + 1 ?>, '<?= $order_data[$i]['kain_name'] ?>');">削除</a>
				</td>
			<? endif; ?>
			<?php /*▼2011/10/20 R-#2024 【管理ツール】注文受付電文の再送機能実装（EC-One hatano）*/ ?>
			<? if ($AUTH_DELETE_FLG && $order_data[$rows] > 0 && $order_data[$i]['denbun_send'] == '1'): ?>
				<td nowrap align="center">
					<a href="regist.php?mode=denbun_send&recv_order_id=<?= $order_data[$i]['recv_order_id'] ?>" onClick="return DenbunSendChk(<?= $i + 1 ?>, '<?= $order_data[$i]['kain_name'] ?>');">電文再送</a>
				</td>
			<? elseif ($AUTH_DELETE_FLG && $order_data[$rows] > 0): ?>
				<td nowrap align="center"></td>
			<? endif; ?>
		</tr>
	<?php endfor; ?>
</table>
<br>
<hr>
<?php endif; ?>
<script>
// カード番号調べ画面表示
function viewCardNo(formNo){formNo.submit();}
</script>