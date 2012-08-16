<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Domains
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class Domains extends private_controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * List domains
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Index($id=FALSE)
	{
		/*
			List domains
		*/
		show_404();
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		if(!$this->data->account){
			show_404();
		}
		$this->load->model('m_domains');
		$this->data->total_domains = $this->m_domains->tally(array('account_id'=>$id));
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/accounts/'.$id.'/domains/?';
		$config['per_page'] = 20; 
		if($this->input->get('f')){
			if($this->data->total_domains<1){
				redirect(base_url().'admin/accounts/'.$id.'/domains');
			}
			$config['base_url'] = base_url().'admin/accounts/'.$id.'/domains/?f='.$this->input->get('f');
			$config['total_rows'] = $this->m_domains->tally(array('account_id'=>$id,'status'=>$this->input->get('f')));
		}else{
			$config['total_rows'] = $this->m_domains->tally(array('account_id'=>$id));
		}
		$this->pagination->initialize($config); 
		if($this->input->get('f')){
			$this->data->domains = $this->m_domains->get(array('account_id'=>$id,'sort_by'=>'id','limit'=>$config['per_page'],'offset'=>$this->input->get('p'),'status'=>$this->input->get('f')));
		}else{
			$this->data->domains = $this->m_domains->get(array('account_id'=>$id,'sort_by'=>'id','limit'=>$config['per_page'],'offset'=>$this->input->get('p')));
		}
		
		$this->load->helper('date');
		$this->load->view('admin/accounts/domains/list/view');
	}
	
	/**
	 * Domain
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Domain($id=FALSE,$domain_id=FALSE)
	{
		/*
			Domain
		*/
		show_404();
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_domains');
		$this->data->domain = $this->m_domains->get(array('id'=>$domain_id));
		if(!$this->data->account||!$this->data->domain){
			show_404();
		}
		$this->data->domain->registrant = $this->m_domains->registrant($this->data->domain->registrant);

		$this->load->view('admin/accounts/domains/edit/view');
	}

}

/* End of file domains.php */