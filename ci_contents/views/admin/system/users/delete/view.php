<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Delete user'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body>
		<div class="modal-backdrop"></div>
		<form class="form" method="post">	
			<div class="modal">
				<div class="modal-body">
					<div class="hero-unit" style="text-align:center; margin:0px;">
						<img id="avatar" src="http://www.doppelme.com/TRANSPARENT/<?=$this->data->user->avatar;?>/avatar.png" style="height:100px;"/>
						<p>Are you sure you want to delete <?=$this->data->user->first_name;?> <?=$this->data->user->last_name;?>?</p>
						<hr/>
						<p>
							<input name="confirmBTN" type="submit" class="btn btn-danger btn-large" value="Delete user"/>
							<a class="btn btn-large" href="<?=base_url();?>admin/system/users">Cancel</a>
						</p>
					</div>					
				</div><!-- End:div.modal-body -->
			</div><!-- end:div.modal -->
		</form>
		<?$this->load->view('admin/common/javascript');?>
	</body>
</html>

