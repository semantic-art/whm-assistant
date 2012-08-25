<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Invoices
 *
 * @package		whm-assistant
 * @author		Brad Martin
 * @copyright 	semantic-art
 *
 * @link		http://semanticart.com.au
 */

class Invoices extends private_controller {
	
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
			List
		*/
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		if(!$this->data->account){
			show_404();
		}
		$this->load->model('m_invoices');
		$this->data->total_invoices = $this->m_invoices->tally(array('account_id'=>$id));
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/accounts/'.$id.'/invoices/?';
		$config['per_page'] = 20; 
		if($this->input->get('f')){
			if($this->data->total_invoices<1){
				redirect(base_url().'admin/accounts/'.$id.'/invoices');
			}
			$config['base_url'] = base_url().'admin/accounts/'.$id.'/invoices/?f='.$this->input->get('f');
			$config['total_rows'] = $this->m_invoices->tally(array('account_id'=>$id,'status'=>$this->input->get('f')));
		}else{
			$config['total_rows'] = $this->m_invoices->tally(array('account_id'=>$id));
		}
		$this->pagination->initialize($config); 
		if($this->input->get('f')){
			$this->data->invoices = $this->m_invoices->get(array('account_id'=>$id,'sort_by'=>'id','limit'=>$config['per_page'],'offset'=>$this->input->get('p'),'status'=>$this->input->get('f')));
		}else{
			$this->data->invoices = $this->m_invoices->get(array('account_id'=>$id,'sort_by'=>'id','limit'=>$config['per_page'],'offset'=>$this->input->get('p')));
		}
		if($this->data->invoices){
			$this->load->model('m_invoice_items');
			$count=0;
			foreach($this->data->invoices as $invoice){
				$this->data->invoices[$count]->balance = $this->m_invoices->balance($invoice->id);
				$this->data->invoices[$count]->services_linked = $this->m_invoices->linked($invoice->id,TRUE);
				$count++;
			}
		}
		
		$this->load->helper('date');
		$this->load->view('admin/accounts/invoices/list/view');
	}
	
	/**
	 * Create
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Create($id=FALSE)
	{
		/*
			Create invoice
		*/
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_contacts');
		$this->data->contacts = $this->m_contacts->get(array('account_id'=>$id));
		if(!$this->data->account){
			show_404();
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('str_id','Invoice id','is_unique[invoices.id]');
		$this->form_validation->set_rules('str_created','Date created','required');
		$this->form_validation->set_rules('str_due_date','Date due','required');
		if($this->form_validation->run()){
			$this->load->model('m_invoices');
			$data = array(
				'account_id'=>$id,
				'status'=>$this->input->post('opt_status'),
				'classification'=>$this->input->post('opt_kind'),
				'overdue_charges'=>$this->input->post('opt_charges'),
				'date_due'=>date($this->config->item('log_date_format'),strtotime($this->input->post('str_due_date'))),
				'date_created'=>date($this->config->item('log_date_format'),strtotime($this->input->post('str_created'))),
				'contact_id'=>$this->input->post('opt_bill_to')
			);
			if($this->input->post('str_id')){
				$data['id'] = $this->input->post('str_id');
			}
			$i=$this->m_invoices->add($data);
			if($i){
			redirect(base_url().'admin/accounts/'.$id.'/invoices/'.$i);
			}else{
				show_error('Unknown error creating a new invoice.');
			}
		}
		$this->load->view('admin/accounts/invoices/utilities/create/view');
	}
	
	/**
	 * Invoice
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Invoice($id=FALSE,$invoice_id=FALSE)
	{
		/*
			Invoice
		*/
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_invoices');
		$this->data->invoice = $this->m_invoices->get(array('id'=>$invoice_id));
		if(!$this->data->account||!$this->data->invoice){
			show_404();
		}
		
		$this->load->model('m_invoice_items');
		$this->data->invoice->items = $this->m_invoice_items->get(array('invoice_id'=>$invoice_id));
		$this->data->invoice->balance = $this->m_invoices->balance($invoice_id);
		$this->data->invoice->services_linked = $this->m_invoices->linked($invoice_id,TRUE);
		$this->load->helper('date');
		$this->load->view('admin/accounts/invoices/edit/view');
	}
	
	
	/**
	 * Invoice options
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Options()
	{
		/*
			Invoice options
		*/
	
		$this->load->view('admin/accounts/invoices/options/view');
	}
	
	/**
	 * Add a charge
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Charge($id=FALSE,$invoice_id=FALSE)
	{
		/*
			Add a charge
		*/
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_invoices');
		$this->data->invoice = $this->m_invoices->get(array('id'=>$invoice_id));
		if(!$this->data->account||!$this->data->invoice){
			show_404();
		}
		
		$this->load->model('m_domains');
		$this->data->domains = $this->m_domains->get(array('account_id'=>$id));
		$this->load->model('m_hosting');
		$this->data->hosting = $this->m_hosting->get(array('account_id'=>$id));
		$this->load->model('m_projects');
		$this->data->projects = $this->m_projects->get(array('account_id'=>$id));
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('str_date_created','Date created','required');
		$this->form_validation->set_rules('str_amount','Amount','required|numeric');
		$this->form_validation->set_rules('txt_description','Description','required');
		if($this->form_validation->run()){
			$this->load->model('m_invoice_items');
			$data = array(
				'invoice_id'=>$invoice_id,
				'classification'=>'charge',
				'amount'=>$this->input->post('str_amount'),
				'date_created'=>date($this->config->item('log_date_format'),strtotime($this->input->post('str_date_created'))),
				'description'=>$this->input->post('txt_description'),
				'services_linked'=>'0'
			);
			if($this->input->post('str_id')){
				$data['id'] = $this->input->post('str_id');
			}
			if($this->input->post('opt_linked')!='0'){
				$link = substr($this->input->post('opt_linked'),0,1);
				$link_id = str_replace($link,'',$this->input->post('opt_linked'));
				if($link=="D"){
					$linked = array('type'=>'domains','id'=>$link_id);
				}else if($link=="H"){
					$linked = array('type'=>'hosting','id'=>$link_id);
				}else if($link=="P"){
					$linked = array('type'=>'projects','id'=>$link_id);
				}else{
					$linked = 0;
				}
				if($linked==0){
					$data['services_linked'] = 0;
				}else{
					$data['services_linked'] = serialize($linked);
				}
			}
			$i=$this->m_invoice_items->add($data);
			if($i){
				$this->m_invoices->update_status($invoice_id);
				$this->m_invoices->Uncache_invoice($invoice_id);
				redirect(base_url().'admin/accounts/'.$id.'/invoices/'.$invoice_id);
			}else{
				show_error('Unknown error creating a new charge.');
			}
		}

		$this->load->view('admin/accounts/invoices/utilities/charge/view');
	}
	
	/**
	 * Remove item
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Remove($id=FALSE,$invoice_id=FALSE,$item_id=FALSE)
	{
		/*
			Remove item
		*/
		
		if(!$id||!$invoice_id||!$item_id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_invoices');
		$this->data->invoice = $this->m_invoices->get(array('id'=>$invoice_id));
		$this->load->model('m_invoice_items');
		$this->data->item = $this->m_invoice_items->get(array('id'=>$item_id));
		if(!$this->data->account||!$this->data->invoice||!$this->data->item){
			show_404();
		}
		$this->m_invoice_items->delete(array('id'=>$item_id));
		
		$this->m_invoices->update_status($invoice_id);
		$this->m_invoices->Uncache_invoice($invoice_id);
		redirect(base_url().'admin/accounts/'.$id.'/invoices/'.$invoice_id);
		
	}
	
	/**
	 * Add a payment
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Payment($id=FALSE,$invoice_id=FALSE)
	{
		/*
			Add a payment
		*/
		if(!$id||!$invoice_id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_invoices');
		$this->data->invoice = $this->m_invoices->get(array('id'=>$invoice_id));
		$this->data->invoice->balance = $this->m_invoices->balance($invoice_id);
		if(!$this->data->account||!$this->data->invoice){
			show_404();
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('str_date','Date created','required');
		$this->form_validation->set_rules('num_amount','Amount','required|numeric');
		$this->form_validation->set_rules('str_method','Payment method','required');
		if($this->form_validation->run()){
			$this->load->model('m_invoice_items');
			$data = array(
				'invoice_id'=>$invoice_id,
				'classification'=>'payment',
				'amount'=>$this->input->post('num_amount'),
				'date_created'=>date($this->config->item('log_date_format'),strtotime($this->input->post('str_date'))),
				'payment_type'=>$this->input->post('str_method')
			);
			
			if($this->input->post('str_method')=='bank'){
				$data['payment_reference'] = $this->input->post('num_ref');
			}else if($this->input->post('str_method')=='card'){
				$data['payment_reference'] = $this->input->post('num_card');
			}else if($this->input->post('str_method')=='paypal'){
				$data['payment_reference'] = $this->input->post('num_paypalref');
			}else if($this->input->post('str_method')=='cheuqe'){
				$data['payment_reference'] = $this->input->post('num_chequeno');
			}
			
			$i=$this->m_invoice_items->add($data);
			$this->m_invoices->update_status($invoice_id);
			$this->m_invoices->Uncache_invoice($invoice_id);
			redirect(base_url().'admin/accounts/'.$id.'/invoices/'.$invoice_id);
		}
		$this->load->view('admin/accounts/invoices/utilities/payment/view');
	}

	/**
	 * Invoice preview
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Preview($id=FALSE)
	{
		/*
			Get a pdf copy of the invoice
		*/
		if(!$id){
			show_404();
		}
		$this->load->model('m_invoices');
		$pdf = $this->m_invoices->generate($id);
		if($pdf){
			$this->output
			->set_content_type('pdf')
			->set_output($pdf);
		}else{
			show_404();
		}
	}
	
	/**
	 * Statement
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Statement($id=FALSE)
	{
		/*
			PDF statement of due invoices.
		*/
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		if(!$this->data->account){
			show_404();
		}
		$this->load->model('m_invoices');
		$this->data->invoices = $this->m_invoices->get(array('account_id'=>$id));
		
		
		$this->load->library('pdf_processing');
		$this->pdf_processing->newpdf();
		$this->pdf_processing->set_html($this->load->view('admin/templates/reports/invoices-statement/pdf.php','',TRUE));
		$this->pdf_processing->render();
		$this->output
		->set_content_type('pdf')
		->set_output($this->pdf_processing->output());
	}
	
	/**
	 * Cancel
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Cancel($id=FALSE,$invoice_id=FALSE)
	{
		/*
			Cancel invoice
		*/
		
		if(!$id||!$invoice_id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_invoices');
		$this->data->invoice = $this->m_invoices->get(array('id'=>$invoice_id));
		if(!$this->data->account||!$this->data->invoice){
			show_404();
		}
		if($this->data->invoice->status=='cancelled'){
			show_404();
		}
		
		if($this->input->post('confirm_cancel')){
			$this->m_invoices->update(array('id'=>$invoice_id,'status'=>'cancelled'));
			redirect(base_url().'admin/accounts/'.$id.'/invoices/'.$invoice_id);
		}
		$this->load->view('admin/accounts/invoices/utilities/cancel/view');
	}
	
	/**
	 * Delete
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Delete($id=FALSE,$invoice_id=FALSE)
	{
		/*
			Delete invoice
		*/
		
		if(!$id||!$invoice_id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_invoices');
		$this->data->invoice = $this->m_invoices->get(array('id'=>$invoice_id));
		if(!$this->data->account||!$this->data->invoice){
			show_404();
		}
		if($this->data->invoice->status!='cancelled'){
			show_404();
		}
		if($this->input->post('confirm_delete')){
		
			$this->load->model('m_invoice_items');
			$this->m_invoice_items->delete_all(array('invoice_id'=>$invoice_id));
			
			$this->m_invoices->delete(array('id'=>$invoice_id));
			redirect(base_url().'admin/accounts/'.$id.'/invoices');
		}
		$this->load->view('admin/accounts/invoices/utilities/delete/view');
	}
	
	/**
	 * Send
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Send($id=FALSE,$invoice_id=FALSE)
	{
		/*
			Send invoice
		*/
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_invoices');
		$this->data->invoice = $this->m_invoices->get(array('id'=>$invoice_id));
		$this->load->model('m_contacts');
		$this->data->contacts = $this->m_contacts->get(array('account_id'=>$id));
		if(!$this->data->account){
			show_404();
		}
		global $application_folder;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt_email','Email','required');
		if($this->form_validation->run()){
			
			$this->m_invoices->generate($invoice_id);
			$file = 'INV'.md5($invoice_id);
			
			$this->load->model('m_contacts');
			$contact = $this->m_contacts->get(array('id'=>$this->input->post('opt_sendto')));
			
			$this->load->library('email');
			$config['protocol'] = 'smtp';
			$config['mailtype'] = 'html';
			$config['smtp_host'] = $this->user->smtp['host'];
			$config['smtp_user'] = $this->user->smtp['username'];
			$config['smtp_pass'] = $this->user->smtp['password'];
			$config['smtp_port'] = $this->user->smtp['port'];
			$this->email->initialize($config);
			$this->email->from($this->user->email,$this->user->first_name.' '.$this->user->last_name);
			if($contact){
				$this->email->to($contact->email);
			}else{
				$this->email->to($this->input->post('opt_sendto'));
			}
			$this->email->subject($this->input->post('str_subject'));
			$this->email->message($this->input->post('txt_email'));
			$this->email->attach($application_folder.'/cache/invoice-'.$invoice_id.'.pdf');
			$this->load->model('m_correspondence');
			$data = array(
				'contact_id'=>$this->input->post('opt_sendto'),
				'subject'=>$this->input->post('str_subject'),
				'message'=>$this->input->post('txt_email'),
				'status'=>'sent'
			);
			if(!$this->email->send()){
				$data['status'] = 'failed';
				$i=$this->m_correspondence->add($data);
				show_error('Your mail settings are incorrect.');
			}
			$i=$this->m_correspondence->add($data);
			redirect(base_url().'admin/accounts/'.$id.'/invoices/'.$invoice_id);
		}
		$this->load->helper('file');
		$this->load->helper('number');
		$this->data->invoice->size = get_file_info($application_folder.'/cache/invoice-'.$invoice_id.'.pdf','size');
		$this->data->invoice->size = byte_format($this->data->invoice->size['size']);
		
		$this->load->model('m_users');
		$this->data->users = $this->m_users->get(array('status'=>'active'));
		
		$this->load->library('parser');
		$data = array(
            'date' =>date('m/d/Y',strtotime($this->data->invoice->date_due)),
            'invoice_id' =>$invoice_id
           );
		$this->data->email_template = $this->parser->parse('admin/templates/email/send-invoice',$data,TRUE);
		$this->load->view('admin/accounts/invoices/utilities/send/view');
	}
	
	/**
	 * Merge
	 *
	 * @access	public
	 * @return	void
	 * @todo	none
	 **/
	public function Merge($id=FALSE)
	{
		/*
			Merge two invoices.
		*/
		if(!$id){
			show_404();
		}
		$this->load->model('m_accounts');
		$this->data->account = $this->m_accounts->get(array('id'=>$id));
		$this->load->model('m_invoices');
		$this->data->invoices = $this->m_invoices->get(array('account_id'=>$id));
		if(!$this->data->invoices||count($this->data->invoices)<2){
			show_404();
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('opt_from','From','required');
		$this->form_validation->set_rules('opt_to','To','required');
		if($this->form_validation->run()){
			$this->load->model('m_invoice_items');
			$items = $this->m_invoice_items->get(array('invoice_id'=>$this->input->post('opt_from')));
			if($items){
				foreach($items as $item){
					$this->m_invoice_items->update(array('id'=>$item->id,'invoice_id'=>$this->input->post('opt_to')));
				}
			}
			$this->m_invoices->delete(array('id'=>$this->input->post('opt_from')));
			redirect(base_url().'admin/accounts/'.$id.'/invoices/'.$this->input->post('opt_to'));
		}
		$this->load->view('admin/accounts/invoices/utilities/merge/view');
	}
}

/* End of file invoices.php */