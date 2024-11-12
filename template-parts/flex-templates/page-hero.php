<?php
/**
 * Template part for displaying the Hero Layout
 */

/*** 
 * Hero Content tab */ 
$hero_content = get_sub_field('hero_content');
$anchor_id = get_sub_field('anchor_id');
$hero_type = get_sub_field('type_hero');
$h1_text = get_sub_field('h1_text');
$radio_option = get_sub_field('move_left_right');
$cta_group = get_sub_field('cta');
$cta_link_click = $cta_group['cta_link'];
$cta_url = $cta_link_click['url'] ?? null;
$cta_text = $cta_link_click['title'] ?? null;
$cta_target = $cta_link_click['target'] ?? null ? $cta_link_click['target'] : '_self';
$cta_accessibility_text = $cta_link_click['accessibility_text'] ?? null;
$button_color = $cta_group['button_color_picker'];
// $cta_blank = 'Link opens in a new tab';
if($cta_target == '_blank') {
  $cta_title = "title='Link opens in a new tab'";
} else {
  $cta_title = "";
}


/**
 * Hero Setting
 */
$hero_settings = get_sub_field('media_options');
$hero_image_group = $hero_settings['background_image'];
$hero_image = $hero_image_group['hero_image'];
$hero_image_position = $hero_image_group['background_position'];
$media_type = $hero_settings['media_type'];

$video_description = $hero_settings['video_description'];
if (empty($video_description)) {
  $video_description = 'silent montage of stock video';
}
$described_by_prefix = '';
if (false == empty($anchor_id)) {
  $described_by_prefix = $anchor_id . '-';
}

/** 
 * Internal Parallax */

$parallax_image = get_sub_field('parallax_image');


/** 
 * Hero Popup 
 * */

$hero_popup = get_sub_field('hero_popup');
$hero_popup_bg = $hero_popup['background_color'];
$hero_popup_image = $hero_popup['hero_popup_image'];



if ( $hero_popup_bg ) {
  $bg_color_num = get_color_num($hero_popup_bg);
  $hero_popup_bg_class = "bg-$bg_color_num";    
} 

if ( $button_color ) {
  $button_bg_color_num = get_color_num($button_color);
  $button_bg_class = "bg-$button_bg_color_num";
}

if ($radio_option =='"Right"') {
	$right_line_class = "hero-line-right"; 

};



?>


<?php
    $obj_pos_styles = array('horiz' => 'center', 'vert' => 'center');
    if ( !empty($hero_image_position['horizontal']) ) {
      $obj_pos_styles['horiz'] = $hero_image_position['horizontal'];
    }
    if ( !empty($hero_image_position['vertical']) ) {
      $obj_pos_styles['vert'] = $hero_image_position['vertical'];
    }
    $obj_pos_styles = "object-position:" . implode(" ", $obj_pos_styles) . ";";
 ?>



<?php if($parallax_image) : ?>
<section <?php maybe_anchor($anchor_id); ?> class="hero-section parallax" style="background-image: url(<?php echo $parallax_image ?>);">

</section>
<?php else : ?>

<section <?php maybe_anchor($anchor_id); ?> class="hero-section">
  <div class="hero__background-media <?php echo $hero_type?>" style="<?= $obj_pos_styles; ?>">
    <?php 
      get_template_part( 'template-parts/media-types/media', 
      $media_type, 
      ['media' => $hero_settings,
       'described_by_prefix' => $described_by_prefix]
    ); 
    ?>
    <?php if(!empty($video_description)) : ?>

      <div class="sr-only">
        <p id="<?php echo $described_by_prefix; ?>video-description" class="video-sr-transcript">
          <?php echo $video_description; ?>
        </p>
      </div>

    <?php endif; ?>

    <?php if($h1_text == true):?>

      <h1 class="screen-reader-text"><?php echo $h1_text; ?></h1>

    <?php endif; ?>

  </div><!--- hero__background-media ---> 

  <?php if ($hero_popup['hero_popup_header'] == true) : ?>      

    <div class="hero-popup-section <?php echo $hero_popup_bg_class; ?>">

      <?php if ($hero_popup_image == true) : ?> 

      <div class="feature-image">
        <?php echo srcset_full($hero_popup_image); ?>
      </div>
      
      <?php endif; ?>

      <div class="hero-text popup-title"><?php echo $hero_popup['hero_popup_header'];  ?> </div>
      <div class="hero-text popup-body"> <p><?php echo $hero_popup['hero_popup_text'];  ?> </p></div>
      
      <?php if ($cta_url == true) : 
        

        ?> 

      <div class="hero-popup-cta-wrapper <?php echo $button_bg_class; ?>">
        <a 
          href="<?php echo $cta_url ?>" 
          target="<?php echo esc_attr( $cta_target ); ?>"
          rel="noopener" 
          aria-label="<?php echo $cta_accessibility_text ?>"
         <?php echo $cta_title ?>
        >
          <?php echo $cta_text ?>
        </a>	
      </div> <!--- hero-popup-cta-wrapper --->

      <?php endif; ?>

    </div> <!--- hero-popup-section --->  

   <?php endif; ?>
   

  <?php endif; ?>	  <!--- end parallax image --->
</section>






