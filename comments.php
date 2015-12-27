<article class="post">
<div class="theText">
<h4 style="color: #666666;">ALL COMMENTS <?php comments_number( '(0)', '(1)', '(%)' ); ?></h4>
<?php if(comments_open()): ?>  

	<?php if(get_option('comment_registration') && !$user_ID) : ?>


		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

	<?php else: ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if($user_ID): ?>

			<p style="font-size: 15px;"> Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
		<?php else: ?>

			<input class="textStyle" placeholder="Name <?php if($req) echo "(required)"; ?>" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" />
			<input class="textStyle" placeholder="Mail <?php if($req) echo "(required)"; ?>" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" />
		<?php endif; ?>
		<p><textarea class="commentArea" placeholder="Add a public comment..." rows="10" name="comment" id="comment" maxlength="200"></textarea>
		<input class="myButton" name="submit" type="submit" id="submit" tabindex="5" value="Post" />
		<span style="float: right; font-size: 16px; color: #767676; padding-right: 10px; padding-top: 5px;" id="characters"></span>
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
		<?php do_action('comment_form', $post->ID); ?>
		</form>
		</p>
	<?php endif; ?>
	<br />
	<?php if($comments) : ?>
	  	<?php foreach($comments as $comment) : ?>
				<div style="margin-left: 70px; margin-bottom: 25px;">
				  <div style="float: right; width: 100%;">
				  <div style="font-size: 14px; margin: 0px; padding: 0px; margin-left: 10px; display: inline; font-weight: bold;"><?php comment_author_link(); ?> on <?php comment_date(); ?></div>
				  <?php if ($comment->comment_approved == '0') : ?>
					<span style="font-style: italic; font-size: 12px; color: #a0a0a0;">Your comment is awaiting approval</span>
				  <?php endif; ?>
				  <p style="font-size: 14px; margin: 0px; padding: 0px; margin-left: 10px;"><?php echo $comment->comment_content; ?></p>
				  <?php comment_reply_link(); ?>
				  </div>
				  <div style="float: left; width: 70px; margin-left: -70px;">
				  <?php echo get_avatar(get_comment_author_email(), 70, $default_avatar ) ?>
				  </div>
				  <div style="clear: both;"></div>
				</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p style="font: Arial; font-size: 14px; text-align: center; color: #767676;">No comments to display</p>
	<?php endif; ?>

<?php else: ?>
	<p style="font: Arial; font-size: 14px; text-align: center; color: #767676;">Comments are closed</p>
<?php endif; ?>
</div>
</article>

<script>
$(document).ready(function() {
    var text_max = 200;
    $('#characters').html(text_max);

    $('#comment').keyup(function() {
        var text_length = $('#comment').val().length;
        var text_remaining = text_max - text_length;

        $('#characters').html(text_remaining);
    });
});
</script>