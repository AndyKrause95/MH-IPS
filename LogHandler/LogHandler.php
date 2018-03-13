<?php

namespace LogHandler;

/**
 *
 * @author Andy
 *        
 */
class LogHandler {
	private $logFilePointer;
	private $logFilePath = "/log/";
	private $logFileName = "MH_LOG.log";
	
	/**
	 */
	public function __construct() {
		$this->logFilePointer = fopen ( $this->logFilePath . $this->logFileName, "a+" );
		
		if ($this->logFilePointer === false) {
			echo "LogHandler: File '. $this->logFilePath . $this->logFileName .' could not be created \n";
			return false;
		} else {
			return true;
		}
	}
	
	/**
	 */
	public function writeToLog($timestamp, $severity, $file, $line, $type, $message) {
		$timeFormatted = gmdate("Y-m-d H:i:s e", $timestamp);
		$errorMessage = $timeFormatted . "\t-\t" . $severity . "\t-\t" . $message . "\n";
	}
}

?>