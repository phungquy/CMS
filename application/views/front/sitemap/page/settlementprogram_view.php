<header class="row_top mh100pt introduce">
    <?php $this->load->view("front/template/default/main_menu.php");?>
    <div class="divfixmobi divfixmobiCCDC">
        <div class="page-container slider">
            <div class="the-banner">
                <div class="bg_image_banner" style="background-image: url(<?= my_library::base_file().'page/'.$myPage['page_picture']?>);"></div>
                <div class="title">
                    <div class="table-container">
                        <div class="table-inner">
                            <div class="table_color_inner">
                                <h1 class="mb20 title_inner"><?= $myPage['page_title']?></h1>
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
        </div>
	</div>
</header>
<main id="main_down">
	<div class="container">
        <div class="table_compare mt25">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="title-header text-center mt40">
                        <h1 class="mb20">
                            
                            <?php if ($myPage['id'] == 4) {?> 
                                <?= lang('listprojects')?>
                            <?php } else{ ?>
                                <?= lang('listprojects_eb5')?>
                            <?php } ?>
                        </h1>
                    </div>
                    <div class="checkbox-success mb40">
                        <?php if ($myPage['id'] == 4) {
                            foreach (array('PEI','NEW BRUNSWICK','QUÉBEC','START UP VISA','SASKATCHEWAN') as $key => $value) {?>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 checkbox <?= $key>2 ? "": "" ?>">
                                    <input type="checkbox" id="option<?= $key+1?>" name="colum-<?= $key+1?>" checked="checked"/>
                                    <label for="option<?= $key+1?>"><?= $value?><svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M13 50.986L37.334 75 88 25" stroke-width="6" stroke="#66bb6a" fill="none" fill-rule="evenodd" stroke-dasharray="150" stroke-dashoffset="150"/></svg></label>
                                </div>
                        <?php    }
                        } else {
                            foreach (array('Trường bán công Charter School Floria','Tòa tháp căn hộ cao cấp The Spiral - New York') as $key => $value) {?>
                                    
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 checkbox <?= $key>2 ? "": "" ?>">
                                            <input type="checkbox" id="option<?= $key+1?>" name="colum-<?= $key+1?>" checked="checked"/>
                                            <label for="option<?= $key+1?>"><?= $value?><svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M13 50.986L37.334 75 88 25" stroke-width="6" stroke="#66bb6a" fill="none" fill-rule="evenodd" stroke-dasharray="150" stroke-dashoffset="150"/></svg></label>
                                        </div>
                                <?php    }
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="table_compare" style="max-width: 1400px;width:100%;margin:auto;font-size:1.3em;margin-bottom: 40px;">
            <div class="table-responsive">
                <?= $myPage['page_detail']?>
            </div>
        </div>
    </div>
</main>