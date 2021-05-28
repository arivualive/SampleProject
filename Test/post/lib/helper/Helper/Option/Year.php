<?php
/**
 * Option
 *
 * @category  Helper
 * @package   Helper_Option_Year
 * @version   $id$
 * @copyright 2008 Kobe Digitallabo .inc
 * @author    Shinya Ohyanagi <ohyanagi@kdl.co.jp>
 */

/**
 * @see Helper_Abstract
 */
require_once dirname(dirname(__FILE__)) . '/Abstract.php';

/**
 * Helper_Option
 *
 * @category  Helper
 * @package   Helper_Option_Year
 * @version   $id$
 * @copyright 2008 Kobe Digitallabo .inc
 * @author    Shinya Ohyanagi <ohyanagi@kdl.co.jp>
 */
class Helper_Option_Year extends Helper_Abstract
{
    /**
     * Option year
     *
     * @access public
     * @return string Option tag
     */
    function option_year()
    {
        if (!is_array($this->_args)) {
            return '';
        }
        list($f_year, $now_year) = $this->_args;
        $f_year = is_numeric($f_year) ? intval($f_year) : $f_year;

        $optionTag = '<option value=""></option>' . PHP_EOL;
        for ($i = $now_year['year']; $i >= 2003; $i--) {
            if ($i === $f_year) {
                $optionTag .= '<option value="' . $i . '" selected="selected">' . $i . '</option>' . PHP_EOL;
            } else {
                $optionTag .= '<option value="' . $i . '">' . $i . '</option>' . PHP_EOL;
            }
        }

        return $optionTag;
    }
}
