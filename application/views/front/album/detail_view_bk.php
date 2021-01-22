<header class="row_top">
    <?php $this->load->view("front/template/default/main_menu.php");?>
    <div class="title_detail" style="background-image: url(<?= my_library::base_file().'album'.'/'.$id.'/'.$myAlbum['album_picture']?>);">
        <div class="inner_title_detail">
            <h1><?= $myAlbum['album_name']?></h1>
        </div>
    </div>
</header>
<main>
	<div class="mb65 pt65">
		<div class="container">
            <div style="font-size: 20px"><?= $myAlbum['album_description']?></div>
            <div class="flex-wrap">
                <?php if (isset($myAlbumDetail)): ?>
                    <?php foreach ($myAlbumDetail as $value): ?>
                        <div class="col-xs-6 col-sm-4 col-md-4 pl0 pr0" href="<?= my_library::base_file().'album/'.$id.'/'.$value['picture']?>" data-fancybox="images">
                            <div class="grid-item-inner" style="display: flex;height: 100%">
                                <a href="<?= my_library::base_file().'album/'.$id.'/'.$value['picture']?>" >
                                    <img src="<?= my_library::base_file().'album/'.$id.'/'.$value['picture']?>" alt="<?= $value['description']?>" width="100%" height="100%">
                                    <div class="caption">
                                        <div class="table-container">
                                            <div class="table-inner">
                                                <h3 class="color-52b864"><?= $value['description']?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
            <?php if (isset($pagination)): ?>
                <div class="text-center">
                    <ul class="pagination pagination_news">
                        <?= $pagination?>
                    </ul>
                </div>
            <?php endif ?>
		</div>
	</div>
</main>
