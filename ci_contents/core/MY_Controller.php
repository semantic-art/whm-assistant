<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class private_controller extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user')){
			redirect(base_url().'admin');
		}else{
			$this->user->id = '1';
		}
	}
}

class public_controller extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		if(!isSet($this->settings['installation'])){
			redirect('admin/installation');
		}
	}
}

class installer_controller extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		if(isSet($this->settings['installation'])){
			redirect('admin');
		}
	}
}

class MY_Controller extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		global $constant_settings;
		$this->settings = $constant_settings;
	}
}

/* End of file MY_Controller.php */
/* Location: ./ci_site/core/MY_Controller.php */