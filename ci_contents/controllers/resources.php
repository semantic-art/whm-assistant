<?php

class Resources extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Resources
	 *
	 * @return	void
	 * @todo	none
	 **/
    function index(){
		global $application_folder;
        $type = $this->uri->segment(2);
        $level = $this->uri->segment(3);
 		$file = $this->uri->segment(4);
		$type = strtolower(substr(strrchr($file, '.'), 1));
		$files_path = $application_folder.'/'.$this->uri->uri_string();

		if($this->uri->segment(2)=='facebook'){	
		
		
		$this->load->driver('cache', array('adapter' => 'file'));
		if (!$img=$this->cache->get('FB-PICTURE'.md5($this->uri->segment(3)))){
			$data = file_get_contents('https://graph.facebook.com/search?q='.$this->uri->segment(3).'&type=user&access_token=AAABmU2GUgzgBAGLzaXjYlVOSdMBZA3TtUUZBQ6eZBjHBekZBeeV1VT6qdEZAIb5UilaiKSZAiE8bH1jB85VvItwIuxJHuwcDvEcRw8yBOvWAZDZD');
			$data = json_decode($data);
			if(isSet($data->data[0]->id)){
				$img = file_get_contents('http://graph.facebook.com/'.$data->data[0]->id.'/picture');
			}else{
				$img = file_get_contents('http://placehold.it/50x50');
			}
			$this->cache->save('FB-PICTURE'.md5($this->uri->segment(3)),$img, 345600); // save for 4 days
		}
		$this->output->set_content_type('jpg')->set_output($img);
			
			
				    
				   
		}else{
			if(@file_exists($files_path)){
				$this->output
				    ->set_content_type($type)
				    ->set_output(file_get_contents($files_path));
			}else{
				show_404();
			}
		}
		
		
    }

}

/* End of file resources.php */
/* Location: ./application/controllers/resources.php */