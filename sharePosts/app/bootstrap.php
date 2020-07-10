<?php

// Load Config
require_once 'config/config.php';
// Load Helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

// Load Libraries
// Autoload Libraries

spl_autoload_register(function ($className) {
    require_once 'libraries/'. $className .'.php';
});
