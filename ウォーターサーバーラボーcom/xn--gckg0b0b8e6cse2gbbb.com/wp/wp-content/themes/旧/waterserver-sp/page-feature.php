<?php

/* Template Name: 特徴別リスト用 */

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

if (is_page("natural_water")) {//天然水
//	$top_img = "img-visual-tennensui.jpg";
	$top_text = "大人気の美味しい天然水が飲めるサーバーをご紹介！";
	$description = "自宅で毎日美味しい天然水が飲める天然水サーバーは非常に人気があります。その中で特におすすめのウォーターサーバー業者をご紹介します。";
	$footmark_text = "天然水";
	$title_img = "ttl-ranking-tennensui.gif";
	$value = "natural";
	$max_rank = 3;
	$meta_key = 'recommend_order';
	$key = 'water_type';
	$compare = 'LIKE';

	$left_menu_order = 1;



} else if (is_page("ro_water")) {//RO水
//	$top_img = "10000014_set2.jpg";
	$top_text = "安心して飲めて美味しく、天然水よりお得なRO水のおすすめサーバー！";
	$description = "RO水は不純物をほぼ完全に除去し、その後ミネラルを添加して製造されたお水です。安心して飲める安全性と天然水の半分近いお値段に人気があります。";
	$footmark_text = "RO水";
	$title_img = "ttl-ranking-rosui.gif";
	$value = "ro";
	$max_rank = 2;


	$meta_key = 'ro_recommend';
	$key = 'ro_recommend';
	$value = '1';
	$compare = '>=';//値以上
	$type = 'NUMERIC';

	$left_menu_order = 2;

} else if (is_page("electric_utility_expense")) {//電気代
//	$top_img = "10000014_set3.jpg";
	$top_text = "通常のサーバーよりも電気代がお得な節電機能付きおすすめサーバー！";
	$description = "ウォーターサーバーは通常月約1,000円ぐらいの電気代がかかると言われています。しかし、節電機能が付いたサーバーを選ぶことで消費電力が最大３０～６５％ほど抑えられ、少しでも月のトータルコストを抑えたい方、エコを考えている方におすすめです。";
	$footmark_text = "電気代が安くなる";
	$title_img = "ttl-ranking-denkidai.gif";

	$meta_key = 'save_electricity';
	$key = 'save_electricity';
	$value = '1';
	$compare = '>=';//値以上
	$type = 'NUMERIC';
	$max_rank = 4;

	$left_menu_order = 3;

} else if (is_page("cost")) {//お水の価格が安い
//	$top_img = "10000014_set4.jpg";
	$top_text = "家計に優しいお水の価格が安いサーバーはこちら！";
	$description = "お水の種類は天然水とRO水の２種類ありますが、お水の値段が安いのはRO水になります。RO水は大家族やよく体を動かしたりとお水を大量に消費される家庭におすすめです。";
	$footmark_text = "お水の価格が安い";
	$title_img = "ttl-ranking-kakakugayasui.gif";

	$meta_key = 'leftmenu_low_price';
	$key = 'leftmenu_low_price';
	$value = '1';
	$compare = '>=';//値以上
	$type = 'NUMERIC';
	$max_rank = 3;

	$left_menu_order = 4;

} else if (is_page("baby")) {//赤ちゃんのミルク作りに
//	$top_img = "10000014_set5.jpg";
	$top_text = "赤ちゃんのミルク作りに最適なおすすめサーバー！";
	$description = "赤ちゃんはまだ胃や腸が未発達のため消費するのに負担がかからないお水がおすすめです。当サイトでご紹介している業者はすべて赤ちゃんの負担にならない軟水ですので安心してお選び下さい。特におすすめの業者はこちらです。";
	$footmark_text = "赤ちゃんのミルク作りに";
	$title_img = "ttl-ranking-akachan.gif";

	$meta_key = 'milk_recommend';
	$key = 'milk_recommend';
	$value = '1';
	$compare = '>=';//値以上
	$type = 'NUMERIC';
	$max_rank = 2;

	$left_menu_order = 5;

} else if (is_page("convenience")) {//利便性に優れたサーバー
//	$top_img = "10000014_set1.jpg";
	$top_text = "便利さ重視！高機能なおすすめサーバーをご紹介！";
	$description = "ウォーターサーバーの良さはやはり生活をより快適で便利にしてくれるところです。サーバーの機能や仕組みがしっかりしていて利便性の高いサーバーをご紹介します。";
	$footmark_text = "利便性に優れたサーバー";
	$title_img = "ttl-ranking-ribensei.gif";

	$meta_key = 'useful';
	$key = 'useful';
	$value = '1';
	$compare = '>=';//値以上
	$type = 'NUMERIC';
	$max_rank = 3;

	$left_menu_order = 6;

}

?>
<article>
<section id="main_contents_feature_menu">
<?php if ($top_img) : ?>
<h1><img src="<?php bloginfo('template_directory'); ?>/img/feature/<?php echo $top_img;?>" alt="<?php echo $top_text . " " . $description; ?>" width="300" /></h1>

<?php else : ?>
<h1><?php echo $top_text;?></h1>
<?php endif; ?>

<dl class="ranking">
	<dt>
		<h2><?php echo $footmark_text;?>ランキング</h2>
	</dt>

	<dd>
<?php if (!$top_img) : ?>
	<div>
		<p><?php echo $description; ?></p>
	</div>
<?php endif; ?>

<?php

	function callback($val){

		global $water_types;
		return $water_types[$val];
	}
	$args =  array( 'post_type' => 'waterserver','post_status' => 'publish','orderby' => 'meta_value','meta_key' => $meta_key, 'order' => 'ASC','posts_per_page' => $max_rank);
	$search_custom[] = array("key" => $key, "value"=>$value, "compare"=> $compare, "type"=>$type);
	$args['meta_query'] = $search_custom;


	$count = 0;
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
		$attachment_obj2 = get_field('banner2',$post->ID);
		$water_type_array = get_post_meta($post->ID,"water_type",true);
		$water_type_array = array_map('callback',$water_type_array);
		if (count($water_type_array) == 2) {

			$water_type = $water_type_array[0] . '(' . $water_type_array[1] . 'も有り)';
		} else {
			$water_type = implode('、',$water_type_array);
		}

		//コピーと説明を取得
		$catch_name = "leftmenu_catch" . $left_menu_order;
		$description_name = "leftmenu_description" . $left_menu_order;

		$catch = get_post_meta($post->ID, $catch_name, true);
		$item_description = get_post_meta($post->ID, $description_name, true);


		$count++;
?>
		<?php if ($count == $max_rank) : ?>
		<div class="ranking_result" id="ranking_last">
		<?php else: ?>
		<div class="ranking_result" id="ranking_no<?php echo $count;?>">
		<?php endif; ?>
			<h2>
				<img src="<?php bloginfo('template_directory'); ?>/img/feature/img-ranking0<?php echo $count;?>.png" alt="第<?php echo $count;?>位" width="86" height="60" />
				<a href="<?php bloginfo('url'); ?>/link?link_id=<?php echo $post->ID; ?>" rel="external nofollow"><?php echo get_post_meta($post->ID,"product_name", true); ?></a>
			</h2>

			<div class="server_caption">
				<?php if($count > 1 && $attachment_obj2 != ""){ ?>
				<img src="<?php echo $attachment_obj2; ?>" alt="<?php echo get_post_meta($post->ID,"product_name", true); ?>" />
				<?php } else if($attachment_obj != ""){ ?>
				<img src="<?php echo $attachment_obj; ?>" alt="<?php echo get_post_meta($post->ID,"product_name", true); ?>" />
				<?php } ?>
				<strong><?php echo $catch; ?></strong>
				<p><?php echo $item_description; ?></p>
			</div><!-- / server_caption [ranking no1] -->

			<table>
				<tr>
					<th><span>お水の価格（1本）</span></th>
				</tr>
				<tr>
					<td><span><?php if (is_page("cost") && get_post_meta($post->ID,"product_name", true) == "コスモウォーター") : echo "1197円～(12L) <br />※RO水の場合"; else: echo get_post_meta($post->ID,"water_cost", true); endif; ?></span></td>
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
					<td><span><?php if (is_page("electric_utility_expense") && get_post_meta($post->ID,"product_name", true) == "アクアクララ") : echo "1570円※節電サーバーの場合"; else: echo get_post_meta($post->ID,"server_cost", true); endif; ?></span></td>
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
				<tr>
					<td><span><?php echo $shipping_areas[get_field("shipping_area",$post->ID)];?></span></td>
				</tr>
			</table>
			<div class="link_btn">
			<em>
			<a href="<?php bloginfo('url'); ?>/link?link_id=<?php echo $post->ID; ?>" rel="external nofollow" class="official_site"><img src="<?php bloginfo('template_directory'); ?>/img/common/btn-official-site_off.jpg" alt="公式サイトへ" width="248" height="48" /></a>
			</em>
			</div>
		</div><!-- / ranking result [ranking no1] -->
<?php
	endwhile;
?>

	</dd>
</dl>
</section>
<p id="ranking_notice">※ランキングは<a href="<?php bloginfo('url'); ?>/investigation
">調査概要</a>に基づき決定させていただいております。</p>

<?php include(TEMPLATEPATH .'/inc/searchform.php'); ?>
<?php include(TEMPLATEPATH .'/inc/choose_feature.php'); ?>
</article>

<?php get_footer(); ?>
