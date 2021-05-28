<?php
/**
 *
 * �y�t�@�C������֐��Q�t�@�C���z
 * 
 * @package default
 * @version $Id: CYUtilsFile.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */


/**
 * ��{�I�ȃy�[�W���O�������s��
 * ��) ���̊֐��͔p�~�\��ł���, �g�p���Ȃ����Ƃ𐄏����܂�.
 * 
 * @param array $page_key �y�[�W���O�����i�[�����A�z�z��B
 *  ('current_page'=> ���݂̃y�[�W�A'list_max_count'=>1�y�[�W�\�������A
 *  'record_count'=> ���R�[�h����)
 * @return array �y�[�W���O�����i�[�����A�z�z��
 *  ('page_count' => �y�[�W�����A'start_index' => ���݃y�[�W���R�[�h�J�n�ʒu�A
 *   'next_start_index' => ���y�[�W���R�[�h�J�n�ʒu�A'prev_page' => �O�y�[�W�ԍ��A
 *   'next_page' => ���y�[�W�ԍ�)
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
        //        $err_msg  = '�K�v�ȏ�񂪑���Ȃ��ׁA' . 
        //         '�y�[�W���O�������s���܂���B(';
        //        $err_msg .= 'current_page='.$current_page.
        //          ',list_count='.$list_count.
        //          ', record_count='.$record_count;
        //        $err_msg .= ')';
        //        error($err_msg);
    }

    //�S�̂̃y�[�W�����J�E���g
    $page_count = $record_count / $list_count;
    if (($record_count % $list_count) > 0) {
        $page_count++;
        $page_count = floor($page_count);
    }

    //�X�^�[�g�ʒu
    $start_index = ($current_page - 1) * $list_count;
    //���y�[�W�̃X�^�[�g�ʒu
    $next_start_index = $start_index + $list_count;
    if ($next_start_index > $record_count) {
        $next_start_index = $record_count;
    }
    //�O�̃y�[�W�ݒ�
    if ($current_page > 0) {
        $prev_page = $current_page - 1;
    } else {
        $prev_page = 0;
    }
    //���̃y�[�W�ݒ�
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
