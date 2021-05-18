<?php

/* Template Name: 検索結果用 */


$pst = "publish";
if($_GET["private"] == "on"){
  $pst = "private";
}
get_header(); ?>

 <script type="application/javascript">
 $(window).load(function() {
		$("#item_name a, .item_name_sp a").click(function () {
			$('#form1 input[name=o]').val($(this).attr('class'));
			$('#form1 input[name=d]').val($(this).attr('data-d'));
			$('#form1').submit();
			return false;
		});
 });
</script>

<div id="main_contents">
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/"  id="footmark">
  <?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>

<?php

  $pargs =  array( 'post_type' => 'waterserver','post_status' => $pst,'orderby' => 'meta_value','meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1);

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

  //それ以外  全国,全国(沖縄、離島を除く）全国(北海道、沖縄、離島を除く）

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
            //東京、神奈川、埼玉、茨城、千葉の場合  すべて
            $shipping_area = array(1,2,3,4,5,6,7,8,9,10);
            break;
    default:
            $shipping_area = array(1,2,3,10);
  }

  $args =  array( 'post_type' => 'waterserver','post_status' => $pst,'orderby' => 'meta_value','meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1);

  $search_custom[] = array("key" => 'shipping_area', "value"=> $shipping_area, "compare"=>'IN','type'=>'NUMERIC');

  $args['meta_query'] = $search_custom;

  $loop = new WP_Query($args);

//検索条件に合うお水を検索する
 //1お水の価格が安い
 //2１カ月当たりのトータル費用が安い
 //3富士山の天然水
 //4赤ちゃん・子供に最適
 //5キャンペーンあり
 //6乗り換え割あり
 //1放射性物質チェック済み
 //2衛生管理が万全 
 //3グッドデザイン賞受賞
 //4モンドセレクション受賞
 //5チャイルドロック付
 //6ミネラルが豊富
 //7卓上タイプあり
 //8サーバーの種類・色が豊富
 //9ボトルが軽い
 //10設置までが早い
 //11お水の種類が豊富
 //12足元で簡単にボトル交換できる
 //13サポート充実
 //14サーバーがスリム
 //15サーバー動作音が静か
 //16炭酸水が飲める
 //17人気がある
 //18契約プランが豊富
 //19iTQi受賞
 //お水の種類チェックボックス
 //ボトルの種類チェックボックス
 //サーバーレンタル代
 //メンテナンス代
 //配送料
 //節電機能
//支払い方法(複数選択可)
} else if (isset($_POST['water_type'])) {

  $search_array = array(    
    'price',
    'total',
    'panajiumu',
    'milk',
    'campaign',
    'transfer',
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
    'type',
    'foot',
    'support',
    'slim',
    'silent',
    'sparkling',
    'popular',
    'contract',
    'itqi',
    'water_type',
    'bottle',
    'rental_fee',
    'mente_fee',
    'shipping_fee',
    'setuden',
    'payment');

  $result = array();

  foreach($search_array as $s) {

    if(isset($_POST[$s])) {
      $result[$s] = $_POST[$s];
    }
  }

  if (count($result) == 0) {

    //おすすめ順に取得 recommend_order
    $loop = new WP_Query( array( 
      'post_type' => 'waterserver',
      'post_status' => $pst,
      'orderby' => 'meta_value',
      'meta_key' => $meta_key,
      'order' => 'ASC',
      'posts_per_page' => -1));

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
      } else if ($r == 'mente_fee') {
        if ($value == '') {
          continue;
        }
      } else if ($r == 'setuden') {
        if ($value == '') {
          continue;
        }
      } else if ($r == 'payment') {
        if ($value == '') {
          continue;
        }
      } else if ($r == 'shipping_fee') {//配送料は現在無料のため検索しない

        continue;

      }
      $search_custom[] = array("key" => $r, "value"=>$value, "compare"=>$compare, "type"=>$type);
      $counter++;
      if ($counter >= 8) {
        break;
      }
    }

    $args =  array( 'post_type' => 'waterserver','post_status' => $pst,'orderby' => 'meta_value','meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1);

    $args['meta_query'] = $search_custom;

    $loop = new WP_Query($args);
  }

//その他（バナーから来た場合）
} else {
  //おすすめ順に取得 recommend_order
  $loop = new WP_Query( array( 'post_type' => 'waterserver','post_status' => $pst,'orderby' => 'meta_value','meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1));
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
  if( have_rows('spec') ): 
	while( have_rows('spec') ): the_row();
  $field = get_field_object('bottle');
  $value = $field['value'];
  $label = $field['choices'][ $value ];
  
	$posts[] = array(
		'id' => get_the_ID(),
		"water_cost" => get_sub_field('water_cost'),
		"server_cost" => get_sub_field('server_cost'),
		"shipping_cost" => get_sub_field('shipping_cost'),
		"electricity_cost" => get_sub_field('electricity_cost'),
		'water_types' => $water_type_array,
		'bottle' => $label,
		'shipping_area' => $shipping_areas[get_field("shipping_area",$post->ID)],
		'recommend_headline' => get_field('recommend_headline'),
		'recommend_description' => get_field('recommend_description'),
		'recommend_order' => get_field('recommend_order'),
	);
	  endwhile;
 endif;

endwhile;

?>

<h1 class="retitle">あなたにオススメの優良ウォーターサーバーはこちら！</h1>

<dl class="result pickup">
  <dt>
    <h3 class="pickmidasi">PICK UP!</h3>
  </dt>
  <dd>
    <?php if(!is_mobile()){ ?>
    <table class="resu">
      <tr id="item_name">
        <td>商品名</td>
        <td>価格</td>
        <td>サーバー料金（月）</td>
        <td>配送料</td>
        <td>電気代（月）</td>
        <td>お水の種類</td>
        <td>ボトルの種類</td>
        <td>宅配エリア</td>
      </tr>
      <tr class="spac"><td colspan="9"></td></tr>
      <tr class="bo3">
        <th rowspan="3">
          <a href="<?php the_permalink(); ?>" rel="external nofollow">
          <?php $gazo = get_field('mousikomi1',$pickup_id); 
                if( $gazo ): ?>
                <img src="<?php echo $gazo['banner1']['url']; ?>" alt="<?php echo $gazo['banner1']['alt']; ?>" />
                <?php endif; ?>
          </a>
          
          <a href="<?php the_permalink(); ?>" rel="external nofollow"><?php echo get_post( $pickup_id )->post_title; ?></a>
        </th>
        <?php $spec = get_field('spec',$pickup_id); ?>
        <td><?php echo $spec['water_cost']; ?></td>
        <td><?php echo $spec['server_cost']; ?></td>
        <td><?php echo $spec['shipping_cost']; ?></td>
        <td><?php echo $spec['electricity_cost']; ?></td>
        <td><?php
          $field = get_field_object('water_type',$pickup_id);
          $water = $field['value'];
          if( $water ):
          ?>
          <?php foreach( $water as $water ): ?>
          
        <?php echo $field['choices'][ $water ]; ?>
          <?php endforeach; ?>
        <?php endif; ?>
        </td>
        <td>
        <?php
          $field = get_field_object('bottle',$pickup_id);
          $value = $field['value'];
          $label = $field['choices'][ $value ];
          ?>
          <?php echo $label; ?><br />タイプ</td>
        <td>
        <?php
					$field = get_field_object('shipping_area');
					$value = $field['value'];
					$label = $field['choices'][ $value ];
					?>
        <?php echo $label; ?>
        </td>
      </tr>
      <tr id="item_name">
        <td colspan="4" class="camp pink left">キャンペーン情報</td>
        <td colspan="3" class="site_link left">公式サイトへアクセス</a>
        </td>
      </tr>
      <tr>
        <td colspan="4" class="left">
          <span class="pink"><?php echo get_post_meta($pickup_id,"recommend_headline", true);?></span>
          <p><?php echo get_post_meta($pickup_id,"recommend_description", true);?></p>
        </td>
        <td colspan="3" class="site_link">
          <a href="<?php the_permalink(); ?>" rel="external nofollow"><img src="<?php bloginfo('template_directory'); ?>/img/btn-official-site.jpg" alt="公式サイトはこちら" /></a>
        </td>
      </tr>
      <tr class="spac"><td colspan="9"></td></tr>
    </table>
    <?php }else{ ?>
      <?php include(TEMPLATEPATH .'/inc/sppick.php');  ?>
    <?php } ?>
  </dd>
</dl>







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
}
?>

<dl class="result">
  <dt class="retitle"><i class="fas fa-search"></i> 検索結果</dt>
  <dd>
    <table class="resu">
      <?php if(!is_mobile()){ ?>
    <thead>
      <tr id="item_name">
        <td>商品名</td>
        <td class="sortHeader">お水の価格<br/><a href="#" class="water_cost">▲</a><a href="#" class="water_cost" data-d="d">▼</a></td>
        <td>サーバー料金（月）<br/><a href="#" class="server_cost">▲</a><a href="#" class="server_cost" data-d="d">▼</a></td>
        <td class="sortHeader">配送料<br/><a href="#" class="shipping_cost">▲</a><a href="#" class="shipping_cost" data-d="d">▼</a></td>
        <td class="sortHeader">電気代（月）<br/><a href="#" class="electricity_cost">▲</a><a href="#" class="electricity_cost" data-d="d">▼</a></td>
        <td class="sortHeader">お水の種類<br/><a href="#" class="water_types">▲</a><a href="#" class="water_types" data-d="d">▼</a></td>
        <td class="sortHeader">ボトルの種類<br/><a href="#" class="bottle">▲</a><a href="#" class="bottle" data-d="d">▼</a></td>
        <td class="sortHeader">宅配エリア<br/><a href="#" class="shipping_area">▲</a><a href="#" class="shipping_area" data-d="d">▼</a></td>
      </tr>
    </thead>
    <tbody>
      <tr class="spac"><td colspan="9"></td></tr>
      <?php foreach ($posts as $post) { ?>
      <tr class="bo3">
        <th rowspan="3">
          <a href="<?php the_permalink(); ?>" rel="external nofollow">
            <?php $gazo = get_field('mousikomi1',$post['id']); 
              if( $gazo ): ?>
              <img src="<?php echo $gazo['banner1']['url']; ?>" alt="<?php echo $gazo['banner1']['alt']; ?>" />
              <?php endif; ?>
             <?php $ogazo = get_field('other_gazo',$post['id']); 
                if( $ogazo ): ?>
                  <img src="<?php echo $ogazo['url']; ?>" alt="<?php echo $ogazo['alt']; ?>" />
                <?php endif; ?>

          </a>
          <a href="<?php the_permalink(); ?>" rel="external nofollow"><?php echo get_post($post['id'])->post_title; ?></a>
        </th>
        <?php $spec = get_field('spec',$post['id']); ?>
        <td><?php echo $spec["water_cost"];?></td>
        <td><?php echo $spec["server_cost"];?></td>
        <td><?php echo $spec["shipping_cost"];?></td>
        <td><?php echo $spec["electricity_cost"];?></td>
        <td><?php echo implode('、',$post['water_types']);?></td>
        <td><?php echo $post["bottle"];?><br />タイプ</td>
        <td><?php echo $post["shipping_area"];?></td>
      </tr>
      <tr id="item_name">
        <td colspan="4" class="camp pink left">キャンペーン情報</td>
        <td colspan="3" class="site_link left">公式サイトへアクセス</a>
        </td>
      </tr>
      <tr>
        <td colspan="4" class="camp">
          <?php if( get_field('camexe') ): ?>
            <p class="txt-img">
              <?php 
                $image = get_field('cam_img');
              if( !empty($image) ): ?>
              	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </p>
            <span class="pink"><?php the_field('cam_catch'); ?></span>
            <?php the_field('cam_description'); ?>
          <?php else: ?>
            <span class="pink"><?php echo $post["recommend_headline"];?></span>
            <p><?php echo $post["recommend_description"];?></p>
          <?php endif; ?>
        </td>
        <td colspan="3" class="site_link">
          <a href="<?php the_permalink(); ?>" rel="external nofollow"><img src="<?php bloginfo('template_directory'); ?>/img/btn-official-site.jpg" alt="公式サイトはこちら" /></a>
        </td>
      </tr>
     <tr class="spac"><td colspan="9"></td></tr>
    </tbody>

    <?php } ?>
  <?php }else{ ?>
  <tr>
    <td colspan="7">
      <table class="sort_box_a">
        <tr class="item_name_sp">
          <td>お水の価格<br/><a href="#" class="water_cost">▲</a><a href="#" class="water_cost" data-d="d">▼</a></td>
          <td>サーバー料金（月）<br/><a href="#" class="server_cost">▲</a><a href="#" class="server_cost" data-d="d">▼</a></td>
          <td>配送料<br/><a href="#" class="shipping_cost">▲</a><a href="#" class="shipping_cost" data-d="d">▼</a></td>
          <td>電気代（月）<br/><a href="#" class="electricity_cost">▲</a><a href="#" class="electricity_cost" data-d="d">▼</a></td>
          <td>お水の種類<br/><a href="#" class="water_types">▲</a><a href="#" class="water_types" data-d="d">▼</a></td>
          <td>ボトルの種類<br/><a href="#" class="bottle">▲</a><a href="#" class="bottle" data-d="d">▼</a></td>
          <td>宅配エリア<br/><a href="#" class="shipping_area">▲</a><a href="#" class="shipping_area" data-d="d">▼</a></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr class="spac"><td colspan="7"></td></tr>
    <?php foreach ($posts as $post) { ?>
      <?php include(TEMPLATEPATH .'/inc/spitem.php');  ?>
    <?php } ?>
  </tr>
  <tr class="spac"><td colspan="7"></td></tr>
    <?php } ?>
  </table>
  </dd>
</dl>

<?php include(TEMPLATEPATH .'/inc/searchform.php'); ?>



</div><!-- / main contents box -->
</div><!-- / contents box -->
<?php get_footer(); ?>
