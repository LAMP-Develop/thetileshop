<?php get_header(); ?>
<!-- <div class="breadcrumbs l4_breadcrumbs">
<ol><li><a href="/">TOP</a>&nbsp;&gt;&nbsp;</li><li><a href="/contact/">お問い合せフォーム</a></li></ol>
</div> -->
<main class="contact input">
<h2 class="title -splitText">CONTACT US<small>お問い合わせ</small></h2>
<div class="contact-ttl">お問い合わせフォーム</div>
<!--<section style="border:1px solid #cccccc; margin:50px 20px 30px; padding:20px; font-size:14px; line-height:1.5;">
<p><span style="font-weight:bold">【弊社年末年始休暇期間中のお客さま窓口の対応について】</span><br>
<br>
12月29日(土) 正午 ～ 1月3日(木) の間、窓口を休業いたします。<br>
<br>
休業期間中もお問い合わせフォームおよびメールでのお問い合わせは可能ですが、12月29日(金) 正午以降にいただいたお問い合わせに対しては、1月4日(木) 以降順次対応いたします。あらかじめご了承下さい。<br>
<br>
ご不便をお掛けいたしますが、何卒ご理解を賜りますようお願い申し上げます。</p>
</section>-->

<p class="lead">以下のフォームにお問い合わせの内容を入力してください。</p>
<p class="note">※お問い合わせ内容は、平日9:00～17:30&nbsp;&#40;弊社指定休業日を除く&#41;&nbsp;に確認させていただいております。<br>
上記時間内に順次対応させていただいておりますが、内容により返信までにお時間をいただく場合がございます。あらかじめご了承くださいますようお願い申し上げます。</p>

<?php echo do_shortcode( '[contact-form-7 id="1234" title="Contact form 1" html_class="contact-form"]' ); ?>

</main>
<div id="zipModal" class="modal js-modal-shade">
<div class="modal-inner js-modal-inner">
<h2>郵便番号から住所を選択</h2>
<ul id="zipList"></ul><span class="button-close js-close-modal"></span>
</div>
</div>
<?php get_footer(); ?>
