<header class="row_top introduce h300px">

	<?php $this->load->view("front/template/default/main_menu.php");?>

	<div class="divfixmobi divfixmobiCCDC">

		<div class="page-container slider">

			<div class="the-banner">

				<div class="bg_image_banner" style="background-image: url(<?= my_library::base_file().'category'.'/'.$myCategory['category_picture']?>);"></div>

				<div class="title mtam">

					<div class="table-container">

						<div class="table-inner">

							<div class="table_color_inner">

								<h1 class="color_fff title_inner"><?= $myCategory['category_seo_title']?></h1>

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

			<?php $this->load->view("front/template/default/header_list_tinhbang.php");?>

		</div>

	</div>

</header>

<main id="main_down">

	<?php $this->load->view("front/template/default/datlichhen.php");?>

	<div class="topic-body-canada fs13em ">

		<div class="container">

			<?= $myCategory['category_detail']?>

		</div>

	</div>

	<?php $this->load->view("front/template/default/compare_check.php");?>

</main>