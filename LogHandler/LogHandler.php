<?php

namespace LogHandler;

/**
 *
 * @author Andy
 *        
 */
class LogHandler {
	
	/**
	 * Log Levels
	 */
	const LOGLEVEL_OFF = 0;
	const LOGLEVEL_DEBUG = 1;
	const LOGLEVEL_ERROR = 2;
	const LOGLEVEL_INFO = 4;
	const LOGLEVEL_ALL = 5;
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 *
	 * @param int $timestamp
	 * @param string $type
	 * @param string $message
	 * @param string $file
	 * @param string $line
	 * @return string
	 */
	public function generateStringFromParameters($timestamp, $type, $message, $file, $line) {
		$timeFormatted = gmdate ( "Y-m-d H:i:s T", $timestamp );
		return $timeFormatted . "\t-\t" . $type . "\t-\t" . $message . "\t-\t" . "in file '" . $file . "' on line '" . $line . "'.\n";
	}
	
	/**
	 *
	 * @param int $timestamp
	 * @param string $type
	 * @param string $message
	 * @param string $file
	 * @param string $line
	 * @return number
	 */
	public function writeToLog($timestamp, $type, $message, $file, $line) {
		$logFileHandler = new LogFileHandler ();
		return $logFileHandler->writeToLogFromParameters ( $timestamp, $type, $message, $file, $line );
	}
}

?>