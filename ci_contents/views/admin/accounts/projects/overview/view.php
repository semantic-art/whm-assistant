<!DOCTYPE html>
<html lang="en">
	<head>
		<?
			$this->load->view(
				'admin/common/meta',
				array(
					'title'=>'Project '
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
					<?$this->load->view('admin/accounts/common/tabs',array('projects'=>TRUE));?>
					
					
					<div class="row" style="margin-bottom:20px; margin-top:10px;">
						<?$this->load->view('admin/accounts/projects/common/sidebar',array('overview'=>TRUE));?>
						<div class="span9">
							<?$this->load->view('admin/accounts/projects/overview/partials/toolbar');?>
							<div class="row">
								<div class="well span9" style="padding:0px; margin-left:20px;">
									<div class="row">
										<div class="span2" style="height:60px;">
											<div style="margin-left:20px; margin-top:8px; border-right:1px solid #666;">
												<div>Billable:</div>
												<h4 style="margin:0px;">$32,323.32</h4>
											</div>
										</div><!-- end:div.span2 -->
										<div class="span2">
											<div style="margin-left:10px; margin-top:8px; border-right:1px solid #666;">
												<div>Hours:</div>
												<h4 style="margin:0px;">542 Hrs</h4>
											</div>
										</div><!-- end:div.span2 -->
										<div class="span2">
											<div style="margin-left:10px; margin-top:8px; border-right:1px solid #666;">
												<div>Due:</div>
												<h4 style="margin:0px;">06/06/2012</h4>
											</div>
										</div><!-- end:div.span2 -->
										<div class="span2">
											<div style="margin-left:10px; margin-top:8px; border-right:1px solid #666;">
												<div>Status:</div>
												<h4 style="margin:0px;">On track</h4>
											</div>
										</div><!-- end:div.span2 -->
										<div class="span1">
											<div class="progress progress-striped progress-warning" style="margin-right:20px; margin-top:20px;">
												<div class="bar" style="width: 20%;"></div>
											</div>
										</div><!-- end:div.span1 -->
									</div><!-- end:div.row -->
								</div><!-- end:div.span9 -->
							</div><!-- end:div.row -->
							<div class="row">
								<div class="span9">
									<hr style="margin-top:0px;"/>
									<div class="well well-small">
										<div id="activity-chart" style="width:100%; height: 250px;">
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
									<hr/>
								</div><!-- end:div.span9 -->
							</div><!-- end:div.row -->
							<div class="row">
								<div class="span4">
									<div class="well well-small">
										<div id="chart-line2" style="width:100%; height: 185px;">
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
								<div class="span5">
									<div class="well well-small">
										<div id="chart-line3" style="width:100%; height: 185px;">
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
							
							
						</div><!-- end:div.span9 -->
					</div><!-- end:div.row -->
				
					
					
					
				</div><!-- end:div.container -->
				<div class="push"></div>
			</div><!-- end:wrapper -->
			<?$this->load->view('admin/common/footer');?>
		</div><!-- end:div.wrap-->
		<?$this->load->view('admin/common/javascript');?>
		<script type="text/javascript">
			var chart1; // globally available
			var chart2; // globally available
			var chart3; // globally available
			$(document).ready(function() {
				
				
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'activity-chart',
			type: 'line',
			marginRight: 0,
			marginBottom: 70
		},
		title: {
			text: 'Project activity',
			x: -20 //center
		},
		xAxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
				'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		},
		yAxis: {
			title: {
				text: 'Milestones'
			},
			plotLines: [{
				value: 0,
				width: 1,
				color: '#808080'
			}]
		},
		tooltip: {
			formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+''+ this.y +' Hours';
			}
		},
		legend: {
			
		},
		series: [{
			name: 'Brad Martin',
			data: [<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>]
		}, {
			name: 'Olivia Vincent',
			data: [<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>]
		}, {
			name: 'Jai Edwards',
			data: [<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>,<?=rand(0,100);?>]
		}]
	});	
			});
		</script>
	</body>
</html>