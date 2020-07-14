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
</div>
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
</div>
<!-- /#main -->

<!-- <div id="shop" class="event info">
<h2 class="title">ザ・タイルショップ　キッチンを楽しむタイルワークショップ</h2>
<div>住所：〒501-0000　岐阜県岐阜市○○町0丁目0-0</div>
<div>
会場：岐阜県多治見市文化センター<br />
開催日：2018 年8月21日（火）～ 24日（金）<br />時間：9：00～16：00（最終日は13：00終了）
</div>
<div>お問い合わせ先：ザ・タイルショップ事務局（052-000-0000）</div>
<div>○○：○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</div>
</div> -->
<!-- /#shop -->

<!-- <div class="event-report-flow-line">
<h2 class="title -splitText">DIY SHOPPING<small>この記事に関連している商品が<br class="for-sp" />こちらから購入できます！</small>
</h2>

<div class="post-list columns columns-5 post-list-news">
<div class="post">
<a href="#">
<div class="image">
<img src="../products/img/item/vitamin/01.jpg" alt="ビタミン　オレンジ" />
</div>
</a>
<div class="caption">
<a href="#">
<div class="title">ビタミン　オレンジ</div>
<div class="price">&yen;1,980<span class="tax">（税別）</span></div>
</a>
</div>
</div>

</div>


<div class="more btn tile categorypage">
<a href="/products/">商品一覧はこちら</a>
</div>
</div> -->
<!-- /.event-report-flow-line -->

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
$p = get_the_permalink(); ?>
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
<!-- <div class="excerpt">会場：岐阜県多治見市文化センター。開催日：2018 年8月21日（火）～ 24日（金）予定。</div> -->
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

<!-- <div class="more btn allpage for-sp">
<a href="/news/">お知らせ一覧へ</a>
</div> -->
</div>
<!-- /.post_gallery -->
</article>
<!-- /article -->
</div>
<!-- /.left-column -->

<!-- .right-column -->
<div class="right-column">
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
