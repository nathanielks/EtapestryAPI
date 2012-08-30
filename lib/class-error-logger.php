<?php

class Error_Logger {
	
	var $log;
	
	public function __construct() { 
		$this->log = array();
	}
	
	function add( $message, $echo = false ) {
		$this->log[] = $message;
		if ( $echo ) {
			echo $message . '<br/>';
			@ob_flush();
			@flush();
		}
	}
	
	function show_log() {
		
		$this->log = array_unique( $this->log );
		?>

		<ul class="errors">

		<?php	
		foreach ($this->log as $log) {
			echo '<li>' . $log . '</li>';
		}
		?>

		</ul> 
		<?php

		$this->log = array();
	}

	function has_errors(){
		if ( ! empty( $this->log ) ){
			return true;
		} 
		return false; 
	}
	
}
