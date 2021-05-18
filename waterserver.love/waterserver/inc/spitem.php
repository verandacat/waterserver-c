   <tr id="item_name">
       <td class="sgazo">商品名</td>
       <td colspan="3">価格</td>
       <td colspan="3">サーバー料金</td>
   </tr>
   <td rowspan="5">
       <a href="<?php the_permalink($post['id']); ?>" rel="external nofollow">
           <?php $gazo = get_field('mousikomi1', $post['id']);
        if ($gazo) : ?>
           <img src="<?php echo $gazo['banner1']['url']; ?>" alt="<?php echo $gazo['banner1']['alt']; ?>" />
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
           <img src="<?php echo $ogazo['url']; ?>" alt="<?php echo $ogazo['alt']; ?>" />
           <?php endif; ?>
       </a>
       <a href="<?php the_permalink($post['id']); ?>"
           rel="external nofollow"><?php echo get_post($post['id'])->post_title; ?>
           </h3>
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
       <td colspan="3"><?php echo $post['shipping_cost']; ?></td>
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
       <td colspan="2">
           <?php echo implode('、', $post['water_types']); ?>
       </td>
       <td colspan="2">
           <?php echo $post["bottle"]; ?><br />タイプ
       </td>
       <td colspan="2">
           <?php echo $post["shipping_area"]; ?>
       </td>
   <tr>
       <td colspan="6" class="camp pink left">キャンペーン情報</td>
   </tr>
   <tr class="spac">
       <td colspan="6" class="left site_link">
           <span class="pink"><?php echo get_field("recommend_headline", $post['id']); ?></span>
           <p><?php //echo get_field("recommend_description", $post['id']); 
          ?></p>
           <a href="<?php the_permalink($post['id']); ?>" rel="external nofollow"><img class="kousiki"
                   src="<?php bloginfo('template_directory'); ?>/img/btn-official-site.jpg" alt="公式サイトはこちら" /></a>
       </td>
   </tr>