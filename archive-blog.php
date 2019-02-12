<?php
/*
Template Name: blog-archive
*/
?>

<?php get_header(); ?>
<div id="barba-wrapper" class="container">
  <main data-namespace="blog" class="barba-container">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/blog.min.css">

    <div class="area">
      <div class="layoutOuter">
        <div class="areaTitle">
          <h2>Blog</h2>
        </div>
        <div class="mainArea">
          <div class="inner">
            <ul class="blog-list">
              <?php
                $args = array(
                  'post_type' => 'blog',
                  'numberposts' => 7
                );
                $customPosts = get_posts($args);
                if($customPosts) : foreach ($customPosts as $post) : setup_postdata($post);
                $loop_count++;
              ?>
              <?php if($loop_count == 1) : ?>
              <li class="blog-index __the-latest">
                <div class="blog-hero-area">
                  <a href="<?php the_permalink(); ?>" class="blog-hero-link">
                    <div class="blog-hero-media" style="background-image: url('<?php the_post_thumbnail_url(); ?>'"></div>
                    <div class="blog-hero-textbox">
                      <div class="blog-hero-titlebox"><span class="blog-hero-titlebox_text"><?php the_title(); ?></span></div>
                      <div class="blog-hero-others">
                        <div class="blog-hero-share">
                          <span class="blog-hero-share_text __number"><?php echo $count; ?>122</span><span class="blog-hero-share_text">pv</span>
                        </div>
                        <div class="blog-hero-category">
                          <span class="blog-hero-category_text">
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
                  </a>
                </div>
              </li>
              <div class="blog-search-area">
                <div class="search-box">
                  <div class="search-box-input-area"><input type="text" class="search-box-input-area_action" name="blog-search" placefolder="キーワードを入力して検索する"></div>
                  <div class="search-box-icon-area"><i class="search-box-icon-area_text fas fa-search"></i></div>
                </div>
              </div>
              <div class="blog-othres-list">
                <?php elseif($loop_count >= 2): ?>
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
                <?php endif;?>
              <?php endforeach; ?>
              </div>
              <?php else: ?> 記事はまだありません。
              <?php endif; wp_reset_postdata(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
<?php get_template_part('nav'); ?>
<?php get_footer(); ?>
