<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Projects
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class Projects extends private_controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * List
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Index($id=FALSE)
	{
		/*
			List all projects
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
		$this->load->model('m_projects');
		$this->data->total_projects = $this->m_projects->tally(array('account_id'=>$id));
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/accounts/'.$id.'/projects/?';
		$config['per_page'] = 20; 
		if($this->input->get('f')){
			if($this->data->total_projects<1){
				redirect(base_url().'admin/accounts/'.$id.'/projects');
			}
			$config['base_url'] = base_url().'admin/accounts/'.$id.'/projects/?f='.$this->input->get('f');
			$config['total_rows'] = $this->m_projects->tally(array('account_id'=>$id,'status'=>$this->input->get('f')));
		}else{
			$config['total_rows'] = $this->m_projects->tally(array('account_id'=>$id));
		}
		$this->pagination->initialize($config); 
		if($this->input->get('f')){
			$this->data->projects = $this->m_projects->get(array('account_id'=>$id,'sort_by'=>'id','limit'=>$config['per_page'],'offset'=>$this->input->get('p'),'status'=>$this->input->get('f')));
		}else{
			$this->data->projects = $this->m_projects->get(array('account_id'=>$id,'sort_by'=>'id','limit'=>$config['per_page'],'offset'=>$this->input->get('p')));
		}
		
		
		$this->load->helper('date');
	
		$this->load->view('admin/accounts/projects/list/view');
	}
	
	/**
	 * Project
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Project($id=FALSE,$project_id=FALSE)
	{
		/*
			Project
		*/
		show_404();
		//redirect('admin/accounts/'.$id.'/projects/'.$project_id.'/milestones');
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_projects');
		$this->data->project = $this->m_projects->get(array('id'=>$project_id));
		if(!$this->data->account||!$this->data->project){
			show_404();
		}
		$this->load->view('admin/accounts/projects/overview/view');
	}
	
	/**
	 * Milestones
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Milestones($id=FALSE,$project_id=FALSE)
	{
		/*
			List all milestones
		*/
		show_404();
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_projects');
		$this->data->project = $this->m_projects->get(array('id'=>$project_id));
		if(!$this->data->account||!$this->data->project){
			show_404();
		}
		
		$this->load->model('m_milestones');
		$this->data->total_milestones = $this->m_milestones->tally(array('project_id'=>$project_id));
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/accounts/'.$id.'/projects/'.$project_id.'/milestones/?';
		$config['per_page'] = 20; 
		if($this->input->get('f')){
			if($this->data->total_milestones<1){
				redirect(base_url().'admin/accounts/'.$id.'/projects/'.$project_id.'/milestones');
			}
			$config['base_url'] = base_url().'admin/accounts/'.$id.'/projects/'.$project_id.'/milestones/?f='.$this->input->get('f');
			$config['total_rows'] = $this->m_milestones->tally(array('project_id'=>$id,'status'=>$this->input->get('f')));
		}else{
			$config['total_rows'] = $this->m_milestones->tally(array('project_id'=>$id));
		}
		$this->pagination->initialize($config); 
		if($this->input->get('f')){
			$this->data->milestones = $this->m_milestones->get(array('project_id'=>$id,'sort_by'=>'id','limit'=>$config['per_page'],'offset'=>$this->input->get('p'),'status'=>$this->input->get('f')));
		}else{
			$this->data->milestones = $this->m_milestones->get(array('project_id'=>$id,'sort_by'=>'id','limit'=>$config['per_page'],'offset'=>$this->input->get('p')));
		}

		    	
	
		$this->load->view('admin/accounts/projects/milestones/list/view');
	}
	
		

}

/* End of file projects.php */