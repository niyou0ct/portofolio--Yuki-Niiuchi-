<?php
/*
Template Name: about
*/
?>

<?php get_header(); ?>

<div id="barba-wrapper" class="container">
  <main data-namespace="about" class="barba-container">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/about.min.css">

    <div class="area">
      <div class="layoutOuter">
        <div class="areaTitle">
          <h2>Front-End Engineer</h2>
        </div>
        <div class="mainArea">
          <div class="inner">
            <div class="imgArea">
              <p class="mypic"><img src="imgs/.jpg" width="" height="" alt=""></p>
            </div>
            <div class="textArea">
              <dl>
                <dt>1994</dt>
                <dd>京都府福知山市育ち</dd>
                <dt>2013</dt>
                <dd>関西大学外国語学部に入学。1年間アメリカに留学</dd>
                <dt>2017</dt>
                <dd>マーケティング支援会社のエムエム総研に入社。デジタルマーケティング、Webサイトやサービス企画の立案、
                  Webデザイン、フロントエンドコーディングを幅広く担当。</dd>
                <dt>2019</dt>
                <dd>フロントエンジニアとしてWeb制作会社のフォークに転職。並行しながらフリーでWeb案件を担っている。</dd>
              </dl>
              <dl>
                <dt>スキル</dt>
                <dd>HTML5, CSS3, JavaScript, Three.js, WebGL, Node.js, Wordpress</dd>
                <dt>業務領域</dt>
                <dd>Web戦略・企画立案, Webデザイン, コーディング</dd>
                <dt>ツール</dt>
                <dd>Photoshop, Google Analytics, Juicer, Slack, Chatwork, GitHub, Atom</dd>
                <dt>対応言語</dt>
                <dd>日本語, 英語, 韓国</dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<?php get_template_part('nav'); ?>
<?php get_footer(); ?>
