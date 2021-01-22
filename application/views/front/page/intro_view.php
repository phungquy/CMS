<header class="row_top introduce h300px" style="background-image: url(<?= my_library::base_file().'page/'.$myPage['page_picture']?>);background-size:cover;background-position:center;position:relative;">
    <?php $this->load->view("front/template/default/main_menu.php");?>
	<div class="title_detail">
		<div class="container">
			<div class="inner_title_detail">
				<h1><?= $myPage['page_title']?></h1>
			</div>
		</div>
    </div>
</header>
<main id="main_down">
	<div class="topic-body-introduce fs13em">
		<div class="topic-body-row3 mb40 pt30" >	
			<div class="container">
				<div class="row flex_center">
					<div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
						<div class="text-center">
							<?= isset($video_intro) ? $video_intro['sc_description'] : '' ?>
						</div>
					</div>
					<?php if (isset($why_choose_us)): ?>
						<div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
							<div class="title-header text-left">
								<h2 class="mb20 mt0" style="text-transform: uppercase;"><?= $why_choose_us['sc_name']?></h2>
							</div>
							<?= $why_choose_us['sc_description']?>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
		<div class="accreditation">								
			<header class="color_fff hidden">Các chương trình của chúng tôi được kiểm định bởi:</header>
			<div class="list-accreditation text-center">									
				<?php if($accreditation):
					foreach ($accreditation as $value):?>
						<a href="<?= $value['banner_link'] ?>"><img src="<?= my_library::base_file().'banner/'.$value['id'].'/'.$value['banner_picture']?>" alt="" width="120px"></a>
				<?php endforeach;
				endif;?>
			</div>
		</div>	
		<div class="topic-body-row4 pt30 pb30">	
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row flex_center">
						<?php if (isset($slogans)): ?>
							<?php foreach ($slogans as $value): ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pt15 pb15">
									<div class="content pl15">
										<div class="text-left">
											<h3 class="mb10 mt0 color-primary"><?= $value['sc_name']?></h3>
										</div>
										<p class="color-primary"><?= strip_tags($value['sc_description'])?></p>
									</div>
								</div>
							<?php endforeach ?>
						<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="topic-body-row5 pb40 pt40">	
			<div class="container">
				<?php if (isset($team)): ?>
					<div class="title-header text-center">
						<h2 class="mb20" style="text-transform: uppercase;"><?= $team['sc_name']?></h2>
					</div>
					<?= $team['sc_description']?>
				<?php endif ?>
			</div>
		</div> -->
		<div class="topic-body-row6 pt40 pb40 hidden" >	
			<div class="title-header text-center">
				<h2 class="mall0 color-fff" style="text-transform: uppercase;"><?= $category_specialists['category_name']?></h2>
			</div>
			<div class="container">
				<div class="row mt25">
					<div class="expert flex_wrap mt40">
						<?php if (isset($listSpecialists)): ?>
							<?php foreach ($listSpecialists as $value): ?>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
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
		<div class="contact-now pt30 pb30" style="background-image: url(<?= my_library::base_front()?>images/contact_bg.png);">
			<div class="container">
				<div class="row">
					<div class="text-center color_fff">
						<h2>Hãy để AGO đồng hành cùng hành trình Du học, Định cư của bạn. Liên hệ AGO ngay hôm nay.</h2>
						<div class="more mt15">
							<a href="lien-he-tu-van.html" class="button bg-color-accent"><?= lang('contact')?> →</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="partner owl-carousel pt30 pb30">
			<?php if($partner):
			foreach ($partner as $value):?>
				<a href="<?= $value['banner_link'] ?>"><img src="<?= my_library::base_file().'banner/'.$value['id'].'/'.$value['banner_picture']?>" alt=""></a>
			<?php endforeach;
			endif;?>
		</div>		
	</div>
</main>