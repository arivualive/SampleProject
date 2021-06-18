<?php
ini_set('error_reporting',E_ALL);
function getSel($a, $b) {
    return $a === $b ? 'selected="selected"' : '';
}
?>

<?php for ($i = 0; $i < $rows; $i++){ ?>
<form name="frm<?= $i?>" action="cardNoView.php" method="post" target="_blank">
  <input type="hidden" name="kainno" value="<?= $order_data[$i]['kainno']?>">
  <input type="hidden" name="name" value="<?= $order_data[$i]['kain_name']?>">
  <input type="hidden" name="telNo" value="<?= $order_data[$i]['tel_no']?>">
  <input type="hidden" name="orderDt" value="<?= $order_data[$i]['order_dt']?>">
  <input type="hidden" name="cardNo" value="<?= $order_data[$i]['cc_no']?>">
  <input type="hidden" name="cardTerm" value="<?= $order_data[$i]['cc_term']?>">
  <input type="hidden" name="kaiinId" value="<?= $order_data[$i]['kaiin_id']?>">
  <input type="hidden" name="kaiinPass" value="<?= $order_data[$i]['kaiin_pass']?>">
  
  <input type="hidden" name="paymentNum" value="<?= $order_data[$i]['payment_num']?>">
  <input type="hidden" name="clrCorpCd" value="<?= $order_data[$i]['clr_corp_cd']?>">
  <input type="hidden" name="cardSeq" value="<?= $order_data[$i]['card_seq']?>">
</form>
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
    <td class="xxtNormalBlackTitle" nowrap>��</td>
    <td>
      <input type="checkbox" name="order_status[]" value="0" <?= in_array('0', $order_status) ? "checked" : "" ?>>����&nbsp;&nbsp;&nbsp;&nbsp;
<?php //��R-#13002 WEB�Ǘ��c�[����S�����E�����̏�ԕ\���ύX�Ή� 2014/01/28 uls-soga ?>
      <input type="checkbox" name="order_status[]" value="1" <?= in_array('1', $order_status) ? "checked" : "" ?>>JU&nbsp;&nbsp;&nbsp;&nbsp;
<?php //��R-#13002 WEB�Ǘ��c�[����S�����E�����̏�ԕ\���ύX�Ή� 2014/01/28 uls-soga ?>
      <input type="checkbox" name="order_status[]" value="2" <?= in_array('2', $order_status) ? "checked" : "" ?>>J&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="order_status[]" value="9" <?= in_array('9', $order_status) ? "checked" : "" ?>>�L�����Z��
    </td>
  </tr>


<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
  <tr>
    <td class="xxtNormalBlackTitle" nowrap>�敪</td>
    <td>
      <input type="checkbox" name="service_kbn[]" value="0" <?= in_array('0', $service_kbn) ? "checked" : "" ?>>���ϕi&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="service_kbn[]" value="1" <?= in_array('1', $service_kbn) ? "checked" : "" ?>>������Q
    </td>
  </tr>
<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>


  <?php // �����o�C���Ή� #716 2009/03/17 kdl.ohyanagi add start ?>
    <tr>
      <td class="xxtNormalBlackTitle" nowrap>�T�C�g�敪</td>
      <td nowrap>
        <label for="sitekbn_pc">
          <input type="radio" name="sitekbn" value="1" id="sitekbn_pc" <?=$site_kbn_chkd1;?>/>PC
        </label>
        <label for="sitekbn_mbl">
          <input type="radio" name="sitekbn" value="2" id="sitekbn_mbl" <?=$site_kbn_chkd2;?>/>�g��
        </label>
        <label for="sitekbn_both">
          <input type="radio" name="sitekbn" value="0" id="sitekbn_both" <?=$site_kbn_chkd0;?>/>����
        </label>
      </td>
    </tr>
  <?php // �����o�C���Ή� #716 2009/02/17 kdl.ohyanagi add end ?>

    <?php //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j ?>
    <tr>
        <td class="xxtNormalBlackTitle" nowrap>���͋敪</td>
        <td nowrap>

            <label for="NET_IJ_KBN_AUTO">
                <input type="radio" name="NET_IJ_KBN" value="1" id="NET_IJ_KBN_AUTO" <?=$net_ij_kbn_chkd1;?>/>�I�[�g
            </label>

            <label for="NET_IJ_KBN_MANU">
                <input type="radio" name="NET_IJ_KBN" value="2" id="NET_IJ_KBN_MANU" <?=$net_ij_kbn_chkd2;?>/>�}�j���A��
            </label>

            <label for="NET_IJ_KBN_BOTH">
                <input type="radio" name="NET_IJ_KBN" value="0" id="NET_IJ_KBN_BOTH" <?=$net_ij_kbn_chkd0;?>/>����
            </label>

        </td>
    </tr>
    <?php //��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j ?>

<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
  <tr>
    <td class="xxtNormalBlackTitle" nowrap>���������</td>
    <td>
      <input type="checkbox" name="qteiki_flg[]" value="0" <?= in_array('0', $qteiki_flg) ? "checked" : "" ?>>�Ώ�
    </td>
  </tr>
<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>

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

        <td nowrap>���͋敪</td>
        <td nowrap>�}�j���A�����R</td>

      <td nowrap>��</td>

<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
      <td nowrap>�敪</td>
<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>

      <td nowrap>HOST</td>
      <td nowrap>��[</td>
<?php // ��R-#17717_�������̃J�[�h�ԍ���PLS�Ō����悤�ɂ��� 2015/05/14 nul-motoi ?>
      <td nowrap>�J�[�h</td>
<?php // ��R-#17717_�������̃J�[�h�ԍ���PLS�Ō����悤�ɂ��� 2015/05/14 nul-motoi ?>

      <td nowrap>���O</td>

      <td nowrap>�d�b�ԍ�</td>
      <td nowrap>E���[���A�h���X</td>
      <td nowrap>�w�����z</td>

<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
      <td nowrap>�����</td>
<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>

      <td nowrap>�T�C�g</td>
      <? if ($AUTH_DELETE_FLG):?>
        <td width="40" nowrap>�폜</td>
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
        else if ($order_data[$i]['host_flg'] == '5')
            $host_str = '��';
        else if ($order_data[$i]['host_flg'] == '0')
            $host_str = '�~';
        else
            $host_str = '';
        $order_status_str = '';
        switch ($order_data[$i]['order_status']) {
        case 0:        $order_status_str = ''; break;
        //��R-#13002 WEB�Ǘ��c�[����S�����E�����̏�ԕ\���ύX�Ή� 2014/01/28 uls-soga
        case 1:        $order_status_str = 'JU'; break;
        //��R-#13002 WEB�Ǘ��c�[����S�����E�����̏�ԕ\���ύX�Ή� 2014/01/28 uls-soga
        case 2:        $order_status_str = 'J'; break;
        case 9:        $order_status_str = '�L��'; break;
        }

	// ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki
	$shohin_kbn = '';
	switch ($order_data[$i]['shohin_cd']) {
	case '0451':   $shohin_kbn = '��'; break;
	default:       $shohin_kbn = '��'; break;
        }

	$qteiki_str = '';
	switch ($order_data[$i]['kain_kbn']) {
	case '0':
	case '1':      $qteiki_str = '��'; break;
	default:       $qteiki_str = ''  ; break;
	}
	// ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki
?>
    <tr class="<?php echo $h->h($css) ?>">
      <td nowrap align="right"><?= $i + 1 ?></td>
      <td nowrap align="center"><?= $order_data[$i]['order_dt'] ?></td>
      <td nowrap><?= $order_data[$i]['kainno'] ?></td>
      <td nowrap><?= $order_data[$i]['kain_name'] ?></td>


        <td nowrap><?= $order_data[$i]['net_ij'] ?></td>
        <td nowrap><?= $order_data[$i]['net_ij_info'] ?></td>


      <td nowrap align="center"><?= $order_status_str ?></td>

<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
      <td nowrap align="center"><?= $shohin_kbn ?></td>
<?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>

      <td nowrap align="center"><?= $host_str ?></td>


      <td nowrap align="center"><a href="orderSheet.php?regular_order_id=<?= $order_data[$i]['regular_order_id']?>&name=&kana=mail=" target="_blank"><img src="/img/pdf.gif" width="16" height="16" border="0"></a></td>

<?php // ��R-#17717_�������̃J�[�h�ԍ���PLS�Ō����悤�ɂ��� 2015/05/14 nul-motoi ?>
      <td nowrap align="center">
<?php if ($order_data[$i]['cc_no'] != '' || $order_data[$i]['kaiin_id'] != '') { ?>
      <a href="javascript:void(0)" onClick="viewCardNo(document.frm<?= $i?>)">�\��</a>
<?php } else { ?>
      &nbsp;
<?php } ?>
      </td>
<?php // ��R-#17717_�������̃J�[�h�ԍ���PLS�Ō����悤�ɂ��� 2015/05/14 nul-motoi ?>

      <td nowrap align="center"><a href="logView.php?session_id=<?= $order_data[$i]['session_id']?>&log=drink_regular&site_kbn=<?= $order_data[$i]['site_kbn'] ?>" target="logview"><img src="/img/log.gif" width="13" height="16" border="0"></a></td>

      <td nowrap><?= $order_data[$i]['tel_no'] ?></td>
      <td nowrap><?= $order_data[$i]['email']?></td>
      <td nowrap align="right"><?= $order_data[$i]['sum_price']?></td>

      <?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>
      <td nowrap align="center"><?= $qteiki_str ?></td>
      <?php // ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki ?>

      <td nowrap align="center"><?= $order_data[$i]['site_kbn_nm'] ?></td>
      </td>
      <? if ($AUTH_DELETE_FLG): ?>
        <td nowrap align="center">
          <a href="regist.php?mode=delete&regular_order_id=<?= $order_data[$i]['regular_order_id'] ?>" onClick="return DeleteChk(<?= $i + 1 ?>, '<?= $order_data[$i]['kain_name'] ?>');">�폜</a>
        </td>
      <? endif; ?>
    </tr>
<?php endfor; ?>

</table>


<br>
<hr>

<?php endif; ?>
</form>
