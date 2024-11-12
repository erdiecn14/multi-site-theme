<?php 
/**
 * Renders a WYSIWYG that we use to render copy and an image
 */

$anchor = str_replace(' ','-',strtolower(get_sub_field('anchor_id')));
$half_width_text = get_sub_field('half_width_text');
$featured_image = get_sub_field('half_width_image');
$background_color = get_sub_field('background_color');
$subhead_color = get_sub_field('subhead_color');
$cta_button = get_sub_field('cta');
$button_color = $cta_button['button_color_picker'];



if ($background_color){
    $bg_color_num = get_color_num($background_color);
    $color_bg_class = "bg-$bg_color_num";    
} 

if($button_color){
    $button_bg_color_num = get_color_num($button_color);
    $button_bg_class = "bg-$button_bg_color_num";
}

?>

<section class="image-text-50-50-section <?php echo $color_bg_class ?>" <?php if ($anchor) echo "id=$anchor" ?>>
    <div class="main-image">
      <?php srcset_full( $featured_image) ?>
    </div>

    <div class="copy-section">
        <div class="text-wysiwyg" style="color:<?php echo $subhead_color ?>;">
            <div>
                <?php echo $half_width_text ?>
            </div>
            <div class="text-button <?php echo $button_bg_class ?>">
                <a aria-label="<?php echo $cta_button['accessibility_text']; ?>" href="<?php echo $cta_button['cta_link']['url'];?>">
                    <?php echo $cta_button['cta_link']['title'] ;?>
                </a>
            </div>
         </div>
     </div>     

</section>