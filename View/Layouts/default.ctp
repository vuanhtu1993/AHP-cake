<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Title</title>
		<link rel="stylesheet" href="<?php echo DOMAIN ?>css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo DOMAIN ?>css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="<?php echo DOMAIN ?>css/style.css">
		<link rel="stylesheet" href="<?php echo DOMAIN ?>css/slick.css">
		<link rel="stylesheet" href="<?php echo DOMAIN ?>css/slick-theme.css">
        <!-- Bootstrap Dropdown Hover CSS -->
        <link href="<?php echo DOMAIN ?>css/animate.min.css" rel="stylesheet">
        <link href="<?php echo DOMAIN ?>css/bootstrap-dropdownhover.min.css" rel="stylesheet">
		<!-- Start WOWSlider.com HEAD section -->
		<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN ?>engine1/style.css" />
		<script type="text/javascript" src="<?php echo DOMAIN ?>engine1/jquery.js"></script>
		<!-- End WOWSlider.com HEAD section -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- product bar -->
        <script language="javascript">
            $("document").ready(function () {
                $("#drop").mouseenter(function () {

                    $(".dropdown-menu").slideDown(100);
                    console.log($('#drop'));
                });
                $("#drop").mouseleave(function () {
                    $(".dropdown-menu").slideUp(200)
                })
            });
        </script>

    </head>
	<body>

	<?php echo $this->element('menu'); ?>

	<?php echo $this->element('banner') ?>

	<?php echo $this->element('slide') ?>

	<?php echo $content_for_layout ?>

	<?php echo $this->element('footer') ?>



	<script src="<?php echo DOMAIN?>js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo DOMAIN?>js/jquery-migrate-1.2.1.js"></script>
	<script src="<?php echo DOMAIN?>js/bootstrap.min.js"></script>
	<script src="<?php echo DOMAIN?>js/slick.min.js" ></script>
    <!-- Bootstrap Dropdown Hover JS -->
    <script src="<?php echo DOMAIN ?>js/bootstrap-dropdownhover.min.js"></script>
	<!--<script>-->
	<!--$(document).ready(function () {-->
	<!--$("p").click(function () {-->
	<!--$(this).hide(2000);-->
	<!--})-->
	<!--})-->
	<!--</script>-->
	<script>
        $('#slide2').slick({
            dots: false,
            infinite: true,
            autoplay:true,
            autoplayspeed:100,
            arrows:false,
            prevArrow: '<span class="glyphicon glyphicon-arrow-left"></span>',
            nextArrow: '<span class="glyphicon glyphicon-arrow-right"></span>',
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true

                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
	</script>
	<script>
        $('.slide_partner').slick({
            dots: false,
            infinite: true,
            autoplay:true,
            autoplayspeed:100,
            arrows:false,
            prevArrow: '<span class="glyphicon glyphicon-arrow-left"></span>',
            nextArrow: '<span class="glyphicon glyphicon-arrow-right"></span>',
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true

                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
	</script>

    </body>
</html>