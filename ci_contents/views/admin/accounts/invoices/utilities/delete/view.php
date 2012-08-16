<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Delete invoice'
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
						<img style="margin-bottom:20px;" src="<?=$this->assets->url('file-icons/pdf.png','framework');?>" />
						<p>Are you sure you want to delete invoice <strong>#<?=$this->data->invoice->id;?></strong>?</p>
						<hr/>
						<p>
							<input type="submit" name="confirm_delete" class="btn btn-danger btn-large" value="Delete invoice"/>
							<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/<?=$this->data->invoice->id;?>" class="btn btn-large">Cancel</a>
						</p>
					</div>					
				</div><!-- End:div.modal-body -->
			</div><!-- end:div.modal -->
		</form>
		<?$this->load->view('admin/common/javascript');?>
	</body>
</html>