<?php get_header(); ?>
<div id="main_contents">
<h1><img src="<?php bloginfo('template_directory'); ?>/img/waterserver-n.png" alt="" width="700"  /></h1>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="footmark"><a href="<?php bloginfo('url'); ?>/">トップページ</a><span>&nbsp;&gt;&nbsp;<?php the_title(); ?></span></div>
<dl class="wp_contents">
		<div class="post" id="post-<?php the_ID(); ?>">
<dt>
			<h2 class="contents_title"><?php the_title(); ?></h2>
</dt>
			<div class="entry">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link('編集.', '<p>', '</p>'); ?>

		</div>

		<?php comments_template(); ?>
<dd>
</dd>
</dl>
		<?php endwhile; endif; ?>
</div><!-- / main contents box -->
</div><!-- / contents box -->
<?php get_footer(); ?>
