<?php

/**
 * Plugin Name: Advanced Access Manager
 * Description: Collection of features to manage your WordPress website authentication, authorization and monitoring.
 * Version: 6.0
 * Author: Vasyl Martyniuk <vasyl@vasyltech.com>
 * Author URI: https://vasyltech.com
 *
 * -------
 * LICENSE: This file is subject to the terms and conditions defined in
 * file 'license.txt', which is part of Advanced Access Manager source package.
 *
 **/

require __DIR__ . '/vendor/autoload.php';

/**
 * Main plugin's class
 * 
 * @package AAM
 * @author Vasyl Martyniuk <vasyl@vasyltech.com>
 */
class AAM
{

    /**
     * Single instance of itself
     *
     * @var AAM
     *
     * @access private
     */
    private static $_instance = null;

    /**
     *
     * @return void
     *
     * @access protected
     */
    protected function __construct()
    { }

    /**
     * 
     * @access public
     * @static
     */
    public static function api()
    { }

    /**
     * 
     * @access public
     * @static
     */
    public static function getUser()
    { }

    /**
     * 
     * @return void
     * 
     * @access public
     * @static
     */
    public static function onPluginsLoaded()
    { 
        foreach(new DirectoryIterator(__DIR__ . '/vendor/aamplugin') as $directory) {
            if ($directory->isDir() && !$directory->isDot()) {
                $filename = $directory->getPathname() . '/bootstrap.php';
                if (file_exists($filename)) {
                    require $filename;
                }
            }
        }

        do_action('aam-loaded');
    }

    /**
     * Hook on WP core init
     * 
     * @return void
     * 
     * @access public
     * @static
     */
    public static function onInit()
    { }

    /**
     *
     * @return AAM
     *
     * @access public
     * @static
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    /**
     * 
     * @return void
     * 
     * @access public
     */
    public static function cron()
    { }

    /**
     * Plugin activation hook
     * 
     * @return void
     * 
     * @access public
     */
    public static function onActivate()
    {
        global $wp_version;

        //check PHP Version
        if (version_compare(PHP_VERSION, '5.4.0') === -1) {
            exit(__('PHP 5.4.0 or greater is required.', AAM_KEY));
        } elseif (version_compare($wp_version, '4.6') === -1) {
            exit(__('WordPress 4.6 or greater is required.', AAM_KEY));
        }
    }

    /**
     * Plugin uninstall hook
     *
     * @return void
     *
     * @access public
     */
    public static function onUninstall()
    { }
    
}
if (defined('ABSPATH')) {
    // AAM base key
    define('AAM_KEY', 'advanced-access-manager');

    // Keep this as the lowest priority
    add_action('plugins_loaded', 'AAM::onPluginsLoaded', -1);

    //the highest priority (higher the core)
    //this is important to have to catch events like register core post types
    add_action('init', 'AAM::onInit', -1);

    //activation & deactivation hooks
    register_activation_hook(__FILE__, 'AAM::onActivate');
    register_uninstall_hook(__FILE__, 'AAM::onUninstall');
}
