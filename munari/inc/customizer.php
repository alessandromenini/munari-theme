<?php
/**
 * Munari Theme Customizer.
 *
 * @package Munari
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function munari_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' );
	$wp_customize->get_setting( 'blogdescription' );

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'munari_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'munari_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'munari_customize_register' );

/**
 * Footer in theme customizer.
 */
function footer_customize_register( $wp_customize ) {

	$wp_customize->add_setting('munari_footer', array(
		'default' => '&copy; ' .date('Y ') . get_bloginfo('name') . ' / Designed by <a href="http://wwww.alessandromenini.it" target="_blank">Alessandro Menini</a>',
		'sanitize_callback' => 'sanitize_munari_footer',
	));

	$wp_customize->add_control('munari_footer', array(
		'label' => 'Footer',
		'section' => 'title_tagline',
		'type' => 'text',
	) );

	$wp_customize->selective_refresh->add_partial( 'munari_footer', array(
		'selector' => '.site-info',
		'render_callback' => 'munari_customize_partial_footer',
	) );
}
add_action( 'customize_register', 'footer_customize_register' );

function sanitize_munari_footer( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Layout section in theme customizer.
 */
function layout_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'layout_panel', array(
  	'title' => __( 'Layout', 'munari' ),
	) );

	$wp_customize->add_section( 'header_settings', array(
    'title' => __( 'Header', 'munari' ),
    'panel' => 'layout_panel',
	) );

	$wp_customize->add_section( 'description_settings', array(
    'title' => __( 'Description', 'munari' ),
    'panel' => 'layout_panel',
	) );

	$wp_customize->add_section( 'index_settings', array(
    'title' => __( 'Index', 'munari' ),
    'panel' => 'layout_panel',
	) );

	$wp_customize->add_section( 'content_settings', array(
    'title' => __( 'Content', 'munari' ),
    'panel' => 'layout_panel',
	) );

	$wp_customize->add_section( 'footer_settings', array(
    'title' => __( 'Footer', 'munari' ),
    'panel' => 'layout_panel',
	) );

	//Sticky header
	$wp_customize->add_setting( 'layout_headersticky', array(
    'default' => '2',
		'sanitize_callback' => 'sanitize_layout_headersticky',
  ) );

	$wp_customize->add_control( 'layout_headersticky', array(
    'type' => 'radio',
		'label' => __( 'Sticky header', 'munari' ),
    'section' => 'header_settings',
    'choices' => array(
			'1' => __( 'Enabled', 'munari' ),
			'2' => __( 'Disabled', 'munari' ),
    ),
  ) );

	//Header layout
	$wp_customize->add_setting( 'layout_headeralignment', array(
    'default' => '1',
  ) );

	$wp_customize->add_control( 'layout_headeralignment', array(
    'type' => 'radio',
		'label' => __( 'Header layout', 'munari' ),
    'section' => 'header_settings',
    'choices' => array(
    	'1' => 'Justified',
      '2' => 'Centered',
    ),
  ) );

	//Description
	$wp_customize->add_setting( 'layout_blogdescription', array(
    'default' => '1',
  ) );

	$wp_customize->add_control( 'layout_blogdescription', array(
    'type' => 'radio',
		'label' => __( 'Description', 'munari' ),
    'section' => 'description_settings',
    'choices' => array(
    	'1' => 'Show',
      '2' => 'Do not show',
    ),
  ) );

	//Description alignment
	$wp_customize->add_setting( 'layout_blogdescriptionalignment', array(
    'default' => 'center',
  ) );

	$wp_customize->add_control( 'layout_blogdescriptionalignment', array(
    'type' => 'radio',
		'label' => __( 'Description alignment', 'munari' ),
    'section' => 'description_settings',
    'choices' => array(
    	'left' => 'Left',
      'center' => 'Center',
			'right' => 'Right',
    ),
  ) );

	//Index - Items per row
	$wp_customize->add_setting( 'layout_indexcolumns', array(
    'default' => '3',
  ) );

	$wp_customize->add_control( 'layout_indexcolumns', array(
    'type' => 'radio',
		'label' => __( 'Items per row', 'munari' ),
    'section' => 'index_settings',
    'choices' => array(
    	'1' => '1',
      '2' => '2',
      '3' => '3',
			'4' => '4',
    ),
  ) );

	//Index - Item spacing
	$wp_customize->add_setting( 'layout_indexspacing', array(
    'default' => '2',
  ) );

	$wp_customize->add_control( 'layout_indexspacing', array(
    'type' => 'radio',
		'label' => __( 'Item spacing', 'munari' ),
    'section' => 'index_settings',
    'choices' => array(
    	'1' => '0 px',
      '2' => '30 px',
    ),
  ) );

	//Info position
	$wp_customize->add_setting( 'layout_indextitleposition', array(
    'default' => 'below',
  ) );

	$wp_customize->add_control( 'layout_indextitleposition', array(
    'type' => 'radio',
		'label' => __( 'Info position', 'munari' ),
    'section' => 'index_settings',
    'choices' => array(
    	'below' => 'Below',
      'overlay' => 'Overlay',
    ),
  ) );

	//Info alignment
	$wp_customize->add_setting( 'layout_indexinfoalignment', array(
		'default' => 'center',
	) );

	$wp_customize->add_control( 'layout_indexinfoalignment', array(
		'type' => 'radio',
		'label' => __( 'Info alignment', 'munari' ),
		'section' => 'index_settings',
		'choices' => array(
			'left' => 'Left',
			'center' => 'Center',
			'right' => 'Right',
		),
	) );

	//Category
	$wp_customize->add_setting( 'layout_indexcategory', array(
    'default' => '2',
  ) );

	$wp_customize->add_control( 'layout_indexcategory', array(
    'type' => 'radio',
		'label' => __( 'Category', 'munari' ),
    'section' => 'index_settings',
    'choices' => array(
    	'1' => 'Show',
      '2' => 'Do not show',
    ),
  ) );

	//Title alignment
	$wp_customize->add_setting( 'layout_contenttitlealignment', array(
    'default' => 'center',
  ) );

	$wp_customize->add_control( 'layout_contenttitlealignment', array(
    'type' => 'radio',
		'label' => __( 'Title alignment', 'munari' ),
    'section' => 'content_settings',
    'choices' => array(
			'left' => 'Left',
      'center' => 'Center',
			'right' => 'Right',
    ),
  ) );

	//Content alignment
	$wp_customize->add_setting( 'layout_contenttextalignment', array(
    'default' => 'justify',
  ) );

	$wp_customize->add_control( 'layout_contenttextalignment', array(
    'type' => 'radio',
		'label' => __( 'Content alignment', 'munari' ),
    'section' => 'content_settings',
    'choices' => array(
			'left' => 'Left',
      'center' => 'Center',
			'right' => 'Right',
			'justify' => 'Justify',
    ),
  ) );

	//Index below pages
	$wp_customize->add_setting( 'layout_indexbelowpages', array(
    'default' => 'show',
  ) );

	$wp_customize->add_control( 'layout_indexbelowpages', array(
    'type' => 'radio',
		'label' => __( 'Index below pages', 'munari' ),
    'section' => 'content_settings',
    'choices' => array(
    	'show' => 'Enabled',
      'hide' => 'Disabled',
    ),
  ) );

	//Index below posts
	$wp_customize->add_setting( 'layout_indexbelowposts', array(
    'default' => 'show',
  ) );

	$wp_customize->add_control( 'layout_indexbelowposts', array(
    'type' => 'radio',
		'label' => __( 'Index below posts', 'munari' ),
    'section' => 'content_settings',
    'choices' => array(
    	'show' => 'Enabled',
      'hide' => 'Disabled',
    ),
  ) );

	//Footer
	$wp_customize->add_setting( 'layout_footer', array(
    'default' => '1',
  ) );

	$wp_customize->add_control( 'layout_footer', array(
    'type' => 'radio',
		'label' => __( 'Footer', 'munari' ),
    'section' => 'footer_settings',
    'choices' => array(
    	'1' => 'Show',
      '2' => 'Do not show',
    ),
  ) );

	//Footer layout
	$wp_customize->add_setting( 'layout_footeralignment', array(
    'default' => '1',
  ) );

	$wp_customize->add_control( 'layout_footeralignment', array(
    'type' => 'radio',
		'label' => __( 'Footer layout', 'munari' ),
    'section' => 'footer_settings',
    'choices' => array(
    	'1' => 'Justified',
      '2' => 'Centered',
    ),
  ) );

}
add_action( 'customize_register', 'layout_customize_register' );


/**
 * Sanitize layout section.
 */
function sanitize_layout_headersticky( $input ) {
	$valid = array(
		'1' => __( 'Non sticky', 'munari' ),
		'2' => __( 'Sticky', 'munari' ),
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}
	return '';
}

/**
 * Logo uploader in theme customizer.
 */
function logo_customize_register( $wp_customize ) {
	// Add setting for logo uploader
	$wp_customize->add_setting( 'munari_logo' );

	// Add control for logo uploader
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'munari_logo', array(
		'label'    => 'Logo',
		'section'  => 'title_tagline',
		'settings' => 'munari_logo',
		'priority' => 1,
	) ) );

	$wp_customize->selective_refresh->add_partial( 'munari_logo', array(
		'selector' => '.site-logo a',
		'render_callback' => 'munari_customize_partial_logo',
	) );
}
add_action( 'customize_register', 'logo_customize_register' );
