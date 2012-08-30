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
		
		?>
		<div class="postbox">
			<p>Oops! There seems to be an issue. Mind taking a look? <small><a href="mailto:info@hopeunlimited.org">Contact us</a> if you have a question.</small></p>
			<ul class="errors">
				<?php
					$this->log = array_unique( $this->log );
					foreach ($this->log as $log) {
						$explanation = '';
						switch ( $log ){
							case 'Credit Card Process Failure (000000 - Internal Server Error)':
								$explanation = 'Check your credit card details. You could have mistyped a card number, incorrect expiration date, etc etc.';
							break;
						}
						echo '<li>' . $log . '<small>' . $explanation . '</small></li>';
					}
				?>
			</ul>
		</div>
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
