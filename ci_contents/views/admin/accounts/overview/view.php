<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Overview'
				)
			);
			$this->load->view('admin/common/css');
		?>
	</head>
	<body>
		<div class="wrap">
			<div class="wrapper">
				<div class="container" style="padding-top:20px;">
					<?$this->load->view('admin/common/navigation',array('accounts'=>TRUE));?>
				</div>
				<div class="container">
					<?$this->load->view('admin/accounts/common/name');?>
					<?$this->load->view('admin/accounts/common/tabs',array('overview'=>TRUE));?>
					<?$this->load->view('admin/accounts/overview/partials/toolbar');?>
					<div class="row">
						<div class="span8">
							<div class="row">
								<div class="span8">
									<div class="well">
										<div id="chart-revenue" style="width:100%; height: 295px;">
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
										</div><!-- end:div#chart-revenue -->
									</div><!-- end:div.well -->
								</div><!-- end:div.span8 -->
							</div><!-- end:div.row -->
							<div class="row">
								<div class="span4">
									<div class="well" style="text-align:center;">
										<div id="chart-i" style="width:100%; height: 50px;">
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
										</div><!-- end:div#chart-i -->
									</div><!-- end:div.well -->
								</div><!-- end:div.span4 -->
								<div class="span4">
									<div class="well" style="text-align:center;">
										<strong style="display:block; font-size:10px;">This year</strong>
										<span class="lead">5,000.00</span>
									</div><!-- end:div.well -->
								</div><!-- end:div.span4 -->
							</div><!-- end:div.row -->
						</div><!-- end:div.span8 -->
						<div class="span4">
							<div class="row">
								<div class="span2">
									<div class="well" style="text-align:center;">
										<strong style="display:block; font-size:10px;">This year</strong>
										<span class="lead">5,000.00</span>
									</div><!-- end:div.well -->
								</div><!-- end:div.span2 -->
								<div class="span2">
									<div class="well" style="text-align:center;">
										<strong style="display:block; font-size:10px;">Overall income</strong>
										<span class="lead">12,021.00</span>
									</div><!-- end:div.well -->
								</div><!-- end:div.span2 -->
							</div><!-- end:div.row -->
							<div class="row">
								<div class="span2">
									<div class="well" style="text-align:center;">
										<strong style="display:block; font-size:10px;">Domains names</strong>
										<span class="lead">32</span>
									</div><!-- end:div.well -->
								</div><!-- end:div.span2 -->
								<div class="span2">
									<div class="well" style="text-align:center;">
										<strong style="display:block; font-size:10px;">Hosting accounts</strong>
										<span class="lead">4</span>
									</div><!-- end:div.well -->
								</div><!-- end:div.span2 -->
							</div><!-- end:div.row -->
							<div class="row">
								<div class="span4">
									<div class="well">
										<div id="chart-line" style="width:100%; height: 185px;">
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
										</div><!-- end:div#chart-line -->
									</div><!-- end:div.well -->
								</div><!-- end:div.span4 -->
							</div><!-- end:div.row -->
						</div><!-- end:div.span4 -->
					</div><!-- end:div.row -->
					<div class="row">
						<div class="span3">
							<div class="well" style="text-align:center;">
								<strong style="display:block; font-size:10px;">This year</strong>
								<span class="lead">5,000.00</span>
							</div><!-- end:div.well -->
						</div><!-- end:div.span3 -->
						<div class="span3">
							<div class="well" style="text-align:center;">
								<strong style="display:block; font-size:10px;">Overall income</strong>
								<span class="lead">12,021.00</span>
							</div><!-- end:div.well -->
						</div><!-- end:div.span3 -->
						<div class="span3">
							<div class="well" style="text-align:center;">
								<strong style="display:block; font-size:10px;">Overall income</strong>
								<span class="lead">12,021.00</span>
							</div><!-- end:div.well -->
						</div><!-- end:div.span3 -->
						<div class="span3">
							<div class="well">
								<strong style="display:block; font-size:10px;">Overall income</strong>
								<span class="lead">12,021.00</span>
							</div><!-- end:div.well -->
						</div><!-- end:div.span3 -->
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
			var chart2; // globally available
			var chart3; // globally available
			$(document).ready(function() {
				chart1 = new Highcharts.Chart({
					title: {
						text: 'Revenue'
					},
					chart: {
						renderTo: 'chart-revenue',
						type: 'area'
					},
					xAxis: {
						categories: ['2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012']
					},
					yAxis: {
						title: {
							text: 'Revenue'
						}
					},
					series: [{
						name: 'Projects',
						data: [<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>]
					},{
						name: 'Hosting',
						data: [<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>]
					},{
						name: 'Domains',
						data: [<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>,<?=rand(0,1000);?>]
					}]
				});
				chart2 = new Highcharts.Chart({
					title: {
						text: 'Revenue split'
					},
					chart: {
						renderTo: 'chart-line',
						type: 'pie'
					},
					yAxis: {
						title: {
							text: 'Revenue'
						}
					},
					series: [{
						type: 'pie',
						data: [
						['Projects',   45.0],
						['Hosting',       26.8],
						['Domains',    8.5]
			]
		}]
				});
			});
		</script>
	</body>
</html>