<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ip_banning{
	
	/**
	 * Ban a user by IP address
	 *
	 * @return	void
	 * @todo	none
	 **/
	function __construct(){
		$CI =& get_instance();
		if(in_array($CI->input->ip_address(),$CI->config->item('blocked_users'))){
			show_error('Your computer id has been blocked for security violations.',404,'Permission denied');
		}
	}
}

/* End of file ip_banning.php */
/* Location: ./application/libraries/ip_banning.php */