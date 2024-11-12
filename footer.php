<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CADV_Student_Community
 */


// ACF Vars
$footer_options = get_field('footer_options', 'option');
$address_info = get_field('address_information', 'option');
$phone_number = get_field('phone_number', 'option');
$email = get_field('email', 'option');
$office_hours = get_field('office_hours', 'option');
$cta_footer = get_field('cta_contact', 'option');
$instagram_feed = get_field('instagram_feed', 'option');
$all_pages_options = get_field('custom_page_options');
$social_links = get_field('social_links', 'option');

$anchor_id = $footer_options['anchor_id'];
$bg_color = $footer_options['background_color'];
$footer_logo = $footer_options['footer_logo'];
// $copyright_info = $footer_options['copyright_info'];

$pet_friendly = $footer_options['pet_friendly'];


$contact_us = $cta_footer['contact_form'];
$contact_image = $cta_footer['contact_image'];
$select_form = $cta_footer['gform_picker'];

$allow_instagram = $all_pages_options['allow_instagram'] ?? null;
$allow_cta_footer = $all_pages_options['cta_footer'] ?? null;

$left_pattern = get_field('left_background_pattern','options');


if ($bg_color) {
	$bg_color_num = get_color_num($bg_color);
	$bg_class = "bg-$bg_color_num";
}


?>

<?php if ($allow_cta_footer == true) : ?>
	<aside class="contact-image-section" <?php maybe_anchor($anchor_id); ?>  aria-label="Contact Form">
		<?php if($left_pattern == true) : ?>
						<div class="background-pattern-left">
							<?php srcset_full($left_pattern); ?>
							</div>
				<?php endif; ?>
		<div class="featured-image">
			<div>
				<?php echo wp_get_attachment_image($contact_image, 'full') ?>
			</div>
		</div>
		<div class="contact-form">
			<div style="color:<?php echo $subhead_color ?>;">
				<?php echo $contact_us ?>
				<?php gravity_form($select_form, false, false, false, null, true); ?>
			</div>
		</div>
  </aside>
<?php endif; ?>

<?php if ($allow_instagram == true && !empty($social_links['instagram']['url']) && !empty($social_links['instagram']['title']) ) : ?>
	<aside class="instagram-addon <?php echo $bg_class; ?>" aria-labelledby="instagram-feed-heading">
    <div class="instagram-addon-container">
      <header class="instagram-header <?php echo $bg_class; ?>">
        <h2 id="instagram-feed-heading" class="instagram-heading">Follow Us <br/>On Instagram</h2>
        <a title="External link opens in new window" target="_blank" rel="noopener noreferrer" class="instagram-follow-button" href="<?= $social_links['instagram']['url']; ?>">
          <span class="sr-only">Visit our Instagram </span>
          @<?= $social_links['instagram']['title']; ?>
        </a>
      </header>
      <div class="instagram-feed">
        <?php echo $instagram_feed ?>
      </div>
    </div>
  </aside>
<?php endif; ?>

<footer id="colophon" class="site-footer <?php echo $bg_class; ?>">

	<div <?php maybe_anchor($anchor_id); ?> class="footer-main-section">
		<div class="footer-logo">
			<?= srcset_full($footer_logo); ?>
		</div>
		<div class="contact-info">
			<p class="footer-heading">Contact</p>
			<p><?= $address_info['street']; ?><br />
				<?= $address_info['city_state']; ?><br />
				<a href="tel:<?= clean_phone($phone_number); ?>"><?= $phone_number; ?></a><br />
				<a href="mailto:<?= $email ?>" class="email-strong"> Click here to email us</a>
			</p>
		</div>
		<div class="office-hours">
			<p class="footer-heading">Office Hours</p>
			<?= $office_hours ?>
		</div>
		<div class="social-links">
			<p class="footer-heading">Follow Us</p>
			<div class="social-icons">

				<?php if (!empty($social_links['facebook']['url'])) : ?>
					<a aria-label="visit our facebook page" title="Opens in new window" target="_blank" rel="noopener noreferrer" class="social-icon" href="<?= $social_links['facebook']['url']; ?>">
						<?php echo get_template_part("template-parts/svg/social-svg/social-circle-facebook.svg") ?>
					</a>
				<?php endif; ?>

					<!-- removed twiiter icon -->

				<?php if (!empty($social_links['instagram']['url'])) : ?>
					<a aria-label="visit our instagram page" title="Opens in new window" target="_blank" rel="noopener noreferrer" class="social-icon" href="<?= $social_links['instagram']['url']; ?>">
						<?php echo get_template_part("template-parts/svg/social-svg/social-instagram.svg") ?>
					</a>
				<?php endif; ?>

				<?php if (!empty($social_links['tiktok']['url'])) : ?>
					<a aria-label="visit our tiktok feed" title="Opens in new window" target="_blank" rel="noopener noreferrer" class="social-icon" href="<?= $social_links['tiktok']['url']; ?>">
						<?php echo get_template_part("template-parts/svg/social-svg/social-tik-tok.svg") ?>
					</a>
				<?php endif; ?>

			</div>
		</div>

	</div>
	<div class="legal">
		<div class="left-legal">
			<p>Copyright © <?php echo date('Y'); ?> Campus Advantage</p>
			<a title="External link opens in a new tab" target="_blank" rel="noopener" href="https://campusadv.com/community-privacy-policy/">
				<p>Privacy Policy</p>
			</a>
		</div>
		<div class="legal-icons">
			<div class="legal-icon">
				<img alt="disability access" src="<?php echo get_template_directory_uri() . '/assets/logos/ada.png'; ?>">
			</div>
			<div class="legal-icon">
				<img alt="equal housing opportunity" src="<?php echo get_template_directory_uri() . '/assets/logos/hud.png'; ?>">
			</div>
			<div class="legal-icon">
				<a title="External link opens in a new tab" target="_blank" rel="noopener" href="https://campusadv.com/">
					<img alt="Campus Advantage website" src="<?php echo get_template_directory_uri() . '/assets/logos/ca.png'; ?>">
				</a>
			</div>

			<?php if ($pet_friendly == true) : ?>
				<div class="legal-icon">
					<img alt="pet friendly" src="<?php echo get_template_directory_uri() . '/assets/logos/pet.png'; ?>">
				</div>
			<?php endif; ?>
		</div>
	</div>


</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>