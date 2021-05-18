<?php 
/* Template Name: 特徴別リスト用 */
?>
<?php
  $term_id = get_queried_object()->term_id;
  $term_name = get_queried_object()->slug;
  $term_idsp = 'tokutyo_'.$term_id; 
  $pcgazo = get_field( 'feature_img',$term_idsp);
  $pctxt = get_field( 'feature_text',$term_idsp);
  $pcdes = get_field( 'feature_description',$term_idsp);
  $scg = get_field( 'sp_feature_img',$term_idsp);
  $spgazo = wp_get_attachment_image_src($scg, 'full');
  $sptxt = get_field( 'sp_feature_text',$term_idsp);
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="main_contents">
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/"  id="footmark">
  <?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>
<dl class="ranking">
  <dt>
  <?php if($pcgazo): ?>
    <h1><img src="<?php echo $pcgazo[url]; ?>" alt="<?php echo $pctxt; ?>"></h1>
  <?php else: ?>
    <?php if(!is_mobile()): ?>
      <h1><?php echo $pctxt; ?></h1>
    <?php else: ?>
      <h1><?php echo $sptxt; ?></h1>
    <?php endif; ?>
  <?php endif; ?>
  </dt>

  <dd class="space20">
<?php if (!$pcgazo) : ?>
  <div>
    <p style="margin:20px;font-size:108%"><?php echo $pcdes; ?></p>
  </div>
<?php endif; ?>


<?php
  if (is_tax('tokutyo','natural_water')){
    $leftno = leftmenu_no1;
  }elseif (is_tax('tokutyo','ro_water')){
    $leftno = leftmenu_no2;
  }elseif (is_tax('tokutyo','electric_utility_expense')){
    $leftno = leftmenu_no3;
  }elseif (is_tax('tokutyo','cost')){
    $leftno = leftmenu_no3;
  }elseif (is_tax('tokutyo','baby')){
    $leftno = leftmenu_no5;
  }elseif (is_tax('tokutyo','convenience')){
    $leftno = leftmenu_no6;
  }
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$myQuery = new WP_Query();
$param = array(
    'posts_per_page' => '10',
    'post_type' => 'waterserver',
    'taxonomy' => 'tokutyo',
    'term' => $term_name,
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'meta_key' => $leftno,
		'meta_query' => array(
			array(	'key'=>$leftno,
				'value'=> array( '1', '10' ),
				'compare'=>'BETWEEN',
				'type'=>'NUMERIC'
				)
			)
	);
	$myQuery->query($param);
?>

<?php if($myQuery->have_posts()): while($myQuery->have_posts()) : $myQuery->the_post();
  if (is_tax('tokutyo','natural_water')){
    $recono = get_field( 'leftmenu_no1');
    $leftmida = get_field( 'leftmenu_catch1');
    $leftsetu = get_field( 'leftmenu_description1');
  }elseif (is_tax('tokutyo','ro_water')){
    $recono = get_field( 'leftmenu_no2');
    $leftmida = get_field( 'leftmenu_catch2');
    $leftsetu = get_field( 'leftmenu_description2');
  }elseif (is_tax('tokutyo','electric_utility_expense')){
    $recono = get_field( 'leftmenu_no3');
    $leftmida = get_field( 'leftmenu_catch3');
    $leftsetu = get_field( 'leftmenu_description3');
  }elseif (is_tax('tokutyo','cost')){
    $recono = get_field( 'leftmenu_no3');
    $leftmida = get_field( 'leftmenu_catch3');
    $leftsetu = get_field( 'leftmenu_description3');
  }elseif (is_tax('tokutyo','baby')){
    $recono = get_field( 'leftmenu_no5');
    $leftmida = get_field( 'leftmenu_catch5');
    $leftsetu = get_field( 'leftmenu_description5');
  }elseif (is_tax('tokutyo','convenience')){
    $recono = get_field( 'leftmenu_no6');
    $leftmida = get_field( 'leftmenu_catch6');
    $leftsetu = get_field( 'leftmenu_description6');
  }
 ?>

        <table class="server">
          <tbody>
          <?php if(!is_mobile()){ ?>
           <tr>
              <td colspan="6" class="text-center bblue">
                <h3><img src="<?php bloginfo('template_directory'); ?>/img/rank<?php echo $recono; ?>_a.gif" alt="" /> <a href="<?php the_permalink(); ?>" rel="external nofollow" target="_blank"><?php the_title(); ?></a></h3>
              </td>
            </tr>
            <tr>
              <td colspan="2" class="gazo">
                <a href="<?php the_permalink(); ?>" rel="external nofollow" class="">
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
              <td colspan="4" valign="middle" class="text-center">
                <h4 class="aka futo"><?php echo $leftmida; ?></h4>
                <?php echo $leftsetu; ?><br>
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
          <?php }else{?>
          <?php get_template_part('inc/sptoku'); ?>
          <?php } ?>
          </tbody>
        </table>
<?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>


  </dd>
</dl>
<p id="ranking_notice">※ランキングは<a href="<?php bloginfo('url'); ?>/investigation">調査概要</a>に基づき決定させていただいております。</p>

<?php include('inc/searchform.php'); ?>
</div>
</div><!-- / main contents box -->
</div><!-- / contents box -->

<?php get_footer(); ?>