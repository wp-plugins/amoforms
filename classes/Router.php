<?php
namespace Amoforms;

use Amoforms\Traits\Singleton;
use Amoforms\Controllers\Form;
use Amoforms\Controllers\Settings;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Router
 * @since 1.0.0
 * @method static $this instance
 * @package Amoforms
 */
class Router
{
	use Singleton;

	/** @var string */
	protected $_page = '';

	/** @var string */
	protected $_controller = '';

	/** @var string */
	protected $_action = '';

	/**
	 * @since 1.0.0
	 */
	protected function __construct()
	{
		$this->_page = !empty($_GET['page']) ? (string)$_GET['page'] : '';
		$parts = explode('-', $this->_page);
		$this->_controller = !empty($parts[1]) ? $parts[1] : 'Settings';
		$this->_action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : (!empty($parts[2]) ? $parts[2] : '');
	}

	/**
	 * @since 1.0.0
	 * @throws Exceptions\Runtime
	 * @throws Exceptions\Validate
	 */
	public function navigate()
	{
		try {
			$controller_name = '\\' . __NAMESPACE__ . '\Controllers\\' . ucfirst($this->_controller);
			$action = $this->_action . '_action';

			if (class_exists($controller_name)) {
				$controller = new $controller_name();
				if (method_exists($controller, $action)) {
					$controller->$action();
					return;
				}
			}

			if ($action === 'submit_amoform_action') {
				$controller = new Form();
				$controller->submit_action();
			} else {
				$controller = new Settings();
				$controller->edit_fields_action();
			}

		} catch (\Exception $e) {
			Helpers::handle_exception($e);
		}
	}
}
