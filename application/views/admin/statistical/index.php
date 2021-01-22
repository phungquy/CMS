<script src="<?= my_library::admin_js()?>chart.min.js"></script>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><?= $title?></h3>
			</div>
			<div class="title_right hidden-xs">
				<ol class="breadcrumb pull-right">
					<li class="breadcrumb-item"><a href="<?= my_library::admin_site()?>"><?= lang('dashboard')?></a></li>
					<li class="breadcrumb-item active"><?= $title?></li>
				</ol>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<form class="form-horizontal form-label-left" method="get">
							<div class="form-group">
								<label class="control-label" for="year"><?= lang('year')?></label>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<input type="number" class="form-control" name="year" value="<?= $year?>">
				                </div>
				                <button type="submit" class="btn btn-success" style="height: 34px;"><?= lang('view')?></button>
				                <label class="control-label"><?= lang('total').$totalNews?></label>
							</div>
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<canvas id="myChartMonths"></canvas>
							<h3 class="text-center text-success"><?= lang('quantitymonth')?></h3>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 20px;">
							<canvas id="myChartCategory"></canvas>
							<h3 class="text-center text-success"><?= lang('quantitycategory')?></h3>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 20px;">
							<canvas id="myChartUser"></canvas>
							<h3 class="text-center text-success"><?= lang('quantityuser')?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	//Bài theo tháng trong năm
	var ctxMonths = document.getElementById('myChartMonths').getContext('2d');
	var labels = ["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"];
	if (configs.lang == "english") {
		labels = ["January","February","March","April","May","June","July","August","September","October","November","December"];
	}
	new Chart(ctxMonths, {
	    type: 'bar',
	    data: {"labels":labels,"datasets":[{"label":"<?= lang('newsquantity')?>","data":[<?= $listNewsinYear[1]?>,<?= $listNewsinYear[2]?>,<?= $listNewsinYear[3]?>,<?= $listNewsinYear[4]?>,<?= $listNewsinYear[5]?>,<?= $listNewsinYear[6]?>,<?= $listNewsinYear[7]?>,<?= $listNewsinYear[8]?>,<?= $listNewsinYear[9]?>,<?= $listNewsinYear[10]?>,<?= $listNewsinYear[11]?>,<?= $listNewsinYear[12]?>],"fill":false,"backgroundColor":"rgba(75, 192, 192, 0.2)","borderColor":"rgba(39, 174, 96,1.0)","borderWidth":1}]},
	    options:{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}
	});

	//Bài theo danh mục
	var ctxCategory = document.getElementById('myChartCategory').getContext('2d');
	new Chart(ctxCategory, {
	    type: 'doughnut',
	    data: {"labels":[<?= $labelsCategory?>],"datasets":[{"data":[<?= $dataCategory?>],"backgroundColor":[<?= $colorCategory?>]}]}
	});

	//Bài theo nhân viên
	var ctxUser = document.getElementById('myChartUser').getContext('2d');
	new Chart(ctxUser, {
	    type: 'doughnut',
	    data: {"labels":[<?= $labelsUser?>],"datasets":[{"data":[<?= $dataUser?>],"backgroundColor":[<?= $colorUser?>]}]}
	});
</script>