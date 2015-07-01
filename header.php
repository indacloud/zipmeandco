<?php
  // header
 ?>
 <!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="main-head">
    <div class="container">
      <nav class="navbar" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#zmc-collapsible-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#home" data-target="#home" rel="home">
            <img src="<?php echo get_theme_mod('menu_logo'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="zmc-collapsible-menu">
          <ul class="nav navbar-nav">
            <?php
              $menus = get_menus();
              foreach ($menus as $key => $menu) {
              ?>
                <li id="<?php echo $menu['id']; ?>" class="menu-item <?php if($menu['featured']) echo "featured";?>">
                  <?php if($menu['action'] === 'modal'): ?>
                  <a href="#" data-toggle="modal" data-target="<?php echo $menu['target']; ?>">
                  <?php else: ?>
                  <a href="<?php echo $menu['target']; ?>" data-target="<?php echo $menu['target']; ?>">
                  <?php endif; ?>
                    <?php echo $menu['title']; ?>
                  </a>
                </li>
              <?php
              }
            ?>
        </ul>
        </div>
      </nav>
      <div class="lang-selector">
        <?php //echo zmc_language_selector(); ?>
      </div>
    </div><!-- /.navbar-collapse -->
  </header>
  <article id="main">


