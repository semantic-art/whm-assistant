<div class="row">
	<div class="span12">
					<div class="btn-toolbar well well-small">
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/create" class="btn btn-success">
								<i class="icon-plus icon-white"></i>
								Invoice
							</a>
						</div>
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/statement" class="btn"<?if(!$this->data->total_invoices){echo" disabled";}?>>
								<i class="icon-file"></i>
								Account statement
							</a>
						</div>
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/merge" class="btn<?if(!$this->data->total_invoices||$this->data->total_invoices<2){echo" disabled";}?>">
								<i class="icon-retweet"></i>
								Merge invoices
							</a>
						</div>
						
						<div class="btn-group pull-right">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices" class="btn<?if(!isSet($_GET['f'])){echo" active";}?>"<?if(!$this->data->total_invoices){echo" disabled";}?>>
									All
								</a>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/?f=paid" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='paid'){echo" active";}?>"<?if(!$this->data->total_invoices){echo" disabled";}?>>
									Paid
								</a>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/?f=unpaid" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='unpaid'){echo" active";}?>"<?if(!$this->data->total_invoices){echo" disabled";}?>>
									Unpaid
								</a>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/?f=overdue" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='overdue'){echo" active";}?>"<?if(!$this->data->total_invoices){echo" disabled";}?>>
									Overdue
								</a>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/?f=cancelled" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='cancelled'){echo" active";}?>"<?if(!$this->data->total_invoices){echo" disabled";}?>>
									Cancelled
								</a>
						</div>
					</div>
					<hr/>
				</div>
			</div><!-- End:div.row -->