<?php

namespace Hardware\Output;

require_once (__DIR__ . '\Abstraction\SymconMisc\SymconObjects.php');
require_once ('\HardwareIdentifiers');

use Hardware\HardwareIdentifiers;
use Abstraction\SymconMisc\SymconObjects;

/**
 *
 * @author AndyKrause
 *        
 */
class OutputFactory {
	
	/**
	 *
	 * @param string $prefix
	 * @param string $guid
	 * @return boolean
	 */
	public static function createClass($prefix, $instance_id) {
		$guid = SymconObjects::getInstanceGuid ( $instance_id );
		if ($guid !== false) {
			$hardware_name = HardwareIdentifiers::getNameByGuid ( $guid );
			if ($hardware_name !== false) {
				return self::newClass ( $prefix, $hardware_name );
			} else {
				return false;
				// GUID not found
				// TODO - Exception
			}
		}
	}
	
	/**
	 *
	 * @param string $prefix
	 * @param string $hardware_name
	 * @return boolean
	 */
	private static function newClass($prefix, $hardware_name) {
		$class_name = $prefix . "_" . $hardware_name;
		// FIXME file_exists and require must consider path from IPS_GetKernelDir !
		if (file_exists ( $prefix . "/" . $class_name . ".php" )) {
			require_once $prefix . '/' . $class_name;
			if (class_exists ( $class_name )) {
				// Class found, instatiate
				return new $class_name ();
			} else {
				// Class not found
				// TODO - Exception
				return false;
			}
		} else {
			return false;
			// File not found
			// TODO - Exception
		}
	}
}

