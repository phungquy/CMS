<style type="text/css">

#backtotop {

    display:none;

    overflow: hidden;

    position: fixed;

    bottom: 130px;

    background: -webkit-linear-gradient(-225deg,var(--intynets-accent-color) 0%,var(--intynets-accent-color-hover) 50%, var(--intynets-accent-color) 100%);
    background: -o-linear-gradient(-225deg,var(--intynets-accent-color) 0%,var(--intynets-accent-color-hover) 50%, var(--intynets-accent-color) 100%);
    background: linear-gradient(-225deg,var(--intynets-accent-color) 0%,var(--intynets-accent-color-hover) 50%, var(--intynets-accent-color) 100%);

    border-radius: 50%;

    border: 0;

    text-align: center;

    z-index: 9999;

   

}

#backtotop:hover {

    text-decoration:none;

    background: -webkit-linear-gradient(-225deg,var(--intynets-primary-color) 0%,var(--intynets-primary-color-hover) 50%, var(--intynets-primary-color) 100%);
    background: -o-linear-gradient(-225deg,var(--intynets-primary-color) 0%,var(--intynets-primary-color-hover) 50%, var(--intynets-primary-color) 100%);
    background: linear-gradient(-225deg,var(--intynets-primary-color) 0%,var(--intynets-primary-color-hover) 50%, var(--intynets-primary-color) 100%);

    color:#fff;

    cursor: pointer;

}

#backtotop .fa {

    width: 21px;

    height: 24px;

    position: absolute;

    top: 0;right: 0;bottom: 0;left: 0;

    margin: auto;

    text-decoration: none;

    color: #fff;

    font-size: 30px;

    line-height: 21px;

}

#backtotop:hover .fa {

    color:#fff;

    animation: ScrolltoTop .8s linear infinite;

    -webkit-animation: ScrolltoTop .8s linear infinite;

}

@keyframes ScrolltoTop{

    0%      {bottom: -10px;}

    50%    {top: -20px}

    100%    {top: 10px}

}

@-webkit-keyframes ScrolltoTop{

    0%      {bottom: -10px;}

    50%    {top: -20px}

    100%    {top: 10px}

}

@media(max-width:767px) {

    #backtotop {

        width: 40px;

        height: 40px;

        right: 0;

        border-radius: 4px 0 0 4px;

        background: #377a3c;

    }

}

@media(min-width:768px) {

    #backtotop {

        width: 36px;

        height: 36px;

        right: 10px;

    }

}

@media(min-width:992px) {

    #backtotop {

        width: 39px;

        height: 39px;

        right: 10px;

    }

}

@media(min-width:1200px) {

    #backtotop {

        width: 50px;

        height: 50px;

        right: 20px;

    }

}

</style>

<div id="backtotop" title="Lên đầu trang"><i class="fa fa-angle-double-up"></i></div>

<script type="text/javascript">

    $(document).ready(function () {

        $('#backtotop').click(function(){

            $('body,html').animate({scrollTop:0},800);

        });

    });

    $(window).scroll(function(){

        if($(this).scrollTop()!=0){

            $('[data-position=fixtotop]').addClass("navbar-fix-top");

            $('#backtotop').fadeIn();

        } else {

        $('[data-position=fixtotop]').removeClass("navbar-fix-top");

            $('#backtotop').fadeOut();

        }

    });

</script>