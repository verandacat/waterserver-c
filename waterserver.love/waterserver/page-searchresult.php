<?php

/* Template Name: 検索結果(serverserach)用 */


$pst = "publish";
if ($_POST["private"] == "on") {
  $pst = "private";
}
get_header(); ?>

<script type="application/javascript">
  $(window).load(function() {
    $("#item_name a, .item_name_sp a").click(function() {
      $('#form1 input[name=o]').val($(this).attr('class'));
      $('#form1 input[name=d]').val($(this).attr('data-d'));
      $('#form1').submit();
      return false;
    });
  });
</script>

<div id="main_contents">
  
  <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/" id="footmark">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    }
   

    ?>
  </div>

  <?php
 
  $pargs =  array('post_type' => 'waterserver', 'post_status' => $pst, 'orderby' => 'meta_value_num', 'meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1);

  $psearch_custom[] = array("key" => 'pickup', 'value' => '1', 'compare' => '==');

  $pargs['meta_query'] = $psearch_custom;

  $picks = new WP_Query($pargs);
  $pickup_id = $picks->posts[0]->ID;


  $meta_key = 'recommend_order';
  $orderby = (isset($_POST['o']) && !empty($_POST['o'])) ? $_POST['o'] : '';
  $nextorder = 'd';
  if (isset($_POST['d']) && $_POST['d'] == 'd') {
    $nextorder = 'a';
  }

  //エリア検索の場合はそちら優先
  if (isset($_POST['pref'])) {

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
    //20コーヒー機能付き
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
      'coffee',
      'water_type',
      'bottle',
      'rental_fee',
      'mente_fee',
      'shipping_fee',
      'setuden',
      'payment'
    );

    $result = array();
    
    foreach ($search_array as $s) {

      if (isset($_POST[$s])) {
        $result[$s] = $_POST[$s];
      }
    }

    if (count($result) == 0) {

      //おすすめ順に取得 recommend_order
      $loop = new WP_Query(array(
        'post_type' => 'waterserver',
        'post_status' => $pst,
        'orderby' => 'meta_value_num',
        'meta_key' => $meta_key,
        'order' => 'ASC',
        'posts_per_page' => -1
      ));
    } else {

      //チェックしているデータを取得する

      $counter = 0;
      foreach ($result as $r => $value) {
        $compare = '=';
        $type = 'CHAR';

        //お水の種類、ボトルの種類、レンタル代 選択なしの場合はcontinue;
        if ($r == 'water_type') { //ピュアウォーターの場合はどちらでもひっかける
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
        } else if ($r == 'shipping_fee') { //配送料は現在無料のため検索しない

          continue;
        }
        $search_custom[] = array("key" => $r, "value" => $value, "compare" => $compare, "type" => $type);
        $counter++;
        if ($counter >= 7) {
          break;
        }
      }
  
      $args =  array('post_type' => 'waterserver', 'post_status' => $pst, 'orderby' => 'meta_value_num', 'meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1);

      $args['meta_query'] = $search_custom;

      $loop = new WP_Query($args);
    }

    //その他（バナーから来た場合）
  } else {
    //おすすめ順に取得 recommend_order
    $loop = new WP_Query(array('post_type' => 'waterserver', 'post_status' => $pst, 'orderby' => 'meta_value_num', 'meta_key' => $meta_key, 'order' => 'ASC', 'posts_per_page' => -1));
  }
  ?>




  <?php //pickup
  function callback($val)
  {
    global $water_types;
    return $water_types[$val];
  }
  $posts = array();
  while ($loop->have_posts()) : $loop->the_post();
    $fields = get_field_object("bottle");
    $bottles = $fields['choices'];
    $fields = get_field_object("water_type");
    $water_types = $fields['choices'];
    $fields = get_field_object("shipping_area");
    $shipping_areas = $fields['choices'];

    $water_type_array = get_field("water_type");
    $water_type_array = array_map('callback', $water_type_array);
    if (have_rows('spec')) :
      while (have_rows('spec')) : the_row();
        $field = get_field_object('bottle');
        $value = $field['value'];
        $label = $field['choices'][$value];

        $posts[] = array(
          'id' => get_the_ID(),
          "water_cost" => get_sub_field('water_cost'),
          "water_cost2" => get_sub_field('water_cost2'),
          "server_cost" => get_sub_field('server_cost'),
          "server_cost2" => get_sub_field('server_cost2'),
          "shipping_cost" => get_sub_field('shipping_cost'),
          "electricity_cost" => get_sub_field('electricity_cost'),
          "electricity_cost2" => get_sub_field('electricity_cost2'),
          'water_types' => $water_type_array,
          'bottle' => $label,
          'shipping_area' => $shipping_areas[get_field("shipping_area", $post->ID)],
          'recommend_headline' => get_field('recommend_headline'),
          'recommend_description' => get_field('recommend_description'),
          'recommend_order' => get_field('recommend_order'),
        );
      endwhile;
    endif;

  endwhile;

  ?>

  <h1 class="retitle">あなたにオススメの優良ウォーターサーバーはこちら！</h1>

  <?php
  $pickup = get_field('pickup', $pickup_id);
  if ($pickup) : ?>
    <dl class="result pickup">
      <dt>
        <h3 class="pickmidasi">PICK UP!</h3>
      </dt>
      <dd>
        <?php if (!is_mobile()) { ?>
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
            <tr class="spac">
              <td colspan="9"></td>
            </tr>
            <tr class="bo3">
              <th rowspan="3">
                <a href="<?php the_permalink($pickup_id); ?>" rel="external nofollow">
                  <?php $gazo = get_field('mousikomi1', $pickup_id);
                  if ($gazo) : ?>
                    <img src="<?php echo $gazo['banner1']['url']; ?>" alt="<?php echo $gazo['banner1']['alt']; ?>" />
                  <?php endif; ?>
                </a>

                <a href="<?php the_permalink($pickup_id); ?>" rel="external nofollow"><?php echo get_post($pickup_id)->post_title; ?></a>
              </th>
              <?php $spec = get_field('spec', $pickup_id); ?>
              <td><?php echo number_format($spec['water_cost']); ?>円<?php echo $spec['water_cost2']; ?></td>
              <td>
              <?php if(!preg_match("/[0-9]{4}/",$spec['server_cost'])) : ?>
                    <?php echo $spec['server_cost']; ?>
                    <?php echo $spec['server_cost2']; ?>
                    <?php else : ?>
                    <?php echo number_format($spec['server_cost']); ?>円
                    <?php echo $spec['server_cost2']; ?>
                <?php endif; ?>
              </td>
              <td><?php echo $spec['shipping_cost']; ?></td>
              <td>
              <?php if(!preg_match("/[0-9]{4}/",$spec['electricity_cost'])) : ?>
                    <?php echo $spec['electricity_cost']; ?>
                    <?php echo $spec['electricity_cost2']; ?>
                    <?php else : ?>
                    <?php echo number_format($spec['electricity_cost']); ?>円
                    <?php echo $spec['electricity_cost2']; ?>
                <?php endif; ?>
              </td>
              <td><?php
                  $field = get_field_object('water_type', $pickup_id);
                  $water = $field['value'];
                  if ($water) :
                  ?>
                  <?php foreach ($water as $water) : ?>

                    <?php echo $field['choices'][$water]; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
              </td>
              <td>
                <?php
                $field = get_field_object('bottle', $pickup_id);
                $value = $field['value'];
                $label = $field['choices'][$value];
                ?>
                <?php echo $label; ?><br />タイプ</td>
              <td>
                <?php
                $field = get_field_object('shipping_area');
                $value = $field['value'];
                $label = $field['choices'][$value];
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
                <span class="pink"><?php echo get_post_meta($pickup_id, "recommend_headline", true); ?></span>
                <p><?php echo get_post_meta($pickup_id, "recommend_description", true); ?></p>
              </td>
              <td colspan="3" class="site_link">
                <a href="<?php the_permalink($pickup_id); ?>" rel="external nofollow"><img src="<?php bloginfo('template_directory'); ?>/img/btn-official-site.jpg" alt="公式サイトはこちら" /></a>
              </td>
            </tr>
            <tr class="spac">
              <td colspan="9"></td>
            </tr>
          </table>
        <?php } else { ?>
          <?php include(TEMPLATEPATH . '/inc/sppick.php');  ?>
        <?php } ?>
      </dd>
    </dl>

  <?php endif; ?>





  <?php
  if (isset($_POST['o']) && !empty($_POST['o'])) {
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
        usort($posts, function ($a, $b) {
          preg_match("/[0-9]+/", $a[$_POST['o']], $matcha);
          preg_match("/[0-9]+/", $b[$_POST['o']], $matchb);
          if ($matcha[0] == $matchb[0]) {
            return ($a['recommend_order'] > $b['recommend_order']) ? 1 : -1;
          }
          return $matcha[0] < $matchb[0];
        });
      } else {
        usort($posts, function ($a, $b) {
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
        <?php if (!is_mobile()) { ?>
          <thead>
            <tr id="item_name">
              <td>商品名</td>
              <td class="sortHeader">お水の価格<br /><a href="#" class="water_cost">▲</a><a href="#" class="water_cost" data-d="d">▼</a></td>
              <td>サーバー料金（月）<br /><a href="#" class="server_cost">▲</a><a href="#" class="server_cost" data-d="d">▼</a></td>
              <td class="sortHeader">配送料<br /><a href="#" class="shipping_cost">▲</a><a href="#" class="shipping_cost" data-d="d">▼</a></td>
              <td class="sortHeader">電気代（月）<br /><a href="#" class="electricity_cost">▲</a><a href="#" class="electricity_cost" data-d="d">▼</a></td>
              <td class="sortHeader">お水の種類<br /><a href="#" class="water_types">▲</a><a href="#" class="water_types" data-d="d">▼</a></td>
              <td class="sortHeader">ボトルの種類<br /><a href="#" class="bottle">▲</a><a href="#" class="bottle" data-d="d">▼</a></td>
              <td class="sortHeader">宅配エリア<br /><a href="#" class="shipping_area">▲</a><a href="#" class="shipping_area" data-d="d">▼</a></td>
            </tr>
          </thead>
          <tbody>
            <tr class="spac">
              <td colspan="9"></td>
            </tr>
            <?php foreach ($posts as $post) { ?>
              <tr class="bo3">
                <th rowspan="3">
                  <a href="<?php the_permalink($post['id']); ?>" rel="external nofollow">
                    <?php                     
                    $gazo = get_field('mousikomi1', $post['id']);
                    if ($gazo) : ?>
                      <img src="<?php echo $gazo['banner1']['url']; ?>" alt="<?php echo $gazo['banner1']['alt']; ?>" /><br clear="all">
                    <?php endif; ?>
                    <?php
                    $fureid = $post['id'];
                    if ($fureid === 59) {
                      $fure2 = get_field('mousikomi2', $post['id']);
                      if ($fure2) : ?>
                        <br clear="all">
                        <a href="<?php the_permalink($post['id']); ?>?type=2" rel="external nofollow" class="clear">
                          <img src="<?php echo $fure2['banner2']['url']; ?>" alt="<?php echo $fure2['banner2']['alt']; ?>" />
                        </a><br clear="all">
                    <?php endif;
                    } ?>

                    <?php $ogazo = get_field('other_gazo', $post['id']);
                    if ($ogazo) : ?>
                      <br><img src="<?php echo $ogazo['url']; ?>" alt="<?php echo $ogazo['alt']; ?>" /><br clear="all">
                    <?php endif; ?>

                  </a>
                  <a href="<?php the_permalink($post['id']); ?>" rel="external nofollow"><?php echo get_post($post['id'])->post_title; ?></a>
                </th>
                <?php $spec = get_field('spec', $post['id']); ?>
                <td><?php echo number_format($spec['water_cost']); ?>円<?php echo $spec['water_cost2']; ?></td>
                <td>
                <?php if(!preg_match("/[0-9]{4}/",$spec['server_cost'])) : ?>
                    <?php echo $spec['server_cost']; ?>
                    <?php echo $spec['server_cost2']; ?>
                    <?php else : ?>
                    <?php echo number_format($spec['server_cost']); ?>円
                    <?php echo $spec['server_cost2']; ?>
                <?php endif; ?>
                </td>
                <td><?php echo $spec["shipping_cost"]; ?></td>
                <td>
                <?php if(!preg_match("/[0-9]{4}/",$spec['electricity_cost'])) : ?>
                    <?php echo $spec['electricity_cost']; ?>
                    <?php echo $spec['electricity_cost2']; ?>
                    <?php else : ?>
                    <?php echo number_format($spec['electricity_cost']); ?>円
                    <?php echo $spec['electricity_cost2']; ?>
                <?php endif; ?>
                </td>
                <td><?php echo implode('、', $post['water_types']); ?></td>
                <td><?php echo $post["bottle"]; ?><br />タイプ</td>
                <td><?php echo $post["shipping_area"]; ?></td>
              </tr>
              <tr id="item_name">
                <td colspan="4" class="camp pink left">キャンペーン情報</td>
                <td colspan="3" class="site_link left">公式サイトへアクセス</a></td>
              </tr>
              <tr>
                <td colspan="4" class="camp">
                  <?php if (get_field('camexe')) : ?>
                    <p class="txt-img">
                      <?php
                      $image = get_field('cam_img');
                      if (!empty($image)) : ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                      <?php endif; ?>
                    </p>
                    <span class="pink"><?php the_field('cam_catch'); ?></span>
                    <?php the_field('cam_description'); ?>
                  <?php else : ?>
                    <span class="pink"><?php echo $post["recommend_headline"]; ?></span>
                    <p><?php //echo $post["recommend_description"]; ?></p>
                  <?php endif; ?>
                </td>
                <td colspan="3" class="site_link">
                  <a href="<?php the_permalink($post['id']); ?>" rel="external nofollow"><img src="<?php bloginfo('template_directory'); ?>/img/btn-official-site.jpg" alt="公式サイトはこちら" /></a>
                </td>
              </tr>
              <tr class="spac">
                <td colspan="9"></td>
              </tr>
          </tbody>

        <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="7">
            <table class="sort_box_a">
              <tr class="item_name_sp">
                <td>お水の価格<br /><a href="#" class="water_cost">▲</a><a href="#" class="water_cost" data-d="d">▼</a></td>
                <td>サーバー料金（月）<br /><a href="#" class="server_cost">▲</a><a href="#" class="server_cost" data-d="d">▼</a></td>
                <td>配送料<br /><a href="#" class="shipping_cost">▲</a><a href="#" class="shipping_cost" data-d="d">▼</a></td>
                <td>電気代（月）<br /><a href="#" class="electricity_cost">▲</a><a href="#" class="electricity_cost" data-d="d">▼</a></td>
                <td>お水の種類<br /><a href="#" class="water_types">▲</a><a href="#" class="water_types" data-d="d">▼</a></td>
                <td>ボトルの種類<br /><a href="#" class="bottle">▲</a><a href="#" class="bottle" data-d="d">▼</a></td>
                <td>宅配エリア<br /><a href="#" class="shipping_area">▲</a><a href="#" class="shipping_area" data-d="d">▼</a></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr class="spac">
          <td colspan="7"></td>
        </tr>
        <?php foreach ($posts as $post) { ?>
          <?php include(TEMPLATEPATH . '/inc/spitem.php');  ?>
        <?php } ?>
        </tr>
      <?php } ?>
      </table>
    </dd>
  </dl>

  <?php include(TEMPLATEPATH . '/inc/searchform.php'); ?>



</div><!-- / main contents box -->
</div><!-- / contents box -->
<?php get_footer(); ?>