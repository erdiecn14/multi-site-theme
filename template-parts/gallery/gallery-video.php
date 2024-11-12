<?php
/**
 * Renders an image gallery
 */
$gallery_group = $args['gallery_group'];
$gallery_id = str_replace(' ','-',strtolower($gallery_group['title']));
$gallery_videos = $gallery_group['collection']['videos'];
?>
<?php foreach ($gallery_videos as $video) :  ?>
  <li class="filterable gallery-video-card" data-filter-match="<?php echo $gallery_id; ?>">
    <div class="gallery-video-wrapper">
      <video controls class="gallery-video" width="720">
        <source src="<?php echo $video['mp4_video']['url']; ?>" type="video/mp4">
        <source src="<?php echo $video['webm_video']['url']; ?>" type="video/webm">
        Your browser does not support HTML5 video
      </video>
    </div>
  </li>
<?php endforeach; ?>