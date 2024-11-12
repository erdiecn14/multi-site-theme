<?php 
/**
 * Renders a Two pane gallery 
 */

$anchor = str_replace(' ','-',strtolower(get_sub_field('anchor_id')));
$big_image_two_pane = get_sub_field('big_image_two_pane');
$small_image_two_pane = get_sub_field('small_image_two_pane');
$gradient_bg = get_sub_field('linear_background_colors');
$gradient_bg_1 = $gradient_bg['color_1'];
$gradient_bg_2 = $gradient_bg['color_2'];
$page_side = get_sub_field('move_left_right');

$gradient_1_bg_class="bg-7";
$gradient_2_bg_class="bg-1";

$right_pattern = get_field('right_background_pattern','options');


if ($gradient_bg_1){
  $bg_color_num = get_color_index($gradient_bg_1);
  $gradient_1_bg_class = "bg-$bg_color_num";    
}
if ($gradient_bg_2){
  $bg_color_num = get_color_num($gradient_bg_2);
  $gradient_2_bg_class = "bg-$bg_color_num";    
}   ?>


<section class="two-pane-gallery <?php echo $gradient_1_bg_class, $gradient_2_bg_class?> <?php echo $page_side?>">
    <?php if($right_pattern == true) : ?>
          <div class="background-pattern-right">
            <?php srcset_full($right_pattern); ?>
          </div>
        <?php endif; ?>
<div class="row <?php echo $page_side?>" data-sal="slide-left" data-sal-duration="1200" >
    <div class="big-image" >
        <?php srcset_full($big_image_two_pane); ?>
      </div>
    <div class="small-image">
       <?php srcset_full($small_image_two_pane); ?>
      </div>
  </div>
</section>
