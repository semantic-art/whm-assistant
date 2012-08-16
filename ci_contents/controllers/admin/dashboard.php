<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dashboard
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class Dashboard extends private_controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Dashboard
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Index()
	{
		/*
			
		*/
		redirect('admin/accounts');
	
		$this->load->view('admin/dashboard/view');
	}

}

/* End of file dashboard.php */