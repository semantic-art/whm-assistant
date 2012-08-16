<span style="display:block; margin-left:2px; text-align:center; line-height:20px;" class="label 
<?if($status=='active'){?>
label-success
<?}else if($status=='suspended'){?>
label-important
<?}else if($status=='pending'){?>
label-info
<?}else if($status=='inactive'){?>

<?}?>
"><?=$status;?></span>