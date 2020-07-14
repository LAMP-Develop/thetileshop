<?php

// アイキャッチ設定
add_theme_support('post-thumbnails');

// html5許可
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

// oembed消去
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

// wp-json消去
remove_action('template_redirect', 'rest_output_link_header', 11);

// 絵文字消去
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// 外部投稿ツール消去
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// meta generator消去
remove_action('wp_head', 'wp_generator');

// 短縮URL消去
remove_action('wp_head', 'wp_shortlink_wp_head');

// 次の記事消去
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// ウィジェット登録
function arphabet_widgets_init()
{
    register_sidebar([
        'name' => 'サイドバー',
        'id' => 'side-bar',
        'before_widget' => '<div class="sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="sidebar-ttl">',
        'after_title' => '</h3>',
    ]);
}
add_action('widgets_init', 'arphabet_widgets_init');

// メニュー登録
function register_my_menu()
{
    register_nav_menu('header-menu', __('ヘッダーメニュー'));
}
add_action('init', 'register_my_menu');

// エディタースタイル
function wpdocs_theme_add_editor_styles()
{
    add_editor_style('editor-style.css');
}
add_action('admin_init', 'wpdocs_theme_add_editor_styles');

// CSSの読み込み
function add_css_js()
{
    wp_enqueue_style(
        'font-awesome',
        get_template_directory_uri().'/assets/css/font-awesome.min.css',
        [],
        '1.0.0',
        'all'
    );
    wp_enqueue_style(
        'common_styles',
        get_template_directory_uri().'/assets/css/common.css',
        [],
        '1.0.0',
        'all'
    );
    wp_enqueue_style(
        'vendor_styles',
        get_template_directory_uri().'/assets/css/top/style_vendor.min.css',
        [],
        '1.0.0',
        'all'
    );
    wp_enqueue_style(
        'main_styles',
        get_template_directory_uri().'/assets/css/top/style.min.css',
        [],
        '1.0.0',
        'all'
    );
    wp_enqueue_style(
        'cal_styles',
        get_template_directory_uri().'/assets/calender/cal.css',
        [],
        '1.0.0',
        'all'
    );
    wp_enqueue_style(
        'order_styles',
        get_template_directory_uri().'/assets/css/order.css',
        [],
        '1.0.0',
        'all'
    );
    wp_enqueue_style(
        'navi_styles',
        get_template_directory_uri().'/assets/css/navi.css',
        [],
        '1.0.0',
        'all'
    );
    wp_enqueue_style(
        'contact_styles',
        get_template_directory_uri().'/assets/css/contact.css',
        [],
        '1.0.0',
        'all'
    );
    if (is_category() || is_search()) {
        wp_enqueue_style(
            'item_styles',
            get_template_directory_uri().'/assets/css/product.css',
            [],
            '1.0.0',
            'all'
        );
    }
    if (is_page('company') || is_page('tileguide') || is_page('store') || is_page('guide')) {
        wp_enqueue_style(
            'guide_styles',
            get_template_directory_uri().'/assets/css/guide.css',
            [],
            '1.0.0',
            'all'
        );
        wp_enqueue_style(
            'company-shop_styles',
            get_template_directory_uri().'/assets/css/company-shop-guide.css',
            [],
            '1.0.0',
            'all'
        );
    }
    if (is_page('usces-member')) {
        wp_enqueue_style(
            'company-shop_styles',
            get_template_directory_uri().'/assets/css/member.css',
            [],
            '1.0.0',
            'all'
        );
    }
    if (is_single()) {
        wp_enqueue_style(
            'items_styles',
            get_template_directory_uri().'/assets/css/products/tileshop.css',
            [],
            '1.0.0',
            'all'
        );
    }
    if (is_category('example') || in_category('example') || is_category('news') || in_category('news') || is_search()) {
        wp_enqueue_style(
            'example_styles',
            get_template_directory_uri().'/assets/css/constructions.css',
            [],
            '1.0.0',
            'all'
        );
        wp_enqueue_style(
            'bundle_styles',
            get_template_directory_uri().'/assets/css/bundle.css',
            [],
            '1.0.0',
            'all'
        );
    }
}
add_action('wp_enqueue_scripts', 'add_css_js');

// 値段取得
function archve_price($id)
{
    global $usces;
    $skus = $usces->get_skus($id);
    $price = $skus[0]['price'];
    $taxprice = number_format($price);
    return $taxprice ;
}

//関連商品表示に必要な関数
if ( ! function_exists( 'welcart_assistance_excerpt_length' ) ) {
    function welcart_assistance_excerpt_length( $length ) {
        return 10;
    }
}

if ( ! function_exists( 'welcart_assistance_excerpt_mblength' ) ) {
    function welcart_assistance_excerpt_mblength( $length ) {
        return 40;
    }
}

if ( ! function_exists( 'welcart_excerpt_length' ) ) {
    function welcart_excerpt_length( $length ) {
        return 40;
    }
}
add_filter( 'excerpt_length', 'welcart_excerpt_length' );

if ( ! function_exists( 'welcart_excerpt_mblength' ) ) {
    function welcart_excerpt_mblength( $length ) {
        return 110;
    }
}
add_filter( 'excerpt_mblength', 'welcart_excerpt_mblength' );

if ( ! function_exists( 'welcart_continue_reading_link' ) ) {
    function welcart_continue_reading_link() {
        return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">→</span>', 'uscestheme' ) . '</a>';
    }
}

// 検索機能では商品のみを検索するようにする
function wp_search_filter1( $query ) {
    if ( $query->is_search && !is_admin() ){
        $query->set( 'cat', '24' );
    }
    return $query;
}
add_action( 'pre_get_posts', 'wp_search_filter1' );
