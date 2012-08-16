<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Accounts
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class Accounts extends private_controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * List accounts
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Index()
	{
		/*
			List all accounts
		*/
		$this->load->model('m_accounts');
		$this->load->model('m_contacts');
		$this->load->model('m_domains');
		$this->load->model('m_hosting');
		$this->data->total_accounts = $this->m_accounts->tally();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/accounts/?';
		$config['per_page'] = 20; 
		if($this->input->get('f')){
			if($this->data->total_accounts<1){
				redirect(base_url().'admin/accounts');
			}
			$config['base_url'] = base_url().'admin/accounts/?f='.$this->input->get('f');
			$config['total_rows'] = $this->m_accounts->tally(array('status'=>$this->input->get('f')));
		}else{
			$config['total_rows'] = $this->m_accounts->tally();
		}
		$this->pagination->initialize($config); 
		if($this->input->get('f')){
			$this->data->accounts = $this->m_accounts->get(array('sort_by'=>'business_name','limit'=>$config['per_page'],'offset'=>$this->input->get('p'),'status'=>$this->input->get('f')));
		}else{
			$this->data->accounts = $this->m_accounts->get(array('sort_by'=>'business_name','limit'=>$config['per_page'],'offset'=>$this->input->get('p')));
		}
		$count=0;
		if($this->data->accounts){
			foreach($this->data->accounts as $account){
				$contact = $this->m_contacts->get(array('account_id'=>$account->id,'primary'=>TRUE,'limit'=>1));
				$this->data->accounts[$count]->domains = $this->m_domains->tally(array('account_id'=>$account->id,'status'=>'registered'));
				$this->data->accounts[$count]->hosting = $this->m_hosting->tally(array('account_id'=>$account->id,'status'=>'active'));
				if($contact){
					$this->data->accounts[$count]->contact = $contact[0];
				}else{
					$this->data->accounts[$count]->contact = FALSE;
				}
				$count++;
			}
		}
	
		$this->load->view('admin/accounts/list/view');
	}	

	/**
	 * Create account
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Create()
	{
		/*
			Controller contains logic for creating a new account.
		*/
		$this->load->library('form_validation');
		$this->form_validation->set_rules('str_business_name','Business name','required');
		$this->form_validation->set_rules('str_website','Website','required');
		$this->form_validation->set_rules('str_first_name','First Name','required');
		$this->form_validation->set_rules('str_last_name','Last Name','required');
		$this->form_validation->set_rules('str_email','Email','required|valid_email');
		$this->form_validation->set_rules('str_password','Password','required|min_length[8]|max_length[20]');
		$this->form_validation->set_rules('num_mobile','Mobile','numeric');
		$this->form_validation->set_rules('num_office','Office','numeric');
		$this->form_validation->set_rules('num_home','Home','numeric');
		$this->form_validation->set_rules('num_fbid','Facebook ID','numeric');
		if($this->form_validation->run()){
			$this->load->model('m_accounts');
			
			$data = array(
				'classification'=>$this->input->post('opt_account_type'),
				'status'=>$this->input->post('opt_status'),
				'overdue_charges'=>$this->input->post('opt_overdue_charges'),
				'tax_exempt'=>$this->input->post('opt_tax_exempt'),
				'website'=>$this->input->post('str_website'),
				'business_name'=>$this->input->post('str_business_name')
			);
			$i=$this->m_accounts->add($data);
			if($i!==FALSE){
				$this->load->model('m_contacts');
				$data = array(
					'account_id'=>$i,
					'primary'=>'true',
					'status'=>'active',
					'first_name'=>$this->input->post('str_first_name'),
					'last_name'=>$this->input->post('str_last_name'),
					'email'=>$this->input->post('str_email'),
					'password'=>$this->input->post('str_password'),
					'facebook_id'=>$this->input->post('num_fbid'),
					'phone'=>serialize(array(
							'mobile'=>$this->input->post('num_mobile'),
							'office'=>$this->input->post('num_office'),
							'home'=>$this->input->post('num_home')
							))
				);
				$this->m_contacts->add($data);
				redirect(base_url().'admin/accounts/'.$i);
			}
		}
		
	
		$this->load->view('admin/accounts/utilities/create/view');
	}
	
	/**
	 * Merge accounts
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Merge()
	{
		/*
			Controller contains logic for merging two accounts together.
		*/
		
		show_404();
		
		$this->load->model('m_accounts');
		$this->data->accounts = $this->m_accounts->get();
	
		$this->load->view('admin/accounts/utilities/merge/view');
	}
	
	/**
	 * Delete
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Delete($id=FALSE)
	{
		/*
			Delete account
		*/
		if(!$id){
			show_404();
		}
		
		if($this->input->post('btn_delete')){
			redirect(base_url().'admin/accounts');
		}
	
		$this->load->view('admin/accounts/utilities/delete/view');
	}
	
	/**
	 * Overview
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Account($id=FALSE)
	{
		/*
			Account overview
		*/
		redirect('admin/accounts/'.$id.'/invoices');
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		if(!$this->data->account){
			show_404();
		}
		
	
		$this->load->view('admin/accounts/overview/view');
	}
	
	/**
	 * Edit
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Edit($id=FALSE)
	{
		/*
			Edit
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
	
		$this->load->view('admin/accounts/edit/view');
	}
	
}

/* End of file accounts.php */