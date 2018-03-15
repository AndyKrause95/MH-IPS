<?php

namespace DeviceManager\Output\Relay;

/**
 *
 * @author Andy
 *        
 */
abstract class Relay {
	/**
	 *
	 * @var integer
	 */
	private $instanceID;
	
	/**
	 *
	 * @var string
	 */
	private $parameter = "STATE";
	
	/**
	 *
	 * @param unknown $instanceID
	 * @return boolean
	 */
	public function __construct($instanceID) {
		if ($instanceID > 0) {
			$this->setInstanceID ( $instanceID );
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
	public function isUsable() {
		if (function_exists ( "IPS_SetDisabled" )) {
			return IPS_GetObject ( $this->instanceID ) ['ObjectIsDisabled'];
		} else {
			return true;
		}
	}
	
	/**
	 *
	 * @param integer $instanceID
	 */
	public function setInstanceID($instanceID) {
		$this->instanceID = $instanceID;
	}
	
	/**
	 *
	 * @return integer
	 */
	public function getInstanceID() {
		return $this->instanceID;
	}
	
	/**
	 *
	 * @param string $parameter
	 */
	public function setParameter($parameter) {
		$this->parameter = $parameter;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getParameter() {
		return $this->parameter;
	}
}
?>