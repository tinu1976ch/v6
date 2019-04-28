<?php

use AAM\Core\Loader;

if (defined('AAM_KEY')) {
    add_action('aam-loaded', function () {
        Loader::register(new AAM\Core\Manager());
    }, 0);

    add_action('init', function() {
        Loader::init();
    });
}
