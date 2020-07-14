<?php
$home = home_url();
$wp_url = get_template_directory_uri();
get_header(); ?>
<main class="guide">
<h2 class="title -splitText">USERS GUIDE<small>ユーザーガイド</small></h2>
<div class="contact-ttl">購入ガイド</div>
<p class="lead"><a href="<?php echo $home; ?>/tileguide">タイルガイドはこちら</a></p>
<div class="container">
<nav>
<ul class="purchase">
<li><a href="#s1" class="js-anchor">配送について</a></li>
<li><a href="#s2" class="js-anchor">お支払いについて</a> </li>
<li><a href="#s3" class="js-anchor">キャンセル / 返品 / 交換</a></li>
<!--<li><a href="#s7" class="js-anchor">予約販売について</a></li>
<li><a href="#s4" class="js-anchor">ポイントサービス</a></li>
<li><a href="#s5" class="js-anchor">クーポン</a></li>-->
<li><a href="#s6" class="js-anchor">推奨環境</a></li>
</ul>
</nav>
<section class="guide">
<div class="guide-delivery">
<h3 id="s1" class="delivery">配送について</h3>
<h4>取扱運送会社</h4>
<p class="yamato"><img src="<?php echo $wp_url; ?>/assets/img/guide/yamato.jpg" class="ヤマト運輸"></p>

<h4>配送料</h4>
<p>1回のご注文につき、送料一律345円 (税別) <!--<p class="notes-table">※各種手数料および包装紙 / のし代を除く。</p>--></p>

<table class="delivery-fee">
<tr>
<th>ご注文金額 (税別)</th>
<th>配送料 (税別) </th>
</tr>
<tr>
<td>10,000円以上</td>
<td>無料</td>
</tr>
<tr>
<td>10,000円未満</td>
<td>540円</td>
</tr>
</table>

<!--  <p class="notes-table">※メール便でお届けする一部の商品は、購入金額にかかわらず送料無料です。</p> -->
<p class="notes-table">※配送は日本国内に限らせていただきます。</p>
<h4 id="deliveryDate">発送時期</h4>
<p>商品の発送時期は、お支払い方法により異なります。</p>
<table class="half">
<tr>
<th>お支払い方法</th>
<th>発送時期</th>
</tr>
<tr>
<td>クレジットカード</td>
<td rowspan="2">ご注文受付日から最短でご注文受付日の翌日</td>
</tr>
<tr>
<td>代金引換</td>
</tr>
<tr>
<td>NP後払い (コンビニ、郵便局、銀行)</td>
<td>与信審査通過日から最短で翌日</td>
</tr>
<tr>
<td>コンビニ前払い</td>
<td>お支払い確認後から最短で翌日</td>
</tr>
</table>
<p class="notes-table">※お届け日を指定する際に「最短でお届け」かつ「時間帯指定なし」を選択された場合の目安です。商品の在庫状況によっては、最短で発送できない場合がございます。なお、商品をお届けするまでの日数は、配送地域により異なります。</p>
<p class="notes-table">※「NP後払い」には、ご利用前に与信審査がございます。詳しくは<a href="http://faq.np-atobarai.jp/faq/show/79?back=front%2Fcategory%3Asearch&category_id=1&commit=&keyword=%E4%B8%8E%E4%BF%A1&page=1&site_id=1&sort=sort_keyword&sort_order=desc&utf8=%E2%9C%93" target="_blank">こちら</a>をご確認ください。</p>

<h4 id="deliveryBox">宅配ボックス</h4>
<p>配送時にご不在の場合、宅配ボックスが設置されている場合にはそちらへお届けします。ご注文の際に宅配ボックスの利用を希望されない場合でも、まれに運送業者の判断で利用されてしまうことがございます。あらかじめご了承ください。<br>なお、代金引換でご購入の場合、宅配ボックスへのお届けはできません。</p>

<h4 id="deliveryTime">お届け日時の指定</h4>
<p>お届け日は、ご注文受付日の5日後～14日後の間でご指定いただけます。<br>また、お届け時間帯は以下よりご指定いただけます。</p>
<ul>
<li>午前中</li>
<li>14&nbsp;:&nbsp;00～16&nbsp;:&nbsp;00 </li>
<li>16&nbsp;:&nbsp;00～18&nbsp;:&nbsp;00 </li>
<li>18&nbsp;:&nbsp;00～20&nbsp;:&nbsp;00  </li>
<li>19&nbsp;:&nbsp;00～21&nbsp;:&nbsp;00  </li>
</ul>
<br>
<p class="notes">※最短でのお届けをご希望される場合は「時間帯指定なし」を選択してください。時間帯を指定されますと、お届け日が遅くなる場合があります。</p>
<p class="notes">※商品の在庫状況や配送状況により、ご指定の日時にお届けできない場合がございます。</p>
<p class="notes">※メール便でお届けする一部の商品は、お届け日時の指定ができません。</p>

<h4>お届け先の変更</h4>
<p>ご注文後のお届け先の変更は、商品が発送準備に入る前までに限り可能です。<a href="/html/faq#aboutmypage" target="_blank">マイページ</a>の「注文履歴の確認」でご注文のステータスが「発送準備中」「発送済み」「配達完了」になっている場合、お届け先の変更はできません。</p>

<h4>お買い上げ明細書</h4>
<p>お買い上げ明細書は商品に同梱してお送りしております。ご注文者と配送先が異なる場合においても同様です。<br>
お買い上げ明細書への金額記載をご希望されない場合は、商品ご購入時にお買い上げ明細書への「金額を記載しない」を選択してください。<br>
「金額を記載する」をご指定の場合、ご注文者と配送先が異なる場合でも金額を記載し、配送先にお送りいたします。<br>
また、お買い上げ明細書にはご購入商品の商品名を記載しています。セール商品をご購入される方は、明細書に「アウトレット商品」であることが記載されますのでご注意ください。</p>

<h4>領収書の発行について</h4>
<p>ザ・タイルショップからの領収書発行は、クレジットカードでお支払いいただいた場合のみ対応しております。<br>
お支払い方法による発行元については以下をご確認ください。</p>

<!--<table class="half">-->
<table>
<tr>
<th style="width:14%;">お支払い方法</th>
<th style="width:23%;">領収書発行元</th>
<th style="width:63%;">発行方法</th>
</tr>
<tr>
<td>クレジットカード</td>
<td>ザ・タイルショップ</td>
<td>商品を受領後、<a href="/mypage" target="_balnk">マイページ</a>から「注文履歴の確認」へ進み、該当するご注文エリアに表示される「領収書」からご確認ください。領収書ページの印刷も可能です。<br>
クレジットカード以外でお支払いされたご注文には「領収書」へのリンクは表示されません。</td>
</tr>
<tr>
<td>NP後払い</td>
<td>お支払い先の郵便局、銀行、コンビニエンスストア</td>
<td>ご注文代金をお支払いの際にご依頼ください。</td>
</tr>
<tr>
<td>代金引換</td>
<td>商品配送会社</td>
<td>商品受け取りの代金引換後、運送会社の配達員よりお受け取りください。</td>
</tr>
<tr>
<td>コンビニ前払い</td>
<td>お支払い先のコンビニエンスストア</td>
<td>店舗でご注文代金をお支払いの際にご依頼ください。</td>
</tr>
</table>

<p class="notes-table">※領収書は1注文番号につき1枚のみの発行となります。複数枚の発行はできません。</p>
</div>

<div class="guide-payment">
<h3 id="s2" class="payment">お支払いについて</h3>
<h4 id="payment_credit">クレジットカード</h4>
<table class="creditcard">
<tr>
<th>ご利用可能なカード</th>
<td><img src="<?php echo $wp_url; ?>/assets/img/guide/card.png" class="card">
<p class="notes">※デビット機能付きクレジットカードのご利用はお控えください</p>
</td>
</tr>
<tr>
<th>お支払い回数</th>
<td>1回、3回
<p class="notes">※ダイナースは3回分割払いはご利用いただけません</p>
</td>
</tr>
<tr>
<th>ご利用限度</th>
<td>30万円 (税別) まで<p class="notes-table">※ご利用のクレジットカードの限度額に依存します。</p></td>
</tr>
<tr>
<th>手数料</th>
<td>無料</td>
</tr>
<tr>
<th>引き落とし名義</th>
<td>ザ・タイルショップ オンラインショップ</td>
</tr>
</table>
<p class="notes-table">
※デビット機能付きクレジットカード (VISAデビットカード等) のご利用について<br>
クレジット認証時点で、デビット機能によりご指定の預金口座から代金が引き落とされます。クレジット認証後に注文内容が変更された場合は、変更前の利用金額は後日返金いたしますが、返金されるまでの間は2重引き落としとなり、返金までに最大で60日を要する可能性があります。上記の理由により、デビット機能付きクレジットカードでの決済はお勧めしていません。
</p>
<p class="notes-table">
※商品出荷時にクレジットカードの決済を実行します。その際、クレジットカードの有効性（限度額、有効期限など）に問題が発生した場合は、ご注文が自動的にキャンセルとなることがございます。あらかじめご了承ください。</p>
<p class="notes-table">※電話注文の場合には、ご利用いただけません。</p>

<h4 id="payment_daibiki">代金引換</h4>
<table>
<tr>
<th>取引会社</th>
<td>ヤマトフィナンシャル</td>
</tr>
<tr>
<th>ご利用限度</th>
<td>1回のご注文で30万円 (税別) まで<p class="notes">※お支払いは現金のみとなります。</p></td>
</tr>
<tr>
<th>手数料</th>
<td><table class="half">
<tr>
<th>ご利用金額 (税別) </th>
<th>手数料 (税別) </th>
</tr>
<tr>
<td>10,000円まで</td>
<td>324円</td>
</tr>
<tr>
<td>10,001円～30,000円</td>
<td>432円</td>
</tr>
<tr>
<td>30,001円～100,000円</td>
<td>648円</td>
</tr>
<tr>
<td>100,001円～300,000円</td>
<td>2,160円</td>
</tr>
</table></td>
</tr>
<tr>
<th>注意事項</th>
<td>宅配ボックスにはお届けできません</td>
</tr>
</table>
<p class="notes-table">※電話注文の場合にご利用いただける決済方法は、代金引換のみとなります。</p>
<h4 id="conv">コンビニ前払い</h4>
<table>
<tr>
<th>ご利用可能なコンビニエンスストア</th>
<td>セブン-イレブン、ローソン、ファミリーマート、サークルKサンクス、ミニストップ、デイリーヤマザキ、セイコーマート</td>
</tr>
<tr>
<th>ご利用限度</th>
<td>1回のご注文で30万円 (税別) 未満</td>
</tr>
<tr>
<th>お支払い方法</th>
<td>お支払い方法は、下記よりお選びいただいたコンビニの説明ページをご確認ください。(外部サイト)<br><img src="<?php echo $wp_url; ?>/assets/img/icons/blanksite.png" style="height:22px;width:22px;vertical-align:top;"><a href="https://bs.veritrans.co.jp/support/docs/cvs/consumer/711.html" target="_blank">セブン-イレブン</a>、<a href="https://bs.veritrans.co.jp/support/docs/cvs/consumer/lawson.html" target="_blank">ローソン</a>、<a href="https://bs.veritrans.co.jp/support/docs/cvs/consumer/famima2.html" target="_blank">ファミリーマート</a>、<a href="https://bs.veritrans.co.jp/support/docs/cvs/consumer/circleksunkus.html" target="_blank">サークルKサンクス</a>、<a href="https://bs.veritrans.co.jp/support/docs/cvs/consumer/ministop_loppi.html" target="_blank">ミニストップ</a>、<a href="https://bs.veritrans.co.jp/support/docs/cvs/consumer/dailyamazaki.html" target="_blank">デイリーヤマザキ</a>、<a href="https://bs.veritrans.co.jp/support/docs/cvs/consumer/seicomart.html" target="_blank">セイコーマート</a></td>
</tr>
<tr>
<th>手数料</th>
<td>無料</td>
</tr>
<tr>
<th>商品の発送時期</th>
<td>お支払い確認後から3日前後で発送</td>
</tr>
<tr>
<th>注意事項</th>
<td>ご注文受付日から4日以内にお支払いが確認できない場合、ご注文は自動的にキャンセルさせていただきます</td>
</tr>
</table>
<p class="notes-table">※入金確認後に出荷手配を行うため、入金のタイミングによっては配送希望日に商品をお届けできない場合があります。なにとぞご了承ください。</p>
<p class="notes-table">※電話注文の場合には、ご利用いただけません。</p>
<p></p>
<h4>NP後払い</h4>
<table>
<tr>
<th>お支払い先</th>
<td>郵便局、銀行、コンビニエンスストア
<p class="notes">※ご利用可能なコンビニエンスストア<br>セブン-イレブン、ローソン、ファミリーマート、サークルKサンクス、ミニストップ、デイリーヤマザキ、セイコーマート、ココストア、コミュニティ・ストア、スリーエフ、セーブオン、ポプラ</p>
</td>
</tr>
<tr>
<th>ご利用限度</th>
<td>購入者お1人につき設定されている利用可能枠 (54,000円 (税別)) まで</td>
</tr>
<tr>
<th>お支払い方法</th>
<td>請求書発行日から14日以内にお支払いください。<br/>
<p class="notes">※商品に請求書を同梱してお送りします。</p>
</td>
</tr>
<tr>
<th>手数料</th>
<td>324円 (税別)</td>
</tr>
<tr>
<th>注意事項</th>
<td>後払いのご注文には、株式会社ネットプロテクションズの提供するNP後払いサービスが適用され、サービスの範囲内で個人情報を提供し、代金債権を譲渡します。与信審査結果によっては他のお支払い方法をご利用いただく場合もございます。<br>
ご利用者が未成年の場合、法定代理人の利用同意を得てご利用ください。</td>
</tr>
</table>
<p class="notes-table">※株式会社ネットプロテクションズの与信審査に時間がかかる場合がございます。そのため配達希望日を指定されている場合、希望日までに商品をお届けできないことがあります。与信審査結果を確認後、最短の日程で商品をお送りさせていただきます。</p>
<p class="notes-table">※電話注文の場合には、ご利用いただけません。</p>

<div class="guide-cancel">
<h3 id="s3" class="cancel">キャンセル / 返品 / 交換</h3>
<h4>キャンセル</h4>
<p>ご注文のキャンセルは、商品が発送準備に入る前までに限り可能です。<a href="/html/faq#aboutmypage" target="_blank">マイページ</a>の「注文履歴の確認」でご注文のステータスが「発送準備中」「発送済み」「配達完了」になっている場合、お客さまのご都合によるキャンセルはできません。</p>
<h4>返品 / 交換</h4>
<p>以下の場合には返品 / 交換を承ります。なお、お客さまのご都合による返品 / 交換はお受けできませんので、あらかじめご了承ください。</p>
<ul>
<li>ご注文の商品とお届けした商品が異なっており、商品受領後7日以内にお客さまからカスタマーセンターへご連絡いただいた場合。</li>
<li>お届けした商品が破損しており、商品受領後7日以内にお客さまからカスタマーセンターへご連絡いただいた場合。</li>
</ul>
<div class="customer-center" style="max-width:660px;">
<h5>ザ・タイルショップ カスタマーセンター</h5>
<dl>
<dt>メールでのお問い合わせ</dt>
<dd><a href="/contact/">お問い合わせフォーム</a></dd>
<dt>お電話でのお問い合わせ</dt>
<dd>
<strong>052-263-1686</strong><span class="office-hour" style="line-height:1.4;">受付時間&nbsp;10:00～19:00&nbsp;&#40;定休日：火曜日&#41;</span>
</dd>
</dl>
</div>
</div>

<div class="guide-environment">
<h3 id="s6" class="environment">推奨環境</h3>
<p>ザ・タイルショップ オンラインショップを快適にご利用いただくため、以下のブラウザを推奨しています。</p>
<h4>パソコン</h4>
<table class="pc">
<tbody>
<tr>
<th>Windows</th>
<td>
Internet Explorer：10 / 11 最新版<br>
Firefox：最新版<br>
Chrome：最新版
</td>
</tr>
<tr>
<th>Mac OS</th>
<td>
Safari：最新版<br>
Firefox：最新版<br>
Chrome：最新版
</td>
</tr>
</tbody>
</table>
<h4>スマートフォン</h4>

<table class="sp">
<tbody>
<tr>
<th>iOS (iPhoneなど)</th>
<td>
iOS7以上
</td>
</tr>
<tr>
<th>Android OS</th>
<td>
Android4.2以上
</td>
</tr>
</tbody>
</table>
<p class="notes-table">※推奨以外のブラウザや、推奨以前のバージョンのブラウザをご利用の場合、動作や表示が正しく行われない可能性がございます。</p>
<p class="notes-table">※スマートフォンの端末によっては、ページが正しく表示されない場合がございます。</p>
</div>

</div>
</section>
</div>
<?php get_footer(); ?>
