<?php
/**
 * @package amoForms
 */

/*
Plugin Name: amoForms
Plugin URI:  http://www.amocrm.com
Description: Plugin for embedding forms to your site and integrate them with amoCRM
Version:     1.0.0
Author:      amoCRM
Author URI:  http://www.amocrm.com
License:     GPLv2 or later
Text Domain: amoforms

amoForms is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

amoForms is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with amoForms. If not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

try {
	if (!function_exists('add_action')) {
		die("Hi there! I'm just a plugin, not much I can do when called directly.");
	}

	define('AMOFORMS_BOOTSTRAP', TRUE);
	require_once __DIR__ . '/const.php';

	spl_autoload_register(function ($class) {
		if (strpos($class, AMOFORMS_NS . '\\') === 0) {
			$path = str_replace(AMOFORMS_NS, AMOFORMS_CLASSES_DIR, $class);
			$path = str_replace('\\', '/', $path) . '.php';
			if (file_exists($path)) {
				/** @noinspection PhpIncludeInspection */
				require_once $path;
			}
		}
	});

	new Amoforms\Plugin(
		Amoforms\Router::instance(),
		Amoforms\Libs\Shortcodes\Manager::instance(),
		Amoforms\Libs\Filters\Manager::instance()
	);

} catch (\Exception $e) {
	\Amoforms\Helpers::handle_exception($e);
}
