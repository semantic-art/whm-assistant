<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Installation
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class Installation extends installer_controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Welcome
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Index()
	{
		/*
			Welcome screen
		*/
		global $application_folder;
		$this->load->helper('file');
		if(!write_file($application_folder.'/config/settings.php','<?php $app_settings = unserialize(urldecode(str_replace(array("<CON","FIG>","</CON"),"","<CONFIG>a%3A0%3A%7B%7D</CONFIG>"))); ?>')){
			show_error('Unable to create settings.php. Unknown error.');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback__uti_authenticate');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[20]');
		if($this->form_validation->run()){
			redirect('admin/installation/terms');
		}
		$this->load->view('admin/installation/welcome/view');
	}
	
	public function _uti_authenticate($str)
	{
		$this->load->library('xmlrpc');
		$this->xmlrpc->server('http://semanticart.com.au/whm-assistant/api', 80);
		$this->xmlrpc->method('authorise');
		$request = array($this->input->post('email'),md5($this->input->post('password')));
		$this->xmlrpc->request($request);
		if($this->xmlrpc->send_request()){
			global $application_folder;
			$response = $this->xmlrpc->display_response();
			$this->load->helper('file');
			$config = read_file($application_folder.'/config/settings.php');
			$this->settings['account'] = $response;
			$replacement = '<CONFIG>'.urlencode(serialize($this->settings)).'</CONFIG>';
			$config = preg_replace('|<CONFIG>([^"]*)</CONFIG>|',$replacement,$config,1);
			if(!write_file($application_folder.'/config/settings.php',$config)){
				show_error('Unable to write to settings.php');
			}
			return TRUE;
		}
		$this->form_validation->set_message('_uti_loginUser','The login details for "'.$str.'" are incorrect. Authorisation has failed.');
		return FALSE;
	}
	
	/**
	 * Authorise
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Terms()
	{
		/*
			Welcome screen
		*/
	
		$this->load->view('admin/installation/terms/view');
	}
	
	/**
	 * Database
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Database()
	{
		/*
			Welcome screen
		*/
		global $application_folder;
		include_once($application_folder.'/config/database.php');
		$this->data->database = $db[$active_group];
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->form_validation->set_rules('str_database', 'Database', 'required|max_length[30]');
		$this->form_validation->set_rules('str_prefix', 'Table Prefix', 'max_length[5]');
		$this->form_validation->set_rules('str_username', 'Username', 'required|max_length[255]');
		$this->form_validation->set_rules('str_password', 'Password', 'required|max_length[255]');
		$this->form_validation->set_rules('str_host', 'MYSQL Host', 'required|max_length[200]');
		if($this->form_validation->run()){
			$dsn = 'mysqli://'.$this->input->post('str_username').':'.$this->input->post('str_password').'@'.$this->input->post('str_host');
			$this->load->database($dsn);
			$this->load->dbutil();
			if($this->dbutil->database_exists($this->input->post('str_database'))){
				$this->settings['db']['hostname'] = $this->input->post('str_host');
				$this->settings['db']['username'] = $this->input->post('str_username');
				$this->settings['db']['password'] = $this->input->post('str_password');
				$this->settings['db']['dbprefix'] = $this->input->post('str_prefix');
				$this->settings['db']['database'] = $this->input->post('str_database');
				$this->load->helper('file');
				$config = read_file($application_folder.'/config/settings.php');
				$replacement = '<CONFIG>'.urlencode(serialize($this->settings)).'</CONFIG>';
				$config = preg_replace('|<CONFIG>([^"]*)</CONFIG>|',$replacement,$config,1);
				if(!write_file($application_folder.'/config/settings.php',$config)){
					show_error('Unable to write to settings.php');
				}
				redirect('admin/installation/db_populate');
			} 
			$this->errors->database = TRUE;
		}
		$this->load->view('admin/installation/database/view');
	}
	
	/**
	 * Populate database
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function db_populate()
	{
		/*
			Populate the database with the needed tables.
		*/
		$this->load->dbforge();
		
		$models = array(
			'm_accounts',
			'm_contacts',
			'm_correspondence',
			'm_domains_tld',
			'm_domains',
			'm_hosting',
			'm_invoice_items',
			'm_invoices',
			'm_milestones',
			'm_packages',
			'm_projects',
			'm_registrants',
			'm_servers',
			'm_users'
		);
		foreach($models as $model){
			$this->load->model($model);
			$this->dbforge->add_field($this->$model->fields);
			$this->dbforge->add_key($this->$model->key,TRUE);
			$this->dbforge->create_table($this->$model->primary_table);
		}
		redirect('admin/installation/modules');
	}
	
	/**
	 * Modules
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Modules()
	{
		/*
			Select modules
		*/
		global $application_folder;
		$this->load->helper('form');
		if($this->input->post('submitBTN')){
			$this->load->helper('file');
			$config = read_file($application_folder.'/config/settings.php');
			if($this->input->post('chk_invoices')){
				$this->settings['modules']['invoices'] = TRUE;
			}else{
				$this->settings['modules']['invoices'] = FALSE;
			}
			if($this->input->post('chk_projects')){
				$this->settings['modules']['projects'] = TRUE;
			}else{
				$this->settings['modules']['projects'] = FALSE;
			}
			if($this->input->post('chk_hosting')){
				$this->settings['modules']['hosting'] = TRUE;
			}else{
				$this->settings['modules']['hosting'] = FALSE;
			}
			if($this->input->post('chk_domains')){
				$this->settings['modules']['domains'] = TRUE;
			}else{
				$this->settings['modules']['domains'] = FALSE;
			}
			if($this->input->post('chk_support')){
				$this->settings['modules']['support'] = TRUE;
			}else{
				$this->settings['modules']['support'] = FALSE;
			}
			if($this->input->post('chk_correspondence')){
				$this->settings['modules']['correspondence'] = TRUE;
			}else{
				$this->settings['modules']['correspondence'] = FALSE;
			}
			$replacement = '<CONFIG>'.urlencode(serialize($this->settings)).'</CONFIG>';
			$config = preg_replace('|<CONFIG>([^"]*)</CONFIG>|',$replacement,$config,1);
			if(write_file($application_folder.'/config/settings.php',$config)){
				redirect('admin/installation/admin');
			}
		}
		$this->load->view('admin/installation/modules/view');
	}
	
	/**
	 * Admin
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Admin()
	{
		/*
			Add administrator
		*/
		global $application_folder;
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('img_avatar', 'Avatar', 'max_length[40]');
		$this->form_validation->set_rules('str_first_name', 'First name', 'required|max_length[50]');
		$this->form_validation->set_rules('str_last_name', 'Last name', 'required|max_length[50]');
		$this->form_validation->set_rules('str_email', 'Email', 'required|max_length[255]|valid_email');
		$this->form_validation->set_rules('str_password', 'Password', 'required|max_length[255]|min_length[8]');
		if($this->form_validation->run()){
			$this->load->model('m_users');
			$data = array(
				'status'=>'active',
				'avatar'=>strtoupper($this->input->post('img_avatar')),
				'first_name'=>ucwords(strtolower($this->input->post('str_first_name'))),
				'last_name'=>ucwords(strtolower($this->input->post('str_last_name'))),
				'email'=>strtolower($this->input->post('str_email')),
				'password'=>md5($this->input->post('str_password'))
			);
			if($this->m_users->add($data)){
				$this->load->helper('file');
				$config = read_file($application_folder.'/config/settings.php');
				$this->settings['installed'] = TRUE;
				$replacement = '<CONFIG>'.urlencode(serialize($this->settings)).'</CONFIG>';
				$config = preg_replace('|<CONFIG>([^"]*)</CONFIG>|',$replacement,$config,1);
				if(write_file($application_folder.'/config/settings.php',$config)){
					redirect('admin');
				}
			}
			show_error('Unable to connect to database correctly, Unknown error.');
		}
		$this->load->view('admin/installation/admin/view');
	}
	

}

/* End of file installation.php */