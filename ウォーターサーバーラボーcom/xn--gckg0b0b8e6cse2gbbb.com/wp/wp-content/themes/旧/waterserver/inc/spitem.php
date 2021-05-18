   <tr id="item_name">
      <td class="sgazo">商品名</td>
      <td colspan="3">価格</td>
      <td colspan="3">サーバー料金</td>
    </tr>
    <td rowspan="5">
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
       <a href="<?php the_permalink(); ?>" rel="external nofollow"><?php echo get_post($post['id'])->post_title; ?>
      </h3>
    </td>
    <td colspan="3"><?php echo $post['water_cost']; ?></td>
    <td colspan="3"><?php echo $spec['server_cost']; ?></td>
  </tr>
  <tr id="item_name">
    <td colspan="3">配送料</td>
    <td colspan="3">電気代(月)</td>
  </tr>
  <tr>
    <td colspan="3"><?php echo $spec['shipping_cost']; ?></td>
    <td colspan="3"><?php echo $spec['electricity_cost']; ?></td>
  </tr>
  <tr id="item_name">
    <td colspan="2">お水の種類</td>
    <td colspan="2">ボトルの種類</td>
    <td colspan="2">宅配エリア</td>
  </tr>
  <tr>
    <td colspan="2">
      <?php echo implode('、',$post['water_types']);?>
    </td>
    <td colspan="2">
      <?php echo $post["bottle"];?><br />タイプ
    </td>
    <td colspan="2">
      <?php echo $post["shipping_area"];?>
    </td>
  <tr>
    <td colspan="4" class="camp pink left">キャンペーン情報</td>
    <td colspan="3" class="site_link left">公式サイトへアクセス</td>
  </tr>
  <tr class="spac">
    <td colspan="4" class="left">
      <span class="pink"><?php echo get_field("recommend_headline" ,$post['id']);?></span>
      <p><?php echo get_field("recommend_description",$post['id']);?></p>
    </td>
    <td colspan="3" class="site_link gazo">
     <a href="<?php the_permalink(); ?>" rel="external nofollow"><img src="<?php bloginfo('template_directory'); ?>/img/btn-official-site.jpg" alt="公式サイトはこちら" /></a>
    </td>
  </tr>
