<?php

/* Template Name: 検索結果用 */


$pst = "publish";
if($_GET["private"] == "on"){
	$pst = "private";
}
get_header(); ?>

<script type="application/javascript">
$(window).load(function() {
    $("#btn_search_start").click(function() {
        $('#form1').submit();
    });
    $("#item_name a, .item_name_sp a").click(function() {
        $('#form1 input[name=o]').val($(this).attr('class'));
        $('#form1 input[name=d]').val($(this).attr('data-d'));
        $('#form1').submit();
        return false;
    });
});
</script>

<div id="main_contents">
    <?php

	$pargs =  array( 'post_type' => 'waterserver','post_status' => $pst,'orderby' => 'meta_value_num','meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1);

	$psearch_custom[] = array("key" => 'is_pickup', "value"=> "is_pick", "compare"=>'LIKE','type'=>'CHAR');

	$pargs['meta_query'] = $psearch_custom;

	$picks = new WP_Query($pargs);
	$pickup_id = $picks->posts[0]->ID;


$meta_key = 'recommend_order';
$orderby = (isset($_POST['o']) && ! empty($_POST['o'])) ? $_POST['o'] : '';
$nextorder = 'd';
if (isset($_POST['d']) && $_POST['d'] == 'd') {
 $nextorder = 'a';
}

//エリア検索の場合はそちら優先
if (isset($_GET['pref'])) {

	$pref = $_GET['pref'];
	//shipping_area
	//1 : 全国
	//2 : 全国（沖縄、離島除く）
	//3 : 全国（北海道、沖縄、離島除く）
	//4 : 東京（離島除く）、神奈川、埼玉、茨城の一部、千葉県北部

	//5 : 北海道の一部地域、東北地区、北関東地区、中部・東海地区、近畿地区（※離島除く）

	//6 : 東京都、茨城県、埼玉県、千葉県、神奈川県（※一部地域除く）
	//7 : 関東圏（東京都・神奈川県・千葉県・埼玉県・茨城県・栃木県・群馬県・福島県）、中京圏（愛知県・ 三重県・岐阜県・静岡県）、近畿圏（大阪府・京都府・兵庫県・滋賀県・奈良県・和歌山県）
	//8 : 東北、関東、信越、東海、近畿（※記載地方の一部都道府県）  = 東京、埼玉、神奈川、千葉、群馬、栃木、茨城、新潟、静岡、長野、福島、山形、山梨、奈良、大阪
	//9 : 滋賀県、京都府、大阪府、兵庫県、奈良県、和歌山県、千葉県、埼玉県、茨城県、東京都、神奈川県、石川県、福井県、岐阜県、富山県、香川県、愛媛県
	//10: 全国（離島除く）

	//それ以外　全国,全国(沖縄、離島を除く）全国(北海道、沖縄、離島を除く）

	switch ($pref) {
		case 'okinawa':
						//沖縄の場合 全国
						$shipping_area = array(1,10);
						break;

		case 'hokkaido':
						//北海道の場合、全国・全国（沖縄、離島除く）
						$shipping_area = array(1,2,5,10);
						break;

		case 'aomori':
		case 'iwate':
		case 'miyagi':
						$shipping_area = array(1,2,3,5,10);
						break;

		case 'yamagata':
		case 'yamanashi':
		case 'niigata':
		case 'nagano':
						$shipping_area = array(1,2,3,5,8,10);
						break;

		case 'fukushima':
		case 'tochigi':
		case 'gunma':
		case 'shizuoka':
						$shipping_area = array(1,2,3,5,7,8,10);
						break;

		case 'ishikawa':
		case 'gifu':
		case 'kyoto':
		case 'shiga':
		case 'hyogo':
		case 'wakayama':
						$shipping_area = array(1,2,3,5,7,9,10);
						break;

		case 'aichi':
		case  'mie':
						$shipping_area = array(1,2,3,5,7,10);
						break;

		case 'toyama':
		case 'fukui':
		case 'ehime':
		case 'kagawa':
						$shipping_area = array(1,2,3,9,10);
						break;

		case  'osaka':
		case  'nara':
						$shipping_area = array(1,2,3,5,7,8,9,10);
						break;

		case 'tokyo':
		case  'kanagawa':
		case  'saitama':
		case  'ibaraki':
		case  'chiba' :
						//東京、神奈川、埼玉、茨城、千葉の場合　すべて
						$shipping_area = array(1,2,3,4,5,6,7,8,9,10);
						break;
		default:
						$shipping_area = array(1,2,3,10);
	}

	$args =  array( 'post_type' => 'waterserver','post_status' => $pst,'orderby' => 'meta_value_num','meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1);

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
		$loop = new WP_Query( array( 'post_type' => 'waterserver','post_status' => $pst,'orderby' => 'meta_value_num','meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1));

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

		if (count($search_custom) > 0) {
			$order_array = array('low_price',
							'save_electricity',
							'panajiumu',
							'useful');

			if (array_search($search_custom[0]['key'], $order_array) !== FALSE) {
				$meta_key = $search_custom[0]['key'];
			}
		}

		$args =  array( 'post_type' => 'waterserver','post_status' => $pst,'orderby' => 'meta_value_num','meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1);

		$args['meta_query'] = $search_custom;

		$loop = new WP_Query($args);
	}

//その他（バナーから来た場合）
} else {
	//おすすめ順に取得 recommend_order
	$loop = new WP_Query( array( 'post_type' => 'waterserver','post_status' => $pst,'orderby' => 'meta_value_num','meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1));

}
?>




    <?php //pickup


function callback($val){
	global $water_types;
	return $water_types[$val];
}
$posts = array();
while ( $loop->have_posts() ) : $loop->the_post();
	$fields = get_field_object("bottle");
	$bottles = $fields['choices'];
	$fields = get_field_object("water_type");
	$water_types = $fields['choices'];
	$fields = get_field_object("shipping_area");
	$shipping_areas = $fields['choices'];

	$water_type_array = get_post_meta($post->ID,"water_type",true);
	$water_type_array = array_map('callback',$water_type_array);

	$posts[] = array(
		'banner' => get_field('banner',$post->ID),
		'product_name' => get_post_meta($post->ID,"product_name", true),
		'id' => get_the_ID(),
		"water_cost" => get_post_meta($post->ID,"water_cost", true),
		"server_cost" => get_post_meta($post->ID,"server_cost", true),
		"shipping_cost" => get_post_meta($post->ID,"shipping_cost", true),
		"electricity_cost" => get_post_meta($post->ID,"electricity_cost", true),
		'water_types' => $water_type_array,
		'bottle' => $bottles[get_field("bottle",$post->ID)],
		'shipping_area' => $shipping_areas[get_field("shipping_area",$post->ID)],
		'recommend_headline' => get_post_meta($post->ID,"recommend_headline", true),
		'recommend_description' => get_post_meta($post->ID,"recommend_description", true),
		'recommend_order' => get_post_meta($post->ID,"recommend_order", true),
	);
endwhile;

?>

    <h1>あなたにおすすめのウォーターサーバー業者はこちら！</h1>
    <?php $ref = $_SERVER['HTTP_REFERER'];
if(strpos($ref,'/b/') !== false){ ?>
    <div id="footmark"><a href="<?php bloginfo('url'); ?>/b/">トップページ</a><span>&nbsp;&gt;&nbsp;検索結果</span></div>
    <?php }elseif(strpos($ref,'/c/') !== false){ ?>
    <div id="footmark"><a href="<?php bloginfo('url'); ?>/c/">トップページ</a><span>&nbsp;&gt;&nbsp;検索結果</span></div>
    <?php }elseif(strpos($ref,'/d/') !== false){ ?>
    <div id="footmark"><a href="<?php bloginfo('url'); ?>/d/">トップページ</a><span>&nbsp;&gt;&nbsp;検索結果</span></div>
    <?php }elseif(strpos($ref,'/e/') !== false){ ?>
    <div id="footmark"><a href="<?php bloginfo('url'); ?>/e/">トップページ</a><span>&nbsp;&gt;&nbsp;検索結果</span></div>
    <?php }elseif(strpos($ref,'/f/') !== false){ ?>
    <div id="footmark"><a href="<?php bloginfo('url'); ?>/f/">トップページ</a><span>&nbsp;&gt;&nbsp;検索結果</span></div>
    <?php }elseif(strpos($ref,'/new1/') !== false){ ?>
    <div id="footmark"><a href="<?php bloginfo('url'); ?>/new1/">トップページ</a><span>&nbsp;&gt;&nbsp;検索結果</span></div>
    <?php }else{ ?>
    <div id="footmark"><a href="<?php bloginfo('url'); ?>/">トップページ</a><span>&nbsp;&gt;&nbsp;検索結果</span></div>
    <?php } ?>

    <?php if($pickup_id!=""){ ?>
    <dl class="result pickup">
        <dt>
            <?php if(!is_mobile()){ ?>

            <img src="<?php bloginfo('template_directory'); ?>/img/search/ttl-search-result_pic.png" alt="検索結果"
                width="186" height="19" class="contents_title" />

            <?php }else{ ?>
            PICK UP!!
            <?php } ?>
        </dt>
        <dd>
            <?php if(!is_mobile()){ ?>
            <table>
                <tr id="item_name">
                    <th>商品名</th>
                    <td nowrap style="white-space: nowrap;">お水の価格</td>
                    <td nowrap style="white-space: nowrap;">サーバー料金（月）</td>
                    <td>配送料</td>
                    <td nowap style="white-space: nowrap;">電気代（月）</td>
                    <td nowap style="white-space: nowrap;">お水の種類</td>
                    <td nowap style="white-space: nowrap;">ボトルの種類</td>
                    <td nowap style="white-space: nowrap;">宅配エリア</td>
                </tr>
                <tr>
                    <th rowspan="2">
                        <a href="<?php bloginfo('url'); ?>/links?link_id=<?php echo $pickup_id;?>&type=pickup"
                            rel="external nofollow" class="prrrr">
                            <img src="<?php echo get_field('banner',$pickup_id); ?>"
                                alt="<?php echo get_post_meta($pickup_id,"product_name", true); ?>" />
                        </a>
                        <a href="<?php bloginfo('url'); ?>/links?link_id=<?php echo $pickup_id;?>&type=pickup"
                            rel="external nofollow"
                            class="prrrr"><?php echo get_post_meta($pickup_id,"product_name", true); ?></a>
                    </th>
                    <td><?php echo get_post_meta($pickup_id,"water_cost", true);?></td>
                    <td><?php echo get_post_meta($pickup_id,"server_cost", true);?></td>
                    <td><?php echo get_post_meta($pickup_id,"shipping_cost", true);?></td>
                    <td><?php echo get_post_meta($pickup_id,"electricity_cost", true);?></td>
                    <?php
					$water_type_array_pic = get_post_meta($pickup_id,"water_type",true);
					$water_type_array_pic = array_map('callback',$water_type_array_pic);
				?>
                    <td><?php echo implode('、',$water_type_array_pic);?></td>
                    <td><?php echo $bottles[get_field("bottle",$pickup_id)];?><br />タイプ</td>
                    <td><?php echo $shipping_areas[get_field("shipping_area",$pickup_id)];?></td>
                </tr>
                <tr>

                    <td colspan="4" class="point">
                        <strong><?php echo get_post_meta($pickup_id,"recommend_headline", true);?></strong>
                        <p><?php echo get_post_meta($pickup_id,"recommend_description", true);?></p>
                    </td>
                    <td colspan="3" class="site_link">
                        <a href="<?php bloginfo('url'); ?>/links?link_id=<?php echo $pickup_id; ?>&type=pickup"
                            rel="external nofollow" class="prrrr"><img
                                src="<?php bloginfo('template_directory'); ?>/img/common/btn-official-site_off.jpg"
                                alt="公式サイトはこちら" width="310" height="60" /></a>
                    </td>
                </tr>
            </table>

            <?php }else{ ?>
            <?php include(TEMPLATEPATH .'/inc/sppick.php');  ?>
            <?php } ?>
        </dd>
    </dl>
    <?php } ?>







    <?php

if (isset($_POST['o']) && ! empty($_POST['o'])) {
	$arr_tmp = array('water_types', 'bottle', 'shipping_area');
	if (in_array($_POST['o'], $arr_tmp)) {
		foreach ($posts as $key => $row) {
			$sortkey[$key] = $row[$_POST['o']];
			$sortkey2[$key] = $row['recommend_order'];
		}
		if (isset($_POST['d']) && $_POST['d'] == 'd') {
			//array_multisort($sortkey, SORT_DESC, $posts);
			array_multisort($sortkey, SORT_DESC, $sortkey2, SORT_ASC, $posts);
		} else {
			//array_multisort($sortkey, SORT_ASC, $posts);
			array_multisort($sortkey, SORT_ASC, $sortkey2, SORT_ASC, $posts);
		}
	} else {
		if (isset($_POST['d']) && $_POST['d'] == 'd') {
			usort($posts, function($a, $b) {
				preg_match("/[0-9]+/", $a[$_POST['o']], $matcha);
				preg_match("/[0-9]+/", $b[$_POST['o']], $matchb);
				if ($matcha[0] == $matchb[0]) {
					return ($a['recommend_order'] > $b['recommend_order']) ? 1 : -1;
				}
				return $matcha[0] < $matchb[0];
			});
		} else {
			usort($posts, function($a, $b) {
				preg_match("/[0-9]+/", $a[$_POST['o']], $matcha);
				preg_match("/[0-9]+/", $b[$_POST['o']], $matchb);
				if ($matcha[0] == $matchb[0]) {
					return ($a['recommend_order'] > $b['recommend_order']) ? 1 : -1;
				}
				return $matcha[0] > $matchb[0];
			});
		}
	}
} else if (isset($_POST['mineral'])) {
//MCM特別仕様
	$newPosts = array();
	foreach ($posts as $post) {
		if ($post['id'] == 320) {
			array_unshift($newPosts, $post);
		} else {
			$newPosts[] = $post;
		}
	}
	$posts = $newPosts;
} else if (isset($_POST['design'])) {
//クリティア特別仕様
	$newPosts = array();
	foreach ($posts as $post) {
		if ($post['id'] == 58) {
			array_unshift($newPosts, $post);
		} else {
			$newPosts[] = $post;
		}
	}
	$posts = $newPosts;
}
?>

    <?php if(!is_mobile()){ ?>
    <dl class="result">
        <dt>
            <img src="<?php bloginfo('template_directory'); ?>/img/search/ttl-search-result.gif" alt="検索結果" width="86"
                height="19" class="contents_title" />
            <?php if(!is_mobile()){ ?>
            <img src="<?php bloginfo('template_directory'); ?>/img/search/txt-search-result-en.gif"
                alt="SEARCH&nbsp;RESULTS" width="117" height="12" class="contents_title_en" />

            <?php } ?>
        </dt>

        <dd>
            <table>
                <tr id="item_name">
                    <th>商品名</th>
                    <td nowrap style="white-space: nowrap;">お水の価格<br /><a href="#" class="water_cost">▲</a><a href="#"
                            class="water_cost" data-d="d">▼</a></td>
                    <td nowrap style="white-space: nowrap;">サーバー料金（月）<br /><a href="#" class="server_cost">▲</a><a
                            href="#" class="server_cost" data-d="d">▼</a></td>
                    <td>配送料<br /><a href="#" class="shipping_cost">▲</a><a href="#" class="shipping_cost"
                            data-d="d">▼</a></td>
                    <td nowap style="white-space: nowrap;">電気代（月）<br /><a href="#" class="electricity_cost">▲</a><a
                            href="#" class="electricity_cost" data-d="d">▼</a></td>
                    <td nowap style="white-space: nowrap;">お水の種類<br /><a href="#" class="water_types">▲</a><a href="#"
                            class="water_types" data-d="d">▼</a></td>
                    <td nowap style="white-space: nowrap;">ボトルの種類<br /><a href="#" class="bottle">▲</a><a href="#"
                            class="bottle" data-d="d">▼</a></td>
                    <td nowap style="white-space: nowrap;">宅配エリア<br /><a href="#" class="shipping_area">▲</a><a href="#"
                            class="shipping_area" data-d="d">▼</a></td>
                </tr>
                <?php
foreach ($posts as $post) {
?>
                <tr>
                    <th rowspan="2">
                        <a href="<?php bloginfo('url'); ?>/links?link_id=<?php echo $post['id'];?>"
                            rel="external nofollow" class="prrrr">
                            <img src="<?php echo $post['banner']; ?>" alt="<?php echo $post["product_name"]; ?>" />
                        </a>
                        <?php if($post['id'] == 59){ ?>
                        <a href="https://xn--gckgmmx3dygqimdb6gbbb4235ic1qdgxegw1a.com/link/frecious-cafe.html"
                            target="_blank" class="prrrr"><img class="vert height125" style="display:inline-block"
                                src="<?php bloginfo('template_directory'); ?>/img/frecious_slatcafe_f1box_600_500.jpg"
                                alt=""></a>
                        <?php } ?>
                        <a href="<?php bloginfo('url'); ?>/links?link_id=<?php echo $post['id'];?>"
                            rel="external nofollow" class="prrrr"><?php echo $post["product_name"]; ?></a>
                    </th>
                    <td><?php echo $post["water_cost"];?></td>
                    <td><?php echo $post["server_cost"];?></td>
                    <td><?php echo $post["shipping_cost"];?></td>
                    <td><?php echo $post["electricity_cost"];?></td>
                    <td><?php echo implode('、',$post['water_types']);?></td>
                    <td><?php echo $post["bottle"];?><br />タイプ</td>
                    <td><?php echo $post["shipping_area"];?></td>
                </tr>
                <tr>
                    <td colspan="4" class="point">
                        <strong><?php echo $post["recommend_headline"];?></strong>
                        <p><?php echo $post["recommend_description"];?></p>
                    </td>
                    <td colspan="3" class="site_link">
                        <a href="<?php bloginfo('url'); ?>/links?link_id=<?php echo $post['id'];?>"
                            rel="external nofollow" class="prrrr"><img
                                src="<?php bloginfo('template_directory'); ?>/img/common/btn-official-site_off.jpg"
                                alt="公式サイトはこちら" width="310" height="60" /></a>
                    </td>
                </tr>
                <?php
}
?>
            </table>
        </dd>
    </dl>
    <?php }else{ ?>
    <dl class="box result">
        <dt>
            検索結果
        </dt>
        <dd>

            <table class="sort_box_a" cellspacing="0" cellpadding="0">
                <tr id="" class="item_name_sp">
                    <td nowrap style="white-space: nowrap;"><span>お水の価格</span><br /><a href="#"
                            class="water_cost">▲</a><a href="#" class="water_cost" data-d="d">▼</a></td>
                    <td nowrap style="white-space: nowrap;"><span>サーバー料金/月</span><br /><a href="#"
                            class="server_cost">▲</a><a href="#" class="server_cost" data-d="d">▼</a></td>
                </tr>
                <tr class="item_name_sp">
                    <td><span>配送料</span><br /><a href="#" class="shipping_cost">▲</a><a href="#" class="shipping_cost"
                            data-d="d">▼</a></td>
                    <td nowap style="white-space: nowrap;"><span>電気代/月</span><br /><a href="#"
                            class="electricity_cost">▲</a><a href="#" class="electricity_cost" data-d="d">▼</a></td>
                </tr>
            </table>
        </dd>
    </dl>
    <?php
foreach ($posts as $post) {
?>
    <?php include(TEMPLATEPATH .'/inc/spitem.php');  ?>
    <?php }} ?>
    <?php include(TEMPLATEPATH .'/inc/searchform.php'); ?>



</div><!-- / main contents box -->
</div><!-- / contents box -->
<?php get_footer(); ?>