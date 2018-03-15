<?php

namespace DeviceManager\Output\Relay;

/**
 *
 * @author Andy
 *        
 */
abstract class Relay {
	private $instanceID;
	
	/**
	 *
	 * @param integer $instanceID
	 * @return boolean
	 */
	public function __construct($instanceID) {
		if ($instanceID > 0) {
			$this->instanceID = $instanceID;
			return true;
		} else {
			// ERROR! Can't be greater than 0
			// TODO: Implement Exception.
			return false;
		}
	}
	
	/**
	 *
	 * @param boolean $state
	 * @return boolean
	 */
	abstract public function setState($state);
	
	/**
	 *
	 * @return boolean
	 */
	abstract public function getState();
	
	/**
	 *
	 * @return boolean
	 */
	abstract public function isUsable();
}

?>