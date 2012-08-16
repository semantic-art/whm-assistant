<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Projects
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class m_projects extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'projects';
	
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
		'title'=>array(
			'type'=>'VARCHAR',
			'constraint'=>150
			),
		'status'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'complete\',\'incomplete\',\'pending\'',
			'default'=>'pending'
			)
	);
	
	var $required_fields = array();
	
}

/* End of file m_projects.php */