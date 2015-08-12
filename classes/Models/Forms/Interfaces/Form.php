<?php
namespace Amoforms\Models\Forms\Interfaces;

use Amoforms\Models\Fields\Types\Interfaces\Base_Field;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

interface Form
{
	public function set_default_fields();

	public function set_db_params(array $db_params);

	public function set_settings(array $settings);

	public function set_fields(array $fields_params);

	public function save();

	public function add_field(Base_Field $field);

	public function delete_field($id);

	public function get($key);

	public function get_settings();

	public function get_fields();

	public function get_title_types();

	public function get_confirmation_types();

	public function get_statuses_types();

	public function id();
}
