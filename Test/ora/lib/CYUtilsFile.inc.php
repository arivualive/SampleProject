<?php
/**
 *
 * 【ファイル操作関数群ファイル】
 * 
 * @package default
 * @version $Id: CYUtilsFile.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */


/**
 * 基本的なページング処理を行う
 * 注) この関数は廃止予定であり, 使用しないことを推奨します.
 * 
 * @param array $page_key ページング情報を格納した連想配列。
 *  ('current_page'=> 現在のページ、'list_max_count'=>1ページ表示件数、
 *  'record_count'=> レコード総数)
 * @return array ページング情報を格納した連想配列
 *  ('page_count' => ページ総数、'start_index' => 現在ページレコード開始位置、
 *   'next_start_index' => 次ページレコード開始位置、'prev_page' => 前ページ番号、
 *   'next_page' => 次ページ番号)
*/
function getPagingInfo($page_key)
{

    $current_page = $page_key['current_page'];
    $list_count   = $page_key['list_max_count'];
    $record_count = $page_key['record_count'];

    if (strlen($current_page) <= 0 || chkNumeric($current_page) != 1) {
        $current_page = 1;
    }
    if (strlen($list_count) <= 0 || strlen($record_count) <= 0) {
        //        $err_msg  = '必要な情報が足りない為、' . 
        //         'ページング処理を行えません。(';
        //        $err_msg .= 'current_page='.$current_page.
        //          ',list_count='.$list_count.
        //          ', record_count='.$record_count;
        //        $err_msg .= ')';
        //        error($err_msg);
    }

    //全体のページ数をカウント
    $page_count = $record_count / $list_count;
    if (($record_count % $list_count) > 0) {
        $page_count++;
        $page_count = floor($page_count);
    }

    //スタート位置
    $start_index = ($current_page - 1) * $list_count;
    //次ページのスタート位置
    $next_start_index = $start_index + $list_count;
    if ($next_start_index > $record_count) {
        $next_start_index = $record_count;
    }
    //前のページ設定
    if ($current_page > 0) {
        $prev_page = $current_page - 1;
    } else {
        $prev_page = 0;
    }
    //次のページ設定
    if (($start_index + $list_count) >= $record_count) {
        $next_page = 0;
    } else {
        $next_page = $current_page + 1;
    }

    $page_data['page_count']       = $page_count;
    $page_data['start_index']      = $start_index;
    $page_data['next_start_index'] = $next_start_index;
    $page_data['prev_page']        = $prev_page;
    $page_data['next_page']        = $next_page;

    return $page_data;
}
?>
