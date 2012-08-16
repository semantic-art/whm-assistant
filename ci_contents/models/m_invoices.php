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

class m_invoices extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	var $primary_table = 'invoices';
	
	var $validate_field_existence = TRUE;
	
	var $key = 'id';
	
	var $fields = array(
		'id'=>array(
			'type'=>'INT',
			'constraint'=>10,
			'unsigned'=>TRUE,
			'auto_increment'=>TRUE
			),
		'date_created'=>array(
			'type'=>'DATETIME'
			),
		'date_modified'=>array(
			'type'=>'DATETIME'
			),
		'date_due'=>array(
			'type'=>'DATETIME'
			),
		'account_id'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'contact_id'=>array(
			'type'=>'INT',
			'constraint'=>10
			),
		'status'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'paid\',\'unpaid\',\'overdue\',\'cancelled\'',
			'default'=>'unpaid'
			),
		'overdue_charges'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'true\',\'false\'',
			'default'=>'true'
			),
		'classification'=>array(
			'type'=>'ENUM',
			'constraint'=>'\'manual\',\'automatic\'',
			'default'=>'automatic'
			),
	);
	
	var $required_fields = array();
	
	
	/**
	 * Invoice balance
	 *
	 * @return	object / boolean
	 * @todo	none
	 **/
	public function Balance($id=FALSE)
	{
		/*
			Will return the balance, payments & charges of an invoice.	
		*/
		$invoice = $this->get(array('id'=>$id));
		if(!$id||!$invoice){
			return FALSE;
		}
		$data_object = new stdClass;
		$data_object->charged = 0;
		$data_object->paid = 0;
		$data_object->credit = 0;
		$data_object->refunded = 0;
		$data_object->due = 0;
		$this->load->model('m_invoice_items');
		$items = $this->m_invoice_items->get(array('invoice_id'=>$id));
		if($items){
			foreach($items as $item){
				if($item->classification=='charge'){
					$data_object->charged = $data_object->charged + $item->amount;
				}
				if($item->classification=='payment'){
					$data_object->paid = $data_object->paid + $item->amount;
				}
				if($item->classification=='refund'){
					$data_object->refunded = $data_object->refunded + $item->amount;
				}
				if($item->classification=='credit'){
					$data_object->credit = $data_object->credit + $item->amount;
				}
			}
			$data_object->paid = $data_object->paid - $data_object->refunded;
			unset($data_object->refunded);
			$data_object->charged = $data_object->charged - $data_object->credit;
			unset($data_object->credit);
			$data_object->due = $data_object->charged - $data_object->paid;
		}
		return $data_object;
	}
	
	/**
	 * Linked services
	 *
	 * @return	object / boolean
	 * @todo	none
	 **/
	public function Linked($id=FALSE,$load_links=FALSE)
	{
		/*
			Gather a list of linked services on this invoice.	
		*/
		$invoice = $this->get(array('id'=>$id));
		if(!$id||!$invoice){
			return FALSE;
		}
		$this->load->model('m_invoice_items');
		$items = $this->m_invoice_items->get(array('invoice_id'=>$id));
		if(!$items){
			return FALSE;
		}
		$data_object = new stdClass;
		$data_object->projects = FALSE;
		$data_object->domains = FALSE;
		$data_object->hosting = FALSE;
		foreach($items as $item){
			if($item->services_linked!=FALSE){
				$link = unserialize($item->services_linked);
				if($link['type']=='projects'){
					if($load_links){
						$this->load->model('m_projects');
						$link['id'] = $this->m_projects->get(array('id'=>$link['id']));
					}
					if(is_array($data_object->projects)){
						$data_object->projects[] = $link['id'];
					}else{
						$data_object->projects = array();
						$data_object->projects[] = $link['id'];
					}
				}else if($link['type']=='domains'){
					if($load_links){
						$this->load->model('m_domains');
						$link['id'] = $this->m_domains->get(array('id'=>$link['id']));
					}
					if(is_array($data_object->domains)){
						$data_object->domains[] = $link['id'];
					}else{
						$data_object->domains = array();
						$data_object->domains[] = $link['id'];
					}
				}else if($link['type']=='hosting'){
					if($load_links){
						$this->load->model('m_hosting');
						$link['id'] = $this->m_hosting->get(array('id'=>$link['id']));
					}
					if(is_array($data_object->hosting)){
						$data_object->hosting[] = $link['id'];
					}else{
						$data_object->hosting = array();
						$data_object->hosting[] = $link['id'];
					}
				}
			}
		}
		return $data_object;
	}
	
	/**
	 * Update status
	 *
	 * @return	boolean
	 * @todo	none
	 **/
	public function Update_status($id=FALSE)
	{
		/*
			Update the status of an invoice based on its current state.	
		*/
		
		$invoice = $this->get(array('id'=>$id));
		if(!$id||!$invoice){
			return FALSE;
		}
		$balance = $this->m_invoices->balance($id);
		$data = array('id'=>$id);
		if($invoice->status!='cancelled'){
			if($balance->charged==0){
				$data['status'] = 'unpaid';
			}else{
				if($balance->due<=0){
					$data['status'] = 'paid';
				}else{
					if(strtotime($invoice->date_due)<time()){
						$data['status'] = 'overdue';
					}else{
						$data['status'] = 'unpaid';
					}
				}
			}
			$i=$this->m_invoices->update($data);
		}
		return TRUE;
	}
	
	/**
	 * Billed to
	 *
	 * @return	object / boolean
	 * @todo	none
	 **/
	public function Billed_to($id=FALSE)
	{
		/*
			Gather the contact details that the invoice is billed to.	
		*/
		$invoice = $this->get(array('id'=>$id));
		if(!$id||!$invoice){
			return FALSE;
		}
		$this->load->model('m_contacts');
		$contact = $this->m_contacts->get(array('id'=>$invoice->contact_id));
		$this->load->model('m_accounts');
		$account = $this->m_accounts->get(array('id'=>$invoice->account_id));
		if($contact){
			$contact->account = $account;
			$contact->account->address = unserialize($contact->account->address);
			return $contact;
		}
		return FALSE;
	}
	
	/**
	 * Generate
	 *
	 * @return	boolean
	 * @todo	none
	 **/
	public function Generate($id=FALSE)
	{
		/*
			Generate a PDf copy of the invoice and save to the cache.	
		*/
		$invoice = $this->get(array('id'=>$id));
		if(!$id||!$invoice){
			return FALSE;
		}
		$this->uncache_invoice($id);
		$this->load->driver('cache', array('adapter' => 'file'));
		$filename = 'invoice-'.$id.'.pdf';
		if (!$pdf_output=$this->cache->get($filename)){
			$this->load->model('m_invoice_items');
			$invoice->items = $this->m_invoice_items->get(array('invoice_id'=>$id));
			$invoice->balance = $this->balance($id);
			$invoice->billed_to = $this->billed_to($id);
	
			$this->load->library('pdf_processing');
			$this->pdf_processing->newpdf();
			$this->pdf_processing->set_html($this->load->view('admin/accounts/invoices/invoice/pdf.php',$invoice,TRUE));
			$this->pdf_processing->render();
			$pdf_output = $this->pdf_processing->output();
			$this->cache->save('invoices/invoice-'.$id.'.pdf',$pdf_output,31536000); // save for 1 year
		}
		return $pdf_output;
	}
	
	/**
	 * Remove invoice from cache
	 *
	 * @return	boolean
	 * @todo	none
	 **/
	public function Uncache_invoice($id=FALSE)
	{
		/*
			Clear the invoice cache	
		*/
		if(!$id){
			return FALSE;
		}
		$this->load->driver('cache', array('adapter' => 'file'));
		if (!$pdf_output=$this->cache->get('invoice-'.$id.'.pdf')){
			return TRUE;
		}
		if(!$this->cache->delete('invoice-'.$id.'.pdf')){
			return FALSE;
		}
		return TRUE;
		
	}

}

/* End of file m_invoices.php */