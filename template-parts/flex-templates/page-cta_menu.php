<?php 
/**
 * Renders CTA menu buttons under the hero
 */

$anchor = str_replace(' ','-',strtolower(get_sub_field('anchor_id')));
$gradiant_bg = get_sub_field('linear_background_colors');
$link_repeater = get_sub_field('cta_menu_links');
$box_background_color = get_field('box_background_color', 'options');
$box_background_color_class = "bg-1";


  if ($box_background_color){
    $bg_color_num = get_color_num($box_background_color);
    $box_background_color_class = "bg-$bg_color_num";    
  }



?>

<nav class="cta-menu-section" <?php if ($anchor) echo "id=$anchor" ?> aria-label="Quick Links">
  <?php if ($link_repeater) : ?>
    <ul class="menu-links-div <?php echo $box_background_color_class?>">
      <?php foreach ($link_repeater as $repeater_row) : ?>
        <?php if ($repeater_row) : 
          $link = $repeater_row['menu_link_field'];
          if ($link) :
            $link_target = $link['target'] ? $link['target'] : '_self';
            $link_rel_attr = $link_target == '_blank' ? 'rel="noopener nofollow"' : '';
            $title = $link_target == '_blank' ? 'title="external link opens in a new tab"' : ''; 
          ?>
          <li>
              <a 
                href=<?php echo $link['url'];?> 
                target="<?php echo esc_attr($link_target); ?>" 
                <?php echo $link_rel_attr; ?>
                <?php echo $title; ?> 
              >
                  <span><?php echo $link['title'] ;?></span>
                  <span class="double-arrows" aria-hidden="true" role="presentation">>></span>
              </a>
          </li>
          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach;?>
      </ul>
    <?php endif; ?>
</nav>