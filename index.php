<?php get_header(); ?>
<?php

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	<article class="post">
	<h2><a class="postTitle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="theText">
	<?php the_excerpt(); ?>
	<div class="readWrapper"><a class="theLink" href="<?php the_permalink(); ?>">Read More...</a></div>
	<div class="dateWrapper"><a class ="theLink" href="<?php site_url() . the_time('Y/m/d');?>"><?php the_time('F j, Y'); ?></a></div>
	</div>
	</article>
	<?php endwhile; ?>
	<div style="text-align:center;">
	<?php posts_nav_link( ' &#183; ', 'Previous Page', 'Next Page' ); ?>
	</div>
	<?php else :

		echo '<p>No content found</p>';
	endif;
?>
