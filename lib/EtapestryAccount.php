<?php
/**
* EtapestryAccount class for eTapestryAPI
* 
* @package EtapestryAPI
*/

class EtapestryAccount extends EtapestryAPI
{
	private $account = array();
	
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
	* Account Set Method's
	*
	* @param array $field
	* @param string $value
	* @return false
	* @access public
	*/
	public function setAccount($field, $value)
	{
		$this->account[$field] = $value;
	}
	
	/**
	* Account Get Method's
	*
	* @return array
	* @access public
	*/
	public function getAccount( $refId )
	{
		$this->account = parent::nusoapCall("getAccount", array($refId));
		return $this->account;
	}

	/**
	* Account Get Method Field 
	*
	* @param field
	* @return string
	* @access public
	*/
	public function getField($field)
	{
		return $this->account[$field];
	}
	
	/**
	* Check for single duplicate account
	*
	* @return array account information of duplicate account or null
	* @access public
	*/
	public function getDuplicateAccount($account)
	{	
		// Invoke getDuplicateAccount method
		$response = parent::nusoapCall("getDuplicateAccount", array($account));
		
		return $response;
	}	
	
	/**
	* Check for multiple duplicate accounts
	*
	* @return array of multiple duplicate accounts or null
	* @access public
	*/
	public function getDuplicateAccounts()
	{	// Invoke getDuplicateAccounts method
		$response = parent::nusoapCall("getDuplicateAccounts", array($this->account));
		
		return $response;
	}	
	
	/**
	 * Add an eTapestry account
	 * 
	 * @return string the unique database ref of the newly created account 
	 * @access public
	 */
	public function addAccount($account, $createFieldAndValues = false)
	{
		$response = parent::nusoapCall("addAccount", array($account, $createFieldAndValues));
		
		return $response;
	}

	/**
	 * Will add defined values to an existing account
	 * 
	 * @param string $refid
	 * @param array $definedValues
	 */
	public function applyDefinedValues ($refid, $definedValues) 
	{
		parent::nusoapCall("applyDefinedValues", array($refid, $definedValues, false));
	} 
	
	/**
	* Update acount method
	* Uses getAccount method with database refrence value to get account array from etapestry
	*
	* @param  array $account updated details
	* @return String unique database ref 
	* @access public
	*/
	public function updateAccount($refid)
	{	
		//Get account array from eTapestry, 
		$originalAccount = parent::nusoapCall("getAccount", array($refid));

		//update $account array with new values
		$update_account = array_merge($originalAccount,$this->account);
		
		$response = parent::nusoapCall("updateAccount", array($update_account, false));
		
		return $response;
	}

}
