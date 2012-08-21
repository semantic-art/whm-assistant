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
								<a href="<?=base_url();?>admin/system/users/add" class="btn btn-primary">
									<i class="icon-user icon-white"></i>
									Add a user
								</a>
							</div>
							<div class="btn-group pull-right">
								<a href="<?=base_url();?>admin/system/users" class="btn<?if(!isSet($_GET['f'])){echo" active";}?>">
									All
								</a>
								<a href="<?=base_url();?>admin/system/users/?f=active" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='active'){echo" active";}?>">
									Active
								</a>
								<a href="<?=base_url();?>admin/system/users/?f=inactive" class="btn<?if(isSet($_GET['f'])&&$_GET['f']=='inactive'){echo" active";}?>">
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
							<li class="span4">
								<a href="<?=base_url();?>admin/system/users/<?=$user->id;?>" class="thumbnail" style="text-align:center;">
									<div style="background-color:#eee;">
										<img src="http://www.doppelme.com/100/TRANSPARENT/<?=$user->avatar;?>/crop.png" alt="">
									</div>
									<h3><?=$user->first_name;?> <?=$user->last_name;?></h3>
								</a>
							</li>
							<?}?>
						<?}?>
					</ul>
					<h4 style="border-bottom:1px solid #ccc; margin-bottom:20px; padding-bottom:10px;">Former staff</h4>
					<ul class="thumbnails">
						<?foreach($this->data->users as $user){?>
							<?if($user->status=='inactive'){?>
							<li class="span4">
								<a href="<?=base_url();?>admin/system/users/<?=$user->id;?>" class="thumbnail" style="text-align:center;">
									<div style="background-color:#eee;">
										<img src="http://www.doppelme.com/100/TRANSPARENT/<?=$user->avatar;?>/crop.png" alt="">
									</div>
									<h3><?=$user->first_name;?> <?=$user->last_name;?></h3>
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
		<?$this->load->view('admin/common/javascript');?>
	</body>
</html>


