<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Correspondence
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	Bradley Robert Martin
 *
 * @since		8/08/12
 */

class m_correspondence extends  MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'correspondence';
	
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
		'contact_id'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'status'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'received\',\'sent\',\'failed\'',
			'default'=>'failed'
			),
		'message'=>array(
			'type'=>'TEXT'
			),
		'subject'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'recipients'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			'default'=>'a:3:{s:2:"to";b:0;s:2:"cc";b:0;s:3:"bcc";b:0;}'
			),
		'attachments'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			'default'=>'a:0:{}'
			)
	);
	
	var $required_fields = array();
	
}

/* End of file m_correspondence.php */