// BEGIN CLICK MENU MOBI
/*$(document).ready(function($) {
    
    $(document).click(function(event) {
        var target = $(event.target);
        if (!target.is('.navbar-nav')) {
            $('.navbar-collapse').removeClass('in');
        }if(!target.is('.close')){
            $('.navbar-toggle').removeClass('close');
            $('.navbar').removeClass('bg');
        }
    });
});*/
$(document).ready(function() {
    var isMenuOpen = false;
    $('.navbar-toggle').click(function()
    {
        if (isMenuOpen == false)
        {
            // $(".navbar-nav").clearQueue().animate({
            //     left : '0px' 
            // })   
            $('.navbar-collapse').addClass("left0Menu");         
            $("#grey_back").fadeIn('fast').css({'width':'100%'});
            $(this).fadeOut(200);
            // $(".close").fadeIn(300);
             
            isMenuOpen = true;
        } 
    });     
    $('#grey_back').click(function()
    {
        if (isMenuOpen == true)
        {
            $('.navbar-collapse').removeClass("left0Menu");           
            $("#grey_back").fadeOut('fast').css({'width':'0'});
            $(this).fadeOut(200);
            $(".navbar-toggle").fadeIn(300);
             
            isMenuOpen = false;
        }
    });
});
// END MENU MOBI
// BEGIN WOW

// END
// BEGIN scroll menu
    $(document).scroll(function(e){
        var scrollTop = $(document).scrollTop();
        if(scrollTop > 0){
            $('.navbar-default').removeClass('navbar-static-top').addClass('navbar-fixed-top');
        } else {
            $('.navbar-default').removeClass('navbar-fixed-top').addClass('navbar-static-top');
            
        }
    });
    ;(function(document, window, index) {
        'use strict';
        var elSelector = '.navbar-default',
            element = document.querySelector(elSelector);
        if (!element) return true;
        var elHeight = 0,
            elTop = 0,
            dHeight = 0,
            wHeight = 0,
            wScrollCurrent = 0,
            wScrollBefore = 0,
            wScrollDiff = 0;
        window.addEventListener('scroll', function() {
            elHeight = element.offsetHeight;
            dHeight = document.body.offsetHeight;
            wHeight = window.innerHeight;
            wScrollCurrent = window.pageYOffset;
            wScrollDiff = wScrollBefore - wScrollCurrent;
            elTop = parseInt(window.getComputedStyle(element).getPropertyValue('top')) + wScrollDiff;
            if (wScrollCurrent <= 0) element.style.top = '0px';
            else if (wScrollDiff > 0) element.style.top = (elTop > 0 ? 0 : elTop) + 'px';
            else if (wScrollDiff < 0) {
                if (wScrollCurrent + wHeight >= dHeight - elHeight) element.style.top = ((elTop = wScrollCurrent + wHeight - dHeight) < 0 ? elTop : 0) + 'px';
                else element.style.top = (Math.abs(elTop) > elHeight ? -elHeight : elTop) + 'px';
            }
            wScrollBefore = wScrollCurrent;
        });
    }(document, window, 0));
// END sroll menu
// ACTIVE MENU
// var aurl = window.location.href;
// $('.nav li a').filter(function() { 
//     return $(this).prop('href') === aurl;
// }).parent('li').addClass('active');
// SCROLL DOWN
$(function() {
	$('#click_down').on('click', function(e) {
	  e.preventDefault();
	  $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top-60}, 800, 'linear');
	});
  });

// aaaaaaaa
$(".mat-input").focus(function(){
    $(this).parent().addClass("is-active is-completed");
});
$(".mat-input").focusout(function(){
    if($(this).val() === "")
        $(this).parent().removeClass("is-completed");
    $(this).parent().removeClass("is-active");
});
// ///////////

/////////////
$(".hover_img").hover(function(){
    $('.hover_img').not(this).css("filter", "grayscale(100%)");
    }, function(){
    $('.hover_img').not(this).css("filter", "grayscale(0%)");
});
$(document).ready(function () {
    $('.click_show_submenu').click(function (e) {
        $(this).parents('#menu-principal li').children('ul').toggleClass('show_menusub');
        e.preventDefault();
        return false;
    });
    
});
// //////bangsosanhhoso////////////////////
$("input:checkbox:not(:checked)").each(function() {
    var column = "table ." + $(this).attr("name");
    $(column).hide();
});

$("input:checkbox").click(function(){
    var column = "table ." + $(this).attr("name");
    $(column).toggle();
});
// ////////////////danh gia ho so//////////////////////////
$(document).ready(function () {
    $("#range_02").ionRangeSlider({
        min: 0,
        max: 15,
        from: 0
    });
    $("#range_03").ionRangeSlider({
        min: 0,
        max: 15,
        from: 0
    });
});
$(document).ready(function () {
// /////Tin tuc hoi thao////////////
$('#owl-partner').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    navText : ['',''],
    autoplay: true,
    autoplayTimeout:4000,
    autoplayHoverPause: true,
    items:1,
    nav: true,
    animateOut: 'fadeOut',
    navText: ["<div class='owl-next-item'><i class='fa fa-angle-right' aria-hidden='true'></i></div>","<div class='owl-next-item'><i class='fa fa-angle-left' aria-hidden='true'></i></div>"]

});
// //////////Slider/////////////////////////////////
    $('#owl-example').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout:3000,
        autoplayHoverPause: true,
        autoHeight: true,
        animateOut: 'fadeOut',
        nav: false,
        navText: ["<div class='owl-next-item'><i class='fa fa-angle-right' aria-hidden='true'></i></div>","<div class='owl-next-item'><i class='fa fa-angle-left' aria-hidden='true'></i></div>"]
    });
});
// Đặt lịch hẹn
var error_info = "Vui lòng nhập đầy đủ thông tin!";
var title = "Xác nhận lại thông tin";
var title_confirm = "Bạn muốn lên lịch hẹn?";
var title_er = "Bạn muốn gửi hồ sơ cho chúng tôi?";
var confirm = "Đồng ý!";
if (configs.lang == "english") {
    var error_info = "Please enter full information!";
    var title = "Confirm the information";
    var title_confirm = "Are you sure to book an appointment?";
    var title_er = "Want to send us a profile?";
    var confirm = "Agree!";
}
var sending = $(".sending");
$(document).ready(function() {
    $("#btn-appointment").click(function(){
        var fullname = $("#fullname");
        var email = $("#email");
        var phone = $("#phone");
        var time = $("#time");
        var place = $("#place");
        var content = $("#content");
        if (fullname.val().length > 0 && email.val().length > 0 && phone.val().length > 0) {
            swal({
                  html: true,
                  title: title,
                  text: fullname.val()+'<br>'+email.val()+'<br>'+phone.val()+'<br>'+content.val()+'<br><b>'+title_confirm+'</b>',
                  showCancelButton: true,
                  confirmButtonClass: "btn-success",
                  confirmButtonText: confirm,
                  closeOnConfirm: true
            },
            function(){
                sending.css("display","block");
                $.ajax({
                    url: configs.base_url+'appointment',
                    dataType: 'json',
                    data: {fullname: fullname.val(),email: email.val(),phone : phone.val(),time : time.val(),place: place.val(),content : content.val()},
                    success:function(rs){
                        if (rs.status == 1) {
                            swal(rs.title, rs.message,"success");
                            fullname.val('');
                            email.val('');
                            phone.val('');
                            content.val('');
                        } else {
                            swal(rs.title, rs.message,"error");
                        }
                        sending.css("display","none");
                    }
                });
            });
            
        } else {
            swal(error_info, "","error");
        }
    });
});
// Đánh giá hồ sơ
$(document).ready(function() {
    $("#ersend").click(function(){
        var er_fullname = $("#er_fullname");
        var er_phone = $("#er_phone");
        var er_email = $("#er_email");
        var er_age = $("#range_01");
        var er_english_level = $("input[name=rad_eng]:checked");
        var er_managementexperience = $("#range_02");
        var er_experiencebusiness = $("#range_03");
        var er_networth = $("#er_networth");
        var er_program = $("#er_program");
        var er_appointment = $("input[name=rad_appointment]:checked");
        var er_note = $("#er_note");
        if (er_fullname.val().length > 0 && er_phone.val().length > 0 && er_email.val().length > 0) {
            swal({
                  html: true,
                  title: title,
                  text: er_fullname.val()+'<br>'+er_phone.val()+'<br>'+er_email.val()+'<br>'+er_note.val()+'<br><b>'+title_er+'</b>',
                  showCancelButton: true,
                  confirmButtonClass: "btn-success",
                  confirmButtonText: confirm,
                  closeOnConfirm: true
            },
            function(){
                sending.css("display","block");
                $.ajax({
                    url: configs.base_url+'evaluate-records',
                    dataType: 'json',
                    data: {er_fullname: er_fullname.val(),er_phone: er_phone.val(),er_email : er_email.val(),er_age : er_age.val(),er_english_level: er_english_level.val(),er_managementexperience : er_managementexperience.val(),er_experiencebusiness : er_experiencebusiness.val(),er_networth : er_networth.val(),er_program : er_program.val(),er_appointment : er_appointment.val(),er_note : er_note.val()},
                    success:function(rs){
                        if (rs.status == 1) {
                            swal(rs.title, rs.message,"success");
                            er_fullname.val('');
                            er_phone.val('');
                            er_email.val('');
                            er_note.val('');
                        } else {
                            swal(rs.title, rs.message,"error");
                        }
                        sending.css("display","none");
                    }
                });
            });
        } else {
            swal(error_info, "","error");
        }
    });
});
// ////////////////////////////
var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;

if(!isMobile) {
    $(function() {
        $( "li", ".timeline_item_right" ).sort(function( a, b ) {
            return $( a ).text() < $( b ).text(); 
        }).appendTo( ".timeline_item_right" );
    });
}else{
    $('.timeline_item').removeClass("timeline_item_right");
    $('.timeline_item li').addClass("background-color-168943");
}
///////////////////////
    function scrollNav() {
        $('.the-thub_img_title a').click(function(){
            $('html, body').stop().animate({
                scrollTop: $( $(this).attr('href') ).offset().top - 55
            }, 400);
            return false;
        });
        $('.scrollTop a').scrollTop();
    }
    scrollNav();	