<?if($contact){?>
	<a href="<?=base_url();?>admin/accounts/<?=$id;?>/contacts/<?=$contact->id;?>" data-trigger="hover" data-content="<?=htmlentities($this->load->view('admin/accounts/list/partials/client-details',$contact,TRUE));?>" rel="popover" data-placement="top" style="color:#000; border-bottom:1px dotted;">
		<?=$contact->first_name;?> <?=$contact->last_name;?>
	</a>
<?}?>


								
