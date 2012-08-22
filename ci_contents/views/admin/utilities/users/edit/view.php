<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'User profile'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body>
		<div class="wrap">
			<div class="wrapper">
				<div class="container" style="padding-top:20px;">
					<?$this->load->view('admin/common/navigation',array('users'=>TRUE));?>
				</div>
				<div class="container">
				
				<div class="page-header">
				<h1><?=$this->data->user->first_name;?> <?=$this->data->user->last_name;?></h1>
			</div>
			<div class="row">
				<div class="span12">
					<form class="form-horizontal" method="post">
						<div class="row">
							<div class="span6">
								<fieldset>
									<?$field=array('img_avatar','Avatar');?>
									<div class="control-group<?if(form_error($field[0])){echo" error";}?>">
										<label class="control-label" for="input01"><?=$field[1];?>:</label>
										<div class="controls">
											<div id="avatar_preview" class="well span2" style="height:120px; margin:0px; padding:0px; text-align:center; margin-right:17px;">
												<img src="http://www.doppelme.com/TRANSPARENT/<?=$this->data->user->avatar;?>/crop.png" style="height:100%;"/>
											</div>
											<label style="padding-top:5px;">ID:</label>
											<input type="text" class="span2" name="<?=$field[0];?>" id="<?=$field[0];?>" value="<?=set_value($field[0],$this->data->user->avatar);?>"/>
											<br/><br/>
											<p style="text-align:center;"><small>Goto <a href="http://www.doppelme.com">http://doppelme.com</a> to setup your avatar</small></p>
											<?=form_error($field[0],'<p class="help-block">','</p>');?>
										</div>
									</div>
									<hr/>
									<?$fieldset=array(array('str_first_name','Given name'),array('str_last_name','Surname'));?>
									<div class="control-group<?if(form_error($fieldset[0][0])||form_error($fieldset[1][0])){echo" error";}?>">
										<label class="control-label">Name:</label>
										<div class="controls">
											<input type="text" class="span4" placeholder="<?=$fieldset[0][1];?>" name="<?=$fieldset[0][0];?>" id="<?=$fieldset[0][0];?>" value="<?=set_value($fieldset[0][0],$this->data->user->first_name);?>"/>
											<?=form_error($fieldset[0][0],'<p class="help-block">','</p>');?>
										</div>
										<div class="controls" style="margin-top:10px;">
											<input type="text" class="span4" placeholder="<?=$fieldset[1][1];?>" name="<?=$fieldset[1][0];?>" id="<?=$fieldset[1][0];?>" value="<?=set_value($fieldset[1][0],$this->data->user->last_name);?>"/>
											<?=form_error($fieldset[1][0],'<p class="help-block">','</p>');?>
										</div>
									</div>
									<hr/>
									
									<?$fieldset=array(array('num_mobile','Mobile'),array('num_office','Office'),array('str_email','Email'));?>
									<div class="control-group<?if(form_error($fieldset[0][0])||form_error($fieldset[1][0])){echo" error";}?>">
										<label class="control-label">Contact details:</label>
										<div class="controls">
											<input type="text" class="span4" placeholder="<?=$fieldset[0][1];?>" name="<?=$fieldset[0][0];?>" id="<?=$fieldset[0][0];?>" value="<?=set_value($fieldset[0][0],$this->data->user->phone['mobile']);?>"/>
											<?=form_error($fieldset[0][0],'<p class="help-block">','</p>');?>
										</div>
										<div class="controls" style="margin-top:10px;">
											<input type="text" class="span4" placeholder="<?=$fieldset[1][1];?>" name="<?=$fieldset[1][0];?>" id="<?=$fieldset[1][0];?>" value="<?=set_value($fieldset[1][0],$this->data->user->phone['office']);?>"/>
											<?=form_error($fieldset[1][0],'<p class="help-block">','</p>');?>
										</div>
										<div class="controls" style="margin-top:10px;">
											<input type="text" class="span4" placeholder="<?=$fieldset[2][1];?>" name="<?=$fieldset[2][0];?>" id="<?=$fieldset[2][0];?>" value="<?=set_value($fieldset[2][0],$this->data->user->email);?>"/>
											<?=form_error($fieldset[2][0],'<p class="help-block">','</p>');?>
										</div>
									</div>
								</fieldset>
							</div><!-- End:div.span6v-->
							<div class="span6">
								<fieldset>
									<div class="well">
										<?$field=array('opt_status','Status');?>
										<div class="control-group<?if(form_error($field[0])){echo" error";}?>">
											<label class="control-label" for="input01"><?=$field[1];?>:</label>
											<div class="controls">
												<select class="span3" name="<?=$field[0];?>" id="<?=$field[0];?>" <?if($this->user->id==$this->data->user->id){echo" disabled";}?>>
													<?if($this->data->user->status=='active'){?>
														<option value="active" <?=set_select($field[0],'active',TRUE);?>>Active</option>
													<?}else{?>
														<option value="active" <?=set_select($field[0],'active');?>>Active</option>
													<?}?>
													<?if($this->data->user->status=='inactive'){?>
														<option value="inactive" <?=set_select($field[0],'inactive',TRUE);?>>Inactive</option>
													<?}else{?>
														<option value="inactive" <?=set_select($field[0],'inactive');?>>Inactive</option>
													<?}?>
												</select>
												<?=form_error($field[0],'<p class="help-block">','</p>');?>
											</div>
										</div>
										<hr/>
										<?$field=array('str_password','Password');?>
										<div class="control-group<?if(form_error($field[0])){echo" error";}?>">
											<label class="control-label" for="input01"><?=$field[1];?>:</label>
											<div class="controls">
												<input type="text" class="span3" placeholder="Change password" name="<?=$field[0];?>" id="<?=$field[0];?>" value="<?=set_value($field[0]);?>"/>
												<?=form_error($field[0],'<p class="help-block">','</p>');?>
											</div>
										</div>
										<hr/>
										
										<?$fieldset=array(array('str_smtp_host','SMTP Host'),array('str_smtp_port','SMTP Port'),array('str_smtp_user','SMTP User'),array('str_smtp_pass','SMTP Password'));?>
										<div class="control-group<?if(form_error($fieldset[0][0])||form_error($fieldset[1][0])){echo" error";}?>">
											<label class="control-label">Email connectivity:</label>
											<div class="controls">
												<input type="text" class="span3" placeholder="<?=$fieldset[0][1];?>" name="<?=$fieldset[0][0];?>" id="<?=$fieldset[0][0];?>" value="<?=set_value($fieldset[0][0],$this->data->user->smtp['host']);?>"/>
												<?=form_error($fieldset[0][0],'<p class="help-block">','</p>');?>
											</div>
											<div class="controls" style="margin-top:10px;">
												<input type="text" class="span3" placeholder="<?=$fieldset[1][1];?>" name="<?=$fieldset[1][0];?>" id="<?=$fieldset[1][0];?>" value="<?=set_value($fieldset[1][0],$this->data->user->smtp['port']);?>"/>
												<?=form_error($fieldset[1][0],'<p class="help-block">','</p>');?>
											</div>
											<div class="controls" style="margin-top:10px;">
												<input type="text" class="span3" placeholder="<?=$fieldset[2][1];?>" name="<?=$fieldset[2][0];?>" id="<?=$fieldset[2][0];?>" value="<?=set_value($fieldset[2][0],$this->data->user->smtp['username']);?>"/>
												<?=form_error($fieldset[2][0],'<p class="help-block">','</p>');?>
											</div>
											<div class="controls" style="margin-top:10px;">
												<input type="text" class="span3" placeholder="<?=$fieldset[3][1];?>" name="<?=$fieldset[3][0];?>" id="<?=$fieldset[3][0];?>" value="<?=set_value($fieldset[3][0],$this->data->user->smtp['password']);?>"/>
												<?=form_error($fieldset[3][0],'<p class="help-block">','</p>');?>
											</div>
										</div>
									</div>
								</fieldset>
							</div><!-- End:div.span6v-->
						</div><!-- End:div.row -->
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">Save changes</button>
							<a class="btn" href="<?=base_url();?>admin/utilities/users">Cancel</a>
							<a href="<?=base_url();?>admin/utilities/users/delete/<?=$this->data->user->id;?>" class="btn btn-danger pull-right"<?if($this->user->id==$this->data->user->id){echo" disabled";}?>>
								<i class="icon-trash icon-white"></i>
							</a>
						</div>
					</form>
				</div>
			</div>

				
				</div><!-- end:div.container -->
				<div class="push"></div>
			</div><!-- end:wrapper -->
			<?$this->load->view('admin/common/footer');?>
		</div><!-- end:div.wrap-->
		<?$this->load->view('admin/common/javascript');?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				$('#img_avatar').keyup(function(){
					$(this).parent().find('div.well img').attr('src','http://www.doppelme.com/TRANSPARENT/'+$(this).val()+'/crop.png');
				});
			});
		</script>
	</body>
</html>