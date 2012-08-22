<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Servers
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	Bradley Robert Martin
 *
 * @since		15/08/12
 */

class m_servers extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'servers';
	
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
		'ip_address'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'username'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'password'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'hash'=>array(
			'type'=>'TEXT'
			),
		'cmd_options'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			'default'=>'a:5:{s:9:"provision";b:0;s:7:"suspend";b:0;s:6:"delete";b:0;s:14:"update_package";b:0;s:5:"usage";b:0;}'
			),
		'properties'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			'default'=>'a:3:{s:9:"bandwidth";i:0;s:9:"diskspace";i:0;s:16:"maximum-accounts";b:0;}'
			)
	);
	
	var $required_fields = array();
	
		

}

/* End of file m_servers.php */