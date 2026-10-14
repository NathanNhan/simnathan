<?php
/* 
 Template Name: Contact
*/
get_header();
$contact_title = get_field("title_form");
$contact_sub__title = get_field("subtitle_form");
$contact_info = get_field("info_contact");
$contact_map = get_field("contact_map");
?>

<!-- page-header -->
        <div class="contact-pageheader">
        </div>
        <!-- /.page-header-->
        <!-- contact-section -->
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="contact-wrapper">
                        <div id="contact-map" class="mb60">
                            <?php if(!empty($contact_map)) : ?>
                                <?php echo $contact_map; ?>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 offset-md-1 col-md-10 col-sm-12 col-12">
                                <div class="section-title">
                                    <h2><?php echo esc_html($contact_title); ?></h2>
                                    <p><?php echo esc_html($contact_sub__title); ?></p>
                                </div>
                                <div class="contact-block">
                                    <!-- contact-form -->
                                    <?php echo do_shortcode('[contact-form-7 id="afabf58" title="Contact Form"]'); ?>
                                    <!-- contact-form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact-info -->
        <div class="space-small">
            <div class="container">
                <div class="row ">
                    <!-- contact -->
                    <?php if(!is_null($contact_info)) :  ?>
                    <?php foreach($contact_info as $info) : ?>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-6 col-12 mb20">
                            <div class="contact-info">
                                <h4 class="contact-info-title"><?php echo esc_html($info['title']); ?></h4>
                                <?php echo $info['content_box']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- /.contact -->
                </div>
            </div>
        </div>
        <!-- /.contact-info -->
        <!-- /.contact-section -->
        <!-- newsletter -->
        <?php get_template_part( 'template-parts/content', 'newsletter' ); ?>
        <!-- /.newsletter -->




<?php get_footer(); ?>