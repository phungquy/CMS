<header class="row_top introduce">
  <?php $this->load->view("front/template/default/main_menu.php");?>
  <div id="slider">
    <?php $this->load->view("front/template/default/slider.php");?>
  </div>
  <div class="down">
    <a href="#main_down" id="click_down">
      <i class="fa fa-angle-down down_item" aria-hidden="true"></i>
    </a>
  </div>
</header>
<main id="main_down">
  <div class="topic-body-row pt15 pb15">	
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden">
          <div class="row flex_wrap">
            <?php if (isset($slogans)): ?>
              <?php foreach ($slogans as $value): ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pt15 pb15">
                  <div class="mvs home-mvs">
                    <img src="<?=base_url('public/front/images/'.$value['code_position'].'.png')?>" alt="">
                    <div class="content">
                      <div class="text-center">
                        <h3 class="mb10 mt0 color-000"><?= $value['sc_name']?></h3>
                      </div>
                      <p class="color-000"><?= strip_tags($value['sc_description'])?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="row flex_center">
            <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
              <div class="text-center">
                <?= isset($video_intro) ? $video_intro['sc_description'] : '' ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
              <?php if (isset($why_choose_us)): ?>
                <div class="pall30">
                  <header class="title-header color-primary"><h2><?= $why_choose_us['sc_name']?></h2></header>
                  <div class="fs14em color-primary"><?= $why_choose_us['sc_description']?></div>
                  <div class="more mt40">
                    <a href="<?= base_url('ve-ago.html')?>" class="button"><?= lang('viewmore')?> &rarr;</a>
                  </div>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
  <div class="row2">
    <div class="container">
      <div class="title-header text-center mt10 mb10 color-primary">
        <h1 style="text-transform: uppercase;"><?= lang('Members')?></h1>
      </div>
    </div>
    <div class="images_list container pb40">
      <ul class="big_img">
      <?php foreach ($listProgram as $key => $value) :
        $link = $value['click_allow'] == 1 ? $value['alias'] : 'javascript:;';?>
        <li  class="hover_img">
          <div class="title-header text-center visible-xs">
            <h2 class="color_title mb20 title_item" style="text-transform: uppercase;"><?= $value['name']?></h2>
          </div>
          <div class="watermark_title" style="text-transform: uppercase;"><?= $value['name']?></div>
          <div class="bg_wsh" style="background-image: url('<?= base_url($value['thumb'])?>');">
            <div class="conten_item">
              <div class="inner_conten text-center color_fff">
                <p><?=$value['detail']?></p>
                <a href="<?= $link?>" target="<?= $value['target']?>" class="color_fff text-uppercase"><h3><?= strip_tags(lang('viewmore'))?></h3></a>
              </div>
            </div>
          </div>
        </li>
      <?php endforeach;?>
      </ul>
    </div>
  </div>
  <div class="container">
    <div class="partner owl-carousel owl-theme pt30 pb30">
      <?php if($partner):
        foreach ($partner as $value):?>
          <a href="<?= $value['banner_link'] ?>"><img src="<?= my_library::base_file().'banner/'.$value['id'].'/'.$value['banner_picture']?>" alt=""></a>
      <?php endforeach;
      endif;?>
    </div>
  </div>
  <?php if($list_news_workshop){?>
  <div class="row3">
    <div class="container pb40">
      <header class="title-header text-center color-primary"><h2><?= $news_workshop['category_name']?></h2></header>
      <div class="row flex_wrap">
        <?php foreach ($list_news_workshop as $value): ?>
          <?php 
            $category = $this->mcategory->getCategorybyIDTranslation($value['news_category'],'category_name,category_alias',$language);
           ?>
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 news-workshop">
            <div class="panel panel-default">
              <div class="panel-body">
                <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" title="<?= $value['news_title']?>"><img src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" alt="<?= $value['news_alias']?>" width="100%"></a>
              </div>
              <div class="panel-footer">
                  <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" title="<?= $value['news_title']?>" class="color-000"><h3><?= word_limiter($value['news_title'], 10)?></h3></a>
                  <p><span><?php if (isset($category)): ?>
                    <a href="<?= base_url().$category['category_alias']?>" class="color-000"><?= $category['category_name']?></a>, 
                  <?php endif ?><a class="color-000"><?= lang('featurednews')?></a></span> - <time datetime=""><?= date("d-m-Y",strtotime($value['news_publicdate']))?></time></p>
                  <p class="fs12em"><?= word_limiter(strip_tags($value['news_summary']),26)?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="more text-center mt40">
          <a href="<?= base_url().$news_workshop['category_alias']?>" class="button"><?= lang('viewmore')?> &rarr;</a>
      </div>
    </div>
  </div>
  <?php }?>
  <?php $this->load->view("front/template/default/datlichhen.php");?>
</main>