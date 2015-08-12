<?php
namespace Amoforms\Models\Fields\Interfaces;

use Amoforms\Models\Collection\Interfaces\Base_Collection;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Interface Collection
 * @since 1.0.0
 * @package Amoforms\Models\Fields\Interfaces
 */
interface Collection extends Base_Collection
{
	public function fill_by_params(array $fields_params);
}
