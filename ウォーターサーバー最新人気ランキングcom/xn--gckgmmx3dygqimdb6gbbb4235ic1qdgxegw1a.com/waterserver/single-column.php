<?php get_header(); ?>

<style>

</style>
<div id="wrapper">

	

		<div id="footmark"><a href="<?php bloginfo('url'); ?>/">トップページ</a><span>&nbsp;&gt;&nbsp;<?php the_category('column'); ?></span><span>&nbsp;&gt;&nbsp;<?php the_title(); ?></span></div>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2 class="content-title"><?php the_title(); ?></h2>

		<div id="content-wrap">
			<?php if (is_mobile()): ?>
			<?php the_post_thumbnail('medium_thumbnail'); ?>
			<?php else: ?>
			<?php the_post_thumbnail('large_thumbnail'); ?>
			<?php endif ?>
			<?php the_content(); ?>
		</div>

<?php endwhile; endif; ?>


<?php get_footer(); ?>
</div><!-- / wrapper-->
</div><!-- / contents box -->
