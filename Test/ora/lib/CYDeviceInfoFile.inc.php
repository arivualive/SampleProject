<?php

/**
 * 【端末マスタデータ操作（ファイル→コンテンツ） 関数群ファイル】
 * 
 * CYBIRD標準端末マスタシステム（DIM）管理データをコンテンツ側へ提供します.
 * 管理データは, CYDeviceOutputFile.inc.phpの関数によって
 * データファイル化されていることを前提としています.
 * 
 * @package default
 * @version $Id: CYDeviceInfoFile.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */

/**
 * 発売前の端末情報取得を許可する
 * 
 * 変数 $permitNoSale に '1' を設定します.
 * 
 * @global string 発売前端末情報取得許可フラグ
 * 
 * @return void
 */
function setPermitNoSaleON()
{ 
    global $permitNoSale;

    $permitNoSale = '1';
}

/**
 * 発売前の端末情報取得を拒否する
 * 
 * 変数 $permitNoSale に '0' を設定します.
 * 
 * @global string 発売前端末情報取得許可フラグ
 * 
 * @return void 
 */
function setPermitNoSaleOFF()
{
    global $permitNoSale;

    $permitNoSale = '0';
}

/**
 * 発売日未設定の端末情報取得を許可する
 * 
 * 変数 $permitSalesNull に '1' を設定します.
 *
 * @global string 発売日未設定情報取得許可フラグ
 * 
 * @return void
 */
function setPermitSalesNullON()
{
    global $permitSalesNull;

    $permitSalesNull = '1';
}

/**
 * 発売日未設定の端末情報取得を拒否する
 * 
 * 変数 $permitSalesNull に '0'を設定します.
 * 
 * @global string 発売日未設定情報取得許可フラグ
 * 
 * @return void
 */
function setPermitSalesNullOFF()
{
    global $permitSalesNull;

    $permitSalesNull = '0';
}

/**
 * 端末発売日と現在を比較し情報が取得可能かを検査する
 * 
 * 発売前端末情報取得許可フラグ・発売日未設定情報取得許可フラグと
 * 引数の発売日文字列, 現在日時から情報を取得可能かを検査します. 
 * 
 * @access private
 * 
 * @global string 発売前端末情報取得許可フラグ
 * @global string 発売日未設定情報取得許可フラグ
 * 
 * @param string $date 発売日文字列
 * @return bool 情報取得可ならtrue, 不可ならfalse
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
 * CSVファイルから2次元配列を作成する
 * 
 * CSVファイルの内容を行, 列の順に格納した2次元配列を作成します.
 * CSVファイルの1行目は飛ばします. 
 * 
 * @access private
 * 
 * @param string $filename CSVファイル
 * @param int    $column_num      CSVファイルの1行の列数
 * @return array CSVファイルの内容を行, 列の順に格納した2次元配列
 *                エラーが起った場合, 返す情報がない場合には false を返す
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
    
    //1行目は飛ばす.
    if (fgets($handle) === false) {
        fclose($handle);
        return false;
    }
    $infos = array();
    /*
     * fgetcsv() の第2引数を指定しないとメモリを使い果した 
     * Fatal error: Allowed memory size of 8388608 bytes exhausted
     * TODO: fgetcsv()の第2引数が 8192 でよいかは疑問
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
 * コンテンツ運用統括IDとコンテンツ運用統括キャリアID, 
 * デバイス名から決定される1機種の配信情報配列を取得する
 * 
 * @global string 端末情報csv関連フォルダ最上段パス
 * @global string デバイス名
 *
 * @param string $contentsCyId コンテンツ運用統括ID
 * @param string $carrierCyId コンテンツ運用統括キャリアID
 * 
 * @return array 取得した１機種の配信情報連想配列。
 *          連想配列のキーは、端末情報テーブルに準じます.
 *          端末csvファイルがなく情報が取得できない場合は,
 *          キー 'dev_file_exist_flag' が false となります.
 */
function getHashMap($contentsCyId, $carrierCyId)
{
    global $DEV_PATH,$simpleDevice;

    $map = array();
     //端末csvファイルなしとみなす場合のフラグ
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
    // 0行や1行のファイルでなかったら
    //端末csvファイルありと最終的にみなす
    if (!$init) {
        $map['dev_file_exist_flag'] = true;
    }

    return $map;
}

/**
 * $device_name, $device_show_name を 条件に応じて
 * $deviceNameArray, $deviceShowNameArray に追加する.
 * 
 * @access private
 * 
 * @param string  $deviceName CSVファイルから読み込んだ device_name
 * @param string  $deviceShowName CSVファイルから読み込んだ device_show_name
 * @param string  $deviceOptionValue CSVファイルから読み込んだデバイスの option_value
 * @param string  $salesFrom  CSVファイルから読み込んだデバイスの発売日情報
 * @param array   &$deviceNameArray デバイス名の配列
 * @param array   &$deviceShowNameArray デバイス表示名の配列
 * @param bool    $doCompare      option_valueの比較をするかどうか   
 * @param string  $signOptionValue 比較の種類
 * @param string  $optionValue     比較対象の option_value 値
 * 
 * @return bool   処理を行なった場合に true, それ以外は false
 */
function addDeviceNamesToArraies($deviceName, $deviceShowName, 
    $deviceOptionValue, $salesFrom,  
    &$deviceNameArray, &$deviceShowNameArray,
    $doCompare = false,
    $signOptionValue='', $optionValue='')
{

            // デバイス名が空, 既に処理したデバイス, 発売日情報に問題があれば飛ばす
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
            // 重複は最後に array_unique() で除く
            $deviceShowNameArray[] = $deviceShowName;
        } else {
            $deviceNameArray[] = $deviceName;
        }
    }
    return true;
}

/**
 * コンテンツ運用統括IDとコンテンツ運用統括キャリアIDに登録されている
 * 端末情報から条件を満たすものを取得する。
 *
 *  条件は以下の通りです.
 * ・パラメーターで指定された配信属性名の配信属性値
 * ・パラメーターで指定された等号ないし不等号('=', '!=')
 * ・パラメーターで指定された配信属性値
 * 
 * @global string 端末情報csv関連フォルダ最上段パス
 * 
 * @param string $contentsCyId コンテンツ運用統括ID 
 * @param string $carrierCyId コンテンツ運用統括キャリアID 
 * @param string $optionName 配信属性名
 * @param string $optionValue 配信属性値
 * @param string $signOptionValue 等号 '=' ないし 不等号 '!='
 *         (昔の仕様では利用できた大小記号 '<', '<=', '>'. '>=' は
 *          無効になりました.)
 * @return array 条件を満たす配信情報配列. 
 */
function getMatchOptionDeviceHash($contentsCyId, $carrierCyId, $optionName, 
                $optionValue, $signOptionValue) 
{

    global $DEV_PATH;

    // '=', '!=', '' のみを受けつける.
    if ($signOptionValue === '') {
        $signOptionValue = '=';
    }
    if ($signOptionValue !== '=' &&  $signOptionValue !== '!=' ) {
        return array();
    }
    
    $deviceNameArray = array();        // device_name 格納配列
    $deviceShowNameArray= array();        // device_show_name 格納配列

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
 * コンテンツ運用統括IDとコンテンツ運用統括キャリアIDに
 * 登録されている端末情報を取得する
 * 
 * @global string 端末情報csv関連フォルダ最上段パス
 * 
 * @param string $contentsCyId コンテンツ運用統括ID
 * @param string $carrierCyId コンテンツ運用統括キャリアID
 * @return array 取得した配信情報配列(端末表示名)
 */
function getMatchSiteSupportDeviceHash($contentsCyId, $carrierCyId)
{
    global $DEV_PATH;

    $deviceNameArray = array();        // device_name 格納配列
    $deviceShowNameArray= array();        // device_show_name 格納配列

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
