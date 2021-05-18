<?php get_header(); ?>
 <script type="application/javascript">
 $(window).load(function() {
		$("#btn_search_start").click(function () {
			$('#form1').submit();
		});
 });
</script>
<div id="main_contents">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php
		$image = get_field('header_img');
		$waterserver_id = get_field('id');

	?>

<div id="footmark"><a href="<?php bloginfo('url'); ?>/">トップページ</a><span>&nbsp;&gt;&nbsp;<?php the_title(); ?></span></div>
<dl class="ranking">
<dt>
		<h2 class="contents_title"><?php the_title(); ?></h2>
</dt>
<div style="margin:20px;"><?php the_content(); ?></div>
	<?php endwhile; endif; ?>
<dd>
</dd>
</dl>
<?php include(TEMPLATEPATH .'/inc/searchform.php'); ?>
</div><!-- / main contents box -->
<?php if(is_mobile()){
	get_sidebar();
} ?>
</div><!-- / contents box -->
<?php get_footer(); ?>