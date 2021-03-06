<?php

/**
 *
 * Helper Function for declaring Global Variable for theme options
 **/
if ( ! function_exists( 'codexin_get_option' ) ) {
	/**
	 * Function to get options in front-end
	 *
	 * @param int    $option The option we need from the DB
	 * @param string $default If $option doesn't exist in DB return $default value
	 * @return string
	 */

	function codexin_get_option( $option = false, $default = false ) {
		if ( $option === false ) {
			return false;
		}
		if ( ! class_exists( 'ReduxFramework' ) ) {
			return false;
		}
		$codexin_get_options = wp_cache_get( CODEXIN_THEME_OPTIONS );
		if ( ! $codexin_get_options ) {
			$codexin_get_options = get_option( CODEXIN_THEME_OPTIONS );
			wp_cache_delete( CODEXIN_THEME_OPTIONS );
			wp_cache_add( CODEXIN_THEME_OPTIONS, $codexin_get_options );
		}

		if ( isset( $codexin_get_options[ $option ] ) && $codexin_get_options[ $option ] !== '' ) {
			return $codexin_get_options[ $option ];
		} else {
			return $default;
		}
	}
}


/**
 * Single Post Navigation inside single.php files
 */

if ( ! function_exists( 'codexin_post_navigation' ) ) {
	function codexin_post_navigation() {

		$prev_link = get_previous_post_link( '%link', '&laquo; ' . esc_html__( 'Previous Post', 'codexin' ) );
		$next_link = get_next_post_link( '%link', esc_html__( 'Next Post', 'codexin' ) . ' &raquo;' );
		if ( ! empty( $prev_link ) || ! empty( $next_link ) ) :
			echo '<div class="posts-nav clearfix">';

			if ( $prev_link ) :
				echo '<div class="nav-previous alignleft">' . $prev_link . '</div>';
			endif;

			if ( $next_link ) :
				echo '<div class="nav-next  alignright">' . $next_link . '</div>';
			endif;

			echo '</div>';
		endif;
	}
}

/**
 * Blog/Archive page navigation
 */

if ( ! function_exists( 'codexin_posts_navigation' ) ) {
	function codexin_posts_navigation() {
		$prev_link = get_previous_posts_link( '&laquo; ' . esc_html__( 'Newer Posts', 'codexin' ) );
		$next_link = get_next_posts_link( esc_html__( 'Older Posts', 'codexin' ) . ' &raquo; ' );

		if ( ! empty( $prev_link ) || ! empty( $next_link ) ) :
			echo '<div class="posts-nav clearfix">';
			if ( $next_link ) :
				echo '<div class="nav-next alignright">' . $next_link . '</div>';
			endif;

			if ( $prev_link ) :
				echo '<div class="nav-previous alignleft">' . $prev_link . '</div>';
			endif;
			echo '</div>';
		endif;

	}
}



/**
 * Comments Function used on comments.php
 */
function codexin_comment_function( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class( 'clearfix' ); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-single">
				<div class="comment-single-left comment-author vcard">
				<?php echo get_avatar( $comment, $size = '90' ); ?>
				</div>

				<div class="comment-single-right comment-info">
				<?php printf( '<span class="fn">%s</span>', get_comment_author_link() ); ?>
					<div class="comment-text">
					<?php comment_text(); ?>
					</div>

					<div class="comment-meta"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( '%1$s ' . esc_html__( 'at', 'codexin' ) . ' %2$s', get_comment_date(), get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)', 'codexin' ), '  ', '' ); ?><span class="comment-reply">
																  <?php
																	comment_reply_link(
																		array_merge(
																			$args,
																			array(
																				'depth'     => $depth,
																				'max_depth' => $args['max_depth'],
																				'before'    => ' &nbsp;&nbsp;<i class="fa fa-caret-right"></i> &nbsp;&nbsp;',
																			)
																		)
																	);
																	?>
																																																																																							</span>
					</div>

					<?php if ( $comment->comment_approved == '0' ) : ?>
					<div class="moderation-notice"><em><?php echo esc_html__( 'Your comment is awaiting moderation.', 'codexin' ); ?></em></div>
					<?php endif; ?>

				</div>
			</div>     
		</div>
	<?php
}


if ( ! function_exists( 'codexin_sanitize_hex_color' ) ) {
	/**
	 * Helper function to sanitize hex colors
	 *
	 * @param   string $color  The color code
	 * @return  string
	 * @since   v1.0
	 */
	function codexin_sanitize_hex_color( $color ) {
		if ( '' === $color ) {
			return '';
		}

		// make sure the color starts with a hash
		$color = '#' . ltrim( $color, '#' );

		// 3 or 6 hex digits, or the empty string.
		if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
			return $color;
		}

		return null;
	}
}



if ( ! function_exists( 'codexin_hex_to_rgba' ) ) {
	/**
	 * Helper function to convert hex color to RGBA
	 *
	 * @param   string $hex_color     The color code in hexadecimal
	 * @param   float  $opacity       The color opacity we want
	 * @return  string
	 * @since   v1.0
	 */
	function codexin_hex_to_rgba( $hex_color, $opacity = '' ) {
		$hex_color = str_replace( '#', '', $hex_color );
		if ( strlen( $hex_color ) == 3 ) {
			$r = hexdec( substr( $hex_color, 0, 1 ) . substr( $hex_color, 0, 1 ) );
			$g = hexdec( substr( $hex_color, 1, 1 ) . substr( $hex_color, 1, 1 ) );
			$b = hexdec( substr( $hex_color, 2, 1 ) . substr( $hex_color, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex_color, 0, 2 ) );
			$g = hexdec( substr( $hex_color, 2, 2 ) );
			$b = hexdec( substr( $hex_color, 4, 2 ) );
		}
		$rgb = $r . ',' . $g . ',' . $b;

		if ( '' == $opacity ) {
			return $rgb;
		} else {
			$opacity = floatval( $opacity );

			return 'rgba(' . $rgb . ',' . $opacity . ')';
		}
	}
}


if ( ! function_exists( 'codexin_adjust_color_brightness' ) ) {
	/**
	 * Helper function to adjust brightness of a color
	 *
	 * @param   string $hex_color        The color code in hexadecimal
	 * @param   float  $percent_adjust   The percentage we want to lighten/darken the color
	 * @return  string
	 * @since   v1.0
	 */
	function codexin_adjust_color_brightness( $hex_color, $percent_adjust = 0 ) {
		$percent_adjust = round( $percent_adjust / 100, 2 );
		$hex            = str_replace( '#', '', $hex_color );

		$r = ( strlen( $hex ) == 3 ) ? hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) ) : hexdec( substr( $hex, 0, 2 ) );
		$g = ( strlen( $hex ) == 3 ) ? hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) ) : hexdec( substr( $hex, 2, 2 ) );
		$b = ( strlen( $hex ) == 3 ) ? hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) ) : hexdec( substr( $hex, 4, 2 ) );
		$r = round( $r - ( $r * $percent_adjust ) );
		$g = round( $g - ( $g * $percent_adjust ) );
		$b = round( $b - ( $b * $percent_adjust ) );

		$new_hex = '#' . str_pad( dechex( max( 0, min( 255, $r ) ) ), 2, '0', STR_PAD_LEFT )
			. str_pad( dechex( max( 0, min( 255, $g ) ) ), 2, '0', STR_PAD_LEFT )
			. str_pad( dechex( max( 0, min( 255, $b ) ) ), 2, '0', STR_PAD_LEFT );

		return codexin_sanitize_hex_color( $new_hex );
	}
}


if ( ! function_exists( 'codexin_header_tracking_code' ) ) {
	/**
	 * Add advanced tracking code to header
	 *
	 * @uses    add_action()
	 * @since   v1.0
	 */
	function codexin_header_tracking_code() {
		$advanced_tracking_code = codexin_get_option( 'cx_advanced_tracking_code' );

		if ( $advanced_tracking_code ) {
			printf( '%s', $advanced_tracking_code );
		}
	}
	add_action( 'wp_head', 'codexin_header_tracking_code', 999 );
}



// Removing width & height from featured image
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
	return $html;
}



// removes query strings from static resources
// add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
// add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
function _remove_script_version( $src ) {
	$parts = explode( '?ver', $src );
	return $parts[0];
} // _remove_script_version ( $src )



add_filter( 'widget_text', 'do_shortcode' );


// suport svg upload
// add SVG to allowed file uploads
function add_file_types_to_uploads( $file_types ) {

	 $new_filetypes        = array();
	 $new_filetypes['svg'] = 'image/svg';
	 $file_types           = array_merge( $file_types, $new_filetypes );

	 return $file_types;
}
add_action( 'upload_mimes', 'add_file_types_to_uploads' );



// get attachment meta
if ( ! function_exists( 'wp_get_attachment' ) ) {
	function wp_get_attachment( $attachment_id ) {
		$attachment = get_post( $attachment_id );
		return array(
			'alt'         => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
			'caption'     => $attachment->post_excerpt,
			'description' => $attachment->post_content,
			'href'        => get_permalink( $attachment->ID ),
			'src'         => $attachment->guid,
			'title'       => $attachment->post_title,
		);
	}
}

// post thumbnail alt text
if ( ! function_exists( 'cx_get_thumbnail_alt_text' ) ) {

	function cx_get_thumbnail_alt_text( $post_ID ) {
		$thumbnail_id = get_post_thumbnail_id( $post_ID );
		$alt          = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
		// the_post_thumbnail( 'full', array( 'alt' => $alt ) );
		return $alt;
	}
}





if ( ! function_exists( 'codexin_char_limit' ) ) {
	/**
	 * Helper Function to limit the character length without breaking any word
	 *
	 * @param   int    $limit     The number of character to limit
	 * @param   string $type      The type of content (possible values: title/excerpt)
	 * @return  mixed
	 * @since   v1.0
	 */
	function codexin_char_limit( $limit, $type ) {
		$content = ( $type == 'title' && $type !== 'excerpt' ) ? get_the_title() : get_the_excerpt();
		$limit++;

		if ( mb_strlen( $content ) > $limit ) {
			$subex   = mb_substr( $content, 0, $limit );
			$exwords = explode( ' ', $subex );
			$excut   = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
			} else {
				return $subex;
			}
			echo '...';
		} else {
			return $content;
		}
	}
}




function defer_parsing_js( $url ) {
	// Add the files to exclude from defer. Add jquery.js by default
	$exclude_files = array( 'jquery.js' );
	// Bypass JS defer for logged in users
	if ( ! is_user_logged_in() ) {
		if ( false === strpos( $url, '.js' ) ) {
			return $url;
		}

		foreach ( $exclude_files as $file ) {
			if ( strpos( $url, $file ) ) {
				return $url;
			}
		}
	} else {
		return $url;
	}
	return "$url' defer='defer";

}
// add_filter('clean_url', 'defer_parsing_js', 11, 1);


add_filter( 'body_class', 'browser_body_class' );
function browser_body_class( $classes ) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if ( $is_lynx ) {
		$classes[] = 'lynx';
	} elseif ( $is_gecko ) {
		$classes[] = 'gecko';
	} elseif ( $is_opera ) {
		$classes[] = 'opera';
	} elseif ( $is_NS4 ) {
		$classes[] = 'ns4';
	} elseif ( $is_safari ) {
		$classes[] = 'safari';
	} elseif ( $is_chrome ) {
		$classes[] = 'chrome';
	} elseif ( $is_IE ) {
		$classes[] = 'ie';
	} else {
		$classes[] = 'unknown';
	}
	if ( $is_iphone ) {
		$classes[] = 'iphone';
	}
	return $classes;
}



function custom_body_classes_for_browser($classes)
{
    // the list of WordPress global browser checks
    // https://codex.wordpress.org/Global_Variables#Browser_Detection_Booleans
    $browsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_NS4', 'is_opera', 'is_macIE', 'is_winIE', 'is_gecko', 'is_lynx', 'is_IE', 'is_edge'];

    // check the globals to see if the browser is in there and return a string with the match
    $classes[] = join(' ', array_filter($browsers, function ($browser) {
        return $GLOBALS[$browser];
    }));

    return $classes;
}

// call the filter for the body class
add_filter('body_class', 'custom_body_classes_for_browser');
