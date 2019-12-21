<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package OnPoint
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
		<header>
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>
		<?php
			endif;

			/* Start the Loop */
			while (have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				if(is_singular()){
					get_template_part('template-parts/template','single');
				}

			endwhile;
			?>
		<div class="blog-listings-wrapper">
			<?php   require ONPOINT_THEME . '/theme-functions/theme-parts/categories-boxes.php'; ?>
			<div class="container-fluid">
				<div class="blog-listing-items">
					<div class="row">

					<?php
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 2,
							'paged' => $paged,
						);
						$q = new WP_Query($args);
						while($q->have_posts()): $q->the_post();
							get_template_part('template-parts/template','archive');
						endwhile;
						wp_reset_postdata();
					?>

					</div>
				</div>
				<nav>
					<?php pagination_bar($q); ?>
				</nav>
			</div>
		</div>

		<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();