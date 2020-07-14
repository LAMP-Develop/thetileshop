<?php
$home = home_url();
$wp_url = get_template_directory_uri();
?>
</main>
<footer>
<?php if(is_single()): ?>
<div class="pt3">
<nav id="footerNavi">
<a href="<?php echo $home; ?>/archives/category/news">お知らせ</a>
<a href="<?php echo $home; ?>/privacy-policy">プライバシーポリシー</a>
<a href="<?php echo $home; ?>/law/">特定商取引法に基づく表示</a>
<a href="<?php echo $home; ?>/shopping/">ご利用規約</a>
<br>
<a href="<?php echo $home; ?>/terms/">会員規約</a>
<a href="<?php echo $home; ?>/contact/">お問い合せ</a>
<a href="<?php echo $home; ?>/store/">店舗案内</a>
<a href="<?php echo $home; ?>/company/">会社案内</a>
</nav>
</div>
<?php else: ?>
<nav id="footerNavi">
<a href="<?php echo $home; ?>/archives/category/news">お知らせ</a>
<a href="<?php echo $home; ?>/privacy-policy">プライバシーポリシー</a>
<a href="<?php echo $home; ?>/law/">特定商取引法に基づく表示</a>
<a href="<?php echo $home; ?>/shopping/">ご利用規約</a>
<br>
<a href="<?php echo $home; ?>/terms/">会員規約</a>
<a href="<?php echo $home; ?>/contact/">お問い合せ</a>
<a href="<?php echo $home; ?>/store/">店舗案内</a>
<a href="<?php echo $home; ?>/company/">会社案内</a>
</nav>
<?php endif; ?>
<p class="copyright">Copyright &copy; THE TILE SHOP <wbr>All Rights Reserved.</p>
</footer><a href="#pageTop" class="btn-pagetop js-anchor"></a>
</div><!--  /#wrapper -->

<?php wp_footer(); ?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<style>
.ui-tooltip {
	font-size: 12px;
	box-shadow: 2px 2px 2px #aaaaaa;
	background:#ffffff;
}
</style>
<script src="<?php echo $wp_url; ?>/assets/js/lib/jquery.min.js"></script>
<script src="<?php echo $wp_url; ?>/assets/js/tooltip.js"></script>
<script src="<?php echo $wp_url; ?>/assets/js/lib/underscore-min.js"></script>
<script src="<?php echo $wp_url; ?>/assets/js/main.min.js"></script>
<script src="<?php echo $wp_url; ?>/assets/js/top/apps.min.js"></script>
<script src="<?php echo $wp_url; ?>/assets/js/top/function.js"></script>
<script src="<?php echo $wp_url; ?>/assets/js/main.min.js"></script>
<script src="<?php echo $wp_url; ?>/assets/js/lib/jquery.tmpl.min.js"></script>
<script src="<?php echo $wp_url; ?>/assets/js/product_list.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
  // 自動計算とは
  $('.jidoukeisan').tooltip({
    show:true,
    hide:true,
    content:"使用する壁や床の面積をご入力頂ければ、自動で購入するタイルの数量の目安を計算する仕組みです。計算結果は少し多めに算出されます。"
  });
  // 接着剤とは
  $('.adhesivetoha').tooltip({
    show:true,
    hide:true,
    content:"使用する接着剤の種類は、タイルの裏側の形状やタイルを張る素材により異なります。当サイトで扱う接着剤の場合、購入前に接着剤の用途をお確かめください。"
  });
  // 目地材とは
  $('.jointtoha').tooltip({
    show:true,
    hide:true,
    content:"目地材とは、タイルとタイルのすき間を埋める充填剤です。下地の収縮でタイルが割れないよう緩衝材の役割も果たします。"
  });
  // 用途とは
  $('.youtotoha').tooltip({
    show:true,
    hide:true,
    content:"当タイルの用途を記しています。その他にも使用可能な場合もございます。"
  });
  // 下地の種類とは
  $('.syuruitoha').tooltip({
    show:true,
    hide:true,
    content:"下地の種類で接着剤が決まります。その他の下地への使用はオススメできません。"
  });
  // JIS規定用途表示について
  $("a:contains('JIS規定用途表示について')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="jistoha ml1" title="">')
  $('.jistoha').tooltip({
    show:true,
    hide:true,
    content:"このタイルは、日本工業規格の品質規格として上記の表示環境下における品質をクリアした製品です。"
  })
  // 商品寸法
  $("td:contains('商品寸法')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="syouhinsunpo ml1" title="">')
  $('.syouhinsunpo').tooltip({
    show:true,
    hide:true,
    content:"商品のタテ✕ヨコの実寸法です。"
  })
  // 参考価格
  $("td:contains('参考価格')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="sankokakaku ml1" title="">')
  $('.sankokakaku').tooltip({
    show:true,
    hide:true,
    content:"当タイルの1m²当たりの参考価格です。"
  })
  // タイル裏面の状態
  $("td:contains('タイル裏面の状態')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="uramen ml1" title="">')
  $('.uramen').tooltip({
    show:true,
    hide:true,
    content:"タイルの裏側には裏あしという形状の異なる凹凸が用意されています。"
  })
  // 標準箱入数
  $("td:contains('標準箱入数')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="hakoirisu ml1" title="">')
  $('.hakoirisu').tooltip({
    show:true,
    hide:true,
    content:"1カートンという単位で、一定数のタイルが箱に入る数を表します。"
  })
  // 標準箱入重量
  $("td:contains('標準箱入重量')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="hakoirijyuryo ml1" title="">')
  $('.hakoirijyuryo').tooltip({
    show:true,
    hide:true,
    content:"1カートンという単位で、一定数のタイルが箱に入った重量（kg）を表します。"
  })
  // m²必要数(接着剤・目地材兼用)
  $("td:contains('m²必要数')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="mhituyousu ml1" title="">')
  $('.mhituyousu').tooltip({
    show:true,
    hide:true,
    content:"1m²当たりに必要な料を表します。"
  })
  // 張付け可能時間(分)
  $("td:contains('張付け可能時間')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="kanoujikan ml1" title="">')
  $('.kanoujikan').tooltip({
    show:true,
    hide:true,
    content:"接着剤を付けてタイルが接着されるまでの時間（接着剤の硬化時間）を表します。気温で時間が変わります。"
  })
  // 塗布面積(m²/kg)
  $("td:contains('塗布面積')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="tohumenseki ml1" title="">')
  $('.tohumenseki').tooltip({
    show:true,
    hide:true,
    content:"当接着剤で張ることのできるタイルの参考面積です。"
  })
  // 危険物の種別
  $("td:contains('危険物の種別')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="kikenbutusyubetu ml1" title="">')
  $('.kikenbutusyubetu').tooltip({
    show:true,
    hide:true,
    content:"当接着剤は、消防法により危険物第4類の火気厳禁の溶剤、又は固形物に指定されています。"
  })
  // 危険物の品名
  $("td:contains('危険物の品名')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="kikenbutuhinmei ml1" title="">')
  $('.kikenbutuhinmei').tooltip({
    show:true,
    hide:true,
    content:"当接着剤は、消防法により危険物第4類の火気厳禁の溶剤、又は固形物に指定されています。"
  })
  // 適用箇所(接着剤・目地材兼用)
  $("td:contains('適用箇所')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="tekiyoukasyo ml1" title="">')
  $('.tekiyoukasyo').tooltip({
    show:true,
    hide:true,
    content:"当商品の使用に適した場所を表します。"
  })
  // 適用下地(接着剤・目地材兼用)
  $("td:contains('適用下地')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="tekiyousitaji ml1" title="">')
  $('.tekiyousitaji').tooltip({
    show:true,
    hide:true,
    content:"当商品が張られる適用箇所の下地を表します。適用箇所でも、この下地が適さないと上手く使用できない場合がございます。"
  })
  // 適用仕上げ材(接着剤・目地材兼用)
  $("td:contains('適用仕上げ材')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="tekiyousiage ml1" title="">')
  $('.tekiyousiage').tooltip({
    show:true,
    hide:true,
    content:"当商品で張ることのできるタイルのサイズを表します。内装に張るか外装に張るかでサイズがことなります。"
  })
  // 混ぜる水の目安量
  $("td:contains('混ぜる水の目安量')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="mazerumizu ml1" title="">')
  $('.mazerumizu').tooltip({
    show:true,
    hide:true,
    content:"当目地材は、水と混ぜて使用します。当目地材の容量に対して必要な水の目安量を表します。実際には少しずつ水を混ぜて調整してください。"
  })
  // 塗り厚
  $("td:contains('塗り厚')").append('<img src="<?php echo $wp_url; ?>/assets/img/product/question.png" alt="疑問・質問" class="nuriatu ml1" title="">')
  $('.nuriatu').tooltip({
    show:true,
    hide:true,
    content:"当目地材の施工時の厚さの目安です。タイルの種類により厚みは異なります。"
  })
</script>
</body>
</html>
