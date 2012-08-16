<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Database'
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
							
								<?$this->load->view('admin/installation/common/wizard',array('wizard_database'=>TRUE));?>
								<hr/>					
								<h6>Database</h6>
								<small>
									Please create a new database on the local server that is running this software. 
									Once complete enter the database details below.
								</small>
									
								<hr/>
								<?if(validation_errors()){?>
								<div class="alert">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Warning</strong> Please correct the following problems.
									<ul><?=validation_errors('<li>','</li>');?></ul>
								</div>
								<?}?>
								<?if(isSet($this->errors->database)){?>
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Warning</strong> The database details are incorrect. We are unable to connect to this database.
								</div>
								<?}?>
									<div class="well">
									
										
										<div class="control-group">
											<label class="control-label">Database</label>
											<div class="controls">
												<?
													$field = array(
														'name'=>'str_database',
														'id'=>'str_database',
														'value'=>set_value('str_database',$this->data->database['database']),
														'placeholder'=>'Database name',
														'maxlength'=>'30',
														'class'=>'span3'
														);
													echo form_input($field);
												?>
												<?
													$field = array(
														'name'=>'str_prefix',
														'id'=>'str_prefix',
														'value'=>set_value('str_prefix',$this->data->database['dbprefix']),
														'placeholder'=>'Prefix',
														'maxlength'=>'5',
														'class'=>'span1'
														);
													echo form_input($field);
												?>
											</div>		
										</div><!-- end:div.control-group -->
										<div class="control-group">
											<label class="control-label">Login details:</label>
											<div class="controls">
												<?
													$field = array(
														'name'=>'str_username',
														'id'=>'str_username',
														'value'=>set_value('str_username',$this->data->database['username']),
														'placeholder'=>'Username',
														'maxlength'=>'255',
														'class'=>'span2'
														);
													echo form_input($field);
												?>
												<?
													$field = array(
														'name'=>'str_password',
														'id'=>'str_password',
														'value'=>set_value('str_password',$this->data->database['password']),
														'placeholder'=>'Password',
														'maxlength'=>'255',
														'class'=>'span2'
														);
													echo form_input($field);
												?>
											</div>		
										</div><!-- end:div.control-group -->
										<hr/>
										<div class="control-group">
											<label class="control-label">Mysql host:</label>
											<div class="controls">
												<?
													$field = array(
														'name'=>'str_host',
														'id'=>'str_host',
														'value'=>set_value('str_host',$this->data->database['hostname']),
														'placeholder'=>'Hostname',
														'maxlength'=>'200',
														'class'=>'span4'
														);
													echo form_input($field);
												?>
											</div>		
										</div><!-- end:div.control-group -->
										
									</div>
							</div><!-- End:div.modal-body -->
							<div class="modal-footer">
								<a href="<?=base_url();?>admin/installation/terms" class="btn">Back</a>
								<input type="submit" name="saveDB" href="<?=base_url();?>admin/installation/database" class="btn btn-primary" value="Connect to database"/>
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