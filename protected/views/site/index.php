<?php
/* @var $this SiteController */


?>



<div id="templatemo_slider">
    <!-- This is the container for the carousel. -->
    <div id = "carousel1" style="width:960px; height:280px;background:none;overflow:scroll; margin-top: 20px">
        <!-- All images with class of "cloudcarousel" will be turned into carousel items -->
        <!-- You can place links around these images -->

        <?php echo Portfolio::showPortfolioImage(); ?>

    </div>

    <!-- Define left and right buttons. -->
    <center>
        <input id="slider-left-but" type="button" value="" />
        <input id="slider-right-but" type="button" value="" />
    </center>
</div>

<div id="templatemo_main">

    <div class="col one_third fp_services">
        <h2>Добро пожаловать!</h2>
        <img src="/images/camera.png" alt="Image 04 " class="image_fl" />
        <p>Вас привествует фотоателье "Galileo 2x"! Мы готовы предоставить вам широкий спектр услуг за умную цену. Загляните к нам и убедитесь в нашем профессионализме!</p>
        <p>Список нескольких услуг:</p>
        <ul class="templatemo_list">
            <li class="flow">Фотографии на документы</li>
            <li class="flow nomr">Печать фотографий</li>
            <li class="flow">Фотосессии</li>
            <li class="flow nomr">Реставрация старых фото</li>
        </ul>
    </div>

    <div class="col one_third fp_services">
        <h2>Последние новости</h2>
        <?php echo Post::showPostsForIndex(); ?>
    </div>

    <div class="col one_third no_margin_right fp_services">

        <h2>Последние отзывы</h2>
        <?php echo Recall::showRecall(); ?>
    </div>

    <div class="cleaner"></div>


</div> <!-- END of templatemo_main -->
