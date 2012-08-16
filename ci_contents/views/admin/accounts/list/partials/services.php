<a href="<?=base_url();?>admin/accounts/<?=$id;?>/domains" class="label <?if($domains>0){echo" label-info";}?>" style="display:block; width:40%; margin-left:2px; float:left; text-align:center; line-height:20px;" rel="tooltip" data-placement="top" data-title="Domain names">
	<?=$domains;?>
</a>
<a href="<?=base_url();?>admins/accounts/<?=$id;?>/hosting" class="label <?if($hosting>0){echo" label-inverse";}?>" style="display:block; width:40%; margin-left:2px; float:left; text-align:center; line-height:20px;" rel="tooltip" data-placement="top" data-title="Hosting accounts">
	<?=$hosting;?>
</a>