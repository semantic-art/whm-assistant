<?if(strtotime($date_due)>time()){?>
<span style="float:left; width:50%; text-align:center;" rel="tooltip" data-placement="top" data-title="<?=date($this->lang->line('long_date_format'),strtotime($date_due));?>">
	<?=date($this->lang->line('short_date_format'),strtotime($date_due));?>
</span>
<?}else{?>
<span class="muted" style="float:left; width:50%; text-align:center;" rel="tooltip" data-placement="top" data-title="<?=date($this->lang->line('long_date_format'),strtotime($date_due));?>">
	<?=date($this->lang->line('short_date_format'),strtotime($date_due));?>
</span>
<?}?>
<?if(strtotime($date_due)>time()){?>
<span style="float:left; width:50%; text-align:center;" rel="tooltip" data-placement="top" data-title="<?=timespan(time(),strtotime($date_due),3);?>">
	<?=timespan(time(),strtotime($date_due),1);?>
</span>
<?}else{?>
<span class="muted" style="float:left; width:50%; text-align:center;" rel="tooltip" data-placement="top" data-title="<?=timespan(strtotime($date_due),time(),3);?> ago">
	<?=timespan(strtotime($date_due),time(),1);?> ago
</span>
<?}?>