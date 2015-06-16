<?php
/* @var $this PortfolioController */

?>
<style>
.first {
   display: none !important;
}
.last {
    display: none !important;
}

</style>


<div id="templatemo_main">




    <?php
    foreach($all_portfolio as $all){
        echo '<div class="col one_fourth gallery_box">';
      //  echo CHtml::image('/images/portfolio/'.$all->image);
        $image = CHtml::image('/images/portfolio/small/small_'.$all->image);
       echo CHtml::link($image, '/images/portfolio/'.$all->image, array('rel'=>"lightbox[portfolio]"));
        echo '<h5>'.$all->title.'</h5>';
        echo '<p>'.$all->description.'</p>';
        echo '</div>';
    }
    ?>



    <div class="pagging">
        <?$this->widget('CLinkPager', array(
            'pages' => $pages,
        ))?>
    </div>
    <div class="cleaner"></div>

</div> <!-- END of templatemo_main -->
