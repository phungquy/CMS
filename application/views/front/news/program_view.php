<header class="row_top introduce mh100pt">

	<?php $this->load->view("front/template/default/main_menu.php");?>

	<div class="divfixmobi divfixmobiCCDC">

		<div class="page-container slider">

			<div class="the-banner">

				<div class="bg_image_banner" style="background-image: url(<?= my_library::base_file().'news/'.$myNews['id'].'/'.$myNews['news_picture']?>);"></div>

				<div class="title mtam">

					<div class="table-container">

						<div class="table-inner">

							<div class="table_color_inner">

								<h1 class="color_fff title_inner"><?= $myNews['news_seo_title']?></h1>

							</div>

						</div>

					</div>

				</div>

				<div class="down">

					<a href="#main_down" id="click_down">

						<i class="fa fa-angle-down down_item" aria-hidden="true"></i>

					</a>

				</div>

			</div>

			<?php if ($myNews['news_category'] == 3 || $myNews['news_category'] == 12): ?>

				<?php $this->load->view("front/template/default/header_list_tinhbang.php");$class = "fs13em"?>

			<?php else: ?>

				<?php $this->load->view("front/template/default/my_header_list_duan.php");$class = "eb5 fs12em"?>

			<?php endif ?>

		</div>

	</div>

</header>

<main id="main_down">

	<div class="topic-body-canada <?= $class?>">

	<?php $this->load->view("front/template/default/datlichhen.php");?>

		<?= $myNews['news_detail']?>

	</div>

	<?php $this->load->view("front/template/default/compare_check.php");?>

</main>