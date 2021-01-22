	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="author" content="<?= $config['company_name']?>">

    <meta name="description" content="<?= $description_seo?>">

    <meta name="keyword" content="<?= $keyword_seo?>">

    <meta property="og:type" content="website">

    <meta property="og:url" content="<?= current_url()?>">

    <meta property="og:title" content="<?= $title_seo?>">

    <meta property="og:image" content="<?= $picture_seo?>">

    <meta property="og:description" content="<?= $description_seo?>">

    <meta property="og:site_name" content="<?= $config['company_name']?>">

    <meta property="og:locale" content="vi_VN">

    <meta name="theme-color" content="#367a3d">

	<link rel="shortcut icon" href="favicon.ico" />

	<title><?= $title?> - <?= $config['title']?></title>

	<script type="text/javascript">

		var configs = {

			base_url: '<?= base_url()?>',

			lang: '<?= $language?>'

		}

	</script>

	<link rel="stylesheet" href="<?= my_library::base_front()?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= my_library::base_front()?>bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css">

	<link rel="stylesheet" href="<?= my_library::base_front()?>css/style.css">

	<link rel="stylesheet" href="<?= my_library::base_front()?>css/base.css">

	<link rel="stylesheet" href="<?= my_library::base_front()?>css/components/componets.css">

	<link rel="stylesheet" href="<?= my_library::admin_css()?>sweetalert.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">	
	<link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
	<link href="https://unpkg.com/@videojs/themes@1/dist/forest/index.css" rel="stylesheet">
	<script src="https://use.fontawesome.com/326309e41f.js"></script>
	<script src="<?= my_library::base_front()?>js/jquery.min.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-82206514-1"></script>

    <script>

      window.dataLayer = window.dataLayer || [];

      function gtag(){dataLayer.push(arguments);}

      gtag('js', new Date());

      gtag('config', 'UA-82206514-1');

    </script>

    <style type="text/css">

    	body {

		    font-family: 'Roboto Slab', serif !important;

		    font-size: 13px;

		    font-weight: 300;

		}

    </style>

		<!-- Facebook Pixel Code -->

		<script>

			!function(f,b,e,v,n,t,s)

			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?

			n.callMethod.apply(n,arguments):n.queue.push(arguments)};

			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

			n.queue=[];t=b.createElement(e);t.async=!0;

			t.src=v;s=b.getElementsByTagName(e)[0];

			s.parentNode.insertBefore(t,s)}(window, document,'script',

			'https://connect.facebook.net/en_US/fbevents.js');

			fbq('init', '595635130917413');

			fbq('track', 'PageView');

		</script>

		<noscript><img height="1" width="1" style="display:none"

			src="https://www.facebook.com/tr?id=595635130917413&ev=PageView&noscript=1"

		/></noscript>

		<!-- End Facebook Pixel Code -->