<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Add charge'
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
					<h3>Charge</h3>
				</div>
				<div class="modal-body">
				
					<?if(validation_errors()){?>
						<div class="alert alert-warning">
							<button class="close" data-dismiss="alert">&times;</button>
							Please complete the required fields.
							<?=validation_errors();?>
						</div>
					<?}?>
					
					<div class="control-group">
						<label class="control-label" for="str_date_created">Date:</label>
						<div class="controls">
							<div class="input-prepend" style="margin:0px;"><span class="add-on"><i class="icon-calendar"></i></span><input type="text" class="date-input" id="str_date_created" name="str_date_created" data-date-format="mm/dd/yyyy" value="<?=date('m/d/Y');?>"/></div>
							<p class="help-block"></p>
						</div>
					</div><!-- end:div.control-group -->
									
					<div class="control-group">
						<label class="control-label" for="str_amount">Amount:</label>
						<div class="controls">
							<div class="input-prepend" style="margin:0px;"><span class="add-on">$</span><input type="text" id="str_amount" name="str_amount" value="0.00"/></div>
							<p class="help-block"></p>
						</div>
					</div><!-- end:div.control-group -->
					
					<div class="control-group">
										<label class="control-label" for="opt_linked">Linked:</label>
										<div class="controls">
											<select id="opt_linked" name="opt_linked">
												<option value="false">None</option>
												<?if($this->data->domains){?>
													<optgroup label="Domains">
														<?foreach($this->data->domains as $domain){?>
															<option data-kind="domain" data-cost="50.00" data-domain="<?=$domain->domain;?>" value="D<?=$domain->id;?>"><?=$domain->domain;?></option>
														<?}?>
													</optgroup>
												<?}?>
												<?if($this->data->hosting){?>
													<optgroup label="Hosting">
														<?foreach($this->data->hosting as $hosting){?>
															<option data-kind="hosting" data-cost="120.00" data-package="<?=$hosting->package_id;?>" value="H<?=$hosting->id;?>"><?=$hosting->username;?> - <?=$hosting->domain;?></option>
														<?}?>
													</optgroup>
												<?}?>
												<?if($this->data->projects){?>
													<optgroup label="Projects">
														<?foreach($this->data->projects as $project){?>
															<option data-kind="project" data-cost="5000.00" data-project-name="<?=$project->name;?>" data-project-items="Loads|A list of services rendered|From the project manager" value="P<?=$project->id;?>"><?=$project->name;?></option>
														<?}?>
													</optgroup>
												<?}?>
											</select>
										</div>
									</div><!-- end:div.control-group -->
					
					
					<hr/>
					<div class="well well-small" style="margin:0px;">
					
						<div class="html-field">
							<textarea style="width:98%; height:100px;" id="txt_description" name="txt_description" placeholder=""></textarea>
						</div>
					
					</div>
				</div><!-- End:div.modal-body -->
				<div class="modal-footer">
					<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices/<?=$this->data->invoice->id;?>" class="btn">Cancel</a>
					<button type="submit" class="btn btn-primary">Add charge</button>
				</div><!-- end:div.modal-footer -->
			</div><!-- end:div.modal -->
		</form>
		<?$this->load->view('admin/common/javascript');?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				var editorInstance = $('#txt_description').wysihtml5(
					{"font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
					"emphasis": true, //Italics, bold, etc. Default true
					"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
					"html": true, //Button which allows you to edit the generated HTML. Default false
					"link": false, //Button to insert a link. Default true
					"image": false //Button to insert an image. Default true
				});
				editorInstance.focus();
				
				
				
				$('#opt_linked').change(function(){
					if($('#txt_description').val()==''){
						var wysihtml5Editor = editorInstance.data("wysihtml5").editor;
						var data = $('#opt_linked option[value='+$(this).val()+']');
						$('#str_amount').val(data.attr('data-cost'));
						if(data.attr('data-kind')=='domain'){
							wysihtml5Editor.composer.commands.exec("insertHTML", "<b>Domain: </b> <br/><ul><li>Domain registration: "+data.attr('data-domain')+"</li><li>Period: 00-00-0000 to 00-00-0000</li></ul>");
						}else if(data.attr('data-kind')=='hosting'){
							wysihtml5Editor.composer.commands.exec("insertHTML", "<b>Hosting: </b> <br/><ul><li>Package: "+data.attr('data-package')+"</li><li>Expiry: </li></ul>");
						}else if(data.attr('data-kind')=='project'){
							var items = data.attr('data-project-items');
							items = items.split('|');
							var htmloutput = "";
							for (x in items){
								htmloutput = htmloutput + "<li>"+items[x]+"</li>";
							}
							wysihtml5Editor.composer.commands.exec("insertHTML", "<b>Project: </b> "+data.attr('data-project-name')+'<br/><ul>'+htmloutput+'</ul>');
						}
					}
				});
			});
		</script>
	</body>
</html>


