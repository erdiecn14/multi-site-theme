<?php
/**
 * The Blog Posts Index Page template file 
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CADV_Student_Community
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="flex-content">
	<?php
		$blog_page_id = get_option( 'page_for_posts' );
		if ( have_rows('sections', $blog_page_id) ) : 
			while ( have_rows('sections', $blog_page_id) ) : the_row();
			get_template_part( 'template-parts/flex-templates/page', get_row_layout() );
			endwhile;
		endif;
		?>
	</div>

  <section class="blog-page-main">
    <?php
		if ( have_posts() ) :
    ?>

      <ul class="post-cards">

      <?php /* Start the Loop */
			 while ( have_posts() ) :
				the_post();  
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */

				//  ADD everything that we need for a blog card, function that takes post content and limits by character then add "..."
				?>

			<li class="post-card">
				<div class="post-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="card-copy">
					<a class="overlay-link" href="<?php the_permalink(); ?>">
					<h2><?php the_title(); ?></h2>
					</a>
					<div class="entry-content"><?php the_excerpt(); ?></div>
					<div class="cta-wrapper">
					<span class="pseudo-cta" aria-hidden="true">Read More</a>
					</div>
				</div>
			</li>

      <?php endwhile; ?>

      </ul> <!-- .post-cards -->

    <?php else :

      /* No posts */

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>


		<div style="max-width: 90%; margin: 0 auto;">
			<?php posts_nav_link(); ?>
		</div>

  </section>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
