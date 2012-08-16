<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Domains
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class m_domains extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'domains';
	
	var $validate_field_existence = TRUE;
	
	var $key = 'id';
	
	var $fields = array(
		'id'=>array(
			'type'=>'INT',
			'constraint'=>10,
			'unsigned'=>TRUE,
			'auto_increment'=>TRUE
			),
		'date_created'=>array(
			'type'=>'DATETIME'
			),
		'date_modified'=>array(
			'type'=>'DATETIME'
			),
		'account_id'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'registrant_id'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'status'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'pending\',\'registered\',\'expired\''
			),
		'domain'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'tld_id'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'domain_locked'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'false\',\'true\''
			),
		'next_expiry'=>array(
			'type'=>'DATETIME'
			),
		'last_renewal'=>array(
			'type'=>'DATETIME'
			)
	);
	
	var $required_fields = array();
	
	
	/**
	 * Registrant
	 *
	 * @return	object / boolean
	 * @todo	none
	 **/
	public function Registrant($id=FALSE)
	{
		/*
			Get registrant	
		*/
		
		$this->load->model('m_registrants');
		$registrant = $this->m_registrants->get(array('id'=>$id));
		if($registrant){
			return $registrant;
		}
		return FALSE;
	}
		

}

/* End of file m_domains.php */