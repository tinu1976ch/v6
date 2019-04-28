<?php

namespace AAM\Core;

final class Loader
{
    protected static $scripts = array();

    public static function register(Contract\ManagerInterface $manager)
    {
        if (is_subclass_of($manager, 'AAM\Core\Contract\JSInterface')) {
            self::$scripts[] = $manager;
        }

    }

    public static function init() {
        // Render JavaScript library
        add_action('admin_print_footer_scripts', function () {
            echo '<script type="text/javascript">';
            foreach(self::$scripts as $manager) {
                echo $manager->getJS();
            }
            echo '</script>';
        });
    }
}
