<?php
$home = home_url();
$wp_url = get_template_directory_uri();
?>
<?php get_header(); ?>
<div id="searchSP">
<div class="input-area">
<label><input type="text" name="search" placeholder="商品検索" tabindex="-1"></label>
<span class="close-button"></span>
</div>
<dl></dl>
</div>

<div class="siteContainer">
<main class="">
<div class="kvImg">
<div class="kvImg__inner">
<div class="kvImg__slider">
<div class="kvImg__item -slider01"></div>
<div class="kvImg__item -slider02"></div>
<div class="kvImg__item -slider03"></div>
<div class="kvImg__item -slider04"></div>
<div class="kvImg__item -slider05"></div>
</div>
<div class="kvImg__heading">
<span class="kvImg__link">
<div class="kvImg__headingInner">
<p class="kvImg__title -en">ONLINE TILE SHOP</p>
<p class="kvImg__title -ja">「DIY」にも「リフォーム」にも<br>タイルが手軽に買えるオンラインショップ。​</p>
</div>
</span>
</div>

<div class="info kvImg__news">
<div class="info__inner">
<div class="info__header">
<p class="info__title">
<span class="info__title-en -shopsize">New Arrival</span>
<span class="info__title-ja">新着情報</span>
</p>
</div>
<div class="info__content kvImg__newsContent" id="scrollContainer">
<ul class="info__list">
<!-- 最新10個の記事まで表示 -->
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
<li class="info__item">
<a href="<?php echo $p; ?>">
<p class="info_thumb"><img src="<?php echo $i; ?>" alt="<?php echo $t; ?>"></p>
<p class="info__meta"><span class="category -shopsize">Interior</span><span class="date"><?php echo $time; ?></span></p>
<p class="info__name -clamp"><?php echo $t; ?></p>
<p class="info__price -clamp">&yen;<?php the_field('news_price', $id); ?><span class="tax">（税別）</span></p>
<p class="info__text -clamp"><?php
if (mb_strlen(get_the_content(), 'UTF-8') > 100) {
    $content= mb_substr(strip_tags(get_the_content()), 0, 100, 'UTF-8');
    echo $content.'…';
} else {
    echo strip_tags(get_the_content());
}
?></p>
</a>
</li>
<?php endforeach; wp_reset_postdata(); ?>
</ul>
</div>
<div class="info__footer">
<a href="<?php echo $home; ?>/archives/category/news" class="info__moreBtn -shopsize">Read More</a>
</div>
</div>
</div>
<!-- /.kvImg__news -->
</div>
</div>
<!-- /.kvImg -->

<div class="calender">
<script src="<?php echo $wp_url; ?>/assets/calender/cal.js" charset="UTF-8"></script>
<p class="calender__Text">※商品のご発送は営業時間内でのご対応となります。</p>
</div>

<?php // get_template_part('templates/feature');?>

<section class="feature -news for-sp">
<div class="feature__header">
<h2 class="feature__title -splitText">New Arrival</h2>
<p class="feature__subTitle">新着情報</p>
</div>
<div class="info">
<div class="info__inner">
<div class="info__content">
<ul class="info__list">
<!-- 最新3個の記事まで表示 -->
<?php
$arg = [
  'posts_per_page' => 3,
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
<li class="info__item">
<a href="<?php echo $p; ?>">
<div class="info_thumb"><img src="<?php echo $i; ?>" alt="<?php echo $t; ?>"></div>
<p class="info__meta">
<span class="category -shopsize">Interior</span><span class="date"><?php echo $time; ?></span>
</p>
<p class="info__name -clamp"><?php echo $t; ?></p>
<p class="info__price -clamp">&yen;<?php the_field('news_price', $id); ?><span class="tax">（税別）</span></p>
<p class="info__text -clamp"><?php
if (mb_strlen(get_the_content(), 'UTF-8') > 100) {
    $content= mb_substr(strip_tags(get_the_content()), 0, 100, 'UTF-8');
    echo $content.'…';
} else {
    echo strip_tags(get_the_content());
}
?></p>
</a>
</li>
<?php endforeach; wp_reset_postdata(); ?>
</ul>
</div>
<div class="info__footer">
<a href="<?php echo $home; ?>/archives/category/news" class="btn -large -white">もっと見る</a>
</div>
</div>
</div>
</section>
<!-- /.feature -->

<section class="feature -pickup -gray-sp">
<div class="feature__header">
<h2 class="feature__title -splitText">Pickup</h2>
<p class="feature__subTitle">オススメの商品をご紹介いたします。</p>
<div class="pickupCarousel__nav swiper-pagination"></div>
</div>
<div class="swiper-container pickupCarousel">
<div class="pickupCarousel__mask"></div>
<div class="swiper-wrapper pickupCarousel__list">
<?php
$arg = [
  'posts_per_page' => 5,
  'orderby' => 'date',
  'order' => 'DESC',
  'category_name' => 'itemreco'
];
$posts = get_posts($arg);
foreach ($posts as $post):
setup_postdata($post);
usces_the_item();
usces_have_skus();
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'middle');
}
$id = get_the_ID();
$price = archve_price($id);
$t = get_the_title();
$time = get_the_time('Y.m.d');
$p = get_the_permalink(); ?>
<div class="swiper-slide pickupCarousel__item">
<a href="<?php echo $p; ?>"><img src="<?php echo $i; ?>" alt="<?php echo $t; ?>"></a>
<p class="pickup__itemname"><?php echo $t; ?></p>
<p class="pickup__price">&yen;<?php echo $price; ?><span class="tax">（税別）</span></p>
</div>
<?php endforeach; wp_reset_postdata(); ?>
</div>
<div class="swiper-button swiper-button-next"><span></span></div>
<div class="swiper-button swiper-button-prev"><span></span></div>
</div>
<!-- /.carousel -->
</section>
<!-- /.feature -->
<div class="footer">
<div class="footer__cotnact">
<a href="<?php echo $home; ?>/usces-member/" target="_blank" class="footer__cotnactLink">
<p class="footer__cotnactTitle -splitText">Members</p>
<p class="footer__contactSummary">
メンバー登録していただくと「お気に入りリスト」などがご利用いただけます。
</p>
<div class="btnContainer">
<span class="btn -tileText -light"><span>Tile Shop Members</span></span>
</div>
</a>
</div>
</div>
<!-- /.footer -->
<!-- /.container -->
</div>

<div class="kvImg_preload">
<img src="<?php echo $wp_url; ?>/assets/img/top/kv-01.jpg" alt="">
<img src="<?php echo $wp_url; ?>/assets/img/top/kv-01-sp.jpg" alt="">
<img src="<?php echo $wp_url; ?>/assets/img/top/kv-02.jpg" alt="">
<img src="<?php echo $wp_url; ?>/assets/img/top/kv-02-sp.jpg" alt="">
<img src="<?php echo $wp_url; ?>/assets/img/top/kv-03.jpg" alt="">
<img src="<?php echo $wp_url; ?>/assets/img/top/kv-03-sp.jpg" alt="">
<img src="<?php echo $wp_url; ?>/assets/img/top/kv-04.jpg" alt="">
<img src="<?php echo $wp_url; ?>/assets/img/top/kv-04-sp.jpg" alt="">
<img src="<?php echo $wp_url; ?>/assets/img/top/kv-05.jpg" alt="">
<img src="<?php echo $wp_url; ?>/assets/img/top/kv-05-sp.jpg" alt="">
</div>
<?php get_footer(); ?>
