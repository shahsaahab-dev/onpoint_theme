<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package OnPoint
 */

get_header();
$page_layout = '';
$full_width = 'container-fluid';
$boxed = 'container';

if( !is_single() || !is_home() || !is_front_page() ){
	$page_layout = $boxed;
}
else{
	$page_layout = $full_width;
}
?>

<div class="<?php echo $page_layout; ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</div><!-- #primary -->

<?php

get_footer();
