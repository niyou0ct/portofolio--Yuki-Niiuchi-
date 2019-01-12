<?php
session_start();
/*
Template Name: form-complete
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$rn = "\n|\r\n|\r";

mb_language("Japanese");
mb_internal_encoding("UTF-8");

$company = h($_POST['company']);
$name1 = h($_POST['name1']);
$to = h('yukiniiuchi@gmail.com');
$from = h($_POST['mail']);
$subject = $name1.h('様からお問い合わせがありました');
$message = "[会社名]: ".$company.$rn."[名前]: ".$name1.$rn."[連絡先]: ".$from.$rn.h($_POST['message']);
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-Transfer-Encoding: 7bit\n";
$headers .= "Content-type: text/html; charset=UTF-8\n";
$headers .= "From: ".$from."\n";
$headers .= "X-Mailer: PHP/". phpversion();
mb_send_mail($to, $subject, $message, $headers);

?>

<?php get_header(); ?>
<div id="barba-wrapper" class="container">
<main data-namespace="form-complete" class="barba-container">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/form_complete.min.css">
  <input hidden type="text" value="<?php echo $company; ?>">
  <input hidden type="text" value="<?php echo $name1; ?>">
  <input hidden type="text" value="<?php echo $to; ?>">
  <input hidden type="text" value="<?php echo $from; ?>">
  <section class="area">
    <div class="layoutOuter">
     <div class="areaTitle">
       <h2>Contact</h2>
     </div>
     <div class="mainArea">
       <div class="inner">
         <div class="completebox">
           <div class="boxhead">お問い合わせありがとうございます！</div>
           <p class="text">ご返信に3営業日ほどかかる場合がございます。あらかじめご了承くださいませ。</p>
         </div>
       </div>
     </div>
   </div>
  </section>
</main>
</div>
<?php get_template_part('nav'); ?>
<?php get_footer(); ?>
