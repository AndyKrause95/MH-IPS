<?php

namespace LogHandler;

/**
 *
 * @author Andy
 *        
 */
class LogVisualization {
	
	/**
	 */
	public function __construct() {
	}
	
	/**
	 *
	 * @param unknown $json
	 */
	public function createHtmlFromJson($json) {
		$array = json_decode ( $json, true );
		$heading = "<tr><th>Timestamp</th><th>Type</th><th>Message</th><th>File</th><th>Line</th></tr>";
		
		if (! empty ( $array )) {
			$rows = "";
			foreach ( $array as $logMessage ) {
				$date = date ( "Y-m-d H:i:s e", ( float ) $logMessage ['TIMESTAMP'] );
				$type = $logMessage ['TYPE'];
				$message = $logMessage ['MESSAGE'];
				$file = $logMessage ['FILE'];
				$line = $logMessage ['LINE'];
				
				$rows .= "<tr><td>" . $date . "</td><td>" . $type . "</td><td>" . $message . "</td><td>" . $file . "</td><td>" . $line . "</td></tr>";
			}
		} else {
			$rows = "<tr><td colspan='5'><center><font color='red'><b>No Log Messages found</b></font></center></td></tr>";
		}
		
		$html = "<table id='MH-IPS_LOG' width='100%' border=2>" . $heading . $rows . "</table>";
		return $html;
	}
}

