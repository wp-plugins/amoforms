<?php
namespace Amoforms\Models\Collection\Interfaces;

defined('AMOFORMS_BOOTSTRAP') or die('Direct access denied');

/**
 * Interface Base_Collection
 * @since 1.0.0
 * @package Amoforms\Models\Collection\Interfaces
 */
interface Base_Collection
{
	/**
	 * Add element
	 * @since 1.0.0
	 * @param $object
	 * @return $this
	 */
	public function add($object);

	/**
	 * Get first element
	 * @since 1.0.0
	 * @return $object|null
	 */
	public function first();

	/**
	 * Get and remove first element
	 * @since 1.0.0
	 * @return $object|null
	 */
	public function remove_first();

	/**
	 * Count of elements
	 * @since 1.0.0
	 * @return int
	 */
	public function count();

	/**
	 * Delete all elements
	 * @since 1.0.0
	 * @return $this
	 */
	public function delete_all();

	/**
	 * Delete field by index
	 * @since 1.0.0
	 * @param int $index
	 * @return $this
	 */
	public function delete($index);
}
