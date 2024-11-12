<?php

class Cadv_Top_Nav_Walker extends Walker_Nav_menu {
  
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
    
    if ( false == $parent_only && true == $is_parent ) {
      $output .= '<div class="link-and-button">';
    }
    
    if ( $parent_only ) {
      $output .= '<button aria-expanded="false" aria-label="dropdown nav">';
    } else {
      $output .= '<a href="' . $link . '">';
    }
    
    $output .= $title;
    
    if ( $parent_only ) {
      $output .= '</button>';
    } else {
      $output .= '</a>';
    }
    
    if ( false == $parent_only && true == $is_parent ) {
      $output .= '<button class="submenu-dropdown-button" aria-expanded="false" aria-label="dropdown">';
      $output .= '<span class="dropdown-icon">&#x25BC;</span>';
      $output .= '<span class="button-text">open dropdown</span>';
      $output .= '</button>';
      $output .= '</div>';
    }
    
  }
  
}