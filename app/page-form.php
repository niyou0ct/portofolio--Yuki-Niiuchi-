<?php
session_start();
/*
Template Name: form
*/
?>

<?php get_header(); ?>
<div id="barba-wrapper" class="container">
<main data-namespace="form" class="barba-container">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/form.min.css">
  <section class="area">
    <div class="layoutOuter">
     <div class="areaTitle">
       <h2>Contact</h2>
     </div>
     <div class="mainArea">
       <div class="inner">
         <form id="contact" action="<?php echo home_url(); ?>/form/form-complete/" method="post">
          <div id="shortArea" class="inputArea">
            <div class="inputItem">
              <label for="company">会社名</label>
              <div><input type="text" name="company" value="<?php if(!empty($_POST['company'])){echo $_POST['company']; } ?>"></div>
            </div>
            <div class="inputItem">
              <label for="name">お名前</label>
              <div><input type="text" name="name1" value="<?php if(!empty($_POST['name1'])){echo $_POST['name1']; } ?>" required></div>
            </div>
            <div class="inputItem">
              <label for="mail">連絡先メールアドレス</label>
              <div><input type="mail" name="mail" value="<?php if(!empty($_POST['mail'])){echo $_POST['mail']; } ?>" required></div>
            </div>
          </div>
          <div id="messageArea" class="inputArea">
            <div class="inputItem">
              <label for="message">お問い合わせ内容</label>
              <div><textarea name="message" cols="50" rows="5" value="<?php if(!empty($_POST['message'])){echo $_POST['message']; } ?>"></textarea></div>
            </div>
          </div>
         </form>
         <button class="btn" type="submit" name="send" form="contact" value="送信する"><span>送信する</span></button>
       </div>
     </div>
   </div>
  </section>
</main>
</div>
<?php get_template_part('nav'); ?>
<?php get_footer(); ?>
