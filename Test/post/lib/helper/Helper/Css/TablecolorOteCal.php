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
class Helper_Css_TablecolorOteCal extends Helper_Abstract
{
    /**
     * Css class name
     *
     * @var    array
     * @access protected
     */
    var $_css = array(
        '5' => 'Valid5',
        '6' => 'Valid6',
        '7' => 'Valid7',
        '8' => 'Valid8'
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
     * リストの色づけを行う。
     *
     * @access public
     * @return void
     */
    function css_tablecolorOteCal()
    {
        if (!is_array($this->_args)) {
            return '';
        }

        // Arguments
        // 現在の行番号
        $rowNum  = isset($this->_args[0]) ? $this->_args[0] : null;
        // データ区分
        $dataKbn = isset($this->_args[1]) ? $this->_args[1] : '1';
        // 表示・非表示
        $enabled = isset($this->_args[2]) ? $this->_args[2] : true;

        // 非表示の場合
        if ($enabled === false) {
            return 'NonValid';
        }

        if (is_numeric($rowNum)) {
            // データ区分
            //  1:コメント
            //  2:コメント(プリーザー)
            if ($dataKbn === '1') {
                return (intval($rowNum) % 2 === 1) ? $this->_css['6'] : $this->_css['5'];
            } else if ($dataKbn === '2') {
                return (intval($rowNum) % 2 === 1) ? $this->_css['8'] : $this->_css['7'];
            } else {
                return 'NonValid';
            }
        }

        return 'Valid';
    }

}
