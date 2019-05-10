<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Munari
 */

get_header(); ?>

	<div class="site-single wrapper-1">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</div>

	<?php $layout_indexbelowposts = get_theme_mod( 'layout_indexbelowposts', 'show' );
		if( $layout_indexbelowposts != '' ) { switch ( $layout_indexbelowposts ) {
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
