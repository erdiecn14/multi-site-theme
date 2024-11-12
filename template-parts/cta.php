<?php
/**
 * Renders an accessible CTA
 */
$cta = $args['cta'];
$link = $cta['cta_link'];
$descrip = $cta['accessible_description'];
$cta_color = !empty($args['color']) ? $args['color'] : '2';
?>

<a 
class="button--<?= $cta_color ?>" 
href="<?= esc_url( $link['url'] ); ?>" 
<?php if ( $descrip ) : ?>
  aria-label="<?= $descrip; ?>"
<?php endif; ?>
>
  <?= esc_html( $link['title'] ); ?>
</a>
