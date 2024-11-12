<?php 
/**
 * Renders a WYSIWYG that we use to render copy and an image
 */

$anchor = str_replace(' ','-',strtolower(get_sub_field('anchor_id')));
$featured_image = get_sub_field('full_width_image');
?>

<section class="full-width-image" <?php if ($anchor) echo "id=$anchor" ?>>
    <div class="feature-image">
      <?php echo wp_get_attachment_image( $featured_image, 'full') ?>
    </div>
    

</section>