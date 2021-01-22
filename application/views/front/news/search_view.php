<header class="row_top introduce h300px">
    <?php $this->load->view("front/template/default/main_menu.php");?>
    <div class="title_detail" style="background-image: url(<?= my_library::base_front().'images/search.jpg'?>);">
        <div class="inner_title_detail">
            <h1><?= $title?></h1>
        </div>
    </div>
</header>
<main id="news">
    <div class="row3 mt30">
        <div class="container">
            <div class="row flex_wrap">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row flex_wrap">
                        <?php if (isset($listNews)): ?>
                           <?php foreach ($listNews as $value): ?>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" title="<?= $value['news_title']?>"><img src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" alt="<?= $value['news_alias']?>" width="100%"></a>
                                        </div>
                                        <div class="panel-footer">
                                                <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" title="<?= $value['news_title']?>" class="color_000"><h3><?= word_limiter($value['news_title'], 11)?></h3></a>
                                                <p><time datetime=""><?= date("d-m-Y",strtotime($value['news_publicdate']))?></time></p>
                                                <p class="fs12em"><?= word_limiter(strip_tags($value['news_summary']),30)?></p>
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