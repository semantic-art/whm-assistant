<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Project '
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
					<div class="row" style="margin-bottom:20px; margin-top:10px;">
						<?$this->load->view('admin/accounts/projects/common/sidebar',array('milestones'=>TRUE));?>
						<div class="span9">
							<?$this->load->view('admin/accounts/projects/milestones/list/partials/toolbar');?>
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Title</th>
										<th width="100" style="text-align:center;">Status</th>
										<th width="175" style="text-align:center;">Options</th>
									</tr>
								</thead>
								<tbody>
									<?if($this->data->milestones){?>
										<?foreach($this->data->milestones as $milestone){?>
											<tr>
												<td style="vertical-align:middle;">
													<?=$milestone->title;?>
												</td>
												<td style="vertical-align:middle; text-align:center;">
													<?=$milestone->status;?>
												</td>
												<td style="vertical-align:middle;">
													<div class="btn-group pull-right">
														<a href="<?=base_url();?>admin/accounts/" class="btn">
															<i class="icon-time"></i>
														</a>
														<a href="<?=base_url();?>admin/accounts/" class="btn">
															<i class="icon-trash"></i>
														</a>
													</div>
												</td>
											</tr>
										<?}?>
									<?}else{?>
										<?if($this->data->total_milestones){?>
											<tr>
												<td colspan="3" style="text-align:center; padding:50px;">
													No milestones found...
												</td>
											</tr>
										<?}else{?>
											<tr>
												<td colspan="3" style="text-align:center; padding:50px;">
													You have not added any milestones yet. <a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/projects/<?=$this->data->project->id;?>/milestones/create">Click here</a> to add a new milestone.
												</td>
											</tr>
										<?}?>
									<?}?>
								</tbody>
							</table>
							<?=$this->pagination->create_links();?>				
						</div><!-- end:div.span9 -->
					</div><!-- end:div.row -->
				
					
					
					
				</div><!-- end:div.container -->
				<div class="push"></div>
			</div><!-- end:wrapper -->
			<?$this->load->view('admin/common/footer');?>
		</div><!-- end:div.wrap-->
		<?$this->load->view('admin/common/javascript');?>
	</body>
</html>