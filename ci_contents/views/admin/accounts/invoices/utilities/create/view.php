<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Create invoice'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body>
		<div class="modal-backdrop"></div>
		<form class="form" method="post">	
			<div class="modal">
				<div class="modal-header">
					<h3>Add a new invoice</h3>
				</div>
				<div class="modal-body">
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
							</div><!-- end:div.accordion-heading -->
							<div id="collapseOne" class="accordion-body collapse in">
								<div class="accordion-inner">
									
									<div class="control-group" style="float:left; width:50%;">
										<label type="text" for="opt_status">Initial status:</label>
										<div class="controls">
											<select id="opt_status" name="opt_status">
												<option>unpaid</option>
												<option>paid</option>
												<option>overdue</option>
												<option>cancelled</option>
											</select>
										</div>
									</div><!-- end:div.control-group -->
									<div class="control-group" style="float:left; width:50%;">
										<label type="text" for="opt_bill_to">Bill to:</label>
										<div class="controls">
											<select id="opt_bill_to" name="opt_bill_to">
												<optgroup label="Primary contact">
													<?$count=0;foreach($this->data->contacts as $contact){?>
														<?if($contact->primary=='true'){?>
														<option value="<?=$contact->id;?>"><?=$contact->first_name;?> <?=$contact->last_name;?></option>
														<?unset($this->data->contacts[$count]);}?>
													<?$count++;}?>
												</optgroup>											
												<?if(count($this->data->contacts)>1){?>
													<optgroup label="Additional contact">
													<?foreach($this->data->contacts as $contact){?>
														<?if($contact->status=='inactive'){?>
															<option disabled="disabled" value="<?=$contact->id;?>"><?=$contact->first_name;?> <?=$contact->last_name;?></option>
														<?}else{?>
															<option value="<?=$contact->id;?>"><?=$contact->first_name;?> <?=$contact->last_name;?></option>
														<?}?>
													<?}?>
													</optgroup>
												<?}?>
											</select>
										</div>
									</div><!-- end:div.control-group -->
									<div class="control-group" style="float:left; width:50%;">
										<label class="control-label" for="str_due_date">Due date:</label>
										<div class="controls">
											<input type="text" class="date-input" id="str_due_date" name="str_due_date" data-date-format="mm/dd/yyyy" value="<?=date('m/d/Y',time()+1209600);?>"/>
											<p class="help-block"></p>
										</div>
									</div><!-- end:div.control-group -->
									<div class="control-group" style="float:left; width:50%;">
										<label type="text" for="opt_overdue_charges">Overdue charges:</label>
										<div class="controls">
											<select id="opt_overdue_charges" name="opt_overdue_charges">
												<option value="true">Apply, where appropriate</option>
												<option value="false">Do not apply</option>
											</select>
										</div>
									</div><!-- end:div.control-group -->
									
								</div><!-- end:div.accordion-inner -->
							</div><!-- end:div.accordion-body -->
						</div><!-- end:div.accordion-group -->
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#account_create_accordion" href="#collapseTwo">
									Advanced options
								</a>
							</div><!-- end:div.accordion-heading -->
							<div id="collapseTwo" class="accordion-body collapse">
								<div class="accordion-inner">
									
									<div class="control-group" style="float:left; width:50%;">
										<label class="control-label" for="str_id">Invoice id:</label>
										<div class="controls">
											<input type="text" id="str_id" name="str_id" placeholder="automatic"/>
											<p class="help-block"></p>
										</div>
									</div><!-- end:div.control-group -->
									<div class="control-group" style="float:left; width:50%;">
										<label class="control-label" for="str_created">Created:</label>
										<div class="controls">
											<input type="text" class="date-input" id="str_created" name="str_created" data-date-format="mm/dd/yyyy" value="<?=date('m/d/Y');?>"/>
											<p class="help-block"></p>
										</div>
									</div><!-- end:div.control-group -->
									<div class="control-group" style="float:left; width:50%;">
										<label type="text" for="opt_kind">Invoice type:</label>
										<div class="controls">
											<select id="opt_kind" name="opt_kind">
												<option value="manual">Manually created</option>
												<option value="automatic">Automaticly generated</option>
											</select>
										</div>
									</div><!-- end:div.control-group -->
									
									
								</div><!-- end:div.accordion-inner -->
							</div><!-- end:div.accordion-body -->
						</div><!-- end:div.accordion-group -->
					</div><!-- end:div.accordion -->
					<p class="help-block" style="text-align:center; font-size:11px;">
						New invoices will not be visible or sent to the client until you choose to send the invoice.
					</p>
				</div><!-- End:div.modal-body -->
				<div class="modal-footer">
					<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices" class="btn">Cancel</a>
					<button type="submit" class="btn btn-primary">Create invoice</button>
				</div><!-- end:div.modal-footer -->
			</div><!-- end:div.modal -->
		</form>
		<?$this->load->view('admin/common/javascript');?>
	</body>
</html>


