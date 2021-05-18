<?php

/* Template Name: ランキング用 */

?>
<?php get_header(); ?>

<div id="main_contents">
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/"  id="footmark">
  <?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>
<?php if(!is_mobile()){ ?>


<h1><img src="<?php bloginfo('template_directory'); ?>/img/top/bnr-ranking_off.jpg" alt="2014年版　本気でオススメできる優良ウォーターサーバー人気ランキング" width="700" height="99" /></h1>


<dl class="ranking">
	<dd>
	<div>
		<p style="margin:20px;">実際にウォーターサーバー利用者の評価が高い優良ウォーターサーバー10社をご紹介します！<br />各項目において高ポイントを得た選び抜かれた優秀なウォーターサーバーです。</p>
	</div>


<?php
	$max_rank = 10;

	$pst = "publish";
	$args =  array( 
	  'post_type' => 'waterserver',
	  'post_status' => $pst,
	  'orderby' => 'meta_value',
	  'meta_key' => 'recommend_order',
	  'order' => 'ASC',
	  'posts_per_page' => $max_rank);

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
		if ($max_rank == $count) : ?>
		<div class="ranking_result" id="ranking_last">
		<?php else: ?>
		<div class="ranking_result" id="ranking_no<?php echo $count;?>">
		<?php endif; ?>
        <table class="server">
          <tbody>
	      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <tr>
              <td colspan="6" class="text-center bblue">
                <h3><img src="<?php bloginfo('template_directory'); ?>/img/rank<?php the_field('recommend_order'); ?>_a.gif" alt="" /> <a href="<?php the_permalink(); ?>" rel="external nofollow" target="_blank"><?php the_title(); ?></a></h3>
              </td>
            </tr>
            <tr>
              <td colspan="2" class="gazo">
                <a href="<?php the_permalink(); ?>" rel="external nofollow" class="">
                <?php $gazo = get_field('mousikomi1'); 
                if( $gazo ): ?>
                  <img src="<?php echo $gazo['banner1']['url']; ?>" alt="<?php echo $gazo['banner1']['alt']; ?>" />
                <?php endif; ?>
                </a>
              </td>
              <td colspan="4" valign="middle" class="text-center">
                <h4 class="aka futo"><?php the_field('recommend_gaiyou'); ?></h4>
                <a href="<?php the_permalink(); ?>" target="_blank">⇒ <?php the_title(); ?>の詳細・申込はこちら</a>
              </td>
            </tr>
            <tr>
              <td colspan="6" class="text-center bblue">
                <span class="futo">基本スペック</span>
              </td>
            </tr>
            <tr>
              <?php $spec = get_field('spec'); ?>
              <th>お水の価格（１本）</th>
              <td><?php echo $spec['water_cost']; ?></td>
              <th>お水の種類</th>
              <td>
                <?php
                $field = get_field_object('water_type');
                $water = $field['value'];
                if( $water ): 
                ?>
                  <?php foreach( $water as $water ): ?>
                    <?php echo $field['choices'][ $water ]; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
              </td>
              <th>サーバー代（月）</th>
              <td><?php echo $spec['server_cost']; ?></td>
            </tr>
            <tr>
              <th>配送料</th>
              <td><?php echo $spec['shipping_cost']; ?></td>
              <th>ボトルの種類</th>
              <td>
                <?php
                $field = get_field_object('bottle');
                $value = $field['value'];
                $label = $field['choices'][ $value ];
                ?>
                <?php echo $label; ?>
              </td>
              <th>電気代（月）</th>
              <td><?php echo $spec['electricity_cost']; ?></td>
            </tr>
            <tr>
              <th colspan="3">配送地域</th>
              <td colspan="3">
                <?php
                $field = get_field_object('shipping_area');
                $value = $field['value'];
                $label = $field['choices'][ $value ];
                ?>
                <?php echo $label; ?>
              </td>
            </tr>
            <?php if( get_field('camexe') ): ?>
            <tr id="item_name">
              <td colspan="6">
              <p class="txt-img">
                <?php 
                  $image = get_field('cam_img');
                if( !empty($image) ): ?>
                	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
              </p>
              <span class="pink"><?php the_field('cam_catch'); ?></span>
              <?php the_field('cam_description'); ?>
            </td>
            </tr>
            <?php endif; ?>
            <tr>
            <td colspan="6" class="fukid">
            <a href="<?php the_permalink(); ?>" target="_blank" class="button grad"><?php the_title(); ?>の公式サイトはこちら</a>
            </td>
            </tr>
            <tr class="spac"><td colspan="6"></td></tr>
            <?php endwhile; ?>
          </tbody>
        </table>
	</dd>
</dl>

<p id="ranking_notice">※ランキングは<a href="<?php bloginfo('url'); ?>/investigation">調査概要</a>に基づき決定させていただいております。</p>

<?php }else{
  get_template_part( 'inc/rank');
  get_template_part( 'inc/searchform');
} ?>

</div><!-- / main contents box -->

</div><!-- / contents box -->

<?php get_footer(); ?>
