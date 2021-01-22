<header class="row_top">
    <?php $this->load->view("front/template/default/main_menu.php");?>
    <div class="title_detail" style="background-image: url(<?= my_library::base_file().'category'.'/'.$myCategory['category_picture']?>);">
        <div class="inner_title_detail">
            <h1><?= $myCategory['category_name']?></h1>
        </div>
    </div>
</header>
<main>
	<div class=" pt65">
		<div class="container">
            <div class="grid">
                <?php if (isset($listAlbum)): ?>
                    <?php foreach ($listAlbum as $value): ?>
                        <div class="grid-item" data-fancybox data-type="iframe" href="<?= base_url().$value['album_alias'].'-album'.$value['id'].'.html'?>">
                            <div class="grid-item-inner">
                                <a href="<?= base_url().$value['album_alias'].'-album'.$value['id'].'.html'?>">
                                    <img src="<?= my_library::base_file().'album/'.$value['id'].'/'.$value['album_picture']?>" alt="<?= $value['album_name']?>" width="100%">
                                    <div class="caption">
                                        <div class="table-container">
                                            <div class="table-inner">
                                            <h3 class="color-52b864"><?= $value['album_name']?></h3>
                                                <p class="fs12em"><?= $value['album_description']?></p>
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