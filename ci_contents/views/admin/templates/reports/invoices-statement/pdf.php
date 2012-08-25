<!DOCTYPE html>
<html lang="en">
	<head>
		<?=$this->assets->load('bootstrap.css','framework');?>
	</head>
	<body>
		<div style="font-size:20px;"><strong>Account statement</strong></div><br/>
		<p>This statement is still under construction. It will list all the invoices associated with this account and the balances and payments made.</p>
		<table class="table table-bordered table-striped ">
			<thead>
				<tr>
					<th>Type</th>
					<th>ID</th>
					<th>Due</th>
				</tr>
			</thead>
			<tbody>
				<?if($this->data->invoices){?>
					<?foreach($this->data->invoices as $invoice){?>
						<tr>
							<td>
								<?=$invoice->classification;?>
							</td>
							<td>
								<?=$invoice->id;?>
							</td>
							<td>
								<?=$invoice->date_due;?>
							</td>
						</tr>
					<?}?>
				<?}else{?>
					<tr>
						<td>No invoices</td>
					</tr>
				<?}?>
			</tbody>
		</table>
		
	</body>
</html>