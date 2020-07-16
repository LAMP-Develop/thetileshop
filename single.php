<?php
$home = home_url();
$wp_url = get_template_directory_uri();
get_header(); ?>
<?php if (have_posts()) : the_post();
$id = get_the_ID();
$t = get_the_title();
$p = get_the_permalink();
$categories = get_the_category();
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'large');
}
if (in_category('example')) {
    $exampleImages = SCF::get('exampleImages');
}
?>
<?php endif; ?>
<div id="container" class="event-template-default single single-event">
<!-- #allWrap -->
<div id="allWrap">
<!-- #mathBody -->
<div id="mathBody">
<div class="flexbox">
<!-- .left-column -->
<div class="left-column">
<!-- article -->
<article>
<div class="post_gallery">
<div class="wrap info">
<h1 class="title"><?php echo $t; ?></h1>
<?php if (in_category('example')): ?>
<div class="use">
<p>ここで使われたタイル</p>
<?php
foreach ($exampleImages as $exampleImage) {
    $img_txt = get_post_meta($exampleImage['example_images'], '_wp_attachment_image_alt', false);
    $imgurl = wp_get_attachment_image_src($exampleImage['example_images'], 'thumbnail'); ?>
<a class="tooltip" title="<?php echo $img_txt[0]; ?>"><div class="image"><img src="<?php echo $imgurl[0]; ?>" ></div></a>
<?php
} ?>
</div>
</div>
<?php endif; ?>
<!-- /.wrap.info -->
<div class="date date-top"><span><?php the_time('Y.m.d'); ?></span></div>
<div id="single-mv-gallery">
<img style="width: 100%" src="<?php echo $i; ?>" alt="">
</div>
<!-- /.gallery-top -->
<div id="main" style="margin:3rem 0 0;">
<div class="txt mb5">
<?php the_content(); ?>
</div>

<?php if (in_category('example')): ?>
<div class="more btn categorypage" style="padding:0;border:0;text-align:center;display:block;">
<a href="<?php $home; ?>/example/">タイルの施工例一覧へ</a>
</div>
<?php endif; ?>


<div class="event-report-flow-line">
<h2 class="title -splitText">Recommended<small>おすすめの商品が<br class="for-sp">こちらから購入できます！</small></h2>

<div class="post-list columns columns-5 post-list-news">
<?php
query_posts(array('category_name'=>'tile', 'posts_per_page'=>5, 'post_status'=>'publish'));
if (have_posts()) :
while (have_posts()) : the_post(); usces_the_item();
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
}
$id = get_the_ID();
$t = get_the_title();
$time = get_the_time('Y.m.d');
$p = get_the_permalink();

global $usces;
$sku = $usces->get_skus($id);
?>
<div class="post">
<a href="<?php echo $p; ?>">
<div class="image">
<img src="<?php echo $i; ?>" alt="<?php usces_the_itemName(); ?>">
</div>
</a>
<div class="caption">
<a href="#">
<div class="title"><?php usces_the_itemName(); ?></div>
<div class="price">&yen;<?php echo number_format($sku[0]['cprice']); ?></div>
</a>
</div>
</div>
<!-- /.post -->
<?php endwhile; wp_reset_query(); endif; ?>

</div>
<!-- /.post-list -->

<div class="more btn tile categorypage" style="padding:0;border:0;text-align:center;display:block;">
<a href="/products/">商品一覧はこちら</a>
</div>
</div>

</div>
<!-- /#main -->

<?php if (in_category('example')): ?>
<div class="post-list columns columns-1 for-sp" id="yaml">
<div id="series-const">
<h2 class="series_const_title -splitText">CONSTRUCTIONS<small>タイル施工例</small></h2>
<div>
<?php
$arg = [
  'posts_per_page' => 10,
  'orderby' => 'date',
  'order' => 'DESC',
  'category_name' => 'example'
];
$posts = get_posts($arg);
foreach ($posts as $post):
setup_postdata($post);
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
}
$id = get_the_ID();
$exampleImages = SCF::get('exampleImages');
$t = get_the_title();
$time = get_the_time('Y.m.d');
$p = get_the_permalink(); ?>
<div class="post">
<a href="<?php echo $p; ?>">
<div class="image">
<img src="<?php echo $i; ?>" alt="<?php echo $t; ?>" />
</div>
</a>
<div class="caption">
<a href="<?php echo $p; ?>">
<div class="title"><?php echo $t; ?></div>
<div class="tag-date">
<div class="date"><span><?php echo $time; ?></span></div>
</div>
<div class="desc">
<?php
if (mb_strlen(get_the_content(), 'UTF-8')>200) {
    $content= mb_substr(strip_tags(get_the_content()), 0, 200, 'UTF-8');
    echo $content.'……';
} else {
    echo strip_tags(get_the_content());
}
?>
</div>
</a>
</div>
</div>
<!-- /.post -->
<?php endforeach; wp_reset_postdata(); ?>
</div>
<!-- /.post-list -->
</div>
<!-- / -->
</div>
<!-- /.series-const -->
<?php else: ?>
<div class="post-list columns columns-1 for-sp" id="yaml">
<div id="series-const">
<h2 class="series_const_title -splitText">NEWS &amp; EVENT<small>ザ・タイルショップからのお知らせ</small></h2>
<div>
<?php
$arg = [
  'posts_per_page' => 10,
  'orderby' => 'date',
  'order' => 'DESC',
  'category_name' => 'news'
];
$posts = get_posts($arg);
foreach ($posts as $post):
setup_postdata($post);
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
}
$id = get_the_ID();
$t = get_the_title();
$time = get_the_time('Y.m.d');
$p = get_the_permalink();
?>
<div class="post">
<a href="<?php echo $p; ?>">
<div class="image">
<img src="<?php echo $i; ?>" alt="<?php echo $t; ?>" />
<div class="event-mark">NEWS</div>
</div>
</a>
<div class="caption">
<a href="<?php echo $p; ?>">
<div class="title"><?php echo $t; ?></div>
<div class="tag-date">
<div class="date"><span><?php echo $time; ?></span></div>
</div>
<div class="desc">
<?php
if (mb_strlen(get_the_content(), 'UTF-8')>200) {
    $content= mb_substr(strip_tags(get_the_content()), 0, 200, 'UTF-8');
    echo $content.'……';
} else {
    echo strip_tags(get_the_content());
}
?>
</div>
</a>
</div>
</div>
<!-- /.post -->
<?php endforeach; wp_reset_postdata(); ?>
</div>
<!-- /.post-list -->
</div>
<!-- / -->
</div>
<!-- /.series-const -->
<?php endif; ?>

</div>
<!-- /.post_gallery -->
</article>
<!-- /article -->
</div>
<!-- /.left-column -->

<!-- .right-column -->
<div class="right-column">
<?php if (in_category('example')): ?>
<div class="latest-event sidebar-block">
<h3 class="block-title -splitText">CONSTRUCTIONS<small>タイル施工例</small></h3>
<div class="post-list">
<?php
$arg = [
  'posts_per_page' => 10,
  'orderby' => 'date',
  'order' => 'DESC',
  'category_name' => 'example'
];
$posts = get_posts($arg);
foreach ($posts as $post):
setup_postdata($post);
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
}
$id = get_the_ID();
$t = get_the_title();
$time = get_the_time('Y.m.d');
$p = get_the_permalink(); ?>
<a href="<?php echo $p; ?>">
<div class="post">
<div class="image">
<img src="<?php echo $i; ?>" alt="アクア館" />
</div>
<div class="caption">
<div class="desc">
<p><?php echo $t; ?></p>
</div>
<div class="tag-date2">
<div class="date"><span><?php echo $time; ?></span></div>
</div>
</div>
</div>
</a>
<!-- /.post -->
<?php endforeach; wp_reset_postdata(); ?>
</div>
<!--/.post-list -->
</div>
<?php else: ?>
<div class="latest-event sidebar-block">
<h3 class="block-title -splitText">NEWS &amp; EVENT<small>ザ・タイルショップからのお知らせ</small></h3>
<div class="post-list">
<?php
$arg = [
  'posts_per_page' => 10,
  'orderby' => 'date',
  'order' => 'DESC',
  'category_name' => 'news'
];
$posts = get_posts($arg);
foreach ($posts as $post):
setup_postdata($post);
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
}
$id = get_the_ID();
$t = get_the_title();
$time = get_the_time('Y.m.d');
$p = get_the_permalink(); ?>
<a href="<?php echo $p; ?>">
<div class="post">
<div class="image">
<img src="<?php echo $i; ?>" alt="アクア館" />
<div class="event-mark">NEWS</div>
</div>
<div class="caption">
<div class="desc">
<p><?php echo $t; ?></p>
</div>
<div class="tag-date2">
<div class="date"><span><?php echo $time; ?></span></div>
</div>
</div>
</div>
</a>
<!-- /.post -->
<?php endforeach; wp_reset_postdata(); ?>
</div>
<!--/.post-list -->
</div>
<!--/.latest-event -->
<?php endif; ?>

</div>
<!--/.right-column -->
</div>
</div>
<!--/#mathbody-->
</div>
<!--/#allWrap-->
</div>
<!-- // end #container -->
<?php get_footer();
