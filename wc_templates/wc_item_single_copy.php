<?php
$home = home_url();
$wp_url = get_template_directory_uri();
get_header();

if (have_posts()) : the_post();
usces_remove_filter();
usces_the_item();

$item_id = the_ID();
$item_cats = get_the_category($item_id);
$adhesives_search = array_search("adhesives", array_column($item_cats,'slug'));
$joint_search = array_search("joint", array_column($item_cats,'slug'));
?>

<div id="container">
<div class="products-title">
<span class="title"><?php usces_the_itemName(); ?></span>
</div>

<div id="content" class="clearfix">
<div id="left">
<div id="primary">
<div id="prodInfo">
<h4 class="tittypedot">
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_size_JP.gif" alt="商品画像" title="商品画像">
</h4>

<p id="goodssize"><img src="<?php echo $wp_url; ?>/assets/img/product/4545.gif" alt="商品画像" title="商品画像"></p>

<p id="shortComment"></p>
</div>

<div id="subImages" class="dotarea">
<h4 class="tittypedot">
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_image_JP.gif" alt="商品画像" title="商品画像">
</h4>
<!-- 商品画像 -->
<?php
$imageid = usces_get_itemSubImageNums();
?>
<ul id="prodThumbImgs">
<!-- <li><a id="first_side_img" href="javascript:void(0)"><img src="<?php usces_the_itemImageURL(); ?>"></a></li> -->
<?php foreach ($imageid as $key => $val): ?>
<li id="side_image_list" class="<?php usces_the_itemImageCaption( $val ); ?>"><a id="side_image" href="javascript:void(0)"><?php usces_the_itemImage($val, 150, 150); ?></a></li>
<?php endforeach; ?>
</ul>

</div>
</div>


<!-- start center contents // -->
<div id="secondary">
<!-- start main image // -->
<div id="prodMainImg">
<div id="prodImgDefault">
<img alt="" src="<?php usces_the_itemImageURL(); ?>">
</div>
</div>
<!-- // end main image -->

<!-- <div class="R-text"><span class="text-caption">画像ごとにキャプションを入れられます。</span></div> -->

<!-- start item detail // -->
<a name="02"></a>
<div id="prodDetail" class="contProd">
<div class="L4_tittype02">
<dl id="prodSelectColor" class="selectAttr">
<!-- <dt id="selectColorTitle">
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_color_JP.gif" alt="カラー・バリエーションを選択" title="カラー・バリエーションを選択" >
<p class="current">カラー:&nbsp;23 ワイン</p>
<p class="number">
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_number_JP.gif" alt="商品番号" title="商品番号">
<span class="prodNo">商品番号：</span><span class="prodNumber">SB45-23</span>
</p>
</dt> -->
<!-- <dd id="selectColorDetail">
<ul id="listChipColor" class="listChip clearfix">
<li color="00" class="">
<div class="chipCover" color="00" title="ホワイト"></div>
<a href="#colorSelect" title="ホワイト">
<img alt="ホワイト" src="<?php echo $wp_url; ?>/products/img/item/aqa/16.jpg">
</a>
</li>
</ul>
</dd> -->
</dl>
</div>
<div class="L-text">
<span class="text-content"></span>
</div>

<div class="hidden_box">
<label class="see-the-details" for="label1">この商品について詳しくみる</label>
<input type="checkbox" id="label1">
<div class="hidden_show">
<!--非表示ここから-->
<div class="jis_wrap">
<div class="navi help applist">
<a href="#" class="zocial black" data-text="屋内壁に最適です"><img src="<?php echo $wp_url; ?>/assets/img/product/jis/01_ok.png" alt="屋内壁に最適">屋内壁</a>
<a href="#" class="zocial black" data-text="屋内床に適しません"><img src="<?php echo $wp_url; ?>/assets/img/product/jis/02_no.png" alt="屋内床に適しません">屋内床</a>
<a href="#" class="zocial black" data-text="浴室壁に最適です"><img src="<?php echo $wp_url; ?>/assets/img/product/jis/07_ok.png" alt="浴室壁に最適です">浴室壁</a>
<a href="#" class="zocial black" data-text="浴室床に適しません"><img src="<?php echo $wp_url; ?>/assets/img/product/jis/03_no.png" alt="浴室床に適しません">浴室床</a>
<a href="#" class="zocial black" data-text="屋外壁に最適です"><img src="<?php echo $wp_url; ?>/assets/img/product/jis/04_ok.png" alt="屋外壁に最適です">屋外壁</a>
<a href="#" class="zocial black" data-text="屋外床に適しません"><img src="<?php echo $wp_url; ?>/assets/img/product/jis/05_no.png" alt="屋外床に適しません">屋外床</a>
<a href="#" class="zocial blue" data-text="凍害に耐性があります"><img src="<?php echo $wp_url; ?>/assets/img/product/jis/06.png" alt="凍害に耐性があります">耐凍害</a>
<!-- <h4>種類／BⅠ類（磁器質） 施ゆう <a href="#">JIS規定用途表示について</a> -->
</h4>
</div>
</div>
<!-- common.cssでスタイリング -->
<div class="content">
</div>
<!--ここまで-->
</div>
</div>
</div>
<!-- // end item detail -->
</div>
<!-- // end center contents -->
</div>
<!-- // end left-all contents -->

<!-- start right contents // -->
<?php if (is_int($adhesives_search)): ?>
<div id="tertiary">
<dl class="selectAttr">
<dt><img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_price_JP.gif" alt="商品価格" title="商品価格"></dt>
<dd>
<ul class="basic">
<li id="price"><span class="original_price"><?php usces_the_itemCprice(); ?></span>&nbsp;<span class="tax">円/&nbsp;本（税別）</span></li>
</ul>
</dd>
</dl>

<dl class="selectAttr glay">
<dt><img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_modal_JP.png" alt="在庫状況" title="在庫状況"></dt>
<dd>
<ul class="basic">
<li id="modal"><?php usces_the_itemZaikoNum(); ?><span class="unit">&nbsp;本</span></li>
</ul>
</dd>
</dl>
<form name="form1" id="" method="post" action="">
<div class="imput">
<span class="text-must">は必須項目です。</span>
<dl class="selectAttr-must">
<dt>
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_quantity2_JP.gif" alt="数量の入力" title="数量の入力">
</dt>
<dd>
<ul class="basic">
<li>
<li>
<span>数量</span>&nbsp;<span id="countup" style="display:inline"><?php usces_the_itemQuant(); ?></span>&nbsp;<span>セット</span>
<a class="price-up">
<img src="<?php echo $wp_url; ?>/assets/img/product/item/up.png"></a>
<a class="price-down">
<img src="<?php echo $wp_url; ?>/assets/img/product/item/down.png"></a>
</li>
</li>
<!-- <li class="m2_unit">この商品は<span><?php usces_the_itemSkuUnit(); ?></span>単位での販売となります</li> -->
</ul>
<!-- <ul class="m2_basic">
<li class="m2">
<span class="auto"><img src="<?php echo $wp_url; ?>/assets/img/product/m2.png" alt="面積計算" title="面積計算" >&nbsp;タイルを張る面積で自動計算</span><span class="question">
<a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" title="疑問・質問"></a></span>
</li>
<li class="m2_bow">
<span>面積</span>&nbsp;<input type="text" name="area" class="" maxlength="6">&nbsp;<span>m&sup2;</span>
</li>
<li class="m2_annotation">
<span class="auto">※面積計算結果は参考の数値となります。少し多めに算出されるようになっております。</span>
</li>
</ul> -->
</dd>
</dl>
<dl class="selectAttr-pay">
<dt><img src="<?php echo $wp_url; ?>/assets/img/product/tit_pay_JP.gif" alt="お支払金額" title="お支払金額"></dt>
<dd>
<ul class="basic3">
<li class="pay1"><span><img src="<?php echo $wp_url; ?>/assets/img/product/bgr_front_en2.gif" alt="金額" title="金額"></span>&nbsp;金額：<span><strong class="pay_price"><?php usces_the_itemCprice(); ?></strong>円</span>（税別）</li>
<li class="pay2"><span class="track"><img src="<?php echo $wp_url; ?>/assets/img/product/bgr_front_track2.gif" alt="配送料" title="配送料"></span>&nbsp;配送料：&nbsp;<span><strong>3,000</strong>円</span></li>
</ul>
<ul class="freeshopping">
<li><span><img src="<?php echo $wp_url; ?>/assets/img/product/bgr_front_track.gif" alt="送料" title="送料"></span><span>あと</span>&nbsp;<span><strong class="haisou_price"></strong>円</span>で送料無料</li>
</ul>
<p class="freeshopping-bana"><img src="<?php echo $wp_url; ?>/assets/img/product/freeshopping.png" alt="お買い上げ合計10,000円以上で送料無料" title="お買い上げ合計10,000円以上で送料無料"></p>
</dd>
</dl>
<div><p class="text-deliverydate">最短のお届予定日：2018/08/30<span><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/btn_delivery_JP.gif" class="pc-only" alt="お届け予定日について" title="お届け予定日について"></a></span></p></div>
<div class="button-add-cart"><a href="javascript:void(0);" data-sid="1005067" data-quantity="19" class="js-cart-putIn">カートにいれる</a></div>
<div class="button-add-clip"><a href="javascript:void(0);" data-sid="1005067" data-quantity="19" class="js-cart-putIn">ほしいものリストに保存する</a></div>
<div class="R-text"><span class="text-login">リストの保存には<a href="">ログイン</a>が必要です。</span></div>
</div><br>
</form>

<!-- <div class="adhesive-next">
<p><a href="#">接着剤</a>・<a href="#">目地材</a>（目地幅:5mm）を自動で計算します</p>
</div> -->

<!-- おすすめ接着剤・おすすめ目地材 // -->
<!-- <form name="form2" id="" method="post" action="">
<div class="imput2">
<div class="adhesive">
<dl class="selectAttr">
<dt>
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_adhesive_JP.gif" alt="接着剤" title="接着剤">&nbsp;<span
class="question"
><a href="#"
>接着剤とは&nbsp;<img
src="<?php echo $wp_url; ?>/assets/img/product/question.png"
alt="疑問・質問"
title="疑問・質問"></a
></span>
</dt>
<dd>
<ul class="indication">
<li>接着剤の目安量&nbsp;<span class="amount">0</span>&nbsp;<span class="kilogram">kg</span></li>
</ul>
</dd>
</dl>
</div>
<div class="jointmaterial">
<dl class="selectAttr">
<dt>
<img
src="<?php echo $wp_url; ?>/assets/img/product/tit_jointmaterial_JP.gif"
alt="目地材"
title="目地材"
>&nbsp;<span class="question"
><a href="#"
>目地材とは&nbsp;<img
src="<?php echo $wp_url; ?>/assets/img/product/question.png"
alt="疑問・質問"
title="疑問・質問"></a
></span>
</dt>
<dd>
<ul class="indication">
<li>目地材の目安量&nbsp;<span class="amount">0</span>&nbsp;<span class="kilogram">kg</span></li>
</ul>
</dd>
</dl>
</div>
</div>
</form> -->
</div>
<?php elseif (is_int($joint_search)): ?>
<div id="tertiary">
<dl class="selectAttr">
<dt><img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_price_JP.gif" alt="商品価格" title="商品価格"></dt>
<dd>
<ul class="basic">
<li id="price"><span class="original_price"><?php usces_the_itemCprice(); ?></span>&nbsp;<span class="tax">円/&nbsp;セット（税別）</span></li>
</ul>
</dd>
</dl>

<dl class="selectAttr glay">
<dt><img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_modal_JP.png" alt="在庫状況" title="在庫状況"></dt>
<dd>
<ul class="basic">
<li id="modal"><?php usces_the_itemZaikoNum(); ?><span class="unit">&nbsp;セット</span></li>
</ul>
</dd>
</dl>
<form name="form1" id="" method="post" action="">
<div class="imput">
<span class="text-must">は必須項目です。</span>
<dl class="selectAttr-must">
<dt>
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_quantity2_JP.gif" alt="数量の入力" title="数量の入力">
</dt>
<dd>
<ul class="basic">
<li>
<span>数量</span>&nbsp;<span id="countup" style="display:inline"><?php usces_the_itemQuant(); ?></span>&nbsp;<span>セット</span>
<a class="price-up">
<img src="<?php echo $wp_url; ?>/assets/img/product/item/up.png"></a>
<a class="price-down">
<img src="<?php echo $wp_url; ?>/assets/img/product/item/down.png"></a>
</li>
<!-- <li class="m2_unit">この商品は<span><?php usces_the_itemSkuUnit(); ?></span>単位での販売となります</li> -->
</ul>
<!-- <ul class="m2_basic">
<li class="m2">
<span class="auto"><img src="<?php echo $wp_url; ?>/assets/img/product/m2.png" alt="面積計算" title="面積計算" >&nbsp;タイルを張る面積で自動計算</span><span class="question">
<a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" title="疑問・質問"></a></span>
</li>
<li class="m2_bow">
<span>面積</span>&nbsp;<input type="text" name="area" class="" maxlength="6">&nbsp;<span>m&sup2;</span>
</li>
<li class="m2_annotation">
<span class="auto">※面積計算結果は参考の数値となります。少し多めに算出されるようになっております。</span>
</li>
</ul> -->
</dd>
</dl>
<dl class="selectAttr-pay">
<dt><img src="<?php echo $wp_url; ?>/assets/img/product/tit_pay_JP.gif" alt="お支払金額" title="お支払金額"></dt>
<dd>
<ul class="basic3">
<li class="pay1"><span><img src="<?php echo $wp_url; ?>/assets/img/product/bgr_front_en2.gif" alt="金額" title="金額"></span>&nbsp;金額：<span><strong class="pay_price"><?php usces_the_itemCprice(); ?></strong>円</span>（税別）</li>
<li class="pay2"><span class="track"><img src="<?php echo $wp_url; ?>/assets/img/product/bgr_front_track2.gif" alt="配送料" title="配送料"></span>&nbsp;配送料：&nbsp;<span><strong>3,000</strong>円</span></li>
</ul>
<ul class="freeshopping">
<li><span><img src="<?php echo $wp_url; ?>/assets/img/product/bgr_front_track.gif" alt="送料" title="送料"></span><span>あと</span>&nbsp;<span><strong class="haisou_price"></strong>円</span>で送料無料</li>
</ul>
<p class="freeshopping-bana"><img src="<?php echo $wp_url; ?>/assets/img/product/freeshopping.png" alt="お買い上げ合計10,000円以上で送料無料" title="お買い上げ合計10,000円以上で送料無料"></p>
</dd>
</dl>
<div><p class="text-deliverydate">最短のお届予定日：2018/08/30<span><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/btn_delivery_JP.gif" class="pc-only" alt="お届け予定日について" title="お届け予定日について"></a></span></p></div>
<div class="button-add-cart">
<a href="javascript:void(0);" data-sid="1005067" data-quantity="19" class="js-cart-putIn"><?php usces_the_itemSkuButton(__('Add to Shopping Cart', 'usces'), 0); ?></a>
</div>
<div class="button-add-clip">
<a href="javascript:void(0);" data-sid="1005067" data-quantity="19" class="js-cart-putIn">ほしいものリストに保存する</a>
</div>
<div class="R-text">
<span class="text-login">リストの保存には<a href="">ログイン</a>が必要です。</span>
</div>
</div><br>
</form>

<!-- <div class="adhesive-next">
<p><a href="#">接着剤</a>・<a href="#">目地材</a>（目地幅:5mm）を自動で計算します</p>
</div> -->

<!-- おすすめ接着剤・おすすめ目地材 // -->
<!-- <form name="form2" id="" method="post" action="">
<div class="imput2">
<div class="adhesive">
<dl class="selectAttr">
<dt>
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_adhesive_JP.gif" alt="接着剤" title="接着剤">&nbsp;<span
class="question"
><a href="#"
>接着剤とは&nbsp;<img
src="<?php echo $wp_url; ?>/assets/img/product/question.png"
alt="疑問・質問"
title="疑問・質問"></a
></span>
</dt>
<dd>
<ul class="indication">
<li>接着剤の目安量&nbsp;<span class="amount">0</span>&nbsp;<span class="kilogram">kg</span></li>
</ul>
</dd>
</dl>
</div>
<div class="jointmaterial">
<dl class="selectAttr">
<dt>
<img
src="<?php echo $wp_url; ?>/assets/img/product/tit_jointmaterial_JP.gif"
alt="目地材"
title="目地材"
>&nbsp;<span class="question"
><a href="#"
>目地材とは&nbsp;<img
src="<?php echo $wp_url; ?>/assets/img/product/question.png"
alt="疑問・質問"
title="疑問・質問"></a
></span>
</dt>
<dd>
<ul class="indication">
<li>目地材の目安量&nbsp;<span class="amount">0</span>&nbsp;<span class="kilogram">kg</span></li>
</ul>
</dd>
</dl>
</div>
</div>
</form> -->
</div>
<?php endif; ?>

<!-- // end right contents -->
</div>
<!-- // end contents -->
</div>

<?php endif; ?>
<script>
let price = document.querySelector('.original_price').textContent;
price = price.replace(/[^0-9]/g, '');
document.querySelector('.haisou_price').textContent = 10000 - Number(price);

$('.price-up').on('click', function() {
let val = $('#countup input').val();
++val;
$('#countup input').val(val);
let totalPrice = price*val;
document.querySelector('.pay_price').textContent = totalPrice;
if (10000 - Number(totalPrice) > 0) {
document.querySelector('.haisou_price').textContent = 10000 - Number(totalPrice);
} else {
document.querySelector('.haisou_price').textContent = 0;
}
});

$('.price-down').on('click', function() {
let val = $('#countup input').val();
if (val > 1) {
--val;
let totalPrice = price*val;
document.querySelector('.pay_price').textContent = totalPrice;
if (10000 - Number(totalPrice) > 0) {
document.querySelector('.haisou_price').textContent = 10000 - Number(totalPrice);
} else {
document.querySelector('.haisou_price').textContent = 0;
}}
$('#countup input').val(val);
});

// 画像リサイズ
let side_images = document.querySelectorAll('#side_image');
let first_side_img = document.querySelector('#first_side_img');
let main_img = document.querySelector('#prodImgDefault');
$(first_side_img).on('click', function(e){
let first_img_src = ($(e.target).attr('src'));
$(main_img).children('img').attr('src',first_img_src);
})
$(side_images).each(function(index,element){
$(element).on('click',function(e){
let img_src = ($(e.target).attr('src'));
img_src = img_src.replace('-150x150.','.');
$(main_img).children('img').attr('src',img_src);
});
});
</script>
<?php get_footer();
