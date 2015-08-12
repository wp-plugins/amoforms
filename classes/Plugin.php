<?php
namespace Amoforms;

use Amoforms\Libs\Shortcodes;
use Amoforms\Libs\Filters;
use Amoforms\Models\Forms;
use Amoforms\Libs\UI\Menu;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Plugin
 * @since 1.0.0
 * @package Amoforms
 */
class Plugin
{
	/** @var Router */
	protected $_router;

	/** @var Shortcodes\Manager */
	protected $_shortcode_manager;

	/** @var Filters\Manager */
	protected $_filters_manager;

	/** @var Menu $_menu */
	protected $_menu;

	public function __construct(Router $router, Shortcodes\Manager $shortcode_manager, Filters\Manager $filters_manager)
	{
		$this->_router = $router;
		$this->_filters_manager = $filters_manager;
		$this->_shortcode_manager = $shortcode_manager;
		$this->_menu = Menu::instance();

		Forms\Manager::instance()->create_table(); //TODO: call only on installing plugin
		$this->_shortcode_manager->register_codes();
		$this->_filters_manager->register();
	}
}
