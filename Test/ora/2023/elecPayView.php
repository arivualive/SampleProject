<?
$my_func = '2023';
//------------------------------------------------------------
//CY���ʃ��W���[���ǂݍ���
//------------------------------------------------------------
require_once "../../include/lib/CYUtilsConst.inc.php";
require_once $LIB_PATH."/CYUtilsCommon.inc.php";
require_once $LIB_PATH."/CYUtilsStart.inc.php";
require_once $LIB_PATH."/CYUtilsCrypt.inc.php";
require_once $LIB_PATH.'/ssktool'."/denbun_common.inc.php";

//------------------------------------------------------------
//�c�[�����ʃ��W���[���ǂݍ���
//------------------------------------------------------------
require_once $CONF_PATH."/SaishunkanProperties.inc.php";
require_once $CONF_PATH."/SaishunkanUtils.inc.php";
require_once $CONF_PATH."/const.inc.php";

//------------------------------------------------------------
//�Z�b�V�����`�F�b�N
//------------------------------------------------------------
require_once $CONF_PATH."/SessionlogOff.inc.php";

//------------------------------------------------------------
//�����`�F�b�N
//------------------------------------------------------------
require_once $CONF_PATH."/SaishunkanAuthority.inc.php";

//------------------------------------------------------------
//�����l�ݒ�
//------------------------------------------------------------
$view_data = array();

//------------------------------------------------------------
//�p�����[�^�擾
//------------------------------------------------------------
$view_data['kainno']           = $_REQUEST['kainno'];
$view_data['name']             = $_REQUEST['name'];
$view_data['telNo']            = $_REQUEST['telNo'];
$view_data['orderDt']          = $_REQUEST['orderDt'];
$view_data['accessId']         = $_REQUEST['accessId'];
$view_data['accessPass']       = $_REQUEST['accessPass'];
$view_data['orderId']          = $_REQUEST['orderId'];
$view_data['paymentId']        = $_REQUEST['paymentId'];
$view_data['clrCorpCd']        = $_REQUEST['clrCorpCd'];
$view_data['paymentType']      = $_REQUEST['paymentType'];
$view_data['totalOrderAmount'] = $_REQUEST['totalOrderAmount'];

$denbunData = array();
$denbunData['kainno']               = $_REQUEST['kainno'];
$denbunData['telNo']                = $_REQUEST['telNo'];
$denbunData['paymentType']          = fncDenbunFormat($_REQUEST['paymentType'], 2, 1);
$denbunData['clrCorpCd']            = fncDenbunFormat($_REQUEST['clrCorpCd'], 2, 0);
$denbunData['orderDt']              = date("Ymdhis", strtotime($_REQUEST['orderDt']));
$denbunData['accessId']             = fncDenbunFormat($_REQUEST['accessId'], 32, 0);
$denbunData['accessPass']           = fncDenbunFormat($_REQUEST['accessPass'], 32, 0);
$denbunData['orderId']              = fncDenbunFormat($_REQUEST['orderId'], 30, 0);
$denbunData['paymentId']            = fncDenbunFormat($_REQUEST['paymentId'], 32, 0);
$denbunData['totalOrderAmount']     = fncDenbunFormat($_REQUEST['totalOrderAmount'], 9, 1);

//------------------------------------------------------------
//DB��������擾
//------------------------------------------------------------

//------------------------------------------------------------
//�y�[�W�����擾
//------------------------------------------------------------
$pageInfo = getPageInfo();

//------------------------------------------------------------
//�f�[�^�t�@�C�����C���N���[�h
//------------------------------------------------------------

//------------------------------------------------------------
//�w�b�_�[���C���N���[�h
//------------------------------------------------------------
//require_once ($LIB_PATH.'/CYUtilsHeader.inc.php');
//------------------------------------------------------------
//�e���v���[�g���C���N���[�h
//------------------------------------------------------------
require_once ($TEMPLATE_PATH.'/'.$my_func.'/elecPayView.tpl.php');
//------------------------------------------------------------
//�t�b�^�[���C���N���[�h
//------------------------------------------------------------
//require_once ($LIB_PATH.'/CYUtilsFooter.inc.php');
?>