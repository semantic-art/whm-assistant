<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class Initial extends public_controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Logon
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Index()
	{
		/*
			Controller provides functionality for 
			authenticating a user.
		*/
	
		if($this->session->userdata('user')){
			redirect(base_url().'admin/dashboard');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback__uti_authenticate');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[20]');
		if($this->form_validation->run()){
			$this->input->set_cookie('whmAssistantLoginName',$this->input->post('email'),time()+360000);
			redirect(base_url().'admin/dashboard');
		}
		$this->load->view('admin/login/view');
	}
	
	/**
	 * Signout
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Signout()
	{
		/*
			Controller initiates a user logoff.
		*/
	
		$this->load->model('m_users');	
		if($this->m_users->logoff()){
			redirect(base_url().'admin');
		}
		show_error('Unable to logoff user.');
	}
	
	/**
	 * Utility -> Authenticate user
	 *
	 * @access	private
	 * @return	boolean
	 * @todo	none
	 **/
	public function _uti_authenticate($str)
	{
		/*
			This utility loads the user model to
			authenticate a user.
		*/
	
		$this->load->model('m_users');	
		if($this->m_users->authenticate($this->input->post('email'),$this->input->post('password'))){
			return TRUE;
		}
		$this->form_validation->set_message('_uti_loginUser','The login details for "'.$str.'" are incorrect. Login has failed.');
		return FALSE;
	}

}


/* End of file initial.php */