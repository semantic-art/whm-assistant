<?if($classification=='payment'){?>
	<div style="float:left; width:50%;">
		<strong>Payment: </strong><?=$payment_type;?>
	</div>
	<div style="float:left; width:50%;">
		<strong>Reference: </strong>&nbsp;
		<?if($payment_type=='card'){?>
			XXXX-XXXX-XXXX-<?=$payment_reference;?>
		<?}else{?>
			<?=$payment_reference;?>
		<?}?>
	</div>
<?}elseif($classification=='charge'){?>
	<?if($services_linked!=FALSE){?>
		<?$services_linked = unserialize($services_linked);?>
		<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/<?=$services_linked['type'];?>/<?=$services_linked['id'];?>" class="pull-right" rel="tooltip" data-placement="left" data-title="This is linked to a service or project">
			<i class="icon-share-alt"></i>
		</a>
	<?}?>
	<?=$description;?>
<?}?>