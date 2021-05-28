<?php
/**
 * 【ログ操作関数群ファイル】
 *
 *
 * @package default
 * @version $Id: CYUtilsLog.inc.php,v 1.3 2007/10/25 08:49:08 tatsuya_odakura Exp $
 */

/*
 * TODO: 外部のロガーの利用
 */ 
 

 
/**
 * 'CYUtilsLogConst.inc.php' の require_once
 */ 
require_once dirname(__FILE__) .'/CYUtilsLogConst.inc.php';
/**
 * ログをファイルに出力する
 * 
 * @access private
 *
 * @param string  $log_str      ログとして出力する文字列
 * @param string  $log_filename ログ出力先ファイル名
 * @return bool 正常に処理された場合は true, それ以外はfalse
 */
function logOutputFile($log_str, $log_filename) 
{
    if (file_exists($log_filename)) {
        if (!is_file($log_filename)) {
            return false;
        }
        if (!is_writable($log_filename)) {
            return false;
        }
    } else {
        if (!is_writable(dirname($log_filename))) {
            return false;
        }

        if (!touch($log_filename)) {
            return false;
        }

        if (chmod($log_filename, 0666) === false) {
            return false;
        }
    }
    $fp = @fopen($log_filename, 'ab');
    if ($fp === false) {
        return false;
    }
    //fclose()時にロックは開放されるので明示的な開放はしない.

    if (!flock($fp, LOCK_EX)) {
        fclose($fp);
        return false;
    }

    if (fwrite($fp, $log_str."\n") === false) {
        fclose($fp);
        return false;
    }

    if (!fclose($fp)) {
        return false;
    }
    return true;
}
/**
 * ログを変数に出力する
 *
 * @access private
 *
 * @param string  $log_str ログとして出力する文字列
 * @param string  &$log_info    ログ出力先変数
 *
 * @return bool 正常に処理された場合は true, それ以外はfalse
 *                  (現在は常にtrue)
 */
function logOutputVariable($log_str, &$log_info) 
{
    $log_info .= $log_str.'<br>'."\n";
    return true;
}
/**
 * ログに関する共通処理をする
 * 
 * @access private
 *
 * @param string $log_str      ログとして出力する文字列
 * @param int    $log_output     1であればファイル出力:2であれば変数に出力
 * @param string $log_filename ログ出力先ファイル名
 * @param string &$log_info     ログ出力先変数
 * @return bool 正常に処理された場合は true, それ以外はfalse
 */
function logCommonProcess($log_str, $log_output, $log_filename, &$log_info) 
{
    switch ($log_output) {
        case 1:
            return logOutputFile($log_str, $log_filename);
        case 2:
            return logOutputVariable($log_str, $log_info);
        default:
            return true;
    }
}
/**
 * DEBUG LOGを出力する
 *
 * @global string DEBUGログファイル名
 * @global int    1であればファイル出力:2であればログ情報を$DEBUGLOG_INFOに)
 * @global string ユーザーの１アクセスでのDEBUGログ情報を蓄える文字列
 *
 * @param string $str 出力文字列
 * @return bool 正常に処理された場合は true, それ以外はfalse
 */
function logDebug($str) 
{
    global $DEBUGLOG, $DEBUGLOG_FLAG, $DEBUGLOG_INFO, $S_USERID;
    $log_str = '['.date('Y/m/d H:i:s') .']['.$S_USERID.']'.$str;
    return logCommonProcess($log_str, $DEBUGLOG_FLAG, $DEBUGLOG, $DEBUGLOG_INFO);
}
/**
 * SQLのLOGを出力する
 *
 * @global string SQLログファイル名
 * @global int    1であればファイル出力:2であればログ情報を$SQLLOG_INFOに)
 * @global string ユーザーの１アクセスでのSQLログ情報を蓄える文字列
 *
 * @param string $query_string 出力文字列
 * @return bool 正常に処理された場合は true, それ以外はfalse
 */
function logSql($query_string) 
{
    global $SQLLOG, $SQLLOG_FLAG, $SQLLOG_INFO, $S_USERID;
    $log_str = date('Ymd H:i:s') .' ['.$S_USERID.'] '.$_SERVER['SERVER_NAME'].' '.posix_getppid() .
        ' '.$_SERVER['REQUEST_URI'].' [SQL] '.$query_string;
    return logCommonProcess($log_str, $SQLLOG_FLAG, $SQLLOG, $SQLLOG_INFO);
}
/**
 * ERROR LOGを出力する
 *
 * @global string ERRORログファイル名
 * @global int    1であればファイル出力:2であればログ情報を$ERRORLOG_INFOに)
 * @global string ユーザーの１アクセスでのERRORログ情報を蓄える文字列
 *
 * @param string $str 出力文字列
 * @return bool 正常に処理された場合は true, それ以外はfalse
 */
function logError($str) 
{
    global $ERRORLOG, $ERRORLOG_FLAG, $ERRORLOG_INFO, $S_USERID;
    $log_str = '['.date('Y/m/d H:i:s') .']['.$S_USERID.']'.$str;
    return logCommonProcess($log_str, $ERRORLOG_FLAG, $ERRORLOG, $ERRORLOG_INFO);
}
/**
 * HOST通信のLOGを出力する
 *
 * @global string HOST通信ログファイル名
 * @global int    1であればファイル出力:2であればログ情報を$HOSTLOG_INFOに)
 * @global string ユーザーの１アクセスでのHOSTログ情報を蓄える文字列
 *
 * @param string $str 出力文字列
 * @return bool 正常に処理された場合は true, それ以外はfalse
 */
function logHost($str) 
{
    global $HOSTLOG, $HOSTLOG_FLAG, $HOSTLOG_INFO;
    $log_str = '['.date('Y/m/d H:i:s') .']'.$str;
    return logCommonProcess($log_str, $HOSTLOG_FLAG, $HOSTLOG, $HOSTLOG_INFO);
}
/**
 * 暗号化ツールのLOGを出力する
 *
 * @global string CRYPT通信ログファイル名
 * @global int    1であればファイル出力:2であればログ情報を$CRYPTLOG_INFOに)
 * @global string ユーザーの１アクセスでのCRYPTログ情報を蓄える文字列
 *
 * @param string $str 出力文字列
 * @return bool 正常に処理された場合は true, それ以外はfalse
 */
function logCrypt($str) 
{
    global $CRYPTLOG, $CRYPTLOG_FLAG, $CRYPTLOG_INFO;
    $log_str = '['.date('Y/m/d H:i:s') .']'.$str;
    return logCommonProcess($log_str, $CRYPTLOG_FLAG, $CRYPTLOG, $CRYPTLOG_INFO);
}


?>
