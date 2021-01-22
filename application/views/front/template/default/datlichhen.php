<div class="row5">
    <style>.row5:before{background-image: url(<?= my_library::base_front()?>images/banner5.jpg);}</style>
    <div class="title-header text-center mb40">
        <h2 class="color-primary" style="text-transform: uppercase;"><?= lang('scheduleappointment')?></h2>
    </div>
    <div class="container">
        <form role="form" class="form_make flex_row_reverse">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pt30 pb30 maps">
                <iframe src="<?= $config['maps']?>" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pt30 pb30 contact">
                <div class="form-group mb20 ">
                    <label for="" class="mat-label"><?= lang('fullname')?></label>
                    <input type="text" class="form-control mat-input" id="fullname">
                </div>
                <div class="form-group mb20 ">
                    <label for="" class="mat-label"><?= lang('age')?></label>
                    <input type="text" class="form-control mat-input" id="old">
                </div>
                <div class="form-group mb20">
                    <label for="" class="mat-label">Email</label>
                    <input type="email" class="form-control mat-input" id="email">
                </div>
                <div class="form-group">
                    <label for="" class="mat-label"><?= lang('phone')?></label>
                    <input type="number" class="form-control mat-input" id="phone">
                </div>
                <!-- <div class="form-group">
                    <label for="" class="mat-label"><?= lang('total_assets')?></label>
                    <input type="text" class="form-control mat-input" id="total_assets">
                </div> -->
                <div class="form-group mb20">						
                    <select id="time" class="form-control">
                        <option value="0"><?= lang('time')?></option>
                        <option value="1"><?= lang('am')?></option>
                        <option value="2"><?= lang('pm')?></option>
                    </select>
                </div>
                <div class="form-group mb20 hidden">						
                    <select id="place" class="form-control">
                        <option value="1"><?= $config['address_hcm']?></option>
                    </select>
                </div>
                <div class="form-group mb20">
                <select id="er_program" class="form-control" required="required">
                    <option value="0"><?= lang('programofinterest')?></option>
                    <?php foreach ($listProgram as $key => $value) :
                        $link = $value['click_allow'] == 1 ? $value['alias'] : 'javascript:;';?>
                        <option value="<?= $value['id']?>"><?= $value['name']?></option>
                    <?php endforeach;?>
                </select>
                </div>
                <div class="form-group mb30">
                    <label for="" class="lab_textarea mat-label"><?= lang('content')?></label>
                    <textarea id="content" class="form-control mat-input" rows="4" required="required" placeholder=""></textarea>
                </div>
                <div class="text-center">
                    <button id="btn-appointment" type="button" class="btn btn-make"><?= lang('appointment')?></button>
                </div>
            </div>            
        </form>
    </div>
</div>
<div class="sending">
    <div class="table-container">
        <div class="table-inner">
            <img src="<?= base_url()?>public/admin/images/load.gif" alt="loading">
        </div>
    </div>
</div>