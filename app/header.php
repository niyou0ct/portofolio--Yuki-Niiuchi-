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

  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/barba.js/1.0.0/barba.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/libs/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/build/three.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/libs/stats.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/libs/dat.gui.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/WebGL.min.js"></script>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
  <section class="topLogo">
    <div class="logoOuter">
      <a href="<?php echo home_url(); ?>/">
        <div class="logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/logo_portofolio_ver2.svg" alt="" width="" height=""></div>
        <div class="myInfo">
          <div class="name"><span class="text">Yuki Niiuchi</span></div>
          <div class="detail"><span class="text">Front-End Engineer / Digital Marketing</span></div>
        </div>
      </a>
    </div>
  </section>
  <section class="snsArea">
    <ul class="snsList">
      <li class="sns"><a target="_blank" href="https://www.facebook.com/profile.php?id=100011467639939"><img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/facebook.png" alt=""></a></li>
      <li class="sns"><a target="_blank" href="https://twitter.com/ni_you0ct"><img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/twitter.png" alt=""></a></li>
      <li class="sns"><a target="_blank" href="https://www.instagram.com/ni_you0ct/?hl=en"><img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/iconfinder_38-instagram_1161953.png" alt=""></a></li>
      <li class="sns"><a target="_blank" href="https://www.linkedin.com/in/%E5%8B%87%E6%A8%B9-%E4%BB%81%E4%BA%95%E5%86%85-653046166/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/iconfinder_linkedin_circle_black_107159.png" alt=""></a></li>
      <li class="sns"><a target="_blank" href="https://github.com/niyou0ct/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/iconfinder_73-pinterest_104430.png" alt=""></a></li>
      <li class="sns"><a target="_blank" href="https://www.pinterest.jp/axaebyxo11/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/iconfinder_mark-github_298822.png" alt=""></a></li>
      <li class="sns"><a href="<?php echo home_url(); ?>/form/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/iconfinder_icon-at_211625.png" alt=""></a></li>
    </ul>
    <i class="fas fa-share-alt"></i>
  </section>
</header>
