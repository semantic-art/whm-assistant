<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Invoice '.$this->data->invoice->id
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body>
		<div class="wrap">
			<div class="wrapper">
				<div class="container" style="padding-top:20px;">
					<?$this->load->view('admin/common/navigation',array('accounts'=>TRUE));?>
				</div>
				<div class="container">
					<?$this->load->view('admin/accounts/common/name');?>
					<?$this->load->view('admin/accounts/common/tabs',array('invoices'=>TRUE));?>
					<?$this->load->view('admin/accounts/invoices/edit/partials/toolbar');?>
					<div class="row">
						<div class="span12">					
							<div>
								<div class="row">
									<div class="span12">
										<div class="row">
											
											<div class="span12">
												<div class="well clearfix">
													<div style="width:200px; float:left; border-right:1px solid #ddd; margin-left:20px; margin-right:30px;">
														<span>Balance:</span>
														<div style="font-size:24px;"><?=number_format($this->data->invoice->balance->due,2);?></div>
													</div>
													<div style="width:200px; float:left; border-right:1px solid #ddd; margin-right:30px;">
														<span>Invoice id:</span>
														<div style="font-size:24px;">#<?=$this->data->invoice->id;?></div>
													</div>
													<div style="width:200px; float:left; border-right:1px solid #ddd; margin-right:30px;">
														<span>Due:</span>
														<div style="font-size:24px;">
															<?if(strtotime($this->data->invoice->date_due)>time()){?>
																<span style="font-size:24px;" rel="tooltip" data-placement="top" data-title="<?=timespan(time(),strtotime($this->data->invoice->date_due),3);?>">
																	<?=date('m/d/Y',strtotime($this->data->invoice->date_due));?>
																</span>
															<?}else{?>
																<span style="font-size:24px;" rel="tooltip" data-placement="top" data-title="<?=timespan(strtotime($this->data->invoice->date_due),time(),3);?> ago">
																	<?=date('m/d/Y',strtotime($this->data->invoice->date_due));?>
																</span>
															<?}?>
														</div>
													</div>
													<div style="width:170px; float:left;">
														<span>Status:</span>
														<div style="font-size:24px;"><?=$this->data->invoice->status;?></div>
													</div>
												</div>
											</div>
										</div><!-- end:div.row -->
										<div class="row">
											<div class="span12">
												<table class="table table-bordered table-striped">
													<thead>
														<tr>
															<th>Description</th>
															<th width="100px;" style="vertical-align:middle; text-align:center;">Amount</th>
															<th width="120px;" style="vertical-align:middle; text-align:center;">Options</th>
														</tr>
													</thead>
													<tbody>
														<?if($this->data->invoice->items){?>
															<?foreach($this->data->invoice->items as $item){?>
																<tr>
																	<td style="vertical-align:middle;">
																		<?$this->load->view('admin/accounts/invoices/edit/partials/item-description',$item);?>
																	</td>
																	<td style="vertical-align:middle; text-align:center;">
																		<?$this->load->view('admin/accounts/invoices/edit/partials/item-amount',$item);?>
																	</td>
																	<td style="vertical-align:middle; text-align:center;">
																		<?$this->load->view('admin/accounts/invoices/edit/partials/item-options',$item);?>
																	</td>
																</tr>
															<?}?>
														<?}else{?>
															<tr>
																<td colspan="6" style="text-align:center; padding:50px;">
																	You have not added any items yet. <a href="<?=base_url();?>admin/accounts/<?=$this->data->invoice->account_id;?>/invoices/<?=$this->data->invoice->id;?>/charge">Click here</a> to add a new charge.
																</td>
															</tr>
														<?}?>
													</tbody>
												</table>
											</div><!-- end:div.span12 -->
										</div><!-- end:div.row -->
									</div><!-- end:div.span12 -->
								</div><!-- end:div-blank -->
							</div><!-- end:div.span12 -->
						</div>
					</div><!-- End:div.row -->
				</div><!-- end:div.container -->
				<div class="push"></div>
			</div><!-- end:wrapper -->
			<?$this->load->view('admin/common/footer');?>
		</div><!-- end:div.wrap-->
		<?$this->load->view('admin/common/javascript');?>
		<script type="text/javascript">
			$(document).ready(function(){
			
				$('table tr:last-child a.down').attr('disabled','disabled');
				$('table tr:first-child a.up').attr('disabled','disabled');
        
    $(".up,.down").click(function(e){
        var row = $(this).parents("tr:first");
        if ($(this).is(".up")) {
            row.insertBefore(row.prev());
        } else {
            row.insertAfter(row.next());
        }
        $('table tr a.down, table tr a.up').removeAttr('disabled');
        $('table tr:last-child a.down').attr('disabled','disabled');
        $('table tr:first-child a.up').attr('disabled','disabled');
        
        e.preventDefault();
    });
});
		</script>
	</body>
</html>