<?php get_header(); ?>
<?php

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	<article class="post">
	<h2><a class="postTitle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="theText">
	<?php the_excerpt(); ?>
	<div class="readWrapper"><a class="theLink" href="<?php the_permalink(); ?>">Read more...</a></div>
	<div class="dateWrapper"><a class ="theLink" href="<?php site_url() . the_time('Y/m/d');?>"><?php the_time('F j, Y'); ?></a></div>
	</div>
	</article>

	<?php endwhile;
	if ( get_next_posts_link() || previous_posts_link()) { ?>
	 	
	 	<hr>

	<?php } ?>

	<div><?php previous_posts_link('Older'); ?></div>
	<div><?php next_posts_link('Newer'); ?></div>
	<?php else :

		echo '<p>No content found</p>';
	endif;
?>