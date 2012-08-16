<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class pdf_processing {
	
	public function __construct(){
		$this->CI =& get_instance();
		
		
	}
	public function newpdf(){
		global $application_folder;
		require_once($application_folder."/third_party/pdf_processing/dompdf_config.inc.php");
		
	    spl_autoload_register('DOMPDF_autoload');
	
	    $this->dompdf = new DOMPDF();
	  
	
	}
	public function set_password($user,$master){
		$this->dompdf->get_canvas()->get_cpdf()->setEncryption($user,$master,array('print'));
	}
	public function set_html($html){
		$this->dompdf->load_html($html);
	}
	public function render(){
		ini_set('memory_limit','16M');
		$this->dompdf->render();	
	}
	public function stream($filename){
		$this->dompdf->stream($filename.".pdf");
	}
	public function save($filename){
        $this->CI->load->helper('file');
        write_file($filename.".pdf", $this->dompdf->output());
	}
	public function output(){
		return $this->dompdf->output();
	}
	function create($html, $filename, $stream=TRUE,$path='') 
	{
		$this->newpdf();
	    $this->set_html($html);
		$this->render();
		$this->set_password('hathor','bradley.r.martin');
	    if ($stream) {
	        $this->stream($filename);
	    } else {
	        $this->save('reservations/'.$filename);
	    }
	}
	
}



/* End of file global_parameter.php */
/* Location: ./application/libraries/global_parameter.php */