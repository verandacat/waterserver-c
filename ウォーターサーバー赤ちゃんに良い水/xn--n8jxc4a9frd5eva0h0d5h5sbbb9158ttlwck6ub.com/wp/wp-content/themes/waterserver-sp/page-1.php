<?php

/* Template Name: waterserver1 */

?>
<?php get_header(); ?>

<article>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section id="main_contents">
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
</section>
		<?php endwhile; endif; ?>
<?php include(TEMPLATEPATH .'/inc/searchform.php'); ?>
<?php include(TEMPLATEPATH .'/inc/choose_feature.php'); ?>
</article>
<?php get_footer(); ?>
