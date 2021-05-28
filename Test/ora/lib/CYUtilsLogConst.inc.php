<?php
/**
 *
 * 【ログ設定ファイル】
 *
 * @package default
 * @version $Id: CYUtilsLogConst.inc.php,v 1.3 2007/10/25 08:49:34 tatsuya_odakura Exp $
 */

//--------------------------------------------------------
// LogFile Settings
//--------------------------------------------------------

//ファイルにログを出力する場合は必ず設定してください.
$LOG_PATH = $ROOT_DIR.'/logs';

//ログフラグ 0:出力なし 1:ファイル出力 2:global変数格納
$DEBUGLOG_FLAG = 1;		
$DEBUGLOG      = $LOG_PATH.'/debug.log';

//ログフラグ 0:出力なし 1:ファイル出力 2:global変数格納
$SQLLOG_FLAG = 1;
$SQLLOG      = $LOG_PATH.'/sql.log';

//ログフラグ 0:出力なし 1:ファイル出力 2:global変数格納
$ERRORLOG_FLAG = 1;
$ERRORLOG      = $LOG_PATH.'/error.log';

//ログフラグ 0:出力なし 1:ファイル出力 2:global変数格納
$HOSTLOG_FLAG = 1;
$HOSTLOG      = $LOG_PATH.'/host.log';

//ログフラグ 0:出力なし 1:ファイル出力 2:global変数格納
$CRYPTLOG_FLAG = 1;
$CRYPTLOG      = $LOG_PATH.'/crypt.log';
?>
