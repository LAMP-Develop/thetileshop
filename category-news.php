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
<h2 class="title -splitText">NEWS &amp; EVENT<small>ザ・タイルショップからのお知らせ</small></h2>

<div class="post-list columns columns-3 post-list-news">
<?php
if (have_posts()):
while (have_posts()):
the_post();
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
<img src="<?php echo $i; ?>" alt="アクア館">
<div class="news-mark">NEWS</div>
</div>
</a>
<div class="caption">
<a href="<?php echo $p; ?>">
<div class="title"><?php echo $t; ?></div>
<div class="tag-date">
<div class="date"><span><?php the_time('Y-m-d'); ?></span></div>
</div>
<div class="desk"><?php
if (mb_strlen(get_the_content(), 'UTF-8')>200) {
    $content= mb_substr(strip_tags(get_the_content()), 0, 200, 'UTF-8');
    echo $content.'……';
} else {
    echo strip_tags(get_the_content());
}
?></div>
</a>
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
