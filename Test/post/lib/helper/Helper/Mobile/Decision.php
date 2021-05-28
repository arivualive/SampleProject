<?php
/**
 * Helper_Mobile_Decision
 *
 * @category  Helper
 * @package   Helper_Mobile
 * @version   $id$
 * @copyright 2009 Kobe Digitallabo .inc
 * @author    Shinya Ohyanagi <ohyanagi@kdl.co.jp>
 */

/**
 * @see Helper_Abstract
 */
require_once dirname(dirname(__FILE__)) . '/Abstract.php';

/**
 * Helper_Mobile_Decision
 *
 * @category  Helper
 * @package   Helper_Mobile
 * @version   $id$
 * @copyright 2009 Kobe Digitallabo .inc
 * @author    Shinya Ohyanagi <ohyanagi@kdl.co.jp>
 */
class Helper_Mobile_Decision extends Helper_Abstract
{
    /**
     * �g�у��[���A�h���X�̃h���C�����X�g
     *
     * @var    mixed
     * @access protected
     */
    var $_addressLists = null;

    /**
     * �g�у��[���A�h���X���X�g��ǂݍ���
     *
     * @access public
     * @return void
     */
    function init()
    {
        $path = dirname(dirname(dirname(dirname(__FILE__)))) . '/mobile_address_list.ini';
        $ini  = file_get_contents($path);
        $ini  = str_replace(PHP_EOL, '', $ini);
        if (is_string($ini)) {
            $this->_addressLists = explode(',', rtrim($ini, ','));
        }
    }

    /**
     * �g�у��[���A�h���X�����肷��
     *
     * @access public
     * @return bool true:Mobile, false:Not mobile
     */
    function mobile_decision()
    {
        if (!is_array($this->_args)) {
            return false;
        }
        if (!isset($this->_args[0])) {
            return false;
        }
        $domain = substr($this->_args[0], strrpos($this->_args[0], '@') + 1);
        $lists  = $this->_addressLists;
        foreach ($lists as $val) {
            if ($val === $domain) {
                return true;
            }
        }

        return false;
    }
}
