<?php

namespace DeviceManager\Output\Relay;

/**
 *
 * @author Andy
 *        
 */
class Relay_LCN extends Relay {
	private $paramter = "STATE";
	
	/**
	 *
	 * @param integer $instanceID
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
		return GetValue ( IPS_GetVariableIDByIdent ( $this->paramter, $this->getInstanceID () ) );
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \DeviceManager\Output\Relay\Relay::setState()
	 */
	public function setState($state) {
		if ($this->isUsable ()) {
			return LCN_SwitchRelay ( $this->getInstanceID (), $state );
		} else {
			// Not Usable
			// TODO: Implement Exception
		}
	}
}

