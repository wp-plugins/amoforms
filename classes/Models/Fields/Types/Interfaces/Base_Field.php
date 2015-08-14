<?php
namespace Amoforms\Models\Fields\Types\Interfaces;

use Amoforms\Interfaces\Array_Converting;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Interface Base_Field
 * @since   1.0.0
 * @package Amoforms\Models\Fields\Types\Interfaces
 */
interface Base_Field extends Array_Converting
{
	/**
	 * Set field params
	 * @since 1.0.0
	 * @param array $params
	 */
	public function set_params(array $params);

	/**
	 * @since 1.0.0
	 * @return array of strings
	 */
	public static function get_fields_types();
}
