<?php
?>


<div id="templatemo_main">
	<div id="content">
    	<div class="post">


            <?php
                echo '<h2>'.$current_post->title.'</h2>';
                echo CHtml::image('/images/blog/'.$current_post->image);
                echo '<p>'.$current_post->text.'</p>';
                echo '<div class="meta">';
                echo '<span class="admin">'.$current_post->author.'</span>'.'<span class="date">'.$current_post->create_time.'</span>'.'<span class="comment">'.Comment::commentCounter($current_post->id).'</span>';
                echo '<span class="tag">';
                echo Tag::showTags($current_post->id);
                echo '</span>';
                echo '<div class="cleaner">'.'</div>';
                echo '</div>';

            ?>

        </div>

        <div class="cleaner h40"></div>

            <h3>Комментарии</h3>

              	<div id="comment_section">
                    <?php
                    foreach($comments as $all){

                        echo '<ol class="comments first_level">';
                        echo '<li>';
                        echo ' <div class="comment_box commentbox1">';
                        echo '<div class="comment_text">';
                        echo '<div class="comment_author">'.$all->author.'<span class="date">'.$all->create_time.'</span></div>';
                        echo '<p>'.$all->text.'</p>';
                        echo '</div>';
                        echo '    <div class="cleaner"></div>';
                        echo '</div>';
                        echo '</li>';
                        echo '</ol>';

                    }

                    ?>


                <div class="cleaner h20"></div>


                    <div class="pagging">
                        <?$this->widget('CLinkPager', array(
                            'pages' => $pages,
                            'firstPageLabel'=>'Первая',
                             'lastPageLabel'=>'Последняя',
                              'prevPageLabel'=>'Предыдущая',
                            'nextPageLabel'=>'Следующая',
                        ))?>
                    </div>

                    <div class="cleaner"></div>

                </div>

                <div class="cleaner h20"></div>

                <div id="comment_form">

                    <h3>Оставьте свой комментарий</h3>

                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'comment-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),

                    )); ?>
<!--                        --><?php //echo CHtml::errorSummary($model); ?>
                    <?php echo $form->errorSummary($model); ?>

                    <div class="form_row">
                        <?php echo $form->label($model,'author').'<br>'; ?>
                        <?php echo $form->textField($model,'author') ?>
                        <?php echo $form->error($model,'author'); ?>
                    </div>

                    <div class="form_row">
                        <?php echo $form->label($model,'email').'<br>'; ?>
                        <?php echo $form->textField($model,'email') ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>

                    <div class="form_row">
                        <?php echo $form->label($model,'text').'<br>'; ?>
                        <?php echo $form->textarea($model,'text'); ?>
                        <?php echo $form->error($model,'text'); ?>
                    </div>

                        <?php echo CHtml::submitButton('Отправить'); ?>

                    <?php $this->endWidget(); ?>



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