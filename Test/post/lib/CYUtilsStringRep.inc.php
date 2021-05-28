<?php


/**
 *
 * 【文字列操作関数(置換関数)群ファイル】
 *
 * @package default
 * @version $Id: CYUtilsStringRep.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 *
 */
 
/**
 *  'CYUtilsDevice.inc.php' の require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsDevice.inc.php';

// ▼R-#42989_【R02-0029-104】不具合対応（改善対応）_WEB管理ツールの確認画面でメール本文の入力内容が消えている 2020/11/15 saisys-hasegawa
// ハイライト置換文字列
const REPLACE_STR_NOT_NAME        = '#####NOT_NAME#####';
const REPLACE_STR_HTGHLIGHT_START = '#####HTGHLIGHT_START#####';
const REPLACE_STR_HTGHLIGHT_END   = '#####HTGHLIGHT_END#####';
// ▲R-#42989_【R02-0029-104】不具合対応（改善対応）_WEB管理ツールの確認画面でメール本文の入力内容が消えている 2020/11/15 saisys-hasegawa

/**
 * 桁数に合わせて文字列の前に '0' を付与する.
 * 
 * 注) str_pad()の使用を推奨します。
 * 
 * @param string $number 対象値
 * @param int    $length 桁数
 * 
 * @return string 処理された文字列
 */
function repDecimalFormat($number, $length)
{

    //TODO sprintf()関数の使用

    $str= $number;
    for ($i= strlen($number); $i < $length; ++$i) {
        $str= '0' . $str;
    }
    return $str;
}

/**
 * SJISをJISに変換する
 * 
 * 注) mb_convert_encoding()関数の使用を推奨します。
 * 
 * @param string $sjis SJIS文字
 * @return string JISに変換された文字列
 */
function repSjisToJis($sjis)
{
    $jis= '';
    $ascii= true;
    $b= unpack('C*', $sjis);
    for ($i= 1; $i <= count($b); ++$i) {
        if ($b[$i] >= 0x80) {
            if ($ascii) {
                $ascii= false;
                $jis .= chr(0x1B) . '$B';
            }
            $b[$i] <<= 1;
            if ($b[$i +1] < 0x9F) {
                $b[$i] -= ($b[$i] < 0x13F) ? 0xE1 : 0x61;
                $b[$i +1] -= ($b[$i +1] > 0x7E) ? 0x20 : 0x1F;
            } else {
                $b[$i] -= ($b[$i] < 0x13F) ? 0xE0 : 0x60;
                $b[$i +1] -= 0x7E;
            }
            $b[$i]= $b[$i] & 0xff;
            $jis .= pack('CC', $b[$i], $b[$i +1]);
            ++$i;
        } else {
            if (!$ascii) {
                $ascii= true;
                $jis .= chr(0x1B) . '(B';
            }
            $jis .= pack('C', $b[$i]);
        }
    }
    if (!$ascii)
        $jis .= chr(0x1B) . '(B';
    return $jis;
}

/**
 * 文字コードをEUC-JPに変換する
 * 
 * 注)mb_convert_encoding()関数の使用を推奨します。
 * 
 * @param string $arg 対象文字列
 * @return string EUC-JPに変換された文字列
 */
function repEuc($arg)
{

    // 文字列の文字コードを判別  
    $code= i18n_discover_encoding($arg);

    // 非EUC-JPの場合のみEUC-JPに変換 
    if ($code !== 'EUC-JP') {
        $arg= mb_convert_encoding($arg, 'EUC-JP', $code);
    }
    return $arg;
}

/**
 * 文字コードをSHIFT_JISに変換する
 * 
 * 注) mb_convert_encoding()関数の使用を推奨します。
 * 
 * @param string $arg 対象文字列
 * @return string SHIFT_JISに変換された文字列
 */
function repSjis($arg)
{

    // 文字列の文字コードを判別
    $code= i18n_discover_encoding($arg);

    // 非SHIFT_JISの場合のみSHIFT_JISに変換 
    if ($code !== 'SJIS') {
        $arg= mb_convert_encoding($arg, 'SJIS', $code);
    }
    return $arg;
}

/**
 * 指定された条件での文字列の置換を行なう
 * repIToElse() のサブルーチン
 * 
 * 注) さらに変換される文字列が増えるのであれば, $root_url, 
 * $param 等も1つの配列にまとめたほうがよい
 * 
 * @access private
 * 
 * @param string $str 変換対象文字列
 * @param array  $emoji_from 変換元キャリアの絵文字の配列
 * @param array  $emoji_to 変換先キャリアの絵文字の配列
 * @param string $root_url_from  変換元キャリアのROOT URL
 * @param string $root_url_to  変換先キャリアのROOT URL 
 * @param string $param_from 変換元キャリアのURLに付くパラメータ
 * @param string $param_to 変換先キャリアのURLに付くパラメータ 
 * 
 * @return string 指定キャリアに適した文字列 
 */
function repIToElseSub($str, $emoji_from, $emoji_to, $root_url_from, $root_url_to, 
    $param_from, $param_to)
{

    for ($i= 0; $i < count($emoji_from); ++$i) {
        $str= mb_ereg_replace($emoji_from[$i], $emoji_to[$i], $str);
    }

    $str= str_replace($param_from, $param_to, $str);

    return str_replace($root_url_from, $root_url_to, $str);

}

/**
 * 文字列内にi-mode固有の表現があれば現在のキャリアに対応した表現に変更する
 * 
 * TODO: getUrlParam() と連携ないし統合すべき
 * 
 * @global string キャリアID
 * @global string URL:i-mode
 * @global string URL:Softbank
 * @global string URL:ez-web
 * @global string UID:Softbank
 * @global int UID:ez-web
 * @global array  絵文字:i-mode
 * @global array  絵文字:Softbank
 * @global array  絵文字:ez-web
 * @global string URL:willcom
 * @global array  絵文字:willcom
 * @global int V3GC端末につけるパラメータ
 * 
 * @param string $str 対象文字列
 * @return string 指定キャリアに適した文字列
 */
function repIToElse($str)
{
    global $CARRIER_ID, $ROOT_URL_I, $ROOT_URL_V, $ROOT_URL_E, 
        $SERVICE_ID_V, $ez_param, $EMOJI_I, $EMOJI_V, $EMOJI_E,
        $ROOT_URL_W, $EMOJI_W,
        $v3gc_param;
    
    
    switch($CARRIER_ID){
        case 'v':
            if (get3gcFlag() === true) {
                return repIToElseSub($str, $EMOJI_I, $EMOJI_V, 
                    $ROOT_URL_I, $ROOT_URL_V, 
                    'uid=NULLGWDOCOMO', 't='. urlencode(strval($v3gc_param)));
            } else {
                return repIToElseSub($str, $EMOJI_I, $EMOJI_V, 
                    $ROOT_URL_I, $ROOT_URL_V, 
                    'uid=NULLGWDOCOMO', 'uid=1&sid=' . urlencode($SERVICE_ID_V));
            }
            break;
        case 'e':
            return repIToElseSub($str, $EMOJI_I, $EMOJI_E, 
                $ROOT_URL_I, $ROOT_URL_E, 'uid=NULLGWDOCOMO', 
                't=' . urlencode(strval($ez_param)));
            break;
        case 'w':
            return repIToElseSub($str, $EMOJI_I, $EMOJI_W, 
                $ROOT_URL_I, $ROOT_URL_W, 'uid=NULLGWDOCOMO', 't=1');
            break;
        default:
            break;
    }

    return $str;
}

/**
 * 全角文字(カタカナと英数字, スペースを除く)を半角に変換する
 * 
 * 注) mb_convert_kana()関数の使用を推奨します。
 * 
 * @param string $data 文字列
 * 
 * @return string 半角に変換された文字列
 */
function repZenToHan($data)
{
    //「全角片仮名」を「半角片仮名」に変換        
    $tmpdata1= mb_convert_kana($data, 'k', 'Shift_JIS'); 
    //「全角」英数字を「半角」に変換
    $tmpdata2= mb_convert_kana($tmpdata1, 'a', 'Shift_JIS'); 
    return $tmpdata2;
}

/**
 * Softbankの絵文字のパターン
 */
define('CY_EMOJI_V_PATTERN', '/\x1B\$[EFGOPQ][\x21-\x7A]\x0F/');

/**
 * AUのIMG要素による絵文字のパターン
 * 
 * localsrc, icon属性のみを考慮する
 */
define('CY_EMOJI_E_PATTERN_IMG', 
    '/<img\s+(?:localsrc|icon)\s*=\s*"\s*\d+\s*"\s*\/?>/i');

/**
 * EZWebの絵文字のパターン
 */
define('CY_EMOJI_E_PATTERN_EZWEB', '/(?<![\x81-\x9F\xE0-\xFC])(?:' .
             implode('|', array(
                        '[\xF3\xF6\xF7][\x40-\x7E\x80-\xFC]',
                        '\xF4[\x40-\x7E\x80-\x8D]'
                        ))
             . ')/'); 
/**
 * Willcom の絵文字のパターン
 */
define('CY_EMOJI_W_PATTERN', '/&#\\d+;/');
/**
 * i-Mode絵文字の存在をチェックする
 * 
 * SJISの外字の範囲に定義されている0xF89F～0xF8FC, 0xF940～0xF9FC 
 * の文字をチェックします.
 * 
 * @param string $str 文字列
 * @return bool 存在する場合:true, 存在しない場合:false
 */
function repEmojiCheckI($str)
{
    for ($i= 0; $i < mb_strlen($str); ++$i) {
        $tmp= unpack('C*', mb_substr($str, $i, 1));
        if (count($tmp) === 1) {
            continue;
        }

        $hex1= $tmp[1];
        $hex2= $tmp[2];
        
        if (($hex1 === 0xF8 && 0x9F <= $hex2 && $hex2 <= 0xFC) || 
            ($hex1 === 0xF9 && 0x40 <= $hex2 && $hex2 <= 0xFC)) {
            return true;
        }
    }
    return false;
}

/**
 * i-Mode絵文字を除去する
 * 
 * SJISの外字の範囲に定義されている0xF89F～0xF9FCの文字を除去します.
 * 
 * @param string $str 文字列
 * 
 * @return bool 絵文字が除去された文字列
 */
function repEmojiRemoveI($str)
{
    $ret= '';
    for ($i= 0; $i < mb_strlen($str); ++$i) {
        $tmp= mb_substr($str, $i, 1);
        if (repEmojiCheckI($tmp) === false) {
            $ret .= $tmp;
        }
    }
    return $ret;
}

/**
 * Softbank絵文字の存在をチェックする
 * 
 * 次に定義されている絵文字のチェックを行う。
 * http://developers.softbankmobile.co.jp/dp/tool_dl/web/picword_top.php
 *
 * @param string $str 文字列
 * @return bool 存在する場合:true, 存在しない場合:false
 */
function repEmojiCheckV($str)
{
    if (preg_match(CY_EMOJI_V_PATTERN, $str) === 1) {
        return true;
    }
    return false;
}

/**
 * Softbank絵文字を除去する
 *
 * @param string $str 文字列
 * @return string 絵文字が除去された文字列
 */
function repEmojiRemoveV($str)
{
    return preg_replace(CY_EMOJI_V_PATTERN, '', $str);
}

/**
 * au,tuka絵文字の存在をチェックする
 * 
 * チェックする内容は、XHTMLでの絵文字タグの記述,
 * Ezwebの絵文字,
 * 及びi絵文字が変換されるためrepEmojiCheckI() です.
 * メール本文の絵文字(バイナリ埋め込み)はチェックできません。
 * 
 * 対応する絵文字タグは以下の通り.
 * アルファベットの大文字小文字は区別しません
 * <samp><img localsrc="{数字}"></samp>
 * <samp><img icon="{数字}"></samp>
 * localsrc, icon 以外の属性が含まれている場合には対応しません.
 * 
 * @param string $str 文字列
 * 
 * @return bool 存在する場合:true, 存在しない場合:false
 */
function repEmojiCheckE($str)
{
    if (preg_match(CY_EMOJI_E_PATTERN_IMG,
               $str) === 1) {
        return true;
    }

    if (preg_match(CY_EMOJI_E_PATTERN_EZWEB,
               $str) === 1) {
        return true;
    }

    //i絵文字は変換候補のためチェック
    return repEmojiCheckI($str);
}

/**
 * au,tuka絵文字を除去する
 * 
 * 除去の候補となる文字はrepEmojiCheckE()と同じです.
 *
 * @param string $str 文字列
 * 
 * @return string 絵文字が除去された文字列
 */
function repEmojiRemoveE($str)
{
    
    $str = preg_replace(CY_EMOJI_E_PATTERN_IMG,
        '', $str);

    $str = preg_replace(CY_EMOJI_E_PATTERN_EZWEB,
        '', $str);

    //i絵文字は変換候補のためチェック
    $str = repEmojiRemoveI($str);
    return $str;
}

/**
 * WILLCOM絵文字の存在をチェックする
 * 
 * WILLCOM独自の絵文字のチェックに加えて
 * i絵文字が変換されるためrepEmojiCheckI()によるチェック
 * も行ないます.
 * 
 * メール本文の絵文字(バイナリ埋め込み)はチェックできません。
 * 
 * @param string $str チェックを行う文字列
 * 
 * @return bool 存在する場合:true, 存在しない場合:false
 */
function repEmojiCheckW($str)
{
    if (preg_match(CY_EMOJI_W_PATTERN, $str) === 1) {
        return true;
    }
    //i絵文字は変換候補のためチェック
    return repEmojiCheckI($str);
}

/**
 * willcom絵文字を除去する
 *
 * @param string $str 文字列
 * @return bool 絵文字が除去された文字列
 */
function repEmojiRemoveW($str)
{
    $str = preg_replace(CY_EMOJI_W_PATTERN, '', $str);
    
    //i絵文字は変換候補のためチェック
    $str = repEmojiRemoveI($str);
    return $str;
}

/**
 * すべてのキャリアの絵文字の存在をチェックする
 * 
 * @param string $str 文字列
 * 
 * @return bool 存在する場合:true, 存在しない場合:false
 */
function repEmojiCheck($str)
{
    //docomo絵文字存在チェック
    if (repEmojiCheckI($str)) {
        return true;
    }
    //Softbank絵文字存在チェック
    if (repEmojiCheckV($str)) {
        return true;
    }
    //au,tuka絵文字存在チェック
    if (repEmojiCheckE($str)) {
        return true;
    }
    //willcom絵文字存在チェック
    if (repEmojiCheckW($str)) {
        return true;
    }
    return false;
}

/**
 * すべてのキャリアの絵文字を除去する
 * 
 * @param string $str 文字列
 * 
 * @return string 絵文字が除去された文字列
 */
function repEmojiRemove($str)
{
    //docomo絵文字を除去する
    $str= repEmojiRemoveI($str);
    //Softbank絵文字を除去する
    $str= repEmojiRemoveV($str);
    //au,tuka絵文字を除去する
    $str= repEmojiRemoveE($str);
    //willcom絵文字を除去する
    $str= repEmojiRemoveW($str);
    return $str;
}

// ▼R-#35962 【H30-0442-001】メール誤送信チェック機能追加 2020/10/01 hmc-nagatani
/**
 * $lastnameに一致しない名前のマークアップを行う
 * 文字「様」を基準に苗字の検索を行い、不一致の場合<mark>タグでマークアップを行う
 * 
 * @param string $lastname お客様苗字(SJIS)
 * @param string $str メール本文(SJIS)
 * 
 * @return string マークアップ後のメール本文(SJIS)
 */
function repIgnoreStringMarkup($lastname,$str)
{
    // 文字コード変換用の関数を定義(sjis -> utf8)
    $conv_utf2sjis = function($str){
        return mb_convert_encoding($str, 'Shift-JIS', 'UTF-8');
    };
    // 文字コード変換用の関数を定義(utf8 -> sjis)
    $conv_sjis2utf = function($str){
        return mb_convert_encoding($str, 'UTF-8', 'Shift-JIS');
    };

    // １．メール本文に、「紹介」または「贈り物」の文字列が含まれている場合、ハイライト処理を中断する
    // ▼R-#42989_【R02-0029-104】不具合対応（改善対応）_WEB管理ツールの確認画面でメール本文の入力内容が消えている 2020/11/15 saisys-hasegawa
    $str_utf8 = htmlspecialchars_decode($conv_sjis2utf($str), ENT_QUOTES);
    // ▲R-#42989_【R02-0029-104】不具合対応（改善対応）_WEB管理ツールの確認画面でメール本文の入力内容が消えている 2020/11/15 saisys-hasegawa
    $lastname_utf8=$conv_sjis2utf($lastname);
    $wkptn_utf8=$conv_sjis2utf("/紹介|贈り物/u");
    $ret = preg_match($wkptn_utf8, $str_utf8);
    if($ret===1){
        //「紹介」または「贈り物」が含まれる場合は何もせず終了
        logDebug('「紹介」または「贈り物」が含まれる為処理を終了');
        return ["",$str];
    }

    // $lastnameが指定されているか
    if($lastname==""){
        // $lastnameが未指定の場合は何もせず終了
        logDebug('お客様苗字が空白の為処理を終了');
        return ["",$str];
    }

    // ２．抽出したリストから除外文字列と苗字の一致する要素を除外しハイライト対象のリストを作成する

    // DBから除外文字列一覧を取得
    $con_utl = dbConnect();

    // 除外文字列（前方用）を取得
	$sql  = "SELECT ";
	$sql .= " IGNORESTRING ";
	$sql .= " FROM EDITOR_IGNORESTRING_TBL ";
	$sql .= " where KINOKBN=1 ";    // 除外文字列（前方用）を取得

    $ignoreArray_a = array();
    $arr_utl=array();
	$result = dbQuery($con_utl, $sql);
    $rows = getNumRows($result, $arr_utl);
	$ignoreArray_a = array();
	for ($i = 0; $i < $rows; $i++) {
		$row = dbFetchRow($result, $i, $arr_utl);
		$ignoreArray_a[] = $row['IGNORESTRING'];
    }

    // ステートメントの開放
	dbFreeResult($result);

	// DB close
	dbClose($con_utl);

    
    // ３．抽出した文字列から、お客様苗字と除外文字列に後方一致する文字列を削除する

    $matchArray_utf8=array();
    $wkptn_utf8=$conv_sjis2utf("/(.{0,".(mb_strlen($lastname_utf8, 'UTF-8')+1)."})様/u");
    $ret = preg_match_all($wkptn_utf8, $str_utf8, $matchArray_utf8, PREG_PATTERN_ORDER);


    // 抽出した文字列から重複している文字列を取り除く
    $matchArray_unique_utf8=array_unique($matchArray_utf8[1]);
    // 文字数の長い順にソートする
    array_multisort( array_map( "strlen", $matchArray_unique_utf8 ), SORT_DESC, $matchArray_unique_utf8 ) ;

    // 除外文字列へ精査後のお客様名を代入
    $ret_lastname_array = repSpaceCnv($lastname);
    $ignoreArray_a[] = $ret_lastname_array[0].'様';
    $ignoreArray_a[] = $ret_lastname_array[0].' 様';
    $ignoreArray_a[] = $ret_lastname_array[0].'　様';
    if(count($ret_lastname_array)>1){
        $ignoreArray_a[] = $ret_lastname_array[1].'様';
        $ignoreArray_a[] = $ret_lastname_array[1].' 様';
        $ignoreArray_a[] = $ret_lastname_array[1].'　様';
    }

    // ▼R-#42989_【R02-0029-104】不具合対応（改善対応）_WEB管理ツールの確認画面でメール本文の入力内容が消えている 2020/11/15 saisys-hasegawa
    $highlightArray = array();
    foreach($matchArray_unique_utf8 as $key => $val_utf8){
        if($val_utf8!=""){
            $wkptn_utf8 = $conv_sjis2utf('/.?'.preg_quote($lastname,'/').'[\s]{0,1}$/u');
            if(preg_match($wkptn_utf8,$val_utf8)>0){
                continue;   //苗字と一致していたらハイライトしない
            }
            foreach($ignoreArray_a as $ignorestring){
                $wkptn_utf8 = '/.?'.preg_quote($val_utf8).$conv_sjis2utf('様').'$/u';
                if(false!==strpos($val_utf8.$conv_sjis2utf('様'),$conv_sjis2utf($ignorestring))){
                    continue 2;   //除外リスト（後方）と一致していたらハイライトしない
                }
            }
            $highlightArray[] = $conv_utf2sjis($val_utf8);
        }else{
            $highlightArray[] = REPLACE_STR_NOT_NAME;
        }
    }

    if(count($highlightArray)>0){
        // ４．ハイライト対象の文字列をハイライト表示する

        $wkstr_utf8 = $str_utf8;
        foreach($highlightArray as $val){
            if($val===REPLACE_STR_NOT_NAME){
                // 様のみ入力された場合
                $wkptn_utf8 = $conv_sjis2utf("/^様/mu");
                $wkto_utf8 = $conv_sjis2utf(REPLACE_STR_HTGHLIGHT_START.'様'.REPLACE_STR_HTGHLIGHT_END);
                $wkstr_utf8 = preg_replace($wkptn_utf8, $wkto_utf8, $wkstr_utf8);
                $rtnval = '(空白)様';
            }else{
                // 文字列＋様が入力された場合
                $wkstr_sjis = $conv_utf2sjis($wkstr_utf8);
                $wkptn_sjis = $val . '様';
                $wkto_sjis  = REPLACE_STR_HTGHLIGHT_START . $val . '様' . REPLACE_STR_HTGHLIGHT_END;
                $wkstr_sjis = str_replace($wkptn_sjis, $wkto_sjis, $wkstr_sjis);
                $wkstr_utf8 = $conv_sjis2utf($wkstr_sjis);
                $rtnval = htmlspecialchars($val, ENT_QUOTES);
            }
        }

        // ハイライト表示に変換
        $wkstr = htmlspecialchars($conv_utf2sjis($wkstr_utf8), ENT_QUOTES);
        $wkstr = str_replace(REPLACE_STR_HTGHLIGHT_START, '<span style="background-color: #FFFF00;">', $wkstr);
        $wkstr = str_replace(REPLACE_STR_HTGHLIGHT_END  , '</span>'                                  , $wkstr);
        
        // PHPエラーで結果が空欄となった場合はハイライト無しの文字列を返す(サーバーエラーとならず続行している為)
        if ($wkstr == '') {
        	$wkstr = $str;
        }

        // 返還後文字列を返却
        return [$rtnval,$wkstr];
    }else{
        return ["",$str];
    }
    // ▲R-#42989_【R02-0029-104】不具合対応（改善対応）_WEB管理ツールの確認画面でメール本文の入力内容が消えている 2020/11/15 saisys-hasegawa
}

/**
 * 姓名をの整形を行う
 * 
 * 1.全角スペースを半角スペースへ変換
 * 2.先頭・最終文字がスペースなら削除
 * 3.連続する半角スペースを1つのみへ変換
 * 4.もし半角スペース1箇所のみで区切られている場合、前者を苗字として切り出す
 * 
 * @param string $fullname 対象文字列
 * @return array [0]処理3までの結果を格納
 *               [1]もし処理4に該当した場合、苗字を格納。それ以外の場合は未設定
 */
function repSpaceCnv($fullname) {
	//スペース位置を探り姓のみ取得する

	//全角スペースを半角スペースへ
	$str_tmp=mb_convert_kana($fullname,"s");

	//先頭・最終文字がスペースなら削除
	$str_tmp = trim($str_tmp, ' ');

	//連続する半角スペースを削除
	$str_tmp = preg_replace('/\s+/', ' ', $str_tmp);

    $ret_array = array();
    $ret_array[] = $str_tmp;

    if(mb_substr_count($str_tmp," ") == 1 ) {
		//半角スペース1個の場合(姓名が半角1個で区切られ判別可能なので姓のみ設定)
        $ret_array[] = mb_substr($str_tmp, 0, mb_strpos($str_tmp,' '));
	}

	return $ret_array;
}
// ▲R-#35962 【H30-0442-001】メール誤送信チェック機能追加 2020/10/01 hmc-nagatani

?>