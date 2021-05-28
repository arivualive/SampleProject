<?php

/**
 * 【端末情報操作関数群ファイル】
 *
 * @package default
 * @version $Id: CYUtilsDevice.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */
 
/**
 * 'CYDeviceInfoFile.inc.php' の require_once
 */ 
require_once dirname(__FILE__). '/CYDeviceInfoFile.inc.php';

/**
 * 対応端末かどうかチェックする
 * 
 * 非対応端末の場合は非対応端末ページを表示し, exitする
 * 
 * @global string headerインクルードファイル
 * @global string エラーファイル
 * @global string footerインクルードファイル
 * @global string サイト対応判断フラグ
 * @global string 非対応端末お知らせ画面お問い合わせURL
 * @global string 非対応端末お知らせ画面解約URL
 * @global string キャリア別共通URLパラメータ
 * @global array  端末情報CSVのオプション値格納配列
 * @global string コンテンツ名称
 * @global string コピーライト文字列
 * 
 * @param string $site_support_option サイト対応端末条件option(省略可能。)
 * 
 * @return bool  非対応ページの表示を行なわなかった場合にtrue
 */
function chkDevice($site_support_option='') 
{
    global $HEADER_FILE, $DEVICE_ERROR_FILE, 
        $FOOTER_FILE,$CYPS_site_support_flag,
        $UNSUPPORT_DEV_INQUIRY_URL, $UNSUPPORT_DEV_UNREG_URL, 
        $URL_PARAM, $CYPS_OPTION_VALUE,
        $CONTENTS_NAME, $COPYRIGHT_STR;

    if ($CYPS_site_support_flag === false) {
        //非対応ページの表示
        include_once $HEADER_FILE;
        include_once $DEVICE_ERROR_FILE;
        include_once $FOOTER_FILE;
        exit;
    }

    /*
     * サイト対応端末の条件が「端末.csvが存在すること」以外の条件である場合、
     * 下記ロジックを通す
     */ 
    
    if (strlen($site_support_option) > 0) {
        if ($CYPS_OPTION_VALUE[$site_support_option] == '' 
            || $CYPS_OPTION_VALUE[$site_support_option] == 'NG') {
            //非対応ページの表示
            include_once $HEADER_FILE;
            include_once $DEVICE_ERROR_FILE;
            include_once $FOOTER_FILE;
            exit;
        }
    }
    
    return true;
}


/**
 * 端末情報を取得する
 * 
 * 対応端末の一覧をグローバルな配列 $CYPS_OPTION_VALUE に格納します.
 * 
 * @global string キャリアID
 * @global string コンテンツID
 * @global string コンテンツ運用統括キャリアID
 * @global string (シンプルな)端末名
 * @global string 端末名
 * @global string コンテンツID
 * @global string CYPSのキャリアID
 * @global string 端末名
 * @global string 表示用端末名
 * @global string CYPSのデバイスのキャリアID
 * @global string 端末発売日
 * @global string 登録日時
 * @global bool   端末名.csv有無フラグ=サイト対応有無
 * @global array  端末情報CSVのオプション値格納配列
 * @global array  端末情報取得可能属性名配列 (標準開発設定ファイルで宣言)
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

    // コンテンツ運用統括キャリアIDを取得する
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

    // 端末名を取得する
    $deviceName   = $_SERVER['HTTP_X_CY_DEVICE'];
    $simpleDevice = $_SERVER['HTTP_X_CY_SIMPLE_DEVICE'];

    // 端末名から端末情報を取得する
    $deviceMapCYPS = getHashMap($CONTENTS_CYID, $carrierCyid);

    //端末名.csvの有無判断フラグを取得
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
        //csvファイルのオプション値を取得
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
 * 画像ファイルの仮パスから実ファイルを探し情報を取得する
 * 
 * @param string $path 画像パス
 * @return array 次の形式の配列
 *  'flag' => ファイル存在有無フラグ、
 *  'path' => ファイルが存在する画像パス
 * （存在しない場合、nullを返す,
 * 'ext' => 拡張子
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
 * 条件に対応する端末の一覧を取得する
 * 
 * @access private
 * 
 * @global string コンテンツID
 * @global string コンテンツ運用統括キャリアID 
 * 
 * @param string $option サイト対応端末条件option
 * @param bool $forceUseOption   $optionが空でもgetMatchOptionDeviceHash()を用いるかどうかのフラグ
 * 
 * @return string 対応端末の一覧が'<samp><br></samp>'で連結された文字列
 */
function getDeviceList($option='', $forceUseOption = false)
{
    global $CONTENTS_CYID, $carrierCyid;

    // サイト対応端末一覧を取得する（/device/option/XXXX.csv）
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

    //サイト対応端末一覧を変数に格納
    $deviceList = '';
    foreach ($deviceMapSite as $device) {
        if ($device !== 'PC端末ブラウザ') {
            $deviceList .= $device . '<br>';
        }
    }
    return $deviceList;
}



/**
 * サイトが対応する端末の一覧を取得する.
 * 
 *
 * @param string $site_support_option サイト対応端末条件option(省略可能)
 * @return string 対応端末一覧の一覧が'<samp><br></samp>'で連結された文字列
 */
function getDeviceListSite($site_support_option='')
{
    return getDeviceList($site_support_option);
}


/**
 * 指定された素材の対応端末一覧を取得する
 * 
 * 
 * @param string $option_name 端末情報.csvのoption_name。
 *          基本的にGRP(素材グループ)を指定する。(省略可能)
 * @return string 対応端末一覧の一覧が'<samp><br></samp>'で連結された文字列
 */
function getDeviceListObj($option_name)
{
    return getDeviceList($option_name, true);
}

/**
 * ez-webのHDML端末かどうかのフラグを取得する
 * 
 * TODO: 作り直す
 * 
 * @global string キャリアID
 * @global string ユーザーエージェント
 * @global bool   PCか否か
 * 
 * @return bool HDML端末であればtrue。それ以外はfalse
 */
function getHdmlFlag()
{
    global $CARRIER_ID, $USER_AGENT_DEF, $PC_MODE;

    //hdml端末判定
    if ($PC_MODE === false && $CARRIER_ID === 'e') {
        //マッチしなければHDML端末と判定
        if (preg_match('/^KDDI/i', $USER_AGENT_DEF)===0) {
            return true;
        }
    }
    return false;
}


/**
 * i-modeのFoma端末かどうかのフラグを取得する
 * 
 * @global string キャリアID
 * @global string ユーザーエージェント
 * 
 * @return bool Foma端末であればtrue それ以外はfalse
 */
function getFomaFlag()
{
    global $CARRIER_ID, $USER_AGENT_DEF;

    if ($CARRIER_ID === 'i') {
        if (preg_match('/^DoCoMo\/2.0/i', $USER_AGENT_DEF) === 1) {
            //FOMAの処理
            return true;
        }
    }
    return false;
}


/**
 * Softbank 3GC端末かどうかのフラグを取得する。
 * 
 * mod_cy_coreの使用を前提とします.
 * 
 * @global string キャリアID
 * 
 * @return boolean 3GC端末であればtrue それ以外はfalse
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
