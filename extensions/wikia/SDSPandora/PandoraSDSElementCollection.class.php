<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adam
 * Date: 31.01.13
 * Time: 12:16
 * To change this template use File | Settings | File Templates.
 */

class PandoraSDSElementCollection implements Iterator {
	private $collection = array();

	public function addElement ( PandoraSDSValue $element ) {
		$collection[] = $element;
	}

	public function getElementByID ( $id ) {

	}

/**
 * (PHP 5 &gt;= 5.0.0)<br/>
 * Return the current element
 * @link http://php.net/manual/en/iterator.current.php
 * @return mixed Can return any type.
 */public function current() {
	// TODO: Implement current() method.
}/**
 * (PHP 5 &gt;= 5.0.0)<br/>
 * Move forward to next element
 * @link http://php.net/manual/en/iterator.next.php
 * @return void Any returned value is ignored.
 */public function next() {
	// TODO: Implement next() method.
}/**
 * (PHP 5 &gt;= 5.0.0)<br/>
 * Return the key of the current element
 * @link http://php.net/manual/en/iterator.key.php
 * @return mixed scalar on success, or null on failure.
 */public function key() {

	// TODO: Implement key() method.
}/**
 * (PHP 5 &gt;= 5.0.0)<br/>
 * Checks if current position is valid
 * @link http://php.net/manual/en/iterator.valid.php
 * @return boolean The return value will be casted to boolean and then evaluated.
 * Returns true on success or false on failure.
 */public function valid() {
	$element = current( $this->collection );
	if ( gettype($element) === 'PandoraSDSElement' || gettype($element) === 'PandoraSDSElementCollection' ) {
		return true;
	} else {
		return false;
	}
	// TODO: Implement valid() method.
}/**
 * (PHP 5 &gt;= 5.0.0)<br/>
 * Rewind the Iterator to the first element
 * @link http://php.net/manual/en/iterator.rewind.php
 * @return void Any returned value is ignored.
 */public function rewind() {
	reset($this->collection);
	return null;
}}