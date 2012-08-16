<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Domain'
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
					<?$this->load->view('admin/accounts/domains/edit/partials/toolbar');?>
					
					
					<div class="row">
						<div class="well span12" style="padding:0px; margin-left:20px;">
							<div class="row">
								<div class="span3" style="height:60px;">
									<div style="margin-left:20px; margin-top:8px; border-right:1px solid #666;">
										<div>Registrant:</div>
										<h4 style="margin:0px;"><?=$this->data->domain->registrant->name;?></h4>
									</div>
								</div><!-- end:div.span2 -->
								<div class="span3">
									<div style="margin-left:10px; margin-top:8px; border-right:1px solid #666;">
										<div>Registration period:</div>
										<h4 style="margin:0px;"><?=$this->data->domain->charge_period;?></h4>
									</div>
								</div><!-- end:div.span2 -->
								<div class="span3">
									<div style="margin-left:10px; margin-top:8px; border-right:1px solid #666;">
										<div>Expires:</div>
										<h4 style="margin:0px;"><?=date('m-d-Y',strtotime($this->data->domain->expires));?></h4>
									</div>
								</div><!-- end:div.span2 -->
								<div class="span3">
									<div style="margin-left:10px; margin-top:8px;">
										<div>Cost:</div>
										<h4 style="margin:0px;"><?=$this->data->domain->cost;?></h4>
									</div>
								</div><!-- end:div.span1 -->
							</div><!-- end:div.row -->
						</div><!-- end:div.span9 -->
					</div><!-- end:div.row -->
					
					
					
					<div class="row">
						<div class="span12">
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