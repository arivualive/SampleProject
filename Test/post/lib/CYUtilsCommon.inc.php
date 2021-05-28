<?php
/**
 * �y���C�����ʊ֐��Q�t�@�C�� �z
 *
 * @package default
 * @version $Id: CYUtilsCommon.inc.php,v 1.13 2007/12/17 10:00:54 kazuyuki_ikeda Exp $
 */
 
/**
 * 'CYUtilsDevice.inc.php' �� require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsDevice.inc.php';
/**
 * 'CYUtilsFile.inc.php' �� require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsFile.inc.php';
/**
 * 'CYUtilsDatabase.inc.php' �� require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsDatabase.inc.php';
/**
 * 'CYUtilsStringChk.inc.php' �� require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsStringChk.inc.php';
/**
 * 'CYUtilsStringRep.inc.php' �� require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsStringRep.inc.php';
/**
 * 'CYUtilsLog.inc.php' �� require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsLog.inc.php';
/**
 * 'CYUtilsDate.inc.php' �� require_once
 */ 
require_once dirname(__FILE__) . '/CYUtilsDate.inc.php';

/**
 * 'Helper' �� require_once
 */
require_once dirname(__FILE__) . '/helper/Helper.php';
// overload('Helper');
$h = new Helper();

/**
 * HTML�G�X�P�[�v���ꂽ��������擾����
 * 
 * htmlspecialchars($str, ENT_QUOTES, 'Shift_JIS') ���s���Ă��܂�.
 * �G�������܂ޕ�����ւ̎g�p�ɂ͒��ӂ��Ă�������.
 * AU�̊G�����ɂ�img�v�f�𗘗p���Ă�����̂�����̂�
 * �����͊G�����Ƃ��ĕ\������Ȃ��Ȃ�܂�.
 * 
 * @param string $str �ϊ��Ώۂ̕�����
 * 
 * @return string �G�X�P�[�v���ꂽ������
 */
function  getHtmlEscapedString ($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'Shift_JIS');
}

/**
 * ������̔z��̗v�f����؂蕶����ŘA������������𐶐�����
 * 
 * �擪��Prefix����������邱�Ƃ��ł��܂�.
 * �z�񒆂̋󕶎��͖�������܂�.
 * 
 * 
 * @param array  $strings ������̔z��
 * @param string $separator ��؂蕶����
 * @param string $prefix    Prefix������
 * 
 * @return string ��؂�ꂽ������
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
 * PC���[�U��IP�A�h���X���擾����
 * 
 * TODO: �Ԃ�l�̌^���l������.
 * TODO: �擾�ł��Ȃ������ꍇ�̕Ԃ�l���l������.
 * 
 * @return string IP�A�h���X�̕�����, 
 *                  ������, IP�A�h���X���擾�ł��Ȃ������ꍇ�͕����� 'unknown'
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
 * USER_AGENT���擾����
 * 
 * ��) ���̊֐��ɂ�锻��͐M�p�ł��܂���. 
 *     Apache Module mod_cy_core �ɂ�锻��𗘗p���Ă�������.
 *
 *
 * @global string �L�����AID
 *
 * @return string ���[�U�[�G�[�W�F���g
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
 * �L�����A�����s���郆�[�U�[����ID�ł��郆�[�U�[ID���擾����
 * 
 * mod_cy_core�̎g�p��O��Ƃ��܂�.
 * 
 * @return array ���[�U�[����ID���i�[���ꂽ�z��B
 * ('uid_def'=>$_SERVER["HTTP_X_CY_UID"]�A
 * 'uid'=>$_SERVER["HTTP_X_CY_STRIPPED_UID"])�B
 * �ʏ��'uid_def'�Ŏ擾�����l���g�p���Ă�������.
 */
function getUid()
{

    $user_id = array();

    $user_id['uid_def'] = $_SERVER['HTTP_X_CY_UID'];
    $user_id['uid']     = $_SERVER['HTTP_X_CY_STRIPPED_UID'];

    return $user_id;
}
/**
 * �����o���z��� '' �ŏ���������
 * 
 * @access private
 * 
 * @param array &$member �����o���z��
 * @param array $keys   �����o���z��̃L�[���܂܂��z��
 * 
 * @return bool ���true
 */
function initializeMember (&$member, $keys)
{
    foreach ($keys as $key) {
            $member[$key] = '';
    }
    
    return true;
}
/**
 * �w�肳�ꂽ uid �� getSqlValue() �����l��
 * '__uid__' ("'"���܂�) ��u������.
 * 
 * @param array  &$conditions where �������̔z�� 
 * @param string $uid �u������UID
 * 
 * @return bool ���true
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
 * �����o���֐���DB����̏���ǉ�����
 * 
 * @access private
 * 
 * @param array    &$member     �����o���z��
 * @param resource $con_id      DB�R�l�N�V�������[�\�[�XID
 * @param string   $uid         �����o��UID
 * @param string   $table_name  �����o���̃e�[�u����
 * @param array    $columns     �����擾����e�[�u���̃J������
 * @param array    $where_conds WHERE�����̔z��
 * @param array    $order_conds ORDER BY�����̔z�� 
 *     
 * @return bool �Ή����郌�R�[�h�������񂪎擾�ł���� true,
 *                  ����ȊO�� false
 */
function addInfoToMember (&$member, $con_id, $uid, 
    $table_name, $columns, $where_conds, $order_conds)
{
  
    if (strlen($table_name) === 0) {
        return false;
    }
    //�������̊܂ޕϐ��̒u���i�ΏہF__uid__�j
    replaceWhereConditions($where_conds, $uid);

    //����o�^�e�[�u���̎Q��
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
 * ��������f�[�^�x�[�X����擾����
 * 
 * @global string ���[�U�[ID
 * @global string ����o�^�e�[�u����
 * @global array ����o�^�e�[�u���擾�J������
 * @global array ����o�^�e�[�u���f�[�^�擾����
 * @global array ����o�^�e�[�u���f�[�^�擾����orderby
 * @global string ���[�U�[���e�[�u����
 * @global array ���[�U�[���e�[�u���擾�J������
 * @global array ���[�U�[���e�[�u���f�[�^�擾����
 * @global array ���[�U�[���e�[�u���f�[�^�擾����orderby
 * 
 * @param mixed $con DB�R�l�N�V�������[�\�[�XID.
 *      �����Ƃ��ēn���Ȃ��ꍇ�͊֐����Ŏ擾���܂�.
 * @return array ��������i�[�����A�z�z��
 *      �L�[�ɂ� ����o�^�e�[�u���̃J�������� 'MEMBER_FLAG' ������܂�.
 *      �L�[ 'MEMBER_FLAG' �̒l�� 0 �̏ꍇ��, 
 *      DB�Ƃ̐ڑ���SQL���̎��s�Ɏ��s���Ă��邱�Ƃ������܂�.
 */
function getMember($con=false)
{
    global $uid, $USER_REG_TABLE, $USER_REG_ITEM, $USER_REG_WHERE,
         $USER_PR_TABLE, $USER_PR_ITEM, $USER_PR_WHERE,
         $USER_REG_ORDER,$USER_PR_ORDER;
         
    //DB�ڑ�
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

    //�擾�J�����̏�����
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
    //�v���t�B�[�����̎擾
        
    if (!addInfoToMember($member, $con_utl, $uid, 
        $USER_PR_TABLE, $USER_PR_ITEM, $USER_PR_WHERE, $USER_PR_ORDER)) {
        if ($con === false) {
            dbClose($con_utl);
        }
        return $member;        
    }

    //DB�ؒf
    if ($con === false) {
        dbClose($con_utl);
    }

    return $member;
}

/**
 * �O��ۋ������擾����
 * 
 * 2006�N12�����O�̃o�[�W������, ���炩�ɐ�������������Ă��܂���.
 * �C�����܂�����, ���������ǂ����̕ۏ؂͂ł��܂���.
 *
 * @global string �L�����AID
 * @global string ���ݓ�
 * @global string ���ݔN
 * @global string ���݌�
 *
 * @param string $reg_date YYYYMMDD�`���̕�����ŕ\�����ꂽ����o�^���t
 * @return string YYYYMMDD�`���̕�����ŕ\�����ꂽ�O��ۋ��� 
 */
function getChargeDate($reg_date)
{
    global $CARRIER_ID,$getDateDd,$getDateYyyy,$getDateMm;

    // ���N�����擾
    $year_now  = intval($getDateYyyy);
    $month_now = intval($getDateMm);
    $day_now   = intval($getDateDd);

    switch ($CARRIER_ID) {
        case 'v':
            // �o�^�N�����擾(��:20040901)
            $year_regist  = intval(substr($reg_date, 0, 4));
            $month_regist = intval(substr($reg_date, 4, 2));
            $day_regist   = intval(substr($reg_date, 6, 2));

            // ��{�ˑO��ۋ��������N�{�����{�o�^��
            $year_charge  = $year_now;
            $month_charge = $month_now;
            $day_charge   = $day_regist;

            // �o�^���������̏ꍇ�ˑO��ۋ��������N�{�����{��������
            if ($day_regist === intval(getMonthEnd($year_regist, $month_regist))) {
                $day_charge = intval(getMonthEnd($year_now, $month_now));
            } elseif ($day_regist > intval(getMonthEnd($year_now, $month_now))) {
                // �o�^�����������݂��Ȃ��ꍇ�ˑO��ۋ��������N�{�����{��������
                $day_charge = intval(getMonthEnd($year_now, $month_now));
            }

            // �O��ۋ����������𒴂��Ă��܂����ꍇ�A�����|�P�ōēx�v�Z
            if ($day_charge > $day_now) {
                --$month_now;
                if ($month_now < 1) {
                    --$year_now;
                    $month_now = 12;
                }

                // ��{�ˑO��ۋ��������N�{�����{�o�^��
                $year_charge  = $year_now;
                $month_charge = $month_now;
                $day_charge   = $day_regist;
            }

            // �o�^���������̏ꍇ�ˑO��ۋ��������N�{�����{��������
            if ($day_regist === intval(getMonthEnd($year_regist, $month_regist))) {
                $day_charge = intval(getMonthEnd($year_now, $month_now));
                // �o�^�����������݂��Ȃ��ꍇ�ˑO��ۋ��������N�{�����{��������
            } elseif ($day_regist > intval(getMonthEnd($year_now, $month_now))) {
                $day_charge = intval(getMonthEnd($year_now, $month_now));
            }

            return sprintf('%04d%02d%02d', $year_charge, $month_charge, $day_charge);
            
            
        case 'i':
        case 'e':
        case 'w':
            // �����P���ݒ�
            return sprintf('%04d%02d01', $year_now, $month_now);
        default:
            return '';
            
    }

}


/**
 * �L�����A�ʂ�URL�ɕt�����鋤�ʃp�����[�^���擾����(<samp><a></samp>��)
 * 
 * DoCoMo,Softvank: ���[�U����ID�擾�p�p�����[�^
 * AU: �L���b�V�����p�����_���p�����[�^
 * 
 * @global string �L�����AID
 * @global int    ezweb�p�����_���p�����[�^
 * @global string Softbank ���[�U����ID�擾�p�p�����[�^
 * @global int    Softbank 3gc ���[�U����ID�擾�p�p�����[�^
 * 
 * @return string �L�����A�ɓK�����p�����[�^
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

            //3GC�̏ꍇ�̓p�����[�^��ύX
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
 * �L�����A�ʂ�form��action��ɓn�����ʃp�����[�^���擾����(<samp><form></samp>��)
 * 
 * DoCoMo,Softvank: ���[�U�[����ID�擾�p�p�����[�^
 * AU: �L���b�V�����p�����_���p�����[�^
 * 
 * TODO: 'i' �̏ꍇ�������s���Ȃ�. ��������.
 * TODO: XHTML�Ή�?
 * 
 * @global string �L�����AID
 * @global int    ezweb�p�����_���p�����[�^
 * @global string Softbank ���[�U����ID�擾�p�p�����[�^
 * @global int    Softbank 3gc ���[�U����ID�擾�p�p�����[�^
 * 
 * @return string �L�����A�ɓK�����p�����[�^
 *                 HTML��input�v�f(hidden�����t��)��\�������������Ԃ��܂�.
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
            //3GC�̏ꍇ�̓p�����[�^��ύX
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
 * �L�����A�ʂɃT�[�o�[�Ƀf�[�^�𑗂�`��(METHOD)���擾����
 * 
 * Softbank��3GC�[���ȊO�Fget
 * ����ȊO: post
 * 
 * @global string �L�����AID
 * 
 * @return string �L�����A�ɓK����HTTP METHOD������킷������('post' or 'get')
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
            //Softbank 3GC�[����POST
            if (get3gcFlag() === true) {
                return 'post';
            } 
            return 'get';
        default:
            return '';
    }
}

/**
 * �L�����A�ʂɓ��̓��[�h���擾����
 * 
 * ���̊֐����Ԃ��A�z�z��ɂ�, �ȉ����L�[�Ƃ���
 * ���̓��[�h������킷�����񂪊i�[����܂�.
 * 'hiragana'=>�Ђ炪�ȃ��[�h
 * 'katakana'=>�J�^�J�i���[�h
 * 'alphabet'=>�p�������[�h
 * 'numeric'=>�������[�h
 * 
 * @global string �L�����AID
 * 
 * @return string ���̓��[�h���i�[�����A�z�z��
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
 * �L�����A�ʂɃA�N�Z�X�L�[(�_�C���N�g�L�[)���擾����
 * 
 * 0�`9�܂� (Willcom �̂� '*', '#' ��)
 * 
 * @global string �L�����AID
 * 
 * @return string �L�����A�ɓK�����A�N�Z�X�L�[(�_�C���N�g�L�[)���i�[�����z��
 * �z��̃L�[�Ƃ��Ĉꌅ�̐��l��^�����, 
 * ���̐��l�̃{�^�����������Ƃ��̃A�N�Z�X�L�[������킷�������Ԃ��܂�.
 * Willcom �̂� '*', '#' �ɑ΂��Ă��l���܂݂܂�.
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
 * POPGATE�p�G���R�[�h�֐�
 * 
 * @access private
 * 
 * @param string $str �Ώە�����
 * @return string �G���R�[�h���ꂽ�Ώە�����
 */
function cy_popgate_enc ($str)
{
    // ---------- �����`�F�b�N
    //
    if (!isset($str)) {
        return('');
    }
    // echo("SRC=$str\n");
    
    // ---------- ������
    //
    $base    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $slt     = str_repeat('a', strlen($str));
    $reg_pat = array('/\+/', '/\//', '/=+$/');
    $rep_pat = array('_', '.', '');

    // ---------- �Í�������
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
 * POPGATE�p�f�R�[�h�֐�
 * 
 * @access private
 * 
 * @param string $target �Ώە�����
 * @return string �f�R�[�h���ꂽ�Ώە�����. �f�R�[�h�Ɏ��s�����ꍇ�͋󕶎���.
 */
function cy_popgate_dec ($target)
{
    // ---------- �����`�F�b�N
    //
    if (!isset($target)) {
        return('');
    }
    
    // ---------- ��������
    //
    preg_match('/^(.+)(.)(.)(.)$/', $target, $matches);
    list( , $str, $len1, $len2, $parity) = $matches;
    // echo("$str:$len1:$len2:$parity\n");
    
    // ---------- ������
    //
    $base    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $reg_pat = array('/_/', '/\./');
    $rep_pat = array('+', '/');
    
    // ----------     ����������
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
 * �G���R�[�h������������擾����
 * 
 * POP�Q�[�g�p�̃G���R�[�h�ƂȂ��Ă��܂��B
 * 
 * @param string $str �G���R�[�h���s������������
 * @return string �G���R�[�h���ꂽ������
 */
function getEncryptParam($str)
{
    return cy_popgate_enc($str);
}

/**
 * �f�R�[�h������������擾����
 * 
 * POP�Q�[�g�p�̃f�R�[�h�ƂȂ��Ă��܂��B
 * 
 * @param string $str �f�R�[�h���s������������
 * @return string �f�R�[�h���ꂽ������. �f�R�[�h�Ɏ��s�����ꍇ�͋󕶎���.
 */
function getDecryptParam($str)
{
    return cy_popgate_dec($str);
}


/**
 * �G���R�[�h����UID���擾����
 * 
 * POP�Q�[�g�p�̃G���R�[�h�ƂȂ��Ă��܂��B
 * 
 * @param string $uid �G���R�[�h���s������UID
 * 
 * @return string �G���R�[�h���ꂽUID. ��̕������^�����ꍇ�ɂ͋�̕�����.
 */
function getEncryptUid($uid)
{
    if (strlen($uid) < 1) {
        return '';
    }

    return getEncryptParam($uid);
}


/**
 * �f�R�[�h����UID���擾����
 * 
 * POP�Q�[�g�p�̃f�R�[�h�ƂȂ��Ă��܂��B
 * 
 * @param string $encuid �f�R�[�h���s������UID
 * 
 * @return string �f�R�[�h���ꂽUID. 
 *              ��̕������^�����ꍇ��f�R�[�h�Ɏ��s�����ꍇ�͋�̕�����.
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
 * willcom�pauthcheck(�ۋ��p�f�B���N�g���֊m�F���ɍs��)
 *
 * @global string ���[�gURL
 * @global string �L�����AID
 *
 * @return void
 */
//--------------------------------------------------------
// * @param string $arg1 �o�^��񎞔C�Ӄp�����[�^
// * @param string $arg2 �o�^��񎞔C�Ӄp�����[�^
//function authCheckForW1($arg1,$arg2) {
function authCheckForW1()
{
    global $CARRIER_ID,$ROOT_URL, $PC_MODE;

    // �p�����[�^�[
    $tm = $_REQUEST['tm'];

    //willcom�[���ȊO�Ȃ珈�����s��Ȃ�
    if ($CARRIER_ID != 'w' || $PC_MODE == true) {
        return;
    }

    // �F�،�^�C���A�E�g�����擾
    $timeout = date('YmdHis', mktime(date('H'), date('i')-2, date('s'), 
        date('m'), date('d'), date('Y')));

    //charge�f�B���N�g�������̖߂�y�[�W�p�����[�^�쐬
    //URL&�p�����[�^
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

        //���_�C���N�gURL�쐬�i�ۋ��`�F�b�N�y�[�W+�߃y�[�W+�p�����[�^�j
        $redirect_url = $ROOT_URL.'/regist/charge/CYAuthCheckW.php?returl='.
            $target_uri.$target_prm;
        //�ۋ��f�B���N�g���փ��_�C���N�g
        header('Location: ' . $redirect_url);
    }
    
}

/**
 * willcom�pauthcheck(pocketpay��DB���ƍ���DB����)
 * 
 * @global string ���C�u�����̃p�X
 * @global string �L�����AID
 * 
 * @param string $uid
 * @param int    $member_flg ����t���O(1:��� 0:����)
 * @param string $arg1 �o�^��񎞔C�Ӄp�����[�^
 * @param string $arg2 �o�^��񎞔C�Ӄp�����[�^
 * @return string �F�؂ŃL�����A�Ƃ��ꂪ�������ꍇ1��Ԃ��B
 */
function authCheckForW2($uid, $member_flg,$arg1='',$arg2='')
{
    global $LIB_PATH, $CARRIER_ID;

    // �p�����[�^�[
    $ppay = $_REQUEST['pocketpay'];
    if ($CARRIER_ID === 'w' && strlen($ppay) > 0) {
        //�F�؃^�C���A�E�g�̏ꍇ
        include_once $LIB_PATH.'/dbaccess/InitRegDB.inc.php';
        $flag = file_exists($LIB_PATH.'/regist/CYInitReg.inc.php');
        if ($member_flg === '1' && $ppay === 'no') {
            //�L�����A�̓o�^�󋵂ɂ��킹�A�R���e���c���
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
            //�L�����A�̓o�^�󋵂ɂ��킹�A�R���e���c�o�^
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
 * ��Í�����View�e�[�u����Like���������s
 *
 * @param mixed  $con            View�p��DB�R�l�N�V����ID
 * @param array  $arr_clum_list  �J���������X�g
 * @param bool   $table          �e�[�u����
 * 
 * @return array �Y���̉���ԍ���z��ŕԂ�
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
				
			// ��R-#32300_�yH29-00379-01�zVIP��p�t�H�[���\�z 2017/12/18 nul-hatano
            case "VIP_SampleRequest_V":
            case "VIP_SampleRequest_View":
    		    $primary = "VIP_REQUEST_ID";
    		    $table1   = "VIP_SampleRequest1_V";
    		    $table2   = "VIP_SampleRequest2_V";
                break;
			// ��R-#32300_�yH29-00379-01�zVIP��p�t�H�[���\�z 2017/12/18 nul-hatano
                
            case "Member_V":
            case "Member_View":
            default:
    		    $primary = "KAINNO";
    		    $table1   = "Member1_V";
    		    $table2   = "Member2_V";
                break;
        }
	}
	
	//Where������
	$where = array();
	$where_mail = array();
	foreach($arr_clum_list as $key => $value){
	    $value = trim($value);
	    //PC���[���A�h���X���S��v�Ή� 2008/07/01 #386
		//PC�A�g�у��[���A�h���X���S��v�Ή� #729 ���o�C���Ή� 2009/02/27 kdl-uchida
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
	
	//�X�e�[�g�����g�̊J��
	dbFreeResult($result);

	return $unique;
}

// ��R-#15037_���q�l�Ή����[���Ǘ� 2014/07/09 uls-motoi
/**
 * WHERE��ɏ�����ǉ�����
 *
 * @param[ref] $where WHERE��
 * @param $cond �ǉ��������
 * @param $conjun �ڑ���
 */
function addWhere( &$where, $cond, $conjun = 'AND' ) {

	// WHERE�傪��̏ꍇ(WHERE��t�^)
	if (!$where) {
		$where = " WHERE ";
	// ���߂ĂłȂ��ꍇ(������$conjun�Ō���)
	} else {
		$where .= ' ' . $conjun . ' ';
	}
	$where .= $cond . ' ';

}
// ��R-#15037_���q�l�Ή����[���Ǘ� 2014/07/09 uls-motoi

//��R-#36948_�yH30-0100-003�z�R���e���c�^�p���P 2020/06/29 jst-morimoto
/**
 * JSON�z��ɃG���R�[�h�A�������͔z��Ƀf�R�[�h����
 *
 * @return string JSON�R���o�[�g���ꂽJSON�z��A�������͔z���Ԃ�
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
//��R-#36948_�yH30-0100-003�z�R���e���c�^�p���P 2020/06/29 jst-morimoto
?>
