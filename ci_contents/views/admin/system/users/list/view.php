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
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="50">&nbsp;</th>
								<th>User</th>
								<th width="340">Email</th>
								<th width="100">Status</th>
								<th width="80"></th>
							</tr>
						</thead>
						<tbody>
							<?if($this->data->users){?>
							<?foreach($this->data->users as $user){?>
								<tr>
									<td style="vertical-align:middle; text-align:center;">
										<img src="http://www.doppelme.com/30/TRANSPARENT/<?=$user->avatar;?>/avatar.png" style="height:30px;"/>
									</td>
									<td style="vertical-align:middle;">
										<strong><?=$user->first_name;?> <?=$user->last_name;?></strong>
									</td>
									<td style="vertical-align:middle;">
										<?=$user->email;?>
									</td>
									<td style="vertical-align:middle;">
										<?if($user->status=='active'){?>
											<span class="label label-success" style="display:block; text-align:center; line-height:20px;">
												active
											</span>
										<?}else if($user->status=='inactive'){?>
											<span class="label" style="display:block; text-align:center; line-height:20px;">
												inactive
											</span>
										<?}?>
									</td>
									<td style="vertical-align:middle; text-align:center;">
										<div class="btn-group pull-right">
											<a href="<?=base_url();?>admin/system/users/<?=$user->id;?>" class="btn">
												Edit
											</a>
											<a href="<?=base_url();?>admin/system/users/delete/<?=$user->id;?>" class="btn">
												<i class="icon-trash"></i>
											</a>
										</div>
									</td>
								</tr>
							<?}?>
							<?}else{?>
								<tr>
									<td colspan="5" style="text-align:center; padding:50px;">
										No Users found...
									</td>
								</tr>
							<?}?>
						</tbody>
					</table>
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


