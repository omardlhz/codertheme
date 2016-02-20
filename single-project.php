<?php get_header(); ?>
<?php
	if (have_posts()):
		while( have_posts() ): the_post(); ?>

			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
			<?php endif; ?>
			<article class="post" style="padding-bottom: 30px;">
			<div class="coverImage">
			<?php the_post_thumbnail( 'large' ); ?>
			<h1><?php the_title(); ?></h1>
			</div>
			<div class="theText">
			<?php the_content(); ?>
			</div>
			<div style="-moz-box-sizing: border-box; -webkit-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;background-image: linear-gradient(-180deg, #FBFBFB 0%, #E4E3E3 100%); position: absolute; bottom: 0; height: 30px; width: 100%;">Parte de abajo.</div>
			</article>
		<?php endwhile;
	endif;
?>
<h2 style="text-align: center;">Related Posts</h2>
<div id="postWrapper">
	<div id="postColumns">
		<?php
		// Custom Wordpress query, filters posts that belong to project.
		$pjtitle = get_the_title();
		$args = array('posts_per_page' => -1, 'post_type' => 'post', 'meta_query'=>array(array('key' => 'meta-box-dropdown', 'value' => $pjtitle)));
		$post_query = new WP_Query( $args );
		?>
		<?php if($post_query -> have_posts() ): ?>
		<?php while( $post_query->have_posts() ) : $post_query->the_post(); ?>
			<div class="postPin">
			<a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php if ( has_post_thumbnail() ) { ?>
    			<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>">
			<?php } ?>
			<p><?php the_excerpt(); ?></p>
			<a class="date" href="<?php echo 'http://'. $_SERVER['HTTP_HOST']. "/" ?><?php echo the_time('Y/m/d');?>"><?php the_time('F j, Y'); ?></a>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>