<?php

namespace DeviceManager\Output\Relay;

/**
 *
 * @author AndyKrause
 *        
 */
class Relay_Homematic extends Relay {
	const GUID = "{EE4A81C6-5C90-4DB7-AD2F-F6BBD521412E}";
	
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
	 * @see \DeviceManager\Output\Relay\Relay::setState()
	 */
	public function setState($state) {
		if (! $this->isDisabled ()) {
			return HM_WriteValueBoolean ( $this->instanceId, $this->parameterName, $state );
		}
	}
	
	/**
	 *
	 * {@inheritdoc}
	 * @see \DeviceManager\Output\Relay\Relay::getState()
	 */
	public function getState() {
		return GetValueBoolean ( IPS_GetObjectIDByIdent ( $this->parameterName, $this->instanceId ) );
	}
}

?>