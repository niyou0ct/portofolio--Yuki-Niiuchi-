<?php
/*
Template Name: about
*/
?>

<?php get_header(); ?>
<main data-namespace="about" class="barba-container">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/about.min.css">
  
  <section class="area">
   <div class="areaTitle">
     <h2>front end designer</h2>
   </div>
   <div class="mainArea">
     <div class="inner">
       <div class="imgArea">
         <p class="mypic"><img src="imgs/.jpg" width="" height="" alt=""></p>
       </div>
       <div class="textArea">
         <dl>
           <dt>1994</dt>
           <dd>born in Kyoto</dd>
           <dt>2013</dt>
           <dd>Kansai University, Foreign Development</dd>
           <dt>2017</dt>
           <dd>株式会社エムエム総研, degital marketer and front end designer</dd>
         </dl>
         <dl>
           <dt>Skill</dt>
           <dd>HTML5, CSS3, JavaScript, Three.js, WebGL, Node.js</dd>
           <dt>Occupation</dt>
           <dd>Marketing, Web direction, front end design</dd>
           <dt>Tool</dt>
           <dd>Photoshop, Google Analytics, Slack, GitHub</dd>
           <dt>Language</dt>
           <dd>Japanese, English, Korean</dd>
         </dl>
       </div>
     </div>
   </div>
  </section>
</main>

<?php get_template_part('nav'); ?>
<?php get_footer(); ?>
