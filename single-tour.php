<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php
        $single_tour__price = get_field("tour_price", get_the_ID());
        $single_tour__hightlight = get_field("tour_highlight", get_the_ID());
        $single_tour__view_title = get_field("tour_views_title", get_the_ID());
        $single_tour__gallery    = get_field("tour_gallery", get_the_ID());
        $single_tour__journey    = get_field("tour_journey", get_the_ID());
        $single_tour__included   = get_field("tour_included", get_the_ID());
        $single_tour__video      = get_field("tour_video", get_the_ID());
        $single_tour__map        = get_field("tour_map", get_the_ID());
        $single_tour__consultant = get_field("tour_consultant", get_the_ID());
        $single_tour__duration   = get_field("tour_duration", get_the_ID());
        ?>

        <!-- page-header -->
        <div class="tour-pageheader">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="tour-caption">
                            <h1 class="text-white tour-title"><?php the_title(); ?></h1>
                            <p class="tour-caption-text text-white"><strong class="tour-rate">$<?= $single_tour__price; ?></strong>( <?= $single_tour__duration; ?> )</p>
                            <a href="#booking_tour" class="btn btn-primary mb10">Book Your Tour</a>
                            <a href="#contact-map" class="btn btn-white mb10">view map</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                        <div class="highlights-section mb60">
                            <h3>Highlights</h3>
                            <?php if (!empty($single_tour__hightlight)) : ?>
                                <?= $single_tour__hightlight; ?>
                            <?php endif; ?>
                            <?php if (!empty($single_tour__view_title)) : ?>
                                <h4 class="mb30"><?= $single_tour__view_title; ?></h4>
                            <?php endif; ?>
                            <div class="slide-thumb-gallery">
                                <div class="owl-carousel" data-slider-id="1">
                                    <?php if (!is_null($single_tour__gallery)) : ?>
                                        <?php foreach ($single_tour__gallery as $item) : ?>
                                            <div><img src="<?= $item["url"]; ?>" alt="" class="img-fluid"></div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </div>
                                <div class="owl-thumbs" data-slider-id="1">
                                    <?php if (!is_null($single_tour__gallery)) :
                                    ?>
                                        <?php foreach ($single_tour__gallery as $item) : ?>
                                            <button class="owl-thumb-item"><img src="<?= $item["url"]; ?>" alt="" class="img-fluid" style="width:165px!important;height:100px!important;object-fit:cover;"></button>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="journey-section mb60">
                            <h3 class="mb30">Journey</h3>
                            <?php if (!is_null($single_tour__journey)) : ?>
                                <?php foreach ($single_tour__journey as $journey) : ?>
                                    <?= $journey["journey_content"]; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                        <div class="included-section mb60">
                            <h3 class="mb30">What's Included</h3>
                            <div class="row">
                                <?php if (!empty($single_tour__included)) : ?>
                                    <?= $single_tour__included; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="reviews-section mb60">
                            <h3 class="mb40">Customer Reviews</h3>
                            <?php
                            $review_comments = get_comments(
                                array(
                                    'post_id' => get_the_ID(),
                                    'status'  => 'approve',
                                    'order'   => 'ASC'
                                )
                            );

                            if (!is_null($review_comments)) :
                                foreach ($review_comments as $comment):
                                    $comment_rating = get_comment_meta($comment->comment_ID, 'rating', true);

                            ?>
                                    <div id="comment-<?php echo $comment->comment_ID; ?>" class="<?= $comment->comment_parent ? 'childern' : 'review-block'; ?>">
                                        <div class="review-img"><?= get_avatar($comment, 80); ?></div>
                                        <div class="review-content">
                                            <h5 class="title-bold d-inline"><?= $comment->comment_author; ?></h5>
                                            <?php if ($comment_rating > 1) : ?>
                                                <div class="star-rating">
                                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                                        <span><i class="fa <?= $i <= $comment_rating ? 'fa-star' : 'fa-star-o'; ?>"></i></span>
                                                    <?php endfor; ?>

                                                </div>
                                            <?php endif; ?>
                                            <p><?= $comment->comment_content; ?></p>
                                            <?php if(!$comment->comment_parent) :  ?>
                                            <div class="">
                                                <a href="<?php echo esc_url(get_permalink()) ?>?replytocom=<?php echo $comment->comment_ID; ?>#respond" class="btn-link mb30">Reply <i class="fa fa-angle-right"></i></a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    
                                <?php endforeach; ?>

                            <?php endif; ?>

                            <div class="leave-comments mt40">
                                <h4 class="leave-comments-title">Leave a Review</h4>
                                <!-- Bước 3: Gọi đến file wp-comments-post.php để cập nhật comment xuống database -->
                                <form id="respond" class="review-form" action="<?php echo esc_url(site_url('/wp-comments-post.php')); ?>" method="post">

                                    <div class="form-group">
                                        <label for="review-full-name">Full Name</label>
                                        <input type="text" id="review-full-name" name="author" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="review-email">Email</label>
                                        <input type="email" id="review-email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="review-star">Review Star</label>
                                        <select id="review-star" name="rating" class="form-control" required>
                                            <option value="">Choose a rating</option>
                                            <option value="5">5 stars</option>
                                            <option value="4">4 stars</option>
                                            <option value="3">3 stars</option>
                                            <option value="2">2 stars</option>
                                            <option value="1">1 star</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="review-comment">Comment</label>
                                        <textarea id="review-comment" name="comment" class="form-control" rows="5" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit-form">Submit</button>
                                    <!-- Bước 1: dùng hàm comment_id_fields() để tự tạo ID cho bình luận -->
                                    <?php comment_id_fields(); ?>
                                    <!-- Bước 2: Dùng action hook comment_form để gán sự kiện comment cho bài viết cụ thể -->
                                    <?php do_action('comment_form', get_the_ID()); ?>
                                </form>
                            </div>
                        </div>
                        <div class="video-section">
                            <h3 class="mb30">Video</h3>
                            <div class="video-block">
                                <div class="video-img">
                                    <?= $single_tour__video; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                        <div class="widget-primary support-list">
                            <div class="widget-primary-title">
                                <h3>Why Book With Us?</h3>
                            </div>
                            <?php if (!empty($single_tour__consultant)) : ?>
                                <?= $single_tour__consultant ?>
                            <?php endif; ?>
                        </div>
                        <!-- enguiry-form -->
                        <!-- form -->
                        <div class="widget-form" id="booking_tour">
                            <h3 class="text-white mb30"> Book Your Tour</h3>
                            <form id="tour-booking-form">
                                <div class="row">
                                    <?php
                                    $product_id = get_field('tour_product');

                                    ?>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="datepicker"></label>
                                                <div class="input-group">
                                                    <input id="datepicker" name="departure_date" type="text" placeholder="Date" class="form-control" required>
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="select"></label>
                                            <div class="select">
                                                <select id="select" name="guest_count" class="form-control">
                                                    <option value="">Number of Peoples</option>
                                                    <option value="6">6</option>
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?php echo esc_attr($product_id); ?>">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <button type="submit" name="singlebutton" class="btn btn-primary">Booking</button>
                                    </div>
                                </div>
                            </form>
                            <!-- /.form -->
                        </div>
                        <!-- /.enguiry-form -->
                        <div id="contact-map" class="widget-map">
                            <?= $single_tour__map; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<div class="bg-light similar-package">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section-title">
                    <h2>Similar Packages</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- destination-section -->
            <?php
            $current_tour_id = get_the_ID();
            $taxonomy_name   = 'tour-type';
            $terms  = get_the_terms($current_tour_id, $taxonomy_name);
            // echo '<pre>';
            // var_dump($terms);
            // echo '</pre>';
            if (!is_null($terms) && !is_wp_error($terms)) {
                $term_ids = wp_list_pluck($terms, 'term_id');
                //Xây dựng câu truy vấn wordpress
                $args = array(
                    'post_type' => 'tour',
                    'posts_per_page' => 3,
                    'post__not_in' => array($current_tour_id),
                    'orderBy'   => 'date',
                    'order'     => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => $taxonomy_name,
                            'field'    => 'term_id',
                            'terms'    => $term_ids,
                            'operator' => 'IN'
                        ),
                    ),
                );
                $tour_query = new WP_Query($args);
                if ($tour_query->have_posts()) {
                    while ($tour_query->have_posts()) {
                        $tour_query->the_post();
                        get_template_part('template-parts/content', get_post_type());
                    }
                    wp_reset_postdata();
                }
            }

            ?>
            <!-- /.destination-section -->

        </div>
    </div>
</div>

<?php get_footer(); ?>