<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CADV_Student_Community
 */

?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="post-header"></div>

<div class="post-main-body">
	<div class="post-content">
		<header class="entry-header single-header">
		<?php cadv_community_post_thumbnail(); ?>	
			<?php
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_post_type_archive_link( 'post' )  ) . '" rel="bookmark">', '</a></h1>' );
		?>

			<div class="entry-meta">
			<?php
			//   cadv_community_posted_on();
			//   cadv_community_posted_by();
			?>
			</div><!--.entry-meta -->
		</header><!-- .entry-header -->

    
		<div class="entry-content single-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cadv-community' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			?>
			</div><!-- .entry-content -->
			</div> <!-- .blog-content -->

			<?php get_sidebar(); ?>
	    
	</div> <!-- .post-main-body -->
	
</article><!-- #post-<?php the_ID(); ?> -->


