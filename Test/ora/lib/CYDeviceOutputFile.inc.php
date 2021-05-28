<?php

/**
 *
 * �y�[���}�X�^�f�[�^����i�f�[�^�x�[�X���t�@�C���j�֐��Q�t�@�C���z
 *     
 * CYBIRD�W���[���}�X�^�V�X�e���iDIM�j�̒[���}�X�^����CSV�t�@�C���ɏo�͂��܂�.    
 * 
 * @package default
 * @version $Id: CYDeviceOutputFile.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */
 
/**
 * 'CYUtilsDatabase.inc.php' �� require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsDatabase.inc.php';


/**
 * �f�o�C�X����CSV�t�@�C���ɒǋL����
 * 
 * DB����ԋp�����J���������啶���ł��邱�Ƃ����҂��Ă��܂�.
 * 
 * @access private
 *
 * @param resource &$handle $is_new_file �� false �̏ꍇ�����̃t�@�C���n���h��
 * @param array    $info    �f�o�C�X�����܂ޔz��
 * @param string   $filename �����o���t�@�C����, $is_new_file ��false�łȂ��ꍇ�ɂ�
 *                            ���p����Ȃ�
 * @param bool     $is_new_file �V�����t�@�C�����ǂ���������
 * 
 * @return bool ��������� true, ����ȊO�Ȃ�� false 
 */
function outputDeviceInfoToCSV(&$handle, $info, $filename='', $is_new_file = false)
{
    $header= '"contents_cyid",' . '"carrier_cyid",' 
             . '"device_name",' . '"option_name",'
             . '"option_value",' . '"device_show_name",' 
             . '"device_carrier_cyid",' 
             . '"sales_from",' . '"reg_date"' . "\n";
             
    if ($is_new_file) {
        $handle = @fopen($filename, 'wb');
        
        if ($handle === false) {
            return false;
        }
        if (!flock($handle, LOCK_EX)) {
            fclose($handle);
            return false;
        }
        if (fwrite($handle, $header, strlen($header)) === false) {
            fclose($handle);
            return false;
        }
    }
    $str = '"' . $info['CONTENTS_CYID'] . '",' . 
           '"' . $info['CARRIER_CYID'] . '",' . 
           '"' . $info['DEVICE_NAME'] . '",' . 
           '"' . $info['OPTION_NAME'] . '",' . 
           '"' . $info['OPTION_VALUE'] . '",' .
           '"' . $info['DEVICE_SHOW_NAME'] . '",' . 
           '"' . $info['DEVICE_CARRIER_CYID'] . '",' .
           '"' . $info['SALES_FROM'] . '",' . 
           '"' . $info['REG_DATE'] . '"' . "\n";

    
    if (fwrite($handle, $str, strlen($str)) === false) {
        fclose($handle);
        return false;
    }
    return true;
}

/**
 * 
 * �f�o�C�X����DB����擾����
 * 
 * �f�o�C�X���Ɉˑ�����SQL���ł���K�v�͂���܂���
 * 
 * @access private
 * 
 * @param string $sql SQL��
 * 
 * @return array ��������Ɣz��, ����ȊO�Ȃ�� false
 */
function getDeviceInfosFromDB ($sql)
{

    $con = dbConnect();
        
    if ($con === false) {
        return false;
    }

    $result_id = dbQuery($con, $sql);
        
    if ($result_id === false) {
        dbClose($con);
        return false;
    }

    $infos = fncDataGetResult($result_id);
    dbFreeResult($result_id);
    dbClose($con);

    return $infos;    
}
/**
 * DB��������擾��CSV�t�@�C���ɏo�͂���
 * 
 * @access private
 * 
 * @param string $sql SQL��
 * @param string $directory �o�̓f�B���N�g��
 * @param array  $filename_keys ��񂩂�t�@�C�����𐶐����邽�߂̃L�[��
 *                               ���ԂɊi�[���ꂽ�z��
 * @return bool ���������true, ����ȊO�Ȃ�� false  
 */
function outputCSVFromDB ($sql, $directory, $filename_keys)
{
	
    $infos = getDeviceInfosFromDB($sql);
        
    if ($infos === false) {
        return false;
    }

    $filename_work = '';

    $handle      = null;
    $is_new_file = true;

    for ($i= 0; $i < count($infos); ++$i) {
        $filename = '';
        foreach ($filename_keys as $key) {
            $filename .= $infos[$i][$key];
        }
        $filename = str_replace('/', '@', $filename);

        if ($filename_work !== $filename) {
            if (!$is_new_file) {
                fclose($handle);
            }
            $is_new_file = true;
        }

        if (!outputDeviceInfoToCSV($handle, $infos[$i], 
            $directory . '/' . $filename . '.csv', $is_new_file)) {
            fclose($handle);
            return false;
        }
        $is_new_file  = false;
        $filename_work= $filename;
    }
       
    fclose($handle);
    return true;
}

/**
 * �[���}�X�^����[�����Ƃ�CSV�t�@�C���ɏo�͂���    
 *
 * �o�̓f�B���N�g���� �u$DEV_PATH . '/device/'�v �ł�.
 * Oracle�̏ꍇ��, CYUtilsDatabase.inc.php �̊֐��𗘗p����DB�ɐڑ����܂�.
 * 
 * @global int �f�[�^�x�[�X��� 
 * @global string �[�����csv�֘A�t�H���_�ŏ�i�p�X    
 * @global string DB�z�X�g��:sybase�g�p    
 * @global string DB���[�U�[��    
 * @global string DB�p�X���[�h    
 * @global string �R���e���cID
 * 
 * @return bool ��������� true, ����ȊO�Ȃ�� false
 */
function outputDevice()
{

    global $DB_KIND, $DEV_PATH, $DB_HOST, $DB_USER, $DB_PASS,
        $DEV_CONTENTS_CYID;


                
    if ($DB_KIND == 1) {

        $sql= 'select CONTENTS_CYID, CARRIER_CYID, DEVICE_NAME, '.
             'OPTION_NAME, OPTION_VALUE, '.
             'DEVICE_SHOW_NAME, DEVICE_CARRIER_CYID, '.
             "TO_CHAR(SALES_FROM,'yyyy/mm/dd hh24:mi:ss') as SALES_FROM, ". 
             "TO_CHAR(REG_DATE,'yyyy/mm/dd hh24:mi:ss') as REG_DATE ". 
             'from CY_COM_DEVICE where CONTENTS_CYID = '.
             getSqlValue($DEV_CONTENTS_CYID) . ' ' .
             'order by CONTENTS_CYID, CARRIER_CYID, DEVICE_NAME, ' .
                    'DEVICE_SHOW_NAME, OPTION_NAME';

        return outputCSVFromDB($sql, $DEV_PATH . '/device', array(
            'CONTENTS_CYID', 'CARRIER_CYID', 'DEVICE_NAME'
              ));

    } elseif ($DB_KIND == 2) {
        $con= sybase_connect($DB_HOST, $DB_USER, $DB_PASS, 'sjis');

        $sql= 'select contents_cyid, carrier_cyid, ' .
                'device_name, ' . 
                'option_name, option_value, device_show_name, ' . 
                'device_carrier_cyid, ' . 
                "convert(char(10), sales_from, 111) + ' ' +" .
                ' convert(char(10), sales_from, 108) sales_from, ' . 
                "convert(char(10), reg_date, 111) + ' ' + " .
                'convert(char(10), reg_date, 108) reg_date ' . 
                'from cy_com_device ' . 'where contents_cyid = ' . 
                getSqlValue($DEV_CONTENTS_CYID) . ' ' .
                'order by contents_cyid, carrier_cyid, device_name, ' .
                'device_show_name, option_name';

        logSql($sql);

        $result_id = sybase_query($sql, $con);
        $num_rows  = sybase_num_rows($result_id);

        $fileName     = '';
        $fileNameWork = '';

        for ($i= 0; $i < $num_rows; ++$i) {
            $info= sybase_fetch_array($result_id);
          
            $contentsCyid      = $info['contents_cyid'];
            $carrierCyid       = $info['carrier_cyid'];
            $deviceName        = $info['device_name'];
            $optionName        = $info['option_name'];
            $optionValue       = $info['option_value'];
            $deviceShowName    = $info['device_show_name'];
            $deviceCarrierCyid = $info['device_carrier_cyid'];
            $salesFrom         = $info['sales_from'];
            $regDate           = $info['reg_date'];
            
            $fileName= $contentsCyid . $carrierCyid . $deviceName;

            if ($fileNameWork != $fileName) {
                $str= '"contents_cyid",' . '"carrier_cyid",' 
                    . '"device_name",' . '"option_name",'
                    . '"option_value",' . '"device_show_name",' 
                    . '"device_carrier_cyid",' 
                    . '"sales_from",' . '"reg_date"' . "\n";
                $fp= @fopen($DEV_PATH . '/device/' .
                     str_replace('/', '@', $fileName) . '.csv', 'w');
                flock($fp, 2);
                fwrite($fp, $str, strlen($str));
                flock($fp, 3);
                fclose($fp);
            }

            $str= "\"" . $contentsCyid . "\"," . 
                "\"" . $carrierCyid . "\"," .
                "\"" . $deviceName . "\"," .
                "\"" . $optionName . "\"," . 
                "\"" . $optionValue . "\"," . 
                "\"" . $deviceShowName . "\"," . 
                "\"" . $deviceCarrierCyid . "\"," . 
                "\"" . $salesFrom . "\"," . 
                "\"" . $regDate . "\"" . "\n";
            $fp= @fopen($DEV_PATH . 
                '/device/' . str_replace('/', '@', $fileName) . '.csv', 'a');
            flock($fp, 2);
            fwrite($fp, $str, strlen($str));
            flock($fp, 3);
            fclose($fp);

            $fileNameWork= $fileName;
        }
        return true;
    }
    return false;        
}

/**
 * �[���}�X�^���𑮐��P�ʂ�CSV�t�@�C���ɏo�͂���   
 *  
 * �o�̓f�B���N�g���́u$DEV_PATH . '/option/'�v �ł�.
 * Oracle�̏ꍇ��, CYUtilsDatabase.inc.php �̊֐��𗘗p����DB�ɐڑ����܂�.
 *
 * @global int �f�[�^�x�[�X��� 
 * @global string �[�����csv�֘A�t�H���_�ŏ�i�p�X    
 * @global string DB�z�X�g��:sybase�g�p    
 * @global string DB���[�U�[��    
 * @global string DB�p�X���[�h    
 * @global string �R���e���cID 
 *
 * @return bool ��������� true, ����ȊO�Ȃ�� false
 */
function outputOption()
{

    global $DB_KIND, $DEV_PATH, $DB_HOST, $DB_USER, $DB_PASS,
         $DEV_CONTENTS_CYID;
         
    if ($DB_KIND == 1) {

        $sql= 'select CONTENTS_CYID, CARRIER_CYID, DEVICE_NAME, '.
             'OPTION_NAME, OPTION_VALUE, '.
             'DEVICE_SHOW_NAME, DEVICE_CARRIER_CYID, '.
             "TO_CHAR(SALES_FROM,'yyyy/mm/dd hh24:mi:ss') as SALES_FROM, ". 
             "TO_CHAR(REG_DATE,'yyyy/mm/dd hh24:mi:ss') as REG_DATE ". 
             'from CY_COM_DEVICE where CONTENTS_CYID = '.
             getSqlValue($DEV_CONTENTS_CYID) . ' ' .
             'order by CONTENTS_CYID, CARRIER_CYID, OPTION_NAME, ' .
             'DEVICE_NAME, DEVICE_SHOW_NAME';

        return outputCSVFromDB($sql, $DEV_PATH . '/option', array(
            'CONTENTS_CYID', 'CARRIER_CYID', 'OPTION_NAME'
              ));


    } elseif ($DB_KIND == 2) {
        $con= sybase_connect($DB_HOST, $DB_USER, $DB_PASS, 'sjis');

        $sql= 'select ' . 'contents_cyid, ' . 'carrier_cyid, ' . 'device_name, ' .
         'option_name, ' . 'option_value, ' . 'device_show_name, ' .
         'device_carrier_cyid, ' .
         "convert(char(10), sales_from, 111) + ' ' + convert(char(10)," .
         ' sales_from, 108) sales_from, ' . 
         "convert(char(10), reg_date, 111) + ' ' + convert(char(10), " .
         'reg_date, 108) reg_date ' . 'from cy_com_device ' . 
         'where contents_cyid = ' . getSqlValue($DEV_CONTENTS_CYID) . ' ' .
         'order by contents_cyid, carrier_cyid, option_name, ' .
         'device_name, device_show_name';

        logSql($sql);

        $result_id= sybase_query($sql, $con);
        $num_rows= sybase_num_rows($result_id);

        $fileName= '';
        $fileNameWork= '';

        for ($i= 0; $i < $num_rows; ++$i) {
            $info= sybase_fetch_array($result_id);

            $contentsCyid      = $info['contents_cyid'];
            $carrierCyid       = $info['carrier_cyid'];
            $deviceName        = $info['device_name'];
            $optionName        = $info['option_name'];
            $optionValue       = $info['option_value'];
            $deviceShowName    = $info['device_show_name'];
            $deviceCarrierCyid = $info['device_carrier_cyid'];
            $salesFrom         = $info['sales_from'];
            $regDate           = $info['reg_date'];
            
            $fileName= $contentsCyid . $carrierCyid . $optionName;

            if ($fileNameWork != $fileName) {
                $str= "\"contents_cyid\"," . "\"carrier_cyid\"," .
                 "\"device_name\"," . "\"option_name\"," . 
                "\"option_value\"," . "\"device_show_name\"," . 
                "\"device_carrier_cyid\"," . "\"sales_from\"," .
                 "\"reg_date\"" . "\n";
                $fp= @fopen($DEV_PATH . '/option/' .
                  str_replace('/', '@', $fileName) . '.csv', 'w');
                flock($fp, 2);
                fwrite($fp, $str, strlen($str));
                flock($fp, 3);
                fclose($fp);
            }

            $str= "\"" . $contentsCyid . "\"," .
                "\"" . $carrierCyid . "\"," . 
                "\"" . $deviceName . "\"," . 
                "\"" . $optionName . "\"," .
                "\"" . $optionValue . "\"," . 
                "\"" . $deviceShowName . "\"," .
                "\"" . $deviceCarrierCyid . "\"," .
                "\"" . $salesFrom . "\"," .
                "\"" . $regDate . "\"" . "\n";
            $fp= @fopen($DEV_PATH . '/option/' . 
                str_replace('/', '@', $fileName) . '.csv', 'a');
            flock($fp, 2);
            fwrite($fp, $str, strlen($str));
            flock($fp, 3);
            fclose($fp);

            $fileNameWork= $fileName;
        }
        return true;
    }
    return false;
}

/**
 * �T�C�g�Ή��[������CSV�t�@�C���ɏo�͂���   
 *  
 * �o�̓f�B���N�g���� �u$DEV_PATH . '/option/'�v�ł�.
 * Oracle�̏ꍇ��, CYUtilsDatabase.inc.php �̊֐��𗘗p����DB�ɐڑ����܂�.
 *
 * $DEV_PATH(�[�����csv�֘A�t�H���_�ŏ�i�p�X)    
 * @global int �f�[�^�x�[�X��� 
 * @global string �[�����csv�֘A�t�H���_�ŏ�i�p�X    
 * @global string DB�z�X�g��:sybase�g�p    
 * @global string DB���[�U�[��    
 * @global string DB�p�X���[�h    
 * @global string �R���e���cID 
 *
 * @return bool ��������� true, ����ȊO�Ȃ�� false
 */
function outputSiteSupport()
{

    global $DB_KIND, $DEV_PATH, $DB_HOST, $DB_USER, $DB_PASS,
        $DEV_CONTENTS_CYID;

    if ($DB_KIND == 1) {
        
        $sql= 'select CONTENTS_CYID, CARRIER_CYID, DEVICE_NAME, '.
             "'Unnecessary ' AS OPTION_NAME, '0 ' AS OPTION_VALUE, ".
             'DEVICE_SHOW_NAME, DEVICE_CARRIER_CYID, '.
             "TO_CHAR(SALES_FROM,'yyyy/mm/dd hh24:mi:ss') as SALES_FROM, ". 
             "TO_CHAR(REG_DATE,'yyyy/mm/dd hh24:mi:ss') as REG_DATE ". 
             'from CY_COM_DEVICE where CONTENTS_CYID = '.
             getSqlValue($DEV_CONTENTS_CYID) . ' ' .
             'group by DEVICE_NAME, DEVICE_SHOW_NAME, ' .
             'CONTENTS_CYID, CARRIER_CYID, ' .
             'DEVICE_CARRIER_CYID, SALES_FROM, REG_DATE '.
             'order by CONTENTS_CYID, CARRIER_CYID, ' .
             'DEVICE_NAME, DEVICE_SHOW_NAME';

        return outputCSVFromDB($sql, $DEV_PATH . '/option', array(
            'CONTENTS_CYID', 'CARRIER_CYID'
              ));

    } elseif ($DB_KIND == 2) {
        $con= sybase_connect($DB_HOST, $DB_USER, $DB_PASS, 'sjis');

        $sql= 'select ' . 'contents_cyid, ' . 'carrier_cyid, ' . 'device_name, ' .
         'device_show_name, ' . 'device_carrier_cyid, ' .
          "convert(char(10), sales_from, 111) + ' ' +" .
          ' convert(char(10), sales_from, 108) sales_from, ' . 
        "convert(char(10), reg_date, 111) + ' ' +" .
        ' convert(char(10), reg_date, 108) reg_date ' .
         'from cy_com_device ' . 'where contents_cyid = '.
        getSqlValue($DEV_CONTENTS_CYID) . ' ' .
        'group by device_name, device_show_name, contents_cyid, carrier_cyid ,' .
        'device_carrier_cyid, sales_from,reg_date ' .
        '' . 'order by contents_cyid, carrier_cyid, device_name, device_show_name ';

        logSql($sql);

        $result_id= sybase_query($sql, $con);
        $num_rows= sybase_num_rows($result_id);

        $fileName= '';
        $fileNameWork= '';

        for ($i= 0; $i < $num_rows; ++$i) {
            $info= sybase_fetch_array($result_id);

            $contentsCyid = $info['contents_cyid'];
            $carrierCyid  = $info['carrier_cyid'];
            $deviceName   = $info['device_name'];
            $optionName   = $info['option_name'];
            //            $optionValue       = $info['option_value'];
            $deviceShowName    = $info['device_show_name'];
            $deviceCarrierCyid = $info['device_carrier_cyid'];
            $salesFrom         = $info['sales_from'];
            $regDate           = $info['reg_date'];

            $fileName= $contentsCyid . $carrierCyid . $optionName;

            if ($fileNameWork != $fileName) {
                $str= "\"contents_cyid\"," . "\"carrier_cyid\"," . 
                "\"device_name\"," . "\"option_name\"," . 
                "\"option_value\"," . "\"device_show_name\"," . 
                "\"device_carrier_cyid\"," . "\"sales_from\"," . 
                "\"reg_date\"" . "\n";
                $fp= @fopen($DEV_PATH . '/option/' . 
                    str_replace('/', '@', $fileName) . '.csv', 'w');
                flock($fp, 2);
                fwrite($fp, $str, strlen($str));
                flock($fp, 3);
                fclose($fp);
            }

            $str= "\"" . $contentsCyid . "\"," .
                 "\"" . $carrierCyid . "\"," . 
                 "\"" . $deviceName . "\"," .
                 "\"Unnecessary \"," . "\"0 \"," .
                 "\"" . $deviceShowName . "\"," .
                 "\"" . $deviceCarrierCyid . "\"," .
                 "\"" . $salesFrom . "\"," . 
                 "\"" . $regDate . "\"" . "\n";
            $fp= @fopen($DEV_PATH . '/option/' . 
                str_replace('/', '@', $fileName) . '.csv', 'a');
            flock($fp, 2);
            fwrite($fp, $str, strlen($str));
            flock($fp, 3);
            fclose($fp);

            $fileNameWork= $fileName;
        }
        return true;
    }
    return false;
}
?>
