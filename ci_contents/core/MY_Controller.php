<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class private_controller extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user')){
			redirect(base_url().'admin');
		}else{
			$this->load->model('m_users');
			$this->user = $this->m_users->get(array('id'=>$this->session->userdata('user')));
			$this->user->smtp = unserialize($this->user->smtp);
			$this->user->phone = unserialize($this->user->phone);
		}
		global $application_folder;
		if(!@file_exists($application_folder.'/config/settings.php')){
			redirect('admin/installation');
		}else{
			if(!isSet($this->settings['installed'])){
				redirect('admin/installation');
			}
		}
	}
}

class public_controller extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		global $application_folder;
		if(!@file_exists($application_folder.'/config/settings.php')){
			redirect('admin/installation');
		}else{
			if(!isSet($this->settings['installed'])){
				redirect('admin/installation');
			}
		}
	}
}

class installer_controller extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		global $application_folder;
		if(@file_exists($application_folder.'/config/settings.php')){
			if(isSet($this->settings['installed'])){
				redirect('admin');
			}
		}
	}
}

class MY_Controller extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		global $application_folder;
		if(@file_exists($application_folder.'/config/settings.php')){
			include_once($application_folder.'/config/settings.php');
			$this->settings = $app_settings;
			if(!is_array($this->settings)){
				show_error('Settings file is corupted.');
			}
		}
	}
}

/* End of file MY_Controller.php */
/* Location: ./ci_site/core/MY_Controller.php */