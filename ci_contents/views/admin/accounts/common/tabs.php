<div class="row">
	<div class="span12">
		<ul class="nav nav-tabs">
			<li<?if(isSet($overview)){echo" class=\"active\"";}?> class="disabled">
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>">Overview</a>
			</li>
			<li<?if(isSet($edit)){echo" class=\"active\"";}?> class="disabled">
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/edit">Edit</a>
			</li>
			<li<?if(isSet($invoices)){echo" class=\"active\"";}?>>
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/invoices">Invoices</a>
			</li>
			<li<?if(isSet($hosting)){echo" class=\"active\"";}?> class="disabled">
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/hosting">Hosting</a>
			</li>
			<li<?if(isSet($domains)){echo" class=\"active\"";}?> class="disabled">
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/domains">Domains</a>
			</li>
			<li<?if(isSet($projects)){echo" class=\"active\"";}?> class="disabled">
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/projects">Projects</a>
			</li>
			<li<?if(isSet($support)){echo" class=\"active\"";}?> class="disabled">
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/support">Support</a>
			</li>
			<li class="pull-right<?if(isSet($corrospondence)){echo" active";}?> disabled">
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/corrospondence">Corrospondence</a>
			</li>
			<li class="pull-right<?if(isSet($contacts)){echo" active";}?> disabled">
				<a href="<?=base_url();?>admin/accounts/<?=$this->data->account->id;?>/contacts">Contacts</a>
			</li>
            </ul>
        </div>
    </div><!-- End:div.row -->       
    
