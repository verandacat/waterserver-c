<?php get_header(); ?>
<?php get_sidebar(); ?>
<article>
<section id="main_contents">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
</section>
</article>
<?php get_footer(); ?>
