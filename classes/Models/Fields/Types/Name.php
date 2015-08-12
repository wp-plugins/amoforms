<?php
namespace Amoforms\Models\Fields\Types;

use Amoforms\Libs\Locale\I18n;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Name
 * @since 1.0.0
 * @package Amoforms\Models\Fields
 */
class Name extends Base_Field
{
	protected function init()
	{
		$this->_type = self::TYPE_NAME;
		$this->_name = I18n::get('Name');
		$this->_description = I18n::get('Name description');
		$this->_placeholder = I18n::get('Name placeholder');
	}
}
