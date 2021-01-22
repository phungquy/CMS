<section class="slider" style="position:relative;top:0;left:0;width:100%;height:100%;overflow:hidden; z-index:1;">
    <link href="<?= base_url('public/front/css/components/slider.css')?>" rel="stylesheet">
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    <!-- ================================================== -->
    <div id="slider1_container" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:400vh;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;

            background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;">
            </div>
            <div style="position: absolute; display: block; no-repeat center center;

            top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>
        <!-- Slides Container -->
        <div u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:400vh;overflow:hidden;">
            <?php foreach ($slide_home as$value): ?>
                <div class="item" data-p="267">
                    <div style="background-image: url('<?= my_library::base_file().'banner/'.$value['id'].'/'.$value['banner_picture']?>')"></div>
                    <!-- <img src="<?= my_library::base_file().'banner/'.$value['id'].'/'.$value['banner_picture']?>" alt=""> -->
                    <div class="item-text">
                        <a href="<?= $value['banner_link'] ?>" class="link"> 
                            <div class="table-container">
                                <div class="table-inner fs19em">
                                    <?php if ($value['banner_title'] != ''): ?>
                                        <h2 class="color_fff display-inline-block pall10 fs36px"><?= $value['banner_title']?></h2>
                                        <br>
                                    <?php endif ?>
                                    <?php if ($value['banner_description'] != ''): ?>
                                        <p class="color_fff display-inline-block pall10"><?= $value['banner_description']?></p><br>
                                    <?php endif ?>                                
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>		            
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb064" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>        
    </div>
    <!-- Jssor Slider End -->	     
    <script src="<?= base_url('public/front/js/jssor.slider.js')?>"></script>
    <script src="<?= base_url('public/front/js/init-banner-home.jssor.jquery.js')?>"></script>
    <!-- <svg style="pointer-events: none;position: absolute;bottom: 0;z-index: 1;" class="wave color-fff" width="100%" height="50px" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
        <defs>
            <style>
                .a {fill: none;}
                .b {clip-path: url(#a);}
                .wave.color-fff .c,
                .wave.color-fff .d {fill: #fff;}
                .d {opacity: 0.5; isolation: isolate;}
            </style>
            <clipPath id="a">
                <rect class="a" width="1920" height="75"></rect>
            </clipPath>
        </defs>
        <title>wave</title>
        <g class="b">
        <path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48"></path>
        </g>
        <g class="b">
        <path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10"></path>
        </g>
        <g class="b">
        <path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24"></path>
        </g>
        <g class="b">
        <path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150"></path>
        </g>
    </svg> -->
</section>