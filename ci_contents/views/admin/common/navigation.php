<div class="navbar navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="#">
				whm assistant
			</a>
			<ul class="nav">
				<!--
				<li<?if(isSet($dashboard)){echo" class=\"active\"";}?>>
					<a href="<?=base_url();?>admin/dashboard">
						Dashboard
					</a>
				</li>
				-->
				<li<?if(isSet($accounts)){echo" class=\"active\"";}?>>
					<a href="<?=base_url();?>admin/accounts">
						Accounts
					</a>
				</li>
				<!--
				<li>
					<a href="<?=base_url();?>">
						Support
					</a>
				</li>
				<li>
					<a href="<?=base_url();?>">
						Reports
					</a>
				</li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle<?if(isSet($utilities)){echo" class=\"active\"";}?>" data-toggle="dropdown">
						Utilities
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">
								Market place
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								Domain lookup
							</a>
						</li>
						<li>
							<a href="#">
								Domain resolver
							</a>
						</li>
						<li>
							<a href="#">
								hosting resolver
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								Export / Import data
							</a>
						</li>
						<li>
							<a href="#">
								Backups / Cloud
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								Remote connections
							</a>
						</li>
						<li>
							<a href="#">
								Integrating nodes
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								Activity logs
							</a>
						</li>
						<li>
							<a href="#">
								System information
							</a>
						</li>
						<li>
							<a href="#">
								System updates
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="<?=base_url();?>admin/utilities/servers">
								Servers
							</a>
						</li>
						<li>
							<a href="#">
								System settings
							</a>
						</li>
						</ul>
					</li>
					-->
			</ul>
			
			
			<ul class="nav pull-right">
				<li class="divider-vertical"></li>
				
				
			
				<?if(isSet($users)){?>
				<li class="active">
					<a href="<?=base_url();?>admin/utilities/users" rel="tooltip" title="User profiles" data-delay="1000" data-placement="bottom">
						<i class="icon-user icon-white"></i>
					</a>
				</li>
				<?}else{?>
					<li>
						<a href="<?=base_url();?>admin/utilities/users/<?=$this->user->id;?>" rel="tooltip" title="Your profile" data-delay="1000" data-placement="bottom">
							<i class="icon-user icon-white"></i>
						</a>
					</li>	
				<?}?>
				<li class="divider-vertical"></li>
				<li>
					<a href="<?=base_url();?>admin/signout">Sign out</a>
				</li>
			</ul>
			
			
			<!--

							'Search'=>'search/',
							'Dashboard'=>array(0,0,'dashboard/'),
							'Emails'=>array(0,0,'emails/inbox/',array(
								'Compose Email'=>'emails/compose/',
								'split_1'=>'splitter',
								'Inbox'=>array('emails/inbox/',2),
								'Sent Box'=>'emails/sent/',
								'split_2'=>'splitter',
								'Email Settings'=>'emails/settings/'
								)),
							'Services'=>array(0,0,'services/view/all/',array(
								'Add New Service'=>'services/new_service/',
								'split_1'=>'splitter',
								'Due Services'=>'services/view/due/',
								'split_2'=>'splitter',
								'List Active'=>'services/view/active/',
								'List Inactive'=>'services/view/inactive/',
								'List Suspended'=>'services/view/suspended/',
								'List Overdue'=>'services/view/overdue/',
								'List Final Notice'=>'services/view/final-notice/',
								'List Pending'=>'services/view/pending/',
								'split_3'=>'splitter',
								'List Hosting'=>'services/view/hosting/',
								'List Domain'=>'services/view/domain/',
								'split_4'=>'splitter',
								'List All'=>'services/view/all/'
								)),
							'Support'=>array(0,0,'support/view/all/',array(
								'Add New Ticket'=>'support/new_ticket/',
								'split_1'=>'splitter',
								'List New'=>array('support/view/new/',0),
								'List Replyed'=>'support/view/replyed/',
								'List Complete'=>'support/view/complete/',
								'List Awaiting Action'=>array('support/view/awaiting-action/',0),
								'split_2'=>'splitter',
								'List All'=>'support/view/all/'
								)),
							'Projects'=>array(0,0,'projects/view/all/',array(
								'Add New Project'=>'projects/new_project/',
								'split_1'=>'splitter',
								'List New'=>'projects/view/new/',
								'List Incomplete'=>'projects/view/incomplete/',
								'List Complete'=>'projects/view/complete/',
								'List Overdue'=>'projects/view/overdue/',
								'split_2'=>'splitter',
								'List All'=>'projects/view/all/'
								)),
							'Reports'=>array(0,0,'reports/',array(
								'Add New Report'=>'reports/new_report/',
								'split_1'=>'splitter',
								'Annual Income Report'=>'reports/view/report-1/',
								'Annual Expenses Report'=>'reports/view/report-2/',
								'split_2'=>'splitter',
								'List All'=>'reports/'
								)),
							'Utilities'=>array(0,0,'utilities/',array(
								'Market Place'=>'utilities/market_place/',
								'split_0'=>'splitter',
								'Expenses'=>'expenses/',
								'Documents'=>'utilities/documents/',
								'split_1'=>'splitter',
								'Domain Lookup'=>'utilities/domain_lookup/',
								'Domain Resolver'=>'utilities/domain_resolver/',
								'Hosting Resolver'=>'utilities/hosting_resolver/',
								'split_2'=>'splitter',
								'Export Data'=>'utilities/export_data/',
								'Import Data'=>'utilities/import_data/',
								'Database Backups'=>'utilities/database_backups/',
								'Merge Accounts'=>'utilities/merge_accounts/',
								'Remote Connections'=>'utilities/remote_connections/',
								'Intergration Nodes'=>'utilities/intergration_nodes/',
								'split_3'=>'splitter',
								'Activity Logs'=>'utilities/activity_logs/',
								'System Information'=>'utilities/system_information/',
								'System Updates'=>'utilities/system_updates/',
								'split_4'=>'splitter',
								'Servers'=>'utilities/servers/',
								'System Settings'=>'utilities/system_settings/'
								)),
							'Apps'=>array(0,0,'apps/',array()),
							'Sign Out'=>array(1,0,'sign_off/'),
							'Messenger'=>'messenger/'
							);-->
		</div>
	</div>
</div>