<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sitemap <?= $config['company_name']?></title>
</head>
<body>
	<h1><?= $config['company_name']?></h1>
	<?php if ($menuMain): ?>
		<ul>
		    <?php foreach ($menuMain as $value): ?>
				<li><a href="<?= base_url().$value['alias']?>"><?= $value['name']?></a>
					<?php if (isset($value['child'])): ?>
						<ul>
						    <?php foreach ($value['child'] as $val): ?>
						    	<li><a href="<?= base_url().$val['alias']?>"><?= $val['name']?></a></li>
						    <?php endforeach ?>
						</ul>
					<?php endif ?>
				</li>
			<?php endforeach ?>
		</ul>
	<?php endif ?>
</body>
</html>