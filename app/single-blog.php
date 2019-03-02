<?php
/*
Template Name: blog-single
*/
?>

<?php if( !is_user_logged_in() && !is_bot() ) { set_post_views( get_the_ID() ); } ?>


<?php get_header(); ?>
<div id="barba-wrapper" class="container">
<main data-namespace="blog-single" class="barba-container blog-detail-page">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/blog-detail.min.css">

  <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <article class="blog-contents-area">
    <div class="blog-hero-media" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
      <div class="blog-hero-media-inner">
        <div class="blog-textbox">
          <div class="blog-title">
            <h1 class="blog-title_text"><?php the_title(); ?></h1>
          </div>
          <div class="blog-contents-others">
            <div class="blog-scontents-share">
              <span class="blog-contents-share_text __number"><?php echo $count; ?>122</span><span class="blog-contents-share_text">pv</span>
            </div>
            <div class="blog-ccontents-category">
              <span class="blog-contents-category_text">
              <?php
                $terms = get_the_terms($post->ID, 'blog_taxonomy');
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
    <div class="blog-info-box">
      <div class="blog-search-area">
        <div class="search-box">
          <div class="search-box-input-area"><input type="text" class="search-box-input-area_action" name="blog-search" placefolder="キーワードを入力して検索する"></div>
          <div class="search-box-icon-area"><i class="search-box-icon-area_text fas fa-search"></i></div>
        </div>
      </div>
    </div>
    <div class="blog-main-contents"><?php the_content(); ?></div>
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
  <section class="blog-related-area">
    <div class="blog-related-heading"><span class="blog-related-heading_text">この記事を読んだ人におすすめの記事</span></div>
    <ul class="blog-others-list">
      <?php
        global $post;
        $term = array_shift(get_the_terms($post->ID, 'blog_taxonomy'));
        $args = array(
          'numberposts' => 3,
          'post_type' => 'blog',
          'taxonomy' => 'blog_taxonomy',
          'term' => $term->slug,
          'orderby' => 'rand',
          'post__not_in' => array($post->ID)
        );
        $myPosts = get_posts($args); if($myPosts) : foreach($myPosts as $post) : setup_postdata($post);
      ?>
      <?php print_r($myPost); ?>
      <li class="blog-item __others">
        <a href="<?php the_permalink(); ?>" class="blog-link">
          <div class="blog-media-outer"><div class="blog-media" style="background-image: url('<?php the_post_thumbnail_url(); ?>'"></div></div>
          <div class="blog-textbox">
            <div class="blog-others">
              <div class="blog-share">
                <span class="blog-share_text __number"><?php echo $count; ?>122</span><span class="blog-share_text">pv</span>
              </div>
              <div class="blog-category">
                <span class="blog-category_text">
                <?php
                  $terms = get_the_terms($post->ID, 'blog_taxonomy');
                  foreach ($terms as $term) {
                    $term_name = $term->name;
                  }
                  echo $term_name;
                ?>
                </span>
              </div>
            </div>
            <div class="blog-titlebox"><span class="blog-titlebox_text"><?php the_title(); ?></span></div>
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
