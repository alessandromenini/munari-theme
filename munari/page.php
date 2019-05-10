<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Munari
 */

get_header(); ?>

	<div class="site-page wrapper-1">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</div>

	<?php $layout_indexbelowpages = get_theme_mod( 'layout_indexbelowpages', 'show' );
		if( $layout_indexbelowpages != '' ) { switch ( $layout_indexbelowpages ) {
			case 'show':
				echo '<div class="site-index wrapper-2">';
				break;
			case 'hide':
				echo '<div class="site-index wrapper-2 hidden">';
				break;
		} }
	?>

		<?php /* Start the Loop */ ?>

		<div class="post-container">

		<?php

		$query = new WP_Query( 'posts_per_page=-1' );
		while ( $query->have_posts() ) : $query->the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_format() );

		endwhile;
		wp_reset_postdata(); // reset the query ?>

		</div>

	</div>

<?php
get_footer();
