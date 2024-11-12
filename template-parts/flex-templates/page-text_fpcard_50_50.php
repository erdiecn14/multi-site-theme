<?php 
/**
 * Renders a WYSIWYG, button and floorplan card 
 */

$anchor = str_replace(' ','-',strtolower(get_sub_field('anchor_id')));
$background_color = get_sub_field('background_color');
$left_text_area = get_sub_field('left_text_area');
$half_width_wysiwyg = $left_text_area['half_width_text'];
$fp_card_section_button = $left_text_area['fp_card_section_button'];
$button_color = $left_text_area['button_color_picker'];
$heading_color = $left_text_area['heading_color'];

$featured_floor_plans = get_sub_field('floor_plan_card');

$toggle_text_area = get_sub_field('toggle_text_field');
$featured_image = get_sub_field('half_width_image_field');

$right_pattern = get_field('right_background_pattern','options');

$background_color_class="bg-w";
$button_bg_class="bg-1";
$heading_color_class="h-1"; 

if ($background_color) {
  $bg_color_num = get_color_num($background_color);
  $background_color_class = "bg-$bg_color_num";    
} 
if ($heading_color) {
  $heading_color_num = get_color_num($heading_color);
  $heading_color_class = "h-$heading_color_num";    
} 
if ($button_color) {
  $button_bg_color_num = get_color_num($button_color);
  $button_bg_class = "bg-$button_bg_color_num";
}

?>

<section class="floorplan-section <?php echo $background_color_class ?>" <?php if ($anchor) echo "id=$anchor" ?>>

  <div class="left-side-group">
    <div class="half-width-wysiwyg" >
      <div class="<?php echo $heading_color_class ?>">
          <?php echo $half_width_wysiwyg?>
      </div>
    </div>
    <div class="fp-section-button <?php echo $button_bg_class ?>" aria-label="<?php echo $left_text_area['accessibility_text'] ?>">
      <a href=<?php echo $fp_card_section_button['url'];?>>
          <?php echo $fp_card_section_button['title'] ;?>
      </a>
    </div>
  </div>

  <div class="right-side-group">

    <?php if ($right_pattern == true) : ?>
      <div class="background-pattern-right">
        <?php srcset_full($right_pattern); ?>
      </div>
    <?php endif; ?>

    <div class="card-fp featured-fp-card">  

      <?php foreach($featured_floor_plans as $floor_plans) : ?>    

        <div class="fp-cards floor-plan">
          <div class="fp-info">
            <div class="fp-title">
              <h3><?php echo $floor_plans['fp_title'] ?></h3>
            </div> 

            <div class="fp-bedroom-bathroom">
              <p><?php echo $floor_plans['fp_bedroom_bathroom'] ?></p>
            </div>

            <?php if (false === empty($floor_plans['fp_square_footage'])) : ?>
            <div class="fp-square-footage">
              <p><?php echo $floor_plans['fp_square_footage']; ?></p>
            </div>
            <?php endif; ?>
          </div>  
          
          <div class="fp-image">
            <a 
              class="cadv-lightbox-image" 
              href="<?php echo wp_get_attachment_url($floor_plans['fp_image']); ?>"
              aria-haspopup="true"
              title="open image in a lightbox"
            >
              <?php echo wp_get_attachment_image($floor_plans['fp_image'], 'full'); ?>
            </a>
          </div>
        </div>

      <?php endforeach; ?>  

    </div> 
  </div> 

</section>




</section>