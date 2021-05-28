<?php
/**
 * �y�w�b�_�[�t�@�C���z
 *
 * @package default
 * @version $Id: CYUtilsHeader.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */

$book_mark_page = '';
//ezweb�L���b�V�� & �u�b�N�}�[�N�Ή�
if ($CARRIER_ID === 'e') {
    header('Pragma:no-cache');
    header('Cache-Control: no-cache, must-revalidate');
    $book_mark_page = '<meta name="vnd.up.bookmark" content="'
        .$ROOT_URL.'/top.php'.$URL_PARAM. '" />'. "\n";
}


//��2010/05/11 #xxxx ���[�����с����[���������Ή��ikdl yoshii�j
if($MailDraft_PageTitle){
    $show_title = $MailDraft_PageTitle;
}else{
    $show_title = $FUNC_INFO[$my_func]['func_name'];
}
//��2010/05/11 #xxxx ���[�����с����[���������Ή��ikdl yoshii�j


switch ($mode) {
	case 'add':
		$show_title .= '�i�V�K�o�^�j';
		$btn_val	= '�V�K�o�^';
		break;
	case 'edit':
		$show_title .= '�i�X�V�j';
		$btn_val	= '�X�V';
		break;
	case 'view':
		$show_title .= '�i�Q�Ɓj';
		break;
	case 'remove':
		$show_title .= '�i���O�j';
		break;
	case 'revival':
		$show_title .= '�i���A�j';
		break;
//��R-#10387 ��2�F�؃��b�N�����@�\�ǉ� 2013/10/25 uls-soga
	case 'unlock_confirm':
	case 'unlock_finish':
		$show_title .= '�i���b�N�����j';
		break;
//��R-#10387 ��2�F�؃��b�N�����@�\�ǉ� 2013/10/25 uls-soga
	default:
		break;
}
switch ($_SERVER['SERVER_NAME']) {
	case $TEST_SERVER_NAME :
		$BODY_BG_COLOR = '#FFCCFF';
		break;
	case $HONBAN_SERVER_NAME :
		$BODY_BG_COLOR = '#FFCCFF';
		break;
	case $TEST_SSK_SERVER_NAME :
	case $TEST_SSK_SERVER_NAME2 :
		$BODY_BG_COLOR = '#FFFFFF';
		break;
	case $STAGE_SSK_SERVER_NAME :
	case $STAGE_SSK_SERVER_NAME2 :
	    $BODY_BG_COLOR = '#FFFFFF';
	    break;
	case $HONBAN_SSK_SERVER_NAME :
	case $HONBAN_SSK_SERVER_NAME2 :
		$BODY_BG_COLOR = '#FFCCFF';
		break;
	default :
		$BODY_BG_COLOR = '#FF9966';
		break;
}
?>

<html>
<head>
<meta http-equiv="Content-Type" Content="text/html;charset=Shift_JIS">
<link type="text/css" rel="stylesheet" href="<?= $CSS_PATH ?>/style.css?20160822">
<title><?= $pageInfo['PAGE_TITLE'].'['.$show_title.']' ?></title>
<script language="javascript">
<?php
	require_once $ROOT_PATH.'/js/'.$my_func.'.js';
	require_once $ROOT_PATH.'/js/common.js';
?>
</script>
</head>
<body bgcolor="<?=$BODY_BG_COLOR?>" font size="4">

<div id="arrayCount"  STYLE="position:absolute;left:50; height:15; top:0; width:30; background:aqua;  visibility:hidden">0</div>
<div id="sourceIndex" STYLE="position:absolute;left:90; height:15; top:0; width:30; background:yellow;visibility:hidden">0</div>
<div id="targetIndex" STYLE="position:absolute;left:130;height:15; top:0; width:30; background:pink;  visibility:hidden">0</div>
<div id="ichiran" class="funcName">
<?php (isset($isMobile) && ($isMobile === true)) ? $titleCss = "TitleTable2" : $titleCss = 'TitleTable';  ?>

    <center>
	<?php // ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/22 namhn-ssv ?>
	<table class="<?php echo $titleCss?>" width="<?= (isset($my_func) && $my_func == '9001') ? '365' : '300' ?>">
	<?php // ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/22 namhn-ssv ?>
	<tr>
		<?php // ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/22 namhn-ssv ?>
		<td align="center" nowrap width="<?= (isset($my_func) && $my_func == '9001') ? '365' : '300' ?>">
		<?php // ��R41505�yR02-0212-001�z�v�����T�C�g�Œ����ύX�@�\�ǉ��Ȉ�Ver 2020/09/22 namhn-ssv ?>
			<?= $show_title ?>
		</td>
	</tr>
	</table>
    </center>

	<br>
</div>

