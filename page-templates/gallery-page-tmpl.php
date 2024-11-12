<?php
/**
 * The template for displaying a Gallery Page
 * Template Name: Gallery
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CADV_Student_Community
 */

 /**
  * $galleries is a repeater containing 
  * - text field (gallery title)
  * - radio button (gallery type)
  * - a group field (different gallery types)
  *   the field in this group that's visible to the author depends on the radio button 
  *    - Gallery field (images)
  *    - Repeater of textareas (tour codes)
  *    - Repeater of group of 2 files (videos - mp4 and webm) 
  */
$galleries = get_field('galleries'); // a 
$total_item_count = 0;
$col_count = 3;
$gallery_categories = [];
foreach ($galleries as $gallery) {
  $gallery_type = $gallery['gallery_type'];
  // $actual_gallery = $gallery['collection']['images'];
  switch($gallery_type) {
    case 'image':
      $actual_gallery = $gallery['collection']['images'];
      break;
    case 'tour':
      $actual_gallery = $gallery['collection']['tours'];
      break;
    case 'video':
      $actual_gallery = $gallery['collection']['videos'];
      break;
    case 'popup':
      $actual_gallery = $gallery['collection']['tours_popup'];
      break;  
    default: 
      $actual_gallery = $gallery['collection']['images'];
  }
  $total_item_count += count((is_countable($actual_gallery) ? $actual_gallery : []));
  if (is_array($gallery) && false == empty($gallery)) {
    $gallery_categories[] = $gallery['title']; 
  }
}
get_header();
?>

	<main id="primary" class="site-main">
    
		<?php 
    while ( have_posts() ) : 
      the_post();
    ?> 

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <?php // print the flex layouts
      if ( have_rows('sections') ) : 
        while ( have_rows('sections') ) : the_row();
          get_template_part( 'template-parts/flex-templates/page', get_row_layout() );
        endwhile;
      endif;
      ?>
      
      <?php if ( count($galleries) > 1 ) : ?>
      <section class="filters">
        <h2 class="sr-only">Gallery Filters</h2>
        <div class="button-grid">
          <button class="filter-button" aria-pressed="true" data-filter="all" data-bed-count="all">
            <span class="sr-only">Show </span>All
          </button>
          <?php foreach( $gallery_categories as $category_title ) : 
            $category_id = str_replace(' ','-',strtolower($category_title)); 
          ?>
            <button 
              class="filter-button" 
              aria-pressed="false" 
              data-filter="<?php echo $category_id; ?>"
            >
              <span class="sr-only">Filter by </span> <?php echo $category_title; ?>
            </button>
          <?php endforeach; ?>  
        </div>
      </section>
      <?php endif; ?>
        
      <section id="filterable-content-section" class="grid-gallery">
          <?php if ( have_rows('galleries') ) : ?>
            <ul
                class="gallery-items"
                data-image-count="<?php echo $total_item_count; ?>"
                data-column-count="<?php echo $col_count ?>"
            >
              <?php 
              /**
               *  gallery group
               *    title
               *    type
               *    collection (gallery, repeater of embeds, repeater of urls)
               * */ 
                foreach ( $galleries as $gallery_group ) : 
                  get_template_part( 
                    'template-parts/gallery/gallery', 
                    $gallery_group['gallery_type'], 
                    ['gallery_group' => $gallery_group] 
                  );
                endforeach;
              ?>
            </ul>
          <?php endif; ?>
      </section>
        
      <div class="entry-content">
        <?php the_content(); ?>
      </div><!-- .entry-content -->

    </article><!-- #post-<?php the_ID(); ?> -->

  <?php
    endwhile; // End of the loop. 
  ?>

	</main><!-- #main -->

<?php
get_footer(); ?>


<script>

(function($) {
  $(document).ready(function() { 
    let searchParams = new URLSearchParams(window.location.search);

    if(searchParams.has("virtual-tour")){
      $('button[data-filter="virtual-tours"]').trigger('click');
    }

  })
})(jQuery);
</script>




