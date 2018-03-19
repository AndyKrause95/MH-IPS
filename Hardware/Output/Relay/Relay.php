<?php

namespace DeviceManager\Output\Relay;

/**
 *
 * @author Andy
 *        
 */
abstract class Relay {
	/**
	 * InstanceID of Device within IP-Symcon
	 *
	 * @var integer
	 */
	protected $instanceID;
	
	/**
	 * Variable-Ident of Parameter to switch
	 *
	 * @var string
	 */
	protected $parameter = "STATE";
	
	/**
	 *
	 * @param integer $instanceID
	 * @return boolean
	 */
	public function __construct($instanceID) {
		if ($instanceID > 0) {
			$this->setInstanceID ( $instanceID );
		} else {
			// ERROR! Must be greater than 0
			// TODO - Exception.
		}
	}
	
	/**
	 * Set state of Device
	 *
	 * @param boolean $state
	 */
	public function setState($state) {
		if (! $this->isDisabled ()) {
			return $this->setState ( $state );
		} else {
			// Not Usable because locked via IPS_SetDisabled
			// TODO - Exception
		}
	}
	
	/**
	 * Check if Device is disabled
	 *
	 * @return boolean
	 */
	public function isDisabled() {
		if (function_exists ( "IPS_SetDisabled" )) { // Only available IPS >= 4.0
			return IPS_GetObject ( $this->instanceID ) ['ObjectIsDisabled'];
		} else {
			return false;
		}
	}
	
	/**
	 * Set state of actual hardware Device
	 *
	 * @param boolean $state
	 * @return boolean
	 */
	abstract protected function setStateHardware($state);
	
	/**
	 * Get state of actual hardware
	 *
	 * @return boolean
	 */
	abstract public function getState();
}
?>