<?php
namespace Amoforms;

use Amoforms\Exceptions\Validate;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Helpers
 * @since 1.0.0
 * @package Amoforms
 */
class Helpers
{
	/**
	 * Add or remove ".min" to path based on AMOFORMS_USE_MIN_JS
	 * @since 1.0.0
	 * @param string $path
	 * @return string
	 */
	public static function get_js_path($path)
	{
		$is_min = (strpos($path, '.min.js') !== FALSE);
		if (AMOFORMS_USE_MIN_JS) {
			if (!$is_min) {
				$path = str_replace('.js', '.min.js', $path);
			}
		} else {
			if ($is_min) {
				$path = str_replace('.min.js', '.js', $path);
			}
		}
		return $path;
	}

	/**
	 * Escape HTML-entities in string
	 * @since 1.0.0
	 * @param string $text
	 * @return string
	 */
	public static function escape($text)
	{
		return htmlspecialchars(htmlspecialchars_decode(trim($text), ENT_QUOTES | ENT_HTML401), ENT_QUOTES | ENT_HTML401);
	}

	/**
	 * Array validator for empty values
	 * @since 1.0.0
	 * @param array  $array - array for checking
	 * @param array  $keys  - array of keys that should be checked: [id, settings => [email => [name, subject, to]]]
	 * @param string $prefix - internal parameter for building path of array keys
	 * @throws Validate
	 */
	public static function validate_for_empty(array $array, array $keys, $prefix = '')
	{
		foreach ($keys as $key => $value) {
			if (is_array($value)) {
				$path = $prefix . "[$key]";
				if (empty($array[$key])) {
					throw new Validate("Empty $path");
				}
				self::validate_for_empty($array[$key], $value, $path);
			} else {
				if (is_string($key) && is_string($value)) {
					$path = $prefix . "[$key][$value]";
					if (empty($array[$key][$value])) {
						throw new Validate("Empty $path");
					}
				} else {
					$key = (string)$value;
					$path = $prefix . "[$key]";
					if (empty($array[$key])) {
						throw new Validate("Empty $path");
					}
				}
			}
		}
	}

	/**
	 * Show exceptions only in debug mode
	 * @since 1.0.0
	 * @param \Exception $e
	 */
	public static function handle_exception(\Exception $e) {
		if (defined('WP_DEBUG') && WP_DEBUG) {
			var_dump($e);
		}
	}
}
