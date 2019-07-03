<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Munari
 */

?>

	</div>

	<?php $layout_contenttitlealignment = get_theme_mod( 'layout_contenttitlealignment', 'center' );
		if( $layout_contenttitlealignment != '' ) { switch ( $layout_contenttitlealignment ) {
			case 'left':
				echo '<style type="text/css">.entry-header{text-align:left;}</style>';
				break;
			case 'center':
				echo '<style type="text/css">.entry-header{text-align:center;}</style>';
				break;
			case 'right':
				echo '<style type="text/css">.entry-header{text-align:right;}</style>';
				break;
		} }
	?>

	<?php $layout_contenttextalignment = get_theme_mod( 'layout_contenttextalignment', 'justify' );
		if( $layout_contenttextalignment != '' ) { switch ( $layout_contenttextalignment ) {
			case 'left':
				echo '<style type="text/css">.entry-excerpt, .entry-content{text-align:left;}</style>';
				break;
			case 'center':
				echo '<style type="text/css">.entry-excerpt, .entry-content{text-align:center;}</style>';
				break;
			case 'right':
				echo '<style type="text/css">.entry-excerpt, .entry-content{text-align:right;}</style>';
				break;
			case 'justify':
				echo '<style type="text/css">.entry-excerpt, .entry-content{text-align:justify;}</style>';
				break;
		} }
	?>

	</main><!-- #content -->

	<footer id="footer" class="footer-container">
	<div class="site-footer wrapper-1">

	<?php $layout_footer = get_theme_mod( 'layout_footer', '1' );
		if( $layout_footer != '' ) { switch ( $layout_footer ) {
			case '1':
				break;
			case '2':
				echo '<style type="text/css">#footer{display:none;}</style>';
				break;
		} }
	?>

	<div class="footer-wrap">

		<div class="site-info">
			<?php echo get_theme_mod( 'munari_footer', '&copy; ' .date('Y ') . get_bloginfo('name') . ' / <a href="http://munari.alessandromenini.it" target="_blank">Munari</a>' ); ?>
		</div>

		<div class="site-social">
		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="social-menu" role="navigation">
				<?php wp_nav_menu( array(
					'theme_location' => 'social',
					'menu_id' => 'social-menu',
					'link_before' => '<span>',
					'link_after' => '</span>'
				) ); ?>
			</nav>
		<?php endif; ?>
		</div>

	</div>

	<?php $layout_footeralignment = get_theme_mod( 'layout_footeralignment', '1' );
	  if( $layout_footeralignment != '' ) { switch ( $layout_footeralignment ) {
			case '1':
				break;
			case '2':
				echo '<style type="text/css">.footer-wrap{-webkit-flex-direction:column;flex-direction:column;-webkit-align-items:center;align-items:center;text-align:center;}.site-social{margin-top:15px;}.social-menu li{margin:0 0.5em;}</style>';
				break;
		} }
	?>

	</div>
	</footer><!-- #footer -->
</div><!-- #site -->

<?php wp_footer(); ?>

</body>
</html>
