<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />


    <link href="/css/templatemo_style.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/js/jquery-1-4-2.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/showhide.js"></script>
    <script type="text/JavaScript" src="/js/slimbox2.js"></script>
    <script type="text/JavaScript" src="/js/jquery.mousewheel.js"></script>

    <link rel="stylesheet" type="text/css" href="/css/ddsmoothmenu.css" />
    <link rel="stylesheet" href="/css/slimbox2.css" type="text/css" media="screen" />

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/ddsmoothmenu.js">
    </script>


	<title>"Galileo 2x"</title>


    <script type="text/javascript">

        ddsmoothmenu.init({
            mainmenuid: "templatemo_menu", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.yiiPager').removeClass('yiiPager');
        })();

    </script>

    <!-- Load the CloudCarousel JavaScript file -->
    <script type="text/JavaScript" src="/js/cloud-carousel.1.0.5.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            // This initialises carousels on the container elements specified, in this case, carousel1.
            $("#carousel1").CloudCarousel(
                {
                    reflHeight: 40,
                    reflGap: 2,
                    titleBox: $('#da-vinci-title'),
                    altBox: $('#da-vinci-alt'),
                    buttonLeft: $('#slider-left-but'),
                    buttonRight: $('#slider-right-but'),
                    yRadius: 30,
                    xPos: 480,
                    yPos: 32,
                    speed:0.15,
                    autoRotate: "yes",
                    autoRotateDelay: 1500
                }
            );

        });

    </script>


</head>

<body id="home">

<div id="templatemo_header_wrapper">
    <div id="site_title"><h1><?php echo CHtml::link('', Yii::app()->createAbsoluteUrl('/site/index'));?></h1></div>
    <div id="templatemo_menu" class="ddsmoothmenu">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'activateParents'=>true,
                    'activeCssClass'=>'selected',
                    'items'=>array(
                        array('label'=>'Главная', 'url'=>array('site/index')),
                        array('label'=>'Портфолио', 'url'=>array('portfolio/index')),
                        array('label'=>'Блог', 'url'=>array('post/index')),
                        array('label'=>'О нас', 'url'=>array('site/about')),
                        array('label'=>'Отзыв', 'url'=>array('recall/create')),
                    ),
                ));

                ?>

        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div class="cleaner"></div>
</div>	<!-- END of templatemo_header_wrapper -->
<!--<div class="cleaner"></div>-->

<?php echo $content; ?>


    <div id="templatemo_bottom_wrapper">
        <div id="templatemo_bottom">
            <div class="col one_third">
                <h4><span></span>Навигация</h4>
                <div class="bottom_box">
                    <ul class="footer_list">
                        <?php echo Menu::showMenu(); ?>

                    </ul>
                </div>
            </div>
            <div class="col one_third">
                <h4><span></span>Обратите внимание!</h4>
                <div class="bottom_box">
                    <ul class="twitter_post">
                        <li>Не забудьте оставить свой отзыв о нас. Ваше мнение очень важно и помогает делать нас лучше.</li>

                        <li>Оставить <a href="/recall/create">отзыв...</a></li>
                    </ul>
                </div>
            </div>
            <div class="col one_third no_margin_right">
                <h4><span></span>Контактная информация</h4>
                <div class="bottom_box">
                    <ul class="footer_list">
                      <li>"Galileo 2x-1"
                         8-902-984-5416 <br /></li>
                        <li>"Galileo 2x-2"
                            8-902-784-7212</li>
                        <li>"Galileo 2x-3"
                            8-902-252-7629</li>
                    </ul>
                </div>
            </div>

            <div class="cleaner"></div>
        </div> <!-- END of tempatemo_bottom -->
    </div> <!-- END of tempatemo_bottom_wrapper -->


    <div id="templatemo_footer_wrapper">
        <div id="templatemo_footer">
            Copyright © 2015 Sergey Chernyavsky
        </div> <!-- END of templatemo_footer_wrapper -->
    </div> <!-- END of templatemo_footer -->


</body>
</html>
