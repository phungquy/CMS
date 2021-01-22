<header class="row_top">
    <?php $this->load->view("front/template/default/main_menu.php");?>
</header>
<main id="detail_news">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="header-info" style="position: relative;">    
                <img src="<?= my_library::base_file().'news/'.$myNews['id'].'/'.$myNews['news_picture']?>" alt="<?= $myNews['news_alias']?>" width="100%">
                <div class="title_detail text-left color_fff pall15" style="position: absolute;bottom: 0;">
                    <h1><?= $myNews['news_title']?></h1>
                    <?php $category = $this->mcategory->getCategorybyIDTranslation($myNews['news_category'],'category_name,category_alias',$language);?>
                    <lable-info>
                        <?php if (isset($category)): ?>
                            <category class="lable_bk"><span><a href="<?= base_url().$category['category_alias']?>" class="color_fff"><?= $category['category_name']?></a></span></category>
                        <?php endif ?>
                        <time datetime="<?= date("d-m-Y",strtotime($myNews['news_publicdate']))?>"><i class="fa fa fa-clock-o"></i> <?= date("d-m-Y",strtotime($myNews['news_publicdate']))?></time>
                        <view><i class="fa fa-eye"></i> <?=$myNews['news_view']?></view>
                    </lable-info>
                </div>
            </div>
                <div class="inner_detail mt30">
                    <div class="topic-body">
                        <div class="inner_detail">
                            <div class="topic-body">
                                <b><?= strip_tags($myNews['news_summary'])?></b>
                                <br>
                                <?= $myNews['news_detail']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 clearfix" style="display: flex;">
                                <div style="width: calc(100% - 160px)"> 
                                    <?php if (isset($listTags)): ?>
                                        <div class="tag_item">
                                            <ul class="tag">
                                                <?php foreach ($listTags as $value): ?>
                                                    <?php if ($value != ''): ?>
                                                        <li><a href="<?= base_url().'search?k='.$value?>">#<?= $value?></a></li>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="pull-right text-right mt5">
                                    <div class="fb-like" data-href="<?= current_url()?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true" ></div>
                                </div>  
                            </div>
                            <div class="col-md-12" style="position: relative;">
                                <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid" data-href="<?= current_url()?>" data-numposts="5" data-width="100%" fb-xfbml-state="rendered"><span style="height: 176px;"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 sidebar hidden-sm">
                <?php $this->load->view("front/template/default/datlichhen.php");?>
                <div class="news_new">
                    <div class="title-header text-center">
                        <h3 class="mb20 font_bold"><?= lang('latestnews')?></h3>
                    </div>
                    <?php if (isset($listLatestnews)): ?>
                        <?php foreach ($listLatestnews as $value): ?>
                            <div class="media">
                                <a class="pull-left" href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>">
                                    <img class="media-object latestnews_img" src="<?= my_library::base_file().'news/'.$value['id'].'/thumb-'.$value['news_picture']?>" alt="<?= $value['news_alias']?>" width="100px">
                                </a>
                                <div class="media-body">
                                    <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" class="color_000"><h4 class="media-heading"><?= $value['news_title']?></h4></a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>

                <div class="facebook mt30 mb30">                    
                    <div class="fb-page" data-href="<?= $config['facebook']?>" data-width="360" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="<?= $config['facebook']?>" class="fb-xfbml-parse-ignore"><a href="<?= $config['facebook']?>"><?= $config['title']?></a></blockquote></div>                    
                </div>
                <!-- Composite Start -->
                <div id="M491510ScriptRootC810648">
                </div>
                <script src="https://jsc.mgid.com/m/a/mapleleafvn.com.810648.js" async></script>
                <!-- Composite End -->
            </div>
        </div>
        </div>
        <div class="row3">
            <div class="container pb40">
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
