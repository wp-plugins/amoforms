<?php
namespace Amoforms\Models\Forms;

use Amoforms\Traits\Singleton;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Manager
 * @since 1.0.0
 * @method static Manager instance
 * @package Amoforms\Models\Forms
 */
class Manager implements Interfaces\Manager
{
	use Singleton;

	/** @var \wpdb $_db */
	protected $_db;
	protected $_table = 'amoforms_forms';

	protected function __construct()
	{
		/** @var \wpdb $wpdb */
		global $wpdb;
		$this->_db = $wpdb;
		$this->_table = $this->_db->prefix . $this->_table;
	}

	/**
	 * Get forms database object
	 * @since 1.0.0
	 * @return \wpdb
	 */
	public function get_db() {
		return $this->_db;
	}

	/**
	 * Get forms table
	 * @since 1.0.0
	 * @return string
	 */
	public function get_table() {
		return $this->_table;
	}

	/**
	 * Creating table for storing forms
	 * @since 1.0.0
	 * @return $this
	 */
	public function create_table()
	{
		$this->_db->query("CREATE TABLE IF NOT EXISTS `{$this->_table}` (
		  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
		  `settings` TEXT COLLATE utf8_unicode_ci NOT NULL,
		  `fields` TEXT COLLATE utf8_unicode_ci NOT NULL,
		  `version` VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
		  PRIMARY KEY (`id`)
		) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");

		return $this;
	}

	/**
	 * Get form by id
	 * @since 1.0.0
	 * @param int $id
	 * @return Form|bool
	 */
	public function get_form_by_id($id)
	{
		$id = (int)$id;
		$db_params = $this->_db->get_row("SELECT id, settings, fields FROM {$this->_table} WHERE id = {$id}", ARRAY_A);
		if (!$db_params) {
			return FALSE;
		}
		$form = new Form();
		$form->set_db_params($this->prepare_form_db_params($db_params));

		return $form;
	}

	/**
	 * Get all forms params from db
	 * @since 1.0.0
	 * @return array
	 */
	protected function get_all_forms_params()
	{
		$result = [];
		$all_db_params = $this->_db->get_results("SELECT id, settings, fields FROM {$this->_table}", ARRAY_A) ?: [];
		foreach ($all_db_params as $db_params) {
			$result[$db_params['id']] = $this->prepare_form_db_params($db_params);
		}
		return $result;
	}

	/**
	 * Convert json encoded params to arrays
	 * @since 1.0.0
	 * @param array $form_params
	 * @return array
	 */
	protected function prepare_form_db_params(array $form_params)
	{
		$form_params['settings'] = json_decode($form_params['settings'], TRUE);
		$form_params['fields'] = json_decode($form_params['fields'], TRUE);
		return $form_params;
	}

	/**
	 * Get collection of all forms instances from db
	 * @since 1.0.0
	 * @return Collection
	 * @throws \Amoforms\Exceptions\Argument
	 */
	public function get_forms_collection()
	{
		$collection = new Collection();

		foreach ($this->get_all_forms_params() as $params) {
			$collection->add((new Form())->set_db_params($params));
		}

		return $collection;
	}
}
