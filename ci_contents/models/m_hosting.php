<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Hosting
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class m_hosting extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'hosting';
	
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
		'server_id'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'package_id'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'status'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'active\',\'inactive\',\'suspended\'',
			'default'=>'inactive'
			),
		'username'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'password'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'usage'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			'default'=>'a:2:{s:9:"bandwidth";i:0;s:9:"diskspace";i:0;}'
			)
	);
	
	var $required_fields = array();
	
}

/* End of file m_hosting.php */