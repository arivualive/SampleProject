<?php
/**
 * Helper
 *
 * @category  Helper
 * @package   Helper
 * @version   $id$
 * @copyright 2009 Kobe Digitallabo .inc
 * @author    Shinya Ohyanagi <ohyanagi@kdl.co.jp>
 */

/**
 * Helper
 *
 * @category  Helper
 * @package   Helper
 * @version   $id$
 * @copyright 2009 Kobe Digitallabo .inc
 * @author    Shinya Ohyanagi <ohyanagi@kdl.co.jp>
 */
class Helper
{
    /**
     * Helper instance
     *
     * @var    mixed
     * @access protected
     */
    var $_instance = null;

    /**
     * Base path of Helper
     *
     * @var mixed
     * @access protected
     */
    var $_basePath = 'Helper';

    /**
     * Set base path
     *
     * @param  mixed $value Path to helper path
     * @access public
     * @return void
     */
    function setBasePath($value)
    {
        $this->_basePath = $value;
    }

    /**
     * Get base path of helper
     *
     * @access public
     * @return string Path to helper
     */
    function getBasePath()
    {
        return $this->_basePath;
    }

    /**
     * Get instance which create dynamically
     *
     * @param  mixed $value Class name
     * @access public
     * @return mixed Instance of class
     */
    function getInstance($value = null)
    {
        if (is_null($value)) {
            return $this->_instance;
        }

        return isset($this->_instance[$value]) ? $this->_instance[$value] : null;
    }

    /**
     * CreateInstance
     *
     * @param  mixed $name Helper name
     * @access public
     * @return void
     */
    function createInstance($name)
    {
        if (isset($this->_instance[$name])) {
            return $this->_instance[$name];
        }

        $path       = $this->_buildPath($name);
        $helperPath = $this->getBasePath();
        require_once $helperPath .  DIRECTORY_SEPARATOR . $path . '.php';

        $className = 'Helper_' . ucfirst($name);

        // Cache instance
        $this->_instance[$name] = new $className();

        return $this->_instance[$name];
    }

    /**
     * Constructor
     *
     * @access public
     * @return void
     */
    function Helper()
    {
    }

    /**
     * Escape
     *
     * @param  mixed $value
     * @access public
     * @return string
     */
    function h($value)
    {
        if (is_string($value)) {
            return htmlspecialchars($value, ENT_QUOTES, 'Shift_JIS');
        }
        return $value;
    }

    /**
     * __call
     *
     * @param  mixed $name   Class name
     * @param  mixed $args   Arguments
     * @param  mixed $return Return value of exec class method
     * @access public
     * @return bool true:Method exists, false:Method not exists
     */
    function __call($name, $args)
    {
        $this->createInstance($name);
        if (!isset($this->_instance[$name])) {
            return false;
        }

        $this->_instance[$name]->setArgs($args);
        if (method_exists($this->_instance[$name], $name)) {
            $this->_instance[$name]->init();
            $return = $this->_instance[$name]->$name();

            return $return;
        }

        return false;
    }

    /**
     * Build path
     *
     * @param  mixed $name Helper class name
     * @access private
     * @return string Path to helper class
     */
    function _buildPath($name)
    {
        if (strstr($name, '_')) {
            $names = explode('_', $name);
            $buff  = array();
            foreach ($names as $key => $val) {
                $buff[$key] = ucfirst($val);
            }

            $name = implode('_', $buff);
            $path = str_replace('_', '/', $name);
        } else {
            $path = ucfirst($name);
        }

        return $path;
    }
}
