<?php


/**
 * Turn a gallery into a slick slider
 */
function acf_gallery_to_slick($atts) {
  ob_start();
  $field = $atts['field'];
  $slider_class = get_field('slick_class'); 
  $images = get_field($field);
  $slider_html = "";
  if ($images) { 
    $slider_html .= "<div class='$slider_class'>";
    foreach ($images as $image) {  
      $slider_html .= "<div class='slider-img'>";
      $slider_html .= wp_get_attachment_image( $image['ID'], 'full' ); 
      wp_get_attachment_image( $image['ID'], 'full' ); 
      $slider_html .= "</div>";
    } 
    $slider_html .= "</div>";
  }
  echo $slider_html;
  return ob_get_clean();
}
add_shortcode( 'slick-acf', 'acf_gallery_to_slick' );


// Shortcode [apply-now] for adding "Apply Now" button to a page
function apply_now_button($atts) {
  $atts = shortcode_atts(
    array('color' => '2'),
    $atts, 'apply-now'
  );
  $color = $atts['color'];
  $apply_now_link = get_field('apply_now','option');
  return "<a href='$apply_now_link' target='_blank' rel='noopener' class='button--$color'>Apply Now</a>";
}
add_shortcode('apply-now','apply_now_button');

// Shortcode [resident-portal] for adding "Resident Access" button to a page
function resident_portal_button($atts) {
  $atts = shortcode_atts(
    array('color' => '2'),
    $atts, 'resident-portal'
  );
  $color = $atts['color'];
  $resident_link = get_field('resident_portal','option');
  return "<a href='$resident_link' target='_blank' rel='noopener' class='button--$color'>Resident Access</a>";
}
add_shortcode('resident-portal','resident_portal_button');

/**
 * MISC SHORTCODES
 */


/**
*   "Buttons" - links that look like buttons
*/

function button_w_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--w' href='$link'>$content</a>";
}
add_shortcode('button-w','button_w_shortcode');

function button_1_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--1' href='$link'>$content</a>";
}
add_shortcode('button1','button_1_shortcode');

function button_2_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--2' href='$link'>$content</a>";
}
add_shortcode('button2','button_2_shortcode');

function button_3_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--3' href='$link'>$content</a>";
}
add_shortcode('button3','button_3_shortcode');

function button_4_shortcode($atts = [], $content = null) {
  $link = $atts['link'];
  return "<a class='button--4' href='$link'>$content</a>";
}
add_shortcode('button4','button_4_shortcode');

function cadv_small_text($atts, $content=null) {
  return "<span class='small-text-sc'>$content</span><br/>";
}
add_shortcode('sm','cadv_small_text');

function cadv_large_text($atts, $content=null) {
  return "<span class='large-text'>$content</span><br/>";
}
add_shortcode('lg','cadv_large_text');



//Togglize Shortcode
function togglize_shortcode($atts = [], $content = null) {
  $stray_closing_p = array('/^<\/p>/i', '/<p>$/i');
  $content = preg_replace($stray_closing_p, '', $content);
  $adaptive_height = "false";
  $first_open = "true";
  $atts = shortcode_atts(
    array(
    'action' => 'accordion',
    'adaptive_height' => false,
    'first_open' => true,
  ),
  $atts,
  'toggles'
  ); 

  if ($atts['first_open'] == false) {
    $first_open = "false";
  }
  if ($atts['adaptive_height'] == true) {
    $adaptive_height = "true"; 
  }
  if ($atts['action'] == 'toggle') {
    return "<div class='togglize-me' data-adapt-height='$adaptive_height' data-first-open='$first_open'>" . $content . "</div>";
  }
  if ($atts['action'] == 'accordion') {
    return "<div class='accordionize-me' data-adapt-height='$adaptive_height' data-first-open='$first_open'>" . $content . "</div>";
  }
}
add_shortcode('toggles','togglize_shortcode');

function make_call_out_text( $atts, $content ) {
  $text_chunks = array_values(array_filter(preg_split('/\r\n|\r|\n/',wp_strip_all_tags($content))));  
  $small_text = '<span class="small-text">' . $text_chunks[0] . '</span>';
  $big_text = '<span class="big-text">' . $text_chunks[1] . '</span>';
  return "<figure class='call-out-text' role='presentation'>" . $small_text .'<br/>'. $big_text . "</figure>"; 
}
add_shortcode('call-out', 'make_call_out_text');

function make_two_column_content( $atts, $content ) {
  $stray_closing_p = array('/^<\/p>/i', '/<p>$/i');
  $content = preg_replace($stray_closing_p, '', $content);
  return "<div class='two-col-content'>" . $content . "</div>";
}
add_shortcode( 'two-cols', 'make_two_column_content' );