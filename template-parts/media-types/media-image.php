<?php 
/**
 * Renders the image media for flexible landing pages  
 */
$image_group = $args['media']['background_image'] ?? null;
$radio_option = $args['media']['move_left_right'] ?? null;
$image = $image_group['hero_image'];
$hero_text = $image_group['hero_text'] ?? null;
$cta_group = $image_group['cta'] ?? null;

?>

<?php
srcset_full($image);
?>



