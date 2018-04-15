<?php

namespace DeviceManager\Output\Relay;

use Hardware\Output\OutputFactory;

/**
 *
 * @author AndyKrause
 *        
 */
abstract class Relay {
	/**
	 * Prefix for class naming
	 *
	 * @var string
	 */
	const PREFIX = "Relay";
	
	/**
	 * InstanceID of Device within IP-Symcon
	 *
	 * @var integer
	 */
	protected $instanceId;
	
	/**
	 * Variable-Ident of Parameter to switch
	 *
	 * @var string
	 */
	protected $parameterName = "STATE";
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 * Sets ObjectIsDisabled flag.
	 *
	 * @param boolean $disabled
	 */
	public function setDisabled($disabled) {
		IPS_SetDisabled ( $this->instanceId, $disabled );
	}
	
	/**
	 * Returns ObjectIsDisabled flag.
	 *
	 * @return boolean
	 */
	public function isDisabled() {
		if (function_exists ( "IPS_SetDisabled" )) { // Only available IPS >= 4.0
			return IPS_GetObject ( $this->instanceId ) ['ObjectIsDisabled'];
		} else {
			return false;
		}
	}
	
	/**
	 * Set state of hardware.
	 *
	 * @param boolean $state
	 * @return boolean
	 */
	abstract public function setState($state);
	
	/**
	 * Get state of hardware.
	 *
	 * @return boolean
	 */
	abstract public function getState();
	
	/**
	 * Return class to control hardware.
	 *
	 * @param integer $instance_Id
	 * @return boolean
	 */
	public static function createClass($instance_id) {
		return OutputFactory::createClass ( self::PREFIX, $instance_id );
	}
}
?>