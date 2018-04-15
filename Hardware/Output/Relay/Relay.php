<?php

namespace DeviceManager\Output\Relay;

use Hardware\Output\OutputFactory;
use Hardware\Output\Relay\RelayInterface;

/**
 *
 * @author AndyKrause
 *        
 */
abstract class Relay implements RelayInterface {
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
	protected $parameterIdent = "STATE";
	
	/**
	 * Sets ObjectIsDisabled flag.
	 *
	 * @return boolean
	 */
	public function setDisabled($disabled) {
		if (function_exists ( "IPS_SetDisabled" )) { // Only available IPS >= 4.0
			return IPS_SetDisabled ( $this->instanceId, $disabled );
		} else {
			// Function does not exist.
			return false;
		}
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
			// Function does not exist.
			return false;
		}
	}
	
	/**
	 * Returns InstanceID of module.
	 *
	 * @return integer
	 */
	public function getInstanceId() {
		return $this->instanceId;
	}
	
	/**
	 * Return parameter ident of variable to switch.
	 *
	 * @return string
	 */
	public function getParameterIdent() {
		return $this->parameterIdent;
	}
	
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