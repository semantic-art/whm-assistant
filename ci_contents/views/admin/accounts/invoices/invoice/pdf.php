<!DOCTYPE html>
<html>
	<head>
		<title><?=$this->settings['company']['name'];?> - invoice [<?=$id;?>]</title>
		<?=$this->assets->load('pdf.css','framework');?>
	</head>
	<body>
	
      	<table id="pdf-document">
			<tr class="document-heading">
				<th class="company">Example company</th>
				<th class="label">Tax Invoice</th>
			</tr>
			<tr class="document-information">
				<th class="billing_information" colspan="2">
					<div>
						
						<span class="col">
							<strong>Billed To:</strong>
							<p><?=$billed_to->first_name;?> <?=$billed_to->last_name;?></p>
							<p><?=$billed_to->account->business_name;?></p>
						</span>
						<span class="col">
							<strong>Address:</strong>
							<p><?=$billed_to->account->address['street'];?></p>
							<p><?=$billed_to->account->address['city'];?>, <?=$billed_to->account->address['state'];?>, <?=$billed_to->account->address['country'];?>, <?=$billed_to->account->address['postcode']?></p>
						</span>
						<span class="col">
							<strong>Invoice:</strong>
							<p>ID: #<?=$id;?></p>
							<p>Due: <?=date('m/d/Y',strtotime($date_due));?></p>
						</span>
					</div>
				</th>
			</tr>
      		<tr>
	      		<td colspan="2" height="460px" valign="top">
		     		<table id="invoice-items">
						<tr>
							<th align="left">Description</th>
							<th width="120px">Amount</th>
						</tr>
						<?if($items){?>
							<?foreach($items as $item){?>
								<tr>
									<td class="align-left">
										<?if($item->classification=='charge'){?>
											<?=$item->description;?>
										<?}else if($item->classification=='payment'){?>
											<div style="display:inline-block; width:50%;">
												<strong>Payment: </strong><?=$item->payment_type;?>
											</div>
											<div style="display:inline-block; width:50%;">
												<strong>Reference: </strong><?=$item->payment_reference;?>
											</div>
										<?}?>
									</td>
									<td>
										<?if($item->classification=='charge'){?>
											<?=number_format($item->amount,2);?>
										<?}else if($item->classification=='payment'){?>
											<span style="color:green;"><?=number_format($item->amount,2);?></span>
										<?}?>
									</td>
								</tr>
							<?}?>
						<?}?>
					</table>
	      		</td>
      		</tr>
      		<tr class="totals">
	      		<td colspan="2">
	      			<table>
						<tr>
							<th id="tax-included">Included tax: <strong>0.00</strong></th>
							<th width="70px"><div>balance: <strong><?=number_format($balance->due,2);?></strong></div></th>
						</tr>
					</table>
	      		</td>
      		</tr>
      		<tr>
	      		<td colspan="2">
	      			<table style="margin-top:30px;">
						<tr>
							<td style="padding-right:10px;">
								<strong>Checks & Money Orders</strong> 
								Please make cheques & money orders payable to example company.
								<br/>
								<br/>
							</td>
							<td style="padding-left:10px;">
								<strong>Bank Transfers</strong>
								Bank: Example bank, BSB: 000000, Account Number: 00000000
								<br/>
								<br/>
							</td>
						</tr>
						<tr>
							<td style="padding-right:10px;">
								<strong>Paypal</strong> 
								To make paypal payments please goto <a href="#"><?=base_url();?></a>
								<br/>
								<br/>
							</td>
							<td style="padding-left:10px;">
								<strong>Credit Cards</strong>
								To make credit card payments please goto <a href="#"><?=base_url();?></a>
								<br/>
								<br/>
							</td>
						</tr>
						<tr>
							<td style="padding-right:10px;">
								<strong>Due Date</strong> 
								Total due within 15 days after the due date. Overdue accounts subject to a 20% overdue
								fee per month that the account remains overdue.
							</td>
							<td style="padding-left:10px;">
								<strong>Questions</strong>
								If you have any questions about your bill, please feel free to contact us at your convenience, We will reply as soon as possible.
							</td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<th colspan="2" align="center">Thank you for choosing example company</th>
						</tr>
						<tr>
							<td>ABN: 00 000 000 00</td>
							<td align="right">www.example.com</td>
						</tr>
					</table>
	      		</td>
      		</tr>			
		</table>
	</body>
</html>