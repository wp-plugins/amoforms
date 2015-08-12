<?php
namespace Amoforms;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Access
 * @since 1.0.0
 * @package Amoforms
 */
class Access
{
	/**
	 * Check access to settings
	 * @since 1.0.0
	 * @return bool
	 */
	public static function settings()
	{
		//TODO: check this permission
		//TODO: change to checking role
		return current_user_can('manage_options');
	}

	/**
	 * Die with html error block
	 * @since 1.0.0
	 */
	public static function die_error()
	{
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}
}
