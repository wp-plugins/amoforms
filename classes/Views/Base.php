<?php
namespace Amoforms\Views;

use Amoforms\Views\Exceptions\Runtime;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Base
 * @since 1.0.0
 * @package Amoforms\Views
 */
abstract class Base implements Interfaces\Base
{
	protected $_data = [];

	final public function render($path)
	{
		$path = AMOFORMS_VIEWS_DIR . '/' . $path . '.php';
		if (!file_exists($path)) {
			throw new Runtime('File for view not found in path: ' . $path);
		}
		/** @noinspection PhpIncludeInspection */
		require_once $path;
	}

	final public function get_html($path)
	{
		ob_start();
		$this->render($path);
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	final public function set($key, $value)
	{
		$this->_data[$key] = $value;
		return $this;
	}

	final public function get($key)
	{
		return isset($this->_data[$key]) ? $this->_data[$key] : FALSE;
	}

	/**
	 * Make array for rendering select
	 * @since 1.0.0
	 * @param array $values
	 * @param mixed $selected
	 * @return array
	 */
	public function make_options_for_select($values, $selected)
	{
		$options = [];
		foreach ($values as $value) {
			$options[] = [
				'value'    => $value,
				'title'    => $value, //TODO: change it
				'selected' => $value === $selected,
			];
		}
		return $options;
	}
}