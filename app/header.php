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
  <link rel="stylesheet" href="<?php get_template_directory_uri(); ?>css/min/reset.min.css">
  <link rel="stylesheet" href="<?php get_template_directory_uri(); ?>css/min/common.min.css">
  <?php if(is_front_page()): ?>
  <link rel="stylesheet" href="<?php get_template_directory_uri(); ?>css/min/main.min.css">
  <?php elseif(is_page('about')): ?>
  <link rel="stylesheet" href="<?php get_template_directory_uri(); ?>/ss/min/about.min.css">
  <?php elseif(is_page('form')): ?>
  <link rel="stylesheet" href="<?php get_template_directory_uri(); ?>css/min/form.min.css">
  <?php elseif(is_page('offer')): ?>
  <link rel="stylesheet" href="<?php get_template_directory_uri(); ?>css/min/offer.min.css">
  <?php elseif(is_archive('blog')): ?>
  <link rel="stylesheet" href="<?php get_template_directory_uri(); ?>css/min/blog.min.css">
  <?php elseif(is_archive('works')): ?>
  <link rel="stylesheet" href="<?php get_template_directory_uri(); ?>css/min/works.min.css">
  <?php elseif(is_single('blog')): ?>
  <link rel="stylesheet" href="<?php get_template_directory_uri(); ?>css/min/blog-detail.min.css">
  <?php elseif(is_single('works')): ?>
  <link rel="stylesheet" href="<?php get_template_directory_uri(); ?>css/min/works-detail.min.css">
  <?php else: ?>
  <?php endif; ?>

  <script type="text/javascript" src="js/vendor/libs/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/vendor/build/three.min.js"></script>
  <script type="text/javascript" src="js/vendor/libs/stats.min.js"></script>
  <script type="text/javascript" src="js/vendor/libs/dat.gui.min.js"></script>
  <script type="text/javascript" src="js/min/WebGL.min.js"></script>

  <?php if(is_front_page()): ?>
    <script id="vertexShader" type="x-shader/x-vertex">
      precision highp float;

      uniform float sineTime;
      uniform vec2 mouse;

      uniform mat4 modelViewMatrix;
      uniform mat4 projectionMatrix;

      attribute vec3 position;
      attribute vec3 offset;
      attribute vec4 color;
      attribute vec4 orientationStart;
      attribute vec4 orientationEnd;

      varying vec3 vPosition;
      varying vec4 vColor;

      void main(void){
        // vec2 m = vec2(mouse.x * 2.0 - 1.0, -mouse.y * 2.0 + 1.0);
        // float sineTime = sin(length(m) * 30.0 + sineTime * 5.0);
        // vPosition = offset * max( abs( sineTime * 2.0 + 1.0 ), 0.5 ) + position;
        vPosition = offset * 0.5 + position;
        vec4 orientation = normalize(mix(orientationStart, orientationEnd, sineTime));
        vec3 vcV = cross(orientation.xyz, vPosition);
        vPosition = vcV * (2.0 * orientation.w) + (cross(orientation.xyz, vcV) * 2.0 + vPosition);

        vColor = color;

        gl_Position = projectionMatrix * modelViewMatrix * vec4(vPosition, 0.5);
      }
    </script>
    <script id="fragmentShader" type="x-shader/x-fragment">
      precision highp float;

      uniform float time;

      varying vec3 vPosition;
      varying vec4 vColor;

      void main(){
        vec4 color = vec4(vColor);
        color.r += sin(vPosition.x * 10.0 + time) * 0.5;

        gl_FragColor = color;
      }
    </script>
  <?php endif; ?>
  <?php wp_head(); ?>
</head>
<body>

    <div id="barba-wrapper" class="container">

      <header>
        <section class="topLogo">
          <div class="logoOuter">
            <h1>Yuki Niiuchi</h1>
            <a href="<?php get_home_url('/'); ?>">
              <div class="logo"><img src="<?php get_template_directory_uri(); ?>/assets/imgs/logo.svg" alt="" width="" height=""></div>
              <div class="name">
                <div class="fname"><span class="initial">Y</span>uki</div>
                <div class="lname"><span class="initial">N</span>iiuchi</div>
              </div>
            </a>
          </div>
        </section>
      </header>
