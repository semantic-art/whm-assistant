<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Create account'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body>
		
		<form class="form" method="post">
						<div class="modal-backdrop"></div>
						<div class="modal">
							<div class="modal-header">
								<h3>Add a new account</h3>
							</div>
							<div class="modal-body" style="">
							<?if(validation_errors()){?>
								<div class="alert alert-warning">
									<button class="close" data-dismiss="alert">&times;</button>
									Please complete the required fields.
									<?=validation_errors();?>
								</div>
							<?}?>
							
							<div class="accordion" id="account_create_accordion">
								<div class="accordion-group">
									<div class="accordion-heading">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#account_create_accordion" href="#collapseOne">
											General
										</a>
									</div>
									<div id="collapseOne" class="accordion-body collapse in">
										<div class="accordion-inner">
											<div class="control-group" style="float:left; width:50%;">
									<label type="text" for="opt_account_type">Account type:</label>
									<div class="controls">
										<select id="opt_account_type" name="opt_account_type">
											<option value="business">Business account</option>
											<option valuse="personal">Personal account</option>
										</select>
								    </div>
								</div>
								
								<div class="control-group" style="float:left; width:50%;">
									<label type="text" for="opt_status">Initial status:</label>
									<div class="controls">
										<select id="opt_status" name="opt_status">
											<option value="active">active</option>
											<option value="inactive">inactive</option>
										</select>
								    </div>
								</div>
								
								<div class="control-group" style="float:left; width:50%;">
									<label type="text" for="opt_overdue_charges">Overdue charges:</label>
									<div class="controls">
										<select id="opt_overdue_charges" name="opt_overdue_charges">
											<option value="true" SELECTED>Apply, where appropriate</option>
											<option value="false">Do not apply</option>
										</select>
								    </div>
								</div>
								
								<div class="control-group" style="float:left; width:50%;">
									<label type="text" for="opt_tax_exempt">Tax exempt:</label>
									<div class="controls">
										<select id="opt_tax_exempt" name="opt_tax_exempt">
											<option value="false" SELECTED>No</option>
											<option value="true">Yes</option>
										</select>
								    </div>
								</div>
								
								<span class="clearfix"></span>
								<hr/>
								
								<div class="control-group" style="float:left; width:50%;">
									<label class="control-label" for="str_business_name">Business name:</label>
									<div class="controls">
								    	<input type="text" id="str_business_name" name="str_business_name"/>
								    	<p class="help-block">		
										</p>
								    </div>
								</div>
								
								<div class="control-group" style="float:left; width:50%;">
									<label class="control-label" for="str_website">Website:</label>
									<div class="controls">
								    	<input type="text" id="str_website" name="str_website"/>
								    	<p class="help-block">		
										</p>
								    </div>
								</div>
								
										</div>
									</div>
								</div>
								<div class="accordion-group">
									<div class="accordion-heading">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#account_create_accordion" href="#collapseTwo">
											Contact details
										</a>
									</div>
									<div id="collapseTwo" class="accordion-body collapse">
										<div class="accordion-inner">
											<div class="control-group" style="float:left; width:50%;">
									<label class="control-label" for="str_first_name">First name:</label>
									<div class="controls">
								    	<input type="text" id="str_first_name" name="str_first_name"/>
								    	<p class="help-block">		
										</p>
								    </div>
								</div>
								
								<div class="control-group" style="float:left; width:50%;">
									<label class="control-label" for="str_last_name">Last name:</label>
									<div class="controls">
								    	<input type="text" id="str_last_name" name="str_last_name"/>
								    	<p class="help-block">		
										</p>
								    </div>
								</div>
								
								<div class="control-group" style="float:left; width:50%;">
									<label class="control-label" for="str_email">Email address:</label>
									<div class="controls">
								    	<input type="text" id="str_email" name="str_email"/>
								    	<p class="help-block">		
										</p>
								    </div>
								</div>
								
								<div class="control-group" style="float:left; width:50%;">
									<label class="control-label" for="str_password">Initial password:</label>
									<div class="controls">
										<?
											$alphabet = "abcdefghijklmnopqrstuwxyz";
											$pass = array();
											for ($i = 0; $i < 8; $i++) {
												$n = rand(0, strlen($alphabet)-1);
												$pass[$i] = $alphabet[$n];
											}
										?>
								    	<input type="text" id="str_password" name="str_password" value="<?=implode($pass);?>"/>
								    	<p class="help-block">		
										</p>
								    </div>
								</div>
								
								<div class="control-group" style="float:left; width:50%;">
									<label class="control-label" for="num_mobile">Mobile:</label>
									<div class="controls">
								    	<input type="text" id="num_mobile" name="num_mobile"/>
								    	<p class="help-block">		
										</p>
								    </div>
								</div>
								
								<div class="control-group" style="float:left; width:50%;">
									<label class="control-label" for="num_office">Office:</label>
									<div class="controls">
								    	<input type="text" id="num_office" name="num_office"/>
								    	<p class="help-block">		
										</p>
								    </div>
								</div>
								
								<div class="control-group" style="float:left; width:50%;">
									<label class="control-label" for="num_home">Home:</label>
									<div class="controls">
								    	<input type="text" id="num_home" name="num_home"/>
								    	<p class="help-block">		
										</p>
								    </div>
								</div>
								
								<div class="control-group" style="float:left; width:50%;">
									<label class="control-label" for="num_fbid">Facebook ID:</label>
									<div class="controls">
								    	<input type="text" id="num_fbid" name="num_fbid"/>
								    	<p class="help-block">		
										</p>
								    </div>
								</div>
								
								
										</div>
									</div>
								</div>
							</div>
							
							
							
								
								
								
								
							</div><!-- End:div.modal-body -->
							<div class="modal-footer">
								<select id="opt_welcome_email" name="opt_welcome_email" class="pull-left" style="margin:0px;">
									<option>Send welcome email</option>
									<option>Don't send welcome email</option>
								</select>
							
								<a href="<?=base_url();?>admin/accounts" class="btn">Cancel</a>
								<button type="submit" class="btn btn-primary">Create account</button>
							</div>
						</div><!-- End:div.modal -->
					</form>
		
		
		
		<?$this->load->view('admin/common/javascript');?>
	</body>
</html>


