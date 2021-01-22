<?= header('Content-type: text/xml');?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<?php if ($menuMain): ?>
		<?php foreach ($menuMain as $key => $value): ?>
			<?php if ($value['alias'] == '') {
				$value['alias'] = base_url();
			} ?>
			<url>
				<?php if ($value['ingredient'] == 3): ?>
					<loc><?= $value['alias']?></loc>
				<?php else: ?>
					<loc><?= base_url().$value['alias']?></loc>
				<?php endif ?>
				<priority><?= $key == 0 ? '1.0' : '0.5'; ?></priority>
			</url>
		<?php endforeach ?>
	<?php endif ?>
</urlset>