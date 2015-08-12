<?php
namespace Amoforms\Models\Fields\Types;

use Amoforms\Libs\Locale\I18n;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Email
 * @since 1.0.0
 * @package Amoforms\Models\Fields
 */
class Email extends Base_Field
{
	protected function init()
	{
		$this->_type = self::TYPE_EMAIL;
		$this->_name = 'Email';
		$this->_placeholder = I18n::get('yourmail@mail.com');
		$this->_description = I18n::get('Email description');
	}
}
