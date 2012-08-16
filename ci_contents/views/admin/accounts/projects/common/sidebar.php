<div class="span3">
	<ul class="well well-small nav nav-list">
		<li class="nav-header">Management</li>
		<li class="divider"></li>
		<li<?if(isSet($overview)){echo" class=\"active\"";}?>>
			<a href="<?=base_url();?>admin/accounts/<?=$this->data->project->account_id;?>/projects/<?=$this->data->project->id;?>">
				Overview
			</a>
		</li>
		<li<?if(isSet($milestones)){echo" class=\"active\"";}?>>
			<a href="<?=base_url();?>admin/accounts/<?=$this->data->project->account_id;?>/projects/<?=$this->data->project->id;?>/milestones">
				Milestones
			</a>
		</li>
		<li<?if(isSet($documents)){echo" class=\"active\"";}?> class="disabled">
			<a href="<?=base_url();?>admin/accounts/<?=$this->data->project->account_id;?>/projects/<?=$this->data->project->id;?>/documents">
				Proposal's &amp; Terms
			</a>
		</li>
		<li class="nav-header">Production</li>
		<li class="divider"></li>
		<li<?if(isSet($resources)){echo" class=\"active\"";}?> class="disabled">
			<a href="<?=base_url();?>admin/accounts/<?=$this->data->project->account_id;?>/projects/<?=$this->data->project->id;?>/resources">Resources</a>
		</li>
		<li<?if(isSet($repository)){echo" class=\"active\"";}?> class="disabled">
			<a href="<?=base_url();?>admin/accounts/<?=$this->data->project->account_id;?>/projects/<?=$this->data->project->id;?>/repository">Repository</a>
		</li>
	</ul>
</div><!-- end:div.span3 -->