<div class="row">
	<div class="span12">
					<div class="btn-toolbar well well-small">
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/projects/create" class="btn btn-success">
								<i class="icon-plus icon-white"></i>
								New project
							</a>
						</div>
						
						<div class="btn-group pull-right">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/projects" class="btn<?if(!isSet($_GET['f'])){echo" active";}?>"<?if(!$this->data->total_projects){echo" disabled";}?>>
									All
								</a>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/projects/?f=pending" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='pending'){echo" active";}?>"<?if(!$this->data->total_projects){echo" disabled";}?>>
									Pending
								</a>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/projects/?f=incomplete" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='incomplete'){echo" active";}?>"<?if(!$this->data->total_projects){echo" disabled";}?>>
									Incomplete
								</a>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/projects/?f=overdue" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='overdue'){echo" active";}?>"<?if(!$this->data->total_projects){echo" disabled";}?>>
									Overdue
								</a>
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/projects/?f=complete" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='complete'){echo" active";}?>"<?if(!$this->data->total_projects){echo" disabled";}?>>
									Complete
								</a>
						</div>
					</div>
					<hr/>
				</div>
			</div><!-- End:div.row -->