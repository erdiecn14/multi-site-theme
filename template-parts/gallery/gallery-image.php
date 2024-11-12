<?php
/**
 * Renders an image gallery
 */
$gallery_group = $args['gallery_group'];
$gallery_id = str_replace(' ','-',strtolower($gallery_group['title']));
$gallery_images = $gallery_group['collection']['images'];

?>
<?php foreach ($gallery_images as $image_id) : 
    $gallery_image_banner = get_field('gallery_image_banner', $image_id);
    ?>
  <li class="filterable gallery-image-card" data-filter-match="<?php echo $gallery_id; ?>">
    <a
      href="<?php echo wp_get_attachment_url( $image_id ); ?>"
      class="cadv-lightbox-gallery"
      aria-haspopup="true"
      title="open image in a lightbox"
    >
      <?php srcset_full($image_id); ?>
    </a>
    <?php if(false == empty($gallery_image_banner)) : ?>
      <h3 class="banner-text"><?php echo $gallery_image_banner ?></h3>
    <?php endif; ?>
  </li>
<?php endforeach; ?>