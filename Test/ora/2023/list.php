<?
$my_func = '2023';
//------------------------------------------------------------
//CY���ʃ��W���[���ǂݍ���
//------------------------------------------------------------
require_once "../../include/lib/CYUtilsConst.inc.php";
require_once $LIB_PATH."/CYUtilsCommon.inc.php";
require_once $LIB_PATH."/CYUtilsStart.inc.php";
require_once $LIB_PATH."/CYUtilsCrypt.inc.php";
// require_once $LIB_PATH.'/ssktool'."/denbun_common.inc.php";

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
$err_message = "";

//------------------------------------------------------------
//�p�����[�^�擾
//------------------------------------------------------------
$mode			= $_REQUEST['mode'];
$s_yy			= trim($_REQUEST['s_yy']);
$s_mm			= trim($_REQUEST['s_mm']);
$s_dd			= trim($_REQUEST['s_dd']);
$e_yy			= trim($_REQUEST['e_yy']);
$e_mm			= trim($_REQUEST['e_mm']);
$e_dd			= trim($_REQUEST['e_dd']);
$kainno			= trim($_REQUEST['kainno']);
$kain_name		= trim($_REQUEST['kain_name']);
$tel_no			= trim($_REQUEST['tel_no']);
$email			= trim($_REQUEST['email']);
$order_status	= $_REQUEST['order_status'];

if ($order_status == '') $order_status = array();

// ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki
$service_kbn		= $_REQUEST['service_kbn'];
if ($service_kbn == '') $service_kbn = array();
// ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki

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
require_once ($DATA_PATH.'/'.$my_func.'/list.dat.php');

//------------------------------------------------------------
//�w�b�_�[���C���N���[�h
//------------------------------------------------------------
require_once ($LIB_PATH.'/CYUtilsHeader.inc.php');
//------------------------------------------------------------
//�e���v���[�g���C���N���[�h
//------------------------------------------------------------
require_once ($TEMPLATE_PATH.'/'.$my_func.'/list.tpl.php');
//------------------------------------------------------------
//�t�b�^�[���C���N���[�h
//------------------------------------------------------------
require_once ($LIB_PATH.'/CYUtilsFooter.inc.php');
?>
