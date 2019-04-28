<?php

namespace AAM\Core;

class Manager implements Contract\ManagerInterface, Contract\JSInterface
{
    public function __construct()
    { 
        //manager Admin Menu
        if (is_multisite() && is_network_admin()) {
            //register AAM in the network admin panel
            add_action('_network_admin_menu', array($this, 'registerMenu'));
        } else {
            add_action('_user_admin_menu', array($this, 'registerMenu'));
            add_action('_admin_menu', array($this, 'registerMenu'));
        }
    }

    public function registerMenu() {
        add_menu_page(
            'AAM', 
            'AAM', 
            'administrator', 
            'aam', 
            function() {
                echo '<div class="aam" id="aam">Hello World!</div>';
            } 
        );
    }

    public function &getJS() {
        return file_get_contents(dirname(__DIR__) . '/media/dist/bundle.js');
    }
}
