<?php
function bower_dir(){
  return get_template_directory_uri() . '/bower_components';
}

// Register Style
function idt_styles() {

  if(WP_DEBUG){
    wp_register_style( 'bootstrap', bower_dir() . '/bootstrap/dist/css/bootstrap.css', false, false );
    wp_register_style( 'font-awesome', bower_dir() . '/font-awesome/css/font-awesome.css', false, false );
  }
  else{
    wp_register_style( 'bootstrap', bower_dir() . '/bootstrap/dist/css/bootstrap.min.css', false, false );
    wp_register_style( 'font-awesome', bower_dir() . '/font-awesome/css/font-awesome.min.css', false, false );

  }
  wp_register_style( 'swiper', bower_dir() . '/swiper/dist/idangerous.swiper.css', false, false );

  wp_register_style( 'zipme', get_template_directory_uri() . '/css/zipme.css', false, false );

  wp_enqueue_style( 'bootstrap' );
  wp_enqueue_style( 'font-awesome' );
  wp_enqueue_style( 'swiper' );
  wp_enqueue_style( 'zipme' );

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'idt_styles' );

// Register Script
function idt_scripts() {

  wp_deregister_script( 'jquery' );
  if(WP_DEBUG){
    wp_register_script( 'jquery',  bower_dir() . '/jquery/dist/jquery.js', false, false, true );
    wp_register_script( 'bootstrap',  bower_dir() . '/bootstrap/dist/js/bootstrap.js', ['jquery'], false, true );
    wp_register_script( 'swiper',  bower_dir() . '/swiper/dist/idangerous.swiper.js', ['jquery'], false, true );
  }
  else{
    wp_register_script( 'jquery',  bower_dir() . '/jquery/dist/jquery.min.js', false, false, true );
    wp_register_script( 'bootstrap',  bower_dir() . '/bootstrap/dist/js/bootstrap.min.js', ['jquery'], false, true );
    wp_register_script( 'swiper',  bower_dir() . '/swiper/dist/idangerous.swiper.min.js', ['jquery'], false, true );
  }
  wp_register_script( 'app',  get_template_directory_uri()  . '/js/application.js', ['jquery', 'bootstrap'], false, true );

  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'bootstrap' );
  wp_enqueue_script( 'swiper' );
  wp_enqueue_script( 'app' );


}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'idt_scripts' );
 ?>