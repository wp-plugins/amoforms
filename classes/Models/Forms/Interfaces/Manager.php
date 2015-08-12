<?php
namespace Amoforms\Models\Forms\Interfaces;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

interface Manager
{
	/**
	 * Get forms database object
	 * @since 1.0.0
	 * @return \wpdb
	 */
	public function get_db();

	/**
	 * Get forms table
	 * @since 1.0.0
	 * @return string
	 */
	public function get_table();

	/**
	 * Creating table for storing forms
	 * @since 1.0.0
	 * @return $this
	 */
	public function create_table();

	/**
	 * Get form by id
	 * @since 1.0.0
	 * @param int $id
	 * @return Form|bool
	 */
	public function get_form_by_id($id);

	/**
	 * Get collection of all forms instances from db
	 * @since 1.0.0
	 * @return Collection
	 * @throws \Amoforms\Exceptions\Argument
	 */
	public function get_forms_collection();
}
