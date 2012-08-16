<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Settings
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	Bradley Robert Martin
 *
 * @since		15/08/12
 */

class m_settings extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'settings';
	
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
			)
	);
	
	var $required_fields = array();
	
}

/* End of file m_settings.php */