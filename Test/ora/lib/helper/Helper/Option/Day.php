<?php
/**
 * Option
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
 * Helper_Option_Day
 *
 * @category  Helper
 * @package   Helper_Option_Day
 * @version   $id$
 * @copyright 2008 Kobe Digitallabo .inc
 * @author    Shinya Ohyanagi <ohyanagi@kdl.co.jp>
 */
class Helper_Option_Day extends Helper_Abstract
{
    /**
     * Option year
     *
     * @access public
     * @return void
     */
    function option_day()
    {
        if (!is_array($this->_args)) {
            return '';
        }
        list($now_day) = $this->_args;
        $optionTag = '<option value=""></option>' . PHP_EOL;
        for ($i = 1; $i <= 31; $i ++) {
            $val = sprintf('%02s', $i);
            if ($val === $now_day) {
                $optionTag .= '<option value="' . $val . '" selected="selected">' . $val . '</option>' . PHP_EOL;
            } else {
                $optionTag .= '<option value="' . $val . '">' . $val . '</option>' . PHP_EOL;
            }
        }

        return $optionTag;
    }
}
