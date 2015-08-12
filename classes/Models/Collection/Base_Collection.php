<?php
namespace Amoforms\Models\Collection;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Class Base_Collection
 * @since 1.0.0
 * @package Amoforms\Models\Collection
 */
abstract class Base_Collection implements Interfaces\Base_Collection
{
	/** @var \SplObjectStorage */
	protected $_data;

	public function __construct()
	{
		$this->_data = new \SplObjectStorage();
	}

	public function add($object)
	{
		$this->_data->attach($object);
		return $this;
	}

	public function first()
	{
		$this->_data->rewind();
		return $this->_data->current();
	}

	public function remove_first()
	{
		$first = $this->first();
		$this->_data->detach($first);
		return $first;
	}

	public function count()
	{
		return $this->_data->count();
	}

	public function delete_all()
	{
		$this->_data->removeAll($this->_data);
		return $this;
	}

	public function delete($index)
	{
		//FIXME: temp solution
		$index = (int)$index;
		foreach ($this->_data as $key => $field) {
			if ($key === $index) {
				$this->_data->detach($field);
				break;
			}
		}
		return $this;
	}
}
