<?php

class Cadv_Footer_Nav_Walker extends Walker_Nav_menu {
  
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    // $parent_only = in_array( 'parent-only', $item->classes );
    $parent_only = false;
    $link = $item->url;
    $is_parent = in_array( 'menu-item-has-children', $item->classes );
    if ( $link && $link == '#' ) {
      $parent_only = true;
    }
    $title = $item->title;
    
    $output .= '<li class="' . implode(" ", $item->classes) . '">';
    
    if ( $is_parent ) {
      $output .= "<h2>";
    }
    
    if ( false == $parent_only ) {
      $output .= '<a href="' . $link . '">';
    }
    
    $output .= $title;
    
    if ( false == $parent_only ) {
      $output .= '</a>';
    }
    
    if ( true == $is_parent ) {
      $output .= '</h2>';
    }
    
  }
  
}