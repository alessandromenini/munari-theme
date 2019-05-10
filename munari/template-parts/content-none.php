<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Munari
 */

?>

<section class="site-none wrapper-1">
	<header class="entry-header">
		<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'munari' ); ?></h1>
	</header>

	<div class="entry-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'munari' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<p><?php esc_html_e( 'Sorry, nothing found.', 'munari' ); ?> Back to <a href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage</a>?</p>
			<?php

		endif; ?>
	</div>
</section>
