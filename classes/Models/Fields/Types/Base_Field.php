<?php
namespace Amoforms\Models\Fields\Types;

use Amoforms\Helpers;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Base_Field
 * @since 1.0.0
 * @package Amoforms\Models\Fields\Types
 */
abstract class Base_Field implements Interfaces\Base_Field
{
	const TYPE_HEADING = 'heading';
	const TYPE_NAME = 'name';
	const TYPE_PHONE = 'phone';
	const TYPE_EMAIL = 'email';
	const TYPE_COMPANY = 'company';
	const TYPE_TEXTAREA = 'textarea';
	const TYPE_TEXT = 'text';
	const TYPE_NUMBER = 'number';
	const TYPE_LIST = 'list';
	const TYPE_SELECT = 'select';
	const TYPE_DATE = 'date';
	const TYPE_URL = 'url';
	const TYPE_ADDRESS = 'address';
	const TYPE_FILE = 'file';
	const TYPE_INSTRUCTIONS = 'instructions';
	const TYPE_CAPTCHA = 'captcha';
	const TYPE_LINE = 'line';
	//const TYPE_SUBMIT = 'submit'; //TODO: delete

	const DESCRIPTION_POS_BEFORE = 'before';
	const DESCRIPTION_POS_AFTER = 'after';
	const DESCRIPTION_POS_DEFAULT = self::DESCRIPTION_POS_AFTER;

	protected $_type; // must set all child classes
	protected $_name = '';
	protected $_placeholder = '';
	protected $_default_value = '';
	protected $_description = '';
	protected $_description_position = self::DESCRIPTION_POS_DEFAULT;
	protected $_required = FALSE;
	protected $_read_only = FALSE;
	protected $_extra_options = []; //TODO: add 'layout' (vertical/horizontal) for 'radio' and 'checkbox'


	public function __construct() {
		$this->init();
	}

	/**
	 * Init field params
	 * @since 1.0.0
	 * @return void
	 */
	abstract protected function init();

	/**
	 * @since 1.0.0
	 * @return array
	 */
	protected function get_system_params()
	{
		return [
			'type'          => $this->_type,
			'read_only'     => $this->_read_only,
			'extra_options' => $this->_extra_options, //TODO: move to editable_params some time
		];
	}

	/**
	 * @since 1.0.0
	 * @return array
	 */
	protected function get_editable_params()
	{
		return [
			'name'                 => $this->_name,
			'description'          => $this->_description,
			'default_value'        => $this->_default_value,
			'placeholder'          => $this->_placeholder,
			'description_position' => $this->_description_position,
			'required'             => $this->_required,
		];
	}

	/**
	 * Get array representation of field
	 * @since 1.0.0
	 * @return array
	 */
	public function to_array()
	{
		return $this->get_system_params() + $this->get_editable_params();
	}

	/**
	 * @since 1.0.0
	 * @return array of strings
	 */
	public static function get_fields_types()
	{
		return [
			//self::TYPE_HEADING,
			self::TYPE_NAME,
			self::TYPE_PHONE,
			self::TYPE_EMAIL,
			self::TYPE_COMPANY,
			self::TYPE_TEXTAREA,
			self::TYPE_TEXT,
			self::TYPE_NUMBER,
			//self::TYPE_LIST,
			//self::TYPE_SELECT,
			self::TYPE_DATE,
			self::TYPE_URL,
			self::TYPE_ADDRESS,
			//self::TYPE_FILE,
			//self::TYPE_INSTRUCTIONS,
			//self::TYPE_CAPTCHA,
			//self::TYPE_LINE,
			//self::TYPE_SUBMIT,
		];
	}

	/**
	 * @since 1.0.0
	 * @return array
	 */
	protected function get_description_positions()
	{
		return [
			self::DESCRIPTION_POS_BEFORE,
			self::DESCRIPTION_POS_AFTER,
		];
	}

	/**
	 * Add extra option to field, like 'default_country' for Phone
	 * @since 1.0.0
	 * @param string $code
	 * @param string $name
	 * @param array  $values
	 * @param mixed  $value
	 * @return $this
	 */
	protected function add_extra_option($code, $name, $values, $value)
	{
		$this->_extra_options[$code] = [
			'name'   => $name,
			'values' => $values,
			'value'  => $value,
		];
		return $this;
	}

	/**
	 * Set field params
	 * @since 1.0.0
	 * @param array $params
	 */
	public function set_params(array $params)
	{
		foreach ($this->get_editable_params() as $key => $value) {
			$method = "set_$key";
			if (isset($params[$key]) && method_exists($this, $method)) {
				$this->$method($params[$key]);
			}
		}
	}

	/**
	 * @since 1.0.0
	 * @param string $name
	 * @return $this
	 */
	protected function set_name($name) {
		$this->_name = Helpers::escape($name);
		return $this;
	}

	/**
	 * @since 1.0.0
	 * @param string $description
	 * @return $this
	 */
	protected function set_description($description) {
		$this->_description = Helpers::escape($description);
		return $this;
	}

	/**
	 * @since 1.0.0
	 * @param string $default_value
	 * @return $this
	 */
	protected function set_default_value($default_value) {
		$this->_default_value = Helpers::escape($default_value);
		return $this;
	}

	/**
	 * @since 1.0.0
	 * @param string $placeholder
	 * @return $this
	 */
	protected function set_placeholder($placeholder) {
		$this->_placeholder = Helpers::escape($placeholder);
		return $this;
	}

	/**
	 * @since 1.0.0
	 * @param string $description_position
	 * @return $this
	 */
	protected function set_description_position($description_position) {
		if (in_array($description_position, $this->get_description_positions(), TRUE)) {
			$this->_description_position = $description_position;
		}
		return $this;
	}

	/**
	 * @since 1.0.0
	 * @param bool $value
	 * @return $this
	 */
	protected function set_required($value) {
		$this->_required = (bool)$value;
		return $this;
	}
}
