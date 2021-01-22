<div class="container" style="margin-top: -10%;">
    <div class="row row3 flex_wrap">
        <?php foreach ($list_cate as $value) :?>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body pall0">
                        <a href="<?= base_url($value['category_alias'])?>" title="<?= $value['category_seo_title']?>"><img src="<?= my_library::base_file().'category/'.$value['category_picture']?>" alt="<?= $value['category_name']?>" width="100%"></a>
                    </div>
                    <div class="panel-footer">
                        <a href="<?= base_url($value['category_alias'])?>" title="<?= $value['category_seo_title']?>" class="color_000"><h3><?= word_limiter($value['category_seo_title'], 10)?></h3></a>
                    </div>
                </div>
            </div>
        <?php endforeach?>
    </div>
</div>