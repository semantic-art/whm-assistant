<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Contacts
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class m_contacts extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'contacts';
	
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
		'status'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'active\',\'inactive\'',
			'default'=>'active'
			),
		'primary'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'true\',\'false\'',
			'default'=>'false'
			),
		'facebook_id'=>array(
			'type'=>'VARCHAR',
			'constraint'=>50
			),
		'first_name'=>array(
			'type'=>'VARCHAR',
			'constraint'=>50
			),
		'last_name'=>array(
			'type'=>'VARCHAR',
			'constraint'=>50
			),
		'email'=>array(
			'type'=>'VARCHAR',
			'constraint'=>50
			),
		'password'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'phone'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			'default'=>'a:3:{s:4:"home";b:0;s:6:"mobile";b:0;s:6:"office";b:0;}'
			)
	);
	
	var $required_fields = array();
	
		

}

/* End of file m_contacts.php */