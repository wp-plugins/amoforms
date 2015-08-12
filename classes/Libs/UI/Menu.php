<?php
namespace Amoforms\Libs\UI;

use Amoforms\Router;
use Amoforms\Traits\Singleton;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Menu
 * @since 1.0.0
 * @method static $this instance
 * @package Amoforms\Libs\UI
 */
class Menu
{
	use Singleton;

	/** @var Router */
	protected $_router;
	protected $_slug = 'amoforms';
	protected $_capability = 'manage_options';
	protected $_main_menu = 'amoForms settings';
	protected $_admin_menu_items = [
		'Edit Fields'    => '',
		'Form Settings'  => '-settings-edit_form',
		'Email Settings' => '-settings-edit_email',
		'Form preview'   => '-settings-form_preview',
	];

	protected function __construct() {
		$this->_router = Router::instance();
		$this->init_admin_menu();
	}

	/**
	 * @since 1.0.0
	 * @return string
	 */
	public function get_slug() {
		return $this->_slug;
	}

	/**
	 * Add plugin settings to menu
	 * @since 1.0.0
	 */
	protected function init_admin_menu()
	{
		//TODO: check capabilities in controller
		add_action('admin_menu', function () {
			add_menu_page($this->_main_menu, $this->_main_menu, $this->_capability, $this->_slug, [$this->_router, 'navigate']);
			foreach ($this->_admin_menu_items as $title => $menu_slug) {
				add_submenu_page($this->_slug, $title, $title, $this->_capability, $this->_slug . $menu_slug, [$this->_router, 'navigate']);
			}
		});
	}
}
