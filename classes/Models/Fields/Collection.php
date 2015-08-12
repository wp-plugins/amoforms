<?php
namespace Amoforms\Models\Fields;

use Amoforms\Exceptions\Argument;
use Amoforms\Exceptions\Validate;
use Amoforms\Interfaces\Array_Converting;
use Amoforms\Models\Collection\Base_Collection;
use Amoforms\Models\Fields;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Collection of Fields
 * @since 1.0.0
 * @package Amoforms\Models\Forms
 */
class Collection extends Base_Collection implements Interfaces\Collection, Array_Converting
{
	/**
	 * Add field to collection
	 * @since 1.0.0
	 * @param Fields\Types\Interfaces\Base_Field $field
	 * @return $this
	 * @throws Argument
	 */
	public function add($field)
	{
		if (!($field instanceof Fields\Types\Interfaces\Base_Field)) {
			throw new Argument('$field is not instance of Field');
		}
		return parent::add($field);
	}

	/**
	 * Fill collection by array of fields params
	 * @since 1.0.0
	 * @param array $fields_params
	 * @return $this
	 * @throws Argument
	 * @throws Validate
	 */
	public function fill_by_params(array $fields_params)
	{
		$this->delete_all();
		$types = Fields\Types\Base_Field::get_fields_types();

		foreach ($fields_params as $field_params) {
			if (empty($field_params['type']) || !in_array($field_params['type'], $types, TRUE)) {
				throw new Validate('Undefined field type');
			}
			$field = Manager::instance()->make_field($field_params['type']);
			$field->set_params($field_params);
			$this->add($field);
		}

		return $this;
	}

	/**
	 * @since 1.0.0
	 * @return array
	 */
	public function to_array()
	{
		$array = [];
		/** @var Fields\Types\Interfaces\Base_Field $field */
		foreach ($this->_data as $field) {
			$array[] = $field->to_array();
		}
		return $array;
	}
}
