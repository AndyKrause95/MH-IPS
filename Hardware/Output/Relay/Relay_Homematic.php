<?php

namespace DeviceManager\Output\Relay;

/**
 *
 * @author Andy
 *        
 */
class Relay_Homematic extends Relay {
	
	/**
	 *
	 * @param integer $instanceID
	 * @param string $parameter
	 * @return boolean
	 */
	public function __construct($instanceID) {
		return parent::__construct ( $instanceID );
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \DeviceManager\Output\Relay\Relay::getState()
	 */
	public function getState() {
		return GetValueBoolean ( IPS_GetObjectIDByIdent ( $this->parameter, $this->instanceID ) );
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \DeviceManager\Output\Relay\Relay::setState()
	 */
	protected function setStateHardware($state) {
		return HM_WriteValueBoolean ( $this->instanceID, $this->parameter, $state );
	}
}

?>