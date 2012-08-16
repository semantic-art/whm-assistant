<div class="row">
				<div class="span12">
					<div class="btn-toolbar well well-small">
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/create" class="btn btn-success">
								<i class="icon-plus icon-white"></i>
								Account
							</a>
						</div>
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/merge" class="btn<?if(!$this->data->total_accounts||$this->data->total_accounts<2){echo" disabled";}?>" disabled="disabled">
								<i class="icon-retweet"></i>
								Merge
							</a>
						</div>
						
						<div class="btn-group pull-right">
							<a href="<?=base_url();?>admin/accounts" class="btn<?if(!isSet($_GET['f'])){echo" active";}?>"<?if(!$this->data->total_accounts){echo" disabled";}?>>
									All
								</a>
								<a href="<?=base_url();?>admin/accounts/?f=active" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='active'){echo" active";}?>"<?if(!$this->data->total_accounts){echo" disabled";}?>>
									Active
								</a>
								<a href="<?=base_url();?>admin/accounts/?f=inactive" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='inactive'){echo" active";}?>"<?if(!$this->data->total_accounts){echo" disabled";}?>>
									Inactive
								</a>
								<a href="<?=base_url();?>admin/accounts/?f=suspended" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='suspended'){echo" active";}?>"<?if(!$this->data->total_accounts){echo" disabled";}?>>
									Suspended
								</a>
						</div>
						
						
						 
					</div>
					<hr/>
				</div>
			</div><!-- End:div.row -->