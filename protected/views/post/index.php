<?php
/* @var $this PostController */

?>


<div id="templatemo_main">
    <div id="content">


        <?php
            foreach($posts as $all_posts){
                echo '<div class="post">';
                echo '<h2>'.$all_posts->title.'</h2>';
                echo CHtml::image('/images/blog/'.$all_posts->image);
                echo '<p>'.$all_posts->text.'</p>';
                echo '<div class="meta">';
                echo '<span class="admin">'.$all_posts->author.'</span>'.'<span class="date">'.$all_posts->create_time.'</span>'.'<span class="comment">'.Comment::commentCounter($all_posts->id).'</span>';
                echo '<span class="tag">';
                echo Tag::showTags($all_posts->id);
                echo '</span>';

                $more_link = Yii::app()->createUrl('post/view', array('id'=>$all_posts->id));
                echo '<span class="more_but">'.CHtml::link('More', $more_link, array('class'=>'more')).'</span>';
                echo '<div class="cleaner">'.'</div>';
                echo '</div>';
                echo '</div>';
            }

        ?>


<!--        <div class="post">-->
<!---->
<!--            <h2>Online Marketing Techniques</h2>-->
<!---->
<!--            <img src="images/blog/01.jpg" alt="Image 01" />-->
<!--            <p>Nunc sed leo nunc. Integer nec ante vel sapien vehicula hendrerit vitae non ligula. Integer in nunc nec est condimentum tempus eu quis nunc. Nam arcu dolor, scelerisque eu malesuada in, imperdiet eu nisl. Aliquam posuere leo id enim vulputate sagittis. Integer mauris arcu, tempus iaculis fermentum in, dapibus ut elit. Nulla ut elit eu augue malesuada porta eget eget tortor.</p>-->
<!--            <div class="meta">-->
<!--                <span class="admin">Jones</span><span class="date">March 24, 2048</span><span class="tag"><a href="#">Templates</a>, <a href="#">Freebies</a></span><span class="comment"><a href="#">132 comments</a></span>-->
<!--                <span class="more_but"><a href="blog_post.html" class="more">More</a></span>-->
<!--                <div class="cleaner"></div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="post">-->

        <div class="pagging">
            <?$this->widget('CLinkPager', array(
                'pages' => $pages,
            ))?>
        </div>
        <div class="cleaner"></div>


    </div>

    <div id="sidebar">
        <h3>Популярные теги</h3>
        <ul class="templatemo_list">
           <?php echo Tag::showMostUseTags(); ?>
        </ul>

        <div class="cleaner h30"></div>

        <h3>Самые обсуждаемые</h3>
        <ul class="recent_post">
            <?php echo Post::showMostCommentPosts(); ?>
        </ul>
    </div> <!-- end of sidebar -->
    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->