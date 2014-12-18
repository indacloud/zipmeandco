<?php

defined('ABSPATH') or die("No script kiddies please!");

add_action('after_setup_theme', 'ptc_setup');
function ptc_setup(){
  load_theme_textdomain('zmc', get_template_directory() . '/languages');
}


// inlcudes
require get_template_directory() . "/includes/enqueue.php";

require get_template_directory() . "/includes/theme_options.php";

require get_template_directory() . "/includes/custom_types.php";

require get_template_directory() . "/includes/shortcodes.php";

function custom_theme_setup() {
  add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

function get_social_links(){

  $links = [];
  if(strlen($mod = get_theme_mod('facebook_link'))>0)
    $links['facebook_link']  = (object) array(
      'url'   => $mod,
      'icon'  => 'fa-facebook',
      'icon_square'  => 'fa-facebook-square',
      'title' => __('Like us on Facebook', 'ptc'),
    );
  if(strlen($mod = get_theme_mod('twitter_link'))>0)
    $links['twitter_link']   = (object) array(
      'url'   => $mod,
      'icon'  => 'fa-twitter',
      'icon_square'  => 'fa-twitter-square',
      'title' => __('Follow us on Twitter', 'ptc'),
    );
  if(strlen($mod = get_theme_mod('instagram_link'))>0)
    $links['instagram_link'] = (object) array(
      'url'   => $mod,
      'icon'  => 'fa-instagram',
      'icon_square'  => 'fa-instagram',
      'title' => __('Our Instagram page', 'ptc'),
    );
  if(strlen($mod = get_theme_mod('pinterest_link'))>0)
    $links['pinterest_link'] = (object) array(
      'url'   => $mod,
      'icon'  => 'fa-pinterest',
      'icon_square'  => 'fa-pinterest-square',
      'title' => __('We are on pinterest', 'ptc'),
    );
  if(strlen($mod = get_theme_mod('linkedin_link'))>0)
    $links['linkedin_link']  = (object) array(
      'url'   => $mod,
      'icon'  => 'fa-linkedin',
      'icon_square'  => 'fa-linkedin-square',
      'title' => __('On LinkedIn', 'ptc'),
    );

  return $links;
}

function my_custom_archive_order( $vars ) {
  if ( !is_admin() && isset($vars['post_type']) && is_post_type_hierarchical($vars['post_type']) ) {
    $vars['orderby'] = 'menu_order';
    $vars['order'] = 'ASC';
  }

  return $vars;
}
add_filter( 'request', 'my_custom_archive_order');

function get_menus(){

  $menus = array();

  $args = array(
    'posts_per_page' => -1,
    'post_type' => 'menus',
    'orderby' => 'menu_order',
    'order' => 'asc'
    );
  $query = new WP_Query( $args );
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();

      $menus[] = array(
        'id' =>         'menu-'.get_the_id(),
        'title' =>      get_the_title(),
        'long_title' => get_field('menu_long_name'),
        'icon' =>       get_field('menu_icon'),
        'action' =>     get_field('menu_action'),
        'target' =>     get_field('menu_target'),
        'featured' =>   get_field('menu_featured')
        );
    }
  }
  wp_reset_postdata();

  return $menus;

}

function zmc_language_selector_footer(){

  $langs = icl_get_languages('skip_missing=0');

  $inactive_lang = array();
  $active_lang = null;
  foreach ($langs as $key => $lang) {
    if($lang['active'])
      $active_lang = $lang;
    else
      $inactive_lang[] = $lang;
  }

  $html = '<div class="language-select visible-xs text-center">';
  $html .= '<ul class="language-menu">';
  foreach ($inactive_lang as $key => $lang) {
    $html .= '<li>';
    $html .= '<a href="'.$lang['url'].'" role="menu-item" tabindex="-1">';
    $html .= $lang['native_name'];
    $html .= '</a>';
    $html .= '</li>';
  }
  $html .= '</ul>';
  $html .= '</div>';

  return $html;
}

function zmc_language_selector(){

  $langs = icl_get_languages('skip_missing=0');

  $inactive_lang = array();
  $active_lang = null;
  foreach ($langs as $key => $lang) {
    if($lang['active'])
      $active_lang = $lang;
    else
      $inactive_lang[] = $lang;
  }

  $html = '<div class="dropdown language-select hidden-xs">';
  $html .= '<button class="btn" id="lang-dropdown" data-toggle="dropdown" tabindex="-1">';
  $html .= $active_lang['native_name'];
  $html .= '<span class="caret"></span>';
  $html .= '</button>';
  $html .= '<ul class="dropdown-menu" role="menu" aria-labelledby="lang-dropdown">';
  foreach ($inactive_lang as $key => $lang) {
    $html .= '<li role="presentation">';
    $html .= '<a href="'.$lang['url'].'" role="menu-item" tabindex="-1">';
    $html .= $lang['native_name'];
    $html .= '</a>';
    $html .= '</li>';
  }
  $html .= '</ul>';
  $html .= '</div>';

  return $html;
}


function print_modals(){

  $args = array(
    'posts_per_page' => -1,
    'post_type' => 'modals'
    );

  $query = new WP_Query( $args );
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
      $modal = get_post(get_the_id());

      ?>
      <div class="modal fade" id="<?php echo $modal->post_name; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title"><?php the_title(); ?></h4>
            </div>
            <div class="modal-body">
              <?php the_content(); ?>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <?php
    }
  }
  wp_reset_postdata();

}

function print_products(){

  $args = array(
    'posts_per_page' => -1,
    'post_type' => 'product',
    'orderby' => 'menu_order',
    'order' => 'asc'
    );

  $html = "";

  $query = new WP_Query( $args );
  if ( $query->have_posts() ) {

    $html .= '<div id="product-swiper" class="row">';
    $html .= '<div class="navigation col col-sm-4 hidden-xs">';
    $index = 0;
    while ( $query->have_posts() ) {
      $query->the_post();
      $title = get_field('navigation_title');
      if( empty($title) )
        $title = get_the_title();

      $html .= '<div class="item">';
      $html .= '<a data-slide="'.$index.'">';
      $html .= $title;
      $html .= '</a>';
      $html .= '</div>';
      $index ++;
    }
    $html .= '</div>';
    $html .= '<div class="col col-sm-8">';
    $html .= '<div class="swiper-container">';
    $html .= '<div class="swiper-wrapper">';

    $index = 0;
    while ( $query->have_posts() ) {
      $query->the_post();
      $product = get_post(get_the_id());

      $html .= '<div class="swiper-slide" data-slide="'.$index.'">';
      $html .= '<div class="title">';
      $html .= get_the_title();
      $html .= '</div>';
      $html .= '<div class="content">';
      $html .= get_the_content();
      $html .= '</div>';
      $html .= '<div class="picture">';
      $html .= get_the_post_thumbnail($product->ID, 'full');
      $html .= '</div>';
      $html .= '</div>';
      $index ++;
    }

    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div id="product-switer-buttons" class="visible-xs">';
    $html .= '<a class="prev"><i class="fa fa-chevron-circle-left"></i></a>';
    $html .= '<a class="next"><i class="fa fa-chevron-circle-right"></i></a>';
    $html .= '</div>';


  }
  wp_reset_postdata();

  return $html;

}

function print_testimonials(){

  $args = array(
    'posts_per_page' => -1,
    'post_type' => 'testimonial',
    'orderby' => 'menu_order',
    'order' => 'asc'
    );
  $html = "";

  $query = new WP_Query( $args );
  if ( $query->have_posts() ) {
    $html .= '<div id="testimonials">';
    while ( $query->have_posts() ) {
      $query->the_post();

      $html .= '<div class="row">';
      $html .= '<div class="avatar col col-sm-3 text-center">';
      $html .= get_the_post_thumbnail( get_the_id(), 'thumb' );
      $html .= '</div>';
      $html .= '<div class="col col-sm-9">';
      $html .= '<h5>'.get_the_title().'</h5>';
      $html .= '<div class="content">';
      $html .= get_the_content();
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';

    }
    $html .= '</div>';
  }
  wp_reset_postdata();

  return $html;

}