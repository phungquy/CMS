<header class="row_top mh100pt introduce">
    <?php $this->load->view("front/template/default/main_menu.php");?>
    <?php if (isset($listWorkshopHot)): ?>
        <div id="owl-partner" class="owl-carousel">
            <?php foreach ($listWorkshopHot as $value): ?>
                <div class="owl-slide">
                    <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" class="flex_img_slider"><img src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" width="100%" alt="<?= $value['news_alias']?>"></a>
                    <div class="owl_news_item">
                            <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>"><h3 class="color_fff"><?= $value['news_title']?></h3></a>
                            <p class="hidden-xs"><time datetime=""><?= date("d-m-Y",strtotime($value['news_publicdate']))?></time></p>
                            <p class="hidden-xs color_fff fs13em"><?= $value['news_summary']?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</header>
<main id="news">
    <div class="row3 mt40">
        <div class="container">
            <div class="title-header">
                <h1 class="mb20 color_000"><?= $myCategory['category_name']?></h1>
            </div>
            <div class="row flex_wrap">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row flex_wrap">
                        <?php if (isset($listWorkshop)): ?>
                           <?php foreach ($listWorkshop as $value): ?>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" title="<?= $value['news_title']?>"><img src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" alt="<?= $value['news_alias']?>" width="100%"></a>
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
    </div>
</main>