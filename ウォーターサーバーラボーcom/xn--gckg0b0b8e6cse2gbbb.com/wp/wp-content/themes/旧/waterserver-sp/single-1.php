<?php get_header(); ?>
 <script type="application/javascript">
 $(window).load(function() {
		$("#btn_search_start").click(function () {
			$('#form1').submit();
		});
 });
</script>
<?php get_sidebar(); ?>
<article>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php
		$image = get_field('header_img');
		$waterserver_id = get_field('id');

	?>
<section id="main_contents">
<dl class="ranking">
<dt>
		<h2 class="contents_title"><?php the_title(); ?></h2>
</dt>
<div style="margin:20px;"><?php the_content(); ?></div>
	<?php endwhile; endif; ?>
<dd>
</dd>
</dl>
</section>
<?php include(TEMPLATEPATH .'/inc/searchform.php'); ?>
<?php include(TEMPLATEPATH .'/inc/choose_feature.php'); ?>
</article>
<?php get_footer(); ?>