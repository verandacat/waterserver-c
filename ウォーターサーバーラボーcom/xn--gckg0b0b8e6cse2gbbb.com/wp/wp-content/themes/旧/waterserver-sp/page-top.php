<?php

/* Template Name: SPトップページ用 */

?>
<?php get_header(); ?>
 <script type="application/javascript">
 $(window).load(function() {
		$("#btn_search_start").click(function () {
			$('#form1').submit();
		});
		$("#btn_search_start_pref").click(function () {
			$('#form2').submit();
		});
 });
</script>
<?php get_sidebar(); ?>
<article>
<?php include(TEMPLATEPATH .'/inc/searchform.php'); ?>
  
<form action="<?php bloginfo('url'); ?>/serversearch" id="form2" method="GET" enctype="multipart/form-data">
	<section id="prefectures_search">
    <h2>各都道府県にお届け可能な業者を<br>
    一発検索！</h2>
    
    <select name="pref">
      <option value="" selected>都道府県</option>
      <option value="hokkaido">北海道</option>
      <option value="aomori">青森県</option>
      <option value="iwate">岩手県</option>
      <option value="miyagi">宮城県</option>
      <option value="akita">秋田県</option>
      <option value="yamagata">山形県</option>
      <option value="fukushima">福島県</option>
      <option value="ibaraki">茨城県</option>
      <option value="tochigi">栃木県</option>
      <option value="gunma">群馬県</option>
      <option value="saitama">埼玉県</option>
      <option value="chiba">千葉県</option>
      <option value="tokyo">東京都</option>
      <option value="kanagawa">神奈川県</option>
      <option value="niigata">新潟県</option>
      <option value="toyama">富山県</option>
      <option value="ishikawa">石川県</option>
      <option value="fukui">福井県</option>
      <option value="yamanashi">山梨県</option>
      <option value="nagano">長野県</option>
      <option value="gifu">岐阜県</option>
      <option value="shizuoka">静岡県</option>
      <option value="aichi">愛知県</option>
      <option value="mie">三重県</option>
      <option value="shiga">滋賀県</option>
      <option value="kyoto">京都府</option>
      <option value="osaka">大阪府</option>
      <option value="hyogo">兵庫県</option>
      <option value="nara">奈良県</option>
      <option value="wakayama">和歌山県</option>
      <option value="tottori">鳥取県</option>
      <option value="shimane">島根県</option>
      <option value="okayama">岡山県</option>
      <option value="hiroshima">広島県</option>
      <option value="yamaguchi">山口県</option>
      <option value="tokushima">徳島県</option>
      <option value="kagawa">香川県</option>
      <option value="ehime">愛媛県</option>
      <option value="kochi">高知県</option>
      <option value="fukuoka">福岡県</option>
      <option value="saga">佐賀県</option>
      <option value="nagasaki">長崎県</option>
      <option value="kumamoto">熊本県</option>
      <option value="oita">大分県</option>
      <option value="miyazaki">宮崎県</option>
      <option value="kagoshima">鹿児島県</option>
      <option value="okinawa">沖縄県</option>
    </select>
  
    <em><a href="#" id="btn_search_start_pref"><img src="<?php bloginfo('template_directory'); ?>/img/btn-search_off.jpg" alt="検索開始" width="240" height="45"></a></em>
  </section><!-- Section [Easy Search] -->
</form>

<?php include(TEMPLATEPATH .'/inc/choose_feature.php'); ?>
</article>

<aside id="newest_campaign">
	<div>
    <h2>最新のお得キャンペーン情報</h2>
    
    <ul>
<?php
$category_id = get_cat_ID('キャンペーン');
$posts = get_posts("numberposts=2&category=$category_id");
?>
<?php
if($posts): foreach($posts as $post): setup_postdata($post);
?>
      <li><a href="<?php the_permalink(); ?>"><?php 	if ($post->post_excerpt) : echo $post->post_excerpt; else: the_title(); endif;?></a></li>
<?php endforeach; endif;
?>
    </ul>
  </div>
  
  <figure><a href="<?php bloginfo('url'); ?>/ranking/"><img src="<?php bloginfo('template_directory'); ?>/img/bnr-ranking.jpg" alt="2013年版 本気でオススメできる優良ウォーターサーバー 人気ランキング!" width="300" height="50"></a></figure>
</aside>

<?php get_footer(); ?>