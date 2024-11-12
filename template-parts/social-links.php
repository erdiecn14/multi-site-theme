<?php
  $social = CONTACT['social_media'];
?>
<ul class="social-links">
  <?php if ( $social['facebook'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['facebook']; ?>" title="facebook">
    <?php get_template_part('template-parts/social/social','facebook.svg'); ?>
    <span class="sr-only">Facebook</span>
    </a>
  </li>
  <?php endif; ?>
  <?php if ( $social['instagram'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['instagram']; ?>" title="instagram">
    <?php get_template_part('template-parts/social/social','instagram.svg'); ?>
    <span class="sr-only">Instagram</span>
    </a>
  </li>
  <?php endif; ?>
  <?php if ( $social['twitter'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['twitter']; ?>" title="twitter">
    <?php get_template_part('template-parts/social/social','twitter.svg'); ?>
    <span class="sr-only">Twitter</span>
    </a>
  </li>
  <?php endif; ?>
  <?php if ( $social['snapchat'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['snapchat']; ?>" title="snapchat">
    <?php get_template_part('template-parts/social/social','snapchat.svg'); ?>
    <span class="sr-only">Snapchat</span>
    </a>
  </li>
  <?php endif; ?>
  <?php if ( $social['tik_tok'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['tik_tok']; ?>" title="Tik Tok">
    <?php get_template_part('template-parts/social/social','tik-tok.svg'); ?>
    <span class="sr-only">Tik Tok</span>
    </a>
  </li>
  <?php endif; ?>
  <?php if ( $social['youtube'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['youtube']; ?>" title="YouTube">
    <?php get_template_part('template-parts/social/social','youtube.svg'); ?>
    <span class="sr-only">YouTube</span>
    </a>
  </li>
  <?php endif; ?>
</ul>