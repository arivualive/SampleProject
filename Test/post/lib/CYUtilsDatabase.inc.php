<?php
/*▼R-#13199 WEB管理ツールでメール送信してもCJISSEKI_MAIL_TBLのレコードが更新されない 2014/01/31 uls-soga*/
//対象のソースの全てのロールバックをコメントアウト
/*▲R-#13199 WEB管理ツールでメール送信してもCJISSEKI_MAIL_TBLのレコードが更新されない 2014/01/31 uls-soga*/

/**
 * 【データベース操作関数群ファイル 】
 * 
 * PHPのOracle用関数(oci8)とSybase関数のラッパー関数が
 * 主となっています。
 *
 * @package default
 * @version $Id: CYUtilsDatabase.inc.php,v 1.11 2007/12/22 10:40:35 tatsuya_odakura Exp $
 */

/**
 * 'CYUtilsDBConst.inc.php' の require_once
 */
require_once dirname(__FILE__) . '/CYUtilsDBConst.inc.php';
/**
 * 'CYUtilsLog.inc.php' の require_once
 */
require_once dirname(__FILE__) .'/CYUtilsLog.inc.php';


/**
 * トランザクションをロールバックする
 * 
 * @global int データベース種別
 * 
 * @param resource $con データベース接続ID
 * 
 * @return bool 成功であればtrue 失敗はfalse
*/
function dbRollback($con) 
{
    global $DB_KIND;

    if ($DB_KIND==1) {
        // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/25 jst-arivazhagan
        //ORACLE
        //return oci_rollback($con);
        //Postgresql
        return pg_query( $con, "ROLLBACK" );
        // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/25 jst-arivazhagan
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
 * SQL文を実行する
 * 
 * @global int データベース種別
 *  
 * @param resource $con データベース接続ID
 * @param string   $sql_stmt SQL文
 * @param bool     $tran トランザクションフラグ。
 *                        指定しない場合はfalse(トランザクションなし)
 * 
 * @return resource 成功時はDB結果ID($result_id), 
 *                  エラー時はfalse
 */
function dbQuery($con, $sql_stmt)
{

    global $DB_KIND;

    if ($DB_KIND == 1) {
        //ORACLE

        logSql($sql_stmt);
        
        // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
        //$result_id = oci_parse($con, $sql_stmt);
        $result_id = pg_query($con, $sql_stmt);
        if ($result_id === false) {
            return false;
        }
        
        // if ($tran) {
        //     $rtn = oci_execute($result_id, OCI_NO_AUTO_COMMIT);
        // } else {
        //     $rtn = oci_execute($result_id);
        // }

        // if (!$rtn) {
        //     if ($tran) {
        //         //dbRollback($con);
        //     }
        //     return false;
        // }
        return $result_id;
        // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
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
 * データベースの接続を開始する
 * 
 * TODO: 失敗時にexitする仕様の変更
 * 
 * @global string ホスト名:sybase使用    
 * @global string ユーザー名    
 * @global string パスワード    
 * @global string データベース名:oracle使用
 * @global int データベース種別 
 * @global bool DEBUG TRACEを取るかどうか
 * 
 * @return resource データベース接続ID
 *   接続ID取得に失敗した場合は実行を終了します(exitします)
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
             *  テスト環境のDBに持続接続すると、すぐに接続が切れてしまうので
             *  OCILogonを使用する
             */
        // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
        //     $con = oci_connect($DB_USER, $DB_PASS, $DB_NAME);
        // } else {
        //     $con = oci_pconnect($DB_USER, $DB_PASS, $DB_NAME);
        // }
            $con = pg_connect("host=$DB_HOST port=5432 dbname=$DB_NAME user=$DB_USER password=$DB_PASS options='--client_encoding=SJIS'");
        } else {
            $con = pg_pconnect("host=$DB_HOST port=5432 dbname=$DB_NAME user=$DB_USER password=$DB_PASS options='--client_encoding=SJIS'");
        }
        //To-Do-List-Arivazhagan
        // if ($con !== false && $DB_DEBUG_TRACE != false) {
        //     dbQuery($con, 'ALTER SESSION SET SQL_TRACE=TRUE');
        // }
         // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
    } elseif ($DB_KIND == 2) {
        //SYBASE
        $con = sybase_connect($DB_HOST, $DB_USER, $DB_PASS, 'sjis');
    }

    if ($con === false) {
        logError('It is not connectable with Data Base.');
        
        //TODO 失敗時に終了という仕様を見直す。
        exit;
    }

    return $con;
}


/**
 * View用にデータベースの接続を開始する
 * 
 * TODO: 失敗時にexitする仕様の変更
 * 
 * @global string ホスト名:sybase使用    
 * @global string ユーザー名    
 * @global string パスワード    
 * @global string データベース名:oracle使用
 * @global int データベース種別 
 * @global bool DEBUG TRACEを取るかどうか
 * 
 * @return resource データベース接続ID
 *   接続ID取得に失敗した場合は実行を終了します(exitします)
 * 
 */
function dbConnectView() {

    global $DB_HOST, $DB_USER_V, $DB_PASS_V, $DB_NAME_V, $DB_KIND;
    global $DB_DEBUG_TRACE, $TEST_FLAG, $STAGE_FLAG;
    
    if ($DB_KIND == 1) {
        //ORACLE
        if ($TEST_FLAG || $STAGE_FLAG) {
            /**
             *  テスト環境のDBに持続接続すると、すぐに接続が切れてしまうので
             *  OCILogonを使用する
             */
        // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
        //     $con = oci_connect($DB_USER_V, $DB_PASS_V, $DB_NAME_V);
        // } else {
        //     $con = oci_pconnect($DB_USER_V, $DB_PASS_V, $DB_NAME_V);
        // }
        $con = pg_connect("host=$DB_HOST port=5432 dbname=$DB_NAME_V user=$DB_USER_V password=$DB_PASS_V options='--client_encoding=SJIS'");
    } else {
        $con = pg_pconnect("host=$DB_HOST port=5432 dbname=$DB_NAME_V user=$DB_USER_V password=$DB_PASS_V options='--client_encoding=SJIS'");
    }
         // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
        //To-Do-List-Arivazhagan
        // if ($con !== false && $DB_DEBUG_TRACE != false) {
        //     dbQuery($con, 'ALTER SESSION SET SQL_TRACE=TRUE');
        // }
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
        
        //TODO 失敗時に終了という仕様を見直す。
        exit;
    }

    return $con;
}

/**
 * DBの行を連想配列として取得する
 * 
 * TODO: PHP5 には oci_fetch_array() などがある
 *       ただし, oci_fetch_array() は遅いらしい
 *
 * @global int データベース種別
 * 
 * @param resource $result_id データベース結果ID
 * @param int      $cnt 行カウント（オラクル版で使用）
 * @param array    $result_array DB結果配列（オラクル版で使用）
 * 
 * @return array 取り込んだ行が指すテーブルのカラム名をキーとした連想配列
 */
function dbFetchRow($result_id)
{
    global $DB_KIND;

    if ($DB_KIND==1) {
        // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
        //ORACLE
        // $rows = array();
        // $ncols = oci_num_fields($result_id);
        // for ( $i = 1; $i <= $ncols; ++$i ) {
        //     $column_name = oci_field_name($result_id, $i);
        //     $rows[$column_name]= $result_array[$column_name][$cnt];
        // }
        return array_change_key_case(pg_fetch_array($result_id, NULL, PGSQL_ASSOC),CASE_UPPER);
         // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
        //return $rows;
    } elseif ($DB_KIND==2) {
        //SYBASE
        return sybase_fetch_array($result_id);
    }
    return array();
}


/**
 * SybaseのSQL文実行結果の内部行ポインタを
 * 指定した行番号へのポインタに移動する
 *
 * 注) Oracleでは使用するケースは存在しません
 * 
 * @global int データベース種別
 * 
 * @param resource $result_id   データベース結果ID
 * @param int      $row_pointer 行番号
 * 
 * @return bool 成功であればtrue 失敗はfalse
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
 * データの件数を取得する
 * 
 * @global int データベース種別
 *  
 * @param resource $result_id データベース結果ID
 * @param array     $result_array DB結果取得配列(ORACLE用)
 * @return int データ件数
*/
function getNumRows($result_id)
{
    global $DB_KIND;
       
    // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
    //$result_array = array();
    if ($DB_KIND==1) {
        //ORACLE
        //return oci_fetch_all($result_id, $result_array);
        return pg_num_rows($result_id);
         // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
    } elseif ($DB_KIND==2) {
        //SYBASE
        return sybase_num_rows($result_id);
        logDebug("sybase");
    }
    return 0;
}

/**
 * SQL文実行結果を開放する
 * 
 * 注) Sybaseでは使用するケースは存在しません。
 * 
 * @global int データベース種別
 *  
 * @param resource $result_id データベース結果ID
 * @return bool 成功であればtrue 失敗はfalse
 */
function dbFreeResult($result_id)
{
    global $DB_KIND;

    if ($DB_KIND==1) {
        //ORACLE
        if (!empty($result_id)) {
            // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
            //return oci_free_statement($result_id);
            return pg_free_result($result_id);
             // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
        } else {
            return false;
            logDebug("sybase2");
        }
    }

    return true;
}


/**
 * DB接続を閉じる
 * 
 * 注) Sybaseでは使用するケースは存在しません。
 * 
 * @global int データベース種別
 * 
 * @param resource $con データベース接続ID
 * @return bool 成功であればtrue 失敗はfalse
 */
function dbClose($con)
{
    global $DB_KIND;

    if ($DB_KIND==1) {
        //ORACLE
        //PHP4 で持続的接続を利用する場合は意味がないコード
        // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
        //return oci_close($con);
        return pg_close($con);
         // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/20 jst-arivazhagan
    } 
    //SYBASE
    //sybase_close($con);
    return true;
}


/**
 * トランザクションを開始する
 * 
 * 注) Oracleでは使用するケースは存在しません。
 * 
 * @global int データベース種別
 *  
 * @param resource $con データベース接続ID
 * 
 * @return bool 成功であればtrue 失敗はfalse
 */
function dbBegin($con)
{
    global $DB_KIND;
    // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/25 jst-arivazhagan
    if ($DB_KIND==1) {
        // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/25 jst-arivazhagan
        //ORACLE
        //return oci_rollback($con);
        //Postgresql
        return pg_query( $con, "BEGIN" );
        // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/25 jst-arivazhagan
    }
    elseif ($DB_KIND == 2) {
        //SYBASE
        $result_id = sybase_query('begin transaction', $con);
        if ($result_id === false) {
            return false;
        }
    }
    return true; 
}


/**
 * トランザクションをコミットする
 * 
 * @global int データベース種別
 *   
 * @param resource $con データベース接続ID
 * @return bool 成功であればtrue 失敗はfalse
 */
function dbCommit($con)
{
    global $DB_KIND;

    if ($DB_KIND==1) {
        // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（PostgresSQLからテータ取得のために書き換え）2021/05/25 jst-arivazhagan
        //ORACLE
        //return oci_commit($con);
        //Postgresql
        return pg_query($con, 'COMMIT');
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
 * 'NULL'という文字列を返す
 * 
 * @return string 'NULL'という文字列
 */
function getSqlNullValue()
{
    return 'NULL';
}


/**
 * 文字列をSQL文に挿入できるようにエスケープする
 * 
 * Shift_JISとして不正な文字列や空文字に対しては
 * getSqlNullValue()の値を返します.
 * 
 * TODO: PHP 5 になったら mb_check_encoding()を利用する
 * 
 * @global int データベース種別
 *  
 * @param string $str 対象文字列
 * @return string エスケープされた文字列
 *  
 */
function getSqlValue($str)
{
    global $DB_KIND;

    if ($str !== mb_convert_encoding($str, 'Shift_JIS', 'Shift_JIS')) {
        return getSqlNullValue();        
    }
    if (strlen($str) > 0) {
        // "'" は 0x27 なのでShift_JISの2バイト目には来ない
        $ret = str_replace("'", "''", $str);
        if ($DB_KIND === 2) {
            //SYBASE
            $ret = mb_ereg_replace('’', '’’', $ret);
            $ret = mb_ereg_replace('‘', '‘‘', $ret);
        }
        return "'".$ret."'";
    }
    return getSqlNullValue();
    
}


/**
 * 次のIDを取得する
 * 
 * 対象テーブルの対象フィールドのMAX+1したIDを返します.
 * DB側でSequenceが利用できるならば Sequence の利用を推奨します.
 * 
 * TODO: 失敗すると die() する仕様を見直す
 * 
 * @param string $table_name 対象テーブル名
 * @param string $field_name 対象フィールド
 * @param string $where 条件文(省略可能)
 * 
 * @return int 次のID
*/
function getNextId($table_name, $field_name, $where = '')
{
    //DB接続
    $con = dbConnect();
    
    if ($con === false) {
        die('getNextId() error');
    }

    // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/27 jst-haku
    /*
    $sql  = 'select max('.$field_name.') as VALUE';
    $sql .= ' from '.$table_name;
    */
    $sql  = 'select COALESCE(max('.$field_name.'),0) as VALUE';
    $sql .= ' from '.$table_name;
    // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/27 jst-haku
    if (strlen($where) > 0) {
        $sql .= ' where '.$where;
    }
    $result_id = dbQuery($con, $sql);
    if ($result_id === false) {
        dbClose($con);
        die('getNextId() result error');
    }
    
    $result_array = array();
    
    // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/27 jst-haku
    // $num_rows = getNumRows($result_id, $result_array);
    $num_rows = getNumRows($result_id);
    // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/27 jst-haku
    
    if ($num_rows === 1) {
        dbDataSeek($result_id, 0);
        // ▼R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/27 jst-haku
        // $row    = dbFetchRow($result_id, 0, $result_array);
        $row    = dbFetchRow($result_id, 0);
        // ▲R-#45290_【R03-0111-028】次世代システム_WEB管理ツール開発（SQLを次世代用に書き換え）2021/05/27 jst-haku
        $maxId  = intval($row['VALUE']);
        $nextId = $maxId + 1;
    } else {
        $nextId = 1;
    }

    return $nextId;

    //ステートメント開放
    dbFreeResult($result_id);

    //DB切断
    dbClose($con);
    //return $nextId;
}


/**
 * 数値と判定できる値は値そのものを,
 * それ以外の値にはNULL表現を返す
 *
 * @param mixed $number 判定対象の値
 * 
 * @return mixed 数値と判定できる場合値をそのまま返す.
 *                それ以外の場合は getSqlNullValue()の値を返す.
 */
function getSqlValueNum($number)
{
    if (is_numeric($number)) {
        return $number;
    } 
    return getSqlNullValue();
}



/**
 * 取得したすべてのデータを配列に格納する
 * 
 * @param resource $result_id データベース結果ID
 * 
 * @return array データを格納した配列
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
 * ログを取得するためにoci_parse()をラッパした関数
 * 
 * @global array $SSK_SQL_LOG ステートメントIDごとにログを格納する配列
 * 
 * @param resource $con   DBの接続リソース
 * @param string   $query クエリ
 * 
 * @return resource|false ステートメントID. 失敗ならfalse
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
 * ログを取得するためにoci_bind_by_name()をラッパした関数
 * 
 * @global array $SSK_SQL_LOG ステートメントIDごとにログを格納する配列
 *  
 * @param resouce $stmt      ステートメントID
 * @param string  $ph_name   プレースフォルダ
 * @param mixed   &$variable プレースフォルダと置換する変数
 * 
 * @return bool oci_bind_by_name()の返り値
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
 * ログを取得するためにoci_execute()をラッパした関数
 * 
 * @global array $SSK_SQL_LOG ステートメントIDごとにログを格納する配列
 * 
 * @param resource $stmt ステートメントID
 * @param bool     $tran トランザクションフラグ
 * 						指定しない場合はトランザクションなし
 * 
 * @return bool oci_executeの返り値
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
