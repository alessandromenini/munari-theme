<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Munari
 */

get_header(); ?>

	<div class="site-archive">

		<?php
		if ( have_posts() ) : ?>

			<header class="entry-header wrapper-1">
				<?php the_archive_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>

			<div class="entry-index wrapper-2">

			<?php /* Start the Loop */ ?>

			<div class="post-container">

			<?php

			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile; ?>

			</div> <?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div>

	</div>

<?php
get_footer();
