<?php get_header(); ?>

<!-- slider -->
<?php
// Step 1: Get the slider banner field from ACF with field_name = slider_banner
$slider_home = get_field('slider_banner');
// Debugging line to check the value of $slider_home
// Step 2: Check if the slider banner field is not null

?>
<div class="slider">
    <div class="owl-carousel owl-one owl-theme">

        <!-- item -->
        <?php foreach ($slider_home as $slide) : ?>
            <div class="item">

                <div class="slider-img">
                    <img src="<?= esc_url($slide["slide_image"]['url']); ?>" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="slider-captions">
                                <h1 class="slider-title"><?= esc_html($slide["slide_title"]); ?></h1>
                                <?php if (!is_null($slide["slide_button"])): ?>
                                    <a href="<?= esc_url($slide["slide_button"]['url']); ?>" class="btn btn-primary" target="<?= esc_attr($slide["slide_button"]['target']); ?>"><?= esc_html($slide["slide_button"]['title']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- /.item -->

    </div>
</div>
<!-- /.slider -->
<!-- enguiry-form -->
<div class="bg-default enquiry-form ">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <!-- form -->
                <form>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-3 col-12">
                            <div class="form-group">
                                <label class="control-label sr-only" for="select"></label>
                                <div class="select">
                                    <select id="select" name="city" class="form-control">
                                        <option value="">Where you want to go</option>
                                        <option value="">Singapore</option>
                                        <option value="">Thailand</option>
                                        <option value="">Vietnam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-3 col-12">
                            <div class="form-group">
                                <label class="control-label sr-only" for="datepicker"></label>
                                <div class="input-group">
                                    <input id="datepicker" name="datepicker" type="text" placeholder="Date" class="form-control" required>
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-3 col-12">
                            <div class="form-group">
                                <label class="control-label sr-only" for="select"></label>
                                <div class="select">
                                    <select id="select" name="select" class="form-control">
                                        <option value="">Number of Peoples</option>
                                        <option value="">6</option>
                                        <option value="">10</option>
                                        <option value="">25</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 col-md-6 col-sm-3 col-12">
                            <button type="submit" name="singlebutton" class="btn btn-primary btn-lg">Enquiry Now</button>
                        </div>
                    </div>
                </form>
                <!-- /.form -->
            </div>
        </div>
    </div>
</div>
<!-- /.enguiry-form -->
<!-- tour-service -->
<div class="space-medium">
    <div class="container">
        <!-- tour-1 -->
        <div class="row ">
            <div class="col-xl-4 col-lg-4 offset-md-1 col-md-4 col-sm-12 col-12 mb40">
                <div class="tour-img">
                    <a href="#" class="imghover"> <img src="<?= get_template_directory_uri(); ?>/assets/images/tour_img_1.jpg" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 offset-md-1 col-md-5 col-sm-12 col-12 mb40">
                <div class="tour-block">
                    <div class="tour-content">
                        <h2 class="mb30"><a href="#" class="title">International Tour</a></h2>
                        <p class="mb30">Vestibulum nec mauris interdum facilisis nequeet convallis odioses praesentet lacinia orciulla dolorerat ullamcorper sitamet meuesered egestas venenatis enimusce sed ipsum seddolor.</p>
                        <a href="#" class="btn-link">Go For International Tour<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.tour-1 -->
        <!-- tour-2 -->
        <div class="row">
            <div class="col-xl-5 col-lg-5 offset-md-1 col-md-5 col-sm-12 col-12 mb40">
                <div class="tour-block">
                    <div class="tour-content">
                        <h2 class="mb30"><a href="#" class="title">Adventure Tour</a></h2>
                        <p class="mb30">Donec porttitor lorem utdiam iaculis euismod congue eroset lectus consectetur fermen uspendissolutpat risus utarcu dapibusat conquat quam sodenean pretium a metus euauctor.</p>
                        <a href="#" class="btn-link">Go For Adventure Tour<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 offset-md-1 col-md-4 col-sm-12 col-12 mb40">
                <div class="tour-img">
                    <a href="#" class="imghover"> <img src="<?= get_template_directory_uri(); ?>/assets/images/tour_img_2.jpg" alt="" class="img-fluid"></a>
                </div>
            </div>
        </div>
        <!-- /.tour-2 -->
        <!-- tour-3 -->
        <div class="row">
            <div class="col-xl-4 col-lg-4 offset-md-1 col-md-4 col-sm-12 col-12 mb20">
                <div class="tour-img">
                    <a href="#" class="imghover"> <img src="<?= get_template_directory_uri(); ?>/assets/images/tour_img_3.jpg" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 offset-md-1 col-md-5 col-sm-12 col-12 mb20">
                <div class="tour-block">
                    <div class="tour-content">
                        <h2 class="mb30"><a href="#" class="title">Domestic Tour</a></h2>
                        <p class="mb30">Proin in urna hendrerit tortor dignissim auctor vitae etnibstibulum venenatis lectus urnaut sodales nibh sagittis eestibulum ante ipsum primisin faucibusorci luctus etultrices posuere cubilia.</p>
                        <a href="#" class="btn-link">Go For Domestic Tour<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.tour-3 -->
    </div>
</div>
<!-- /.tour-service -->
<!-- destination-section -->
<div class="space-medium">
    <div class="container-fluid">
        <div class="row">
            <!-- section-title -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="section-title">
                    <h2>Top Destinations</h2>
                </div>
            </div>
            <!-- /.section-title -->
        </div>
        <?php
        $tour_query = new WP_Query(
            array(
                'post_type'      => 'tour',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'no_found_rows'  => true,
            )
        );
        ?>
        <?php if ($tour_query->have_posts()) : ?>
            <div class="owl-carousel owl-theme tour-destinations-carousel">
                <?php while ($tour_query->have_posts()) : $tour_query->the_post(); ?>
                    <?php
                    $tour_id       = get_the_ID();
                    $tour_duration = get_field('tour_duration', $tour_id);
                    $tour_hotel    = get_field('tour_hotel', $tour_id);
                    $tour_meal     = get_field('tour_meal', $tour_id);
                    $tour_price    = get_field('tour_price', $tour_id);
                    $tour_image    = get_the_post_thumbnail_url($tour_id, 'large');
                    if (! $tour_image) {
                        $tour_image = get_template_directory_uri() . '/assets/images/destination_1.jpg';
                    }
                    ?>
                    <div class="item">
                        <div class="destination-block">
                            <div class="desti-img">
                                <img src="<?php echo esc_url($tour_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                <a href="<?php the_permalink(); ?>" class="desti-title"><?php the_title(); ?></a>
                                <div class="overlay"></div>
                                <div class="text">
                                    <h3 class="mb20 text-white"><?php the_title(); ?></h3>
                                    <ul class="angle list-none">
                                        <?php if ($tour_duration) : ?><li><?php echo esc_html($tour_duration); ?></li><?php endif; ?>
                                        <?php if ($tour_hotel) : ?><li><?php echo esc_html($tour_hotel); ?></li><?php endif; ?>
                                        <?php if ($tour_meal) : ?><li><?php echo esc_html($tour_meal); ?></li><?php endif; ?>
                                    </ul>
                                    <?php if ($tour_price) : ?>
                                        <p class="price"><?php echo esc_html('$' . $tour_price); ?></p>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" class="btn-link"><?php echo esc_html(sprintf(__('View %s', 'travelme'), get_the_title())); ?> <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <?php wp_reset_postdata(); ?>
            <p class="text-center"><?php esc_html_e('No tours found.', 'travelme'); ?></p>
        <?php endif; ?>
    </div>
</div>
<!-- /.destination-section -->
<!-- about-section -->
<div class="space-medium">
    <?php
    $about_title = get_field('about_title');
    $about_des = get_field('about_des');
    $about_column_left = get_field('about_column_left');
    $about_column_right = get_field('about_column_right');
    ?>
    <div class="container">
        <!-- about-head -->
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb60">
                <div class="">
                    <h2><?= esc_html($about_title); ?></h2>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 offset-md-1 col-md-8 col-sm-12 col-12 mb60">
                <div class="">
                    <p class="lead"><?= esc_html($about_des); ?></p>
                </div>
            </div>
        </div>
        <!-- /.about-head -->
        <div class="row">
            <!-- feature-section -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                <div class="well-block">
                    <?php if (!empty($about_column_left)): ?>
                        <!-- feature-left -->
                        <?php foreach ($about_column_left as $col): ?>
                            <div class="feature-left">
                                <div class="feature-icon"><img src="<?= esc_url($col['icon']); ?>" alt=""></div>
                                <div class="feature-content">
                                    <h4><?= esc_html($col['title']); ?></h4>
                                    <p><?= esc_html($col['meta']); ?></p>
                                </div>
                            </div>
                            <!-- /.feature-left -->
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /.feature-section -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                <div class="well-block">
                    <?php if (!empty($about_column_right)): ?>
                        <!-- feature-right -->
                        <?php foreach ($about_column_right as $col): ?>
                            <div class="counter-block">
                                <h1 class="counter-numbers"><?= esc_html($col['count_number']); ?></h1>
                                <div class="counter-content">
                                    <h4><?= esc_html($col['title']); ?></h4>
                                    <p><?= esc_html($col['meta']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.about-section -->
<!-- service-section -->
<div class="space-medium service-wrapper" style="background-image: url('<?= esc_url(get_field('service_background')); ?>');">   
    <?php   
    $service_title = get_field('service_title');
    $service_des = get_field('service_des');
    $service_background = get_field('service_background');
    $service_list = get_field('service_items');
    ?>
    <div class="container">
        <!-- service-head -->
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb60">
                <div class="">
                    <h2><?= !empty($service_title) ? esc_html($service_title) : 'Our Services'; ?></h2>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 offset-md-1 col-md-8 col-sm-12 col-12 mb60">
                <div class="">
                    <p class="lead"><?= !empty($service_des) ? esc_html($service_des) : 'Suctus felis non nibh maximus consectetuis sed nisl eniullase pellentesque euismod eronon ntesque tortor molestieege.'; ?></p>
                </div>
            </div>
        </div>
        <!-- /.service-head -->
        <div class="row">
            <!-- service-block -->
            <?php if (isset($service_list) && !is_null($service_list)): ?>
                <?php foreach ($service_list as $service): ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 nopr">
                        <div class="service-block border-bottom border-right">
                            <div class="service-img">
                                <img src="<?= $service['icon']['url'] ?>" alt="">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title"><?= $service['title'] ?></h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- /.service-section -->
<!-- testimonial-section -->
<?php
    $testimony_header = get_field('testimony_header');
    $testimonial_title = get_field('testimonial_title');
    $testimonial_button_text = get_field('testimonial_button_text');
    $testimonial_button_link = get_field('testimonial_button_link');
    $testimonial_reviews = get_field('testimonial_reviews');
?>
<div class="space-medium bg-light">
    <div class="container">
        <div class="row">
            <!-- testimonial-head -->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb60">
                <div class="testimonial-head">
                    <div class="quote-icon">
                        <img src="<?= get_template_directory_uri(); ?>/assets/images/left_quote.png" alt="">
                    </div>
                    <h2 class="mb40"><?= !empty($testimonial_title) ? esc_html($testimonial_title) : 'What Our Customers Say About Our Tours'; ?></h2>

                    <?php if (!empty($testimonial_button_text)): ?>
                        <a href="<?= !empty($testimonial_button_link['url']) ? esc_url($testimonial_button_link['url']) : '#'; ?>" class="btn-link" target="<?= !empty($testimonial_button_link['target']) ? esc_attr($testimonial_button_link['target']) : '_self'; ?>">
                            <?= esc_html($testimonial_button_text); ?>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /.testimonial-head -->
            <div class="col-xl-6 col-lg-6 offset-md-1 col-md-6 col-sm-12 col-12 mb60">
                <div class="testimonial-carousel">
                    <div class="owl-carousel owl-theme testimonial-owl">
                        <?php if (!empty($testimonial_reviews)): ?>
                            <?php foreach ($testimonial_reviews as $review): ?>
                                <div class="item">
                                    <div class="testimonial-block">
                                        <div class="testimonial-content">
                                            <p class="testimonial-text">“<?= esc_html($review['review_text']); ?>”</p>
                                            <span class="testi-meta"><strong>- <?= esc_html($review['review_author']); ?></strong> (Our Tourist)</span>
                                            <div class="testi-arrow"></div>
                                        </div>
                                        <div class="testi-img">
                                            <?php if (!empty($review['review_image']['url'])): ?>
                                                <img src="<?= esc_url($review['review_image']['url']); ?>" alt="<?= esc_attr($review['review_author']); ?>" class="rounded-circle">
                                            <?php else: ?>
                                                <img src="<?= get_template_directory_uri(); ?>/assets/images/testi_img_1.jpg" alt="" class="rounded-circle">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="item">
                                <div class="testimonial-block">
                                    <div class="testimonial-content">
                                        <p class="testimonial-text">“Nam aclorem atsem vulputate euismodulla nonlacinia augueauriset venenatis maurised consequat quis exa plarliquam”</p>
                                        <span class="testi-meta"><strong>- Sarah Arnold</strong> (Our Tourist)</span>
                                        <div class="testi-arrow"></div>
                                    </div>
                                    <div class="testi-img">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/images/testi_img_1.jpg" alt="" class="rounded-circle">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial-section -->
<!-- /.client-section -->
<div class="space-small">
    <div class="container">
        <div class="row">
            <!-- client-logo -->
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
                <div class="client-logo">
                    <a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/images/dummy_logo_1.png" alt=""></a>
                </div>
            </div>
            <!-- /.client-logo -->
            <!-- client-logo -->
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
                <div class="client-logo">
                    <a href="#"> <img src="<?= get_template_directory_uri(); ?>/assets/images/dummy_logo_2.png" alt=""></a>
                </div>
            </div>
            <!-- /.client-logo -->
            <!-- client-logo -->
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
                <div class="client-logo">
                    <a href="#"> <img src="<?= get_template_directory_uri(); ?>/assets/images/dummy_logo_3.png" alt=""></a>
                </div>
            </div>
            <!-- /.client-logo -->
            <!-- client-logo -->
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
                <div class="client-logo">
                    <a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/images/dummy_logo_4.png" alt=""></a>
                </div>
            </div>
            <!-- /.client-logo -->
            <!-- client-logo -->
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
                <div class="client-logo">
                    <a href="#"> <img src="<?= get_template_directory_uri(); ?>/assets/images/dummy_logo_2.png" alt=""></a>
                </div>
            </div>
            <!-- /.client-logo -->
            <!-- client-logo -->
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
                <div class="client-logo">
                    <a href="#"> <img src="<?= get_template_directory_uri(); ?>/assets/images/dummy_logo_1.png" alt=""></a>
                </div>
            </div>
            <!-- /.client-logo -->
        </div>
    </div>
</div>
<!-- /.client-section -->
<?php
get_footer();
?>