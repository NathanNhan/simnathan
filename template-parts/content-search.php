<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travelme
 */

?>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-block'); ?>>
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-img">
                <a href="<?php the_permalink(); ?>" class="imghover">
                    <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="post-content">
            <h2 class="post-title"><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h2>
            <div class="meta">
                <span class="meta-date"><?php echo esc_html(get_the_date()); ?></span>
                <span>/</span>
                <span class="meta-admin">By <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="meta-link"><?php the_author(); ?></a></span>
            </div>
        </div>
    </article>
</div>
