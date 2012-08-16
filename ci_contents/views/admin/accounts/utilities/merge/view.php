<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Merge accounts'
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
								<div class="alert">
								  <button class="close" data-dismiss="alert">×</button>
								  <strong>Development</strong> This function cannot be completed untill core functionality is complete.
								</div>
								<div class="controls" style="float:left; width:50%;">
									<label type="text" for="opt_from">Merge:</label>
									<select id="opt_from" name="opt_from">
										<?foreach($this->data->accounts as $account){?>
											<option value="<?=$account->id;?>">
												<?=$account->business_name;?>
											</option>
										<?}?>
								    </select>
								</div>
								<div class="controls" style="float:left; width:50%;">
									<label type="text" for="opt_from">With:</label>
									<select id="opt_to" name="opt_to">
										<?unset($this->data->accounts[0]);?>
										<?foreach($this->data->accounts as $account){?>
											<option value="<?=$account->id;?>">
												<?=$account->business_name;?>
											</option>
										<?}?>
								    </select>
								    <p class="help-block">This is the primary account</p>
								</div>
								<div class="clearfix">
									<hr/>
									<p class="help-inline">
										<strong>Note: </strong>The primary account is the account 
										that will remain unchanged and all of the other accounts
										projects, services, domains &amp; corrospondence will be 
										transfered to the primary account.
									</p>
								</div>
							</div><!-- End:div.modal-body -->
							<div class="modal-footer">
								<a href="<?=base_url();?>admin/accounts" class="btn">Cancel</a>
								<button type="submit" class="btn btn-primary">Merge accounts</button>
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


