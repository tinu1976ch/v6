<?php

use AAM\Core\Loader;

if (defined('AAM_KEY')) {
    add_action('aam-loaded', function () {
        Loader::register(new AAM\AdminMenu\Manager());
    });
}
