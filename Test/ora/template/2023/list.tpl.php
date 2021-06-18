<?php
ini_set('error_reporting',E_ALL);
function getSel($a, $b) {
    return $a === $b ? 'selected="selected"' : '';
}
?>

<?php for ($i = 0; $i < $rows; $i++){ ?>
 	<?php //��R-#41516_�yR02-0214-001�z�V�K�L���b�V�����X���ϓ���_WEB 2020/07/13 jast-nghiem ?>
    <?php if ($order_data[$i]['elecpay_epaymenthistory_id'] != ''): ?>
    <!-- ���ϕ��@ �d�q����  -->
    <form name="frm<?= $i?>" action="elecPayView.php" method="post" target="_blank">
      <input type="hidden" name="kainno" value="<?= $order_data[$i]['kainno']?>">
      <input type="hidden" name="name" value="<?= $order_data[$i]['kain_name']?>">
      <input type="hidden" name="telNo" value="<?= $order_data[$i]['tel_no']?>">
      <input type="hidden" name="orderDt" value="<?= $order_data[$i]['order_dt']?>">
      <input type="hidden" name="accessId" value="<?= $order_data[$i]['elecpay_access_id']?>">
      <input type="hidden" name="accessPass" value="<?= $order_data[$i]['elecpay_access_pass']?>">
      <input type="hidden" name="orderId" value="<?= $order_data[$i]['elecpay_order_id']?>">
      <input type="hidden" name="paymentId" value="<?= $order_data[$i]['elecpay_epayment_id']?>">
      <input type="hidden" name="clrCorpCd" value="<?= $order_data[$i]['elecpay_clr_corp_cd']?>">
      <input type="hidden" name="paymentType" value="<?= $order_data[$i]['payment_type']?>">
      <input type="hidden" name="totalOrderAmount" value="<?= $order_data[$i]['order_amount']?>">
    </form>
    <?php else: ?>
    <?php //��R-#41516_�yR02-0214-001�z�V�K�L���b�V�����X���ϓ���_WEB 2020/07/13 jast-nghiem ?>
    <form name="frm<?= $i?>" action="cardNoView.php" method="post" target="_blank">
      <input type="hidden" name="kainno" value="<?= $order_data[$i]['kainno']?>">
      <input type="hidden" name="name" value="<?= $order_data[$i]['kain_name']?>">
      <input type="hidden" name="orderDt" value="<?= $order_data[$i]['order_dt']?>">
      <input type="hidden" name="cardNo" value="<?= $order_data[$i]['cc_no']?>">
      <input type="hidden" name="cardTerm" value="<?= $order_data[$i]['cc_term']?>">
    
    <?php //��R-#33770_�yH29-00071-15�zWEB�Ǘ��c�[���i�����������j�Ƀf�[�^�R�s�[�@�\���� 2018/06/16 nul-nagata ?>
      <input type="hidden" name="telNo" value="<?= $order_data[$i]['tel_no']?>">
      <input type="hidden" name="kaiinId" value="<?= $order_data[$i]['kaiin_id']?>">
      <input type="hidden" name="kaiinPass" value="<?= $order_data[$i]['kaiin_pass']?>">
      <input type="hidden" name="paymentNum" value="<?= $order_data[$i]['payment_num']?>">
      <input type="hidden" name="clrCorpCd" value="<?= $order_data[$i]['clr_corp_cd']?>">
      <input type="hidden" name="cardSeq" value="<?= $order_data[$i]['card_seq']?>">
    <?php //��R-#33770_�yH29-00071-15�zWEB�Ǘ��c�[���i�����������j�Ƀf�[�^�R�s�[�@�\���� 2018/06/16 nul-nagata ?>
    </form>
    <?php endif; ?>
<?php } ?>

<form name="list" method="post" action="list.php">
<input type="hidden" value="find" name="mode">
<table border="0">
  <tr>
    <td class="xxtNormalBlackTitle" nowrap>������</td>
    <td colspan="2">
      <select name="s_yy">
        <option value=""></option>
        <? for ($i = date('Y'); $i >= 2003; $i--): ?>
          <option value="<?=$i?>" <?=getSel(''.$i, $s_yy)?>><?=$i?></option>
        <? endfor; ?>
      </select>�N

      <select name="s_mm">
        <option value=""></option>
        <? for ($i = 1; $i <= 12; $i++):?>
          <option value="<?=sprintf('%02d',$i)?>" <?=getSel(sprintf('%02d',$i), $s_mm)?>><?=$i?></option>
        <? endfor; ?>
      </select>��

      <select name="s_dd">
        <option value=""></option>
        <? for ($i = 1; $i <= 31; $i++): ?>
          <option value="<?=sprintf('%02d',$i)?>" <?=getSel(sprintf('%02d',$i), $s_dd)?>><?=$i?></option>
        <? endfor; ?>
      </select>��

            �`

      <select name="e_yy">
        <option value=""></option>
        <? for ($i = date('Y'); $i >= 2003; $i--): ?>
          <option value="<?=$i?>" <?=getSel(''.$i, $e_yy)?>><?=$i?></option>
        <? endfor; ?>
     </select>�N

      <select name="e_mm">
        <option value=""></option>
        <?for ($i = 1; $i <= 12; $i++): ?>
          <option value="<?=sprintf('%02d',$i)?>" <?=getSel(sprintf('%02d',$i), $e_mm)?>><?=$i?></option>
        <? endfor; ?>
      </select>��

      <select name="e_dd">
        <option value=""></option>
        <?for ($i = 1; $i <= 31; $i++): ?>
          <option value="<?=sprintf('%02d',$i)?>" <?=getSel(sprintf('%02d',$i), $e_dd)?>><?=$i?></option>
        <? endfor; ?>
      </select>��


    </td>
  </tr>
  <tr>
    <td class="xxtNormalBlackTitle" nowrap>����ԍ�</td>
    <td colspan="2">
      <input type="text" size="24" maxlength="8" autocomplete="off" name="kainno" value="<?= getHtmlEscapedString($kainno) ?>">
    </td>
  </tr>
  <tr>
      <td class="xxtNormalBlackTitle" nowrap>�����O</td>
      <td colspan="2">
        <input type="text" size="24" maxlength="30" autocomplete="off" name="kain_name" value="<?= getHtmlEscapedString($kain_name) ?>">
      </td>
  </tr>
  <tr>
    <td class="xxtNormalBlackTitle" nowrap>�d�b�ԍ�</td>
    <td colspan="2">
      <input type="text" size="24" maxlength="13" autocomplete="off" name="tel_no" value="<?= getHtmlEscapedString($tel_no) ?>">
    </td>
  </tr>
  <tr>
    <td class="xxtNormalBlackTitle" nowrap>E���[���A�h���X</td>
    <td colspan="2">
      <input type="text" size="40" maxlength="100" autocomplete="off" name="email" value="<?= getHtmlEscapedString($email) ?>">
    </td>
  </tr>

    <tr>
        <td class="xxtNormalBlackTitle" nowrap>�敪</td>
		<td>
            <?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
			<input type="checkbox" name="service_kbn[]" value="1" <?= in_array('1', $service_kbn) ? "checked" : "" ?>>���ϕi&nbsp;&nbsp;&nbsp;&nbsp;
			<?php // ��R-#39403_�yH31-0380-001�z������Q���j���[�A���iWEB�j 2020/01/31 sai-shiragiku ?>
			<input type="checkbox" name="service_kbn[]" value="2" <?= in_array('2', $service_kbn) ? "checked" : "" ?>>����
			<?php // ��R-#39403_�yH31-0380-001�z������Q���j���[�A���iWEB�j 2020/01/31 sai-shiragiku ?>
            <?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
        </td>
    </tr>

  <tr>
    <td class="xxtNormalBlackTitle" nowrap>��</td>
    <td>
      <input type="checkbox" name="order_status[]" value="0" <?= in_array('0', $order_status) ? "checked" : "" ?>>����&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="order_status[]" value="1" <?= in_array('1', $order_status) ? "checked" : "" ?>>JU&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="order_status[]" value="2" <?= in_array('2', $order_status) ? "checked" : "" ?>>J&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="order_status[]" value="9" <?= in_array('9', $order_status) ? "checked" : "" ?>>�L�����Z��
    </td>
  </tr>
  <tr>
    <td colspan="3">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="����" onclick="return ListChk()">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="�N���A" onclick="return ClearAction()">
    </td>
  </tr>
</table>
<hr>
<font size="-1" color="black">�����F <?= $rows ?> �� </font>
<br>
<?php if ($err_message !== ''): ?>
  <?= $err_message; ?>
<?php else: ?>
  <table>
    <tr align="center" class="ListTitle">
      <td nowrap>No.</td>
      <td nowrap>���t</td>
      <td nowrap>����ԍ�</td>
      <td nowrap>�����O</td>
      <td nowrap>��</td>
<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
      <td nowrap>�敪</td>
<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
      <td nowrap>HOST</td>
      <td nowrap>��[<br>����</td>
<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
      <td nowrap>��[<br>�M�t�g</td>
<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
      <td nowrap>�J�[�h</td>
      <td nowrap>���O</td>
      <td nowrap>�d�b�ԍ�</td>
      <td nowrap>E���[���A�h���X</td>
      <td nowrap>�w�����z</td>
      <? if ($AUTH_DELETE_FLG):?>
        <td width="40" nowrap>�폜</td>
      <? endif; ?>
      <? if ($AUTH_DELETE_FLG && $order_data[$rows] > 0):?>
        <td width="80" nowrap>�d���đ�</td>
      <? endif; ?>
    </tr>

<?php for ($i = 0; $i < $rows; $i++): ?>
    <?php
        $css = $h->css_tablecolor($i, $order_data[$i]['site_kbn']);
        $host_str = null;
        if ($order_data[$i]['host_flg'] == '1')
            if ($order_data[$i]['print_flg'] == '9')
                $host_str = '��';
            else
                $host_str = '��';
        else if ($order_data[$i]['host_flg'] == '0')
            $host_str = '�~';
        else
            $host_str = '';
        $order_status_str = '';
        switch ($order_data[$i]['order_status']) {
        case 0:        $order_status_str = ''; break;
        case 1:        $order_status_str = 'JU'; break;
        case 2:        $order_status_str = 'J'; break;
        case 9:        $order_status_str = '�L��'; break;
        }
?>
    <tr class="<?php echo $h->h($css) ?>">
      <td nowrap align="right"><?= $i + 1 ?></td>
      <td nowrap align="center"><?= $order_data[$i]['order_dt'] ?></td>
      <td nowrap><?= $order_data[$i]['kainno'] ?></td>
      <td nowrap><?= $order_data[$i]['kain_name'] ?></td>
      <td nowrap align="center"><?= $order_status_str ?></td>
<?php // ��R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A�� 2017/12/21 nul fukunaga ?>
      <td nowrap align="center"><?= $order_data[$i]['shohin_kbn']; ?></td>
<?php // ��R-#32054_�yH29-00336-01�z�{���򓒃��j���[�A�� 2017/12/21 nul fukunaga ?>
      <td nowrap align="center"><?= $host_str ?></td>



<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
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
<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>



      <td nowrap align="center">
<?php if ($order_data[$i]['cc_no'] != '') { ?>
      <a href="javascript:void(0)" onClick="viewCardNo(document.frm<?= $i?>)">�\��</a>
<?php //��R-#41516_�yR02-0214-001�z�V�K�L���b�V�����X���ϓ���_WEB 2020/07/13 jast-nghiem ?>
<?php } elseif ($order_data[$i]['elecpay_epaymenthistory_id'] != '') { ?>
      <a href="javascript:void(0)" onClick="viewElecPay(document.frm<?= $i?>)">�\��</a>
<?php //��R-#41516_�yR02-0214-001�z�V�K�L���b�V�����X���ϓ���_WEB 2020/07/13 jast-nghiem ?>
<?php } else { ?>
      &nbsp;
<?php } ?>
      </td>
      <td nowrap align="center"><a href="logView.php?session_id=<?= $order_data[$i]['session_id']?>&log=order&site_kbn=<?= $order_data[$i]['site_kbn'] ?>" target="logview"><img src="/img/log.gif" width="13" height="16" border="0"></a></td>
      <td nowrap><?= $order_data[$i]['tel_no'] ?></td>
      <td nowrap><?= $order_data[$i]['email']?></td>
      <td nowrap align="right"><?= $order_data[$i]['sum_price']?></td>
      </td>
      <? if ($AUTH_DELETE_FLG): ?>
        <td nowrap align="center">
          <a href="regist.php?mode=delete&recv_order_id=<?= $order_data[$i]['recv_order_id'] ?>" onClick="return DeleteChk(<?= $i + 1 ?>, '<?= $order_data[$i]['kain_name'] ?>');">�폜</a>
        </td>
      <? endif; ?>
      <? if ($AUTH_DELETE_FLG && $order_data[$rows] > 0 && $order_data[$i]['denbun_send'] == '1'): ?>
        <td nowrap align="center">
          <a href="regist.php?mode=denbun_send&recv_order_id=<?= $order_data[$i]['recv_order_id'] ?>" onClick="return DenbunSendChk(<?= $i + 1 ?>, '<?= $order_data[$i]['kain_name'] ?>');">�d���đ�</a>
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
</form>
