<?php

/**
 *
 * 【端末マスタデータ操作（データベース→ファイル）関数群ファイル】
 *     
 * CYBIRD標準端末マスタシステム（DIM）の端末マスタ情報をCSVファイルに出力します.    
 * 
 * @package default
 * @version $Id: CYDeviceOutputFile.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */
 
/**
 * 'CYUtilsDatabase.inc.php' の require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsDatabase.inc.php';


/**
 * デバイス情報をCSVファイルに追記する
 * 
 * DBから返却されるカラム名が大文字であることを期待しています.
 * 
 * @access private
 *
 * @param resource &$handle $is_new_file が false の場合既存のファイルハンドル
 * @param array    $info    デバイス情報を含む配列
 * @param string   $filename 書き出すファイル名, $is_new_file がfalseでない場合には
 *                            利用されない
 * @param bool     $is_new_file 新しいファイルかどうかを示す
 * 
 * @return bool 成功すると true, それ以外ならば false 
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
 * デバイス情報をDBから取得する
 * 
 * デバイス情報に依存したSQL文である必要はありません
 * 
 * @access private
 * 
 * @param string $sql SQL文
 * 
 * @return array 成功すると配列, それ以外ならば false
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
 * DBから情報を取得しCSVファイルに出力する
 * 
 * @access private
 * 
 * @param string $sql SQL文
 * @param string $directory 出力ディレクトリ
 * @param array  $filename_keys 情報からファイル名を生成するためのキーが
 *                               順番に格納された配列
 * @return bool 成功するとtrue, それ以外ならば false  
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
 * 端末マスタ情報を端末ごとにCSVファイルに出力する    
 *
 * 出力ディレクトリは 「$DEV_PATH . '/device/'」 です.
 * Oracleの場合は, CYUtilsDatabase.inc.php の関数を利用してDBに接続します.
 * 
 * @global int データベース種別 
 * @global string 端末情報csv関連フォルダ最上段パス    
 * @global string DBホスト名:sybase使用    
 * @global string DBユーザー名    
 * @global string DBパスワード    
 * @global string コンテンツID
 * 
 * @return bool 成功すると true, それ以外ならば false
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
 * 端末マスタ情報を属性単位でCSVファイルに出力する   
 *  
 * 出力ディレクトリは「$DEV_PATH . '/option/'」 です.
 * Oracleの場合は, CYUtilsDatabase.inc.php の関数を利用してDBに接続します.
 *
 * @global int データベース種別 
 * @global string 端末情報csv関連フォルダ最上段パス    
 * @global string DBホスト名:sybase使用    
 * @global string DBユーザー名    
 * @global string DBパスワード    
 * @global string コンテンツID 
 *
 * @return bool 成功すると true, それ以外ならば false
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
 * サイト対応端末情報をCSVファイルに出力する   
 *  
 * 出力ディレクトリは 「$DEV_PATH . '/option/'」です.
 * Oracleの場合は, CYUtilsDatabase.inc.php の関数を利用してDBに接続します.
 *
 * $DEV_PATH(端末情報csv関連フォルダ最上段パス)    
 * @global int データベース種別 
 * @global string 端末情報csv関連フォルダ最上段パス    
 * @global string DBホスト名:sybase使用    
 * @global string DBユーザー名    
 * @global string DBパスワード    
 * @global string コンテンツID 
 *
 * @return bool 成功すると true, それ以外ならば false
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
