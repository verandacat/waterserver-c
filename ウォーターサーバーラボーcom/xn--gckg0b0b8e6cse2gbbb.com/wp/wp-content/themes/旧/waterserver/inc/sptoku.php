
      <tr id="item_name">
        <td colspan="6" class="text-center bblue"><img src="<?php bloginfo('template_directory'); ?>/img/rank<?php the_field('recommend_order'); ?>_a.gif" alt="" />
          <h3><a href="<?php the_permalink(); ?>" rel="external nofollow"><?php echo get_post( $post->ID )->post_title; ?></a></h3>
        </td>
      </tr>
      <tr>
        <td colspan="6" class="gazo">
          <a href="<?php the_permalink(); ?>" rel="external nofollow">
                <?php $gazo = get_field('mousikomi1'); 
                if( $gazo ): ?>
                  <img src="<?php echo $gazo['banner1']['url']; ?>" alt="<?php echo $gazo['banner1']['alt']; ?>" />
                <?php endif; ?>
                <?php $ogazo = get_field('other_gazo'); 
                if( $ogazo ): ?>
                  <img src="<?php echo $ogazo['url']; ?>" alt="<?php echo $ogazo['alt']; ?>" />
                <?php endif; ?>

          </a>
        </td>
      </tr>
      <?php $spec = get_field('spec'); ?>
      <tr>
        <th colspan="2">価格</th>
        <td colspan="4"><?php echo $spec['water_cost']; ?></td>
      </tr>
      <tr>
        <th colspan="2">サーバー料金</th>
        <td colspan="4"><?php echo $spec['server_cost']; ?></td>
      </tr>
      <tr>
        <th colspan="2">配送料</th>
        <td colspan="4"><?php echo $spec['shipping_cost']; ?></td>
      </tr>
      <tr>
        <th colspan="2">電気代(月)</th>
        <td colspan="4"><?php echo $spec['electricity_cost']; ?></td>
      </tr>
      <tr>
      </tr>
      <tr>
        <th colspan="2">お水の種類</th>
        <td colspan="4"><?php
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
        <th colspan="2">ボトルの種類</th>
        <td colspan="4">
          <?php
          $field = get_field_object('bottle');
          $value = $field['value'];
          $label = $field['choices'][ $value ];
          ?>
          <?php echo $label; ?><br />タイプ</td>
      </tr>
      <tr>
        <th colspan="2">宅配エリア</th>
        <td colspan="4">
          <?php
  					$field = get_field_object('shipping_area');
  					$value = $field['value'];
  					$label = $field['choices'][ $value ];
  					?>
          <?php echo $label; ?>
        </td>
      </tr>
<?php if ( is_home() || is_front_page() ) : ?>
            <tr>
              <td colspan="6" class="text-center bblue">調査結果（◎非常に優秀、○優秀、△まずまず、×ダメ）</td>
            </tr>
            <tr>
              <?php if( have_rows('kekka') ): 
                while( have_rows('kekka') ): the_row();
              ?>
              <th colspan="2">お水の美味しさ</th>
              <td>
                <?php
                $oisi = get_sub_field_object('oisisa');
                $value = $oisi['value'];
                $label = $oisi['choices'][ $value ];
                ?>
                <?php echo $label; ?>
              </td>
              <th colspan="2">衛生管理</th>
              <td>
                <?php
                $eise = get_sub_field_object('eisei');
                $value = $eise['value'];
                $label = $eise['choices'][ $value ];
                ?>
                <?php echo $label; ?>
              </td>
            </tr>
            <tr>
              <th colspan="2">赤ちゃんや小さなお子さんに</th>
              <td>
                <?php
                $baby = get_sub_field_object('baby');
                $value = $baby['value'];
                $label = $baby['choices'][ $value ];
                ?>
                <?php echo $label; ?>
              </td>
              <th colspan="2">便利度</th>
              <td>
                <?php
                $benr = get_sub_field_object('benrido');
                $value = $benr['value'];
                $label = $benr['choices'][ $value ];
                ?>
                <?php echo $label; ?>
              </td>
            </tr>
            <tr>
              <th colspan="2">デザイン性</th>
              <td>
                <?php
                $deza = get_sub_field_object('dezain');
                $value = $deza['value'];
                $label = $deza['choices'][ $value ];
                ?>
                <?php echo $label; ?>
              </td>
              <th colspan="2">健康やダイエットに</th>
              <td>
                <?php
                $heal = get_sub_field_object('health');
                $value = $heal['value'];
                $label = $heal['choices'][ $value ];
                ?>
                <?php echo $label; ?>
              </td>
            </tr>
            <tr>
              <th>省エネ</th>
              <td>
                <?php
                $eco = get_sub_field_object('eco');
                $value = $eco['value'];
                $label = $eco['choices'][ $value ];
                ?>
                <?php echo $label; ?>
              </td>
              <th>コスパ</th>
              <td>
                <?php
                $cospa = get_sub_field_object('cospa');
                $value = $cospa['value'];
                $label = $cospa['choices'][ $value ];
                ?>
                <?php echo $label; ?>
              </td>
              <th>満足度</th>
              <td>
                <?php
                $manzo = get_sub_field_object('manzoku');
                $value = $manzo['value'];
                $label = $manzo['choices'][ $value ];
                ?>
                <?php echo $label; ?>
              </td>
              <?php endwhile; ?>
            <?php endif; ?>
            </tr>
<?php endif; ?>
      <tr id="item_name">
        <td colspan="6" class="camp pink left">キャンペーン情報</td>
      </tr>
      <tr>
        <td colspan="6" class="left site_link gazo">
          <span class="pink"><?php echo get_field("recommend_headline");?></span>
          <a href="<?php the_permalink(); ?>" rel="external nofollow"><img src="<?php bloginfo('template_directory'); ?>/img/btn-official-site.jpg" alt="公式サイトはこちら" /></a>
        </td>
      </tr>
