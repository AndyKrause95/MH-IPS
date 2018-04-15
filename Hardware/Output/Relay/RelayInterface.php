<?php

namespace Hardware\Output\Relay;

/**
 *
 * @author AndyKrause
 *        
 */
interface RelayInterface {
	
	/**
	 *
	 * @param boolean $state
	 */
	public function setState($state);
	
	/**
	 *
	 * @param boolean $disabled
	 */
	public function setDisabled($disabled);
	
	/**
	 *
	 * @return boolean
	 */
	public function getState();
	
	/**
	 *
	 * @return boolean
	 */
	public function isDisabled();
}