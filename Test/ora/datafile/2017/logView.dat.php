<?php
ini_set('error_reporting',E_ALL);

//DB�ڑ�
$con_utl = dbConnect();

$b200SessionId = $session_id;
if ($site_kbn === '1') {
    $text .= "=== Session Log ===<br>".getHtmlEscapedString($session_id)."<br>";
    $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,SDATA From SessionLog_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";

    $result = dbQuery($con_utl, $sql);
    $rows = getNumRows($result, $arr_utl);
    if ($rows == 0) {
        $text .= "������܂���B";
    } else {
        for ($i = 0; $i < $rows; $i++) {
            $row = dbFetchRow($result, $i, $arr_utl);
            $text .= $row['RDT'] . " " . getHtmlEscapedString($row['SDATA'])."<br>";
        }
    }
} else {
    /**
     * ���o�C���̓Z�L�����e�B�΍�̂��߃Z�b�V����ID����ʂ��Ƃɕς��̂ŁA
     * RECVORDER_TBL�Ɋi�[����Ă���session_id�J�����̒l���L�[��SESSIONLOG_TBL����擾�ł��Ȃ��B
     * ���̂��߁A�����̃��O���o�͂��������邽�߂ɁA
     *   1.RECVORDER_TBL�̃Z�b�V����ID�𒍕��Ǘ��̈ꗗ��ʂ��GET�p�����[�^�Ŏ擾����
     *   2.�擾�����Z�b�V����ID����SESSIONLOG_TBL�̓o�^���Ԃ��擾����
     *   3.�擾�����o�^���Ԉȍ~�̃f�[�^����Y������KAINNO, SITE_KBN��'2', SDATA��'%��������%'�̕����񂪊܂܂��f�[�^���擾����
     *   4.�擾�����f�[�^�̈�ԍŏ��̃f�[�^�̎��Ԃ��I�����ԂƂ���
     *   5.2.�Ŏ擾�����o�^���Ԃ��ȑO�̃f�[�^����Y������KAINNO, SITE_KBN��'2', SDATA��'%���O�C������%'�̕����񂪊܂܂��f�[�^���擾����
     *   6.�擾�����f�[�^�̈�ԍŏ��̃f�[�^�̎��Ԃ��J�n���ԂƂ���
     *   7.�J�n���ԂƏI�����Ԃ̊Ԃ�KAINNO, SITE_KBN��'2'�̃f�[�^���擾���\������
     */
    $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT, KAINNO, SDATA From SessionLog_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
    $result  = dbQuery($con_utl, $sql);
    $rows    = getNumRows($result, $arr_utl);
    $row     = dbFetchRow($result, 0, $arr_utl);

    $startDate = null;
    $endDate   = null;
    $kainno    = null;
    if (isset($row['RDT']) && isset($row['KAINNO'])) {
        $endDate = $row['RDT'];
        $kainno  = $row['KAINNO'];

        // �I�����Ԃ��擾����
        $sql  = "Select ";
        $sql .=     "to_char(REGIST_DT, 'yyyy-mm-dd hh24:mi:ss') as END_DT ";
        $sql .= "From ";
        $sql .=     "SessionLog_Tbl ";
        $sql .= "Where ";
        $sql .=     "SITE_KBN = '2' ";
        $sql .= "And ";
        $sql .=     "SDATA Like '%��������%' ";
        $sql .= "And ";
        $sql .=     "to_char(regist_dt, 'yyyy-mm-dd hh24:mi:ss') >= '" . $endDate . "'";
        $sql .= "And ";
        $sql .=     "KAINNO = " . getSqlValue($kainno) . " Order by REGIST_DT Desc";
        $result = dbQuery($con_utl, $sql);
        $rows   = getNumRows($result, $arr_utl);
        $row    = null;
        if ($rows == 0) {
            $text .= "������܂���B";
        } else {
            $row       = dbFetchRow($result, 0, $arr_utl);
            $endDate   = isset($row['END_DT']) ? $row['END_DT'] : null;
        }

        // �J�n���Ԃ��擾����
        $sql  = "Select ";
        $sql .=     "SESSION_ID, ";
        $sql .=     "to_char(REGIST_DT, 'yyyy-mm-dd hh24:mi:ss') as START_DT ";
        $sql .= "From ";
        $sql .=     "SessionLog_Tbl ";
        $sql .= "Where ";
        $sql .=     "SITE_KBN = '2' ";
        $sql .= "And ";
        $sql .=     "SDATA Like '%���O�C��%' ";
        $sql .= "And ";
        $sql .=     "to_char(regist_dt, 'yyyy-mm-dd hh24:mi:ss') < '" . $endDate . "'";
        $sql .= "And ";
        $sql .=     "KAINNO = " . getSqlValue($kainno) . " Order by REGIST_DT Desc";
        $result = dbQuery($con_utl, $sql);
        $rows   = getNumRows($result, $arr_utl);
        $row    = null;
        if ($rows == 0) {
            $text .= "������܂���B";
        } else {
            $row           = dbFetchRow($result, 0, $arr_utl);
            $startDate     = isset($row['START_DT']) ? $row['START_DT'] : null;
            $b200SessionId = isset($row['SESSION_ID']) ? $row['SESSION_ID'] : $session_id;
        }
    }
    $text .= "=== Session Log ===<br>";
    if (!is_null($startDate) && !is_null($endDate)) {
        $sql  = "Select ";
        $sql .=     "SESSION_ID, ";
        $sql .=     "to_char(REGIST_DT, 'yyyy-mm-dd hh24:mi:ss') as RDT, ";
        $sql .=     "SDATA ";
        $sql .= "From ";
        $sql .=     "SessionLog_Tbl ";
        $sql .= "Where ";
        $sql .=     "SITE_KBN = '2' ";
        $sql .= "And ";
        $sql .=     "to_char(REGIST_DT, 'yyyy-mm-dd hh24:mi:ss') Between '" . $startDate . "' And '" . $endDate . "'";
        $sql .= "And ";
        $sql .=     "KAINNO = " . getSqlValue($kainno) . " Order by REGIST_DT";
        $result = dbQuery($con_utl, $sql);

        $rows = getNumRows($result, $arr_utl);
        if ($rows == 0) {
            $text .= "������܂���B";
        } else {
            for ($i = 0; $i < $rows; $i++) {
                $row = dbFetchRow($result, $i, $arr_utl);
                $text .= $row['RDT'] . " " . getHtmlEscapedString($row['SDATA'])."<br>";
            }
        }
    }
}
$text .= "<br><br>";

// '���ރh�����̂̏ꍇ
if ($log == 'direct_order') {
    if ($site_kbn === '2') {
        //    '===== B600 =====
        $text .= "=== Denbun Log B600 ===<br>".getHtmlEscapedString($session_id)."<br>";
        $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,HOST_DATA From B600Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
    } else {
        //    '===== A600 =====
        $text .= "=== Denbun Log A600 ===<br>".getHtmlEscapedString($session_id)."<br>";

        $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,HOST_DATA From A600Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
    }


    $result = dbQuery($con_utl, $sql);
    $rows = getNumRows($result, $arr_utl);
    if ($rows == 0) {
        $text .= "������܂���B";
    } else {
        for ($i = 0; $i < $rows; $i++) {
            $row = dbFetchRow($result, $i, $arr_utl);

            $text .= $row['RDT'] . " " . getHtmlEscapedString(ssk_decrypt($row['HOST_DATA']))."<br>";
        }
    }
}

dbCommit($con_utl);
if ($result != false)
    dbFreeResult($result);
dbClose($con_utl);
?>