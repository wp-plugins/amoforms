<?php
namespace Amoforms\Traits;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Singleton
 * @since 1.0.0
 * @package Amoforms\Traits
 */
trait Singleton
{
	protected static $_instance;

	public static function instance()
	{
		if (!static::$_instance) {
			static::$_instance = new static();
		}
		return static::$_instance;
	}

	protected function __construct() {}
	protected function __clone() {}
	protected function __sleep() {}
	protected function __wakeup() {}
}
