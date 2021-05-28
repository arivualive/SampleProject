<?php
/**
 * �y�W���J�����ʐݒ�t�@�C�� �z
 *
 * ��)�ꕔmod_cy_core�̎g�p��O��ɂ��Ă�����̂�����܂��B
 *
 *
 * @package default
 * @version $Id: CYUtilsConst.inc.php,v 1.17 2007/11/24 10:06:28 kenji_maruyama Exp $
 *
 */
 
/*
 * TODO: �R�����g�̌�����
 *
 */ 
/*
 * �K�{�ݒ荀��
 */

error_reporting(E_ALL & ~E_NOTICE);
  
//�e�X�g�T�C�g����t���O�̎擾�i�{�Ԋ��A�e�X�g��������T�[�o�ɂ��邽�߁A�T�[�o�l�[���Ŕ��f�j
//�ďt�ّ��e�X�g
// TODO:���[�J���J�����p�ɏ��������@�����[�X���͌��ɖ߂� 2021/05/21 jst-wada
// $TEST_SSK_SERVER_NAME   = '10.3.188.200';
// $TEST_SSK_SERVER_NAME2  = 'test-tool.saishunkan.local';
$TEST_SSK_SERVER_NAME   = '127.0.0.1';
$TEST_SSK_SERVER_NAME2  = 'localhost';
// TODO:���[�J���J�����p�ɏ��������@�����[�X���͌��ɖ߂� 2021/05/21 jst-wada

//�ďt�ّ��X�e�[�W���O
$STAGE_SSK_SERVER_NAME   = '10.3.188.100';
$STAGE_SSK_SERVER_NAME2  = 'stage-tool.saishunkan.local';

//�ďt�ّ��{��
$HONBAN_SSK_SERVER_NAME  = '10.3.188.10';
$HONBAN_SSK_SERVER_NAME2 = 'tool.saishunkan.local';

//PC�T�C�gURL
$TEST_SSK_WEB_NAME      = 'test.saishunkan.co.jp';
$STAGE_SSK_WEB_NAME     = 'stage.saishunkan.co.jp';
$HONBAN_SSK_WEB_NAME    = 'www.saishunkan.co.jp';

//�g�уT�C�gURL
$TEST_SSK_MOB_NAME      = 'test.0120444444.com';
$STAGE_SSK_MOB_NAME     = 'stage.0120444444.com';
$HONBAN_SSK_MOB_NAME    = 'www.0120444444.com';



switch ($_SERVER['SERVER_NAME']) {
	case $TEST_SERVER_NAME :
		$SSK_DC_FLAG  = false;		//CY��
		$TEST_FLAG    = true;		//TEST
		$STAGE_FLAG    = false;		//STAGE
		break;
		
	case $HONBAN_SERVER_NAME :
		$SSK_DC_FLAG  = false;		//CY��
		$TEST_FLAG    = false;		//HONBAN
		$STAGE_FLAG   = false;		//STAGE
		break;
		
	case $TEST_SSK_SERVER_NAME :
	case $TEST_SSK_SERVER_NAME2 :
		$SSK_DC_FLAG  = true;		//SSKDC��
		$TEST_FLAG    = true;		//TEST
		$STAGE_FLAG   = false;		//STAGE
		break;
		
	case $STAGE_SSK_SERVER_NAME :
	case $STAGE_SSK_SERVER_NAME2 :
	    $SSK_DC_FLAG  = true;		//CY��
	    $TEST_FLAG    = false;		//TEST
	    $STAGE_FLAG   = true;		//STAGE
	    break;
		
	case $HONBAN_SSK_SERVER_NAME :
	case $HONBAN_SSK_SERVER_NAME2 :
		$SSK_DC_FLAG  = true;		//SSKDC��
		$TEST_FLAG    = false;		//HONBAN
		$STAGE_FLAG   = false;		//STAGE
		break;
		
	default :
		//����TEST_SSK_SERVER_NAME(tool.test.0120444444.jp)����肭��ꂸdefault���p
		$SSK_DC_FLAG  = true;		//CY��
		$TEST_FLAG    = true;		//TEST
		$STAGE_FLAG   = false;		//STAGE
		break;
}
//���[�g�f�B���N�g��
if($SSK_DC_FLAG === false) {

	if($TEST_FLAG === true || $STAGE_FLAG === true) {
		$ROOT_DIR = '/home/ssktool';
	} else {
	    $ROOT_DIR = '/home/ssktool';
	}
	
} else {

	if($TEST_FLAG === true || $STAGE_FLAG === true ) {
	    $ROOT_DIR = '/home/ssktool';
	} else {
		$ROOT_DIR = '/home/ssktool';
	}

}

//�T�C�g�敪
$SITE_KBN[1] = '1'; //PC
$SITE_KBN[2] = '2'; //�g��

//�R���e���c��{�J���[�ݒ�
$BGCOLOR    = '#ffcc99';
$TXTCOLOR   = '#000000';

$LINKCOLOR  = '#fbbffb';
$ALINKCOLOR = '#ff0080';
$VLINKCOLOR = 'silver';
$HRCOLOR    = '#008200';

//�T�C�g����{�J���[�ݒ�
$SITE_BGCOLOR = "#FFFFFF";
$SITE_TXTCOLOR = "#423024";
$SITE_LINKCOLOR = "#A7735D";
$SITE_ALINKCOLOR = "#FCEAD3";
$SITE_VLINKCOLOR = "#A7735D";
$SITE_HRCOLOR = "#948575";

//�R���e���c�̏��
$CONTENTS_CYID = 'SSK';
$CONTENTS_NAME = '�ďt�ِ��� WEB�Ǘ��c�[��';
$HEADER_TITLE  = $CONTENTS_NAME;
$COPYRIGHT_STR = '�ďt�ِ��� All Rights Reserved';

//�h���C��
$TEST_DOMAIN = $TEST_SERVER_NAME;
$STAGE_DOMAIN = $STAGE_SERVER_NAME;
$HONBAN_DOMAIN = $HONBAN_SERVER_NAME;
$TEST_SSK_DOMAIN = $TEST_SSK_SERVER_NAME2;
$STAGE_SSK_DOMAIN = $STAGE_SSK_SERVER_NAME2;
$HONBAN_SSK_DOMAIN = $HONBAN_SSK_SERVER_NAME2;

//--------------------------------------------------------
// Career Settings
//--------------------------------------------------------

 
$CARRIER_ID = $_SERVER['HTTP_X_CY_CARRIER'];
$PC_MODE    = false;

if ($CARRIER_ID === 'p') {
    $PC_MODE = true;
}

/*
 * �R���e���c�ɂ���Ă͐ݒ肷��K�v�̂���ݒ荀��
 */

//SSL�g�p��URL
$SSL_URL_I = '';
$SSL_URL_E = '';
$SSL_URL_V = '';
$SSL_URL_W = '';

//PICTURE FITTER�g�p��ROOT_URL
$TEST_PFIT_ROOT_URL   = '';
$HONBAN_PFIT_ROOT_URL = '';

$TEST_PFIT_CONTENT_NAME   = '';
$HONBAN_PFIT_CONTENT_NAME = '';

/*
 * ��{�I�ɕύX����K�v���Ȃ��ݒ荀��
 */

//NG���[�h�̃t�@�C���� $LIB_PATH�̉��̂��̃t�@�C�������p�����
$NG_WORD_FILE = 'ng_words.csv';

/*
 * �ȉ��͈ȏ�̐ݒ荀�ځEmod_cy_core�ł̔���
 * ���瓱�o��������
 * �������͌Œ�̂���
 */

$USER_AGENT_DEF = $_SERVER['HTTP_USER_AGENT'];
 
//--------------------------------------------------------
// Contents Settings
//--------------------------------------------------------

if ($CY_TEST_FLAG === true) {
    $CONTENTS_ID = $TEST_CONTENTS_ID;
} else {
    $CONTENTS_ID = $HONBAN_CONTENTS_ID;
}

//--------------------------------------------------------
// URL Settings
//--------------------------------------------------------

if($SSK_DC_FLAG === false) {

	if($TEST_FLAG === true) {
		$DOMAIN = $TEST_DOMAIN;
		$WEB = $HONBAN_WEB_NAME;
	} else if($STAGE_FLAG === true) {
	    $DOMAIN = $STAGE_DOMAIN;
	    $WEB = $HONBAN_WEB_NAME;
	} else {
	    $DOMAIN = $HONBAN_DOMAIN;
		$WEB = $HONBAN_WEB_NAME;
	}
	
} else {

	if($TEST_FLAG === true ) {
	  $DOMAIN = $TEST_SSK_DOMAIN;
		$WEB = $TEST_SSK_WEB_NAME;
		$MOB = $TEST_SSK_MOB_NAME;
	} else if($STAGE_FLAG === true) {
	    $DOMAIN = $STAGE_SSK_DOMAIN;
	    $WEB = $STAGE_SSK_WEB_NAME;
	    $MOB = $STAGE_SSK_MOB_NAME;
	} else {
		$DOMAIN = $HONBAN_SSK_DOMAIN;
		$WEB = $HONBAN_SSK_WEB_NAME;
		$MOB = $HONBAN_SSK_MOB_NAME;
	}

}
/*
if ($TEST_FLAG === true) {
	$STAGE_SSK_WEB_NAME = $WEB;
}
*/

//ROOTURL
$ROOT_URL = 'http://'.$DOMAIN;
$ROOT_URL_WEB = 'http://'.$WEB;
$ROOT_SSL_URL_WEB = 'https://'.$WEB;
$ROOT_URL_MOB = 'http://'.$MOB;
$ROOT_SSL_URL_MOB = 'https://'.$MOB;

//�X�^�C���V�[�g�x�[�XURL
$CSS_PATH = $ROOT_URL."/css";

//JavaScript�x�[�XURL
$JS_PATH = $ROOT_URL."/js";

//PictureFitter
if ($CY_TEST_FLAG == true) {
    $PFIT_ROOT_URL = $TEST_PFIT_ROOT_URL.'/'.$TEST_PFIT_CONTENT_NAME;
} else {
    $PFIT_ROOT_URL = $HONBAN_PFIT_ROOT_URL.'/'.$HONBAN_PFIT_CONTENT_NAME;
}

//--------------------------------------------------------
// Directory and File Settings
//--------------------------------------------------------

$ROOT_PATH          = $ROOT_DIR.'/htdocs';
$INC_PATH           = $ROOT_DIR.'/include';
$LOG_PATH           = $ROOT_DIR.'/logs';
$DATA_PATH          = $INC_PATH.'/datafile';
$CONF_PATH          = $INC_PATH.'/conf';
$DEV_PATH           = $INC_PATH.'/device';
$LIB_PATH           = $INC_PATH.'/lib';
$OBJ_ROOT_PATH      = $ROOT_DIR.'/obj';
$TEMPLATE_PATH 		= $INC_PATH.'/template/pc';
$IMAGE_PATH			= $ROOT_PATH.'/img';
$FTP_IMG_PATH	    = '/home/ssk/htdocs/img';

$HEADER_FILE = $LIB_PATH.'/CYUtilsHeader.inc.php';
$FOOTER_FILE = $LIB_PATH.'/CYUtilsFooter.inc.php';

$BIN_PATH = $ROOT_DIR.'/bin';

//--------------------------------------------------------
// FTP Settings
//--------------------------------------------------------

if($SSK_DC_FLAG === false) {

	if($TEST_FLAG === true || $STAGE_FLAG === true) {
		$FTP_SERVER     = '10.128.70.17';
		$FTP_USER_NAME  = 'ssk';
		$FTP_USER_PASS  = 'saishunkan';
		$FTP_SRC_PATH	= $IMAGE_PATH;
		$FTP_DST_PATH	= $FTP_IMG_PATH.'/pft_test';
	} else {
		$FTP_SERVER     = '10.128.70.17';
		$FTP_USER_NAME  = 'ssk';
		$FTP_USER_PASS  = 'saishunkan';
		$FTP_SRC_PATH	= $IMAGE_PATH;
		$FTP_DST_PATH	= $FTP_IMG_PATH.'/pft';
	}
	
} else {

	if($TEST_FLAG === true || $STAGE_FLAG === true ) {
	    $FTP_SERVER     = '61.119.92.77';
		$FTP_USER_NAME  = 'ssk';
		$FTP_USER_PASS  = 'saishunkan';
		$FTP_SRC_PATH	= $IMAGE_PATH;
		$FTP_DST_PATH	= $FTP_IMG_PATH.'/pft_test';
	} else {
		$FTP_SERVER     = '61.119.92.77';
		$FTP_USER_NAME  = 'ssk';
		$FTP_USER_PASS  = 'saishunkan';
		$FTP_SRC_PATH	= $IMAGE_PATH;
		$FTP_DST_PATH	= $FTP_IMG_PATH.'/pft';
	}

}

//--------------------------------------------------------
if ($CARRIER_ID === 'i') {

} elseif ($CARRIER_ID === 'e') {

    srand((double)microtime()*1000000);
    $ez_param = rand(100, 999);

} elseif ($CARRIER_ID === 'v') {

    $v3gc_param = 1;

    // ���{�[���p�e�X�g�T�C�gTOPURL
    $LAB_SITE_TOP_URL_TEST = 'http://'.$TEST_DOMAIN_V.'/top.php';
    // ���{�[���p�{�ԃT�C�gTOPURL
    $LAB_SITE_TOP_URL_HONBAN = 'http://'.$HONBAN_DOMAIN_V.'/top.php';

} elseif ($CARRIER_ID === 'w') {
    
    srand((double)microtime()*1000000);
    $ez_param = rand(100, 999);

    // ���{�[���p�e�X�g�T�C�gTOPURL
    $LAB_SITE_TOP_URL_TEST = 'http://'.$TEST_DOMAIN_W.'/top.php';
    // ���{�[���p�{�ԃT�C�gTOPURL
    $LAB_SITE_TOP_URL_HONBAN = 'http://'.$HONBAN_DOMAIN_W.'/top.php';

}

$MIME_TYPE = array(
'2bp'   => 'image/x-MS-bmp',
'als'   => 'audio/X-Alpha5',
'amc'   => 'application/x-mpeg',
'afd'   => 'application/x-avatar',
'asf'   => 'video/x-ms-asf',
'bmp'   => 'image/x-MS-bmp',
'gif'   => 'image/gif',
'htm'   => 'text/html',
'html'  => 'text/html',
'ifm'   => 'image/gif',
'jad'   => '',
'jam'   => 'application/x-jam',
'jpg'   => 'image/jpeg',
'jpz'   => 'image/jpeg',
'jpeg'  => 'image/jpeg',
'jpe'   => 'image/jpeg',
'mid'   => 'audio/midi',
'mld'   => 'application/x-mld',
'mmf'   => 'application/x-smaf',
'pmd'   => 'application/x-pmd',
'png'   => 'image/png',
'pnz'   => 'image/png',
'qcp'   => 'audio/vnd.qcelp',
'sht'   => 'text/html',
'shtml' => 'text/html',
'smd'   => 'audio/x-smd',
'smz'   => 'audio/x-smd',
'swf'   => 'application/x-shockwave-flash',
'txt'   => 'text/plain',
'wav'   => 'audio/x-wav',
'3gp'   => 'video/3gpp',
'mp4'   => 'video/x-vmp4',
'3g2'   => 'video/3gpp2'
);

// ��R-#3743 �X�}�[�g�t�H���Ή� 2012/06/29 uls-motoi
// �g�у��[���A�h���X�ݒ�(�h���C���`�F�b�N�̂���)
$NG_MAILADDRESS = array(
    'jp-t.ne.jp',
    'jp-d.ne.jp',
    'jp-h.ne.jp',
    'jp-r.ne.jp',
    'jp-n.ne.jp',
    'jp-s.ne.jp',
    'jp-q.ne.jp',
    'jp-c.ne.jp',
    'jp-k.ne.jp',
    'softbank.ne.jp',
    'd.vodafone.ne.jp',
    'h.vodafone.ne.jp',
    't.vodafone.ne.jp',
    'c.vodafone.ne.jp',
    'k.vodafone.ne.jp',
    'r.vodafone.ne.jp',
    'n.vodafone.ne.jp',
    's.vodafone.ne.jp',
    'q.vodafone.ne.jp',
    'ezweb.ne.jp',
    'ido.ne.jp',
    'sky.tkk.ne.jp',
    'sky.tu-ka.ne.jp',
    'sky.tck.ne.jp',
    'docomo.ne.jp',
    'em.nttpnet.ne.jp',
    'phone.ne.jp',
    'mozio.ne.jp',
    'pdx.ne.jp',
    'pipopa.ne.jp',
    'softbank.ne.jp',
    'mopera.net',
    'disney.ne.jp'
);
// ��R-#3743 �X�}�[�g�t�H���Ή� 2012/06/29 uls-motoi


/**
 * PC���[�U��IP�A�h���X���擾����
 *
 * TODO: CYUtilsCommon.inc.php �� getPcUserIp() �Ɠ���.
 * CYUtilsCommon.inc.php ���� getPcUserIp() ��
 * ��������̂��悳����
 * TODO: �擾�ł��Ȃ������ꍇ�̕Ԃ�l���l������.
 * 
 * @access private
 * 
 * @return string IP�A�h���X�̕�����
 *   �擾�ł��Ȃ������ꍇ�͕�����'unknown'
 */
function getPcUserIpCon()
{
    $unknown = 'unknown';
    if (isset($_SERVER)) {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }
        return $unknown;
        
    } else {
        if (getenv('HTTP_X_FORWARDED_FOR') !== false
                && getenv('HTTP_X_FORWARDED_FOR') !== '') {
            return getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_CLIENT_IP') !== false 
                && getenv('HTTP_CLIENT_IP') !== '') {
            return getenv('HTTP_CLIENT_IP');
        } elseif (getenv('REMOTE_ADDR') !== false 
                && getenv('REMOTE_ADDR') !== '') {
            return getenv('REMOTE_ADDR');
        }
        return $unknown;
    }
}



/**
 * FTP���s��
 *
 * $FTP_SERVER, $FTP_USER_NAME, $FTP_USER_PASS �̒�`���K�v
 * 
 * �����@�F	$dst_file :�]����̃t�@�C���i�t���p�X�j
 * 			$src_file  :�]�����̃t�@�C���i�t���p�X�j
 * 
 * @return ture:����Afalse:���s
 */

function ssk_ftp($dst_file, $src_file) {

	global $FTP_SERVER, $FTP_USER_NAME, $FTP_USER_PASS;

	// �ڑ����m������
	$conn_id = ftp_connect($FTP_SERVER);

	// ���[�U���ƃp�X���[�h�Ń��O�C������
	$login_result = ftp_login($conn_id, $FTP_USER_NAME, $FTP_USER_PASS);

	// �ڑ��ł������m�F����
	if ((!$conn_id) || (!$login_result)) {
			$ret = false;
	} else {

		// �t�@�C�����A�b�v���[�h����
		$up_result = ftp_put($conn_id, $dst_file, $src_file, FTP_BINARY);

		// �A�b�v���[�h�󋵂��m�F����
		if (!$up_result) {
			$ret = false;
		} else {
			$ret = true;
		}

		// FTP �X�g���[�������
		ftp_close($conn_id);

	}

	return $ret;

}


/**
 * FTP�ɂč폜���s��
 *
 * $FTP_SERVER, $FTP_USER_NAME, $FTP_USER_PASS �̒�`���K�v
 * 
 * �����@�F	$dst_file :�폜����t�@�C���i�t���p�X�j
 * 
 * @return ture:����Afalse:���s
 */

function ssk_ftp_del($dst_file) {

	global $FTP_SERVER, $FTP_USER_NAME, $FTP_USER_PASS;

	// �ڑ����m������
	$conn_id = ftp_connect($FTP_SERVER);

	// ���[�U���ƃp�X���[�h�Ń��O�C������
	$login_result = ftp_login($conn_id, $FTP_USER_NAME, $FTP_USER_PASS);

	// �ڑ��ł������m�F����
	if ((!$conn_id) || (!$login_result)) {
			$ret = false;
	} else {

		// �t�@�C�����폜����
		$del_result = ftp_delete($conn_id, $dst_file);

		// �A�b�v���[�h�󋵂��m�F����
		if (!$del_result) {
			$ret = false;
		} else {
			$ret = true;
		}

		// FTP �X�g���[�������
		ftp_close($conn_id);

	}

	return $ret;

}

?>
