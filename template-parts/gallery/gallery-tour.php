<?php
/**
 * Renders an image gallery
 */
$gallery_group = $args['gallery_group'];
$gallery_id = str_replace(' ','-',strtolower($gallery_group['title']));
$gallery_tour_embeds = $gallery_group['collection']['tours'];
?>
<?php foreach ($gallery_tour_embeds as $tour) : $tour_embed = $tour['tour_code']; ?>
  <li class="filterable gallery-tour-card" data-filter-match="<?php echo $gallery_id; ?>">
    <div class="gallery-tour-wrapper">
      <?php echo $tour_embed; ?>
    </div>
  </li>
<?php endforeach; ?>