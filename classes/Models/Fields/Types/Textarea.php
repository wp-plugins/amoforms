<?php
namespace Amoforms\Models\Fields\Types;

use Amoforms\Libs\Locale\I18n;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Textarea
 * @since 1.0.0
 * @package Amoforms\Models\Fields
 */
class Textarea extends Base_Field
{
	protected function init()
	{
		$this->_type = self::TYPE_TEXTAREA;
		$this->_name = 'Message';
		$this->_placeholder = I18n::get('What do you think?');
		$this->_description = I18n::get('Message description');
	}
}
