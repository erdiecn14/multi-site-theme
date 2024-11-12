<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Add Partials
 */
require get_template_directory() . '/inc/acf-field-partials.php';

/**
* Add all flex layouts
*/

require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/testimonial-cards.php';

require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/hero.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/cta-menu.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/text-sec-50-50.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/text-sec-true-50-50.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/two-pane-gallery.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/text-sec-full-width.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/image-text-50-50.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/text-fpcard-50-50.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/map-section.php';
// require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/contact-section.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-gallery-page-fields.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/the-stacker.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-flex-layouts/full-width-image.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-fall-renewal-2022.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-cyber-monday-2022.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-spring-2023.php';
require get_template_directory() . '/inc/cadv-acf-fields/media-attachment-fields.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-springbreak-2023.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-summer-2023.php';



// ALL Pages Flexible Layouts 
$all_pages_content = new FieldsBuilder('all_pages_content',['position' => 'acf_after_title']);
$all_pages_content
  ->addFlexibleContent('sections',[
    'button_label' => 'Add Section',
  ])
    ->addLayout($hero)
    ->addLayout($cta_menu)
	  ->addLayout($text_sec_50_50)
    ->addLayout($text_sec_true_50_50)
    ->addLayout($two_pane_gallery)
    ->addLayout($text_sec_full_width)
    ->addLayout($toggle_image_50_50)
    ->addLayout($text_fpcard_50_50)
    ->addLayout($map_section)
    ->addLayout($testimonial_cards)
    ->addLayout($the_stacker)
    ->addLayout($full_width_image)
    ->setLocation('post_type', '==', 'page');
		 		
  add_action('acf/init', function() use ($all_pages_content) {
  acf_add_local_field_group($all_pages_content->build());
});

/**
 * Options Page Fields
 */
require get_template_directory() . '/inc/cadv-acf-fields/acf-community-options/contact-info-options-page.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-community-options/footer-options.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-community-options/all-pages-options.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-community-options/floorplan-options.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-community-options/theme-colors.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-community-options/specials-banner-options.php';
require get_template_directory() . '/inc/cadv-acf-fields/acf-community-options/form-options.php';


// Options Page

$theme_options = new FieldsBuilder('community_settings');
$theme_options
	->addFields($contact_info)
	->addFields($footer_options)
  ->addFields($floorplan_options)
  ->addFields($specials_banner_opts)
  ->addFields($theme_colors)
  ->addFields($form_options)
  
	->setLocation('options_page', '==', 'community-settings');
  
	add_action('acf/init', function() use ($theme_options) {
    acf_add_local_field_group($theme_options->build());
  });


//Side page options

// $all_pages_option = new FieldsBuilder('all_pages_options',['position' => 'side']);
// $all_pages_option 
//   ->addFields($all_pages_options)
//   ->setLocation('post_type', '==', 'page')
//   ->or('post_type', '==', 'post');

  
//   add_action('acf/init', function() use ($all_pages_options) {
//     acf_add_local_field_group($all_pages_options->build());
//   });
 

	
// Add Options Page to Default Post Type ACF Fields
acf_add_options_sub_page(array(
	'page_title' => 'Post Page Options',
	'menu_title' => 'Post Page Options',
	'menu_slug' => 'default-post-page-options',
	'parent_slug' => 'edit.php',
	'redirect'		=> false,
	'autoload'    => true
));

// Default Post Type ACF Fields
// $default_post_type = new FieldsBuilder('default_post_type');
// $default_post_type
// 	->addGroup('default_post_type',[
// 		'label' => 'Post Options',
// 	])
// 		->addFields($hero_internal)
// 		->addFields($section_heading_standalone)
// 	->endGroup()
// 	->setLocation('options_page', '==', 'default-post-page-options');

// 	add_action('acf/init', function() use ($default_post_type) {
// 	acf_add_local_field_group($default_post_type->build());
// });


