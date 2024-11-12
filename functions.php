<?php
/**
 * CADV Student Community functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CADV_Student_Community
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists('lyst_log') ) {
  function lyst_log ( $log ) {
    if ( is_array( $log ) || is_object( $log ) ) {
      error_log( print_r( $log, true) );
    } else {
      error_log( $log );
    }
  }
}

/**
 * Set lower priority for auto processing content in ACF WYSIWGY so it happens 
 * after shortcodes are processed.
 * This allows shortcodes to be on their own line without wpautop adding additional
 * empty <p></p> tags. 
 */
function acf_lower_wysiwyg_autop_priority() {
  remove_filter( 'acf_the_content', 'wpautop' );
  add_filter( 'acf_the_content', 'wpautop', 12 );
}
// add_action( 'acf/init','acf_lower_wysiwyg_autop_priority', 15 );


if ( ! function_exists( 'cadv_community_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cadv_community_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CADV Student Community, use a find and replace
		 * to change 'cadv-community' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cadv-community', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'cadv-community' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'cadv_community_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'cadv_community_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cadv_community_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cadv_community_content_width', 640 );
}
add_action( 'after_setup_theme', 'cadv_community_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cadv_community_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cadv-community' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cadv-community' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cadv_community_widgets_init' );

/**
 *-------------------------------------------------------------------------------- 
 * --- CUSTOM POST TYPES ---
 *-------------------------------------------------------------------------------- 
 */


/***********************************************************************************/

/**
 *-------------------------------------------------------------------------------- 
 * --- ADVANCED CUSTOM FIELDS ---
 *-------------------------------------------------------------------------------- 
 */

// Load Composer’s autoloader
require_once (__DIR__ . '/vendor/autoload.php');

 
/* Allow shortcodes in ACF textarea fields */
add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('acf/format_value/type=text', 'do_shortcode');

/* Create Options Pages */

if( function_exists('acf_add_options_page') ) {
	
  acf_add_options_page(array(
		'page_title' 	=> 'Community Settings',
		'menu_title'	=> 'Community Settings',
		'menu_slug' 	=> 'community-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
  ));
	
}


/**
 * Populate ACF select field options with Gravity Forms forms
 * Field Name must be gform_picker
 * Field Type must be select
 * https://www.advancedcustomfields.com/resources/acf-load_field/
 */
function acf_populate_gf_forms_ids( $field ) {
	if ( class_exists( 'GFFormsModel' ) ) {
		$choices = [];

		foreach ( \GFFormsModel::get_forms() as $form ) {
			$choices[ $form->id ] = $form->title;
		}

		$field['choices'] = $choices;
	}

	return $field;
}
add_filter( 'acf/load_field/name=gform_picker', 'acf_populate_gf_forms_ids' );


/***********************************************************************************/


/**
 *-------------------------------------------------------------------------------- 
 * --- MISC CONTENT FILTERS ---
 *-------------------------------------------------------------------------------- 
 */

/**
 * Filter YouTube oembed url to add rel=0 so it doesn't show rando videos
 * also adds the url param to allow the Youtube iframe api
 */
function no_youtube_randos( $html, $url, $args ) {
  if ( strpos( $html,'youtube' ) !== false || strpos($html,'youtu.be') !== false ) {
    $args = [
      'rel' => 0,
      'showinfo' => 0,
      'modestbranding' => 1,
      'enablejsapi' => 1
    ];
    $params = '?feature=oembed&';
    foreach ( $args as $arg => $val ) {
      $params .= "$arg=$val&";
    }
    $html = str_replace( '?feature=oembed', $params, $html );
  }
  return $html;
}
add_filter( 'oembed_result', 'no_youtube_randos', 10, 3 );

/**
 * Menu Filters
 */

// Change all menu Apply Now links to the url for Apply Now in the Community Settings.
// NOTE: the link title attribute must be "application portal"
function menu_apply_now_change($menu_objects, $args) {
  $apply_now_url = get_field('leasing_portal_link','option');
  // lyst_log('leasing portal link: ');
  // lyst_log($apply_now_url);
  if ( !empty($apply_now_url) ) {
    foreach ( $menu_objects as $menu_item ) {
      if ($menu_item->attr_title == 'application portal') {
        $menu_item->url = $apply_now_url;
      }
    }
  }
  return $menu_objects;
}
add_filter('wp_nav_menu_objects','menu_apply_now_change', 10, 2);

function menu_residents_change($menu_objects, $args) {
  $residents_url = get_field('residents_link','option');
  if ( !empty($residents_url) ) {
    foreach ( $menu_objects as $menu_item ) {
      if ($menu_item->attr_title == 'residents portal') {
        $menu_item->url = $residents_url;
      }
    }
  }
  return $menu_objects;
}
// add_filter('wp_nav_menu_objects','menu_residents_change', 10, 2);

/**
 * Leasing Content Filter
 */
 // exclude specific leasing related pages from sitemaps if leasing is disabled 
//  if ( ! LEASING_ACTIVE ) {
//   function exclude_active_leasing_only_pages_from_sitemaps() {
//     $specials_page = get_page_by_title('Specials');
//     return [ $specials_page->ID ];
//   }
//   add_filter('wpseo_exclude_from_sitemap_by_post_ids', 'exclude_active_leasing_only_pages_from_sitemaps');
// }

//Disable emojis in WordPress
add_action( 'init', 'cadv_disable_emojis' );
function cadv_disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'cadv_disable_emojis_tinymce' );
}

function cadv_disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
  return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
  return array();
 }
}

/**
 *-------------------------------------------------------------------------------- 
 * --- COMMUNITY CONSTANTS ---
 *-------------------------------------------------------------------------------- 
 */

// define( 'CONTACT', get_field('contact_info', 'option') );
// define( 'FOOTER_CONTENT', get_field('footer_content', 'option') );
// define( 'COMM_NAME', get_field('details_community_name', 'option') );
// define( 'LEASING_ACTIVE', get_field('leasing_active', 'option') );
/***********************************************************************************/

/**
 *-------------------------------------------------------------------------------- 
 * --- ENQUEUE SCRIPTS & STYLES ---
 *-------------------------------------------------------------------------------- 
 */
function cadv_community_scripts() {
	wp_enqueue_style( 'cadv-community-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css') );
	wp_style_add_data( 'cadv-community-style', 'rtl', 'replace' );

  // consolidated JS file (via webpack)
  wp_register_script( 'cadv-community-main-js', 
    get_template_directory_uri() . '/prod/js/cadv-community-main.min.js', 
    array( 'jquery' ), 
    filemtime(get_template_directory() . '/prod/js/cadv-community-main.min.js'), 
    true 
  );
  wp_enqueue_script( 'cadv-community-main-js' );
  
  // Add banner config data object to front end
  $specials_banner_config = json_encode(get_field('specials_banner_config', 'option'));
  wp_add_inline_script( 
    'cadv-community-main-js', 
    'const specialsBannerConfig = ' . $specials_banner_config, 
    'before' 
  );
  
//   wp_enqueue_script( 'cadv-navigation', get_template_directory_uri() . '/src/js/navigation.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'cadv_community_scripts' );

function cadv_community_admin_scripts() {
  wp_enqueue_style( 'cadv-community-admin-style', get_template_directory_uri() . '/admin/admin-styles.css' );
}
add_action( 'admin_enqueue_scripts', 'cadv_community_admin_scripts', 20 );

function cadv_remove_wp_block_library_css() {
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action('wp_enqueue_scripts', 'cadv_remove_wp_block_library_css', 100);

/***********************************************************************************/

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * MISC HELPER FUNCTIONS 
 *********************************************************************************/
require get_template_directory() . '/inc/cadv-helper-functions.php';

/**
 *  MISC Shortcodes
 *********************************************************************************/
require get_template_directory() . '/inc/cadv-shortcodes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Nav Walkers
 */
// require get_template_directory() . '/inc/cadv-navigation/top-nav-walker.php';
// require get_template_directory() . '/inc/cadv-navigation/footer-nav-walker.php'; 

/**
 * Lyst ACF Layouts
 */
require get_template_directory() . '/inc/cadv-acf-fields.php';


/**
 * Lyst ACF Layouts
 */
require get_template_directory() . '/inc/lyst-knock-rest.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 *-------------------------------------------------------------------------------- 
 *     ---- FORMS FUNCTIONALITY ----
 *-------------------------------------------------------------------------------- 
 */

/**
 * Gravity Wiz // Gravity Forms // Entry Count Shortcode
 *
 * Extends the [gravityforms] shortcode, providing a custom action to retrieve the total entry count and
 * also providing the ability to retrieve counts by entry status (i.e. 'trash', 'spam', 'unread', 'starred').
 *
 * @version	  1.0
 * @author    David Smith <david@gravitywiz.com>
 * @license   GPL-2.0+
 * @link      http://gravitywiz.com/...
 */
add_filter( 'gform_shortcode_entry_count', 'gwiz_entry_count_shortcode', 10, 2 );
function gwiz_entry_count_shortcode( $output, $atts ) {

    extract( shortcode_atts( array(
        'id' => false,
        'status' => 'total', // accepts 'total', 'unread', 'starred', 'trash', 'spam'
        'format' => false // should be 'comma', 'decimal'
    ), $atts ) );

    $valid_statuses = array( 'total', 'unread', 'starred', 'trash', 'spam' );

    if( ! $id || ! in_array( $status, $valid_statuses ) ) {
        return current_user_can( 'update_core' ) ? __( 'Invalid "id" (the form ID) or "status" (i.e. "total", "trash", etc.) parameter passed.' ) : '';
    }

    $counts = GFFormsModel::get_form_counts( $id );
    $output = rgar( $counts, $status );

    if( $format ) {
        $format = $format == 'decimal' ? '.' : ',';
        $output = number_format( $output, 0, false, $format );
    }

    return $output;
}


add_filter( 'gform_confirmation_anchor', '__return_true' );

/**
 *      FIRES THE FORM SUBMISSION EVENT FOR GTM
 */
add_filter( 'gform_confirmation', 'fire_form_submit_tracking', 10, 4 );
function fire_form_submit_tracking( $confirmation, $form, $entry, $ajax ) {
    if ( is_array( $confirmation ) ) {
        return $confirmation;
    } else {
        return $confirmation .= "<script>(function(){ window.dataLayer ? window.dataLayer.push({'event':'formConfirmed'}) : false; })();</script>";
    }
}

/**
 * REMOVE THE VISUAL EDITOR FROM GRAVITY FORMS NOTIFICATIONS
 * This is required so we don't accidentally remove formatting by clicking the visual tab
 */
add_action( 'admin_init', 'disable_tinymce_in_gf'); 
function disable_tinymce_in_gf() {
  if ( 
    ( 
      RGForms::is_gravity_page() 
      && rgget( 'page' ) == 'gf_edit_forms' 
      && rgget( 'view' ) == 'settings' 
    ) 
    && ( 
      rgget( 'subview' ) == 'notification' 
      || rgget( 'subview' ) == 'confirmation' 
    ) 
  )  {
    add_filter( 'user_can_richedit', '__return_false' );
 }
}

/**
 * ALTER FIELD VALUES FOR KNOCK NOTIFICATION
 * Note: the Knock lead email parser requires "null" for empty values
 * this function replaces empty values with "null" before sending the notification email
 * You cannot set the default field value to null in field settings because 
 * it would show up as placeholder text
 */
add_action('gform_pre_submission','set_nulls_for_knock');
function set_nulls_for_knock( $form ) {
  foreach( $_POST as $index => $field_val ) {
    if ( substr($index,0,5) == 'input' && empty($field_val) ) {
      $_POST[$index] = "null";
    }
  } 
}

/** 
 *    SET NOTIFICATION EMAIL BASED ON KNOCK SOURCE 
 */ 
add_filter( 'gform_notification', 'set_knock_source_email', 10, 3 ); 
function set_knock_source_email($notification, $form, $entry) { 
  if ( strtolower($notification['name']) == 'knock notification' ) { 
    $cadv_gf_settings = get_field('gf_settings', 'option');
    $knock_property = $cadv_gf_settings['knock_property_name']; 
    $other_recipients = $cadv_gf_settings['other_notification_recipients'];
    $knock_source = "w"; // default website source 
    // find field id for "Knock Source" via $form object 
    // https://docs.gravityforms.com/form-object/ 
    // get knock source from $entry using the "Knock Source" field id 
    // https://docs.gravityforms.com/entry-object/ 
    // the gravity forms $notification object
    // https://docs.gravityforms.com/notifications-object/
    $fields = $form['fields']; 
    $knock_source_field_index = array_search( "Knock Source", array_column($fields, "label") ); 

    // check if the knock source field even exists in case someone forgot to add it. 
    if ( false !== $knock_source_field_index ) { 
      $knock_source_field_id = $fields[$knock_source_field_index]['id']; 
      $knock_source = rgar( $entry, $knock_source_field_id ); 
    } 
    $notification['to'] = "$knock_property-$knock_source@m.knck.io"; 
    if (false == empty($other_recipients)) {
      $notification['bcc'] = $other_recipients;
    }
  } 
  return $notification; 
}


/*--------------------------------------------------------------------------------
*    ---- Specials Banner Integrated with Google Sheets ----
*--------------------------------------------------------------------------------*/
function add_lyst_banner() {
  if (is_front_page()) {
      $banner_sheet_key = "''";
      $banner_sheet_id = "''";
      $client_code = "'ASHC'";
      echo '<script type="text/javascript" src="https://thelyst.com/external/lyst-banner.js"></script>';
      echo "<script>window.lystBanner.init({'sheetKey':$banner_sheet_key,'sheetId':$banner_sheet_id,'clientCode':$client_code,'targetElement':'home-video'});</script>";
  }
}
// add_action( 'wp_footer', 'add_lyst_banner', 100 );


/// Color Picker Code for THEME COLORS
function get_color_index($color) {
	return strval( array_search(strtoupper($color),THEME_COLORS) + 1 );
  }


/**
 * Customize ACF Color Picker
 */  

 //CE: I have customized these colors 
 $cadv_community_theme_colors = ['#8E3944','#CFA544','#606060',"#343434","#122631","#343434","#FFFFFF","#000000",'#414141'];
 $input_theme_colors = get_field('theme_colors','option');
 
 
 $color_index = 0;
 foreach( $input_theme_colors as $color_num => $color ) {
   if ( !empty($color) ) {
     $cadv_community_theme_colors[$color_index] = $color;
   }
   $color_index++;
 }
 define( 'THEME_COLORS', $cadv_community_theme_colors );
 
 function lyst_custom_acf_color_picker() { ?>
   <script type="text/javascript">
   (function($){
	 acf.add_filter('color_picker_args', function(args,$field){
	   args.palettes = <?php array_to_js(THEME_COLORS); ?>;
	   return args;
	 });
   })(jQuery);
   </script>
 <?php
 }
 add_action('acf/input/admin_footer','lyst_custom_acf_color_picker');
 


