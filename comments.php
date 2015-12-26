<article class="post">
<div class="theText">
<h3>ALL COMMENTS</h3>
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
		<p><textarea class="commentArea" placeholder="Add a public comment..." rows="10" name="comment" id="comment"></textarea>
		<input class="myButton" name="submit" type="submit" id="submit" tabindex="5" value="Post" />
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
				  <?php if ($comment->comment_approved == '0') : ?>
					<p style="width:100%;">Your comment is awaiting approval</p>
				  <?php endif; ?>
				  <div style="font-size: 14px; margin: 0px; padding: 0px; margin-left: 10px; font-weight: bold;"><?php comment_author_link(); ?> on <?php comment_date(); ?></div>
				  <p style="font-size: 14px; margin: 0px; padding: 0px; margin-left: 10px;"><?php echo $comment->comment_content; ?></p>
				  </div>
				  <div style="float: left; width: 70px; margin-left: -70px;">
				  <?php echo get_avatar(get_comment_author_email(), 70, $default_avatar ) ?>
				  </div>
				  <div style="clear: both;"></div>
				</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>No comments yet</p>
	<?php endif; ?>

<?php else: ?>

	<p>The comments are closed.</p>

<?php endif; ?>




</div>
</article>