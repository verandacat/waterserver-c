<?php

/* Template Name: waterserver-footer-menu */

?>
<?php get_header(); ?>
 <script type="application/javascript">
 $(window).load(function() {
		$("#btn_search_start").click(function () {
			$('#form1').submit();
		});
 });
</script>
<?php
$top_img = "";
if (is_page("about")) {
	$top_img = "waterserver-1.gif";
} else if (is_page("recommend_reason")) {
	$top_img = "waterserver-2.gif";
} else if (is_page("choice")) {
	$top_img = "waterserver-3.gif";
} else if (is_page("guide")) {
	$top_img = "waterserver-5.gif";
} else if (is_page("comparison")) {
	$top_img = "waterserver-4.gif";
} else if (is_page("economical")) {
	$top_img = "waterserver-6.gif";
}

?>
<div id="main_contents">
<?php if ($top_img) : ?>
<h1><img src="<?php bloginfo('template_directory'); ?>/img/footer/<?php echo $top_img;?>" alt="" width="700"  /></h1>
<?php endif; ?>
<div id="footmark"><a href="<?php bloginfo('url'); ?>/">トップページ</a><span>&nbsp;&gt;&nbsp;<?php the_title(); ?></span></div>
<dl class="wp_contents">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<dt>
		<h2 class="contents_title"><?php the_title(); ?></h2>

</dt>
		<div class="post" id="post-<?php the_ID(); ?>">

			<div class="entry">

				<?php the_content(); ?>

			</div>


		</div>
		<?php endwhile; endif; ?>
<dd>
</dd>
</dl>
<?php include(TEMPLATEPATH .'/inc/searchform.php'); ?>
<?php if(!is_mobile()){ ?>

<a href="<?php bloginfo('url'); ?>/ranking/" id="banner_ranking"><img src="<?php bloginfo('template_directory'); ?>/img/top/bnr-ranking_off.jpg" alt="2013年版　本気でオススメできる優良ウォーターサーバー人気ランキング" width="700" height="99" /></a>

<?php } ?>
</div><!-- / main contents box -->
<?php if(is_mobile()){
	get_sidebar();
} ?>
</div><!-- / contents box -->

<?php get_footer(); ?>