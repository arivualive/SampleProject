<?php


/**
 *
 * �y�����񑀍�֐�(�u���֐�)�Q�t�@�C���z
 *
 * @package default
 * @version $Id: CYUtilsStringRep.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 *
 */
 
/**
 *  'CYUtilsDevice.inc.php' �� require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsDevice.inc.php';

// ��R-#42989_�yR02-0029-104�z�s��Ή��i���P�Ή��j_WEB�Ǘ��c�[���̊m�F��ʂŃ��[���{���̓��͓��e�������Ă��� 2020/11/15 saisys-hasegawa
// �n�C���C�g�u��������
const REPLACE_STR_NOT_NAME        = '#####NOT_NAME#####';
const REPLACE_STR_HTGHLIGHT_START = '#####HTGHLIGHT_START#####';
const REPLACE_STR_HTGHLIGHT_END   = '#####HTGHLIGHT_END#####';
// ��R-#42989_�yR02-0029-104�z�s��Ή��i���P�Ή��j_WEB�Ǘ��c�[���̊m�F��ʂŃ��[���{���̓��͓��e�������Ă��� 2020/11/15 saisys-hasegawa

/**
 * �����ɍ��킹�ĕ�����̑O�� '0' ��t�^����.
 * 
 * ��) str_pad()�̎g�p�𐄏����܂��B
 * 
 * @param string $number �Ώےl
 * @param int    $length ����
 * 
 * @return string �������ꂽ������
 */
function repDecimalFormat($number, $length)
{

    //TODO sprintf()�֐��̎g�p

    $str= $number;
    for ($i= strlen($number); $i < $length; ++$i) {
        $str= '0' . $str;
    }
    return $str;
}

/**
 * SJIS��JIS�ɕϊ�����
 * 
 * ��) mb_convert_encoding()�֐��̎g�p�𐄏����܂��B
 * 
 * @param string $sjis SJIS����
 * @return string JIS�ɕϊ����ꂽ������
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
 * �����R�[�h��EUC-JP�ɕϊ�����
 * 
 * ��)mb_convert_encoding()�֐��̎g�p�𐄏����܂��B
 * 
 * @param string $arg �Ώە�����
 * @return string EUC-JP�ɕϊ����ꂽ������
 */
function repEuc($arg)
{

    // ������̕����R�[�h�𔻕�  
    $code= i18n_discover_encoding($arg);

    // ��EUC-JP�̏ꍇ�̂�EUC-JP�ɕϊ� 
    if ($code !== 'EUC-JP') {
        $arg= mb_convert_encoding($arg, 'EUC-JP', $code);
    }
    return $arg;
}

/**
 * �����R�[�h��SHIFT_JIS�ɕϊ�����
 * 
 * ��) mb_convert_encoding()�֐��̎g�p�𐄏����܂��B
 * 
 * @param string $arg �Ώە�����
 * @return string SHIFT_JIS�ɕϊ����ꂽ������
 */
function repSjis($arg)
{

    // ������̕����R�[�h�𔻕�
    $code= i18n_discover_encoding($arg);

    // ��SHIFT_JIS�̏ꍇ�̂�SHIFT_JIS�ɕϊ� 
    if ($code !== 'SJIS') {
        $arg= mb_convert_encoding($arg, 'SJIS', $code);
    }
    return $arg;
}

/**
 * �w�肳�ꂽ�����ł̕�����̒u�����s�Ȃ�
 * repIToElse() �̃T�u���[�`��
 * 
 * ��) ����ɕϊ�����镶���񂪑�����̂ł����, $root_url, 
 * $param ����1�̔z��ɂ܂Ƃ߂��ق����悢
 * 
 * @access private
 * 
 * @param string $str �ϊ��Ώە�����
 * @param array  $emoji_from �ϊ����L�����A�̊G�����̔z��
 * @param array  $emoji_to �ϊ���L�����A�̊G�����̔z��
 * @param string $root_url_from  �ϊ����L�����A��ROOT URL
 * @param string $root_url_to  �ϊ���L�����A��ROOT URL 
 * @param string $param_from �ϊ����L�����A��URL�ɕt���p�����[�^
 * @param string $param_to �ϊ���L�����A��URL�ɕt���p�����[�^ 
 * 
 * @return string �w��L�����A�ɓK���������� 
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
 * ���������i-mode�ŗL�̕\��������Ό��݂̃L�����A�ɑΉ������\���ɕύX����
 * 
 * TODO: getUrlParam() �ƘA�g�Ȃ����������ׂ�
 * 
 * @global string �L�����AID
 * @global string URL:i-mode
 * @global string URL:Softbank
 * @global string URL:ez-web
 * @global string UID:Softbank
 * @global int UID:ez-web
 * @global array  �G����:i-mode
 * @global array  �G����:Softbank
 * @global array  �G����:ez-web
 * @global string URL:willcom
 * @global array  �G����:willcom
 * @global int V3GC�[���ɂ���p�����[�^
 * 
 * @param string $str �Ώە�����
 * @return string �w��L�����A�ɓK����������
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
 * �S�p����(�J�^�J�i�Ɖp����, �X�y�[�X������)�𔼊p�ɕϊ�����
 * 
 * ��) mb_convert_kana()�֐��̎g�p�𐄏����܂��B
 * 
 * @param string $data ������
 * 
 * @return string ���p�ɕϊ����ꂽ������
 */
function repZenToHan($data)
{
    //�u�S�p�Љ����v���u���p�Љ����v�ɕϊ�        
    $tmpdata1= mb_convert_kana($data, 'k', 'Shift_JIS'); 
    //�u�S�p�v�p�������u���p�v�ɕϊ�
    $tmpdata2= mb_convert_kana($tmpdata1, 'a', 'Shift_JIS'); 
    return $tmpdata2;
}

/**
 * Softbank�̊G�����̃p�^�[��
 */
define('CY_EMOJI_V_PATTERN', '/\x1B\$[EFGOPQ][\x21-\x7A]\x0F/');

/**
 * AU��IMG�v�f�ɂ��G�����̃p�^�[��
 * 
 * localsrc, icon�����݂̂��l������
 */
define('CY_EMOJI_E_PATTERN_IMG', 
    '/<img\s+(?:localsrc|icon)\s*=\s*"\s*\d+\s*"\s*\/?>/i');

/**
 * EZWeb�̊G�����̃p�^�[��
 */
define('CY_EMOJI_E_PATTERN_EZWEB', '/(?<![\x81-\x9F\xE0-\xFC])(?:' .
             implode('|', array(
                        '[\xF3\xF6\xF7][\x40-\x7E\x80-\xFC]',
                        '\xF4[\x40-\x7E\x80-\x8D]'
                        ))
             . ')/'); 
/**
 * Willcom �̊G�����̃p�^�[��
 */
define('CY_EMOJI_W_PATTERN', '/&#\\d+;/');
/**
 * i-Mode�G�����̑��݂��`�F�b�N����
 * 
 * SJIS�̊O���͈̔͂ɒ�`����Ă���0xF89F�`0xF8FC, 0xF940�`0xF9FC 
 * �̕������`�F�b�N���܂�.
 * 
 * @param string $str ������
 * @return bool ���݂���ꍇ:true, ���݂��Ȃ��ꍇ:false
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
 * i-Mode�G��������������
 * 
 * SJIS�̊O���͈̔͂ɒ�`����Ă���0xF89F�`0xF9FC�̕������������܂�.
 * 
 * @param string $str ������
 * 
 * @return bool �G�������������ꂽ������
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
 * Softbank�G�����̑��݂��`�F�b�N����
 * 
 * ���ɒ�`����Ă���G�����̃`�F�b�N���s���B
 * http://developers.softbankmobile.co.jp/dp/tool_dl/web/picword_top.php
 *
 * @param string $str ������
 * @return bool ���݂���ꍇ:true, ���݂��Ȃ��ꍇ:false
 */
function repEmojiCheckV($str)
{
    if (preg_match(CY_EMOJI_V_PATTERN, $str) === 1) {
        return true;
    }
    return false;
}

/**
 * Softbank�G��������������
 *
 * @param string $str ������
 * @return string �G�������������ꂽ������
 */
function repEmojiRemoveV($str)
{
    return preg_replace(CY_EMOJI_V_PATTERN, '', $str);
}

/**
 * au,tuka�G�����̑��݂��`�F�b�N����
 * 
 * �`�F�b�N������e�́AXHTML�ł̊G�����^�O�̋L�q,
 * Ezweb�̊G����,
 * �y��i�G�������ϊ�����邽��repEmojiCheckI() �ł�.
 * ���[���{���̊G����(�o�C�i�����ߍ���)�̓`�F�b�N�ł��܂���B
 * 
 * �Ή�����G�����^�O�͈ȉ��̒ʂ�.
 * �A���t�@�x�b�g�̑啶���������͋�ʂ��܂���
 * <samp><img localsrc="{����}"></samp>
 * <samp><img icon="{����}"></samp>
 * localsrc, icon �ȊO�̑������܂܂�Ă���ꍇ�ɂ͑Ή����܂���.
 * 
 * @param string $str ������
 * 
 * @return bool ���݂���ꍇ:true, ���݂��Ȃ��ꍇ:false
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

    //i�G�����͕ϊ����̂��߃`�F�b�N
    return repEmojiCheckI($str);
}

/**
 * au,tuka�G��������������
 * 
 * �����̌��ƂȂ镶����repEmojiCheckE()�Ɠ����ł�.
 *
 * @param string $str ������
 * 
 * @return string �G�������������ꂽ������
 */
function repEmojiRemoveE($str)
{
    
    $str = preg_replace(CY_EMOJI_E_PATTERN_IMG,
        '', $str);

    $str = preg_replace(CY_EMOJI_E_PATTERN_EZWEB,
        '', $str);

    //i�G�����͕ϊ����̂��߃`�F�b�N
    $str = repEmojiRemoveI($str);
    return $str;
}

/**
 * WILLCOM�G�����̑��݂��`�F�b�N����
 * 
 * WILLCOM�Ǝ��̊G�����̃`�F�b�N�ɉ�����
 * i�G�������ϊ�����邽��repEmojiCheckI()�ɂ��`�F�b�N
 * ���s�Ȃ��܂�.
 * 
 * ���[���{���̊G����(�o�C�i�����ߍ���)�̓`�F�b�N�ł��܂���B
 * 
 * @param string $str �`�F�b�N���s��������
 * 
 * @return bool ���݂���ꍇ:true, ���݂��Ȃ��ꍇ:false
 */
function repEmojiCheckW($str)
{
    if (preg_match(CY_EMOJI_W_PATTERN, $str) === 1) {
        return true;
    }
    //i�G�����͕ϊ����̂��߃`�F�b�N
    return repEmojiCheckI($str);
}

/**
 * willcom�G��������������
 *
 * @param string $str ������
 * @return bool �G�������������ꂽ������
 */
function repEmojiRemoveW($str)
{
    $str = preg_replace(CY_EMOJI_W_PATTERN, '', $str);
    
    //i�G�����͕ϊ����̂��߃`�F�b�N
    $str = repEmojiRemoveI($str);
    return $str;
}

/**
 * ���ׂẴL�����A�̊G�����̑��݂��`�F�b�N����
 * 
 * @param string $str ������
 * 
 * @return bool ���݂���ꍇ:true, ���݂��Ȃ��ꍇ:false
 */
function repEmojiCheck($str)
{
    //docomo�G�������݃`�F�b�N
    if (repEmojiCheckI($str)) {
        return true;
    }
    //Softbank�G�������݃`�F�b�N
    if (repEmojiCheckV($str)) {
        return true;
    }
    //au,tuka�G�������݃`�F�b�N
    if (repEmojiCheckE($str)) {
        return true;
    }
    //willcom�G�������݃`�F�b�N
    if (repEmojiCheckW($str)) {
        return true;
    }
    return false;
}

/**
 * ���ׂẴL�����A�̊G��������������
 * 
 * @param string $str ������
 * 
 * @return string �G�������������ꂽ������
 */
function repEmojiRemove($str)
{
    //docomo�G��������������
    $str= repEmojiRemoveI($str);
    //Softbank�G��������������
    $str= repEmojiRemoveV($str);
    //au,tuka�G��������������
    $str= repEmojiRemoveE($str);
    //willcom�G��������������
    $str= repEmojiRemoveW($str);
    return $str;
}

// ��R-#35962 �yH30-0442-001�z���[���둗�M�`�F�b�N�@�\�ǉ� 2020/10/01 hmc-nagatani
/**
 * $lastname�Ɉ�v���Ȃ����O�̃}�[�N�A�b�v���s��
 * �����u�l�v����ɕc���̌������s���A�s��v�̏ꍇ<mark>�^�O�Ń}�[�N�A�b�v���s��
 * 
 * @param string $lastname ���q�l�c��(SJIS)
 * @param string $str ���[���{��(SJIS)
 * 
 * @return string �}�[�N�A�b�v��̃��[���{��(SJIS)
 */
function repIgnoreStringMarkup($lastname,$str)
{
    // �����R�[�h�ϊ��p�̊֐����`(sjis -> utf8)
    $conv_utf2sjis = function($str){
        return mb_convert_encoding($str, 'Shift-JIS', 'UTF-8');
    };
    // �����R�[�h�ϊ��p�̊֐����`(utf8 -> sjis)
    $conv_sjis2utf = function($str){
        return mb_convert_encoding($str, 'UTF-8', 'Shift-JIS');
    };

    // �P�D���[���{���ɁA�u�Љ�v�܂��́u���蕨�v�̕����񂪊܂܂�Ă���ꍇ�A�n�C���C�g�����𒆒f����
    // ��R-#42989_�yR02-0029-104�z�s��Ή��i���P�Ή��j_WEB�Ǘ��c�[���̊m�F��ʂŃ��[���{���̓��͓��e�������Ă��� 2020/11/15 saisys-hasegawa
    $str_utf8 = htmlspecialchars_decode($conv_sjis2utf($str), ENT_QUOTES);
    // ��R-#42989_�yR02-0029-104�z�s��Ή��i���P�Ή��j_WEB�Ǘ��c�[���̊m�F��ʂŃ��[���{���̓��͓��e�������Ă��� 2020/11/15 saisys-hasegawa
    $lastname_utf8=$conv_sjis2utf($lastname);
    $wkptn_utf8=$conv_sjis2utf("/�Љ�|���蕨/u");
    $ret = preg_match($wkptn_utf8, $str_utf8);
    if($ret===1){
        //�u�Љ�v�܂��́u���蕨�v���܂܂��ꍇ�͉��������I��
        logDebug('�u�Љ�v�܂��́u���蕨�v���܂܂��׏������I��');
        return ["",$str];
    }

    // $lastname���w�肳��Ă��邩
    if($lastname==""){
        // $lastname�����w��̏ꍇ�͉��������I��
        logDebug('���q�l�c�����󔒂̈׏������I��');
        return ["",$str];
    }

    // �Q�D���o�������X�g���珜�O������ƕc���̈�v����v�f�����O���n�C���C�g�Ώۂ̃��X�g���쐬����

    // DB���珜�O������ꗗ���擾
    $con_utl = dbConnect();

    // ���O������i�O���p�j���擾
	$sql  = "SELECT ";
	$sql .= " IGNORESTRING ";
	$sql .= " FROM EDITOR_IGNORESTRING_TBL ";
	$sql .= " where KINOKBN=1 ";    // ���O������i�O���p�j���擾

    $ignoreArray_a = array();
    $arr_utl=array();
	$result = dbQuery($con_utl, $sql);
    $rows = getNumRows($result, $arr_utl);
	$ignoreArray_a = array();
	for ($i = 0; $i < $rows; $i++) {
		$row = dbFetchRow($result, $i, $arr_utl);
		$ignoreArray_a[] = $row['IGNORESTRING'];
    }

    // �X�e�[�g�����g�̊J��
	dbFreeResult($result);

	// DB close
	dbClose($con_utl);

    
    // �R�D���o���������񂩂�A���q�l�c���Ə��O������Ɍ����v���镶������폜����

    $matchArray_utf8=array();
    $wkptn_utf8=$conv_sjis2utf("/(.{0,".(mb_strlen($lastname_utf8, 'UTF-8')+1)."})�l/u");
    $ret = preg_match_all($wkptn_utf8, $str_utf8, $matchArray_utf8, PREG_PATTERN_ORDER);


    // ���o���������񂩂�d�����Ă��镶�������菜��
    $matchArray_unique_utf8=array_unique($matchArray_utf8[1]);
    // �������̒������Ƀ\�[�g����
    array_multisort( array_map( "strlen", $matchArray_unique_utf8 ), SORT_DESC, $matchArray_unique_utf8 ) ;

    // ���O������֐�����̂��q�l������
    $ret_lastname_array = repSpaceCnv($lastname);
    $ignoreArray_a[] = $ret_lastname_array[0].'�l';
    $ignoreArray_a[] = $ret_lastname_array[0].' �l';
    $ignoreArray_a[] = $ret_lastname_array[0].'�@�l';
    if(count($ret_lastname_array)>1){
        $ignoreArray_a[] = $ret_lastname_array[1].'�l';
        $ignoreArray_a[] = $ret_lastname_array[1].' �l';
        $ignoreArray_a[] = $ret_lastname_array[1].'�@�l';
    }

    // ��R-#42989_�yR02-0029-104�z�s��Ή��i���P�Ή��j_WEB�Ǘ��c�[���̊m�F��ʂŃ��[���{���̓��͓��e�������Ă��� 2020/11/15 saisys-hasegawa
    $highlightArray = array();
    foreach($matchArray_unique_utf8 as $key => $val_utf8){
        if($val_utf8!=""){
            $wkptn_utf8 = $conv_sjis2utf('/.?'.preg_quote($lastname,'/').'[\s]{0,1}$/u');
            if(preg_match($wkptn_utf8,$val_utf8)>0){
                continue;   //�c���ƈ�v���Ă�����n�C���C�g���Ȃ�
            }
            foreach($ignoreArray_a as $ignorestring){
                $wkptn_utf8 = '/.?'.preg_quote($val_utf8).$conv_sjis2utf('�l').'$/u';
                if(false!==strpos($val_utf8.$conv_sjis2utf('�l'),$conv_sjis2utf($ignorestring))){
                    continue 2;   //���O���X�g�i����j�ƈ�v���Ă�����n�C���C�g���Ȃ�
                }
            }
            $highlightArray[] = $conv_utf2sjis($val_utf8);
        }else{
            $highlightArray[] = REPLACE_STR_NOT_NAME;
        }
    }

    if(count($highlightArray)>0){
        // �S�D�n�C���C�g�Ώۂ̕�������n�C���C�g�\������

        $wkstr_utf8 = $str_utf8;
        foreach($highlightArray as $val){
            if($val===REPLACE_STR_NOT_NAME){
                // �l�̂ݓ��͂��ꂽ�ꍇ
                $wkptn_utf8 = $conv_sjis2utf("/^�l/mu");
                $wkto_utf8 = $conv_sjis2utf(REPLACE_STR_HTGHLIGHT_START.'�l'.REPLACE_STR_HTGHLIGHT_END);
                $wkstr_utf8 = preg_replace($wkptn_utf8, $wkto_utf8, $wkstr_utf8);
                $rtnval = '(��)�l';
            }else{
                // ������{�l�����͂��ꂽ�ꍇ
                $wkstr_sjis = $conv_utf2sjis($wkstr_utf8);
                $wkptn_sjis = $val . '�l';
                $wkto_sjis  = REPLACE_STR_HTGHLIGHT_START . $val . '�l' . REPLACE_STR_HTGHLIGHT_END;
                $wkstr_sjis = str_replace($wkptn_sjis, $wkto_sjis, $wkstr_sjis);
                $wkstr_utf8 = $conv_sjis2utf($wkstr_sjis);
                $rtnval = htmlspecialchars($val, ENT_QUOTES);
            }
        }

        // �n�C���C�g�\���ɕϊ�
        $wkstr = htmlspecialchars($conv_utf2sjis($wkstr_utf8), ENT_QUOTES);
        $wkstr = str_replace(REPLACE_STR_HTGHLIGHT_START, '<span style="background-color: #FFFF00;">', $wkstr);
        $wkstr = str_replace(REPLACE_STR_HTGHLIGHT_END  , '</span>'                                  , $wkstr);
        
        // PHP�G���[�Ō��ʂ��󗓂ƂȂ����ꍇ�̓n�C���C�g�����̕������Ԃ�(�T�[�o�[�G���[�ƂȂ炸���s���Ă����)
        if ($wkstr == '') {
        	$wkstr = $str;
        }

        // �ԊҌ㕶�����ԋp
        return [$rtnval,$wkstr];
    }else{
        return ["",$str];
    }
    // ��R-#42989_�yR02-0029-104�z�s��Ή��i���P�Ή��j_WEB�Ǘ��c�[���̊m�F��ʂŃ��[���{���̓��͓��e�������Ă��� 2020/11/15 saisys-hasegawa
}

/**
 * �������̐��`���s��
 * 
 * 1.�S�p�X�y�[�X�𔼊p�X�y�[�X�֕ϊ�
 * 2.�擪�E�ŏI�������X�y�[�X�Ȃ�폜
 * 3.�A�����锼�p�X�y�[�X��1�݂̂֕ϊ�
 * 4.�������p�X�y�[�X1�ӏ��݂̂ŋ�؂��Ă���ꍇ�A�O�҂�c���Ƃ��Đ؂�o��
 * 
 * @param string $fullname �Ώە�����
 * @return array [0]����3�܂ł̌��ʂ��i�[
 *               [1]��������4�ɊY�������ꍇ�A�c�����i�[�B����ȊO�̏ꍇ�͖��ݒ�
 */
function repSpaceCnv($fullname) {
	//�X�y�[�X�ʒu��T�萩�̂ݎ擾����

	//�S�p�X�y�[�X�𔼊p�X�y�[�X��
	$str_tmp=mb_convert_kana($fullname,"s");

	//�擪�E�ŏI�������X�y�[�X�Ȃ�폜
	$str_tmp = trim($str_tmp, ' ');

	//�A�����锼�p�X�y�[�X���폜
	$str_tmp = preg_replace('/\s+/', ' ', $str_tmp);

    $ret_array = array();
    $ret_array[] = $str_tmp;

    if(mb_substr_count($str_tmp," ") == 1 ) {
		//���p�X�y�[�X1�̏ꍇ(���������p1�ŋ�؂�ꔻ�ʉ\�Ȃ̂Ő��̂ݐݒ�)
        $ret_array[] = mb_substr($str_tmp, 0, mb_strpos($str_tmp,' '));
	}

	return $ret_array;
}
// ��R-#35962 �yH30-0442-001�z���[���둗�M�`�F�b�N�@�\�ǉ� 2020/10/01 hmc-nagatani

?>