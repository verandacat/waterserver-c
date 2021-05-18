<?php
/* Template Name: フロントページ用 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="main_contents">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
	<?php else : ?>
		<h2>Not Found</h2>
	<?php endif; ?>
  
  <?php //ここからトップページ内容 ?>
  
</div><!-- / main contents box -->
</div><!-- / contents box -->
<?php get_footer(); ?>