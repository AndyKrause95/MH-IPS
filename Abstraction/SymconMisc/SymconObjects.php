<?php

namespace Abstraction\SymconMisc;

/**
 *
 * @author AndyKrause
 *        
 */
class SymconObjects {
	// TODO - Insert your code here
	
	/**
	 */
	public function __construct() {
		
		// TODO - Insert your code here
	}
	
	/**
	 * Return GUID from IP-Symcon module.
	 * False if failed.
	 *
	 * @param integer $module_id
	 * @return string|boolean
	 */
	public static function getInstanceGuid($instance_Id) {
		$instance = IPS_GetInstance ( $instance_Id );
		if (array_key_exists ( 'ModuleID', $instance ['ModuleInfo'] )) {
			return $module ['ModuleID'];
		} else {
			// TODO - Exception
			return false;
		}
	}
}

