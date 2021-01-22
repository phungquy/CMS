<header class="row_top introduce h300px" style="background-image: url(<?= my_library::base_file().'category/'.$myCategory['category_picture']?>);background-size:cover;background-position:center;position:relative;">

    <?php $this->load->view("front/template/default/main_menu.php");?>

    <div class="title_detail">

        <div class="inner_title_detail">

            <h1><?= $myCategory['category_name']?></h1>

        </div>

    </div>

</header>
<?php
    switch ($myCategory['category_view']) {
        case 'cate-and-post':
            echo '[intynets:category type=subcat|id='.$myCategory["id"].'|limit=3|layout=TRUE|view=list]';
            break;
        
        default:
            # code...
            break;
    }
?>
<main id="news">

	<div class="row3">

		<div class="container pb40">
			<div class="row flex_wrap">                
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="content">                
                        <?= $myCategory["category_detail"]?>
                    </div>
                    <?php if (isset($news_canada) && isset($news_us)): ?>

                        <div class="title-header title-header-news">

                            <a href="<?= base_url().$news['category_alias']?>" class="news_Home"><h1 class="mb20 color_000"><?= $news['category_name']?></h1></a>

                            <nav class="news_List hidden-xs">

                                <a href="<?= base_url().$news_canada['category_alias']?>"><?= $news_canada['category_name']?></a>

                                <a href="<?= base_url().$news_us['category_alias']?>"><?= $news_us['category_name']?></a>

                            </nav>

                        </div>

                    <?php endif ?>

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="conten mt30">

                                <?php if (isset($listNews)): ?>

                                	<?php foreach ($listNews as $value): ?>

                                        <?php $category = $this->mcategory->getCategorybyIDTranslation($value['news_category'],'category_name,category_alias',$language); ?>

                                		<div class="media">

                                            <a class="pull-left" href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>">

                                                <img  class="media-object" src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" alt="<?= $value['news_alias']?>" width="300px">

                                            </a>

                                            <div class="media-body">

                                                <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" class="color_000"><h3 class="media-heading"><?= $value['news_title']?></h3></a>
                                                <p>
                                                    <?php if (isset($category)): ?>
                                                        <category class="lable_bk"><span><a href="<?= base_url().$category['category_alias']?>" class="color_fff"><?= $category['category_name']?></a></span></category>
                                                    <?php endif ?>
                                                    <time datetime="<?= date("d-m-Y",strtotime($value['news_publicdate']))?>"><i class="fa fa fa-clock-o"></i> <?= date("d-m-Y",strtotime($value['news_publicdate']))?></time>
                                                    <view><i class="fa fa-eye"></i> <?=$value['news_view']?></view>
                                                </p>

                                                <p class="fs12em"><?= strip_tags($value['news_summary'])?></p>

                                            </div>

                                        </div>

                                	<?php endforeach ?>

                                <?php endif ?>

                            </div>

                            <?php if (isset($pagination)): ?>

                                <div class="text-center">

                                    <ul class="pagination pagination_news">

                                        <?= $pagination?>

                                    </ul>

                                </div>

                            <?php endif ?>

                        </div>

                    </div>

                </div>

                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 sidebar hidden-xs">

                    <div class="row-right">
                        <?php $this->load->view("front/template/default/datlichhen.php");?>
                        <div class="ycare mb30">
                            
                            <?php if (isset($listNewsHot)): ?>
                                <div class="title-header text-center">
    
                                    <h3 class="mb20 font_bold"><?= lang('featurednews')?></h3>
    
                                </div>

                            	<?php foreach ($listNewsHot as $value): ?>

                            		<div class="media">

                                        <a class="pull-left" href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>">

                                            <img class="media-object" src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" alt="<?= $value['news_alias']?>" width="100px">

                                        </a>

                                        <div class="media-body">

                                            <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" class="color_000"><h4 class="media-heading"><?= $value['news_title']?></h4></a>

                                            <p><time datetime=""><?= date("d-m-Y",strtotime($value['news_publicdate']))?></time></p>

                                        </div>

                                    </div>

                            	<?php endforeach ?>

                            <?php endif ?>

                        </div>
                        <div class="ycare mb30 hidden">
                            
                            <?php if (isset($listLatestnews)): ?>
                                <div class="title-header text-center">

                                    <h3 class="mb20 font_bold"><?= lang('latestnews')?></h3>

                                </div>

                            	<?php foreach ($listLatestnews as $value): ?>

                            		<div class="media">

                                        <a class="pull-left" href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>">

                                            <img class="media-object" src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" alt="<?= $value['news_alias']?>" width="100px">

                                        </a>

                                        <div class="media-body">

                                            <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" class="color_000"><h4 class="media-heading"><?= $value['news_title']?></h4></a>

                                            <p><time datetime=""><?= date("d-m-Y",strtotime($value['news_publicdate']))?></time></p>

                                        </div>

                                    </div>

                            	<?php endforeach ?>

                            <?php endif ?>

                        </div>

                        <div>
                            <div class="fb-page" data-href="<?= $config['facebook']?>" data-width="" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?= $config['facebook']?>" class="fb-xfbml-parse-ignore"><a href="<?= $config['facebook']?>"><?= $config['title']?></a></blockquote></div>
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