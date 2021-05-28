<?php
/**
 * Helper_Css_Tablecolor
 *
 * @category  Helper
 * @package   Helper_Option_Month
 * @version   $id$
 * @copyright 2008 Kobe Digitallabo .inc
 * @author    Shinya Ohyanagi <ohyanagi@kdl.co.jp>
 */

/**
 * @see Helper_Abstract
 */
require_once dirname(dirname(__FILE__)) . '/Abstract.php';

/**
 * Helper_Css_Tablecolor
 *
 * @category  Helper
 * @package   Helper_Css_Tablecolor
 * @version   $id$
 * @copyright 2008 Kobe Digitallabo .inc
 * @author    Shinya Ohyanagi <ohyanagi@kdl.co.jp>
 */
class Helper_Css_Tablecolor extends Helper_Abstract
{
    /**
     * Css class name
     *
     * @var    array
     * @access protected
     */
    var $_css = array(
        '1' => 'Valid',
        '2' => 'Valid2',
        '3' => 'Valid3',
        '4' => 'Valid4',
        '9' => 'Valid9',
        '10' => 'Valid10'
    );

    /**
     * Set css
     *
     * @param  array $css Css name
     * @access public
     * @return void
     */
    function setCss($css)
    {
        $this->_css = $css;
    }

    /**
     * ���X�g�̐F�Â����s���B
     *
     * @access public
     * @return void
     */
    function css_tablecolor()
    {
        if (!is_array($this->_args)) {
            return '';
        }

        // Arguments
        // ���݂̍s�ԍ�
        $rowNum  = isset($this->_args[0]) ? $this->_args[0] : null;
        // �T�C�g�敪
        $siteKbn = isset($this->_args[1]) ? $this->_args[1] : '1';
        // �\���E��\��
        $enabled = isset($this->_args[2]) ? $this->_args[2] : true;

        // ��\���̏ꍇ
        if ($enabled === false) {
            return 'NonValid';
        }

        if (is_numeric($rowNum)) {
            // �T�C�g�敪
            //  1:PC
            //  2:Mobile
            //  3:�A�v��
            if ($siteKbn === '1') {
                return (intval($rowNum) % 2 === 1) ? $this->_css['2'] : $this->_css['1'];
            } else if ($siteKbn === '2') {
                return (intval($rowNum) % 2 === 1) ? $this->_css['4'] : $this->_css['3'];
            } else if ($siteKbn === '3') {
                return (intval($rowNum) % 2 === 1) ? $this->_css['10'] : $this->_css['9'];
            } else {
                return 'NonValid';
            }
        }

        return 'Valid';
    }
}
