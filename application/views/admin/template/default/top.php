<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?= $user_active['active_user_avatar']?>" alt="<?= $user_active['active_user_fullname']?>"><?= $user_active['active_user_fullname']?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="<?= my_library::admin_site().'user/profile/'.$user_active['active_user_id']?>"> <?= lang('profile')?><i class="fa fa-user pull-right"></i> </a></li>
            <li><a href="<?= my_library::admin_site()?>index/lock"><i class="fa fa-lock pull-right"></i> <?= lang('lock')?></a></li>
            <li><a href="<?= my_library::admin_site()?>index/logout"><i class="fa fa-sign-out pull-right"></i> <?= lang('logout')?></a></li>
          </ul>
        </li>
        <li class="hidden">
          <a href="<?= my_library::base_url()?>admin/evaluate_records" class="info-number" title="<?= lang('brief')?>">
            <i class="fa fa-folder-open-o"></i>
            <?php if ($recordnotprocess > 0): ?>
              <span class="badge bg-green"><?= $recordnotprocess?></span>
            <?php endif ?>
          </a>
        </li>
        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <?php if ($mailUnread > 0): ?>
              <span class="badge bg-green"><?= $mailUnread?></span>
            <?php endif ?>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <?php if (!empty($listMailUnread)): ?>
              <?php foreach ($listMailUnread as $value): ?>
                <li>
                  <a href="<?= my_library::admin_site().'mail/index/'.$value['id']?>">
                    <span>
                      <span><?= $value['mail_fullname']?> (<?= $value['mail_email']?>)</span>
                    </span>
                    <span class="message" style="font-weight: bold;">
                      <?= $value['mail_title']?>
                    </span>
                    <p style="font-style: italic;font-size: 10px;"><?= $value['mail_senddate']?></p>
                  </a>
                </li>
              <?php endforeach ?>
            <?php endif ?>
            <li>
              <div class="text-center">
                <a href="<?= my_library::admin_site()?>mail">
                  <strong><?= lang('viewall')?></strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
        <li role="presentation" class="dropdown">
          <?php $list_lang = ''; foreach ($listLanguage as $key => $value) {
            $link_lang = base_url('language?l='.$value['lang_code'].'&r='.base64_encode(current_url()));
            $src_lang = my_library::base_file().'language/'.$value['lang_flag'];
            if($language === $value['lang_code']){
              echo '<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"><img src="'.$src_lang.'" width="20px" height="auto" alt="'.$value['lang_name'].'"></a>';
            }else{
              $list_lang .= '<li class="text-left"><a href="'.$link_lang.'" class="pl0"><img src="'.$src_lang.'" width="30px" alt="'.$value['lang_name'].'"> '.$value['lang_name'].'</a></li>';
            }
          }?>
          <ul class="dropdown-menu list-unstyled" role="menu">
            <?=$list_lang?>
          </ul>
        </li>
        <li>
          <a href="<?= my_library::base_url()?>public/documentation/HDQT-CMS.pdf" target="_blank" title="<?= lang('documentation')?>">
            <i class="fa fa-book"></i>
          </a>
        </li>
        <li>
          <a href="<?= my_library::base_url()?>" target="_blank" title="<?= lang('viewwebsite')?>">
            <i class="fa fa-globe"></i>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>