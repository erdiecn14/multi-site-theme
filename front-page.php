<?php
/**
 * The template for displaying the Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CADV_Student_Community
 */

get_header();
?>

  
	<main id="primary" class="site-main">
		<?php 
    while ( have_posts() ) : 
      the_post();
      if( post_password_required( )) { ?>
        <div class="container pw-container">
          <?php echo get_the_password_form() ?>
        </div>
        <?php } 
          else {
          get_template_part( 'template-parts/content', 'page' );
          } 
        ?>
   <?php endwhile; // End of the loop. ?>
  </main>

<?php
// get_sidebar();
get_footer();




