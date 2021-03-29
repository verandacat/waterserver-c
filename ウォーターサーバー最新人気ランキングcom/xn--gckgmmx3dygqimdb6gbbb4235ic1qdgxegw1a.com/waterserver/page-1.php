<?php

/* Template Name: waterserver1 */

?>
<?php get_header(); ?>

<div id="main_contents">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="footmark"><a href="<?php bloginfo('url'); ?>/">トップページ</a><span>&nbsp;&gt;&nbsp;<?php the_title(); ?></span></div>
<dl class="wp_contents">
<dt>
		<h2 class="contents_title"><?php the_title(); ?></h2>

</dt>
		<div class="post" id="post-<?php the_ID(); ?>">


			<div class="entry">

				<?php the_content(); ?>

			</div>


		</div>

<dd>
</dd>
</dl>
		<?php endwhile; endif; ?>

</div><!-- / main contents box -->

<?php if(is_mobile()){
	get_sidebar();
} ?>
</div><!-- / contents box -->
<?php get_footer(); ?>
