<?php
/**
 * Abstract class of Helper
 *
 * @category  Helper
 * @package   Helper_Abstract
 * @version   $id$
 * @copyright 2008 Kobe Digitallabo .inc
 * @author    Shinya Ohyanagi <ohyanagi@kdl.co.jp>
 */

/**
 * Abstract class of Helper
 *
 * @category  Helper
 * @package   Helper_Abstract
 * @version   $id$
 * @copyright 2008 Kobe Digitallabo .inc
 * @author    Shinya Ohyanagi <ohyanagi@kdl.co.jp>
 */
class Helper_Abstract
{
    /**
     * Arguments of method
     *
     * @var    mixed
     * @access protected
     */
    var $_args = null;

    /**
     * Set args
     *
     * @param  mixed $args
     * @access public
     * @return void
     */
    function setArgs($args)
    {
        $this->_args = $args;
    }

    /**
     * Get args
     *
     * @access public
     * @return void
     */
    function getArgs()
    {
        return $this->_args;
    }

    /**
     * Init
     *
     * @param  mixed $args
     * @access public
     * @return void
     */
    function init($args = null)
    {
    }
}
