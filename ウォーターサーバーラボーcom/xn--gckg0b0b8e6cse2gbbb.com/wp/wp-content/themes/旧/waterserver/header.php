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
<title>ウォーターサーバーラボ.com <?php if (is_front_page()) : echo "| 探し求めていた水サーバーが見つかる！!"; elseif (is_single() || is_page()) : echo "| " ; the_title(); endif; ?></title>
<meta name="description" content="ウォーターサーバーどれにしようか迷っていませんか？当サイトは利用目的に合ったウォーターサーバーを条件を指定して検索することができます。また、人気・おすすめのウォーターサーバーランキングをご紹介♪あなたのウォーターサーバー選びをお手伝いします。" />
<meta name="keywords" content="ウォーターサーバー,ウォーターサーバー ランキング,水 サーバー,水 宅配,天然水" />

<?php if (is_page("serversearch")) {?>
<?php } elseif (is_single()) {?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/single.css" media="all" />
<?php } ?>
<?php if (is_mobile()): ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/sp.css?<?php echo time(); ?>" />
<?php endif ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/addstyle.css" media="all" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/smartrollover.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/favorite.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
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

if (is_tax()) {
  $body_id = "side_menu_page";
} else if (is_page("serversearch")) {
  $body_id = "search_result";
} else if ( !is_page(front-page)) {
  $body_id = "footer_menu_page";
} else if (is_front_page() || is_page("トップページ")) {
  $body_id = "top";
} else if (is_single()) {
  $body_id = "single_campaign";
}
?>
<body id="<?php echo $body_id; ?>">
 <script type="application/javascript">
 $(window).load(function() {
		$("#btn_search_start").click(function () {
			$('#form1').submit();
		});
 });
</script>

<!-- Google Tag Manager -->
<?php the_field('google_tag_manager'); ?>
<!-- End Google Tag Manager -->

<div id="entirety">

<?php// if(is_mobile()){ ?>
<!-- <div id="nav-drawer">
  <input id="nav-input" type="checkbox" class="nav-unshown">
  <label id="nav-open" for="nav-input"><span></span></label>
  <label class="nav-unshown" id="nav-close" for="nav-input"></label>
  <div id="nav-content">
 -->
<?php //if (function_exists('dynamic_sidebar')) {	dynamic_sidebar('Sidebar Widgets');} ?>
<!--   </div>  -->
<?php// } ?>

<div id="header">
	<div class="headimg">
		<h1><a href="<?php bloginfo('url'); ?>">
			<?php if(!is_mobile()){ PC表示 ?>
			<img src="<?php bloginfo('template_directory'); ?>/img/header.jpg" alt="" />
			<?php }else{ //スマホ表示 ?>
			<img src="<?php bloginfo('template_directory'); ?>/img/header_sp.jpg" alt="" />
			<?php  } ?>
		</a></h1>
	</div>
</div><!-- / header box -->

<div id="contents">
<?php if(!is_mobile()){
  if($template_name == 'page-searchresult' || is_page('page-link') ||  is_home() || is_front_page()){
  }else{
    //get_sidebar();
  }
} ?>
