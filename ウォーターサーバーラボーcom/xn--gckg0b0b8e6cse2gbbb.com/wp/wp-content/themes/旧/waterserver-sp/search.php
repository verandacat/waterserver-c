<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="main_contents">
	<?php if (have_posts()) : ?>

		<h2>検索結果</h2>

		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><?php the_title(); ?></h2>


				<div class="entry">

					<?php the_excerpt(); ?>

				</div>

			</div>

		<?php endwhile; ?>

		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>お探しのページは見つかりませんでした。</h2>

	<?php endif; ?>

</div><!-- / main contents box -->
</div><!-- / contents box -->
<?php get_footer(); ?>
