<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Munari
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="site" class="site-container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'munari' ); ?></a>

	<?php $layout_headersticky = get_theme_mod( 'layout_headersticky', '2' );
	  if( $layout_headersticky != '' ) { switch ( $layout_headersticky ) {
			case '1':
				echo '<header id="header" class="header-container sticker">';
				break;
			case '2':
				echo '<header id="header" class="header-container">';
				break;
		} }
	?>

	<div class="site-header wrapper-1 clearfix">
		<div class="header-wrap">
		<div class="site-branding">
			<?php if ( get_theme_mod( 'munari_logo' ) ) : ?>
				<div class="site-logo">
		    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		        	<img src="<?php echo get_theme_mod( 'munari_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		    	</a>
				</div>
		  <?php else : ?>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
			<?php endif; ?>
		</div>
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<div class="site-navigation">
			<div class="menu-1">
			<nav class="horizontal-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-horizontal-menu' ) ); ?>
			</nav>
			</div>
			<div class="menu-2">
			<nav class="hamburgler-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-hamburgler-menu' ) ); ?>
			</nav>
			<div id="hamburgler" class="hamburgler-icon-wrapper">
  				<span class="hamburgler-icon"></span>
			</div>
			</div>
		</div>
		<?php endif; ?>

		<?php $layout_headeralignment = get_theme_mod( 'layout_headeralignment', '1' );
		  if( $layout_headeralignment != '' ) { switch ( $layout_headeralignment ) {
				case '1':
					break;
				case '2':
					echo '<style type="text/css">@media screen and (min-width:992px){.header-wrap{-webkit-flex-direction:column;flex-direction:column;}.site-branding{margin-right:0;}.horizontal-menu{margin-top:15px;}.horizontal-menu li{margin:0 0.5em;}}</style>';
					break;
			} }
		?>

		</div>
	</div>
	</header><!-- #header -->

	<?php if ( is_front_page() ) : ?>
		<?php $description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<div id="description" class="description-container">
				<h2 class="site-description wrapper-1"><?php echo $description; /* WPCS: xss ok. */ ?></h2>

				<?php $layout_blogdescription = get_theme_mod( 'layout_blogdescription', '1' );
					if( $layout_blogdescription != '' ) { switch ( $layout_blogdescription ) {
						case '1':
							break;
						case '2':
							echo '<style type="text/css">#description{display:none;}</style>';
							break;
					} }
				?>

				<?php $layout_blogdescriptionalignment = get_theme_mod( 'layout_blogdescriptionalignment', '2' );
					if( $layout_blogdescriptionalignment != '' ) { switch ( $layout_blogdescriptionalignment ) {
						case 'left':
							echo '<style type="text/css">.site-description{text-align:left;}</style>';
							break;
						case 'center':
							echo '<style type="text/css">.site-description{text-align:center;}</style>';
							break;
						case 'right':
							echo '<style type="text/css">.site-description{text-align:right;}</style>';
							break;
					} }
				?>

			</div><!-- #description -->
		<?php endif; ?>
	<?php endif; ?>



	<main id="content" class="content-container">
	<div class="site-content">
