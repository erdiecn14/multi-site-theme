<?php
/**
 * Renders an image gallery
 */
$gallery_group = $args['gallery_group'];
$gallery_id = str_replace(' ','-',strtolower($gallery_group['title']));
$tour_popup = $gallery_group['collection']['tours_popup'];
?>
<?php foreach ($tour_popup as $tour_info) : ?>
  <li class="filterable gallery-image-card" data-filter-match="<?php echo $gallery_id; ?>">
    <button class="tour-launcher" data-tour-src="<?php echo $tour_info['tour_src']; ?>">
        <?php echo wp_get_attachment_image($tour_info['placeholder'], 'full'); ?>
    </button>
  </li>
<?php endforeach; ?>