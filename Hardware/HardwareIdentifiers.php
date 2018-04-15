<?php

namespace Hardware;

/**
 *
 * @author AndyKrause
 *        
 */
class HardwareIdentifiers {
	
	/**
	 * Array containing GUIDs and names of hardware devices.
	 *
	 * @var array
	 */
	const GUID_ARRAY = Array (
			"Homematic" => "{EE4A81C6-5C90-4DB7-AD2F-F6BBD521412E}",
			"LCN" => "{2D871359-14D8-493F-9B01-26432E3A710F}" 
	);
	
	/**
	 *
	 * @param string $guid
	 * @return mixed
	 */
	public static function getNameByGuid($guid) {
		return array_search ( $guid, self::GUID_ARRAY );
	}
	
	/**
	 *
	 * @param string $name
	 * @return string
	 */
	public static function getGuidByName($name) {
		if (array_key_exists ( $name, self::GUID_ARRAY )) {
			return self::GUID_ARRAY [$name];
		}
	}
}

