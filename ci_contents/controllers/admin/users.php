<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 * @since		05/14/12
 * 
 * @link		http://semanticart.com.au
 */

class Users extends Private_Controller {
	
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
		$this->load->model('m_users');
		$this->data->total_users = $this->m_users->tally();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/utilities/users/?';
		$config['per_page'] = 20; 
		if($this->input->get('f')){
			if($this->data->total_users<1){
				redirect(base_url().'admin/utilities/users');
			}
			$config['base_url'] = base_url().'admin/utilities/users/?f='.$this->input->get('f');
			$config['total_rows'] = $this->m_users->tally(array('status'=>$this->input->get('f')));
		}else{
			$config['total_rows'] = $this->m_users->tally();
		}
		$this->pagination->initialize($config); 
		if($this->input->get('f')){
			$this->data->users = $this->m_users->get(array('sort_by'=>'id','limit'=>$config['per_page'],'offset'=>$this->input->get('p'),'status'=>$this->input->get('f')));
		}else{
			$this->data->users = $this->m_users->get(array('sort_by'=>'id','limit'=>$config['per_page'],'offset'=>$this->input->get('p')));
		}
		
		$this->load->view('admin/utilities/users/list/view');
	}
	
	/**
	 * Add
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Add()
	{
		$this->load->model('m_users');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('str_first_name','Given name','required');
		$this->form_validation->set_rules('str_last_name','Surname','required');
		$this->form_validation->set_rules('str_email','Email','required|valid_email');
		$this->form_validation->set_rules('str_password','Password','required');
		if($this->form_validation->run()){
			$data = array(
				'first_name'=>$this->input->post('str_first_name'),
				'last_name'=>$this->input->post('str_last_name'),
				'phone'=>serialize(array(
					'mobile'=>$this->input->post('num_mobile'),
					'office'=>$this->input->post('num_office'),
					'home'=>''
				)),
				'email'=>$this->input->post('str_email'),
				'smtp'=>serialize(array(
					'host'=>$this->input->post('str_smtp_host'),
					'port'=>$this->input->post('str_smtp_port'),
					'username'=>$this->input->post('str_smtp_user'),
					'password'=>$this->input->post('str_smtp_pass')
				)),
				'avatar'=>$this->input->post('img_avatar'),
				'password'=>md5($this->input->post('str_password')),
				'status'=>$this->input->post('opt_status')
			);
			
			$insert_id = $this->m_users->add($data);
			if($insert_id!==FALSE){
				if($this->input->post('chk_send_welcome')){
					exit('show welcome email');
				}
				redirect(base_url().'admin/utilities/users/'.$insert_id);
			}else{
				show_error('record could not entered.');
			}
		}
		$this->load->view('admin/utilities/users/add/view');
	}
	
	/**
	 * Delete
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Delete($id)
	{
		/*
			Confirm deletion
		*/
		if($this->user->id==$id){
			show_404();
		}
		$this->load->model('m_users');
		$this->data->user = $this->m_users->get(array('id'=>$id));
		if(!$this->data->user){
			redirect(base_url().'admin/utilities/users/');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirmBTN','confirmBTN','required');
		if($this->form_validation->run()){
			$this->m_users->delete(array('id'=>$id));
			redirect(base_url().'admin/utilities/users');
		}
		$this->load->view('admin/utilities/users/delete/view');
	}
	
	
	/**
	 * Edit
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Edit($id)
	{
		$this->load->model('m_users');
		$this->load->library('form_validation');
		$this->data->user = $this->m_users->get(array('id'=>$id));
		if(!$this->data->user){
			redirect(base_url().'admin/utilities/users');
		}
		$this->data->user->phone = unserialize($this->data->user->phone);
		$this->data->user->smtp = unserialize($this->data->user->smtp);
		
		$this->form_validation->set_rules('str_first_name','Given name','required');
		$this->form_validation->set_rules('str_last_name','Surname','required');
		$this->form_validation->set_rules('str_email','Email','required|valid_email');
		if($this->form_validation->run()){
			$data = array(
				'id'=>$id,
				'first_name'=>$this->input->post('str_first_name'),
				'last_name'=>$this->input->post('str_last_name'),
				'phone'=>serialize(array(
					'mobile'=>$this->input->post('num_mobile'),
					'office'=>$this->input->post('num_office'),
					'home'=>''
				)),
				'email'=>$this->input->post('str_email'),
				'smtp'=>serialize(array(
					'host'=>$this->input->post('str_smtp_host'),
					'port'=>$this->input->post('str_smtp_port'),
					'username'=>$this->input->post('str_smtp_user'),
					'password'=>$this->input->post('str_smtp_pass')
				)),
				'avatar'=>$this->input->post('img_avatar')
			); 
			if($this->input->post('opt_status')){
				$data['status'] = $this->input->post('opt_status');
			}
			if($this->input->post('str_password')!=""){
				$data['password'] = md5($this->input->post('str_password'));
			}
			$this->m_users->update($data);
			redirect(base_url().'admin/utilities/users/'.$id);
		}
		$this->load->view('admin/utilities/users/edit/view');
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/admin/users.php */