<div class="well" style="text-align:center; padding-top:14px; padding-bottom:14px;">
	<h3 style="margin:0px; padding:0px; line-height:14px;">
	<?if(strtotime($this->data->invoice->due_date)>time()){?>
		<span style="font-size:15px;" rel="tooltip" data-placement="top" data-title="<?=timespan(time(),strtotime($this->data->invoice->due_date),3);?>">
		<?=timespan(time(),strtotime($this->data->invoice->due_date),1);?>
		</span>
		<br/>
		<span style="font-size:10px;"><?=date($this->lang->line('long_date_format'),strtotime($this->data->invoice->due_date));?></span>
	<?}else{?>
		<span class="muted" rel="tooltip" data-placement="top" data-title="<?=timespan(strtotime($this->data->invoice->due_date),time(),3);?> ago">
		<?=timespan(strtotime($this->data->invoice->due_date),time(),1);?> ago
		</span>
		<br/>
		<span class="muted" style="font-size:10px;"><?=date($this->lang->line('long_date_format'),strtotime($this->data->invoice->due_date));?></span>
	<?}?>
	</h3>
</div><!-- end:div.well -->