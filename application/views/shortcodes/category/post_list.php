<?php if($list_post){?>
  <div class="row3">
    <div class="pb40">
      <header class="title-header color-primary"><h2><?= $cat['category_name']?></h2></header>
      <div class="row flex_wrap">
        <?php foreach ($list_post as $value): ?>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 news-workshop">
            <div class="panel panel-default">
              <div class="panel-body">
                <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" title="<?= $value['news_title']?>"><img src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" alt="<?= $value['news_alias']?>" width="100%"></a>
              </div>
              <div class="panel-footer">
                  <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" title="<?= $value['news_title']?>" class="color-000"><h3><?= word_limiter($value['news_title'], 10)?></h3></a>
                  <p><time datetime=""><?= date("d-m-Y",strtotime($value['news_publicdate']))?></time></p>
                  <p class="fs12em"><?= word_limiter(strip_tags($value['news_summary']),15)?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="more text-center mt40">
          <a href="<?= base_url().$cat['category_alias']?>" class="button"><?= lang('viewmore')?> &rarr;</a>
      </div>
    </div>
  </div>
  <?php }?>