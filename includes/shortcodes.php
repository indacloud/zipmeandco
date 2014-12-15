<?php

// Add Shortcode
function zmc_row( $atts , $content = null ) {
  return '<div class="row">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'row', 'zmc_row' );

function zmc_col( $atts , $content = null ) {
  $class = "";
  foreach ($atts as $key => $value) {
    if($key == 'class')
      $class .= ' '.$value;
    else
      $class .= ' col-'.str_replace('_', '-', $key).'-'.$value;
  }
  return '<div class="'.$class.'">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'col', 'zmc_col' );

function zmc_visible( $atts , $content = null ) {
  $class = "";
  foreach ($atts as $key => $value) {
    $class .= ' visible-'.str_replace('_', '-', $key).'-'.$value;
  }
  return '<div class="'.$class.'">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'visible', 'zmc_visible' );

function zmc_hidden( $atts , $content = null ) {
  $class = "";
  foreach ($atts as $key => $value) {
    $class .= ' hidden-'.str_replace('_', '-', $key);
  }
  return '<div class="'.$class.'">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'hidden', 'zmc_hidden' );

function zmc_style( $atts , $content = null ) {
  $style = "";
  foreach ($atts as $key => $value) {
    $style .= str_replace('_', '-', $key).':'.str_replace('_', '-', $value).';';
  }
  return '<div style="'.$style.'">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'style', 'zmc_style' );

function zmc_section( $atts , $content = null ) {
  return '<section data-section id="'.$atts["id"].'">'.do_shortcode( $content ).'</section>';
}
add_shortcode( 'section', 'zmc_section' );

function zmc_product_slider( $atts ) {
  return print_products();
}
add_shortcode( 'product_slider', 'zmc_product_slider' );

function zmc_tetimonials( $atts ) {
  return print_testimonials();
}
add_shortcode( 'testimonials', 'zmc_tetimonials' );

function zmc_open_modal( $atts ) {
  $output = '<a class="cta-button" href="#" data-toggle="modal" data-target="'.$atts['target'].'">';
  $output .= $atts['label'];
  $output .= '</a>';
  return $output;
}
add_shortcode( 'modal', 'zmc_open_modal' );

function zmc_large_menu( $atts ) {

  $menus = get_menus();

  $output = "<div class='large-menu'>";
  $output .= "<ul class='large-menu-list'>";

  foreach ($menus as $key => $menu) {
    $output .= "<li class='large-menu-item'>";
    if($menu['action'] === 'modal'){
      $output .= "<a href='#' data-toggle='modal' data-target='".$menu["target"]."'>";
    }
    else{
      $output .= "<a href='".$menu['target']."' data-target='".$menu['target']."'>";
    }
    $output .= "<img src='".$menu['icon']['url']."' />";
    $output .= "<span>".$menu['long_title']."</span>";
    $output .= '</a>';
    $output .= "</li>";
  }

  $output .= "</ul>";
  $output .= "</div>";

  return $output;
}
add_shortcode( 'large_menu', 'zmc_large_menu' );

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );


 ?>