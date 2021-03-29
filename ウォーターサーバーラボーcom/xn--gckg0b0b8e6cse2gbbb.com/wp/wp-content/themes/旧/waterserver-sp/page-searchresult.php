<?php

/* Template Name: 検索結果用 */

get_header(); ?>

 <script type="application/javascript">
 $(window).load(function() {
		$("#btn_search_start").click(function () {
			$('#form1').submit();
		});
 });
</script>

<article>
<?php
//エリア検索の場合はそちら優先
if (isset($_GET['pref'])) {

	$pref = $_GET['pref'];
	//shipping_area
	//1 : 全国
	//2 : 全国（沖縄、離島除く）
	//3 : 全国（北海道、沖縄、離島除く）
	//4 : 東京（離島除く）、神奈川、埼玉、茨城の一部、千葉県北部

	//沖縄の場合 全国
	//北海道の場合、全国・全国（沖縄、離島除く）
	//東京、神奈川、埼玉、茨城、千葉の場合　すべて
	//それ以外　全国,全国(沖縄、離島を除く）全国(北海道、沖縄、離島を除く）
	//北海道、青森県｜岩手県｜宮城県｜山形県｜福島県、茨城県｜栃木県｜群馬県｜千葉県｜埼玉県｜東京都｜神奈川県｜山梨県、石川県｜岐阜県｜愛知県｜三重県、大阪府｜奈良県

	switch ($pref) {

		case 'okinawa':
						$shipping_area = array(1);
						break;

		case 'hokkaido':
						$shipping_area = array(1,2,5);
						break;

		case 'aomori':
		case 'iwate':
		case 'miyagi':
		case 'yamagata':
		case 'fukushima':
		case 'tochigi':
		case 'gunma':
		case 'yamanashi';
		case 'ishikawa':
		case 'gifu':
		case 'aichi':
		case  'mie':
		case  'osaka':
		case  'nara':	$shipping_area = array(1,2,3,5);
						break;

		case 'tokyo':
		case  'kanagawa':
		case  'saitama':
		case  'ibaraki':
		case  'chiba' :
					$shipping_area = array(1,2,3,4,5);
					break;
		default:
					$shipping_area =  array(1,2,3);
	}

	$args =  array( 'post_type' => 'waterserver','post_status' => 'publish','orderby' => 'meta_value','meta_key' => 'recommend_order', 'order' => 'ASC');

	$search_custom[] = array("key" => 'shipping_area', "value"=> $shipping_area, "compare"=>'IN','type'=>'NUMERIC');

	$args['meta_query'] = $search_custom;

	$loop = new WP_Query($args);

//検索条件に合うお水を検索する
	//こだわり条件
	//お水の価格が安い
	//富士山のパナジウム天然水
	//全国配送可能
	//節電機能付き
	//赤ちゃんのミルク作りに
	//とにかくラクラク便利
	//お水の種類
	//ボトルの種類
	//サーバーのレンタル代&メンテナンス代
	//配送料
} else if (isset($_POST['water_type'])) {

	$search_array = array('low_price',
					'save_electricity',
					'panajiumu',
					'milk',
					'shipping',
					'useful',
					'water_type',
					'bottle',
					'rental_fee',
					'shipping_fee',
					'water_examination',
					'hygiene_management',
					'design',
					'monde_selection',
					'child-lock',
					'mineral',
					'desk_type',
					'server_type',
					'weight_light',
					'delivery',
					'initial_cost_free',
					'disney');

	$result = array();

	foreach($search_array as $s) {

		if(isset($_POST[$s])) {
			$result[$s] = $_POST[$s];
		}
	}

	if (count($result) == 0) {

		//おすすめ順に取得 recommend_order
		$loop = new WP_Query( array( 'post_type' => 'waterserver','post_status' => 'publish','orderby' => 'meta_value','meta_key' => 'recommend_order', 'order' => 'ASC'));

	} else {

		//チェックしているデータを取得する

		$counter = 0;
		foreach($result as $r => $value) {
			$compare = '=';
			$type = 'CHAR';

			//お水の種類、ボトルの種類、レンタル代 選択なしの場合はcontinue;
			if ($r == 'water_type') {//ピュアウォーターの場合はどちらでもひっかける
				if ($value == '') {
					continue;
				}
				$compare = 'LIKE';
			} else if ($r == 'bottle') {
				if ($value == '') {
					continue;
				}
			} else if ($r == 'rental_fee') {
				if ($value == '') {
					continue;
				}
			} else if ($r == 'shipping_fee') {//配送料は現在無料のため検索しない

				continue;

			} else if (($r == 'low_price')||($r == 'save_electricity')||($r == 'panajiumu')||($r == 'useful')) {//値段が安い、節電機能、富士山のパナジウム天然水、とにかく楽々便利
				$compare = '>=';//値以上
				$type = 'NUMERIC';
			}
			$search_custom[] = array("key" => $r, "value"=>$value, "compare"=>$compare, "type"=>$type);
			$counter++;
			if ($counter >= 8) {
				break;
			}
		}

		$meta_key = 'recommend_order';
		if (count($search_custom) == 1) {

			$order_array = array('low_price',
							'save_electricity',
							'panajiumu',
							'useful');

			if (array_search($search_custom[0]['key'], $order_array) !== FALSE) {
				$meta_key = $search_custom[0]['key'];
			}
		}
		$args =  array( 'post_type' => 'waterserver','post_status' => 'publish','orderby' => 'meta_value','meta_key' => $meta_key, 'order' => 'ASC');

		$args['meta_query'] = $search_custom;

		$loop = new WP_Query($args);

	}

//その他（バナーから来た場合）
} else {

	//おすすめ順に取得 recommend_order
	$loop = new WP_Query( array( 'post_type' => 'waterserver','post_status' => 'publish','orderby' => 'meta_value','meta_key' => 'recommend_order', 'order' => 'ASC'));

}
?>

<section id="main_contents_result">
<h1>あなたにおすすめのウォーターサーバー業者はこちら！</h1>

<dl class="result">
	<dt><h2>検索結果</h2></dt>
	<dd>
		<table>
<?php
while ( $loop->have_posts() ) : $loop->the_post();
	$fields = get_field_object("bottle");
	$bottles = $fields['choices'];
	$fields = get_field_object("water_type");
	$water_types = $fields['choices'];
	$fields = get_field_object("shipping_area");
	$shipping_areas = $fields['choices'];
endwhile;

function callback($val){

	global $water_types;
	return $water_types[$val];
}

while ( $loop->have_posts() ) : $loop->the_post();

$water_type_array = get_post_meta($post->ID,"water_type",true);
$water_type_array = array_map('callback',$water_type_array);

?>
			<tr class="item_name">
				<th>商品名</th>
			</tr>
			<tr>
				<td class="product_name">
					<img src="<?php the_field( 'banner',$post->ID); ?>" alt="<?php echo get_post_meta($post->ID,"product_name", true); ?>" width="100" height="100" /><br />
					<a href="<?php bloginfo('url'); ?>/link?link_id=<?php the_ID();?>" rel="external nofollow"><?php echo get_post_meta($post->ID,"product_name", true); ?></a>
				</td>
			</tr>
			<tr class="item_name">
				<th>お水の価格（1本）</th>
			</tr>
			<tr>
				<td><?php echo get_post_meta($post->ID,"water_cost", true);?></td>
			</tr>
			<tr class="item_name">
				<th>サーバー料金（月）</th>
			</tr>
			<tr>
				<td><?php echo get_post_meta($post->ID,"server_cost", true);?></td>
			</tr>
			<tr class="item_name">
				<th>配送料</th>
			</tr>
			<tr>
				<td><?php echo get_post_meta($post->ID,"shipping_cost", true);?></td>
			</tr>
			<tr class="item_name">
				<th>電気代（月）</th>
			</tr>
			<tr>
				<td><?php echo get_post_meta($post->ID,"electricity_cost", true);?></td>
			</tr>
			<tr class="item_name">
				<th>お水の種類</th>
			</tr>
			<tr>
				<td><?php echo implode('、',$water_type_array);?></td>
			</tr>
			<tr class="item_name">
				<th>ボトルの種類</th>
			</tr>
			<tr>
				<td><?php echo $bottles[get_field("bottle",$post->ID)];?><br />タイプ</td>
			</tr>
			<tr class="item_name">
				<th>宅配エリア</th>
			</tr>
			<tr>
				<td><?php echo $shipping_areas[get_field("shipping_area",$post->ID)];?></td>
			</tr>
			<tr class="item_name">
				<th>POINT</th>
			</tr>
			<tr>
				<td class="point"><strong><?php echo get_post_meta($post->ID,"recommend_headline", true);?></strong>
				<p><?php echo get_post_meta($post->ID,"recommend_description", true);?></p>
			<em class="official_link">
				<a href="<?php bloginfo('url'); ?>/link?link_id=<?php the_ID();?>" rel="external nofollow"><img src="<?php bloginfo('template_directory'); ?>/img/common/btn-official-site_off.jpg" alt="公式サイトはこちら" width="248" height="48" /></a></em></td>
			</tr>
<?php

endwhile;
?>
		</table>
	</dd>
</dl>
</section>
<?php include(TEMPLATEPATH .'/inc/searchform.php'); ?>
<?php include(TEMPLATEPATH .'/inc/choose_feature.php'); ?>
</article>
<?php get_footer(); ?>
