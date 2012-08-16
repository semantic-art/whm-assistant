<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Invoices'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body>
		<div class="wrap">
			<div class="wrapper">
				<div class="container" style="padding-top:20px;">
					<?$this->load->view('admin/common/navigation',array('accounts'=>TRUE));?>
				</div>
				<div class="container">
					<?$this->load->view('admin/accounts/common/name');?>
					<?$this->load->view('admin/accounts/common/tabs',array('invoices'=>TRUE));?>
					<?$this->load->view('admin/accounts/invoices/list/partials/toolbar');?>
					<div class="row">
						<div class="span12">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="20">&nbsp;</th>
										<th>ID</th>
										<th width="260" style="text-align:center;">Due</th>
										<th width="230" style="text-align:center;">Balance</th>
										<th width="100" style="text-align:center;">Status</th>
										<th width="115" style="text-align:center;">Options</th>
									</tr>
								</thead>
								<tbody>
									<?if($this->data->invoices){?>
										<?foreach($this->data->invoices as $invoice){?>
											<tr>
												<td style="vertical-align:middle; text-align:center;">
													<?$this->load->view('admin/accounts/invoices/list/partials/icon',$invoice);?>
												</td>
												<td style="vertical-align:middle;">
													<?$this->load->view('admin/accounts/invoices/list/partials/id',$invoice);?>
												</td>
												<td style="vertical-align:middle;">
													<?$this->load->view('admin/accounts/invoices/list/partials/due',$invoice);?>
												</td>
												<td style="vertical-align:middle;">
													<?$this->load->view('admin/accounts/invoices/list/partials/balance',$invoice);?>
												</td>
												<td style="vertical-align:middle;">
													<?$this->load->view('admin/accounts/invoices/list/partials/status',$invoice);?>
												</td>
												<td style="vertical-align:middle;">
													<?$this->load->view('admin/accounts/invoices/list/partials/options',$invoice);?>
												</td>
											</tr>
										<?}?>
									<?}else{?>
										<?if($this->data->total_invoices){?>
											<tr>
												<td colspan="6" style="text-align:center; padding:50px;">
													No invoices found...
												</td>
											</tr>
										<?}else{?>
											<tr>
												<td colspan="6" style="text-align:center; padding:50px;">
													You have not added any invoices yet. <a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/create">Click here</a> to add a new invoice.
												</td>
											</tr>
										<?}?>
									<?}?>
								</tbody>
							</table>
						</div>
					</div><!-- End:div.row -->
				</div>
				<div class="push"></div>
			</div><!-- end:wrapper -->
			<?$this->load->view('admin/common/footer');?>
		</div><!-- end:div.wrap-->
		<?$this->load->view('admin/common/javascript');?>
	</body>
</html>