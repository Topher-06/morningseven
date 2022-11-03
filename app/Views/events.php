<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MORNING SEVEN RESORT HOTEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />
    <link rel="shortcut icon" type="image/png" href="images/morning7-logo.png" />
    <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->

    <!-- Stylesheets -->
    <!-- Dropdown Menu -->
    <link rel="stylesheet" href="home_assets/css/superfish.css">
    <!-- Owl Slider -->
    <!-- <link rel="stylesheet" href="home_assets/css/owl.carousel.css"> -->
    <!-- <link rel="stylesheet" href="home_assets/css/owl.theme.default.min.css"> -->
    <!-- Date Picker -->
    <link rel="stylesheet" href="home_assets/css/bootstrap-datepicker.min.css">
    <!-- CS Select -->
    <link rel="stylesheet" href="home_assets/css/cs-select.css">
    <link rel="stylesheet" href="home_assets/css/cs-skin-border.css">

    <!-- Themify Icons -->
    <link rel="stylesheet" href="home_assets/css/themify-icons.css">
    <!-- Flat Icon -->
    <link rel="stylesheet" href="home_assets/css/flaticon.css">
    <!-- Icomoon -->
    <link rel="stylesheet" href="home_assets/css/icomoon.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="home_assets/css/flexslider.css">

    <!-- Style -->
    <link rel="stylesheet" href="home_assets/css/style.css">

    <!-- Modernizr JS -->
    <script src="home_assets/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="home_assets/js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    <div id="fh5co-wrapper">
        <div id="fh5co-page">
            <div id="fh5co-header">
                <?php echo view('layout/header') ?>


            </div>
            <!-- end:fh5co-header -->
            <div class="fh5co-parallax" style="background-image: url(home_assets/images/8.png);" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                            <div class="fh5co-intro fh5co-table-cell">
                                <h1 class="text-center">Special Events in the Resort</h1>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="fh5co-blog-section">
                <div class="container">
                    <div class="row">
                        <?php foreach ($eventlists as $eventlist) : ?>
                            <div class="col-md-4">
                                <div class="blog-grid" style="background-image: url(uploads/<?= $eventlist['e_image'] ?>);">
                                    <div class="date text-center">

                                        <?php

                                        $time  = strtotime($eventlist['e_date']);
                                        $day   = date('d', $time);
                                        $month = date('M', $time);
                                        echo "<span>" . $day . "</span>
                                        <small>" . $month . "</small>";

                                        ?>

                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="#"><?= $eventlist['e_title'] ?></a></h3>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <?php echo view('layout/footer') ?>

        </div>
        <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->

    <!-- Javascripts -->
    <script src="home_assets/js/jquery-2.1.4.min.js"></script>
    <!-- Dropdown Menu -->
    <script src="home_assets/js/hoverIntent.js"></script>
    <script src="home_assets/js/superfish.js"></script>
    <!-- Bootstrap -->
    <script src="home_assets/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="home_assets/js/jquery.waypoints.min.js"></script>
    <!-- Counters -->
    <script src="home_assets/js/jquery.countTo.js"></script>
    <!-- Stellar Parallax -->
    <script src="home_assets/js/jquery.stellar.min.js"></script>
    <!-- Owl Slider -->
    <!-- // <script src="home_assets/js/owl.carousel.min.js"></script> -->
    <!-- Date Picker -->
    <script src="home_assets/js/bootstrap-datepicker.min.js"></script>
    <!-- CS Select -->
    <script src="home_assets/js/classie.js"></script>
    <script src="home_assets/js/selectFx.js"></script>
    <!-- Flexslider -->
    <script src="home_assets/js/jquery.flexslider-min.js"></script>

    <script src="home_assets/js/custom.js"></script>

</body>

</html>