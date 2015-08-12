<?php
namespace Amoforms\Models\Forms;

use Amoforms\Exceptions\Argument;
use Amoforms\Exceptions\Runtime;
use Amoforms\Models\Fields;
use Amoforms\Models\Fields\Types\Interfaces\Base_Field;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Form
 * @since 1.0.0
 * @package Amoforms\Models\Forms
 */
class Form implements Interfaces\Form
{
	const FORM_NAME_DEFAULT = 'Form';

	const FORM_TITLE_TYPE_TEXT  = 'text';
	const FORM_TITLE_TYPE_IMAGE = 'image';

	const FORM_TITLE_DEFAULT_TEXT_VALUE = 'Form title text';
	const FORM_TITLE_DEFAULT_IMAGE_VALUE = 'https://www.amocrm.com/design/promo_summer14/images/logo_main.png'; //TODO: save image with widget

	const FORM_TITLE_DEFAULT_TYPE = self::FORM_TITLE_TYPE_TEXT;
	const FORM_TITLE_DEFAULT_VALUE = self::FORM_TITLE_DEFAULT_TEXT_VALUE;

	const FORM_STATUS_PUBLIC = 'public';
	const FORM_STATUS_DRAFT = 'draft';
	const FORM_STATUS_DEFAULT = self::FORM_STATUS_DRAFT;

	const FORM_THEME_DEFAULT = 1; //TODO: check this after creating themes

	const FIELD_NAME_POS_BEFORE = 'before';
	const FIELD_NAME_POS_ABOVE  = 'above';
	const FIELD_NAME_POS_INSIDE = 'inside';
	const FIELD_NAME_POS_DEFAULT = self::FIELD_NAME_POS_ABOVE;

	const CONFIRMATION_TYPE_TEXT = 'text';
	const CONFIRMATION_TYPE_WP_PAGE = 'wp_page';
	const CONFIRMATION_TYPE_REDIRECT = 'redirect';
	const CONFIRMATION_TYPE_DEFAULT = self::CONFIRMATION_TYPE_TEXT;

	const FIELD_SIZE_MIN = 10;
	const FIELD_SIZE_MAX = 100;
	const FIELD_SIZE_DEFAULT = self::FIELD_SIZE_MAX;

	const FORM_FONT_DEFAULT = "'Open Sans', sans-serif"; //TODO: change it

	const FIELD_BORDER_RECTANGULAR = 'rectangular';
	const FIELD_BORDER_ROUNDED = 'rounded';
	const FIELD_BORDER_DEFAULT = self::FIELD_BORDER_RECTANGULAR;

	const FORM_BACKGROUND_TYPE_COLOR = 'color';
	const FORM_BACKGROUND_TYPE_IMAGE = 'image';

	const FORM_BACKGROUND_DEFAULT_COLOR = '#fff';

	const FORM_BACKGROUND_TYPE_DEFAULT = self::FORM_BACKGROUND_TYPE_COLOR;
	const FORM_BACKGROUND_VALUE_DEFAULT = self::FORM_BACKGROUND_DEFAULT_COLOR;

	protected $_title_types = [
		self::FORM_TITLE_TYPE_TEXT,
		self::FORM_TITLE_TYPE_IMAGE,
	];

	protected $_statuses_types = [
		self::FORM_STATUS_PUBLIC,
		self::FORM_STATUS_DRAFT,
	];

	protected $_names_positions = [
		self::FIELD_NAME_POS_BEFORE,
		self::FIELD_NAME_POS_ABOVE,
		self::FIELD_NAME_POS_INSIDE,
	];

	protected $_confirmation_types = [
    	self::CONFIRMATION_TYPE_TEXT,
		self::CONFIRMATION_TYPE_WP_PAGE,
		self::CONFIRMATION_TYPE_REDIRECT,
	];

	protected $_fields_borders_types = [
		self::FIELD_BORDER_RECTANGULAR,
		self::FIELD_BORDER_ROUNDED,
	];

	protected $_background_types = [
		self::FORM_BACKGROUND_TYPE_COLOR,
		self::FORM_BACKGROUND_TYPE_IMAGE,
	];

	/** @var \wpdb $_db */
	protected $_db;

	/** @var string */
	protected $_table;

	/** @var int|null $_id */
	protected $_id;

	/** @var Fields\Collection */
	protected $_fields;

	protected $_settings = [
		'name'           => self::FORM_NAME_DEFAULT,
		'title'          => [
			'type'  => self::FORM_TITLE_DEFAULT_TYPE,
			'value' => self::FORM_TITLE_DEFAULT_VALUE,
		],
		'status'         => self::FORM_STATUS_DEFAULT,
		'theme'          => self::FORM_THEME_DEFAULT,
		'names_position' => self::FIELD_NAME_POS_DEFAULT,
		'borders_type'   => self::FIELD_BORDER_DEFAULT,
		'fields_size'    => self::FIELD_SIZE_DEFAULT,
		'font'           => self::FORM_FONT_DEFAULT,
		'background'     => [
			'type'  => self::FORM_BACKGROUND_TYPE_DEFAULT,
			'value' => self::FORM_BACKGROUND_VALUE_DEFAULT,
		],
		'email'          => [
			'name'    => '',
			'subject' => 'Call Back Request',
			'to'      => '',
		],
		'page'           => [
			'hide_titles'  => FALSE,
			'hide_numbers' => FALSE,
		],
		'confirmation'   => [
			'type'  => self::CONFIRMATION_TYPE_DEFAULT,
			'value' => '',
		],
	];

	public function __construct()
	{
		$forms_manager = Manager::instance();

		$this->_db = $forms_manager->get_db();
		$this->_table = $forms_manager->get_table();

		$this->_fields = new Fields\Collection();
	}

	/**
	 * Set default fields
	 * @since 1.0.0
	 *
	 * @return $this
	 * @throws Argument
	 */
	public function set_default_fields()
	{
		$this->_fields
			->delete_all()
			->add(new Fields\Types\Name())
			->add(new Fields\Types\Email())
			->add(new Fields\Types\Textarea())
		;

		return $this;
	}

	/**
	 * Set form params form db params
	 * @since 1.0.0
	 *
	 * @param array $db_params - row of params from DB
	 * @return $this
	 * @throws Argument
	 */
	public function set_db_params(array $db_params)
	{
		if (empty($db_params['id'])) {
			throw new Argument('Invalid form id');
		}
		if (empty($db_params['settings']) || !is_array($db_params['settings'])) {
			throw new Argument('Invalid form settings');
		}

		$this
			->set_id($db_params['id'])
			->set_settings($db_params['settings'])
			->set_fields($db_params['fields']);

		return $this;
	}

	/**
	 * Set form settings
	 * @since 1.0.0
	 *
	 * @param array $settings
	 * @return $this
	 * @throws Runtime
	 */
	public function set_settings(array $settings)
	{
		foreach ($this->_settings as $key => $value) {
			if (isset($settings[$key])) {
				$method = "set_$key";
				if (!method_exists($this, $method)) {
					throw new Runtime("Method '{$method}' not exists in " . __CLASS__);
				}
				$this->$method($settings[$key]);
			}
		}
		return $this;
	}

	/**
	 * Set fields by their params form db/request
	 * @since 1.0.0
	 *
	 * @param array $fields_params
	 * @return $this
	 * @throws \Amoforms\Exceptions\Validate
	 */
	public function set_fields(array $fields_params)
	{
		$this->_fields->fill_by_params($fields_params);
		return $this;
	}

	/**
	 * Save form to database
	 * @since 1.0.0
	 *
	 * @return $this
	 * @throws Runtime
	 */
	public function save()
	{
		$data = [
			'settings' => json_encode($this->get_settings(), JSON_UNESCAPED_UNICODE),
			'fields'   => json_encode($this->get_fields(), JSON_UNESCAPED_UNICODE),
			'version'  => AMOFORMS_VERSION,
		];
		$format = ['%s', '%s', '%s'];

		if ($this->id()) {
			if ($this->_db->update($this->_table, $data, ['id' => $this->id()], $format) === FALSE) {
				throw new Runtime('Error saving form to db');
			}
		} else {
			$this->_db->insert($this->_table, $data, $format);
			$form_id = $this->_db->insert_id;
			if (!$form_id) {
				throw new Runtime("Can't get id of inserted form");
			}
			$this->set_id($form_id);
		}

		return $this;
	}

	/**
	 * Add field to form
	 * @param Base_Field $field
	 * @throws Argument
	 * @return $this
	 */
	public function add_field(Base_Field $field)
	{
		$this->_fields->add($field);
		return $this;
	}

	/**
	 * Delete field form form
	 * @param int $id
	 * @throws Argument
	 * @return $this
	 */
	public function delete_field($id)
	{
		$this->_fields->delete((int)$id);
		return $this;
	}

	/**
	 * Get param from settings by key
	 * @param string $key
	 * @return mixed
	 */
	public function get($key) {
		return isset($this->_settings[$key]) ? $this->_settings[$key] : FALSE;
	}

	/**
	 * Get all settings
	 * @return array
	 */
	public function get_settings() {
		return $this->_settings;
	}

	/**
	 * Get fields as array
	 * @return array
	 */
	public function get_fields() {
		return $this->_fields->to_array();
	}

	/**
	 * @return array
	 */
	public function get_title_types() {
		return $this->_title_types;
	}

	/**
	 * @return array
	 */
	public function get_confirmation_types() {
		return $this->_confirmation_types;
	}

	/**
	 * @return array
	 */
	public function get_statuses_types() {
		return $this->_statuses_types;
	}

	/**
	 * Get id
	 * @since 1.0.0
	 * @return int|null
	 */
	public function id() {
		return $this->_id;
	}

	/**
	 * @param int $id
	 * @return $this
	 */
	protected function set_id($id) {
		$this->_id = abs((int)$id);
		return $this;
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	protected function set_name($name) {
		$this->_settings['name'] = trim($name);
		return $this;
	}

	/**
	 * @param array $title
	 * @return $this
	 */
	protected function set_title(array $title) {
		if (!empty($title['type']) && in_array($title['type'], $this->_title_types, TRUE)) {
			$this->_settings['title']['type'] = $title['type'];
		}
		if (!empty($title['value'])) {
			$this->_settings['title']['value'] = trim($title['value']);
		}
		return $this;
	}

	/**
	 * @param string $status
	 * @return $this
	 */
	protected function set_status($status) {
		if (in_array($status, $this->_statuses_types, TRUE)) {
			$this->_settings['status'] = $status;
		}
		return $this;
	}

	/**
	 * @param int $theme - theme id
	 * @return $this
	 */
	protected function set_theme($theme) {
		$this->_settings['theme'] = abs((int)$theme); //TODO: check for valid value
		return $this;
	}

	/**
	 * @param string $position
	 * @return $this
	 */
	protected function set_names_position($position) {
		if (in_array($position, $this->_names_positions, TRUE)) {
			$this->_settings['names_position'] = $position;
		}
		return $this;
	}

	/**
	 * @param string $type
	 * @return $this
	 */
	protected function set_borders_type($type) {
		if (in_array($type, $this->_fields_borders_types, TRUE)) {
			$this->_settings['borders_type'] = $type;
		}
		return $this;
	}

	/**
	 * @param int $size
	 * @return $this
	 */
	protected function set_fields_size($size) {
		$size = abs((int)$size);
		if ($size >= self::FIELD_SIZE_MIN && $size <= self::FIELD_SIZE_MAX) {
			$this->_settings['fields_size'] = $size;
		}
		return $this;
	}

	/**
	 * @param string $font
	 * @return $this
	 */
	protected function set_font($font) {
		$this->_settings['font'] = trim($font);
		return $this;
	}

	/**
	 * @param array $background
	 * @return $this
	 */
	protected function set_background(array $background) {
		if (!empty($background['type']) && in_array($background['type'], $this->_background_types, TRUE)) {
			$this->_settings['background']['type'] = $background['type'];
		}
		if (!empty($background['value'])) {
			$this->_settings['background']['value'] = trim($background['value']);
		}
		return $this;
	}

	/**
	 * Set email settings
	 * @since 1.0.0
	 * @param array $email_settings
	 * @return $this
	 */
	protected function set_email(array $email_settings) {
		foreach (array_keys($this->_settings['email']) as $key) {
			if (!empty($email_settings[$key])) {
				$this->_settings['email'][$key] = trim($email_settings[$key]);
			}
		}
		return $this;
	}

	/**
	 * @since 1.0.0
	 * @param array $page_settings
	 * @return $this
	 */
	protected function set_page(array $page_settings) {
		foreach ($this->_settings['page'] as $key => $value) {
			if (isset($page_settings[$key])) {
				$this->_settings['page'][$key] = (bool)$page_settings[$key];
			}
		}
		return $this;
	}

	/**
	 * @since 1.0.0
	 * @param array $confirmation
	 * @return $this
	 */
	protected function set_confirmation(array $confirmation) {
		if (!empty($confirmation['type']) && in_array($confirmation['type'], $this->_confirmation_types, TRUE)) {
			$this->_settings['confirmation']['type'] = $confirmation['type'];
		}
		if (!empty($confirmation['value'])) {
			$this->_settings['confirmation']['value'] = trim($confirmation['value']);
		}
		return $this;
	}
}
