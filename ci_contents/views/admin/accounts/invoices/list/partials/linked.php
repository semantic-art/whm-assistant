<?if($hosting){?>
<table class="table table-bordered table-striped ">
  <thead>
    <tr>
      <th colspan="2">Hosting</th>
    </tr>
  </thead>
  <tbody>
	<?foreach($hosting as $hosting){?>
	<tr>
      <td width="50%">hol2202</td>
      <td>Platinum plan</td>
    </tr>
	<?}?>
	  </tbody>
</table>
<?}?>

<?if($domains){?>
<table class="table table-bordered table-striped ">
  <thead>
    <tr>
      <th>Domains</th>
    </tr>
  </thead>
  <tbody>
  <?foreach($domains as $domain){?>
    <tr>
      <td<?=$domain->name;?></td>
    </tr>
    <?}?>
  </tbody>
</table>
<?}?>

<?if($projects){?>
<table class="table table-bordered table-striped ">
  <thead>
    <tr>
      <th>Projects</th>
    </tr>
  </thead>
  <tbody>
  	<?foreach($projects as $project){?>
    <tr>
      <td><?=$project->name;?></td>
    </tr>
    <?}?>
  </tbody>
</table>
<?}?>