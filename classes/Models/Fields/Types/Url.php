<?php
namespace Amoforms\Models\Fields\Types;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Url
 * @since 1.1.0
 * @package Amoforms\Models\Fields\Types
 */
class Url extends Base_Field
{
	protected function init()
	{
		$this->_type = self::TYPE_URL;
		$this->_name = 'URL';
	}
}
