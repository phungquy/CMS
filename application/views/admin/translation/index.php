<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><?= $title?></h3>
			</div>
			<div class="title_right hidden-xs">
				<ol class="breadcrumb pull-right">
					<li class="breadcrumb-item"><a href="<?= my_library::admin_site()?>"><?= lang('dashboard')?></a></li>
					<li class="breadcrumb-item active"><?= $title?></li>
				</ol>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-language"></i> <?= lang('selectpage')?> (Front)</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<form method="get">
	                          <select class="form-control" name="file_front" required="required" onchange="this.form.submit();">
	                            <option value=""><?= lang('choosefile')?></option>
	                            <?php foreach ($files_front as $val): ?>
	                            	<?php $ext = explode('.',$val); ?>
	                            	<?php if ($ext[1] == 'php'): ?>
	                            		<?php $title_file = explode('_', $ext[0]);$title_file = ucfirst($title_file['0']); ?>
	                            		<option <?= $filename_front == $ext[0] ? 'selected' : ''?> value="<?= $ext[0]?>"><?= $title_file?></option>
	                            	<?php endif ?>
	                            <?php endforeach ?>
	                          </select>
	                    </form>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-language"></i> <?= lang('selectmodule')?> (CMS)</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<form method="get">
	                          <select class="form-control" name="file" required="required" onchange="this.form.submit();">
	                            <option value=""><?= lang('choosefile')?></option>
	                            <?php foreach ($files as $value): ?>
	                            	<?php $ext = explode('.',$value); ?>
	                            	<?php if ($ext[1] == 'php'): ?>
	                            		<?php $title_file = explode('_', $ext[0]);$title_file = ucfirst($title_file['0']); ?>
	                            		<option <?= $filename == $ext[0] ? 'selected' : ''?> value="<?= $ext[0]?>"><?= $title_file?></option>
	                            	<?php endif ?>
	                            <?php endforeach ?>
	                          </select>
	                    </form>
					</div>
				</div>
			</div>
			<?php if (isset($filename) && $filename != '' || isset($filename_front) && $filename_front != ''): ?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<?php if (isset($filename) && $filename != ''): ?>
						<input type="hidden" name="filename" value="<?= $filename?>" id="filename">
						<input type="hidden" name="folder" value="cms" id="folder">
					<?php else: ?>
						<?php if (isset($filename_front) && $filename_front != ''): ?>
							<input type="hidden" name="filename" value="<?= $filename_front?>" id="filename">
							<input type="hidden" name="folder" value="front" id="folder">
						<?php endif ?>
					<?php endif ?>
	                <div class="x_panel">
	                  <div class="x_title">
	                    <h2><i class="fa fa-edit"></i> <?= lang('element')?> <small><?= lang('clickedit')?></small></h2>
	                    <ul class="nav navbar-right panel_toolbox">
	                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                      </li>
	                      <li><a class="close-link"><i class="fa fa-close"></i></a>
	                      </li>
	                    </ul>
	                    <div class="clearfix"></div>
	                  </div>
	                  <div class="x_content">
	                    <table class="table table-hover">
	                      <thead>
	                        <tr>
	                          <th width="20%"><?= lang('variable')?></th>
	                          <th width="40%"><img src="<?= my_library::admin_images()?>flag_english.png" style="height: 15px;" alt="english"> English</th>
	                          <th width="40%"><img src="<?=my_library::base_file().'language/'.$info_language['lang_flag']?>" style="height: 15px;" alt="<?=$info_language['lang_name']?>"> <?=$info_language['lang_name']?></th>
	                        </tr>
	                      </thead>
	                      <tbody>
	                      	<?php foreach ($arrContent as $key => $value): ?>
	                      		<?php 
	                      			$line_lang = explode(" = ", $value);
	                      			$line_default = explode(" = ", $arrDefault[$key]);
            						$textLang = trim($line_lang[1],"'");
            						$textDefault = trim($line_default[1],"'");
	                      		 ?>
	                      		 <tr>
		                          <td><code><?= $line_lang[0]?></code></td>
		                          <td><a href="javascript:;" class="translation" data-lang="english" data-content="<?= $textDefault?>"><?= $textDefault?></a></td>
		                          <td><a href="javascript:;" class="translation" data-lang="<?=$info_language['lang_code']?>" data-content="<?= $textLang?>"><?= $textLang?></a></td>
		                        </tr>
	                      	<?php endforeach ?>
	                      </tbody>
	                    </table>
	                  </div>
	                </div>
	              </div>
			<?php endif ?>
		</div>
	</div>
</div>