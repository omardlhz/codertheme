<?php get_header(); ?>
<?php

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	
	<article class="post">
	<a class="postTitle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<div class="theText">
	<?php the_excerpt(); ?>
	<div class="readWrapper"><a class="theLink" href="<?php the_permalink(); ?>">Read More...</a></div>
	<div class="dateWrapper"><a class ="theLink" href="<?php echo 'http://'. $_SERVER['HTTP_HOST']. "/" ?><?php echo the_time('Y/m/d');?>"><?php the_time('F j, Y'); ?></a></div>
	</div>
	</article>
	<?php endwhile; ?>

	<?php

		$currentPage = $paged;
		$maxPages = $wp_query->max_num_pages;

		if ($currentPage < $maxPages and $maxPages != 1) : ?>

			<div style=" width: 321.6px; float:right; text-align: left;";><?php echo next_posts_link() ?></div>

			
		<?php endif;

		if ($currentPage != 0): ?>

			<div style="width: 321.6px; float:left; text-align: right;"><?php echo previous_posts_link() ?></div>
			<a style=" width: 160.8px; margin:0 auto; display: block; text-align: center;">| <?php echo $currentPage ?> of <?php echo $maxPages ?> |</a>

		<?php else: ?>

			<a style=" width: 160.8px; margin:0 auto; display: block; text-align: center;">| 1 of <?php echo $maxPages ?> |</a>

		<?php endif; ?>

	<?php else :

		echo '<p>No content found</p>';
	endif;
?>
<?php get_footer(); ?>