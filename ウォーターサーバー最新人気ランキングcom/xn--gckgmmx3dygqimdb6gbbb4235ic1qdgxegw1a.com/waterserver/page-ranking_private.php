<?php

/* Template Name: ランキング用_private */

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

<h1><img src="<?php bloginfo('template_directory'); ?>/img/top/bnr-ranking_off.jpg" alt="2014年版　本気でオススメできる優良ウォーターサーバー人気ランキング" width="700" height="99" /></h1>
<div id="footmark"><a href="<?php bloginfo('url'); ?>/">トップページ</a><span>&nbsp;&gt;&nbsp;人気ランキング</span></div>

<dl class="ranking">
	<dt>
		<img src="<?php bloginfo('template_directory'); ?>/img/feature/ttl-ranking-ranking.gif" alt="人気ランキング" width="173" height="19" class="contents_title" />
		<img src="<?php bloginfo('template_directory'); ?>/img/feature/txt-ranking-en.gif" alt="RANKING" width="60" height="12" class="contents_title_en" />
	</dt>

	<dd>
	<div>
		<p style="margin:20px;">実際にウォーターサーバー利用者の評価が高い優良ウォーターサーバー５社をご紹介します！<br />各項目において高ポイントを得た選び抜かれた優秀なウォーターサーバーです。</p>
	</div>

<?php

	$copy_array = array(
							array("catch" => "美味しい４種類の天然水から選べる!<br />赤ちゃんや小さなお子さんがいても安心して使えるサーバー<br />エコモデルは消費電力最大６０％OFF",
							"description" =>"<em>今年No1</em>に選ばれたのはコスモウォーター！ミネラル豊富な４種類の天然水からお選びいただけます。新登場の<em>らく楽スタイル ウォーターサーバー</em>はボトルを下部にセットできるから持ち上げ不要でお子さんや女性でも楽に使えて大好評です。"),
							array("catch" => "４種類の天然水から目的別にチョイス出来る！<br />初回ボトル２本プレゼント中で初期費用０円！<br/>新サーバー導入で人気急上昇中！",
							"description" =>"目的別に４種類の天然水からお選びいただけます。<em>サーバー代、配送料、メンテナンス代すべて０円</em>で今なら<span style='color:red;font-weight:bold;'>無料</span>でスタート出来ます。節電機能付き＆衛生面◎、ボトル交換らくらくのサーバーを導入し、非常におすすめです。"),
							array("catch" => "まろやかな味わいの富士山のバナジウム天然水！<br/>いまなら２パック無料＆サーバー代初月無料！",
							"description" =>"天然水としては<span style='color:red;font-weight:bold;'>当サイト最安</span>で<em>天然水をたくさん飲みたいけど家計にも優しいサーバーを選びたい</em>という方におすすめ。節電機能や温度２段階調節機能、高温循環モードなどが付いた高機能サーバーです。"),

							array("catch" => "３年連続モンドセレクション金賞受賞<br />おしゃれさが売りのウォーターサーバー",
							"description" =>"富士山のバナジウム天然水の中では唯一モンドセレクション金賞を受賞している天然水です。おしゃれなサーバーはインテリアとしてもGOODで、購入orレンタル（無料）どちらかを選べます。"),
							array("catch" => "富士山の標高1000mから採水したバナジウム天然水！<br />自動クリーンシステムや省エネ設計の高機能サーバー
", "description" =>"富士山の地下より採水したお水を山道の湧き水のような美味しさを保つために希少な非加熱処理。ほのかに甘い後味が人気です。１パックが軽量なため、女性やお子さんでも楽に取り付け可能。"),
							array("catch" => "モンドセレクション最高金賞２年連続受賞の美味しいお水！<br />節電サーバーやキャラクターサーバーなど選べる種類が豊富", "description" =>"ROろ過したきれいなお水に独自の比率でミネラルを添加して生まれた美味しいお水です。サーバー代は有料ですがしっかりとした定期メンテナンスが有り、お水の値段も天然水より安く経済的です。"),
	);

	function callback($val){

		global $water_types;
		return $water_types[$val];
	}
	$max_rank = 7;
	$args =  array( 'post_type' => 'waterserver','post_status' => 'private','orderby' => 'meta_value', 'meta_key' => 'recommend_order', 'order' => 'ASC', 'posts_per_page' => $max_rank);


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
		$water_type_array = get_post_meta($post->ID,"water_type",true);
		$water_type_array = array_map('callback',$water_type_array);
		if (count($water_type_array) == 2) {

			$water_type = $water_type_array[0] . '(' . $water_type_array[1] . 'も有り)';
		} else {
			$water_type = implode('、',$water_type_array);
		}

		$catch = get_post_meta($post->ID, "ranking_catch", true);
		$description = get_post_meta($post->ID, "ranking_description", true);

		$count++;
?>

		<?php if ($max_rank == $count) : ?>
		<div class="ranking_result" id="ranking_last">
		<?php else: ?>
		<div class="ranking_result" id="ranking_no<?php echo $count;?>">
		<?php endif; ?>
			<h2>
				<img src="<?php bloginfo('template_directory'); ?>/img/feature/img-ranking0<?php echo $count;?>.png" alt="第<?php echo $count;?>位" width="86" height="60" />
				<a href="<?php bloginfo('url'); ?>/link?link_id=<?php echo $post->ID; ?>" rel="external nofollow"><?php echo get_post_meta($post->ID,"product_name", true); ?></a>
			</h2>

			<div class="server_caption">
				<?php if($attachment_obj != ""): ?>
				<img src="<?php echo $attachment_obj; ?>" alt="<?php echo get_post_meta($post->ID,"product_name", true); ?>" />
				<?php endif ?>
				<div class="floatright"><strong><?php echo $catch; ?></strong>
				<p><?php echo $description; ?></p>
			</div></div><!-- / server_caption [ranking no1] -->

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

			<a href="<?php bloginfo('url'); ?>/link?link_id=<?php echo $post->ID; ?>" rel="external nofollow" class="official_site"><img src="<?php bloginfo('template_directory'); ?>/img/common/btn-official-site_off.jpg" alt="公式サイトへ" width="310" height="60" /></a>
		</div><!-- / ranking result [ranking no1] -->
<?php
	endwhile;
?>

	</dd>
</dl>
<p id="ranking_notice">※ランキングは<a href="<?php bloginfo('url'); ?>/investigation
">調査概要</a>に基づき決定させていただいております。</p>

<?php include(TEMPLATEPATH .'/inc/searchform.php'); ?>

</div><!-- / main contents box -->
<?php if(is_mobile()){
	get_sidebar();
} ?>
</div><!-- / contents box -->

<?php get_footer(); ?>
