<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Travelme
 */

get_header();
?>

<!-- error-page -->

<body class="" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/error_wrapper.jpg)no-repeat; background-position:top center; ">
	<div class="space-medium">
		<div class="container">
			<div class="row ">
				<!-- contact -->
				<div class="col-xl-5 col-lg-5 offset-1 col-md-5 col-sm-9 col-9 ">
					<div class="error-block">
						<h1 class="error-title">Its 404 Error</h1>
						<div class="error-content">
							<p class="error-text">Ooopppsss!
								<br> We Lost You Somewhere
							</p>
							<p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
							<a href="<?php echo home_url(); ?>" class="btn btn-primary">Go To Homepage</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<!-- /.error-page -->

<?php
get_footer();
