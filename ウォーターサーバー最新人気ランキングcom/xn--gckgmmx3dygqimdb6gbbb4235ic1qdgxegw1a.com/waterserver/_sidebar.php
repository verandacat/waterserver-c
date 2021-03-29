<div id="sub_contents">

<a href="<?php bloginfo('url'); ?>/ranking" id="banner_ranking_sub"><img src="<?php bloginfo('template_directory'); ?>/img/common/bnr-ranking-side_off.jpg" alt="2013年版人気ランキング　今年No.1のおすすめウォーターサーバーは？　ランキング詳細はこちら" width="230" height="234" /></a>
<?php

$nat_img = 'off';
$ro_img  = 'off';
$ele_img  = 'off';
$cost_img  = 'off';
$milk_img  = 'off';
$conv_img  = 'off';

if (is_page('天然水')) {
	$nat_img = 'on';
} else if (is_page('RO水')) {
	$ro_img  = 'on';
} else if (is_page('電気代が安くなる')) {
	$ele_img  = 'on';
} else if (is_page('お水の価格が安い')) {
	$cost_img  = 'on';
} else if (is_page('赤ちゃんのミルク作りに')) {
	$milk_img  = 'on';
} else if (is_page('利便性に優れたサーバー')) {
	$conv_img  = 'on';
}

?>
<dl id="side_menu">
	<dt><img src="<?php bloginfo('template_directory'); ?>/img/common/ttl-side-navi.jpg" alt="特徴で選ぶ" width="230" height="50" /></dt>
	<dd>
		<ul>
			<li><a href="<?php bloginfo('url'); ?>/natural_water"><img src="<?php bloginfo('template_directory'); ?>/img/common/btn-sub-navi01_<?php echo $nat_img; ?>.gif" alt="天然水" width="230" height="50" /></a></li>
			<li><a href="<?php bloginfo('url'); ?>/ro_water"><img src="<?php bloginfo('template_directory'); ?>/img/common/btn-sub-navi02_<?php echo $ro_img; ?>.gif" alt="RO水" width="230" height="50" /></a></li>
			<li><a href="<?php bloginfo('url'); ?>/electric_utility_expense"><img src="<?php bloginfo('template_directory'); ?>/img/common/btn-sub-navi03_<?php echo $ele_img; ?>.gif" alt="電気代が安くなる" width="230" height="50" /></a></li>
			<li><a href="<?php bloginfo('url'); ?>/cost"><img src="<?php bloginfo('template_directory'); ?>/img/common/btn-sub-navi04_<?php echo $cost_img; ?>.gif" alt="お水の価格が安い" width="230" height="50" /></a></li>
			<li><a href="<?php bloginfo('url'); ?>/baby"><img src="<?php bloginfo('template_directory'); ?>/img/common/btn-sub-navi05_<?php echo $milk_img; ?>.gif" alt="赤ちゃんのミルク作りに" width="230" height="50" /></a></li>
			<li><a href="<?php bloginfo('url'); ?>/convenience"><img src="<?php bloginfo('template_directory'); ?>/img/common/btn-sub-navi06_<?php echo $conv_img; ?>.gif" alt="利便性に優れたサーバー" width="230" height="50" /></a></li>
		</ul>
	</dd>
</dl>
<?php 
if (function_exists('dynamic_sidebar')) {
	//ウィジェットを使う場合はこちらのコメントアウトを取る。
	//dynamic_sidebar('Sidebar Widgets');
}
 ?>

</div><!-- / sub contents box -->
