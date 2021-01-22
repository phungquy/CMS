<header class="row_top mh100pt introduce eb5">
    <?php $this->load->view("front/template/default/main_menu.php");?>
    <div class="divfixmobi divfixmobiCCDC eb5">
        <div class="page-container slider">
            <div class="the-banner">
                <div class="bg_image_banner" style="background-image: url(<?= my_library::base_file().'category'.'/'.$myCategory['category_picture']?>)"></div>
                <div class="title">
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
            <!-- <div class="the-thub_img_title main_thub_img_title">
                <ul>
                    <li class="active">
                        <a href="#eb5lagi">
                            <p class="fs13em mb0">EB-5 Là gì?</p>
                        </a>
                    </li>
                    <li>
                        <a href="#loiich">
                            <p class="fs13em mb0">Lợi ích</p>
                        </a>
                    </li>
                    <li>
                        <a href="#dieukien">
                            <p class="fs13em mb0">Điều kiện</p>
                        </a>
                    </li>
                    <li>
                        <a href="#quytrinh">
                            <p class="fs13em mb0">Quy trình nộp hồ sơ</p>
                        </a>
                    </li>
                    <li>
                        <a href="#cacduaneb5">
                            <p class="fs13em mb0">Các dự án EB-5 </p>
                        </a>
                    </li>
                </ul>
            </div> -->
        </div>
    </div>
</header>
<div class="eb5 eb5_list_menu_main">
    <div class="the-thub_img_title main_thub_img_title">
        <ul>
            <li class="active">
                <a href="#eb5lagi">
                    <p class="fs13em mb0">EB-5 Là gì?</p>
                </a>
            </li>
            <li>
                <a href="#loiich">
                    <p class="fs13em mb0">Lợi ích</p>
                </a>
            </li>
            <li>
                <a href="#dieukien">
                    <p class="fs13em mb0">Điều kiện</p>
                </a>
            </li>
            <li>
                <a href="#quytrinh">
                    <p class="fs13em mb0">Quy trình nộp hồ sơ</p>
                </a>
            </li>
            <li>
                <a href="#cacduaneb5">
                    <p class="fs13em mb0">Các dự án EB-5 </p>
                </a>
            </li>
        </ul>
    </div>
</div>
<main id="main_down">
    <?php $this->load->view("front/template/default/datlichhen.php");?>
    <?= $myCategory['category_detail']?>
    <div class="eb5">
        <div class="project-eb5" id="cacduaneb5">
            <div class="container">
                <h1 class="color-367a3d text-uppercase text-center mb40 fs25px"><strong>Các dự án</strong></h1>
                <div class="row">
                    <?php if (isset($listProgramUS)): ?>
                        <?php foreach ($listProgramUS as $value): ?>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                               
                                    <div class="panel panel-project-eb5-item">
                                        <div class="panel-heading pall0">
                                            <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>">
                                                <img src="<?= my_library::base_file().'news/'.$value['id'].'/'.$value['news_picture']?>" width="100%" alt="">
                                            </a>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-container title_project_eb5">
                                                <div class="table-inner">
                                                    <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>">
                                                        <h3 class="text-uppercase text-center color_000"><?= $value['news_seo_title']?></h3>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                         <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>">
                                            <div class="panel-footer">
                                                <div class="table-container">
                                                    <div class="table-inner">
                                                        <!-- <ul class="list_detail_eb5">
                                                            <li>Tổng vốn đầu tư:</li>
                                                            <li>Vốn ưu tiên EB-5:</li>
                                                            <li>Vị trí dự án:</li>
                                                        </ul> -->
                                                        <div style="color: #fff;padding: 0px 35px;font-size: 17px;font-weight:  bold;">
                                                            <?= strip_tags($value['news_summary'])?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-f3f3f3">
        <?php $this->load->view("front/template/default/compare_check.php");?>
    </div>
</main>