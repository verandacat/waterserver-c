<?php

/* Template Name: リンククリック用 */

?>
<html>
<head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42485981-1', 'waterserver-guide.jp');
  ga('send', 'pageview');

</script>
</head>
<body>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N9RBHB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N9RBHB');</script>
<!-- End Google Tag Manager -->

<?php
//_GETでデータを取得し、
//商品データからurl情報を取ってリダイレクトする
if(isset($_GET['link_id'])) {

	$link_id = $_GET['link_id'];
	$url = "";

	if (is_numeric($link_id)) {

		if (isset($_GET['type'])) {
			if ($_GET['type'] == "electric") {
				$url = get_post_meta( $link_id, 'url2', true );
			} else if ($_GET['type'] == "free") {
				$url = get_post_meta( $link_id, 'url3', true );
			}
		} 
		if ($url == "") {
			$url = get_post_meta( $link_id, 'url', true );
		}
	}
	if ($url !== "") {
		//このページ噛ますように変更
		//header( "location: {$url}");
?>
公式サイトに移動します。
<script>
	setTimeout(function(){
		alert("t");
		//location.href = "<?php echo $url; ?>";
	}, 5000);
</script>
<?php
		//リダイレクト
	} else {
		//トップページへリダイレクト
		header( "location: " . home_url() );
	}
} else {
	//トップページへリダイレクト
	header( "location: " . home_url() );
}

?>

</body>
</html>