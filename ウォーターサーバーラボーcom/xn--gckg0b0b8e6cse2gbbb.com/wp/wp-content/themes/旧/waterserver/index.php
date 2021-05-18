<?php get_header(); ?>
<?php //get_sidebar(); ?>
<div id="main_contents">
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/"  id="footmark">
  <?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<div class="entry">

  			<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<?php the_content(); ?>
			</div>

		</div>

	<?php endwhile; ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>

</div><!-- / main contents box -->
<?php get_footer(); ?>