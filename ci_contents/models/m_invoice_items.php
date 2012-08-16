<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Invoice Items
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class m_invoice_items extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'invoice_items';
	
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
		'invoice_id'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'order_id'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'services_linked'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'classification'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'charge\',\'payment\'',
			'default'=>'charge'
			),
		'description'=>array(
			'type'=>'TEXT'
			),
		'amount'=>array(
			'type'=>'DECIMAL',
			'constraint'=>'10,0',
			'default'=>'0.00'
			),
		'payment_type'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'bank\',\'cheque\',\'card\',\'cash\',\'paypal\''
			),
		'payment_reference'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			)
	);
	
	var $required_fields = array();

}

/* End of file m_invoice_items.php */