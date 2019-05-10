<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Munari
 */
?>

<?php $layout_indexcolumns = get_theme_mod( 'layout_indexcolumns', '3' );
  if( $layout_indexcolumns != '' ) { switch ( $layout_indexcolumns ) {
		case '1':
			echo '<article class="post-wrap grid-1-1 col">';
			break;
		case '2':
			echo '<article class="post-wrap grid-1-1 grid-sm-1-2 col">';
			break;
		case '3':
			echo '<article class="post-wrap grid-1-1 grid-sm-1-2 grid-lg-1-3 col">';
			break;
		case '4':
			echo '<article class="post-wrap grid-1-1 grid-sm-1-2 grid-md-1-3 grid-lg-1-4 col">';
			break;
	} }
?>

		<?php if ( has_post_thumbnail() ) : ?>

      <div class="post-wrap-inner" onclick="">

			<div class="post-image">
        <a href="<?php the_permalink(); ?>" <?php post_class(); ?>>
          <?php the_post_thumbnail( '' ); ?>
				</a>
      </div>

			<div class="post-info">
        <div class="post-info-inner">
				<h5 class="post-title">
					<a href="<?php the_permalink(); ?>" <?php post_class(); ?>>
						<?php the_title(); ?>
					</a>
				</h5>
        <h6 class="post-category">
          <?php the_category(', '); ?>
				</h6>
			  </div>
      </div>

      </div>

      <?php $layout_indextitleposition = get_theme_mod( 'layout_indextitleposition', 'below' );
			  if( $layout_indextitleposition != '' ) { switch ( $layout_indextitleposition ) {
					case 'below':
						echo '<style type="text/css">

            .post-image {
            	-webkit-transition: opacity 250ms ease-in-out;
              -ms-transition: opacity 250ms ease-in-out;
              transition: opacity 250ms ease-in-out;
            }

            .post-image:hover {
              opacity: 0.75;
            }

            .post-wrap-inner .post-info {
            	padding-top: 1em;
            }

            </style>';
						break;

					case 'overlay':
						echo '<style type="text/css">

            .post-wrap-inner {
              position: relative;
            }

            .post-image, .post-info {
            	-webkit-transition: opacity 250ms ease-in-out;
              -ms-transition: opacity 250ms ease-in-out;
              transition: opacity 250ms ease-in-out;
            }

            .post-info {
              opacity: 0;

              position: absolute;
              top: 50%;
              left: 50%;
              margin-right: -50%;
              -webkit-transform: translate(-50%, -50%);
              -ms-transform: translate(-50%, -50%);
              transform: translate(-50%, -50%);

              width: 100%;
            }

            .post-info-inner {
              position: absolute;
              top: 50%;
              left: 50%;
              margin-right: -50%;
              -webkit-transform: translate(-50%, -50%);
              -ms-transform: translate(-50%, -50%);
              transform: translate(-50%, -50%);
            }

            .post-wrap-inner:hover .post-image {
              opacity: 0;
              cursor: pointer;
            }

            .post-wrap-inner:hover .post-info {
              opacity: 1;
              cursor: pointer;
            }

            .post-title, .post-category {
              cursor: pointer;
            }

            </style>';
						break;
				} }
			?>

		<?php else : ?>

      <div class="post-info">
				<h5 class="post-title">
					<a href="<?php the_permalink(); ?>" <?php post_class(); ?>>
						<?php the_title(); ?>
					</a>
				</h5>
        <h6 class="post-category">
          <?php the_category(', '); ?>
				</h6>
			</div>

		<?php endif; ?>

    <?php $layout_indexspacing = get_theme_mod( 'layout_indexspacing', '2' );
      if( $layout_indexspacing != '' ) { switch ( $layout_indexspacing ) {
        case '1':
        echo '<style type="text/css">

              .post-wrap, .navigation {
                padding: 0;
              }

              .wrapper-1, .wrapper-2 {
                margin: 0 20px;
                max-width: 1140px;
              }

              .col-left-1-2, .col-left-1-3, .col-left-1-4 {
                padding-right: 30px; /* 30px distance */
            		padding-right: 60px; /* 60px distance */
            	}

              .col-right-1-2, .col-right-1-3, .col-right-1-4 {
            		padding-left: 0;
            	}

              @media screen and (min-width: 576px) {

                .wrapper-1, .wrapper-2 {
                  margin: 0 30px;
                }

              }

              @media screen and (min-width: 1200px) {

                .wrapper-1, .wrapper-2 {
                  margin: 0 auto;
                }

              }

              </style>';
          break;
        case '2':
          break;
      } }
    ?>

    <?php $layout_indexcategory = get_theme_mod( 'layout_indexcategory', '2' );
      if( $layout_indexcategory != '' ) { switch ( $layout_indexcategory ) {
        case '1':
          break;
        case '2':
          echo '<style type="text/css">.post-category{display:none;}</style>';
          break;
      } }
    ?>

    <?php $layout_indexinfoalignment = get_theme_mod( 'layout_indexinfoalignment', 'center' );
      if( $layout_indexinfoalignment != '' ) { switch ( $layout_indexinfoalignment ) {
        case 'left':
          echo '<style type="text/css">.post-info,.post-image{text-align:left;}</style>';
          break;
        case 'center':
          echo '<style type="text/css">.post-info,.post-image{text-align:center;}</style>';
          break;
        case 'right':
          echo '<style type="text/css">.post-info,.post-image{text-align:right;}</style>';
          break;
      } }
    ?>

</article>
