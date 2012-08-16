<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Domains'
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
					<?$this->load->view('admin/accounts/common/tabs',array('domains'=>TRUE));?>
					<?$this->load->view('admin/accounts/domains/list/partials/toolbar');?>
					<div class="row">
						<div class="span12">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="20">&nbsp;</th>
										<th>Domain</th>
										<th width="160" style="text-align:center;">Expires</th>
										<th width="100" style="text-align:center;">Status</th>
										<th width="115" style="text-align:center;">Options</th>
									</tr>
								</thead>
								<tbody>
									<?if($this->data->domains){?>
										<?foreach($this->data->domains as $domain){?>
											<tr>
												<td style="vertical-align:middle; text-align:center;">
													<img src="http://www.google.com/s2/favicons?domain=<?=$domain->domain;?>" rel="tooltip" data-placement="right" data-title="http://<?=$domain->domain;?>"/>
												</td>
												<td style="vertical-align:middle;">
													<?=$domain->domain;?>
												</td>
												<td style="vertical-align:middle; text-align:center;">
													<?if(strtotime($domain->expires)>time()){?>
														<?=timespan(time(),strtotime($domain->expires),2);?>
													<?}else{?>
														<?=timespan(strtotime($domain->expires),time(),2);?> ago
													<?}?>
												</td>
												<td style="vertical-align:middle; text-align:center;">
													<?=$domain->status;?>
												</td>
												<td style="vertical-align:middle;">
													<div class="btn-group pull-right">
														<a href="<?=base_url();?>admin/accounts/<?=$domain->account_id;?>/domains/<?=$domain->id;?>" class="btn">Edit</a>
														<a href="http://<?=$domain->domain;?>" class="btn"><i class="icon-globe"></i></a>
													</div>
												</td>
											</tr>
										<?}?>
									<?}else{?>
										<?if($this->data->total_domains){?>
											<tr>
												<td colspan="6" style="text-align:center; padding:50px;">
													No domains found...
												</td>
											</tr>
										<?}else{?>
											<tr>
												<td colspan="6" style="text-align:center; padding:50px;">
													You have not added any domain names yet. <a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/create">Click here</a> to add a new domain.
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