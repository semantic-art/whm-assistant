<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Delete'
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
								<h3>Delete account</h3>
							</div>
							<div class="modal-body" style="overflow:hidden;">
								<div class="alert">
								  <button class="close" data-dismiss="alert">×</button>
								  <strong>Warning!</strong> Will be complete when other modules are finished.
								</div>
								<h1 class="lead">Are you sure you want to delete this account?</h1>
							</div><!-- End:div.modal-body -->
							<div class="modal-footer">
								<a href="<?=base_url();?>admin/accounts" class="btn">Cancel</a>
								<input name="btn_delete" type="submit" class="btn btn-primary" value="Delete"/>
							</div>
						</div><!-- End:div.modal -->
					</form>
					
					
					
		<?$this->load->view('admin/common/javascript');?>
	</body>
</html>


