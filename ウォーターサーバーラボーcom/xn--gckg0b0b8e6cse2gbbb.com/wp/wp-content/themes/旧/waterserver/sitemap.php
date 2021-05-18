<?php
/* Template Name: サイトマップ */
?>
<?php get_header(); ?>
 <script type="application/javascript">
 $(window).load(function() {
		$("#btn_search_start").click(function () {
			$('#form1').submit();
		});
 });
</script>
<div id="main_contents">
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/"  id="footmark">
  <?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>
		<div class="post" id="post-<?php the_ID(); ?>">

			<div class="entry">

			<h2>サイトマップ</h2>
			<ul>
			<?php wp_list_pages('title_li=&exclude=68,125'); ?>
			</ul>

			</div>


		</div>
<?php get_template_part( 'inc/searchform'); ?>
</div><!-- / main contents box -->
<?php if(is_mobile()){
	get_sidebar();
} ?>
</div><!-- / contents box -->

<?php get_footer(); ?>