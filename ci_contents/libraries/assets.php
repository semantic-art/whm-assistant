<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Assets{
    
	/**
	 * Load asset
	 *
	 * @return	void
	 * @todo	none
	 **/
	function load($file,$level="public"){
		$type = strtolower(substr(strrchr($file, '.'), 1));
		if($type=='css'){
			return "<link type=\"text/css\" rel=\"stylesheet\" href=\"".base_url().'resources/'.$level.'/'.$type.'/'.$file."\"/>";
		}else if($type=='js'){
			return "<script type=\"text/javascript\" src=\"".base_url().'resources/'.$level.'/'.$type.'/'.$file."\"></script>";
		}
	}

	/**
	 * Url
	 *
	 * @return	void
	 * @todo	none
	 **/
	function url($file,$level="public"){
		$type = strtolower(substr(strrchr($file, '.'), 1));
		if($type=='jpg'||$type=='png'||$type=='jpeg'||$type=='gif'){
			return base_url().'resources/'.$level.'/img/'.$file;
		}else{
			return base_url().'resources/'.$level.'/'.$type.'/'.$file;
		}
	}
	
}

/* End of file assets.php */
/* Location: ./application/libraries/assets.php */