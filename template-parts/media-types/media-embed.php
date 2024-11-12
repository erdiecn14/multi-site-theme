<?php
/**
 * Renders the embedded media for flexible landing pages
 */
$embed = $args['media']['embed_video'];
// var_dump($args['media']);
?>

<div style="--aspect-ratio: 16/9; width:100%">
    <?php echo $embed; ?>
</div>

