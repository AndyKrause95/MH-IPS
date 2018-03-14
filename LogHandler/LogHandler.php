<?php

namespace LogHandler;

/**
 *
 * @author Andy
 *        
 */
class LogHandler {
	private $logFilePath = "/log/";
	private $logFileName = "MH_LOG.log";
	private $maxSize = 0; /* TODO: Implement max size for log file */
	
	/**
	 */
	public function __construct() {
		if (! file_exists ( $this->getLogFile () )) {
			$pointer = fopen ( $this->getLogFile (), "w" );
			if ($pointer === false) {
				echo "LogHandler: File '. $this->logFilePath . $this->logFileName .' could not be created \n";
				fclose ( $pointer );
				return false;
			}
		}
		return true;
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
		$jsonMessage = $this->generateJsonFromParameters ( $timestamp, $type, $message, $file, $line );
		return $this->appendToFile ( $jsonMessage );
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getLogAsArray() {
		$json = file_get_contents ( $this->getLogFile () );
		return json_decode ( $json, true );
	}
	
	/**
	 *
	 * @param unknown $jsonMessage
	 * @return string
	 */
	private function generateStringFromJson($jsonMessage) {
		$array = json_decode ( $jsonMessage, true );
		return $this->generateStringFromParameters ( $array ['TIMESTAMP'], $array ['TYPE'], $array ['MESSAGE'], $array ['FILE'], $array ['LINE'] );
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
	 * @return string
	 */
	private function getLogFile() {
		return $this->logFilePath . $this->logFileName;
	}
}
?>