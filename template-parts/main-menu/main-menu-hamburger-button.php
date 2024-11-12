<?php
/**
 * Spits out the hamburger button with the correct id for aria-controls 
 */

$menu_ids = $args['menu_ids'];

?>
<button id="primary-nav-toggle" class="menu-toggle" aria-controls="<?= $menu_ids ?>" aria-controls="primary-menu"  aria-expanded="false">
  <span class="sr-only"><?php esc_html_e( 'Primary Menu', 'cadv-community' ); ?></span>
  <span class="hamburger-svg menu__burger">
    <?php get_template_part('template-parts/main-menu/main-menu','hamburger.svg'); ?>
  </span>
</button>