<?php
/**
 *
 * �y���O�ݒ�t�@�C���z
 *
 * @package default
 * @version $Id: CYUtilsLogConst.inc.php,v 1.3 2007/10/25 08:49:34 tatsuya_odakura Exp $
 */

//--------------------------------------------------------
// LogFile Settings
//--------------------------------------------------------

//�t�@�C���Ƀ��O���o�͂���ꍇ�͕K���ݒ肵�Ă�������.
$LOG_PATH = $ROOT_DIR.'/logs';

//���O�t���O 0:�o�͂Ȃ� 1:�t�@�C���o�� 2:global�ϐ��i�[
$DEBUGLOG_FLAG = 1;		
$DEBUGLOG      = $LOG_PATH.'/debug.log';

//���O�t���O 0:�o�͂Ȃ� 1:�t�@�C���o�� 2:global�ϐ��i�[
$SQLLOG_FLAG = 1;
$SQLLOG      = $LOG_PATH.'/sql.log';

//���O�t���O 0:�o�͂Ȃ� 1:�t�@�C���o�� 2:global�ϐ��i�[
$ERRORLOG_FLAG = 1;
$ERRORLOG      = $LOG_PATH.'/error.log';

//���O�t���O 0:�o�͂Ȃ� 1:�t�@�C���o�� 2:global�ϐ��i�[
$HOSTLOG_FLAG = 1;
$HOSTLOG      = $LOG_PATH.'/host.log';

//���O�t���O 0:�o�͂Ȃ� 1:�t�@�C���o�� 2:global�ϐ��i�[
$CRYPTLOG_FLAG = 1;
$CRYPTLOG      = $LOG_PATH.'/crypt.log';
?>
