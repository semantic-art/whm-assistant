<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class m_users extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'users';
	
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
		'avatar'=>array(
			'type'=>'VARCHAR',
			'constraint'=>40
			),
		'email'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'password'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255
			),
		'first_name'=>array(
			'type'=>'VARCHAR',
			'constraint'=>50
			),
		'last_name'=>array(
			'type'=>'VARCHAR',
			'constraint'=>50
			),
		'phone'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			'default'=>'a:3:{s:4:"home";b:0;s:6:"mobile";b:0;s:6:"office";b:0;}'
			),
		'smtp'=>array(
			'type'=>'VARCHAR',
			'constraint'=>255,
			'default'=>'a:4:{s:4:"host";b:0;s:4:"port";b:0;s:8:"username";b:0;s:8:"password";b:0;}'
			)
	);
	
	var $required_fields = array();
	
	/**
	 * Authenticate
	 *
	 * @return	boolean
	 * @todo	none
	 **/
	public function authenticate($email,$password,$session=TRUE)
	{
		/*
			Authenticate user details if $session is set to true
			also log in the user.
		*/
		
		$q = $this->get(array(
			'email'=>$email,
			'password'=>md5($password),
			'status'=>'active',
			'limit'=>1
		));
		if($q){
			if($session){
				$this->session->set_userdata(array('user'=>$q[0]->id));
				log_message('info', 'The user "'.$q[0]->id.'" is now logged in.');
			}
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * Logoff
	 *
	 * @return	boolean
	 * @todo	none
	 **/
	public function logoff($destroy_session=TRUE)
	{
		/*
			Logoff the current user.
		*/
		
		$user = $this->session->userdata('user');
		$this->session->unset_userdata('user');
		if($destroy_session){
			$this->session->sess_destroy();
		}
		log_message('info', 'The user "'.$user.'" is now logged out.');
		return TRUE;
	}	

}

/* End of file m_users.php */