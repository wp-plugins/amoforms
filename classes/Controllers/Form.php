<?php
namespace Amoforms\Controllers;

use Amoforms\Exceptions\Argument;
use Amoforms\Exceptions\Runtime;
use Amoforms\Exceptions\Validate;
use Amoforms\Helpers;
use Amoforms\Models\Forms;
use Amoforms\Libs\Sender;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Form
 * @since 1.0.0
 * @package Amoforms\Controllers
 */
class Form extends Base
{
	/**
	 * id of last submitted form for preventing double submitting if a page has several forms.
	 * TODO: improve submitting logic and delete this property
	 * @var array
	 */
	protected static $_last_submitted_form_id = NULL;

	/**
	 * Show form by id
	 * @since 1.0.0
	 * @param int  $id
	 */
	public function show_action($id)
	{
		try {
			$id = (int)$id;
			if (!$form = Forms\Manager::instance()->get_form_by_id($id)) {
				throw new Argument('Form not found by id: ' . $id);
			}
			$this->show_form($form);
		} catch (\Exception $e) {
			Helpers::handle_exception($e);
		}
	}

	/**
	 * Show form
	 * @since 1.0.0
	 * @param Forms\Form $form
	 * @param string     $result
	 * @throws \Amoforms\Views\Exceptions\Runtime
	 */
	protected function show_form(Forms\Form $form, $result = '')
	{
		$this->_view
			->set('form', $form)
			->set('result', $result)
			->render('form/form');
	}

	/**
	 * Accepting form submit
	 * @since 1.0.0
	 * @return bool
	 */
	public function submit_action()
	{
		try {
			if (empty($_REQUEST['form']['id'])) {
				throw new Validate('Empty form id');
			}
			if (empty($_REQUEST['fields']) || !is_array($_REQUEST['fields'])) {
				throw new Validate('Empty fields');
			}
			if (intval($_REQUEST['form']['id']) === self::$_last_submitted_form_id) {
				return FALSE;
			}

			//TODO: check form hash
			$form = Forms\Manager::instance()->get_form_by_id((int)$_REQUEST['form']['id']);
			if (!$form) {
				throw new Runtime('Form not found');
			}

			self::$_last_submitted_form_id = (int)$form->id();

			$settings = $form->get_settings();

			if (empty($settings['email']['to'])) {
				throw new Runtime('Empty email settings');
			}

			$fields = [];
			foreach ($form->get_fields() as $field_id => $field) {
				if (isset($_REQUEST['fields'][$field_id]) && $_REQUEST['fields'][$field_id] !== '') {
					$fields[$field_id] = [
						'name'  => $field['name'],
						'value' => trim($_REQUEST['fields'][$field_id]),
					];
				}
			}

			if (empty($fields)) {
				throw new Validate('Empty fields');
			}

			$email = $this->_view
					->set('data', ['fields' => $fields])
					->get_html('mail/submit');

			$sender = new Sender\Mail();
			$sender
				->set_html(TRUE)
				->set_from($settings['email']['name'])
				->send($settings['email']['to'], $settings['email']['subject'], $email);

			$this->_view->render('pages/submit');

		} catch (\Exception $e) {
			Helpers::handle_exception($e);
		}

		return TRUE;
	}
}
