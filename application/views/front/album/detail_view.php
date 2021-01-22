<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="<?= base_url('public/front/slider_pro/slider-pro.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('public/front/slider_pro/jquery.fancybox.css')?>">
  <link rel="stylesheet" href="<?= base_url('public/front/slider_pro/examples.css')?>">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
  <style type="text/css">
    body::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      border-radius: 0px;
      background-color: transparent;
    }

    body::-webkit-scrollbar {
      width: 5px;
      background-color: transparent;
    }

    body::-webkit-scrollbar-thumb {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      background-color: #377a3c;
    }
  </style>
</head>
<body>
  <h3 class="color-52b864"><?= $value['album_name']?></h3>
  <p class="fs12em"><?= $value['album_description']?></p>     
  <div id="example2" class="slider-pro">
      <div class="sp-slides">
          <?php if (isset($myAlbumDetail)): ?>
            <?php foreach ($myAlbumDetail as $value): ?>
                <div class="sp-slide">
                    <a href="<?= my_library::base_file().'album/'.$id.'/'.$value['picture']?>">
                        <img class="sp-image" src="<?= base_url()?>public/front/slider_pro/img/blank.gif" 
                          data-src="<?= my_library::base_file().'album/'.$id.'/'.$value['picture']?>" 
                          data-retina="<?= my_library::base_file().'album/'.$id.'/'.$value['picture']?>" alt="<?= $value['description']?>"/>
                    </a>
                    <p class="sp-caption"><?= $value['description']?></p>
                </div>
            <?php endforeach ?>
        <?php endif ?>
      </div>
  </div>
  <script src="<?= base_url() ?>public/front/slider_pro/jquery-1.11.0.min.js"></script>
  <script src="<?= base_url() ?>public/front/slider_pro/jquery.sliderPro.min.js"></script>
  <script src="<?= base_url() ?>public/front/slider_pro/jquery.fancybox.pack.js"></script>
  <script type="text/javascript">
    $( document ).ready(function( $ ) {
      $( '#example2' ).sliderPro({
        width: 300,
        height: 500,
        visibleSize: '100%',
        forceSize: 'fullWidth',
        autoSlideSize: true
      });

      // instantiate fancybox when a link is clicked
      $( '#example2 .sp-image' ).parent( 'a' ).on( 'click', function( event ) {
        event.preventDefault();
        if ( $( '#example2' ).hasClass( 'sp-swiping' ) === false ) {
          $.fancybox.open( $( '#example2 .sp-image' ).parent( 'a' ), { index: $( this ).parents( '.sp-slide' ).index() } );
        }
      });
    });
  </script>
</body>
</html>