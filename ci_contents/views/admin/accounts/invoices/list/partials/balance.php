


<a href="#" class="label label-info" style="display:block; width:29%; margin-left:2px; float:left; text-align:center; line-height:20px;" rel="tooltip" data-placement="top" data-title="Invoice total">
<?=number_format($balance->charged,2);?>
</a>
<a href="#" class="label label-success" style="display:block; width:29%; margin-left:2px; float:left; text-align:center; line-height:20px;" rel="tooltip" data-placement="top" data-title="Total paid">
<?=number_format($balance->paid,2);?>
</a>
<a href="#" class="label label-important" style="display:block; width:29%; margin-left:2px; float:left; text-align:center; line-height:20px;" rel="tooltip" data-placement="top" data-title="Balance due">
<?=number_format($balance->due,2);?>
</a>
