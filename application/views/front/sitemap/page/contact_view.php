<header class="row_top introduce h300px">
        <?php $this->load->view("front/template/default/main_menu.php");?>
        <div class="title_detail" style="background-image: url(<?= my_library::base_file().'page/'.$myPage['page_picture']?>);">
            <div class="inner_title_detail">
                <h1 style="text-transform: uppercase;"><?= $myPage['page_title']?></h1>
            </div>
        </div>
	</header>
		
	<main id="contact">
        <div class="row1 ">
            <div class="container mb20 mt30">
                <div class="col-md-12">
                    <div class="title-header mb10 text-center">
                        <h1><?= lang('hcmoffice')?></h1>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
                            <address class="address_contact fs13em pl15">
                                <div class="psab">
                                    <p><strong class="font-icon-contact"><i class="fa fa-map-marker" aria-hidden="true"></i> </strong> <?= $listInfo['address_hcm']?></p>
                                    <p><strong class="font-icon-contact"><i class="fa fa-phone" aria-hidden="true"></i> </strong> <a href="tel:<?= $listInfo['phone_hcm']?>"><?= $listInfo['phone_hcm']?></a></p>
                                    <p><strong class="font-icon-contact"><i class="fa fa-envelope" aria-hidden="true"> </i> </strong> <a href="mailto:<?= $listInfo['email']?>"><?= $listInfo['email']?></a></p>
                                    <p><strong class="font-icon-contact"><i class="fa fa-clock-o" aria-hidden="true"></i></strong> <?= $listInfo['working_time']?></p>
                                </div>
                            </address>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3919.472254254444!2d106.6888776!3d10.7750961!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f24d582525b%3A0x1e2a1dca66526665!2zVMOyYSBOaMOgIEFscGhhIFRvd2Vy!5e0!3m2!1svi!2s!4v1514887592835" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <hr>
                </div>
                <hr class="">
                <div class="col-md-12">
                    <div class="title-header mb10 text-center">
                        <h1><?= lang('hnoffice')?></h1>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
                            <address class="address_contact fs13em pl25">
                                <p><strong class="font-icon-contact"><i class="fa fa-map-marker" aria-hidden="true"></i> </strong> <?= $listInfo['address_hn']?></p>
                                <p><strong class="font-icon-contact"><i class="fa fa-phone" aria-hidden="true"></i> </strong> <a href="tel:<?= $listInfo['phone_hn']?>"><?= $listInfo['phone_hn']?></a></p>
                                <p><strong class="font-icon-contact"><i class="fa fa-envelope" aria-hidden="true"> </i> </strong> <a href="mailto:<?= $listInfo['email']?>"><?= $listInfo['email']?></a></p>
                                <p><strong class="font-icon-contact"><i class="fa fa-clock-o" aria-hidden="true"></i></strong> <?= $listInfo['working_time']?></p>
                            </address>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.656045166335!2d105.79297316540675!3d21.04644419254921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb680deb2d22b3fcd!2sHoa+Binh+Tower!5e0!3m2!1svi!2s!4v1514887681869" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view("front/template/default/datlichhen.php");?>
	</main>