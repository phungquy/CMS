<div class="main_menu">
	<nav class="navbar navbar-default navbar-static-top mb0" role="navigation">
		<div class="container-menu">
			<div class="item_nav text-center">
				<div class="navbar-header">
					<span class="navbar-toggle-item">
							<div class="table-container">
								<div class="table-inner">
									<button type="button" class="navbar-toggle">
										<span class="sr-only"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
						</div>
					</span>
					<a class="navbar-brand visible-sm-inline-block visible-xs-inline-block" href="<?= base_url()?>">
						<img src="<?= base_url()?>media/logo/logo.png" alt="<?= $config['company_name']?>" width="auto" height="50px">
					</a>
					<div class="dropdown dropdown_mobi visible-sm visible-xs search-mobi">
						<div class="table-container">
							<div class="table-inner">
								<button class="btn dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-search color_fff" aria-hidden="true"></i></button>
								<ul class="dropdown-menu" style="left: 0;right: 0;width: auto;position: fixed;top: auto; padding: 15px;">
									<form action="<?= base_url()?>search" method="get" role="form" class="form_search">
										<div class="form-group">
											<input type="text" name="k" class="form-control" placeholder="<?= lang('search')?>">
											<button type="submit" class=" btn-search"><i class="fa fa-search color_fff" aria-hidden="true"></i></button>
										</div>
									</form>								
								</ul>					
							</div>
						</div>
					</div>
				</div>
				<div id="grey_back" style="display: none;">&nbsp;</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse text-center mallauto" id="nav">
					<ul class="nav navbar-nav" id="menu-principal">
						<?php foreach ($menuMain as $value):
							$active = $this->uri->segment(1) == $value['alias'] ? 'active' : '';
							$link = $value['click_allow'] == 1 ? base_url().$value['alias'] : 'javascript:;';
							if (isset($value['child'])): ?>
								<li class="dropdown_hover <?= $active?>">
									<a href="<?= $link?>" target="<?= $value['target']?>" class="color_fff"><span><?= $value['name']?></span>
										<b class="caret hidden-xs hidden-sm"></b>
										<div class="click_show_submenu visible-xs visible-sm">
											<div class="table-container">
												<div class="table-inner">
													<i class="fa fa-plus "></i>
												</div>
											</div>
										</div>
									</a>
									<ul class="dropdown-menu pt0 pb0">
										<?php foreach ($value['child'] as $val): ?>
											<li class="dropdown_hover">
												<?php if ($val['ingredient'] == 3): ?>
													<a href="<?= $val['alias']?>" target="<?= $val['target']?>">
														<span><?= $val['name']?></span>
												</a>
												<?php else: ?>
													<a href="<?= base_url().$val['alias']?>" target="<?= $val['target']?>">
														<span><?= $val['name']?></span>
												</a>
												<?php endif ?>
												<?php if (isset($val['child'])): ?>
													
													<i class="fa fa-caret-right icon-caret-right hidden-xs hidden-sm" aria-hidden="true"></i>
													<ul class="dropdown-menu-sub pt0 pb0">
													<?php foreach ($val['child'] as $v): ?>
														<li><a href="<?= base_url().$v['alias']?>" target="<?= $v['target']?>"><span><?= $v['name']?></span></a></li>
													<?php endforeach ?>
												</ul>
												<?php endif ?>
										</li>
										<?php endforeach ?>
									</ul>
								</li>
							<?php else: ?>
								<li class="<?= $active?>"><a href="<?= $link?>" target="<?= $value['target']?>" class="color_fff"><span><?= $value['name']?></span></a></li>
							<?php endif ?>
						<?php endforeach ?>
						<li class="dropdown search hidden-xs">
							<a href="#" class="dropdown-toggle color_fff" data-toggle="dropdown">
								<i class="fa fa-search color_fff" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu">
								<form action="<?= base_url()?>search" method="get" role="form" class="form_search">
									<div class="form-group">
										<input type="text" name="k" class="form-control" placeholder="<?= lang('search')?>">
										<button type="submit" class=" btn-search"><span><?= lang('search')?></span></button>
									</div>
								</form>								
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

</div>