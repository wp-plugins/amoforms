<?php
namespace Amoforms\Models\Fields\Types;

use Amoforms\Libs\Locale\I18n;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Text
 * @since 1.1.0
 * @package Amoforms\Models\Fields\Types
 */
class Text extends Base_Field
{
	protected function init()
	{
		$this->_type = self::TYPE_TEXT;
		$this->_name = I18n::get('Text');
	}
}
