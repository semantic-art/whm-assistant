<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Users'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body>
		<div class="wrap">
			<div class="wrapper">
				<div class="container" style="padding-top:20px;">
					<?$this->load->view('admin/common/navigation',array('users'=>TRUE));?>
				</div>
				<div class="container">
				
		<div class="page-header">
				<h1>Users</h1>
			</div>
			<div class="row">
				<div class="span12">
						<div class="btn-toolbar well well-small">
							<div class="btn-group">
								<a href="<?=base_url();?>admin/utilities/users/add" class="btn btn-primary">
									<i class="icon-user icon-white"></i>
									Add a user
								</a>
							</div>
							<div class="btn-group pull-right">
								<a href="<?=base_url();?>admin/utilities/users" class="btn<?if(!isSet($_GET['f'])){echo" active";}?>">
									All
								</a>
								<a href="<?=base_url();?>admin/utilities/users/?f=active" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='active'){echo" active";}?>">
									Active
								</a>
								<a href="<?=base_url();?>admin/utilities/users/?f=inactive" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='inactive'){echo" active";}?>">
									Inactive
								</a>
							</div>
						</div>
				</div>
			</div><!-- End:div.row -->
			<div class="row">
				<div class="span12">
				
				<?if($this->data->users){?>
					<h4 style="border-bottom:1px solid #ccc; margin-bottom:20px; padding-bottom:10px;">Current staff</h4>
					<ul class="thumbnails">
						<?foreach($this->data->users as $user){?>
							<?if($user->status=='active'){?>
							<li class="span4 animated bounceIn">
								<a data-toggle="modal" data-target="#modal" data-remote="<?=base_url();?>admin/utilities/users/<?=$user->id;?>" href="<?=base_url();?>admin/utilities/users/<?=$user->id;?>" class="thumbnail" style="text-align:center;">
									<div style="background-color:#eee;">
										<img style="height:100px;" src="http://www.doppelme.com/100/TRANSPARENT/<?=$user->avatar;?>/crop.png" alt="">
									</div>
									<h3 class="animated fadeInDown"><?=$user->first_name;?> <?=$user->last_name;?></h3>
								</a>
							</li>
							<?}?>
						<?}?>
					</ul>
					<h4 style="border-bottom:1px solid #ccc; margin-bottom:20px; padding-bottom:10px;">Former staff</h4>
					<ul class="thumbnails">
						<?foreach($this->data->users as $user){?>
							<?if($user->status=='inactive'){?>
							<li class="span4 animated bounceIn">
								<a data-toggle="modal" data-target="#modal" data-remote="<?=base_url();?>admin/utilities/users/<?=$user->id;?>" href="<?=base_url();?>admin/utilities/users/<?=$user->id;?>" class="thumbnail" style="text-align:center;">
									<div style="background-color:#eee;">
										<img style="height:100px;" src="http://www.doppelme.com/100/TRANSPARENT/<?=$user->avatar;?>/crop.png" alt="">
									</div>
									<h3 class="animated fadeInDown"><?=$user->first_name;?> <?=$user->last_name;?></h3>
								</a>
							</li>
							<?}?>
						<?}?>
					</ul>
				<?}?>
				<?=$this->pagination->create_links();?>
				</div>
			</div><!-- End:div.row -->			
				
				</div><!-- end:div.container -->
				<div class="push"></div>
			</div><!-- end:wrapper -->
			<?$this->load->view('admin/common/footer');?>
		</div><!-- end:div.wrap-->
		
		<?if(isSet($this->data->user)){?>
			<div class="modal-backdrop"></div>
		<?}?>
		<div class="modal <?if(!isSet($this->data->user)){echo"hide fade";}?>" id="modal">
		
			
		
				<div class="modal-body" style="margin:0px; padding:0px; max-height:none;">
				
					<?
						if(isSet($this->data->user)){
							$this->load->view('admin/utilities/users/edit/view');
						}
					?>
				
					
				</div><!-- End:div.modal-body -->
				
			</div><!-- end:div.modal -->
		
		
		
		
		
		<?$this->load->view('admin/common/javascript');?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
			
				$('#str_first_name, #str_last_name').live('keyup',function(){
					$('#modal h3.pull-left span#label-name').html($('#str_first_name').val().toProperCase()+' '+$('#str_last_name').val().toProperCase());
				});
				$('#str_email').live('keyup',function(){
					$('#modal h3.pull-left span#label-email').html($('#str_email').val().toLowerCase());
				});
			
				$('#img_avatar').live('keyup',function(){
					$('#avatar_preview img').attr('src','http://www.doppelme.com/TRANSPARENT/'+$(this).val()+'/avatar.png');
					$('#avatar').attr('src','http://www.doppelme.com/TRANSPARENT/'+$(this).val()+'/crop.png');
				});
				
				
				$("form input").live('keyup',function(){
					$('#btn-savechanges').removeAttr('disabled');
				});
				
				$('#btn-savechanges').live('click',function(e){
					$('form div.indicator').show();
					$('#btn-savechanges').attr('disabled','disabled');
					$.post($("form").attr('action'),$("form").serialize(),function(data){
						if(data=='true'){
							$('form div.indicator').hide();
						}else{
							$('form div.indicator').hide();
							$('#btn-savechanges').removeAttr('disabled');
						}
					});
					e.preventDefault();
				});
				
				
				$('#btn-testconnection').live('click',function(e){
					$('form div.indicator').show();
					var btn = $('#btn-testconnection');
					btn.attr('disabled','disabled');
					$.post('<?=base_url();?>admin/utilities/users/test_email_connection',$("form").serialize(),function(data){
						if(data=='true'){
							$('form div.indicator').hide();
						}else{
							$('form div.indicator').hide();
							alert('Invalid SMTP details.');
						}
						btn.removeAttr('disabled');
					});
					e.preventDefault();
				});
				
			});
			
			
			
			
			String.prototype.toProperCase = function () {
				return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
			}
			
			String.prototype.firstUpperCase = function () {
				return this.charAt(0).toUpperCase() + this.slice(1);
			}
jQuery(document).ready(function(){			
	$("#str_newpassword").live("keyup",function(){
		var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
		var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
		var enoughRegex = new RegExp("(?=.{6,}).*", "g");
		var meter = $("#password_strenght");
		if($(this).val().length==0){
			meter.hide();
			meter.html('no password');
		}else if(false == enoughRegex.test($(this).val())) {
			meter.show();
			meter.html('insecure');
			meter.addClass('label-important').removeClass('label-success').removeClass('label-warning');
		}else if(strongRegex.test($(this).val())){
			meter.show();
			meter.html('secure');
			meter.addClass('label-success').removeClass('label-warning').removeClass('label-important');
		}else if(mediumRegex.test($(this).val())){
			meter.show();
			meter.html('safe');
			meter.addClass('label-warning').removeClass('label-success').removeClass('label-important');
		}else{
			meter.show();
			meter.addClass('label-important').removeClass('label-success').removeClass('label-warning');
		}
	}); 
});	
			
		</script>
	</body>
</html>