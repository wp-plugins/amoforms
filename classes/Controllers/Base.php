<?php
namespace Amoforms\Controllers;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Base
 * @since 1.0.0
 * @package Amoforms\Controllers
 */
abstract class Base
{
	/** @var \Amoforms\Views\Base */
	protected $_view;

	public function __construct()
	{
		$class = str_replace('\\Controllers\\', '\\Views\\', get_called_class());
		if (!class_exists($class)) {
			throw new Exceptions\Controller("Class \"{$class}\" not found");
		}
		$this->_view = new $class;
	}
}
