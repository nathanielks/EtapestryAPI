<?php
/**
* EtapestryJournal class for eTapestryAPI
* 
* @package EtapestryAPI
*/

class EtapestryJournal extends EtapestryAPI
{
	
	/**
	 * Run parent constructor
	 * 
	 * @param string $endpoint URL of eTapestry Service
	 */
	public function __construct($endpoint = false)
	{
		parent::__construct($endpoint);
	}

	/**
	 * addRecurringGift 
	 * 
	 * @param mixed $transaction 
	 * @access public
	 * @return string The unique database ref of the newly created recurring 
	 * gift transaction. 
	 */
	public function addRecurringGift( $transaction )
	{	
		$response = parent::nusoapCall("addRecurringGift", array($transaction));
		
		return $response;
	}

	/**
	 * addRecurringGiftSchedule 
	 * 
	 * @param mixed $transaction 
	 * @access public
	 * @return string The unique database ref of the newly created recurring 
	 * gift schedule transaction.
	 */
	public function addRecurringGiftSchedule( $transaction )
	{	
		$response = parent::nusoapCall("addRecurringGiftSchedule", array($transaction));
		
		return $response;
	}

}
