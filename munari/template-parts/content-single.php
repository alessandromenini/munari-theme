<?php
/**
 * Template part for displaying single posts content in single.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Munari
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php if ( ! has_excerpt() ) {
      echo '';
		} else { ?>
			<div class="entry-excerpt">
      	<?php the_excerpt(); ?>
			</div>
		<?php } ?>
	</header>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'munari' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>

<div class="entry-buttons">
	<span class="previous-button"><?php previous_post_link('%link', '<i class="fa fa fa-angle-left"></i>  PREV') ?></span>
	<span class="next-button"><?php next_post_link('%link', 'NEXT  <i class="fa fa fa-angle-right"></i>') ?></span>
</div>
