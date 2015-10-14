<?php get_header(); ?>
<?php
	if (have_posts()):
		while( have_posts() ): the_post(); ?>

			<article class="post">
			<div class="theText">
			<h2 class="postTitle"><?php the_title(); ?></h2>
			<?php the_content(); ?>
			</div>
			</article>
		<?php endwhile;
	endif;
?>