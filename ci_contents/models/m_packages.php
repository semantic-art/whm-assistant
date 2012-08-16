<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Packages
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	Bradley Robert Martin
 *
 * @since		15/08/12
 */

class m_packages extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'packages';
	
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
		'server_id'=>array(
			'type'=>'INT',
			'constraint'=>10
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
		'resource_name'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
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
			)
	);
	
	var $required_fields = array();
	
}

/* End of file m_packages.php */