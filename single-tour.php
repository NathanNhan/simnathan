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
        $single_tour__departure_dates = get_field("department_date", get_the_ID());
        ?>

        <!-- page-header -->
        <div class="tour-pageheader" <?php if (has_post_thumbnail()) : ?> style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');" <?php endif; ?>>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="tour-caption">
                            <h1 class="text-white tour-title"><?php the_title(); ?></h1>
                            <p class="tour-caption-text text-white"><strong class="tour-rate">$<?= $single_tour__price; ?></strong>( <?= $single_tour__duration; ?> )</p>
                            <a href="#booking_tour" class="btn btn-primary mb10">Đặt tour</a>
                            <a href="#contact-map" class="btn btn-white mb10">Xem bản đồ</a>
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
                            <h3>Nổi bật</h3>
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
                            <h3 class="mb30">Hành trình chi tiết</h3>
                            <?php if (!is_null($single_tour__journey)) : ?>
                                <?php foreach ($single_tour__journey as $journey) : ?>
                                    <?= $journey["journey_content"]; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                        <div class="included-section mb60">
                            <h3 class="mb30">Dịch vụ bao gồm</h3>
                            <div class="row">
                                <?php if (!empty($single_tour__included)) : ?>
                                    <?= $single_tour__included; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="reviews-section mb60">
                            <h3 class="mb40">Đánh giá của khách hàng</h3>
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
                                            <?php if (!$comment->comment_parent) :  ?>
                                                <div class="">
                                                    <a href="<?php echo esc_url(get_permalink()) ?>?replytocom=<?php echo $comment->comment_ID; ?>#respond" class="btn-link mb30">Reply <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            <?php endif; ?>

                            <div class="leave-comments mt40">
                                <h4 class="leave-comments-title">Để lại đánh giá</h4>
                                <form id="respond" class="review-form" action="<?php echo esc_url(site_url('/wp-comments-post.php')); ?>" method="post">

                                    <div class="form-group">
                                        <label for="review-full-name">Họ và tên</label>
                                        <input type="text" id="review-full-name" name="author" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="review-email">Email</label>
                                        <input type="email" id="review-email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="review-star">Đánh giá</label>
                                        <select id="review-star" name="rating" class="form-control" required>
                                            <option value="">Chọn mức độ</option>
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
                                    <?php comment_id_fields(); ?>
                                    <?php do_action('comment_form', get_the_ID()); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                        <div class="widget-primary support-list">
                            <div class="widget-primary-title">
                                <h3>Tại sao nên đặt tour với chúng tôi?</h3>
                            </div>
                            <?php if (!empty($single_tour__consultant)) : ?>
                                <?= $single_tour__consultant ?>
                            <?php endif; ?>
                        </div>
                        <!-- enguiry-form -->
                        <div class="widget-form" id="booking_tour">
                            <h3 class="text-white mb30"> Đặt tour của bạn</h3>
                            <?php if (!empty($single_tour__departure_dates) && is_array($single_tour__departure_dates)) : ?>
                                <div class="tour-departure-dates">
                                    <h4 class="tour-departure-dates-title">Ngày khởi hành</h4>
                                    <ul class="tour-departure-dates-list">
                                        <?php foreach ($single_tour__departure_dates as $departure_date_row) : ?>
                                            <?php
                                            $departure_date_value = isset($departure_date_row['date']) ? trim((string) $departure_date_row['date']) : '';
                                            if ($departure_date_value === '') {
                                                continue;
                                            }

                                            $departure_date_object = DateTimeImmutable::createFromFormat('!Ymd', $departure_date_value);
                                            if (!$departure_date_object) {
                                                $departure_date_object = DateTimeImmutable::createFromFormat('!d/m/Y', $departure_date_value);
                                            }
                                            if (!$departure_date_object) {
                                                $departure_date_object = DateTimeImmutable::createFromFormat('!Y-m-d', $departure_date_value);
                                            }
                                            $departure_date_label = $departure_date_object
                                                ? $departure_date_object->format('d/m/Y')
                                                : $departure_date_value;
                                            ?>
                                            <li class="tour-departure-date">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <span><?php echo esc_html($departure_date_label); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <!-- HÀM GỌI CONTACT FORM 7 -->
                            <?php echo do_shortcode('[contact-form-7 id="9207" title="Booking Form"]'); ?>

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
                    <h2>Chuyến đi tương tự</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $current_tour_id = get_the_ID();
            $taxonomy_name   = 'tour-type';
            $terms  = get_the_terms($current_tour_id, $taxonomy_name);

            if (!is_null($terms) && !is_wp_error($terms)) {
                $term_ids = wp_list_pluck($terms, 'term_id');
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
        </div>
    </div>
</div>

<?php get_footer(); ?>