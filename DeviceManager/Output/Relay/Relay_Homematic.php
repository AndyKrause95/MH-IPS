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
		$this->parameter = $parameter;
		return parent::__construct ( $instanceID );
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \DeviceManager\Output\Relay\Relay::getState()
	 */
	public function getState() {
		return GetValue ( IPS_GetVariableIDByIdent ( $this->getParameter (), $this->getInstanceID () ) );
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \DeviceManager\Output\Relay\Relay::setState()
	 */
	public function setState($state) {
		if ($this->isUsable ()) {
			return HM_WriteValueBoolean ( $this->getInstanceID (), $this->getParameter (), $state );
		} else {
			// Not Usable
			// TODO: Implement Exception
		}
	}
}