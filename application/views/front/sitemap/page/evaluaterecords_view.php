<header class="row_top introduce h300px">
    <?php $this->load->view("front/template/default/main_menu.php");?>
    <div class="title_detail" style="background-image: url(<?= my_library::base_file().'page/'.$myPage['page_picture']?>);">
        <div class="inner_title_detail">
            <h1><?= $myPage['page_title']?></h1>
        </div>
    </div>
</header>
<main>
    <div class="row_record_reviews mb20">
        <div class="container">
            <form class="form-horizontal record_reviews_item">
                <div class="form-group">
                    <label for="" class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-md-offset-1 control-label"><h3 class="fs20px mt0"><?= lang('fullname')?>: </h3></label>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 ">
                        <input type="text" class="form-control" id="er_fullname" placeholder="<?= lang('fullname')?>">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-md-offset-1 control-label"><h3 class="fs20px mt0"><?= lang('phone')?>: </h3></label>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 ">
                        <input type="number" min="0" class="form-control" id="er_phone" placeholder="<?= lang('phone')?>">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-md-offset-1 control-label"><h3 class="fs20px mt0">Email: </h3></label>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 ">
                        <input type="text" class="form-control" id="er_email" placeholder="Email">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for=""  class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-md-offset-1 control-label"><h3 class="fs20px"><?= lang('age')?>: </h3></label>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <div class="old">
                            <input id="range_01" value="" name="old">
                            <script>
                                $(document).ready(function () {
                                    $("#range_01").ionRangeSlider({
                                        min: 22,
                                        max: 65,
                                        from: 22
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for=""  class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-md-offset-1 control-label"><h3 class="fs20px"><?= lang('englishlevel')?>: </h3></label>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <div class="radio">
                            <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 text-center height_60mb">
                                <input type="radio" value="1" id="radio1" name="rad_eng" checked="checked"><label class="radio_item" for="radio1"><h4 class="fs20px"><?= lang('non')?></h4></label>
                            </div>
                            <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 text-center height_60mb">
                                <input type="radio" value="2" id="radio2" name="rad_eng" ><label class="radio_item" for="radio2"><h4>IELTS 4.0</h4></label>
                            </div>
                            <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 text-center height_60mb">
                                <input type="radio" value="3" id="radio3" name="rad_eng" ><label class="radio_item" for="radio3"><h4>IELTS 5.0</h4></label>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 text-center height_60mb">
                                <input type="radio" value="4" id="radio4" name="rad_eng" ><label class="radio_item" for="radio4"><h4>IELTS 5.5</h4></label>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 text-center height_60mb">
                                <input type="radio" value="5" id="radio5" name="rad_eng" ><label class="radio_item" for="radio5"><h4>>= IELTS 6.0</h4></label>
                            </div>
                            <div class="clearfix"></div>
                        </div> 
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for=""  class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-md-offset-1 control-label"><h3 class="fs20px"><?= lang('managementexperience')?>: </h3></label>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <div class="experience">
                            <input id="range_02" value="" name="kn">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for=""  class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-md-offset-1 control-label"><h3 class="fs20px"><?= lang('experiencebusiness')?>: </h3></label>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 ">
                        <div class="experience">
                            <input id="range_03" value="" name="kn">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for=""  class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-md-offset-1 control-label"><h3 class="fs20px mt0"><?= lang('networth')?>: </h3></label>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <div class="experience">
                            <select id="er_networth" class="form-control" required="required">
                                <option value="1">CAD 600,000 - 800,000</option>
                                <option value="2">CAD 800,000 - 1,000,000</option>
                                <option value="3">CAD 1,000,000 - 2,000,000</option>
                                <option value="4">> CAD 2,000,000</option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for=""  class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-md-offset-1 control-label"><h3 class="fs20px mt0"><?= lang('programofinterest')?>: </h3></label>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <div class="experience">
                            <select id="er_program" class="form-control" required="required">
                                <option value="6">EB5</option>
                                <option value="1">New Brunswick</option>
                                <option value="3">PEI</option>
                                <option value="4">Québec</option>
                                <option value="5">Saskatchewan</option>
                                <option value="2">Start-Up Visa</option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for=""  class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-md-offset-1 control-label"><h3 class="fs20px"><?= lang('appointment')?>: </h3></label>
                    <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8 ">
                        <div class="radio">
                            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 text-center">
                                <input type="radio" id="radio_Appointment1" value="1" name="rad_appointment" checked="checked"><label class="radio_item control-label" for="radio_Appointment1"><h4><?= lang('yes')?></h4></label>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 text-center">
                                <input type="radio" id="radio_Appointment2" value="2" name="rad_appointment" ><label class="radio_item control-label" for="radio_Appointment2"><h4><?= lang('no')?></h4></label>
                            </div>
                            <div class="clearfix"></div>
                        </div> 
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for=""  class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-md-offset-1 control-label mt40"><h3 class="fs20px mt0"><?= lang('note')?>: </h3></label>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 ">
                        <textarea id="er_note" class="form-control" rows="4" required="required"></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="text-center"><button type="button" id="ersend" class="btn bnt-result-eva"><?= lang('evaluaterecords')?></button></div>
            </form>
        </div>
    </div>
    <?php $this->load->view("front/template/default/datlichhen.php");?>   
</main>