<?php get_header(); ?>
<?php $home = home_url(); ?>

<main class="member">
<h2>ログイン</h2>
<div class="wrapper">
<div class="header_explanation">
<?php do_action('usces_action_login_page_header'); ?>
</div>

<form name="loginform" id="loginform" class="login" action="<?php echo apply_filters('usces_filter_login_form_action', USCES_MEMBER_URL); ?>" method="post">
<h3>会員の方</h3>
<span class="input-label">メールアドレス</span>
<input type="email" name="loginmail" id="loginmail" class="loginmail" value="<?php echo esc_attr(usces_remembername('return')); ?>" size="20" />

<span class="input-label">パスワード</span>
<input class="hidden" value=" " />
<input type="password" name="loginpass" id="loginpass" class="loginpass" size="20" autocomplete="off" />

<div class="submit">
<?php usces_login_button(); ?>
</div>
<?php do_action('usces_action_login_page_inform'); ?>

<div class="error_message"><?php usces_error_message(); ?></div>
</form>

<div class="signup">
<h3>会員登録がお済みでない方</h3>
<p class="text">新規会員登録はこちらからお進みください。</p>
<div class="submit"><a class="lh40" href="<?php usces_url('newmember') . apply_filters('usces_filter_newmember_urlquery', NULL); ?>" title="<?php _e('New enrollment for membership.', 'usces'); ?>">新規会員登録（無料）</a></div>
</div>
</div>

<script>
<?php if ( usces_is_login() ) : ?>
setTimeout( function(){ try{
d = document.getElementById('loginpass');
d.value = '';
d.focus();
} catch(e){}
}, 200);
<?php else : ?>
try{document.getElementById('loginmail').focus();}catch(e){}
<?php endif; ?>
</script>
<?php get_footer();
