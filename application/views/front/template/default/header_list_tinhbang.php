<div class="the-thub_img_title">
    <ul>
        <?php if (isset($listProgram)): ?>
            <?php foreach ($listProgram as $value): ?>
                <?php $active = isset($id_news) && $id_news == $value['id'] ? 'active' : ''; ?>
                <?php
                    $hiddenS = $sold_out = '';
                    if(strpos($value['news_tag'],'SOLD OUT') !==  false || strpos($value['news_tag'],'sold out') !==  false){
                        $hiddenS = 'hidden';
                        $sold_out = '<span class="sold-out">SOLD OUT</span>';
                    }
                ?>
                <li class="<?= $active .' '. $hiddenS?>">
                    <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>" class="image_inner"><img src="<?= my_library::base_file().'news/'.$value['id'].'/thumb-'.$value['news_picture']?>" width="100%" alt="<?= $value['news_alias']?>"></a>
                    <a href="<?= base_url().$value['news_alias'].'-'.$value['id'].'.html'?>">
                        <div class="table-container">
                            <div class="table-inner">
                                <h4 class="title"><?= $value['news_title']?></h4>
                            </div>
                            <?=$sold_out?>
                        </div>
                    </a>
                </li>
            <?php endforeach ?>
        <?php endif ?>
    </ul>
</div>
<style>
span.sold-out {
    position: absolute;
    left: 0;
    top: 0;
    background: #B71C1C;
    padding: 2px;
    font-size: 80%;
}</style>