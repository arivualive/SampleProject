<?php

/**
 * �y�[����񑀍�֐��Q�t�@�C���z
 *
 * @package default
 * @version $Id: CYUtilsDevice.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */
 
/**
 * 'CYDeviceInfoFile.inc.php' �� require_once
 */ 
require_once dirname(__FILE__). '/CYDeviceInfoFile.inc.php';

/**
 * �Ή��[�����ǂ����`�F�b�N����
 * 
 * ��Ή��[���̏ꍇ�͔�Ή��[���y�[�W��\����, exit����
 * 
 * @global string header�C���N���[�h�t�@�C��
 * @global string �G���[�t�@�C��
 * @global string footer�C���N���[�h�t�@�C��
 * @global string �T�C�g�Ή����f�t���O
 * @global string ��Ή��[�����m�点��ʂ��₢���킹URL
 * @global string ��Ή��[�����m�点��ʉ��URL
 * @global string �L�����A�ʋ���URL�p�����[�^
 * @global array  �[�����CSV�̃I�v�V�����l�i�[�z��
 * @global string �R���e���c����
 * @global string �R�s�[���C�g������
 * 
 * @param string $site_support_option �T�C�g�Ή��[������option(�ȗ��\�B)
 * 
 * @return bool  ��Ή��y�[�W�̕\�����s�Ȃ�Ȃ������ꍇ��true
 */
function chkDevice($site_support_option='') 
{
    global $HEADER_FILE, $DEVICE_ERROR_FILE, 
        $FOOTER_FILE,$CYPS_site_support_flag,
        $UNSUPPORT_DEV_INQUIRY_URL, $UNSUPPORT_DEV_UNREG_URL, 
        $URL_PARAM, $CYPS_OPTION_VALUE,
        $CONTENTS_NAME, $COPYRIGHT_STR;

    if ($CYPS_site_support_flag === false) {
        //��Ή��y�[�W�̕\��
        include_once $HEADER_FILE;
        include_once $DEVICE_ERROR_FILE;
        include_once $FOOTER_FILE;
        exit;
    }

    /*
     * �T�C�g�Ή��[���̏������u�[��.csv�����݂��邱�Ɓv�ȊO�̏����ł���ꍇ�A
     * ���L���W�b�N��ʂ�
     */ 
    
    if (strlen($site_support_option) > 0) {
        if ($CYPS_OPTION_VALUE[$site_support_option] == '' 
            || $CYPS_OPTION_VALUE[$site_support_option] == 'NG') {
            //��Ή��y�[�W�̕\��
            include_once $HEADER_FILE;
            include_once $DEVICE_ERROR_FILE;
            include_once $FOOTER_FILE;
            exit;
        }
    }
    
    return true;
}


/**
 * �[�������擾����
 * 
 * �Ή��[���̈ꗗ���O���[�o���Ȕz�� $CYPS_OPTION_VALUE �Ɋi�[���܂�.
 * 
 * @global string �L�����AID
 * @global string �R���e���cID
 * @global string �R���e���c�^�p�����L�����AID
 * @global string (�V���v����)�[����
 * @global string �[����
 * @global string �R���e���cID
 * @global string CYPS�̃L�����AID
 * @global string �[����
 * @global string �\���p�[����
 * @global string CYPS�̃f�o�C�X�̃L�����AID
 * @global string �[��������
 * @global string �o�^����
 * @global bool   �[����.csv�L���t���O=�T�C�g�Ή��L��
 * @global array  �[�����CSV�̃I�v�V�����l�i�[�z��
 * @global array  �[�����擾�\�������z�� (�W���J���ݒ�t�@�C���Ő錾)
 * 
 * @return void 
 */
function getDeviceInfo()
{
    global $CARRIER_ID, $CONTENTS_CYID,
        $carrierCyid, $simpleDevice, $deviceName,
        $CYPS_contents_cyid, $CYPS_carrier_cyid, $CYPS_device_name, 
        $CYPS_device_show_name, $CYPS_device_carrier_cyid, 
        $CYPS_sales_from, $CYPS_reg_date,
        $CYPS_site_support_flag,
        $CYPS_OPTION_VALUE,$DEV_OPTION_NAME;

    // �R���e���c�^�p�����L�����AID���擾����
    switch ($CARRIER_ID) {
        case 'i':
            $carrierCyid = '10';
            break;
        case 'v':
            $carrierCyid = '30';
            break;
        case 'e':
            $carrierCyid = '20';
            break;
        case 'w':
            $carrierCyid = '60';
            break;
        default:
            break;
    }

    // �[�������擾����
    $deviceName   = $_SERVER['HTTP_X_CY_DEVICE'];
    $simpleDevice = $_SERVER['HTTP_X_CY_SIMPLE_DEVICE'];

    // �[��������[�������擾����
    $deviceMapCYPS = getHashMap($CONTENTS_CYID, $carrierCyid);

    //�[����.csv�̗L�����f�t���O���擾
    if (array_key_exists('dev_file_exist_flag', $deviceMapCYPS)) {
        $CYPS_site_support_flag = $deviceMapCYPS['dev_file_exist_flag'];
    }    
    if (array_key_exists('contents_cyid', $deviceMapCYPS)) {
         $CYPS_contents_cyid = $deviceMapCYPS['contents_cyid'];          
    }
    if (array_key_exists('carrier_cyid', $deviceMapCYPS)) {
        $CYPS_carrier_cyid = $deviceMapCYPS['carrier_cyid'];          
    }
    if (array_key_exists('device_name', $deviceMapCYPS)) {
         $CYPS_device_name = $deviceMapCYPS['device_name'];            
    }
    if (array_key_exists('device_show_name', $deviceMapCYPS)) {
        $CYPS_device_show_name = $deviceMapCYPS['device_show_name'];       
    }
    if (array_key_exists('device_carrier_cyid', $deviceMapCYPS)) {
         $CYPS_device_carrier_cyid = $deviceMapCYPS['device_carrier_cyid']; 
    }
    if (array_key_exists('sales_from', $deviceMapCYPS)) {
        $CYPS_sales_from = $deviceMapCYPS['sales_from'];
    }
    if (array_key_exists('reg_date', $deviceMapCYPS)) {
        $CYPS_reg_date = $deviceMapCYPS['reg_date'];
    }

    if (is_array($DEV_OPTION_NAME)) {
        //csv�t�@�C���̃I�v�V�����l���擾
        foreach ($DEV_OPTION_NAME as $name) {
            if (array_key_exists($name, $deviceMapCYPS)) {
                $CYPS_OPTION_VALUE[$name] = $deviceMapCYPS[$name];
            } else {
                $CYPS_OPTION_VALUE[$name] = '';
            }
        }
    }

}



/**
 * �摜�t�@�C���̉��p�X������t�@�C����T�������擾����
 * 
 * @param string $path �摜�p�X
 * @return array ���̌`���̔z��
 *  'flag' => �t�@�C�����ݗL���t���O�A
 *  'path' => �t�@�C�������݂���摜�p�X
 * �i���݂��Ȃ��ꍇ�Anull��Ԃ�,
 * 'ext' => �g���q
 */
function getPathImage($path)
{
    $ext_list = array('jpg', 'jpz', 'gif', 
        'png', 'pnz', 'bmp');
    
    $exist_file         = array();
    $exist_file['flag'] = 0;
    
    $pathinfo = pathinfo($path);
    
    if (file_exists($path)) {
        $exist_file['flag'] = 1;
        $exist_file['path'] = $path;
        if (isset($pathinfo['extension'])) {
            $exist_file['ext'] = $pathinfo['extension'];
        } else {
            $exist_file['ext'] = '';
        }
    } else {
        
        if (isset($pathinfo['extension'])) {
            $base = substr($pathinfo['dirname'] . '/' . $pathinfo['basename'], 
                0, -strlen($pathinfo['extension']));
        } else {
            $base = $pathinfo['dirname'] . '/' . $pathinfo['basename'] . '.';
        }
                
        foreach ($ext_list as $ext) {
            if (file_exists($base . $ext)) {
                $exist_file['path'] = $base . $ext;
                $exist_file['ext']  = $ext;
                $exist_file['flag'] = 1;
                break;
            }
        }
    }
    return $exist_file;
}


/**
 * �����ɑΉ�����[���̈ꗗ���擾����
 * 
 * @access private
 * 
 * @global string �R���e���cID
 * @global string �R���e���c�^�p�����L�����AID 
 * 
 * @param string $option �T�C�g�Ή��[������option
 * @param bool $forceUseOption   $option����ł�getMatchOptionDeviceHash()��p���邩�ǂ����̃t���O
 * 
 * @return string �Ή��[���̈ꗗ��'<samp><br></samp>'�ŘA�����ꂽ������
 */
function getDeviceList($option='', $forceUseOption = false)
{
    global $CONTENTS_CYID, $carrierCyid;

    // �T�C�g�Ή��[���ꗗ���擾����i/device/option/XXXX.csv�j
    setPermitNoSaleOFF();
    setPermitSalesNullOFF();
    if (!$forceUseOption && strlen($option) === 0) {
        $deviceMapSite = 
            getMatchSiteSupportDeviceHash($CONTENTS_CYID, $carrierCyid);
    } else {
        $deviceMapSite = 
            getMatchOptionDeviceHash($CONTENTS_CYID, $carrierCyid, 
                                $option, 'NG', '!=');
    }

    //�T�C�g�Ή��[���ꗗ��ϐ��Ɋi�[
    $deviceList = '';
    foreach ($deviceMapSite as $device) {
        if ($device !== 'PC�[���u���E�U') {
            $deviceList .= $device . '<br>';
        }
    }
    return $deviceList;
}



/**
 * �T�C�g���Ή�����[���̈ꗗ���擾����.
 * 
 *
 * @param string $site_support_option �T�C�g�Ή��[������option(�ȗ��\)
 * @return string �Ή��[���ꗗ�̈ꗗ��'<samp><br></samp>'�ŘA�����ꂽ������
 */
function getDeviceListSite($site_support_option='')
{
    return getDeviceList($site_support_option);
}


/**
 * �w�肳�ꂽ�f�ނ̑Ή��[���ꗗ���擾����
 * 
 * 
 * @param string $option_name �[�����.csv��option_name�B
 *          ��{�I��GRP(�f�ރO���[�v)���w�肷��B(�ȗ��\)
 * @return string �Ή��[���ꗗ�̈ꗗ��'<samp><br></samp>'�ŘA�����ꂽ������
 */
function getDeviceListObj($option_name)
{
    return getDeviceList($option_name, true);
}

/**
 * ez-web��HDML�[�����ǂ����̃t���O���擾����
 * 
 * TODO: ��蒼��
 * 
 * @global string �L�����AID
 * @global string ���[�U�[�G�[�W�F���g
 * @global bool   PC���ۂ�
 * 
 * @return bool HDML�[���ł����true�B����ȊO��false
 */
function getHdmlFlag()
{
    global $CARRIER_ID, $USER_AGENT_DEF, $PC_MODE;

    //hdml�[������
    if ($PC_MODE === false && $CARRIER_ID === 'e') {
        //�}�b�`���Ȃ����HDML�[���Ɣ���
        if (preg_match('/^KDDI/i', $USER_AGENT_DEF)===0) {
            return true;
        }
    }
    return false;
}


/**
 * i-mode��Foma�[�����ǂ����̃t���O���擾����
 * 
 * @global string �L�����AID
 * @global string ���[�U�[�G�[�W�F���g
 * 
 * @return bool Foma�[���ł����true ����ȊO��false
 */
function getFomaFlag()
{
    global $CARRIER_ID, $USER_AGENT_DEF;

    if ($CARRIER_ID === 'i') {
        if (preg_match('/^DoCoMo\/2.0/i', $USER_AGENT_DEF) === 1) {
            //FOMA�̏���
            return true;
        }
    }
    return false;
}


/**
 * Softbank 3GC�[�����ǂ����̃t���O���擾����B
 * 
 * mod_cy_core�̎g�p��O��Ƃ��܂�.
 * 
 * @global string �L�����AID
 * 
 * @return boolean 3GC�[���ł����true ����ȊO��false
 */
function get3gcFlag() 
{
    global $CARRIER_ID;

    if ($CARRIER_ID === 'v') {
        if (isset($_SERVER['HTTP_X_CY_IS_V3GC']) 
            && $_SERVER['HTTP_X_CY_IS_V3GC'] === '1') {
            return true;                
        }
    }
    return false;
}

?>
