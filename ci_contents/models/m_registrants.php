<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Registrants
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	Bradley Robert Martin
 *
 * @since		14/08/12
 */

class m_registrants extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'registrants';
	
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
		'name'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'tld_options'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			'default'=>'a:0:{}'
			),
		'cmd_options'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			'default'=>'a:4:{s:7:"library";b:0;s:8:"register";b:0;s:8:"transfer";b:0;s:5:"renew";b:0;}'
			)
	);
	
	var $required_fields = array();
	
}

/* End of file m_registrants.php */