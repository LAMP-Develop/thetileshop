<?php
$home = home_url();
$wp_url = get_template_directory_uri();

get_header();

$tile = get_category_by_slug('tile');
$tile_args = array(
'hide_empty'=>1,
'child_of'=>$tile->term_id,
'title_li'=>null
);

$diy = get_category_by_slug('diy');
$diy_args = array(
'hide_empty'=>1,
'child_of'=>$diy->term_id,
'title_li'=>null
);

$pickup = get_category_by_slug('pickup');
$pickup_args = array(
'hide_empty'=>1,
'child_of'=>$pickup->term_id,
'title_li'=>null
);

$all = $home.'/archives/category/item';
$tile_link = $home . '/archives/category/item/tile';
$diy_link = $home . '/archives/category/item/diy';
$pickup_link = $home . '/archives/category/item/pickup';

$cat = get_queried_object();

// 親のカテゴリーを取得
$cat_parent_id = $cat->parent;
if ($cat_parent_id != 24 && $cat_parent_id != 28 && $cat_parent_id != 29 && $cat_parent_id != 30) {
    $cat_parent = get_category($cat_parent_id);
    $parent_name = $cat_parent->cat_name;
    $parent_slug = $cat_parent->category_nicename;
    $cat_children = get_term_children($cat_parent_id, 'category');
}

$cat_name = $cat->name;
$cat_slug = $cat->category_nicename;
$cat_id = $cat->$cat_ID;
// 現在のページへのリンク
$link = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$cat_link = substr($link, 0, strcspn($link, '?'));

// // シート、ピース、セット
$cat_sheet = $cat_link.'/sheet-'.$cat_slug;
$cat_piece = $cat_link.'/piece-'.$cat_slug;
$cat_set = $cat_link.'/set-'.$cat_slug;
?>
<div id="categoryIconList" class="">
<div class="category01">
<div class="title"><img src="<?php echo $wp_url; ?>/assets/img/common/category_title01.png" width="115" height="27" alt="タイル"></div>
<a href="<?php echo $home; ?>/archives/category/item/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon01.png" alt="すべて"><span><span>すべて</span></span></a>
<a href="<?php echo $home; ?>/archives/category/item/tile/interior/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon02.png" alt="インテリア"><span><span>インテリア</span></span></a>
<a href="<?php echo $home; ?>/archives/category/item/tile/exterior/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon03.png" alt="エクステリア"><span><span>エクステリア</span></span></a>
<a href="<?php echo $home; ?>/archives/category/item/tile/floor/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon04.png" alt="フロアー"><span><span>フロアー</span></span></a>
<a href="<?php echo $home; ?>/archives/category/item/tile/creative/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon05.png" alt="クリエイティブ"><span><span>クリエイティブ</span></span></a>
<a href="<?php echo $home; ?>/archives/category/item/tile/lifeobject/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon06.png" alt="オブジェ・生活雑貨"><span><span>オブジェ<br>生活雑貨</span></span></a>
<a href="<?php echo $home; ?>/archives/category/item/tile/other/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon07.png" alt="その他"><span><span>その他</span></span></a>
</div>

<div class="category02">
<div class="title"><img src="<?php echo $wp_url; ?>/assets/img/common/category_title02.png" width="115" height="27" alt="DIY用品"></div>
<a href="<?php echo $home; ?>/archives/category/item/diy/adhesives/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon08.png" alt="接着剤"><span><span>接着剤</span></span></a>
<a href="<?php echo $home; ?>//archives/category/item/diy/joint/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon09.png" alt="目地材"><span><span>目地材</span></span></a>
<a href="<?php echo $home; ?>/archives/category/item/diy/tools/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon10.png" alt="施工道具"><span><span>施工道具</span></span></a>
<a href="<?php echo $home; ?>/archives/category/item/diy/other-diy/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon11.png" alt="その他"><span><span>その他</span></span></a>
</div>

<div class="category03">
<div class="title"><img src="<?php echo $wp_url; ?>/assets/img/common/category_title03.png" width="115" height="27" alt="ピックアップ"></div>
<a href="<?php echo $home; ?>/archives/category/item/pickup/diyset/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon12.png" alt="DIYセット"><span><span>DIYセット</span></span></a>
<a href="<?php echo $home; ?>/archives/category/item/pickup/rakuraku/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon13.png" alt="らくらく施工キット"><span><span>らくらく<br>施工キット</span></span></a>
<a href="<?php echo $home; ?>/archives/category/item/pickup/outlet/"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon14.png" alt="アウトレット"><span><span>アウトレット</span></span></a>
<a href="<?php echo $home; ?>/archives/category/item/pickup/limited"><img src="<?php echo $wp_url; ?>/assets/img/common/category_icon15.png" alt="ストア限定"><span><span>ストア限定</span></span></a>
</div>
</div>

<main class="product">

<section class="product-filter category">
<!-- 静的リンク -->
<ul>
<li class="active"><a href="<?php echo $home; ?>/archives/category/item/">すべて</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/tile/interior/">インテリア</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/tile/exterior/">エクステリア</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/tile/floor/">フロアー</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/tile/creative/">クリエイティブ</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/tile/lifeobject/">オブジェ・生活雑貨</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/tile/other/">タイル その他</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/diy/adhesive/">接着剤</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/diy/jointmaterial/">目地材</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/diy/tools/">施工道具</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/diy/other-diy/">DIY用品 その他</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/pickup/diyset/">DIYセット</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/pickup/rakuraku/">らくらく施工キット</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/pickup/outlet/">アウトレット</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/pickup/limited">ストア限定</a></li>
</ul>
</section>

<section class="product-filter-sp category">
<dl>
<dt>カテゴリー</dt>
<dd>
<label class="pulldown3">
<!-- 選択後にページ遷移-->
<select name="" class="js-link">
<option value="すべて" data-href="<?php echo $home; ?>/archives/category/item/" selected>すべて</option>
<option value="インテリア" data-href="<?php echo $home; ?>/archives/category/item/tile/interior/">インテリア</option>
<option value="エクステリア" data-href="<?php echo $home; ?>/archives/category/item/tile/exterior/">エクステリア</option>
<option value="フロアー" data-href="<?php echo $home; ?>/archives/category/item/tile/floor/">フロアー</option>
<option value="クリエイティブ" data-href="<?php echo $home; ?>/archives/category/item/tile/creative/">クリエイティブ</option>
<option value="オブジェ・生活雑貨" data-href="<?php echo $home; ?>/archives/category/item/tile/lifeobject/">オブジェ・生活雑貨</option>
<option value="タイル その他" data-href="<?php echo $home; ?>/archives/category/item/tile/other/">タイル その他</option>
<option value="接着剤" data-href="<?php echo $home; ?>/archives/category/item/diy/adhesive/">接着剤</option>
<option value="目地材" data-href="<?php echo $home; ?>/archives/category/item/diy/jointmaterial/">目地材</option>
<option value="施工道具" data-href="<?php echo $home; ?>/archives/category/item/diy/tools/">施工道具</option>
<option value="DIY用品 その他" data-href="<?php echo $home; ?>/archives/category/item/diy/other-diy/">DIY用品 その他</option>
<option value="DIYセット" data-href="<?php echo $home; ?>/archives/category/item/pickup/diyset/">DIYセット</option>
<option value="らくらく施工キット" data-href="<?php echo $home; ?>/archives/category/item/pickup/rakuraku/">らくらく施工キット</option>
<option value="アウトレット" data-href="<?php echo $home; ?>/archives/category/item/pickup/outlet/">アウトレット</option>
<option value="ストア限定" data-href="<?php echo $home; ?>/archives/category/item/pickup/limited">ストア限定</option>
</select>
</label>
</dd>
</dl>
</section>

<!-- <section class="product-filter last">
<span class="filter-name">絞り込み</span>
<ul>
<li data-filter="kind" data-kind="0" class="js-filter-item active">タイルすべて</li>
<li data-filter="kind" data-kind="1" class="js-filter-item">シート</li>
<li data-filter="kind" data-kind="2" class="js-filter-item">ピース</li>
<li data-filter="kind" data-kind="3" class="js-filter-item">セット</li>
</ul>
</section> -->

<!-- <section class="product-filter-sp kind">
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
</section> -->

<!-- <section class="product-sort">
<span class="filter-name">並べ替え</span>
<ul>
<li id="size" class="js-sort-item">サイズで選ぶ</li>
<li id="shape" class="js-sort-item">形状で選ぶ</li>
<li id="color" class="js-sort-item active">カラーで選ぶ</li>
<div class="side_list_wrap none" id="list_shape">
<ul class="side_list type01 clearfix">
<li><p><a href="<?php echo $all; ?>?tag=square" class="tooltip" title="正方形"><span class="icon"><img src="<?php echo $wp_url; ?>/assets/img/category/icon_square.png" alt="正方形" width="28" height="10"></span><span class="menu_text">正方形</span></a></p></li>
<li><p><a href="<?php echo $all; ?>?tag=rectangle" class="tooltip" title="長方形"><span class="icon"><img src="<?php echo $wp_url; ?>/assets/img/category/icon_rectangle.png" alt="長方形" width="28" height="10"></span><span class="menu_text">長方形</span></a></p></li>
<li><p><a href="<?php echo $all; ?>?tag=circular" class="tooltip" title="丸型"><span class="icon"><img src="<?php echo $wp_url; ?>/assets/img/category/icon_circular.png" alt="丸型" width="28" height="10"></span><span class="menu_text">丸型</span></a></p></li>
<li><p><a href="<?php echo $all; ?>?tag=polygon" class="tooltip" title="多角形"><span class="icon"><img src="<?php echo $wp_url; ?>/assets/img/category/icon_polygon.png" alt="多角形" width="28" height="10"></span><span class="menu_text">多角形</span></a></p></li>
<li><p><a href="<?php echo $all; ?>?tag=3dimension" class="tooltip" title="立体型"><span class="icon"><img src="<?php echo $wp_url; ?>/assets/img/category/icon_3dimension.png" alt="立体型" width="28" height="10"></span><span class="menu_text">立体型</span></a></p></li>
<li><p><a href="<?php echo $all; ?>?tag=others" class="tooltip" title="その他"><span class="icon"><img src="<?php echo $wp_url; ?>/assets/img/category/icon_shape_others.png" alt="その他" width="28" height="10"></span><span class="menu_text">その他</span></a></p></li>
</ul>
</div>
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
<li><div class="colors_wrap"><p><a class="pie tooltip" style="background: none;" href="#" title="窯変"><img src="<?php echo $wp_url; ?>/assets/img/product/select/icon_yohen.png" alt="窯変" width="18" height="18" /></a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style="background: none;" href="#" title="メタリック系"><img src="<?php echo $wp_url; ?>/assets/img/product/select/icon_metallic.png" alt="メタリック系" width="18" height="18" /></a></p></div></li>
<li><div class="colors_wrap"><p><a class="pie tooltip" style="background: none;" href="#" title="ミックス"><img src="<?php echo $wp_url; ?>/assets/img/product/select/icon_mix.png" alt="ミックス" width="18" height="18" /></a></p></div></li>
</ul>
</div>
</ul>
</section> -->

<!-- <section class="product-sort-sp half-l">
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
</section> -->

<!-- <section class="product-sort-sp half-l">
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
</section> -->

<section class="product-list">
<div class="wrapper js-item-list">
<?php
if (have_posts()):
while (have_posts()):
the_post();
usces_the_item();
$id = get_the_ID();
$t = get_the_title();
$p = get_the_permalink();
$categories = get_the_category();
$price = archve_price($id);
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'large');
}
?>
<div data-sid="1004662" data-kind="1" data-size-order="159" data-size="サイズ：300×300mm" data-shape-order="175" data-shape="形状：正方形" data-color-order="184" data-color="灰" class="js-item-block list item-sid-1004663 ">
<div class="product-img">
<a href="<?php echo $p; ?>" class="button-todetail">
<img src="<?php echo $i; ?>" alt="リムーブ">
</a>
</div>
<!-- <div class="product-color">
<ul class="color-variation">
<li class="valiation"><img src="<?php echo $wp_url; ?>/products/img/item/remove/color-vari.jpg" alt="カラバリ"></li>
</ul>
</div> -->
<div class="product-txt">
<div class="tag-wrap">
</div>
<p class="product-name"><a href="<?php echo $p; ?>" class="button-todetail"><?php echo $t; ?></a></p>
<ul class="product-info">
<li class="valiation">
<?php $item_info = get_field('item_info'); ?>
<?php if($item_info): ?>
<p class="tile-type disabled"><span><?php echo $item_info; ?></span></p>
<?php endif; ?>
<div class="valiation-list">
<p><span class="valiaton-name"><?php echo $item_info; ?></span><span class="valiation-price">&yen;<?php echo '$price'; ?>(税別)</span></p>
</div>
</li>
<li class="price">
<span class="price-label">販売価格：</span>
<span class="normal-price">&yen;<span class="js-item-price-reference"><?php echo $price; ?></span><small>(税別)</small></span>
</li>
</ul>
</div>
<p class="detail-text js-item-stocks"></p>
</div>
<?php endwhile; endif; ?>
<div class="pagenavigation">
<?php wp_pagenavi(); ?>
</div>
</div>
</section>
</main>

<script>
const shape = document.querySelector('#shape');
const listShape = document.querySelector('#list_shape');
const color = document.querySelector('#color');
const listColor = document.querySelector('#list-color');

shape.addEventListener('click',(e)=>{
if(shape.classList.contains('active')){
console.log(e);
}else{
shape.classList.add("active");
color.classList.remove("active");
listShape.classList.remove("none");
listColor.classList.add("none");
}
});

color.addEventListener('click',(e)=>{
if(color.classList.contains('active')){
console.log(e);
}else{
color.classList.add("active");
shape.classList.remove("active");
listShape.classList.add("none");
listColor.classList.remove("none");
}
});

</script>
<?php get_footer(); ?>
