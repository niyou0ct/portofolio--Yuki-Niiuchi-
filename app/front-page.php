<div id="barba-wrapper" class="container">
<?php get_header(); ?>
 <main data-namespace="top" class="barba-container">
   <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/main.min.css">
   <script id="vertexShader" type="x-shader/x-vertex">
   </script>
   <script id="fragmentShader" type="x-shader/x-fragment">
   </script>
   <section class="firstView">
     <div class="firstInner">

       <div class="leadText">
         <p><span>Innovative Business</span></p>
       </div>

       <section class="mainTitle">
         <div class="infoList">
           <h1 style="display: none;">Yuki Niiuchi</h1>
           <span class="subText">経営戦略で欠かせない重要な役割を果たすWebサイトを制作します。</span>
         </div>
       </section>

     </div>
   </section>

   <div id="topAnimationApp"></div>
   <div id="info">
    <div id="notSupported" style="display:none;">Sorry your graphics card + browser does not support hardware instancing</div>
  </div>
 </main>

<?php get_template_part('nav'); ?>
<?php get_footer(); ?>
