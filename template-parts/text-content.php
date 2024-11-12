<?php
/**
 * Renders a standard group of copy consisting of a header and body with optional cta
 */
$content = $args['content'];
$header = $content['header'];
$body = $content['body'];
$cta = $content['cta'];
$cta_color = !empty($content['color']) ? $content['color'] : '2';
?>

<header>
<?php if ($header['is_seo_copy']) : ?>
  <h1><?= $header['main_heading']; ?></h1>
<?php else : ?>
  <h2><?= $header['main_heading']; ?></h2>
<?php endif; ?>
<?php if ( $header['subheading'] ) : ?>
  <p><?= $header['subheading'] ?></p>
<?php endif; ?>
</header>

<?php echo $body ?>

<?php if ( !empty( $cta['cta_link'] ) ) : ?>
  <?php get_template_part('template-parts/cta','',['cta' => $cta, 'color' => $cta_color]); ?>
<?php endif; ?>

