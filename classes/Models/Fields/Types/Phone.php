<?php
namespace Amoforms\Models\Fields\Types;

use Amoforms\Libs\Locale\I18n;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Phone
 * @since 1.0.0
 * @package Amoforms\Models\Fields\Types
 */
class Phone extends Base_Field
{
	protected function init()
	{
		$this->_type = self::TYPE_PHONE;
		$this->_name = I18n::get('Phone');
		$this->_description = '';
		$this->_default_value = '';
		$this->_placeholder = '+1 123 456 78 90';
		$this->_required = TRUE;

		$this
			->add_extra_option('default_country', I18n::get('Default country'),
				[
					'RU' => 'Russia',
					'US' => 'USA'
				],
				'Russia')
			->add_extra_option('number_type', I18n::get('Number type'),
				[
					'mobile' => 'Mobile',
					'fixed'  => 'Fixed'
				],
				'Mobile');
	}
}
