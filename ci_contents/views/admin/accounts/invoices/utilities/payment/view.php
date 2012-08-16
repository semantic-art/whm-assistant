<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Payment'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body>
		<div class="modal-backdrop"></div>
		<form class="form form-horizontal" method="post">	
			<div class="modal">
				<div class="modal-header">
					<h3>Payment</h3>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_bank" data-toggle="tab" style="text-align:center; width:60px;">
								<img style="" src="<?=$this->assets->url('payment-icons/bank.png','framework');?>" /><br/>
								Bank
							</a>
						</li>
						<li>
							<a href="#tab_card" data-toggle="tab" style="text-align:center; width:60px;">
								<img style="" src="<?=$this->assets->url('payment-icons/card.png','framework');?>" /><br/>
								Credit card
							</a>
						</li>
						<li>
							<a href="#tab_cash" data-toggle="tab" style="text-align:center; width:60px;">
								<img style="" src="<?=$this->assets->url('payment-icons/cash.png','framework');?>" /><br/>
								Cash
							</a>
						</li>
						<li>
							<a href="#tab_paypal" data-toggle="tab" style="text-align:center; width:60px;">
								<img style="" src="<?=$this->assets->url('payment-icons/paypal.png','framework');?>" /><br/>
								Paypal
							</a>
						</li>
						<li>
							<a href="#tab_cheque" data-toggle="tab" style="text-align:center; width:60px;">
								<img style="" src="<?=$this->assets->url('payment-icons/cheque.png','framework');?>" /><br/>
								Cheque
							</a>
						</li>
					</ul>
					<hr/>
					<div class="well well-small">
						<h3 class="lead" style="margin:0px; line-height:28px; border-bottom:1px solid #ddd; margin-bottom:30px;">
							Payment information
						</h3>
						<?$fieldset=array('Method','str_method','Method');?>
						<input type="hidden" id="<?=$fieldset[1];?>" name="<?=$fieldset[1];?>" value="bank"/>
						<?$fieldset=array('Date paid','str_date','Date paid');?>
						<div class="control-group">
							<label class="control-label" for="<?=$fieldset[1];?>"><?=$fieldset[0];?></label>
							<div class="controls">
								<div class="input-prepend" style="margin:0px;"><span class="add-on"><i class="icon-calendar"></i></span><input type="text" class="date-input" id="<?=$fieldset[1];?>" name="<?=$fieldset[1];?>" placeholder="<?=$fieldset[2];?>" data-date-format="mm/dd/yyyy" value="<?=date('m/d/Y');?>"/></div>
							</div>		
						</div><!-- end:div.control-group -->
						<?$fieldset=array('Amount','num_amount','Amount');?>
						<div class="control-group">
							<label class="control-label" for="<?=$fieldset[1];?>"><?=$fieldset[0];?></label>
							<div class="controls">
								<div class="input-prepend" style="margin:0px;"><span class="add-on">$</span><input type="text" id="<?=$fieldset[1];?>" name="<?=$fieldset[1];?>" placeholder="<?=$fieldset[2];?>" value="<?=number_format($this->data->invoice->balance->due,2);?>"></div>
								<p class="help-block"></p>
							</div>
						</div><!-- end:div.control-group -->
						<div class="tab-content">
							<div class="tab-pane active" id="tab_bank">
								<?$fieldset=array('Reference','num_ref','Reference');?>
								<div class="control-group">
									<label class="control-label" for="<?=$fieldset[1];?>"><?=$fieldset[0];?></label>
									<div class="controls">
									<div class="input-prepend" style="margin:0px;"><span class="add-on">#</span><input type="text" id="<?=$fieldset[1];?>" name="<?=$fieldset[1];?>" placeholder="<?=$fieldset[2];?>"></div>
									</div>
								</div><!-- end:div.control-group -->
							</div>
							<div class="tab-pane" id="tab_card">
								<?$fieldset=array('Card number','num_card','Last four digits only');?>
								<div class="control-group">
									<label class="control-label" for="<?=$fieldset[1];?>"><?=$fieldset[0];?></label>
									<div class="controls">
									<div class="input-prepend" style="margin:0px;"><span class="add-on"><i class="icon-asterisk"></i></span><input type="text" maxlength="4" id="<?=$fieldset[1];?>" name="<?=$fieldset[1];?>" placeholder="<?=$fieldset[2];?>"></div>
									</div>
								</div><!-- end:div.control-group -->
							</div>
							<div class="tab-pane" id="tab_cash">
							</div>
							<div class="tab-pane" id="tab_paypal">
								<?$fieldset=array('Paypal Reference','num_paypalref','Reference');?>
								<div class="control-group">
									<label class="control-label" for="<?=$fieldset[1];?>"><?=$fieldset[0];?></label>
									<div class="controls">
									<div class="input-prepend" style="margin:0px;"><span class="add-on">#</span><input type="text" id="<?=$fieldset[1];?>" name="<?=$fieldset[1];?>" placeholder="<?=$fieldset[2];?>"></div>
									</div>
								</div><!-- end:div.control-group -->
							</div>
							<div class="tab-pane" id="tab_cheque">
								<?$fieldset=array('Cheque no','num_chequeno','Cheque number');?>
								<div class="control-group">
									<label class="control-label" for="<?=$fieldset[1];?>"><?=$fieldset[0];?></label>
									<div class="controls">
									<div class="input-prepend" style="margin:0px;"><span class="add-on">#</span><input type="text" id="<?=$fieldset[1];?>" name="<?=$fieldset[1];?>" placeholder="<?=$fieldset[2];?>"></div>
									</div>
								</div><!-- end:div.control-group -->
							</div>
						</div>
					</div>
				</div><!-- End:div.modal-body -->
				<div class="modal-footer">
					<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/<?=$this->data->invoice->id;?>" class="btn">Cancel</a>
					<button type="submit" class="btn btn-primary">Add payment</button>
				</div><!-- end:div.modal-footer -->
			</div><!-- end:div.modal -->
		</form>
		<?$this->load->view('admin/common/javascript');?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				$('*[data-toggle=tab]').click(function(){
					var method = $(this).attr('href');
					method = method.replace('#tab_','');
					$('#str_method').val(method);
				});
			});
		</script>
	</body>
</html>
