
```php
<?php
/* 
Template Name: About
*/
get_header();

// 1. Khai báo biến chuẩn xác theo đúng field name trong ACF (có 2 dấu gạch dưới ở col left/right)
$about_left_col         = get_field("about_col__left");
$about_right_col        = get_field("about_col__right");
$about_team_title       = get_field('about_team_title');
$about_team_description = get_field('about_team_description');
?>

<!-- page-header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-caption">
                    <h1 class="page-title">About Us</h1>
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
            <div class="col-xl-10 col-lg-10 offset-md-1 col-md-10 col-sm-12 col-12 mb60">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="">
                            <?php 
                            // Hiển thị cột trái 
                            if ($about_left_col) {
                                echo wp_kses_post($about_left_col);
                            } 
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="">
                            <?php 
                            // Hiển thị cột phải
                            if ($about_right_col) {
                                echo wp_kses_post($about_right_col);
                            } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.about-section -->

<!-- about carousel (Repeater: about_slides) -->
<?php if (have_rows('about_slides')): ?>
<div class="space-small">
    <div class="about-carousel">
        <div class="owl-carousel owl-about-gallery owl-theme">
            <?php while (have_rows('about_slides')): the_row(); 
                // Do cấu hình ACF bạn để return_format là 'url'
                $slide_image_url = get_sub_field('about_slide_image');
                if ($slide_image_url):
            ?>
                <!-- about-item -->
                <div class="item">
                    <div class="about-img">
                        <img src="<?php echo esc_url($slide_image_url); ?>" alt="" class="img-fluid">
                    </div>
                </div>
                <!-- /.about-item -->
            <?php 
                endif;
            endwhile; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- /.about carousel -->

<!-- team-section -->
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb60">
                <div class="">
                    <h2><?php echo $about_team_title ? esc_html($about_team_title) : 'Our Amazing Team'; ?></h2>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mb60">
                <div class="">
                    <p class="lead"><?php echo $about_team_description ? esc_html($about_team_description) : ''; ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Repeater: about_team_items -->
            <?php if (have_rows('about_team_items')): ?>
                <?php while (have_rows('about_team_items')): the_row(); 
                    $team_image_url = get_sub_field('about_team_item_image'); // format: url
                    $team_name      = get_sub_field('about_team_item_name');
                    $team_position  = get_sub_field('about_team_item_position');
                ?>
                    <!-- team-member -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                        <div class="team-block">
                            <?php if ($team_image_url): ?>
                            <div class="team-img">
                                <a href="#" class="imghover">
                                    <img src="<?php echo esc_url($team_image_url); ?>" alt="<?php echo esc_attr($team_name); ?>" class="img-fluid">
                                </a>
                            </div>
                            <?php endif; ?>

                            <div class="team-content">
                                <?php if ($team_name): ?>
                                    <h4 class="team-title"><?php echo esc_html($team_name); ?></h4>
                                <?php endif; ?>

                                <?php if ($team_position): ?>
                                    <p class="team-meta"><?php echo esc_html($team_position); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.team-member -->
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- /.team-section -->

<?php get_footer(); ?>

```S