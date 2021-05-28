<?php
/**
 * �y���O����֐��Q�t�@�C���z
 *
 *
 * @package default
 * @version $Id: CYUtilsLog.inc.php,v 1.3 2007/10/25 08:49:08 tatsuya_odakura Exp $
 */

/*
 * TODO: �O���̃��K�[�̗��p
 */ 
 

 
/**
 * 'CYUtilsLogConst.inc.php' �� require_once
 */ 
require_once dirname(__FILE__) .'/CYUtilsLogConst.inc.php';
/**
 * ���O���t�@�C���ɏo�͂���
 * 
 * @access private
 *
 * @param string  $log_str      ���O�Ƃ��ďo�͂��镶����
 * @param string  $log_filename ���O�o�͐�t�@�C����
 * @return bool ����ɏ������ꂽ�ꍇ�� true, ����ȊO��false
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
    //fclose()���Ƀ��b�N�͊J�������̂Ŗ����I�ȊJ���͂��Ȃ�.

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
 * ���O��ϐ��ɏo�͂���
 *
 * @access private
 *
 * @param string  $log_str ���O�Ƃ��ďo�͂��镶����
 * @param string  &$log_info    ���O�o�͐�ϐ�
 *
 * @return bool ����ɏ������ꂽ�ꍇ�� true, ����ȊO��false
 *                  (���݂͏��true)
 */
function logOutputVariable($log_str, &$log_info) 
{
    $log_info .= $log_str.'<br>'."\n";
    return true;
}
/**
 * ���O�Ɋւ��鋤�ʏ���������
 * 
 * @access private
 *
 * @param string $log_str      ���O�Ƃ��ďo�͂��镶����
 * @param int    $log_output     1�ł���΃t�@�C���o��:2�ł���Εϐ��ɏo��
 * @param string $log_filename ���O�o�͐�t�@�C����
 * @param string &$log_info     ���O�o�͐�ϐ�
 * @return bool ����ɏ������ꂽ�ꍇ�� true, ����ȊO��false
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
 * DEBUG LOG���o�͂���
 *
 * @global string DEBUG���O�t�@�C����
 * @global int    1�ł���΃t�@�C���o��:2�ł���΃��O����$DEBUGLOG_INFO��)
 * @global string ���[�U�[�̂P�A�N�Z�X�ł�DEBUG���O����~���镶����
 *
 * @param string $str �o�͕�����
 * @return bool ����ɏ������ꂽ�ꍇ�� true, ����ȊO��false
 */
function logDebug($str) 
{
    global $DEBUGLOG, $DEBUGLOG_FLAG, $DEBUGLOG_INFO, $S_USERID;
    $log_str = '['.date('Y/m/d H:i:s') .']['.$S_USERID.']'.$str;
    return logCommonProcess($log_str, $DEBUGLOG_FLAG, $DEBUGLOG, $DEBUGLOG_INFO);
}
/**
 * SQL��LOG���o�͂���
 *
 * @global string SQL���O�t�@�C����
 * @global int    1�ł���΃t�@�C���o��:2�ł���΃��O����$SQLLOG_INFO��)
 * @global string ���[�U�[�̂P�A�N�Z�X�ł�SQL���O����~���镶����
 *
 * @param string $query_string �o�͕�����
 * @return bool ����ɏ������ꂽ�ꍇ�� true, ����ȊO��false
 */
function logSql($query_string) 
{
    global $SQLLOG, $SQLLOG_FLAG, $SQLLOG_INFO, $S_USERID;
    $log_str = date('Ymd H:i:s') .' ['.$S_USERID.'] '.$_SERVER['SERVER_NAME'].' '.posix_getppid() .
        ' '.$_SERVER['REQUEST_URI'].' [SQL] '.$query_string;
    return logCommonProcess($log_str, $SQLLOG_FLAG, $SQLLOG, $SQLLOG_INFO);
}
/**
 * ERROR LOG���o�͂���
 *
 * @global string ERROR���O�t�@�C����
 * @global int    1�ł���΃t�@�C���o��:2�ł���΃��O����$ERRORLOG_INFO��)
 * @global string ���[�U�[�̂P�A�N�Z�X�ł�ERROR���O����~���镶����
 *
 * @param string $str �o�͕�����
 * @return bool ����ɏ������ꂽ�ꍇ�� true, ����ȊO��false
 */
function logError($str) 
{
    global $ERRORLOG, $ERRORLOG_FLAG, $ERRORLOG_INFO, $S_USERID;
    $log_str = '['.date('Y/m/d H:i:s') .']['.$S_USERID.']'.$str;
    return logCommonProcess($log_str, $ERRORLOG_FLAG, $ERRORLOG, $ERRORLOG_INFO);
}
/**
 * HOST�ʐM��LOG���o�͂���
 *
 * @global string HOST�ʐM���O�t�@�C����
 * @global int    1�ł���΃t�@�C���o��:2�ł���΃��O����$HOSTLOG_INFO��)
 * @global string ���[�U�[�̂P�A�N�Z�X�ł�HOST���O����~���镶����
 *
 * @param string $str �o�͕�����
 * @return bool ����ɏ������ꂽ�ꍇ�� true, ����ȊO��false
 */
function logHost($str) 
{
    global $HOSTLOG, $HOSTLOG_FLAG, $HOSTLOG_INFO;
    $log_str = '['.date('Y/m/d H:i:s') .']'.$str;
    return logCommonProcess($log_str, $HOSTLOG_FLAG, $HOSTLOG, $HOSTLOG_INFO);
}
/**
 * �Í����c�[����LOG���o�͂���
 *
 * @global string CRYPT�ʐM���O�t�@�C����
 * @global int    1�ł���΃t�@�C���o��:2�ł���΃��O����$CRYPTLOG_INFO��)
 * @global string ���[�U�[�̂P�A�N�Z�X�ł�CRYPT���O����~���镶����
 *
 * @param string $str �o�͕�����
 * @return bool ����ɏ������ꂽ�ꍇ�� true, ����ȊO��false
 */
function logCrypt($str) 
{
    global $CRYPTLOG, $CRYPTLOG_FLAG, $CRYPTLOG_INFO;
    $log_str = '['.date('Y/m/d H:i:s') .']'.$str;
    return logCommonProcess($log_str, $CRYPTLOG_FLAG, $CRYPTLOG, $CRYPTLOG_INFO);
}


?>
