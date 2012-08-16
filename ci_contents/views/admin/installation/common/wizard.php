<ul class="breadcrumb wizard <?if(isSet($wizard_connections)){echo" last";}?>">
	<li<?if(isSet($wizard_terms)){echo" class=\"active\"";}?>>
		<a href="<?=base_url();?>admin/installation/terms">
			<span class="step">1.</span> <span>Terms</span><span class="wizard-arrow"></span>
		</a>
	</li>
	<li<?if(isSet($wizard_database)){echo" class=\"active\"";}?>>
		<a href="<?=base_url();?>admin/installation/database">
			<span class="step">2.</span> <span>Database</span><span class="wizard-arrow"></span>
		</a>
	</li>
	<li<?if(isSet($wizard_modules)){echo" class=\"active\"";}?>>
		<a href="<?=base_url();?>admin/installation/modules">
			<span class="step">3.</span> <span>Modules</span><span class="wizard-arrow"></span>
		</a>
	</li>
	<li<?if(isSet($wizard_admin)){echo" class=\"active\"";}?>>
		<a href="<?=base_url();?>admin/installation/admin">
			<span class="step">4.</span> <span>Admin</span><span class="wizard-arrow"></span>
		</a>
	</li>
</ul>
