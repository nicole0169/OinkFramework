<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 13:49
 */

// Oink directory
define('OINK_DIR', __DIR__.DIRECTORY_SEPARATOR.'..');

// Data directory (must be writeable by the web server user)
define('DATA_DIR', OINK_DIR.DIRECTORY_SEPARATOR.'storage');

// Log filename if the log driver is "file"
define('LOG_DIR', DATA_DIR.DIRECTORY_SEPARATOR.'log');

// Cache directory to use if cache driver is "file" (must be writeable by the web server user)
define('CACHE_DIR', DATA_DIR.DIRECTORY_SEPARATOR.'cache');

// Folder for uploaded files (must be writeable by the web server user)
define('FILES_DIR', DATA_DIR.DIRECTORY_SEPARATOR.'files');