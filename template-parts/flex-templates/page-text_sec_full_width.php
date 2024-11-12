<?php 
/**
 * Renders full width text section
 */

$anchor = str_replace(' ','-',strtolower(get_sub_field('anchor_id')));
$text_sec_full_bg = get_sub_field('background_color');
$disclaimer = get_sub_field('disclaimer');
$full_width_text_area = get_sub_field('full_width_text_area');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
$cta_group = get_sub_field('cta');
$cta_link = $cta_group['cta_link'];
$button_color = $cta_group['button_color_picker'];
$heading_color = get_sub_field('heading_color');

$text_sec_full_bg_class="bg-w";
$button_bg_class="bg-1";



if ( $text_sec_full_bg ) {
    $bg_color_num = get_color_num($text_sec_full_bg);
    $text_sec_full_bg_class = "bg-$bg_color_num";    
} 

if ( $button_color ) {
    $button_bg_color_num = get_color_num($button_color);
    $button_bg_class = "bg-$button_bg_color_num";
}


?>

<section class="full-width-text-section <?php echo $text_sec_full_bg_class ?>" <?php if ($anchor) echo "id=$anchor" ?>>

    <div class="full-width-text" style="color:<?php echo $heading_color ?>">

    <?php echo $full_width_text_area ?>
    <?php if ( $disclaimer) : ?>
        <p class="disclaimer"><?php echo $disclaimer ?></p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
    <?php endif;?>
    
    <?php if ( $cta_link == true ) : ?>
        <div class="text-section-button <?php echo $button_bg_class ?>">
            <a aria-label="<?php echo $cta_group['accessibility_text']; ?>" href=<?php echo $cta_link['url'];?>>
                <?php echo $cta_link['title'] ;?>
            </a>
        </div>
      <?php endif;?>
    </div>

</section>