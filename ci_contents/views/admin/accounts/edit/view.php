<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Edit'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body class="navbar-padding">
		<?$this->load->view('admin/common/navigation',array('accounts'=>TRUE));?>
		<div class="container">
			<?$this->load->view('admin/accounts/common/name');?>
			<?$this->load->view('admin/accounts/common/tabs',array('edit'=>TRUE));?>
			<div class="row">
				<div class="span12">
					<blockquote>
						<h6>Planned Feature overview</h6>
						<p>
							Edit account details
						</p>
						<small>Brad Martin</small>
					</blockquote>
				</div>
			</div><!-- End:div.row -->
			<?$this->load->view('admin/common/footer');?>
		</div>
		<?$this->load->view('admin/common/javascript');?>
	</body>
</html>