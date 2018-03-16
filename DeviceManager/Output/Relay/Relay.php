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
	protected $instanceID;
	
	/**
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
			return true;
		} else {
			// ERROR! Must be greater than 0
			// TODO: Implement Exception.
			return false;
		}
	}
	
	/**
	 *
	 * @param boolean $state
	 */
	public function setState($state) {
		if ($this->isUsable ()) {
			return $this->setState ( $state );
		} else {
			// Not Usable because locked via IPS_SetDisabled
			// TODO: Implement Exception
		}
	}
	
	/**
	 *
	 * @return boolean
	 */
	public function isUsable() {
		if (function_exists ( "IPS_SetDisabled" )) { // Only available IPS >= 4.0
			return IPS_GetObject ( $this->instanceID ) ['ObjectIsDisabled'];
		} else {
			return true;
		}
	}
	
	/**
	 *
	 * @param boolean $state
	 * @return boolean
	 */
	abstract protected function setStateHardware($state);
	
	/**
	 *
	 * @return boolean
	 */
	abstract public function getState();
}
?>