<?php

namespace Hardware\Output;

use Hardware\HardwareIdentifiers;

/**
 *
 * @author Andy
 *        
 */
class OutputFactory {
	const PREFIX_RELAY = "Relay";
	const PREFIX_DIMMER = "Dimmer";
	const PREFIX_SHUTTER = "Shutter";
	
	/**
	 *
	 * @param unknown $guid
	 * @return boolean
	 */
	public static function createRelay($guid) {
		$hardwareName = HardwareIdentifiers::getNameByGuid ( $guid );
		if (! $hardwareName) {
			return false;
			// TODO - Exception
		}
		$className = self::PREFIX_RELAY . "_" . $hardwareName;
		if (! file_exists ( "Relay/" . $className . ".php" )) {
			return false;
			// TODO - Exception
		}
		require_once 'Relay/' . $className;
		if (class_exists ( $className )) {
			return new $className ();
		} else {
			return false;
		}
	}
}

