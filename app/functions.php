<?php

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
// Embed WPのブログカード。他サイトのアイキャッチ画像や抜粋自動埋め込み
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

// 管理画面絵文字削除
function disable_emoji()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emoji');

function pagename_class($classes = '') {
if(is_page()) {
    $page = get_post(get_the_ID());
    $classes[] = $page->post_name .' page_' .$page->post_name;
}
return $classes;
}
add_filter('body_class','pagename_class');

//プラグインの自動更新を有効化
add_filter( 'auto_update_plugin', '__return_true' );
//テーマの自動更新を有効化
add_filter( 'auto_update_theme', '__return_true' );
//メジャーアップグレードの自動更新を有効化
add_filter( 'allow_major_auto_core_updates', '__return_true' );
//マイナーアップグレードの自動更新を有効化
add_filter( 'allow_minor_auto_core_updates', '__return_true' );


// 概要の文字数調整
function my_excerpt_length($length) {
    return 80;
}
add_filter('excerpt_length', 'my_excerpt_length');

// 文末の[...]を削除し変更
function my_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'my_excerpt_more');

// コメント ウェブサイトの入力欄を消す
add_filter('comment_form_default_fields', 'mytheme_remove_url');
function mytheme_remove_url($arg) {
$arg['url'] = '';
return $arg;
}

// コメント フォーム内のURLオートリンクを停止する
remove_filter('comment_text', 'make_clickable');

// コメント カスタマイズ コールバック関数
function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>

        <!-- 日付 -->
        <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
            <?php
            /* translators: 1: date, 2: time */
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
            ?>
        </div>

        <!-- アバター -->
        <div class="flex">
            <div class="comment-author vcard">
                <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </div>
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
                <br />
            <?php endif; ?>
            <!-- 内容 -->
            <div class="comment-content">
                <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
                <?php comment_text(); ?>
            </div>
        </div>

        <!-- 返信ボタン -->
    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
    }


?>
