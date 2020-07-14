<?php
$home = home_url();
$wp_url = get_template_directory_uri();

get_header(); ?>

<div id="container">
<div id="allWrap">
<!-- #allBody -->
<div id="allBody">

<!-- article -->
<article>

<div class="post_gallery">

<div class="event-report-flow-line">
<h2 class="title -splitText">CONSTRUCTIONS<small>タイル施工例</small></h2>

<div class="post-list columns columns-3 post-list-news">
<?php
if (have_posts()):
while (have_posts()):
the_post();
$exampleImages = SCF::get('exampleImages');
$id = get_the_ID();
$t = get_the_title();
$p = get_the_permalink();
$categories = get_the_category();
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'large');
}
?>
<div class="post">
<a href="<?php echo $p; ?>">
<div class="image">
<?php if(has_post_thumbnail()): ?>
<?php the_post_thumbnail('thumbnail'); ?>
<?php else: ?>
<img src="<?php bloginfo('template_url'); ?>/asset/img/noimage.png" alt="No Image">
<?php endif; ?></div>
</a>
<div class="caption">
<a href="#">
<div class="title"><?php echo $t; ?></div>
</a>
<div class="tag-flags">
<div class="tag-flag">
<p>ここで使われたタイル</p>
<?php
foreach ($exampleImages as $exampleImage ) {
    $imgurl = wp_get_attachment_image_src($exampleImage['example_images'] , 'full');
?>
<a href="#" class="tooltip" title="アクア館　インディゴ"><div class="image"><img src="<?php echo $imgurl[0]; ?>" ></div></a>
<?php } ?>
<!-- <a href="#" class="tooltip" title="アクア館　インディゴ"><div class="image"><img src="../products/img/item/aqa/15.jpg" alt="アクア館　インディゴ"></div></a>
<a href="#" class="tooltip" title="アクア館　パステルオレンジ"><div class="image"><img src="../products/img/item/aqa/02.jpg" alt="アクア館　パステルオレンジ"></div></a>
<a href="#" class="tooltip" title="アクア館　ブラック"><div class="image"><img src="../products/img/item/aqa/09.jpg" alt="アクア館　ブラック"></div></a>
<a href="#" class="tooltip" title="アクア館　ライトグレー"><div class="image"><img src="../products/img/item/aqa/12.jpg" alt="アクア館　ライトグレー"></div></a>
<a href="#" class="tooltip" title="アクア館　ミディアムグレー"><div class="image"><img src="../products/img/item/aqa/13.jpg" alt="アクア館　ミディアムグレー"></div></a>
<a href="#" class="tooltip" title="アクア館　シャドーブルー"><div class="image"><img src="../products/img/item/aqa/28.jpg" alt="アクア館　インディゴ"></div></a>
<a href="#" class="tooltip" title="アクア館　オパール"><div class="image"><img src="../products/img/item/aqa/20.jpg" alt="アクア館　パステルオレンジ"></div></a>
<a href="#" class="tooltip" title="アクア館　アクアグリーン"><div class="image"><img src="../products/img/item/aqa/25.jpg" alt="アクア館　ブラック"></div></a>
<a href="#" class="tooltip" title="アクア館　ターコイズ"><div class="image"><img src="../products/img/item/aqa/34.jpg" alt="アクア館　ライトグレー"></div></a>
<a href="#" class="tooltip" title="アクア館　ミストグリーン"><div class="image"><img src="../products/img/item/aqa/21.jpg" alt="アクア館　ミディアムグレー"></div></a>
<a href="#" class="tooltip" title="アクア館　オリーブグリーン"><div class="image"><img src="../products/img/item/aqa/26.jpg" alt="アクア館　ライトグレー"></div></a>
<a href="#" class="tooltip" title="アクア館　ボトルグリーン"><div class="image"><img src="../products/img/item/aqa/29.jpg" alt="アクア館　ミディアムグレー"></div></a> -->
</div>
</div>
</div>
</div><!-- /.post -->
<?php endwhile; endif; ?>
</div><!-- /.post-list -->
<div class="pagenavigation">
<?php wp_pagenavi(); ?>
</div>
</div><!-- /.event-report-flow-line -->


</div><!-- /.post_gallery -->
</article><!-- /article -->

</div><!--/#allbody-->
</div><!--/#allWrap-->
</div>
<?php get_footer();
