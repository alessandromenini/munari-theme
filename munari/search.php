<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Munari
 */

get_header(); ?>

	<section class="site-search">

		<header class="entry-header wrapper-1">
			<h1 class="entry-title"><?php printf( esc_html__( 'Search results for "%s"', 'munari' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header>

		<?php
		if ( have_posts() ) : ?>

		<div class="entry-index wrapper-2">

		<?php /* Start the Loop */ ?>

		<div class="post-container">

		<?php

		while ( have_posts() ) : the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			 get_template_part( 'template-parts/content', get_post_format() );

		 endwhile; ?>

 		</div> <?php

			the_posts_navigation();

		else : ?>

			<div class="entry-content wrapper-1">
				<p><?php esc_html_e( 'Sorry, nothing found.', 'munari' ); ?> Back to <a href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage</a>?</p>
			</div>

		<?php
		endif; ?>

		</div>

		</section>

<?php
get_footer();
