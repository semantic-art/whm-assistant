<?if($services_linked){?>
	<?if($services_linked->projects||$services_linked->domains||$services_linked->hosting){?>
	<span title="Linked" data-content="<?=htmlentities($this->load->view('admin/accounts/invoices/list/partials/linked',$services_linked,TRUE));?>" rel="popover" data-placement="right" style="border-bottom:1px dotted;">
		<?=$id;?>
	</span>
	<?}else{?>
		<?=$id;?>
	<?}?>
<?}else{?>
	<?=$id;?>
<?}?>