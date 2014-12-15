<?php

function zmc_theme_customizer( $wp_customize ) {

  // settings
  $wp_customize->add_setting( 'menu_logo' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );
  $wp_customize->add_setting( 'menu_logo_mobile' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );

  $wp_customize->add_setting( 'facebook_link' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );
  $wp_customize->add_setting( 'twitter_link' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );
  $wp_customize->add_setting( 'instagram_link' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );
  $wp_customize->add_setting( 'pinterest_link' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );
  $wp_customize->add_setting( 'linkedin_link' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );

  // sections
  $wp_customize->add_section( 'theme_images' , array(
    'title'      => __( 'Pictures', 'zmc' ),
    'priority'   => 30,
    )
  );
  $wp_customize->add_section( 'social' , array(
    'title'      => __( 'Social', 'zmc' ),
    'priority'   => 30,
    )
  );

  // controls
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu_logo', array(
    'label'        => __( 'Menu Logo', 'zmc' ),
    'section'    => 'theme_images',
    'settings'   => 'menu_logo',
    )
    )
  );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu_logo_mobile', array(
    'label'        => __( 'Menu Logo for mobile', 'zmc' ),
    'section'    => 'theme_images',
    'settings'   => 'menu_logo_mobile',
    )
    )
  );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_link', array(
    'label'        => __( 'Facebook page link', 'zmc' ),
    'section'    => 'social',
    'settings'   => 'facebook_link',
    'type'       => 'text'
    )
    )
  );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_link', array(
    'label'        => __( 'Twitter account link', 'zmc' ),
    'section'    => 'social',
    'settings'   => 'twitter_link',
    'type'       => 'text'
    )
    )
  );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram_link', array(
    'label'        => __( 'Instagram link', 'zmc' ),
    'section'    => 'social',
    'settings'   => 'instagram_link',
    'type'       => 'text'
    )
    )
  );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pinterest_link', array(
    'label'        => __( 'Pinterest board link', 'zmc' ),
    'section'    => 'social',
    'settings'   => 'pinterest_link',
    'type'       => 'text'
    )
    )
  );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin_link', array(
    'label'        => __( 'LinkedIn profile link', 'zmc' ),
    'section'    => 'social',
    'settings'   => 'linkedin_link',
    'type'       => 'text'
    )
    )
  );

}
add_action( 'customize_register', 'zmc_theme_customizer' );

?>