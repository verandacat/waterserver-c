<div class="s_items">
    <?php
      $water_type_array_pic = get_post_meta($pickup_id,"water_type",true);
      $water_type_array_pic = array_map('callback',$water_type_array_pic);
    ?>
    <?php $spec = get_field('spec',$pickup_id); ?>
  <div class="resu">
    <table>
      <tr id="item_name">
        <td>商品名</td>
        <td colspan="3">価格</td>
        <td colspan="3">サーバー料金</td>
      </tr>
      <tr>
        <td rowspan="5">
          <a href="<?php the_permalink(); ?>&type=pickup" rel="external nofollow">
          <?php $gazo = get_field('mousikomi1',$pickup_id); 
                if( $gazo ): ?>
                <img src="<?php echo $gazo['banner1']['url']; ?>" alt="<?php echo $gazo['banner1']['alt']; ?>" />
                <?php endif; ?>
          </a>
          <a href="<?php the_permalink(); ?>&type=pickup" rel="external nofollow"><?php echo get_post( $pickup_id )->post_title; ?></a>
        </td>
        <?php $spec = get_field('spec', $post['id']); ?>
        <td colspan="3"><?php echo number_format($spec['water_cost']); ?>円<?php echo $spec['water_cost2']; ?></td>
        <td colspan="3">
        <?php if(!preg_match("/[0-9]{4}/",$spec['server_cost'])) : ?>
            <?php echo $spec['server_cost']; ?>
            <?php echo $spec['server_cost2']; ?>
            <?php else : ?>
            <?php echo number_format($spec['server_cost']); ?>円
            <?php echo $spec['server_cost2']; ?>
        <?php endif; ?>
        </td>
      </tr>
      <tr id="item_name">
        <td colspan="3">配送料</td>
        <td colspan="3">電気代(月)</td>
      </tr>
      <tr>
        <td colspan="3"><?php echo $spec['shipping_cost']; ?></td>
        <td colspan="3">
        <?php if(!preg_match("/[0-9]{4}/",$spec['electricity_cost'])) : ?>
            <?php echo $spec['electricity_cost']; ?>
            <?php echo $spec['electricity_cost2']; ?>
            <?php else : ?>
            <?php echo number_format($spec['electricity_cost']); ?>円
            <?php echo $spec['electricity_cost2']; ?>
        <?php endif; ?>
        </td>
      </tr>
      <tr id="item_name">
        <td colspan="2">お水の種類</td>
        <td colspan="2">ボトルの種類</td>
        <td colspan="2">宅配エリア</td>
      </tr>
      <tr>
        <td colspan="2"><?php
          $field = get_field_object('water_type',$pickup_id);
          $water = $field['value'];
          if( $water ):
          ?>
          <?php foreach( $water as $water ): ?>
          
        <?php echo $field['choices'][ $water ]; ?>
          <?php endforeach; ?>
        <?php endif; ?>
        </td>

        <td colspan="2">
          <?php
          $field = get_field_object('bottle',$pickup_id);
          $value = $field['value'];
          $label = $field['choices'][ $value ];
          ?>
          <?php echo $label; ?><br />タイプ</td>
        </td>
        <td colspan="2">
          <?php
  					$field = get_field_object('shipping_area');
  					$value = $field['value'];
  					$label = $field['choices'][ $value ];
  					?>
          <?php echo $label; ?>
        </td>
      <tr>
        <td colspan="4" class="camp pink left">キャンペーン情報</td>
        <td colspan="3" class="site_link left">公式サイトへアクセス</td>
      </tr>
      <tr>
        <td colspan="4" class="left">
          <span class="pink"><?php echo get_post_meta($pickup_id,"recommend_headline", true);?></span>
          <p><?php echo get_post_meta($pickup_id,"recommend_description", true);?></p>
        </td>
        <td colspan="3" class="site_link gazo">
         <a href="<?php bloginfo('url'); ?>/link?link_id=<?php echo $pickup_id; ?>&type=pickup" rel="external nofollow"><img src="<?php bloginfo('template_directory'); ?>/img/btn-official-site.jpg" alt="公式サイトはこちら" /></a>
        </td>
      </tr>
    </table>
  </div>
