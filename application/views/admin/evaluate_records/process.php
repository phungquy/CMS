<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><?= $title?> <a href="<?= my_library::admin_site()?>evaluate_records"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-list"></i> <?= lang('list')?></button></a>
      </div>
      <div class="title_right hidden-xs">
        <ol class="breadcrumb pull-right">
          <li class="breadcrumb-item"><a href="<?= my_library::admin_site()?>"><?= lang('dashboard')?></a></li>
          <li class="breadcrumb-item"><a href="<?= my_library::admin_site()?>evaluate_records"><?= lang('list')?></a></li>
          <li class="breadcrumb-item active"><?= $title?></li>
        </ol>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-file"></i> <?= lang('infodetail')?></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>ID</td>
                <td><code><?= $myEr['id']?></code></td>
              </tr>
              <tr>
                <td><?= lang('fullname')?></td>
                <td><?= $myEr['brief_fullname']?></td>
              </tr>
              <tr>
                <td><?= lang('phone')?></td>
                <td><a href="tel:<?= $myEr['brief_phone']?>"><?= $myEr['brief_phone']?></a></td>
              </tr>
              <tr>
                <td>E-mail</td>
                <td><a href="mailto:<?= $myEr['brief_email']?>"><?= $myEr['brief_email']?></a></td>
              </tr>
              <tr>
                <td><?= lang('age')?></td>
                <td><span class="label label-success"><?= $myEr['brief_age']?></span></td>
              </tr>
              <tr>
                <td><?= lang('englishlevel')?></td>
                <td><?= $this->mevaluate_records->listEnglishlevel($myEr['brief_english_level'])?></td>
              </tr>
              <tr>
                <td><?= lang('managementexp')?></td>
                <td><?= $myEr['brief_management_exp'].' '.lang('year')?></td>
              </tr>
              <tr>
                <td><?= lang('businessownersexp')?></td>
                <td><?= $myEr['brief_business_exp'].' '.lang('year')?></td>
              </tr>
              <tr>
                <td><?= lang('networth')?></td>
                <td><?= $this->mevaluate_records->listNetworth($myEr['brief_asset'])?></td>
              </tr>
              <tr>
                <td><?= lang('program')?></td>
                <td><?= $this->mevaluate_records->listProgram($myEr['brief_program'])?></td>
              </tr>
              <tr>
                <td><?= lang('appointment')?></td>
                <td>
                  <?php if ($myEr['brief_appointment'] == 1): ?>
                    <span class="label label-success"><i class="fa fa-check"></i></span>
                  <?php endif ?>
                </td>
              </tr>
              <tr>
                <td><?= lang('status')?></td>
                <?php $status = $this->mevaluate_records->listStatusName($myEr['brief_status']);?>
                <td><span class="label label-<?= $status['color']?>"><?= $status['name']?></span></td>
              </tr>
              <tr>
                <td><?= lang('sentdate')?></td>
                <td><?= $myEr['brief_date']?></td>
              </tr>
              <tr>
                <td><?= lang('note')?></td>
                <td><cite><?= $myEr['brief_note']?></cite></td>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-bolt"></i> <?= lang('operations')?></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php if ($myEr['brief_status'] == 1): ?>
              <a href="<?= my_library::admin_site()?>evaluate_records/changestatus/<?= $myEr['id']?>"><button class="btn btn-sm btn-danger btn-block" type="button"><span style="text-transform: uppercase;"><?= lang('noprocess')?></span></button></a>
            <?php else: ?>
              <a href="<?= my_library::admin_site()?>evaluate_records/changestatus/<?= $myEr['id']?>"><button class="btn btn-sm btn-success btn-block" type="button"><span style="text-transform: uppercase;"><?= lang('processed')?></span></button></a>
            <?php endif ?>
            <button class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target=".bs-example-modal-lg" type="button"><span style="text-transform: uppercase;"><?= lang('send')?></span> E-MAIL</button>
            <a href="tel:<?= $myEr['brief_phone']?>"><button class="btn btn-sm btn-info btn-block" type="button"><span style="text-transform: uppercase;"><?= lang('call')?></span></button></a>
            <button class="btn btn-sm btn-danger btn-block" onclick="confirm_delete(<?= $myEr['id']?>,'<?= lang('brief')?>')" type="button"><span style="text-transform: uppercase;"><?= lang('delete')?></span></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Sendmail -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post">
        <input type="hidden" name="<?= $token_name?>" value="<?= $token_value?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-envelope-o"></i> <?= lang('send')?> E-mail</h4>
        </div>
        <div class="modal-body">
          <label for="to"><?= lang('to')?> * </label>
          <input type="email" class="form-control" name="to" value="<?= $myEr['brief_email']?>" required/>
          <label for="cc">Cc (<cite><?= lang('separated')?></cite>)</label>
          <input type="text" class="form-control" name="cc"/>
          <label for="subject"><?= lang('subject')?> * </label>
          <input type="text" class="form-control" name="subject" value="Maple Leaf - <?= lang('result')?>" required/>
          <br>
          <textarea id="content-mail" name="content" class="form-control"></textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> <?= lang('send')?></button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close')?></button>
        </div>
      </form>
    </div>
  </div>
</div>