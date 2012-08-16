<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Accounts
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class m_accounts extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'accounts';
	
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
		'classification'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'business\',\'personal\'',
			'default'=>'business'
			),
		'status'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'active\',\'inactive\',\'suspended\'',
			'default'=>'active'
			),
		'business_name'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'website'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'tax_exempt'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'true\',\'false\'',
			'default'=>'false'
			),
		'overdue_charges'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'true\',\'false\'',
			'default'=>'true'
			),
		'address'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			'default'=>'a:5:{s:6:"street";s:0:"";s:4:"city";s:0:"";s:5:"state";s:0:"";s:7:"country";s:0:"";s:8:"postcode";s:0:"";}'
			)
	);
	
	var $required_fields = array();
	
}

/* End of file m_accounts.php */