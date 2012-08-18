<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Initial
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class Initial extends public_Controller {

	public $uc_access = array("1989");
	
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Index
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Index()
	{
		global $application_folder;
		
		/* Kill access to models to prevent data injection */
		
		$site = new stdClass;
		$site->module = '';
		$site->uri = $this->uri->uri_string();
		$site->type = strtolower(substr(strrchr($site->uri,'.'),1));
		$site->location = $application_folder.'/views/public/'.$site->module;
		$site->view = 'public/'.$site->module.'/';
		
		if(in_array($site->type,array('png','jpg','jpeg','gif','css','js'))){
			/* 
				Request type is a static file.
			*/
			$this->output
				->set_content_type($site->type)
				->set_output(file_get_contents($site->location.$site->uri));
		}else{
			/* 
				Request type is a page.
			*/
			session_start();
			if($this->input->get('uc_session')){session_destroy();redirect(base_url());}
			if(file_exists($site->location.'index.html')&&!isSet($_SESSION['constur_login'])){
				/* Under construction */
				if($this->input->post('pin1')){
					/* Do session login */
					$pin = $this->input->post('pin1').$this->input->post('pin2').$this->input->post('pin3').$this->input->post('pin4');
					if(in_array($pin,$this->uc_access)){
						/* Login */
						$_SESSION['constur_login'] = "semanticart";
						redirect(base_url());
					}
				}
				$this->load->view('public/index.html');
			}else{
				if($site->uri==''){
					if(file_exists($site->location.'index.php')){
						$this->load->view($site->view.'index');
					}else{
						show_error('You must create a index.php file');
					}
				}else{
					if(file_exists($site->location.$site->uri.'.php')){
						$this->load->view($site->view.$site->uri);
					}else{
						if(file_exists($site->location.'404.php')){
							$this->load->view($site->view.'404');
						}else{
							if(file_exists($site->location.'404.html')){
								$this->load->view($site->view.'404.html');
							}else{
								show_404();
							}
						}
					}
				}
			}
		}
	}

}

/* End of file Initial.php */