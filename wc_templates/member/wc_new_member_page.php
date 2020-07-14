<?php get_header(); ?>

<main class="member-regist signup">
<h2>会員登録</h2>
<p>以下の会員登録フォームに必要事項をご入力ください。</p>
<div class="error_message"><?php usces_error_message(); ?></div>
<form class="regist" action="<?php echo apply_filters('usces_filter_newmember_form_action', usces_url('member', 'return')); ?>" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
<table border="0" cellpadding="0" cellspacing="0" class="customer_form">
<tr>
<th scope="row"><em><?php _e('*', 'usces'); ?></em><?php _e('e-mail adress', 'usces'); ?></th>
<td colspan="2"><input name="member[mailaddress1]" id="mailaddress1" type="text" value="<?php usces_memberinfo('mailaddress1'); ?>" /></td>
</tr>
<tr>
<th scope="row"><em><?php _e('*', 'usces'); ?></em><?php _e('E-mail address (for verification)', 'usces'); ?></th>
<td colspan="2"><input name="member[mailaddress2]" id="mailaddress2" type="text" value="<?php usces_memberinfo('mailaddress2'); ?>" /></td>
</tr>
<tr>
<th scope="row"><em><?php _e('*', 'usces'); ?></em><?php _e('password', 'usces'); ?></th>
<td colspan="2"><input class="hidden" value=" " /><input name="member[password1]" id="password1" type="password" value="<?php usces_memberinfo('password1'); ?>" autocomplete="off" /></td>
</tr>
<tr>
<th scope="row"><em><?php _e('*', 'usces'); ?></em><?php _e('Password (confirm)', 'usces'); ?></th>
<td colspan="2"><input name="member[password2]" id="password2" type="password" value="<?php usces_memberinfo('password2'); ?>" /></td>
</tr>
<?php uesces_addressform('member', usces_memberinfo(null), 'echo'); ?>
</table>
<?php usces_agree_member_field(); ?>
<div class="send"><?php usces_newmember_button($member_regmode); ?></div>
<?php do_action('usces_action_newmember_page_inform'); ?>
</form>

<div class="footer_explanation">
<?php do_action('usces_action_newmember_page_footer'); ?>
</div><!-- end of footer_explanation -->
</main>

<div id="zipModal" class="modal js-modal-shade">
<div class="modal-inner js-modal-inner">
<h2>郵便番号から住所を選択</h2>
<ul id="zipList"></ul><span class="button-close js-close-modal"></span>
</div>
</div>
<?php get_footer(); ?>
