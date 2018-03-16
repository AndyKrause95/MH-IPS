<?php

namespace LogHandler;

/**
 *
 * @author Andy
 *        
 */
class LogFileHandler {
	private $logFilePath = "/log/";
	private $logFileName = "MH_LOG.log";
	private $maxSize = 0; /* TODO - Implement max size for log file */
	
	/**
	 */
	public function __construct() {
		if (! file_exists ( $this->getLogFile () )) {
			$pointer = fopen ( $this->getLogFile (), "w" );
			if ($pointer === false) {
				echo "LogFileHandler: File '. $this->logFilePath . $this->logFileName .' could not be created \n";
				fclose ( $pointer );
				return false;
			}
		}
		return true;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getLog() {
		$json = file_get_contents ( $this->getLogFile () );
		return json_decode ( $json, true );
	}
	
	/**
	 *
	 * @param string $timestamp
	 * @param string $type
	 * @param string $message
	 * @param string $file
	 * @param string $line
	 */
	public function writeToLog($timestamp, $type, $message, $file, $line) {
		$jsonMessage = $this->generateJsonFromParameters ( $timestamp, $type, $message, $file, $line );
		$this->appendToFile ( $jsonMessage );
	}
	
	/**
	 *
	 * @param unknown $jsonMessage
	 * @return number
	 */
	private function appendToFile($jsonMessage) {
		$json = file_get_contents ( $this->getLogFile () );
		$data = json_decode ( $json, true );
		$data [] = $jsonMessage;
		return file_put_contents ( $this->getLogFile (), json_encode ( $data ) );
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
	private function generateJsonFromParameters($timestamp, $type, $message, $file, $line) {
		$array [] = Array (
				'TIMESTAMP' => $timestamp,
				'TYPE' => $type,
				'MESSAGE' => $message,
				'FILE' => $file,
				'LINE' => $line 
		);
		$json = json_encode ( $array );
		return $json;
	}
	
	/**
	 *
	 * @return string
	 */
	private function getLogFile() {
		return $this->logFilePath . $this->logFileName;
	}
}

