<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Dashboard'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body>
		<div class="wrap">
			<div class="wrapper">
			
				<div class="container" style="padding-top:20px;">
					<?$this->load->view('admin/common/navigation',array('dashboard'=>TRUE));?>
				</div>
				<div class="container">
					<div class="page-header">
						<h1>Dashboard</h1>
					</div><!-- end:div.page-header -->
					<div class="row">
						<div class="span12">
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#">Live</a>
								</li>
								<li><a href="#">Last month</a></li>
								<li><a href="#">Last year</a></li>
							</ul>
						</div><!-- end:div.span12 -->
					</div><!-- end:div.row -->
					<div class="row">
						<div class="span6">
							<div class="well well-small">
								<div id="chart1" style="width:100%; height: 225px;">
									<div class="indicator" style="height:20px; width:20px;">
										<div class="bar1"></div>
										<div class="bar2"></div>
										<div class="bar3"></div>
										<div class="bar4"></div>
										<div class="bar5"></div>
										<div class="bar6"></div>
										<div class="bar7"></div>
										<div class="bar8"></div>
										<div class="bar9"></div>
										<div class="bar10"></div>
										<div class="bar11"></div>
										<div class="bar12"></div>
									</div><!-- end:div.indicator -->
								</div><!-- end:div#chart1 -->
							</div><!-- end:div.well -->
						</div><!-- end:div.span6 -->
						<div class="span6">
							<div class="well well-small">
								<div id="chart2" style="width:100%; height: 225px;">
									<div class="indicator" style="height:20px; width:20px;">
										<div class="bar1"></div>
										<div class="bar2"></div>
										<div class="bar3"></div>
										<div class="bar4"></div>
										<div class="bar5"></div>
										<div class="bar6"></div>
										<div class="bar7"></div>
										<div class="bar8"></div>
										<div class="bar9"></div>
										<div class="bar10"></div>
										<div class="bar11"></div>
										<div class="bar12"></div>
									</div><!-- end:div.indicator -->
								</div><!-- end:div#chart2 -->
							</div><!-- end:div.well -->
						</div><!-- end:div.span6 -->
					</div><!-- end:div.row -->
				</div><!-- end:div.container -->
				<div class="push"></div>
			</div><!-- end:wrapper -->
			<?$this->load->view('admin/common/footer');?>
		</div><!-- end:div.wrap-->
		<?$this->load->view('admin/common/javascript');?>
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			var chart1; // globally available
			$(document).ready(function() {
			chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'chart1',
            type: 'bar'
         },
         title: {
            text: 'Fruit Consumption'
         },
         xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
         },
         yAxis: {
            title: {
               text: 'Fruit eaten'
            }
         },
         series: [{
            name: 'Jane',
            data: [1, 0, 4]
         }, {
            name: 'John',
            data: [5, 7, 3]
         }]
      });
   });
		</script>
	</body>
</html>