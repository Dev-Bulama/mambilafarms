<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- TOP BAR -->
<div class="top-bar">
  <span>A SAB Foundation Initiative</span>
  <span class="top-dot"></span>
  <span>Promoted by Successory Nigeria Ltd</span>
  <span class="top-dot"></span>
  <span>Technical Partner: Farm Alert Ltd</span>
</div>

<!-- NAVIGATION -->
<nav id="nav">
  <div class="ni">
    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <div class="le">MLF</div>
      <div>
        <div class="ln">Mambilla Legacy Farms</div>
        <div class="ls">SAB Foundation · Mambilla Plateau</div>
      </div>
    </a>

    <div class="nl">
      <?php
      wp_nav_menu( array(
          'theme_location' => 'primary',
          'walker'         => new Mambila_Flat_Walker(),
          'items_wrap'     => '%3$s',
          'container'      => false,
          'fallback_cb'    => 'mambila_fallback_nav',
      ) );
      ?>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-nav">Start Investing →</a>
    </div>

    <div class="hbg" onclick="tmob()">
      <span></span><span></span><span></span>
    </div>
  </div>
</nav>

<!-- MOBILE MENU -->
<div class="mob-menu" id="mob-menu">
  <?php
  wp_nav_menu( array(
      'theme_location' => 'primary',
      'walker'         => new Mambila_Flat_Walker(),
      'items_wrap'     => '%3$s',
      'container'      => false,
      'fallback_cb'    => 'mambila_fallback_nav',
  ) );
  ?>
  <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta-mob">→ Start Investing Now</a>
</div>
