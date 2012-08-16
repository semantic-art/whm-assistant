<div class="row">
	<div class="span12">
					<div class="btn-toolbar well well-small">
						<div class="btn-group">
							<a href="http://<?=$this->data->domain->domain;?>" class="btn btn-success">
								<i class="icon-globe icon-white"></i>
							</a>
						</div>
						
						
						
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/<?=$this->data->domain->id;?>/move" class="btn">
								<i class="icon-move"></i>
								Move
							</a>
						</div>
						<div class="btn-group">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/<?=$this->data->domain->id;?>/cancel" class="btn">
								Cancel
							</a>
						</div>
						
						<div class="btn-group pull-right">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/<?=$this->data->domain->id;?>/scan" class="btn">
								<i class="icon-tasks"></i>
								Scan
							</a>
						</div>
						
						<div class="btn-group pull-right">
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/<?=$this->data->domain->id;?>/transfer" class="btn"<?if($this->data->domain->status!='registered'||$this->data->domain->registrant->cmd_transfer=='false'){echo" disabled=\"disabled\"";}?>>
								<i class="icon-random"></i>
								Transfer
							</a>
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/<?=$this->data->domain->id;?>/renew" class="btn"<?if($this->data->domain->status!='registered'||$this->data->domain->registrant->cmd_renew=='false'){echo" disabled=\"disabled\"";}?>>
								<i class="icon-retweet"></i>
								Renew
							</a>
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/<?=$this->data->domain->id;?>/register" class="btn"<?if($this->data->domain->status=='registered'||$this->data->domain->registrant->cmd_register=='false'){echo" disabled=\"disabled\"";}?>>
								<i class="icon-share"></i>
								Register
							</a>
						</div>
						
						<div class="btn-group pull-right">
							<?if($this->data->domain->domain_locked=='false'){?>
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/<?=$this->data->domain->id;?>/lock" class="btn"<?if($this->data->domain->status=='registered'||$this->data->domain->registrant->cmd_lock=='false'||$this->data->domain->locking_available=='false'){echo" disabled=\"disabled\"";}?>>
								<i class="icon-lock"></i>
								Lock
							</a>
							<?}else{?>
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains/<?=$this->data->domain->id;?>/unlock" class="btn"<?if($this->data->domain->status=='registered'||$this->data->domain->registrant->cmd_lock=='false'||$this->data->domain->locking_available=='false'){echo" disabled=\"disabled\"";}?>>
								<i class="icon-lock"></i>
								Unlock
							</a>
							<?}?>
						</div>
						
					</div>
					<hr/>
				</div>
			</div><!-- End:div.row -->