<?php
/**
 * 【メイン共通関数群ファイル 】
 *
 * @package default
 * @version $Id: CYUtilsCommon.inc.php,v 1.13 2007/12/17 10:00:54 kazuyuki_ikeda Exp $
 */
 
/**
 * 'CYUtilsDevice.inc.php' の require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsDevice.inc.php';
/**
 * 'CYUtilsFile.inc.php' の require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsFile.inc.php';
/**
 * 'CYUtilsDatabase.inc.php' の require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsDatabase.inc.php';
/**
 * 'CYUtilsStringChk.inc.php' の require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsStringChk.inc.php';
/**
 * 'CYUtilsStringRep.inc.php' の require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsStringRep.inc.php';
/**
 * 'CYUtilsLog.inc.php' の require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsLog.inc.php';
/**
 * 'CYUtilsDate.inc.php' の require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsDate.inc.php';

/**
 * 'Helper' の require_once
 */
require_once dirname(__FILE__) . '/helper/Helper.php';
// overload('Helper');
$h = new Helper();

/**
 * HTMLエスケープされた文字列を取得する
 * 
 * htmlspecialchars($str, ENT_QUOTES, 'Shift_JIS') を行っています.
 * 絵文字を含む文字列への使用には注意してください.
 * AUの絵文字にはimg要素を利用しているものがあるので
 * これらは絵文字として表示されなくなります.
 * 
 * @param string $str 変換対象の文字列
 * 
 * @return string エスケープされた文字列
 */
function  getHtmlEscapedString ($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'Shift_JIS');
}

/**
 * 文字列の配列の要素を区切り文字列で連結した文字列を生成する
 * 
 * 先頭にPrefix文字列をつけることができます.
 * 配列中の空文字は無視されます.
 * 
 * 
 * @param array  $strings 文字列の配列
 * @param string $separator 区切り文字列
 * @param string $prefix    Prefix文字列
 * 
 * @return string 区切られた文字列
 */
function fncArrayToSeparetedString ($strings, $separator, $prefix='') 
{
    
    if (!is_array($strings)) {
        return '';
    }
    
    $str = '';

    $init = true;
    
    for ($i=0; $i < count($strings); ++$i) {
        if (strlen($strings[$i]) > 0) {
            if ($init) {
                $init  = false;
                $str  .= $prefix . $strings[$i] ;
            } else {
                $str .= $separator . $strings[$i] ;
            }
        }
    }
    return $str;
}
/**
 * PCユーザのIPアドレスを取得する
 * 
 * TODO: 返り値の型を考慮する.
 * TODO: 取得できなかった場合の返り値を考慮する.
 * 
 * @return string IPアドレスの文字列, 
 *                  ただし, IPアドレスが取得できなかった場合は文字列 'unknown'
 */
function getPcUserIp()
{
    $unknown = 'unknown';
    if (isset($_SERVER)) {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }
        return $unknown;
        
    } else {
        if (getenv('HTTP_X_FORWARDED_FOR') !== false
                && getenv('HTTP_X_FORWARDED_FOR') !== '') {
            return getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_CLIENT_IP') !== false 
                && getenv('HTTP_CLIENT_IP') !== '') {
            return getenv('HTTP_CLIENT_IP');
        } elseif (getenv('REMOTE_ADDR') !== false 
                && getenv('REMOTE_ADDR') !== '') {
            return getenv('REMOTE_ADDR');
        }
        return $unknown;
    }
}


/**
 * USER_AGENTを取得する
 * 
 * 注) この関数による判定は信用できません. 
 *     Apache Module mod_cy_core による判定を利用してください.
 *
 *
 * @global string キャリアID
 *
 * @return string ユーザーエージェント
 */
function getUserAgent()
{
    global $CARRIER_ID;

    switch ($CARRIER_ID) {
        case 'i':
            $agent_param = explode('/', $_SERVER['HTTP_USER_AGENT']);
            if ($agent_param[1] === '1.0') {
                $user_agent = $agent_param[2];
            } else {
                $foma_agent = explode(' ', $agent_param[1]);
                $foma_agent = explode('(', $foma_agent[1]);
                $user_agent = $foma_agent[0];
            }
            break;
        case 'e':
            $agent       = $_SERVER['HTTP_USER_AGENT'];
            $array_agent = explode(' ', $agent);
            $ez_agent    = explode('-', $array_agent[0]);
            $user_agent  = $ez_agent[1];
            if (($user_agent === 'SDK/11') || ($user_agent === 'OPWV')) {
                $user_agent = 'CA22';
            }
            break;
        case 'v':
            $user_agent = $_SERVER['HTTP_X_JPHONE_MSNAME'];
            if (strpos($user_agent, '_') > 0) {
                $user_agent = substr($user_agent, 0, strpos($user_agent, '_'));
            }
            break;
        case 'w':
            $agent      = $_SERVER['HTTP_USER_AGENT'];
            $will_agent = explode('/', $agent);
            $user_agent = $will_agent[2];
            break;
        default:
            $user_agent = '';
            break;
    }
    return $user_agent;
}

/**
 * キャリアが発行するユーザー識別IDであるユーザーIDを取得する
 * 
 * mod_cy_coreの使用を前提とします.
 * 
 * @return array ユーザー識別IDが格納された配列。
 * ('uid_def'=>$_SERVER["HTTP_X_CY_UID"]、
 * 'uid'=>$_SERVER["HTTP_X_CY_STRIPPED_UID"])。
 * 通常は'uid_def'で取得される値を使用してください.
 */
function getUid()
{

    $user_id = array();

    $user_id['uid_def'] = $_SERVER['HTTP_X_CY_UID'];
    $user_id['uid']     = $_SERVER['HTTP_X_CY_STRIPPED_UID'];

    return $user_id;
}
/**
 * メンバ情報配列を '' で初期化する
 * 
 * @access private
 * 
 * @param array &$member メンバ情報配列
 * @param array $keys   メンバ情報配列のキーが含まれる配列
 * 
 * @return bool 常にtrue
 */
function initializeMember (&$member, $keys)
{
    foreach ($keys as $key) {
            $member[$key] = '';
    }
    
    return true;
}
/**
 * 指定された uid を getSqlValue() した値で
 * '__uid__' ("'"も含む) を置換する.
 * 
 * @param array  &$conditions where 条件式の配列 
 * @param string $uid 置換するUID
 * 
 * @return bool 常にtrue
 */
function replaceWhereConditions(&$conditions, $uid)
{
    for ($i=0; $i < count($conditions); ++$i) {
        $conditions[$i] = str_replace("'__uid__'", 
            getSqlValue($uid), $conditions[$i]);
    }
    
    return true;
}

/**
 * メンバ情報関数にDBからの情報を追加する
 * 
 * @access private
 * 
 * @param array    &$member     メンバ情報配列
 * @param resource $con_id      DBコネクションリーソースID
 * @param string   $uid         メンバのUID
 * @param string   $table_name  メンバ情報のテーブル名
 * @param array    $columns     情報を取得するテーブルのカラム名
 * @param array    $where_conds WHERE条件の配列
 * @param array    $order_conds ORDER BY条件の配列 
 *     
 * @return bool 対応するレコードがあり情報が取得できれば true,
 *                  それ以外は false
 */
function addInfoToMember (&$member, $con_id, $uid, 
    $table_name, $columns, $where_conds, $order_conds)
{
  
    if (strlen($table_name) === 0) {
        return false;
    }
    //条件文の含む変数の置換（対象：__uid__）
    replaceWhereConditions($where_conds, $uid);

    //会員登録テーブルの参照
    $sql = fncArrayToSeparetedString($columns, ', ', 'select ');
    if ($sql === '') {
        return false;
    }
    $sql .= ' from '.$table_name.' ';
    $sql .= fncArrayToSeparetedString($where_conds, ' and ', 'where ');
    $sql .= ' ';
    $sql .= fncArrayToSeparetedString($order_conds, ' , ', 'order by ');
    
    $result_id = dbQuery($con_id, $sql);
    if ($result_id === false) {
        return false;
    }
    $data = fncDataGetResult($result_id);
    dbFreeResult($result_id);  
	
    if (count($data) === 0) {
        return false;
    } 
    $member = array_merge($member, $data[0]);
    
    return true;
}

/**
 * 会員情報をデータベースから取得する
 * 
 * @global string ユーザーID
 * @global string 会員登録テーブル名
 * @global array 会員登録テーブル取得カラム名
 * @global array 会員登録テーブルデータ取得条件
 * @global array 会員登録テーブルデータ取得条件orderby
 * @global string ユーザー情報テーブル名
 * @global array ユーザー情報テーブル取得カラム名
 * @global array ユーザー情報テーブルデータ取得条件
 * @global array ユーザー情報テーブルデータ取得条件orderby
 * 
 * @param mixed $con DBコネクションリーソースID.
 *      引数として渡さない場合は関数内で取得します.
 * @return array 会員情報を格納した連想配列
 *      キーには 会員登録テーブルのカラム名と 'MEMBER_FLAG' があります.
 *      キー 'MEMBER_FLAG' の値が 0 の場合は, 
 *      DBとの接続かSQL文の実行に失敗していることを示します.
 */
function getMember($con=false)
{
    global $uid, $USER_REG_TABLE, $USER_REG_ITEM, $USER_REG_WHERE,
         $USER_PR_TABLE, $USER_PR_ITEM, $USER_PR_WHERE,
         $USER_REG_ORDER,$USER_PR_ORDER;
         
    //DB接続
    if ($con === false) {
        $con_utl = dbConnect();
    } else {
        $con_utl = $con;
    }

    $member = array();
    
    $member['MEMBER_FLAG'] = 0;

    if ($con_utl === false) {
        return $member;
    }

    //取得カラムの初期化
    initializeMember($member, $USER_REG_ITEM);
    initializeMember($member, $USER_PR_ITEM);

    if (!addInfoToMember($member, $con_utl, $uid, 
        $USER_REG_TABLE, $USER_REG_ITEM, $USER_REG_WHERE, $USER_REG_ORDER)) {
        if ($con === false) {
            dbClose($con_utl);
        }
        return $member;        
    }

    $member['MEMBER_FLAG'] = 1;
    //プロフィール情報の取得
        
    if (!addInfoToMember($member, $con_utl, $uid, 
        $USER_PR_TABLE, $USER_PR_ITEM, $USER_PR_WHERE, $USER_PR_ORDER)) {
        if ($con === false) {
            dbClose($con_utl);
        }
        return $member;        
    }

    //DB切断
    if ($con === false) {
        dbClose($con_utl);
    }

    return $member;
}

/**
 * 前回課金日を取得する
 * 
 * 2006年12月より前のバージョンは, 明らかに正しい動作をしていません.
 * 修正しましたが, 正しいかどうかの保証はできません.
 *
 * @global string キャリアID
 * @global string 現在日
 * @global string 現在年
 * @global string 現在月
 *
 * @param string $reg_date YYYYMMDD形式の文字列で表現された会員登録日付
 * @return string YYYYMMDD形式の文字列で表現された前回課金日 
 */
function getChargeDate($reg_date)
{
    global $CARRIER_ID,$getDateDd,$getDateYyyy,$getDateMm;

    // 今年月日取得
    $year_now  = intval($getDateYyyy);
    $month_now = intval($getDateMm);
    $day_now   = intval($getDateDd);

    switch ($CARRIER_ID) {
        case 'v':
            // 登録年月日取得(例:20040901)
            $year_regist  = intval(substr($reg_date, 0, 4));
            $month_regist = intval(substr($reg_date, 4, 2));
            $day_regist   = intval(substr($reg_date, 6, 2));

            // 基本⇒前回課金日＝今年＋今月＋登録日
            $year_charge  = $year_now;
            $month_charge = $month_now;
            $day_charge   = $day_regist;

            // 登録日が月末の場合⇒前回課金日＝今年＋今月＋今月末日
            if ($day_regist === intval(getMonthEnd($year_regist, $month_regist))) {
                $day_charge = intval(getMonthEnd($year_now, $month_now));
            } elseif ($day_regist > intval(getMonthEnd($year_now, $month_now))) {
                // 登録日が今月存在しない場合⇒前回課金日＝今年＋今月＋今月末日
                $day_charge = intval(getMonthEnd($year_now, $month_now));
            }

            // 前回課金日が今日を超えてしまった場合、今月－１で再度計算
            if ($day_charge > $day_now) {
                --$month_now;
                if ($month_now < 1) {
                    --$year_now;
                    $month_now = 12;
                }

                // 基本⇒前回課金日＝今年＋今月＋登録日
                $year_charge  = $year_now;
                $month_charge = $month_now;
                $day_charge   = $day_regist;
            }

            // 登録日が月末の場合⇒前回課金日＝今年＋今月＋今月末日
            if ($day_regist === intval(getMonthEnd($year_regist, $month_regist))) {
                $day_charge = intval(getMonthEnd($year_now, $month_now));
                // 登録日が今月存在しない場合⇒前回課金日＝今年＋今月＋今月末日
            } elseif ($day_regist > intval(getMonthEnd($year_now, $month_now))) {
                $day_charge = intval(getMonthEnd($year_now, $month_now));
            }

            return sprintf('%04d%02d%02d', $year_charge, $month_charge, $day_charge);
            
            
        case 'i':
        case 'e':
        case 'w':
            // 今月１日設定
            return sprintf('%04d%02d01', $year_now, $month_now);
        default:
            return '';
            
    }

}


/**
 * キャリア別にURLに付加する共通パラメータを取得する(<samp><a></samp>編)
 * 
 * DoCoMo,Softvank: ユーザ識別ID取得用パラメータ
 * AU: キャッシュ回避用ランダムパラメータ
 * 
 * @global string キャリアID
 * @global int    ezweb用ランダムパラメータ
 * @global string Softbank ユーザ識別ID取得用パラメータ
 * @global int    Softbank 3gc ユーザ識別ID取得用パラメータ
 * 
 * @return string キャリアに適したパラメータ
 */
function getUrlParam()
{

    global $CARRIER_ID, $ez_param, $SERVICE_ID_V, $v3gc_param;

    switch ($CARRIER_ID) {
        case 'i':
            return '?uid=NULLGWDOCOMO';
        case 'e':
            return '?t='.urlencode(strval($ez_param));
        case 'v':

            //3GCの場合はパラメータを変更
            if (get3gcFlag() === true) {
                return '?t='. urlencode(strval($v3gc_param));
            } 
            return  '?uid=1&sid='. urlencode($SERVICE_ID_V);
        case 'w':
            return '?t=1';
        default:
            return '';
    }
}

/**
 * キャリア別にformのaction先に渡す共通パラメータを取得する(<samp><form></samp>編)
 * 
 * DoCoMo,Softvank: ユーザー識別ID取得用パラメータ
 * AU: キャッシュ回避用ランダムパラメータ
 * 
 * TODO: 'i' の場合だけ改行がない. 将来統一.
 * TODO: XHTML対応?
 * 
 * @global string キャリアID
 * @global int    ezweb用ランダムパラメータ
 * @global string Softbank ユーザ識別ID取得用パラメータ
 * @global int    Softbank 3gc ユーザ識別ID取得用パラメータ
 * 
 * @return string キャリアに適したパラメータ
 *                 HTMLのinput要素(hidden属性付き)を表現した文字列を返します.
 */
function getFormParam() 
{

    global $CARRIER_ID, $ez_param, $SERVICE_ID_V, $v3gc_param;

    switch ($CARRIER_ID) {
        case 'i':
            return '<input type="hidden" name="uid" value="NULLGWDOCOMO">';
        case 'e':
            return '<input type="hidden" name="t" value="' . 
            getHtmlEscapedString(strval($ez_param))
             .'">'. "\n";
        case 'v':
            //3GCの場合はパラメータを変更
            if (get3gcFlag() === true) {
                return '<input type="hidden" name="t" value="' 
                    . getHtmlEscapedString(strval($v3gc_param))
                    .'">'."\n";
            } 
            return '<input type="hidden" name="uid" value="1">'."\n"
                . '<input type="hidden" name="sid" value="' 
                . getHtmlEscapedString($SERVICE_ID_V)
                . '">'. "\n";
            
        case 'w':
            return '<input type="hidden" name="t" value="1">'."\n";
        default:
            return '';
    }
}

/**
 * キャリア別にサーバーにデータを送る形式(METHOD)を取得する
 * 
 * Softbankの3GC端末以外：get
 * それ以外: post
 * 
 * @global string キャリアID
 * 
 * @return string キャリアに適したHTTP METHODをあらわす文字列('post' or 'get')
 */
function getFormMethod()
{
    global $CARRIER_ID;

    switch ($CARRIER_ID) {
        case 'i':
        case 'e':
        case 'w':
            return 'post';
        case 'v':
            //Softbank 3GC端末はPOST
            if (get3gcFlag() === true) {
                return 'post';
            } 
            return 'get';
        default:
            return '';
    }
}

/**
 * キャリア別に入力モードを取得する
 * 
 * この関数が返す連想配列には, 以下をキーとして
 * 入力モードをあらわす文字列が格納されます.
 * 'hiragana'=>ひらがなモード
 * 'katakana'=>カタカナモード
 * 'alphabet'=>英文字モード
 * 'numeric'=>数字モード
 * 
 * @global string キャリアID
 * 
 * @return string 入力モードを格納した連想配列
 */
function getInputMode()
{
    global $CARRIER_ID;

    $style = array();

    switch ($CARRIER_ID) {
        case 'i':
        case 'e':
        case 'w':
            $style['hiragana'] = 'istyle=1';
            $style['katakana'] = 'istyle=2';
            $style['alphabet'] = 'istyle=3';
            $style['numeric']  = 'istyle=4';
            return $style;
        case 'v':
            $style['hiragana'] = 'mode=hiragana';
            $style['katakana'] = 'mode=hankakukana';
            $style['alphabet'] = 'mode=alphabet';
            $style['numeric']  = 'mode=numeric';
            return $style;
        default:
            return $style;
    }
}

/**
 * キャリア別にアクセスキー(ダイレクトキー)を取得する
 * 
 * 0～9まで (Willcom のみ '*', '#' も)
 * 
 * @global string キャリアID
 * 
 * @return string キャリアに適したアクセスキー(ダイレクトキー)を格納した配列
 * 配列のキーとして一桁の数値を与えると, 
 * その数値のボタンを押したときのアクセスキーをあらわす文字列を返します.
 * Willcom のみ '*', '#' に対しても値を含みます.
*/
function getAccesskey()
{
    global $CARRIER_ID;

    $accesskey = array();

    switch ($CARRIER_ID) {
        case 'w':
            $accesskey['*'] = 'accesskey=*';
            $accesskey['#'] = 'accesskey=#'; 
            // Fall Through        
        case 'i':
        case 'e':
            $accesskey[0] = 'accesskey=0';
            $accesskey[1] = 'accesskey=1';
            $accesskey[2] = 'accesskey=2';
            $accesskey[3] = 'accesskey=3';
            $accesskey[4] = 'accesskey=4';
            $accesskey[5] = 'accesskey=5';
            $accesskey[6] = 'accesskey=6';
            $accesskey[7] = 'accesskey=7';
            $accesskey[8] = 'accesskey=8';
            $accesskey[9] = 'accesskey=9';
            return $accesskey;
            break;
        case 'v':
            if(get3gcFlag()){
                $accesskey[0] = 'accesskey=0';
                $accesskey[1] = 'accesskey=1';
                $accesskey[2] = 'accesskey=2';
                $accesskey[3] = 'accesskey=3';
                $accesskey[4] = 'accesskey=4';
                $accesskey[5] = 'accesskey=5';
                $accesskey[6] = 'accesskey=6';
                $accesskey[7] = 'accesskey=7';
                $accesskey[8] = 'accesskey=8';
                $accesskey[9] = 'accesskey=9';
                return $accesskey;
            }
            $accesskey[0] = 'directkey=0 nonumber';
            $accesskey[1] = 'directkey=1 nonumber';
            $accesskey[2] = 'directkey=2 nonumber';
            $accesskey[3] = 'directkey=3 nonumber';
            $accesskey[4] = 'directkey=4 nonumber';
            $accesskey[5] = 'directkey=5 nonumber';
            $accesskey[6] = 'directkey=6 nonumber';
            $accesskey[7] = 'directkey=7 nonumber';
            $accesskey[8] = 'directkey=8 nonumber';
            $accesskey[9] = 'directkey=9 nonumber';
            return $accesskey;
        default:
            return $accesskey;        
    }
    
}

//--------------------------------------------------------
//     *    encryption / decryption Settings
//--------------------------------------------------------

/**
 * POPGATE用エンコード関数
 * 
 * @access private
 * 
 * @param string $str 対象文字列
 * @return string エンコードされた対象文字列
 */
function cy_popgate_enc ($str)
{
    // ---------- 引数チェック
    //
    if (!isset($str)) {
        return('');
    }
    // echo("SRC=$str\n");
    
    // ---------- 初期化
    //
    $base    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $slt     = str_repeat('a', strlen($str));
    $reg_pat = array('/\+/', '/\//', '/=+$/');
    $rep_pat = array('_', '.', '');

    // ---------- 暗号化処理
    //
    $sum = 0;
    for ($i = 0; $i < strlen($str); ++$i) {
        $sum += ord($str[$i]) - 40;
    }
    $parity = $base[$sum % 62];
    
    $len1 = $base[(int)(strlen($str) / 62)];
    $len2 = $base[strlen($str) % 62];
    
    $enc = $str ^ $slt;
    $enc = trim(base64_encode($enc));
    
    $enc = preg_replace($reg_pat, $rep_pat, $enc);
    // echo("ENC=$enc\n");
    
    return($enc.$len1.$len2.$parity);
}


/**
 * POPGATE用デコード関数
 * 
 * @access private
 * 
 * @param string $target 対象文字列
 * @return string デコードされた対象文字列. デコードに失敗した場合は空文字列.
 */
function cy_popgate_dec ($target)
{
    // ---------- 引数チェック
    //
    if (!isset($target)) {
        return('');
    }
    
    // ---------- 引数分解
    //
    preg_match('/^(.+)(.)(.)(.)$/', $target, $matches);
    list( , $str, $len1, $len2, $parity) = $matches;
    // echo("$str:$len1:$len2:$parity\n");
    
    // ---------- 初期化
    //
    $base    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $reg_pat = array('/_/', '/\./');
    $rep_pat = array('+', '/');
    
    // ----------     復号化処理
    //
    $len1_index = strpos($base, $len1);
    if ($len1_index === false) {
        //echo("${len1_index}length error(1-1)\n");
        //return('');
    }
    $len2_index = strpos($base, $len2);
    if ($len2_index === false) {
        //echo("length error(1-2)\n");
        //return('');
    }
    $len = ($len1_index * 62) + $len2_index;
    $slt = str_repeat('a', $len);
    
    $parity_index = strpos($base, $parity);
    if ($parity_index === false) {
        //echo("parity error(1)\n");
        return('');
    }
    
    $str = preg_replace($reg_pat, $rep_pat, $str);
    $dec = base64_decode($str) ^ $slt;
    
    if (strlen($dec) !== $len) {
        //echo("length error(2)\n");
        return('');
    }
    
    $sum = 0;
    for ($i = 0; $i < $len ; ++$i) {
        $sum += ord($dec[$i]) - 40;
    }
    if (($sum % 62) != $parity_index) {
        //echo("parity error(2)\n");
        return('');
    }
    return($dec);
}

/**
 * エンコードした文字列を取得する
 * 
 * POPゲート用のエンコードとなっています。
 * 
 * @param string $str エンコードを行いたい文字列
 * @return string エンコードされた文字列
 */
function getEncryptParam($str)
{
    return cy_popgate_enc($str);
}

/**
 * デコードした文字列を取得する
 * 
 * POPゲート用のデコードとなっています。
 * 
 * @param string $str デコードを行いたい文字列
 * @return string デコードされた文字列. デコードに失敗した場合は空文字列.
 */
function getDecryptParam($str)
{
    return cy_popgate_dec($str);
}


/**
 * エンコードしたUIDを取得する
 * 
 * POPゲート用のエンコードとなっています。
 * 
 * @param string $uid エンコードを行いたいUID
 * 
 * @return string エンコードされたUID. 空の文字列を与えた場合には空の文字列.
 */
function getEncryptUid($uid)
{
    if (strlen($uid) < 1) {
        return '';
    }

    return getEncryptParam($uid);
}


/**
 * デコードしたUIDを取得する
 * 
 * POPゲート用のデコードとなっています。
 * 
 * @param string $encuid デコードを行いたいUID
 * 
 * @return string デコードされたUID. 
 *              空の文字列を与えた場合やデコードに失敗した場合は空の文字列.
 */
function getDecryptUid($encuid)
{

    if (strlen($encuid) < 1) {
        return '';
    }

    return getDecryptParam($encuid);
}

//--------------------------------------------------------
/**
 * willcom用authcheck(課金用ディレクトリへ確認しに行く)
 *
 * @global string ルートURL
 * @global string キャリアID
 *
 * @return void
 */
//--------------------------------------------------------
// * @param string $arg1 登録解約時任意パラメータ
// * @param string $arg2 登録解約時任意パラメータ
//function authCheckForW1($arg1,$arg2) {
function authCheckForW1()
{
    global $CARRIER_ID,$ROOT_URL, $PC_MODE;

    // パラメーター
    $tm = $_REQUEST['tm'];

    //willcom端末以外なら処理を行わない
    if ($CARRIER_ID != 'w' || $PC_MODE == true) {
        return;
    }

    // 認証後タイムアウト日時取得
    $timeout = date('YmdHis', mktime(date('H'), date('i')-2, date('s'), 
        date('m'), date('d'), date('Y')));

    //chargeディレクトリ判定後の戻りページパラメータ作成
    //URL&パラメータ
    if (($tm =='' || $tm <= $timeout) && $_SERVER['REQUEST_METHOD'] != 'POST') {
        $uri_chk_point = strpos($_SERVER['REQUEST_URI'], '?t=');
        if ($uri_chk_point !== false) {
             $target_uri    = substr($_SERVER['REQUEST_URI'], 0, $uri_chk_point);
             $target_prm    = substr($_SERVER['REQUEST_URI'], $uri_chk_point+1);
             $prm_chk_point = strpos($target_prm, 'pocketcuid');
             $target_prm    = '&retprm='.
                urlencode(substr($target_prm, 0, $prm_chk_point-1));
        } else {
            $uri_chk_point = strpos($_SERVER['REQUEST_URI'], '?');
            $target_uri    = substr($_SERVER['REQUEST_URI'], 0, $uri_chk_point);
            $target_prm    = '';
        }

        //リダイレクトURL作成（課金チェックページ+戻ページ+パラメータ）
        $redirect_url = $ROOT_URL.'/regist/charge/CYAuthCheckW.php?returl='.
            $target_uri.$target_prm;
        //課金ディレクトリへリダイレクト
        header('Location: ' . $redirect_url);
    }
    
}

/**
 * willcom用authcheck(pocketpayとDBを照合しDB操作)
 * 
 * @global string ライブラリのパス
 * @global string キャリアID
 * 
 * @param string $uid
 * @param int    $member_flg 会員フラグ(1:会員 0:非会員)
 * @param string $arg1 登録解約時任意パラメータ
 * @param string $arg2 登録解約時任意パラメータ
 * @return string 認証でキャリアとずれがあった場合1を返す。
 */
function authCheckForW2($uid, $member_flg,$arg1='',$arg2='')
{
    global $LIB_PATH, $CARRIER_ID;

    // パラメーター
    $ppay = $_REQUEST['pocketpay'];
    if ($CARRIER_ID === 'w' && strlen($ppay) > 0) {
        //認証タイムアウトの場合
        include_once $LIB_PATH.'/dbaccess/InitRegDB.inc.php';
        $flag = file_exists($LIB_PATH.'/regist/CYInitReg.inc.php');
        if ($member_flg === '1' && $ppay === 'no') {
            //キャリアの登録状況にあわせ、コンテンツ解約
            if ($flag === true) {
                include_once $LIB_PATH.'/regist/CYInitReg.inc.php';

                $PARAM['uid']        = $uid;
                $PARAM['carrier_id'] = $CARRIER_ID;
                $PARAM['act']        = 'rel';
                $PARAM['arg1']       = $arg1;
                $PARAM['arg1']       = $arg2;

                $chkflg = relUser($PARAM);
                if ($chkflg === 'NG') {
                    logError('willcom authchek FAILED:'.$uid);
                } else {
                     $member_flg = '0';
                }
            }
        } else if ($member_flg !== '1' && $ppay === 'yes') {
            //キャリアの登録状況にあわせ、コンテンツ登録
            if ($flag == true) {
                include_once $LIB_PATH.'/regist/CYInitReg.inc.php';

                $PARAM['uid']        = $uid;
                $PARAM['carrier_id'] = $CARRIER_ID;
                $PARAM['act']        = 'reg';
                $PARAM['arg1']       = $arg1;
                $PARAM['arg1']       = $arg2;

                $chkflg = regUser($PARAM);
                if ($chkflg === 'NG') {
                    logError('willcom authchek FAILED:'.$uid);
                } else {
                     $member_flg = '1';
                }
            }
        }
    }

    return  $member_flg;
}

/**
 * 非暗号化のViewテーブルにLike検索を実行
 *
 * @param mixed  $con            View用のDBコネクションID
 * @param array  $arr_clum_list  カラム名リスト
 * @param bool   $table          テーブル名
 * 
 * @return array 該当の会員番号を配列で返す
 */
Function fncGetSskMemberView($conView, $arr_clum_list, $table="Member_V") {
	
	if(!is_array($arr_clum_list) || !isset($arr_clum_list)) {
		return false;	
	} else {
        switch ($table) {
            case "CustomerVoice_V":
            case "CustomerVoice_View":
    		    $primary = "CVOICE_ID";
    		    $table1   = "CustomerVoice1_V";
    		    $table2   = "CustomerVoice2_V";
                break;
                
            case "SampleRequest_V":
            case "SampleRequest_View":
    		    $primary = "SAMPLE_REQUEST_ID";
    		    $table1   = "SampleRequest1_V";
    		    $table2   = "SampleRequest2_V";
                break;
				
			// ▼R-#32300_【H29-00379-01】VIP専用フォーム構築 2017/12/18 nul-hatano
            case "VIP_SampleRequest_V":
            case "VIP_SampleRequest_View":
    		    $primary = "VIP_REQUEST_ID";
    		    $table1   = "VIP_SampleRequest1_V";
    		    $table2   = "VIP_SampleRequest2_V";
                break;
			// ▲R-#32300_【H29-00379-01】VIP専用フォーム構築 2017/12/18 nul-hatano
                
            case "Member_V":
            case "Member_View":
            default:
    		    $primary = "KAINNO";
    		    $table1   = "Member1_V";
    		    $table2   = "Member2_V";
                break;
        }
	}
	
	//Where文生成
	$where = array();
	$where_mail = array();
	foreach($arr_clum_list as $key => $value){
	    $value = trim($value);
	    //PCメールアドレス完全一致対応 2008/07/01 #386
		//PC、携帯メールアドレス完全一致対応 #729 モバイル対応 2009/02/27 kdl-uchida
	    if ($key === "EMAIL_ALL") {
	    	if (strlen($value) > 0) {
    			$value = getSqlValue(substr($value, 0, strpos($value, "@")));
    			$where_mail[] = "A.EMAIL = " . $value;
	        }
	    }elseif ($key === "M_EMAIL_ALL") {
	    	if (strlen($value) > 0) {
    			$value = getSqlValue(substr($value, 0, strpos($value, "@")));
    			$where_mail[] = "A.M_EMAIL = " . $value;
	        }
	    } else if ($key === "EMAIL" || $key === "M_EMAIL") {
	        if (strstr($value, "@")) {
	            $value = substr($value, 0, strpos($value, "@"));
	        }
	        if (strlen($value) > 0) {
    	        $value = preg_replace("/^'/", "'%", getSqlValue($value));
    	        $value = preg_replace("/'$/", "%'", $value);
    			$where_mail[] = "A." . $key . " LIKE " . $value;
	        }
	    } else if ($key === "TEL_NO") {
	        $value = str_replace("-", "", $value);
	        $where[] = "A.TEL_NO = DBMS_CRYPTO.Hash(to_clob(nvl(" . getSqlValue($value) . ",0)),3)";
	    } else if ($key === "KAIN_NAME" || "NAME_KANJI" || "NAME_KANA") {
	        $value = preg_replace("/^'/", "'%", getSqlValue($value));
			$value = preg_replace("/'$/", "%'", $value);
			$where[] = "B." . $key . " LIKE " . $value;
	    }
    }
    
    if (count($where_mail) > 0) {
        $where[] = "(" . implode(" AND ", $where_mail) . ")";
    }
    
    if (count($where) <= 0) {
        return false;
    } else {
        $where[]  = "A." . $primary . " = B." . $primary . " ";
    }
	
    $sql  = "SELECT ";
    $sql .= "A." . $primary . " ";
    $sql .= "FROM ";
    $sql .= $table1 . " A, " . $table2 . " B ";
    $sql .= "WHERE ";
	$sql .= implode(" AND ", $where);
	
	$result = dbQuery($conView, $sql);
	$rows = getNumRows($result, $arr_utl);

	if ($rows <= 0) {
		return false;
	} else {
		for ($i = 0; $i < $rows; $i++) {
			$row = dbFetchRow($result, $i, $arr_utl);
			$unique[] = $row[$primary];
		}
	}
	
	//ステートメントの開放
	dbFreeResult($result);

	return $unique;
}

// ▼R-#15037_お客様対応メール管理 2014/07/09 uls-motoi
/**
 * WHERE句に条件を追加する
 *
 * @param[ref] $where WHERE句
 * @param $cond 追加する条件
 * @param $conjun 接続詞
 */
function addWhere( &$where, $cond, $conjun = 'AND' ) {

	// WHERE句が空の場合(WHERE句付与)
	if (!$where) {
		$where = " WHERE ";
	// 初めてでない場合(条件を$conjunで結合)
	} else {
		$where .= ' ' . $conjun . ' ';
	}
	$where .= $cond . ' ';

}
// ▲R-#15037_お客様対応メール管理 2014/07/09 uls-motoi

//▼R-#36948_【H30-0100-003】コンテンツ運用改善 2020/06/29 jst-morimoto
/**
 * JSON配列にエンコード、もしくは配列にデコードする
 *
 * @return string JSONコンバートされたJSON配列、もしくは配列を返す
 */
function convertJson($jsonArray, $action) {

	$jsonString = mb_convert_encoding($jsonArray, "UTF8", "SJIS");

	if($action == 'encode'){
		$jsonString = json_encode($jsonString, JSON_UNESCAPED_UNICODE);
	}else if($action == 'decode'){
		$jsonString = json_decode($jsonString, true);
	}

	switch (json_last_error()) {
		case JSON_ERROR_NONE:
			break;
		case JSON_ERROR_DEPTH:
			var_dump('JSON ERROR - Maximum stack depth exceeded');
			break;
		case JSON_ERROR_STATE_MISMATCH:
			var_dump('JSON ERROR - Underflow or the modes mismatch');
			break;
		case JSON_ERROR_CTRL_CHAR:
			var_dump('JSON ERROR - Unexpected control character found');
			break;
		case JSON_ERROR_SYNTAX:
			var_dump('JSON ERROR - Syntax error, malformed JSON');
			break;
		case JSON_ERROR_UTF8:
			var_dump('JSON ERROR - Malformed UTF-8 characters, possibly incorrectly encoded');
			break;
		default:
			var_dump('JSON ERROR - Unknown error');
			break;
	}

	$jsonString = mb_convert_encoding($jsonString, "SJIS", "UTF8");
	return $jsonString;
}
//▲R-#36948_【H30-0100-003】コンテンツ運用改善 2020/06/29 jst-morimoto
?>
