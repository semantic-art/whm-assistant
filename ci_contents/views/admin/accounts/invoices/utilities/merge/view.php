<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Merge invoices'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body class="navbar-padding">
							<form class="form" method="post">
						<div class="modal-backdrop"></div>
						<div class="modal">
							<div class="modal-header">
								<h3>Merge</h3>
							</div>
							<div class="modal-body" style="overflow:hidden;">
								<div class="controls" style="float:left; width:50%;">
									<label type="text" for="opt_from">Merge:</label>
									<select id="opt_from" name="opt_from">
										<?foreach($this->data->invoices as $invoice){?>
											<option value="<?=$invoice->id;?>">
												<?=$invoice->id;?>
											</option>
										<?}?>
								    </select>
								</div>
								<div class="controls" style="float:left; width:50%;">
									<label type="text" for="opt_to">With:</label>
									<select id="opt_to" name="opt_to">
										<?unset($this->data->invoices[0]);?>
										<?foreach($this->data->invoices as $invoice){?>
											<option value="<?=$invoice->id;?>">
												<?=$invoice->id;?>
											</option>
										<?}?>
								    </select>
								    <p class="help-block">This is the primary invoice</p>
								</div>
								<div class="clearfix">
									<hr/>
									<p class="help-inline">
										<strong>Note: </strong>The primary invoice is the invoice 
										that will remain unchanged and all of the other invoices
										items &amp; payments will be 
										transfered to the primary invoice.
									</p>
								</div>
							</div><!-- End:div.modal-body -->
							<div class="modal-footer">
								<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices" class="btn">Cancel</a>
								<button type="submit" class="btn btn-primary">Merge invoices</button>
							</div>
						</div><!-- End:div.modal -->
					</form>
					
					
					
		<?$this->load->view('admin/common/javascript');?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				$('select[name=opt_from]').change(function(){
					$('select[name=opt_to]').html($(this).html());
					$('select[name=opt_to]').find('option[value='+$('select[name=opt_from]').val()+']').remove();
				});
			});
		</script>
	</body>
</html>


