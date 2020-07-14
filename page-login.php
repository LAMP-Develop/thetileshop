<?php get_header(); ?>
<?php $home = home_url(); ?>
<main class="member">
        <h2>ログイン</h2>
        <div class="wrapper">
          <form name="login" class="login" method="post">
            <input type="hidden" name="buttonNo" value="B-0001"/>
            <input type="hidden" name="returnUrl" value=""/>

            <h3>会員の方</h3>
            <!-- ここにはJSバリデートを入れていません-->
            <span class="input-label">メールアドレス</span>
            <input type="email" name="email" value="" placeholder="taro@the-tileshop.com" data-input="1" data-value_type="email" data-necessary="1">
            <p class="form-error input-error-email">エラーです</p>

            <span class="input-label">パスワード</span>
            <input type="password" name="password" value="" placeholder="" data-input="1" data-value_type="password" data-necessary="1">
            <p class="form-error input-error-password">エラーです</p>
            <div class="submit">
              <input type="submit" name="" value="ログイン" disabled class="js-form-submit">
            </div>
            <p class="forgot-password"><a href="/pwd/reissue/" class="button-forgot">パスワードをお忘れの方</a></p>

          </form>
          <div class="signup">

            <h3>会員登録がお済みでない方</h3>
            <p class="text">新規会員登録はこちらからお進みください。</p>
            <div class="submit"><a href="<?php echo $home; ?>/register" class="button-create-account">新規会員登録&nbsp;&#40;無料&#41;&nbsp;</a></div>
          </div>
        </div>
      </main>
<?php get_footer(); ?>
<?php get_header(); ?>
<div id="container" class="clearfix">
<main class="colnum1"><!-- ▼メイン -->
<div id="mypagecolumn" class="member mypage-top member-history slender-wrapper">

<div id="mynavi_area">
<ul class="mynavi_list clearfix">
<li><a href="https://the-tileshop.sakura.ne.jp/mypage/" class=" selected">注文履歴の確認</a></li>
<li><a href="https://the-tileshop.sakura.ne.jp/mypage/favorite.php" class="">ほしいものリストを見る</a></li>
<li><a href="https://the-tileshop.sakura.ne.jp/mypage/change.php" class="">会員情報の確認 / 変更</a></li>
<li><a href="https://the-tileshop.sakura.ne.jp/mypage/delivery.php" class="">アドレス帳の確認 / 変更</a></li>
<li><a href="https://the-tileshop.sakura.ne.jp/mypage/refusal.php" class="">退会手続き</a></li>
<li><?php usces_loginout(); ?></li>
</ul>

</div>
<!--▲NAVI-->
<div id="mycontents_area">
<div class="user-information">
<p class="user-specific">
<span class="user-name">荻野 皓太　様</span><span class="user-email">ogino090807@gmail.com</span>
</p>

</div>
<form name="form1" id="form1" method="post" action="https://the-tileshop.sakura.ne.jp/mypage/?">
<input type="hidden" name="transactionid" value="e14b3125c30842aeb46bbc00fd39e661335f90bc">
<input type="hidden" name="order_id" value="">
<input type="hidden" name="pageno" value="">

<h2 class="title">注文履歴の確認</h2>
<p>購入履歴はありません。</p>
</form></div>
</div>
</main>

<?php get_footer(); ?>
