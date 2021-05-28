<?php
/**
 *
 * �y���t����֐��Q�t�@�C�� �z    
 *
 * @package default
 * @version $Id: CYUtilsDate.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */

/**
 * ���t�Ƃ��Đ������t�H�[�}�b�g���`�F�b�N����
 * 
 * 'YYYYMMDD'�ł���킳��鐔�l�����񂩂ǂ����`�F�b�N����
 * 
 * @param string $num �`�F�b�N�Ώۂ̕�����
 * @return bool OK�ł����true NG�ł����false    
 */
function chkDateFormat($num)
{
    if (preg_match('/^(\d\d\d\d)(\d\d)(\d\d)$/', $num, $matches) !== 1) {
        return false;
    }
    return checkdate($matches[2], $matches[3], $matches[1]);
}

/**
 * ���݂̓��t�Ǝw�肵���N���̍����̌�����Ԃ�
 * 
 * ��)���̊֐��͐��������삵�܂���.
 *    mktime()���g�p���č�����邱�Ƃ𐄏����܂�.
 *    
 * 
 * @global string ���ݓ��t�ϐ�yyyy    
 * @global string ���ݓ��t�ϐ�mm    
 * @global string ���ݓ��t�ϐ�dd    
 * 
 * @param string $yyyymmdd �Ώۓ��t
 * @return int �o�߂�������    
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

    //�o�ߓ��t�N�����ݔN�ȑO
    if (($get_year - $target_year) > 0) {
        $lapsed_year= $get_year - $target_year;
    }

    if ($get_month < $target_month) {
        //�o�ߓ��t�������݌�����
        $lapsed_year= $lapsed_year -1;
        $lapsed_month= $lapsed_month + (12 - ($target_month - $get_month));
    } else {
        if ($get_month > $target_month) {
            //�o�ߓ��t�������݌��ȑO
            $lapsed_month= $lapsed_month + ($get_month - $target_month);
        } else {
            if ($get_month == $target_month) {

            }
        }
    }
    
    if ($get_day < $target_day) {
        //�o�ߓ��t�������݂���
        $lapsed_month= $lapsed_month -1;
    }

    $lapsed_month= $lapsed_month + ($lapsed_year * 12);

    return $lapsed_month;

}

/**
 * �Ώۓ��t����O��(�N����)������t���擾����
 * 
 * ��) mktime()�̎g�p�𐄏����܂�.
 * 
 * TODO: �������Ȃ����͂��^���炦���ꍇ�ɃG���[(false?)��Ԃ�.
 * 
 * @param string $yyyymmdd �Ώۓ��t(YYYYMMDD�`���̕�����)
 * @param int $year �Ώۓ��t����O�シ��N���l�B�ύX���Ȃ��ꍇ��0��n���B
 * @param int $month �Ώۓ��t����O�シ�錎���l�B�ύX���Ȃ��ꍇ��0��n���B
 * @param int $day �Ώۓ��t����O�シ������l�B�ύX���Ȃ��ꍇ��0��n���B
 * @return string �Ώۓ��t��O�サ�����t(YYYYMMDD�`���̕�����)
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
 * YYYYMMDD�`���̕������N�A���A���̕\���p�ɐ��`���擾����
 * 
 * TODO: �������Ȃ����͂��^���炦���ꍇ�ɃG���[(false?)��Ԃ�.
 * 
 * @param string $yyyymmdd �Ώۓ��t
 * @return string �\���p���`����(ex. 05��5)�N�A���A���̒l���i�[����Ă���A�z�z��    
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
 * �w�肳�ꂽ�N���̌��������擾����
 * 
 * TODO: �������Ȃ����͂��^���炦���ꍇ�ɃG���[(false? or ''?)��Ԃ�.
 * 
 * @param int $year    �N    
 * @param int $month    ��    
 * @return string ������    
*/
function getMonthEnd($year, $month)
{
    $year= intval($year);
    $month= intval($month);

    // �������e�[�u��
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
