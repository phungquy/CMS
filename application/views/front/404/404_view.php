<header class="row_top">
    <?php $this->load->view("front/template/default/main_menu.php");?>
    <style type="text/css">
        body{
            background-image: url(http://uspartner.com/images/404.png);
        }
        .bg_404 .container{
            padding: 20px;
        }
        .mid_center{
            width: 600px;
            margin: auto;   
        }
        .mid_center img{
            margin: auto;
        }
        .search{
            margin-top: 20px;
        }
        .search input {
            height:  50px;
            color: #000;
            border-radius:  0px;
            font-weight: bold;
            font-size: 20px;
            border: 1px solid #205029;
        }

        .search .form-group {
            position: relative;
        }

        .search .form-group button.btn-search {
            position:  absolute;
            top: 0;
            right:  0;
            height: 100%;
            background: #205029;
            border:  0;
            padding: 0px 30px;
            font-size:  20px;
            color: #fff;
        }
        main{
            position: relative;
        }
        .eror-item {
            top: 0;
            bottom:  0;
            background:  #fff;
            max-width: 1200px;
            width:  100%;
            margin:  auto;
            left:  0;
            right:  0;
            padding: 60px 100px;
        }
    </style>
</header>
<main>
    <div class="bg_404">
        <div class="container">
            <div class="eror-item">
                <div class="table-container">
                    <div class="table-inner">
                        <div class="mid_center">
                           <!--  <img src="<?= my_library::base_public().'admin/images/404.gif'?>" class="img-responsive" alt="404" style="width: 350px;"> -->
                            <img src="http://www.iblogzone.com/wp-content/uploads/2015/01/404.png" class="img-responsive randomColor" alt="404" style="width: 100%;transition: all 1s">
                        </div>
                        <h3 class="text-center randomColor_text" style="transition: all .8s">Trang bạn đang cố truy cập không tồn tại</h3>
                        <h2 class="text-center randomColor_text " style="transition: all .5s">Quay về <a href="<?= base_url()?>">trang chủ</a> hoặc tìm kiếm bên dưới!</h2>
                        <div class="search">
                            <form action="<?= base_url()?>search" method="get" role="form" class="form_search">
                                <div class="form-group">
                                    <input type="text" name="k" class="form-control" placeholder="<?= lang('search')?>">
                                    <button type="submit" class="randomColor btn-search" style="transition: all .5s"><span><?= lang('search')?></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    window.setInterval(function(){

        var randomColor = '#'+ ('000000' + Math.floor(Math.random()*16777215).toString(16)).slice(-6);
        
        $('.randomColor').css({
          'background-color' : randomColor,
        });
        $('.randomColor_text').css({
          'color' : randomColor,
        });

      }, 2000);
</script>