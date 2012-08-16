<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Modules'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body class="fabric-light">
		<div class="container">
			<div class="row">
				<div class="span8 offset2">
					<form class="form-horizontal" method="post">
						<div class="modal" style="position: relative; top: auto; left: auto; margin: 0 auto; margin-top:80px; z-index: 1; max-width: 100%;">
							<div class="modal-header" style="text-align:right;">
								<img src="<?=$this->assets->url('logo-105x25px-png32.png','admin');?>" />
							</div>
							<div class="modal-body" style="overflow:hidden; max-height:none;">
							
								<?$this->load->view('admin/installation/common/wizard',array('wizard_modules'=>TRUE));?>
								<hr/>					
								<h6>Modules</h6>
								<small>
									Please select the modules you wish to use. All other modules will be turned off.
								</small>
									
									<hr/>
									<div class="clearfix">
										<div style="width:50%; float:left;">
											<div class="well well-small clearfix" style="margin-right:5px;">
												<div style="width:35%; float:left;">
													<?
													$field = array(
														'name'=>'chk_invoices',
														'id'=>'chk_invoices',
														'value'=>'enabled',
														'checked'=>TRUE,
														'disabled'=>TRUE,
														'data-label-on'=>'ON',
														'data-label-off'=>'OFF',
														'class'=>'switch switch-success'
														);
													echo form_checkbox($field);
													?>
												</div>
												<div style="width:65%; float:left;">
													<span style="display:inline-block; margin-top:2px; line-height:14px; margin-left:10px;">
														<strong>Invoicing</strong><br/>
														<small style="font-size:10px;">Create &amp; manage invoices</small>
													</span>
												</div>
											</div>					
										</div>
										<div style="width:50%; float:left;">
											<div class="well well-small clearfix" style="margin-right:5px;">
												<div style="width:35%; float:left;">
													<?
													$field = array(
														'name'=>'chk_projects',
														'id'=>'chk_projects',
														'value'=>'enabled',
														'checked'=>FALSE,
														'disabled'=>TRUE,
														'data-label-on'=>'ON',
														'data-label-off'=>'OFF',
														'class'=>'switch switch-success'
														);
													echo form_checkbox($field);
													?>	
												</div>
												<div style="width:65%; float:left;">
													<span style="display:inline-block; margin-top:2px; line-height:14px; margin-left:10px;">
														<strong>Projects</strong><br/>
														<small style="font-size:10px;">Project management features</small>
													</span>
												</div>
											</div>							
										</div>
										<div style="width:50%; float:left;">
											<div class="well well-small clearfix" style="margin-right:5px;">
												<div style="width:35%; float:left;">
													<?
													$field = array(
														'name'=>'chk_hosting',
														'id'=>'chk_hosting',
														'value'=>'enabled',
														'checked'=>FALSE,
														'disabled'=>TRUE,
														'data-label-on'=>'ON',
														'data-label-off'=>'OFF',
														'class'=>'switch switch-success'
														);
													echo form_checkbox($field);
													?>		
												</div>
												<div style="width:65%; float:left;">
													<span style="display:inline-block; margin-top:2px; line-height:14px; margin-left:10px;">
														<strong>Hosting</strong><br/>
														<small style="font-size:10px;">Manage hosting accounts</small>
													</span>
												</div>
											</div>								
										</div>
										<div style="width:50%; float:left;">
											<div class="well well-small clearfix" style="margin-right:5px;">
												<div style="width:35%; float:left;">
													<?
													$field = array(
														'name'=>'chk_domains',
														'id'=>'chk_domains',
														'value'=>'enabled',
														'checked'=>FALSE,
														'disabled'=>TRUE,
														'data-label-on'=>'ON',
														'data-label-off'=>'OFF',
														'class'=>'switch switch-success'
														);
													echo form_checkbox($field);
													?>		
												</div>
												<div style="width:65%; float:left;">
													<span style="display:inline-block; margin-top:2px; line-height:14px; margin-left:10px;">
														<strong>Domains</strong><br/>
														<small style="font-size:10px;">Manage domain names</small>
													</span>
												</div>
											</div>						
										</div>
										<div style="width:50%; float:left;">
											<div class="well well-small clearfix" style="margin-right:5px;">
												<div style="width:35%; float:left;">
													<?
													$field = array(
														'name'=>'chk_support',
														'id'=>'chk_support',
														'value'=>'enabled',
														'checked'=>FALSE,
														'disabled'=>TRUE,
														'data-label-on'=>'ON',
														'data-label-off'=>'OFF',
														'class'=>'switch switch-success'
														);
													echo form_checkbox($field);
													?>		
												</div>
												<div style="width:65%; float:left;">
													<span style="display:inline-block; margin-top:2px; line-height:14px; margin-left:10px;">
														<strong>Support</strong><br/>
														<small style="font-size:10px;">Manage support tickets</small>
													</span>
												</div>
											</div>						
										</div>
										<div style="width:50%; float:left;">
											<div class="well well-small clearfix" style="margin-right:5px;">
												<div style="width:35%; float:left;">
													<?
													$field = array(
														'name'=>'chk_correspondence',
														'id'=>'chk_correspondence',
														'value'=>'enabled',
														'checked'=>FALSE,
														'disabled'=>TRUE,
														'data-label-on'=>'ON',
														'data-label-off'=>'OFF',
														'class'=>'switch switch-success'
														);
													echo form_checkbox($field);
													?>		
												</div>
												<div style="width:65%; float:left;">
													<span style="display:inline-block; margin-top:2px; line-height:14px; margin-left:10px;">
														<strong>Correspondence</strong><br/>
														<small style="font-size:10px;">Manage company email's</small>
													</span>
												</div>
											</div>						
										</div>
									</div>
							</div><!-- End:div.modal-body -->
							<div class="modal-footer">
								<a href="<?=base_url();?>admin/installation/database" class="btn">Back</a>
								<input type="submit" name="submitBTN" class="btn btn-primary" value="Next"/>
							</div>
						</div><!-- End:div.modal -->
					</form>
				</div><!-- End:div.span8 -->
			</div><!-- End:div.row -->	
			<p class="lead modal-disclaimer animated fadeInUp">whm-assistant &copy; 2012.</p>
		</div>
		<?$this->load->view('admin/common/javascript');?>
	</body>
</html>