<?php

namespace LogHandler;

/**
 *
 * @author Andy
 *        
 */
class ErrorHandler {
	private $logFilePointer;
	private $logFilePath = "/log/";
	private $logFileName = "MH_LOG.log";
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 */
	public function writeToLog($message) {
	}
	
	/**
	 */
	private function writeMessageToLog($message) {
	}
}

?>