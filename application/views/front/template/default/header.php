<header class="header-top hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 flex_center_space_between">
                <a class="logo hidden-sm hidden-xs" href="<?= base_url()?>">
                    <img src="<?= base_url()?>media/logo/logo.png" alt="<?= $config['company_name']?>" width="auto" height="50px">
                </a>		
                <ul class="top-menu text-right nav navbar-nav pull-right">		                    
                    <li>
                        <a href="tel:<?= $config['hotline']?>"><i class="fa fa-phone" aria-hidden="true"></i><span class="phone "><?= $config['hotline']?></span></a>
                    </li>
                    <li>
                        <a href="mailto:<?= $config['email']?>"><i class="fa fa-envelope" aria-hidden="true"></i><span><?= $config['email']?></span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span><?= $config['working_time']?></span></a>
                    </li>
                    <li class="dropdown_hover">
                        <?php $list_lang = ''; foreach ($listLanguage as $key => $value) {
                            $link_lang = base_url('language?l='.$value['lang_code'].'&r='.base64_encode(current_url()));
                            $src_lang = my_library::base_file().'language/'.$value['lang_flag'];
                            if($language === $value['lang_code']){
                                echo '<a><img src="'.$src_lang.'" height="16.4px" alt="'.$value['lang_name'].'"> '.$value['lang_name'].' 
                                        <b class="caret"></b>
                                    </a>';
                            }else{
                                $list_lang .= '<li class="text-center"><a href="'.$link_lang.'" class="pl0"><img src="'.$src_lang.'" height="16.4px" alt="'.$value['lang_name'].'"> '.$value['lang_name'].'</a></li>';
                            }
                        }?>
                        <ul class="dropdown-menu pt0 pb0">
                            <?=$list_lang?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>