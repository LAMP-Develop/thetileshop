<?php get_header(); ?>
<?php
// $tile = get_category_by_slug('tile');
// $tile_args = array(
// 'hide_empty'=>1,
// 'child_of'=>$tile->term_id,
// 'title_li'=>null
// );
//
// $diy = get_category_by_slug('diy');
// $diy_args = array(
// 'hide_empty'=>1,
// 'child_of'=>$diy->term_id,
// 'title_li'=>null
// );
//
// $pickup = get_category_by_slug('pickup');
// $pickup_args = array(
// 'hide_empty'=>1,
// 'child_of'=>$pickup->term_id,
// 'title_li'=>null
// );

$home = home_url( '/' );
$tile_link = $home . '/archives/category/item/tile';
$diy_link = $home . '/archives/category/diy/tile';
$pickup_link = $home . '/archives/category/pickup/tile';
$tag_link = $home . '/archives/tag';
?>

<div id="categoryIconList" class="">
<div class="category01">
<div class="title"><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_title01.png" width="115" height="27" alt="タイル"></div>
<a href="<?php echo $home; ?>/category/" class="current"><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon1_current.png" alt="すべて"><span><span>すべて</span></span></a>
<a href="<?php echo $tile_link; ?>/interior/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon3.png" alt="インテリア"><span><span>インテリア</span></span></a>
<a href="<?php echo $tile_link; ?>/exterior/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon4.png" alt="エクステリア"><span><span>エクステリア</span></span></a>
<a href="<?php echo $tile_link; ?>/floor/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon18.png" alt="フロアー"><span><span>フロアー</span></span></a>
<a href="<?php echo $tile_link; ?>/creative/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon19.png" alt="クリエイティブ"><span><span>クリエイティブ</span></span></a>
<a href="<?php echo $tile_link; ?>/lifeobject/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon20.png" alt="オブジェ・生活雑貨"><span><span>オブジェ<br>生活雑貨</span></span></a>
<a href="<?php echo $tile_link; ?>/other/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon21.png" alt="その他"><span><span>その他</span></span></a>
</div>

<div class="category02">
<div class="title"><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_title02.png" width="115" height="27" alt="DIY用品"></div>
<a href="<?php echo $diy_link; ?>/adhesives/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon8.png" alt="接着剤"><span><span>接着剤</span></span></a>
<a href="<?php echo $diy_link; ?>/joint/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon9.png" alt="目地材"><span><span>目地材</span></span></a>
<a href="<?php echo $diy_link; ?>/tools/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon10.png" alt="施工道具"><span><span>施工道具</span></span></a>
<a href="<?php echo $diy_link; ?>/other/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon11.png" alt="その他"><span><span>その他</span></span></a>
</div>

<div class="category03">
<div class="title"><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_title03.png" width="115" height="27" alt="ピックアップ"></div>
<a href="<?php echo $pickup_link; ?>/diyset" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon12.png" alt="DIYセット"><span><span>DIYセット</span></span></a>
<a href="<?php echo $diy_link; ?>/rakuraku/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon13.png" alt="らくらく施工キット"><span><span>らくらく<br>施工キット</span></span></a>
<a href="<?php echo $diy_link; ?>/outlet/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon14.png" alt="アウトレット"><span><span>アウトレット</span></span></a>
<a href="<?php echo $diy_link; ?>/limited/" ><img src="<?php bloginfo('stylesheet_directory'); ?>/asset/img/category/category_icon15.png" alt="ストア限定"><span><span>ストア限定</span></span></a>
</div>
</div>
<main class="product">

<section class="product-filter category">
<!-- 静的リンク -->
<ul>
<li class="active"><a href="/products/">すべて</a></li>
<li ><a href="/products/tile/interior/">インテリア</a></li>
<li ><a href="/products/tile/exterior/">エクステリア</a></li>
<li ><a href="/products/tile/floor/">フロアー</a></li>
<li ><a href="/products/tile/creative/">クリエイティブ</a></li>
<li ><a href="/products/tile/object/">オブジェ・生活雑貨</a></li>
<li ><a href="/products/tile/others/">タイル その他</a></li>
<li ><a href="/products/diy/adhesive/">接着剤</a></li>
<li ><a href="/products/diy/jointmaterial/">目地材</a></li>
<li ><a href="/products/diy/tools/">施工道具</a></li>
<li ><a href="/products/diy/others/">DIY用品 その他</a></li>
<li ><a href="/products/pickup/diyset/index.html">DIYセット</a></li>
<li ><a href="/products/pickup/rakuraku/">らくらく施工キット</a></li>
<li ><a href="/products/pickup/outlet/">アウトレット</a></li>
<li ><a href="/products/pickup/store/">ストア限定</a></li>
</ul>
</section>

<section class="product-filter-sp category">
<dl>
<dt>カテゴリー</dt>
<dd>
<label class="pulldown3">
<!-- 選択後にページ遷移-->
<select name="" class="js-link">
<option value="すべて" data-href="/products/" selected=true>すべて</option>
<option value="インテリア" data-href="/products/tile/interior/">インテリア</option>
<option value="エクステリア" data-href="/products/tile/exterior/" >エクステリア</option>
<option value="フロアー" data-href="/products/tile/floor/" >フロアー</option>
<option value="クリエイティブ" data-href="/products/tile/creative/" >クリエイティブ</option>
<option value="オブジェ・生活雑貨" data-href="/products/tile/object/" >オブジェ・生活雑貨</option>
<option value="タイル その他" data-href="/products/tile/others/" >タイル その他</option>
<option value="接着剤" data-href="/products/diy/adhesive/" >接着剤</option>
<option value="目地材" data-href="/products/diy/jointmaterial/" >目地材</option>
<option value="施工道具" data-href="/products/diy/tools/" >施工道具</option>
<option value="DIY用品 その他" data-href="/products/diy/others/" >DIY用品 その他</option>
<option value="DIYセット" data-href="/products/pickup/diyset/" >DIYセット</option>
<option value="らくらく施工キット" data-href="/products/pickup/rakuraku/" >らくらく施工キット</option>
<option value="アウトレット" data-href="/products/pickup/outlet/" >アウトレット</option>
<option value="ストア限定" data-href="/products/pickup/store/" >ストア限定</option>
</select>
</label>
</dd>
</dl>
</section>

<!--<section class="product-sort">
<span class="filter-name">並べ替え</span>
<ul>
<li data-sort="size" class="js-sort-item active">新着順</li>
<li data-sort="shape" class="js-sort-item">価格の安い</li>
<li data-sort="color" class="js-sort-item">価格の高い</li>
</ul>
</section>

<section class="product-sort-sp half">
<dl>
<dt>並べ替え</dt>
<dd>
<label class="pulldown3">
<select name="" class="js-sort-item">
<option value="size">新着順</option>
<option value="shape">価格の安い</option>
<option value="color">価格の高い</option>
</select>
</label>
</dd>
</dl>
</section>-->

<section class="product-filter last">
<span class="filter-name">絞り込み</span>
<ul>
<li data-filter="kind" data-kind="0" class="js-filter-item active">タイルすべて</li>
<li data-filter="kind" data-kind="1" class="js-filter-item">シート</li>
<li data-filter="kind" data-kind="2" class="js-filter-item">ピース</li>
<li data-filter="kind" data-kind="3" class="js-filter-item">セット</li>
</ul>
</section>

<section class="product-filter-sp kind">
<dl>
<dt>絞り込み</dt>
<dd>
<label class="pulldown3">
<select name="" data-filter="kind" class="js-filter-item">
<option value="0">タイルすべて</option>
<option value="1">シート</option>
<option value="2">ピース</option>
<option value="3">セット</option>
</select>
</label>
</dd>
</dl>
</section>

<section class="product-sort">
<span class="filter-name">並べ替え</span>
<ul>
<li data-sort="size" class="js-sort-item">サイズで選ぶ</li>

<li data-sort="shape" class="js-sort-item">形状で選ぶ</li>

<li data-sort="color" class="js-sort-item active">カラーで選ぶ</li>

<!-- #SIZE -->
<!--<div class="side_list_wrap" id="list_size">
<ul class="side_list type01 clearfix">
<li><p><a href="#" class="tooltip" title="小さい順"><span class="icon"><img src="./img/select/icon_smaller.png" alt="" width="28" height="10"></span><span class="menu_text">小さい順</span></a></p></li>
<li><p><a href="#" class="tooltip" title="大きい順"><span class="icon"><img src="./img/select/icon_bigger.png" alt="" width="28" height="10"></span><span class="menu_text">大きい順</span></a></p></li>
</ul>
</div>-->
<!-- #SHAPE -->
<!--<div class="side_list_wrap" id="list_shape">
<ul class="side_list type01 clearfix">
<li><p><a href="#" class="tooltip" title="正方形"><span class="icon"><img src="./img/select/icon_square.png" alt="正方形" width="28" height="10"></span><span class="menu_text">正方形</span></a></p></li>
<li><p><a href="#" class="tooltip" title="長方形"><span class="icon"><img src="./img/select/icon_rectangle.png" alt="長方形" width="28" height="10"></span><span class="menu_text">長方形</span></a></p></li>
<li><p><a href="#" class="tooltip" title="丸型"><span class="icon"><img src="./img/select/icon_circular.png" alt="丸型" width="28" height="10"></span><span class="menu_text">丸型</span></a></p></li>
<li><p><a href="#" class="tooltip" title="多角形"><span class="icon"><img src="./img/select/icon_polygon.png" alt="多角形" width="28" height="10"></span><span class="menu_text">多角形</span></a></p></li>
<li><p><a href="#" class="tooltip" title="立体型"><span class="icon"><img src="./img/select/icon_3dimension.png" alt="立体型" width="28" height="10"></span><span class="menu_text">立体型</span></a></p></li>
<li><p><a href="#" class="tooltip" title="その他"><span class="icon"><img src="./img/select/icon_shape_others.png" alt="その他" width="28" height="10"></span><span class="menu_text">その他</span></a></p></li>
</ul>
</div>-->
<!-- #COLOR -->
<div class="side_list_wrap" id="list-color">
<ul class="clearfix">
<li><div class="colors_wrap"><p><a class="pie tooltip" style="border: 1px solid #e7e7e7; background: #ffffff;" href="#" title="ホワイト系">ホワイト系</a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style=" background: #000000;" href="#" title="ブラック系">ブラック系</a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style=" background: #808080;" href="#" title="グレー系">グレー系</a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style=" background: #ff6666;" href="#" title="ピンク系">ピンク系</a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style=" background: #e60012;" href="#" title="レッド系">レッド系</a></p></div></li><li>
<div class="colors_wrap"><p><a class="pie tooltip" style=" background: #ff9900;" href="#" title="オレンジ系">オレンジ系</a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style=" background: #660000;" href="#" title="ブラウン系">ブラウン系</a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style=" background: #663399;" href="#" title="パープル系">パープル系</a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style=" background: #fff157;" href="#" title="イエロー系">イエロー系</a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style=" background: #339900;" href="#" title="グリーン系">グリーン系</a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style=" background: #0066cc;" href="#" title="ブルー系">ブルー系</a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style=" background: #d1c0a5;" href="#" title="ベージュ系">ベージュ系</a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style="background: none;" href="#" title="窯変"><img src="../assets/img/product/select/icon_yohen.png" alt="窯変" width="18" height="18" /></a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style="background: none;" href="#" title="メタリック系"><img src="../assets/img/product/select/icon_metallic.png" alt="メタリック系" width="18" height="18" /></a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style="background: none;" href="#" title="ミックス"><img src="../assets/img/product/select/icon_mix.png" alt="ミックス" width="18" height="18" /></a></p></div></li>
</ul>
</div>

</ul>
</section>

<section class="product-sort-sp half-l">
<dl>
<dt>サイズで選ぶ</dt>
<dd>
<label class="pulldown3">
<select name="" class="js-sort-item">
<option value="1">小さい順</option>
<option value="2">大きい順</option>
</select>
</label>
</dd>
</dl>
</section>
<section class="product-sort-sp half">
<dl>
<dt>形状で選ぶ</dt>
<dd>
<label class="pulldown3">
<select name="" class="js-sort-item">
<option value="1">正方形</option>
<option value="2">長方形</option>
<option value="3">丸型</option>
<option value="4">多角形</option>
<option value="5">立体型</option>
<option value="6">その他</option>
</select>
</label>
</dd>
</dl>
</section>
<section class="product-sort-sp half-l">
<dl>
<dt>カラーで選ぶ</dt>
<dd>
<label class="pulldown3">
<select name="" class="js-sort-item">
<option value="1">ホワイト系</option>
<option value="2">ブラック系</option>
<option value="3">グレー系</option>
<option value="4">ピンク系</option>
<option value="5">レッド系</option>
<option value="6">オレンジ系</option>
<option value="7">ブラウン系</option>
<option value="8">パープル系</option>
<option value="9">イエロー系</option>
<option value="10">グリーン系</option>
<option value="11">ブルー系</option>
<option value="12">ベージュ系</option>
<option value="13">窯変</option>
<option value="14">メタリック系</option>
<option value="15">ミックス</option>
</select>
</label>
</dd>
</dl>
</section>

<section class="product-list">
<div class="wrapper js-item-list">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); usces_the_item(); ?>
<?php global $post;
$sheet = get_post_meta($post->ID, 'wccs_1シート', true);
$sku_price = usces_the_firstPrice('return',$post);
?>
<div data-sid="1004662" data-kind="1" data-size-order="159" data-size="サイズ：300×300mm" data-shape-order="175" data-shape="形状：正方形" data-color-order="184" data-color="灰" class="js-item-block list item-sid-1004663 ">
<div class="product-img"><a href="<?php the_permalink() ?>" class="button-todetail"><?php usces_the_itemImage(); ?></a></div>
<!-- <div class="product-color">
<ul class="color-variation">
<li class="valiation"><img src="img/item/remove/color-vari.jpg" alt="カラバリ"></li>
</ul>
</div> -->
<div class="product-txt">
<div class="tag-wrap">
</div>
<p class="product-name"><a href="<?php the_permalink() ?>" class="button-todetail"><?php usces_the_itemName(); ?></a></p>
<ul class="product-info">
<li class="valiation">
<p class="tile-type disabled">
<span><?php echo $sheet; ?></span>
</p>
<p><?php the_tags(); ?></p>
<!-- <div class="valiation-list">
<p><span class="valiaton-name">1シート（36個）</span><span class="valiation-price">&yen;194(税別)</span></p>
</div> -->
</li>
<li class="price">
<span class="price-label">販売価格：</span>
<span class="normal-price">&yen;<span class="js-item-price-reference"><?php echo $sku_price; ?></span><small>(税別)</small></span>
</li>
</ul>
</div>
<p class="detail-text js-item-stocks"></p>
</div>
<?php endwhile; endif; ?>

</div>
</section>
</main>
<?php get_footer(); ?>
