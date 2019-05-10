<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Munari
 */

get_header(); ?>

	<section class="site-404 wrapper-1">

		<header class="entry-header">
			<h1 class="entry-title"><?php esc_html_e( 'Oops!', 'munari' ); ?></h1>
		</header>

		<div class="entry-content">
			<p><?php esc_html_e( 'Sorry, page not found.', 'munari' ); ?> Back to <a href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage</a>?</p>
		</div>

	</section>

<?php
get_footer();
