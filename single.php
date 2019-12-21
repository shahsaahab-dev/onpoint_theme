<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package OnPoint
 */

get_header();
include (ONPOINT_THEME . '/theme-functions/theme-parts/ad-space.php');
?>
<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );?>

			<div class="container">
				<div class="row">
					<div class="col-lg-4 mx-auto">
						<?php
						the_post_navigation( array(
							'prev_text'                  => __( 'Prev' ),
							'next_text'                  => __( 'Next' ),
						) );
						
						?>
					</div>
				</div>
			</div>
<?php
			

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
    

	

<?php
get_footer();
