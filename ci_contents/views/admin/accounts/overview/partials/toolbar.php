<div class="row">
	<div class="span12">
		<div class="btn-toolbar well well-small">
			<div class="btn-group">
				<a href="<?=base_url();?>admin/mail/compose/?AID=<?=$this->data->account->id;?>" class="btn">
					<i class="icon-envelope"></i>
					Email
				</a>
				<a href="http://<?=$this->data->account->website;?>/delete" class="btn">
					<i class="icon-globe"></i>
					Website
				</a>
			</div>
			<div class="btn-group">
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/suspend" class="btn">
					<i class="icon-pause"></i>
					Suspend all services
				</a>
			</div>
			<div class="btn-group">
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/suspend" class="btn">
					<i class="icon-user"></i>
					Login as client
				</a>
			</div>
			
			
			
			
			<div class="btn-group pull-right">
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/delete" class="btn btn-danger">
					Delete
				</a>
			</div>
			<div class="btn-group pull-right">
				<a href="<?=base_url();?>admin/accounts/merge" class="btn">
					<i class="icon-retweet"></i>
					Merge accounts
				</a>
			</div>
		</div>
		<hr/>
	</div>
</div><!-- End:div.row -->