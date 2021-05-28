<?php
ini_set('error_reporting',E_ALL);

//DB�ڑ�
$con_utl = dbConnect();



// �����o�C���Ή� 2009/03/19 kdl.ohyanagi
$b200SessionId = $session_id;
if ($site_kbn === '1') {
    $text .= "=== Session Log ===<br>".getHtmlEscapedString($session_id)."<br>";
    //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
    //$sql = "Select SDATA From SessionLog_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
    $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,SDATA From SessionLog_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
    //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)

    $result = dbQuery($con_utl, $sql);
    $rows = getNumRows($result, $arr_utl);
    if ($rows == 0) {
        $text .= "������܂���B";
    } else {
        for ($i = 0; $i < $rows; $i++) {
            $row = dbFetchRow($result, $i, $arr_utl);
            //$text .= getHtmlEscapedString(ssk_decrypt($row['SDATA']))."<br>";
            $text .= $row['RDT'] . " " . getHtmlEscapedString($row['SDATA'])."<br>";
        }
    }
} else {
    /**
     * 2009/03/19 kdl.ohyanagi
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

// 'A100,A200,A300�\���@�����̏ꍇ�̂�
// 'A400�\���@�T���v�������̏ꍇ�̂�

// '�����̏ꍇ�̂�
if ($log ==  "order") {

    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi
    if ($site_kbn === '2') {
        // '===== B100 =====
        $text .= "=== Denbun Log B100 ===<br>".getHtmlEscapedString($session_id)."<br>";
        $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,HOST_DATA From B100Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
        //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
    } else {
//    '===== A100 =====
        $text .= "=== Denbun Log A100 ===<br>".getHtmlEscapedString($session_id)."<br>";
        //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
        //$sql = "Select HOST_DATA From A100Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
        $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,HOST_DATA From A100Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
        //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
    }
    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi

    $result = dbQuery($con_utl, $sql);
    $rows = getNumRows($result, $arr_utl);
    if ($rows == 0) {
        $text .= "������܂���B";
    } else {
        for ($i = 0; $i < $rows; $i++) {
            $row = dbFetchRow($result, $i, $arr_utl);

            //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
            //$text .= getHtmlEscapedString(ssk_decrypt($row['HOST_DATA']))."<br>";
            $text .= $row['RDT'] . " " . getHtmlEscapedString(ssk_decrypt($row['HOST_DATA']))."<br>";
            //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)

        }
    }
    $text .= "<br><br>";

    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi
    if ($site_kbn === '2') {
        $text .= "=== Denbun Log B200 ===<br>".getHtmlEscapedString($b200SessionId)."<br>";
        $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,HOST_DATA From B200Send_Tbl Where SESSION_ID=".getSqlValue($b200SessionId)." Order by REGIST_DT";
    } else {
        //    '===== A200 =====
        $text .= "=== Denbun Log A200 ===<br>".getHtmlEscapedString($session_id)."<br>";

        //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
        //$sql = "Select HOST_DATA From A200Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
        $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,HOST_DATA From A200Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
        //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
    }
    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi


    $result = dbQuery($con_utl, $sql);
    $rows = getNumRows($result, $arr_utl);
    if ($rows == 0) {
        $text .= "������܂���B";
    } else {
        for ($i = 0; $i < $rows; $i++) {
            $row = dbFetchRow($result, $i, $arr_utl);

            //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
            //$text .= getHtmlEscapedString(ssk_decrypt($row['HOST_DATA']))."<br>";
            $text .= $row['RDT'] . " " . getHtmlEscapedString(ssk_decrypt($row['HOST_DATA']))."<br>";
            //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)

        }
    }
    $text .= "<br><br>";

    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi
    if ($site_kbn === '2') {
        //    '===== B300 =====
        $text .= "=== Denbun Log B300 ===<br>".getHtmlEscapedString($session_id)."<br>";
        $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,HOST_DATA From B300Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
    } else {
        //    '===== A300 =====
        $text .= "=== Denbun Log A300 ===<br>".getHtmlEscapedString($session_id)."<br>";

        //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
        //$sql = "Select HOST_DATA From A300Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
        $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,HOST_DATA From A300Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
        //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
    }
    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi

    $result = dbQuery($con_utl, $sql);
    $rows = getNumRows($result, $arr_utl);
    if ($rows == 0) {
        $text .= "������܂���B";
    } else {
        for ($i = 0; $i < $rows; $i++) {
            $row = dbFetchRow($result, $i, $arr_utl);

            //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
            //$text .= getHtmlEscapedString(ssk_decrypt($row['HOST_DATA']))."<br>";
            $text .= $row['RDT'] . " " . getHtmlEscapedString(ssk_decrypt($row['HOST_DATA']))."<br>";
            //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)

        }
    }
    $text .= "<br><br>";
}

// '�T���v�������̏ꍇ�̂�
if ($log == 'sample') {
    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi
    if ($site_kbn === '2') {
        //    '===== B400 =====
        $text .= "=== Denbun Log B400 ===<br>".getHtmlEscapedString($session_id)."<br>";
        $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,HOST_DATA From B400Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
    } else {
        //    '===== A400 =====
        $text .= "=== Denbun Log A400 ===<br>".getHtmlEscapedString($session_id)."<br>";

        //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
        //$sql = "Select HOST_DATA From A400Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
        $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,HOST_DATA From A400Send_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";
        //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
    }
    // �����o�C���Ή� 2009/03/17 kdl.ohyanagi


    $result = dbQuery($con_utl, $sql);
    $rows = getNumRows($result, $arr_utl);
    if ($rows == 0) {
        $text .= "������܂���B";
    } else {
        for ($i = 0; $i < $rows; $i++) {
            $row = dbFetchRow($result, $i, $arr_utl);

            //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)
            //$text .= getHtmlEscapedString(ssk_decrypt($row['HOST_DATA']))."<br>";
            $text .= $row['RDT'] . " " . getHtmlEscapedString(ssk_decrypt($row['HOST_DATA']))."<br>";
            //��2008/08/01 #488 �Z�b�V�������O�����\��(kdl yoshii)

        }
    }
}

dbCommit($con_utl);
if ($result != false)
    dbFreeResult($result);
dbClose($con_utl);
?>