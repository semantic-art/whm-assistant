<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Admin'
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
							
								<?$this->load->view('admin/installation/common/wizard',array('wizard_admin'=>TRUE));?>
								<hr/>
								<?if(validation_errors()){?>
								<div class="alert">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Warning</strong> Please correct the following problems.
									<ul><?=validation_errors('<li>','</li>');?></ul>
								</div>
								<?}?>
								<div class="control-group">
										<label class="control-label" for="input01">Avatar:</label>
										<div class="controls">
											<div id="avatar_preview" class="well span2" style="height:120px; margin:0px; padding:0px; text-align:center; margin-right:17px;">
												<img src="http://www.doppelme.com/TRANSPARENT/0/crop.png" style="height:100%;"/>
											</div>
											<label style="padding-top:5px;">ID:</label>
											<?
											$field = array(
												'name'=>'img_avatar',
												'id'=>'img_avatar',
												'value'=>set_value('img_avatar',''),
												'maxlength'=>'40',
												'class'=>'span2'
											);
											echo form_input($field);
											?>
											<br/><br/>
											<p style="text-align:center; width:150px; display:inline-block;"><small>Goto <a href="http://www.doppelme.com">http://doppelme.com</a> to setup your avatar</small></p>
										</div>
									</div>
									
								<div class="control-group">
									<label class="control-label">Name:</label>
									<div class="controls">
										<?
											$field = array(
												'name'=>'str_first_name',
												'id'=>'str_first_name',
												'value'=>set_value('str_first_name',$this->settings['account']['first_name']),
												'placeholder'=>'First name',
												'maxlength'=>'50',
												'class'=>'span2'
											);
											echo form_input($field);
										?>
										<?
											$field = array(
												'name'=>'str_last_name',
												'id'=>'str_last_name',
												'value'=>set_value('str_last_name',$this->settings['account']['last_name']),
												'placeholder'=>'Last name',
												'maxlength'=>'50',
												'class'=>'span2'
											);
											echo form_input($field);
										?>
									</div>		
								</div><!-- end:div.control-group -->
								<hr/>
								
								<div class="control-group">
									<label class="control-label">Email:</label>
									<div class="controls">
										<?
											$field = array(
												'name'=>'str_email',
												'id'=>'str_email',
												'value'=>set_value('str_email',$this->settings['account']['email']),
												'placeholder'=>'Email address',
												'maxlength'=>'255',
												'class'=>'span4'
											);
											echo form_input($field);
										?>
									</div>		
								</div><!-- end:div.control-group -->
								<div class="control-group">
									<label class="control-label">Password</label>
									<div class="controls" style="position:relative;">
										<span class="label label-important hide" id="password_strenght" style="position:absolute; right:78px; top:7px;">insecure</span>
										<?
											$field = array(
												'name'=>'str_password',
												'id'=>'str_password',
												'value'=>set_value('str_password',''),
												'placeholder'=>'Password',
												'maxlength'=>'255',
												'class'=>'span4'
											);
											echo form_password($field);
										?>
									</div>		
								</div><!-- end:div.control-group -->
									
							</div><!-- End:div.modal-body -->
							<div class="modal-footer">
								<a href="<?=base_url();?>admin/installation/modules" class="btn">Back</a>
								<input type="submit" name="submitBTN" class="btn btn-primary" value="Next"/>
							</div>
						</div><!-- End:div.modal -->
					</form>
				</div><!-- End:div.span8 -->
			</div><!-- End:div.row -->	
			<p class="lead modal-disclaimer animated fadeInUp">whm-assistant &copy; 2012.</p>
		</div>
		<?$this->load->view('admin/common/javascript');?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				$('#img_avatar').keyup(function(){
					$(this).parent().find('div.well img').attr('src','http://www.doppelme.com/TRANSPARENT/'+$(this).val()+'/crop.png');
				});
				jQuery(document).ready(function(){			
	$("#str_password").live("keyup",function(){
		var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
		var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
		var enoughRegex = new RegExp("(?=.{6,}).*", "g");
		var meter = $("#password_strenght");
		if($(this).val().length==0){
			meter.hide();
			meter.html('no password');
		}else if(false == enoughRegex.test($(this).val())) {
			meter.show();
			meter.html('insecure');
			meter.addClass('label-important').removeClass('label-success').removeClass('label-warning');
		}else if(strongRegex.test($(this).val())){
			meter.show();
			meter.html('secure');
			meter.addClass('label-success').removeClass('label-warning').removeClass('label-important');
		}else if(mediumRegex.test($(this).val())){
			meter.show();
			meter.html('safe');
			meter.addClass('label-warning').removeClass('label-success').removeClass('label-important');
		}else{
			meter.show();
			meter.addClass('label-important').removeClass('label-success').removeClass('label-warning');
		}
	}); 
});	
			});
		</script>
	</body>
</html>