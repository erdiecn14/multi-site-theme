<?php 
/**
 * Renders 50/50 text sections on desktop; stacks on mobile
 */

$anchor = str_replace(' ','-',strtolower(get_sub_field('anchor_id')));
$section_heading = get_sub_field('section_heading');
$left_text_area = get_sub_field('left_text_area');
$right_text_area = get_sub_field('right_text_area');
$text_sec_bg = get_sub_field('background_color');
$heading_color = get_sub_field('heading_color');
$heading_color_right = get_sub_field('heading_color_right');
$text_sec_bg_class= "bg-w";
$heading_color_class= "h-1";
$heading_color_class_right="h-1";


if ($text_sec_bg){
    $bg_color_num = get_color_num($text_sec_bg);
    $text_sec_bg_class = "bg-$bg_color_num";    
} 

if($heading_color){
   $heading_color_num = get_color_num($heading_color);
   $heading_color_class = "h-$heading_color_num";
}

if($heading_color_right){
  $heading_color_num = get_color_num($heading_color_right);
  $heading_color_class_right = "h-$heading_color_num";
}

?>

<section class="fifty-fifty-text-section <?php echo $text_sec_bg_class; ?>" <?php if ($anchor) echo "id=$anchor" ?>>
	<div class="content-container">
		<?php if (false == empty($section_heading['heading'])) : ?>
		<div class="section-heading">
			<?php echo $section_heading['heading']; ?>
		</div>
		<?php endif; ?>
		<div class="lg-cols-gt-1 dual-text">

			<div class="left-text <?php echo $heading_color_class ?>">
				<?php echo $left_text_area ?>
			</div>
		
			<div class="right-text <?php echo $heading_color_class_right ?>">
				<?php echo $right_text_area ?>
			</div> 
		</div>
  </div>
</section>