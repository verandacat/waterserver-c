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

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php
		$image = get_field('header_img');
		$waterserver_id = get_field('id');

	?>
<?php $t = get_the_title(); ?>
<?php if(!is_mobile()){ ?>
	<?php
		if ($image) :
	?>

<h1><img src="<?php echo $image; ?>" alt="" /></h1>
	<?php endif; ?>
<div id="footmark"><a href="<?php bloginfo('url'); ?>/">トップページ</a><span>&nbsp;&gt;&nbsp;<?php the_title(); ?></span></div>
<dl class="ranking">
<dt>
		<h2 class="contents_title"><?php the_title(); ?></h2>

</dt>
<?php } ?>
<?php
$content = get_the_content();

?>

	<?php endwhile; endif; ?>
<?php

	function callback($val){

		global $water_types;
		return $water_types[$val];
	}
	if ($waterserver_id && is_numeric($waterserver_id)) {
		$args =  array( 'post_type' => 'waterserver','post_status' => 'publish','p' => $waterserver_id );

		$loop = new WP_Query($args);
		while ( $loop->have_posts() ) : $loop->the_post();
			$fields = get_field_object("bottle");
			$bottles = $fields['choices'];
			$fields = get_field_object("water_type");
			$water_types = $fields['choices'];
			$fields = get_field_object("shipping_area");
			$shipping_areas = $fields['choices'];
		endwhile;


?>
<?php if(!is_mobile()){ ?>

	<dd>
		<div class="ranking_result">
			<div class="server_caption">
				<?php if($attachment_obj != ""): ?>
				<img src="<?php echo $attachment_obj; ?>" alt="<?php echo get_post_meta($post->ID,"product_name", true); ?>" />
				<?php endif ?>
				<p><?php echo $content; ?></p>
			</div><!-- / server_caption [ranking no1] -->
			<table>
				<tr>
					<th><span>お水の価格（1本）</span></th><td><span><?php echo get_post_meta($post->ID,"water_cost", true);?></span></td>
					<th><span>お水の種類</span></th><td><span><?php echo $water_type; ?></span></td>
				</tr>
				<tr>
					<th><span>サーバー代（月）</span></th><td><span><?php echo get_post_meta($post->ID,"server_cost", true);?></span></td>
					<th><span>配送料</span></th><td><span><?php echo get_post_meta($post->ID,"shipping_cost", true);?></span></td>
				</tr>
				<tr>
					<th><span>ボトルの種類</span></th><td><span><?php echo $bottles[get_field("bottle",$post->ID)];?>タイプ</span></td>
					<th><span>電気代（月）</span></th><td><span><?php echo get_post_meta($post->ID,"electricity_cost", true);?></span></td>
				</tr>
				<tr class="last_tr">
					<th><span>配送地域</span></th><td colspan="3"><span><?php echo $shipping_areas[get_field("shipping_area",$post->ID)];?></span></td>
				</tr>
			</table>

			<a href="<?php the_permalink(); ?>" rel="external nofollow" class="official_site"><img src="<?php bloginfo('template_directory'); ?>/img/btn-official-site_off.jpg" alt="公式サイトへ" width="310" height="60" /></a>
		</div><!-- / ranking result [ranking no1] -->
	</dd>

<?php }else{ ?>

<div id="footmark"><a href="<?php bloginfo('url'); ?>/">トップページ</a><span>&nbsp;&gt;&nbsp;<?php echo $t; ?></span></div>
	<dl class="result search_result_items box">
	<dd>
<div class="s_items">
	<div class="s_items_header">
		<div class="upper_left">
			<a target="_blank" href="<?php bloginfo('url'); ?>/link?link_id=<?php echo $post->ID;?>"><img src="<?php echo $attachment_obj; ?>" alt="<?php echo get_post_meta($post->ID,"product_name", true); ?>" width="125" height="125" />
			</a>
		</div>
		<h3 class="list_item_title">
			<a target="_blank" href="<?php bloginfo('url'); ?>/link?link_id=<?php echo $post->ID;?>"><?php echo $t; ?></a>
		</h3>
	</div>
	<div class="s_items_body">
		<div class="s_items_upper">
			<div class="upper_right">
				<p><?php echo $content;?></p>
			</div>
		</div>
		<div class="s_items_table quad">
			<table>
				<tr>
					<th>配送料</th>
					<td><?php echo get_post_meta($post->ID,"shipping_cost", true);?></td>
					<th>お水の種類</th>
					<td><?php echo $water_type; ?></td>
				</tr>
				<tr>
					<th class="vl">サーバー代/月</th>
					<td><?php echo get_post_meta($post->ID,"server_cost", true);?></td>
					<th>ボトルの種類</th>
					<td><?php echo $bottles[get_field("bottle",$post->ID)];?>タイプ</td>
				</tr>
			</table>
		</div>
		<div class="s_items_table">
			<table>
				<tr>
					<th>お水の価格</th>
					<td><?php echo get_post_meta($post->ID,"water_cost", true);?></td>
				</tr>
				<tr>
					<th>宅配エリア</th>
					<td><?php echo $shipping_areas[get_field("shipping_area",$post->ID)];?></td>
				</tr>
				<tr>
					<th>電気代/月</th>
					<td><?php echo get_post_meta($post->ID,"electricity_cost", true);?></td>
				</tr>
			</table>
		</div>
		<div class="tokoshiki">

			<a href="<?php bloginfo('url'); ?>/link?link_id=<?php echo $post->ID;?>" rel="external nofollow" class="official_site">
				<span>公式サイトはこちら</span>
			</a>
		</div>
	</div>
</div>
</dd>
</dl>
<?php } ?>
<?php
	endwhile;
	if ($loop->found_posts == 0) :
?>
	<div style="margin:20px;"><?php echo $content; ?></div>
	<dd></dd>
	<?php endif;
	} else {
	?>
	<div style="margin:20px;"><?php echo $content; ?></div>
<dd>
</dd>
<?php } //endif ?>
</dl>

<?php if(!is_mobile()){ ?>
<dl id="campaign_info">
	<dt>
		<img src="<?php bloginfo('template_directory'); ?>/img/top/ttl-campaign-info.gif" alt="最新のお得キャンペーン情報" width="267" height="19" class="contents_title" />
		<img src="<?php bloginfo('template_directory'); ?>/img/top/txt-ttl-campaign-info-en.gif" alt="CAMPAIGN&nbsp;INFORMATION" width="163" height="12" class="contents_title_en" />
	</dt>
	<dd>
		<ul>
<?php
$category_id = get_cat_ID('キャンペーン');
$posts = get_posts("numberposts=2&category=$category_id");
?>
<?php
if($posts): foreach($posts as $post): setup_postdata($post);

 ?>
<li><span><a href="<?php the_permalink(); ?>"><?php 	if ($post->post_excerpt) : echo $post->post_excerpt; else: the_title(); endif;?></a></span></li>
<?php endforeach; endif;
?>
		</ul>
	</dd>
</dl>
<?php } ?>

<?php get_template_part( 'inc/searchform'); ?>
</div><!-- / main contents box -->
<?php if(is_mobile()){
	get_sidebar();
} ?>
</div><!-- / contents box -->
<?php get_footer(); ?>