<footer class="footer">
	<div class="bg-color-primary pt65 pb65">
		<div class="row1-footer">
			<div class="container fter">
				<div class="row">					
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 footer_contact">
						<div class="footer_contactv_item">
							<a class="logo-footer" href="<?= base_url()?>">
								<img src="<?= base_url()?>media/logo/logo.png" alt="<?= $config['company_name']?>" width="auto" height="70px">
							</a>
							<span class="social item_logo">
								<a target="_blank" href="<?=$config['facebook']?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<!-- <a target="_blank" href="<?=$config['twitter']?>"><i class="fa fa-twitter" aria-hidden="true"></i></a> -->
								<a target="_blank" href="<?=$config['youtube']?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
								<!-- <a target="_blank" href="<?=$config['linkedin']?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> -->
							</span>
							<div class="contact fs19em hidden">
								<a href="tel:<?=str_replace(' ','',$config['hotline'])?>" class="color-accent mr5"><i
										class="fa fa-phone" aria-hidden="true"></i> <span
										class="phone "><?= $config['hotline']?></span></a>
								<a href="mailto:<?= $config['email']?>" class="color-accent mr5"><i class="fa fa-envelope"
										aria-hidden="true"></i> <span><?= $config['email']?></span></a>
							</div>
							<?php if (isset($about_footer)): ?>
								<div class="color_fff hidden"><?= $about_footer['sc_description']?></div>
							<?php endif ?>
							<div class="accreditation">								
								<header class="color_fff hidden">Các chương trình của chúng tôi được kiểm định bởi:</header>
								<div class="list-accreditation flex_center mt15">									
									<?php if($accreditation):
										foreach ($accreditation as $value):?>
											<a href="<?= $value['banner_link'] ?>"><img src="<?= my_library::base_file().'banner/'.$value['id'].'/'.$value['banner_picture']?>" alt="" width="90px"></a>
									<?php endforeach;
									endif;?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 footer_contact">
						<div class="footer_contactv_item">
						<header class="title-header color_fff"><h3 style="line-height: 40px;">MENU</h3></header>
							<ul class="pl0 list-style-none">
								<?php foreach ($menuMain as $value): ?>
								<li class="pt5 pb5">
									<a href="<?= $value['click_allow'] == 1 ? base_url().$value['alias'] : 'javascript:;'?>"
										target="<?= $value['target']?>" class="color_fff"><?= $value['name']?></a>
								</li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-3 col-lg-3 footer_contact">
						<div class="footer_contactv_item">
							<header class="title-header color_fff"><h3 style="line-height: 40px;"><?= lang('latestnews')?></h3></header>
							<ul class="pl0 list-style-none">
							<?php if (isset($listLatestnews)): ?>
								<?php foreach ($listLatestnews as $key => $value): 
									if($key>=3) {break;} ?>
									<li class="pt5 pb5 media">
										<a class="pull-left" href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>">
											<img class="media-object latestnews_img" src="<?= my_library::base_file().'news/'.$value['id'].'/thumb-'.$value['news_picture']?>" alt="<?= $value['news_alias']?>" width="80px">
										</a>
										<div class="media-body">
											<a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" class="color_fff text-limit limit-2" title="<?= $value['news_title']?>"><?= $value['news_title']?></a>
										</div>
								</li>
								<?php endforeach ?>
							<?php endif ?>
							</ul>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 footer_contact">
						<div class="footer_contactv_item">
							<header class="title-header color_fff"><h3 style="line-height: 40px;"><?= lang('hcmoffice')?></h3></header>
							<ul class="pl0 list-style-none">
								<li class="pt5 pb5 color_fff"><i class="fa fa-map-marker" style="width: 15px;"></i> <?= $config['address_hcm']?></li>
								<li class="pt5 pb5 color_fff"><i class="fa fa-phone" style="width: 15px;"></i> <a href="tel:<?=str_replace(' ','',$config['hotline'])?>" class="color_fff"> <?= $config['hotline']?></a></li>
								<li class="pt5 pb5 color_fff"><i class="fa fa-envelope" style="width: 15px;"></i> <a href="mailto:<?= $config['email']?>" class="color_fff"> <?= $config['email']?></a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row3-footer">
		<div class="container text-center">
			<span class="fs1em">© Copyright <?= date("Y")?>. All rights Reserved. | Developed by <a
					href="https://intynets.com">IntyNets</a></span>
		</div>
	</div>
</footer>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function () {
		FB.init({
			xfbml: true,
			version: 'v5.0'
		});
	};
	(function (d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s);
		js.id = id;
		js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<!-- Your customer chat code -->
<div class="fb-customerchat" attribution="setup_tool" page_id="103254131421083" theme_color="#b9975b"
	logged_in_greeting="Xin chào Anh/Chị! Ago có thể giúp gì cho quý Anh/Chị?"
	logged_out_greeting="Xin chào Anh/Chị! Ago có thể giúp gì cho quý Anh/Chị?">
</div>
<script>
	function isScrolledIntoView(elem) {
		var docViewTop = jQuery(window).scrollTop();
		var docViewBottom = docViewTop + jQuery(window).height();
		var elemTop = jQuery(elem).offset().top;
		return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
	}
	/* window.onscroll = function() {myFunction()};

	var header = document.getElementById("box_newsletter");
	var content = document.getElementById("mc_embed_signup");
	var sticky = header.offsetTop;
	function myFunction() {
		if(isScrolledIntoView(header)){
				content.classList.remove("sticky");
		}else{
				content.classList.add("sticky");
		}
	}
	myFunction(); */
</script>
<style>
	div#mc_embed_signup.sticky {
		position: fixed;
		bottom: 0;
		z-index: 999;
		left: 0;
		background: #252525;
	}
</style>
