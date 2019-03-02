
<?php get_header(); ?>
<div id="barba-wrapper" class="container">
  <main data-namespace="works" class="barba-container">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/works.min.css">

    <div class="area">
      <div class="layoutOuter">
        <div class="areaTitle">
          <h2>Works</h2>
        </div>
        <div class="mainArea">
          <div class="inner">
            <ul class="work-list">
              <?php
                $args = array(
                  'post_type' => 'work',
                  'numberposts' => 6
                );
                $customPosts = get_posts($args);
                if($customPosts) : foreach ($customPosts as $post) : setup_postdata($post);
                $loop_count++;
              ?>
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
            <?php else: ?> 作品はまだありません。
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
