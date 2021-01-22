<header class="row_top mh100pt introduce">

    <?php $this->load->view("front/template/default/main_menu.php");?>

    <div id="owl-partner" class="owl-carousel slide-top-news">

        <?php if (isset($listNewsHot)): ?>

            <?php foreach ($listNewsHot as $value): ?>

                <?php 

                  $category = $this->mcategory->getCategorybyIDTranslation($value['news_category'],'category_name,category_alias',$language);

                 ?>

                <div class="owl-slide">

                    <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" class="flex_img_slider"><img src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" width="100%" alt="<?= $value['news_alias']?>"></a>

                    <div class="owl_news_item">

                        <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>"><h3 class="color_fff"><?= $value['news_title']?></h3></a>

                        <p class="hidden-xs"><span><?php if (isset($category)): ?>

                            <a href="<?= base_url().$category['category_alias']?>" class="color_fff"><?= $category['category_name']?></a>

                        <?php endif ?>, <a class="color_fff"><?= lang('featurednews')?></a></span> - <time datetime=""><?= date("d-m-Y",strtotime($value['news_publicdate']))?></time></p>

                        <p class="hidden-xs color_fff fs13em"><?= $value['news_summary']?></p>

                    </div>

                </div>

            <?php endforeach ?>

        <?php endif ?>

    </div>

</header>

	

<main id="news">

    <div class="row3 mt30">

        <div class="container">

            <div class="title-header">

				<a href="<?= base_url().$workshop['category_alias']?>"><h1 class="mb20 color_000"><?= $workshop['category_name']?></h1></a>

			</div>

            <div class="row">

                <?php if (isset($listWorkshop)): ?>

                    <?php foreach ($listWorkshop as $value): ?>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

                            <div class="panel panel-default">

                                <div class="panel-body">

                                    <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>"><img src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" title="<?= $value['news_title']?>" alt="<?= $value['news_alias']?>" width="100%"></a>

                                </div>

                                <div class="panel-footer">

                                    <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" title="<?= $value['news_title']?>" class="color_000"><h3><?= word_limiter($value['news_title'], 10)?></h3></a>

                                    <p><time datetime=""><?= date("d-m-Y",strtotime($value['news_publicdate']))?></time></p>

                                    <p class="fs12em"><?= word_limiter(strip_tags($value['news_summary']),26)?></p>

                                </div>

                            </div>

                        </div>

                    <?php endforeach ?>

                <?php endif ?>

            </div>

            <div class="more text-center">

                <a href="<?= base_url().$workshop['category_alias']?>" class="button"><?= lang('viewmore')?></a>

            </div>

        </div>

    </div>

	<div class="row3">

		<div class="container pb40">

			<div class="row flex_wrap">

				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

                    <div class="title-header title-header-news">

                        <a href="<?= base_url().$news['category_alias']?>" class="news_Home"><h1 class="mb20 color_000"><?= $news['category_name']?></h1></a>

                        <nav class="news_List hidden-xs">

							<a href="<?= base_url().$news_canada['category_alias']?>"><?= $news_canada['category_name']?></a>

							<a href="<?= base_url().$news_us['category_alias']?>"><?= $news_us['category_name']?></a>

						</nav>

                    </div>

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="conten">

                                <?php if (isset($listNews)): ?>

                                    <?php foreach ($listNews as $value): ?>

                                        <?php $category = $this->mcategory->getCategorybyIDTranslation($value['news_category'],'category_name,category_alias',$language); ?>

                                       <div class="media">

                                            <a class="pull-left" href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>">

                                                <img  class="media-object" src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" alt="<?= $value['news_alias']?>" width="300px">

                                            </a>

                                            <div class="media-body">

                                                <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" class="color_000"><h3 class="media-heading"><?= $value['news_title']?></h3></a>

                                                <?php if (isset($category)): ?>

                                                    <div class="lable_bk"><span><a href="<?= base_url().$category['category_alias']?>" class="color_fff"><?= $category['category_name']?></a></span></div>

                                                <?php endif ?>

                                                <p><time datetime=""><?= date("d-m-Y",strtotime($value['news_publicdate']))?></time></p>

                                                <p class="fs12em"><?= $value['news_summary']?></p>

                                            </div>

                                        </div> 

                                    <?php endforeach ?>

                                <?php endif ?>

                            </div>

                            <div class="more text-center mt30">

                                <a href="<?= base_url().$news['category_alias']?>" class="button"><?= lang('viewmore')?></a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 hidden-xs">

                    <div class="row-right">

                        <?php if (isset($bannerRight)): ?>

                            <?php foreach ($bannerRight as $key => $value): ?>

                                <div class="product_row bg<?= $key + 1?>">

                                    <a href="<?= $value['banner_link']?>" target="_blank" class="text-center color_fff">

                                        <div class="fs5em"><i class="fa <?= $value['banner_html']?>" aria-hidden="true"></i></div>

                                        <h3 class="mt20 mb20"><?= $value['banner_title']?></h3>

                                        <p class="fs13em"><?= $value['banner_description']?></p>

                                    </a>

                                </div>

                            <?php endforeach ?>

                        <?php endif ?>

                        <div>

                            <div class="fb-page" data-href="<?= $config['facebook']?>" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="<?= $config['facebook']?>" class="fb-xfbml-parse-ignore"><a href="<?= $config['facebook']?>"><?= $config['title']?></a></blockquote></div>

                        </div>

                    </div>

                </div>

			</div>

		</div>

	</div>

</main>

<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11';

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>