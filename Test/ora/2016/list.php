<?
$my_func = '2016';
//------------------------------------------------------------
//CY���ʃ��W���[���ǂݍ���
//------------------------------------------------------------
require_once "../../include/lib/CYUtilsConst.inc.php";
require_once $LIB_PATH."/CYUtilsCommon.inc.php";
require_once $LIB_PATH."/CYUtilsStart.inc.php";
require_once $LIB_PATH."/CYUtilsCrypt.inc.php";

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
if ($order_status == '')
	$order_status = array();

// �����o�C���Ή� 2009/03/17 kdl.ohyanagi add start
// �T�C�g�敪���擾����
// 1:PC
// 2:�g��
$s_sitekbn = '0';
if (isset($_POST['sitekbn']) && is_numeric($_POST['sitekbn'])) {
    $s_sitekbn = $_POST['sitekbn'];
}
// �����o�C���Ή� 2009/02/17 kdl.ohyanagi add start


//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j
// �T�C�g�敪���擾����
// 1:PC
// 2:�g��
$NET_IJ_KBN = '0';
if (isset($_POST['NET_IJ_KBN']) && is_numeric($_POST['NET_IJ_KBN'])) {
    $NET_IJ_KBN = $_POST['NET_IJ_KBN'];
}
//��2009/10/07 #xxx �l�b�g�����������Ή��ikdl yoshii�j

// ��R-#31664_�yH29-00239-01�z������Q�����O�C���Ή� 2017/08/09 nul-inagaki
$qteiki_flg		= $_REQUEST['qteiki_flg'];
if ($qteiki_flg == '') $qteiki_flg = array();

$service_kbn		= $_REQUEST['service_kbn'];
if ($service_kbn == '') $service_kbn = array();

$kain_kbn	= $_REQUEST['kain_kbn'];
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
