<?php get_header(); ?>
<?php $home = home_url(); ?>
<!-- <div class="breadcrumbs l4_breadcrumbs">
<ol><li><a href="<?php echo $home; ?>">TOP</a>&nbsp;&gt;&nbsp;</li><li><a href="<?php echo $home; ?>/recomendation/">オススメ</a></li></ol>
</div> -->
<main class="product">
<h2 class="title -splitText">RECOMMENDED<small>おすすめ商品</small></h2>
<!-- <section class="product-sort pickup last">
<span class="filter-name">並べ替え</span>
<ul>
<li data-sort="diyall" class="js-sort-item active">オススメすべて</li>
<li data-sort="exterior" class="js-sort-item">外壁</li>
<li data-sort="gate" class="js-sort-item">塀や門</li>
<li data-sort="interior" class="js-sort-item">内壁</li>
<li data-sort="floor" class="js-sort-item">屋内床</li>
<li data-sort="craft" class="js-sort-item">クラフト</li>
<li data-sort="others" class="js-sort-item">その他</li>
</ul>
</section> -->

<!-- <section class="product-mark">
<dt><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/product/mark-diy-set.png" alt="かんたんDIYセット"></dt>
<dd>かんたんDIYセットは、予めセットに必要な接着剤の<br>「種類」と「目安量」が組み込まれた商品です。</dd>
</section> -->

<!-- <section class="product-sort-sp half">
<dl>
<dt>並べ替え</dt>
<dd>
<label class="pulldown3">
<select name="" class="js-sort-item">
<option value="diyall">オススメすべて</option>
<option value="exterior">外壁</option>
<option value="gate">塀や門</option>
<option value="interior">内壁</option>
<option value="floor">屋内床</option>
<option value="craft">クラフト</option>
<option value="others">その他</option>
</select>
</label>
</dd>
</dl>
</section>

<section class="product-mark-sp">
<dt>かんたんDIYセット対応商品</dt>
<dd>かんたんDIYセットは、予めセットに必要な接着剤の「種類」と「目安量」が組み込まれた商品です。</dd>
</section> -->

<section class="product-list">
<div class="wrapper js-item-list">

<?php if (have_posts() ) : ?>
<?php while(have_posts() ) : the_post(); usces_the_item();?>
<?php global $post;
$sheet = get_post_meta($post->ID, 'wccs_1シート', true);
$sku_price = usces_the_firstPrice('return',$post);
?>
<!-- <div data-sid="1004507" data-kind="1" data-size-order="159" data-size="サイズ：300×300mm" data-shape-order="175" data-shape="形状：正方形" data-color-order="192" data-color="白" class="js-item-block list soldout">
<div class="product-img"><a href="/" class="button-todetail"><span class="tag limit">次回入荷予定：2018年06月15日</span><img src="../products/img/item/andver/01.jpg" alt="アンドベール"></a></div>
<div class="product-color">
<ul class="color-variation">
<li class="valiation"><img src="../products/img/item/andver/color-vari.jpg" alt="カラバリ"></li>
</ul>
</div>
<div class="product-txt">
<div class="tag-wrap"> <span class="tag limit">次回入荷予定：2018年06月15日</span>
</div>
<p class="product-name"><a href="/" class="button-todetail">アンドベール</a></p>
<ul class="product-info">
<li class="valiation">
<p class="tile-type disabled">
<span>1シート（324個）10×10mm</span>
</p>
<div class="valiation-list">
<p><span class="valiaton-name">1シート（324個）</span><span class="valiation-price">&yen;127(税別)</span></p>
</div>
</li>
<li class="price">
<span class="price-label">販売価格：</span>
<span class="normal-price">&yen;<span class="js-item-price-reference">127</span><small>(税別)</small></span>
</li>
</ul>
</div>
<p class="detail-text js-item-stocks"></p>
</div> -->

<div data-sid="1004170" data-kind="2" data-size-order="134" data-size="サイズ：100×100mm" data-shape-order="175" data-shape="形状：正方形" data-color-order="2" data-color="青" class="js-item-block list item-sid-1004171 bara-image ">
<div class="product-img">
<a href="<?php the_permalink() ?>" class="button-todetail">
<!-- <span class="new">NEW!</span> -->
<!-- <span class="tag reserve">1枚入</span>
<span class="mark diy-set tooltip" title="接着剤と目地材の目安量が自動で算出されます">かんたんDIYセット</span> -->
<?php if(has_post_thumbnail()): ?>
<?php the_post_thumbnail('thumbnail'); ?>
<?php else: ?>
<img src="<?php bloginfo('template_url'); ?>/asset/img/noimage.png" alt="No Image">
<?php endif; ?>
</a></div>
<div class="product-color">
<ul class="color-variation">
<!-- <li class="valiation"><img src="../products/img/item/togaku/color-vari.jpg" alt="カラバリ"></li> -->
</ul>
</div>
<div class="product-txt">
<!-- <div class="tag-wrap"><span class="tag">NEW!</span> <span class="tag reserve">1枚入</span></div> -->
<p class="product-name"><a href="<?php the_permalink() ?>" class="button-todetail"><?php the_title(); ?></a></p>
<ul class="product-info">
<li class="valiation">
<?php $item_info = get_field('item_info'); ?>
<?php if($item_info): ?>
<p class="tile-type disabled">
<span><?php echo $item_info; ?></span>
</p>
<?php endif; ?>
<div class="valiation-list">
<p><span class="valiaton-name">1枚</span><span class="valiation-price">&yen;<?php echo $sku_price; ?>(税別)</span></p>
</div>
</li>
<li class="price">
<span class="price-label">販売価格：</span>
<span class="normal-price">&yen;<span class="js-item-price-reference"><?php echo $sku_price; ?></span><small>(税別)</small></span>
</li>
</ul>
<div class="tag-wrap"> <span class="mark diy-set">かんたんDIYセット対応商品</span></div>
</div>
<p class="detail-text js-item-stocks"></p>
</div>
<?php endwhile; endif; ?>
</div>
</section>
<div class="mb10">
<div class="pagenavigation">
<?php wp_pagenavi(); ?>
</div>
</div>
</main>
<?php get_footer(); ?>
