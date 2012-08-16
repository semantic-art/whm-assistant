<div class="row">
				<div class="span12">
					<div class="btn-toolbar well well-small">
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->invoice->account_id;?>/invoices/<?=$this->data->invoice->id;?>/payment" class="btn btn-info">
								<i class="icon-plus icon-white"></i>
								Add payment
							</a>
						</div>
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->invoice->account_id;?>/invoices/<?=$this->data->invoice->id;?>/charge" class="btn">
								<i class="icon-briefcase"></i>
								Add charge
							</a>
						</div>
						
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->invoice->account_id;?>/invoices/<?=$this->data->invoice->id;?>/preview" class="btn">
								<i class="icon-file"></i>  
								Preview
							</a>
						</div>
						
						<div class="btn-group pull-right">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->invoice->account_id;?>/invoices/<?=$this->data->invoice->id;?>/send" class="btn btn-success"<?if($this->data->invoice->status=='cancelled'){echo " disabled=\"disabled\"";}?>>Send</a>
						</div>
						
						<div class="btn-group pull-right">
							<?if($this->data->invoice->status=='cancelled'){?>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->invoice->account_id;?>/invoices/<?=$this->data->invoice->id;?>/delete" class="btn btn-danger" <?if($this->data->invoice->status!='cancelled'){echo" disabled=\"disabled\"";}?>><i class="icon-trash icon-white"></i> Delete</a>
							<?}else{?>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->invoice->account_id;?>/invoices/<?=$this->data->invoice->id;?>/cancel" class="btn">Cancel</a>
							<?}?>
						</div>
						
						
						 
					</div>
					<hr/>
</div>
			</div><!-- End:div.row -->