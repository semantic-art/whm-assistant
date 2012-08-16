<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Installation'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body class="fabric-light">
		<div class="container">
			<div class="row">
				<div class="span8 offset2">
					<form class="form-inline" method="post">
						<div class="modal animated fadeInUp" style="position: relative; top: auto; left: auto; margin: 0 auto; margin-top:80px; z-index: 1; max-width: 100%;">
							<div class="modal-body animated fadeInUp" style="text-align:center; overflow:hidden;">
								<img style="margin-bottom:40px; margin-top:40px;" src="<?=$this->assets->url('logo-140x65px-png32.png','admin');?>" />
								<div>
									<p>
										<small>Welcome to whm-assistant</small>
									</p>
									<hr/>
									
									<div class="well animated fadeInDown">
										<a href="<?=base_url();?>admin/installation/terms" class="btn btn-primary">Get started!</a>
									</div>
								</div>
							</div><!-- End:div.modal-body -->
						</div><!-- End:div.modal -->
					</form>
				</div><!-- End:div.span8 -->
			</div><!-- End:div.row -->	
			<p class="lead modal-disclaimer animated fadeInUp">whm-assistant &copy; 2012.</p>
		</div>
		<?$this->load->view('admin/common/javascript');?>
		<?$this->load->view('admin/common/javascript');?>
		<script type="text/javascript">
			jQuery(document).ready(function(){});
		</script>
	</body>
</html>