<?php
namespace Amoforms\Controllers;

use Amoforms\Access;
use Amoforms\Libs\Locale\I18n;
use Amoforms\Models\Fields;
use Amoforms\Models\Fields\Types\Base_Field;
use Amoforms\Models\Forms;
use Amoforms\Models\Forms\Form;
use Amoforms\Exceptions\Validate;
use Amoforms\Exceptions\Runtime;
use Amoforms\Helpers;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Settings
 * @since 1.0.0
 * @package Amoforms\Controllers
 */
class Settings extends Base
{
	/**
	 * Key for validate "nonce" field
	 * @since 1.0.0
	 * @var string
	 */
	protected $_nonce_field = 'amoforms_settings';

	/**
	 * @since 1.0.0
	 * @throws Exceptions\Controller
	 * @throws \Amoforms\Exceptions\Access
	 */
	public function __construct()
	{
		parent::__construct();
		$this->check_access();
	}

	/**
	 * Show fields settings page
	 * @since 1.0.0
	 * @param string $page //FIXME: temporary argument
	 * @throws \Amoforms\Views\Exceptions\Runtime
	 */
	public function edit_fields_action($page = 'fields')
	{
		$form = $this->get_first_form();
		$title_types = $this->_view->make_options_for_select($form->get_title_types(), $form->get('title')['type']);
		$statuses_types = $this->_view->make_options_for_select($form->get_statuses_types(), $form->get('status'));
		$fields_types = $this->_view->make_options_for_select(Base_Field::get_fields_types(), NULL);
		$this->_view
			->set('form', $form)
			->set('nonce_field', $this->_nonce_field)
			->set('title_types', $title_types)
			->set('statuses_types', $statuses_types)
			->set('fields_types', $fields_types)
			->set('path', "settings/pages/$page")
			->render(!empty($_GET['view']) ? 'settings/' . $_GET['view'] : 'settings/layout');
	}

	/**
	 * Updating form fields
	 * @since 1.0.0
	 * @throws Runtime
	 * @throws Validate
	 */
	public function update_fields_action()
	{
		if (empty($_POST['form']['fields']) || !is_array($_POST['form']['fields'])) {
			throw new Validate('Empty fields');
		}
		if (!$form = $this->get_form_by_request()) {
			$form = new Form();
		}
		$form
			->set_fields($_POST['form']['fields'])
			->save();

		$this->edit_fields_action();
	}

	/**
	 * Edit for settings
	 * @since 1.0.0
	 */
	public function edit_form_action()
	{
		$this->edit_fields_action('form'); //TODO: change it
	}

	/**
	 * Updating form settings
	 * @since 1.0.0
	 * @throws Validate
	 */
	public function update_form_action()
	{
		try {
			Helpers::validate_for_empty($_POST, ['form' => [
				'id',
				'settings' => [
					'name',
					//'confirmation' => ['type'], //temporary disabled
				],
			]]);
			/* temporary disabled
			if (!isset($_POST['form']['settings']['confirmation']['value'])) {
				$_POST['form']['settings']['confirmation']['value'] = '';
			}*/
			if (!$form = $this->get_form_by_request()) {
				$form = new Form();
			}
			$form->set_settings([
				'name' => trim($_POST['form']['settings']['name']),
				/* temporary disabled
				'page'         => [
					'hide_titles'  => !empty($_POST['form']['settings']['page']['hide_titles']),
					'hide_numbers' => !empty($_POST['form']['settings']['page']['hide_numbers']),
				],
				'confirmation' => [
					'type'  => trim($_POST['form']['settings']['confirmation']['type']),
					'value' => Helpers::escape($_POST['form']['settings']['confirmation']['value']),
				]*/
			])->save();

		} catch (\Exception $e) {
			var_dump($e->__toString());
		}

		$this->edit_form_action();
	}

	/**
	 * Show email settings page
	 * @since 1.0.0
	 * @throws \Amoforms\Views\Exceptions\Runtime
	 */
	public function edit_email_action()
	{
		$form = $this->get_first_form();
		$this->_view
			->set('form', $form)
			->set('path', 'settings/pages/email')
			->render('settings/layout');
	}

	/**
	 * Update email settings
	 * @since 1.0.0
	 * @throws Runtime
	 * @throws Validate
	 */
	public function update_email_action()
	{
		Helpers::validate_for_empty($_POST, ['form' => [
			'id',
			'settings' => [
				'email'        => ['name', 'subject', 'to'],
			],
		]]);

		if (!filter_var($_POST['form']['settings']['email']['to'], FILTER_VALIDATE_EMAIL)) {
			throw new Validate('Invalid email');
		}

		if (!$form = $this->get_form_by_request()) {
			throw new Runtime('Form not found');
		};

		$form->set_settings([
			'email'        => [
				'name'    => Helpers::escape($_POST['form']['settings']['email']['name']),
				'subject' => Helpers::escape($_POST['form']['settings']['email']['subject']),
				'to'      => $_POST['form']['settings']['email']['to'],
			],
		])->save();

		$this->edit_email_action();
	}

	/**
	 * Endpoint for adding new field
	 * @since 1.0.0
	 * @throws Runtime
	 * @throws Validate
	 * @return $this
	 */
	public function add_field_action()
	{
		try {
			Helpers::validate_for_empty($_POST, ['form' => 'id', 'field' => 'type']);

			if (!$form = $this->get_form_by_request()) {
				throw new Runtime('Form not found');
			}
			$field = Fields\Manager::instance()->make_field($_POST['field']['type']);
			$form
				->add_field($field)
				->save();

		} catch (\Exception $e) {
			Helpers::handle_exception($e);
		}

		$this->edit_fields_action();
	}

	/**
	 * Endpoint for delete field
	 * @since 1.0.0
	 * @throws Validate
	 */
	public function delete_field_action()
	{
		try {
			if (empty($_GET['form']['id']) || !isset($_GET['field']['id'])) {
				throw new Validate('Invalid params');
			}
			if (!$form = $this->get_form_by_request()) {
				throw new Validate('Form not found');
			}

			$fields_count = count($form->get_fields());
			if ($fields_count <= 1) {
				throw new Validate("You can't delete all fields");
			}
			$form
				->delete_field((int)$_GET['field']['id'])
				->save();

		} catch (\Exception $e) {
			Helpers::handle_exception($e);
		}

		$this->edit_fields_action();
	}

	/**
	 * Preview form
	 * @since 1.0.0
	 * @throws \Amoforms\Views\Exceptions\Runtime
	 */
	public function form_preview_action()
	{
		//TODO: get form id from request
		$form = $this->get_first_form();
		$this->_view
			->set('form', $form)
			->set('path', 'settings/pages/preview')
			->render('settings/layout');
	}

	/**
	 * Get form by id in request
	 * @since 1.0.0
	 * @return Form|bool
	 */
	protected function get_form_by_request()
	{
		$form = FALSE;
		if (!empty($_REQUEST['form']['id'])) {
			$form = Forms\Manager::instance()->get_form_by_id((int)$_REQUEST['form']['id']);
		}
		return $form;
	}

	/**
	 * Get first Form instance from db.
	 * If forms not exists then new Form instance will be returned.
	 * @since 1.0.0
	 * @return Form
	 * @throws \Amoforms\Exceptions\Argument
	 */
	protected function get_first_form()
	{
		$all_forms = Forms\Manager::instance()->get_forms_collection();
		if ($all_forms->count()) {
			return $all_forms->remove_first();
		}
		return ((new Form())->set_default_fields());
	}

	/**
	 * Method for checking access to settings
	 * @since 1.0.0
	 * @throws \Amoforms\Exceptions\Access
	 */
	protected function check_access()
	{
		if (!Access::settings()) {
			//TODO: check check_admin_referer($this->_nonce_field)
			throw new \Amoforms\Exceptions\Access(I18n::get("You can't change form settings"));
		}
	}
}
