<?php
/**
 *
 * 【日付操作関数群ファイル 】    
 *
 * @package default
 * @version $Id: CYUtilsDate.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */

/**
 * 日付として正しいフォーマットかチェックする
 * 
 * 'YYYYMMDD'であらわされる数値文字列かどうかチェックする
 * 
 * @param string $num チェック対象の文字列
 * @return bool OKであればtrue NGであればfalse    
 */
function chkDateFormat($num)
{
    if (preg_match('/^(\d\d\d\d)(\d\d)(\d\d)$/', $num, $matches) !== 1) {
        return false;
    }
    return checkdate($matches[2], $matches[3], $matches[1]);
}

/**
 * 現在の日付と指定した年月の差分の月数を返す
 * 
 * 注)この関数は正しく動作しません.
 *    mktime()を使用して差を取ることを推奨します.
 *    
 * 
 * @global string 現在日付変数yyyy    
 * @global string 現在日付変数mm    
 * @global string 現在日付変数dd    
 * 
 * @param string $yyyymmdd 対象日付
 * @return int 経過した月数    
 */
function getLapsed($yyyymmdd)
{
    global $getDateYyyy, $getDateMm, $getDateDd;

    $get_year= intval($getDateYyyy);
    $get_month= intval($getDateMm);
    $get_day= intval($getDateDd);
    $target_year= intval(substr($yyyymmdd, 0, 4));
    $target_month= intval(substr($yyyymmdd, 4, 2));
    $target_day= intval(substr($yyyymmdd, 6, 2));

    $lapsed_year= 0;
    $lapsed_month= 0;

    //経過日付年が現在年以前
    if (($get_year - $target_year) > 0) {
        $lapsed_year= $get_year - $target_year;
    }

    if ($get_month < $target_month) {
        //経過日付月が現在月より先
        $lapsed_year= $lapsed_year -1;
        $lapsed_month= $lapsed_month + (12 - ($target_month - $get_month));
    } else {
        if ($get_month > $target_month) {
            //経過日付月が現在月以前
            $lapsed_month= $lapsed_month + ($get_month - $target_month);
        } else {
            if ($get_month == $target_month) {

            }
        }
    }
    
    if ($get_day < $target_day) {
        //経過日付日が現在より先
        $lapsed_month= $lapsed_month -1;
    }

    $lapsed_month= $lapsed_month + ($lapsed_year * 12);

    return $lapsed_month;

}

/**
 * 対象日付から前後(年月日)する日付を取得する
 * 
 * 注) mktime()の使用を推奨します.
 * 
 * TODO: 正しくない入力が与えらえた場合にエラー(false?)を返す.
 * 
 * @param string $yyyymmdd 対象日付(YYYYMMDD形式の文字列)
 * @param int $year 対象日付から前後する年数値。変更しない場合は0を渡す。
 * @param int $month 対象日付から前後する月数値。変更しない場合は0を渡す。
 * @param int $day 対象日付から前後する日数値。変更しない場合は0を渡す。
 * @return string 対象日付を前後した日付(YYYYMMDD形式の文字列)
 */
function getTargetDate($yyyymmdd, $year, $month, $day)
{

    $original_year= substr($yyyymmdd, 0, 4);
    $original_month= substr($yyyymmdd, 4, 2);
    $original_day= substr($yyyymmdd, 6, 2);

    return date('Ymd', mktime(0, 0, 0, 
        $original_month + $month, $original_day + $day, $original_year + $year));
}

/**
 * YYYYMMDD形式の文字列を年、月、日の表示用に整形し取得する
 * 
 * TODO: 正しくない入力が与えらえた場合にエラー(false?)を返す.
 * 
 * @param string $yyyymmdd 対象日付
 * @return string 表示用整形した(ex. 05→5)年、月、日の値が格納されている連想配列    
 */
function getDispDate($yyyymmdd)
{

    $disp_date['target_year']= substr($yyyymmdd, 0, 4);
    $disp_date['target_month']= substr($yyyymmdd, 4, 2);
    $disp_date['target_day']= substr($yyyymmdd, 6, 2);

    if (substr($disp_date['target_month'], 0, 1) === '0') {
        $disp_date['target_month']= substr($disp_date['target_month'], 1, 1);
    }
    if (substr($disp_date['target_day'], 0, 1) === '0') {
        $disp_date['target_day']= substr($disp_date['target_day'], 1, 1);
    }

    return $disp_date;
}

/**
 * 指定された年月の月末日を取得する
 * 
 * TODO: 正しくない入力が与えらえた場合にエラー(false? or ''?)を返す.
 * 
 * @param int $year    年    
 * @param int $month    月    
 * @return string 月末日    
*/
function getMonthEnd($year, $month)
{
    $year= intval($year);
    $month= intval($month);

    // 月末日テーブル
    $table= array (
        '',
        '31',
        '28',
        '31',
        '30',
        '31',
        '30',
        '31',
        '31',
        '30',
        '31',
        '30',
        '31'
    );
    if ($month === 2) {
        if (($year % 4 === 0 && $year % 100 !== 0) || $year % 400 === 0) {
            return '29';
        }
    }

    return $table[$month];
}
?>
