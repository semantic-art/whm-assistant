<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Send'
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
					<h3>Send</h3>
				</div>
				<div class="modal-body">
					
					<div class="clearfix">
									
									<div class="control-group" style="float:left; width:50%; margin:0px; padding:0px;">
										<label class="control-label" for="opt_sendto">To:</label>
										<div class="controls">
											<select id="opt_sendto" name="opt_sendto">
												<optgroup label="Primary contact">
													<?$count=0;foreach($this->data->contacts as $contact){?>
														<?if($contact->primary=='true'){?>
														<option value="<?=$contact->id;?>" SELECTED><?=$contact->first_name;?> <?=$contact->last_name;?></option>
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
												<optgroup label="Staff">
													<?foreach($this->data->users as $user){?>
													<option value="<?=$user->email;?>"><?=$user->first_name;?> <?=$user->last_name;?></option>
													<?}?>
												</optgroup>	
											</select>
										</div>
									</div><!-- end:div.control-group -->
									
									<div class="control-group" style="float:left; width:50%; margin:0px; padding:0px;">
										<label class="control-label" for="str_due_date">Subject:</label>
										<div class="controls">
											<input type="text" id="str_subject" name="str_subject" value="Invoice #<?=$this->data->invoice->id;?> - <?=date('m/d/Y',strtotime($this->data->invoice->date_due));?> - example company"/>
										</div>
									</div><!-- end:div.control-group -->
									
					</div>
					<hr/>
									
					
					<div class="well well-small" style="margin:0px;">
						<div class="html-field">
						<textarea style="width:98%; height:100px;" id="txt_email" name="txt_email" placeholder="">
							<?=$this->data->email_template;?>
						</textarea>
						</div>
						<div class="file-drop" style="margin:0px;">
							<a target="_new" href="<?=base_url();?>admin/accounts/<?=$this->data->invoice->account_id;?>/invoices/<?=$this->data->invoice->id;?>/preview">
								<img style="height:40px; float:left; margin-right:10px;" src="<?=$this->assets->url('file-icons/pdf.png','framework');?>" />
								<strong>Invoice-<?=$this->data->invoice->id;?>.pdf</strong><br>
								<span><?=$this->data->invoice->size;?></span>
							</a>
						</div>
					</div>
									
									
									
					
					
				</div><!-- End:div.modal-body -->
				<div class="modal-footer">
					<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/<?=$this->data->invoice->id;?>" class="btn">Cancel</a>
					<button type="submit" class="btn btn-primary">Send</button>
				</div><!-- end:div.modal-footer -->
			</div><!-- end:div.modal -->
		</form>
		<?$this->load->view('admin/common/javascript');?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				var editorInstance = $('#txt_email').wysihtml5(
					{"font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
					"emphasis": true, //Italics, bold, etc. Default true
					"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
					"html": true, //Button which allows you to edit the generated HTML. Default false
					"link": true, //Button to insert a link. Default true
					"image": false //Button to insert an image. Default true
				});
			});
		</script>
	</body>
</html>
