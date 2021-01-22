<header class="row_top introduce mh100pt">
	<?php $this->load->view("front/template/default/main_menu.php");?>
	<div class="introduce_hieght">
		<div class="page-container slider">
			<div class="the-banner">
				<div class="bg_image_banner" style="background-image: url(<?= my_library::base_file().'page/'.$myPage['page_picture']?>);"></div>
				<div class="title">
					<div class="table-container">
						<div class="table-inner">
							<div class="table_color_inner mt200">
								<h1 class="color_fff title_inner"><?= $myPage['page_title']?></h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<main id="main_down">
	<div class="topic-body-introduce fs13em">
		<div class="topic-body-row1 mt30 ">	
			<div class="container">
				<div class="introduce-item mb40">
					<div class="row">
						<div class="col-xs-12">
							<p class="fs12em">
								<?php if (isset($about_us)): ?>
									<em><strong><?= strip_tags($about_us['sc_description'])?></strong></em>
								<?php endif ?>
							</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="topic-body-row3 mb40" >	
			<div class="container">
				<div class="row flex_center">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 hidden-xs">
						<img src="<?= my_library::base_front()?>images/MLV LOGO NEW print version.png" alt="" width="100%">
					</div>
					<?php if (isset($why_choose_us)): ?>
						<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
							<div class="title-header text-left">
								<h2 class="mb20 mt0" style="text-transform: uppercase;"><?= $why_choose_us['sc_name']?></h2>
							</div>
							<?= $why_choose_us['sc_description']?>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>	
		<div class="topic-body-row2 pt40 pb40"  style="background-image: url(<?= my_library::base_front()?>images/Quebec-2.jpg);">	
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row flex_center">
							<?php if (isset($slogans)): ?>
								<?php foreach ($slogans as $value): ?>
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<div class="mvs">
											<div class="title-header text-center">
												<h3 class="mb20 color_fff"><?= $value['sc_name']?></h3>
											</div>
											<p class="color_fff"><?= strip_tags($value['sc_description'])?></p>
										</div>
									</div>
								<?php endforeach ?>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="topic-body-row5 pb40 pt40">	
			<div class="container">
				<?php if (isset($team)): ?>
					<div class="title-header text-center">
						<h2 class="mb20" style="text-transform: uppercase;"><?= $team['sc_name']?></h2>
					</div>
					<?= $team['sc_description']?>
				<?php endif ?>
			</div>
		</div>
		<div class="topic-body-row6 pt40 pb40" >	
			<div class="title-header text-center">
				<h1 class="mall0 color_fff" style="text-transform: uppercase;"><?= $category_specialists['category_name']?></h1>
			</div>
			<div class="container">
				<div class="row mt25">
					<div class="expert flex_wrap mt40">
						<?php if (isset($listSpecialists)): ?>
							<?php foreach ($listSpecialists as $value): ?>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<div class="expert_inner">
										<div class="panel" id="panel">
											<div class="panel-headding pall0">
												<a><img src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" alt="<?= $value['news_title']?>" width="100%"></a>
											</div>
											<div class="panel-body">
												<div class="name_expert">
													<h4 class="font-size18px mt0"><strong><?= $value['news_title']?></strong></h4>
													<h4 class="fs14px"><?= $value['news_summary']?></h4>
												</div>
											</div>
											<div class="panel-footer">
												<div class="media">
													<a class="pull-left">
														<div class="avater_expert">
															<img class="media-object" src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" alt="<?= $value['news_title']?>" width="100%">
														</div>
													</a>
													<div class="media-body">
														<h4 class="mt0"><strong><?= $value['news_title']?></strong></h4>
														<div class="fs12px"><?= $value['news_summary']?></div>
													</div>
												</div>
												<div class="detail_expert">
												<div class="fs13px"><?= $value['news_detail']?></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>