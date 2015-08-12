<?php
namespace Amoforms\Models\Fields;

use Amoforms\Traits\Singleton;
use Amoforms\Models\Fields\Types\Interfaces\Base_Field;
use Amoforms\Exceptions\Validate;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Manager
 * @since 1.0.0
 * @method static Manager instance
 * @package Amoforms\Models\Fields
 */
class Manager implements Interfaces\Manager
{
	use Singleton;

	/**
	 * Make field instance by type
	 * @since 1.0.0
	 * @param string $type
	 * @throws Validate
	 * @return Base_Field
	 */
	public function make_field($type)
	{
		$type = (string)$type;
		$class = __NAMESPACE__ . '\Types\\' . ucfirst($type);
		if (!class_exists($class)) {
			throw new Validate("Class for field type '{$type}' not exists");
		}
		return new $class();
	}
}
