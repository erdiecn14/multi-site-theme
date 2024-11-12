<?php
/**
 * Template part for displaying map via shortcode
 */

$anchor_id = get_sub_field('anchor_id');
$map_shortcode = get_sub_field('map_shortcode');
$cta_group = get_sub_field('cta');

?>

<section class="map-section" <?php maybe_anchor($anchor_id); ?>>

<?php if ( false == empty($map_shortcode) ) : ?>
  <div class="cadv-map-container">
    <?php echo do_shortcode($map_shortcode); ?>
  </div>
  
<?php endif; ?>

</section>