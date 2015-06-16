<?php
/* @var $this RecallController */
/* @var $model Recall */

?>
<div id="templatemo_main">
<h1>Оставить отзыв</h1>



    <div class="half float_l">


    <div id="contact_form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'recall-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>true,
        )); ?>


        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>"required input_field")); ?>
<!--            --><?php //echo $form->error($model,'name'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255, 'class'=>"required input_field")); ?>
<!--            --><?php //echo $form->error($model,'email'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'subject'); ?>
            <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>255, 'class'=>"required input_field")); ?>
<!--            --><?php //echo $form->error($model,'subject'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'message'); ?>
            <?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50, 'class'=>"required")); ?>
<!--            --><?php //echo $form->error($model,'message'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Отправить', array('class'=>"submit_btn float_l")); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::resetButton('Сброс', array('id'=>'reset','class'=>"submit_btn float_r" )); ?>
        </div>
<!--        <input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />-->

        <?php $this->endWidget(); ?>
 </div>
 </div>


    <div class="half float_r">
        <h4>Наши отделения</h4>
        <h6><strong>"Galilio 2x"</strong></h6>
        г. Кемерево<br />
        ул. Волгоградская 32<br />
        <br>

        <strong>Телефон:</strong> 8-902-984-5416 <br />
        <strong>E-mail:</strong> <a href="mailto:info@company.com">gal_one@galelio.ru</a>  <br />

        <div class="cleaner h40"></div>
        <h6><strong>"Galilio 2x-2"</strong></h6>
        г. Кемерево<br />
        пр. Химиков 54<br />
        <br>

        <strong>Телефон:</strong> 8-902-784-7212 <br />
        <strong>E-mail:</strong> <a href="mailto:info@company.com">gal_two@galelio.ru</a>  <br />

        <div class="cleaner h40"></div>
        <h6><strong>"Galilio 2x-3"</strong></h6>
        г. Кемерево<br />
        пр. Московкий 97<br />
        <br>

        <strong>Телефон:</strong> 8-902-252-7629 <br />
        <strong>E-mail:</strong> <a href="mailto:info@company.com">gal_three@galelio.ru</a>  <br />

    </div>

    <div class="cleaner h40"></div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1134.5000527554737!2d86.15304453552906!3d55.34054467119174!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x42d80f2b04aaa045%3A0x589e226fb67e3969!2z0JLQvtC70LPQvtCz0YDQsNC00YHQutCw0Y8g0YPQuy4sIDMyLCDQmtC10LzQtdGA0L7QstC-LCDQmtC10LzQtdGA0L7QstGB0LrQsNGPINC-0LHQuy4sINCg0L7RgdGB0LjRjywgNjUwMDU2!5e0!3m2!1sru!2sua!4v1426785983239" width="960" height="340" frameborder="0" style="border:0"></iframe>
    <div class="cleaner"></div>
  </div>

