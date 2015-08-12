<?php
namespace Amoforms\Libs\Filters;

use Amoforms\Helpers;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class TinyMCE
 * @since 1.0.0
 * @package Amoforms\Libs\Filters
 */
class TinyMCE implements Interfaces\Filter
{
	/**
	 * Register plugin
	 * @since 1.0.0
	 * @return $this
	 */
	public function register()
	{
		add_filter('mce_external_plugins', [$this, 'add_plugin']); // load our js plugin for TinyMCE
		add_filter('mce_buttons', [$this, 'add_button']); // add button to editor
		return $this;
	}

	/**
	 * Add our plugin for TinyMCE
	 * @since 1.0.0
	 * @param array $plugins - array of paths to TinyMCE plugins
	 * @return array
	 */
	public function add_plugin($plugins)
	{
		$plugins[AMOFORMS_PLUGIN_CODE] = Helpers::get_js_path(AMOFORMS_PLUGIN_URL . 'js/plugins/mce/editor_plugin.js');
		return $plugins;
	}

	/**
	 * Add our buttons to TinyMCE plugin
	 * @since 1.0.0
	 * @param array $buttons - buttons of TinyMCE plugin
	 * @return array
	 */
	public function add_button($buttons)
	{
		$buttons[] = 'amoforms_add_form';
		return $buttons;
	}
}
