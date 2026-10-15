<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>eSim Nathan - Your Digital SIM Card Solution</title>
    <!-- Bootstrap -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
    <!-- owl-carousel -->
    <!-- jquery ui  -->
    <!-- FontAwesome CSS -->
    <!-- Style CSS -->
    <?php // All other styles are enqueued via functions.php using wp_enqueue_style() 
    ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <?php wp_head(); ?>


</head>

<body>
    <div class="wrapper">
        <!-- header-section-->
        <?php
        $tab_header__logo = get_field("header_logo", "option");
        //    echo $tab_header__logo;
        $tab_header__email = get_field("header_email", "option");
        $tab_header__phone = get_field("header_phone", "option");
        $tab_header__facebook = get_field("facebook", "option");
        $tab_header__twitter = get_field("twitter", "option");
        $tab_header__linkedin = get_field("linkedin", "option");
        $tab_header__google = get_field("google", "option");
        $tab_header__instagram = get_field("instagram", "option");

        ?>
        <div class="header-wrapper">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 col-md-8 d-none d-xl-block d-sm-block">
                            <div class="top-header-content d-flex justify-content-between align-items-center">
                                <ul class="list-none">
                                    <?php if (!empty($tab_header__email)): ?>
                                        <li><i class="fa fa-envelope top-header-icon"></i><?= esc_html($tab_header__email); ?></li>
                                    <?php endif; ?>
                                    <?php if (!empty($tab_header__phone)): ?>
                                        <li><i class="fa fa-phone top-header-icon"></i><?= esc_html($tab_header__phone); ?></li>
                                    <?php endif; ?>
                                </ul>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-3 col-sm-6 col-8 d-none d-flex align-items-center">
                            <!--
                            <div class="top-header-content">
                                <div class="top-social">
                                <a href="<?= !empty($tab_header__facebook) ? esc_url($tab_header__facebook) : '#' ?>" class="btn-social-icon"><i class="fa fa-facebook"></i></a>
                                <a href="<?= !empty($tab_header__twitter) ? esc_url($tab_header__twitter) : '#' ?>" class="btn-social-icon"><i class="fa fa-twitter"></i></a>
                                <a href="<?= !empty($tab_header__linkedin) ? esc_url($tab_header__linkedin) : '#' ?>" class="btn-social-icon"><i class="fa fa-linkedin"></i></a> 
                                <a href="<?= !empty($tab_header__google) ? esc_url($tab_header__google) : '#' ?>" class="btn-social-icon"><i class="fa fa-google-plus"></i></a>
                                <a href="<?= !empty($tab_header__instagram) ? esc_url($tab_header__instagram) : '#' ?>" class="btn-social-icon"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                            -->
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-4 d-flex justify-content-between align-items-center">
                            <a href="#" class="search-icon" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-search"></i></a>
                            <?php echo do_shortcode('[gtranslate]'); ?>

                        </div>

                    </div>
                </div>
            </div>
            <!-- header-section-->
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 col-md-3 col-sm-3 col-12">
                            <div class="logo"> <a href="<?= home_url(); ?>"><img src="<?= !empty($tab_header__logo) ? $tab_header__logo : get_template_directory_uri() . '/assets/images/logo.png' ?>" alt=""> </a> </div>
                        </div>
                        <div class="col-xl-9 col-lg-10 col-md-9 col-sm-12 col-12">
                            <!-- navigations-->
                            <div class="navigation">
                                <div id="navigation">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'menu-1',
                                            'container'      => false,
                                            'items_wrap'     => '<ul>%3$s</ul>',
                                            'fallback_cb'    => false,
                                            'depth'          => 2,
                                        )
                                    );
                                    ?>

                                </div>
                            </div>
                            <!-- /.navigations-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. header-section-->