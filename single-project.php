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
			<div style="border: 1px solid #979797; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;background-image: linear-gradient(-180deg, #FBFBFB 0%, #E4E3E3 100%); position: absolute; bottom: 0; height: 30px; width: 100%;">Parte de abajo.</div>
			</article>
		<?php endwhile;
	endif;
?>
<?php get_footer(); ?>