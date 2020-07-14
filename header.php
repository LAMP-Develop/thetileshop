<?php
$home = home_url();
$wp_url = get_template_directory_uri();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php wp_title(); ?></title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black|Bad+Script|Diplomata+SC|Questrial|Vast+Shadow">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<?php wp_head(); ?>
<!--[if lt IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<![endif]-->
<style>
.recentcomments a {
display: inline !important;
padding: 0 !important;
margin: 0 !important;
}
@media screen and (min-width: 768px) {
.kvImg__item.-slider01 {
background-image: url("<?php echo $wp_url; ?>/assets/img/top/kv-01.jpg");
}
}
@media screen and (max-width: 767px) {
.kvImg__item.-slider01 {
background-image: url("<?php echo $wp_url; ?>/assets/img/top/kv-01-sp.jpg");
}
}
@media screen and (min-width: 768px) {
.kvImg__item.-slider02 {
background-image: url("<?php echo $wp_url; ?>/assets/img/top/kv-02.jpg");
}
}
@media screen and (max-width: 767px) {
.kvImg__item.-slider02 {
background-image: url("<?php echo $wp_url; ?>/assets/img/top/kv-02-sp.jpg");
}
}
@media screen and (min-width: 768px) {
.kvImg__item.-slider03 {
background-image: url("<?php echo $wp_url; ?>/assets/img/top/kv-03.jpg");
}
}
@media screen and (max-width: 767px) {
.kvImg__item.-slider03 {
background-image: url("<?php echo $wp_url; ?>/assets/img/top/kv-03-sp.jpg");
}
}
@media screen and (min-width: 768px) {
.kvImg__item.-slider04 {
background-image: url("<?php echo $wp_url; ?>/assets/img/top/kv-04.jpg");
}
}
@media screen and (max-width: 767px) {
.kvImg__item.-slider04 {
background-image: url("<?php echo $wp_url; ?>/assets/img/top/kv-04-sp.jpg");
}
}
@media screen and (min-width: 768px) {
.kvImg__item.-slider05 {
background-image: url("<?php echo $wp_url; ?>/assets/img/top/kv-05.jpg");
}
}
@media screen and (max-width: 767px) {
.kvImg__item.-slider05 {
background-image: url("<?php echo $wp_url; ?>/assets/img/top/kv-05-sp.jpg");
}
}
</style>
</head>

<body class="home blog hfeed page-home">
<?php if (usces_is_login()): ?>
<div id="wrapper" class="login">
<?php else: ?>
<div id="wrapper" class="no-login">
<?php endif; ?>
<header>
<div class="title-area">
<h1 class="site-logo">
<p class="catchcopy">タイルをもっと身近に、もっと楽しく。</p>
<a href="<?php echo $home; ?>/"><img src="<?php echo $wp_url; ?>/assets/img/common/header_logo.png"><span>オンライン　タイルショップ</span></a>
</h1>
<div class="sub-menu">
<?php if (usces_is_login()): ?>
<a id="loginUser" href="<?php echo USCES_MEMBER_URL; ?>" class="sub-menu-link login">マイページ</a>
<?php else: ?>
<a href="<?php echo USCES_MEMBER_URL; ?>" class="sub-menu-link no-login">ログイン / 会員登録</a>
<?php endif; ?>

<span class="search-area">
<span class="search-inner">
<span class="icon-btn search"></span>
<?php get_search_form(); ?>
</span>
</span>
<a href="<?php echo USCES_CART_URL; ?>" class="icon-btn cart empty">
<span id="cartCount" class="js-cart-count"><?php usces_totalquantity_in_cart(); ?></span></a>
</div>
<span class="sp-menu"><span></span></span>
</div>
<nav id="globalNavi">
<div class="navi-inner">
<a href="<?php echo $home; ?>/" class="primary <?php if(is_page(2)){echo 'current';} ?>"><span>トップ</span></a>
<a href="<?php echo $home; ?>/archives/category/item/" class="primary <?php if(is_category('item')){echo 'current';} ?>" data-type="category"><span>商品カテゴリー</span></a>
<a href="<?php echo $home; ?>/archives/category/item/itemreco/" class="primary edge <?php if(is_category('itemreco')){echo 'current';} ?>"><span>オススメ</span></a>
<a href="<?php echo $home; ?>/archives/category/example" class="primary <?php if(is_category('example')){echo 'current';} ?>"><span>施工例</span></a>
<a href="<?php echo $home; ?>/tileguide" class="primary <?php if(is_page('tileguide')){echo 'current';} ?>"><span>タイルガイド</span></a>
<a href="<?php echo $home; ?>/guide/" class="primary edge <?php if(is_page('guide')){echo 'current';} ?>"><span>購入ガイド</span></a>
</div>

</nav>
<ul id="globalMenu">
<li><a href="<?php echo $home; ?>/" tabindex="-1">トップ</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/" tabindex="-1">商品カテゴリー</a></li>
<li><a href="<?php echo $home; ?>/archives/category/item/itemreco/" tabindex="-1">オススメ</a></li>
<li><a href="<?php echo $home; ?>/archives/category/example" tabindex="-1">施工例</a></li>
<li><a href="<?php echo $home; ?>/tileguide" tabindex="-1">タイルガイド</a></li>
<li><a href="<?php echo $home; ?>/guide/" tabindex="-1">購入ガイド</a></li>
<?php if (usces_is_login()): ?>
<li><a href="<?php echo USCES_MEMBER_URL; ?>" tabindex="-1">マイページ</a></li>
<?php else: ?>
<li><a href="<?php echo USCES_MEMBER_URL; ?>" tabindex="-1">ログイン / 会員登録</a></li>
<?php endif; ?>
<li class="sub"><a href="<?php echo $home; ?>/archives/category/news" tabindex="-1">お知らせ</a></li>
<li class="sub"><a href="<?php echo $home; ?>/privacy-policy/" tabindex="-1">プライバシーポリシー</a></li>
<li class="sub"><a href="<?php echo $home; ?>/law/" tabindex="-1">特定商取引に基づく表示</a></li>
<li class="sub"><a href="<?php echo $home; ?>/shopping/" tabindex="-1">ご利用規約</a></li>
<li class="sub"><a href="<?php echo $home; ?>/terms/" tabindex="-1">会員規約</a></li>
<li class="sub"><a href="<?php echo $home; ?>/contact/" tabindex="-1">お問い合わせ</a></li>
<li class="sub"><a href="<?php echo $home; ?>/store/" tabindex="-1">店舗案内</a></li>
<li class="sub"><a href="<?php echo $home; ?>/company/" tabindex="-1">会社案内</a></li>
</ul>
<dl class="search-suggestion"></dl>

<div class="cart-inner empty">
<p class="cart-inner-title">カートの中身</p>
<dl>
<dt>数量：</dt>
<dd><em class="js-cart-count"><?php usces_totalquantity_in_cart(); ?></em></dd>
<dt>金額：</dt>
<dd><em class="yen js-cart-total-amount"><?php usces_totalprice_in_cart(); ?></em><small>(税別)</small></dd>
</dl>
</div>

<div id="loginMenu">
<a href="<?php echo USCES_MEMBER_URL; ?>/#history" tabindex="-1">注文履歴の確認</a>
<a href="<?php echo USCES_MEMBER_URL; ?>" tabindex="-1">ほしいものリストを見る</a>
<a href="<?php echo USCES_MEMBER_URL; ?>/edit" tabindex="-1">会員情報の確認 / 変更</a>
<a href="<?php echo USCES_MEMBER_URL; ?>/edit" tabindex="-1">アドレス帳の確認 / 変更</a>
<a href="<?php echo USCES_MEMBER_URL; ?>/edit" tabindex="-1">メールアドレス / パスワードの変更</a>
<?php usces_loginout(); ?>
</div>
</header>

<div id="searchSP">
<div class="input-area">
<?php get_search_form(); ?>
<span class="close-button"></span>
</div>
</div>
