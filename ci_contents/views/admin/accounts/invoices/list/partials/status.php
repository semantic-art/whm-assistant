<span style="display:block; margin-left:2px; text-align:center; line-height:20px;" class="label 
<?if($status=='paid'){?>
label-success
<?}else if($status=='overdue'){?>
label-important
<?}else if($status=='unpaid'){?>
label-info
<?}else if($status=='cancelled'){?>

<?}?>
"><?=$status;?></span>