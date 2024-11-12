<?php
/**
 * Renders the video media
 */
$video = $args['media']['video'];
$mp4vid = $video['mp4'];
$webmvid = $video['webm'];
$layout = $video['layout'];
$described_by_prefix = $args['described_by_prefix'];
$poster = $video['poster'];
$mobile_video = $args['media']['mobile_video'];
$mp4vid_small = $mobile_video['mp4'];
$webmvid_small = $mobile_video['webm'];

$video_meta = ['width' => '', 'height' => ''];
if ($mp4vid) {
	$video_meta = wp_get_attachment_metadata($mp4vid);
}
$small_video_meta = [ 'width' => '', 'height' => ''];
if (false == empty($mp4vid_small)) {
  $small_video_meta = wp_get_attachment_metadata($mp4vid_small);
}

// $hero_text = $video['hero_text'];
// $cta_group = $video['cta'];

// echo "<pre>";
// var_dump($cta_group);
// echo "</pre>";
// die();

// var_dump($video_meta);

?>

<?php if ( $layout == 'background' ) : ?>

  <div class="video-control-button-container">
    <button class="video-control-button" aria-label="pause">
      <?php get_template_part('template-parts/svg/play.svg'); ?>
      <?php get_template_part('template-parts/svg/pause.svg'); ?>
    </button>
  </div>  

<video 
  class="ca-video hero-background-video"
  autoplay loop muted playsinline 
  aria-describedby="<?php echo $described_by_prefix; ?>video-description"
  poster="<?php echo wp_get_attachment_image_url($poster, 'full'); ?>"
	width="<?php echo $video_meta['width']; ?>"
	height="<?php echo $video_meta['height']; ?>"
	data-small-width="<?php echo $small_video_meta['width']; ?>"
	data-small-height="<?php echo $small_video_meta['height']; ?>"
	role="presentation"

>

<?php else: ?>

<video 
  class="ca-video hero-background-video"
  loop playsinline
  poster="<?php echo wp_get_attachment_image_url($poster, 'full'); ?>"
	width="<?php echo $video_meta['width']; ?>"
	height="<?php echo $video_meta['height']; ?>"
	loop playsinline 
	<?php if ($poster) : ?>
		poster="<?php echo wp_get_attachment_image_url($poster, 'full'); ?>"
	<?php endif; ?>
>

<?php endif; ?>

  <?php if (false == empty($webmvid)) : ?>
  <source 
    type="video/webm"
    data-src="<?= $webmvid ?>" 
    <?php if (false == empty($webmvid_small)) : ?>
			data-src-small="<?php echo wp_get_attachment_url($webmvid_small); ?>"
		<?php endif; ?>
  >
  <?php endif; ?>
  <?php if (false == empty($mp4vid)) : ?>
    <source 			
      type="video/mp4"
			src="<?php echo wp_get_attachment_url($mp4vid); ?>" 
			<?php if (false == empty($mp4vid_small)) : ?>
			  data-src-small="<?php echo wp_get_attachment_url($mp4vid_small); ?>"
			<?php endif; ?>
    >
  <?php endif; ?>
  Your browser does not support HTML5 video
</video>

