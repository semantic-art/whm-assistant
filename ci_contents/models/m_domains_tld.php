<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Top Level Domains
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	Bradley Robert Martin
 *
 * @since		14/08/12
 */

class m_domains_tld extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'domains_tld';
	
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
		'status'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'active\',\'inactive\'',
			'default'=>'inactive'
			),
		'tld'=>array(
			'type'=>'VARCHAR',
			'constraint'=>8
			),
		'rate'=>array(
			'type'=>'DECIMAL',
			'constraint'=>'10,0',
			'default'=>'0.00'
			),
		'min_registration'=>array(
			'type'=>'INT',
			'constraint'=>20,
			'default'=>'1314000' // 1 Year
			),
		'max_registration'=>array(
			'type'=>'INT',
			'constraint'=>20,
			'default'=>'2628000' // 2 years
			),
		'default_registrant'=>array(
			'type'=>'INT',
			'constraint'=>10
			)
	);
	
	var $required_fields = array();
	
}

/* End of file m_domains_tld.php */