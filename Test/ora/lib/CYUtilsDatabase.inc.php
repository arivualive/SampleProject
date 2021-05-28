<?php
/*��R-#13199 WEB�Ǘ��c�[���Ń��[�����M���Ă�CJISSEKI_MAIL_TBL�̃��R�[�h���X�V����Ȃ� 2014/01/31 uls-soga*/
//�Ώۂ̃\�[�X�̑S�Ẵ��[���o�b�N���R�����g�A�E�g
/*��R-#13199 WEB�Ǘ��c�[���Ń��[�����M���Ă�CJISSEKI_MAIL_TBL�̃��R�[�h���X�V����Ȃ� 2014/01/31 uls-soga*/

/**
 * �y�f�[�^�x�[�X����֐��Q�t�@�C�� �z
 * 
 * PHP��Oracle�p�֐�(oci8)��Sybase�֐��̃��b�p�[�֐���
 * ��ƂȂ��Ă��܂��B
 *
 * @package default
 * @version $Id: CYUtilsDatabase.inc.php,v 1.11 2007/12/22 10:40:35 tatsuya_odakura Exp $
 */

/**
 * 'CYUtilsDBConst.inc.php' �� require_once
 */
require_once dirname(__FILE__) . '/CYUtilsDBConst.inc.php';
/**
 * 'CYUtilsLog.inc.php' �� require_once
 */
require_once dirname(__FILE__) .'/CYUtilsLog.inc.php';


/**
 * �g�����U�N�V���������[���o�b�N����
 * 
 * @global int �f�[�^�x�[�X���
 * 
 * @param resource $con �f�[�^�x�[�X�ڑ�ID
 * 
 * @return bool �����ł����true ���s��false
*/
function dbRollback($con) 
{
    global $DB_KIND;

    if ($DB_KIND==1) {
        //ORACLE
        return oci_rollback($con);
    } elseif ($DB_KIND==2) {
        //SYBASE
        if (sybase_query('rollback transaction', $con) === false) {
            return false;
        } else {
            return true;
        }
    }

    return false;

}

/**
 * SQL�������s����
 * 
 * @global int �f�[�^�x�[�X���
 *  
 * @param resource $con �f�[�^�x�[�X�ڑ�ID
 * @param string   $sql_stmt SQL��
 * @param bool     $tran �g�����U�N�V�����t���O�B
 *                        �w�肵�Ȃ��ꍇ��false(�g�����U�N�V�����Ȃ�)
 * 
 * @return resource ��������DB����ID($result_id), 
 *                  �G���[����false
 */
function dbQuery($con, $sql_stmt, $tran = false)
{

    global $DB_KIND;

    if ($DB_KIND == 1) {
        //ORACLE

        logSql($sql_stmt);

        $result_id = oci_parse($con, $sql_stmt);
        
        if ($result_id === false) {
            return false;
        }
        
        if ($tran) {
            $rtn = oci_execute($result_id, OCI_NO_AUTO_COMMIT);
        } else {
            $rtn = oci_execute($result_id);
        }

        if (!$rtn) {
            if ($tran) {
                //dbRollback($con);
            }
            return false;
        }
        return $result_id;
    } elseif ($DB_KIND==2) {
        //SYBASE
        logSql($sql_stmt);
        $result_id = sybase_query($sql_stmt, $con);
        if ($result_id === false) {
            if ($tran) {
                sybase_query('rollback transaction', $con);
            }
            return false;
        }
        return $result_id;
    }

    return false;
}

/**
 * �f�[�^�x�[�X�̐ڑ����J�n����
 * 
 * TODO: ���s����exit����d�l�̕ύX
 * 
 * @global string �z�X�g��:sybase�g�p    
 * @global string ���[�U�[��    
 * @global string �p�X���[�h    
 * @global string �f�[�^�x�[�X��:oracle�g�p
 * @global int �f�[�^�x�[�X��� 
 * @global bool DEBUG TRACE����邩�ǂ���
 * 
 * @return resource �f�[�^�x�[�X�ڑ�ID
 *   �ڑ�ID�擾�Ɏ��s�����ꍇ�͎��s���I�����܂�(exit���܂�)
 * 
 */
function dbConnect()
{

    global $DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_KIND;
    global $DB_DEBUG_TRACE, $TEST_FLAG, $STAGE_FLAG;

    
    if ($DB_KIND == 1) {
        //ORACLE
        if ($TEST_FLAG || $STAGE_FLAG) {
            /**
             *  �e�X�g����DB�Ɏ����ڑ�����ƁA�����ɐڑ����؂�Ă��܂��̂�
             *  OCILogon���g�p����
             */
            $con = oci_connect($DB_USER, $DB_PASS, $DB_NAME);
        } else {
            $con = oci_pconnect($DB_USER, $DB_PASS, $DB_NAME);
        }
        
        if ($con !== false && $DB_DEBUG_TRACE != false) {
            dbQuery($con, 'ALTER SESSION SET SQL_TRACE=TRUE');
        }
        
    } elseif ($DB_KIND == 2) {
        //SYBASE
        $con = sybase_connect($DB_HOST, $DB_USER, $DB_PASS, 'sjis');
    }

    if ($con === false) {
        logError('It is not connectable with Data Base.');
        
        //TODO ���s���ɏI���Ƃ����d�l���������B
        exit;
    }

    return $con;
}


/**
 * View�p�Ƀf�[�^�x�[�X�̐ڑ����J�n����
 * 
 * TODO: ���s����exit����d�l�̕ύX
 * 
 * @global string �z�X�g��:sybase�g�p    
 * @global string ���[�U�[��    
 * @global string �p�X���[�h    
 * @global string �f�[�^�x�[�X��:oracle�g�p
 * @global int �f�[�^�x�[�X��� 
 * @global bool DEBUG TRACE����邩�ǂ���
 * 
 * @return resource �f�[�^�x�[�X�ڑ�ID
 *   �ڑ�ID�擾�Ɏ��s�����ꍇ�͎��s���I�����܂�(exit���܂�)
 * 
 */
function dbConnectView() {

    global $DB_HOST, $DB_USER_V, $DB_PASS_V, $DB_NAME_V, $DB_KIND;
    global $DB_DEBUG_TRACE, $TEST_FLAG, $STAGE_FLAG;
    
    if ($DB_KIND == 1) {
        //ORACLE
        if ($TEST_FLAG || $STAGE_FLAG) {
            /**
             *  �e�X�g����DB�Ɏ����ڑ�����ƁA�����ɐڑ����؂�Ă��܂��̂�
             *  OCILogon���g�p����
             */
            $con = oci_connect($DB_USER_V, $DB_PASS_V, $DB_NAME_V);
        } else {
            $con = oci_pconnect($DB_USER_V, $DB_PASS_V, $DB_NAME_V);
        }
        
        if ($con !== false && $DB_DEBUG_TRACE != false) {
            dbQuery($con, 'ALTER SESSION SET SQL_TRACE=TRUE');
        }
        /*
        //ORACLE
        $con = OCIPLogon($DB_USER_V, $DB_PASS_V, $DB_NAME_V);
        */
    } else if ($DB_KIND == 2) {
        //SYBASE
        $con = sybase_connect($DB_HOST, $DB_USER_V, $DB_PASS_V, 'sjis');
    }

    if ($con === false) {
        logError('It is not connectable with Data Base.');
        
        //TODO ���s���ɏI���Ƃ����d�l���������B
        exit;
    }

    return $con;
}

/**
 * DB�̍s��A�z�z��Ƃ��Ď擾����
 * 
 * TODO: PHP5 �ɂ� oci_fetch_array() �Ȃǂ�����
 *       ������, oci_fetch_array() �͒x���炵��
 *
 * @global int �f�[�^�x�[�X���
 * 
 * @param resource $result_id �f�[�^�x�[�X����ID
 * @param int      $cnt �s�J�E���g�i�I���N���łŎg�p�j
 * @param array    $result_array DB���ʔz��i�I���N���łŎg�p�j
 * 
 * @return array ��荞�񂾍s���w���e�[�u���̃J���������L�[�Ƃ����A�z�z��
 */
function dbFetchRow($result_id, $cnt, $result_array)
{
    global $DB_KIND;

    if ($DB_KIND==1) {
        //ORACLE
        $rows = array();
        $ncols = oci_num_fields($result_id);
        for ( $i = 1; $i <= $ncols; ++$i ) {
            $column_name = oci_field_name($result_id, $i);
            $rows[$column_name]= $result_array[$column_name][$cnt];
        }
        return $rows;
    } elseif ($DB_KIND==2) {
        //SYBASE
        return sybase_fetch_array($result_id);
    }
    return array();
}


/**
 * Sybase��SQL�����s���ʂ̓����s�|�C���^��
 * �w�肵���s�ԍ��ւ̃|�C���^�Ɉړ�����
 *
 * ��) Oracle�ł͎g�p����P�[�X�͑��݂��܂���
 * 
 * @global int �f�[�^�x�[�X���
 * 
 * @param resource $result_id   �f�[�^�x�[�X����ID
 * @param int      $row_pointer �s�ԍ�
 * 
 * @return bool �����ł����true ���s��false
 */
function dbDataSeek($result_id, $row_pointer)
{
    global $DB_KIND;

    if ($DB_KIND==2) {
        //SYBASE
        return sybase_data_seek($result_id, $row_pointer);
    }
    return false;
}

/**
 * �f�[�^�̌������擾����
 * 
 * @global int �f�[�^�x�[�X���
 *  
 * @param resource $result_id �f�[�^�x�[�X����ID
 * @param array     $result_array DB���ʎ擾�z��(ORACLE�p)
 * @return int �f�[�^����
*/
function getNumRows($result_id, &$result_array)
{
    global $DB_KIND;

    $result_array = array();
    if ($DB_KIND==1) {
        //ORACLE
        return oci_fetch_all($result_id, $result_array);
    } elseif ($DB_KIND==2) {
        //SYBASE
        return sybase_num_rows($result_id);
        logDebug("sybase");
    }
    return 0;
}


/**
 * SQL�����s���ʂ��J������
 * 
 * ��) Sybase�ł͎g�p����P�[�X�͑��݂��܂���B
 * 
 * @global int �f�[�^�x�[�X���
 *  
 * @param resource $result_id �f�[�^�x�[�X����ID
 * @return bool �����ł����true ���s��false
 */
function dbFreeResult($result_id)
{
    global $DB_KIND;

    if ($DB_KIND==1) {
        //ORACLE
        if (!empty($result_id)) {
            return oci_free_statement($result_id);
        } else {
            return false;
            logDebug("sybase2");
        }
    }

    return true;
}


/**
 * DB�ڑ������
 * 
 * ��) Sybase�ł͎g�p����P�[�X�͑��݂��܂���B
 * 
 * @global int �f�[�^�x�[�X���
 * 
 * @param resource $con �f�[�^�x�[�X�ڑ�ID
 * @return bool �����ł����true ���s��false
 */
function dbClose($con)
{
    global $DB_KIND;

    if ($DB_KIND==1) {
        //ORACLE
        //PHP4 �Ŏ����I�ڑ��𗘗p����ꍇ�͈Ӗ����Ȃ��R�[�h
        return oci_close($con);
    } 
    //SYBASE
    //sybase_close($con);
    return true;
}


/**
 * �g�����U�N�V�������J�n����
 * 
 * ��) Oracle�ł͎g�p����P�[�X�͑��݂��܂���B
 * 
 * @global int �f�[�^�x�[�X���
 *  
 * @param resource $con �f�[�^�x�[�X�ڑ�ID
 * 
 * @return bool �����ł����true ���s��false
 */
function dbBegin($con)
{
    global $DB_KIND;

    if ($DB_KIND == 2) {
        //SYBASE
        $result_id = sybase_query('begin transaction', $con);
        if ($result_id === false) {
            return false;
        }
    }
    return true; 
}


/**
 * �g�����U�N�V�������R�~�b�g����
 * 
 * @global int �f�[�^�x�[�X���
 *   
 * @param resource $con �f�[�^�x�[�X�ڑ�ID
 * @return bool �����ł����true ���s��false
 */
function dbCommit($con)
{
    global $DB_KIND;

    if ($DB_KIND==1) {
        //ORACLE
        return oci_commit($con);
    } else if ($DB_KIND==2) {
        //SYBASE
        if (sybase_query('commit transaction', $con) === false) {
            return false;
        } else {
            return true;
        }
    }
    return false;
}

/**
 * 'NULL'�Ƃ����������Ԃ�
 * 
 * @return string 'NULL'�Ƃ���������
 */
function getSqlNullValue()
{
    return 'NULL';
}


/**
 * �������SQL���ɑ}���ł���悤�ɃG�X�P�[�v����
 * 
 * Shift_JIS�Ƃ��ĕs���ȕ������󕶎��ɑ΂��Ă�
 * getSqlNullValue()�̒l��Ԃ��܂�.
 * 
 * TODO: PHP 5 �ɂȂ����� mb_check_encoding()�𗘗p����
 * 
 * @global int �f�[�^�x�[�X���
 *  
 * @param string $str �Ώە�����
 * @return string �G�X�P�[�v���ꂽ������
 *  
 */
function getSqlValue($str)
{
    global $DB_KIND;

    if ($str !== mb_convert_encoding($str, 'Shift_JIS', 'Shift_JIS')) {
        return getSqlNullValue();        
    }
    if (strlen($str) > 0) {
        // "'" �� 0x27 �Ȃ̂�Shift_JIS��2�o�C�g�ڂɂ͗��Ȃ�
        $ret = str_replace("'", "''", $str);
        if ($DB_KIND === 2) {
            //SYBASE
            $ret = mb_ereg_replace('�f', '�f�f', $ret);
            $ret = mb_ereg_replace('�e', '�e�e', $ret);
        }
        return "'".$ret."'";
    }
    return getSqlNullValue();
    
}


/**
 * ����ID���擾����
 * 
 * �Ώۃe�[�u���̑Ώۃt�B�[���h��MAX+1����ID��Ԃ��܂�.
 * DB����Sequence�����p�ł���Ȃ�� Sequence �̗��p�𐄏����܂�.
 * 
 * TODO: ���s����� die() ����d�l��������
 * 
 * @param string $table_name �Ώۃe�[�u����
 * @param string $field_name �Ώۃt�B�[���h
 * @param string $where ������(�ȗ��\)
 * 
 * @return int ����ID
*/
function getNextId($table_name, $field_name, $where = '')
{
    //DB�ڑ�
    $con = dbConnect();
    
    if ($con === false) {
        die('getNextId() error');
    }

    $sql  = 'select max('.$field_name.') as VALUE';
    $sql .= ' from '.$table_name;
    if (strlen($where) > 0) {
        $sql .= ' where '.$where;
    }
    $result_id = dbQuery($con, $sql);
    if ($result_id === false) {
        dbClose($con);
        die('getNextId() result error');
    }
    
    $result_array = array();
    
    $num_rows = getNumRows($result_id, $result_array);
    
    if ($num_rows === 1) {
        dbDataSeek($result_id, 0);
        $row    = dbFetchRow($result_id, 0, $result_array);
        $maxId  = intval($row['VALUE']);
        $nextId = $maxId + 1;
    } else {
        $nextId = 1;
    }

    //�X�e�[�g�����g�J��
    dbFreeResult($result_id);

    //DB�ؒf
    dbClose($con);

    return $nextId;
}


/**
 * ���l�Ɣ���ł���l�͒l���̂��̂�,
 * ����ȊO�̒l�ɂ�NULL�\����Ԃ�
 *
 * @param mixed $number ����Ώۂ̒l
 * 
 * @return mixed ���l�Ɣ���ł���ꍇ�l�����̂܂ܕԂ�.
 *                ����ȊO�̏ꍇ�� getSqlNullValue()�̒l��Ԃ�.
 */
function getSqlValueNum($number)
{
    if (is_numeric($number)) {
        return $number;
    } 
    return getSqlNullValue();
}



/**
 * �擾�������ׂẴf�[�^��z��Ɋi�[����
 * 
 * @param resource $result_id �f�[�^�x�[�X����ID
 * 
 * @return array �f�[�^���i�[�����z��
 */
function fncDataGetResult($result_id)
{

    $data = array();
    $result_array = array();
    $cnt = getNumRows($result_id, $result_array);
    for ($i = 0; $i < $cnt; ++$i) {
        $data[] = dbFetchRow($result_id, $i, $result_array);
    }
    return $data;
}

/**
 * ���O���擾���邽�߂�oci_parse()�����b�p�����֐�
 * 
 * @global array $SSK_SQL_LOG �X�e�[�g�����gID���ƂɃ��O���i�[����z��
 * 
 * @param resource $con   DB�̐ڑ����\�[�X
 * @param string   $query �N�G��
 * 
 * @return resource|false �X�e�[�g�����gID. ���s�Ȃ�false
 */
function ssk_db_parse($con, $query) {
    
    logSql($query);
    $stmt = oci_parse($con, $query);
//    $stmt = oci_parse($con, $query);
    
    if ($stmt == false) {
        $e = oci_error($stmt);
        logError('parse error:'.$e['message']);
        //exit;
    }
    return $stmt;
}

/**
 * ���O���擾���邽�߂�oci_bind_by_name()�����b�p�����֐�
 * 
 * @global array $SSK_SQL_LOG �X�e�[�g�����gID���ƂɃ��O���i�[����z��
 *  
 * @param resouce $stmt      �X�e�[�g�����gID
 * @param string  $ph_name   �v���[�X�t�H���_
 * @param mixed   &$variable �v���[�X�t�H���_�ƒu������ϐ�
 * 
 * @return bool oci_bind_by_name()�̕Ԃ�l
 */
function ssk_db_bind_by_name($stmt, $ph_name, &$variable, $length = NULL ) {

    if($length)
    {
        $ret = oci_bind_by_name($stmt, $ph_name, $variable,$length);
    }
    else
    {
        $ret = oci_bind_by_name($stmt, $ph_name, $variable);
    }
    logSql($ph_name.' => '.$variable);
//    $ret = oci_bind_by_name($stmt, $ph_name, $variable,$length);
    
    if (!$ret) {
        $e = oci_error($stmt);
        logError('bind error:'.$ph_name.' '.$e['message']);
        //exit;
    }
    return $ret;
}

/**
 * ���O���擾���邽�߂�oci_execute()�����b�p�����֐�
 * 
 * @global array $SSK_SQL_LOG �X�e�[�g�����gID���ƂɃ��O���i�[����z��
 * 
 * @param resource $stmt �X�e�[�g�����gID
 * @param bool     $tran �g�����U�N�V�����t���O
 * 						�w�肵�Ȃ��ꍇ�̓g�����U�N�V�����Ȃ�
 * 
 * @return bool oci_execute�̕Ԃ�l
 */
function ssk_db_execute($stmt, $tran = false) {
    
    if ($tran) {
        $mode = OCI_NO_AUTO_COMMIT;
    } else {
        $mode = OCI_COMMIT_ON_SUCCESS;
    }
    
    if (!$ret) {
        $e = oci_error($stmt);
        //logError('execute error:'.htmlentities($e['message']));
        logError('execute error:'.$e['message']);
        exit;
    }
    return $ret;
}

?>
