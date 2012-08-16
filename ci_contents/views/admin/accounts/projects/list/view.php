<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Projects'
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
					<?$this->load->view('admin/accounts/common/tabs',array('projects'=>TRUE));?>
					<?$this->load->view('admin/accounts/projects/list/partials/toolbar');?>
					<div class="row">
						<div class="span12">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Project</th>
										<th width="100" style="text-align:center;">Due</th>
										<th width="100" style="text-align:center;">Status</th>
										<th width="115" style="text-align:center;">Options</th>
									</tr>
								</thead>
								<tbody>
									<?if($this->data->projects){?>
										<?foreach($this->data->projects as $project){?>
											<tr>
												<td style="vertical-align:middle;">
													<?=$project->name;?>
												</td>
												<td style="vertical-align:middle;">
													
												</td>
												<td style="vertical-align:middle;">
													<?=$project->status;?>
												</td>
												<td style="vertical-align:middle;">
													<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/projects/<?=$project->id;?>" class="btn">
														Open
													</a>
												</td>
											</tr>
										<?}?>
									<?}else{?>
										<?if($this->data->total_projects){?>
											<tr>
												<td colspan="6" style="text-align:center; padding:50px;">
													No projects found...
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