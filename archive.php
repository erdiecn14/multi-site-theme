<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CADV_Student_Community
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
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

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
