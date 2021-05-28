<?php

/**
 * �y�[���}�X�^�f�[�^����i�t�@�C�����R���e���c�j �֐��Q�t�@�C���z
 * 
 * CYBIRD�W���[���}�X�^�V�X�e���iDIM�j�Ǘ��f�[�^���R���e���c���֒񋟂��܂�.
 * �Ǘ��f�[�^��, CYDeviceOutputFile.inc.php�̊֐��ɂ����
 * �f�[�^�t�@�C��������Ă��邱�Ƃ�O��Ƃ��Ă��܂�.
 * 
 * @package default
 * @version $Id: CYDeviceInfoFile.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */

/**
 * �����O�̒[�����擾��������
 * 
 * �ϐ� $permitNoSale �� '1' ��ݒ肵�܂�.
 * 
 * @global string �����O�[�����擾���t���O
 * 
 * @return void
 */
function setPermitNoSaleON()
{ 
    global $permitNoSale;

    $permitNoSale = '1';
}

/**
 * �����O�̒[�����擾�����ۂ���
 * 
 * �ϐ� $permitNoSale �� '0' ��ݒ肵�܂�.
 * 
 * @global string �����O�[�����擾���t���O
 * 
 * @return void 
 */
function setPermitNoSaleOFF()
{
    global $permitNoSale;

    $permitNoSale = '0';
}

/**
 * ���������ݒ�̒[�����擾��������
 * 
 * �ϐ� $permitSalesNull �� '1' ��ݒ肵�܂�.
 *
 * @global string ���������ݒ���擾���t���O
 * 
 * @return void
 */
function setPermitSalesNullON()
{
    global $permitSalesNull;

    $permitSalesNull = '1';
}

/**
 * ���������ݒ�̒[�����擾�����ۂ���
 * 
 * �ϐ� $permitSalesNull �� '0'��ݒ肵�܂�.
 * 
 * @global string ���������ݒ���擾���t���O
 * 
 * @return void
 */
function setPermitSalesNullOFF()
{
    global $permitSalesNull;

    $permitSalesNull = '0';
}

/**
 * �[���������ƌ��݂��r����񂪎擾�\������������
 * 
 * �����O�[�����擾���t���O�E���������ݒ���擾���t���O��
 * �����̔�����������, ���ݓ�����������擾�\�����������܂�. 
 * 
 * @access private
 * 
 * @global string �����O�[�����擾���t���O
 * @global string ���������ݒ���擾���t���O
 * 
 * @param string $date ������������
 * @return bool ���擾�Ȃ�true, �s�Ȃ�false
 */
function chkSalesInfo($date)
{
    global $permitNoSale,$permitSalesNull;


    if ($permitNoSale === '0') {
        if ($permitSalesNull === '1' && $date === '') {
            return true;
        }
        if (preg_match('/^\d{4}\/\d{2}\/\d{2} \d{2}:\d{2}:\d{2}$/', 
                    $date) !== 1) {
            return false;
        }
        if (strcmp(date('Y/m/d') . ' 00:00:00', $date) < 0 ) {
            return false;
        }
    }
    
    if ($permitSalesNull === '0') {
        if ($date === '') {
            return false;
        }
    }
    return true;
    
}

/**
 * CSV�t�@�C������2�����z����쐬����
 * 
 * CSV�t�@�C���̓��e���s, ��̏��Ɋi�[����2�����z����쐬���܂�.
 * CSV�t�@�C����1�s�ڂ͔�΂��܂�. 
 * 
 * @access private
 * 
 * @param string $filename CSV�t�@�C��
 * @param int    $column_num      CSV�t�@�C����1�s�̗�
 * @return array CSV�t�@�C���̓��e���s, ��̏��Ɋi�[����2�����z��
 *                �G���[���N�����ꍇ, �Ԃ���񂪂Ȃ��ꍇ�ɂ� false ��Ԃ�
 */

function csvTo2DArray ($filename, $column_num)
{
    if (!is_file($filename) || !is_readable($filename)) {
        return false;            
    }

    $handle = @fopen($filename, 'rb');
    if ($handle === false) {
        return false;
    }

    if (!flock($handle, LOCK_SH)) {
        fclose($handle);
        return false;
    }
    
    //1�s�ڂ͔�΂�.
    if (fgets($handle) === false) {
        fclose($handle);
        return false;
    }
    $infos = array();
    /*
     * fgetcsv() �̑�2�������w�肵�Ȃ��ƃ��������g���ʂ��� 
     * Fatal error: Allowed memory size of 8388608 bytes exhausted
     * TODO: fgetcsv()�̑�2������ 8192 �ł悢���͋^��
     */
    while (($info = fgetcsv($handle, 8192)) !== false) {
        if (count($info) !== $column_num) {
            fclose($handle);
            return false;
        }
        $infos[] = $info;
    }
    fclose($handle);
    
    if (empty($infos)) {
        return false;
    }
    return $infos;    
}


/**
 * �R���e���c�^�p����ID�ƃR���e���c�^�p�����L�����AID, 
 * �f�o�C�X�����猈�肳���1�@��̔z�M���z����擾����
 * 
 * @global string �[�����csv�֘A�t�H���_�ŏ�i�p�X
 * @global string �f�o�C�X��
 *
 * @param string $contentsCyId �R���e���c�^�p����ID
 * @param string $carrierCyId �R���e���c�^�p�����L�����AID
 * 
 * @return array �擾�����P�@��̔z�M���A�z�z��B
 *          �A�z�z��̃L�[�́A�[�����e�[�u���ɏ����܂�.
 *          �[��csv�t�@�C�����Ȃ���񂪎擾�ł��Ȃ��ꍇ��,
 *          �L�[ 'dev_file_exist_flag' �� false �ƂȂ�܂�.
 */
function getHashMap($contentsCyId, $carrierCyId)
{
    global $DEV_PATH,$simpleDevice;

    $map = array();
     //�[��csv�t�@�C���Ȃ��Ƃ݂Ȃ��ꍇ�̃t���O
    $map['dev_file_exist_flag'] = false;
    
    $filename = $DEV_PATH . '/device/' 
        . str_replace('/', '@', $contentsCyId. $carrierCyId. $simpleDevice) . '.csv';

    $infos = csvTo2DArray($filename, 9);
    
    if (empty($infos)) {
        return $map;
    }

    $init = true;    

    foreach ($infos as $info) {
    
        if ($init) {
            $map['contents_cyid']       = $info[0];
            $map['carrier_cyid']        = $info[1];
            $map['device_name']         = $info[2];
            $map['device_show_name']    = $info[5]; 
            $map['device_carrier_cyid']= $info[6]; 
            $map['sales_from'] = $info[7];
            $map['reg_date']   = $info[8];

            if (!chkSalesInfo($map['sales_from'])) {
                return array();
            }            
                        
            $init = false;
        }
       
        $map[$info[3]] = $info[4];

    }
    // 0�s��1�s�̃t�@�C���łȂ�������
    //�[��csv�t�@�C������ƍŏI�I�ɂ݂Ȃ�
    if (!$init) {
        $map['dev_file_exist_flag'] = true;
    }

    return $map;
}

/**
 * $device_name, $device_show_name �� �����ɉ�����
 * $deviceNameArray, $deviceShowNameArray �ɒǉ�����.
 * 
 * @access private
 * 
 * @param string  $deviceName CSV�t�@�C������ǂݍ��� device_name
 * @param string  $deviceShowName CSV�t�@�C������ǂݍ��� device_show_name
 * @param string  $deviceOptionValue CSV�t�@�C������ǂݍ��񂾃f�o�C�X�� option_value
 * @param string  $salesFrom  CSV�t�@�C������ǂݍ��񂾃f�o�C�X�̔��������
 * @param array   &$deviceNameArray �f�o�C�X���̔z��
 * @param array   &$deviceShowNameArray �f�o�C�X�\�����̔z��
 * @param bool    $doCompare      option_value�̔�r�����邩�ǂ���   
 * @param string  $signOptionValue ��r�̎��
 * @param string  $optionValue     ��r�Ώۂ� option_value �l
 * 
 * @return bool   �������s�Ȃ����ꍇ�� true, ����ȊO�� false
 */
function addDeviceNamesToArraies($deviceName, $deviceShowName, 
    $deviceOptionValue, $salesFrom,  
    &$deviceNameArray, &$deviceShowNameArray,
    $doCompare = false,
    $signOptionValue='', $optionValue='')
{

            // �f�o�C�X������, ���ɏ��������f�o�C�X, ���������ɖ�肪����Δ�΂�
    if ($deviceName === '' 
        || in_array($deviceName, $deviceNameArray) 
        || in_array($deviceShowName, $deviceShowNameArray) 
        || !chkSalesInfo($salesFrom)) {
        return false;
            }

    if ($doCompare) {
        $do_add = false;
        switch ($signOptionValue) {
            case '=':
                if ($optionValue === $deviceOptionValue) {
                    $do_add = true;
                }
                break;
            case '!=':
                if ($optionValue !== $deviceOptionValue) {
                    $do_add = true;
                }
                break;
            default:
                break;
        }
    } else {
        $do_add = true;
    }

    if ($do_add === true) {
        if ($deviceShowName !== '') {
            // �d���͍Ō�� array_unique() �ŏ���
            $deviceShowNameArray[] = $deviceShowName;
        } else {
            $deviceNameArray[] = $deviceName;
        }
    }
    return true;
}

/**
 * �R���e���c�^�p����ID�ƃR���e���c�^�p�����L�����AID�ɓo�^����Ă���
 * �[����񂩂�����𖞂������̂��擾����B
 *
 *  �����͈ȉ��̒ʂ�ł�.
 * �E�p�����[�^�[�Ŏw�肳�ꂽ�z�M�������̔z�M�����l
 * �E�p�����[�^�[�Ŏw�肳�ꂽ�����Ȃ����s����('=', '!=')
 * �E�p�����[�^�[�Ŏw�肳�ꂽ�z�M�����l
 * 
 * @global string �[�����csv�֘A�t�H���_�ŏ�i�p�X
 * 
 * @param string $contentsCyId �R���e���c�^�p����ID 
 * @param string $carrierCyId �R���e���c�^�p�����L�����AID 
 * @param string $optionName �z�M������
 * @param string $optionValue �z�M�����l
 * @param string $signOptionValue ���� '=' �Ȃ��� �s���� '!='
 *         (�̂̎d�l�ł͗��p�ł����召�L�� '<', '<=', '>'. '>=' ��
 *          �����ɂȂ�܂���.)
 * @return array �����𖞂����z�M���z��. 
 */
function getMatchOptionDeviceHash($contentsCyId, $carrierCyId, $optionName, 
                $optionValue, $signOptionValue) 
{

    global $DEV_PATH;

    // '=', '!=', '' �݂̂��󂯂���.
    if ($signOptionValue === '') {
        $signOptionValue = '=';
    }
    if ($signOptionValue !== '=' &&  $signOptionValue !== '!=' ) {
        return array();
    }
    
    $deviceNameArray = array();        // device_name �i�[�z��
    $deviceShowNameArray= array();        // device_show_name �i�[�z��

    $filename = $DEV_PATH . '/option/' .
        str_replace('/', '@', $contentsCyId . $carrierCyId . $optionName) . '.csv'; 
    $infos = csvTo2DArray($filename, 9);
    
    if (empty($infos)) {
        return array();
    }

    foreach ($infos as $info) {
            
        addDeviceNamesToArraies($info[2], $info[5], $info[4], $info[7],
            $deviceNameArray, $deviceShowNameArray, true,
            $signOptionValue, $optionValue);
            
    }   
    if (count($deviceShowNameArray) > 0) {
        $deviceShowNameArray = array_unique($deviceShowNameArray);        
        sort($deviceShowNameArray);
    }
    return $deviceShowNameArray;
}

/**
 * �R���e���c�^�p����ID�ƃR���e���c�^�p�����L�����AID��
 * �o�^����Ă���[�������擾����
 * 
 * @global string �[�����csv�֘A�t�H���_�ŏ�i�p�X
 * 
 * @param string $contentsCyId �R���e���c�^�p����ID
 * @param string $carrierCyId �R���e���c�^�p�����L�����AID
 * @return array �擾�����z�M���z��(�[���\����)
 */
function getMatchSiteSupportDeviceHash($contentsCyId, $carrierCyId)
{
    global $DEV_PATH;

    $deviceNameArray = array();        // device_name �i�[�z��
    $deviceShowNameArray= array();        // device_show_name �i�[�z��

    $filename = $DEV_PATH . '/option/' .
        str_replace('/', '@', $contentsCyId . $carrierCyId) . '.csv'; 
    $infos = csvTo2DArray($filename, 9);
    
    if (empty($infos)) {
        return array();
    }
    
    foreach ($infos as $info) {
        addDeviceNamesToArraies($info[2], $info[5], $info[4], $info[7],
            $deviceNameArray, $deviceShowNameArray);
    }
       
    if (count($deviceShowNameArray) > 0) {
        $deviceShowNameArray = array_unique($deviceShowNameArray);        
        sort($deviceShowNameArray);
    }
    return $deviceShowNameArray;
}

?>
