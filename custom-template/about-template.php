<?php
/* 
 Template Name: About
*/
get_header();
$about_col__left = get_field('about_col__left');
$about_col__right = get_field('about_col__right');
$about_slides = get_field('about_slides');
$team_mem__title = get_field('about_team_title');
$team_mem__desc = get_field('about_team_description');
$team_memebers = get_field('about_team_items');

?>


<!-- page-header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-caption">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page-header-->
<!-- about -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-10 offset-md-1 col-md-10 col-sm-12 col-12  mb60">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="">
                            <?= $about_col__left; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="">
                            <?= $about_col__right; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- about carousel -->
    <div class="space-small">
        <div class="about-carousel">
            <div class="owl-carousel owl-about-gallery owl-theme">
                <!-- about-item -->
                <?php foreach ($about_slides as $slide): ?>
                    <div class="item">
                        <div class="about-img">
                            <img src="<?= $slide['about_slide_image']; ?>" alt="" class="img-fluid">
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- /.about-item -->

            </div>
        </div>
    </div>
    <!-- /.about carousel -->
    <!-- team-section -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb60">
                    <div class="">
                        <h2><?= $team_mem__title; ?></h2>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mb60">
                    <div class="">
                        <p class="lead"><?= $team_mem__desc; ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- team-member -->
                <?php foreach ($team_memebers as $member): ?>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                        <div class="team-block">
                            <div class="team-content">
                                <h4 class="team-title"><?= $member['about_team_item_name']; ?></h4>
                                <p class="team-meta"><?= $member['about_team_item_position']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <!-- /.team-section -->

</div>

    <?php get_footer(); ?>