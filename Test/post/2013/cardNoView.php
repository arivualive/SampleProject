<?
$my_func = '2013';
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
$view_data = array();

//------------------------------------------------------------
//�p�����[�^�擾
//------------------------------------------------------------
$view_data['name']      = $_REQUEST['name'];
$view_data['order_dt']  = $_REQUEST['orderDt'];
$view_data['tel_no']    = $_REQUEST['telNo'];
$view_data['card_no']   = $_REQUEST['cardNo'];
$view_data['card_term'] = $_REQUEST['cardTerm'];
$view_data['card_name'] = $_REQUEST['cardName'];

//��R-#31129_�yH29-00071-01�z�J�[�h�ԍ���ێ��� 2018/05/28 nul-inagaki
$view_data['clr_corp_cd'] = $_REQUEST['clrCorpCd'];
$view_data['kaiin_id']    = $_REQUEST['kaiinId'];
$view_data['kaiin_pass']  = $_REQUEST['kaiinPass'];
$view_data['card_seq']    = $_REQUEST['cardSeq'];
//��R-#31129_�yH29-00071-01�z�J�[�h�ԍ���ێ��� 2018/05/28 nul-inagaki

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
require_once ($TEMPLATE_PATH.'/'.$my_func.'/cardNoView.tpl.php');
//------------------------------------------------------------
//�t�b�^�[���C���N���[�h
//------------------------------------------------------------
//require_once ($LIB_PATH.'/CYUtilsFooter.inc.php');
?>