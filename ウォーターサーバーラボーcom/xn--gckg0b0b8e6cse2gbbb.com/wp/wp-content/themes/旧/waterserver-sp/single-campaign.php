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
<section id="main_contents">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php
		$image = get_field('header_img');
		$waterserver_id = get_field('id');

	?>
	<?php
		if ($image) :
	?>

<h1><img src="<?php echo $image; ?>" alt="" width="300" /></h1>
	<?php endif; ?>	
<dl class="ranking">
<dt>
		<h2 class="contents_title"><?php the_title(); ?></h2>
		
</dt>	
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

		while ( $loop->have_posts() ) : $loop->the_post();

			$attachment_obj = get_field('banner',$post->ID);
			$water_type_array = get_post_meta($post->ID,"water_type",true);
			$water_type_array = array_map('callback',$water_type_array);
			if (count($water_type_array) == 2) {

				$water_type = $water_type_array[0] . '(' . $water_type_array[1] . 'も有り)';
			} else {
				$water_type = implode('、',$water_type_array);
			}

?>

	<dd>
		<div class="ranking_result">
			<div class="server_caption">
				<?php if($attachment_obj != ""): ?>
				<img src="<?php echo $attachment_obj; ?>" class="serverImage" alt="<?php echo get_post_meta($post->ID,"product_name", true); ?>" />
				<?php endif ?>
				<p><?php echo $content; ?></p>
			</div><!-- / server_caption [ranking no1] -->
			<table>
				<tr>
					<th><span>お水の価格（1本）</span></th>
				</tr>
				<tr>
				<td><span><?php echo get_post_meta($post->ID,"water_cost", true);?></span></td>
				</tr>
				<tr>
					<th><span>お水の種類</span></th>
				</tr>
				<tr>
					<td><span><?php echo $water_type; ?></span></td>
				</tr>
				<tr>
					<th><span>サーバー代（月）</span></th>
				</tr>
				<tr>
					<td><span><?php echo get_post_meta($post->ID,"server_cost", true);?></span></td>
				</tr>
				<tr>
					<th><span>配送料</span></th>
				</tr>
				<tr>
					<td><span><?php echo get_post_meta($post->ID,"shipping_cost", true);?></span></td>
				</tr>
				<tr>
					<th><span>ボトルの種類</span></th>
				</tr>
				<tr>
					<td><span><?php echo $bottles[get_field("bottle",$post->ID)];?>タイプ</span></td>
				</tr>
				<tr>
					<th><span>電気代（月）</span></th>
				</tr>
				<tr>
				<td><span><?php echo get_post_meta($post->ID,"electricity_cost", true);?></span></td>
				</tr>
				<tr>
					<th><span>配送地域</span></th>
				</tr>
				<tr class="last_tr">
				<td><span><?php echo $shipping_areas[get_field("shipping_area",$post->ID)];?></span></td>
				</tr>
			</table>
			<div class="link_btn">
			<em>
			<a href="<?php bloginfo('url'); ?>/link?link_id=<?php echo $post->ID; ?>" rel="external nofollow" class="official_site"><img src="<?php bloginfo('template_directory'); ?>/img/common/btn-official-site_off.jpg" alt="公式サイトへ" width="248" height="48" /></a>
			</em>
			</div>
		</div><!-- / ranking result [ranking no1] -->
	</dd>
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
</section>
<aside id="newest_campaign">
	<div>
    <h2>最新のお得キャンペーン情報</h2>
    
    <ul>
<?php
$category_id = get_cat_ID('キャンペーン');
$posts = get_posts("numberposts=2&category=$category_id");
?>
<?php
if($posts): foreach($posts as $post): setup_postdata($post);
?>
      <li><a href="<?php the_permalink(); ?>"><?php 	if ($post->post_excerpt) : echo $post->post_excerpt; else: the_title(); endif;?></a></li>
<?php endforeach; endif;
?>
    </ul>
  </div>
  
  <figure><a href="<?php bloginfo('url'); ?>/ranking/"><img src="<?php bloginfo('template_directory'); ?>/img/bnr-ranking.jpg" alt="2013年版 本気でオススメできる優良ウォーターサーバー 人気ランキング!" width="300" height="50"></a></figure>
</aside>

<?php include(TEMPLATEPATH .'/inc/searchform.php'); ?>
<?php include(TEMPLATEPATH .'/inc/choose_feature.php'); ?>
</article>
<?php get_footer(); ?>