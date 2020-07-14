<?php
get_header();
?>

<main class="member mypage-top">
<?php if (have_posts()) : usces_remove_filter(); ?>
<h2>マイページ</h2>
<div class="user-information">
<p class="user-specific">
<span class="user-name">
<?php esc_html_e(sprintf(_x('%s', 'honorific', 'usces'), usces_localized_name(usces_memberinfo('name1', 'return'), usces_memberinfo('name2', 'return'), 'return'))); ?>
</span><span class="user-email">
<?php usces_memberinfo('mailaddress1'); ?>
</span>
</p>
<!--<ul class="user-status">
<li>
<span class="status-title">保有ポイント<a href="/member/point">有効期限の確認</a></span>
<span class="status-value">16ポイント</span>
</li>
<li>
<span class="status-title">メールマガジン</span>
<span class="status-value">登録中</span>
</li>
<li class="subscribe none">
<span class="status-title">定期購入<span class="quantity">数量</span></span>
<span class="status-value">現在お申込み中の定期購入はありません<span class="quantity">0</span></span>
</li>
</ul>-->
</div>
<div class="wrapper mypage-top">
<div class="mypage-menu">
<section>
<h3>ご購入について</h3>
<a href="#history" class="mypage-history">
<em>注文履歴の確認</em>
</a>
<a href="#" class="mypage-clip">
<em>ほしいものリストを見る</em>
</a>
<!--<a href="/member/subscriberclub" class="mypage-subscriberclub">
<em>定期購入の確認 / 変更</em>
</a>
<a href="/member/point" class="mypage-point">
<em>ポイントの確認</em>
</a>-->
</section>
<section>
<h3>登録情報について</h3>
<a href="#edit" tabindex="-1" class="mypage-modify"><em>会員情報の確認 / 変更</em></a>
<a href="#edit" tabindex="-1" class="mypage-address"><em>アドレス帳の確認 / 変更</em></a>
<a href="#edit" tabindex="-1" class="mypage-mail"><em>メールアドレス / パスワードの変更</em></a>
<!--<a href="/mailmagazine/" tabindex="-1" class="mypage-mailmagazine"><em>メールマガジンの設定</em></a>-->
<!--<a href="/member/payment" tabindex="-1" class="mypage-payment"><em>クレジットカード</em></a>-->
</section>
<section class="other">
<h3>その他</h3>
<a class="mypage-resign" onclick="return confirm('<?php _e('All information about the member is deleted. Are you all right?', 'usces'); ?>');"><em>退会手続き</em></a>
<!-- member.cssを修正 -->
<li class="mypage-logout"><?php usces_loginout(); ?></li>
</section>
</div>
</div>
<?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'usces'); ?></p>
<?php endif; ?>
</main>

<div id="content" class="two-column">
<div class="catbox">

<?php if (have_posts()) : usces_remove_filter(); ?>

<div class="post" id="wc_<?php usces_page_name(); ?>">
<div class="entry">

<div id="memberpages">

<div class="whitebox">
<div id="memberinfo" class="container">

<div class="header_explanation">
<?php do_action('usces_action_memberinfo_page_header'); ?>
</div>

<h3><a name="history"></a><?php _e('Purchase history', 'usces'); ?></h3>
<div class="currency_code"><?php _e('Currency', 'usces'); ?> : <?php usces_crcode(); ?></div>
<?php usces_member_history(); ?>

<h3><a name="edit"></a><?php _e('Member information editing', 'usces'); ?></h3>
<div class="error_message"><?php usces_error_message(); ?></div>
<form action="<?php usces_url('member'); ?>#edit" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
<table class="customer_form">
<?php uesces_addressform('member', usces_memberinfo(null), 'echo'); ?>
<tr>
<th scope="row"><?php _e('e-mail adress', 'usces'); ?></th>
<td colspan="2"><input name="member[mailaddress1]" id="mailaddress1" type="text" value="<?php usces_memberinfo('mailaddress1'); ?>" /></td>
</tr>
<tr>
<th scope="row"><?php _e('password', 'usces'); ?></th>
<td colspan="2"><input class="hidden" value=" " /><input name="member[password1]" id="password1" type="password" value="<?php usces_memberinfo('password1'); ?>" autocomplete="off" />
<?php _e('Leave it blank in case of no change.', 'usces'); ?></td>
</tr>
<tr>
<th scope="row"><?php _e('Password (confirm)', 'usces'); ?></th>
<td colspan="2"><input name="member[password2]" id="password2" type="password" value="<?php usces_memberinfo('password2'); ?>" />
<?php _e('Leave it blank in case of no change.', 'usces'); ?></td>
</tr>
</table>
<input name="member_regmode" type="hidden" value="editmemberform" />
<div class="send">
<!-- member.cssでスタイリング -->
<input name="top" type="button" value="<?php _e('Back to the top page.', 'usces'); ?>" onclick="location.href='<?php echo home_url(); ?>'" />
<input name="editmember" type="submit" value="<?php _e('update it', 'usces'); ?>" />
<input name="deletemember" type="submit" value="<?php _e('delete it', 'usces'); ?>" onclick="return confirm('<?php _e('All information about the member is deleted. Are you all right?', 'usces'); ?>');" />
</div>
<?php do_action('usces_action_memberinfo_page_inform'); ?>
</form>

<div class="footer_explanation">
<?php do_action('usces_action_memberinfo_page_footer'); ?>
</div>
</div><!-- end of memberinfo -->
</div><!-- end of whitebox -->
</div><!-- end of memberpages -->

</div><!-- end of entry -->
</div><!-- end of post -->
<?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'usces'); ?></p>
<?php endif; ?>
</div><!-- end of catbox -->
</div><!-- end of content -->

<?php get_footer(); ?>
