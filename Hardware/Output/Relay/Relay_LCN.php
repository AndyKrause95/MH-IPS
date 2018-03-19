<?php

namespace DeviceManager\Output\Relay;

/**
 *
 * @author Andy
 *        
 */
class Relay_LCN extends Relay {
	
	/**
	 *
	 * @param integer $instanceID
	 * @return boolean
	 */
	public function __construct($instanceID) {
		parent::__construct ( $instanceID );
		// TODO - Does this work?
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
		return LCN_SwitchRelay ( $this->instanceID, $state );
	}
}

?>