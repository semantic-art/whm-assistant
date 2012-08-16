<div class="row">
	<div class="span12">
					<div class="btn-toolbar well well-small">
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/create" class="btn btn-success">
								<i class="icon-plus icon-white"></i>
								Domain
							</a>
						</div>
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/report" class="btn"<?if(!$this->data->total_domains){echo" disabled";}?>>
								<i class="icon-file"></i>
								Propagation report
							</a>
						</div>
						
						<div class="btn-group pull-right">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains" class="btn<?if(!isSet($_GET['f'])){echo" active";}?>"<?if(!$this->data->total_domains){echo" disabled";}?>>
									All
								</a>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/?f=registered" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='registered'){echo" active";}?>"<?if(!$this->data->total_domains){echo" disabled";}?>>
									Registered
								</a>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/?f=expired" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='expired'){echo" active";}?>"<?if(!$this->data->total_domains){echo" disabled";}?>>
									Expired
								</a>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/?f=pending" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='pending'){echo" active";}?>"<?if(!$this->data->total_domains){echo" disabled";}?>>
									Pending
								</a>
						</div>
					</div>
					<hr/>
				</div>
			</div><!-- End:div.row -->