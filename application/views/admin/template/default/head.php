<!DOCTYPE html>

<html lang="<?= $language?>">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?= $title?> | Admin CMS</title>

	<meta name="theme-color" content="#2A3F54">

	<link href="<?= my_library::admin_css()?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<link href="<?= my_library::admin_css()?>font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<link href="<?= my_library::admin_css()?>nprogress.css" rel="stylesheet">

	<link href="<?= my_library::admin_css()?>custom.min.css" rel="stylesheet">

	<link href="<?= my_library::admin_css()?>pnotify.css" rel="stylesheet">

	<link href="<?= my_library::admin_css()?>sweetalert.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

	<script type="text/javascript">

		var configs = {

			base_url: '<?= my_library::base_url()?>',

			admin_site: '<?= my_library::admin_site()?>',

			controller: '<?= $controller?>',

			lang: '<?= $language?>'

		}

	</script>

	<?php if (!empty($extraCss)): ?>

		<?php foreach ($extraCss as $value): ?>

			<link href="<?= my_library::admin_css().$value?>" rel="stylesheet">

		<?php endforeach ?>

	<?php endif ?>

</head>