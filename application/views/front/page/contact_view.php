<header class="row_top introduce h300px" style="background-image: url(<?= my_library::base_file().'page/'.$myPage['page_picture']?>);background-size:cover;background-position:center;position:relative;">
    <?php $this->load->view("front/template/default/main_menu.php");?>
    <div class="title_detail">
        <div class="inner_title_detail">
            <h1 style="text-transform: uppercase;"><?= $myPage['page_title']?></h1>
        </div>
    </div>
</header>
<main id="contact">
    <div class="row1 ">
        <div class="container mb20 mt30"><?= $myPage['page_detail']?></div>
    </div>
    <?php $this->load->view("front/template/default/datlichhen.php");?>
</main>