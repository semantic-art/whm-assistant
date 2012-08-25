<form class="form-horizontal" method="post" action="<?=base_url();?>admin/utilities/users/<?=$this->data->user->id;?>" style="margin:0px; padding:0px;">
<div style="background-color:#eee;" class="clearfix">
				<img id="avatar" class="pull-left" style="height:100px; width:100px; margin-left:5px;" src="http://www.doppelme.com/100/TRANSPARENT/<?=$this->data->user->avatar;?>/crop.png" alt="">
				<h3 class="pull-left" style="margin-top:30px; margin-left:20px; line-height:20px;">
					<span id="label-name"><?=$this->data->user->first_name;?> <?=$this->data->user->last_name;?></span><br/>
					<span id="label-email" style="font-size:12px;"><?=$this->data->user->email;?></span>
				</h3>
			</div>
<div class="modal-body">


<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_details" data-toggle="tab" style="text-align:center;">
								Details
							</a>
						</li>
						<li>
							<a href="#tab_avatar" data-toggle="tab" style="text-align:center;">
								Avatar
							</a>
						</li>
						<li>
							<a href="#tab_mail" data-toggle="tab" style="text-align:center;">
								Mail settings
							</a>
						</li>
						<li>
							<a href="#tab_logon" data-toggle="tab" style="text-align:center;">
								Logon details
							</a>
						</li>
					</ul>
					<hr/>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_details">
							
						
									<div class="control-group">
										<label class="control-label">Name:</label>
										<div class="controls">
											<?
											$field = array(
												'name'=>'str_first_name',
												'id'=>'str_first_name',
												'value'=>set_value('str_first_name',$this->data->user->first_name),
												'placeholder'=>'Given name',
												'class'=>'span4'
												);
											echo form_input($field);
											?>
											<?=form_error($field['name'],'<p class="help-block">','</p>');?>
										</div>
										<div class="controls" style="margin-top:10px;">
											<?
											$field = array(
												'name'=>'str_last_name',
												'id'=>'str_last_name',
												'value'=>set_value('str_last_name',$this->data->user->last_name),
												'placeholder'=>'Surname',
												'class'=>'span4'
												);
											echo form_input($field);
											?>
											<?=form_error($field['name'],'<p class="help-block">','</p>');?>
										</div>
									</div>
									
									<hr/>
									
									
									
									<div class="control-group">
										<label class="control-label">Contact details:</label>
										<div class="controls">
											<?
											$field = array(
												'name'=>'num_mobile',
												'id'=>'num_mobile',
												'value'=>set_value('num_mobile',$this->data->user->phone['mobile']),
												'placeholder'=>'Mobile number',
												'class'=>'span4'
												);
											echo form_input($field);
											?>
											<?=form_error($field['name'],'<p class="help-block">','</p>');?>
										</div>&nbsp;
										<div class="controls">
											<?
											$field = array(
												'name'=>'num_office',
												'id'=>'num_office',
												'value'=>set_value('num_office',$this->data->user->phone['office']),
												'placeholder'=>'Office number',
												'class'=>'span4'
												);
											echo form_input($field);
											?>
											<?=form_error($field['name'],'<p class="help-block">','</p>');?>
										</div>&nbsp;
										<div class="controls">
											<?
											$field = array(
												'name'=>'num_home',
												'id'=>'num_home',
												'value'=>set_value('num_home',$this->data->user->phone['home']),
												'placeholder'=>'Home number',
												'class'=>'span4'
												);
											echo form_input($field);
											?>
											<?=form_error($field['name'],'<p class="help-block">','</p>');?>
										</div>
									</div>
									
							</div>
							<div class="tab-pane" id="tab_avatar">
								<div class="control-group">
									<label class="control-label" for="input01">Avatar:</label>
									<div class="controls">
										<div id="avatar_preview" class="well span2" style="height:120px; margin:0px; padding:0px; text-align:center; margin-right:17px;">
											<img src="http://www.doppelme.com/TRANSPARENT/<?=$this->data->user->avatar;?>/avatar.png" style="height:100%;"/>
										</div>
										<label style="padding-top:5px;">ID:</label>
										<?
										$field = array(
											'name'=>'img_avatar',
											'id'=>'img_avatar',
											'value'=>set_value('img_avatar',$this->data->user->avatar),
											'placeholder'=>'Avatar ID',
											'class'=>'span2'
											);
										echo form_input($field);
										?>
										<?=form_error($field['name'],'<p class="help-block">','</p>');?>
										<br/><br/>
										<p style="text-align:center; width:140px; display:inline-block;"><small>Goto <a href="http://www.doppelme.com">http://doppelme.com</a> to setup your avatar</small></p>
									</div>
								</div>
								
								
							</div>
							<div class="tab-pane" id="tab_mail">
							
							
								<div class="control-group">
									<label class="control-label">Host:</label>
									<div class="controls">
										<?
										$field = array(
											'name'=>'str_host',
											'id'=>'str_host',
											'value'=>set_value('str_host',$this->data->user->smtp['host']),
											'placeholder'=>'Mail host',
											'class'=>'span4'
											);
										echo form_input($field);
										?>
										<?=form_error($field['name'],'<p class="help-block">','</p>');?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Port:</label>
									<div class="controls">
										<?
										$field = array(
											'name'=>'num_port',
											'id'=>'num_port',
											'value'=>set_value('num_port',$this->data->user->smtp['port']),
											'placeholder'=>'Host port',
											'class'=>'span2'
											);
										echo form_input($field);
										?>
										<?=form_error($field['name'],'<p class="help-block">','</p>');?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Username:</label>
									<div class="controls">
										<?
										$field = array(
											'name'=>'str_username',
											'id'=>'str_username',
											'value'=>set_value('str_username',$this->data->user->smtp['username']),
											'placeholder'=>'Username',
											'class'=>'span4'
											);
										echo form_input($field);
										?>
										<?=form_error($field['name'],'<p class="help-block">','</p>');?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<?
										$field = array(
											'name'=>'str_smtp-password',
											'id'=>'str_smtp-password',
											'value'=>set_value('str_smtp-password',$this->data->user->smtp['password']),
											'placeholder'=>'Password',
											'class'=>'span4'
											);
										echo form_input($field);
										?>
										<?=form_error($field['name'],'<p class="help-block">','</p>');?>
									</div>
								</div>
								<hr/>
								<div class="control-group">
									<label class="control-label">&nbsp;</label>
									<div class="controls">
										<button class="btn" id="btn-testconnection">Test connection</button>
										

									</div>
								</div>
							
							
							</div>
							<div class="tab-pane" id="tab_logon">
							
								<div class="control-group">
									<label class="control-label">Email:</label>
									<div class="controls">
										<?
										$field = array(
											'name'=>'str_email',
											'id'=>'str_email',
											'value'=>set_value('str_email',$this->data->user->email),
											'placeholder'=>'Email address',
											'class'=>'span4'
											);
										echo form_input($field);
										?>
										<?=form_error($field['name'],'<p class="help-block">','</p>');?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<?
										$field = array(
											'name'=>'str_password',
											'id'=>'str_password',
											'value'=>set_value('str_password',''),
											'placeholder'=>'Current password',
											'class'=>'span4'
											);
										echo form_password($field);
										?>
										<?=form_error($field['name'],'<p class="help-block">','</p>');?>
										
									</div>
									<hr/>
									<div class="controls" style="position:relative;">
										<span class="label label-important hide" id="password_strenght" style="position:absolute; right:78px; top:7px;">insecure</span>
										<?
										$field = array(
											'name'=>'str_newpassword',
											'id'=>'str_newpassword',
											'value'=>set_value('str_newpassword',''),
											'placeholder'=>'New password',
											'class'=>'span4'
											);
										echo form_password($field);
										?>
										<?=form_error($field['name'],'<p class="help-block">','</p>');?>
									</div>
								</div>
								
							
							</div>
						</div>
</div>
<div class="modal-footer">

<div class="indicator hide pull-left" style="height:20px; width:20px; position:relative; top:5px;">
											<div class="bar1"></div>
											<div class="bar2"></div>
											<div class="bar3"></div>
											<div class="bar4"></div>
											<div class="bar5"></div>
											<div class="bar6"></div>
											<div class="bar7"></div>
											<div class="bar8"></div>
											<div class="bar9"></div>
											<div class="bar10"></div>
											<div class="bar11"></div>
											<div class="bar12"></div>
										</div>

					<a href="<?=base_url();?>admin/utilities/users" class="btn">Cancel</a>
					<button type="submit" class="btn btn-primary" id="btn-savechanges" disabled>Save changes</button>
				</div><!-- end:div.modal-footer -->
</form>