<?php
/*
Template Name: form
*/
?>

<?php get_header(); ?>
<main data-namespace="form" class="barba-container">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/form.min.css">
  
  <section class="area">
   <div class="areaTitle">
     <h2>Contact</h2>
   </div>
   <div class="mainArea">
     <div class="inner">
       <form action="" method="post">
        <div id="shortArea" class="inputArea">
          <div class="inputItem">
            <label for="company">company</label>
            <div><input type="text" name="company" id="company" value=""></div>
          </div>
          <div class="inputItem">
            <label for="name">name</label>
            <div><input type="text" name="name" id="name" value="" required></div>
          </div>
          <div class="inputItem">
            <label for="mail">e-mail</label>
            <div><input type="mail" name="mail" id="mail" value="" required></div>
          </div>
        </div>
        <div id="messageArea" class="inputArea">
          <div class="inputItem">
            <label for="message">message</label>
            <div><textarea name="message" id="message" cols="50" rows="5"></textarea></div>
          </div>
        </div>
       </form>
     </div>
   </div>
  </section>
</main>
<?php get_template_part('nav'); ?>
<?php get_footer(); ?>
