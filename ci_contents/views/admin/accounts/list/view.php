<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Accounts'
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
					<div class="page-header" style="margin-bottom:0px;">
						<h1>Accounts</h1>
					</div><!-- end:div.page-header -->
					<?$this->load->view('admin/accounts/list/partials/toolbar');?>
					<div class="row">
						<div class="span12">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="20">&nbsp;</th>
										<th colspan="2">Client</th>
										<th width="100" style="text-align:center;">Services</th>
										<th width="100" style="text-align:center;">Status</th>
										<th width="175" style="text-align:center;">Options</th>
									</tr>
								</thead>
								<tbody>
									<?if($this->data->accounts){?>
										<?foreach($this->data->accounts as $account){?>
											<tr>
												<td style="vertical-align:middle; text-align:center;">
													<?$this->load->view('admin/accounts/list/partials/icon',$account);?>
												</td>
												<td style="vertical-align:middle;">
													<?$this->load->view('admin/accounts/list/partials/company',$account);?>
												</td>
												<td style="vertical-align:middle;" width="150">
													<?$this->load->view('admin/accounts/list/partials/client',$account);?>
												</td>
												<td style="vertical-align:middle;">
													<?$this->load->view('admin/accounts/list/partials/services',$account);?>
												</td>
												<td style="vertical-align:middle;">
													<?$this->load->view('admin/accounts/list/partials/status',$account);?>
												</td>
												<td style="vertical-align:middle;">
													<?$this->load->view('admin/accounts/list/partials/options',$account);?>
												</td>
											</tr>
										<?}?>
									<?}else{?>
										<?if($this->data->total_accounts){?>
											<tr>
												<td colspan="6" style="text-align:center; padding:50px;">
													No accounts found...
												</td>
											</tr>
										<?}else{?>
											<tr>
												<td colspan="6" style="text-align:center; padding:50px;">
													You have not added any accounts yet. <a href="<?=base_url();?>admin/accounts/create">Click here</a> to add a new account.
												</td>
											</tr>
										<?}?>
									<?}?>
								</tbody>
							</table>
							<?=$this->pagination->create_links();?>
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