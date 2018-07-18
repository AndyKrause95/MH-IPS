<?php

namespace Hardware\Output\Relay;

require_once ('\Relay.php');

/**
 *
 * @author AndyKrause
 *        
 */
class Relay_LCN extends Relay {
	const GUID = "{2D871359-14D8-493F-9B01-26432E3A710F}";
	
	/**
	 *
	 * @param integer $instanceID
	 * @return boolean
	 */
	public function __construct($instance_Id) {
		$this->instanceId = $instance_Id;
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \Hardware\Output\Relay\Relay::setState()
	 */
	public function setState($state) {
		if (! $this->isDisabled ()) {
			return LCN_SwitchRelay ( $this->instanceId, $state );
		}
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \Hardware\Output\Relay\Relay::getState()
	 */
	public function getState() {
		return GetValueBoolean ( IPS_GetObjectIDByIdent ( $this->parameterIdent, $this->instanceId ) );
	}
}

?>