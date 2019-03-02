<?php get_header(); ?>
<div id="barba-wrapper" class="container">
<main data-namespace="works-single" class="barba-container">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/works-detail.min.css">

  <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <article class="work-contents-area">
    <div class="work-hero-media" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
      <div class="work-hero-media-inner">
        <div class="work-textbox">
          <div class="work-title">
            <h1 class="work-title_text"><?php the_title(); ?></h1>
          </div>
          <div class="work-contents-others">
            <div class="work-scontents-share">
              <span class="work-contents-share_text">担当領域：<span class="work-contents-share_text __number"><?php echo get_post_meta($post->ID, 'work-position', true); ?></span></span>
            </div>
            <div class="work-ccontents-category">
              <span class="work-contents-category_text">
              <?php
                $terms = get_the_terms($post->ID, 'work_taxonomy');
                foreach ($terms as $term) {
                  $term_name = $term->name;
                }
                echo $term_name;
              ?>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="work-main-contents"><?php the_content(); ?></div>
  </article>
  <?php endwhile; ?>
  <?php endif; ?>
  <section class="author-area">
    <div class="author-header-block">
      <div class="author-icon-outer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/IMG_8745.JPG" alt="" class="author_icon"></div>
      <div class="author-textbox">
        <span class="author-textbox-label_text">作者紹介</span>
        <span class="author-name_text">仁井内 勇樹</span>
      </div>
    </div>
    <div class="author-main-block">
      <p class="author-main_text">
        マーケターを2年経験した後、フロントエンドエンジニアとしてWEB制作会社に。マーケティング観点からWEB戦略の立案から制作までの仕事を個人で請け負うWEB屋もおこなう。
      </p>
    </div>
  </section>
  <section class="contact-area">
    <div class="contact-area-inner">
      <div class="contact-area_text">WEBサイトにお悩みがある方はご相談に乗りますので気軽にご連絡ください</div>
      <div class="contact-btn"><a href="<?php echo home_url(); ?>/form" class="contact-btn_text">Contact</a></div>
    </div>
  </section>
  <section class="work-related-area">
    <div class="work-related-heading"><span class="work-related-heading_text">他の作品もどうぞ</span></div>
    <ul class="work-others-list">
      <?php
        global $post;
        $args = array(
          'numberposts' => 2,
          'post_type' => 'work',
          'orderby' => 'rand',
          'post__not_in' => array($post->ID)
        );
        $myPosts = get_posts($args); if($myPosts) : foreach($myPosts as $post) : setup_postdata($post);
      ?>
      <?php print_r($myPost); ?>
      <li class="work-item">
        <a href="<?php the_permalink(); ?>" class="work-link">
          <div class="work-media-outer"><img class="work-media_img" src="<?php the_post_thumbnail_url(); ?>"></div>
          <div class="work-textbox">
            <div class="work-textbox-inner">
              <div class="work-titlebox"><span class="work-titlebox_text"><?php the_title(); ?></span></div>
              <div class="work-category">
                <span class="work-category_text">
                <?php
                  $terms = get_the_terms($post->ID, 'work_taxonomy');
                  foreach ($terms as $term) {
                    $term_name = $term->name;
                  }
                  echo $term_name;
                ?>
                </span>
              </div>
            </div>
          </div>
        </a>
      </li>
      <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </section>
</main>
</div>
<?php get_template_part('nav'); ?>
<?php get_footer(); ?>
