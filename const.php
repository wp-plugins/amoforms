<?php
defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

define('AMOFORMS_VERSION', '1.0.0');
define('AMOFORMS_MINIMUM_WP_VERSION', '4.0'); //TODO: check it
define('AMOFORMS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('AMOFORMS_PLUGIN_DIR', plugin_dir_path(__FILE__));

define('AMOFORMS_ROOT', __DIR__);
define('AMOFORMS_NS', 'Amoforms');
define('AMOFORMS_CLASSES_DIR', AMOFORMS_ROOT . '/classes');
define('AMOFORMS_VIEWS_DIR', AMOFORMS_ROOT . '/views');
define('AMOFORMS_CSS_DIR', AMOFORMS_ROOT . '/css');
define('AMOFORMS_CSS_URL', AMOFORMS_PLUGIN_URL . 'css');
define('AMOFORMS_JS_URL', AMOFORMS_PLUGIN_URL . 'js');
define('AMOFORMS_PLUGIN_CODE', basename(AMOFORMS_ROOT));
define('AMOFORMS_USE_MIN_JS', FALSE);
