<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script> 
<script>window.jQuery || document.write("<script src='<?=$this->assets->url('jQuery-1.7.2.min.js','framework');?>'>\x3C/script>")</script> 

<?=$this->assets->load('bootstrap.min.js','framework');?>
<?
	if(!isSet($javascript_dependencies)||!is_array($javascript_dependencies)){
		$javascript_dependencies = array(
			'bootstrap.component.prettify.js'=>'framework',
			'bootstrap.component.datepicker.js'=>'framework',
			'bootstrap.component.colorpicker.js'=>'framework',
			'bootstrap.component.wysiwyg5.js'=>'framework',
			'bootstrap.component.wysiwyg.js'=>'framework',
			'global.js'=>'admin'
		);
	}
	foreach($javascript_dependencies as $script=>$folder){
		echo $this->assets->load($script,$folder);
	}	
	
?>