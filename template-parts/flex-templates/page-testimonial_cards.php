<?php 
/**
 * Renders Testimonial Cards section
 */

$anchor = str_replace(' ','-',strtolower(get_sub_field('anchor_id')));
$heading_color = get_sub_field('heading_color');
$left_text_area = get_sub_field('20p_text_area');
$testimonial_text_area = get_sub_field('80p_width_cards');

$left_pattern = get_field('left_background_pattern','options');

// echo "<pre>";
// var_dump($testimonial_text_area);
// echo "</pre>";


if($heading_color){
   $heading_color_num = get_color_num($heading_color);
   $heading_color_class = "h-$heading_color_num";
}

?>

<section class="testimonial-cards <?php echo $heading_color_class; ?>" <?php if ($anchor) echo "id=$anchor" ?>>
    <?php if($left_pattern == true) : ?>
                <div class="background-pattern-left">
                  <?php srcset_full($left_pattern); ?>
                </div>
            <?php endif; ?>
  <div class="content-container" data-sal="slide-left" data-sal-duration="1200">
      <div class="left-text <?php echo $heading_color_class ?>">
        <?php echo $left_text_area ?>
      </div>

      <div class="testimonial-cards">
        <?php foreach($testimonial_text_area as $testimonial_cards) :?>
          <figure class="card">
              <div class="card-copy">
                 <?php echo $testimonial_cards['copy_text']?>
              </div>
              <figcaption class="card-name">
                 <p><strong><?php echo $testimonial_cards['name_text'] ?></strong></p>
              </figcaption>
        </figure>
            <?php endforeach;?>  
      </div> 

  </div>

</section>
