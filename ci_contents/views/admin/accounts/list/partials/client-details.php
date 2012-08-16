
<div class="clearfix">
	
	<div class="well well-small" style="float:right; margin:0px;">
			<img src="http://graph.facebook.com/<?=$facebook_id;?>/picture" width="50px" height="50px"/>
		</div>
		<h3 class="lead" style="margin-bottom:0px;"><strong><?=$first_name;?></strong> <?=$last_name;?></h3>
		<p class="lead" style="font-size:11px; margin:0px; margin-bottom:10px; line-height:14px;"><?=$business_name;?></p>

		<p style="padding-bottom:5px;">
			<strong style="display:block; float:left; padding-right:5px; width:50px;">
				<?$phone=unserialize($phone);?>
				<?if($phone['mobile']){?>
					Mobile:</strong> <?=$phone['mobile'];?>
				<?}else if($phone['office']){?>
					Office:</strong> <?=$phone['mobile'];?>
				<?}else if($phone['home']){?>
					Home:</strong> <?=$phone['mobile'];?>
				<?}?>
		</p>
</div>



