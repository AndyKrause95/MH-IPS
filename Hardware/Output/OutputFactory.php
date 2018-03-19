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
	 * @param string $guid
	 * @return boolean
	 */
	public static function createRelay($guid) {
		$hardwareName = HardwareIdentifiers::getNameByGuid ( $guid );
		if (! $hardwareName) {
			return false;
			// GUID not found
			// TODO - Exception
		}
		return self::createClass ( self::PREFIX_RELAY, $hardwarename );
	}
	
	/**
	 *
	 * @param string $prefix
	 * @param string $hardwarename
	 * @return boolean
	 */
	private static function createClass($prefix, $hardwarename) {
		$className = self::PREFIX_RELAY . "_" . $hardwareName;
		if (! file_exists ( "Relay/" . $className . ".php" )) {
			return false;
			// File not found
			// TODO - Exception
		}
		
		require_once 'Relay/' . $className;
		if (class_exists ( $className )) {
			return new $className ();
		} else {
			// Class not found
			// TODO - Exception
			return false;
		}
	}
}

