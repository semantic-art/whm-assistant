<div class="btn-group pull-right">
	<a href="<?=base_url();?>admin/accounts/<?=$id;?>" class="btn">Open account</a>
	<a href="<?=base_url();?>admin/mail/compose/?AID=<?=$id;?>" class="btn" rel="tooltip" data-placement="top" data-title="Email client" disabled="disabled">
		<i class="icon-envelope"></i>
	</a>
	<a href="http://<?=$website;?>" class="btn" rel="tooltip" data-placement="top" data-title="View website">
		<i class="icon-globe"></i>
	</a>
</div>