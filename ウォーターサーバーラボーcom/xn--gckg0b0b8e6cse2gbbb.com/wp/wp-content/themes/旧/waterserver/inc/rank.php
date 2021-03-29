
<dl id="rank" class="ranking box">
	<dt class="boxtitle">
		
	</dt>

	<dd>
	<div>
		<p class="titlecap">実際にウォーターサーバー利用者の評価が高い優良ウォーターサーバー10社をご紹介します！</p>
	</div>

<?php
	function callback($val){

		global $water_types;
		return $water_types[$val];
	}
	$max_rank = 3;
	if(!$is_top){
		$max_rank = 10;
	}

	$pst = "publish";
	if($_GET["private"] == "on"){
		$pst = "private";
	}
	$args =  array( 'post_type' => 'waterserver','post_status' => $pst,'orderby' => 'meta_value', 'meta_key' => 'recommend_order', 'order' => 'ASC', 'posts_per_page' => $max_rank);


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
		<?php $spec = get_field('spec'); ?>
		
  <div class="resu">
    <table class="server">
      <tr id="item_name">
        <td colspan="2" class="text-center bblue"><img src="<?php bloginfo('template_directory'); ?>/img/rank<?php echo $count;?>_a.gif" alt="" />
          <h3><a href="<?php the_permalink(); ?>" rel="external nofollow"><?php echo get_post( $post->ID )->post_title; ?></a></h3>
        </td>
      </tr>
      <tr>
        <td colspan="2" class="gazo">
          <a href="<?php the_permalink(); ?>" rel="external nofollow">
          <?php $gazo = get_field('mousikomi1'); 
                if( $gazo ): ?>
                <img src="<?php echo $gazo['banner1']['url']; ?>" alt="<?php echo $gazo['banner1']['alt']; ?>" />
                <?php endif; ?>
          </a>
        </td>
      </tr>
      <tr>
        <th>価格</th>
        <td><?php echo $spec['water_cost']; ?></td>
      </tr>
      <tr>
        <th>サーバー料金</th>
        <td><?php echo $spec['server_cost']; ?></td>
      </tr>
      <tr>
        <th>配送料</th>
        <td><?php echo $spec['shipping_cost']; ?></td>
      </tr>
      <tr>
        <th>電気代(月)</th>
        <td><?php echo $spec['electricity_cost']; ?></td>
      </tr>
      <tr>
      </tr>
      <tr>
        <th>お水の種類</th>
        <td><?php
          $field = get_field_object('water_type');
          $water = $field['value'];
          if( $water ):
          ?>
          <?php foreach( $water as $water ): ?>
          
        <?php echo $field['choices'][ $water ]; ?>
          <?php endforeach; ?>
        <?php endif; ?>
        </td>
      </tr>
      <tr>
        <th>ボトルの種類</th>
        <td>
          <?php
          $field = get_field_object('bottle');
          $value = $field['value'];
          $label = $field['choices'][ $value ];
          ?>
          <?php echo $label; ?><br />タイプ</td>
      </tr>
      <tr>
        <th>宅配エリア</th>
        <td>
          <?php
  					$field = get_field_object('shipping_area');
  					$value = $field['value'];
  					$label = $field['choices'][ $value ];
  					?>
          <?php echo $label; ?>
        </td>
      <tr id="item_name">
        <td colspan="2" class="camp pink left">キャンペーン情報</td>
      </tr>
      <tr>
        <td colspan="2" class="left site_link">
          <span class="pink"><?php echo get_field("recommend_headline");?></span>
          <a href="<?php the_permalink(); ?>" rel="external nofollow"><img src="<?php bloginfo('template_directory'); ?>/img/btn-official-site.jpg" alt="公式サイトはこちら" /></a>
        </td>
      </tr>
    </table>
  </div>
<?php endwhile; ?>
	</dd>
</dl>
