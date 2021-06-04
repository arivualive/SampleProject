<?php
ini_set('error_reporting',E_ALL);

//DB接続
$con_utl = dbConnect();

$b200SessionId = $session_id;
if ($site_kbn === '1') {
    $text .= "=== Session Log ===<br>".getHtmlEscapedString($session_id)."<br>";
    $sql = "Select to_char(REGIST_DT,'yyyy-mm-dd hh24:mi:ss') as RDT,SDATA From SessionLog_Tbl Where SESSION_ID=".getSqlValue($session_id)." Order by REGIST_DT";

    $result = dbQuery($con_utl, $sql);
    $rows = getNumRows($result, $arr_utl);
    if ($rows == 0) {
        $text .= "見つかりません。";
    } else {
        for ($i = 0; $i < $rows; $i++) {
            $row = dbFetchRow($result, $i, $arr_utl);
            $text .= $row['RDT'] . " " . getHtmlEscapedString($row['SDATA'])."<br>";
        }
    }
} else {
    /**
     * モバイルはセキュリティ対策のためセッションIDが画面ごとに変わるので、
     * RECVORDER_TBLに格納されているsession_idカラムの値をキーにSESSIONLOG_TBLから取得できない。
     * そのため、注文のログを出力を実現するために、
     *   1.RECVORDER_TBLのセッションIDを注文管理の一覧画面よりGETパラメータで取得する
     *   2.取得したセッションIDからSESSIONLOG_TBLの登録時間を取得する
     *   3.取得した登録時間以降のデータから該当するKAINNO, SITE_KBNが'2', SDATAに'%注文完了%'の文字列が含まれるデータを取得する
     *   4.取得したデータの一番最初のデータの時間を終了時間とする
     *   5.2.で取得した登録時間より以前のデータから該当するKAINNO, SITE_KBNが'2', SDATAに'%ログイン完了%'の文字列が含まれるデータを取得する
     *   6.取得したデータの一番最初のデータの時間を開始時間とする
     *   7.開始時間と終了時間の間のKAINNO, SITE_KBNが'2'のデータを取得し表示する
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

        // 終了時間を取得する
        $sql  = "Select ";
        $sql .=     "to_char(REGIST_DT, 'yyyy-mm-dd hh24:mi:ss') as END_DT ";
        $sql .= "From ";
        $sql .=     "SessionLog_Tbl ";
        $sql .= "Where ";
        $sql .=     "SITE_KBN = '2' ";
        $sql .= "And ";
        $sql .=     "SDATA Like '%注文完了%' ";
        $sql .= "And ";
        $sql .=     "to_char(regist_dt, 'yyyy-mm-dd hh24:mi:ss') >= '" . $endDate . "'";
        $sql .= "And ";
        $sql .=     "KAINNO = " . getSqlValue($kainno) . " Order by REGIST_DT Desc";
        $result = dbQuery($con_utl, $sql);
        $rows   = getNumRows($result, $arr_utl);
        $row    = null;
        if ($rows == 0) {
            $text .= "見つかりません。";
        } else {
            $row       = dbFetchRow($result, 0, $arr_utl);
            $endDate   = isset($row['END_DT']) ? $row['END_DT'] : null;
        }

        // 開始時間を取得する
        $sql  = "Select ";
        $sql .=     "SESSION_ID, ";
        $sql .=     "to_char(REGIST_DT, 'yyyy-mm-dd hh24:mi:ss') as START_DT ";
        $sql .= "From ";
        $sql .=     "SessionLog_Tbl ";
        $sql .= "Where ";
        $sql .=     "SITE_KBN = '2' ";
        $sql .= "And ";
        $sql .=     "SDATA Like '%ログイン%' ";
        $sql .= "And ";
        $sql .=     "to_char(regist_dt, 'yyyy-mm-dd hh24:mi:ss') < '" . $endDate . "'";
        $sql .= "And ";
        $sql .=     "KAINNO = " . getSqlValue($kainno) . " Order by REGIST_DT Desc";
        $result = dbQuery($con_utl, $sql);
        $rows   = getNumRows($result, $arr_utl);
        $row    = null;
        if ($rows == 0) {
            $text .= "見つかりません。";
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
            $text .= "見つかりません。";
        } else {
            for ($i = 0; $i < $rows; $i++) {
                $row = dbFetchRow($result, $i, $arr_utl);
                $text .= $row['RDT'] . " " . getHtmlEscapedString($row['SDATA'])."<br>";
            }
        }
    }
}
$text .= "<br><br>";

// '飲むドモ直販の場合
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
        $text .= "見つかりません。";
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