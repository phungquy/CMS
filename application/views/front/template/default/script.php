<!-- Bootstrap JavaScript -->
<script src="<?= my_library::base_front()?>bootstrap/js/bootstrap.min.js"></script>
<script>

$(function () {

    $('[data-toggle="tooltip"]').tooltip()

  });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="<?= my_library::base_front()?>js/owl.carousel.js"></script>

<script src="<?= my_library::base_front()?>js/ion.rangeSlider.min.js"></script>

<script src="<?= my_library::base_front()?>js/isotope.pkgd.js"></script>

<script src="<?= my_library::base_front()?>js/imagesloaded.pkgd.js"></script>

<script src="<?= my_library::base_front()?>js/jquery.fancybox.min.js"></script>

<script src="<?= my_library::admin_js()?>sweetalert.min.js"></script>
<script src="https://vjs.zencdn.net/7.8.4/video.js"></script>
<script>

    var $grid = $('.grid').isotope({

      itemSelector: '.grid-item',

      percentPosition: true,

      masonry: {

        columnWidth: '.grid-item'

      }

    });

    $grid.imagesLoaded().progress( function() {

      $grid.isotope('layout');

    }); 

</script>

<script src="<?= my_library::base_front()?>js/script.js"></script>
<?php $this->load->view("front/template/default/contactus.php");?>