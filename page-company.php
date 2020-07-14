<?php
$home = home_url();
$wp_url = get_template_directory_uri();
get_header(); ?>
<main class="guide">
<h2 class="title -splitText">COMPANY PROFILE<small>会社案内</small></h2>
<p class="lead"><a href="<?php echo $home; ?>/store/">実店舗案内はこちら</a></p>


<!-- ヘッダー -->
<header class="ts-wrapper ts_about_company-header">
<h1 class="ts_about_company-header-banner">
<span>
<img src="<?php echo $wp_url; ?>/assets/img/guide/banner.png" alt="ザ・タイルショップ" />
<em class="ts-hide">ザ・タイルショップ</em>
</span>
</h1>
<nav>
<ul class="purchase">
<li><a href="#s1" class="js-anchor">会社概要</a></li>
<li><a href="#s2" class="js-anchor">実販売店舗 MAP</a> </li>
</ul>
</nav>
</header>
<!-- //ヘッダー -->

<!-- 会社概要 -->
<section class="guide -effected -effected_after -effected_after_after">
<div class="ts-wrapper">

<h1 id="s1" class="ts-headline">会社概要</h1>

<table class="ts-table">
<tbody>
<tr>
<th>商　号</th>
<td>株式会社ウェイヴ</td>
</tr>
<tr>
<th>本店所在地</th>
<td>〒507-0901 岐阜県多治見市笠原町上原1249</td>
</tr>
<tr>
<th>設立年月</th>
<td>2020年5月12日</td>
</tr>
<tr>
<th>資本金</th>
<td>900万円</td>
</tr>
<tr>
<th>代表者</th>
<td>
代表取締役社長	千葉 精優<br>
</td>
</tr>
<tr>
<th>従業員数</th>
<td>00名</td>
</tr>
<th>決算期</th>
<td>3月</td>
</tr>
<tr>
<th>売上収益</th>
<td>00円</td>
</tr>
<tr>
<th>営業利益</th>
<td>00円</td>
</tr>
<tr>
<th>事業内容</th>
<td>
<p>
当会社は、次の事業を営むことを目的とする。
</p>
<ul class="ts-list">
<li>タイルおよび施工材料並びにその付属品の販売</li>
<li>インテリア用品、日用品雑貨、石材、木材、アート製品の製作及び販売</li>
<li>インターネットを利用したタイル、施工材料、インテリア用品、石材、木材、アート製品の販売</li>
<li>タイル・れんが・ブロック工事業及びその請負並びに斡施</li>
<li>建築物の内装・外装に関するコンサルタント業務</li>
<li>各種菓子及び加工食品の販売</li>
<li>前記各号に附帯する一切の業務</li>
</ul>
</td>
</tr>
<tr id="s2">
<th>実販売店舗</th>
<td>
<dl>
<dt>
ザ・タイルショップ<br>
〒460-0008<br>愛知県名古屋市中区中区中区栄5-26-33 山七ビル 1F<br>
TEL. 052-263-1686 (代表)
</dt>
<dd>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13047.096751297699!2d136.911679!3d35.162252!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600370c8b39521f7%3A0x371df1d5473d73e4!2sTHE%20TILE%20SHOP!5e0!3m2!1sja!2sjp!4v1586483641593!5m2!1sja!2sjp" width="425" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></iframe>
</dd>
</dl>
</td>
</tr>
</tbody>
</table>

</div>
</section>
<!-- //会社概要 -->
<?php get_footer(); ?>
