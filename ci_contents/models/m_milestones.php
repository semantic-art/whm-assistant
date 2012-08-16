<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Milestones
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	Bradley Robert Martin
 *
 * @since		12/08/12
 */

class m_milestones extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'milestones';
	
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
		'date_due'=>array(
			'type'=>'DATETIME'
			),
		'date_completed'=>array(
			'type'=>'DATETIME'
			),
		'project_id'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'title'=>array(
			'type'=>'VARCHAR',
			'constraint'=>150
			),
		'description'=>array(
			'type'=>'TEXT'
			),
		'status'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'open\',\'closed\'',
			'default'=>'open'
			),
		'closed_by'=>array(
			'type'=>'INT',
			'constraint'=>10
			)
	);
	
	var $required_fields = array();
	
}

/* End of file m_milestones.php */