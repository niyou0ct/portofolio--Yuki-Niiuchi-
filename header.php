<!DOCTYPE html>
<html lang="jp">
<head>
  <meta http-equiv="content-type" content="text/html charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="web 制作 フリーランス デザイナー フロントエンド マーケティング 課題">
  <meta name="description" content="戦略的WEBサイト制作">
  <title><?php bloginfo('name'); ?></title>
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!-- <link rel="shortcut icon" href="favicon.ico"> -->
  <!-- <link rel="stylesheet" href="https://use.typekit.net/mye6vgs.css"> -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/reset.min.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/common.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/barba.js/1.0.0/barba.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/libs/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/build/three.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/libs/stats.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/libs/dat.gui.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/WebGL.min.js"></script>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div id="barba-wrapper" class="container">

      <header>
        <section class="topLogo">
          <div class="logoOuter">
            <h1>Yuki Niiuchi</h1>
            <a href="<?php echo home_url(); ?>">
              <div class="logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/logo.svg" alt="" width="" height=""></div>
              <div class="name">
                <div class="fname"><span class="initial">Y</span>uki</div>
                <div class="lname"><span class="initial">N</span>iiuchi</div>
              </div>
            </a>
          </div>
        </section>
      </header>
