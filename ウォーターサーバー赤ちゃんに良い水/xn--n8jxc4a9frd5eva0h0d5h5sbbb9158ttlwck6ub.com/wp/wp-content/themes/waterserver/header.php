<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<?php $url = $_SERVER["REQUEST_URI"]; ?>
<?php if(preg_match('/info/',$url)){ ?>
<meta name="robots" content="noindex,nofollow,noarchive" />
<?php } ?>
	<meta name="viewport" content="width=device-width,initial-scale=1">
<title>ウォーターサーバー ランキング</title>
<meta name="keywords" content="ウォーターサーバー,ウォーターサーバー ランキング,水 宅配,水 サーバー" />
<meta name="description" content="ウォーターサーバー選びで失敗しないためのポイントと２８社から厳選したほんとのおすすめ優良サーバーをご紹介します。" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/top.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/sidepage.css" media="all" />

<?php if (is_page("serversearch")) {?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/search.css" media="all" />
<?php } else if (is_page("about") || is_page("recommend_reason") || is_page("choice") || is_page("guide") || is_page("comparison") || is_page("economical") || is_page("info") || is_page("investigation")) {?><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/footermenu.css" media="all" />
<?php } elseif (is_page()) {?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/footermenu.css?<?php echo time(); ?>" media="all" />
<?php } elseif (is_single()) {?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/single.css" media="all" />
<?php } ?>
<?php if (is_mobile()): ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/sp.css?<?php echo time(); ?>" />
<?php endif ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/smartrollover.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/favorite.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
<?php
global $template;
$template_name = basename($template, '.php');
?>
<script type="text/javascript">
	$(function(){
		$("#search_more dt").on("click", function() {
			$(this).next().slideToggle();
		});
		console.log('<?php echo $template_name; ?>');
	});
</script>
</head>
<?php
$body_id = "top";

if (is_page("natural_water") || is_page("ranking") || is_page("ranking_p") || is_page("ro_water") || is_page("electric_utility_expense") || is_page("cost") || is_page("baby") || is_page("convenience")) {

	$body_id = "side_menu_page";

} else if (is_page("serversearch")) {

	$body_id = "search_result";

} else if ( is_page("about") || is_page("recommend_reason") || is_page("choice") || is_page("guide") || is_page("comparison") || is_page("economical") || is_page("info") || is_page("investigation")) {

	$body_id = "footer_menu_page";
} else if (is_front_page() || is_page("トップページ")) {

	$body_id = "top";

} else if (is_page()) {
	$body_id = "footer_menu_page";

} else if (is_single()) {
	$body_id = "single_campaign";
}
?>
<body id="<?php echo $body_id; ?>">


<div id="entirety">

<div id="contents">
