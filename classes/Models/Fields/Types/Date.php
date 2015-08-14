<?php
namespace Amoforms\Models\Fields\Types;

use Amoforms\Libs\Locale\I18n;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Date
 * @since 1.1.0
 * @package Amoforms\Models\Fields\Types
 */
class Date extends Base_Field
{
	protected function init()
	{
		$this->_type = self::TYPE_DATE;
		$this->_name = I18n::get('Date');
	}
}
