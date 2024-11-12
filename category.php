<?php
/**
 * The Categories Index Page template file 
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

	<main id="primary" class="site-main blog-page-main">
    <h1 class="category-title"><?php single_cat_title(); ?></h1>
		<div class="post-cards">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
       /* site isn't configured to use a static home page */
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					
				</header>
				<?php

      endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
				<div class="post-card">
							<a href="<?php the_permalink(); ?>">
								<div class="post-thumbnail">
									<?php the_post_thumbnail(); ?>
								</div>
							</a>
							<div class="card-copy">
								<h2><?php the_title(); ?></h2>
								<div class="entry-content"><?php the_excerpt(); ?></div>
								<?php 
								$cta = get_the_permalink();

								if(!empty($cta)) : ?>
							<div class="cta-wrapper">
								<a href="<?php echo $cta; ?>" class="cta-arrow" aria-label="Read more of the blog post">Read More</a>	
							</div>
							<?php endif; ?>	
							</div>
				</div>

		<?php

			endwhile;

			// the_posts_navigation();

		else :

      /* No posts */

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div> <!-- .post-cards -->
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
