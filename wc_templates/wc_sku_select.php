<?php
$home = home_url();
$wp_url = get_template_directory_uri();
get_header();

if (have_posts()) : the_post();
usces_remove_filter();
usces_the_item();
usces_have_skus();
$item_id = get_the_ID();
$the_categoeries = get_the_category($item_id);
// 商品の単位
$product_tanni = '枚';
// 現在表示しているアイテムがタイルかどうか判定するフラッグ
$tile_flag = false;
// 接着剤
$adhesive_flag = false;
// 目地材
$joint_flag = false;
// pickup
$pickup_flag = false;
foreach ($the_categoeries as $key => $the_categoery) {
    if ($the_categoery->slug === 'tile') {
        $mi = (float)get_field('tile_must');
        $tate = (float)get_field('tile_tate');
        $yoko = (float)get_field('tile_yoko');
        $haba = 0.5;
        $atsu = (float)get_field('tile_atsu');
        $hijyu = (float)get_field('tile_hijyu');
        $losu = (float)get_field('tile_losu');
        // 目地材始まり
        // $Aタイル一枚あたりの目地体積
        $A = (($tate + $haba) * ($yoko + $haba) * $atsu) - ($tate * $yoko * $atsu);
        // ＄B目地幅込の一平方メートルあたりの仕様数量
        $B = 10000 / ($mi * 10);
        // ＄C一平方メートルあたりの目地面積
        $C = $A * $B;
        // ＄D一平方メートルあたりの必要目地面積
        $D = $C * $hijyu;
        // ＄Eユーザー情報提供の一平方メートルあたりの必要目地量(ｇ)
        $E = ($D * $losu) / 1000;
        // 目地材終わり

        // 接着剤始まり
        // $aユーザー情報提供の一平方メートルあたりの必要接着材料（ｇ）
        $a = (2.4 * $mi) / 1000;
        // 接着剤終わり
        // タイルのフラッグをたてる
        $tile_flag = true;
    }
    // 接着剤のページ
    if ($the_categoery->slug === 'adhesives') {
        $adhesive_flag = true;
    }
    // 目地材のページ
    if ($the_categoery->slug === 'joint') {
        $joint_flag = true;
    }
    // pickupのページ
    if ($the_categoery->slug === 'pickup') {
        $pickup_flag = true;
    }
}
if (!$tile_flag) {
    $mi = 0;
    $tate = 0;
    $yoko = 0;
    $haba = 0;
    $atsu = 0;
    $hijyu = 0;
    $losu = 0;
    $A = 0;
    $B = 0;
    $C = 0;
    $D = 0;
    $E = 0;
    $a = 0;
}
?>
<div id="container">
<div class="products-title">
<span class="title"><?php usces_the_itemName(); ?></span>
</div>

<div id="content" class="clearfix">
<div id="left">
<div id="primary">
<?php if (get_field('tile_sunpo')): ?>
<div id="prodInfo">
<h4 class="tittypedot">
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_size_JP.gif" alt="商品画像" title="商品画像">
</h4>
<p id="goodssize"><img src="<?php echo get_field('tile_sunpo'); ?>" alt="寸法"></p>
</div>
<?php endif; ?>

<div id="subImages" class="dotarea">
<h4 class="tittypedot">
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_image_JP.gif" alt="商品画像" title="商品画像">
</h4>
<!-- 商品画像 -->
<?php
$imageid = usces_get_itemSubImageNums();
?>
<ul id="prodThumbImgs">
<?php foreach ($imageid as $key => $val): ?>
<li id="side_image_list" class="<?php usces_the_itemImageCaption($val); ?>"><a id="side_image" href="javascript:void(0)"><?php usces_the_itemImage($val, 150, 150); ?></a></li>
<?php endforeach; ?>
</ul>
</div>
</div>

<!-- start center contents // -->
<div id="secondary">
<!-- start main image // -->
<div id="prodMainImg">
<div id="prodImgDefault">
<img src="<?php usces_the_itemImageURL(); ?>">
</div>
</div>
<!-- // end main image -->

<!-- <div class="R-text"><span class="text-caption">画像ごとにキャプションを入れられます。</span></div> -->

<!-- start item detail // -->
<div id="prodDetail" class="contProd">
<div class="hidden_box">
<label class="see-the-details" for="label1">この商品について詳しくみる</label>
<input type="checkbox" id="label1">
<div class="hidden_show">
<div class="content">
<?php the_content(); ?>
</div>
</div>
</div>
</div>
<!-- // end item detail -->
</div>
<!-- // end center contents -->
</div>
<!-- // end left-all contents -->

<!-- start right contents // -->
<div id="tertiary">
<dl class="selectAttr">
<dt><img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_price_JP.gif" alt="商品価格" title="商品価格"></dt>
<dd>
<ul class="basic">
<li id="price"><span class="original_price"><?php number_format(usces_the_itemCprice()); ?></span>&nbsp;<span class="tax">円/&nbsp;<?php echo $product_tanni; ?>（税別）</span></li>
</ul>
</dd>
</dl>

<dl class="selectAttr glay">
<dt><img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_modal_JP.png" alt="在庫状況" title="在庫状況"></dt>
<dd>
<ul class="basic">
<li id="modal"><?php usces_the_itemZaikoNum(); ?><span class="unit">&nbsp;<?php echo $product_tanni ?></span></li>
</ul>
</dd>
</dl>

<form action="<?php echo USCES_CART_URL; ?>" method="post">
<div id="skuform" class="skuform">
<div class="imput">
<span class="text-must">は必須項目です。</span>
<dl class="selectAttr-must">
<dt>
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_select_quantity2_JP.gif" alt="数量の入力" title="数量の入力">&nbsp;<span>数量を面積から計算することも出来ます。</span>
</dt>
<dd>
<ul class="basic">
<li>
<span>数量</span>&nbsp;<span id="countup" style="display:inline"><?php usces_the_itemQuant(); ?></span>&nbsp;<span>枚</span>
<a class="price-up">
<img src="<?php echo $wp_url; ?>/assets/img/product/item/up.png"></a>
<a class="price-down">
<img src="<?php echo $wp_url; ?>/assets/img/product/item/down.png"></a>
</li>
</ul>
<?php if ($tile_flag): ?>
<ul class="m2_basic">
<li class="m2">
<span class="auto"><img src="<?php echo $wp_url; ?>/assets/img/product/m2.png" alt="面積計算" title="面積計算" >&nbsp;タイルを張る面積で自動計算</span>
<span class="question jidoukeisan" title="">
<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問">
</span>
</li>
<li class="m2_bow">
<span>面積</span>&nbsp;<input id="menseki" type="text" name="area" class="" value="<?php echo round(1 / $mi, 3); ?>" maxlength="6">&nbsp;<span>m&sup2;</span>
</li>
<li class="m2_annotation">
<span class="auto">※面積計算結果は参考の数値となります。少し多めに算出されるようになっております。</span>
</li>
</ul>
<?php endif; ?>
</dd>
</dl>
<div>
<div class="mt1">
<?php wcex_sku_select_form(); ?>
</div>
<dl class="selectAttr-pay">
<dt><img src="<?php echo $wp_url; ?>/assets/img/product/tit_pay_JP.gif" alt="お支払金額" title="お支払金額"></dt>
<dd>
<ul class="basic3">
<li class="pay1"><span><img src="<?php echo $wp_url; ?>/assets/img/product/bgr_front_en2.gif" alt="金額" title="金額"></span>&nbsp;金額：<span><strong class="pay_price"><?php usces_the_itemCprice(); ?></strong>円</span>（税別）</li>
<li class="pay2"><span class="track"><img src="<?php echo $wp_url; ?>/assets/img/product/bgr_front_track2.gif" alt="配送料" title="配送料"></span>&nbsp;配送料：&nbsp;<span><strong class="haisouryo">3,000</strong>円</span></li>
</ul>
<ul class="freeshopping">
<li><span><img src="<?php echo $wp_url; ?>/assets/img/product/bgr_front_track.gif" alt="送料" title="送料"></span><span>あと</span>&nbsp;<span><strong class="haisou_price"></strong>円</span>で送料無料</li>
</ul>
<p class="freeshopping-bana"><img src="<?php echo $wp_url; ?>/assets/img/product/freeshopping.png" alt="お買い上げ合計10,000円以上で送料無料" title="お買い上げ合計10,000円以上で送料無料"></p>
</dd>
</dl>
<p class="text-deliverydate">最短のお届予定日：2018/08/30<span><a href="<?php echo $home; ?>/guide/"><img src="<?php echo $wp_url; ?>/assets/img/product/btn_delivery_JP.gif" class="pc-only" alt="お届け予定日について" title="お届け予定日について"></a></span></p>
</div>
<div class="button-add-cart">
<a href="javascript:void(0);" data-sid="1005067" data-quantity="19" class="js-cart-putIn"><?php usces_the_itemSkuButton(__('Add to Shopping Cart', 'usces'), 0); ?></a>
</div>
<div class="button-add-clip">
<a href="javascript:void(0);" data-sid="1005067" data-quantity="19" class="js-cart-putIn">ほしいものリストに保存する</a>
</div>
<div class="R-text">
<span class="text-login">リストの保存には<a href="">ログイン</a>が必要です。</span>
</div>
</div>
<br>
</div>
</form>

<?php if ($tile_flag): ?>
<div class="adhesive-next">
<p><a href="#">接着剤</a>・<a href="#">目地材</a>（目地幅:5mm）を自動で計算します</p>
</div>

<!-- おすすめ接着剤・おすすめ目地材 // -->
<form name="form2" id="" method="post" action="">
<div class="imput2">
<div class="adhesive">
<dl class="selectAttr">
<dt>
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_adhesive_JP.gif" alt="接着剤" title="接着剤">&nbsp;<span class="question">
<a href="#">接着剤とは&nbsp;<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="adhesivetoha" title=""></a>
</span>
</dt>
<dd>
<ul class="indication">
<li>接着剤の目安量&nbsp;<span class="amount adhesive_amount"><?php echo round($a * (1 / $mi), 3); ?></span>&nbsp;<span class="kilogram">kg</span></li>
</ul>
</dd>
</dl>
</div>
<div class="jointmaterial">
<dl class="selectAttr">
<dt>
<img src="<?php echo $wp_url; ?>/assets/img/product/tit_jointmaterial_JP.gif" alt="目地材" title="目地材">&nbsp;<span class="question">
<a href="#">目地材とは&nbsp;<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="jointtoha" title=""></a>
</span>
</dt>
<dd>
<ul class="indication">
<li>目地材の目安量&nbsp;<span class="amount joint_amount"><?php echo round($E * (1 / $mi), 3); ?></span>&nbsp;<span class="kilogram">kg</span></li>
</ul>
</dd>
</dl>
</div>

<div class="order">

<div class="tabs">
<input id="tab-1" type="radio" name="tab-radio" checked>
<label class="tab-label ml15" for="tab-1">外壁</label>

<input id="tab-2" type="radio" name="tab-radio">
<label class="tab-label" for="tab-2">塀や門</label>

<input id="tab-3" type="radio" name="tab-radio">
<label class="tab-label" for="tab-3">内壁</label>

<input id="tab-4" type="radio" name="tab-radio">
<label class="tab-label" for="tab-4">屋内床</label>

<input id="tab-5" type="radio" name="tab-radio">
<label class="tab-label" for="tab-5">クラフト</label>

<!-- /.tab-1 外壁 -->
<div class="tab-content tab-1-content">
<div class="use1">
<div class="use-title">用　途</div>
<span class="use-question"><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="youtotoha" title=""></a></span>
<ul>
<li class="exterior01">住宅外壁・RC造・SRC造</li><li class="exterior01">住宅外壁・S造</li><li class="exterior01">住宅外壁・木造</li>
</ul>
</div>
<div class="use">
<div class="use-title">下地の種類</div>
<span class="use-question"><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="syuruitoha" title=""></a></span>
<ul>
<li class="concrete">コンクリート</li>
<li class="mortar">モルタル</li>
<li class="concrete">プレキャストコンクリートパネル</li>
<li class="alcpanel">ALCパネル</li>
<li class="siding">窯業系サイディング</li>
</ul>
</div>
<section class="purchase">
<ul>
<li class="head">
<ul>
<!-- <li class="check">選択</li> -->
<li class="name">商品名</li>
<li class="unit">販売単位</li>
<li class="price">税抜単価</li>
<!-- <li class="quantity">個数</li> -->
<!-- <li class="amount">合計量</li> -->
</ul>
</li>
<?php
$recoAdhesiveGaiheki = (int)get_field('reco_adhesive_gaiheki');
$recoAdhesiveHoriyamon = (int)get_field('reco_adhesive_horiyamon');
$recoAdhesiveNaiheki = (int)get_field('reco_adhesive_naiheki');
$recoAdhesiveOkunaisyou = (int)get_field('reco_adhesive_okunaisyou');
$recoAdhesiveCraft = (int)get_field('reco_adhesive_craft');
$recoJointGaiheki = (int)get_field('reco_joint_gaiheki');
$recoJointHoriyamon = (int)get_field('reco_joint_horiyamon');
$recoJointNaiheki = (int)get_field('reco_joint_naiheki');
$recoJointOkunaisyou = (int)get_field('reco_joint_okunaishou');
$recoJointCraft = (int)get_field('reco_joint_craft');
?>
<!-- 外壁 -->
<?php
$post1 = get_post($recoAdhesiveGaiheki);

global $usces;
$sku = $usces->get_skus($recoAdhesiveGaiheki);
?>
<li class="js-cart-item">
<ul>
<!-- <li class="check">
<label class="checkbox">
<input type="checkbox" name="prod-choice" checked="checked" value="この商品を選択する" data-input="0">
</label>
</li> -->
<li class="pic"><?php echo get_the_post_thumbnail($recoAdhesiveGaiheki); ?></li>
<li class="name">
<a href="<?php echo get_the_permalink($recoAdhesiveGaiheki); ?>">
<p class="osusume">おすすめ接着剤</p>
<h3><?php echo $post1->post_title; ?></h3>
</a>
</li>
<li class="unit">2kg</li>
<li class="price">&yen;<?php echo number_format($sku[0]['cprice']); ?></li>
<!-- <p class="adhesive-color sp-only">
<label class="radio">
<input type="radio" name="adhesive1" value="1" checked data-input="1"><span class="white">オフホワイト</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="2"  data-input="1"><span class="beige">ベージュ</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="3"  data-input="1"><span class="gray">グレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="4"  data-input="1"><span class="darkgray">ダークグレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="5"  data-input="1"><span class="black">ブラック</span>
</label>
</p> -->
<!-- <li class="quantity">
<input type="text" name="" value="68" class="quantity">
</li> -->
<!-- <li class="amount total"><span>136</span>kg</li> -->
</ul>
<!-- <p class="adhesive-color pc-only">
<label class="radio">
<input type="radio" name="adhesive2" value="1" checked data-input="1"><span class="white">オフホワイト</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="2"  data-input="1"><span class="beige">ベージュ</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="3"  data-input="1"><span class="gray">グレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="4"  data-input="1"><span class="darkgray">ダークグレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="5"  data-input="1"><span class="black">ブラック</span>
</label>
</p> -->
</li>

<?php
$post2 = get_post($recoJointGaiheki);
global $usces;
$sku = $usces->get_skus($recoJointGaiheki);
?>
<li class="js-cart-item">
<ul>
<!-- <li class="check">
<label class="checkbox">
<input type="checkbox" name="prod-choice" checked="checked" value="この商品を選択する" data-input="1">
</label>
</li> -->
<li class="pic"><?php echo get_the_post_thumbnail($recoJointGaiheki); ?></li>
<li class="name">
<a href="<?php echo get_the_permalink($recoJointGaiheki); ?>">
<p class="osusume">おすすめ目地材</p>
<h3><?php echo $post2->post_title; ?></h3>
</a>
</li>
<li class="unit">0.2kg</li>
<li class="price">&yen;<?php echo number_format($sku[0]['cprice']); ?></li>
<!-- <p class="adhesive-color sp-only">
<label class="radio">
<input type="radio" name="jointmaterial1" value="1" checked data-input="1"><span class="white">白</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="2"  data-input="1"><span class="gray">灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="3"  data-input="1"><span class="darkgray">濃灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="4"  data-input="1"><span class="black">黒</span>
</label>
</p> -->
<!-- <li class="quantity">
<input type="text" name="" value="525" class="quantity">
</li> -->
<!-- <li class="amount total"><span>106</span>kg</li> -->
</ul>
<!-- <p class="adhesive-color pc-only">
<label class="radio">
<input type="radio" name="jointmaterial2" value="1" checked data-input="1"><span class="white">白</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="2"  data-input="1"><span class="gray">灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="3"  data-input="1"><span class="darkgray">濃灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="4"  data-input="1"><span class="black">黒</span>
</label>
</p> -->
</li>

</ul>
<p class="annotation">※接着剤・目地材の計算結果は参考の数量となります。少し多めに算出されるようになっております。</p>
</section>

<!-- <ul class="basic3">
<li class="pay1"><span><img src="../../assets/img/product/bgr_front_en.gif" alt="金額" title="金額"></span>&nbsp;金額：<span><strong>256,750</strong>円</span>（税別）</li>
<li class="pay2"><span class="track"><img src="../../assets/img/product/bgr_front_track.gif" alt="配送料" title="配送料"></span>&nbsp;配送料：&nbsp;<span><strong>0</strong>円</span></li>
</ul> -->
</div><!-- /.tab-1 外壁 -->

<!-- .tab-2 塀や門 -->
<div class="tab-content tab-2-content">
<div class="use1">
<div class="use-title">用　途</div>
<span class="use-question"><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="youtotoha" title=""></a></span>
<ul>
<li class="gate">ブロック塀</li><li class="gate">門柱・RC造・モルタル</li>
</ul>
</div>
<div class="use">
<div class="use-title">下地の種類</div>
<span class="use-question"><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="syuruitoha" title=""></a></span>
<ul>
<li class="concrete">コンクリート</li>
<li class="mortar">モルタル</li>
</ul>
</div>
<section class="purchase">
<ul>
<li class="head">
<ul>
<!-- <li class="check">選択</li> -->
<li class="name">商品名</li>
<li class="unit">販売単位</li>
<li class="price">税抜単価</li>
<!-- <li class="quantity">個数</li> -->
<!-- <li class="amount">合計量</li> -->
</ul>
</li>

<?php
$post3 = get_post($recoAdhesiveHoriyamon);
global $usces;
$sku = $usces->get_skus($recoAdhesiveHoriyamon);
?>
<li class="js-cart-item">
<ul>
<!-- <li class="check">
<label class="checkbox">
<input type="checkbox" name="prod-choice" checked="checked" value="この商品を選択する" data-input="0">
</label>
</li> -->
<li class="pic"><?php echo get_the_post_thumbnail($recoAdhesiveHoriyamon); ?></li>
<li class="name">
<a href="<?php echo get_the_permalink($recoAdhesiveHoriyamon); ?>">
<p class="osusume">おすすめ接着剤</p>
<h3><?php echo $post3->post_title; ?></h3>
</a>
</li>
<li class="unit">2kg</li>
<li class="price">&yen;<?php echo number_format($sku[0]['cprice']); ?></li>
<!-- <p class="adhesive-color sp-only">
<label class="radio">
<input type="radio" name="adhesive1" value="1" checked data-input="1"><span class="white">オフホワイト</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="2"  data-input="1"><span class="beige">ベージュ</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="3"  data-input="1"><span class="gray">グレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="4"  data-input="1"><span class="darkgray">ダークグレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="5"  data-input="1"><span class="black">ブラック</span>
</label>
</p> -->
<!-- <li class="quantity">
<input type="text" name="" value="68" class="quantity">
</li>
<li class="amount total"><span>136</span>kg</li> -->
</ul>
<!-- <p class="adhesive-color pc-only">
<label class="radio">
<input type="radio" name="adhesive2" value="1" checked data-input="1"><span class="white">オフホワイト</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="2"  data-input="1"><span class="beige">ベージュ</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="3"  data-input="1"><span class="gray">グレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="4"  data-input="1"><span class="darkgray">ダークグレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="5"  data-input="1"><span class="black">ブラック</span>
</label>
</p> -->
</li>

<?php
$post4 = get_post($recoJointHoriyamon);
global $usces;
$sku = $usces->get_skus($recoJointHoriyamon);
?>
<li class="js-cart-item">
<ul>
<!-- <li class="check">
<label class="checkbox">
<input type="checkbox" name="prod-choice" checked="checked" value="この商品を選択する" data-input="1">
</label>
</li> -->
<li class="pic"><?php echo get_the_post_thumbnail($recoJointHoriyamon); ?></li>
<li class="name">
<a href="<?php echo get_the_permalink($recoJointHoriyamon); ?>">
<p class="osusume">おすすめ目地材</p>
<h3><?php echo $post4->post_title; ?></h3>
</a>
</li>
<li class="unit">0.2kg</li>
<li class="price">&yen;<?php echo number_format($sku[0]['price']); ?></li>
<!-- <p class="adhesive-color sp-only">
<label class="radio">
<input type="radio" name="jointmaterial1" value="1" checked data-input="1"><span class="white">白</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="2"  data-input="1"><span class="gray">灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="3"  data-input="1"><span class="darkgray">濃灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="4"  data-input="1"><span class="black">黒</span>
</label>
</p> -->
<!-- <li class="quantity">
<input type="text" name="" value="525" class="quantity">
</li>
<li class="amount total"><span>106</span>kg</li> -->
</ul>
<!-- <p class="adhesive-color pc-only">
<label class="radio">
<input type="radio" name="jointmaterial2" value="1" checked data-input="1"><span class="white">白</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="2"  data-input="1"><span class="gray">灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="3"  data-input="1"><span class="darkgray">濃灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="4"  data-input="1"><span class="black">黒</span>
</label>
</p> -->
</li>
</ul>
<p class="annotation">※接着剤・目地材の計算結果は参考の数量となります。少し多めに算出されるようになっております。</p>
</section>

<!-- <ul class="basic3">
<li class="pay1"><span><img src="../../assets/img/product/bgr_front_en.gif" alt="金額" title="金額"></span>&nbsp;金額：<span><strong>256,750</strong>円</span>（税別）</li>
<li class="pay2"><span class="track"><img src="../../assets/img/product/bgr_front_track.gif" alt="配送料" title="配送料"></span>&nbsp;配送料：&nbsp;<span><strong>0</strong>円</span></li>
</ul> -->
</div><!-- /.tab-2 塀や門 -->

<!-- .tab-3 内壁 -->
<div class="tab-content tab-3-content">
<div class="use1">
<div class="use-title">用　途</div>
<span class="use-question youtotoha" title=""><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" class="youtotoha" title=""></a></span>
<ul>
<li class="interior">非水まわり諸室</li><li class="interior">キッチン</li><li class="interior">洗面脱衣室</li><li class="interior">浴室・シャワー室</li><li class="interior">トイレ</li>
</ul>
</div>
<div class="use">
<div class="use-title">下地の種類</div>
<span class="use-question"><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="syuruitoha" title=""></a></span>
<ul>
<li class="gypsumboard">石膏ボード</li>
<li class="s-gypsumboard">シーリング石膏ボード</li>
<li class="plywood">合板（一種・特類）</li>
<li class="ps-board">けい酸カリウム板</li>
<li class="cementboard">セメントボード</li>
</ul>
</div>
<section class="purchase">
<ul>
<li class="head">
<ul>
<!-- <li class="check">選択</li> -->
<li class="name">商品名</li>
<li class="unit">販売単位</li>
<li class="price">税抜単価</li>
<!-- <li class="quantity">個数</li> -->
<!-- <li class="amount">合計量</li> -->
</ul>
</li>
<?php
$post5 = get_post($recoAdhesiveNaiheki);
global $usces;
$sku = $usces->get_skus($recoAdhesiveNaiheki);
?>
<li class="js-cart-item">
<ul>
<!-- <li class="check">
<label class="checkbox">
<input type="checkbox" name="prod-choice" checked="checked" value="この商品を選択する" data-input="0">
</label>
</li> -->
<li class="pic"><?php echo get_the_post_thumbnail($recoAdhesiveNaiheki); ?></li>
<li class="name">
<a href="<?php echo get_the_permalink($recoAdhesiveNaiheki); ?>">
<p class="osusume">おすすめ接着剤</p>
<h3><?php echo $post5->post_title; ?></h3>
</a>
</li>
<li class="unit">2kg</li>
<li class="price">&yen;<?php echo number_format($sku[0]['cprice']); ?></li>
<!-- <p class="adhesive-color sp-only">
<label class="radio">
<input type="radio" name="adhesive1" value="1" checked data-input="1"><span class="white">オフホワイト</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="2"  data-input="1"><span class="beige">ベージュ</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="3"  data-input="1"><span class="gray">グレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="4"  data-input="1"><span class="darkgray">ダークグレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="5"  data-input="1"><span class="black">ブラック</span>
</label>
</p> -->
<!-- <li class="quantity">
<input type="text" name="" value="68" class="quantity">
</li>
<li class="amount total"><span>136</span>kg</li> -->
</ul>
<!-- <p class="adhesive-color pc-only">
<label class="radio">
<input type="radio" name="adhesive2" value="1" checked data-input="1"><span class="white">オフホワイト</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="2"  data-input="1"><span class="beige">ベージュ</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="3"  data-input="1"><span class="gray">グレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="4"  data-input="1"><span class="darkgray">ダークグレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="5"  data-input="1"><span class="black">ブラック</span>
</label>
</p> -->
</li>

<?php
$post6 = get_post($recoJointNaiheki);
global $usces;
$sku = $usces->get_skus($recoJointNaiheki);
?>
<li class="js-cart-item">
<ul>
<!-- <li class="check">
<label class="checkbox">
<input type="checkbox" name="prod-choice" checked="checked" value="この商品を選択する" data-input="1">
</label>
</li> -->
<li class="pic"><?php echo get_the_post_thumbnail($recoJointNaiheki); ?></li>
<li class="name">
<a href="<?php echo get_the_permalink($recoJointNaiheki); ?>">
<p class="osusume">おすすめ目地材</p>
<h3><?php echo $post6->post_title; ?></h3>
</a>
</li>
<li class="unit">0.2kg</li>
<li class="price">&yen;<?php echo number_format($sku[0]['cprice']); ?></li>
<!-- <p class="adhesive-color sp-only">
<label class="radio">
<input type="radio" name="jointmaterial1" value="1" checked data-input="1"><span class="white">白</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="2"  data-input="1"><span class="gray">灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="3"  data-input="1"><span class="darkgray">濃灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="4"  data-input="1"><span class="black">黒</span>
</label>
</p> -->
<!-- <li class="quantity">
<input type="text" name="" value="525" class="quantity">
</li>
<li class="amount total"><span>106</span>kg</li> -->
</ul>
<!-- <p class="adhesive-color pc-only">
<label class="radio">
<input type="radio" name="jointmaterial2" value="1" checked data-input="1"><span class="white">白</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="2"  data-input="1"><span class="gray">灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="3"  data-input="1"><span class="darkgray">濃灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="4"  data-input="1"><span class="black">黒</span>
</label>
</p> -->
</li>

</ul>
<p class="annotation">※接着剤・目地材の計算結果は参考の数量となります。少し多めに算出されるようになっております。</p>
</section>

<!-- <ul class="basic3">
<li class="pay1"><span><img src="../../assets/img/product/bgr_front_en.gif" alt="金額" title="金額"></span>&nbsp;金額：<span><strong>256,750</strong>円</span>（税別）</li>
<li class="pay2"><span class="track"><img src="../../assets/img/product/bgr_front_track.gif" alt="配送料" title="配送料"></span>&nbsp;配送料：&nbsp;<span><strong>0</strong>円</span></li>
</ul> -->
</div><!-- /.tab-3 内壁 -->

<!-- .tab-4 屋内床 -->
<div class="tab-content tab-4-content">
<div class="use1">
<div class="use-title">用　途</div>
<span class="use-question"><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="youtotoha" title=""></a></span>
<ul>
<li class="floor">玄関</li><li class="floor">室内</li>
</ul>
</div>
<div class="use">
<div class="use-title">下地の種類</div>
<span class="use-question"><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="syuruitoha" title=""></a></span>
<ul>
<li class="concrete">コンクリート</li>
<li class="mortar">モルタル</li>
<li class="plywood">合板（一種・特類）</li>
</ul>
</div>
<section class="purchase">
<ul>
<li class="head">
<ul>
<!-- <li class="check">選択</li> -->
<li class="name">商品名</li>
<li class="unit">販売単位</li>
<li class="price">税抜単価</li>
<!-- <li class="quantity">個数</li> -->
<!-- <li class="amount">合計量</li> -->
</ul>
</li>
<?php
$post7 = get_post($recoAdhesiveOkunaisyou);
global $usces;
$sku = $usces->get_skus($recoAdhesiveOkunaisyou);
?>
<li class="js-cart-item">
<ul>
<!-- <li class="check">
<label class="checkbox">
<input type="checkbox" name="prod-choice" checked="checked" value="この商品を選択する" data-input="0">
</label>
</li> -->
<li class="pic"><?php echo get_the_post_thumbnail($recoAdhesiveOkunaisyou); ?></li>
<li class="name">
<a href="<?php echo get_the_permalink($recoAdhesiveOkunaisyou); ?>">
<p class="osusume">おすすめ接着剤</p>
<h3><?php echo $post7->post_title; ?></h3>
</a>
</li>
<li class="unit">2kg</li>
<li class="price">&yen;<?php echo number_format($sku[0]['cprice']); ?></li>
<!-- <p class="adhesive-color sp-only">
<label class="radio">
<input type="radio" name="adhesive1" value="1" checked data-input="1"><span class="white">オフホワイト</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="2"  data-input="1"><span class="beige">ベージュ</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="3"  data-input="1"><span class="gray">グレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="4"  data-input="1"><span class="darkgray">ダークグレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive1" value="5"  data-input="1"><span class="black">ブラック</span>
</label>
</p> -->
<!-- <li class="quantity">
<input type="text" name="" value="68" class="quantity">
</li>
<li class="amount total"><span>136</span>kg</li> -->
</ul>
<!-- <p class="adhesive-color pc-only">
<label class="radio">
<input type="radio" name="adhesive2" value="1" checked data-input="1"><span class="white">オフホワイト</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="2"  data-input="1"><span class="beige">ベージュ</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="3"  data-input="1"><span class="gray">グレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="4"  data-input="1"><span class="darkgray">ダークグレー</span>
</label>
<label class="radio">
<input type="radio" name="adhesive2" value="5"  data-input="1"><span class="black">ブラック</span>
</label>
</p> -->
</li>

<?php
$post8 = get_post($recoJointOkunaisyou);
global $usces;
$sku = $usces->get_skus($recoJointOkunaisyou);
?>
<li class="js-cart-item">
<ul>
<!-- <li class="check">
<label class="checkbox">
<input type="checkbox" name="prod-choice" checked="checked" value="この商品を選択する" data-input="1">
</label>
</li> -->
<li class="pic"><?php echo get_the_post_thumbnail($recoJointOkunaisyou); ?></li>
<li class="name">
<a href="<?php echo get_the_permalink($recoJointOkunaisyou); ?>">
<p class="osusume">おすすめ目地材</p>
<h3><?php echo $post8->post_title; ?></h3>
</a>
</li>
<li class="unit">0.2kg</li>
<li class="price">&yen;<?php echo number_format($sku[0]['cprice']); ?></li>
<!-- <p class="adhesive-color sp-only">
<label class="radio">
<input type="radio" name="jointmaterial1" value="1" checked data-input="1"><span class="white">白</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="2"  data-input="1"><span class="gray">灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="3"  data-input="1"><span class="darkgray">濃灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="4"  data-input="1"><span class="black">黒</span>
</label>
</p> -->
<!-- <li class="quantity">
<input type="text" name="" value="525" class="quantity">
</li>
<li class="amount total"><span>106</span>kg</li> -->
</ul>
<!-- <p class="adhesive-color pc-only">
<label class="radio">
<input type="radio" name="jointmaterial2" value="1" checked data-input="1"><span class="white">白</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="2"  data-input="1"><span class="gray">灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="3"  data-input="1"><span class="darkgray">濃灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="4"  data-input="1"><span class="black">黒</span>
</label>
</p> -->
</li>
</ul>
<p class="annotation">※接着剤・目地材の計算結果は参考の数量となります。少し多めに算出されるようになっております。</p>
</section>

<!-- <ul class="basic3">
<li class="pay1"><span><img src="../../assets/img/product/bgr_front_en.gif" alt="金額" title="金額"></span>&nbsp;金額：<span><strong>256,750</strong>円</span>（税別）</li>
<li class="pay2"><span class="track"><img src="../../assets/img/product/bgr_front_track.gif" alt="配送料" title="配送料"></span>&nbsp;配送料：&nbsp;<span><strong>0</strong>円</span></li>
</ul> -->
</div><!-- /.tab-4 屋内床 -->

<!-- .tab-5 クラフト -->
<div class="tab-content tab-5-content">
<div class="use1">
<div class="use-title">用　途</div>
<span class="use-question"><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="youtotoha" title=""></a></span>
<ul>
<li class="craft">木製家具類</li><li class="craft">ガラス製インテリア製品</li><li class="craft">その他インテリアグッズ</li>
</ul>
</div>
<div class="use">
<div class="use-title">下地の種類</div>
<span class="use-question"><a href="#"><img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="syuruitoha" title=""></a></span>
<ul>
<li class="concrete">コンクリート</li>
<li class="mortar">モルタル</li>
<li class="plywood">合板（一種・特類）</li>
<li class="plywood2">木製・合板（一種・特類）</li>
<li class="glass">ガラス・鏡</li>
<li class="wooden">木製</li>
</ul>
</div>
<section class="purchase">
<ul>
<li class="head">
<ul>
<!-- <li class="check">選択</li> -->
<li class="name">商品名</li>
<li class="unit">販売単位</li>
<li class="price">税抜単価</li>
<!-- <li class="quantity">個数</li>
<li class="amount">合計量</li> -->
</ul>
</li>
<?php
$post9 = get_post($recoAdhesiveCraft);
global $usces;
$sku = $usces->get_skus($recoAdhesiveCraft);
?>
<li class="js-cart-item">
<ul>
<!-- <li class="check">
<label class="checkbox">
<input type="checkbox" name="prod-choice" checked="checked" value="この商品を選択する" data-input="0">
</label>
</li> -->
<li class="pic"><?php echo get_the_post_thumbnail($recoAdhesiveCraft); ?></li>
<li class="name">
<a href="<?php echo get_the_permalink($recoAdhesiveCraft); ?>">
<p class="osusume">おすすめ接着剤</p>
<h3><?php echo $post9->post_title; ?></h3>
</a>
</li>
<li class="unit">2kg</li>
<li class="price">&yen;<?php echo number_format($sku[0]['cprice']); ?></li>
<li class="quantity">
<input type="text" name="" value="68" class="quantity">
</li>
<li class="amount total"><span>136</span>kg</li>
</ul>
</li>
<?php
$post10 = get_post($recoJointCraft);
global $usces;
$sku = $usces->get_skus($recoJointCraft);
?>
<li class="js-cart-item">
<ul>
<!-- <li class="check">
<label class="checkbox">
<input type="checkbox" name="prod-choice" checked="checked" value="この商品を選択する" data-input="1">
</label>
</li> -->
<li class="pic"><?php echo get_the_post_thumbnail($recoJointCraft); ?></li>
<li class="name">
<a href="<?php get_the_permalink($recoJointCraft); ?>">
<p class="osusume">おすすめ目地材</p>
<h3><?php echo $post10->post_title; ?></h3>
</a>
</li>
<li class="unit">0.2kg</li>
<li class="price">&yen;<?php echo number_format($sku[0]['cprice']); ?></li>
<!-- <p class="adhesive-color sp-only">
<label class="radio">
<input type="radio" name="jointmaterial1" value="1" checked data-input="1"><span class="white">白</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="2"  data-input="1"><span class="gray">灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="3"  data-input="1"><span class="darkgray">濃灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial1" value="4"  data-input="1"><span class="black">黒</span>
</label>
</p> -->
<!-- <li class="quantity">
<input type="text" name="" value="525" class="quantity">
</li>
<li class="amount total"><span>106</span>kg</li> -->
</ul>
<!-- <p class="adhesive-color pc-only">
<label class="radio">
<input type="radio" name="jointmaterial2" value="1" checked data-input="1"><span class="white">白</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="2"  data-input="1"><span class="gray">灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="3"  data-input="1"><span class="darkgray">濃灰</span>
</label>
<label class="radio">
<input type="radio" name="jointmaterial2" value="4"  data-input="1"><span class="black">黒</span>
</label>
</p> -->
</li>
</ul>
<p class="annotation">※接着剤・目地材の計算結果は参考の数量となります。少し多めに算出されるようになっております。</p>
</section>

<!-- <ul class="basic3">
<li class="pay1"><span><img src="../../assets/img/product/bgr_front_en.gif" alt="金額" title="金額"></span>&nbsp;金額：<span><strong>256,750</strong>円</span>（税別）</li>
<li class="pay2"><span class="track"><img src="../../assets/img/product/bgr_front_track.gif" alt="配送料" title="配送料"></span>&nbsp;配送料：&nbsp;<span><strong>0</strong>円</span></li>
</ul> -->
</div><!-- /.tab-5 クラフト -->


</div><!-- /.tabs -->

</div>

</div>
</form>
<?php endif; ?>
</div>
<!-- // end right contents -->
</div>
<section class="other-products js-related-items" id="relatedItem" data-carousel-pc-only="1" bdr_r_id="11">

<h3><span>おすすめ商品</span></h3>

<!-- <span class="prev js-prev-item inactive">PREV</span> -->

<div class="list-wrap js-item-screen">

<ul class="list js-item-list">
<?php
$args = [];
// タイルの商品ページの時
  if ($tile_flag) {
      $args = array(
      'numberposts' => 6,
      'category' => 29,
      'exclude' => $item_id
    );
  }
  // 接着剤の商品ページの時
  if ($adhesive_flag) {
      $args = array(
      'numberposts' => 6,
      'category' => 37,
      'exclude' => $item_id
    );
  }
  // 目地材の商品ページの時
  if ($joint_flag) {
      $args = array(
      'numberposts' => 6,
      'category' => 38,
      'exclude' => $item_id
    );
  }
  // PICKUPページの時
  if ($pickup_flag) {
      $args = array(
      'numberposts' => 6,
      'category' => 30,
      'exclude' => $item_id
    );
  }

  if (count($args) === 0) {
      $args = array(
      'numberposts' => 6,
      'category' => 24,
      'exclude' => $item_id
    );
  }

  $posts_array = get_posts($args);
?>
<?php foreach ($posts_array as $key => $post):?>
<?php $post_id = $post->ID; ?>
<li style="z-index: 1;">
<a href="<?php echo get_the_permalink($post_id); ?>" class="button-todetail">
<span class="image">
<?php echo get_the_post_thumbnail($post_id, array( 180, 180 )); ?>
</span>
<p class="product-name">
<?php echo $post->post_title; ?>
</p>
</a>
</li>
<?php endforeach; ?>
<!-- <li style="z-index: 2;"><a href="#" class="button-todetail"><span class="image"><img src="../img/item/andver/01.jpg" alt="アンドベール"></span><p class="product-name">アンドベール</p></a></li>
<li style="z-index: 1;"><a href="#" class="button-todetail"><span class="image"><img src="../img/item/aqa/09.jpg" alt="アクア館　パープル"></span><p class="product-name">アクア館　パープル</p></a></li>
<li style="z-index: 1;"><a href="#" class="button-todetail"><span class="image"><img src="../img/item/arazin/05.jpg" alt="アラジン"></span><p class="product-name">アラジン</p></a></li>
<li style="z-index: 1;"><a href="#" class="button-todetail"><span class="image"><img src="../img/item/arazin/05-2.jpg" alt="アラジン"></span><p class="product-name">アラジン</p></a></li>
<li style="z-index: 1;"><a href="#" class="button-todetail"><span class="image"><img src="../img/item/ccy/01.jpg" alt="CCR"></span><p class="product-name">CCR</p></a></li>
<li style="z-index: 1;"><a href="#" class="button-todetail"><span class="image"><img src="../img/item/flower/10.jpg" alt="フラワーミックス"></span><p class="product-name">フラワーミックス</p></a></li> -->
<!-- <li style="z-index: 1;"><a href="#" class="button-todetail"><span class="image"><img src="../img/item/happys/11.jpg" alt="ハッピーズ　ステンドグラス　イエロー"></span><p class="product-name">ハッピーズ　ステンドグラス　イエロー</p></a></li>
<li style="z-index: 1;"><a href="#" class="button-todetail"><span class="image"><img src="../img/item/irodori/02.jpg" alt="イロドリ　イエローミックス"></span><p class="product-name">イロドリ　イエローミックス</p></a></li>
<li style="z-index: 1;"><a href="#" class="button-todetail"><span class="image"><img src="../img/item/letter/1.jpg" alt="レター　数字「1」"></span><p class="product-name">レター　数字「1」</p></a></li>
<li style="z-index: 1;"><a href="#" class="button-todetail"><span class="image"><img src="../img/item/letter/a.jpg" alt="レター　英字「A」"></span><p class="product-name">レター　英字「A」</p></a></li> -->
</ul>

</div>
<!-- <span class="next js-next-item">NEXT</span> -->

</section>
<!-- // end contents -->
</div>

<script>
// 小数点切り上げ
function orgRound(value, base) {
return Math.round(value * base) / base;
}
// 商品の値段を取得
let price = document.querySelector('.original_price').textContent.replace(/,/g, '');;
// 一平方あたりのタイルの必要枚数
const mi = JSON.parse('<?php echo $mi; ?>');
// // 目地量
const mejiryo = JSON.parse('<?php echo $E; ?>');
// // 接着剤
const adhesive = JSON.parse('<?php echo $a; ?>');
// 初期表示ハイ送料無料までの残り金額
let initial_hasiou = 10000 - Number(price);
if(initial_hasiou <= 0) {
  initial_hasiou = 0;
  document.querySelector('.haisouryo').textContent = 0;
}
document.querySelector('.haisou_price').textContent = Number(initial_hasiou);
// 数量増
$('.price-up').on('click', function() {
let val = $('#countup input').val();
++val;
$('#countup input').val(val);
let totalPrice = price*val;
document.querySelector('.pay_price').textContent = Number(totalPrice).toLocaleString();
if (mi) {
// 面積計算の値を変更
let menseki = orgRound(val / mi,1000);
$('#menseki').val(menseki);
// 面積計算の値の変更に伴い必要接着剤、必要目地量変更
// 必要目地量
let totalMejiryo = Number(menseki) * mejiryo;
// 必要接着剤
let totalAdhesive = Number(menseki) * adhesive;
document.querySelector('.joint_amount').textContent = orgRound(totalMejiryo, 1000);
document.querySelector('.adhesive_amount').textContent = orgRound(totalAdhesive, 1000);;
}
// 配送料無料までの値段計算
if (10000 - Number(totalPrice) > 0) {
let nokori_haisou = 10000 - Number(totalPrice)
document.querySelector('.haisou_price').textContent = nokori_haisou.toLocaleString();
document.querySelector('.haisouryo').textContent = '3,000';
} else {
document.querySelector('.haisou_price').textContent = 0;
document.querySelector('.haisouryo').textContent = 0;
}
});
// 数量減
$('.price-down').on('click', function() {
let val = $('#countup input').val();
if (val > 1) {
--val;
let totalPrice = price*val;
document.querySelector('.pay_price').textContent = Number(totalPrice).toLocaleString();
if (mi) {
// 面積計算の値を変更
let menseki = orgRound(val / mi, 1000);
$('#menseki').val(menseki);
// 面積計算の値の変更に伴い必要接着剤、必要目地量変更
// 必要目地量
let totalMejiryo = Number(menseki) * mejiryo;
// 必要接着剤
let totalAdhesive = Number(menseki) * adhesive;
document.querySelector('.joint_amount').textContent = orgRound(totalMejiryo, 1000);
document.querySelector('.adhesive_amount').textContent = orgRound(totalAdhesive, 1000);;
}
if (10000 - Number(totalPrice) > 0) {
let nokori_haisou = 10000 - Number(totalPrice)
document.querySelector('.haisou_price').textContent = nokori_haisou.toLocaleString();
document.querySelector('.haisouryo').textContent = '3,000';
} else {
document.querySelector('.haisou_price').textContent = 0;
document.querySelector('.haisouryo').textContent = 0;
}
}
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

// 面積を入力したらその値に合わせてタイルの必要枚数を計算
$('#menseki').change(function(e) {
let menseki = e.target.value;
let maisuu = Number(menseki) * Number(mi);
$('#countup input').val(maisuu);
let totalPrice = Number(price) * Number(maisuu);
// 必要目地量
let totalMejiryo = Number(menseki) * mejiryo;
// 必要接着剤
let totalAdhesive = Number(menseki) * adhesive;

document.querySelector('.pay_price').textContent = totalPrice;
document.querySelector('.joint_amount').textContent = orgRound(totalMejiryo, 1000);;
document.querySelector('.adhesive_amount').textContent = orgRound(totalAdhesive, 1000);;
// 配送料無料までの値段計算
if (10000 - Number(totalPrice) > 0) {
let nokori_haisou = 10000 - Number(totalPrice)
document.querySelector('.haisou_price').textContent = nokori_haisou.toLocaleString();
document.querySelector('.haisouryo').textContent = '3,000';
} else {
document.querySelector('.haisou_price').textContent = 0;
document.querySelector('.haisouryo').textContent = 0;
}});

// 色変更用の画像を非表示に
$('[name=sku_selct_0] option').each(function(i,e){
var txt = $(e).text();
let side_image_list = document.querySelectorAll('#side_image_list');
// 初期選択の色
let first_val = $('[name=sku_selct_0] option:selected').text();
$(side_image_list).each(function(i,e){
if ($(e).hasClass(txt)) {
$(e).addClass('none');
}
if($(e).hasClass(first_val))
$(e).removeClass('none');
});
});


// 商品の色変更
$('[name=sku_selct_0]').on('change',function(){
let val = $('[name=sku_selct_0]').val();
let txt = $('[name=sku_selct_0] option:selected').text();
// サイド画像から該当の色の画像を取得
let side_image_list = document.querySelectorAll('#side_image_list');
let count = 1;
$(side_image_list).each(function(i,e){
if (!$(e).hasClass(txt)) {
if (!$(e).hasClass('none')) {
$(e).addClass('none');
}
} else {
if ($(e).hasClass('none')) {
$(e).removeClass('none');
// 最初の一枚
if(count === 1){
let src = $(e).children('a').children('img').attr('src');
console.log(src);
// メイン画像の変更
let mainImg = document.querySelector('#prodImgDefault img');
$(mainImg).attr('src',src);
count++;
}
}
}
});
});

</script>

<?php endif; get_footer();
