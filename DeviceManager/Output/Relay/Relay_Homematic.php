<?php

namespace DeviceManager\Output\Relay;

/**
 *
 * @author Andy
 *        
 */
class Relay_Homematic extends Relay {
	private $parameter;
	
	/**
	 *
	 * @param integer $instanceID
	 * @param string $parameter
	 * @return boolean
	 */
	public function __construct($instanceID, $parameter = "STATE") {
		$this->parameter = $parameter;
		return parent::__construct ( $instanceID );
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \DeviceManager\Output\Relay\Relay::getState()
	 */
	public function getState() {
		return GetValue ( IPS_GetVariableIDByIdent ( $this->parameter, $this->getInstanceID () ) );
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \DeviceManager\Output\Relay\Relay::setState()
	 */
	public function setState($state) {
		if ($this->isUsable ()) {
			return HM_WriteValueBoolean ( $this->getInstanceID (), $this->parameter, $state );
		} else {
			// Not Usable
			// TODO: Implement Exception
		}
	}
}