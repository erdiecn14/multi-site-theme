<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CADV_Student_Community
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<aside id="specials-banner" class="specials-banner" aria-label="leasing specials and announcements banner">
	</aside>
	<?php // cadv_community_post_thumbnail(); ?>

	<?php
  if ( have_rows('sections') ) : 
    while ( have_rows('sections') ) : the_row();
      get_template_part( 'template-parts/flex-templates/page', get_row_layout() );
    endwhile;
  endif;
  ?>

	<div class="entry-content">
		<?php if(is_page('Home')) : ?>
			<section class="insurance">
				<div style="padding: 3em calc(1em + 2%); text-align: center;">
					<p style="text-align: center; max-width: none;">
						<a title="external link opens in a new tab" style="text-decoration: underline; color: black;" href="https://campusadvantage.confirminsurance.com" target="_blank" rel="noopener">Campus Advantage Insurance Waiver Program Information</a><br />If you would like to provide your own liability insurance, please 
						<a title="external link opens in a new tab" style="text-decoration: underline; color: black;" href="https://campusadvantage.confirminsurance.com/opt-out" target="_blank" rel="noopener">click here to opt out of the Insurance Waiver Program</a>.
          </p>
				</div>
			</section>
			<?php endif; ?>
		<?php
		// the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cadv-community' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'cadv-community' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
