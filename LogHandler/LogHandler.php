<?php

namespace LogHandler;

/**
 *
 * @author Andy
 *        
 */
class LogHandler {
	
	// LOG LEVELS
	const LOGLEVEL_OFF = 0;
	const LOGLEVEL_DEBUG = 1;
	const LOGLEVEL_ERROR = 2;
	const LOGLEVEL_INFO = 4;
	const LOGLEVEL_ALL = 5;
	
	/**
	 *
	 * @var integer Current active Log Level
	 */
	private $logLevelActive = 5;
	
	/**
	 *
	 * @param integer $logLevelActive
	 */
	public function __construct($logLevelActive = 5) {
		$this->logLevelActive = $logLevelActive;
	}
	
	/**
	 *
	 * @param string $message
	 * @param integer $level
	 */
	public function logMessage($message, $level) {
		// TODO - Logging to file and display
		if ($level == $this->logLevelActive) {
		} else {
		}
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
		return $logFileHandler->writeToLog ( $timestamp, $type, $message, $file, $line );
	}
}

?>