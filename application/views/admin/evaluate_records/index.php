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
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<p><?= lang('all')?> (<?= $record?>)</p>
						<div class="">
							<form class="form-horizontal form-label-left" method="get">
								<div class="form-group">
									<div class="col-md-3 col-sm-3 col-xs-6">
										<div class="input-group">
										<input type="text" name="fkeyword" value="<?= $formData['fkeyword']?>" placeholder="<?= lang('search')?>" class="form-control">
											<span class="input-group-btn">
												<button type="submit" class="btn btn-dark"><i class="fa fa-search"></i></button>
											</span>
										</div>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6">
										<select class="form-control" name="fnetworth" onchange="this.form.submit()">
											<?= $fnetworth?>
										</select>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6">
										<select class="form-control" name="fprogram" onchange="this.form.submit()">
											<?= $fprogram?>
										</select>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6">
										<select class="form-control" name="fstatus" onchange="this.form.submit()">
											<?= $fstatus?>
										</select>
									</div>
								</div>
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="30%"><?= lang('fullname')?></th>
									<th width="5%"><?= lang('age')?></th>
									<th width="10%"><?= lang('program')?></th>
									<th width="20%"><?= lang('networth')?></th>
									<th class="text-center" width="10%"><?= lang('appointment')?></th>
									<th width="5%"><?= lang('status')?></th>
									<th width="20%"><?= lang('sentdate')?></th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($list)): ?>
									<?php foreach ($list as $value): ?>
										<?php 
											$linkView = my_library::admin_site().'evaluate_records/process/'.$value['id'];
											$networth = $this->mevaluate_records->listNetworth($value['brief_asset']);
											$program = $this->mevaluate_records->listProgram($value['brief_program']);
											$status = $this->mevaluate_records->listStatusName($value['brief_status']);
										 ?>
										<tr class="showacction">
											<td><h5><?= $value['brief_fullname']?> / <a href="tel:<?= $value['brief_phone']?>"><code><?= $value['brief_phone']?></code></a></h5>
												<div style="height: 20px;">
													<div class="actionhover">
														<a href="<?= $linkView?>" class="text-primary"><?= lang('viewprofile')?></a> | <a href="javascript:;" onclick="confirm_delete(<?= $value['id']?>,'<?= lang('brief')?>')" class="text-danger"><?= lang('delete')?></a>
													</div>
												</div>
											</td>
											<td><span class="badge bg-green"><?= $value['brief_age']?></span></td>
											<td><?= $program?></td>
											<td><?= $networth?></td>
											<td class="text-center">
												<?php if ($value['brief_appointment'] == 1): ?>
													<span class="label label-success"><i class="fa fa-check"></i></span>
												<?php endif ?>
											</td>
											<td><span class="label label-<?= $status['color']?>"><?= $status['name']?></span></td>
											<td><?= $value['brief_date']?></td>
										</tr>
									<?php endforeach ?>
								<?php else: ?>
									<p class="text-danger"><?= lang('listempty')?></p>
								<?php endif ?>
							</tbody>
						</table>
						<?php if (isset($pagination)): ?>
			              	<ul class="pagination pull-right"><?= $pagination?></ul>
			            <?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>